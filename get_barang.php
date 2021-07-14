<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

if (isset($input['id'])) {

    $id = $input['id'];

    $q = mysqli_query($con, "SELECT id,nama_barang,jenis,jumlah,input_date,harga,username FROM table_barang WHERE id='$id'");
    $r = mysqli_fetch_array($q);

    $response["status"] = 0;
    $response["message"] = "Get pengguna berhasil";
    $response["id"] = $r['id'];
    $response["jenis"] = $r['jenis'];
    $response["nama_barang"] = $r['nama_barang'];
    $response["jumlah"] = $r['jumlah'];
    $response["input_date"] = $r['input_date'];
    $response["harga"] = $r['harga'];
    $response["username"] = $r['username'];
    
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
