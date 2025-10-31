<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pelatihan</title>
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
    
        // Tentukan tahun awal dan akhir jika kosong berdasarkan data pelatihan
        if (empty($tahun_mulai) && empty($tahun_selesai) && !empty($pelatihan)) {
            $tahun_pelatihan_array = array_column($pelatihan, 'tahun_pelatihan');
            $tahun_min = min($tahun_pelatihan_array);
            $tahun_max = max($tahun_pelatihan_array);
        } else {
            $tahun_min = $tahun_mulai;
            $tahun_max = $tahun_selesai;
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
            <h4><u>LAPORAN</u></h4>
            <h5>
                LAPORAN PELATIHAN PERIODE TAHUN 
                <?= ($tahun_min === $tahun_max) ? $tahun_min : "$tahun_min - $tahun_max" ?>
                <?= $jenis_pelatihan ?? '' ?>
                <br>UPTD BLK KUDUS
            </h5>
    </div>

    <table>
        <thead>
            <tr>
                <th width="30" style="text-align: center;">No.</th>
                <th style="text-align: center;">Nama Pelatihan</th>
                <th style="text-align: center;">Tahun Pelatihan</th>
                <th style="text-align: center;">Jenis Pelatihan</th>
                <th style="text-align: center;">Lama Pelatihan</th>
                <th style="text-align: center;">Jumlah Laki-laki</th>
                <th style="text-align: center;">Jumlah Perempuan</th>
                <th style="text-align: center;">Total Peserta</th>
                <th style="text-align: center;">Jumlah Pendaftar</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($pelatihan) : ?>
                <?php $no = 1; ?>
                <?php foreach ($pelatihan as $b) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($b['nama_pelatihan']) ?></td>
                        <td style="text-align: center;"><?= esc($b['tahun_pelatihan']) ?></td>
                        <td style="text-align: center;"><?= esc($b['jenis_pelatihan']) ?></td>
                        <td style="text-align: center;"><?= esc($b['lama_pelatihan']) ?> hari</td>
                        <td style="text-align: center;"><?= esc($b['jumlah_laki']) ?> orang</td>
                        <td style="text-align: center;"><?= esc($b['jumlah_perempuan']) ?> orang</td>
                        <td style="text-align: center;"><?= esc($b['jumlah_peserta']) ?> orang</td>
                        <td style="text-align: center;"><?= esc($b['jumlah_pendaftar'] ?? '0') ?> orang</td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Data Kosong</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>

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
