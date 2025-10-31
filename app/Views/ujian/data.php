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
    <?php
        $nama = session()->get('nama');
        $email = session()->get('email');
        $role = session()->get('role');
        $no_telp = session()->get('no_telp');
        $username = session()->get('username');
        $foto = session()->get('foto');
        $id_user = session()->get('id_user');
    ?>
<div class="card shadow-sm border-bottom-primary" style="margin-bottom: 1rem;">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                Daftar Tes Pengetahuan
                </h4>
            </div>
            <?php if ($role != 'peserta'): ?>
            <div class="col-auto">
                <a href="<?= base_url('halujian/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Tes Pengetahuan
                    </span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" name="<?= $judul; ?>">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelatihan</th>
                        <th>Nama Ujian</th>
                        <th>Jumlah Soal</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Waktu</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($ujian) :
                        foreach ($ujian as $b) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['nama_pelatihan']; ?></td>
                                <td><?= $b['nama_ujian']; ?></td>
                                <td><?= $b['jumlah_soal']; ?></td>
                                <td><?= $b['tgl_mulai']; ?></td>
                                <td><?= $b['tgl_selesai']; ?></td>
                                <td><a><?= $b['waktu']; ?> Menit</a></td>
                                <td>
                                <?php if ($role == 'peserta'): ?>
                                    <?php
                                    // Memeriksa status ujian
                                    $statusku = isset($status[$b['id_ujian']]) ? $status[$b['id_ujian']]['status'] : '';
                                    
                                    if ($statusku == 'completed') {
                                        echo '<span class="btn btn-primary btn-circle btn-sm disabled"><i class="fa fa-clipboard-check"></i></span>';
                                    } else {
                                        $tglSelesai = strtotime($b['tgl_selesai']);
                                        if (time() > $tglSelesai) {
                                            echo '<span class="btn btn-primary btn-circle btn-sm disabled"><i class="fa fa-clipboard-check"></i></span>';
                                        } else {
                                            echo '<a href="' . base_url('haltes/seleksi/' . $b['id_ujian']) . '" class="btn btn-primary btn-circle btn-sm" onclick="setNomorSoal()"><i class="fa fa-clipboard-check"></i></a>';
                                        }
                                    }
                                    ?>
                                <?php else: ?>
                                    <a data-bs-toggle="modal" data-bs-target="#modalEmail" data-pelatihan_id="<?= $b['pelatihan_id']; ?>" class="btn btn-success text-white btn-circle btn-sm"><i class="fa fa-message"></i></a>
                                    <a href="<?= base_url('halujian/edit/' . $b['id_ujian']) ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('halujian/delete/' . $b['id_ujian']) ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <?php
                                    $tglSelesai = strtotime($b['tgl_selesai']);
                                    if (time() > $tglSelesai) {
                                        echo '<span class="btn btn-primary btn-circle btn-sm disabled"><i class="fa fa-clipboard-check"></i></span>';
                                    } else {
                                        echo '<a href="' . base_url('haltes/seleksi/' . $b['id_ujian']) . '" class="btn btn-primary btn-circle btn-sm" onclick="setNomorSoal()"><i class="fa fa-clipboard-check"></i></a>';
                                    }
                                    ?>
                                <?php endif; ?>
                                </td>
                            </tr>
                    <?php
                        endforeach;
                    else :
                    ?>
                        <tr>
                            <td colspan="8" class="text-center">Data Kosong</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEmail" tabindex="-1" aria-labelledby="modalEmailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEmailLabel">Konfirmasi Pengiriman Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengirimkan notifikasi ke peserta?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnKirimEmail">Kirim</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function setNomorSoal() {
        sessionStorage.setItem('nomorSoal', '1');
    }
    $(document).ready(function() {
        $('#modalEmail').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var pelatihanId = button.data('pelatihan_id');
            $('#btnKirimEmail').data('pelatihan_id', pelatihanId);
        });

        $('#btnKirimEmail').click(function() {
            var pelatihanId = $(this).data('pelatihan_id');
            if (!pelatihanId) {
                alert("Pilih pelatihan terlebih dahulu!");
                return;
            }

            $.ajax({
                url: '<?= base_url("Halemail/kirimNotifikasi") ?>',
                type: 'POST',
                data: { pelatihan_id: pelatihanId },
                beforeSend: function() {
                    $('#btnKirimEmail').prop('disabled', true).text('Mengirim...');
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat mengirim email.');
                },
                complete: function() {
                    $('#btnKirimEmail').prop('disabled', false).text('Send');
                    document.querySelector('[data-bs-dismiss="modal"]').click();
                }
            });
        });
    });
</script>
