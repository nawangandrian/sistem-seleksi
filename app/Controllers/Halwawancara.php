<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halwawancara extends BaseController
{
    protected $db;
    protected $model_crud;
    protected $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->model_crud = new crudseleksi();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['content'] = 'hasil_wawancara/data';
        $data['judul'] = 'Hasil Tes Wawancara';
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');

        echo view('_applayout', $data);
    }

    public function peserta($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Wawancara';
        $data['content'] = 'hasil_wawancara/peserta';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaWawancara($id);
        
        echo view('_applayout', $data);
    }

    public function hasil($IdUser, $IdPelatihan)
    {
        $id = $IdUser; 
        $data['id_pelatihan'] = $IdPelatihan; 
        $data['judul'] = 'Daftar Hasil Tes';
        $data['content'] = 'hasil_wawancara/hasil';

        // Dapatkan semua soal wawancara berdasarkan IdPelatihan
        $soal_list = $this->model_crud->getSoalWawancara($IdPelatihan);

        // Loop melalui setiap soal dan insert ke dalam tabel jawaban_wawancara
        foreach ($soal_list as $soal) {
            $soal_id = $soal['id_soal_wawancara'];

            // Cek apakah kombinasi soal_wawancara_id dan user_id sudah ada
            $existing = $this->db->table('jawaban_wawancara')
                                ->where('user_id', $id)
                                ->where('soal_wawancara_id', $soal_id)
                                ->countAllResults();

            if ($existing == 0) {
                // Jika belum ada, lakukan insert
                $input_data = [
                    'user_id'          => $id,
                    'soal_wawancara_id'=> $soal_id,
                    'hasil_jawaban'    => '0',
                ];
                $this->model_crud->insertkode('jawaban_wawancara', $input_data);
            }
        }

        $data['hasil'] = $this->model_crud->getHasilWawancara($id);
        $data['wawancara'] = $this->model_crud->getAll('jawaban_wawancara');
        $data['peserta'] = $this->model_crud->detailkode('peserta', 'user_id', $id);
        echo view('_applayout', $data);
    }

    public function edit($getId)
    {
        $id = htmlentities($getId);
        date_default_timezone_set('Asia/Jakarta');
        $input = $this->request->getPost();
        $id_jawaban_wawancara = $input['inputan_id_jawaban_wawancara'];
        $id_user = $input['inputan_id_user'];
        $id_pelatihan = $input['inputan_id_pelatihan'];

        $input_data = [
            'hasil_jawaban'       => $input['hasil_jawaban']
        ];

        if ($this->model_crud->updatekode('jawaban_wawancara', 'id_jawaban_wawancara', $id_jawaban_wawancara, $input_data)) { 
            session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            return redirect()->to(base_url('halwawancara/hasil/'.$id_user.'/'.$id_pelatihan));
        } else {
            session()->setFlashdata('error', 'Gagal Mengubah Data');
            return redirect()->to(base_url('halwawancara/hasil/'.$id_user.'/'.$id_pelatihan));
        }
    }

    public function simpan_total($userId)
    {
        $total_skor = $this->request->getPost('total_skor');
        
        // Pastikan untuk menggunakan nama tabel dan kolom yang sesuai dengan skema Anda
        $data = [
            'peserta_id' => $userId,
            'wawancara_hasil' => $total_skor
        ];
        
        $insert = $this->model_crud->insertkode('hasil_wawancara', $data);
        echo "<script>alert('Data uraian tidak ditemukan');</script>";
        
    }

    public function check_peserta($userId)
    {
        
        // Periksa apakah peserta_id sudah ada di tabel hasil_pengetahuan
        $exists = $this->model_crud->check_wawancara_exists($userId);

        // Mengembalikan status ke client
        return $this->response->setJSON(['status' => $exists ? 'exists' : 'not_exists']);
        echo "<script>alert('Data uraian tidak ditemukan');</script>";

    }

    public function ubah_total($userId)
    {

        // Ambil total skor dari POST data
        $totalSkor = $this->request->getPost('total_skor');

        // Update total skor untuk peserta_id yang sesuai
        $update = $this->model_crud->update_total_wawancara($userId, $totalSkor);

        // Mengembalikan status ke client
        return $this->response->setJSON(['status' => $update ? 'success' : 'error']);
    }

}