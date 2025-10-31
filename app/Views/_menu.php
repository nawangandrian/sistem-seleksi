<?php
    // Memeriksa peran pengguna
    $role = session()->get('role');
    $nama = session()->get('nama');
    $foto = session()->get('foto');
    $id_user = session()->get('id_user');
    $pw_user = session()->get('pw_user');

    // Mendefinisikan font size
    $font_size = 'font-size: 14px;';
?>
<center style="margin-top: -30px;"><a hidden> Menu Pengguna (<?= $role ?>) - </a></center>
<script src="<?= base_url('js/scripts.js') ?>"></script>
<link href="<?= base_url('css/styles1.css') ?>" rel="stylesheet" />

<!-- Komponen CSS Bootstrap 4 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- Favicon-->
<link type="image/png" sizes="96x96" rel="icon" href="img/Logo BLK.png">

<!-- Komponen FontAwesome -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<!-- Komponen Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril Fatface">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<!-- Komponen DataTables (Tabel Data) -->
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- data tables js -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<!-- data tables css -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<!-- membuat datatables -->
<script type="text/javascript">
    $(document).ready(function(){ $('#tabel_data').DataTable(); });
</script>

<!-- Google Fonts CDN Link -->
<link
  href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800;900&display=swap"
  rel="stylesheet"
