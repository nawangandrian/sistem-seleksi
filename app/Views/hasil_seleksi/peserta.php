
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
                    Pelatihan <br> <?= $nama_pelatihan->nama_pelatihan ?> - Metode Seleksi SAW
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('halseleksi') ?>" class="btn btn-sm btn-secondary btn-icon-split" id="addInput">
                    <span class="icon">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                    <span class="text">
                        Kembali
                    </span>
                </a>
            </div>
            <div class="col-auto">
                <a class="btn btn-sm btn-success btn-icon-split" id="addPDF" data-toggle="modal" data-target="#addModal">
                    <span class="icon" style="color: white;">
                        <i class="fa-solid fa-upload"></i>
                    </span>
                    <span class="text" style="color: white;">
                        Upload Hasil
                    </span>
                </a>
            </div>
            <div class="col-auto">
                <a class="btn btn-sm btn-danger btn-icon-split" id="addInput" data-toggle="modal" data-target="#printModal">
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
    <?php $jenis = isset($jenis_pelatihan) ? $jenis_pelatihan : ''; ?>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" name="<?= $judul; ?>">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>No. Pendaftaran</th>
                    <th>Nama</th>
                    <th>Pengetahuan</th>
                    <th>Wawancara</th>
                    <th>Usia</th>
                    <?php if ($jenis == 'DBHCHT') : ?>
                        <th>Status Pekerjaan</th>
                    <?php endif; ?>
                    <th>Total Skor</th>
                    <th>Hasil</th>
                    <th>NIK</th>
                    <th>Tgl. Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($pelatihan) : ?>
                <?php $no = 1; ?>
                <?php foreach ($pelatihan as $b) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b['nip_peserta']; ?></td>
                        <td><?= $b['nama_peserta']; ?></td>
                        
                        <td style="text-align: center;">
                            <?= isset($b['pengetahuan_hasil']) ? $b['pengetahuan_hasil'] : 'Belum ada hasil'; ?>
                        </td>
                        <td style="text-align: center;">
                            <?= isset($b['wawancara_hasil']) ? $b['wawancara_hasil'] : 'Belum ada hasil'; ?>
                        </td>

                        <td style="text-align: center;">
                                <?= isset($b['nilai_usia']) ? $b['nilai_usia'] : '-'; ?>
                        </td>

                        <?php if ($jenis == 'DBHCHT') : ?>
                            <td style="text-align: center;">
                                <?= isset($b['nilai_status_pekerjaan']) ? $b['nilai_status_pekerjaan'] : '-'; ?>
                            </td>
                        <?php endif; ?>

                        <?php 
                        $pengetahuan_hasil = isset($b['pengetahuan_hasil']) ? $b['pengetahuan_hasil'] : null;
                        $wawancara_hasil = isset($b['wawancara_hasil']) ? $b['wawancara_hasil'] : null;

                        // Cek jika salah satu hasil belum ada
                        if ($pengetahuan_hasil === null || $wawancara_hasil === null) {
                            $hasil_total_seleksi = 'Belum ada hasil';
                            $hasil_tes_seleksi = 'Belum ada hasil';
                        } else {
                            $hasil_total_seleksi = isset($b['hasil_total_seleksi']) ? number_format($b['hasil_total_seleksi'], 4) : 'Belum ada hasil';
                            $hasil_tes_seleksi = isset($b['hasil_tes_seleksi']) ? $b['hasil_tes_seleksi'] : 'Belum ada hasil';
                        }
                        ?>

                        <td style="text-align: center;">
                            <?= $hasil_total_seleksi; ?>
                        </td>
                        <td style="text-align: center;">
                            <?= $hasil_tes_seleksi; ?>
                        </td>
                        <td><?= $b['nik_peserta']; ?></td>
                        <td><?= $b['tgl_lahir_peserta']; ?></td>
                        <td><?= $b['desa_peserta'] . ', RW ' . $b['rw_peserta'] . '/RT ' . $b['rt_peserta'] . ', ' . $b['kecamatan_peserta']; ?></td>
                        <td><?= $b['no_telp_peserta']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="12" class="text-center">Data Kosong</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Modal Print Hasil Seleksi -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Modal diperbesar agar lebih nyaman -->
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="printModalLabel"><i class="fa fa-print"></i> Print Hasil Seleksi</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="mb-3">Apakah Anda ingin mencetak hasil seleksi? Silakan lengkapi informasi di bawah ini.</p>

                <!-- Input Data Seleksi -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempatDaftarUlang"><strong>Tempat Daftar Ulang</strong></label>
                            <input type="text" id="tempatDaftarUlang" name="tempatDaftarUlang" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Pilihan Kepala BLK -->
                        <div class="form-group">
                            <label for="kepala_blk"><strong>Kepala BLK</strong></label>
                            <div class="input-group">
                                <select name="kepala_blk" id="kepala_blk" class="custom-select">
                                    <option value="" selected disabled>Pilih Kepala BLK</option>
                                    <?php foreach ($kepala_blk as $s) : ?>
                                        <option value="<?= $s['id_kepala_blk'] ?>"><?= $s['nama_kepala_blk'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('halkepala_blk/add'); ?>" title="Tambah Kepala BLK">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Daftar Ulang -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggalMasukPelatihan"><strong>Tanggal Masuk Pelatihan</strong></label>
                            <input type="date" id="tanggalMasukPelatihan" name="tanggalMasukPelatihan" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggalSeleksi"><strong>Tanggal Seleksi</strong></label>
                            <input type="date" id="tanggalSeleksi" name="tanggalSeleksi" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Jadwal Masuk Pelatihan -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggalDaftarUlang"><strong>Tanggal Daftar Ulang</strong></label>
                            <input type="date" id="tanggalDaftarUlang" name="tanggalDaftarUlang" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="waktuDaftarUlang"><strong>Waktu Daftar Ulang</strong></label>
                            <input type="time" id="waktuDaftarUlang" name="waktuDaftarUlang" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Jadwal Selesai Pelatihan -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="waktuMasukPelatihan"><strong>Waktu Masuk Pelatihan</strong></label>
                            <input type="time" id="waktuMasukPelatihan" name="waktuMasukPelatihan" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="waktuSelesaiPelatihan"><strong>Waktu Selesai Pelatihan</strong></label>
                            <input type="time" id="waktuSelesaiPelatihan" name="waktuSelesaiPelatihan" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times"></i> Tutup
                </button>
                <button type="button" class="btn btn-primary" onclick="printAndSendData()">
                    <i class="fa fa-print"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Upload Hasil Seleksi -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Perbesar modal untuk tampilan yang lebih luas -->
        <div class="modal-content">
            <div class="modal-header bg-primary text-white"> <!-- Header berwarna agar lebih menarik -->
                <h5 class="modal-title" id="addModalLabel"><i class="fa fa-upload"></i> Upload Hasil Seleksi</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <!-- Form Upload File -->
                <form action="<?= base_url('Halseleksi/uploadHasilSeleksi') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" value="<?= $nama_pelatihan->id_pelatihan ?>" id="id_pelatihan" name="id_pelatihan" required>

                    <div class="form-group">
                        <label for="file_pdf"><strong>Upload File (PDF) ke Sistem</strong></label>
                        <input type="file" class="form-control" id="file_pdf" name="file_pdf" accept=".pdf" required>
                        <small class="form-text text-muted">Pastikan file yang diunggah dalam format PDF.</small>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-upload"></i> Upload
                        </button>
                    </div>
                </form>

                <hr> 

                <!-- Form Kirim File -->
                <div class="mt-3">
                    <h6><strong>Send Email Hasil Seleksi</strong></h6>
                    <p>Jika ingin mengirim file hasil seleksi yang sudah diunggah ke email peserta, klik tombol di bawah ini.</p>

                    <button type="button" class="btn btn-primary" id="btnKirimEmail">
                        <i class="fa fa-message"></i> Send
                    </button>
                </div>
                
                <hr> <!-- Garis pemisah antara form upload dan tombol hapus -->

                <!-- Form Hapus File -->
                <div class="mt-3">
                    <h6><strong>Hapus File Hasil Seleksi</strong></h6>
                    <p>Jika ingin menghapus file hasil seleksi yang sudah diunggah, klik tombol di bawah ini.</p>

                    <form action="<?= base_url('Halseleksi/deleteHasilSeleksi/' . $nama_pelatihan->id_pelatihan) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus file ini?');">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Hapus Hasil Seleksi
                        </button>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function printAndSendData() {
        // Ambil nilai dari input tanggal/jam
        var tempatDaftarUlang = document.getElementById('tempatDaftarUlang').value;
        var tanggalSeleksi = document.getElementById('tanggalSeleksi').value;
        var tanggalDaftarUlang = document.getElementById('tanggalDaftarUlang').value;
        var waktuDaftarUlang = document.getElementById('waktuDaftarUlang').value;
        var tanggalMasukPelatihan = document.getElementById('tanggalMasukPelatihan').value;
        var waktuMasukPelatihan = document.getElementById('waktuMasukPelatihan').value;
        var waktuSelesaiPelatihan = document.getElementById('waktuSelesaiPelatihan').value;
        var kepalaBLK = document.getElementById('kepala_blk').value;

        // Kirim nilai ini ke halaman cetak
        window.location.href = '<?= base_url('halseleksi/peserta_print/' . $nama_pelatihan->id_pelatihan) ?>' + '?tanggaldaftarUlang=' + tanggalDaftarUlang + '&tempatdaftarUlang=' + tempatDaftarUlang + '&waktudaftarUlang=' + waktuDaftarUlang + '&tanggalmasukPelatihan=' + tanggalMasukPelatihan + '&waktumasukPelatihan=' + waktuMasukPelatihan + '&waktuselesaiPelatihan=' + waktuSelesaiPelatihan + '&kepalaBLK=' + kepalaBLK + '&tanggalSeleksi=' + tanggalSeleksi;
    }

    $(document).ready(function() {
        $('#btnKirimEmail').click(function() {
            var pelatihanId = $('#id_pelatihan').val(); 
            if (!pelatihanId) {
                alert("Pilih pelatihan terlebih dahulu!");
                return;
            }

            $.ajax({
                url: '<?= base_url("Halemail/kirimHasilSeleksi") ?>', 
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

</body>
