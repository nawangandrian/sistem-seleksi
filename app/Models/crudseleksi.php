<?php
namespace App\Models;
use CodeIgniter\Model;
 
class crudseleksi extends Model
{
    public function getAll($table)
    {
        return $this->db->table($table)->get()->getResultArray();
    }

    public function insertkode($table, $data)
    {
        return $this->db->table($table)->insert($data);
    }

    public function insertPilgan($data)
    {
        return $this->insertkode('pilgan', $data);
    }

    public function insertBenarSalah($data)
    {
        return $this->insertkode('benarsalah', $data);
    }

    public function insertUraian($data)
    {
        return $this->insertkode('uraian', $data);
    }

    public function insertPeserta($data)
    {
        return $this->insertkode('peserta', $data);
    }

    public function insertSoal($data)
    {
        // Lakukan proses insert data ke tabel 'soal'
        $this->db->table('soal')->insert($data);
        
        // Kembalikan ID dari data yang baru saja disimpan
        return $this->db->insertID();
    }

    public function insertSoalWawancara($data)
    {
        // Lakukan proses insert data ke tabel 'soal'
        $this->db->table('soal_wawancara')->insert($data);
        
        // Kembalikan ID dari data yang baru saja disimpan
        return $this->db->insertID();
    }

    public function insertUser($data)
    {
        // Lakukan proses insert data ke tabel 'soal'
        $this->db->table('user')->insert($data);
        
        // Kembalikan ID dari data yang baru saja disimpan
        return $this->db->insertID();
    }

    public function insertpil($table, $data)
    {
        return $this->db->table($table)->insertBatch($data);
    }

    public function updatekode($table, $pk, $id, $data)
    {
        return $this->db->table($table)->update($data, array($pk => $id));
    }

    public function deletekode($table, $pk, $id)
    {
        return $this->db->table($table)->delete(array($pk => $id));
    }

    public function detailkode($table, $pk, $id)
    {
        return $this->db->query("SELECT * FROM $table where $pk = '$id' ")->getRow();
    }

    public function updatePelatihan($table, $pk, $id, $data)
    {
        return $this->db->table($table)->where($pk, $id)->update($data);
    }

    public function getPelatihanById($id)
    {
        return $this->db->table('pelatihan')->where('id_pelatihan', $id)->get()->getRowArray();
    }

    public function getWhere($table, $where)
    {
        return $this->db->table($table)
                        ->where($where)
                        ->get()
                        ->getRowArray(); 
    }

    public function getPesertaByUserId($id_user)
    {
        return $this->db->table('peserta')
            ->where('user_id', $id_user)
            ->get()
            ->getRowArray();
    }

    public function detailsoalpil($id)
    {
        return $this->db->table('soal')
            ->join('pilgan', 'soal.id_soal = pilgan.soal_id')
            ->where('pilgan.id_pilgan', $id)
            ->get()
            ->getRow();
    }

