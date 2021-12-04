<?php
	require("../config.php");

	$check_order = $conn->query("SELECT * FROM pembelian_pulsa WHERE status IN ('Pending')");

	if (mysqli_num_rows($check_order) == 0) {
	  die("Pesanan Berstatus Pending Tidak Ditemukan.");
	} else {
	  while($data_order = mysqli_fetch_assoc($check_order)) {
	    $o_oid = $data_order['oid'];
	    $o_poid = $data_order['provider_oid'];
	    $o_provider = $data_order['provider'];
	    $username = $data_order['user'];
	    $target = $data_order['target'];
	    $koin = $data_order['koin'];
	    $layanan = $data_order['layanan'];
	    $provider = $data_order['provider'];
	  if ($o_provider == "MANUAL") {
	    echo "Pesanan Manual<br />";
	  } else {

        $getService = $conn->query("SELECT * FROM layanan_pulsa WHERE layanan = '$layanan' AND provider = '$provider'");
        $getDataService = mysqli_fetch_assoc($getService);

		$check_provider = $conn->query("SELECT * FROM provider_pulsa WHERE code = 'SULTAN'");
		$data_provider = mysqli_fetch_assoc($check_provider);

		$p_apikey = $data_provider['api_key'];
		$p_api_id = $data_provider['api_id'];

        $url = "https://www.sultan-store.com/api/top-up";

        $data = "api_key=$p_apikey&action=status&id=$o_poid";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result1 = curl_exec($ch);
        $result = json_decode($result1, true);
        echo $result;
        // echo $json_result;

        $sn = $result['data']['catatan'];
        $ht_status = $result['data']['status'];

		if ($ht_status == "Error") {
			$status = "Error";
		} else if ($ht_status == "Success") {
			$status = "Success";
		} else if ($ht_status == "Pending") {
			$status = "Pending";
		}

	    if ($status == "Success") {
	      $update_order = $conn->query("INSERT INTO riwayat_saldo_koin VALUES ('', '$username', 'Koin', 'Penambahan Koin', '$koin', 'Mendapatkan Koin Melalui Pemesanan $layanan Dengan Kode Pesanan : $o_oid', '$date', '$time')");
	      $update_order = $conn->query("UPDATE users SET koin = koin+$koin WHERE username = '$username'");
	      
	      $check_user = $conn->query("SELECT * FROM users WHERE username = '$username'");
	      $data_user = $check_user->fetch_assoc();
	      $todest = $data_user['no_hp'];
$tomsg = "[ *$status* ]
*Detail pesanan :*
*No. Pesanan :* $o_oid
*Produk :* $layanan
*Tujuan :* $target
*Status :* $status
*Catatan :* $sn";
                
             $apikey2 = "524660";
            $phone = "@akmalmaulanaa";
            $url3='http://api.callmebot.com/text.php?source=web&user='.$phone.'&&text='.urlencode($tomsg);
		    $url2 = 'https://api.callmebot.com/whatsapp.php';
		    $postdata2 = "user=$phone&text=$tomsg";
			    $ch2 = curl_init();
			    curl_setopt($ch2, CURLOPT_URL, $url3);
                curl_setopt($ch2, CURLOPT_POST, 1);
                curl_setopt($ch2, CURLOPT_POSTFIELDS, $postdata2);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
                $chresult2 = curl_exec($ch2);
                curl_close($ch2);
                $json_result2 = json_decode($chresult2, true);
	    }
	    $update_order = $conn->query("UPDATE semua_pembelian SET status = '$status' WHERE id_pesan = '$o_oid'");
	    $update_order = $conn->query("UPDATE pembelian_pulsa SET status = '$status', keterangan = '$sn' WHERE oid = '$o_oid'");
	    if ($update_order == TRUE) {
	      echo "===============<br>Berhasil Menampilkan Data Status Top Up<br><br>ID Pesanan : $o_oid<br>Keterangan : $sn<br>Status : $status<br>===============<br>";
	    } else {
	      echo "Gagal Menampilkan Data Status Top Up.<br />";
	    }
	  }
	}
  }
?>