<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halpengguna extends BaseController
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
        $data['content'] = 'user/data';
        $data['judul'] = 'User';
        $data['users'] = $this->model_crud->getUsers('id_user');
        echo view('_applayout', $data);
    }

    public function detail($id_user)
    {  
        $this->_validasiku('edit');
        $data = [
            'content'      => 'user/data',
            'judul'        => 'User',
            'datauser'     => $this->model_crud->detailkode('user', 'id_user', $id_user),
            'users'        => $this->model_crud->getUsers('id_user')
        ];
                
        echo view('_applayout', $data);
    }

    public function checkEmailExist()
    {
        // Ambil nilai email yang dikirim melalui permintaan POST
        $email = $this->request->getPost('email');

        // Lakukan pencarian email dalam tabel user
        $user = $this->model_crud->isEmailExist($email); // Anda perlu membuat metode getUserByEmail di model

        // Buat array respons
        $response = array();

        // Jika email ditemukan, set exists ke true; jika tidak, set ke false
        if ($user) {
            $response['exists'] = true;
        } else {
            $response['exists'] = false;
        }

        // Kirim respons dalam format JSON
        return $this->response->setJSON($response);
    }

    public function checkUserExist()
    {
        // Ambil nilai email yang dikirim melalui permintaan POST
        $username = $this->request->getPost('username');

        // Lakukan pencarian email dalam tabel user
        $user = $this->model_crud->isUserExist($username); // Anda perlu membuat metode getUserByEmail di model

        // Buat array respons
        $response = array();

        // Jika email ditemukan, set exists ke true; jika tidak, set ke false
        if ($user) {
            $response['exists'] = true;
        } else {
            $response['exists'] = false;
        }

        // Kirim respons dalam format JSON
        return $this->response->setJSON($response);
    }

    // Validasi untuk mode edit
    private function _validasiku($mode)
    {
        // Aturan validasi lainnya
        if ($mode == 'edit') {
            // Validasi untuk email dengan penanganan pesan error untuk validasi is_unique
            $this->validation->setRule('email', 'Email', 'required|valid_email' . $uniq_email);
            if (!$this->validation->run()) {
                $errors = $this->validation->getErrors();
                // Tambahkan pesan error khusus untuk validasi is_unique
                if (strpos($errors['email'], 'is_unique') !== false) {
                    $errors['email'] = 'Email sudah ada di dalam tabel user.';
                }
                // Kirim pesan error ke view
                $data['errors'] = $errors;
            }
        }
    }

    private function _validasi($mode)
    {
        $this->validation->setRule('nama', 'Nama', 'required');
        $this->validation->setRule('role', 'Role', 'required');

        if ($mode == 'add') {
            $this->validation->setRule('username', 'Username', 'required|is_unique[user.username]|alpha_numeric_punct');
            $this->validation->setRule('email', 'Email', 'required|valid_email|is_unique[user.email]');
            $this->validation->setRule('password', 'Password', 'required|min_length[3]');
            $this->validation->setRule('password2', 'Konfirmasi Password', 'matches[password]');
        } else {
            // Untuk mode edit, Anda perlu mengambil data pengguna dari database
            $db = $this->model_crud->detailkode('user', 'id_user', $this->request->getPost('id_user')); // Anda perlu membuat metode getUserData di model
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');

            // Tentukan aturan validasi berdasarkan apakah nilai username dan email sama dengan nilai yang ada di database
            $uniq_username = $db['username'] == $username ? '' : '|is_unique[user.username]';
            $uniq_email = $db['email'] == $email ? '' : '|is_unique[user.email]';

            $this->validation->setRule('username', 'Username', 'required|alpha_numeric' . $uniq_username);
            $this->validation->setRule('email', 'Email', 'required|valid_email' . $uniq_email);
        }
    }

    public function toggle($getId)
    {
        $id = htmlentities($getId);
        $user = $this->model_crud->getUserById($id); // Anda perlu membuat metode getUserById di model

        if ($user) {
            $status = $user['is_active'];
            $toggle = $status ? 0 : 1; // Jika user aktif maka nonaktifkan, begitu pula sebaliknya

            if ($this->model_crud->updateUser(['is_active' => $toggle], $id)) { // Anda perlu membuat metode updateUser di model
                if ($toggle == 1) {
                    session()->setFlashdata('success', 'Selamat! User berhasil diaktifkan.');
                } else {
                    session()->setFlashdata('success', 'Selamat! User berhasil dinonaktifkan.');
                }
            } else {
                session()->setFlashdata('error', 'Gagal mengupdate user.');
            }
        } else {
            session()->setFlashdata('error', 'User tidak ditemukan.');
        }
        return redirect()->to(site_url('halpengguna'));
    }

    public function add()
    {
        // Jalankan validasi untuk mode 'add'
        $this->_validasi('add');

        // Periksa apakah validasi berhasil
        if (!$this->validation->withRequest($this->request)->run()) {
            $data['judul'] = "User";
            $data['content'] = 'user/add';
            $data['pelatihan'] = $this->model_crud->getAll('pelatihan');

            echo view('_applayout', $data);
        } else {
            // Ambil data input dari form
            $input = $this->request->getPost();
        
            // Siapkan data untuk disimpan ke tabel user
            $input_data = [
                'nama'          => $input['nama'],
                'username'      => $input['username'],
                'email'         => $input['email'],
                'no_telp'         => $input['no_telp'],
                'role'          => $input['role'],
                'password'      => password_hash($input['password'], PASSWORD_DEFAULT),
                'created_at'    => time(),
                'foto'          => 'user.png',
                'pw_user'       => $input['password'],
            ];
        
            // Simpan data ke tabel user
            $save = $this->model_crud->insertkode('user', $input_data);
        
            // Jika role adalah "peserta", simpan data ke tabel peserta
            /*if ($input['role'] === 'peserta') {
                // Siapkan data untuk disimpan ke tabel peserta
                $input_peserta = [
                    'nama_peserta'   => $input['nama'],
                    'nip_peserta'    => $input['username'],
                    'no_telp_peserta'    => $input['no_telp'],
                    'pelatihan_id'  => $input['pelatihan_id']
                ];
        
                // Simpan data ke tabel peserta
                $save_peserta = $this->model_crud->insertkode('peserta', $input_peserta);
            }*/
        
            if ($save) {
                session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Menambah Data');
            }
            return redirect()->to(base_url('halpengguna'));
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

    public function edit($getId)
    {
        $id = htmlentities($getId);
        $this->_validasi1($id);
        $this->_validasi('edit');
            $input = $this->request->getPost();
            $input_data = [
                'username'      => $input['username'],
                'email'         => $input['email'],
            ];
            // Ambil data pengguna
            $datauser = $this->model_crud->detailkode('user', 'id_user', $id);
            $password_lama = $this->request->getPost('password_lama');
            $password_baru = $this->request->getPost('password_baru');
            $password = $datauser->password;

            // Periksa apakah password baru dan konfirmasi password cocok
            if ($password_baru !== $this->request->getPost('konfirmasi_password')) {
                // Jika tidak cocok, set flash message
                session()->setFlashdata('error', 'Password baru dan konfirmasi password tidak cocok');
                return redirect()->to(base_url('halpengguna'));
            }

            // Jika role adalah "peserta", simpan data ke tabel peserta
            if ($input['role'] === 'peserta') {
                // Siapkan data untuk disimpan ke tabel peserta
                $input_peserta = [
                    'email_peserta'   => $input['email'],
                ];
        
                $update = $this->model_crud->updatekode('peserta', 'user_id', $id, $input_peserta);
            }
            // Jika role adalah "admin", simpan data ke tabel administrasi
            if ($input['role'] === 'admin') {
                // Siapkan data untuk disimpan ke tabel administrasi
                $input_administrasi = [
                    'email_administrasi'   => $input['email'],
                ];
        
                $update = $this->model_crud->updatekode('administrasi', 'user_id', $id, $input_administrasi);
            }
            // Jika role adalah "kepala blk", simpan data ke tabel kepala_blk
            if ($input['role'] === 'kepala blk') {
                // Siapkan data untuk disimpan ke tabel kepala_blk
                $input_peserta = [
                    'email_kepala_blk'   => $input['email'],
                ];
        
                $update = $this->model_crud->updatekode('kepala_blk', 'user_id', $id, $input_peserta);
            }
            
            $new_pass = ['password' => password_hash($password_baru, PASSWORD_DEFAULT)];
            $query = $this->model_crud->updatekode('user', 'id_user', $id, $new_pass);
            $new_pw = ['pw_user' => $password_baru]; 
            $queryku = $this->model_crud->updatekode('user', 'id_user', $id, $new_pw);

            if ($this->model_crud->updateUser($input_data, $id) && $query) { // Anda perlu membuat metode updateUser di model
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
                return redirect()->to(base_url('halpengguna'));
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
                return redirect()->to(base_url('halpengguna'));
            }
    }

    public function delete($getId)
    {
        $id = htmlentities($getId);
        if ($this->model_crud->deletekode('user', 'id_user', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halpengguna'));

    }

}