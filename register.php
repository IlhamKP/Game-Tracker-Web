<?php
include 'koneksi.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users values ('', '$email','$username','$password')";

if(mysqli_query($conn, $sql)){
    echo "Register Berhasil!";
    header("location: index.html");
}else {
    echo "Register Gagal!";
}
?>