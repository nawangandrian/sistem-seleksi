<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halpilgan extends BaseController
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
        $data['content'] = 'soal/pilgan';
        $data['judul'] = 'Jawaban';
        $data['soal'] = $this->model_crud->getSoal();
        $data['pilgan'] = $this->model_crud->getPilgan();

        echo view('_applayout', $data);
    }

    public function utama($getId)
    {
        $id = $getId; 
        $data['content'] = 'soal/pilgan';
        $data['judul'] = 'Jawaban';
        $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $id);
        $data['pilgan'] = $this->model_crud->getPilgan();

        echo view('_applayout', $data);
    }

    public function tampil($getId)
    {
        $id = $getId; 
        $data['content'] = 'soal/tampil';
        $data['judul'] = 'Jawaban';
        //$data['pilgan'] = $this->model_crud->getPilgan();
        $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $id);
        $data['pilgan'] = $this->model_crud->getPilganById($id);
        $data['benarsalah'] = $this->model_crud->getBenarSalahById($id);
        $data['uraian'] = $this->model_crud->getUraianById($id);

        echo view('_applayout', $data);
    }

    private function _validasi()
    {
        // Atur rules validasi
        $rules = [
            'soal_id' => 'required|trim',
        ];

        $this->validation->setRules($rules); // Terapkan rules validasi
    }

    private function inputan()
    {
        // Mengembalikan nilai array input
        return [
            'soal_id' => $this->request->getPost('soal_id'),
            'pilgan' => $this->request->getPost('pilgan'),
            'jawaban_benar' => $this->request->getPost('jawaban_benar'),
        ];
    }

    public function toggle($getId)
    {
        $id = htmlentities($getId);
        $pilgan = $this->model_crud->getPilganById($id); // Anda perlu membuat metode getUserById di model

        if ($user) {
            $status = $pilgan['jawaban_benar'];
            $toggle = $status ? 0 : 1; // Jika user aktif maka nonaktifkan, begitu pula sebaliknya

            if ($this->model_crud->updatePilgan(['jawaban_benar' => $toggle], $id)) { // Anda perlu membuat metode updateUser di model
                if ($toggle == 1) {
                    session()->setFlashdata('success', 'Selamat! Pilgan berhasil diaktifkan.');
                } else {
                    session()->setFlashdata('success', 'Selamat! Pilgan berhasil dinonaktifkan.');
                }
            } else {
                session()->setFlashdata('error', 'Gagal mengupdate pilgan.');
            }
        } else {
            session()->setFlashdata('error', 'Pilgan tidak ditemukan.');
        }
        return redirect()->to(site_url('halpilgan'));
    }

    public function add()
    {
        $this->_validasi();
        //$input = $this->request->getPost();
        //$input = $this->inputan();

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = "Pilgan";
            $data['pilgan'] = $this->model_crud->getAll('pilgan');
            $data['content'] = 'soal/pilgan';

            echo view('_applayout', $data);
        } else {
            $input_data = $this->request->getPost();

            // Cek apakah input_data tidak kosong
            if (!empty($input_data['pilgan'])) {
                // Inisialisasi array untuk menyimpan nama file yang berhasil diunggah
                $uploaded_files = [];

                // Loop through submitted data
                foreach ($this->request->getFiles('img_pilgan') as $fileArray) {
                    // Initialize $filename di luar loop foreach agar tidak menjadi null
                    $filename = '';

                    foreach ($fileArray as $file) {
                        // Check if file is uploaded and not empty
                        if (!empty($file)) {
                            // File info
                            $filename = $file->getName();
                            $target_dir = './img/avatar/';
                            $target_file = $target_dir . $filename;
                            $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            // Allow certain file formats
                            if (!in_array($image_type, ['jpg', 'jpeg', 'png', 'gif'])) {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                
                                // Kosongkan file image
                                $file = null;
                            }

                            // Upload file
                            if ($file !== null && $file->move($target_dir, $filename)) {
                                echo "The file " . $file->getName() . " has been uploaded.";
                                // Tambahkan nama file yang berhasil diunggah ke dalam array
                                $uploaded_files[] = $filename;
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                                $uploaded_files[] = '';
                            }
                        }
                    }
                }

                // Simpan data ke dalam database hanya jika ada file yang berhasil diunggah
                if (!empty($uploaded_files)) {
                    foreach ($input_data['pilgan'] as $key => $pilgan) {
                        // Ambil text_input2 yang sesuai dengan index pada text_input1
                        $jawaban_benar = $input_data['jawaban_benar'][$key];
                        $soal = $input_data['soal_id'];

                        // Buat data yang akan disimpan ke dalam database
                        $data = [
                            'soal_id' => $soal,
                            'pilgan' => $pilgan,
                            'jawaban_benar' => $jawaban_benar,
                            'img_pilgan' => $uploaded_files[$key], // Ambil nama file yang sesuai dengan index
                        ];

                        try {
                            // Simpan data ke dalam database menggunakan model
                            $save = $this->model_crud->insertkode('pilgan', $data);
                            echo "Data has been saved to the database.";
                            var_dump($data);
                        } catch (\Exception $e) {
                            echo "Error saving data to the database: " . $e->getMessage();
                        }
                    }
                } else {
                    echo "Error: No files uploaded.";
                }
            } else {
                echo "Error: Input data is empty.";
            }

            return redirect()->to(base_url('halpilgan/tampil/' . $soal));
        
        }
    }

    public function edit($getId)
    {
        $id = $getId; 
        $this->_validasi();
        //$input = $this->inputan();
        $input = $this->request->getPost();

        if (!$this->validation->run($this->request->getPost())) {
            $data['judul'] = 'Pilgan';
            $data['content'] = 'jawaban/edit';
            $data['pilgan'] = $this->model_crud->detailsoalpil($id);
            echo view('_applayout', $data);
        } else {
            $data['pilgan'] = $this->model_crud->detailkode('pilgan', 'id_pilgan', $id);
            $soal = $data['pilgan']->soal_id;
            $img_pilgan = $this->request->getFile('img_pilgan');
            $imglama = $imglama = $data['pilgan']->img_pilgan;
            
            if ($img_pilgan->isValid() && !$img_pilgan->hasMoved()) {
                if ($img_pilgan->move('./img/avatar')) {
                    // Jika pengunggahan foto berhasil, simpan nama file
                    $old_image = FCPATH . 'img/avatar/' . $imglama;
                    if ($imglama != '' && file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $input['img_pilgan'] = $img_pilgan->getName();
                } else {
                    // Jika pengunggahan foto gagal, tampilkan pesan kesalahan
                    echo "Gagal mengunggah foto";
                    die;
                }
            }

            $update = $this->model_crud->updatekode('pilgan', 'id_pilgan', $id, $input);
            
            if ($update) {
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
            }
            return redirect()->to(base_url('halpilgan/tampil/' . $soal));
        }
    }

    public function delete($getId)
    {
        $id = $getId; 

        // Dapatkan nama file img_pilgan yang akan dihapus
        $data['pilgan'] = $this->model_crud->detailkode('pilgan', 'id_pilgan', $id);
        $filename = $data['pilgan']->img_pilgan;
        $soal = $data['pilgan']->soal_id;

        if ($this->model_crud->deletekode('pilgan', 'id_pilgan', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halpilgan/tampil/' . $soal));
    }

}