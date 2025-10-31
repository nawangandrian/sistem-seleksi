<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halujian extends BaseController
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

    public function index() {
        $data['content'] = 'ujian/data';
        $data['judul'] = 'Tes Pengetahuan';
        
        $id_user = (int)session()->get('id_user');  // Konversi ke integer
        $role = session()->get('role');
    
        // Inisialisasi variabel ujian
        $ujian = [];
    
        // Jika pengguna adalah peserta, ambil jenis pelatihan yang dipilih
        if ($role == 'peserta') {
            $pelatihanPeserta = $this->model_crud->getPelatihanPeserta($id_user);
            $selectedPelatihan = $pelatihanPeserta ? $pelatihanPeserta['pelatihan_id'] : null;
    
            // Ambil ujian berdasarkan jenis pelatihan yang dipilih
            if ($selectedPelatihan) {
                $ujian = $this->model_crud->getUjianByPelatihan($selectedPelatihan);
            }
        } else {
            // Jika pengguna bukan peserta, ambil semua ujian
            $ujian = $this->model_crud->getUjian();
        }
            
        // Mengambil status ujian untuk setiap ujian
        $status = [];
        foreach ($ujian as $b) {
            $status[$b['id_ujian']] = $this->model_crud->getExamStatus($id_user, $b['id_ujian']);
        }
            
        $data['status'] = $status;
        $data['ujian'] = $ujian;
    
        foreach ($status as $id_ujian => $stat) {
            if ($stat) {
                $statusku = $stat['status'];
                //echo "<script>alert('Hasil ujian berhasil disimpan!')</script>";
                // echo "<script>alert('Status ujian untuk ujian dengan ID $id_ujian adalah $statusku, $total_skor, $id_peserta, $penge')</script>";
            }
                
        }
        echo view('_applayout', $data);
    }    

    private function _validasi()
    {
        // Atur rules validasi
        $rules = [
            'nama_ujian' => 'required|trim',
            'waktu' => 'required|integer|max_length[4]|greater_than[0]'
        ];

        $this->validation->setRules($rules); // Terapkan rules validasi
    }

    private function inputan()
    {
        // Mengembalikan nilai array input
        return [
            'pelatihan_id' => $this->request->getPost('pelatihan_id'),
            'nama_ujian' => $this->request->getPost('nama_ujian'),
            'jumlah_soal' => $this->request->getPost('jumlah_soal'),
            'waktu' => $this->request->getPost('waktu'),
            'tgl_mulai' => date('Y-m-d H:i:s', strtotime($this->request->getPost('tgl_mulai'))),
            'tgl_selesai' => date('Y-m-d H:i:s', strtotime($this->request->getPost('tgl_selesai'))),
        ];
    }

    public function add()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->_validasi();
        $input = $this->inputan();
        //$nama_ujian = $this->request->getPost('jenis');
        //$nama_ujian1 = date('Y-m-d H:i:s', strtotime($this->request->getPost('tgl_mulai')));
        //echo "<script>alert('$nama_ujian . $nama_ujian1');</script>";
        //echo $nama_ujian;

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = "Tes Pengetahuan";
            $data['pelatihan'] = $this->model_crud->getAll('pelatihan');
            $data['content'] = 'ujian/add';

            // Mengenerate ID ujian
            echo view('_applayout', $data);
        } else {
            $save = $this->model_crud->insertkode('ujian', $input); // Menggunakan data input untuk penambahan data
            if ($save) {
                session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
                
            } else {
                session()->setFlashdata('error', 'Gagal Menambah Data');
            }
            return redirect()->to(base_url('halujian'));
        }
    }

    public function edit($getId)
    {
        $id = $getId; 
        $this->_validasi();
        $input = $this->inputan();
        //$input = $this->request->getPost();

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = 'Tes Pengetahuan';
            $data['content'] = 'ujian/edit';
            $data['pelatihan'] = $this->model_crud->getAll('pelatihan');
            $data['ujian'] = $this->model_crud->detailkode('ujian', 'id_ujian', $id);
            echo view('_applayout', $data);
        } else {
            $update = $this->model_crud->updatekode('ujian', 'id_ujian', $id, $input);
            
            if ($update) {
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
            }
            return redirect()->to(base_url('halujian'));
        }
    }

    public function delete($getId)
    {
        $id = $getId; 
        if ($this->model_crud->deletekode('ujian', 'id_ujian', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halujian'));
    }
    
}