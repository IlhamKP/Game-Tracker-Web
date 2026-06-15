<?php
include 'koneksi.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

if (mysqli_num_rows($query) > 0){
    $user = mysqli_fetch_assoc($query);

        if($password == $user['password']){
        $_SESSION['id_users'] = $user['id_users'];
        // echo "Login berhasil";
        header("location: dashboard.html");
        } else {
        header("Location: index.php?error=password");
        }

} else {
    header("Location: index.php?error=username");
}

?>