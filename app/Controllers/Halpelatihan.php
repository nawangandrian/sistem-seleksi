<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halpelatihan extends BaseController
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
        $data['content'] = 'pelatihan/data';
        $data['judul'] = 'Pelatihan';
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');
        //$data['pelatihan'] = $this->model_crud->getpelatihan();

        echo view('_applayout', $data);
    }

    private function _validasi()
    {
        // Atur rules validasi
        $rules = [
            'nama_pelatihan' => 'required|trim',
            'jenis_pelatihan' => 'required|in_list[DBHCHT,APBN]',
            'lama_pelatihan' => 'required|trim',
            'jumlah_peserta' => 'required|trim'
        ];

        $this->validation->setRules($rules); // Terapkan rules validasi
    }

    private function inputan()
    {
        // Mengembalikan nilai array input
        return [
            'nama_pelatihan' => $this->request->getPost('nama_pelatihan'),
            'jenis_pelatihan' => $this->request->getPost('jenis_pelatihan'),
            'lama_pelatihan' => $this->request->getPost('lama_pelatihan'),
            'jumlah_peserta' => $this->request->getPost('jumlah_peserta'),
        ];
    }

    public function add()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->_validasi();

        // Ambil input dari form
        $input = $this->request->getPost();
        
        // Pastikan tahun diambil dengan benar
        $input['tahun_pelatihan'] = date('Y');

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = "Pelatihan";
            $data['pelatihan'] = $this->model_crud->getAll('pelatihan');
            $data['content'] = 'pelatihan/add';

            // Mengenerate ID pelatihan
            echo view('_applayout', $data);
        } else {
            $save = $this->model_crud->insertkode('pelatihan', $input); // Menggunakan data input untuk penambahan data
            if ($save) {
                session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
                
            } else {
                session()->setFlashdata('error', 'Gagal Menambah Data');
            }
            return redirect()->to(base_url('halpelatihan'));
        }
    }

    public function edit($getId)
    {
        $id = $getId; 
        $this->_validasi();
        $input = $this->inputan();

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = 'Pelatihan';
            $data['content'] = 'pelatihan/edit';
            $data['pelatihan'] = $this->model_crud->getAll('pelatihan');
            $data['pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
            echo view('_applayout', $data);
        } else {
            $update = $this->model_crud->updatekode('pelatihan', 'id_pelatihan', $id, $input);
            
            if ($update) {
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
            }
            return redirect()->to(base_url('halpelatihan'));
        }
    }

    public function delete($getId)
    {
        $id = $getId; 
        if ($this->model_crud->deletekode('pelatihan', 'id_pelatihan', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halpelatihan'));
    }
}