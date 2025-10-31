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
                    Data Peserta <br> <?= $nama_pelatihan->nama_pelatihan ?>
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halpeserta') ?>" class="btn btn-sm btn-secondary btn-icon-split" id="addInput">
                    <span class="icon">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                    <span class="text">
                        Kembali
                    </span>
                </a>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halpeserta/add')  ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Peserta
                    </span>
                </a>
                <a href="#" class="btn btn-sm btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#modalExcel">
                    <span class="icon"><i class="fa fa-upload"></i></span>
                    <span class="text">Import Data</span>
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
                <th>Pelatihan</th>
                <th>No. Pendaftaran</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tgl. Lahir</th>
                <th>L/P</th>
                <th>Desa</th>
                <th>RT</th>
                <th>RW</th>
                <th>Kecamatan</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Status Admistrasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if ($peserta) :
                foreach ($peserta as $b) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b['nama_pelatihan']; ?></td>
                        <td><?= $b['nip_peserta']; ?></td>
                        <td><?= $b['nik_peserta']; ?></td>
                        <td><?= $b['nama_peserta']; ?></td>
                        <td><?= $b['tgl_lahir_peserta']; ?></td>
                        <td><?= $b['jk_peserta'] == 'Laki-laki' ? 'L' : 'P'; ?></td>
                        <td><?= $b['desa_peserta']; ?></td>
                        <td><?= $b['rt_peserta']; ?></td>
                        <td><?= $b['rw_peserta']; ?></td>
                        <td><?= $b['kecamatan_peserta']; ?></td>
                        <td><?= $b['no_telp_peserta']; ?></td>
                        <td><?= $b['email_peserta']; ?></td>
                        <td><?= $b['status_peserta']; ?></td>
                        <td>
                            <a href="<?= base_url('halpeserta/detail/' . $b['id_peserta']) ?>" class="btn btn-circle btn-sm btn-warning" data-toggle="modal" data-target="#editmodal<?= $b['id_peserta'] ?>"><i class="fa fa-fw fa-edit"></i></a>
                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('halpeserta/delete/'. $b['id_peserta'] . '/' . $nama_pelatihan->id_pelatihan) ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="13" class="text-center">
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
<div class="modal fade" id="modalExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Data Soal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form untuk upload file excel -->
        <form action="<?= base_url('Halc/importPeserta') ?>" method="post" enctype="multipart/form-data">
                    
            <div class="form-group">
                <label for="pelatihan_id">Pelatihan</label>
                    <select name="pelatihan_id" id="pelatihan_id" class="custom-select">
                            <option value="" selected disabled>Pilih Pelatihan</option>
                        <?php foreach ($pelatihan as $s) : ?>
                            <option value="<?= $s['id_pelatihan'] ?>"><?= $s['nama_pelatihan'] ?></option>
                        <?php endforeach; ?>
                    </select>
            </div>
            <input value="peserta" type="hidden" id="peserta" name="role">
            <div class="form-group">
                <label for="excelFile">Pilih File Excel '.xls & .xlsx'</label>
                <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx" required>
                <a href="<?= base_url('public/template_import_peserta.xlsx') ?>" download>Template Import</a>
            </div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="margin: -10px;">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<?php foreach ($peserta as $peserta) { ?>
    <div class="modal fade" id="editmodal<?= $peserta['id_peserta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Peserta</h5>
                    <button type="button" class="close text-white close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('halpeserta/edit/'. $peserta['id_peserta']) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="id_user" id="id_user" value="<?= $peserta['user_id'] ?>" class="form-control" hidden>
                        <input type="text" name="inputan_id_peserta" id="inputan_id_peserta" value="<?= $peserta['id_peserta'] ?>" class="form-control" hidden>
                        <div class="form-group">
                        <label for="pelatihan">Pelatihan</label>
                        <select name="pelatihan_id" id="pelatihan_id" class="custom-select">
                            <option value="" disabled>Pilih Pelatihan</option>
                            <?php foreach ($pelatihan as $s) : ?>
                                <?php if ($s['id_pelatihan'] == $peserta['pelatihan_id']) : ?>
                                    <option value="<?= $s['id_pelatihan'] ?>" selected><?= $s['nama_pelatihan'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $s['id_pelatihan'] ?>"><?= $s['nama_pelatihan'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="NIP Peserta">No. Pendaftaran</label>
                            <input value="<?= $peserta['nip_peserta'] ?>" type="text" id="username" name="username" class="form-control" placeholder="NIP Peserta">
                            <!-- Tampilkan pesan error di sini -->
                            <div id="error_message1" style="color: red;"></div>
                        </div>
                        <input value="peserta" type="hidden" id="peserta" name="role">
                        <div class="form-group">
                            <label for="nik_peserta">NIK Peserta</label>
                            <input value="<?= $peserta['nik_peserta'] ?>" type="number" id="nik_peserta" name="nik_peserta" class="form-control" placeholder="NIK Peserta">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input value="<?= $peserta['nama_peserta'] ?>" type="text" id="nama_peserta" name="nama_peserta" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir_peserta">Tanggal Lahir Peserta</label>
                            <input value="<?= $peserta['tgl_lahir_peserta'] ?>" type="date" id="tgl_lahir_peserta" name="tgl_lahir_peserta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="custom-select">
                                <option value="" disabled <?= empty($peserta['jk']) ? 'selected' : '' ?>>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= $peserta['jk_peserta'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $peserta['jk_peserta'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input value="<?= $peserta['kota_peserta'] ?>" type="text" id="kota_peserta" name="kota_peserta" class="form-control" placeholder="Kota">
                        </div>
                        <div class="form-group">
                            <label for="kecamatan_peserta">Kecamatan</label>
                            <input value="<?= $peserta['kecamatan_peserta'] ?>" type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Kecamaran">
                        </div>
                        <div class="form-group">
                            <label for="desa_peserta">Desa</label>
                            <input value="<?= $peserta['desa_peserta'] ?>" type="text" id="desa" name="desa" class="form-control" placeholder="Desa">
                        </div>
                        <div class="form-group">
                            <label for="rw_peserta">RW</label>
                            <input value="<?= $peserta['rw_peserta'] ?>" type="number" id="rw" name="rw" class="form-control" placeholder="RW">
                        </div>
                        <div class="form-group">
                            <label for="rt_peserta">RT</label>
                            <input value="<?= $peserta['rt_peserta'] ?>" type="number" id="rt" name="rt" class="form-control" placeholder="RT">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?= $peserta['email_peserta'] ?>" type="email" id="email" name="email" class="form-control" placeholder="Email">
                            <!-- Tampilkan pesan error di sini -->
                            <div id="error_message" style="color: red;"></div>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input value="<?= $peserta['no_telp_peserta'] ?>" type="number" id="no_telp" name="no_telp" class="form-control" placeholder="No Telp">
                        </div>
                        <div class="form-group">
                            <label for="pelatihan_sebelumnya">Pernah Mengikuti Pelatihan?</label>
                                <select name="pelatihan_sebelumnya" id="pelatihan_sebelumnya" class="form-control" required>
                                    <option value="Belum" <?= $peserta['pelatihan_sebelumnya'] == 'Belum' ? 'selected' : '' ?>>Belum</option>
                                    <option value="Sudah" <?= $peserta['pelatihan_sebelumnya'] == 'Sudah' ? 'selected' : '' ?>>Sudah</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="status_pekerjaan">Status Pekerjaan</label>
                                <select name="status_pekerjaan" id="status_pekerjaan" class="form-control" required>
                                    <option value="Aktif" <?= $peserta['status_pekerjaan'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="PHK" <?= $peserta['status_pekerjaan'] == 'PHK' ? 'selected' : '' ?>>PHK</option>
                                    <option value="Tidak Bekerja" <?= $peserta['status_pekerjaan'] == 'Tidak Bekerja' ? 'selected' : '' ?>>Tidak Bekerja</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="status_tni_polri_asn">Status TNI/Polri/ASN</label>
                                <select name="status_tni_polri_asn" id="status_tni_polri_asn" class="form-control" required>
                                    <option value="Bukan" <?= $peserta['status_tni_polri_asn'] == 'Bukan' ? 'selected' : '' ?>>Bukan</option>
                                    <option value="TNI" <?= $peserta['status_tni_polri_asn'] == 'TNI' ? 'selected' : '' ?>>TNI</option>
                                    <option value="Polri" <?= $peserta['status_tni_polri_asn'] == 'Polri' ? 'selected' : '' ?>>Polri</option>
                                    <option value="ASN" <?= $peserta['status_tni_polri_asn'] == 'ASN' ? 'selected' : '' ?>>ASN</option>
                                </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="savepeserta" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</body>

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

