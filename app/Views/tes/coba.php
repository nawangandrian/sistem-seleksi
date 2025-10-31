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

    <!-- inisialisasi DataTables -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

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
    #remainingTimeContainer {
        border: 2px solid #007bff; /* Warna primary - Sesuaikan dengan warna yang Anda inginkan */
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
    }

    #remainingTime {
        font-weight: bold;
        color: #007bff; /* Warna primary - Sesuaikan dengan warna yang Anda inginkan */
    }

    .card1 {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
        width: 320px;
        text-align: center;
        margin: 20px auto;
    }

    .card1-header1 {
        padding: 10px 20px;
        border-bottom: 1px solid #e0e0e0;
        background-color: #f9f9f9;
    }

    .card1-body1 {
        padding: 10px;
    }

    .h5 {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: bold;
        color: #007bff;
    }

    .list-group {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 5px;
        margin-bottom: 20px;
    }

    .list-group-item {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        cursor: pointer;
        text-decoration: none;
        color: black;
        font-size: 14px;
    }

    .list-group-item:hover {
        background-color: #ddd;
    }
    </style>

    <?php
        $id_user = session()->get('id_user');
	?>

    <script>
        // Ambil waktu awal ujian dan id_user dari session storage jika sudah ada, jika tidak, atur waktu awal baru
        var storedStartTime = sessionStorage.getItem('startTime');
        var storedUserId = sessionStorage.getItem('userId');

        // Cek apakah id_user dari session berbeda dengan yang disimpan
        if (storedUserId !== '<?= $id_user ?>') {
            storedStartTime = null; // Jika beda, reset startTime
            sessionStorage.setItem('userId', '<?= $id_user ?>');
        }

        var startTime = storedStartTime ? new Date(storedStartTime) : new Date();
        sessionStorage.setItem('startTime', startTime);

        // Durasi ujian dalam menit
        var duration = <?= $ujian->waktu; ?>;
        // Waktu akhir ujian
        var endTime = new Date(startTime.getTime() + duration * 60000);

        // Waktu selesai ujian dari database
        var tglSelesai = new Date('<?= $ujian->tgl_selesai; ?>');

        // Tentukan waktu akhir ujian berdasarkan waktu selesai ujian
        endTime = endTime > tglSelesai ? tglSelesai : endTime;

        // Fungsi untuk memperbarui waktu yang tersisa
        function updateRemainingTime() {
            var currentTime = new Date();
            var remainingTime = new Date(endTime - currentTime);

            // Konversi waktu menjadi format jam:menit:detik
            var hours = remainingTime.getUTCHours();
            var minutes = remainingTime.getUTCMinutes();
            var seconds = remainingTime.getUTCSeconds();

            // Tampilkan waktu yang tersisa
            document.getElementById('remainingTime').innerText = 'Waktu tersisa: ' + hours + ' jam ' + minutes + ' menit ' + seconds + ' detik';

            // Jika waktu tersisa kurang dari 10 detik, ubah warna font menjadi merah
            if (remainingTime <= 10000) {
                document.getElementById('remainingTime').style.color = 'red';
            }

            // Jika waktu habis, arahkan ke halaman selesai ujian
            if (currentTime > endTime) {
                checkedOptions = [];
                localStorage.removeItem('checkedOptions');
                sessionStorage.setItem('nomorSoal', '1');
                // Menghapus nilai 'startTime' dari session storage
                sessionStorage.removeItem('startTime');
                updateNomorSoal();
                localStorage.clear();
                window.location.href = "<?= base_url('halujian'); ?>";
            }
        }

        // Panggil fungsi updateRemainingTime setiap detik
        setInterval(updateRemainingTime, 1000);

        // Panggil updateRemainingTime untuk pertama kali saat halaman dimuat
        updateRemainingTime();
    </script>

<body style="background-image: url('img/bg10.jpg'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 0.5rem; padding: 0 15px;">

<div class="clearfix">
    <div class="float-left">
        <h1 class="h3 m-0 text-primary-800"><?= $judul; ?></h1>
    </div>
    <div class="float-right">
        <!-- Tampilkan waktu yang tersisa dengan border warna primary -->
        <div >
            <span id="remainingTime"></span>
        </div>
    </div>
</div>

