
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

<link type="image/png" sizes="96x96" rel="icon" href="<?= base_url('img/Logo BLK.png') ?>">

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
                    Laporan Pelatihan
                </h4>
            </div>
            <div class="col-auto">
                <a class="btn btn-sm btn-danger btn-icon-split" id="addInput" data-toggle="modal" data-target="#modalCetakLaporan">
                    <span class="icon" style="color: white;">
                        <i class="fa-solid fa-print"></i>
                    </span>
                    <span class="text" style="color: white;">
                        Print
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="<?= base_url('hallaporan/filter'); ?>" method="get" class="mb-4">
        <div class="form-row align-items-end">
           <div class="form-group col-md-3">
                <label for="tahun_mulai">Tahun Mulai</label>
                <select name="tahun_mulai" id="tahun_mulai" class="form-control select2">
                    <option></option>
                    <?php 
                    $tahun_sekarang = date('Y');
                    for ($i = $tahun_sekarang; $i >= 1945; $i--): ?>
                        <option value="<?= $i ?>" <?= (isset($tahun_mulai) && $tahun_mulai == $i) ? 'selected' : '' ?>><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="form-group col-md-1 text-center">
                <label>Sampai</label>
            </div>

            <div class="form-group col-md-3">
                <label for="tahun_selesai">Tahun Selesai</label>
                <select name="tahun_selesai" id="tahun_selesai" class="form-control select2">
                    <option></option>
                    <?php 
                    for ($i = $tahun_sekarang; $i >= 1945; $i--): ?>
                        <option value="<?= $i ?>" <?= (isset($tahun_selesai) && $tahun_selesai == $i) ? 'selected' : '' ?>><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="jenis">Jenis Pelatihan</label>
                <select class="form-control" name="jenis" id="jenis">
                    <option value="">-- Semua Jenis --</option>
                    <?php foreach ($jenis_pelatihan as $jenis) : ?>
                        <option value="<?= esc($jenis) ?>" <?= ($jenis == ($selected_jenis ?? '')) ? 'selected' : '' ?>>
                            <?= esc($jenis) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-filter"></i> Filter</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" name="<?= $judul; ?>">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Nama Pelatihan</th>
                    <th>Tahun Pelatihan</th>
                    <th>Jenis Pelatihan</th>
                    <th>Lama Pelatihan</th>
                    <th>Jumlah Laki-laki</th>
                    <th>Jumlah Perempuan</th>
                    <th>Total Peserta</th>
                    <th>Jumlah Pendaftar</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($pelatihan) : ?>
                <?php $no = 1; ?>
                <?php foreach ($pelatihan as $b) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($b['nama_pelatihan']) ?></td>
                        <td><?= esc($b['tahun_pelatihan']) ?></td>
                        <td><?= esc($b['jenis_pelatihan']) ?></td>
                        <td><?= esc($b['lama_pelatihan']) ?> hari</td>
                        <td><?= esc($b['jumlah_laki']) ?> orang</td>
                        <td><?= esc($b['jumlah_perempuan']) ?> orang</td>
                        <td><?= esc($b['jumlah_peserta']) ?> orang</td>
                        <td><?= esc($b['jumlah_pendaftar'] ?? '0') ?> orang</td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="9" class="text-center">Data Kosong</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Modal Pilih Kepala BLK -->
<div class="modal fade" id="modalCetakLaporan" tabindex="-1">
  <div class="modal-dialog">
    <form action="<?= base_url('hallaporan/print') ?>" method="get">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cetak Laporan</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="tahun_mulai" value="<?= esc($tahun_mulai) ?>">
          <input type="hidden" name="tahun_selesai" value="<?= esc($tahun_selesai) ?>">
          <input type="hidden" name="jenis" value="<?= esc($selected_jenis) ?>">

          <div class="form-group">
            <label for="kepala_blk"><strong>Kepala BLK</strong></label>
            <select name="kepala_blk" id="kepala_blk" class="form-control" required>
              <option value="" disabled selected>Pilih Kepala BLK</option>
              <?php foreach ($kepala_blk as $s): ?>
                <option value="<?= $s['id_kepala_blk'] ?>"><?= esc($s['nama_kepala_blk']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- jQuery & Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script>
    $(document).ready(function() {
        $('#tahun_mulai').select2({ placeholder: "Pilih Tahun Mulai", allowClear: true });
        $('#tahun_selesai').select2({ placeholder: "Pilih Tahun Selesai", allowClear: true });
    });
</script>

</body>
