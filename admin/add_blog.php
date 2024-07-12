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
    <style>
body.blog {
    background-color: #f4f4f4;
    margin: 20px;
    padding: 0;
}

.container-blog {
    max-width: 600px;
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

.form-blog {
    margin-bottom: 15px;
}

.form-blog label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-blog input[type="text"],
.form-blog textarea,
.form-blog input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-blog textarea {
    height: 150px;
    resize: vertical;
}

.form-blog input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.form-blog input[type="submit"]:hover {
    background-color: #45a049;
}

.back-blog {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
}

.back-blog:hover {
    background-color: #45a049;
}
    </style>
    <script src="../assets/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea',  
        license_key: 'gpl'
      });
    </script>
</head>
<body class="blog">
<div class="container-blog">
    <div class="form-wrapper">
        <h2>Tambah Blog</h2>
        <form method="post" action="add_blog.php" enctype="multipart/form-data">
            <div class="form-blog">
                <label for="title">Judul:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-blog">
                <label for="content">Konten:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div class="form-blog">
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" id="thumbnail" name="thumbnail" required>
            </div>
            <div class="form-blog">
                <input type="submit" value="Tambah">
            </div>
        </form>
        <a class="back-blog" href="dashboard.php">Kembali ke Dashboard</a>
    </div>
</div>
</body>
</html>
