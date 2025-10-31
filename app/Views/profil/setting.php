<!-- Komponen DataTables (Tabel Data) -->
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- data tables js -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

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
    .img-profil {
    width: 100px; /* Sesuaikan lebar gambar sesuai kebutuhan */
    height: 100px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
    object-fit: cover; /* Biarkan gambar menutupi seluruh area yang tersedia */
    border: 2.5px solid grey; /* Atur ketebalan dan warna border sesuai kebutuhan */
    }
    @media (max-width: 1200px) {
        .img-profil {
        width: 85px; /* Sesuaikan lebar gambar sesuai kebutuhan */
        height: 85px;}
    }
</style>
<body style="background-image: url('<?= base_url('img/bg10.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 0.5rem; padding: 0 15px;">

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
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 20px;">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Edit Profil User
                </h4>
            </div>
            <?php
				$nama = session()->get('nama');
                $email = session()->get('email');
                $role = session()->get('role');
                $no_telp = session()->get('no_telp');
                $username = session()->get('username');
                $foto = session()->get('foto');
                $id_user = session()->get('id_user');
			?>
            <div class="card-body">
                 
                <form action="<?= base_url('halprofil/setting/' . $datauser->id_user); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_user" value="<?= $datauser->id_user ?>" readonly class="form-control">
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="foto">Foto</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?= base_url('img/avatar/' . $datauser->foto)?>" alt="" class="img-profil rounded-circle shadow-sm img-thumbnail">
                                </div>
                                <div class="col-9">
                                    <input type="file" name="foto" id="foto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black;">
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="username">Username</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-fw fa-user-shield"></i></span>
                                </div>
                                <input value="<?= $datauser->username ?>" name="username" id="username" type="text" class="form-control" placeholder="Username...">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="nama">Nama Anda</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                </div>
                                <input value="<?= $datauser->nama ?>" name="nama" id="nama" type="text" class="form-control" placeholder="Nama Anda...">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="email">Email</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                </div>
                                <input value="<?= $datauser->email ?>" name="email" id="email" type="text" class="form-control" placeholder="Email...">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="no_telp">Nomor Telepon</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
                                </div>
                                <input value="<?= $datauser->no_telp ?>" name="no_telp" id="no_telp" type="text" class="form-control" placeholder="Nomor Telepon...">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
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
