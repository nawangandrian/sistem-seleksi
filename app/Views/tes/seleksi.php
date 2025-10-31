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
        .img-thumbnail {
        width: 500px; /* Atur lebar gambar sesuai kebutuhan Anda */
        height: 300px; /* Atur tinggi gambar sesuai kebutuhan Anda */
        object-fit: cover; /* Memastikan gambar terpotong agar sesuai dengan dimensi yang ditetapkan */
        margin-left: 5px;
        }
        @media (max-width: 1200px) {
        .img-thumbnail {
            width: 120px; /* Sesuaikan lebar gambar sesuai kebutuhan */
            height: 120px;
            display: block; /* Mengubah gambar menjadi elemen blok */
            margin: 0 auto; /* Menengahkan gambar secara horizontal */
        }
        }
    </style>
    <style>
    .img-profil2 {
        width: 40px; /* Sesuaikan lebar gambar sesuai kebutuhan */
        height: 30px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
        object-fit: cover; /* Biarkan gambar menutupi seluruh area yang tersedia */
        border: 2.5px solid blue; /* Atur ketebalan dan warna border sesuai kebutuhan */
    }
    .option-button {
    display: inline-flex;
    align-items: flex-start;
    }

    .option-button input[type="radio"],
    .option-button input[type="checkbox"] {
        margin-right: 5px;
        margin-top: 5px;
    }

    </style>
<body style="background-image: url('<?= base_url('img/bg10.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 0.5rem; padding: 0 15px;">

<div class="clearfix">
    <div class="float-left">
        <h1 class="h3 m-0 text-primary-800"><?= $judul; ?></h1>
    </div>
    <div class="float-right">
    <div class="col-auto">
        <a href="<?= base_url('halsoal') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
<hr style="border-top: 2px solid black;">
<?php if ($soal->tipe_soal == 'Pilihan Ganda') : ?>
<div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Jawaban Pilgan
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body" id="inputContainer">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row form-group" style="margin-bottom: -10px;">
                    <label class="col-md-1 text-md-right" for="soal_id">Soal</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p><?= $soal->soal ?></p>
                        </div>
                        <?php if (!empty($soal->img_soal)) : ?>
                            <div style="margin-bottom: 5px; margin-top: -10px;">
                                <img src="<?= base_url('img/avatar/' . $soal->img_soal)?>" alt="" class="img-thumbnail rounded mb-2">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-1 text-md-right" for="pilgan"></label>
                    <div class="col-md-8">
                        
                        <?php
                        // Hitung jumlah jawaban benar
                        $jumlah_jawaban_benar = 0;
                        foreach ($pilgan as $p) {
                            if ($p['jawaban_benar'] == 1) {
                                $jumlah_jawaban_benar++;
                            }
                        }

                        // Jika jumlah jawaban benar lebih dari satu, tampilkan dengan checkbox
                        if ($jumlah_jawaban_benar > 1) {
                            echo '<p style="margin-bottom: 5px;">Pilihlah lebih dari satu:</p>';
                            foreach ($pilgan as $p) :
                        ?>   
                                <div style="margin-left: 10px;">
                                    <div class="input-group">
                                        <?php if (!empty($p['img_pilgan'])) : ?>
                                            <img src="<?= base_url('img/avatar/' . $p['img_pilgan']) ?>" alt="" class="img-thumbnail rounded mb-2" style="margin-left: 1rem;">
                                        <?php endif; ?>
                                    </div>
                                    <div class="input-group" style="margin-top: -5px;">
                                        <label for="<?= $p['id_pilgan'] ?>" class="option-button">
                                            <input type="checkbox" id="<?= $p['id_pilgan'] ?>" name="selected_options[]" value="<?= $p['id_pilgan'] ?>" <?= $p['jawaban_benar'] == 1 ? 'checked' : '' ?> disabled>
                                            <div class="option-text">
                                            <?= $p['pilgan'] ?>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach;
                        } else { // Jika hanya satu jawaban benar, tampilkan dengan radio button
                            echo '<p style="margin-bottom: 5px;">Pilihlah salah satu:</p>';
                            foreach ($pilgan as $p) : ?>
                                <div style="margin-left: 5px;">
                                    <div class="input-group" style="margin-left: 3px;">
                                        <?php if (!empty($p['img_pilgan'])) : ?>
                                            <img src="<?= base_url('img/avatar/' . $p['img_pilgan']) ?>" alt="" class="img-thumbnail rounded mb-2" style="margin-left: 1rem;">
                                        <?php endif; ?>
                                    </div>
                                    <div class="input-group" style="margin-top: -5px;">
                                        <label for="<?= $p['id_pilgan'] ?>" class="option-button">
                                            <input type="radio" id="<?= $p['id_pilgan'] ?>" name="selected_options[]" value="<?= $p['id_pilgan'] ?>" <?= $p['jawaban_benar'] == 1 ? 'checked' : '' ?> disabled>
                                            <div class="option-text">
                                                <?= $p['pilgan'] ?>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                        <?php endforeach;
                        } ?>
                    </div>
                </div>        
            </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($soal->tipe_soal == 'Uraian') : ?>
    <div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Jawaban Uraian
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body" id="inputContainer">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row form-group" style="margin-bottom: -10px;">
                        <label class="col-md-1 text-md-right" for="soal_id">Soal</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <p><?= $soal->soal ?></p>
                            </div>
                            <?php if (!empty($soal->img_soal)) : ?>
                                <div style="margin-bottom: 5px; margin-top: -10px;">
                                    <img src="<?= base_url('img/avatar/' . $soal->img_soal)?>" alt="" class="img-thumbnail rounded mb-2">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-1 text-md-right" for="pilgan"></label>
                        <div class="col-md-8">
                            <p style="margin-bottom: 5px;">Silahkan jawab:</p>
                            <div class="row form-group">
                                <?php foreach ($uraian as $p) : ?>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <textarea name="jawaban_uraian" id="jawaban_uraian" class="form-control" rows="4" placeholder="Jawab..." disabled><?= $p['jawaban_uraian'] ?></textarea>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<?php if ($soal->tipe_soal == 'Benar Salah') : ?>
    <div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Jawaban Benar Salah
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body" id="inputContainer">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row form-group" style="margin-bottom: -10px;">
                    <label class="col-md-1 text-md-right" for="soal_id">Soal</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p><?= $soal->soal ?></p>
                        </div>
                        <?php if (!empty($soal->img_soal)) : ?>
                            <div style="margin-bottom: 5px; margin-top: -10px;">
                                <img src="<?= base_url('img/avatar/' . $soal->img_soal)?>" alt="" class="img-thumbnail rounded mb-2">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-1 text-md-right" for="pilgan"></label>
                    <div class="col-md-8">
                    <p style="margin-bottom: 5px;">Pilihlah salah satu:</p>
                    <?php foreach ($benarsalah as $p) : ?>
                        <div style="margin-left: 10px;">
                            <div class="input-group" style="margin-top: -5px;">
                                <label for="benar" class="option-button">
                                    <input type="radio" id="benar" name="selected_option" value="Benar" <?= $p['jawaban_benar_salah'] == 'Benar' ? 'checked' : '' ?> disabled>
                                    Benar
                                </label>
                            </div>
                            <div class="input-group" style="margin-top: -5px;">
                                <label for="salah" class="option-button">
                                    <input type="radio" id="salah" name="selected_option" value="Salah" <?= $p['jawaban_benar_salah'] == 'Salah' ? 'checked' : '' ?> disabled>
                                    Salah
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                
            </form>
            </div>
        </div>
    </div>
</div>

</body>
<?php endif; ?>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




