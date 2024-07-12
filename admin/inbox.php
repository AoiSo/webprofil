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
    <style>
      body {
    background-color: #f4f4f4;
    margin: 20px;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

td a {
    display: inline-block;
    padding: 6px 12px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

td a:hover {
    background-color: #45a049;
}

button {
    margin-top: 20px;
}

button a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

button a:hover {
    background-color: #555;
}

    </style>
</head>

<body>
  <h1>Inbox Pesan</h1>
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