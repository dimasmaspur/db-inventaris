<?php
$response = array();
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (isset($input['username'])) {

    $nama_lengkap = $input['name'];
    $username = $input['username'];
    $str = $input['password'];
    $password = sha1($str);
    $role = $input['role'];

    if (mysqli_num_rows(mysqli_query($con, "select * from table_user where username='" . $username . "'")) > 0) {
        $response["status"] = 1;
        $response["message"] = "Username sudah digunakan";
    } else {
        $q = "INSERT INTO table_user(name,username,password,role) VALUES ('$nama_lengkap','$username','$password','$role')";
        mysqli_query($con, $q);

        $response["status"] = 0;
        $response["message"] = "Pendaftaran berhasil";
    }
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
