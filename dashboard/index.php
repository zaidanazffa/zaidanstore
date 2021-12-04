
<?php
require '../config.php';
require '../lib/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script data-ad-client="ca-pub-7214743999507946" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Okepedia Adalah Sebuah Platform Bisnis Yang Menyediakan Berbagai Layanan MultI Media Marketing Yang Bergerak Terutama Di Indonesia. Dengan Bergabung Bersama Kami, Anda Dapat Menjadi Penyedia Jasa Sosial Media Atau Reseller Sosial Media Seperti Jasa Penambah Followers, Likes, Views, Subscribe, Dll. Saat Ini Tersedia Berbagai Layanan Untuk Sosial Media Terpopuler Seperti Instagram, Facebook, Twitter, Youtube, Dll. Dan Kamipun Juga Menyediakan Panel Pulsa & PPOB Seperti Pulsa All Operator, Paket Data, Saldo Gojek/Grab, Token PLN, All Voucher Game Online, Dll." name="description" />
        <meta name="keywords" content="okepedia,okepedia,panel ppob termurah, panel smm termurah,panel sosmed termurah, okepedia smm panel,ppob,smm panel indonesia terlengkap,smm panel terpercaya,smm panel indonesia terpercaya,smm panel termurah di indonesia,smm panel shopee,smm panel tokopedia,followers tokopedia murah,panel instagram,smm panel,followers shopee,followers shopee murah,jasa followers instagram,cara menambah followers instagram,followers instagram gratis,jasa followers tokopedia,jasa followers shopee,jasa followers instagram,panel smm,followers gratis,followers instagram,followers indonesia,smm panel terlengkap,daftar panel smm gratis,panel smm paling murah,apa itu smm panel,panel smm termurah di indonesia,smm panel indonesia termurah,smm panel gratis,smm panel indonesia murah,jasa pembuatan panel smm murah,smm panel terbaik,smm panel tercepat,smm panel murah,smm panel indo,smm panel indonesia,smm panel murah,reseller smm panel,smm panel termurah,panel smm,smm try,smm try panel,panel smm murah,panel smm world,panel smm indonesia,sosial media marketing,reseller panel">
        <meta content="CodeError" name="author" />

        <title><?php echo $data['title']; ?></title>

        <!-- Start Favicon -->
        <link rel="icon" href="<?php echo $config['web']['url'] ?>/assets/media/logos/logo.png" type="image/png">
        <!-- End Favicon -->

        <!-- Start Bootstrap 4.1.3 -->
        <link rel="stylesheet" href="https://okepedia.my.id/assets/css/bootstrap.min.css">
        <!-- End Bootstrap 4.1.3 -->

        <!-- Start Animate Css -->
        <link rel="stylesheet" href="https://okepedia.my.id/assets/css/plugins/animate.css">
        <!-- End Animate Css -->

        <!-- Start Google Fonts -->
        <link  href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
        <!-- End Google Fonts -->

        <!-- Start Fonts Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
        <!-- End Fonts Awesome -->

        <!-- Start Slick Slider -->
        <link rel="stylesheet" href="https://okepedia.my.id/assets/css/plugins/slick.css">
        <link rel="stylesheet" href="https://okepedia.my.id/assets/css/plugins/slick-theme.css">
        <!-- End Slick Slider -->

        <!-- Start Magnific Popup -->
        <link rel="stylesheet" href="https://okepedia.my.id/assets/css/plugins/magnific-popup.css">
        <!-- End Magnific Popup -->

        <!-- Start Main Style -->
        <link rel="stylesheet" href="https://okepedia.my.id/assets/css/main.css">
        <link rel="stylesheet" href="https://okepedia.my.id/assets/css/custom.css">
        <!-- End Main Style -->
        
        <style>
            .light-version #scrollUp:before {
                position: absolute;
                width: 30%;
                height: 2px;
                background-color: #000;
                content: "";
                top: 10px;
                right: 100%;
                z-index: -200 !important;
            }
            #scrollUp:before {
                position: absolute;
                width: 30%;
                height: 2px;
                background-color: #000;
                content: "";
                top: 10px;
                right: 80%;
                z-index: -200 !important;
            }
            #scrollUp {
                bottom: 180px;
                font-size: 12px;
                line-height: 22px;
                right: 0px;
                width: 100px;
                background-color: transparent;
                color: #fff;
                text-align: center;
                height: 0px;
                -webkit-transition-duration: 500ms;
                transition-duration: 500ms;
                text-transform: uppercase;
                -webkit-transform: rotate(
                -90deg
                );
                transform: rotate(
                -90deg
                );
            }
        </style>

