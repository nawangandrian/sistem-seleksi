<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SELEKSI PELATIHAN BLK</title>
    <!-- Favicon-->
    <link type="image/png" sizes="96x96" rel="icon" href="img/Logo BLK.png">
    
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* CSS Anda di sini */
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
            
        }

        body {
            background: #e0e6f3;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
            overflow: hidden; /* Menonaktifkan scroll */
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid #2b5dff;
            background-color: #2b5dff;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
        }

        .log-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
        }

        .overlay {
            background: #3b85f5;
            background: -webkit-linear-gradient(to right, #2455f7, #3b85f5);
            background: linear-gradient(to right, #2455f7, #3b85f5);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
        }

        img {
            width: 200px;
        }

        .img img{
            border-radius: 0%; /* Mengubah gambar menjadi lingkaran */
            width: 90px; /* Menetapkan lebar gambar */
            height: 90px; /* Menetapkan tinggi gambar */
            object-fit: cover;
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
        }


        .overlay-right {
            right: 0;
        }


        .social-container {
            margin: 50px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }



        @media screen and (max-width: 1000px) {
            .container {
                width: 70%; /* Mengubah lebar kontainer menjadi 100% agar sesuai dengan layar kecil */
                border-radius: 5%; /* Menghilangkan border-radius untuk menghindari efek rounded pada layar kecil */
            }

            .form-container {
                width: 100%; /* Mengubah lebar form-container menjadi 100% agar sesuai dengan layar kecil */
            }

            .overlay-container {
                display: none; /* Menyembunyikan overlay-container pada layar kecil */
            }

            form {
                padding: 0 20px; 
                margin-top: 40px;/* Mengurangi padding form pada layar kecil */
            }

            .side-container {
                background: -webkit-linear-gradient(to right, #2455f7, #3b85f5);
                background: linear-gradient(to right, #2455f7, #3b85f5);
                width: 100%;
                text-align: center;
                padding: 25px 0;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            }

            .side-container {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 3;
                color: #FFFFFF;
            }
            
        }

        @media screen and (max-width: 900px){

            .container{
                grid-template-columns: 1fr;
            }

            .overlay-container {
                display: none;
            }
        }
        /* Gaya untuk pesan */
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .close {
            float: right;
            font-size: 15px; 
            font-weight: bold;
            line-height: 15px;
            color: #000;
            text-shadow: 0 1px 0 #000;
            margin-left: 10px;
            opacity: .2;
            width: 20px;
            height: 15px;
            text-align: center;
            border-color: #fff;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            opacity: .5;
        }

        .fa {
            font-size: 24px; 
        }
        .input {
            border-radius: 50px; 
            border: 1px solid #ccc; 
            padding: 10px; 
            width: 100%; 
            height: 40px;
            box-sizing: border-box; 
        }
    </style>
</head>
<body>
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

    <!-- Konten form login -->
    <div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="<?= base_url('halmasuk/autentifikasi'); ?>" method="POST" enctype="multipart/form-data">
                <div class="side-container">
				<h1>Login</h1></div>
                <br>
                <div class="img">
                <img src="img/Logo BLK.png"></div>
				<br>
				<span>Silahkan login dengan username!</span>
				<input type="text" class="input form-control form-control-user" placeholder="Username" name="inputan_nama_pengguna" required autofocus autocomplete="off"/>
				<input type="password" class="input form-control form-control-user" placeholder="Password" name="inputan_pw_pengguna" required />
                <br>
				<button>Login</button>
                <a href="<?= base_url('home') ?>">Kembali</a>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h3 style="margin-bottom: 20px;">Sistem Seleksi Pelatihan</h3>
                        <img src="assets/img/bg3.svg">
					<p>Program ini adalah sistem web yang dirancang untuk menyeleksi calon peserta pelatihan di Balai Latihan Kerja (BLK)</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
