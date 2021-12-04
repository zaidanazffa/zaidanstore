<?php
require_once("../config.php");

    $check_provider = $conn->query("SELECT * FROM provider_pulsa WHERE code = 'SULTAN'");
    $data_provider = mysqli_fetch_assoc($check_provider);

    $p_apiid = $data_provider['api_id'];
    $p_apikey = $data_provider['api_key'];

    $url = "https://www.sultan-store.com/api/pascabayar";

    $data = "api_key=$p_apikey&action=layanan";
   

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    $result = json_decode($response);
    //print_r($result);

$indeks=0; 
$i = 1;
// get data service
foreach($result->data as $data) {

$sid = $data->sid;
$category = $data->kategori;
$type = $data->tipe;
$service = $data->layanan;
$ht_status = $data->status;
$indeks++; 
$i++;
// end get data service 
$status = $ht_status;

		$check_services = $conn->query("SELECT * FROM layanan_pascabayar WHERE service_id = '$sid' AND provider = 'SULTAN'");
        $data_services = mysqli_fetch_assoc($check_services);
        if (mysqli_num_rows($check_services) > 0) {
            echo "<br>Layanan Sudah Ada Di Database => $service | $sid \n <br />";
        } else {

		//INSERT KATEGORI
		$cek_kategori = $conn->query("SELECT * FROM kategori_layanan WHERE kode = '$category' AND server = '$type'");
		if (mysqli_num_rows($cek_kategori) == 0) {
           $input_kategori = $conn->query("INSERT INTO kategori_layanan VALUES ('','$category','$category','Pascabayar','$type')");
            echo "<br>Kategori Sudah Ada Di Database => $category \n <br />";
		} else {

		}

$insert = $conn->query("INSERT INTO layanan_pascabayar VALUES ('', '$sid', '$sid', '$category', '$service', '$status', 'SULTAN', '$type', 'PASCABAYAR')");
if ($insert == TRUE) {
echo"===============<br>Layanan Pascabayar Berhasil Di Tambahkan<br><br>ID Layanan : $sid<br>Kategori : $category<br>Nama Layanan : $service<br>Tipe : $type<br>Status : $status<br>===============<br>";
} else {
    echo "Gagal Menampilkan Data Layanan Pascabayar.<br />";

}
}
}
?>