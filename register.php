<?php
include 'koneksi.php';

$email = $_POST['email_su'];
$username = $_POST['username_su'];
$password = $_POST['password_su'];
$foto = ['kucing1.jpg','kucing2.jpg','kucing3.jpg','kucing4.jpg','kucing5.jpg'];
$banner = ['banner_kucing1.jpg','banner_kucing2.jpg','banner_kucing3.jpg'];

$foto_profile = $foto[array_rand($foto)];
$banner_profile = $banner[array_rand($banner)];

$sql = "INSERT INTO users (email,username,password,foto_profile,banner_profile) values ('$email','$username','$password','$foto_profile','$banner_profile')";

if(mysqli_query($conn, $sql)){
    header("location: index.html");
    echo "Register Berhasil!";
}else {
    echo "Register Gagal!";
}
?>