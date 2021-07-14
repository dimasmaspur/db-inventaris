<?php
$response = array();
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (isset($input['id'])) {

    $id = $input['id'];
    $id = empty($input['id']) ? "" : $input['id'];
    $nama_barang = empty($input['nama_barang']) ? "" : $input['nama_barang'];
    $jenis = empty($input['jenis']) ? "" : $input['jenis'];
    $jumlah = empty($input['jumlah']) ? "" : $input['jumlah'];
    $input_date = empty($input['input_date']) ? "" : $input['input_date'];
    $status = empty($input['status']) ? "" : $input['status'];
    $harga = empty($input['harga']) ? "" : $input['harga'];
    $username = empty($input['username']) ? "" : $input['username'];

    $q = "UPDATE table_barang SET
            id='$id',
			nama_barang='$nama_barang',
			jenis='$jenis',
			input_date='$input_date',
            jumlah='$jumlah',
            status='$status',
            harga='$harga',
            username='$username'
		WHERE id='$id'";
    mysqli_query($con, $q);

    $response["status"] = 0;
    $response["message"] = "Data berhasil disimpan";
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
