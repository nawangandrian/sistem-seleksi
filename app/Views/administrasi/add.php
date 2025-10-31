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
                            Form Tambah Administrasi
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('haladministrasi') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <form action="<?= base_url('haladministrasi/add') ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">NIP Administrasi</label>
                    <div class="col-md-6">
                        <input value="" type="text" id="username" name="username" class="form-control" placeholder="NIP Administrasi">                    
                        <div id="error_message1" style="color: red;"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="password">Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="password2">Konfirmasi Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Password">
                    </div>
                </div>
                <hr style="border-top: 1px solid gray;">
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama">Nama</label>
                    <div class="col-md-6">
                        <input value="" type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="alamat_administrasi">Alamat</label>
                    <div class="col-md-6">
                        <input value="" type="text" id="alamat_administrasi" name="alamat_administrasi" class="form-control" placeholder="Alamat">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="email">Email</label>
                    <div class="col-md-6">
                        <input value="" type="text" id="email" name="email" class="form-control" placeholder="Email">
                        <div id="error_message" style="color: red;"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="no_telp">Nomor Telepon</label>
                    <div class="col-md-6">
                        <input value="" type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                    </div>
                </div>
                <input value="admin" type="hidden" id="administrasi" name="role">
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() { 
        $('#email').on('change', function () {
            var email = $(this).val(); // Ambil nilai email yang dimasukkan

            // Periksa apakah elemen input dengan id 'email' ditemukan
            if (!email) {
                //alert("Selamat! Berhasil Menambah Data");
            }

            // Kirim permintaan AJAX untuk memeriksa apakah email sudah ada dalam tabel
            $.ajax({
                url: '<?= base_url('halpengguna/checkEmailExist') ?>', // Ubah ini sesuai dengan URL Anda
                type: 'POST',
                dataType: 'json',
                data: { email: email }, // Kirim email ke server
                success: function(response) {
                    // Jika email sudah ada, tampilkan pesan kesalahan
                    if (response.exists) {
                        $('#error_message').text('Email sudah ada dalam tabel.');
                        $('button[type="submit"]').prop('disabled', true); // Nonaktifkan tombol submit
                    } else {
                        // Jika email belum ada, hapus pesan kesalahan dan aktifkan tombol submit
                        $('#error_message').text('');
                        $('button[type="submit"]').prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                    alert("Gagal melakukan AJAX request");
                }
            });
        });
        $('#username').on('change', function () {
            var username = $(this).val(); // Ambil nilai username yang dimasukkan

            // Jika username kosong, tampilkan pesan error
            if (!username) {
                $('#error_message1').text('Username tidak boleh kosong.');
                $('button[type="submit"]').prop('disabled', true);// Nonaktifkan tombol submit
                return; // Keluar dari fungsi karena tidak perlu melakukan pengecekan lebih lanjut
            }

            // Kirim permintaan AJAX untuk memeriksa apakah username sudah ada dalam tabel
            $.ajax({
                url: '<?= base_url('halpengguna/checkUserExist') ?>', // Ubah ini sesuai dengan URL Anda
                type: 'POST',
                dataType: 'json',
                data: { username: username }, // Kirim username ke server
                success: function(response) {
                    // Jika username sudah ada, tampilkan pesan kesalahan
                    if (response.exists) {
                        $('#error_message1').text('Username sudah ada dalam tabel.');
                        $('button[type="submit"]').prop('disabled', true); // Nonaktifkan tombol submit
                    } else {
                        // Jika username belum ada, hapus pesan kesalahan dan aktifkan tombol submit
                        $('#error_message1').text('');
                        $('button[type="submit"]').prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                    alert("Gagal melakukan AJAX request");
                }
            });
        });
    });
</script>
