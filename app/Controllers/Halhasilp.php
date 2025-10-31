<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halhasilp extends BaseController
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
        $data['content'] = 'hasil_pengetahuan/data';
        $data['judul'] = 'Hasil Tes Pengetahuan';
        $data['ujian'] = $this->model_crud->getUjian();

        echo view('_applayout', $data);
    }

    public function peserta($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Pengetahuan';
        $data['content'] = 'hasil_pengetahuan/peserta';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getDaftarPeserta($id);
        
        echo view('_applayout', $data);
    }

    public function hasil($IdUser, $IdPelatihan)
    {
        $id = $IdUser; 
        $data['id_pelatihan'] = $IdPelatihan; 
        $data['judul'] = 'Daftar Hasil Tes';
        $data['content'] = 'hasil_pengetahuan/hasil';
        $data['hasil'] = $this->model_crud->getDaftarHasil($id);
        $data['pengetahuan'] = $this->model_crud->getAll('hasil_pengetahuan');
        $data['peserta'] = $this->model_crud->detailkode('peserta', 'user_id', $id);
        echo view('_applayout', $data);
    }

    public function uraian($IdSoal, $IdUser, $IdPelatihan)
    {
        $data['id_user'] = $IdUser;
        $data['id_pelatihan'] = $IdPelatihan; 
        $data['judul'] = 'Detail Tes Uraian';
        $data['content'] = 'hasil_pengetahuan/uraian';
        $data['soal'] = $this->model_crud->getDetailUraian($IdSoal, $IdUser);

        // Periksa apakah data uraian ditemukan
        if ($data['soal']) {
            // Jika ditemukan, ambil id_soal dari data uraian
            foreach ($data['soal'] as $row) {
                $idSoal = $row->id_soal; // Jika menggunakan getResultArray()
            }
            // Panggil fungsi untuk mendapatkan detail jawaban berdasarkan id_soal
            $data['uraian'] = $this->model_crud->getDetailJawaban($idSoal);
            if (!$data['uraian']) {
                echo "<script>alert('Data uraian dengan id soal: $idSoal');</script>";
            }
        } else {
            echo "<script>alert('Data uraian tidak ditemukan');</script>";
        }
        
        echo view('_applayout', $data);
    }


    public function simpan_nilai($idJawab, $IdUser, $IdPelatihan) {
        $id = $idJawab;
        $IdUser = $IdUser;
        $IdPelatihan = $IdPelatihan;
        $nilai = $this->request->getPost('nilai_uraian');
    
        // Panggil metode updateuraian untuk mengupdate kolom jawab_benar
        $update = $this->model_crud->updateuraian('jawaban_sementara', 'id_jawab', $id, 'jawab_benar', $nilai);
    
        // Cek apakah update berhasil
        if ($update) {
            session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Mengubah Data');
        }
    
        return redirect()->to(base_url('halhasilp/hasil/'. $IdUser .'/'. $IdPelatihan));
    }    

    public function simpan_total($userId)
    {
        $total_skor = $this->request->getPost('total_skor');
        
        // Pastikan untuk menggunakan nama tabel dan kolom yang sesuai dengan skema Anda
        $data = [
            'peserta_id' => $userId,
            'pengetahuan_hasil' => $total_skor
        ];
        
        $insert = $this->model_crud->insertkode('hasil_pengetahuan', $data);
        
    }

    public function check_peserta($userId)
    {
        
        // Periksa apakah peserta_id sudah ada di tabel hasil_pengetahuan
        $exists = $this->model_crud->check_peserta_exists($userId);

        // Mengembalikan status ke client
        return $this->response->setJSON(['status' => $exists ? 'exists' : 'not_exists']);
    }

    public function ubah_total($userId)
    {

        // Ambil total skor dari POST data
        $totalSkor = $this->request->getPost('total_skor');

        // Update total skor untuk peserta_id yang sesuai
        $update = $this->model_crud->update_total_skor($userId, $totalSkor);

        // Mengembalikan status ke client
        return $this->response->setJSON(['status' => $update ? 'success' : 'error']);
    }

}