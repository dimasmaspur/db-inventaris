<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

$q = mysqli_query($con, "SELECT id,name,username, role FROM table_user ");

$response["table_user"] = array();
while ($r = mysqli_fetch_array($q)) {
    $user = array();
    $user["id"] = $r['id'];
    $user["name"] = $r['name'];
    $user["username"] = $r['username'];
    $user["role"] = $r['role'];
    array_push($response["table_user"], $user);
}
$response["status"] = 0;
$response["message"] = "Get list User berhasil";

echo json_encode($response);
