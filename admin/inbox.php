<?php
include('../config.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

$query = "SELECT * FROM kontak";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
</head>

<body>
  <h1>Tambah Inbox</h1>
  <table border="1">
        <tr>
          <th>ID</th>
          <th>Timestamp</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Pesan</th>
          <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['idpesan']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['massage']; ?></td>
            <td>
              <a href="del_inbox.php?id=<?php echo $row['idpesan']; ?>">Hapus</a>
            </td>
          </tr>
        <?php } ?>
  </table>
  <br>
<button>
  <a href="dashboard.php">Kembali ke Dashboard</a>
</button>   
</body>
</html>
