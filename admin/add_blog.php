<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $target = "../uploads/".basename($thumbnail); // Pastikan jalur target benar

    // Periksa apakah folder uploads ada dan bisa ditulisi
    if (!file_exists('../uploads')) {
        mkdir('../uploads', 0755, true);
    }

    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target)) {
        $sql = "INSERT INTO blog (title, content, thumbnail) VALUES ('$title', '$content', '$thumbnail')";
        if (mysqli_query($conn, $sql)) {
            header('Location: list_blog.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Blog</title>
    <button>
  <a href="dashboard.php">Kembali ke Dashboard</a>
</button>
    <script src="../assets/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea',  
        license_key: 'gpl'
      });
    </script>
</head>
<body>
<table border="1">
  <form method="post" action="add_blog.php" enctype="multipart/form-data">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Thumbnail</th>
    </tr>
    <tr>
        <td>Judul: <input type="text" name="title"><br></td>
        <td>Konten: <textarea name="content"></textarea><br></td> 
        <td>Thumbnail: <input type="file" name="thumbnail"><br></td>       
    </tr>
</table>
    <button type="submit">Tambah Artikel</button>
</form>
</body>
</html>