</head>

<body>
    
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TC6MF6D"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!-- Start Page Loading -->
        <div class="se-pre-con"></div>
            <div id="app">
        <!-- End Page Loading -->

        <!-- Start Navbar -->
        <header class="header-global">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo $config['web']['url'] ?>dashboard"><img src="<?php echo $config['web']['url'] ?>/assets/media/logos/logo.png" alt="logo" height="50"></a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $config['web']['url'] ?>dashboard">Halaman Utama</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#benefits">Fitur Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#cara">Cara Penggunaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $config['web']['url'] ?>dashboard/service">Daftar Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Kontak Kami</a>
                            </li>
                        </ul>
                        <a href="<?php echo $config['web']['url'] ?>auth/login" role="button" class="btn-1" style="background-image: linear-gradient( 180deg, #354da1 0%, #0cbce3 100%);">Masuk</a>
                    </div>
                </div>
            </nav>
        </header>
        <!-- End Navbar -->
        
        <!-- Main -->
        <div id="main" class="main">
            <div class="hero" style="background-image: linear-gradient( 180deg, #354da1 0%, #0cbce3 100%); margin-top : 30px;">
                <div class="container" style="padding-top: 10px;">
                    <div class="row align-center" style="margin-top:80px">
                        <div class="col-lg-6 col-md-7">
                            <div class="title-heading mt-4">
                                <!--<center>
                                <div class="alert alert-transparent alert-pills shadow" role="alert" style="border-radius: 30px;display: inline-block;">
                                    <span class="badge badge-pill badge-primary mr-1">Hanya di</span>
                                    <span class="content text-white">Demo-Okepedia</span>
                                </div>
                                </center>-->
                                <div class="left">
                                    <!--<h1>Demo-Okepedia</h1>-->
                                    <h1 class="heading text-white">
                                    Mau Punya Bisnis SMM Panel dan PPOB? <br/>
                                    <span class="text-white"><strong><?php echo $data['title']; ?></strong></span> aja
                                    </h1>
                                    <h5 class="text-white"><strong>Bisa Digunakan Untuk Pribadi Atau Dijual Kembali</strong></h5>
                                    <p class="text-white"><?php echo $data['title']; ?> Adalah Sebuah Platform Bisnis Yang Menyediakan Berbagai Layanan MultI Media Marketing Yang Bergerak Terutama Di Indonesia. Dengan Bergabung Bersama Kami, Anda Dapat Menjadi Penyedia Jasa Sosial Media Atau Reseller Sosial Media Seperti Jasa Penambah Followers, Likes, Views, Subscribe, Dll. Saat Ini Tersedia Berbagai Layanan Untuk Sosial Media Terpopuler Seperti Instagram, Facebook, Twitter, Youtube, Dll. Dan Kamipun Juga Menyediakan Panel Pulsa & PPOB Seperti Pulsa All Operator, Paket Data, Saldo Gojek/Grab, Token PLN, All Voucher Game Online, Dll.</p>
                                </div>
                            </div>
                            <div class="mt-4 mb-4">
                                <a href="<?php echo $config['web']['url'] ?>/auth/login" class="btn btn-outline-danger mt-2 text-white">Masuk</a>
                                <a href="<?php echo $config['web']['url'] ?>auth/register" class="btn btn-outline-danger mt-2 text-white">Daftar</a>
                                <a href="#" target="blank" class="btn btn-outline-danger mt-2 text-white">Playstore</a>
                            <div id="response"></div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <img src="<?php echo $config['web']['url'] ?>/assets/media/logos/logo.png" alt="Hero" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main -->
                
        <!-- Cara Penggunaan -->
        <section class="cara" id="cara" style="background-image: linear-gradient( 180deg, #0cbae2 0%, #f9faff 100%);">
            <div class="container">
                <div class="heading text-center" style="padding-top:20px;padding-bottom:20px">
                    <h2 style="margin-top:40px" class="text-white">Tutorial Cara Penggunaan</h2>
                    <p class="text-white">Agar Anda tidak kebingungan saat proses registrasi sampai ke tahap isi saldo, lebih baiknya pahami video tutorail berikut serta step by stepnya.</p>
                    <div class="line"></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="photos.svg" alt="project" height="120%">
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <h3>1. Register / Daftar</h3>
                            <p>Pertama Anda Harus Register / Mendaftar Terlebih Dahulu Dan Lakukan Verifikasi Email.
                            Selanjutnya Login Sesuai Dengan Akun Yang Kamu Buat.</p>
                        </div>
                        <div class="box">
                            <h3>2. Isi Saldo</h3>
                            <p>Isi Saldo Anda Untuk Membeli Layanan Sesuai Kebutuhan Yang Anda Inginkan.</p>
                        </div>
                        <div class="box">
                            <h3>3. Pemesanan</h3>
                            <p>Masuk Menu Pemesanan, Selanjutnya Isi Data-Data Yang Diminta. Lalu Klik Pesan, Dan Tunggu Prosesnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Cara Penggunaan -->

        <!-- Start Features -->
        <section class="features" id="features">
            <div class="container text-center">
                <div class="heading">
                    <h2>Layanan Kami</h2>
                </div>
                <div class="line"></div>
                <p>Kami memberikan pelayanan terbaik dan menjadi solusi untuk Penyedia Jasa Social Media atau Reseller Social Media seperti jasa penambah Followers, Likes, dll.</p>
                <div class="row">
                    <!-- Box-1 -->
                    <div class="col-md-4">
                        <div class="box">
                            <img src="https://image.flaticon.com/icons/png/512/639/639365.png" width="80" alt="feature-1">
                            <h3>Platform Bisnis</h3>
                            <p>Menyediakan berbagai layanan Sosial Media Marketing (SMM) dan PPOB yang bergerak terutama di Indonesia.</p>
                        </div>
                    </div>
                    <!-- Box-2 -->
                    <div class="col-md-4">
                        <div class="box">
                            <img src="https://image.flaticon.com/icons/png/512/4264/4264898.png" width="80" alt="feature-1">
                            <h3>Penambah Followers</h3>
                            <p>Anda dapat menjadi penyedia jasa sosial media atau reseller sosial media seperti jasa penambah Followers, Likes, dll.</p>
                        </div>
                    </div>
                    <!-- Box-3 -->
                    <div class="col-md-4">
                        <div class="box">
                            <img src="https://image.flaticon.com/icons/png/128/889/889047.png" width="80" alt="feature-1">
                            <h3>Penyedia Panel Pulsa & PPOB</h3>
                            <p>Menyediakan Panel Pulsa & PPOB seperti Pulsa All Operator, Paket Data, Saldo Gojek/Grab, All Voucher Game Online, dll.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Features -->

                <!-- Start Some Facts -->
        <section class="some-facts">
            <div class="container text-center">
                <div class="row">
                    <!-- BOX-1 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="items">
                            <img src="https://okepedia.my.id/assets/img/some-fact/1.png" alt="some-fact-1">
                            <h3><span class="counter"><?php echo number_format($total_pengguna, 0, ',', '.') ?></span>+</h3>
                            <div class="line mx-auto"></div>
                            <h4>Total Pengguna</h4>
                        </div>
                    </div>
                    <!-- BOX-2 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="items">
                            <img src="https://okepedia.my.id/assets/img/some-fact/3.png" alt="some-fact-1">
                            <h3><span class="counter"><?php echo number_format($count_pesanan_pulsa+$count_pesanan_sosmed, 0, ',', '.') ?></span>+</h3>
                            <div class="line mx-auto"></div>
                            <h4>Total Pesanan</h4>
                        </div>
                    </div>
                    <!-- BOX-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="items">
                            <img src="https://okepedia.my.id/assets/img/some-fact/2.png" alt="some-fact-1">
                            <h3><span class="counter"><?php echo $count_deposit; ?></span>+</h3>
                            <div class="line mx-auto"></div>
                            <h4>Total Deposit Saldo</h4>
                        </div>
                    </div>
                    <!-- BOX-4 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="items">
                            <img src="https://okepedia.my.id/assets/img/some-fact/4.png" alt="some-fact-1">
                            <h3><span class="counter"><?php echo number_format($count_layanan_sosmed+$count_layanan_pulsa+$count_layanan_pascabayar, 0, ',', '.') ?></span>+</h3>
                            <div class="line mx-auto"></div>
                            <h4>Total Layanan</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Some Facts -->

        <!-- Start Benefits -->
        <section class="benefits" id="benefits">
            <div class="container text-center">
                <div class="heading">
                    <h2>Fitur <?php echo $data['title']; ?></h2>
                </div>
                <div class="line"></div>
                <div class="row">
                    <!-- BOX-1 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="box mb-30" style="padding:15px">
                            <img src="https://okepedia.my.id/assets/img/icons/admin.png" width="80" alt="benefits">
                            <h3>Layanan Terbaik</h3>
                            <p>Kami Menyediakan Berbagai Layanan Terbaik Untuk Kebutuhan Sosial Media &amp; Pulsa/PPOB Untuk Anda.</p>

                        </div>
                    </div>
                    <!-- BOX-2 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="box" style="padding:15px">
                            <img src="https://okepedia.my.id/assets/img/icons/admin.png" width="80" alt="benefits">
                            <h3>Pelayanan Bantuan</h3>
                            <p>Kami Selalu Siap Membantu Jika Anda Membutuhkan Kami Dalam Penggunaan Layanan Kami.</p>

                        </div>
                    </div>
                    <!-- BOX-3 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="box" style="padding:15px">
                            <img src="https://okepedia.my.id/assets/img/icons/admin.png" width="80" alt="benefits">
                            <h3>API Dokumentasi</h3>
                            <p>Tersedia API Beserta Dokumentasinya Untuk Reseller Anda.</p>

                        </div>
                    </div>
                    <!-- BOX-4 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="box" style="padding:15px">
                            <img src="https://okepedia.my.id/assets/img/icons/admin.png" width="80" alt="benefits">
                            <h3>Desain Web Responsive</h3>
                            <p>Kami Menggunakan Desain Website Yang Dapat Diakses Dari Berbagai Device, Baik Smartphone Android Maupun Desktop.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="box" style="padding:15px">
                            <img src="https://okepedia.my.id/assets/img/icons/admin.png" width="80" alt="benefits">
                            <h3>Deposit Saldo</h3>
                            <p>Deposit Otomatis 24 Jam, Memudahkan Anda Deposit Kapan Saja.</p>

                        </div>
                    </div>
                    <!-- BOX-5 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="box" style="padding:15px">
                            <img src="https://okepedia.my.id/assets/img/icons/admin.png" width="80" alt="benefits">
                            <h3>Kemudahan Pengguna</h3>
                            <p>Kami Menyediakan Fitur Yang Mudah Di Mengerti Oleh Para Pengguna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Benifits -->
        
        
        
        <!-- Start Project -->
        <section class="project" id="about-us">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <!-- Left -->
                    <div class="col-md-6">
                        <img src="animasi.gif" alt="project" class="img-fluid">
                    </div>
                    <!-- Right -->
                    <div class="col-md-5">
                        <div class="right">
                            <h2>Tentang Kami</h2>
                            <p><?php echo $data['title']; ?> Adalah Sebuah Platform Bisnis Yang Menyediakan Berbagai Layanan MultI Media Marketing Yang Bergerak Terutama Di Indonesia. Dengan Bergabung Bersama Kami, Anda Dapat Menjadi Penyedia Jasa Sosial Media Atau Reseller Sosial Media Seperti Jasa Penambah Followers, Likes, Views, Subscribe, Dll. Saat Ini Tersedia Berbagai Layanan Untuk Sosial Media Terpopuler Seperti Instagram, Facebook, Twitter, Youtube, Dll. Dan Kamipun Juga Menyediakan Panel Pulsa & PPOB Seperti Pulsa All Operator, Paket Data, Saldo Gojek/Grab, Token PLN, All Voucher Game Online, Dll.</p>
                            <h2><?php echo $data['title']; ?> <br><span>FOUNDER & CEO of <?php echo $data['title']; ?></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Project -->

