<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halhasilseleksi extends BaseController
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
        $data['judul'] = 'Wawancara';
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');

        echo view('_applayout', $data);
    }

}