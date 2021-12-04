<?php 
session_start();
require("config.php");
    
    if(isset($_COOKIE['cookie_token'])) {
    $data = $conn->query("SELECT * FROM users WHERE cookie_token='".$_COOKIE['cookie_token']."'");
    if(mysqli_num_rows($data) > 0) {
        $hasil = mysqli_fetch_assoc($data);
        $_SESSION['user'] = $hasil;
    }
}

    
    if (isset($_SESSION['user'])) {
        $sess_username = $_SESSION['user']['username'];
        $check_user = $conn->query("SELECT * FROM users WHERE username = '$sess_username'");
        $data_user = $check_user->fetch_assoc();
        $check_username = $check_user->num_rows;
        if ($check_username == 0) {
            header("Location: ".$config['web']['url']."logout.php");
        } else if ($data_user['status'] == "Tidak Aktif") {
            header("Location: ".$config['web']['url']."logout.php");
        }

        // Data Grafik Pesanan Sosial Media

        $check_order_today = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$date' and user = '$sess_username'");

        $oneday_ago = date('Y-m-d', strtotime("-1 day"));
        $check_order_oneday_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$oneday_ago' and user = '$sess_username'");

        $twodays_ago = date('Y-m-d', strtotime("-2 day"));
        $check_order_twodays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$twodays_ago' and user = '$sess_username'");

        $threedays_ago = date('Y-m-d', strtotime("-3 day"));
        $check_order_threedays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$threedays_ago' and user = '$sess_username'");

        $fourdays_ago = date('Y-m-d', strtotime("-4 day"));
        $check_order_fourdays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$fourdays_ago' and user = '$sess_username'");

        $fivedays_ago = date('Y-m-d', strtotime("-5 day"));
        $check_order_fivedays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$fivedays_ago' and user = '$sess_username'");

        $sixdays_ago = date('Y-m-d', strtotime("-6 day"));
        $check_order_sixdays_ago = $conn->query("SELECT * FROM pembelian_sosmed WHERE date ='$sixdays_ago' and user = '$sess_username'");   

        // Data Selesai

        // Data Grafik Pesanan Top Up

        $check_order_pulsa_today = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$date' and user = '$sess_username'");

        $oneday_ago = date('Y-m-d', strtotime("-1 day"));
        $check_order_pulsa_oneday_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$oneday_ago' and user = '$sess_username'");

        $twodays_ago = date('Y-m-d', strtotime("-2 day"));
        $check_order_pulsa_twodays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$twodays_ago' and user = '$sess_username'");

        $threedays_ago = date('Y-m-d', strtotime("-3 day"));
        $check_order_pulsa_threedays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$threedays_ago' and user = '$sess_username'");

        $fourdays_ago = date('Y-m-d', strtotime("-4 day"));
        $check_order_pulsa_fourdays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$fourdays_ago' and user = '$sess_username'");

        $fivedays_ago = date('Y-m-d', strtotime("-5 day"));
        $check_order_pulsa_fivedays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$fivedays_ago' and user = '$sess_username'");

        $sixdays_ago = date('Y-m-d', strtotime("-6 day"));
        $check_order_pulsa_sixdays_ago = $conn->query("SELECT * FROM pembelian_pulsa WHERE date ='$sixdays_ago' and user = '$sess_username'");

        // Data Selesai

        // Data Grafik Pesanan Pascabayar
        $check_order_pascabayar_today = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$date' and user = '$sess_username'");

        $oneday_ago = date('Y-m-d', strtotime("-1 day"));
        $check_order_pascabayar_oneday_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$oneday_ago' and user = '$sess_username'");

        $twodays_ago = date('Y-m-d', strtotime("-2 day"));
        $check_order_pascabayar_twodays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$twodays_ago' and user = '$sess_username'");

        $threedays_ago = date('Y-m-d', strtotime("-3 day"));
        $check_order_pascabayar_threedays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$threedays_ago' and user = '$sess_username'");

        $fourdays_ago = date('Y-m-d', strtotime("-4 day"));
        $check_order_pascabayar_fourdays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$fourdays_ago' and user = '$sess_username'");

        $fivedays_ago = date('Y-m-d', strtotime("-5 day"));
        $check_order_pascabayar_fivedays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$fivedays_ago' and user = '$sess_username'");

        $sixdays_ago = date('Y-m-d', strtotime("-6 day"));
        $check_order_pascabayar_sixdays_ago = $conn->query("SELECT * FROM pembelian_pascabayar WHERE date ='$sixdays_ago' and user = '$sess_username'");

        // Data Selesai

        } else {
            $_SESSION['user'] = $data_user;
            header("Location: ".$config['web']['url']."dashboard");
        }