<!-- <div class="col-sm-12 col-md-12">
                                <div class="box-content text-center">
                                    <div class="block-icon">
                                        <center><h3 style="font-size:20px;font-weight:bold;"><font color =''>MENDUKUNG PEMBAYARAN DARI METODE BERIKUT</font></h3></center>
                                    </div>
                                    <div style="text-align:center;padding-top:20px">
                                        <img src="https://dms.artajasa.co.id/dms/images/qris_logo.png" style="height:100%;max-height:40px;margin:10px 20px" />
                                        <img src="https://ik.imagekit.io/Tridicdn/tripaypayment/images/payment-channel/ytBKvaleGy1605201833.png" style="height:100%;max-height:40px;margin:10px 20px" />
                                        <img src="https://ik.imagekit.io/Tridicdn/tripaypayment/images/payment-channel/8WQ3APST5s1579461828.png" style="height:100%;max-height:40px;margin:10px 20px" />
                                        <img src="https://ik.imagekit.io/Tridicdn/tripaypayment/images/payment-channel/n22Qsh8jMa1583433577.png" style="height:100%;max-height:40px;margin:10px 20px" />
                                        <img src="https://ik.imagekit.io/Tridicdn/tripaypayment/images/payment-channel/KHcqcmqVFQ1607091889.png" style="height:100%;max-height:40px;margin:10px 20px" />
                                        <img src="https://ik.imagekit.io/Tridicdn/tripaypayment/images/payment-channel/jiGZMKp2RD1583433506.png" style="height:100%;max-height:40px;margin:10px 20px" />
                                        <img src="https://ik.imagekit.io/Tridicdn/tripaypayment/images/payment-channel/aQTdaUC2GO1593660384.png" style="height:100%;max-height:40px;margin:10px 20px" />
                                    </div>
                                </div>
		                    </div> -->

                <!-- Start Contact Us -->
        <section class="contact" id="contact" style="background:#fff">
            <div class="container">
                <div class="heading text-center">
                    <h2>Info Kontak</h2>
                    <div class="line"></div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <img src="https://image.freepik.com/free-vector/email-marketing-internet-chatting-24-hours-support-get-touch-initiate-contact-contact-us-feedback-online-form-talk-customers-concept_335657-25.jpg" alt="project" class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <div class="title">
                            <h3>Hubungi Kami :</h3>
                            <p>Silahkan Hubungi Kami Jika Anda Butuh Bantuan</p>
                        </div>
                        <div class="content">
                            <!-- INFO-1 -->
                            <div class="info d-flex align-items-start">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h4 class="d-inline-block">NOMOR WHATSAPP :
                                    <br>
                                    <a href="https://api.whatsapp.com/send?phone=62" target="_blank"><span>62</span></a></h4>
                            </div>
                            <!-- INFO-2 -->
                            <div class="info d-flex align-items-start">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <h4 class="d-inline-block">EMAIL :
                                    <br>
                                    <span>support@zaidann.my.id</span></h4>
                            </div>
                            <!-- INFO-3 -->
                            <div class="info d-flex align-items-start">
                                <i class="fa fa-street-view" aria-hidden="true"></i>
                                <h4 class="d-inline-block">ALAMAT :<br>
                                    <span>Jl.</span></h4>
                            </div>
                            <!-- INFO-4 -->
                            <div class="info d-flex align-items-start">
                                <i class="fa fa-street-view" aria-hidden="true"></i>
                                <h4 class="d-inline-block">JAM KERJA :<br>
                                    <span>09.00 - 18.00</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Us -->
        
        </div>
        <!-- End App -->


        <!-- Start Footer -->
        <footer class="footer">
        <div class="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer">
			<div class="kt-footer__top">
			<div class="kt-container ml-5">
				<div class="row">
					<div class="col-lg-4">
						<div  class="kt-footer__section">
                        <h3 class="kt-footer__title text-light">Tentang <?php echo $data['short_title']; ?></h3>
                        <div class="kt-footer__content text-light">
								<b><?php echo $data['short_title']; ?></b> Adalah Sebuah Platform Bisnis Yang Menyediakan Berbagai Layanan Sosial Media Marketing & Pulsa PPOB Yang Bergerak Terutama Di Indonesia. Dengan Bergabung Bersama Kami, Anda Dapat Menjadi Penyedia Jasa Sosial Media Atau Reseller Sosial Media Seperti Jasa Penambah Followers, Likes, Views, Subscribe, Dll. Saat Ini Tersedia Berbagai Layanan Untuk Sosial Media Terpopuler Seperti Instagram, Facebook, Twitter, Youtube, Dll. Dan Kamipun Juga Menyediakan Pulsa & PPOB Seperti Pulsa All Operator, Paket Data, Saldo Gojek/Grab, Token PLN, All Voucher Game Online, Dll.
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div  class="kt-footer__section">
							<h3 class="kt-footer__title text-light">Informasi</h3>
							<div class="kt-footer__content">
								<div class="kt-footer__nav">
									<ul class="list-unstyled ">
									    <li><a href="<?php echo $config['web']['url'] ?>page/how-to-top-up-balance">Cara Mengisi Saldo</a></li>
                                        <li><a href="<?php echo $config['web']['url'] ?>page/how-to-transaction">Cara Membuat Pesanan</a></li>
                                        <li><a href="<?php echo $config['web']['url'] ?>page/faq">Pertanyaan Umum</a></li>
                                        <li><a href="<?php echo $config['web']['url'] ?>page/contact-us">Kontak Kami</a></li>
									</ul>
								</div>	
							</div>
						</div>
					</div>
										<div class="col-lg-2">
						<div  class="kt-footer__section">
							<h3 class="kt-footer__title text-light">Sosial Media</h3>
							<div class="kt-footer__content">
								<div class="kt-footer__nav">
									<ul class="list-unstyled">
                                        <li><a href="<?php echo $data_kontak['link_fb']; ?>" target="_blank"><i class="flaticon-facebook-logo-button fa-2x"></i> &nbsp;Facebook</a></li>
                                        <li><a href="<?php echo $data_kontak['link_ig']; ?>" target="_blank"><i class="flaticon-instagram-logo fa-2x"></i> &nbsp;Instagam</a></li>
                                        <li><a href="https://wa.me/<?php echo $data_kontak['no_wa']; ?>" target="_blank"><i class="flaticon-whatsapp fa-2x"></i> &nbsp;WhatsApp</a></li>
                                    </ul>
								</div>	
							</div>
						</div>
					</div>
													
				</div>				
			</div>	
		</div>
		<hr>
		<div class="kt-footer__bottom">
		<div class="kt-container ">
			<div class="kt-footer__wrapper">
				<div class="kt-footer__logo">
				    <center>		 			 
					<div class="kt-footer__copyright text-light">
						Copyright &copy; 2021 <a href="<?php echo $config['web']['url'] ?>" class="kt-link"><?php echo $data['short_title']; ?></a> Di Buat Dengan <i class="fa fa-heart text-danger"></i> Oleh <a href="#" target="_blank" class="kt-link"><?php echo $data['short_title']; ?></a>.
					</div>
					<div class="trustedsite-trustmark" data-type="212" data-width="162"  data-height="67"></div>
					</center>
				</div>
					</div>
				</div>
			</div>
		</div>
        </footer>
        <!-- End Footer -->

        <!-- Start Java Script -->
        <script src="https://okepedia.my.id/assets/js/plugins/jquery-3.3.1.min.js"></script>
        <!-- End Java Script -->

        <!-- Start Bootstrap 4.1.3 -->
        <script src="https://okepedia.my.id/assets/js/plugins/popper.min.js"></script>
        <script src="https://okepedia.my.id/assets/js/bootstrap.min.js"></script>
        <!-- End Bootstrap 4.1.3 -->

        <!-- Start Slick Slider -->
        <script src="https://okepedia.my.id/assets/js/plugins/slick.min.js"></script>
        <!-- End Slick Slider -->

        <!-- Start Couner Up -->
        <script src="https://okepedia.my.id/assets/js/plugins/jquery.waypoints.min.js"></script>
        <script src="https://okepedia.my.id/assets/js/plugins/jquery.counterup.min.js"></script>
        <!-- End Couner Up -->

        <!-- Start Wow JS -->
        <script src="https://okepedia.my.id/assets/js/plugins/wow.min.js"></script>
        <!-- End Wow JS -->

        <!-- Start Magnific Popup -->
        <script src="https://okepedia.my.id/assets/js/plugins/magnific-popup.min.js"></script>
        <!-- End Magnific Popup -->

        <!-- Start Main Js -->
        <script src="https://okepedia.my.id/assets/js/main.js"></script>
        <!-- End Main Js -->
        <a id="scrollUp" href="#main" style="color: #000;position: fixed; z-index: 2147483647;">Ke Atas</a>
        <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
        

</body>

		<script>
            const img = {
                //href: 'https://zaidann.my.id/',
                title: 'Image Title',
            };

            modal.open([img], {
                autoSize: true
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape')
                    modal.close();
            });
        </script>
        <script type='text/javascript'>
        //<![CDATA[
        function redirectCU(e) {
          if (e.ctrlKey && e.which == 85) {
            window.location.replace("https://zaidann.my.id/");
            return false;
          }
        }
        document.onkeydown = redirectCU;

        //function redirectKK(e) {
          if (e.which == 3) {
            window.location.replace("https://zaidann.my.id/");
            return false;
          }
        }
        //document.oncontextmenu = redirectKK;
        //]]>
        </script>