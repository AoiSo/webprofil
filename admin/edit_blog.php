<?php
include '../config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM blog WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $target = "uploads/".basename($thumbnail);

    if ($thumbnail) {
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);
        $sql = "UPDATE blog SET title='$title', content='$content', thumbnail='$thumbnail' WHERE id=$id";
    } else {
        $sql = "UPDATE blog SET title='$title', content='$content' WHERE id=$id";
    }

    mysqli_query($conn, $sql);
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            height: 200px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Edit Blog</h2>
    <form method="post" action="edit_blog.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        Judul: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
        Konten: <textarea name="content"><?php echo $row['content']; ?></textarea><br>
        Thumbnail: <input type="file" name="thumbnail"><br>
        <button type="submit">Update Artikel</button>
    </form>
</body>
</html>
