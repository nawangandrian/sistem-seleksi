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
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Daftar Pelatihan
                </h4>
            </div>
        </div>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" name="<?= $judul; ?>">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pelatihan</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Lama Pelatihan</th>
                    <th class="text-center">Jumlah Peserta</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($pelatihan) :
                        foreach ($pelatihan as $b) :
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['nama_pelatihan']; ?></td>
                                <td style="text-align: center;"><?= $b['jenis_pelatihan']; ?></td>
                                <td style="text-align: center;"><?= $b['lama_pelatihan']; ?> hari</td>
                                <td style="text-align: center;"><?= $b['jumlah_peserta']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('halseleksi/peserta/'. $b['id_pelatihan']) ?>" class="btn btn-primary btn-sm ">
                                        <i class="fa fa-folder-open"></i> SAW
                                    </a>
                                    <span class="mx-2">|</span>
                                    <a href="<?= base_url('halseleksi/peserta_ahp_saw/'. $b['id_pelatihan']) ?>" class="btn btn-info btn-sm ">
                                        <i class="fa fa-folder-open"></i> AHP SAW
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menangkap semua elemen dropdown-toggle
        var dropdownToggleElements = document.querySelectorAll('.dropdown-toggle');
        
        dropdownToggleElements.forEach(function(dropdownToggleEl) {
            dropdownToggleEl.addEventListener('click', function() {
                // Mencari elemen dropdown-menu terkait
                var dropdownMenu = dropdownToggleEl.nextElementSibling; // Mengambil <ul class="dropdown-menu">
                
                // Toggle class 'show' untuk menampilkan atau menyembunyikan dropdown
                dropdownMenu.classList.toggle('show');
                
                // Mengubah atribut 'aria-expanded' berdasarkan status dropdown
                var isExpanded = dropdownMenu.classList.contains('show');
                dropdownToggleEl.setAttribute('aria-expanded', isExpanded);
            });
        });
    });
</script>

</body>
