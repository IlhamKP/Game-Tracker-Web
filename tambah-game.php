<?php
include 'koneksi.php';

session_start();
$id = $_SESSION['id'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$platform = $_POST['pl'];
$status = $_POST['st'];
$rating = $_POST['rating'];

$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

move_uploaded_file($tmp, "gambar-game/" . $cover);

$query = "INSERT INTO library
          (id, cover, judul, genre, platform, status, rating)
          VALUES
          ('$id', '$cover', '$judul', '$genre', '$platform', '$status', '$rating')";

if(mysqli_query($conn, $query)){
    header("Location: library.php");
    exit;
}else{
    echo mysqli_error($conn);
}
?>