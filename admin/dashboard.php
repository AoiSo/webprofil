<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<nav>
        <div class="container">
            <ul class="nav-links">
                <li>
                    <a href="list_admin.php">Daftar Admin</a><br>
                </li>
                <li>
                    <a href="add_admin.php">Tambah Admin</a><br>
                </li>
                <li>
                    <a href="list_blog.php">Daftar Blog</a><br>
                </li>
                <li>
                    <a href="add_blog.php">Tambah Blog</a><br>
                </li>
                <li>
                    <a href="inbox.php">Inbox</a><br>
                </li>
                <li>
                    <a href="logout.php">Logout</a><br>
                </li>
            </ul>
        </div>
    </nav>
    <!--section 2 deskripsi dan foto profil-->
    <section id="profile">
        <div class="container">
            <img src="../a/an.jpeg" alt="profil" class="profile-photo">
        </div>
    </section>
</body>
</html>
