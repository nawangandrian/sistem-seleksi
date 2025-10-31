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
                    Data Hasil Tes Wawancara
                </h4>
                <a style="margin-top: 5px;">
                    Nama Peserta : <?= $peserta->nama_peserta ?>
                </a><br>
                <a style="margin-top: 2px;">
                    Total Nilai  : <span id="total-nilai"></span>
                </a>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halwawancara/peserta/'. $id_pelatihan) ?>" class="btn btn-sm btn-secondary btn-icon-split" id="addInput">
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
    <div class="table-responsive">
    <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" name="<?= $judul; ?>">
        <thead>
            <tr>
                <th width="25">No.</th>
                <th>Soal</th>
                <th>Bobot Soal</th>
                <th>Skor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $userId = $peserta->id_peserta;
            $totalSkor = 0;
            if ($hasil) :
                $no = 1;
                foreach ($hasil as $b) :
                    $totalSkor += $b['hasil_jawaban'];
                    ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['soal_wawancara']; ?></td>
                    <td><?= $b['bobot_soal_wawancara']; ?></td>
                    <td><?= $b['hasil_jawaban']; ?></td>
                    <td>
                        <a href="<?= base_url('halwawancara/edit/' . $b['id_jawaban_wawancara']) ?>" class="btn btn-circle btn-sm btn-warning" data-toggle="modal" data-target="#editmodal<?= $b['id_jawaban_wawancara'] ?>"><i class="fa fa-fw fa-edit"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">
                        Data Kosong
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<?php foreach ($hasil as $w) { ?>
    <div class="modal fade" id="editmodal<?= $w['id_jawaban_wawancara'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Skor Jawaban Wawancara</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('halwawancara/edit/'. $w['id_jawaban_wawancara']) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="inputan_id_jawaban_wawancara" id="inputan_id_jawaban_wawancara" value="<?= $w['id_jawaban_wawancara'] ?>" class="form-control" hidden>
                        <input type="text" name="inputan_id_user" id="inputan_id_user" value="<?= $w['user_id'] ?>" class="form-control" hidden>
                        <input type="text" name="inputan_id_pelatihan" id="inputan_id_pelatihan" value="<?= $id_pelatihan ?>" class="form-control" hidden>
                        <input type="text" name="inputan_id_soal" id="inputan_id_soal" value="<?= $w['soal_wawancara_id']?>" class="form-control" hidden>
                        
                        <div class="form-group">
                            <label for="Skor">Skor</label>
                            <input value="<?= $w['hasil_jawaban'] ?>" type="number" id="hasil_jawaban<?= $w['id_jawaban_wawancara'] ?>" name="hasil_jawaban" class="form-control" placeholder="Skor" max="<?= $w['bobot_soal_wawancara'] ?>" oninput="checkMaxValue(<?= $w['id_jawaban_wawancara'] ?>, <?= $w['bobot_soal_wawancara'] ?>)" autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="savewawancara" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menampilkan total skor di bagian header
        var totalSkor = <?= $totalSkor; ?>;
        document.getElementById('total-nilai').textContent = totalSkor;

        // Memeriksa apakah peserta_id sudah ada di tabel hasil_pengetahuan
        var xhrCheck = new XMLHttpRequest();
        xhrCheck.open('POST', '<?= base_url('halwawancara/check_peserta/' . $userId); ?>', true);
        xhrCheck.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhrCheck.onreadystatechange = function() {
            if (xhrCheck.readyState == 4 && xhrCheck.status == 200) {
                var responseCheck = JSON.parse(xhrCheck.responseText);
                if (responseCheck.status == 'exists') {
                    // Peserta_id sudah ada di tabel hasil_pengetahuan, lakukan ubah_total
                    var xhrUpdate = new XMLHttpRequest();
                    xhrUpdate.open('POST', '<?= base_url('halwawancara/ubah_total/' . $userId); ?>', true);
                    xhrUpdate.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhrUpdate.onreadystatechange = function() {
                        if (xhrUpdate.readyState == 4 && xhrUpdate.status == 200) {
                            var responseUpdate = JSON.parse(xhrUpdate.responseText);
                            if (responseUpdate.status == 'success') {
                                console.log('Total skor berhasil diubah');
                            } else {
                                console.log('Gagal mengubah total skor');
                            }
                        }
                    };
                    xhrUpdate.send('total_skor=' + totalSkor);
                } else {
                    // Peserta_id belum ada di tabel hasil_pengetahuan, lakukan simpan_total
                    var xhrInsert = new XMLHttpRequest();
                    xhrInsert.open('POST', '<?= base_url('halwawancara/simpan_total/' . $userId); ?>', true);
                    xhrInsert.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhrInsert.onreadystatechange = function() {
                        if (xhrInsert.readyState == 4 && xhrInsert.status == 200) {
                            var responseInsert = JSON.parse(xhrInsert.responseText);
                            if (responseInsert.status == 'success') {
                                console.log('Total skor berhasil disimpan');
                            } else {
                                console.log('Gagal menyimpan total skor');
                            }
                        }
                    };
                    xhrInsert.send('total_skor=' + totalSkor);
                }
            }
        };
        xhrCheck.send();
    });

    function checkMaxValue(id, max) {
        var input = document.getElementById('hasil_jawaban' + id);
        if (parseInt(input.value) > max) {
            input.value = max;
        }
    }

    $(document).ready(function() {
        // Ketika modal ditampilkan
        $('.modal').on('shown.bs.modal', function () {
            // Ambil ID modal yang sedang terbuka
            var modalId = $(this).attr('id');
            // Ambil ID input yang sesuai dengan modal yang dibuka
            var inputId = '#hasil_jawaban' + modalId.replace('editmodal', '');
            
            // Reset nilai input menjadi kosong
            $(inputId).val('');
            
            // Fokus pada input di dalam modal yang baru saja dibuka
            $(inputId).focus();
        });
    });
</script>
