<?php
include 'koneksi.php';
session_start();

$id_library = $_GET['id_library'];

mysqli_query($conn, "DELETE FROM library WHERE id_library = '$id_library'");

header("Location: library.php");
exit;
?>