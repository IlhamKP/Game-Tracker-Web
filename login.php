<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username' AND password='$password'"    
);

if (mysqli_num_rows($query) > 0){
    echo "alert('Login berhasil!');";
    header("location: dashboard.html");
} else {
    echo "alert('Login gagal!');";
    header("location: index.html");
}


?>