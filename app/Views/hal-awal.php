<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>SELEKSI PELATIHAN BLK</title>

        <!-- Favicon-->
        <link type="image/png" sizes="96x96" rel="icon" href="img/Logo BLK.png">

		<!-- Komponen CSS Bootstrap 4 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

		<!-- Komponen FontAwesome -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

		<!-- Komponen Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril Fatface">

		<!-- data tables css -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
		<link rel="stylesheet" type="text/css"
			href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
		<!-- Tambahkan referensi Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <!-- stylesheet -->
        <link rel="stylesheet" href="css/styley.css" />

        <script>
            $(document).ready(function () {
                $(".navbar-nav li a").on("click", function () {
                    $(".navbar-collapse").removeClass("show");
                });
            });
        </script>

    </head>
    <style>
        body{overflow: hidden; /* Menonaktifkan scroll */}
        @font-face {
            font-family: 'iran_sans_bold';
            src: url('../Fonts/iran_sans_bold.woff') format('woff');
        }

        @font-face {
            font-family: 'iran_sans_light';
            src: url('../Fonts/iran_sans_light.woff') format('woff');
        }

        @font-face {
            font-family: 'iran_sans_medi';
            src: url('../Fonts/iran_sans_medi.woff') format('woff');
        }

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: ;
        }
        #container{
            height: 100vh;
            width: 100%;
        }
        #background{
            height: 100vh;
            width: 100%;
            background-image: url('img/bg9.jpg');
            
            clip-path: polygon(65% 0,100% 0,100% 100%,30% 100%);
        }
        #navbar{
            height: 70px;
            width: auto;
            position: absolute;
            top: 15px;
        }
        #navbar ul{
            list-style: none;
            display: flex;
            flex-direction: row;
        }
        #navbar ul li{
            height: 60px;
            width: auto;
            font-size: 23px;
            margin: 0px 40px;
            display: flex;
            align-items: center;
        }
        #navbar ul li:first-child{
            margin-left: 120px;
        }
        #navbar ul li a{
            text-decoration: none;
            color: #8c8c8c;
        }
        #navbar ul li a:hover{
            color: #202fff;
            padding: 10px 0;
            border-bottom: 2px solid #202fff;
        }
        #logo{
            color: #fff;
            width: auto;
            position: absolute;
            top: 15px;
            right: 5%;
            font-size: 30px;
            font-weight: bold;
            margin-top: 20px;
        }
        #sideImage{
            height: 500px;
            width: auto;
            margin-top: -45px;
            position: absolute;
            top: calc(50% - 300px);
            left: 5%;
        }
        #sideImage img{
            height: 600px;
            width: auto;
            margin-top: 25px;
        }
        #content{
            height: 650px;
            width: 700px;
            position: absolute;
            right: -15%;
            top: calc(70% - 300px);
        }
        #content h2{
            margin-left: -9rem;
            margin-top: 3rem;
            font-size: 90px;
            line-height: 100px;
            color: #fff;
        }
        #content p{
            margin: 30px 0;
            margin-top: -0.3rem;
            color: #fff;
            margin-left: -9rem;
            font-size: 20px;
            justify-content:left;
        }
        #content button{
            height: 60px;
            width: 200px;
            margin-left: -8rem;
            outline: none;
            border: none;
            background: #202fff;
            font-size: 25px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
        }
        #socialLink{
            height: 40px;
            width: auto;
            position: absolute;
            bottom: 3%;
            left: 10%;
            display: flex;
            flex-direction: row;
        }
        #socialLink a{
            height: 40px;
            width: 40px;
            margin: 0 5px;
            text-decoration: none;
        }
        #socialLink a i{
            height: 40px;
            width: 40px;
            border: 2px solid #2f4b56;
            font-size: 20px;
            color: #8c8c8c;
            border-radius: 100%;
            display: grid;
            place-items: center;
        }
        #socialLink a i:hover{
            background: #202fff;
            color: #fff;
            border-width: 1px;
        }

        @media only screen and (max-width: 900px) {
            /* Ukuran layar yang lebih kecil dari atau sama dengan 768px */
            #content h2{
                line-height: 65px;
                margin-left: 12rem;
                font-size: 50px;
                top: -180px;
                color: #041e29;
                position: absolute;
            }
            #content p{
                display: hidden;
            }
            #content a{
                height: 60px;
                width: 200px;
                margin-top: 24rem;
                margin-left: 23rem;
                outline: none;
                border: none;
                font-size: 15px;
                cursor: pointer;
            }
            #logo{
                display: none;
            }
            #socialLink {
                height: 40px;
                width: auto;
                position: absolute;
                top: 65%;
                left: 2%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
            }
            #socialLink a i{
                height: 40px;
                width: 40px;
                border: 2px solid #236079;
                font-size: 20px;
                color: #8c8c8c;
                border-radius: 100%;
                display: grid;
                place-items: center;
            }
            #navbar{
                display: none;
            }
            #sideImage img{
                height: 500px;
                width: auto;
                margin-top: 160px;
                margin-left: 2rem;
            }

            body{overflow: auto; /* Menonaktifkan scroll */}
        }

        .img_conta {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img_conta img {
            display: block;
            height: auto;
        }

        .img_conta .img_large {
            width: 80%;
        }

        .img_conta .img_small {
            position: absolute;
            width: 50%;
            bottom: 0;
            left: 0;
            border: 3px solid white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

    </style>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
				<a class="navbar-brand" href="<?= base_url('halmasuk'); ?>">SELEKSI PELATIHAN BLK</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?= base_url('halmasuk'); ?>">Login <span class="sr-only">(current)</span></a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- Your page content goes here -->

			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
        <div id="container">
        <section class="conta" id="landing" style="margin-top: 50px;">
            <div class="content__conta">
                <h1>
                    Sistem<br />
                    <span class="heading__1">Seleksi Pelatihan</span><br />
                    <span class="heading__2">Balai Latihan Kerja</span>
                </h1>
                <p>
                    Program ini adalah sistem web yang dirancang untuk menyeleksi calon peserta pelatihan di Balai Latihan Kerja (BLK). Dengan menggunakan sistem ini, proses seleksi menjadi lebih efisien, transparan, dan terorganisir. 
                </p>
                <a href="https://www.instagram.com/blk_kudus" target="_blank" rel="noopener noreferrer">
                    <input type="text" placeholder="Mewujudkan Tenaga Kerja Yang Kompeten" readonly>
                    <button type="submit">#blk-kudus</button>
                </a>
            </div>
            <div class="img_conta">
                <img src="img/pelatihan-kerja-kudus.jpg" alt="header" class="img_large" />
                <img src="img/pelatihan-kerja-kudus1.jpg" alt="header" class="img_small" />
            </div>
        </section>
        </div>
    </body>
</html>