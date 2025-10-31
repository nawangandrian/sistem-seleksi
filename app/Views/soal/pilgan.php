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

    </style>
<body style="background-image: url('<?= base_url('img/bg10.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 0.5rem; padding: 0 15px;">

<div class="clearfix">
    <div class="float-left">
        <h1 class="h3 m-0 text-primary-800"><?= $judul; ?></h1>
    </div>
    <div class="float-right">
    <div class="col-auto">
        <a href="<?= base_url('halpilgan/tampil/'. $soal->id_soal ) ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
<div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Pilgan
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-icon-split" id="addInput">
                            <span class="icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">
                                Tambah Input
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body" id="inputContainer">
                <form action="<?= base_url('halpilgan/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label class="col-md-2 text-md-right" for="soal_id">ID Soal</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <!-- Input tersembunyi untuk menyimpan id_soal -->
                                <input type="hidden" name="soal_id" id="soal_id" value="<?= $soal->id_soal ?>">

                                <!-- Input yang terlihat untuk menampilkan soal -->
                                <input value="<?= $soal->soal ?>" type="text" class="form-control" placeholder="soal..." required autofocus autocomplete="off" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 text-md-right" for="pilgan">Pilgan</label>
                        <div class="col-md-8">
                            <div class="input-group">
                            <input type="file" name="img_pilgan[]" id="img_pilgan" multiple>

                            </div>
                            <div class="input-group" style="margin-top: 5px;">
                                <input value="" name="pilgan[]" id="pilgan" type="text" class="form-control" placeholder="pilgan..." required autofocus autocomplete="off"/>
                            </div>
                            <div class="input-group" style="margin-top: 5px;">
                                <label style="margin-left: 20px; margin-right: 30px;">
                                    <input type="checkbox" name="jawaban_benar[]" value="1" class="form-check-input" onclick="uncheckAll(this)">
                                    Benar
                                </label>
                                <label>
                                    <input type="checkbox" name="jawaban_benar[]" value="0" class="form-check-input" onclick="uncheckAll(this)">
                                    Salah
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Input tambahan akan ditambahkan di bawah ini -->
                    <div class="row form-group" id="additionalInputs">
                        <!-- Input tambahan akan ditambahkan di sini -->
                    </div>
                    <div class="row form-group">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var counter = 0; // Variabel untuk menyimpan nilai counter

    document.getElementById("addInput").addEventListener("click", function() {
        var inputContainer = document.getElementById("additionalInputs");
        if (counter < 4) { // Memeriksa apakah jumlah inputan baru kurang dari 4
            var newInput = document.createElement("div");
            newInput.className = "col-md-12 offset-md-0"; // Memastikan input tambahan memiliki lebar yang sama dengan input asli
            var labelName = String.fromCharCode(66 + counter); // Mengonversi nilai counter menjadi huruf alfabet ASCII (dimulai dari B)
            newInput.innerHTML = `
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="pilgan"></label>
                    <div class="col-md-8">
                            <div class="input-group">
                                <input type="file" name="img_pilgan[]" id="img_pilgan" multiple>
                            </div>
                            <div class="input-group" style="margin-top: 5px;">
                                <input value="" name="pilgan[]" id="pilgan" type="text" class="form-control" placeholder="pilgan..." required autofocus autocomplete="off"/>
                            </div>
                            <div class="input-group" style="margin-top: 5px;">
                                <label style="margin-left: 20px; margin-right: 30px;">
                                    <input type="checkbox" name="jawaban_benar[]" value="1" class="form-check-input" onclick="uncheckAll(this)">
                                    Benar
                                </label>
                                <label>
                                    <input type="checkbox" name="jawaban_benar[]" value="0" class="form-check-input" onclick="uncheckAll(this)">
                                    Salah
                                </label>
                            </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm deleteInput">Hapus</button>
                    </div>
                </div>`;
            inputContainer.appendChild(newInput);
            counter++; // Menambahkan nilai counter untuk label berikutnya
        } else {
            alert("Maaf, Anda hanya dapat menambahkan maksimal 4 inputan baru.");
        }
    });

    // Menghapus input saat tombol Hapus diklik
    document.getElementById("inputContainer").addEventListener("click", function(e) {
        if (e.target && e.target.classList.contains("deleteInput")) {
            var deletedRow = e.target.closest(".row");
            var label = deletedRow.querySelector("label").textContent; // Ambil teks label yang akan dihapus
            deletedRow.remove(); // Hapus elemen induk dari tombol Hapus yang ditekan

            counter--; // Mengurangi nilai counter saat input dihapus
        }
    });
</script>
<script>
    function uncheckAll(checkbox, group) {
        var checkboxes = document.querySelectorAll("input[name='jawaban_benar[]']");
        checkboxes.forEach(function(currentCheckbox) {
            if (currentCheckbox !== checkbox && currentCheckbox.closest("div").textContent.includes(group)) {
                currentCheckbox.checked = false;
            }
        });
    }
</script>

</body>
