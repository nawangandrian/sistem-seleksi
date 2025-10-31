<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Halaman Awal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header1, .footer {
            text-align: center;
        }
        .header1 h2, .header1 p {
            margin: 0;
        }
        .header1 p {
            font-size: 12px;
        }
        .header, .footer {
            text-align: center;
        }
        .header h2, .header p {
            margin: 0;
        }
        .header p {
            font-size: 12px;
        }
        .logo {
            display: inline-block;
            vertical-align: middle;
            float: left;
            width: 80px; /* Sesuaikan ukuran logo sesuai kebutuhan */
        }
        .header-text {
            margin-left: -5rem;
            display: inline-block;
            vertical-align: middle;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 2px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .note {
            margin-top: 20px;
            font-size: 12px;
        }
        .signature {
            margin-top: 40px;
            float: right;
            text-align: center;
        }
        .signature p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="<?= base_url('public/logo.png') ?>" alt="Logo Pemerintah Kabupaten Kudus" class="logo">
        <div class="header-text">
            <h2>PEMERINTAH KABUPATEN KUDUS</h2>
            <p>DINAS TENAGA KERJA, PERINDUSTRIAN, KOPERASI DAN USAHA KECIL DAN MENENGAH</p>
            <p>UPTD BALAI LATIHAN KERJA</p>
            <p>Jl. Conge Ngembalrejo No 99 Kudus 59327 Telp (0291) 435190, 438041.411640 Fax: (0291) 435190.438041</p>
        </div>
    </div>
    <hr style="border: 1px solid black;">
    <div class="header1">
        <h3><u>PENGUMUMAN</u></h3>
        <h3>HASIL SELEKSI PESERTA PELATIHAN <?php echo $nama_pelatihan->jenis_pelatihan ?> BLK KUDUS TAHUN <span id="tahun"></span></h3>
        <h4 style="text-transform: uppercase; font-size: 27px;">KEJURUAN : <?= $nama_pelatihan->nama_pelatihan ?></h4>
        <br>
        <p>Sesuai dengan hasil Rekrutmen dan Seleksi Calon Peserta Pelatihan <?= $nama_pelatihan->jenis_pelatihan; ?> BLK Kudus Program Pelatihan <?= $nama_pelatihan->nama_pelatihan ?> yang telah dilaksanakan, dengan ini diumumkan peserta yang dinyatakan LULUS sebagai berikut :</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table table-borderless">
                <tr>
                    <td><strong>No Pendaftaran</strong></td>
                    <td>:</td>
                    <td><?= $peserta['nip_peserta'] ?></td>
                </tr>
                <tr>
                    <td><strong>Nama Peserta</strong></td>
                    <td>:</td>
                    <td><?= $peserta['nama_peserta'] ?></td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>:</td>
                    <td><?= $peserta['desa_peserta'] ?>, RT <?= $peserta['rt_peserta'] ?> / RW <?= $peserta['rw_peserta'] ?>, <?= $peserta['kecamatan_peserta'] ?></td>
                </tr>
                <tr>
                    <td><strong>Jenis Kelamin</strong></td>
                    <td>:</td>
                    <td><?= $peserta['jk_peserta'] ?></td>
                </tr>
                <tr>
                    <td><strong>Pelatihan</strong></td>
                    <td>:</td>
                    <td><?= $peserta['nama_pelatihan'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center"><strong>No</strong></td>
                    <td class="text-center"><strong>Tes Seleksi</strong></td>
                    <td class="text-center"><strong>Skor Tes</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($hasilSeleksi)): ?>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">Tes Pengetahuan</td>
                        <td class="text-center"><?= $hasilSeleksi['pengetahuan_hasil'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">Tes Wawancara</td>
                        <td class="text-center"><?= $hasilSeleksi['wawancara_hasil'] ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data hasil seleksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <?php if (!empty($hasilSeleksi)): ?>
                    <tr>
                        <td colspan="2" align="right"><strong>Total Skor Seleksi: </strong></td>
                        <td class="text-center"><?= $hasilSeleksi['hasil_total_seleksi'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><strong>Hasil Tes Seleksi: </strong></td>
                        <td class="text-center"><?= $hasilSeleksi['hasil_tes_seleksi'] ?></td>
                    </tr>
                <?php endif; ?>
            </tfoot>
        </table>
        </div>
    </div>
    <br>
    <div class="note">
        <p>Calon Peserta yang LULUS DIHARUSKAN datang sendiri untuk melakukan DAFTAR ULANG dengan membawa berkas administrasi:</p>
        <div style="margin-left: 1rem;">
            <p>   1. Copy KTP sebanyak 4 lembar</p>
            <p>   2. Pas Foto ukuran 3 x 4 background merah sebanyak 4 lembar</p>
            <p>   3. Fotokopi KTP sebanyak 1 lembar (kertas F4)</p>
            <p>   4. Fotokopi Kartu Keluarga sebanyak 1 lembar (kertas F4)</p>
            <p>   5. Materai 10000 sebanyak 1 lembar</p>
            <p>   (Berkas Dokumen dimasukkan ke dalam Stopmap Kertas Warna Bebas)</p>
        </div>
    </div>

    <script>
        // Fungsi untuk mencetak hanya halaman awal
        function printFirstPage() {
            window.print();
            window.onafterprint = function () {
                //window.history.back();  // Kembali ke halaman sebelumnya setelah mencetak
            }
        }

        // Event listener untuk mencetak saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            var tahun = new Date().getFullYear();
            document.getElementById('tahun').innerText = tahun;
        });

        // Panggil fungsi printFirstPage setelah DOM siap
        printFirstPage();
    </script>

</body>
</html>
