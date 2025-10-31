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
                    Pelatihan <br> <?= $nama_pelatihan->nama_pelatihan ?>
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halsoalwawancara') ?>" class="btn btn-sm btn-secondary btn-icon-split" id="addInput">
                    <span class="icon">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                    <span class="text">
                        Kembali
                    </span>
                </a>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halsoalwawancara/add/' . $nama_pelatihan->id_pelatihan) ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Soal
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
                    <th>Soal</th>
                    <th>Bobot Soal</th>
					<th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($soal) :
                    $no = 1;
                    foreach ($soal as $b) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $b['soal_wawancara']; ?></td>
                            <td><?= $b['bobot_soal_wawancara']; ?></td>
                            <td>
                                <a href="<?= base_url('halsoalwawancara/edit/' . $b['id_soal_wawancara'] . '/' . $b['pelatihan_id']) ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('halsoalwawancara/delete/'. $b['id_soal_wawancara'] . '/' . $b['pelatihan_id']) ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Soal Wawancara</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form untuk upload file excel -->
        <form action="<?= base_url('Halc/importSoalWawancara') ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="pelatihan_id" id="pelatihan_id" value="<?= $nama_pelatihan->id_pelatihan ?>" class="form-control" hidden>
            <div class="form-group">
                <label for="tipe_soal">Silahkan Download Template Import</label>
                    <div class="input-group">
                        <select onchange="downloadTemplate(this.value)" name="Template_Import" id="Template_Import" class="custom-select">
                            <option value="">Pilih Template Import</option>
                            <option value="<?= base_url('public/template_import_soal_wawancara.xlsx') ?>">Soal Wawancara</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="excelFile">Pilih File Excel '.xls & .xlsx'</label>
                <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx" required>
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
<script>
    function downloadTemplate(url) {
        if (url) {
            var anchor = document.createElement('a');
            anchor.href = url;
            anchor.download = 'template_import_wawancara.xlsx'; 
            anchor.click(); 
        }
    }
</script>
