<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Hallaporan extends BaseController
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
        $data['content'] = 'laporan/data';
        $data['judul'] = 'Laporan';
        $data['pelatihan'] = $this->model_crud->getAllPelatihanDenganJumlahPeserta();
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');
        $data['jenis_pelatihan'] = ['DBHCHT', 'APBN'];
        //$data['pelatihan'] = $this->model_crud->getpelatihan();

        echo view('_applayout', $data);
    }

    public function filter()
    {
        $tahun_mulai = $this->request->getGet('tahun_mulai');
        $tahun_selesai = $this->request->getGet('tahun_selesai');
        $selected_jenis = $this->request->getGet('jenis'); // bisa kosong ("")

        $data['judul'] = 'Laporan';
        $data['content'] = 'laporan/data';
        $data['tahun_mulai'] = $tahun_mulai;
        $data['tahun_selesai'] = $tahun_selesai;
        $data['selected_jenis'] = $selected_jenis;

        // Tambahkan list pilihan jenis pelatihan
        $data['jenis_pelatihan'] = ['DBHCHT', 'APBN'];
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');

        $data['pelatihan'] = $this->model_crud->getPelatihanFiltered($tahun_mulai, $tahun_selesai, $selected_jenis);
       

        return view('_applayout', $data);
    }

    public function print()
    {
        $tahun_mulai = $this->request->getGet('tahun_mulai');
        $tahun_selesai = $this->request->getGet('tahun_selesai');
        $jenis = $this->request->getGet('jenis');
        $id_kepala_blk = $this->request->getGet('kepala_blk');

        $data['pelatihan'] = $this->model_crud->getPelatihanFiltered($tahun_mulai, $tahun_selesai, $jenis);
        $data['kepalaBLK'] = $this->model_crud->getKepalaBLKById($id_kepala_blk);

        $data['tahun_mulai'] = $tahun_mulai;
        $data['tahun_selesai'] = $tahun_selesai;
        $data['jenis_pelatihan'] = $jenis;
        $data['content'] = 'laporan/laporan_print';

        return view('_applayout', $data);
    }

}