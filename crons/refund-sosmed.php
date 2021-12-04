<?php
require("../config.php");

$check_order = $conn->query("SELECT * FROM pembelian_sosmed WHERE status IN ('Error','Partial') AND refund = '0'");

if (mysqli_num_rows($check_order) == 0) {
	die("Pesanan Berstatus Error Atau Partial Tidak Ditemukan.");
} else {
	while($data_order = mysqli_fetch_assoc($check_order)) {
		$o_oid = $data_order['oid'];
		$o_poid = $data_order['provider_oid'];
		$u_remains = $data_order['remains'];
		$layanan = $data_order['layanan'];
		$target = $data_order['target'];
		$u_status = $data_order['status'];

		    $priceone = $data_order['harga'] / $data_order['jumlah'];
		    $refund = $priceone * $u_remains;
		    $buyer = $data_order['user'];
		    if ($u_remains == 0) {
		        $refund = $data_order['harga'];
		    }
		    
		    $check_user = $conn->query("SELECT * FROM users WHERE username = '$buyer'");
            $data_user = $check_user->fetch_assoc();
            
            $todest = $data_user['no_hp'];
$tomsg = "[ *$u_status* ]
*Detail pesanan :*
*No. Pesanan :* $o_oid
*Produk :* $layanan
*Tujuan :* $target
*Status :* $u_status
*Catatan :* Pesanan berhasil direfund";
            $apikey2 = "524660";
            $phone = "+6289668258695";
		    $url2 = 'https://api.callmebot.com/whatsapp.php';
		    $postdata2 = "phone=$phone&text=$tomsg&apikey=$apikey2";
		    $ch2 = curl_init();
		    curl_setopt($ch2, CURLOPT_URL, $url2);
		    curl_setopt($ch2, CURLOPT_POST, 1);
		    curl_setopt($ch2, CURLOPT_POSTFIELDS, $postdata2);
		    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		    $chresult2 = curl_exec($ch2);
		    curl_close($ch2);
		    $json_result2 = json_decode($chresult2, true);

			$update_user = $conn->query("UPDATE users SET saldo_sosmed = saldo_sosmed+$refund, pemakaian_saldo = pemakaian_saldo+$refund WHERE username = '$buyer'");
			$update_order = $conn->query("INSERT INTO riwayat_saldo_koin VALUES ('', '$buyer', 'Saldo', 'Penambahan Saldo', '$refund', 'Pengembalian Dana Dari Pemesanan $layanan Akibat Status Pesanan Error/Partial Dengan Kode Pesanan : $o_oid', '$date', '$time')");
    		$update_order = $conn->query("UPDATE pembelian_sosmed SET refund = '1'  WHERE oid = '$o_oid'");
    		$update_order = $conn->query("UPDATE semua_pembelian SET refund = '1'  WHERE id_pesan = '$o_oid'");
    		if ($update_order == TRUE) {
    			echo "===============<br>Pengembalian Dana Sosial Media<br><br>Kode Pesanan : $o_oid<br>Nama Pengguna : $buyer<br>Rp $refund<br>===============<br>";
    		} else {
    			echo "Gagal Menampilkan Data Pengembalian Dana Sosial Media.<br />";
    		}
	}
}