/>
<!-- Font Awesome CDN Link -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<!-- stylesheet -->
<link rel="stylesheet" href="css/styley.css" />

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/fonts.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url('assets/vendor/daterangepicker/daterangepicker.css') ?>" rel="stylesheet">
    <link href="<?= base_url('sb-admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/gijgo/css/gijgo.min.css') ?>" rel="stylesheet">
    <style>
    .img-profile {
    width: 38px; /* Sesuaikan lebar gambar sesuai kebutuhan */
    height: 38px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
    object-fit: cover; /* Biarkan gambar menutupi seluruh area yang tersedia */
    border: 2.5px solid blue; /* Atur ketebalan dan warna border sesuai kebutuhan */
    }
    .nav-link {
    position: relative;
    }

    .nav-link .fas {
        margin-right: 10px;
    }

    /* Mengatur ikon panah ke bawah */
    .nav-link .fas.fa-angle-down {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Mengatur ikon panah ke atas saat dropdown dibuka */
    .nav-link.collapsed .fas.fa-angle-down {
        transform: translateY(-50%) rotate(180deg);
    }

    .collapse-inner {
        padding: 10px;
    }

    .collapse-item {
        display: block;
        padding: 5px 0;
        color: #333;
        text-decoration: none;
    }

    .collapse-item:hover {
        color: #007bff;
        text-decoration: none;
    }

    /* Style untuk tautan dropdown */
    .nav-link.collapsed {
        color: #4e73df; /* Warna teks */
    }

    /* Style untuk tulisan "Master Barang" */
    .collapse-inner h6 {
        font-weight: bold; /* Tulisan tebal */
        color: #c1c2c7; /* Warna abu-abu */
    }

    /* Style untuk menu dropdown */
    .collapse-inner .collapse-item {
        padding-left: 40px; /* Menambahkan gap ke kiri */
    }
    </style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-primary bg-primary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-white" href="<?= base_url('halberanda') ?>">SELEKSI PESERTA</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars text-white"></i></button>
        

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline small text-capitalize" style="color: white;">
                        <?= $nama ?>
                    </span>
                    <?php
                    // Mendapatkan instance dari ModelCrud
                    use App\Models\crudseleksi;

                    // Membuat instance dari model
                    $modelCrud = new crudseleksi();
                    // Mendapatkan data user berdasarkan id_user
                    $datauser = $modelCrud->detailkode('user', 'id_user', $id_user);
                    ?>

                    <!-- Menampilkan gambar profil -->
                    <img class="img-profile rounded-circle" src="<?= base_url('img/avatar/' . $datauser->foto) ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('halprofil'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <a class="dropdown-item" href="<?= base_url('halprofil/setting/' . $id_user); ?>">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pengaturan
                    </a>
                    <a class="dropdown-item" href="<?= base_url('halprofil/ubahpassword/' . $id_user); ?>">
                        <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                        Ubah Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('halmasuk/keluar'); ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Keluar
                    </a>
                </div>
            </li>

        </ul>

        </nav>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <?php if($role == 'admin'){ ?>
                    <div class="sb-sidenav-menu" style="margin-top: -20px;">
                        <div class="nav" style="overflow-x: hidden; margin-bottom: 10px;">
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: 20px; font-size: 14px; margin-bottom: -5px; color: #858796; font-weight: bold;" href="<?= base_url('halberanda'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Beranda
                                </a>
                            </li>
                            <hr style="margin-bottom: 0; margin-top: 0px; border-top: 1px solid gray;">
                            <div class="sb-sidenav-menu-heading" style="margin-top: -15px; <?= $font_size ?>">Menu Master</div>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -20px; margin-left: 7px; font-size: 14px; color: #858796; font-weight: bold;" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                                    <div class="sb-nav-link-icon" style="margin-left: -7px;"><i class="fa-solid fa-user"></i></div>
                                    Pengguna
                                    <div class="nav-link collapsed" style="margin-left: 4rem;"><i class="fas fa-angle-down" onclick="toggleDropdown(event)"></i></div>
                                </a>
                                <div id="collapseMaster" style="margin-top: -10px; <?= $font_size ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <h6 class="collapse-header" style="font-size: 14px;" >Menu Pengguna:</h6>
                                        <a class="collapse-item" href="<?= base_url('haladministrasi'); ?>">Administrasi</a>
                                        <a class="collapse-item" href="<?= base_url('halkepala_blk'); ?>">Kepala BLK</a>
                                        <a class="collapse-item" href="<?= base_url('halpeserta'); ?>">Peserta</a>
                                    </div>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -20px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halpelatihan'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                                    Pelatihan
                                </a>
                            </li>
                            <hr style="margin-bottom: 0; margin-top: 5px; border-top: 1px solid gray;">
                            <div class="sb-sidenav-menu-heading" style="margin-top: -15px; <?= $font_size ?>">Menu Seleksi</div>

                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -20px; margin-left: 7px; font-size: 14px; color: #858796; font-weight: bold;" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                                    <div class="sb-nav-link-icon" style="margin-left: -7px;"><i class="fa-solid fa-book-atlas"></i></div>
                                    Soal
                                    <div class="nav-link collapsed" style="margin-left: 6.3rem;"><i class="fas fa-angle-down" onclick="toggleDropdown1(event)"></i></div>
                                </a>
                                <div id="collapseMaster1" style="margin-top: -10px; <?= $font_size ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                    <div class="bg-light py-2 collapse-inner rounded">
                                        <h6 class="collapse-header" style="font-size: 14px;" >Menu Soal:</h6>
                                        <a class="collapse-item" href="<?= base_url('halsoal'); ?>">Soal Pengetahuan</a>
                                        <a class="collapse-item" href="<?= base_url('halsoalwawancara'); ?>">Soal Wawancara</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -15px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halujian'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                                    Tes Pengetahuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halhasilp'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                                    Hasil Pengetahuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halwawancara'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-comments"></i></div>
                                    Hasil Wawancara
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halseleksi'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-horizontal"></i></div>
                                    Hasil Seleksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('hallaporan'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i></div>
                                    Laporan Pelatihan
                                </a>
                            </li>

                            <hr style="margin-bottom: 0; margin-top: 5px; border-top: 1px solid gray;">
                            <div class="sb-sidenav-menu-heading" style="margin-top: -15px; <?= $font_size ?>">Menu Pengaturan</div>
                            
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halpengguna'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                    Manejemen User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halmasuk/keluar'); ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                    Keluar
                                </a>
                            </li>
                        </div>
                    </div>
                <?php } elseif($role == 'peserta'){ ?>
                    <div class="sb-sidenav-menu" style="margin-top: -20px;">
                        <div class="nav" style="overflow-x: hidden; margin-bottom: 10px;">
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: 20px; font-size: 14px; margin-bottom: -5px; color: #858796; font-weight: bold;" href="<?= base_url('halberanda'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Beranda
                                </a>
                            </li>
                            <hr style="margin-bottom: 0; margin-top: 0px; border-top: 1px solid gray;">
                            <div class="sb-sidenav-menu-heading" style="margin-top: -15px; <?= $font_size ?>">Menu Transaksi</div>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="font-size: 14px; margin-top: -15px; color: #858796; font-weight: bold;" href="<?= base_url('halujian'); ?>">
                                    <div class="sb-nav-link-icon" style="margin-left: 5px; vertical-align: middle;"><i class="fa-solid fa-book-open-reader"></i></div>
                                    Tes Pengetahuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="font-size: 14px; margin-top: -15px; color: #858796; font-weight: bold;" href="<?= base_url('halseleksi/peserta_hasil'); ?>">
                                    <div class="sb-nav-link-icon" style="margin-left: 5px; vertical-align: middle;"><i class="fa-solid fa-square-poll-horizontal"></i></div>
                                    Hasil Seleksi
                                </a>
                            </li>
                            <hr style="margin-bottom: 0; margin-top: 10px; border-top: 1px solid gray;">
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: 0px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halmasuk/keluar'); ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                    Keluar
                                </a>
                            </li>
                        </div>
                    </div>
                <?php } elseif($role == 'kepala blk'){ ?>
                    <div class="sb-sidenav-menu" style="margin-top: -20px;">
                        <div class="nav" style="overflow-x: hidden; margin-bottom: 10px;">
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: 20px; font-size: 14px; margin-bottom: -5px; color: #858796; font-weight: bold;" href="<?= base_url('halberanda'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Beranda
                                </a>
                            </li>
                            <hr style="margin-bottom: 0; margin-top: 0px; border-top: 1px solid gray;">
                            <div class="sb-sidenav-menu-heading" style="margin-top: -15px; <?= $font_size ?>">Menu Seleksi</div>

                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halhasilp'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                                    Hasil Pengetahuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halwawancara'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-comments"></i></div>
                                    Hasil Wawancara
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halseleksi'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-horizontal"></i></div>
                                    Hasil Seleksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('hallaporan'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i></div>
                                    Laporan Pelatihan
                                </a>
                            </li>

                            <hr style="margin-bottom: 0; margin-top: 5px; border-top: 1px solid gray;">
   
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="margin-top: -10px; font-size: 14px; color: #858796; font-weight: bold;" href="<?= base_url('halmasuk/keluar'); ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                    Keluar
                                </a>
                            </li>
                        </div>
                    </div>
                <?php } ?>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <!-- memasukkan form menu-->
                <?php include('_content.php'); ?>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <span>Copyright © <a href="https://www.instagram.com/blk_kudus" target="_blank">BLK Kudus</a></span>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
<script>
    // Fungsi untuk menangani klik pada tautan dropdown
    function toggleDropdown(event) {
        event.preventDefault(); // Mencegah navigasi ke tautan

        // Mengambil elemen yang menjadi target dropdown
        var collapseMaster = document.getElementById('collapseMaster');

        // Memeriksa apakah dropdown sedang ditampilkan
        var isExpanded = collapseMaster.classList.contains('show');

        // Jika dropdown sedang ditampilkan, sembunyikan; jika tidak, tampilkan
        if (isExpanded) {
            collapseMaster.classList.remove('show'); // Sembunyikan dropdown
        } else {
            collapseMaster.classList.add('show'); // Tampilkan dropdown
        }
    }
    function toggleDropdown1(event) {
        event.preventDefault(); // Mencegah navigasi ke tautan

        // Mengambil elemen yang menjadi target dropdown
        var collapseMaster = document.getElementById('collapseMaster1');

        // Memeriksa apakah dropdown sedang ditampilkan
        var isExpanded = collapseMaster.classList.contains('show');

        // Jika dropdown sedang ditampilkan, sembunyikan; jika tidak, tampilkan
        if (isExpanded) {
            collapseMaster.classList.remove('show'); // Sembunyikan dropdown
        } else {
            collapseMaster.classList.add('show'); // Tampilkan dropdown
        }
    }
</script>
<script type="text/javascript">
   $(document).ready(function() {
    if ($.fn.DataTable.isDataTable('#dataTable')) {
        $('#dataTable').DataTable().destroy(); // Menghancurkan instance DataTable yang ada
    }

    var table = $('#dataTable').DataTable({
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
                messageTop: function() {
                    return $('#dataTable').attr('name') ? 'Tabel ' + $('#dataTable').attr('name') : 'Tabel';
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
                autoPrint: false, // Menambahkan opsi autoPrint dan set nilainya menjadi false
                messageTop: function() {
                    return $('#dataTable').attr('name') ? 'Tabel ' + $('#dataTable').attr('name') : 'Tabel';
                },
                customize: function(win) {
                $(win.document.body).css('font-size', '10pt'); // Ukuran font cetak
                $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit'); // Menambahkan kelas compact dan mengatur ukuran font tabel

                // Ambil nama dari tabel
                var tableName = $('#dataTable').attr('name');

                // Ambil jumlah baris dalam kolom penerima
                var rowCount = $('#dataTable tbody tr').length;

                // Inisialisasi objek untuk melacak nilai yang telah ditemukan
                var uniqueValues = {};

                // Ambil kolom penerima
                var $kolomPenerima = $('#dataTable tbody td:nth-child(9)');

                // Loop melalui setiap elemen dalam kolom penerima
                $kolomPenerima.each(function() {
                    var nilai = $(this).text().trim();

                    // Periksa apakah nilai sudah ada dalam objek uniqueValues
                    if (uniqueValues[nilai]) {
                        // Nilai sudah ditemukan sebelumnya, Anda dapat menangani ini di sini
                        console.log('Nilai yang sama ditemukan: ' + nilai);
                    } else {
                        // Tambahkan nilai ke objek uniqueValues
                        uniqueValues[nilai] = true;
                    }
                });

                // Sekarang uniqueValues berisi semua nilai unik dalam kolom penerima

                // Jika nama tabel adalah "Barang Masuk" atau "Barang Keluar" dan hanya terdapat satu baris dalam kolom penerima
                if ((tableName === 'Barang Masuk' || tableName === 'Barang Keluar') && Object.keys(uniqueValues).length === 1) {
                    // Ambil nama dari kolom penerima pada tabel Barang Masuk
                    var Nama = $('#dataTable').find('td:eq(8)').text().trim(); // Ganti 8 dengan indeks kolom yang sesuai

                    // Tambahkan tempat tanda tangan di bawah tabel
                    var signatureDiv = '<br><div style="margin-left: 57rem;">' +
                                        '<a>Tanda tangan pelapor,</a><br>' +
                                        '<b>Kudus, <?= date('Y-m-d') ?></b>' +
                                        '<br><br><br><br>' +
                                        '<u>' + Nama + '</u>' +
                                        '</div>';

                    // Tambahkan garis bawah
                    signatureDiv += '<hr>';

                    // Tampilkan menu cetak
                    setTimeout(function() {
                        win.document.close();
                        win.focus();
                        $(win.document.body).append(signatureDiv);
                        win.print();
                    }, 500);
                } else {
                    // Tambahkan garis bawah tanpa nama
                    var signatureDiv = '<br><div style="margin-left: 60rem;">' +
                                        '<a>Tanda tangan pelapor,</a><br>' +
                                        '<b>Kudus, <?= date('Y-m-d') ?></b>' +
                                        '<br><br><br><br>' +
                                        '<hr style="border-top: 2px solid black; width: 8rem;">' +
                                        '</div>';

                    // Tambahkan garis bawah
                    signatureDiv += '<hr>';

                    // Tampilkan menu cetak
                    setTimeout(function() {
                        win.document.close();
                        win.focus();
                        $(win.document.body).append(signatureDiv);
                        win.print();
                    }, 500);
                } 
            }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
                messageTop: function() {
                    return $('#dataTable').attr('name') ? 'Tabel ' + $('#dataTable').attr('name') : 'Tabel';
                }
            },
            {
                extend: 'pdf',
                orientation: 'landscape',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
                title: function() {
                    return document.title || 'Tabel';
                },
                customize: function(doc) {
                    // Menetapkan lebar kolom secara otomatis
                    var colWidths = [];
                    var table = doc.content[1].table;
                    var minWidth = 40; // Lebar kolom minimum

                    // Hitung lebar setiap kolom
                    table.body[0].forEach(function(cell, i) {
                        var cellWidth = doc.widths ? doc.widths[i] : minWidth;
                        colWidths.push('*');
                    });

                    // Terapkan lebar kolom ke tabel
                    table.widths = colWidths;

                    // Menyesuaikan ukuran font untuk memastikan bahwa semua konten dapat masuk dalam satu halaman
                    doc.defaultStyle.fontSize = 8;

                    // Menengahkan teks di kolom dengan data angka
                    for (var i = 0; i < table.body[0].length; i++) {
                        if (typeof table.body[1][i].text === 'string' && !isNaN(table.body[1][i].text)) {
                            for (var j = 1; j < table.body.length; j++) {
                                table.body[j][i].alignment = 'center';
                            }
                        }
                    }

                    // Menambahkan pesan nama tabel di bawah judul
                    var title = doc.content[0].text;
                    var message = $('#dataTable').attr('name') ? 'Tabel ' + $('#dataTable').attr('name') : 'Tabel';
                    doc.content[0].text = title + '\n\n' + message;
                }
            }
        ],
        dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
        lengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        columnDefs: [{
            targets: -1,
            orderable: false,
            searchable: false
        }]
    });

    table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
});

</script>
<?php if (service('request')->uri->getSegment(1) == 'halberanda') : ?>
    <!-- Chart -->
    <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

    <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                            label: "Total Barang Masuk",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbm); ?>,
                        },
                        {
                            label: "Total Barang Keluar",
                            lineTension: 0.3,
                            backgroundColor: "rgba(231, 74, 59, 0.05)",
                            borderColor: "#e74a3b",
                            pointRadius: 3,
                            pointBackgroundColor: "#e74a3b",
                            pointBorderColor: "#e74a3b",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbk); ?>,
                        }
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: 5
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });
        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Barang Masuk", "Barang Keluar"],
                datasets: [{
                    data: [<?= $barang_masuk; ?>, <?= $barang_keluar; ?>],
                    backgroundColor: ['#4e73df', '#e74a3b'],
                    hoverBackgroundColor: ['#5a5c69', '#5a5c69'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
<?php endif; ?>




    