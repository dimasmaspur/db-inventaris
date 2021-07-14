<?php
$response = array();
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (isset($input['id'])) {

    $id_pengguna = $input['id'];
    $id_pengguna = empty($input['id']) ? "" : $input['id'];
    $nama_lengkap = empty($input['name']) ? "" : $input['name'];
    $username = empty($input['username']) ? "" : $input['username'];
    $str = empty($input['password']) ? "" : $input['password'];
    $password = sha1($str);
    $role = empty($input['role']) ? "" : $input['role'];

    $q = "UPDATE table_user SET
            id='$id_pengguna',
			name='$nama_lengkap',
			username='$username',
			password='$password',
            role='$role'
		WHERE id='$id_pengguna'";
    mysqli_query($con, $q);

    $response["status"] = 0;
    $response["message"] = "Data berhasil disimpan";
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
