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
    header('Location: list_blog.php');
}
?>

<script src="../assets/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea'
});
</script>

<form method="post" action="edit_blog.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    Judul: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
    Konten: <textarea name="content"><?php echo $row['content']; ?></textarea><br>
    Thumbnail: <input type="file" name="thumbnail"><br>
    <button type="submit">Update Artikel</button>
</form>
