<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

$admin_id = $_GET['id'];
$query = "DELETE FROM admin WHERE id='$admin_id'";
mysqli_query($conn, $query);

header('Location: list_admin.php');
exit;
?>