<div id="inputContainer"></div>
<div id="card-container">
<hr style="border-top: 2px solid black;">
<?php if ($soal->tipe_soal == 'Pilihan Ganda') : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-center" style="margin-top: 20px;">
                <div class="col-md-8">
                    <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;" id="cardsoal">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                        Form Jawaban Pilgan
                                    </h4>
                                </div>
                                <div class="col text-right">
                                    <h5 class="m-0 font-weight-bold text-primary"><span id="nomorSoal">1</span></h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row form-group" style="margin-bottom: -10px;">
                                    <label class="col-md-1 text-md-right" for="soal_id">Soal</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <p id="soal"><?= $soal->soal ?></p>
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
                                            if (!empty($pilgan)) {
                                                echo '<p>Pilihlah satu atau lebih:</p>';
                                                foreach ($pilgan as $p) {
                                                    echo '<div>';
                                                    echo '<div class="input-group">';
                                                    if (!empty($p['img_pilgan'])) {
                                                        echo '<img src="' . base_url('img/avatar/' . $p['img_pilgan']) . '" alt="" class="img-thumbnail rounded mb-2" style="margin-left: 1rem;">';
                                                    }
                                                    echo '</div>';
                                                    echo '<div class="input-group" style="margin-top: -5px;">';
                                                    echo '<label for="' . $p['id_pilgan'] . '" class="option-button">';
                                                    echo '<input type="checkbox" id="' . $p['id_pilgan'] . '" name="selected_options[]" value="' . $p['id_pilgan'] . '">';
                                                    echo '<div class="option-text">';
                                                    echo $p['pilgan'];
                                                    echo '</div>';
                                                    echo '</label>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Tidak ada data pilgan.</div>';
                                            }
                                        } else { // Jika hanya satu jawaban benar atau tidak ada jawaban benar, tampilkan dengan radio button
                                            echo '<p style="margin-bottom: 5px;">Pilihlah salah satu:</p>';
                                            if (!empty($pilgan)) {
                                                foreach ($pilgan as $p) {
                                                    echo '<div>';
                                                    echo '<div class="input-group">';
                                                    if (!empty($p['img_pilgan'])) {
                                                        echo '<img src="' . base_url('img/avatar/' . $p['img_pilgan']) . '" alt="" class="img-thumbnail rounded mb-2" style="margin-left: 1rem;">';
                                                    }
                                                    echo '</div>';
                                                    echo '<div class="input-group" style="margin-top: -5px;">';
                                                    echo '<label for="' . $p['id_pilgan'] . '" class="option-button">';
                                                    echo '<input type="radio" id="' . $p['id_pilgan'] . '" name="selected_options[]" value="">';
                                                    echo '<div class="option-text">';
                                                    echo $p['pilgan'];
                                                    echo '</div>';
                                                    echo '</label>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Tidak ada data pilgan.</div>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>      
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between">
                        <div>
                            <a href="javascript:void(0);" class="btn btn-secondary" onclick="loadSoal('back')" id="backButton">Back</a>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="btn btn-primary" onclick="loadSoal('next')" id="nextButton">Next</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card1 shadow-sm border-bottom-primary mb-3" style="margin-bottom: 1rem; max-width: 24rem;">
                        <div class="card1-header1 py-3">
                            <div class="row">
                                <div class="col">
                                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                        Menu Navigasi
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card1-body1" id="menuNavigasi">
                            <div class="list-group">
                                <?php for ($i = 1; $i <= $ujian->jumlah_soal; $i++) : ?>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action" onclick="goToSoal(<?= $i; ?>)">
                                        <?= $i; ?>
                                    </a>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($soal->tipe_soal == 'Uraian') : ?>
<div class="row">
<div class="col-md-12">
<div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Jawaban Uraian
                        </h4>
                    </div>
                    <div class="col text-right">
                        <h5 class="m-0 font-weight-bold text-primary"><span id="nomorSoal">1</span></h5>
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
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="jawaban_uraian" id="jawaban_uraian" class="form-control" rows="4" placeholder="Jawab..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-between">
            <div>
                <a href="javascript:void(0);" class="btn btn-secondary" onclick="loadSoal('back')" id="backButton">Back</a>
            </div>
            <div>
                <a href="javascript:void(0);" class="btn btn-primary" onclick="loadSoal('next')" id="nextButton">Next</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card1 shadow-sm border-bottom-primary mb-3" style="margin-bottom: 1rem; max-width: 24rem;">
            <div class="card1-header1 py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Menu Navigasi
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card1-body1" id="menuNavigasi">
                <div class="list-group">
                    <?php for ($i = 1; $i <= $ujian->jumlah_soal; $i++) : ?>
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action" onclick="goToSoal(<?= $i; ?>)">
                            <?= $i; ?>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php endif; ?>
<?php if ($soal->tipe_soal == 'Benar Salah') : ?>
<div class="row">
<div class="col-md-12">
    <div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Jawaban Benar Salah
                        </h4>
                    </div>
                    <div class="col text-right">
                        <h5 class="m-0 font-weight-bold text-primary"><span id="nomorSoal">1</span></h5>
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
                        <div style="margin-left: 10px;">
                            <div class="input-group" style="margin-top: -5px;">
                                <label for="benar" class="option-button">
                                    <input type="radio" id="Benar" name="selected_option" value="Benar">
                                    Benar
                                </label>
                            </div>
                            <div class="input-group" style="margin-top: -5px;">
                                <label for="salah" class="option-button">
                                    <input type="radio" id="Salah" name="selected_option" value="Salah">
                                    Salah
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-between">
            <div>
                <a href="javascript:void(0);" class="btn btn-secondary" onclick="loadSoal('back')" id="backButton">Back</a>
            </div>
            <div>
                <a href="javascript:void(0);" class="btn btn-primary" onclick="loadSoal('next')" id="nextButton">Next</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card1 shadow-sm border-bottom-primary mb-3" style="margin-bottom: 1rem; max-width: 24rem;">
            <div class="card1-header1 py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Menu Navigasi
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card1-body1" id="menuNavigasi">
                <div class="list-group">
                    <?php for ($i = 1; $i <= $ujian->jumlah_soal; $i++) : ?>
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action" onclick="goToSoal(<?= $i; ?>)">
                            <?= $i; ?>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php endif; ?>
</div>
<!-- inisialisasi variabel currentSoalId pada awalnya -->
<script type="text/javascript">
    var currentSoalId = <?= $current_soal_id; ?>;

    $(document).ready(function () {
        // Ambil nomor soal dari sessionStorage
        var storedNomorSoal = sessionStorage.getItem('nomorSoal');
        var nomorSoal = null;

        // Jika storedNomorSoal tidak null atau undefined
        if (storedNomorSoal !== null && storedNomorSoal !== undefined) {
            // Parse nilai storedNomorSoal ke dalam variabel nomorSoal
            nomorSoal = parseInt(storedNomorSoal);
        }

        var storedUserId = sessionStorage.getItem('userId');
        var id_user = null;

        // Jika storedNomorSoal tidak null atau undefined
        if (storedUserId !== null && storedUserId !== undefined) {
            // Parse nilai storedNomorSoal ke dalam variabel nomorSoal
            id_user = parseInt(storedUserId);
        }

        // Memuat nilai jawaban terpilih dari localStorage sesuai dengan nomor soal
        if (nomorSoal !== null) {
            //$('input[name="selected_option"]').each(function() {
                //var optionId = $(this).attr('id');
                //var selectedOption = localStorage.getItem('selected_option_' + nomorSoal + '_' + id_user);

                // Jika ada nilai jawaban terpilih, atur nilai radio button sesuai dengan ID
                //if (selectedOption !== null && selectedOption !== undefined && selectedOption === optionId) {
                    //$(this).prop('checked', true);
                //}
            //});
        }

        // Ambil jawaban uraian dari localStorage berdasarkan nomor soal
        var jawabanUraian = localStorage.getItem('jawaban_uraian_' + nomorSoal + '_' + id_user);

        // Memasukkan nilai jawaban uraian ke dalam textarea
        if (jawabanUraian !== null && jawabanUraian !== undefined) {
            //$('#jawaban_uraian').val(jawabanUraian);
        }

        // Menangani perubahan pada radio button
        $('input[type="radio"][name="selected_options[]"]').on('change', function () {
            // Ambil nomor soal dari sessionStorage
            var storedNomorSoal = sessionStorage.getItem('nomorSoal');
            
            // Jika storedNomorSoal tidak null atau undefined
            if (storedNomorSoal !== null && storedNomorSoal !== undefined) {
                // Ambil nilai id pilgan dari radio button yang dipilih
                var selectedPilganId = $(this).attr('id');
                
                // Simpan nilai id pilgan yang dipilih ke dalam localStorage
                localStorage.setItem('selected_pilgan_' + storedNomorSoal + '_' + id_user, selectedPilganId);
            }
        });

        // Ambil nomor soal dari sessionStorage
        var storedNomorSoal = sessionStorage.getItem('nomorSoal');
        
        // Jika storedNomorSoal tidak null atau undefined
        if (storedNomorSoal !== null && storedNomorSoal !== undefined) {
            // Ambil nilai id pilgan dari localStorage
            //var selectedPilganId = localStorage.getItem('selected_pilgan_' + storedNomorSoal + '_' + id_user);
            
            // Jika ada nilai id pilgan yang disimpan dalam localStorage
            //if (selectedPilganId !== null && selectedPilganId !== undefined) {
                // Atur tombol radio yang dipilih
                //$('#' + selectedPilganId).prop('checked', true);
            //}
        }

        // Menangani perubahan pada radio button
        $('input[type="radio"][name="selected_options[]"]').on('change', function () {
            var selectedPilganId = $(this).attr('id');
            //alert('Terjadi kesalahan saat' + selectedPilganId);
            var nomorSoal = sessionStorage.getItem('nomorSoal');
            
            if (nomorSoal !== null) {
                // Simpan nilai id pilgan yang dipilih ke dalam localStorage
                localStorage.setItem('selected_pilgan_' + nomorSoal + '_' + id_user, selectedPilganId);
                
                // Kirim data ke server menggunakan AJAX untuk disimpan di dalam database
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("haltes/saveAnswer") ?>',
                    data: {
                        nomor_soal: nomorSoal,
                        selected_option: selectedPilganId,
                        id_user: id_user,
                        soal_id: currentSoalId
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Jawaban berhasil disimpan!');
                        } else {
                            alert('Gagal menyimpan jawaban!');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Penanganan kesalahan (jika diperlukan)
                        alert('Terjadi kesalahan saat menyimpan jawaban!' + selectedOptionId);
                    }
                });
            }
        });

        // Menangani perubahan pada uraian
        $('textarea[name="jawaban_uraian"]').on('input', function () {
            var selectedUraian = $(this).val();
            // Your code to handle the selectedUraian value goes here
            //alert('Terjadi kesalahan saat' + selectedPilganId);
            var nomorSoal = sessionStorage.getItem('nomorSoal');
            
            if (nomorSoal !== null) {
                // Simpan nilai id pilgan yang dipilih ke dalam localStorage
                //localStorage.setItem('selected_pilgan_' + nomorSoal + '_' + id_user, selectedPilganId);
                
                // Kirim data ke server menggunakan AJAX untuk disimpan di dalam database
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("haltes/saveAnswer") ?>',
                    data: {
                        nomor_soal: nomorSoal,
                        selected_option: selectedUraian,
                        id_user: id_user,
                        soal_id: currentSoalId
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Jawaban berhasil disimpan!');
                        } else {
                            alert('Gagal menyimpan jawaban!');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Penanganan kesalahan (jika diperlukan)
                        //alert('Terjadi kesalahan saat menyimpan jawaban!' + selectedUraian);
                    }
                });
            }
        });

        $('input[type="checkbox"][name="selected_options[]"]').on('change', function () {
            var selectedOptionIds = [];
            $('input[type="checkbox"][name="selected_options[]"]').each(function () {
                if ($(this).prop('checked')) {
                    selectedOptionIds.push($(this).val());
                }
            });

            // Mengonversi array menjadi set untuk menghapus nilai yang sama
            var uniqueSelectedOptionIds = new Set(selectedOptionIds);

            // Mengonversi kembali set ke array
            var uniqueSelectedOptionIdsArray = [...uniqueSelectedOptionIds];

            var nomorSoal = sessionStorage.getItem('nomorSoal');
            //alert('Terjadi kesalahan saat' + uniqueSelectedOptionIdsArray);

            if (nomorSoal !== null) {
                // Simpan nilai id pilgan yang dipilih ke dalam localStorage
                //localStorage.setItem('selected_pilgan_' + nomorSoal + '_' + id_user, JSON.stringify(selectedOptionIds));

                // Kirim data ke server menggunakan AJAX untuk disimpan di dalam database
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("haltes/saveAnswerCheckbox") ?>',
                    data: {
                        nomor_soal: nomorSoal,
                        selected_options: uniqueSelectedOptionIdsArray,
                        id_user: id_user,
                        soal_id: currentSoalId
                    },
                    success: function(response) {
                        if (response.success) {
                            //alert('Jawaban berhasil disimpan!');
                        } else {
                            alert('Gagal menyimpan jawaban!');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Penanganan kesalahan (jika diperlukan)
                        alert('Terjadi kesalahan saat menyimpan jawaban!');
                    }
                });
            }
        });

        // Menangani perubahan pada radio button
        $('input[name="selected_option"]').on('change', function () {
            var selectedOptionId = $(this).attr('id');
            var nomorSoal = sessionStorage.getItem('nomorSoal');
            
            if (nomorSoal !== null) {
                // Simpan nilai jawaban terpilih ke dalam localStorage berdasarkan ID dan id_user
                localStorage.setItem('selected_option_' + nomorSoal + '_' + id_user, selectedOptionId);
                
                // Kirim data ke server menggunakan AJAX untuk disimpan di dalam database
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("haltes/saveAnswer") ?>',
                    data: {
                        nomor_soal: nomorSoal,
                        selected_option: selectedOptionId,
                        id_user: id_user,
                        soal_id: currentSoalId
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Jawaban berhasil disimpan!');
                        } else {
                            alert('Gagal menyimpan jawaban!');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Penanganan kesalahan (jika diperlukan)
                        //alert('Terjadi kesalahan saat menyimpan jawaban!' + selectedOptionId);
                    }
                });
            }
        });

        // Fungsi untuk memuat nilai jawaban dari database
        function loadAnswerFromDatabase() {
            var nomorSoal = sessionStorage.getItem('nomorSoal');

            if (nomorSoal !== null) {
                // Ambil jawaban dari database menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("haltes/getAnswer") ?>',
                    data: {
                        nomor_soal: nomorSoal,
                        id_user: id_user,
                        soal_id: currentSoalId
                    },
                    success: function(response) {
                        var answer = response.answer;
                        if (answer && answer.jawaban !== undefined) {
                            if (answer.tipe_soal === 'Uraian') {
                                $('#jawaban_uraian').val(answer.jawaban); // Perbaiki dengan memastikan jawaban terisi
                            } else if (answer.tipe_soal === 'Pilihan Ganda') {
                                $('#' + answer.jawaban).prop('checked', true);
                            } else if (answer.tipe_soal === 'Benar Salah') {
                                $("input[name='selected_option'][value='" + answer.jawaban + "']").prop('checked', true);
                            } else {
                                var options = answer.jawaban.split(',');
                                options.forEach(function(option) {
                                    $('#' + option).prop('checked', true);
                                });
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan saat memuat jawaban:', error);
                    }
                });
            }
        }

        // Panggil fungsi untuk memuat jawaban saat halaman dimuat
        loadAnswerFromDatabase();

    });

