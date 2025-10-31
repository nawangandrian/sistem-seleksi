<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Halseleksi extends BaseController
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
        $data['content'] = 'hasil_seleksi/data';
        $data['judul'] = 'Seleksi';
        $data['pelatihan'] = $this->model_crud->getAll('pelatihan');

        echo view('_applayout', $data);
    }

    public function uploadHasilSeleksi()
    {
        $pelatihan_id = $this->request->getPost('id_pelatihan');
        $file = $this->request->getFile('file_pdf');
        $data['content'] = 'hasil_seleksi/peserta';

        if ($file->isValid() && !$file->hasMoved()) {
            // Cek apakah sudah ada file hasil seleksi sebelumnya
            $pelatihan = $this->model_crud->getPelatihanById($pelatihan_id);
            if ($pelatihan && !empty($pelatihan['daftar_hasil_seleksi'])) {
                $oldFile = FCPATH . 'uploads/' . $pelatihan['daftar_hasil_seleksi'];
                if (file_exists($oldFile)) {
                    unlink($oldFile); // Hapus file lama
                }
            }

            // Simpan file PDF baru ke dalam folder public/uploads
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);

            // Update hanya kolom daftar_hasil_seleksi di tabel pelatihan
            $update = $this->model_crud->updatePelatihan('pelatihan', 'id_pelatihan', $pelatihan_id, ['daftar_hasil_seleksi' => $newName]);

            if ($update) {
                session()->setFlashdata('success', 'Selamat! Berhasil Mengubah Data');
            } else {
                session()->setFlashdata('error', 'Gagal Mengubah Data');
            }

            return redirect()->to(base_url('Halseleksi/peserta/' . $pelatihan_id));
        } else {
            session()->setFlashdata('error', 'File tidak valid atau gagal diunggah.');
            return redirect()->to(base_url('Halseleksi/peserta/' . $pelatihan_id));
        }
    }

    public function deleteHasilSeleksi($pelatihan_id)
    {
        // Cek apakah ada file yang tersimpan
        $pelatihan = $this->model_crud->getPelatihanById($pelatihan_id);
        if ($pelatihan && !empty($pelatihan['daftar_hasil_seleksi'])) {
            $filePath = FCPATH . 'uploads/' . $pelatihan['daftar_hasil_seleksi'];
            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file dari folder uploads
            }

            // Kosongkan kolom daftar_hasil_seleksi
            $this->model_crud->updatePelatihan('pelatihan', 'id_pelatihan', $pelatihan_id, ['daftar_hasil_seleksi' => null]);

            session()->setFlashdata('success', 'File PDF berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'File tidak ditemukan.');
        }

        return redirect()->to(base_url('Halseleksi/peserta/' . $pelatihan_id));
    }

    public function peserta1($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/peserta';
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);
        
        // Simpan atau perbarui data ke tabel hasil_seleksi
        foreach ($data['pelatihan'] as $key => &$peserta) {
            $pengetahuan_hasil = isset($peserta['pengetahuan_hasil']) ? $peserta['pengetahuan_hasil'] : 0;
            $wawancara_hasil = isset($peserta['wawancara_hasil']) ? $peserta['wawancara_hasil'] : 0;
            $hasil_total_seleksi = ($pengetahuan_hasil + $wawancara_hasil) / 2;

            // Tentukan kelulusan
            $peserta['hasil_tes_seleksi'] = ($key < 16) ? 'Lolos' : 'Tidak Lolos';

            // Simpan atau perbarui ke tabel hasil_seleksi
            $this->model_crud->simpanHasilSeleksi([
                'pelatihan_id' => $id,
                'peserta_id' => $peserta['id_peserta'],
                'pengetahuan_hasil_id' => $peserta['id_hasil_pengetahuan'],
                'wawancara_hasil_id' => $peserta['id_hasil_wawancara'],
                'hasil_total_seleksi' => $hasil_total_seleksi,
                'hasil_tes_seleksi' => $peserta['hasil_tes_seleksi']
            ]);
        }

        echo view('_applayout', $data);
    }

    public function peserta2($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/peserta';
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);

        // Ambil jumlah peserta yang akan lolos dari tabel pelatihan
        $pelatihanData = $this->model_crud->getPelatihanById($id);
        $jumlah_peserta_lolos = isset($pelatihanData['jumlah_peserta']) ? (int) $pelatihanData['jumlah_peserta'] : 16;

        // Ambil nilai maksimum dari masing-masing kriteria untuk normalisasi
        $max_pengetahuan = max(array_column($data['pelatihan'], 'pengetahuan_hasil'));
        $max_wawancara = max(array_column($data['pelatihan'], 'wawancara_hasil'));

        // Bobot untuk masing-masing kriteria
        $bobot_pengetahuan = 0.5;
        $bobot_wawancara = 0.5;

        // Simpan atau perbarui data ke tabel hasil_seleksi
        foreach ($data['pelatihan'] as &$peserta) {
            $pengetahuan_hasil = isset($peserta['pengetahuan_hasil']) ? $peserta['pengetahuan_hasil'] : 0;
            $wawancara_hasil = isset($peserta['wawancara_hasil']) ? $peserta['wawancara_hasil'] : 0;

            // Normalisasi data
            $normalisasi_pengetahuan = ($max_pengetahuan > 0) ? $pengetahuan_hasil / $max_pengetahuan : 0;
            $normalisasi_wawancara = ($max_wawancara > 0) ? $wawancara_hasil / $max_wawancara : 0;

            // Hitung skor akhir berdasarkan metode SAW
            $hasil_total_seleksi = ($normalisasi_pengetahuan * $bobot_pengetahuan) + ($normalisasi_wawancara * $bobot_wawancara);

            // Tentukan kelulusan berdasarkan peringkat tertinggi
            $peserta['hasil_total_seleksi'] = $hasil_total_seleksi;
        }

        // Urutkan peserta berdasarkan skor seleksi tertinggi
        usort($data['pelatihan'], function ($a, $b) {
            return $b['hasil_total_seleksi'] <=> $a['hasil_total_seleksi'];
        });   

        // Tetapkan 16 peserta dengan skor tertinggi sebagai "Lolos", sisanya "Tidak Lolos"
        foreach ($data['pelatihan'] as $key => &$peserta) {
            $peserta['hasil_tes_seleksi'] = ($key < $jumlah_peserta_lolos) ? 'Lolos' : 'Tidak Lolos';

            // Simpan atau perbarui ke tabel hasil_seleksi
            $this->model_crud->simpanHasilSeleksi([
                'pelatihan_id' => $id,
                'peserta_id' => $peserta['id_peserta'],
                'pengetahuan_hasil_id' => $peserta['id_hasil_pengetahuan'],
                'wawancara_hasil_id' => $peserta['id_hasil_wawancara'],
                'hasil_total_seleksi' => $peserta['hasil_total_seleksi'],
                'hasil_tes_seleksi' => $peserta['hasil_tes_seleksi']
            ]);
        }

        echo view('_applayout', $data);
    }

    public function peserta_ahp_saw($IdPelatihan)
    {
        $id = $IdPelatihan;
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/peserta_ahp_saw';
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);

        $pelatihanData = $this->model_crud->getPelatihanById($id);
        $jumlah_peserta_lolos = isset($pelatihanData['jumlah_peserta']) ? (int) $pelatihanData['jumlah_peserta'] : 16;
        $jenis_pelatihan = isset($pelatihanData['jenis_pelatihan']) ? $pelatihanData['jenis_pelatihan'] : 'APBN';
        $data['jenis_pelatihan'] = $jenis_pelatihan;

        // --- 1. Hitung BOBOT AHP Secara Otomatis ---
        if ($jenis_pelatihan == 'DBHCHT') {
            $matrix = [
                [1, 1, 3, 3],   // Pengetahuan
                [1, 1, 3, 3],   // Wawancara
                [1/3, 1/3, 1, 1], // Usia
                [1/3, 1/3, 1, 1], // Status Pekerjaan
            ];
        } else { // APBN
            $matrix = [
                [1, 1, 3],    // Pengetahuan
                [1, 1, 3],    // Wawancara
                [1/3, 1/3, 1], // Usia
            ];
        }

        // Normalisasi matriks
        $jumlahKolom = array_fill(0, count($matrix[0]), 0);
        foreach ($matrix as $baris) {
            foreach ($baris as $j => $nilai) {
                $jumlahKolom[$j] += $nilai;
            }
        }

        $normalisasi = [];
        foreach ($matrix as $i => $baris) {
            foreach ($baris as $j => $nilai) {
                $normalisasi[$i][$j] = $nilai / $jumlahKolom[$j];
            }
        }

        // Hitung bobot AHP
        $bobot = [];
        foreach ($normalisasi as $i => $baris) {
            $bobot[$i] = array_sum($baris) / count($baris);
        }

        // Map bobot
        if ($jenis_pelatihan == 'DBHCHT') {
            $bobot_pengetahuan = $bobot[0];
            $bobot_wawancara = $bobot[1];
            $bobot_usia = $bobot[2];
            $bobot_status = $bobot[3];
        } else {
            $bobot_pengetahuan = $bobot[0];
            $bobot_wawancara = $bobot[1];
            $bobot_usia = $bobot[2];
            $bobot_status = 0; 
        }
        // --- Akhir Hitung BOBOT AHP ---

        // --- 2. Proses Seleksi Peserta seperti biasa ---
        $max_pengetahuan = max(array_column($data['pelatihan'], 'pengetahuan_hasil'));
        $max_wawancara = max(array_column($data['pelatihan'], 'wawancara_hasil'));

        $list_nilai_usia = [];
        $list_nilai_status = [];

        foreach ($data['pelatihan'] as &$peserta) {
            $tgl_lahir_peserta = isset($peserta['tgl_lahir_peserta']) ? $peserta['tgl_lahir_peserta'] : null;
            $status_pekerjaan = isset($peserta['status_pekerjaan']) ? $peserta['status_pekerjaan'] : '';

            $usia = ($tgl_lahir_peserta) ? $this->hitungUsia($tgl_lahir_peserta) : 0;

            if ($usia >= 17 && $usia <= 25) {
                $nilai_usia = 3;
            } elseif ($usia >= 26 && $usia <= 35) {
                $nilai_usia = 2;
            } else {
                $nilai_usia = 1;
            }
            $list_nilai_usia[] = $nilai_usia;

            $nilai_status_pekerjaan = 1;
            if ($jenis_pelatihan == 'DBHCHT') {
                switch ($status_pekerjaan) {
                    case 'PHK':
                        $nilai_status_pekerjaan = 2;
                        break;
                    case 'Tidak Bekerja':
                        $nilai_status_pekerjaan = 3;
                        break;
                    default:
                        $nilai_status_pekerjaan = 1;
                }
                $list_nilai_status[] = $nilai_status_pekerjaan;
            }
        }
        unset($peserta);

        $max_nilai_usia = !empty($list_nilai_usia) ? max($list_nilai_usia) : 1;
        $max_nilai_status = !empty($list_nilai_status) ? max($list_nilai_status) : 1;

        foreach ($data['pelatihan'] as &$peserta) {
            $pengetahuan_hasil = isset($peserta['pengetahuan_hasil']) ? $peserta['pengetahuan_hasil'] : 0;
            $wawancara_hasil = isset($peserta['wawancara_hasil']) ? $peserta['wawancara_hasil'] : 0;
            $tgl_lahir_peserta = isset($peserta['tgl_lahir_peserta']) ? $peserta['tgl_lahir_peserta'] : null;
            $status_pekerjaan = isset($peserta['status_pekerjaan']) ? $peserta['status_pekerjaan'] : '';

            $usia = ($tgl_lahir_peserta) ? $this->hitungUsia($tgl_lahir_peserta) : 0;

            $normalisasi_pengetahuan = ($max_pengetahuan > 0) ? $pengetahuan_hasil / $max_pengetahuan : 0;
            $normalisasi_wawancara = ($max_wawancara > 0) ? $wawancara_hasil / $max_wawancara : 0;

            if ($usia >= 17 && $usia <= 25) {
                $nilai_usia = 3;
            } elseif ($usia >= 26 && $usia <= 35) {
                $nilai_usia = 2;
            } else {
                $nilai_usia = 1;
            }
            $normalisasi_usia = ($max_nilai_usia > 0) ? $nilai_usia / $max_nilai_usia : 0;

            $nilai_status_pekerjaan = 1;
            if ($jenis_pelatihan == 'DBHCHT') {
                switch ($status_pekerjaan) {
                    case 'PHK':
                        $nilai_status_pekerjaan = 2;
                        break;
                    case 'Tidak Bekerja':
                        $nilai_status_pekerjaan = 3;
                        break;
                    default:
                        $nilai_status_pekerjaan = 1;
                }
            }
            $normalisasi_status_pekerjaan = ($max_nilai_status > 0) ? $nilai_status_pekerjaan / $max_nilai_status : 0;

            $hasil_total_seleksi = 
                ($normalisasi_pengetahuan * $bobot_pengetahuan) +
                ($normalisasi_wawancara * $bobot_wawancara) +
                ($normalisasi_usia * $bobot_usia) +
                ($normalisasi_status_pekerjaan * $bobot_status);

            $peserta['nilai_usia'] = $nilai_usia;
            $peserta['nilai_status_pekerjaan'] = $nilai_status_pekerjaan;
            $peserta['hasil_total_seleksi'] = $hasil_total_seleksi;
        }
        unset($peserta);

        usort($data['pelatihan'], function ($a, $b) {
            return $b['hasil_total_seleksi'] <=> $a['hasil_total_seleksi'];
        });

        foreach ($data['pelatihan'] as $key => &$peserta) {
            $peserta['hasil_tes_seleksi'] = ($key < $jumlah_peserta_lolos) ? 'Lolos' : 'Tidak Lolos';

            $data_simpan = [
                'pelatihan_id' => $id,
                'peserta_id' => $peserta['id_peserta'],
                'pengetahuan_hasil_id' => $peserta['id_hasil_pengetahuan'],
                'wawancara_hasil_id' => $peserta['id_hasil_wawancara'],
                'nilai_usia' => $peserta['nilai_usia'],
                'hasil_total_seleksi' => $peserta['hasil_total_seleksi'],
                'hasil_tes_seleksi' => $peserta['hasil_tes_seleksi']
            ];

            if ($jenis_pelatihan == 'DBHCHT') {
                $data_simpan['nilai_status_pekerjaan'] = $peserta['nilai_status_pekerjaan'];
            }

            $this->model_crud->simpanHasilSeleksi($data_simpan);
        }
        unset($peserta);

        echo view('_applayout', $data);
    }

    public function peserta($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/peserta';
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);

        // Ambil data jenis pelatihan
        $pelatihanData = $this->model_crud->getPelatihanById($id);
        $jumlah_peserta_lolos = isset($pelatihanData['jumlah_peserta']) ? (int) $pelatihanData['jumlah_peserta'] : 16;
        $jenis_pelatihan = isset($pelatihanData['jenis_pelatihan']) ? $pelatihanData['jenis_pelatihan'] : 'APBN'; // default APBN
        $data['jenis_pelatihan'] = $jenis_pelatihan; // contoh: 'DBHCHT' atau 'APBN'

        // Ambil nilai maksimum untuk normalisasi
        $max_pengetahuan = max(array_column($data['pelatihan'], 'pengetahuan_hasil'));
        $max_wawancara = max(array_column($data['pelatihan'], 'wawancara_hasil'));

        // Bobot kriteria berdasarkan jenis pendanaan
        if ($jenis_pelatihan == 'DBHCHT') {
            $bobot_pengetahuan = 0.35;
            $bobot_wawancara = 0.35;
            $bobot_usia = 0.15;
            $bobot_status = 0.15;
        } else { // APBN
            $bobot_pengetahuan = 0.4;
            $bobot_wawancara = 0.4;
            $bobot_usia = 0.2;
            $bobot_status = 0; 
        }

        // 1. Hitung semua nilai usia dan status pekerjaan dulu
        $list_nilai_usia = [];
        $list_nilai_status = [];

        foreach ($data['pelatihan'] as &$peserta) {
            $tgl_lahir_peserta = isset($peserta['tgl_lahir_peserta']) ? $peserta['tgl_lahir_peserta'] : null;
            $status_pekerjaan = isset($peserta['status_pekerjaan']) ? $peserta['status_pekerjaan'] : '';

            $usia = ($tgl_lahir_peserta) ? $this->hitungUsia($tgl_lahir_peserta) : 0;

            // Konversi usia ke skor
            if ($usia >= 17 && $usia <= 25) {
                $nilai_usia = 3;
            } elseif ($usia >= 26 && $usia <= 35) {
                $nilai_usia = 2;
            } else { // usia > 35
                $nilai_usia = 1;
            }
            $list_nilai_usia[] = $nilai_usia;

            // Konversi status pekerjaan ke skor
            $nilai_status_pekerjaan = 1; 
            if ($jenis_pelatihan == 'DBHCHT') {
                switch ($status_pekerjaan) {
                    case 'Aktif':
                        $nilai_status_pekerjaan = 1;
                        break;
                    case 'PHK':
                        $nilai_status_pekerjaan = 2;
                        break;
                    case 'Tidak Bekerja':
                        $nilai_status_pekerjaan = 3;
                        break;
                    default:
                        $nilai_status_pekerjaan = 1;
                }
                $list_nilai_status[] = $nilai_status_pekerjaan;
            }
        }
        unset($peserta);

        // Cari maksimum usia dan status
        $max_nilai_usia = !empty($list_nilai_usia) ? max($list_nilai_usia) : 1;
        $max_nilai_status = !empty($list_nilai_status) ? max($list_nilai_status) : 1;

        // 2. Hitung normalisasi semua peserta
        foreach ($data['pelatihan'] as &$peserta) {
            $pengetahuan_hasil = isset($peserta['pengetahuan_hasil']) ? $peserta['pengetahuan_hasil'] : 0;
            $wawancara_hasil = isset($peserta['wawancara_hasil']) ? $peserta['wawancara_hasil'] : 0;
            $tgl_lahir_peserta = isset($peserta['tgl_lahir_peserta']) ? $peserta['tgl_lahir_peserta'] : null;
            $status_pekerjaan = isset($peserta['status_pekerjaan']) ? $peserta['status_pekerjaan'] : '';

            $usia = ($tgl_lahir_peserta) ? $this->hitungUsia($tgl_lahir_peserta) : 0;

            // Normalisasi nilai tes
            $normalisasi_pengetahuan = ($max_pengetahuan > 0) ? $pengetahuan_hasil / $max_pengetahuan : 0;
            $normalisasi_wawancara = ($max_wawancara > 0) ? $wawancara_hasil / $max_wawancara : 0;

            // Konversi usia ke skor
            if ($usia >= 17 && $usia <= 25) {
                $nilai_usia = 3;
            } elseif ($usia >= 26 && $usia <= 35) {
                $nilai_usia = 2;
            } else {
                $nilai_usia = 1;
            }
            $normalisasi_usia = ($max_nilai_usia > 0) ? $nilai_usia / $max_nilai_usia : 0;

            // Konversi status pekerjaan ke skor
            $nilai_status_pekerjaan = 1;
            if ($jenis_pelatihan == 'DBHCHT') {
                switch ($status_pekerjaan) {
                    case 'Aktif':
                        $nilai_status_pekerjaan = 1;
                        break;
                    case 'PHK':
                        $nilai_status_pekerjaan = 2;
                        break;
                    case 'Tidak Bekerja':
                        $nilai_status_pekerjaan = 3;
                        break;
                    default:
                        $nilai_status_pekerjaan = 1;
                }
            }
            $normalisasi_status_pekerjaan = ($max_nilai_status > 0) ? $nilai_status_pekerjaan / $max_nilai_status : 0;

            // Hitung total hasil seleksi
            $hasil_total_seleksi = 
                ($normalisasi_pengetahuan * $bobot_pengetahuan) +
                ($normalisasi_wawancara * $bobot_wawancara) +
                ($normalisasi_usia * $bobot_usia) +
                ($normalisasi_status_pekerjaan * $bobot_status);

            $peserta['nilai_usia'] = $nilai_usia; 
            $peserta['nilai_status_pekerjaan'] = $nilai_status_pekerjaan;
                
            $peserta['hasil_total_seleksi'] = $hasil_total_seleksi;
        }
        unset($peserta);

        // Urutkan berdasarkan skor tertinggi
        usort($data['pelatihan'], function ($a, $b) {
            return $b['hasil_total_seleksi'] <=> $a['hasil_total_seleksi'];
        });

        // Tetapkan kelulusan
        foreach ($data['pelatihan'] as $key => &$peserta) {
            $peserta['hasil_tes_seleksi'] = ($key < $jumlah_peserta_lolos) ? 'Lolos' : 'Tidak Lolos';

            // Siapkan data untuk disimpan
            $data_simpan = [
                'pelatihan_id' => $id,
                'peserta_id' => $peserta['id_peserta'],
                'pengetahuan_hasil_id' => $peserta['id_hasil_pengetahuan'],
                'wawancara_hasil_id' => $peserta['id_hasil_wawancara'],
                'nilai_usia' => $peserta['nilai_usia'], // pastikan sudah diset sebelumnya
                'hasil_total_seleksi' => $peserta['hasil_total_seleksi'],
                'hasil_tes_seleksi' => $peserta['hasil_tes_seleksi']
            ];

            // Jika jenis pelatihan DBHCHT, tambahkan nilai usia dan status pekerjaan
            if ($jenis_pelatihan == 'DBHCHT') {
                $data_simpan['nilai_status_pekerjaan'] = $peserta['nilai_status_pekerjaan']; // pastikan sudah diset sebelumnya
            }

            // Simpan ke tabel hasil_seleksi
            $this->model_crud->simpanHasilSeleksi($data_simpan);
        }
        unset($peserta);

        echo view('_applayout', $data);
    }

    private function hitungUsia($tgl_lahir)
    {
        $birthDate = new \DateTime($tgl_lahir);
        $today = new \DateTime('today');
        $age = $birthDate->diff($today)->y;
        return $age;
    }

    public function peserta_print($IdPelatihan)
    {
        $id = $IdPelatihan;
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/peserta-print';

        // Ambil data pelatihan (nama pelatihan dll)
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);

        // Ambil data peserta dari tabel hasil_seleksi
        $data['pelatihan'] = $this->model_crud->getHasilSeleksiByPelatihanPrint($id);

        // Ambil data pelatihan untuk jumlah peserta lolos
        $pelatihanData = $this->model_crud->getPelatihanById($id);
        $jumlah_peserta_lolos = isset($pelatihanData['jumlah_peserta']) ? (int) $pelatihanData['jumlah_peserta'] : 16;

        // Ambil data dari URL (optional parameter tambahan)
        $data['tempatDaftarUlang'] = $this->request->getGet('tempatdaftarUlang') ?? '';
        $data['tanggalSeleksi'] = $this->request->getGet('tanggalSeleksi') ?? '';
        $data['tanggalDaftarUlang'] = $this->request->getGet('tanggaldaftarUlang') ?? '';
        $data['waktuDaftarUlang'] = $this->request->getGet('waktudaftarUlang') ?? '';
        $data['tanggalMasukPelatihan'] = $this->request->getGet('tanggalmasukPelatihan') ?? '';
        $data['waktuMasukPelatihan'] = $this->request->getGet('waktumasukPelatihan') ?? '';
        $data['waktuSelesaiPelatihan'] = $this->request->getGet('waktuselesaiPelatihan') ?? '';
        $data['jenisPelatihan'] = $this->request->getGet('jenisPelatihan') ?? '';

        $kepalaBLK = $this->request->getGet('kepalaBLK') ?? '';
        $data['kepalaBLK'] = $this->model_crud->detailkode('kepala_blk', 'id_kepala_blk', $kepalaBLK);

        // Urutkan peserta berdasarkan hasil_total_seleksi DESC
        usort($data['pelatihan'], function ($a, $b) {
            return $b['hasil_total_seleksi'] <=> $a['hasil_total_seleksi'];
        });

        echo view('_applayout', $data);
    }

    public function peserta_print1($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/peserta-print';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);
        
        // Ambil nilai dari URL untuk tanggal/jam
        $tempatDaftarUlang = isset($_GET['tempatdaftarUlang']) ? $_GET['tempatdaftarUlang'] : '';
        $tanggalSeleksi = isset($_GET['tanggalSeleksi']) ? $_GET['tanggalSeleksi'] : '';
        $tanggalDaftarUlang = isset($_GET['tanggaldaftarUlang']) ? $_GET['tanggaldaftarUlang'] : '';
        $waktuDaftarUlang = isset($_GET['waktudaftarUlang']) ? $_GET['waktudaftarUlang'] : '';
        $tanggalMasukPelatihan = isset($_GET['tanggalmasukPelatihan']) ? $_GET['tanggalmasukPelatihan'] : '';
        $waktuMasukPelatihan = isset($_GET['waktumasukPelatihan']) ? $_GET['waktumasukPelatihan'] : '';
        $waktuSelesaiPelatihan = isset($_GET['waktuselesaiPelatihan']) ? $_GET['waktuselesaiPelatihan'] : '';
        $jenisPelatihan = isset($_GET['jenisPelatihan']) ? $_GET['jenisPelatihan'] : '';
        $kepalaBLK = isset($_GET['kepalaBLK']) ? $_GET['kepalaBLK'] : '';

        $data['kepalaBLK'] = $this->model_crud->detailkode('kepala_blk', 'id_kepala_blk', $kepalaBLK);

        // Simpan atau perbarui data ke tabel hasil_seleksi
        foreach ($data['pelatihan'] as $key => &$peserta) {
            $pengetahuan_hasil = isset($peserta['pengetahuan_hasil']) ? $peserta['pengetahuan_hasil'] : 0;
            $wawancara_hasil = isset($peserta['wawancara_hasil']) ? $peserta['wawancara_hasil'] : 0;
            $hasil_total_seleksi = ($pengetahuan_hasil + $wawancara_hasil) / 2;

            // Tentukan kelulusan
            $peserta['hasil_tes_seleksi'] = ($key < 16) ? 'Lolos' : 'Tidak Lolos';
        }

        // Masukkan nilai tanggal/jam ke dalam data yang akan dikirim ke view
        $data['tempatDaftarUlang'] = $tempatDaftarUlang;
        $data['tanggalSeleksi'] = $tanggalSeleksi;
        $data['tanggalDaftarUlang'] = $tanggalDaftarUlang;
        $data['waktuDaftarUlang'] = $waktuDaftarUlang;
        $data['tanggalMasukPelatihan'] = $tanggalMasukPelatihan;
        $data['waktuMasukPelatihan'] = $waktuMasukPelatihan;
        $data['waktuSelesaiPelatihan'] = $waktuSelesaiPelatihan;
        $data['jenisPelatihan'] = $jenisPelatihan;

        echo view('_applayout', $data);
    }

    public function peserta_print2($IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/peserta-print';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);

        // Ambil jumlah peserta yang akan lolos dari tabel pelatihan
        $pelatihanData = $this->model_crud->getPelatihanById($id);
        $jumlah_peserta_lolos = isset($pelatihanData['jumlah_peserta']) ? (int) $pelatihanData['jumlah_peserta'] : 16;

        // Ambil nilai dari URL untuk tanggal/jam
        $tempatDaftarUlang = $this->request->getGet('tempatdaftarUlang') ?? '';
        $tanggalSeleksi = $this->request->getGet('tanggalSeleksi') ?? '';
        $tanggalDaftarUlang = $this->request->getGet('tanggaldaftarUlang') ?? '';
        $waktuDaftarUlang = $this->request->getGet('waktudaftarUlang') ?? '';
        $tanggalMasukPelatihan = $this->request->getGet('tanggalmasukPelatihan') ?? '';
        $waktuMasukPelatihan = $this->request->getGet('waktumasukPelatihan') ?? '';
        $waktuSelesaiPelatihan = $this->request->getGet('waktuselesaiPelatihan') ?? '';
        $jenisPelatihan = $this->request->getGet('jenisPelatihan') ?? '';
        $kepalaBLK = $this->request->getGet('kepalaBLK') ?? '';

        $data['kepalaBLK'] = $this->model_crud->detailkode('kepala_blk', 'id_kepala_blk', $kepalaBLK);

        // Cari nilai maksimum untuk normalisasi
        $max_pengetahuan = max(array_column($data['pelatihan'], 'pengetahuan_hasil'));
        $max_wawancara = max(array_column($data['pelatihan'], 'wawancara_hasil'));

        $bobot_pengetahuan = 0.5;
        $bobot_wawancara = 0.5;

        // Hitung skor SAW
        foreach ($data['pelatihan'] as &$peserta) {
            $pengetahuan_hasil = $peserta['pengetahuan_hasil'] ?? 0;
            $wawancara_hasil = $peserta['wawancara_hasil'] ?? 0;

            // Normalisasi nilai
            $normalisasi_pengetahuan = ($max_pengetahuan > 0) ? $pengetahuan_hasil / $max_pengetahuan : 0;
            $normalisasi_wawancara = ($max_wawancara > 0) ? $wawancara_hasil / $max_wawancara : 0;

            // Hitung skor akhir dengan bobot
            $peserta['hasil_total_seleksi'] = ($normalisasi_pengetahuan * $bobot_pengetahuan) + ($normalisasi_wawancara * $bobot_wawancara);
        }

        // Urutkan peserta berdasarkan skor seleksi (ranking SAW)
        usort($data['pelatihan'], function ($a, $b) {
            return $b['hasil_total_seleksi'] <=> $a['hasil_total_seleksi'];
        });

        // Tentukan kelulusan (16 peserta terbaik)
        foreach ($data['pelatihan'] as $key => &$peserta) {
            $peserta['hasil_tes_seleksi'] = ($key < $jumlah_peserta_lolos) ? 'Lolos' : 'Tidak Lolos';
        }

        // Masukkan nilai tanggal/jam ke dalam data yang akan dikirim ke view
        $data['tempatDaftarUlang'] = $tempatDaftarUlang;
        $data['tanggalSeleksi'] = $tanggalSeleksi;
        $data['tanggalDaftarUlang'] = $tanggalDaftarUlang;
        $data['waktuDaftarUlang'] = $waktuDaftarUlang;
        $data['tanggalMasukPelatihan'] = $tanggalMasukPelatihan;
        $data['waktuMasukPelatihan'] = $waktuMasukPelatihan;
        $data['waktuSelesaiPelatihan'] = $waktuSelesaiPelatihan;
        $data['jenisPelatihan'] = $jenisPelatihan;

        echo view('_applayout', $data);
    }

    public function peserta_hasil()
    {
        $id_user = (int)session()->get('id_user');
        $getHasilPeserta = $this->model_crud->getHasilPeserta($id_user);
        $data['pelatihanPeserta'] = $getHasilPeserta;

        $data['judul'] = 'Daftar Hasil Seleksi';
        $data['content'] = 'hasil_seleksi/hasil';

        echo view('_applayout', $data);
    }

    public function peserta_detail1($id_peserta)
    {
        // Dapatkan ID user dari sesi
        $id_user = (int)session()->get('id_user'); 
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');

        // Dapatkan detail pelatihan dan peserta berdasarkan user yang aktif
        $pelatihanPeserta = $this->model_crud->getPelatihanPeserta($id_user);
        $selectedPelatihan = $pelatihanPeserta ? $pelatihanPeserta['pelatihan_id'] : null;

        // Dapatkan data peserta dan hasil tes berdasarkan ID peserta
        $data['peserta'] = $this->model_crud->getPesertaDetail($id_peserta, $selectedPelatihan);
        $data['hasilTes'] = $this->model_crud->getHasilTesPeserta($id_peserta, $selectedPelatihan);
        
        // Hitung total hasil tes
        $totalPengetahuan = array_sum(array_column($data['hasilTes'], 'tes_pengetahuan'));
        $totalWawancara = array_sum(array_column($data['hasilTes'], 'tes_wawancara'));
        $data['totalHasilTes'] = ($totalPengetahuan + $totalWawancara)/2;

        // Load view dengan data
        $data['id_pelatihan'] = $selectedPelatihan;
        $data['id_peserta'] = $id_peserta;
        $data['judul'] = 'Detail Hasil Seleksi';
        $data['content'] = 'hasil_seleksi/hasil_peserta';
        
        echo view('_applayout', $data);

    }

    public function peserta_detail2($id_peserta)
    {
        // Dapatkan ID user dari sesi
        $id_user = (int)session()->get('id_user'); 
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');

        // Dapatkan detail pelatihan dan peserta berdasarkan user yang aktif
        $pelatihanPeserta = $this->model_crud->getPelatihanPeserta($id_user);
        $selectedPelatihan = $pelatihanPeserta ? $pelatihanPeserta['pelatihan_id'] : null;
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($selectedPelatihan);

        // Dapatkan data peserta dan hasil tes berdasarkan ID peserta
        $data['peserta'] = $this->model_crud->getPesertaDetail($id_peserta, $selectedPelatihan);
        $data['hasilTes'] = $this->model_crud->getHasilTesPeserta($id_peserta, $selectedPelatihan);

        // Cari nilai maksimum untuk normalisasi
        $max_pengetahuan = max(array_column($data['pelatihan'], 'pengetahuan_hasil'));
        $max_wawancara = max(array_column($data['pelatihan'], 'wawancara_hasil'));

        $bobot_pengetahuan = 0.5;
        $bobot_wawancara = 0.5;

        // Hitung total hasil tes menggunakan metode SAW
        $totalPengetahuan = array_sum(array_column($data['hasilTes'], 'tes_pengetahuan'));
        $totalWawancara = array_sum(array_column($data['hasilTes'], 'tes_wawancara'));

        // Normalisasi nilai
        $normalisasi_pengetahuan = ($max_pengetahuan > 0) ? $totalPengetahuan / $max_pengetahuan : 0;
        $normalisasi_wawancara = ($max_wawancara > 0) ? $totalWawancara / $max_wawancara : 0;

        // Hitung skor SAW
        $data['totalHasilTes'] = ($normalisasi_pengetahuan * $bobot_pengetahuan) + ($normalisasi_wawancara * $bobot_wawancara);

        // Load view dengan data
        $data['id_pelatihan'] = $selectedPelatihan;
        $data['id_peserta'] = $id_peserta;
        $data['judul'] = 'Detail Hasil Seleksi';
        $data['content'] = 'hasil_seleksi/hasil_peserta';

        echo view('_applayout', $data);
    }

    public function peserta_detail($id_peserta)
    {
        // Dapatkan ID user dari sesi
        $id_user = (int)session()->get('id_user');
        $data['kepala_blk'] = $this->model_crud->getAll('kepala_blk');

        // Dapatkan pelatihan aktif berdasarkan user
        $pelatihanPeserta = $this->model_crud->getPelatihanPeserta($id_user);
        $selectedPelatihan = $pelatihanPeserta ? $pelatihanPeserta['pelatihan_id'] : null;
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($selectedPelatihan);

        // Dapatkan data peserta
        $data['peserta'] = $this->model_crud->getPesertaDetail($id_peserta, $selectedPelatihan);

        // Dapatkan hasil seleksi final langsung dari tabel hasil_seleksi
        $data['hasilSeleksi'] = $this->model_crud->getHasilSeleksiPeserta($id_peserta, $selectedPelatihan);

        $data['id_pelatihan'] = $selectedPelatihan;
        $data['id_peserta'] = $id_peserta;
        $data['judul'] = 'Detail Hasil Seleksi';
        $data['content'] = 'hasil_seleksi/hasil_peserta';

        echo view('_applayout', $data);
    }

    public function hasil_peserta_print1($id_peserta, $IdPelatihan)
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/hasil_peserta_print';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);

        // Dapatkan data peserta dan hasil tes berdasarkan ID peserta
        $data['peserta'] = $this->model_crud->getPesertaDetail($id_peserta, $id);
        $data['hasilTes'] = $this->model_crud->getHasilTesPeserta($id_peserta, $id);
        
        // Hitung total hasil tes
        $totalPengetahuan = array_sum(array_column($data['hasilTes'], 'tes_pengetahuan'));
        $totalWawancara = array_sum(array_column($data['hasilTes'], 'tes_wawancara'));
        $data['totalHasilTes'] = ($totalPengetahuan + $totalWawancara)/2;

        echo view('_applayout', $data);
    }

    public function hasil_peserta_print2($id_peserta, $IdPelatihan) 
    {
        $id = $IdPelatihan; 
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/hasil_peserta_print';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['pelatihan'] = $this->model_crud->getPesertaSeleksi($id);

        // Dapatkan data peserta dan hasil tes berdasarkan ID peserta
        $data['peserta'] = $this->model_crud->getPesertaDetail($id_peserta, $id);
        $data['hasilTes'] = $this->model_crud->getHasilTesPeserta($id_peserta, $id);
        // Cari nilai maksimum untuk normalisasi
        $max_pengetahuan = max(array_column($data['pelatihan'], 'pengetahuan_hasil'));
        $max_wawancara = max(array_column($data['pelatihan'], 'wawancara_hasil'));

        $bobot_pengetahuan = 0.5;
        $bobot_wawancara = 0.5;

        // Hitung total hasil tes menggunakan metode SAW
        $totalPengetahuan = array_sum(array_column($data['hasilTes'], 'tes_pengetahuan'));
        $totalWawancara = array_sum(array_column($data['hasilTes'], 'tes_wawancara'));

        // Normalisasi nilai
        $normalisasi_pengetahuan = ($max_pengetahuan > 0) ? $totalPengetahuan / $max_pengetahuan : 0;
        $normalisasi_wawancara = ($max_wawancara > 0) ? $totalWawancara / $max_wawancara : 0;

        // Hitung skor SAW
        $data['totalHasilTes'] = ($normalisasi_pengetahuan * $bobot_pengetahuan) + ($normalisasi_wawancara * $bobot_wawancara);

        //echo "Max Pengetahuan: " . $max_pengetahuan . "<br>";
        //echo "Max Wawancara: " . $max_wawancara . "<br>";
        //echo "Total Pengetahuan Peserta: " . $totalPengetahuan . "<br>";
        //echo "Total Wawancara Peserta: " . $totalWawancara . "<br>";
        //echo "Normalisasi Pengetahuan: " . $normalisasi_pengetahuan . "<br>";
        //echo "Normalisasi Wawancara: " . $normalisasi_wawancara . "<br>";
        //echo "Total Hasil SAW: " . $data['totalHasilTes'] . "<br>";

        echo view('_applayout', $data);
    }

    public function hasil_peserta_print($id_peserta, $IdPelatihan) 
    {
        $id = $IdPelatihan;
        $data['judul'] = 'Daftar Peserta Tes Seleksi';
        $data['content'] = 'hasil_seleksi/hasil_peserta_print';
        $data['nama_pelatihan'] = $this->model_crud->detailkode('pelatihan', 'id_pelatihan', $id);
        $data['peserta'] = $this->model_crud->getPesertaDetail($id_peserta, $id);
        $data['hasilSeleksi'] = $this->model_crud->getHasilSeleksiPeserta($id_peserta, $id);

        echo view('_applayout', $data);
    }

}