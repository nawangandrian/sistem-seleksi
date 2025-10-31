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

<body style="background-image: url('<?= base_url('img/bg10.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 0.5rem; padding: 0 15px;">

<div class="clearfix">
    <div class="float-left">
        <h1 class="h3 m-0 text-primary-800"><?= $judul; ?></h1>
    </div>
</div>
<hr style="border-top: 2px solid black;">
<div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Pelatihan
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('halpelatihan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body">
                <form action="<?= base_url('halpelatihan/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="nama_pelatihan">Nama Pelatihan</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input value="" name="nama_pelatihan" id="nama_pelatihan" type="text" class="form-control" placeholder="Nama Pelatihan..." required autofocus autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="tahun_pelatihan" id="tahun_pelatihan" value="<?= date('Y'); ?>">
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="jenis_pelatihan">Jenis Pelatihan</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <select name="jenis_pelatihan" id="jenis_pelatihan" class="custom-select">
                                    <option value="" selected disabled>--Pilih--</option>
                                    <option value="DBHCHT">DBHCHT</option>
                                    <option value="APBN">APBN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="lama_pelatihan">Lama Pelatihan (Hari)</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input name="lama_pelatihan" id="lama_pelatihan" type="number" class="form-control" placeholder="Berapa Hari..." required autofocus autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="jumlah_peserta">Jumlah Peserta</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input name="jumlah_peserta" id="jumlah_peserta" type="number" class="form-control" placeholder="Jumlah Peserta..." required autofocus autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col offset-md-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>