<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Halc extends BaseController
{
    protected $model_crud;

    public function __construct()
    {
        $this->model_crud = new crudseleksi();
    }

    public function import()
    {
        $file = $this->request->getFile('excelFile');
        $input_data = $this->request->getPost();
        $soal = $input_data['soal_id'];
        $ext = $file->getExtension();

        if ($ext === "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Mulai dari baris kedua karena baris pertama adalah header
        foreach (array_slice($sheetData, 1) as $item) {
            // Ambil data dari kolom kedua, ketiga, keempat, dan kelima
            $pilgan = $item[1];
            $jawaban_benar = $item[2];

            // Simpan data ke tabel pilgan
            $save = $this->model_crud->insertPilgan([
                'soal_id' => $soal,
                'pilgan' => $pilgan,
                'img_pilgan' => '',
                'jawaban_benar' => $jawaban_benar,
            ]);
        }

        if ($save) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menambah Data');
        }

        return redirect()->to(base_url('halpilgan/tampil/'.$soal));
    }

    public function importSoal()
    {
        $file = $this->request->getFile('excelFile');
        $input_data = $this->request->getPost();
        $ujian = $input_data['ujian_id'];
        $tipe_soal = $input_data['tipe_soal'];
        $ext = $file->getExtension();
        
        if ($ext === "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Mulai dari baris kedua karena baris pertama adalah header
        foreach (array_slice($sheetData, 1) as $item) {
            // Ambil data dari kolom kedua, ketiga, keempat, dan kelima
            $soal = $item[1];
            $bobot = $item[2];
            $img_soal = ''; // Anda mungkin perlu mengambil gambar soal dari file Excel jika diperlukan

            // Simpan data ke tabel soal
            $saveSoal = $this->model_crud->insertSoal([
                'ujian_id' => $ujian,
                'soal' => $soal,
                'img_soal' => $img_soal,
                'tipe_soal' => $tipe_soal,
                'bobot_soal' => $bobot,
            ]);

            // Tangkap ID soal yang baru saja disimpan
            $soalId = $saveSoal;

            // Jika tipe soal adalah "Benar Salah"
            if ($tipe_soal == 'Benar Salah') {
                // Ambil jawaban benar dari kolom ketujuh
                $jawaban_benar = $item[3]; // Misalnya, jawaban benar ada di kolom ketujuh

                // Simpan data ke tabel benar salah
                $savePilihan = $this->model_crud->insertBenarSalah([
                    'soal_id' => $soalId, // Gunakan ID soal yang baru saja disimpan
                    'jawaban_benar_salah' => $jawaban_benar,
                ]);
            }

            // Jika tipe soal adalah "Benar Salah"
            if ($tipe_soal == 'Uraian') {
                // Ambil jawaban benar dari kolom ketujuh
                $jawaban_benar = $item[3]; // Misalnya, jawaban benar ada di kolom ketujuh

                // Simpan data ke tabel benar salah
                $savePilihan = $this->model_crud->insertUraian([
                    'soal_id' => $soalId, // Gunakan ID soal yang baru saja disimpan
                    'jawaban_uraian' => $jawaban_benar,
                ]);
            }

            // Jika tipe soal adalah "Pilihan Ganda"
            if ($tipe_soal == 'Pilihan Ganda') {
                // Ambil jawaban dari kolom kedua hingga keenam (asumsi jawaban mulai dari kolom ke-2)
                $jawaban = array_slice($item, 3, 5);

                // Ambil teks jawaban benar dari kolom ketujuh
                $jawaban_benar_teks = $item[8];

                // Tentukan indeks jawaban benar berdasarkan teks jawaban benar
                $jawaban_benar_index = array_search($jawaban_benar_teks, $jawaban);

                // Simpan jawaban ke tabel pilgan
                foreach ($jawaban as $key => $pilihan) {
                    $jawaban_benar = ($key == $jawaban_benar_index) ? 1 : 0;

                    // Simpan data ke tabel pilgan
                    $savePilihan = $this->model_crud->insertPilgan([
                        'soal_id' => $soalId, // Gunakan ID soal yang baru saja disimpan
                        'pilgan' => $pilihan,
                        'img_pilgan' => '', // Anda mungkin perlu mengambil gambar pilihan dari file Excel jika diperlukan
                        'jawaban_benar' => $jawaban_benar,
                    ]);
                }
            }
        }

        if ($saveSoal && $savePilihan) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menambah Data');
        }

        return redirect()->to(base_url('halsoal'));
    }

    public function importPeserta()
    {
        $file = $this->request->getFile('excelFile');
        date_default_timezone_set('Asia/Jakarta');
        $input_data = $this->request->getPost();
        $pelatihan_id = $input_data['pelatihan_id'];
        $role = $input_data['role'];
        $ext = $file->getExtension();

        if ($ext === "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $berhasil = 0;
        $gagal = 0;
        $skipped = 0;

        // Ambil jenis pelatihan dari database
        $pelatihan = $this->model_crud->getWhere('pelatihan', ['id_pelatihan' => $pelatihan_id]);
        $jenis_pelatihan = $pelatihan['jenis_pelatihan']; // 'DBHCHT' atau 'APBN'

        // Mulai dari baris kedua karena baris pertama adalah header
        foreach (array_slice($sheetData, 1) as $item) {
            // Ambil data dari kolom yang sesuai
            $NIP = $item[1];
            $nik = $item[2];
            $nama = $item[3];
            $tgl = $item[4];
            $kota = $item[5];
            $kecamatan = $item[6];
            $telp = $item[7];
            $email = $item[8];
            $password = $item[9];
            $is_active = $item[10];
            $jk = $item[11];
            $desa = $item[12];
            $rw = $item[13];
            $rt = $item[14];
            $status_pekerjaan = $item[15];
            $pelatihan_sebelumnya = $item[16];
            $status_tni_polri_asn = $item[17];

            $foto = 'user.png'; 

            // Cek apakah username atau email sudah ada di database
            $existingUser = $this->model_crud->cekUser($NIP, $email);
            if ($existingUser) {
                $skipped++;
                continue; // Lewati jika user sudah ada
            }

            // Simpan data ke tabel user
            $saveUser = $this->model_crud->insertUser([
                'nama' => $nama,
                'username' => $NIP,           
                'email' => $email,
                'no_telp' => $telp,
                'role' => $role,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => time(),
                'foto' => $foto,
                'is_active' => $is_active,
                'pw_user' => $password,
            ]);

            if (!$saveUser) {
                $gagal++;
                continue; // Jika gagal insert, lanjut ke baris berikutnya
            }

            $userId = $saveUser;

            // Cek syarat kelolosan berdasarkan jenis pelatihan
            $status_peserta = 'Lolos';
            $usia = $this->hitungUsia($tgl);

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
            if ($role == 'peserta') {
                $savePilihan = $this->model_crud->insertPeserta([
                    'user_id'   => $userId, 
                    'nip_peserta'    => $NIP,
                    'pelatihan_id'  => $pelatihan_id,
                    'nik_peserta'    => $nik,
                    'nama_peserta'   => $nama,
                    'tgl_lahir_peserta' => $tgl,
                    'jk_peserta'   => $jk,
                    'kota_peserta' => $kota,
                    'kecamatan_peserta'   => $kecamatan,
                    'desa_peserta'   => $desa,
                    'rw_peserta'   => $rw,
                    'rt_peserta'   => $rt,
                    'no_telp_peserta' => $telp,
                    'email_peserta' => $email,
                    'status_pekerjaan' => $status_pekerjaan,
                    'pelatihan_sebelumnya' => $pelatihan_sebelumnya,
                    'status_tni_polri_asn' => $status_tni_polri_asn,
                    'status_peserta' => $status_peserta,
                ]);

                if (!$savePilihan) {
                    $gagal++;
                    continue;
                }
            }

            $berhasil++;
        }

        // Berikan feedback kepada user
        session()->setFlashdata('success', "Import selesai! $berhasil data berhasil ditambahkan, $skipped data di-skip (karena sudah ada), dan $gagal gagal disimpan.");
        
        return redirect()->to(base_url('halpeserta/peserta/'.$pelatihan_id));
    }

    private function hitungUsia($tgl_lahir)
    {
        $birthDate = new \DateTime($tgl_lahir);
        $today = new \DateTime('today');
        $age = $birthDate->diff($today)->y;
        return $age;
    }

    public function importSoalWawancara()
    {
        $file = $this->request->getFile('excelFile');
        $input_data = $this->request->getPost();
        $pelatihan = $input_data['pelatihan_id'];
        $ext = $file->getExtension();
        
        if ($ext === "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Mulai dari baris kedua karena baris pertama adalah header
        foreach (array_slice($sheetData, 1) as $item) {
            // Ambil data dari kolom kedua, ketiga, keempat, dan kelima
            $soal = $item[1];
            $bobot = $item[2];

            // Simpan data ke tabel pilgan
            $save = $this->model_crud->insertSoalWawancara([
                'pelatihan_id' => $pelatihan,
                'soal_wawancara' => $soal,
                'bobot_soal_wawancara' => $bobot,
            ]);
        }
        if ($save) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menambah Data');
        }
        return redirect()->to(base_url('halsoalwawancara/soal/' . $pelatihan));
    }

    public function importSoal1()
    {
        $file = $this->request->getFile('excelFile');
        $input_data = $this->request->getPost();
        $ujian = $input_data['ujian_id'];
        $tipe_soal = $input_data['tipe_soal'];
        $img_soal = '';
        $ext = $file->getExtension();
        
        if ($ext === "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Mulai dari baris kedua karena baris pertama adalah header
        foreach (array_slice($sheetData, 1) as $item) {
            // Ambil data dari kolom kedua, ketiga, keempat, dan kelima
            $soal = $item[1];

            // Simpan data ke tabel pilgan
            $save = $this->model_crud->insertSoal([
                'ujian_id' => $ujian,
                'soal' => $soal,
                'img_soal' => $img_soal,
                'tipe_soal' => $tipe_soal,
            ]);
        }
        if ($save) {
            session()->setFlashdata('success', 'Selamat! Berhasil Menambah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Menambah Data');
        }
        return redirect()->to(base_url('halsoal'));
    }

    public function addbenarsalah()
    {
        $input_data = $this->request->getPost();
        $jawaban = $input_data['jawaban_benar_salah'];
        $soal_id = $input_data['soal_id'];

        // Simpan data ke tabel benar salah
        $save = $this->model_crud->insertkode('benarsalah', $input_data);

        if ($save) {
            session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Mengubah Data');
        }
        return redirect()->to(base_url('halpilgan/tampil/'.$soal_id));
    }

    public function editbenarsalah($getId)
    {
        $id = $getId; 
        $input_data = $this->request->getPost();
        $jawaban = $input_data['jawaban_benar_salah'];
        $soal_id = $input_data['soal_id'];

        $update = $this->model_crud->updatekode('benarsalah', 'id_benarsalah', $id, $input_data);
            
        if ($update) {
            session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Mengubah Data');
        }
        return redirect()->to(base_url('halpilgan/tampil/'.$soal_id));
    }

    public function adduraian()
    {
        $input_data = $this->request->getPost();
        $jawaban = $input_data['jawaban_uraian'];
        $soal_id = $input_data['soal_id'];

        // Simpan data ke tabel benar salah
        $save = $this->model_crud->insertkode('uraian', $input_data);

        if ($save) {
            session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Mengubah Data');
        }
        return redirect()->to(base_url('halpilgan/tampil/'.$soal_id));
    }

    public function edituraian($getId)
    {
        $id = $getId; 
        $input_data = $this->request->getPost();
        $jawaban = $input_data['jawaban_uraian'];
        $soal_id = $input_data['soal_id'];

        $update = $this->model_crud->updatekode('uraian', 'id_uraian', $id, $input_data);
            
        if ($update) {
            session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
        } else {
            session()->setFlashdata('error', 'Gagal Mengubah Data');
        }
        return redirect()->to(base_url('halpilgan/tampil/'.$soal_id));
    }

}
