<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halberanda extends BaseController
{
    protected $db;
    protected $model_crud;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->model_crud = new crudseleksi();
    }

    public function index()
    {
        $session = session();
        $user_id = $session->get('id_user'); // Ambil ID user yang login

        // Ambil informasi peserta berdasarkan id_user
        $peserta = $this->model_crud->getPesertaByUserId($user_id);

        // Cek apakah peserta ditemukan
        if ($peserta) {
            // Ambil data pelatihan berdasarkan pelatihan_id dari peserta
            $pelatihan = $this->model_crud->getPelatihanById($peserta['pelatihan_id']);
            
            // Jika pelatihan memiliki file hasil seleksi, tampilkan
            if ($pelatihan && !empty($pelatihan['daftar_hasil_seleksi'])) {
                $data['hasil_seleksi_pdf'] = base_url('uploads/' . $pelatihan['daftar_hasil_seleksi']);
            } else {
                $data['hasil_seleksi_pdf'] = null;
            }
        } else {
            $data['hasil_seleksi_pdf'] = null;
        }
        //echo "Hasil: " . $data['hasil_seleksi_pdf'] . "<br>";
        
        $data['peserta'] = $this->model_crud->count('peserta');
        $data['ujian'] = $this->model_crud->count('ujian');
        $data['pelatihan'] = $this->model_crud->count('pelatihan');
        $data['pelatihanData'] = $this->model_crud->getJumlahPeserta();
        $data['tahunPelatihan'] = $this->model_crud->getTahunPelatihan(); 
        $data['pesertaData'] = $this->model_crud->getPesertaByCategory('jenis_kelamin');

        $data['content'] = 'hal-beranda';
        $data['judul'] = 'Beranda';
        $data['sub_judul'] = 'Selamat datang di halaman beranda';

        echo view('_applayout', $data);
    }

    public function filterPelatihan($tahun = null)
    {
        // Jika "Semua Tahun" dipilih, kosongkan parameter tahun agar query mengambil semua data
        $tahun = ($tahun === "Semua Tahun" || empty($tahun)) ? null : $tahun;

        $data = $this->model_crud->getJumlahPeserta($tahun);
        
        return $this->response->setJSON([
            'labels' => array_column($data, 'nama_pelatihan'),
            'jumlah_peserta' => array_column($data, 'jumlah_peserta')
        ]);
    }

    public function filterPeserta($kategori = 'jenis_kelamin')
    {
        $data = $this->model_crud->getPesertaByCategory($kategori);

        return $this->response->setJSON([
            'labels' => array_column($data, $kategori),
            'jumlah_peserta' => array_column($data, 'jumlah_peserta')
        ]);
    }

}