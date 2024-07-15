<?php
include '../config.php';

$id = $_GET['id'];
$sql = "DELETE FROM blog WHERE id=$id";
mysqli_query($conn, $sql);

header('Location: dashboard.php');
?>
