<?php
session_start();
require '../config.php';
require '../lib/session_user.php';
require '../lib/header.php';
?>

        <!-- Start Sub Header -->
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
	        <div class="kt-container">
	            <div class="kt-subheader__main">
		            <h3 class="kt-subheader__title">Monitoring Layanan</h3>
	                <div class="kt-subheader__breadcrumbs">
	                    <a href="<?php echo $config['web']['url'] ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
	                	<span class="kt-subheader__breadcrumbs-separator"></span>
	                    <a href="<?php echo $config['web']['url'] ?>" class="kt-subheader__breadcrumbs-link">Halaman Utama</a>
	                	<span class="kt-subheader__breadcrumbs-separator"></span>
	                    <a href="<?php echo $config['web']['url'] ?>" class="kt-subheader__breadcrumbs-link">Monitoring Layanan</a>
	                </div>
	            </div>
	        </div>
        </div>
        <!-- End Sub Header -->

        <!-- Start Content -->
        <div class="kt-container kt-grid__item kt-grid__item--fluid">

        <!-- Start Page History Top Up Balance -->
        <div class="row">
            <div class="col-xl-12 m-b-30">
		        <div class="btn-group flex-wrap mb-4" role="group">
		            <a href="<?php echo $config['web']['url'] ?>order/sosial-media" class="btn btn-success active">Pemesanan Sosial Media</a>
		        </div>
		        <div class="btn-group flex-wrap mb-4" role="group">
		            <a href="<?php echo $config['web']['url'] ?>page/monitoring-layanan" class="btn btn-danger active">Monitoring Layanan</a>
		        </div>
			</div>
		</div>
        <div class="row">
	        <div class="col-lg-12">
		        <div class="kt-portlet">
			        <div class="kt-portlet__head">
				        <div class="kt-portlet__head-label">
					        <h3 class="kt-portlet__head-title">
					            <i class="flaticon2-time text-primary"></i>
					            Monitoring Layanan
					        </h3>
				        </div>
			        </div>
			        <div class="kt-portlet__body">
			               <form class="form-horizontal" method="GET">
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Tampilkan Beberapa</label>
                                            <select class="form-control" name="tampil">
                                                <option value="10">Default</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>                                                
                                        <div class="form-group col-lg-4">
                                            <label>Cari Nama Layanan</label>
                                            <input type="number" class="form-control" name="layanan" placeholder="Masukkan Nama Layanan" value="">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Submit</label>
                                            <button type="submit" class="btn btn-block btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </form>
                     <div class="table-responsive">
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                            <thead>
                                <tr>
                                     <th>No</th>
                                     <th>Layanan</th>
                                     <th>Jam Mulai</th>
                                     <th>Jam Update</th>
                                     <th>Waktu Prosess</th>
                                     <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
// start paging config
if (isset($_GET['cari'])) {
    $cari_layanan = $conn->real_escape_string(filter($_GET['layanan']));
    $lastweek = date('Y-m-d', strtotime('-7 days', strtotime(date("Y-m-d"))));
    $cek_pesanan = "SELECT * FROM pembelian_sosmed WHERE layanan LIKE '%$cari_layanan%' AND DATE(date) BETWEEN '$lastweek' AND '$date' AND status = 'Success' ORDER BY id DESC"; // edit
    
} else {
    $lastweek = date('Y-m-d', strtotime('-7 days', strtotime(date("Y-m-d"))));
    $cek_pesanan = "SELECT * FROM pembelian_sosmed WHERE DATE(date) BETWEEN '$lastweek' AND '$date' AND status = 'Success' ORDER BY id DESC"; // edit
}
if (isset($_GET['cari'])) {
$cari_urut = $conn->real_escape_string(filter($_GET['tampil']));
$records_per_page = $cari_urut; // edit
} else {
    $records_per_page = 50; // edit
}

$starting_position = 0;
$no = $starting_position+1;
if(isset($_GET["halaman"])) {
    $starting_position = ($conn->real_escape_string(filter($_GET["halaman"]))-1) * $records_per_page;
}
$new_query = $cek_pesanan." LIMIT $starting_position, $records_per_page";
$new_query = $conn->query($new_query);
// end paging config
while ($data_layanan = $new_query->fetch_assoc()) {
$datee = $data_layanan['date'];
$timee = $data_layanan['time'];
$awal  = "$datee $timee";
$hehe = date_create($awal);
$akhir = date_create($data_layanan['update_at']);
$diff  = date_diff($hehe, $akhir);
    
?>
                                <tr>
                                    <td><?= $no++;?></button></td>
                                    <td><?= $data_layanan['layanan'];?></td>
                                    <td><?= $data_layanan['date']; ?> <?= $data_layanan['time']; ?></td>
                                    <td><?= $data_layanan['update_at']; ?></td>
                                    <td><?php echo $diff->h . ' Jam, ' ?><?php echo $diff->i . ' Menit, ' ?><?php echo $diff->s . ' Detik' ?></td>
 								    <td><?= $data_layanan['jumlah']; ?></td>
 								   </tr>   
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                        <br>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page History Top Up Balance -->

        </div>
        <!-- End Content -->

        <!-- Start Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
		    <i class="fa fa-arrow-up"></i>
		</div>
		<!-- End Scrolltop -->

<?php
require '../lib/footer.php';
?>