<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

$query = "SELECT * FROM admin";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Admin</title>
    <style>
        body {
    background-color: #f4f4f4;
    margin: 20px;
    padding: 0;
}

.container {
    max-width: 1000px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

button a, .back-link, .add-link {
    text-decoration: none;
    color: white;
    background-color: #4CAF50;
    padding: 10px 20px;
    border-radius: 4px;
    display: inline-block;
    font-size: 16px;
    border: none;
}

button a:hover, .back-link:hover, .add-link:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

.action-links a {
    margin-right: 10px;
    color: #4CAF50;
    text-decoration: none;
}

.action-links a:hover {
    text-decoration: underline;
}

button {
    border: none;
    background: none;
    padding: 0;
    margin: 0;
}

button a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 4px;
}

button a:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Admin</h2>
    <button><a href="add_admin.php" class="add-link">Tambah Admin</a></button>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Nama Lengkap</th>
            <th>Aksi</th>
        </tr>
        <?php while ($admin = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $admin['id']; ?></td>
            <td><?php echo $admin['username']; ?></td>
            <td><?php echo $admin['email']; ?></td>
            <td><?php echo $admin['nama_lengkap']; ?></td>
            <td class="action-links">
                <a href="edit_admin.php?id=<?php echo $admin['id']; ?>">Edit |</a>
                <a href="delete_admin.php?id=<?php echo $admin['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus admin ini?');">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <button><a href="dashboard.php" class="back-link">Kembali ke Dashboard</a></button>
</div>
</body>
</html>
