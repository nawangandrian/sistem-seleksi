<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halprofil extends BaseController
{
    protected $db;
    protected $model_crud;
    protected $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->model_crud = new crudseleksi();
        $this->validation = \Config\Services::validation();
        //$this->upload = \Config\Services::upload();
    }

    public function index()
    {
        
        $data['content'] = 'profil/user';
        $data['judul'] = 'Profil';
        $data['sub_judul'] = 'Selamat datang di halaman dosen';
        $data['users'] = $this->model_crud->getUsers('id_user');
        $id_user = session()->get('id_user');
        $data['datauser'] = $this->model_crud->detailkode('user', 'id_user', $id_user);

        echo view('_applayout', $data);
    }

    private function _validasi($id)
    {
        $db = $this->model_crud->detailkode1('user', 'id_user', $id);
        // Sisipkan $id sebagai argumen
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        // Memeriksa apakah detailkode mengembalikan array yang valid
        if (!empty($db) && is_array($db)) {
            // Pastikan 'username' ada dalam $db dan 'email' juga ada
            $db_username = isset($db['username']) ? $db['username'] : '';
            $db_email = isset($db['email']) ? $db['email'] : '';

            // Tentukan aturan validasi berdasarkan apakah nilai username dan email sama dengan nilai yang ada di database
            $uniq_username = $db_username == $username ? '' : '|is_unique[user.username]';
            $uniq_email = $db_email == $email ? '' : '|is_unique[user.email]';
        } else {
            // Jika detailkode tidak mengembalikan array yang valid, berikan nilai default untuk variabel $uniq_username dan $uniq_email
            $uniq_username = '';
            $uniq_email = '';
        }
        // Set aturan validasi untuk setiap field
        $rules = [
            'username' => 'required|alpha_numeric' . $uniq_username,
            'email' => 'required|valid_email' . $uniq_email,
            'nama' => 'required|trim',
            'no_telp' => 'required|trim|numeric'
        ];

        // Terapkan aturan validasi jika data yang dibutuhkan tidak kosong
        if (!empty($username)) {
            $this->validation->setRule('username', 'Username', 'required|alpha_numeric' . $uniq_username);
        }
        if (!empty($email)) {
            $this->validation->setRule('email', 'Email', 'required|valid_email' . $uniq_email);
        }
        // Terapkan aturan validasi
        $this->validation->setRules($rules);
    }

    private function _config()
    {
        $config = [
            'upload_path' => "./img/avatar",
            'allowed_types' => 'gif|jpg|jpeg|png',
            'encrypt_name' => TRUE,
            'max_size' => 2048
        ];

        // Load library Upload dan inisialisasi dengan konfigurasi
        $this->upload = \Config\Services::upload($config);
    }

    public function setting($getId)
    {
        $id = htmlentities($getId);
        $this->_validasi($id);
        $this->_config();

        if (!$this->validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $data['judul'] = "Pengaturan";
            $data['user'] = $this->user;
            $data['content'] = 'profil/setting';
            $data['datauser'] = $this->model_crud->detailkode('user', 'id_user', $id);
            $data['users'] = $this->model_crud->detailkode1('user', 'id_user', $id);
            echo view('_applayout', $data);
        } else {
            // Jika validasi berhasil, lanjutkan dengan menyimpan data
            $input = $this->request->getPost();
            $foto = $this->request->getFile('foto');
            $fotolama = session()->get('foto');
            if ($foto->isValid() && !$foto->hasMoved()) {
                if ($foto->move('./img/avatar')) {
                    // Jika pengunggahan foto berhasil, simpan nama file
                    $old_image = FCPATH . 'img/avatar/' . $fotolama;
                    if ($fotolama != 'user.png' && file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $input['foto'] = $foto->getName();
                } else {
                    // Jika pengunggahan foto gagal, tampilkan pesan kesalahan
                    echo "Gagal mengunggah foto";
                    die;
                }
            }
            // Update data pengguna
            $update = $this->model_crud->updatekode('user', 'id_user', $input['id_user'], $input);
            if ($update) {
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
            }
            return redirect()->to(base_url('halprofil/setting/' . $id));
        }
    }

    private function _validasi1($id)
    {
        // Atur rules validasi
        $rules = [
            'password_lama' => 'required|trim',
            'password_baru' => 'required|trim|min_length[3]|differs[password_lama]',
            'konfirmasi_password' => 'matches[password_baru]'
        ];

        // Set aturan validasi untuk inputan form
        $this->validation->setRules($rules); // Terapkan rules validasi
    }

    public function ubahpassword($getId)
    {
        $id = htmlentities($getId);
        $this->_validasi1($id);

        // Jalankan validasi
        if (!$this->validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan form ubah password dengan pesan kesalahan
            $data['judul'] = "Ubah Password";
            $data['content'] = 'profil/ubahpassword';
            //echo 'alan' . $id;
            $data['datauser'] = $this->model_crud->detailkode('user', 'id_user', $id);
            echo view('_applayout', $data);
        } else {
            // Ambil data pengguna
            $datauser = $this->model_crud->detailkode('user', 'id_user', $id);
            $input = $this->request->getPost();
            $password_lama = $this->request->getPost('password_lama');
            $password_baru = $this->request->getPost('password_baru');
            $password = $datauser->password;
            
            // Verifikasi password lama dengan password yang ada di sesi
            if (password_verify($password_lama, $password)) {
                // Jika verifikasi berhasil, ubah password baru
                echo 'alajjj' . $password . $password_lama . $password_baru;
                $new_pass = ['password' => password_hash($password_baru, PASSWORD_DEFAULT)];
                //echo 'alrrr' . $new_pass;
                $query = $this->model_crud->updatekode('user', 'id_user', $id, $new_pass);
                $new_pw = ['pw_user' => $password_baru]; 
                $queryku = $this->model_crud->updatekode('user', 'id_user', $id, $new_pw);
                if ($query) {
                    session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Password');
                } else {
                    session()->setFlashdata('error', 'Gagal Mengubah Password');
                }
                
            } else {
                session()->setFlashdata('error', 'Password lama tidak cocok!');
            }
            return redirect()->to(base_url('halprofil/ubahpassword/' . $id));
        }
    }


    public function settingad($getId)
    {
        $id = htmlentities($getId);
        $this->_validasi($id);
        $this->_config();
    
        // Set request untuk validasi
        $this->validation->withRequest($this->request);
    
        // Jalankan validasi
        if (!$this->validation->run()) {
            // Jika validasi gagal, kembali ke halaman setting dengan membawa pesan error
            return redirect()->to(base_url('halprofil/setting/' . $id))->withInput()->with('errors', $this->validation->getErrors());
        }else{
    
        // Jika validasi sukses, lanjutkan dengan menyimpan data
        $input = $this->request->getPost();
        $insert = $this->model_crud->updatekode('user', 'id_user', $input['id_user'], $input);
        if ($insert) {
            //set_pesan('perubahan berhasil disimpan.');
        } else {
            //set_pesan('perubahan tidak disimpan.');
        }
        
        return redirect()->to(base_url('halprofil/setting/' . $id));}
    }
    
}