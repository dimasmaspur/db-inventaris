<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

if (isset($input['id'])) {

    $id_pengguna = $input['id'];

    $q = mysqli_query($con, "SELECT id,name,password,username,role FROM table_user WHERE id='$id_pengguna'");
    $r = mysqli_fetch_array($q);

    $response["status"] = 0;
    $response["message"] = "Get pengguna berhasil";
    $response["id"] = $r['id'];
    $response["name"] = $r['name'];
    $response["username"] = $r['username'];
    $response["password"] = $r['password'];
    $response["role"] = $r['role'];
    
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
