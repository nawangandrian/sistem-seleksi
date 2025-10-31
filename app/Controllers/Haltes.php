<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crudseleksi;

class Haltes extends BaseController
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
        $data['content'] = 'tes/data';
        $data['judul'] = 'Tes';
        $data['soal'] = $this->model_crud->getSoal();

        echo view('_applayout', $data);
    }

    public function seleksi2($ujian_id)
    {
        $data['content'] = 'tes/uji';
        $data['judul'] = 'Tes';
        $data['soal'] = $this->model_crud->getSoalByUjianId($ujian_id);
        $data['pilgan'] = [];
        $data['benarsalah'] = [];
        $data['uraian'] = [];

        // Mendapatkan data pilgan, benarsalah, dan uraian untuk setiap id_soal
        foreach ($data['soal'] as $soal) {
            $id_soal = $soal['id_soal'];
            $data['pilgan'][] = $this->model_crud->getPilganById($id_soal);
            $data['benarsalah'][] = $this->model_crud->getBenarSalahById($id_soal);
            $data['uraian'][] = $this->model_crud->getUraianById($id_soal);
        } 

        var_dump($data['pilgan']);

        echo view('_applayout', $data);
    }

    public function seleksi($ujian_id)
    {
        $data['content'] = 'tes/coba';
        $data['judul'] = 'Tes';
        $data['ujian_id'] = $ujian_id;

        // Get the first question for the given exam
        $data['soal1'] = $this->model_crud->getSoalByUjianId($ujian_id);
        $data['current_soal_id'] = (!empty($data['soal1'])) ? $data['soal1'][0]['id_soal'] : null;

        $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $data['current_soal_id']);
        $data['ujian'] = $this->model_crud->detailkode('ujian', 'id_ujian', $ujian_id);

        // Get pilgan options for the current question
        $data['pilgan'] = $this->model_crud->getPilganById($data['current_soal_id']);

        return view('_applayout', $data);
    }

    public function next($ujian_id, $current_soal_id)
    {
        $next_soal = $this->model_crud->getNextSoalId($current_soal_id);

        if ($next_soal) {
            return redirect()->to(base_url("haltes/seleksi/$ujian_id"))->with('current_soal_id', $next_soal);
        } else {
            return redirect()->back()->with('error', 'Tidak ada soal selanjutnya.');
        }
    }

    public function back($ujian_id, $current_soal_id)
    {
        $previous_soal = $this->model_crud->getPreviousSoalId($current_soal_id);

        if ($previous_soal) {
            return redirect()->to(base_url("haltes/seleksi/$ujian_id"))->with('current_soal_id', $previous_soal);
        } else {
            return redirect()->back()->with('error', 'Tidak ada soal sebelumnya.');
        }
    }

    public function load_soal3()
    {
        $action = $this->request->getPost('action');
        $ujian_id = $this->request->getPost('ujian_id');
        $current_soal_id = $this->request->getPost('current_soal_id');

        if ($action == 'next') {
            $next_soal = $this->model_crud->getNextSoalId($current_soal_id);
            $current_soal_id = $next_soal;
        } elseif ($action == 'back') {
            $previous_soal = $this->model_crud->getPreviousSoalId($current_soal_id);
            $current_soal_id = $previous_soal;
        }

        $data['pilgan'] = $this->model_crud->getPilganById($current_soal_id);
        $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $current_soal_id);
        $data['current_soal_id'] = $current_soal_id;
        
        echo view('tes/coba', $data);
    }

    public function load_soal()
    {
        $action = $this->request->getPost('action');
        $ujian_id = $this->request->getPost('ujian_id');
        $current_soal_id = $this->request->getPost('current_soal_id');

        if ($action == 'next') {
            $current_soal_id = $this->model_crud->getNextSoalId($current_soal_id, $ujian_id);
        } elseif ($action == 'back') {
            $current_soal_id = $this->model_crud->getPreviousSoalId($current_soal_id, $ujian_id);
        }

        $data['pilgan'] = $this->model_crud->getPilganById($current_soal_id);
        $data['soal'] = $this->model_crud->detailkode('soal', 'id_soal', $current_soal_id);
        $data['current_soal_id'] = $current_soal_id;

        echo view('tes/coba', $data);
    }

    // Tambahkan fungsi ini ke controller atau bagian yang sesuai pada sisi server
    public function find_soal_id_by_nomor()
    {
        // Ambil nomor soal dari permintaan POST
        $nomorSoal = $this->request->getPost('nomor_soal');
        $ujianId = $this->request->getPost('ujian_id');

        // Lakukan logika untuk menemukan ID soal berdasarkan nomor soal
        // Misalnya, dapatkan ID soal dengan urutan sesuai dengan nomor soal
        $idSoal = $this->model_crud->findSoalIdByNomorSoal($ujianId, $nomorSoal);

        // Kirim respons JSON ke klien
        $response = ['success' => false, 'id_soal' => null, 'message' => 'Error finding soal ID.'];

        if ($idSoal !== null) {
            $response = ['success' => true, 'id_soal' => $idSoal];
        }

        return $this->response->setJSON($response);
    }

    public function saveAnswer()
    {
        // Mendapatkan data yang dikirimkan melalui AJAX
        $request = $this->request->getPost();
        
        // Menyiapkan data untuk disimpan
        $data = [
            'user_id' => $request['id_user'],
            'nomor_soal' => $request['nomor_soal'],
            'jawaban' => $request['selected_option'],
            'soal_id' => $request['soal_id']
        ];

        $answer = $this->model_crud->getTipe($data['soal_id']);

        if ($answer) {
            // Mengambil jawaban benar dari tabel pilgan berdasarkan tipe soal
            if ($answer === 'Pilihan Ganda') {
                // Untuk tipe soal Pilihan Ganda, langsung ambil jawaban benar dari tabel pilgan
                $jawabanBenar = $this->model_crud->getJawabanBenar($data['jawaban']);

                // Jika jawabanBenar bukan null dan jawabanBenar sama dengan jawaban yang dipilih
                if ($jawabanBenar == '1') {
                    $data['jawab_benar'] = 1; // Jawaban benar
                } else {
                    $data['jawab_benar'] = 0; // Jawaban salah
                }

            } else if ($answer === 'Benar Salah') {
                // Untuk tipe soal Benar Salah, ambil jawaban benar dari tabel benarsalah
                $jawabanBenarSalah = $this->model_crud->getJawabanBenarSalah($data['jawaban'], $data['soal_id']);
                // Jika jawaban benar adalah '1' atau tidak null, tambahkan ke jumlahBenar
                if (!is_null($jawabanBenarSalah)) {
                    $data['jawab_benar'] = 1;
                } else {
                    $data['jawab_benar'] = 0;
                }
            }
        }

        
        $existingAnswer = $this->model_crud->checkNomorSoal($data['nomor_soal'], $data['user_id'], $data['soal_id']);

        if ($existingAnswer) {
            // Jika nomor soal sudah ada, lakukan update
            $update = $this->model_crud->updatekode('jawaban_sementara', 'id_jawab', $existingAnswer['id_jawab'], $data);
            if ($update) {
                // Pesan jika update berhasil
                echo "<script>alert('Data dengan nomor soal " . $data['nomor_soal'] . " telah diperbarui');</script>";
            } else {
                // Pesan jika update gagal
                echo "<script>alert('Gagal memperbarui data');</script>";
            }
        } else {
            // Jika nomor soal belum ada, lakukan insert
            $saved = $this->model_crud->insertkode('jawaban_sementara', $data);
            if ($saved) {
                // Pesan jika penyimpanan berhasil
                echo "<script>alert('Data baru berhasil disimpan');</script>";
            } else {
                // Pesan jika penyimpanan gagal
                echo "<script>alert('Gagal menyimpan data');</script>";
            }
        }

        // Mengirim respons JSON
        if ($saved) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function getAnswer()
    {
        $request = $this->request->getPost();

        // Pastikan nomor_soal dan id_user tersedia sebelum digunakan
        if (isset($request['nomor_soal']) && isset($request['id_user'])) {
            $answer = $this->model_crud->getAnswer($request['nomor_soal'], $request['id_user'], $request['soal_id']);
            return $this->response->setJSON(['answer' => $answer]);
        } else {
            // Jika nomor_soal atau id_user tidak tersedia, kembalikan respons dengan pesan kesalahan
            return $this->response->setJSON(['error' => 'Nomor soal atau ID user tidak tersedia.']);
        }
    }

    public function saveAnswerCheckbox()
    {
        // Mendapatkan data yang dikirimkan melalui AJAX
        $request = $this->request->getPost();
        
        // Menyiapkan data untuk disimpan
        $data = [
            'user_id' => $request['id_user'],
            'nomor_soal' => $request['nomor_soal'],
            'soal_id' => $request['soal_id']
        ];

        // Simpan nilai jawaban terpilih ke dalam array jika ada
        if (isset($request['selected_options']) && is_array($request['selected_options'])) {
            // Konversi array jawaban terpilih menjadi string
            $jawaban = implode(',', $request['selected_options']);
            $data['jawaban'] = $jawaban;
        }else{
            $data['jawaban'] = '';
        }

        // Menghitung jumlah jawaban yang benar yang dipilih peserta tes
        $jumlahBenar = 0;

        // Mengecek apakah ada opsi yang dipilih
        if (isset($request['selected_options']) && is_array($request['selected_options'])) {
            $jumlahJawabanBenar = 0;

            // Menghitung jumlah jawaban benar untuk setiap pertanyaan
            foreach ($request['selected_options'] as $jawaban) {
                // Ambil jawaban benar dari tabel pilgan
                $jawabanBenar = $this->model_crud->getJawabanBenarMulti($jawaban);
                if ($jawabanBenar == '1') {
                    $jumlahJawabanBenar++;
                }
            }

            // Hitung total jumlah jawaban benar untuk pertanyaan yang terkait
            $totalJawabanBenar = $this->model_crud->getTotalJawabanBenarForQuestion($request['soal_id']);

            // Menghitung nilai masing-masing jawaban benar
            $nilaiPerJawabanBenar = $totalJawabanBenar > 0 ? 1 / $totalJawabanBenar : 0;

            // Menghitung total jumlah benar berdasarkan pilihan peserta
            foreach ($request['selected_options'] as $jawaban) {
                $jawabanBenar = $this->model_crud->getJawabanBenarMulti($jawaban);
                if ($jawabanBenar == '1') {
                    $jumlahBenar += $nilaiPerJawabanBenar;
                }
            }
        }

        $data['jawab_benar'] = $jumlahBenar;

        // Lakukan penyimpanan atau pembaruan data jawaban
        $existingAnswer = $this->model_crud->checkNomorSoal($data['nomor_soal'], $data['user_id'], $data['soal_id']);

        if ($existingAnswer) {
            $update = $this->model_crud->updatekode('jawaban_sementara', 'id_jawab', $existingAnswer['id_jawab'], $data);
            if ($update) {
                // Pesan jika update berhasil
                return $this->response->setJSON(['success' => true]);
            } else {
                // Pesan jika update gagal
                return $this->response->setJSON(['success' => false]);
            }
        }
        else {
            // Jika nomor soal belum ada, lakukan insert
            $saved = $this->model_crud->insertkode('jawaban_sementara', $data);
            if ($saved) {
                // Pesan jika penyimpanan berhasil
                return $this->response->setJSON(['success' => true]);
            } else {
                // Pesan jika penyimpanan gagal
                return $this->response->setJSON(['success' => false]);
            }
        }
    }
    
    public function completeExam() {
        $id_user = $this->request->getPost('id_user');
        $id_ujian = $this->request->getPost('id_ujian');
    
        $this->model_crud->completeExam($id_user, $id_ujian);

        // Ambil daftar hasil dan hitung total skor
        $daftarHasil = $this->model_crud->getDaftarHasil($id_user);

        $total_skor = 0;
        foreach ($daftarHasil as $hasil) {
            $total_skor += (int)$hasil['skor'];  // Pastikan skor adalah integer
        }
            
        // Ambil data peserta
        $peserta = $this->model_crud->getDataPeserta($id_user);
            
        // Pastikan data peserta ditemukan
        if ($peserta) {
            $id_peserta = $peserta->id_peserta;
            
            // Cek apakah hasil sudah ada
            $existingHasil = $this->model_crud->detailkode('hasil_pengetahuan', 'peserta_id', $id_peserta);
                    
            if (!$existingHasil) {
                        // Data untuk disimpan
                $hitung = [
                    'peserta_id' => $id_peserta,
                    'pengetahuan_hasil' => $total_skor
                ];
            
                // Simpan total skor ke tabel hasil_pengetahuan
                $insert = $this->model_crud->insertkode('hasil_pengetahuan', $hitung);
                        
                if (!$insert) {
                    $db = \Config\Database::connect();
                    $error = $db->error();
                    echo "<script>alert('Gagal menyimpan data: " . $error['message'] . "')</script>";
                }
            } else {
                // Update total skor jika hasil sudah ada
                $data1 = [
                    'pengetahuan_hasil' => $total_skor
                ];
            
                $this->model_crud->updatekode('hasil_pengetahuan', 'peserta_id', $id_peserta, $data1);
            }
        }
    
        return $this->response->setJSON(['status' => 'success']);
    }    

}