<?php
$response = array();
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (isset($input['username'])) {

    $nama_barang = $input['nama_barang'];
    $jenis = $input['jenis'];
    $jumlah = $input['jumlah'];
    $input_date = $input['input_date'];
    $status = $input['status'];
    $harga = $input['harga'];
    $username = $input['username'];

    
        $q = "INSERT INTO table_barang(nama_barang,jenis,jumlah,input_date,status,harga,username) VALUES ('$nama_barang','$jenis','$jumlah','$input_date','$status','$harga','$username')";
        mysqli_query($con, $q);

        $response["status"] = 0;
        $response["message"] = "Data berhasil di tambahkan";
    
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
