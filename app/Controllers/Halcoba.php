<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halcoba extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->model_crud = new crudseleksi();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['content'] = 'soal/tambang';
        $data['judul'] = 'Pilgan';
        $data['soal'] = $this->model_crud->getSoal();
        $data['pilgan'] = $this->model_crud->getPilgan();

        echo view('_applayout', $data);
    }

    public function insertData()
    {
        //if (!empty($this->request->getFiles('image'))) {
            //foreach ($this->request->getFiles('image') as $file) {
                //var_dump($file[1]); // Akses file pertama dari setiap array 'image'

            //}
        //}
         //else {
            //echo "No file uploaded.";
        //}
        $input_data = $this->request->getPost();

        // Cek apakah input_data tidak kosong
        if (!empty($input_data['text_input1']) && !empty($input_data['text_input2'])) {
            // Inisialisasi array untuk menyimpan nama file yang berhasil diunggah
            $uploaded_files = [];

            // Loop through submitted data
            foreach ($this->request->getFiles('image') as $fileArray) {
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
                            exit;
                        }

                        // Upload file
                        if ($file->move($target_dir, $filename)) {
                            echo "The file " . $file->getName() . " has been uploaded.";
                            // Tambahkan nama file yang berhasil diunggah ke dalam array
                            $uploaded_files[] = $filename;
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                            exit;
                        }
                    }
                }
            }

            // Simpan data ke dalam database hanya jika ada file yang berhasil diunggah
            if (!empty($uploaded_files)) {
                foreach ($input_data['text_input1'] as $key => $text_input1) {
                    // Ambil text_input2 yang sesuai dengan index pada text_input1
                    $text_input2 = $input_data['text_input2'][$key];

                    // Buat data yang akan disimpan ke dalam database
                    $data = [
                        'text_input1' => $text_input1,
                        'text_input2' => $text_input2,
                        'image' => $uploaded_files[$key], // Ambil nama file yang sesuai dengan index
                    ];

                    try {
                        // Simpan data ke dalam database menggunakan model
                        $save = $this->model_crud->insertkode('tbpilgan', $data);
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

        //return redirect()->to(base_url('insert-data'));
        
    }
}