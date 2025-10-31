
<!-- Custom fonts for this template-->
<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/css/fonts.min.css'); ?>" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

<!-- Datepicker -->
<link href="<?= base_url('assets/vendor/daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

<!-- DataTables -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet">

<!-- Gijgo Datepicker -->
<link href="<?= base_url('assets/vendor/gijgo/css/gijgo.min.css') ?>" rel="stylesheet">

<!-- membuat datatables -->
<script type="text/javascript">
        $(document).ready(function(){ $('#dataTable').DataTable(); });
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Datepicker -->
    <script src="<?= base_url('assets/vendor/daterangepicker/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/daterangepicker/daterangepicker.min.js'); ?>"></script>

    <!-- DataTables -->
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('buttons/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js'); ?>"></script>

    <!-- Gijgo Datepicker -->
    <script src="<?= base_url('assets/vendor/gijgo/js/gijgo.min.js'); ?>"></script>
    <style>
    .img-profil2 {
        width: 30px; /* Sesuaikan lebar gambar sesuai kebutuhan */
        height: 30px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
        object-fit: cover; /* Biarkan gambar menutupi seluruh area yang tersedia */
        border: 2.5px solid blue; /* Atur ketebalan dan warna border sesuai kebutuhan */
        }
    </style>
    <style>
        .table-dark-bordered {
            border: 1px solid #333; 
            border-collapse: collapse;
        }
        .table-dark-bordered th,
        .table-dark-bordered td {
            border: 1px solid #333; 
            padding: 8px;
            text-align: left;
        }
    </style>
<body style="background-image: url('img/bg10.jpg'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 0.5rem; padding: 0 15px;">

<div class="clearfix">
    <div class="float-left">
        <h1 class="h3 m-0 text-primary-800"><?= $judul; ?></h1>
    </div>
</div>
<hr style="border-top: 2px solid black;">
    <!-- Pesan flash data -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    
    <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col-auto">
                    <a href="<?= base_url('halseleksi/peserta_hasil') ?>" class="btn btn-sm btn-secondary btn-icon-split" id="addInput">
                        <span class="icon">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="text">
                            Kembali
                        </span>
                    </a>
                </div>
                <?php if (!empty($hasilSeleksi) && $hasilSeleksi['hasil_tes_seleksi'] !== 'Tidak Lolos') : ?>
                    <div class="col-auto">
                        <a class="btn btn-sm btn-danger btn-icon-split" id="addInput" data-toggle="modal" data-target="#printModal">
                            <span class="icon" style="color: white;">
                                <i class="fa-solid fa-print"></i>
                            </span>
                            <span class="text" style="color: white;">
                                Print
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="card-body">
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
                <table class="table table-dark-bordered" style="border: 1px solid #333; border-collapse: collapse;">
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
                                <td class="text-center"><strong>Tes Pengetahuan</strong></td>
                                <td class="text-center"><?= $hasilSeleksi['pengetahuan_hasil'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center"><strong>Tes Wawancara</strong></td>
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
                                <td colspan="2" align="right"><strong>Total Skor:</strong></td>
                                <td class="text-center"><?= $hasilSeleksi['hasil_tes_seleksi'] ?></td>
                            </tr>
                        <?php endif; ?>
                    </tfoot>
                </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printModalLabel">Print Hasil Seleksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda ingin mencetak hasil seleksi?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- Panggil fungsi untuk cetak dan kirim data tanggal/jam -->
                <button type="button" class="btn btn-primary" onclick="printAndSendData()">Cetak</button>
            </div>
        </div>
    </div>
</div>

<script>
    function printAndSendData() {
        // Kirim nilai ini ke halaman cetak
        window.location.href = '<?= base_url('halseleksi/hasil_peserta_print/' . $id_peserta . '/' . $id_pelatihan) ?>';
    }
</script>

</body>
