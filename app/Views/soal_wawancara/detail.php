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
        width: 50px; /* Sesuaikan lebar gambar sesuai kebutuhan */
        height: 40px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
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
                    Data Ujian
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halujian/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Ujian
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
					<th width="25">No.</th>
					<th>Nama Ujian</th>
					<th>Soal</th>
					<th>Tipe Soal</th>
                    <th>Gambar Soal</th>
					<th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($soal) :
                        foreach ($soal as $b) :
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['nama_ujian']; ?></td>
                                <td><?= $b['soal']; ?></td>
                                <td><?= $b['tipe_soal']; ?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                <?php if (!empty($b['img_soal'])) {?>
                                    <a href="#" class="btn btn-link btn-sm p-0" data-toggle="modal" data-target="#modalGambar" data-img="<?= base_url('img/avatar/' . $b['img_soal']) ?>">
                                        <img width="30" src="<?= base_url('img/avatar/' . $b['img_soal']) ?>" alt="<?= $b['id_soal']; ?>" class="img-profil2 rounded">
                                    </a>
                                <?php } else { ?>
                                    <a></a>
                                <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('halpilgan/tampil/'. $b['id_soal'])?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-check-circle"></i></a>
                                    <a href="<?= base_url('halsoal/edit/'. $b['id_soal']) ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('halsoal/delete/'. $b['id_soal']) ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="modalExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Data Soal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form untuk upload file excel -->
        <form action="<?= base_url('halc/importSoal') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ujian_id">Ujian</label>
                    <div class="input-group">
                        <select name="ujian_id" id="ujian_id" class="custom-select">
                                <option value="" selected disabled>Pilih Ujian</option>
                            <?php foreach ($ujian as $s) : ?>
                                <option <?= $s['id_ujian'] ?> value="<?= $s['id_ujian'] ?>"><?= $s['nama_ujian'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="input-group-append">
                            <a class="btn btn-primary" href="<?= base_url('halujian/add'); ?>"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                <label for="excelFile">Pilih File Excel '.xls & .xlsx'</label>
                <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx" required>
                <a href="<?= base_url('public/template_import_soal.xlsx') ?>" download>Template Import</a>
            </div>
            <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                        <div class="input-group">
                            <select name="tipe_soal" id="tipe_soal" class="custom-select">
                                <option value="" selected disabled>--Pilih--</option>
                                <option value="Pilihan Ganda">Pilihan Ganda</option>
                                <option value="Benar Salah">Benar Salah</option>
                                <option value="Jawaban Singkat">Jawaban Singkat</option>
                            </select>
                        </div>
            </div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="margin: -10px;">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>

<!-- Modal Gambar -->
<div class="modal fade" id="modalGambar" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGambarLabel">Gambar Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="imgModalSoal" src="" class="img-fluid" alt="Gambar Soal">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#modalGambar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang membuka modal
            var imgSrc = button.data('img'); // Ekstrak sumber gambar dari atribut data-img

            // Perbarui sumber gambar pada modal
            var modal = $(this);
            modal.find('.modal-body #imgModalSoal').attr('src', imgSrc);
        });
    });
</script>
