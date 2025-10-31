<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halsoal extends BaseController
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
        //$data['content'] = 'soal/data';
        $data['content'] = 'soal/data_seleksi';
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');
        $data['judul'] = 'Soal Pengetahuan';
        //$data['soal'] = $this->model_crud->getSoal();
        //$data['ujian'] = $this->model_crud->getAll('ujian');

        echo view('_applayout', $data);
    }

    public function soal($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Soal Pengetahuan';
        $data['content'] = 'soal/data';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['soal'] = $this->model_crud->getSoalPengetahuan($id);
        $data['ujian'] = $this->model_crud->getUjianSoal($id);
        
        echo view('_applayout', $data);
    }

    private function _validasi()
    {
        // Atur rules validasi
        $rules = [
            'soal' => 'required|trim',
        ];

        $this->validation->setRules($rules); // Terapkan rules validasi
    }

    private function inputan()
    {
        // Mengembalikan nilai array input
        return [
            'ujian_id' => $this->request->getPost('ujian_id'),
            'soal' => $this->request->getPost('soal'),
            'tipe_soal' => $this->request->getPost('tipe_soal'),
            'bobot_soal' => $this->request->getPost('bobot_soal'),
        ];
    }

    public function add($idPelatihan)
    {
        $this->_validasi();
        //$input = $this->request->getPost();
        $input = $this->inputan();
        $id = $IdPelatihan; 

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = "Soal";
            //$data['ujian'] = $this->model_crud->getAll('ujian');
            $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $idPelatihan);
            $data['ujian'] = $this->model_crud->getUjianSoal($idPelatihan);
            $data['content'] = 'soal/add';

            echo view('_applayout', $data);
        } else {
            $img_soal = $this->request->getFile('img_soal');

            if ($img_soal->isValid() && !$img_soal->hasMoved()) {
                if ($img_soal->move('./img/avatar')) {
                    $input['img_soal'] = $img_soal->getName();
                } else {
                    // Jika pengunggahan foto gagal, tampilkan pesan kesalahan
                    session()->setFlashdata('error', 'Gagal mengunggah foto');
                    return redirect()->to(base_url('halsoal'));
                }
            } else {
                // Jika tidak ada gambar yang diunggah, gunakan gambar yang ada atau default 'user.png'
                $input['img_soal'] = '';
            }

            $save = $this->model_crud->insertkode('soal', $input); // Menggunakan data input untuk penambahan data

            if ($save) {
                session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Menambah Data');
            }

            return redirect()->to(base_url('halsoal/soal/'.$idPelatihan));

        }
    }

    public function edit($getId, $idPelatihan)
    {
        $id = $getId; 
        $this->_validasi();
        $input = $this->inputan();
        //$input = $this->request->getPost();

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = 'Soal';
            $data['content'] = 'soal/edit';
            $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $idPelatihan);
            $data['ujian'] = $this->model_crud->getUjianSoal($idPelatihan);
            $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $id);
            echo view('_applayout', $data);
        } else {
            $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $id);
            $img_soal = $this->request->getFile('img_soal');
            $imglama = $imglama = $data['soal']->img_soal;
            
            if ($img_soal->isValid() && !$img_soal->hasMoved()) {
                if ($img_soal->move('./img/avatar')) {
                    // Jika pengunggahan foto berhasil, simpan nama file
                    $old_image = FCPATH . 'img/avatar/' . $imglama;
                    if ($imglama != '' && file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $input['img_soal'] = $img_soal->getName();
                } else {
                    // Jika pengunggahan foto gagal, tampilkan pesan kesalahan
                    echo "Gagal mengunggah foto";
                    die;
                }
            }

            $update = $this->model_crud->updatekode('soal', 'id_soal', $id, $input);
            
            if ($update) {
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
            }
            return redirect()->to(base_url('halsoal/soal/'.$idPelatihan));
        }
    }

    public function delete($getId, $idPelatihan)
    {
        $id = $getId; 

        // Dapatkan nama file img_pilgan yang akan dihapus
        $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $id);
        $filename = $data['soal']->img_soal;

        if ($this->model_crud->deletekode('soal', 'id_soal', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halsoal/soal/'.$idPelatihan));
    }

}