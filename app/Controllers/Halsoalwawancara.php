<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halsoalwawancara extends BaseController
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
        $data['content'] = 'soal_wawancara/data';
        $data['judul'] = 'Soal Wawancara';
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');

        echo view('_applayout', $data);
    }

    public function soal($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Soal Wawancara';
        $data['content'] = 'soal_wawancara/soal';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['soal'] = $this->model_crud->getSoalWawancara($id);
        
        echo view('_applayout', $data);
    }

    private function _validasi()
    {
        
        $rules = [
            'soal_wawancara' => 'required|trim',
        ];

        $this->validation->setRules($rules); 
    }

    private function inputan($idPelatihan)
    {
        return [
            'pelatihan_id' => $idPelatihan, 
            'soal_wawancara' => $this->request->getPost('soal_wawancara'),
            'bobot_soal_wawancara' => $this->request->getPost('bobot_soal_wawancara'),
        ];
    }

    public function add($idPelatihan)
    {
        $this->_validasi();
        $input = $this->inputan($idPelatihan); 

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = "Soal Wawancara";
            $data['content'] = 'soal_wawancara/add';
            $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $idPelatihan);

            echo view('_applayout', $data);
        } else {
            $save = $this->model_crud->insertkode('soal_wawancara', $input); 
            if ($save) {
                session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Menambah Data');
            }

            return redirect()->to(base_url('halsoalwawancara/soal/'.$idPelatihan));
        }
    }

    public function edit($getId, $idPelatihan)
    {
        $id = $getId; 
        $this->_validasi();
        $input = $this->inputan($idPelatihan);

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = 'Soal Wawancara';
            $data['content'] = 'soal_wawancara/edit';
            $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $idPelatihan);
            $data['soal'] = $this->model_crud->detailkode('soal_wawancara', 'id_soal_wawancara', $id);
            echo view('_applayout', $data);
        } else {
            $update = $this->model_crud->updatekode('soal_wawancara', 'id_soal_wawancara', $id, $input);
            
            if ($update) {
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
            }
            return redirect()->to(base_url('halsoalwawancara/soal/'.$idPelatihan));
        }
    }

    public function delete($getId, $idPelatihan)
    {
        $id = $getId; 

        if ($this->model_crud->deletekode('soal_wawancara', 'id_soal_wawancara', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halsoalwawancara/soal/'.$idPelatihan));
    }

}