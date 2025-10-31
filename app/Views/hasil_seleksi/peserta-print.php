<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Seleksi Peserta Pelatihan</title>
    <style>
        @page {
            /*size: 230mm 400mm;/* Kertas Panjang Custom */
            size: F4;
            margin-top: -7mm;
        }
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
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .note {
        margin-top: -5px;
        font-size: 12px;
        line-height: 1.2;
        }
        .note p {
            margin: 1px;
            padding: 1px;
        }
        .note div {
            margin-left: 1rem;
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tahun = new Date().getFullYear();
            document.getElementById('tahun').innerText = tahun;
            document.getElementById('tahun1').innerText = tahun;
        });
    </script>
</head>
<body>
    <?php
        // Format ulang tanggal ke dalam format: 04 Maret 2025
        function formatTanggal($tanggal) {
            $bulan = [
                '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
            ];
            $tgl = date('d', strtotime($tanggal));
            $bln = $bulan[date('m', strtotime($tanggal))];
            $thn = date('Y', strtotime($tanggal));
            return "$tgl $bln $thn";
        }
        ?>
    <div class="header">
        <img src="<?= base_url('public/logo.png') ?>" alt="Logo Pemerintah Kabupaten Kudus" class="logo">
        <div class="header-text">
            <h3>PEMERINTAH KABUPATEN KUDUS</h3>
            <p>DINAS TENAGA KERJA, PERINDUSTRIAN, KOPERASI DAN USAHA KECIL DAN MENENGAH</p>
            <p>UPTD BALAI LATIHAN KERJA</p>
            <p>Jl. Conge Ngembalrejo No 99 Kudus 59327 Telp (0291) 435190, 438041.411640 Fax: (0291) 435190.438041</p>
            
        </div>
    </div>
    <hr style="border: 1px solid black;">
    <div class="header1">
            <h4><u>PENGUMUMAN</u></h4>
            <h5>HASIL SELEKSI PESERTA PELATIHAN <?= $nama_pelatihan->jenis_pelatihan ?> BLK KUDUS TAHUN <span id="tahun"></span></h5>
            <h5 style="text-transform: uppercase; font-size: 20px;">KEJURUAN : <?= $nama_pelatihan->nama_pelatihan ?></h5>
            <p style="margin-top: 5px;">Sesuai dengan hasil Rekrutmen dan Seleksi Calon Peserta Pelatihan <?= $nama_pelatihan->jenis_pelatihan ?> BLK Kudus Program Pelatihan <?= $nama_pelatihan->nama_pelatihan ?> yang dilaksanakan tanggal <?php echo formatTanggal($tanggalSeleksi); ?> dengan ini diumumkan peserta yang dinyatakan LULUS sebagai berikut :</p>
    </div>

    <table>
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center;">NO</th>
                <th rowspan="2" style="text-align: center;">NO. PENDAFTARAN</th>
                <th rowspan="2" style="text-align: center;">NAMA</th>
                <th rowspan="2" style="text-align: center;">L/P</th>
                <th colspan="4" style="text-align: center;">ALAMAT</th>
                <th rowspan="2" style="text-align: center;">HASIL TES</th>
            </tr>
            <tr>
                <th style="text-align: center;">Desa</th>
                <th style="text-align: center;">RT</th>
                <th style="text-align: center;">RW</th>
                <th style="text-align: center;">Kecamatan</th>
            </tr>
        </thead>
        <tbody>

            <?php if ($pelatihan) : ?>
                <?php $no = 1; ?>
                <?php foreach ($pelatihan as $b) : ?>
                    <?php if ($b['hasil_tes_seleksi'] === 'Lolos') : ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?></td>
                            <td><?= $b['nip_peserta']; ?></td>
                            <td><?= $b['nama_peserta']; ?></td>
                            <td style="text-align: center;"><?= $b['jk_peserta']; ?></td>
                            <td><?= $b['desa_peserta']; ?></td>
                            <td style="text-align: center;"><?= $b['rt_peserta']; ?></td>
                            <td style="text-align: center;"><?= $b['rw_peserta']; ?></td>
                            <td><?= $b['kecamatan_peserta']; ?></td>
                            <td style="text-align: center;"><?= $b['hasil_tes_seleksi']; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="9" class="text-center">Data Kosong</td>
                </tr>
            <?php endif; ?>
            <!-- Add other rows as necessary -->
        </tbody>
    </table>
    <br>
    <div class="note">
        <p>1. Calon Peserta yang LULUS DIHARUSKAN datang sendiri untuk melakukan DAFTAR ULANG dengan membawa berkas administrasi:</p>
        <div style="margin-left: 1rem;">
            <p>   1. Copy KTP sebanyak 4 lembar</p>
            <p>   2. Pas Foto ukuran 3 x 4 background merah sebanyak 4 lembar</p>
            <p>   3. Fotokopi KTP sebanyak 1 lembar (kertas F4)</p>
            <p>   4. Fotokopi Kartu Keluarga sebanyak 1 lembar (kertas F4)</p>
            <p>   5. Materai 10000 sebanyak 1 lembar</p>
            <p>   (Berkas Dokumen dimasukkan ke dalam Stopmap Kertas Warna Bebas)</p>
        </div>

        <?php
            function getHari($tanggal) {
                $hari = date('l', strtotime($tanggal)); // Ambil nama hari dalam bahasa Inggris

                // Konversi ke Bahasa Indonesia
                $hariIndo = [
                    'Sunday'    => 'Minggu',
                    'Monday'    => 'Senin',
                    'Tuesday'   => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday'  => 'Kamis',
                    'Friday'    => 'Jumat',
                    'Saturday'  => 'Sabtu'
                ];

                return $hariIndo[$hari]; // Ubah ke Bahasa Indonesia
            }
        ?>

        <p>2. Daftar Ulang mulai Tanggal <?php echo formatTanggal($tanggalDaftarUlang); ?> pukul <?php echo $waktuDaftarUlang; ?> WIB di <?php echo $tempatDaftarUlang; ?></p>

        <p>3. Masuk Pelatihan dimulai Hari <strong><?php echo getHari($tanggalMasukPelatihan); ?></strong> tanggal <?php echo formatTanggal($tanggalMasukPelatihan); ?> Pukul <?php echo $waktuMasukPelatihan; ?> s.d. <?php echo $waktuSelesaiPelatihan; ?> WIB TEPAT</p>

        <p>4. Peserta <?= $nama_pelatihan->jenis_pelatihan ?> Tahun <span id="tahun1"></span> tidak dipungut biaya apapun alias GRATIS</p>

    </div>

    <div class="signature">
        <p id="date"></p>
        <p>Mengetahui,</p>
        <p>Ka. UPTD Balai Latihan Kerja Kab. Kudus</p>
        <br><br><br>
        <p><u><?= $kepalaBLK->nama_kepala_blk ?></u></p>
        <p>NIP <?= $kepalaBLK->nip_kepala_blk ?></p>
    </div>

    <script>

        function formatDate(date) {
            const options = { day: '2-digit', month: 'long', year: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

        const today = new Date();
        const formattedDate = formatDate(today);
        document.getElementById('date').textContent = `Kudus, ${formattedDate}`;

        window.print();

        window.onafterprint = function () {
            //window.history.back();
        }
    </script>
</body>
</html>
