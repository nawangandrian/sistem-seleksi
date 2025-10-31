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
                    Data Administrasi
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('haladministrasi/add')  ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Administrasi
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" name="<?= $judul; ?>">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($administrasi) :
                        foreach ($administrasi as $b) :
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['nip_administrasi']; ?></td>
                                <td><?= $b['nama_administrasi']; ?></td>
                                <td><?= $b['alamat_administrasi']; ?></td>
                                <td><?= $b['email_administrasi']; ?></td>
                                <td><?= $b['no_telp_administrasi']; ?></td>
                                <td>
                                    <a href="<?= base_url('haladministrasi/detail/' . $b['id_administrasi']) ?>" class="btn btn-circle btn-sm btn-warning" data-toggle="modal" data-target="#editmodal<?= $b['id_administrasi'] ?>"><i class="fa fa-fw fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('haladministrasi/delete/'. $b['id_administrasi']) ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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

<!-- Modal -->
<?php foreach ($administrasi as $administrasi) { ?>
    <div class="modal fade" id="editmodal<?= $administrasi['id_administrasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data administrasi</h5>
                    <button type="button" class="close text-white close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('haladministrasi/edit/'. $administrasi['id_administrasi']) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="id_user" id="inputan_id_user" value="<?= $administrasi['user_id'] ?>" class="form-control" hidden>
                        <input type="text" name="id_administrasi" id="id_administrasi" value="<?= $administrasi['id_administrasi'] ?>" class="form-control" hidden>
                        <div class="form-group">
                            <label for="NIP_Administrasi">NIP Administrasi</label>
                            <input value="<?= $administrasi['nip_administrasi'] ?>" type="text" id="username" name="username" class="form-control" placeholder="NIP administrasi">
                            <!-- Tampilkan pesan error di sini -->
                            <div id="error_message1" style="color: red;"></div>
                        </div>
                        <input value="admin" type="hidden" id="administrasi" name="role">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input value="<?= $administrasi['nama_administrasi'] ?>" type="text" id="nama_administrasi" name="nama_administrasi" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat_administrasi">Alamat</label>
                            <input value="<?= $administrasi['alamat_administrasi'] ?>" type="text" id="alamat_administrasi" name="alamat_administrasi" class="form-control" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?= $administrasi['email_administrasi'] ?>" type="email" id="email" name="email" class="form-control" placeholder="Email">
                            <!-- Tampilkan pesan error di sini -->
                            <div id="error_message" style="color: red;"></div>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input value="<?= $administrasi['no_telp_administrasi'] ?>" type="text" id="no_telp" name="no_telp" class="form-control" placeholder="No Telp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="saveadministrasi" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $(document).ready(function() { 
        $('.close-modal').on('click', function() {
            location.reload();
        });
        // Menangani perubahan pada semua elemen input dengan id 'email'
        $('input[id^="email"]').on('change', function () {
            var email = $(this).val(); // Ambil nilai email yang dimasukkan

            // Ambil id modal yang sedang aktif
            var modalId = $(this).closest('.modal').attr('id');

            // Kirim permintaan AJAX untuk memeriksa apakah email sudah ada dalam tabel
            $.ajax({
                url: '<?= base_url('halpengguna/checkEmailExist') ?>', // Ubah ini sesuai dengan URL Anda
                type: 'POST',
                dataType: 'json',
                data: { email: email }, // Kirim email ke server
                success: function(response) {
                    console.log("Data yang dikirim ke server:", email);
                    console.log("Respon dari server:", response);

                    // Dapatkan elemen error_message yang sesuai dengan modal yang aktif
                    var errorMessage = $('#' + modalId + ' #error_message');

                    // Jika email sudah ada, tampilkan pesan kesalahan
                    if (response.exists) {
                        errorMessage.text('Email sudah ada dalam tabel.');
                        $('#' + modalId + ' button[type="submit"]').prop('disabled', true); // Nonaktifkan tombol submit
                    } else {
                        // Jika email belum ada, hapus pesan kesalahan dan aktifkan tombol submit
                        errorMessage.text('');
                        $('#' + modalId + ' button[type="submit"]').prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                    alert("Gagal melakukan AJAX request");
                }
            });
        });
});
$(document).ready(function() { 
    // Menangani perubahan pada semua elemen input dengan id 'username'
    $('input[id^="username"]').on('change', function () {
        var username = $(this).val(); // Ambil nilai username yang dimasukkan

        // Ambil id modal yang sedang aktif
        var modalId = $(this).closest('.modal').attr('id');

        // Jika username kosong, tampilkan pesan error
        if (!username) {
            var errorMessage = $('#' + modalId + ' #error_message1');
            errorMessage.text('NIP tidak boleh kosong.');
            $('#' + modalId + ' button[type="submit"]').prop('disabled', true); // Nonaktifkan tombol submit
            return; // Keluar dari fungsi karena tidak perlu melakukan pengecekan lebih lanjut
        }

        // Kirim permintaan AJAX untuk memeriksa apakah username sudah ada dalam tabel
        $.ajax({
            url: '<?= base_url('halpengguna/checkUserExist') ?>', // Ubah ini sesuai dengan URL Anda
            type: 'POST',
            dataType: 'json',
            data: { username: username }, // Kirim username ke server
            success: function(response) {
                // Dapatkan elemen error_message yang sesuai dengan modal yang aktif
                var errorMessage = $('#' + modalId + ' #error_message1');

                // Jika username sudah ada, tampilkan pesan kesalahan
                if (response.exists) {
                    errorMessage.text('NIP sudah ada dalam tabel.');
                    $('#' + modalId + ' button[type="submit"]').prop('disabled', true); // Nonaktifkan tombol submit
                } else {
                    // Jika username belum ada, hapus pesan kesalahan dan aktifkan tombol submit
                    errorMessage.text('');
                    $('#' + modalId + ' button[type="submit"]').prop('disabled', false);
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

</body>
