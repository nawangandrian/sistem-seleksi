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
    .img-profilup {
        width: 100px; /* Sesuaikan lebar gambar sesuai kebutuhan */
        height: 100px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
        object-fit: cover; /* Biarkan gambar menutupi seluruh area yang tersedia */
        border: 2.5px solid blue; /* Atur ketebalan dan warna border sesuai kebutuhan */
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
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data User
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halpengguna/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah User
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
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                if ($users) :
                    foreach ($users as $user) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img width="30" src="<?= base_url('img/avatar/' . $user['foto']) ?>" alt="<?= $user['nama']; ?>" class="img-profil2 rounded-circle">
                            </td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>
                                <a href="<?= base_url('halpengguna/toggle/' . $user['id_user']) ?>" class="btn btn-circle btn-sm <?= $user['is_active'] ? 'btn-secondary' : 'btn-success' ?>" title="<?= $user['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                <a href="<?= base_url('halpengguna/detail/' . $user['id_user']) ?>" class="btn btn-circle btn-sm btn-warning" data-toggle="modal" data-target="#editmodal<?= $user['id_user'] ?>"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('halpengguna/delete/' . $user['id_user']) ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan user baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</body>
<!-- Modal -->
<?php foreach ($users as $user) { ?>
    <div class="modal fade" id="editmodal<?= $user['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('halpengguna/edit/'. $user['id_user']) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="inputan_id_user" id="inputan_id_user" value="<?= $user['id_user'] ?>" class="form-control" hidden>
                        <input type="text" name="role" id="role" value="<?= $user['role'] ?>" class="form-control" hidden>
                        
                        <?php if(empty($user['id_user'])){ ?> 
                            <center><i class="fa fa-picture-o fa-5x mb-4"></i></center>
                        <?php } else { ?> 
                            <center><img src="<?= base_url('img/avatar/' . $user['foto']) ?>" class="mb-4 img-profilup rounded-circle" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                        <?php } ?>

                        <div class="form-group">
                            <label for="Nama">Username</label>
                            <input value="<?= $user['username'] ?>" type="text" id="username" name="username" class="form-control" placeholder="Username">
                            <!-- Tampilkan pesan error di sini -->
                            <div id="error_message1" style="color: red;"></div>
                        </div>
                        <div class="form-group">
                            <label for="Harga">Email</label>
                            <input value="<?= $user['email'] ?>" type="text" id="email" name="email" class="form-control" placeholder="Email">
                            <!-- Tampilkan pesan error di sini -->
                            <div id="error_message" style="color: red;"></div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="password_lama">Password Lama</label> -->
                            <input value="<?= $user['password'] ?>" name="password_lama" id="password_lama" type="hidden" class="form-control" placeholder="Password Lama..." readonly>
                        </div>
                        <div class="form-group">
                            <label for="password_baru">Password Baru</label>
                            <input value="" name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Password Baru...">
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi_password">Konfirmasi Password</label>
                            <input value="" name="konfirmasi_password" id="konfirmasi_password" type="password" class="form-control" placeholder="Konfirmasi Password...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="saveuser" class="btn btn-primary" id="save_btn">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- jQuery script -->
<script>
    $(document).ready(function() {
        // Menangani peristiwa klik pada label 'Admin'
        $('[id^="adminLabel"]').on('click', function() {
            var id = $(this).attr('id').replace('adminLabel', '');
            $('#admin' + id).prop('checked', true); // Memilih tombol radio 'Admin'
        });

        // Menangani peristiwa klik pada label 'peserta'
        $('[id^="pesertaLabel"]').on('click', function() {
            var id = $(this).attr('id').replace('pesertaLabel', '');
            $('#peserta' + id).prop('checked', true); // Memilih tombol radio 'peserta'
        });
    });
    $(document).ready(function () {
    // Event saat modal dibuka
    $('.modal').on('shown.bs.modal', function () {
        const $modal = $(this); // Ambil modal yang sedang aktif
        const $passwordBaru = $modal.find('[id^="password_baru"]');
        const $konfirmasiPassword = $modal.find('[id^="konfirmasi_password"]');
        const $saveButton = $modal.find('[id^="save_btn"]');
        const $errorMessage = $('<div style="color: red; font-size: 12px;"></div>').insertAfter($konfirmasiPassword);

        function checkPasswordFields() {
            const passwordBaruTrimmed = $passwordBaru.val().trim();
            const konfirmasiPasswordTrimmed = $konfirmasiPassword.val().trim();

            // Jika kedua input kosong, tombol harus nonaktif
            if (passwordBaruTrimmed === "" && konfirmasiPasswordTrimmed === "") {
                $saveButton.prop('disabled', true);
                $errorMessage.text('');
                return;
            }

            // Jika salah satu diisi tetapi tidak sama, tampilkan error dan disable tombol
            if (passwordBaruTrimmed !== konfirmasiPasswordTrimmed) {
                $errorMessage.text('Konfirmasi password tidak cocok!');
                $saveButton.prop('disabled', true);
                return;
            } else {
                $errorMessage.text('');
            }

            // Jika kedua input sudah terisi dan cocok, tombol bisa aktif
            $saveButton.prop('disabled', false);
        }

        // Event listener pada input password baru dan konfirmasi password
        $passwordBaru.on('input', checkPasswordFields);
        $konfirmasiPassword.on('input', checkPasswordFields);

        // Pastikan tombol awalnya nonaktif jika kedua kolom kosong
        checkPasswordFields();
    });
});

</script>

<script>
    $(document).ready(function() { 
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
            errorMessage.text('Username tidak boleh kosong.');
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
                    errorMessage.text('Username sudah ada dalam tabel.');
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
