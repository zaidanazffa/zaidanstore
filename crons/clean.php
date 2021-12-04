<?php

require '../config.php';

$sql = "DELETE FROM semua_pembelian WHERE status = 'pending' AND user = 'akmal' ";
$query = mysqli_query($conn, $sql);

// show error
if(!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
?>