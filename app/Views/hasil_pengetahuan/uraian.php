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
<div class="row">
    <div class="col-md-12">
        <div class="row justify-content-center" style="margin-top: 20px;">
            <div class="col-md-7">
                <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                    Form Soal Uraian
                                </h4>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('halhasilp/hasil/'. $id_user. '/' . $id_pelatihan) ?>" class="btn btn-sm btn-secondary btn-icon-split" id="addInput">
                                    <span class="icon">
                                        <i class="fa fa-arrow-left"></i>
                                    </span>
                                    <span class="text">
                                        Kembali
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="inputContainer">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-group" style="margin-bottom: 1px;">
                                <label class="col-md-2 text-md-right" for="soal_id">Soal</label>
                            </div>
                            <div class="row form-group" style="margin-bottom: -10px;">
                                <label class="col-md-1 text-md-right" for="soal_id"></label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <?php
                                            foreach ($soal as $row) {
                                        ?>
                                                <p><?= $row->soal ?></p>
                                    </div>
                                    <?php if (!empty($row->img_soal)) : ?>
                                        <div style="margin-bottom: 5px; margin-top: -10px;">
                                            <img src="<?= base_url('img/avatar/' . $row->img_soal)?>" alt="" class="img-thumbnail rounded mb-2">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-md-1 text-md-right" for="pilgan"></label>
                                <div class="col-md-8">
                                    <p style="margin-bottom: 5px;">Jawaban Uraian:</p>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <textarea name="jawaban_uraian" id="jawaban_uraian" class="form-control" rows="4" placeholder="Jawab..." readonly><?= $uraian->jawaban_uraian ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                    Form Jawaban Peserta
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" >
                        <div class="row form-group">
                            <label class="col-md-0 text-md-right" for="pilgan"></label>
                            <div class="col-md-12">
                                <p style="margin-bottom: 5px;">Jawaban Uraian:</p>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <textarea name="jawaban_uraian" id="jawaban_uraian" class="form-control" rows="4" placeholder="Jawab..." readonly><?= $row->jawaban ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group" style="margin-top: -30px;">
                            <label class="col-md-0 text-md-right" for="pilgan"></label>
                            <div class="col-md-12">
                                <p style="margin-bottom: 5px;">Nilai Uraian (0-1):</p>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <form class="row form-group" method="post" action="<?= base_url('halhasilp/simpan_nilai/'. $row->id_jawab . '/' . $row->user_id . '/' . $id_pelatihan) ?>">
                                                <div class="col-md-9">
                                                    <input type="number" name="nilai_uraian" id="nilai_uraian" class="form-control" min="0" max="1" step="0.01" placeholder="Masukkan nilai antara 0 dan 1">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
