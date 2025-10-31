<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halpeserta extends BaseController
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
        $data['content'] = 'peserta/data';
        $data['judul'] = 'Peserta';
        $data['sub_judul'] = 'Selamat datang di halaman peserta';
        //$data['pelatihan'] = $this->model_crud->getAll('pelatihan');
        $data['pelatihan'] = $this->model_crud->getPelatihanDenganJumlahPeserta();

        echo view('_applayout', $data);
    }

    public function peserta($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Per Pelatihan';
        $data['content'] = 'peserta/peserta';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['peserta'] = $this->model_crud->getPesertaPelatihan($id);
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');

        echo view('_applayout', $data);
    }

    public function index1()
    {
        $data['content'] = 'peserta/data';
        $data['judul'] = 'Peserta';
        $data['sub_judul'] = 'Selamat datang di halaman peserta';
        $data['peserta'] = $this->model_crud->getPeserta2();
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');

        echo view('_applayout', $data);
    }

    public function detail($id_peserta)
    {  
        $this->_validasiku('edit');
        $data = [
            'content'      => 'peserta/data',
            'judul'        => 'Peserta',
            'sub_judul'    => 'Selamat datang di halaman peserta',
            'peserta'     => $this->model_crud->getPeserta(),
            'pelatihan' => $this->model_crud->getAll('pelatihan'),
            //'pesertaa'        => $this->model_crud->getPeserta1('id_peserta')
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
            // Untuk mode edit, Anda perlu mengambil data peserta dari database
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
        return redirect()->to(site_url('halpeserta'));
    }

    public function add()
    {
        // Jalankan validasi untuk mode 'add'
        $this->_validasi('add');
        date_default_timezone_set('Asia/Jakarta');

        // Periksa apakah validasi berhasil
        if (!$this->validation->withRequest($this->request)->run()) {
            $data['judul'] = "Peserta";
            $data['content'] = 'peserta/add';
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

            $status_peserta = 'Lolos';
            $usia = $this->hitungUsia($input['tgl_lahir_peserta']);
            $kota = $input['kota_peserta'];
            $pelatihan_sebelumnya = $input['pelatihan_sebelumnya'];
            $status_tni_polri_asn = $input['status_tni_polri_asn'];
            $status_pekerjaan = $input['status_pekerjaan'];

            $pelatihan = $this->model_crud->getWhere('pelatihan', ['id_pelatihan' => $input['pelatihan_id']]);
            $jenis_pelatihan = $pelatihan['jenis_pelatihan'];

            if ($jenis_pelatihan == 'DBHCHT') {
                if ($kota != 'Kudus' || $pelatihan_sebelumnya != 'Belum' || $status_tni_polri_asn != 'Bukan' || $usia < 17) {
                    $status_peserta = 'Tidak Lolos Administrasi';
                }
            } elseif ($jenis_pelatihan == 'APBN') {
                if ($status_pekerjaan != 'Tidak Bekerja' || $usia < 17) {
                    $status_peserta = 'Tidak Lolos Administrasi';
                }
            }
        
            // Jika role adalah "peserta", simpan data ke tabel peserta
            if ($input['role'] === 'peserta') {
                
                // Siapkan data untuk disimpan ke tabel peserta
                $input_peserta = [
                    'user_id'   => $userId,
                    'nik_peserta'    => $input['nik_peserta'],
                    'nama_peserta'   => $input['nama'],
                    'tgl_lahir_peserta'    => $input['tgl_lahir_peserta'],
                    'jk_peserta'   => $input['jk'],
                    'kota_peserta' => $input['kota_peserta'],
                    'kecamatan_peserta'   => $input['kecamatan'],
                    'desa_peserta'   => $input['desa'],
                    'rw_peserta'   => $input['rw'],
                    'rt_peserta'   => $input['rt'],
                    'no_telp_peserta'   => $input['no_telp'],
                    'email_peserta'   => $input['email'],
                    'nip_peserta'    => $input['username'],
                    'pelatihan_id'  => $input['pelatihan_id'],
                    'status_pekerjaan' => $input['status_pekerjaan'],
                    'pelatihan_sebelumnya' => $input['pelatihan_sebelumnya'],
                    'status_tni_polri_asn' => $input['status_tni_polri_asn'],
                    'status_peserta' => $status_peserta
                ];
        
                // Simpan data ke tabel peserta
                $save_peserta = $this->model_crud->insertkode('peserta', $input_peserta);
            }
        
            if ($save && ($input['role'] !== 'peserta' || $save_peserta)) {
                session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Menambah Data');
            }
            return redirect()->to(base_url('halpeserta'));
        }        
    }

    private function hitungUsia($tgl_lahir)
    {
        $birthDate = new \DateTime($tgl_lahir);
        $today = new \DateTime('today');
        $age = $birthDate->diff($today)->y;
        return $age;
    }

    public function edit($getId)
    {
        $id = htmlentities($getId);
        date_default_timezone_set('Asia/Jakarta');
        $input = $this->request->getPost();
        $id_user = $input['id_user'];

            $status_peserta = 'Lolos';
            $usia = $this->hitungUsia($input['tgl_lahir_peserta']);
            $kota = $input['kota_peserta'];
            $pelatihan_sebelumnya = $input['pelatihan_sebelumnya'];
            $status_tni_polri_asn = $input['status_tni_polri_asn'];
            $status_pekerjaan = $input['status_pekerjaan'];

            $pelatihan = $this->model_crud->getWhere('pelatihan', ['id_pelatihan' => $input['pelatihan_id']]);
            $jenis_pelatihan = $pelatihan['jenis_pelatihan'];

            if ($jenis_pelatihan == 'DBHCHT') {
                if ($kota != 'Kudus' || $pelatihan_sebelumnya != 'Belum' || $status_tni_polri_asn != 'Bukan' || $usia < 17) {
                    $status_peserta = 'Tidak Lolos Administrasi';
                }
            } elseif ($jenis_pelatihan == 'APBN') {
                if ($status_pekerjaan != 'Tidak Bekerja' || $usia < 17) {
                    $status_peserta = 'Tidak Lolos Administrasi';
                }
            }

            $input_data = [
                'nama'          => $input['nama_peserta'],
                'username'      => $input['username'],
                'email'      => $input['email'],
                'no_telp'       => $input['no_telp']
            ];

            $input_peserta = [
                'user_id'   => $id_user,
                'nik_peserta'    => $input['nik_peserta'],
                'nama_peserta'   => $input['nama_peserta'],
                'tgl_lahir_peserta'    => $input['tgl_lahir_peserta'],
                'jk_peserta'   => $input['jk'],
                'kota_peserta' => $input['kota_peserta'],
                'kecamatan_peserta'   => $input['kecamatan'],
                'desa_peserta'   => $input['desa'],
                'rw_peserta'   => $input['rw'],
                'rt_peserta'   => $input['rt'],
                'no_telp_peserta'   => $input['no_telp'],
                'email_peserta'   => $input['email'],
                'nip_peserta'    => $input['username'],
                'pelatihan_id'  => $input['pelatihan_id'],
                'status_pekerjaan' => $input['status_pekerjaan'],
                'pelatihan_sebelumnya' => $input['pelatihan_sebelumnya'],
                'status_tni_polri_asn' => $input['status_tni_polri_asn'],
                'status_peserta' => $status_peserta
            ];
    
            // Simpan data ke tabel peserta
            $update = $this->model_crud->updatekode('peserta', 'id_peserta', $id, $input_peserta);

            if ($this->model_crud->updateUser($input_data, $id_user)) { // Anda perlu membuat metode updateUser di model
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
                return redirect()->to(base_url('halpeserta'));
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
                return redirect()->to(base_url('halpeserta'));
            }
    }

    public function delete($getId, $getPelatihan)
    {
        $id = htmlentities($getId);
        $peserta = $this->model_crud->detailkode('peserta', 'id_peserta', $id);
        $nip = $peserta->nip_peserta;
        $delete = $this->model_crud->deletekode('user', 'username', $nip);
        if ($this->model_crud->deletekode('peserta', 'id_peserta', $id)) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menghapus Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('halpeserta/peserta/' . $getPelatihan));

    }

}