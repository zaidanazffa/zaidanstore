<?php
/*
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
    
    $p_apiid = $data_provider['api_id'];
    $p_apikey = $data_provider['api_key'];
    $link = $data_provider['link'];

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
foreach($result->data as $c) {

$category = $c->operator;
$type = $c->tipe;
$indeks++; 
$i++;
// end get data service 

		$cek_kategori = $conn->query("SELECT * FROM kategori_layanan WHERE kode = '$category' AND server = '$type'");
        $data_services = mysqli_fetch_assoc($cek_kategori);
        if (mysqli_num_rows($cek_kategori) > 0) {
            echo '<font color="blue">ALREADY</font> = '.$category.'<br />';
        } else {

$insert = $conn->query("INSERT INTO kategori_layanan VALUES ('','$category','$category','Top Up','$type')"); //Memasukan Kepada Database (OPTIONAL)
if ($insert == TRUE) {
echo"<font color='green'>SUCCESS ADDED!</font> : Category Layanan : $category - Type : $type<br><br>";
} else {
    echo "Gagal Menampilkan Data Kategori Top Up.<br />";
}
}
}
}
?>