<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

$q = mysqli_query($con, "SELECT nama_barang,jenis,jumlah,input_date,status,id, harga,username FROM table_barang ");

$response["table_barang"] = array();
while ($r = mysqli_fetch_array($q)) {
    $barang = array();
    $barang["nama_barang"] = $r['nama_barang'];
    $barang["jenis"] = $r['jenis'];
    $barang["jumlah"] = $r['jumlah'];
    $barang["input_date"] = $r['input_date'];
    $barang["status"] = $r['status'];
    $barang["id"] = $r['id'];
    $barang["harga"] = $r['harga'];
    $barang["username"] = $r['username'];
    array_push($response["table_barang"], $barang);
}
$response["status"] = 0;
$response["message"] = "Get list User berhasil";

echo json_encode($response);