include("lib/beranda.php");
if (isset($_SESSION['user'])) {
?>

<div class="kt-container">
    <br>
    <div class="row">
        <div class="col-lg-6">

        <!-- Slider -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" style="box-shadow: 1px 1px 10px #b5b4b1;">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slider/1.jpg" alt="Slide Pertama">
                        </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slider/2.jpg" alt="Slide Kedua">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slider/3.jpg" alt="Slide Ketiga">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $config['web']['url'] ?>assets/media/slider/4.jpg" alt="Slide Ketiga">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                </a>
            </div>
            <br>

            <!-- Saldo -->
            <div class="btn btn-light btn-hover-light col-lg-12">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="kt-iconbox__desc">
                                            <h4 class="kt-iconbox__title">
                                                <img src="<?php echo $config['web']['url'] ?>assets/media/icon/balance-top-up.svg" width="20px"> Rp <?php echo number_format($data_user['saldo_sosmed'],0,',','.'); ?>
                                            </h4>
                                            <div class="kt-iconbox__content">
                                                SALDO SOSMED
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="kt-iconbox__desc">
                                            <h4 class="kt-iconbox__title">
                                                <img src="<?php echo $config['web']['url'] ?>assets/media/icon/balance-top-up.svg" width="20px"> Rp <?php echo number_format($data_user['saldo_top_up'],0,',','.'); ?>
                                            </h4>
                                            <div class="kt-iconbox__content">
                                                SALDO PPOB
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            <br>
            <br>

            <div class="kt-portlet product-catagory-wrap">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Username : <?php echo $data_user['username']; ?>
                            </h3>
                    </div>
                    <div class="kt-portlet__head-label">
                            <a href="" class="btn btn-success">Deposit</a>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/sosial-media"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/sosmed.png" alt=""><span>SOSMED</span></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/pulsa-reguler"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/pulsa.png" alt=""><span>PULSA</span></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/saldo-emoney"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/e-money.png" alt=""><span>TOP UP</span></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/paket-data-internet"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/internet.png" alt=""><span>KUOTA</span></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/paket-sms-telepon"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/phone-sms.png" alt=""><span>PAKET</span></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/voucher-game"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/voucher-game.png" alt=""><span>GAMES</span></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/voucher"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/voucher.png" alt=""><span>VOCHER</span></a>
                            </div></div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/token-pln"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/token-listrik.png" alt=""><span>PLN</span></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                                <a href="<?php echo $config['web']['url'] ?>order/streaming"><img height="50px" src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/streaming.png" alt=""><span>LAINNYA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- order -->
        <!-- <div class="product-catagory-wrap">
                <div class="row">
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/sosial-media"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/sosmed.png" alt=""><span>SOSMED</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/pulsa-reguler"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/pulsa.png" alt=""><span>PULSA</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/saldo-emoney"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/e-money.png" alt=""><span>TOP UP</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/paket-data-internet"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/internet.png" alt=""><span>KUOTA</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/paket-sms-telepon"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/phone-sms.png" alt=""><span>PAKET</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/voucher-game"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/voucher-game.png" alt=""><span>GAMES</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/voucher"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/voucher.png" alt=""><span>VOCHER</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/token-pln"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/token-listrik.png" alt=""><span>PLN</span></a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3 catagory-card">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a href="<?php echo $config['web']['url'] ?>order/streaming"><img src="<?php echo $config['web']['url'] ?>assets/media/icon-pay/streaming.png" alt=""><span>LAINNYA</a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>


    Grafik -->
    <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <i class="flaticon-graph text-primary"></i>
                                Grafik Pesanan 7 Hari Terakhir
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                    <div class="chart" id="line-chart" style="height: 300px;"></div>
                    <script>
                    $(function () {
                        "use strict";
                        var line = new Morris.Area({
                            element: 'line-chart',
                            resize: true,
                            behaveLikeLine: true,
                            data: [
                                {w: '<?php echo $date; ?>', x: <?php echo mysqli_num_rows($check_order_today); ?>, y: <?php echo mysqli_num_rows($check_order_pulsa_today); ?>, z: <?php echo mysqli_num_rows($check_order_pascabayar_today); ?>},
                                {w: '<?php echo $oneday_ago; ?>', x: <?php echo mysqli_num_rows($check_order_oneday_ago); ?>, y: <?php echo mysqli_num_rows($check_order_pulsa_oneday_ago); ?>, z: <?php echo mysqli_num_rows($check_order_pascabayar_oneday_ago); ?>},
                                {w: '<?php echo $twodays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_twodays_ago); ?>, y: <?php echo mysqli_num_rows($check_order_pulsa_twodays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_pascabayar_twodays_ago); ?>},
                                {w: '<?php echo $threedays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_threedays_ago); ?>, y: <?php echo mysqli_num_rows($check_order_pulsa_threedays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_pascabayar_threedays_ago); ?>},
                                {w: '<?php echo $fourdays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_fourdays_ago); ?>, y: <?php echo mysqli_num_rows($check_order_pulsa_fourdays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_pascabayar_fourdays_ago); ?>},
                                {w: '<?php echo $fivedays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_fivedays_ago); ?>, y: <?php echo mysqli_num_rows($check_order_pulsa_fivedays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_pascabayar_fivedays_ago); ?>},
                                {w: '<?php echo $sixdays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_sixdays_ago); ?>, y: <?php echo mysqli_num_rows($check_order_pulsa_sixdays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_pascabayar_sixdays_ago); ?>}
                            ],
                            xkey: 'w',
                            ykeys: ['x','y','z'],
                            labels: ['Pesanan Sosial Media','Pesanan Top Up','Pesanan Pascabayar'],
                            lineColors: ['#f35864','#3399ff','FFFF00'],
                            pointSize: 0,
                            lineWidth: 0,
                            hideHover: 'auto',
                            redraw: true,
                        });
                    });
                    </script>
                    </div>
                </div>
    <!-- end col 6 -->
        </div>  
        
    <!-- Riwayat Pesanan -->
    <div class="col-lg-6">
        <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <i class="flaticon2-time text-primary"></i>
                            10 Riwayat Pesanan Terakhir Kamu
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap m-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Via</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $cek_pesanan = $conn->query("SELECT * FROM semua_pembelian WHERE user = '$sess_username' ORDER BY id DESC LIMIT 10"); // edit
                            while ($data_pesanan = $cek_pesanan->fetch_assoc()) {
                            if ($data_pesanan['status'] == "Pending") {
                                $label = "warning";
                            } else if ($data_pesanan['status'] == "Processing") {
                                $label = "primary";
                            } else if ($data_pesanan['status'] == "Error") {
                                $label = "danger";
                            } else if ($data_pesanan['status'] == "Partial") {
                                $label = "danger";
                            } else if ($data_pesanan['status'] == "Success") {
                                $label = "success";
                            }
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td align="center"><?php if($data_pesanan['place_from'] == "API") { ?><i class="fa fa-random"></i><?php } else { ?><i class="flaticon-globe"></i><?php } ?></td>
                                <td><?php echo tanggal_indo($data_pesanan['date']); ?>, <?php echo $data_pesanan['time']; ?></td>
                                <td><?php echo $data_pesanan['layanan']; ?></td>
                                <td>Rp <?php echo number_format($data_pesanan['harga'],0,',','.'); ?></td>
                                <td><span class="btn btn-<?php echo $label; ?> btn-elevate btn-pill btn-elevate-air btn-sm"><?php echo $data_pesanan['status']; ?></span></td>
                            </tr>   
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- berita -->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <i class="flaticon2-bell text-primary"></i>
                            Berita & Informasi
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-notes">
                        <div class="kt-notes__items">
                        <?php
                        $cek_berita = $conn->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5");
                        while ($data_berita = $cek_berita->fetch_assoc()) {
                        $beritastr = "-".strlen($data_berita['konten']);
                        $beritasensor = substr($data_berita['konten'],$slider_beritastr,+100);
                        if ($data_berita['tipe'] == "INFO") {
                            $label = "info";
                        } else if ($data_berita['tipe'] == "PERINGATAN") {
                            $label = "warning";
                        } else if ($data_berita['tipe'] == "PENTING") {
                            $label = "danger";
                        }

                        if ($data_berita['icon'] == "PESANAN") {
                            $label_icon = "flaticon2-shopping-cart";
                        } else if ($data_berita['icon'] == "LAYANAN") {
                            $label_icon = "flaticon-signs-1";
                        } else if ($data_berita['icon'] == "DEPOSIT") {
                            $label_icon = "flaticon-coins";
                        } else if ($data_berita['icon'] == "PENGGUNA") {
                            $label_icon = "flaticon2-user";
                        } else if ($data_berita['icon'] == "PROMO") {
                            $label_icon = "flaticon2-percentage";
                        }
                        ?>
                            <div class="kt-notes__item">
                                <div class="kt-notes__media">
                                    <span class="kt-notes__icon">
                                        <i class="<?php echo $label_icon; ?> text-primary"></i>
                                    </span>
                                </div>
                                <div class="kt-notes__content"> 
                                    <div class="kt-notes__section">
                                        <div class="kt-notes__info">
                                            <a href="<?php echo $config['web']['url'] ?>page/news-details?id=<?php echo $data_berita['id']; ?>" class="kt-notes__title">
                                                <?php echo $data_berita['title']; ?>
                                            </a>
                                            <span class="kt-notes__desc">
                                                (<?php echo tanggal_indo($data_berita['date']); ?>)
                                            </span>
                                            <span class="kt-badge kt-badge--<?php echo $label; ?> kt-badge--inline"><?php echo $data_berita['tipe']; ?></span>
                                        </div>
                                    <div class="kt-subheader__wrapper" data-toggle="kt-tooltip" title="" data-original-title="Mau Lihat?">
                                        <a href="<?php echo $config['web']['url'] ?>page/news-details?id=<?php echo $data_berita['id']; ?>" class="btn btn-sm btn-icon-md btn-icon">
                                        <i class="flaticon-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            <span class="kt-notes__body">
                                <?php echo nl2br ($beritasensor."....."); ?>
                            </span>  
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <a href="<?php echo $config['web']['url'] ?>page/news" class="btn btn-sm btn-primary text-center"><i class="flaticon-visible"></i> Lihat Semua...</a>
                </div>
            </div>

    <!-- end col 6 -->
    </div>
</div>
    <!-- Start Modal Content -->
    <?php 
        if ($data_user['read_news'] == 0) {
        ?>
        <div class="modal fade show" id="news" tabindex="-1" role="dialog" aria-labelledby="NewsInfo" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title mt-0" id="NewsInfo"><b><i class="flaticon2-bell text-primary"></i>  Berita & Informasi</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="max-height: 400px; overflow: auto;">
                    <?php
                    $cek_berita = $conn->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5");
                    while ($data_berita = $cek_berita->fetch_assoc()) {
                    if ($data_berita['tipe'] == "INFO") {
                        $label = "info";
                    } else if ($data_berita['tipe'] == "PERINGATAN") {
                        $label = "warning";
                    } else if ($data_berita['tipe'] == "PENTING") {
                        $label = "danger";    
                    }
                    ?>  
                    <div class="alert alert-warning">
                        <div class="alert-text">
                            <p><span class="float-right text-muted"><?php echo tanggal_indo($data_berita['date']); ?>, <?php echo $data_berita['time']; ?></span></p>
                            <h5 class="inbox-item-author mt-0 mb-1"><?php echo $data_berita['title']; ?></h5>
                            <h5><span class="badge badge-<?php echo $label; ?>"><?php echo $data_berita['tipe']; ?></span></h5>
                            <?php echo nl2br($data_berita['konten']); ?>
                        </div>
                    </div>
                    <?php } ?>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="read_news()"><i class="flaticon2-check-mark"></i> Saya Sudah Membaca</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- End Modal Content-->
</div>

<?php 
}
require 'lib/footer.php';
?>