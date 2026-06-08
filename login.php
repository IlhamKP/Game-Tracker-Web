<?php
include 'koneksi.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username' AND password='$password'"    
);

if (mysqli_num_rows($query) > 0){
    $user = mysqli_fetch_assoc($query);

    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("location: dashboard.html");
} else {
    echo "alert('Login gagal!');";
    header("location: index.html");
}


?>