<?php
$response = array();
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (isset($input['id_user'])) {
    $tanggal = date('Y-m-d');
    $id_user = $input['id_user'];
    $id_cupang = empty($input['id_cupang']) ? "" : $input['id_cupang'];
    $nama_pembeli =  empty($input['nama_pembeli']) ? "" : $input['nama_pembeli'];
    $notelp_pembeli = empty($input['notelp_pembeli']) ? "" : $input['notelp_pembeli'];
    $alamat_pembeli = empty($input['alamat_pembeli']) ? "" : $input['alamat_pembeli'];
    $harga_penjualan = empty($input['harga_penjualan']) ? "" : $input['harga_penjualan'];

    $q = "INSERT INTO penjualan(id_user,id_cupang,nama_pembeli,notelp_pembeli, alamat_pembeli, harga_penjualan, approve, date) VALUES ('$id_user','$id_cupang','$nama_pembeli','$notelp_pembeli','$alamat_pembeli','$harga_penjualan','false','$tanggal')";
    mysqli_query($con, $q);

    $response["status"] = 0;
    $response["message"] = "Data berhasil disimpan";
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
