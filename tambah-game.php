<?php
include 'koneksi.php';

session_start();
$id = $_SESSION['id_users'];
$judul = $_POST['judul_tg'];
$genre = $_POST['genre_tg'];
$platform = $_POST['pl_tg'];
$status = $_POST['st_tg'];
$rating = $_POST['rating_tg'];
$cover = $_FILES['cover_tg']['name'];
$tmp = $_FILES['cover_tg']['tmp_name'];

move_uploaded_file($tmp, "gambar-game/" . $cover);

$query = "INSERT INTO library (id_users,cover_game,judul,genre,platform,status,rating) VALUES
          ('$id','$cover','$judul','$genre','$platform','$status','$rating')";

    if(mysqli_query($conn, $query)){
    header("Location: library.php");
    exit;
    }else{
    echo mysqli_error($conn);
    }
    ?>