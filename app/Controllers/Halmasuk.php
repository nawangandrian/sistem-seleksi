<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\crud;

class Halmasuk extends BaseController
{
    public function __construct()
    {
        //variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();

        //variabel session
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['judul']     = 'Halaman Masuk';
        $data['sub_judul'] = 'Selamat datang di Aplikasi Ci4';
        
        if (empty($this->session->get('id_pengguna'))) {
            
            echo view('hal-masuk', $data);
        } 
    }    

    public function autentifikasi()
    {
        $nama_pengguna = $this->request->getPost('inputan_nama_pengguna');
        $pw_pengguna = $this->request->getPost('inputan_pw_pengguna'); // Ambil kata sandi yang belum di-hash

        // Mencari data pengguna
        $data_pengguna = $this->db->table('user')
                                ->where('username', $nama_pengguna)
                                ->get()
                                ->getRow();

        if (!empty($data_pengguna)) {
            // Verifikasi kata sandi
            if (password_verify($pw_pengguna, $data_pengguna->password)) {
                // Jika kata sandi cocok, simpan data sesi pengguna
                if ($data_pengguna->is_active != 1) {
                    return redirect()->to(base_url('halmasuk'))->with('error', 'Akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin');
                } else {
                    $simpan_session = [
                        'id_user'  => $data_pengguna->id_user,
                        'nama'     => $data_pengguna->nama,
                        'username' => $data_pengguna->username,
                        'email'    => $data_pengguna->email,
                        'no_telp'  => $data_pengguna->no_telp,
                        'role'     => $data_pengguna->role,
                        'foto'     => $data_pengguna->foto,
                        'pw_user'  => $data_pengguna->pw_user,
                    ];

                    // Menyimpan data sesi pengguna
                    $this->session->set($simpan_session);

                    // Redirect ke halaman beranda setelah berhasil login
                    return redirect()->to(base_url('halberanda'))->with('success', 'Selamat! Berhasil masuk ke sistem');
                }
            } else {
                // Jika kata sandi tidak cocok
                return redirect()->to(base_url('halmasuk'))->with('error', 'Kombinasi nama pengguna dan kata sandi tidak cocok');
            }
        } else {
            // Jika data pengguna tidak ditemukan
            return redirect()->to(base_url('halmasuk'))->with('error', 'Nama pengguna tidak ditemukan');
        }
    }

    public function keluar()
    { 
        $this->session->destroy();
        echo '<script>alert("Keluar dari sistem"); window.location = "'.base_url('home').'"</script>';
    }


}
