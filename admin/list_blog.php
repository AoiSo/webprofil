<?php
include '../config.php';

$sql = "SELECT * FROM blog";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Artikel</title>
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

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background-color: #45a049;
        }

        button a {
            text-decoration: none;
            color: white;
            display: inline-block;
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

        td img {
            max-width: 100px;
            height: auto;
        }

        .action-links a {
            margin-right: 10px;
            color: #4CAF50;
            text-decoration: none;
        }

        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Artikel</h2>
    <button><a href="add_blog.php" class="add-link">Tambah Artikel</a></button>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Thumbnail</th>
            <th>Konten</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><img src="../uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail"></td>
            <td><?php echo substr($row['content'], 0, 100); ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td class="action-links">
                <a href="edit_blog.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="del_blog.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <button><a href="dashboard.php" class="back-link">Kembali ke Dashboard</a></button>
</div>
</body>
</html>
