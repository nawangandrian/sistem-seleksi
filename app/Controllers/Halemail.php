<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\crudseleksi;

class Halemail extends BaseController
{
    protected $db;
    protected $model_crud;
    protected $validation;
    protected $email;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->model_crud = new crudseleksi();
        $this->validation = \Config\Services::validation();
        $this->email = \Config\Services::email();
        $this->session = \Config\Services::session();
    }

    public function kirimNotifikasi() 
    {
        setlocale(LC_TIME, 'id_ID.UTF-8'); 
        $request = service('request');
        $pelatihan_id = $request->getPost('pelatihan_id');

        // Ambil daftar peserta berdasarkan pelatihan
        $pesertaList = $this->model_crud->getPesertaByPelatihan($pelatihan_id);

        // Ambil ujian terkait pelatihan
        $ujian = $this->model_crud->getUjianPelatihan($pelatihan_id);

        if (!$ujian) {
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => 'Ujian tidak ditemukan'
            ]);
        }

        $emailConfig = config('Email'); // Ambil konfigurasi email dari Email.php

        foreach ($pesertaList as $peserta) {
            // Ambil data user berdasarkan ID peserta
            $user = $this->model_crud->getUserById($peserta['user_id']);

            if ($user) {
                $this->email->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
                $this->email->setTo($peserta['email_peserta']);
                $this->email->setSubject('=?UTF-8?B?' . base64_encode('Jadwal Tes Seleksi Pelatihan') . '?=');

                // **Buat token login sekali pakai**
                $token = bin2hex(random_bytes(32)); // Token acak 64 karakter
                $token_hash = hash('sha256', $token); // Hash token untuk keamanan
                $this->db->table('user')->where('id_user', $user['id_user'])->update(['login_token' => $token_hash]);

                // **Tautan login langsung**
                $login_url = base_url("http://localhost/ci-seleksi/halemail/autologin?token={$token}&id={$user['id_user']}");
                $currentYear = date("Y");
                // Format email dengan HTML & CSS modern
                $message = '
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                        .container { max-width: 600px; background: #ffffff; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); margin: auto; }
                        h2 { color: #333333; text-align: center; }
                        p { color: #555555; line-height: 1.6; }
                        .info-box { background: #f9f9f9; padding: 15px; border-radius: 6px; margin-bottom: 20px; }
                        ul { padding: 0; list-style: none; }
                        ul li { background: #eeeeee; padding: 10px; margin: 5px 0; border-radius: 4px; }
                        .button {display: block;text-align: center;background:rgb(36, 142, 255);padding: 12px;border-radius: 6px;text-decoration: none;font-size: 16px;font-weight: bold;margin-top: 20px;border: none;}
                        .button:hover {background-color: #0056b3;  /* Efek hover, jika diinginkan */}
                        .footer { text-align: center; font-size: 12px; color: #888888; margin-top: 20px; }
                        .card { max-width: 600px; background: #ffffff; padding: 20px; border: 1px solid #ddd;border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); margin: auto;  }
                        .card-header { font-size: 18px; font-weight: bold; color: #333; }
                        .card-body { color: #555; }
                        .logo { 
                            display: block; 
                            margin: 0 auto; 
                            width: 100px; 
                            height: 100px; 
                            border-radius: 50%; 
                            object-fit: contain; 
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="card">
                        <div class="card-body">
                        <img src="https://drive.google.com/uc?export=view&id=1ut49XU1DGP-Cx-IqQzrPkmTeNHLlGWef" alt="Logo BLK" class="logo">
                        <h2>Jadwal Tes Seleksi Pelatihan</h2>
                        <p>Halo, <b>' . $peserta['nama_peserta'] . '</b>,</p>
                        <p>Anda terdaftar dalam tes seleksi pelatihan <b>' . $ujian['nama_ujian'] . '</b>.</p>
                        
                        <div class="card">
                            <div class="card-header">Jadwal Tes Pengetahuan</div>
                            <div class="card-body">
                                <ul>
                                    <li><b>Tanggal Mulai:</b> ' . strftime('%d %B %Y Pukul %H:%M', strtotime($ujian['tgl_mulai'])) . '</li>
                                    <li><b>Tanggal Selesai:</b> ' . strftime('%d %B %Y Pukul %H:%M', strtotime($ujian['tgl_selesai'])) . '</li>
                                    <li><b>Durasi:</b> ' . $ujian['waktu'] . ' Menit</li>
                                </ul>
                            </div>
                        </div>

                        <p><b>Jadwal Tes Wawancara:</b><br> 
                        Tes Wawancara dilaksanakan melalui panggilan video Whatsapp pada hari yang sama dengan Tes Pengetahuan.</b></p>

                        <div class="info-box">
                            <p><b>Silakan login dengan akun Anda:</b></p>
                            <ul>
                                <li><b>Username:</b> ' . $user['username'] . '</li>
                                <li><b>Password:</b> ' . $user['pw_user'] . '</li>
                            </ul>
                        </div>

                        <p>Silakan klik tombol di bawah untuk login langsung ke sistem:</p>
                        <a href="' . $login_url . '" class="button" style="color:rgb(255, 255, 255);">Login Sekarang</a>

                        <p class="footer">Jika ada pertanyaan, silakan hubungi kami.<br>&copy; ' . $currentYear . ' BLK Kudus</p>
                        </div>
                        </div>
                    </div>
                </body>
                </html>';

                $this->email->setMessage($message);
                $this->email->setMailType('html');

                // Kirim email
                if (!$this->email->send()) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => $this->email->printDebugger(['headers', 'body'])
                    ]);
                }
            }
        }

        return $this->response->setJSON([
            'status' => 'success', 
            'message' => 'Email berhasil dikirim ke peserta.'
        ]);    

        // Setelah email terkirim, simpan flashdata dan arahkan ke halaman ujian
        session()->setFlashdata('success', 'Email berhasil dikirim ke peserta.');
        return redirect()->to(base_url('halujian'));
    }

    public function autologin()
    {
        $token = $this->request->getGet('token');
        $id_user = $this->request->getGet('id');

        if (!$token || !$id_user) {
            return redirect()->to(base_url('halmasuk'))->with('error', 'Token tidak valid atau sah.');
        }

        // Ambil data user berdasarkan ID
        $user = $this->db->table('user')->where('id_user', $id_user)->get()->getRow();

        if (!$user) {
            return redirect()->to(base_url('halmasuk'))->with('error', 'Akun tidak ditemukan.');
        }

        // **Verifikasi token (tidak perlu kadaluarsa)**
        if (hash('sha256', $token) !== $user->login_token) {
            return redirect()->to(base_url('halmasuk'))->with('error', 'Token tidak valid.');
        }

        // **Hapus token setelah login agar tidak bisa digunakan ulang**
        //$this->db->table('user')->where('id_user', $id_user)->update(['login_token' => null]);

        // **Set sesi login pengguna**
        $simpan_session = [
            'id_user'  => $user->id_user,
            'nama'     => $user->nama,
            'username' => $user->username,
            'email'    => $user->email,
            'no_telp'  => $user->no_telp,
            'role'     => $user->role,
            'foto'     => $user->foto,
            'pw_user'     => $user->pw_user,
        ];

        $this->session->set($simpan_session);

        // **Arahkan ke halaman dashboard**
        return redirect()->to(base_url('halberanda'))->with('success', 'Login berhasil!');
    }

    public function kirimHasilSeleksi()
    {
        $request = service('request');
        $pelatihan_id = $request->getPost('pelatihan_id');

        // Ambil daftar peserta berdasarkan pelatihan
        $pesertaList = $this->model_crud->getPesertaByPelatihan($pelatihan_id);

        // Ambil data hasil seleksi berdasarkan pelatihan
        $hasilSeleksiList = $this->model_crud->getHasilSeleksiByPelatihan($pelatihan_id);

        $emailConfig = config('Email'); // Ambil konfigurasi email dari Email.php

        foreach ($pesertaList as $peserta) {
            // Ambil data hasil seleksi per peserta
            $hasilSeleksi = $this->model_crud->getHasilSeleksiByPeserta($pelatihan_id, $peserta['id_peserta']);

            if (empty($hasilSeleksi)) {
                // Jika kosong, kembalikan response error
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Hasil seleksi tidak ditemukan untuk peserta ' . $peserta['nama_peserta']
                ]);
            }

            $pdfFilePath = FCPATH . 'uploads/' . $hasilSeleksi['daftar_hasil_seleksi'];

            if (!file_exists($pdfFilePath)) {
                log_message('error', 'File PDF tidak ditemukan untuk peserta ' . $peserta['nama_peserta']);
                continue;
            }
            
            if ($hasilSeleksi) {
                // Pengaturan email
                $this->email->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
                $this->email->setTo($peserta['email_peserta']);
                $this->email->setSubject('Hasil Seleksi Pelatihan');
                $currentYear = date("Y");
                $message = '
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                        .card { 
                            max-width: 600px; 
                            background: #ffffff; 
                            padding: 20px; 
                            border: 1px solid #ddd;
                            border-radius: 8px; 
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
                            margin: auto; 
                        }
                        h2 { color: #333333; text-align: center; }
                        p { color: #555555; line-height: 1.6; }
                        .footer { text-align: center; font-size: 12px; color: #888888; margin-top: 20px; }
                        .info-box { background: #f9f9f9; padding: 15px; border-radius: 6px; margin-bottom: 20px; }
                        .uliner { padding: 0; list-style: none; }
                        .liner { background: #eeeeee; padding: 10px; margin: 5px 0; border-radius: 4px; }
                        .logo { 
                            display: block; 
                            margin: 0 auto; 
                            width: 100px; 
                            height: 100px; 
                            border-radius: 50%; 
                            object-fit: contain; 
                        }
                    </style>
                </head>
                <body>
                    <div class="card">
                        <img src="https://drive.google.com/uc?export=view&id=1ut49XU1DGP-Cx-IqQzrPkmTeNHLlGWef" alt="Logo BLK" class="logo">
                        <h2>Hasil Seleksi Pelatihan</h2>
                        <p>Halo, <b>' . $peserta['nama_peserta'] . '</b>,</p>
                        <p>Berikut adalah hasil seleksi Anda untuk pelatihan <b>' . $hasilSeleksi['nama_pelatihan'] . '</b>:</p>
                        <div class="info-box">
                            <ul class="uliner">
                                <li class="liner"><b>Nilai Tes Pengetahuan:</b> ' . $hasilSeleksi['pengetahuan_hasil'] . '</li>
                                <li class="liner"><b>Nilai Tes Wawancara:</b> ' . $hasilSeleksi['wawancara_hasil'] . '</li>
                                <li class="liner"><b>Hasil Seleksi:</b> ' . $hasilSeleksi['hasil_tes_seleksi'] . '</li>
                            </ul>
                        </div>
                        <p>Calon Peserta yang Lolos diharuskan datang sendiri untuk melakukan DAFTAR ULANG dengan membawa berkas administrasi:</p>
                        <ul>
                            <li><b>Copy KTP sebanyak 4 lembar</b></li>
                            <li><b>Pas Foto ukuran 3 x 4 background merah sebanyak 4 lembar</b></li>
                            <li><b>Fotokopi KTP sebanyak 1 lembar (kertas F4)</b></li>
                            <li><b>Fotokopi Kartu Keluarga sebanyak 1 lembar (kertas F4)</b></li>
                            <li><b>Materai 10000 sebanyak 1 lembar</b></li>
                            <li><b>(Berkas Dokumen dimasukkan ke dalam Stopmap Kertas Warna Bebas)</b></li>
                        </ul>
                        <p>Untuk info selengkapnya dapat dilihat pada file hasil seleksi yang telah dilampirkan dalam email ini.</p>
                        <p>Terima kasih atas partisipasi Anda dalam seleksi ini.</p>
                        <p class="footer">Jika ada pertanyaan, silakan hubungi kami.<br>&copy; ' . $currentYear . ' BLK Kudus</p>
                    </div>
                </body>
                </html>';

                $this->email->setMessage($message);
                $this->email->setMailType('html');

                $this->email->attach($pdfFilePath);

                // Kirim email
                if (!$this->email->send()) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Terjadi kesalahan dalam mengirim email ke ' . $peserta['nama_peserta']
                    ]);
                }
            }
        }
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Email berhasil dikirim ke semua peserta.'
        ]);
  
    }

    public function kirimSeleksiAdministratif()
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
        $request = service('request');
        $pelatihan_id = $request->getPost('pelatihan_id');

        // Ambil daftar peserta yang tidak lolos administratif berdasarkan pelatihan
        $pesertaList = $this->model_crud->getPesertaTidakLolosAdministratif($pelatihan_id);

        if (empty($pesertaList)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tidak ada peserta yang tidak lolos administratif.'
            ]);
        }

        $emailConfig = config('Email'); // Ambil konfigurasi email dari Email.php

        foreach ($pesertaList as $peserta) {
            $user = $this->model_crud->getUserById($peserta['user_id']);
            if ($user) {
                $this->email->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
                $this->email->setTo($peserta['email_peserta']);
                $this->email->setSubject('Pemberitahuan Hasil Seleksi Administratif');

                $currentYear = date('Y');

                $message = '
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                        .container { max-width: 600px; background: #ffffff; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); margin: auto; }
                        h2 { color: #d9534f; text-align: center; }
                        p { color: #555555; line-height: 1.6; }
                        .info-box { background: #f9f9f9; padding: 15px; border-radius: 6px; margin-bottom: 20px; }
                        .footer { text-align: center; font-size: 12px; color: #888888; margin-top: 20px; }
                        .card { background: #ffffff; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); margin: auto; }
                        .card-header { font-size: 18px; font-weight: bold; color: #d9534f; text-align: center; }
                        .card-body { color: #555; }
                        .logo { 
                            display: block; 
                            margin: 0 auto; 
                            width: 100px; 
                            height: 100px; 
                            border-radius: 50%; 
                            object-fit: contain; 
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://drive.google.com/uc?export=view&id=1ut49XU1DGP-Cx-IqQzrPkmTeNHLlGWef" alt="Logo BLK" class="logo">
                                <h2>Hasil Seleksi Administratif</h2>
                                <p>Halo, <b>' . $peserta['nama_peserta'] . '</b>,</p>
                                <p>Terima kasih telah mendaftar pelatihan kami. Setelah melalui proses seleksi administratif, kami informasikan bahwa Anda <b>belum memenuhi persyaratan administratif</b> untuk mengikuti pelatihan yang Anda pilih.</p>
                                
                                <div class="info-box">
                                    <p><b>Detail Pendaftaran:</b></p>
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 30%; padding: 5px 0;"><b>Nama</b></td>
                                            <td style="width: 5%;">:</td>
                                            <td style="padding: 5px 0;">' . $peserta['nama_peserta'] . '</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 0;"><b>Email</b></td>
                                            <td>:</td>
                                            <td style="padding: 5px 0;">' . $peserta['email_peserta'] . '</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 0;"><b>Pelatihan</b></td>
                                            <td>:</td>
                                            <td style="padding: 5px 0;">' . $peserta['nama_pelatihan'] . ' - ' . $peserta['jenis_pelatihan'] . '</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 0;"><b>Status</b></td>
                                            <td>:</td>
                                            <td style="padding: 5px 0;">Tidak Lolos Administratif</td>
                                        </tr>
                                    </table>
                                </div>

                                <p>Jangan berkecil hati, Anda dapat mengikuti kesempatan pendaftaran pelatihan kami di periode berikutnya.</p>

                                <p><b>Tips untuk pendaftaran selanjutnya:</b></p>
                                <ul>
                                    <li>Pastikan semua dokumen persyaratan diunggah lengkap dan valid.</li>
                                    <li>Periksa kembali kriteria persyaratan sebelum mendaftar.</li>
                                </ul>

                                <p>Semangat terus dalam mengembangkan diri Anda!</p>

                                <p class="footer">Jika ada pertanyaan, silakan hubungi kami.<br>&copy; ' . $currentYear . ' BLK Kudus</p>
                            </div>
                        </div>
                    </div>
                </body>
                </html>';

                $this->email->setMessage($message);
                $this->email->setMailType('html');

                if (!$this->email->send()) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => $this->email->printDebugger(['headers', 'body'])
                    ]);
                }
            }
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Email pemberitahuan berhasil dikirim ke peserta yang tidak lolos.'
        ]);
    }


}