</script>

<script type="text/javascript">
    // Variable to store the IDs of checked checkboxes
    //var checkedOptions = [];

    var storedUserId = sessionStorage.getItem('userId');
    var id_user = null;

    // Jika storedNomorSoal tidak null atau undefined
    if (storedUserId !== null && storedUserId !== undefined) {
        // Parse nilai storedNomorSoal ke dalam variabel nomorSoal
        //id_user = parseInt(storedUserId);
    }

    // Function to update checkbox status
    function updateCheckboxStatus() {
        // Loop through the checkedOptions array and check the corresponding checkboxes
        //checkedOptions.forEach(function(optionId) {
            //$('#' + optionId).prop('checked', true);
        //});
    }

    // Function to save checked options to local storage
    function saveCheckedOptionsToLocalStorage() {
        // Combine checkedOptions with id_user
        //var optionsWithUserId = { id_user: id_user, checkedOptions: checkedOptions };
        //localStorage.setItem('checkedOptions', JSON.stringify(optionsWithUserId));
    }

    // Function to load checked options from local storage
    function loadCheckedOptionsFromLocalStorage() {
        //var storedOptions = localStorage.getItem('checkedOptions');
        //if (storedOptions) {
            //var optionsWithUserId = JSON.parse(storedOptions);
            // Check if the id_user from localStorage matches the active id_user
            //if (optionsWithUserId.id_user === id_user) {
                //checkedOptions = optionsWithUserId.checkedOptions;
            //}
        //}
    }

    // Event listener for checkbox change
    //$(document).on('change', 'input[type="checkbox"]', function() {
        //var optionId = $(this).attr('id');
        // Check if the checkbox is checked
        //if ($(this).is(':checked')) {
            // If checked, add the ID to the checkedOptions array
            //if (!checkedOptions.includes(optionId)) {
                //checkedOptions.push(optionId);
            //}
        //} else {
            // If unchecked, remove the ID from the checkedOptions array
            //checkedOptions = checkedOptions.filter(function(id) {
                //return id !== optionId;
            //});
        //}

        // Save checked options and id_user to local storage
        //saveCheckedOptionsToLocalStorage();
    //});

    // Event listener for textarea change
    $(document).on('input', 'textarea[name="jawaban_uraian"]', function() {
        // Ambil nomor soal dari sessionStorage
        var storedNomorSoal = sessionStorage.getItem('nomorSoal');
        var nomorSoal = null;

        // Jika storedNomorSoal tidak null atau undefined
        if (storedNomorSoal !== null && storedNomorSoal !== undefined) {
            // Parse nilai storedNomorSoal ke dalam variabel nomorSoal
            nomorSoal = parseInt(storedNomorSoal);
        }

        var storedUserId = sessionStorage.getItem('userId');
        var id_user = null;

        // Jika storedNomorSoal tidak null atau undefined
        if (storedUserId !== null && storedUserId !== undefined) {
            // Parse nilai storedNomorSoal ke dalam variabel nomorSoal
            id_user = parseInt(storedUserId);
        }

        var jawabanUraian = $(this).val();

        // Simpan jawaban uraian ke dalam localStorage dengan kunci yang berdasarkan nomor soal
        if (nomorSoal !== null && !isNaN(nomorSoal)) {
            localStorage.setItem('jawaban_uraian_' + nomorSoal + '_' + id_user, jawabanUraian);
        }
    });

    // Ambil id_soal saat ini dari URL
    var currentSoalId = new URLSearchParams(window.location.search).get('id_soal');

    // Jika id_soal saat ini tidak null atau undefined
    if (currentSoalId !== null && currentSoalId !== undefined) {
        // Simpan id_soal ke dalam variabel JavaScript
        currentSoalId = parseInt(currentSoalId);
    } else {
        // Jika id_soal saat ini null atau undefined, set currentSoalId ke null
        currentSoalId = <?= $current_soal_id ?? 'null'; ?>;
    }

    // Function to load checked options from local storage when the page is loaded
    function loadPage() {
        // Load checked options from local storage only if id_soal exists in the URL
        if (currentSoalId !== null && currentSoalId !== undefined) {
            //loadCheckedOptionsFromLocalStorage();
            
        } else {
            // Clear checkedOptions array and remove data from local storage
            checkedOptions = [];
            localStorage.removeItem('checkedOptions');
        }

        // Call the loadSoal function when the page is first loaded
        loadSoal('');
    }

    // Fungsi untuk mengarahkan ke halaman soal berdasarkan nomor soal
    function goToSoal(nomorSoal) {
        // Ajukan permintaan AJAX untuk mendapatkan ID soal berdasarkan nomor soal
        $.ajax({
            type: 'POST',
            url: '<?= base_url("haltes/find_soal_id_by_nomor") ?>',
            data: {
                nomor_soal: nomorSoal,
                ujian_id: <?= $ujian_id; ?>,
            },
            success: function(response) {
                // Jika respons dari server berhasil
                if (response.success) {
                    var id_soal = response.id_soal;
                    // Simpan nomor soal ke dalam sessionStorage
                    sessionStorage.setItem('nomorSoal', nomorSoal);

                    // Panggil fungsi updateNomorSoal untuk memperbarui nomor soal
                    updateNomorSoal();
                    // Jika ID soal ditemukan, arahkan ke halaman dengan ID soal tersebut
                    if (id_soal !== null) {
                        var newURL = window.location.href.split('?')[0] + '?id_soal=' + id_soal;
                        window.location.href = newURL;
                    }
                } else {
                    // Tampilkan pesan kesalahan jika diperlukan
                    console.error('Error finding soal ID:', response.message);
                }
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan kesalahan jika ada kesalahan AJAX
                console.error('AJAX Error:', error);
            }
        });
    }

    // Variabel global untuk menyimpan nomor soal
    var nomorSoal = 1;

    // Fungsi untuk memperbarui nomor soal pada header card
    function updateNomorSoal() {
        $('#nomorSoal').text('Soal ' + nomorSoal);
    }
    var menuNavigasi = $('#menuNavigasi').html();
    // Fungsi untuk memuat soal berdasarkan aksi (next atau back)
    function loadSoal(action) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("haltes/load_soal") ?>',
            data: {
                action: action,
                ujian_id: <?= $ujian_id; ?>,
                current_soal_id: currentSoalId
            },
            success: function(response) {
                console.log('Response:', response);
                $('#card-container').empty();
                //$('#durasi').hide();
                // Update the HTML content with the new question
                $('#inputContainer').html(response);
                $('#menuNavigasi').html(menuNavigasi); 
                // Update checkbox status
                updateCheckboxStatus();

                // Tambahkan kondisi untuk menyesuaikan nomor soal saat tombol "Back" ditekan
                if (action === 'back') {
                    nomorSoal--;
                } if (action === 'next') {
                    nomorSoal++;
                }

                // Simpan nomor soal ke dalam sessionStorage
                sessionStorage.setItem('nomorSoal', nomorSoal);

                // Panggil fungsi updateNomorSoal untuk memperbarui nomor soal
                updateNomorSoal();
                // Update the URL after loading the new question
                updateURL(action, currentSoalId);
                
            }
        });
    }

    // Fungsi untuk memperbarui nomor soal pada header card
    function updateNomorSoal() {
        // Ambil nomor soal dari sessionStorage
        var storedNomorSoal = sessionStorage.getItem('nomorSoal');
        
        // Jika storedNomorSoal tidak null atau undefined
        if (storedNomorSoal !== null && storedNomorSoal !== undefined) {
            // Parse nilai storedNomorSoal ke dalam variabel nomorSoal
            nomorSoal = parseInt(storedNomorSoal);
        }
        $('#nomorSoal').text('Soal ' + nomorSoal);
        // Periksa apakah nomor soal adalah satu
        if (nomorSoal === 1) {
            // Jika nomor soal adalah satu, sembunyikan tombol "Back"
            $('#backButton').hide();
        } else {
            // Jika nomor soal bukan satu, tampilkan tombol "Back"
            $('#backButton').show();
        }
        // Check if it's the last question
        is_last_question = (nomorSoal == <?= $ujian->jumlah_soal; ?>); // Menggunakan jumlah total soal dari variabel $ujian->jumlah_soal
        // Hide or show the "Next" and "Selesai" buttons based on whether it's the last question
        if (is_last_question) {
            $('#nextButton').replaceWith('<a href="javascript:void(0);" class="btn btn-primary" onclick="completeExam()" id="finishButton">Selesai</a>');
        } else {
            $('#nextButton').text('Next');
        }

    }

    // Panggil fungsi updateNomorSoal saat halaman pertama kali dimuat
    $(document).ready(updateNomorSoal);

    // Function to update the URL when "Next" or "Back" button is clicked
    function updateURL(action, currentSoalId) {
        var newURL = window.location.href.split('?')[0] + '?id_soal=' + currentSoalId;
        console.log('New URL:', newURL);
        window.history.pushState({ path: newURL }, '', newURL);
    }

    function completeExam() {
        // Clear checkedOptions array and remove data from local storage
        checkedOptions = [];
        localStorage.removeItem('checkedOptions');
        sessionStorage.setItem('nomorSoal', '1');
        updateNomorSoal();
        sessionStorage.removeItem('startTime');

        // Mark the exam as completed
        localStorage.setItem('examCompleted', 'true');

        // Call the server to mark the exam as completed
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= base_url('haltes/completeExam'); ?>", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Clear other data and redirect to the exam list page
                localStorage.clear();
                window.location.href = "<?= base_url('halujian'); ?>";
            }
        };
        xhr.send("id_user=<?= $id_user; ?>&id_ujian=<?= $ujian_id; ?>");
    }

    // Call the loadPage function when the page is loaded
    $(document).ready(loadPage);

    // Event listener for the "Next" button
    $('#nextButton').on('click', function() {
        loadSoal('next');
    });

    // Event listener for the "Back" button
    $('#backButton').on('click', function() {
        loadSoal('back');
    });
</script>

</body>

<!-- Load jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
