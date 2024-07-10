<?php
include '../config.php';

$sql = "SELECT * FROM blog";
$result = mysqli_query($conn, $sql);
?>
<button>
  <a href="add_blog.php">Tambah Artikel</a>
</button>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Thumbnail</th>
        <th>Konten</th>
        <th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><img src="../uploads/<?php echo $row['thumbnail']; ?>" width="100"></td>
        <td><?php echo substr($row['content'], 0, 100); ?></td>
        <td>
            <a href="edit_blog.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="del_blog.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br>
<button>
  <a href="dashboard.php">Kembali ke Dashboard</a>
</button>
