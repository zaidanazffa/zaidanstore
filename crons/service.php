<?php
require_once("../config.php");

    $check_provider = $conn->query("SELECT * FROM provider WHERE code = 'ASTORE'");
    $data_provider = mysqli_fetch_assoc($check_provider);

    $cek_harga_website = $conn->query("SELECT * FROM setting_harga_untung WHERE kategori = 'WEBSITE' AND tipe = 'Sosial Media'");
    $data_harga_website = mysqli_fetch_assoc($cek_harga_website);

    $cek_harga_api = $conn->query("SELECT * FROM setting_harga_untung WHERE kategori = 'API' AND tipe = 'Sosial Media'");
    $data_harga_api = mysqli_fetch_assoc($cek_harga_api);

    $p_apikey = $data_provider['api_key'];

    $harga_website = $data_harga_website['harga'];
    $harga_api = $data_harga_api['harga'];

    $api_postdata = "api_key=$p_apikey&action=layanan";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.sultan-store.com/api/social-media");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $api_postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $chresult = curl_exec($ch);
    //print $chresult;
    curl_close($ch);
    $json_result = json_decode($chresult, true);
    print "<pre>Success Updated! At $date - $time WIB</pre>";

$indeks=0; 
$i = 1;
// get data service
$conn->query("TRUNCATE TABLE layanan_sosmed");
while($indeks < count($json_result['data'])){

$sid = $json_result['data'][$indeks]['sid'];
$category = $json_result['data'][$indeks]['kategori'];
$service = $json_result['data'][$indeks]['layanan'];
$price = $json_result['data'][$indeks]['harga'];
$min_order = $json_result['data'][$indeks]['min'];
$max_order = $json_result['data'][$indeks]['max'];
$note = $json_result['data'][$indeks]['catatan'];
$indeks++; 
$i++;
// end get data service 
// setting price 
$untung = (35 / 100) * $price; // keuntungan persen
$untung_api = (30 / 100) * $price; // keuntungan persen
$harga_asli = $price + $untung;
$harga_api_asli = $price + $untung_api;
// setting price

$service2 = strtr($service, array(
	'SULTAN' => 'KANG WEB',
	'SULTAN' => 'KANG',
));

		$check_services = $conn->query("SELECT * FROM layanan_sosmed WHERE service_id = '$sid' AND provider = 'SULTAN'");
        $data_services = mysqli_fetch_assoc($check_services);
        if (mysqli_num_rows($check_services) > 0) {
        $update = $conn->query("UPDATE layanan_sosmed SET harga = '$harga_asli', harga_api = '$harga_api_asli' WHERE service_id = '$sid'");
            print "<br>Layanan Sudah Ada Di Database => $service2 | $sid \n <br />";
            print ($update == true) ? '<font color="green">Update Sukses!</font><br />Harga API: '.$harga_api_asli.'<br />Harga WEB: '.$harga_asli.'<br /><br />' : '<font color="red">Update Gagal: '.mysqli_error($conn).'</font><br />';
        } else {

$insert = $conn->query("INSERT INTO layanan_sosmed VALUES ('','$sid','server2','$service2','$note','$min_order','$max_order','$harga_asli','$harga_api_asli','Aktif','$sid','SULTAN', 'Sosial Media')");//Memasukan Kepada Database (OPTIONAL)
if ($insert == TRUE) {
print"$service2 -> added!<br />";
} else {
    print "Gagal Menampilkan Data Layanan Sosmed.<br />";

}
}
}
?>