    public function getSoal()
    {
        return $this->db->query("SELECT * FROM soal
                                 INNER JOIN ujian ON soal.ujian_id = ujian.id_ujian
                                 ORDER BY soal.id_soal DESC ")->getResultArray();
    }

    public function getPilgan()
    {
        return $this->db->query("SELECT * FROM pilgan
                                 INNER JOIN soal ON pilgan.soal_id = soal.id_soal
                                 ORDER BY pilgan.id_pilgan DESC ")->getResultArray();
    }

    public function getUjian()
    {
        return $this->db->query("SELECT * FROM ujian
                                 INNER JOIN pelatihan ON ujian.pelatihan_id = pelatihan.id_pelatihan
                                 ORDER BY ujian.id_ujian DESC ")->getResultArray();
    }

    public function getSoalByUjianId($ujian_id)
    {
        return $this->db->table('soal')->where('ujian_id', $ujian_id)->get()->getResultArray();
    }

    public function checkNomorSoal($nomorSoal, $userId, $soalId)
    {
        return $this->db->table('jawaban_sementara')
                        ->where('nomor_soal', $nomorSoal)
                        ->where('user_id', $userId)
                        ->where('soal_id', $soalId)
                        ->get()
                        ->getRowArray();
    }

    public function getJawabanBenarSalah($jawab, $idSoal)
    {
        // Query untuk mengambil jawaban benar dari tabel pilgan berdasarkan id_pilgan
        $result = $this->db->table('benarsalah')
                        ->select('jawaban_benar_salah')
                        ->where('soal_id', $idSoal)
                        ->where('jawaban_benar_salah', $jawab)
                        ->get()
                        ->getRowArray();

        // Mengembalikan jawaban benar (1) atau null jika tidak ditemukan
        return $result ? $result['jawaban_benar_salah'] : null;
    }

    public function getTipe($idSoal) 
    {
        // Mendapatkan tipe soal dari tabel 'soal'
        $soalRow = $this->db->table('soal')
                        ->select('tipe_soal')
                        ->where('id_soal', $idSoal)
                        ->get()
                        ->getRowArray();

        // Kembalikan tipe soal jika ditemukan, atau null jika tidak
        return $soalRow ? $soalRow['tipe_soal'] : null;
    }

    public function getJawabanBenar($idPilgan)
    {
        // Query untuk mengambil jawaban benar dari tabel pilgan berdasarkan id_pilgan
        $result = $this->db->table('pilgan')
                        ->select('jawaban_benar')
                        ->where('id_pilgan', $idPilgan)
                        ->get()
                        ->getRowArray();

        // Mengembalikan jawaban benar atau null jika tidak ditemukan
        return $result ? $result['jawaban_benar'] : null;
    }

    public function getJawabanBenarMulti($idPilgan)
    {
        // Query untuk mengambil jawaban benar dari tabel pilgan berdasarkan id_pilgan
        $result = $this->db->table('pilgan')
                        ->select('jawaban_benar')
                        ->where('id_pilgan', $idPilgan)
                        ->get()
                        ->getRowArray();

        // Mengembalikan jawaban benar atau null jika tidak ditemukan
        return $result ? $result['jawaban_benar'] : null;
    }

    public function getTotalJawabanBenarForQuestion($questionId)
    {
        // Query untuk menghitung jumlah jawaban benar dari tabel pilgan berdasarkan question_id
        $result = $this->db->table('pilgan')
                        ->where('soal_id', $questionId)
                        ->where('jawaban_benar', '1')
                        ->countAllResults();

        return $result;
    }

    public function getAnswer($nomorSoal, $id_user, $soal_id)
    {
        // Mendapatkan jawaban dari tabel 'jawaban_sementara'
        $jawabanRow = $this->db->table('jawaban_sementara')
                        ->where('nomor_soal', $nomorSoal)
                        ->where('user_id', $id_user)
                        ->get()
                        ->getRowArray();

        // Mendapatkan tipe soal dari tabel 'soal'
        $soalRow = $this->db->table('soal')
                        ->select('tipe_soal')
                        ->where('id_soal', $soal_id)
                        ->get()
                        ->getRowArray();

        // Jika jawaban ditemukan, kembalikan jawaban dan tipe soal
        if ($jawabanRow) {
            return ['jawaban' => $jawabanRow['jawaban'], 'tipe_soal' => $soalRow['tipe_soal']];
        } else {
            // Jika tidak ada jawaban ditemukan, kembalikan null
            return null;
        }
    }


    public function getNextSoalId1($current_soal_id)
    {
        // Ambil data soal berdasarkan id saat ini
        $current_soal = $this->db->table('soal')->where('id_soal', $current_soal_id)->get()->getRow();

        if ($current_soal) {
            // Ambil id soal selanjutnya dengan id yang lebih besar
            $next_soal = $this->db->table('soal')->where('id_soal >', $current_soal_id)->orderBy('id_soal', 'ASC')->get()->getRow();

            if ($next_soal) {
                return $next_soal->id_soal;
            }
        }

        return null; // Mengembalikan null jika tidak ada soal selanjutnya
    }

    public function getNextSoalId($current_soal_id, $ujian_id)
    {
        // Ambil soal selanjutnya yang memiliki ujian_id yang sama
        $next_soal = $this->db->table('soal')
            ->where('id_soal >', $current_soal_id)
            ->where('ujian_id', $ujian_id)
            ->orderBy('id_soal', 'ASC')
            ->get()
            ->getRow();

        return $next_soal ? $next_soal->id_soal : null;
    }

    public function findSoalIdByNomorSoal($ujianId, $nomorSoal)
    {
        // Lakukan query untuk mencari ID soal berdasarkan nomor soal
        $soal = $this->db->table('soal')
                        ->where('ujian_id', $ujianId)
                        ->orderBy('id_soal', 'ASC') // Urutkan berdasarkan ID soal secara ascending
                        ->get()
                        ->getResultArray(); // Ambil semua data soal

        // Cek apakah nomor soal valid
        if ($nomorSoal >= 1 && $nomorSoal <= count($soal)) {
            // Kembalikan ID soal berdasarkan nomor soal
            return $soal[$nomorSoal - 1]['id_soal']; // Kurangi 1 karena indeks array dimulai dari 0
        }

        // Jika nomor soal tidak valid, kembalikan null
        return null;
    }

    public function getPreviousSoalId1($current_soal_id)
    {
        // Ambil data soal berdasarkan id saat ini
        $current_soal = $this->db->table('soal')->where('id_soal', $current_soal_id)->get()->getRow();

        if ($current_soal) {
            // Ambil id soal sebelumnya dengan id yang lebih kecil
            $previous_soal = $this->db->table('soal')->where('id_soal <', $current_soal_id)->orderBy('id_soal', 'DESC')->get()->getRow();

            if ($previous_soal) {
                return $previous_soal->id_soal;
            }
        }

        return null; // Mengembalikan null jika tidak ada soal sebelumnya
    }

    public function getPreviousSoalId($current_soal_id, $ujian_id)
    {
        // Ambil soal sebelumnya yang memiliki ujian_id yang sama
        $previous_soal = $this->db->table('soal')
            ->where('id_soal <', $current_soal_id)
            ->where('ujian_id', $ujian_id)
            ->orderBy('id_soal', 'DESC')
            ->get()
            ->getRow();

        return $previous_soal ? $previous_soal->id_soal : null;
    }

    public function getPesertaPelatihan($id_pelatihan)
    {
        return $this->db->table('peserta')
            ->select('peserta.*, pelatihan.nama_pelatihan')
            ->join('pelatihan', 'pelatihan.id_pelatihan = peserta.pelatihan_id')
            ->where('peserta.pelatihan_id', $id_pelatihan)
            ->get()
            ->getResultArray();
    }

    public function getPelatihanDenganJumlahPeserta()
    {
        return $this->db->table('pelatihan')
            ->select('pelatihan.*, COUNT(peserta.id_peserta) AS jumlah_peserta')
            ->join('peserta', 'peserta.pelatihan_id = pelatihan.id_pelatihan', 'left')
            ->groupBy('pelatihan.id_pelatihan')
            ->get()
            ->getResultArray();
    }

    public function getPeserta()
    {
        return $this->db->query("SELECT * FROM peserta
                                 INNER JOIN pelatihan ON peserta.pelatihan_id = pelatihan.id_pelatihan
                                 INNER JOIN user ON peserta.user_id = user.id_user
                                 ORDER BY peserta.id_peserta DESC ")->getResultArray();
    }

    public function getPeserta2()
    {
        return $this->db->query("SELECT * FROM peserta
                                 INNER JOIN pelatihan ON peserta.pelatihan_id = pelatihan.id_pelatihan
                                 ORDER BY peserta.id_peserta DESC ")->getResultArray();
    }

    public function getAdministrasi()
    {
        return $this->db->query("SELECT * FROM administrasi
                                 INNER JOIN user ON administrasi.user_id = user.id_user
                                 ORDER BY administrasi.id_administrasi DESC ")->getResultArray();
    }

    public function getKepalaBLK()
    {
        return $this->db->query("SELECT * FROM kepala_blk
                                 INNER JOIN user ON kepala_blk.user_id = user.id_user
                                 ORDER BY kepala_blk.id_kepala_blk DESC ")->getResultArray();
    }

    public function getPilganById($id)
    {
        return $this->db->table('pilgan')->where('soal_id', $id)->get()->getResultArray();
    }

    public function getUraianById($id)
    {
        return $this->db->table('uraian')->where('soal_id', $id)->get()->getResultArray();
    }

    public function getBenarSalahById($id)
    {
        return $this->db->table('benarsalah')->where('soal_id', $id)->get()->getResultArray();
    }

    public function updatePilgan($data, $id)
    {
        return $this->db->table('pilgan')->update($data, ['id_pilgan' => $id]);
    }

    public function getUserById($id)
    {
        return $this->db->table('user')->where('id_user', $id)->get()->getRowArray();
    }

    public function getPesertaByPelatihan($pelatihan_id)
    {
        return $this->db->table('peserta')
            ->where('pelatihan_id', $pelatihan_id)
            ->where('status_peserta', 'Lolos')
            ->get()
            ->getResultArray();
    }

    public function getHasilSeleksiByPelatihan($pelatihan_id)
    {
        // Cek query yang dijalankan
        return $this->db->table('hasil_seleksi')
            ->select('hasil_seleksi.*, peserta.email_peserta, peserta.nama_peserta, pelatihan.nama_pelatihan')
            ->join('peserta', 'peserta.id_peserta = hasil_seleksi.peserta_id')
            ->join('pelatihan', 'pelatihan.id_pelatihan = hasil_seleksi.pelatihan_id')
            ->where('hasil_seleksi.pelatihan_id', $pelatihan_id)
            ->get()
            ->getResultArray();
    }

    public function getHasilSeleksiByPeserta($pelatihan_id, $peserta_id)
    {
        return $this->db->table('hasil_seleksi')
            ->select('hasil_seleksi.*, 
                    peserta.nama_peserta, 
                    pelatihan.nama_pelatihan, 
                    pelatihan.daftar_hasil_seleksi, 
                    hasil_pengetahuan.pengetahuan_hasil, 
                    hasil_wawancara.wawancara_hasil')
            ->join('peserta', 'peserta.id_peserta = hasil_seleksi.peserta_id')
            ->join('pelatihan', 'pelatihan.id_pelatihan = hasil_seleksi.pelatihan_id')
            ->join('hasil_pengetahuan', 'hasil_pengetahuan.id_hasil = hasil_seleksi.pengetahuan_hasil_id')
            ->join('hasil_wawancara', 'hasil_wawancara.id_wawancara = hasil_seleksi.wawancara_hasil_id')
            ->where('hasil_seleksi.pelatihan_id', $pelatihan_id)
            ->where('hasil_seleksi.peserta_id', $peserta_id)
            //->where('peserta.status_peserta', 'Lolos')
            ->get()
            ->getRowArray();
    }

    public function getPesertaTidakLolosAdministratif($pelatihan_id)
    {
        return $this->db->table('peserta')
            ->select('peserta.*, pelatihan.nama_pelatihan, pelatihan.jenis_pelatihan') // Tambahkan nama_pelatihan
            ->join('pelatihan', 'pelatihan.id_pelatihan = peserta.pelatihan_id')
            ->where('peserta.pelatihan_id', $pelatihan_id)
            ->where('peserta.status_peserta', 'Tidak Lolos Administrasi')
            ->get()
            ->getResultArray();
    }

    public function getUjianPelatihan($pelatihan_id)
    {
        return $this->db->table('ujian')
            ->where('pelatihan_id', $pelatihan_id)
            ->get()
            ->getRowArray();
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada manajemen data user
         */

        return $this->db->table('user')
            ->where('id_user !=', $id)
            ->get()
            ->getResultArray();
            $this->db->where('id_user !=', $id);
    }

    public function getPeserta1($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada manajemen data user
         */

        return $this->db->table('peserta')
            ->where('id_peserta !=', $id)
            ->get()
            ->getResultArray();
            $this->db->where('id_peserta !=', $id);
    }

    public function isEmailExist($email)
    {
        return $this->db->table('user')
                        ->selectCount('email')
                        ->where('email', $email)
                        ->get()
                        ->getRow()
                        ->email > 0; // Jika email sudah ada, hasilnya lebih dari 0
    }

    public function isUserExist($username)
    {
        return $this->db->table('user')
                        ->selectCount('username')
                        ->where('username', $username)
                        ->get()
                        ->getRow()
                        ->username > 0; // Jika email sudah ada, hasilnya lebih dari 0
    }

    public function updateUser($data, $id)
    {
        return $this->db->table('user')->update($data, ['id_user' => $id]);
    }

    public function cekUser($username, $email)
    {
        return $this->db->table('user')
            ->where('username', $username)
            ->orWhere('email', $email)
            ->get()
            ->getRowArray(); // Jika ditemukan, return data; jika tidak, return null
    }

    public function detailkode1($table, $pk, $id)
    {
        // Gunakan parameterized query untuk mencegah SQL injection
        $query = $this->db->query("SELECT * FROM $table WHERE $pk = ?", [$id]);

        // Periksa apakah query mengembalikan hasil
        if ($query->resultID->num_rows > 0) {
            // Ambil baris hasil sebagai array asosiatif
            return $query->getRowArray();
        } else {
            // Jika tidak ada hasil, kembalikan null atau nilai default lainnya sesuai kebutuhan
            return null;
        }
    }

    public function getPelatihanPeserta($id_user)
    {
        return $this->db->query("
            SELECT pelatihan.*, peserta.pelatihan_id
            FROM peserta
            INNER JOIN pelatihan ON peserta.pelatihan_id = pelatihan.id_pelatihan
            WHERE peserta.user_id = ?
        ", [$id_user])->getRowArray();
    }

    public function getHasilPeserta($id_user)
    {
        return $this->db->query("
            SELECT pelatihan.*, peserta.pelatihan_id, peserta.id_peserta, hasil_seleksi.hasil_tes_seleksi
            FROM peserta
            INNER JOIN pelatihan ON peserta.pelatihan_id = pelatihan.id_pelatihan
            INNER JOIN hasil_seleksi ON hasil_seleksi.peserta_id = peserta.id_peserta
            WHERE peserta.user_id = ?
        ", [$id_user])->getResultArray();
    }

    public function getUjianByPelatihan($pelatihan_id)
    {
        return $this->db->query("
            SELECT ujian.*, pelatihan.nama_pelatihan
            FROM ujian
            INNER JOIN pelatihan ON ujian.pelatihan_id = pelatihan.id_pelatihan
            WHERE ujian.pelatihan_id = ?
            ORDER BY ujian.id_ujian DESC
        ", [$pelatihan_id])->getResultArray();
    }
    
    public function completeExam($id_user, $id_ujian) {
        $data = [
            'user_id' => $id_user,
            'ujian_id' => $id_ujian,
            'status' => 'completed'
        ];
        // Check if the record already exists
        $exists = $this->db->table('exam_status')
                           ->where(['user_id' => $id_user, 'ujian_id' => $id_ujian])
                           ->countAllResults();
    
        if ($exists > 0) {
            // Update the existing record
            $this->db->table('exam_status')
                     ->where(['user_id' => $id_user, 'ujian_id' => $id_ujian])
                     ->update($data);
        } else {
            // Insert a new record
            $this->db->table('exam_status')->insert($data);
        }
    }
    
    public function getExamStatus($id_user, $id_ujian) {
        return $this->db->table('exam_status')
                        ->where(['user_id' => $id_user, 'ujian_id' => $id_ujian])
                        ->get()
                        ->getRowArray();
    }

    public function getDaftarPeserta($pelatihanId) {
        $query = $this->db->table('peserta')
                          ->select('peserta.*, hasil_pengetahuan.pengetahuan_hasil')
                          ->join('hasil_pengetahuan', 'peserta.id_peserta = hasil_pengetahuan.peserta_id', 'left')
                          ->where('peserta.pelatihan_id', $pelatihanId)
                          ->where('status_peserta', 'Lolos')
                          ->get();
    
        return $query->getResultArray(); // Mengembalikan hasil sebagai array
    }    

    public function getPesertaWawancara($pelatihanId) {
        $query = $this->db->table('peserta')
                          ->select('peserta.*, hasil_wawancara.wawancara_hasil')
                          ->join('hasil_wawancara', 'peserta.id_peserta = hasil_wawancara.peserta_id', 'left')
                          ->where('peserta.pelatihan_id', $pelatihanId)
                          ->where('status_peserta', 'Lolos')
                          ->get();
    
        return $query->getResultArray(); // Mengembalikan hasil sebagai array
    }   

    public function getPesertaSeleksi($pelatihanId)
    {
        $query = $this->db->query("
            SELECT 
                peserta.*, 
                hasil_pengetahuan.pengetahuan_hasil, 
                hasil_pengetahuan.id_hasil AS id_hasil_pengetahuan, 
                hasil_wawancara.wawancara_hasil,
                hasil_wawancara.id_wawancara AS id_hasil_wawancara,
                (IFNULL(hasil_pengetahuan.pengetahuan_hasil, 0) + IFNULL(hasil_wawancara.wawancara_hasil, 0)) / 2 AS hasil_total_seleksi
            FROM peserta
            LEFT JOIN hasil_pengetahuan ON peserta.id_peserta = hasil_pengetahuan.peserta_id
            LEFT JOIN hasil_wawancara ON peserta.id_peserta = hasil_wawancara.peserta_id
            WHERE peserta.pelatihan_id = ?
                AND peserta.status_peserta = 'Lolos'
            ORDER BY hasil_total_seleksi DESC
        ", [$pelatihanId]);

        return $query->getResultArray();
    }        

    public function simpanHasilSeleksi($data)
    {
        // Cek apakah data sudah ada
        $query = $this->db->query("
            SELECT id_hasil_seleksi 
            FROM hasil_seleksi 
            WHERE pelatihan_id = ? AND peserta_id = ?
        ", [$data['pelatihan_id'], $data['peserta_id']]);

        $existing = $query->getRowArray();

        if ($existing) {
            // Perbarui data
            $this->db->table('hasil_seleksi')
                     ->where('id_hasil_seleksi', $existing['id_hasil_seleksi'])
                     ->update($data);
        } else {
            // Simpan data baru
            $this->db->table('hasil_seleksi')
                     ->insert($data);
        }
    }

    public function getUjianSoal($pelatihanId)
    {
        $query = $this->db->table('ujian')
                        ->select('ujian.*, pelatihan.*')
                        ->join('pelatihan', 'ujian.pelatihan_id = pelatihan.id_pelatihan', 'left')
                        ->where('ujian.pelatihan_id', $pelatihanId)
                        ->get();

        return $query->getRow(); 
    }

    public function getSoalPengetahuan($pelatihanId)
    {
        $query = $this->db->table('soal')
                        ->select('soal.*, ujian.*')
                        ->join('ujian', 'soal.ujian_id = ujian.id_ujian', 'left')
                        ->where('ujian.pelatihan_id', $pelatihanId)
                        ->get();

        return $query->getResultArray(); 
    }

    public function getSoalWawancara($pelatihanId)
    {
        $query = $this->db->table('soal_wawancara')
                        ->select('soal_wawancara.*, pelatihan.*')
                        ->join('pelatihan', 'soal_wawancara.pelatihan_id = pelatihan.id_pelatihan', 'left')
                        ->where('soal_wawancara.pelatihan_id', $pelatihanId)
                        ->get();

        return $query->getResultArray(); 
    }

    public function getDaftarHasil($userId) {
        $query = $this->db->query("
            SELECT 
                jawaban_sementara.*, 
                soal.*, 
                pilgan.*,
                (soal.bobot_soal * jawaban_sementara.jawab_benar) AS skor
            FROM jawaban_sementara
            INNER JOIN soal ON jawaban_sementara.soal_id = soal.id_soal
            LEFT JOIN (
                SELECT pilgan.*
                FROM pilgan
                GROUP BY pilgan.soal_id
            ) AS pilgan ON soal.id_soal = pilgan.soal_id
            WHERE jawaban_sementara.user_id = ?        
        ", [$userId]);
    
        return $query->getResultArray();
    }            

    public function getHasilSeleksiByPelatihanPrint($pelatihan_id)
    {
        return $this->db->table('hasil_seleksi')
            ->select('hasil_seleksi.*, peserta.nip_peserta, peserta.nama_peserta, peserta.jk_peserta, peserta.desa_peserta, peserta.rt_peserta, peserta.rw_peserta, peserta.kecamatan_peserta')
            ->join('peserta', 'peserta.id_peserta = hasil_seleksi.peserta_id')
            ->where('hasil_seleksi.pelatihan_id', $pelatihan_id)
            ->get()
            ->getResultArray();
    }



    public function getHasilSeleksiPeserta($peserta_id, $pelatihan_id)
    {
        // Melakukan join untuk mengambil nilai tes dari tabel hasil_pengetahuan dan hasil_wawancara
        return $this->db->table('hasil_seleksi hs')
            ->join('hasil_pengetahuan hp', 'hs.peserta_id = hp.peserta_id', 'left')
            ->join('hasil_wawancara hw', 'hs.peserta_id = hw.peserta_id', 'left')
            ->where('hs.peserta_id', $peserta_id)
            ->where('hs.pelatihan_id', $pelatihan_id)
            ->get()
            ->getRowArray();
    }


    public function getHasilWawancara($userId) {
        $builder = $this->db->table('jawaban_wawancara');
        $builder->select('jawaban_wawancara.*, soal_wawancara.*');
        $builder->join('soal_wawancara', 'jawaban_wawancara.soal_wawancara_id = soal_wawancara.id_soal_wawancara');
        $builder->where('jawaban_wawancara.user_id', $userId);
        $query = $builder->get();
        
        return $query->getResultArray();
    }    

    // Fungsi untuk mendapatkan detail soal, uraian, dan jawaban sementara
    public function getDetailUraian($idSoal, $idUser) {
        $query = $this->db->query("
            SELECT soal.*, jawaban_sementara.*
            FROM soal
            LEFT JOIN jawaban_sementara ON soal.id_soal = jawaban_sementara.soal_id
            WHERE soal.id_soal = ? AND jawaban_sementara.user_id = ?
        ", array($idSoal, $idUser));

        return $query->getResult(); // Mengembalikan hasil sebagai array
    }     

    // Fungsi untuk mendapatkan detail soal, uraian, dan jawaban sementara
    public function getDetailJawaban($idSoal) {
        $query = $this->db->query("
            SELECT uraian.*, soal.*
            FROM uraian
            INNER JOIN soal ON uraian.soal_id = soal.id_soal
            WHERE uraian.soal_id = ?
            LIMIT 1
        ", array($idSoal)); // Menambahkan LIMIT 1 agar hanya mengembalikan satu baris

        return $query->getRow(); // Mengembalikan hasil sebagai objek satu baris
    }

    public function updateuraian($table, $primaryKey, $id, $column, $value) {
        $data = [$column => $value];
        return $this->db->table($table)->where($primaryKey, $id)->update($data);
    }

    public function getDataPeserta($id)
    {
        $query = $this->db->table('peserta')
                          ->where('user_id', $id)
                          ->get();
        
        return $query->getRow(); // Mengembalikan hasil sebagai objek satu baris
    }

    public function check_peserta_exists($userId)
    {
        // Query untuk memeriksa apakah peserta_id sudah ada di tabel hasil_pengetahuan
        $result = $this->db->table('hasil_pengetahuan')
            ->where('peserta_id', $userId)
            ->countAllResults();

        // Jika jumlah baris hasil query lebih dari 0, peserta_id sudah ada
        return $result > 0;
    }

    public function check_wawancara_exists($userId)
    {
        // Query untuk memeriksa apakah peserta_id sudah ada di tabel hasil_pengetahuan
        $result = $this->db->table('hasil_wawancara')
            ->where('peserta_id', $userId)
            ->countAllResults();

        // Jika jumlah baris hasil query lebih dari 0, peserta_id sudah ada
        return $result > 0;
    }

    public function update_total_skor($userId, $totalSkor)
    {
        // Query untuk melakukan update total skor untuk peserta_id yang sesuai
        $update = $this->db->table('hasil_pengetahuan')
            ->where('peserta_id', $userId)
            ->update(['pengetahuan_hasil' => $totalSkor]);

        // Mengembalikan true jika update berhasil, false jika gagal
        return $update;
    }

    public function update_total_wawancara($userId, $totalSkor)
    {
        // Query untuk melakukan update total skor untuk peserta_id yang sesuai
        $update = $this->db->table('hasil_wawancara')
            ->where('peserta_id', $userId)
            ->update(['wawancara_hasil' => $totalSkor]);

        // Mengembalikan true jika update berhasil, false jika gagal
        return $update;
    }

    public function count($table)
    {
        return $this->db->table($table)->countAllResults();
    }
    
    public function getPesertaDetail($id_peserta, $id_pelatihan)
    {
        return $this->db->query("
            SELECT peserta.*, pelatihan.nama_pelatihan
            FROM peserta
            INNER JOIN pelatihan ON peserta.pelatihan_id = pelatihan.id_pelatihan
            WHERE peserta.id_peserta = ? AND peserta.pelatihan_id = ?
        ", [$id_peserta, $id_pelatihan])->getRowArray();
    }

    public function getHasilTesPeserta($id_peserta, $id_pelatihan)
    {
        return $this->db->query("
            SELECT hasil_seleksi.*, hasil_pengetahuan.pengetahuan_hasil AS tes_pengetahuan, hasil_wawancara.wawancara_hasil AS tes_wawancara
            FROM hasil_seleksi
            INNER JOIN hasil_pengetahuan ON hasil_seleksi.pengetahuan_hasil_id = hasil_pengetahuan.id_hasil
            INNER JOIN hasil_wawancara ON hasil_seleksi.wawancara_hasil_id = hasil_wawancara.id_wawancara
            WHERE hasil_seleksi.peserta_id = ? AND hasil_seleksi.pelatihan_id = ?
        ", [$id_peserta, $id_pelatihan])->getResultArray();
    }

    public function getJumlahPeserta($tahun = null)
    {
        $query = $this->db->table('pelatihan')
            ->select('pelatihan.nama_pelatihan, COUNT(peserta.pelatihan_id) AS jumlah_peserta')
            ->join('peserta', 'peserta.pelatihan_id = pelatihan.id_pelatihan', 'left');

        if (!empty($tahun)) { // Jika tahun dipilih, filter berdasarkan tahun
            $query->where('YEAR(pelatihan.tahun_pelatihan)', $tahun);
        }

        return $query->groupBy('pelatihan.id_pelatihan')->get()->getResultArray();
    }

    public function getTahunPelatihan()
    {
        return $this->db->table('pelatihan')
            ->select('DISTINCT YEAR(tahun_pelatihan) AS tahun_pelatihan')
            ->orderBy('tahun_pelatihan', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function filterPelatihan($tahun_mulai, $tahun_selesai, $jenis = null)
    {
        $builder = $this->db->table('pelatihan');

        // Filter berdasarkan tahun
        $builder->where('tahun_pelatihan >=', $tahun_mulai);
        $builder->where('tahun_pelatihan <=', $tahun_selesai);

        // Filter berdasarkan jenis jika dipilih (bukan "Semua Jenis")
        if (!empty($jenis)) {
            $builder->where('jenis_pelatihan', $jenis);
        }

        // Optional: join peserta untuk jumlah
        $builder->select('pelatihan.*, COUNT(peserta.id_peserta) as jumlah_pendaftar,
                        SUM(CASE WHEN peserta.jk_peserta = "Laki-laki" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_laki,
                        SUM(CASE WHEN peserta.jk_peserta = "Perempuan" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_perempuan');
        $builder->join('peserta', 'peserta.pelatihan_id = pelatihan.id_pelatihan', 'left');
        $builder->join('hasil_seleksi', 'hasil_seleksi.peserta_id = peserta.id_peserta AND hasil_seleksi.pelatihan_id = pelatihan.id_pelatihan', 'left');
        $builder->groupBy('pelatihan.id_pelatihan');

        return $builder->get()->getResultArray();
    }

    public function filterByJenis($jenis)
    {
        return $this->db->table('pelatihan')
            ->select('pelatihan.*, COUNT(peserta.id_peserta) as jumlah_pendaftar,
                        SUM(CASE WHEN peserta.jk_peserta = "Laki-laki" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_laki,
                        SUM(CASE WHEN peserta.jk_peserta = "Perempuan" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_perempuan')
            ->join('peserta', 'peserta.pelatihan_id = pelatihan.id_pelatihan', 'left')
            ->join('hasil_seleksi', 'hasil_seleksi.peserta_id = peserta.id_peserta AND hasil_seleksi.pelatihan_id = pelatihan.id_pelatihan', 'left')
            ->groupBy('pelatihan.id_pelatihan')
            ->where('jenis_pelatihan', $jenis)
            ->get()
            ->getResultArray();
    }

    public function getAllPelatihanDenganJumlahPeserta()
    {
        return $this->db->table('pelatihan')
            ->select('pelatihan.*, COUNT(peserta.id_peserta) as jumlah_pendaftar, 
                        SUM(CASE WHEN peserta.jk_peserta = "Laki-laki" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_laki,
                        SUM(CASE WHEN peserta.jk_peserta = "Perempuan" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_perempuan')
            ->join('peserta', 'peserta.pelatihan_id = pelatihan.id_pelatihan', 'left')
            ->join('hasil_seleksi', 'hasil_seleksi.peserta_id = peserta.id_peserta AND hasil_seleksi.pelatihan_id = pelatihan.id_pelatihan', 'left')
            ->groupBy('pelatihan.id_pelatihan')
            ->get()
            ->getResultArray();
    }

    public function getPelatihanFiltered($tahun_mulai, $tahun_selesai, $jenis = null) 
    {
        $builder = $this->db->table('pelatihan p');
        $builder->select('p.*, COUNT(peserta.id_peserta) AS jumlah_pendaftar,
                        SUM(CASE WHEN peserta.jk_peserta = "Laki-laki" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_laki,
                        SUM(CASE WHEN peserta.jk_peserta = "Perempuan" AND hasil_seleksi.hasil_tes_seleksi = "Lolos" THEN 1 ELSE 0 END) AS jumlah_perempuan
        ');
        $builder->join('peserta', 'peserta.pelatihan_id = p.id_pelatihan', 'left');
        $builder->join('hasil_seleksi', 'hasil_seleksi.peserta_id = peserta.id_peserta AND hasil_seleksi.pelatihan_id = p.id_pelatihan', 'left');

        if (!empty($tahun_mulai) && !empty($tahun_selesai)) {
            $builder->where('p.tahun_pelatihan >=', $tahun_mulai);
            $builder->where('p.tahun_pelatihan <=', $tahun_selesai);
        }

        if (!empty($jenis)) {
            $builder->where('p.jenis_pelatihan', $jenis);
        }

        $builder->groupBy('p.id_pelatihan');
        return $builder->get()->getResultArray();
    }

    public function getKepalaBLKById($id)
    {
        return $this->db->table('kepala_blk')->where('id_kepala_blk', $id)->get()->getRow();
    }

    public function getPesertaByCategory($kategori)
    {
        $query = $this->db->table('peserta');

        switch ($kategori) {
            case 'jenis_kelamin':
                $query->select("jk_peserta AS jenis_kelamin, COUNT(id_peserta) AS jumlah_peserta")
                      ->groupBy('jk_peserta');
                break;
            case 'usia':
                $query->select("YEAR(CURDATE()) - YEAR(tgl_lahir_peserta) AS usia, COUNT(id_peserta) AS jumlah_peserta")
                      ->groupBy('usia');
                break;
            case 'daerah':
                $query->select("kecamatan_peserta AS daerah, COUNT(id_peserta) AS jumlah_peserta")
                      ->groupBy('kecamatan_peserta');
                break;
            default:
                return [];
        }

        return $query->get()->getResultArray();
    }

}