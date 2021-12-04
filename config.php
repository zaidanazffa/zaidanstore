<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
$maintenance = 0; // Maintenance? 1 = ya 0 = tidak
if($maintenance == 1) {
    die("Website ditutup sementara dikarenakan banyak layanan yang mengalami gangguan");
}
// database
$config['db'] = array(
	'host' => 'localhost',
	'name' => 'teyjmody_zstore',
	'username' => 'teyjmody_zstore',
	'password' => '19november2004'
);

$conn = mysqli_connect($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
if(!$conn) {
	die("Koneksi Gagal : ".mysqli_connect_error());
	}
$config['web'] = array(
	'url' => 'https://zaidann.my.id/' // contoh: http://domain.com/
);
// date & time
$date = date("Y-m-d");
$time = date("H:i:s");
require("lib/function.php");
require("lib/setting.php");
?>