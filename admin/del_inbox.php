<?php
include('../config.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

$id = $_GET['id'];
$query = "DELETE FROM kontak WHERE idpesan='$id'";
mysqli_query($conn, $query);
header('Location: dashboard.php');
?>
