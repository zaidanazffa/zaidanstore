<?php
/*
Script Oper Get Service Diamond Pedia (2021)
Hello Mikel Yonathan Here.
Developer
 __  __  ____    ____    ______  ____    ____    _____   __  __  ____    
/\ \/\ \/\  _`\ /\  _`\ /\__  _\/\  _`\ /\  _`\ /\  __`\/\ \/\ \/\  _`\  
\ \ \ \ \ \ \L\_\ \ \/\_\/_/\ \/\ \ \L\_\ \ \L\ \ \ \/\ \ \ \ \ \ \ \L\ \
 \ \ \ \ \ \  _\L\ \ \/_/_ \ \ \ \ \ \L_L\ \ ,  /\ \ \ \ \ \ \ \ \ \ ,__/
  \ \ \_/ \ \ \L\ \ \ \L\ \ \ \ \ \ \ \/, \ \ \\ \\ \ \_\ \ \ \_\ \ \ \/ 
   \ `\___/\ \____/\ \____/  \ \_\ \ \____/\ \_\ \_\ \_____\ \_____\ \_\ 
    `\/__/  \/___/  \/___/    \/_/  \/___/  \/_/\/ /\/_____/\/_____/\/_/ 

Since 2017
Contact : https://wa.me/6285157513313
Arigatou , Don't Remove This Green Text OR This Script Won't Work.
*/

require_once("../config.php");

    $check_provider = $conn->query("SELECT * FROM provider_pulsa WHERE code = 'SULTAN'");
    $data_provider = mysqli_fetch_assoc($check_provider);

    $cek_harga_website = $conn->query("SELECT * FROM setting_harga_untung WHERE kategori = 'WEBSITE' AND tipe = 'Top Up'");
    $data_harga_website = mysqli_fetch_assoc($cek_harga_website);

    $cek_harga_api = $conn->query("SELECT * FROM setting_harga_untung WHERE kategori = 'API' AND tipe = 'Top Up'");
    $data_harga_api = mysqli_fetch_assoc($cek_harga_api);

    $p_apiid = $data_provider['api_id'];
    $p_apikey = $data_provider['api_key'];
    $link = $data_provider['link'];

    $harga_website = $data_harga_website['harga'];
    $harga_api = $data_harga_api['harga'];

    $url_service = "https://www.sultan-store.com/api/top-up";

    $post = "api_key=$p_apikey&action=layanan";
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_service);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $respon = curl_exec($ch);
    $result = json_decode($respon);
    if ($result->status == false) {
        echo "<font color='red'>GAGAL API Disebabkan :</font> ".$result->data->pesan;
    } else {

$indeks=0; 
$i = 1;
// get data service
foreach($result->data as $s) {

$sid = $s->sid;
$category = $s->operator;
$type = $s->tipe;
$service = $s->layanan;
$description = $s->note;
$price = $s->harga;
$ht_status = $s->status;
$indeks++; 
$i++;
// end get data service 
// setting price 
$price_web = $price + 1000; //setting penambahan harga web

$price_api = $price + 1000; //setting penambahan harga api
// setting price

		if ($ht_status == 'Normal') {
			$status = "Normal";
		} else {
			$status = "Gangguan";
		}
		
		$multi = "Ya";

		$check_services = $conn->query("SELECT * FROM layanan_pulsa WHERE service_id = '$sid' AND provider = 'SULTAN'");
        $data_services = mysqli_fetch_assoc($check_services);
        if (mysqli_num_rows($check_services) > 0) {
        $update = $conn->query("UPDATE layanan_pulsa SET deskripsi = '$description', harga = '$price_web', harga_api = '$price_api', multi = '$multi', status = '$status' WHERE service_id = '$sid'");
            echo '<font color="blue">ALREADY</font> = '.$service.'<br />';
            echo ($update == true) ? '<font color="green">SUCCESS UPDATED!</font><br />Harga WEB: '.$price_web.'<br />Status: '.$status.'<br /><br />' : '<font color="red">FAILED UPDATED: '.mysqli_error($conn).'</font><br />';
        } else {

$insert = $conn->query("INSERT INTO layanan_pulsa VALUES ('', '$sid', '$sid', '$category', '$service', '$description', '$price_web', '$price_api', '$multi', '$status', 'SULTAN', '$type', 'TOP UP')");
if ($insert == TRUE) {
echo"<font color='green'>SUCCESS ADDED!</font> : Nama Layanan : $service - Harga Web : $price_web<br><br>";
} else {
    echo "mysqli_error($conn).<br />";

}
}
}
}
?>