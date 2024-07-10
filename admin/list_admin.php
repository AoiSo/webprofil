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
<html>
<head>
    <title>Daftar Admin</title>
</head>
<body>
    <h2>Daftar Admin</h2>
    <button>

<a href="add_admin.php">Tambah Admin</a>
</button>
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
            <td>
                <a href="edit_admin.php?id=<?php echo $admin['id']; ?>">Edit</a> | 
                <a href="delete_admin.php?id=<?php echo $admin['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus admin ini?');"> Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <button>
        <a href="dashboard.php">Kembali ke Dashboard</a>
        </button>

        </body>
</html>
