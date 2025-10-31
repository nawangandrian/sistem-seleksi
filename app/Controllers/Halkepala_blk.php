<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halkepala_blk extends BaseController
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
        $data['content'] = 'kepala_blk/data';
        $data['judul'] = 'Kepala BLK';
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');

        echo view('_applayout', $data);
    }

    public function detail($id_kepala_blk)
    {  
        $this->_validasiku('edit');
        $data = [
            'content'      => 'kepala_blk/data',
            'judul'        => 'Kepala BLK',
            'kepala_blk'     => $this->model_crud->getKepalaBLK(),
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
        $this->validation->setRule('no_telp', 'Nomor Telepon', 'required');
        $this->validation->setRule('role', 'Role', 'required');

        if ($mode == 'add') {
            $this->validation->setRule('username', 'Username', 'required|is_unique[user.username]|alpha_numeric_punct');
            $this->validation->setRule('email', 'Email', 'required|valid_email|is_unique[user.email]');
            $this->validation->setRule('password', 'Password', 'required|min_length[3]');
            $this->validation->setRule('password2', 'Konfirmasi Password', 'matches[password]');
        } else {
            // Untuk mode edit, Anda perlu mengambil data kepala_blk dari database
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
        return redirect()->to(site_url('halkepala_blk'));
    }

    public function add()
    {
        // Jalankan validasi untuk mode 'add'
        $this->_validasi('add');
        date_default_timezone_set('Asia/Jakarta');

        // Periksa apakah validasi berhasil
        if (!$this->validation->withRequest($this->request)->run()) {
            $data['judul'] = "Kepala BLK";
            $data['content'] = 'kepala_blk/add';
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
                'pw_user'          => $input['password'],
            ];
        
            // Simpan data ke tabel user
            $save = $this->model_crud->insertUser($input_data);
            // Tangkap ID soal yang baru saja disimpan
            $userId = $save;
        
            // Jika role adalah "kepala_blk", simpan data ke tabel kepala_blk
            if ($input['role'] === 'kepala blk') {
                // Siapkan data untuk disimpan ke tabel kepala_blk
                $input_kepala_blk = [
                    'user_id'   => $userId,
                    'nama_kepala_blk'   => $input['nama'],
                    'alamat_kepala_blk'   => $input['alamat_kepala_blk'],
                    'no_telp_kepala_blk'   => $input['no_telp'],
                    'email_kepala_blk'    => $input['email'],
                    'nip_kepala_blk'    => $input['username']
                ];
        
                // Simpan data ke tabel kepala_blk
                $save_kepala_blk = $this->model_crud->insertkode('kepala_blk', $input_kepala_blk);
            }
        
            if ($save && (!$input['role'] === 'kepala blk' || $save_kepala_blk)) {
                session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Menambah Data');
            }
            return redirect()->to(base_url('halkepala_blk'));
        }        
    }

    public function edit($getId)
    {
        $id = htmlentities($getId);
        date_default_timezone_set('Asia/Jakarta');
        $input = $this->request->getPost();
        $id_user = $input['id_user'];
        $id_kepala_blk = $input['id_kepala_blk'];

            $input_data = [
                'nama'          => $input['nama_kepala_blk'],
                'username'      => $input['username'],
                'email'      => $input['email'],
                'no_telp'       => $input['no_telp']
            ];

            $input_kepala_blk = [
                'user_id'   => $id_user,
                'nip_kepala_blk'    => $input['username'],
                'nama_kepala_blk'   => $input['nama_kepala_blk'],
                'alamat_kepala_blk'   => $input['alamat_kepala_blk'],
                'no_telp_kepala_blk'   => $input['no_telp'],
                'email_kepala_blk'   => $input['email']
            ];
    
            // Simpan data ke tabel kepala_blk
            $$update = $this->model_crud->updatekode('kepala_blk', 'id_kepala_blk', $id_kepala_blk, $input_kepala_blk);

            if ($this->model_crud->updateUser($input_data, $id_user)) { // Anda perlu membuat metode updateUser di model
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
                return redirect()->to(base_url('halkepala_blk'));
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
                return redirect()->to(base_url('halkepala_blk'));
            }
    }

    public function delete($getId)
    {
        $id = htmlentities($getId);
        $kepala_blk = $this->model_crud->detailkode('kepala_blk', 'id_kepala_blk', $id);
        $nip = $kepala_blk->nip_kepala_blk;
        $delete = $this->model_crud->deletekode('user', 'username', $nip);
        if ($this->model_crud->deletekode('kepala_blk', 'id_kepala_blk', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halkepala_blk'));

    }

}