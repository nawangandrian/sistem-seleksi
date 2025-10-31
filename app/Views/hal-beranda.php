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
        .iframe-container {
            position: relative;
            width: 100%;
            height: 80vh; /* 80% dari tinggi layar, bisa disesuaikan */
            overflow: hidden;
        }

        .iframe-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .iframe-container {
                height: 90vh; /* Perbesar di layar kecil */
            }
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
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
        </div>
    <?php endif; ?>

    <?php
        // Memeriksa peran pengguna
        $role = session()->get('role');
        $nama = session()->get('nama');
        $id_user = session()->get('id_user');
    ?>

    
    <?php if($role == 'admin'){ ?>

    <section id="hero" class="jumbotron text-left"
        style="background-image: url('<?= base_url('img/bg9.jpg') ?>'); background-size: cover; background-position: center; margin-top: 20px;">
        <h1 class="display-4 text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Selamat Datang Di Sistem Seleksi Calon Peserta Pelatihan UPTD BLK Kudus</h1>
        <p class="lead text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Sistem ini digunakan untuk menyeleksi calon peserta pelatihan di Balai Latihan Kerja (BLK)</p>
    </section>
    <div class="row">

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Pelatihan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelatihan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Peserta</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $peserta; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Seleksi Pengetahuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ujian; ?></div>
                                </div>
                                <div class="col-auto">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Seleksi Wawancara</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelatihan; ?></div>
                                </div>
                                <div class="col-auto">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 1rem;">
        <!-- Bar Chart -->
        <div class="col-md-8 mb-4"> <!-- Tambahkan mb-4 di sini -->
            <div class="card shadow mb-4 h-100">
                <!-- Card Header -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Jumlah Peserta Tes Per Pelatihan pada Tahun 
                        <span id="selectedYear"><?= date('Y'); ?></span>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="padding-bottom: 4rem;">
                    <!-- Dropdown Pilihan Tahun -->
                    <div class="col-md-6">
                        <label for="tahun_pelatihan">Pilih Tahun:</label>
                        <select id="tahun_pelatihan" class="form-control">
                            <option value="">Semua Tahun</option>
                            <?php foreach ($tahunPelatihan as $tahun) : ?>
                                <option value="<?= $tahun['tahun_pelatihan']; ?>"><?= $tahun['tahun_pelatihan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Bar Chart -->
                    <div class="chart-area">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-md-4 mb-4"> <!-- Tambahkan mb-4 di sini agar ada jarak di layar kecil -->
            <div class="card shadow mb-4 h-100">
                <!-- Card Header -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Jumlah Peserta Tes Berdasarkan 
                        <span id="selectedCategory">Jenis Kelamin</span>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Dropdown Pilihan Kategori -->
                    <div class="col-md-6">
                        <label for="kategori_peserta">Pilih Kategori:</label>
                        <select id="kategori_peserta" class="form-control">
                            <option value="jenis_kelamin">Jenis Kelamin</option>
                            <option value="usia">Usia</option>
                            <option value="daerah">Daerah Asal</option>
                        </select>
                    </div>
                    <!-- Pie Chart -->
                    <div class="chart-area">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } elseif($role == 'peserta'){ ?>
    <section id="hero" class="jumbotron text-left"
        style="background-image: url('<?= base_url('img/bg9.jpg') ?>'); background-size: cover; background-position: center; margin-top: 20px;">
        <h1 class="display-4 text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Selamat Datang Di Sistem Seleksi Calon Peserta Pelatihan UPTD BLK Kudus</h1>
        <p class="lead text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Sistem ini digunakan untuk menyeleksi calon peserta pelatihan di Balai Latihan Kerja (BLK)</p>
        <?php if (!empty($hasil_seleksi_pdf)) : ?>
            <a href="<?= base_url('halseleksi/peserta_hasil'); ?>" class="btn btn-primary btn-lg">Lihat Hasil Tes</a>
        <?php else : ?>
            <a href="<?= base_url('halujian'); ?>" class="btn btn-primary btn-lg">Lihat Tes Pengetahuan</a>
        <?php endif; ?>
    </section>
    <div class="row" style="margin-bottom: 0rem;">
        <?php if (!empty($hasil_seleksi_pdf)) : ?>
            <center>
                <div class="col-md-12 mb-4">
                    <div class="card shadow mb-4 h-100">
                        <!-- Card Header -->
                        <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-white">Hasil Tes Seleksi</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body p-0">
                            <!-- Iframe Responsive -->
                            <div class="iframe-container">
                                <iframe src="<?= $hasil_seleksi_pdf ?>" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        <?php else : ?>
            <center>
                <p class="text-center text-danger p-3"></p>
            </center>
        <?php endif; ?>
    </div>
    <?php } elseif($role == 'kepala blk'){ ?>
        <section id="hero" class="jumbotron text-left"
        style="background-image: url('<?= base_url('img/bg9.jpg') ?>'); background-size: cover; background-position: center; margin-top: 20px;">
        <h1 class="display-4 text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Selamat Datang Di Sistem Seleksi Calon Peserta Pelatihan UPTD BLK Kudus</h1>
        <p class="lead text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Sistem ini digunakan untuk menyeleksi calon peserta pelatihan di Balai Latihan Kerja (BLK)</p>
    </section>
    <div class="row">

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Pelatihan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelatihan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Peserta</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $peserta; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Seleksi Pengetahuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ujian; ?></div>
                                </div>
                                <div class="col-auto">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Seleksi Wawancara</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelatihan; ?></div>
                                </div>
                                <div class="col-auto">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 1rem;">
        <!-- Bar Chart -->
        <div class="col-md-8 mb-4"> <!-- Tambahkan mb-4 di sini -->
            <div class="card shadow mb-4 h-100">
                <!-- Card Header -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Jumlah Peserta Tes Per Pelatihan pada Tahun 
                        <span id="selectedYear"><?= date('Y'); ?></span>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="padding-bottom: 4rem;">
                    <!-- Dropdown Pilihan Tahun -->
                    <div class="col-md-6">
                        <label for="tahun_pelatihan">Pilih Tahun:</label>
                        <select id="tahun_pelatihan" class="form-control">
                            <option value="">Semua Tahun</option>
                            <?php foreach ($tahunPelatihan as $tahun) : ?>
                                <option value="<?= $tahun['tahun_pelatihan']; ?>"><?= $tahun['tahun_pelatihan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Bar Chart -->
                    <div class="chart-area">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-md-4 mb-4"> <!-- Tambahkan mb-4 di sini agar ada jarak di layar kecil -->
            <div class="card shadow mb-4 h-100">
                <!-- Card Header -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Jumlah Peserta Tes Berdasarkan 
                        <span id="selectedCategory">Jenis Kelamin</span>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Dropdown Pilihan Kategori -->
                    <div class="col-md-6">
                        <label for="kategori_peserta">Pilih Kategori:</label>
                        <select id="kategori_peserta" class="form-control">
                            <option value="jenis_kelamin">Jenis Kelamin</option>
                            <option value="usia">Usia</option>
                            <option value="daerah">Daerah Asal</option>
                        </select>
                    </div>
                    <!-- Pie Chart -->
                    <div class="chart-area">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php } ?>
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    const ctx = document.getElementById('myBarChart').getContext('2d');
    let myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($pelatihanData, 'nama_pelatihan')) ?>,
            datasets: [{
                label: 'Jumlah Peserta',
                data: <?= json_encode(array_column($pelatihanData, 'jumlah_peserta')) ?>,
                backgroundColor: 'rgba(78, 115, 223, 0.7)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    document.getElementById('tahun_pelatihan').addEventListener('change', function () {
        let selectedYear = this.value;
        document.getElementById('selectedYear').innerText = selectedYear ? selectedYear : 'Semua Tahun';

        // Jika "Semua Tahun" dipilih, kirim request tanpa parameter tahun
        let url = `<?= base_url('Halberanda/filterPelatihan') ?>/${selectedYear || "Semua Tahun"}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                myBarChart.data.labels = data.labels;
                myBarChart.data.datasets[0].data = data.jumlah_peserta;
                myBarChart.update();
            });
    });

    const ctxPie = document.getElementById('myPieChart').getContext('2d');
    let myPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: <?= json_encode(array_column($pesertaData, 'jenis_kelamin')) ?>,
            datasets: [{
                data: <?= json_encode(array_column($pesertaData, 'jumlah_peserta')) ?>,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Ini memungkinkan chart menyesuaikan tinggi-lebar
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    });

    document.getElementById('kategori_peserta').addEventListener('change', function () {
        let selectedCategory = this.value;
        document.getElementById('selectedCategory').innerText = this.options[this.selectedIndex].text;
        
        let url = `<?= base_url('Halberanda/filterPeserta') ?>/${selectedCategory}`;
        
        fetch(url)
            .then(response => response.json())
            .then(data => {
                myPieChart.data.labels = data.labels;
                myPieChart.data.datasets[0].data = data.jumlah_peserta;
                myPieChart.update();
            });
    });
    
</script>
    