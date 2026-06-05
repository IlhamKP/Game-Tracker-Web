<?php
include 'koneksi.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password_baru = $_POST['password_baru'];
$cek = mysqli_query(
    $conn,
    "SELECT * FROM users
     WHERE username='$username'
     AND email='$email'"
);

if(mysqli_num_rows($cek) > 0){

    mysqli_query(
        $conn,
        "UPDATE users
         SET password='$password_baru'
         WHERE username='$username'
         AND email='$email'"
    );
    echo "Password berhasil diubah";
    header("location: index.html");
}else{

    echo "Username atau email tidak ditemukan";
    header("location: index.html");
}

?>