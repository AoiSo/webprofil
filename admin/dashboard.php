<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

// Retrieve admin data
$query_admin = "SELECT * FROM admin";
$result_admin = mysqli_query($conn, $query_admin);

// Retrieve blog data
$query_blog = "SELECT * FROM blog";
$result_blog = mysqli_query($conn, $query_blog);

// Retrieve contact data
$query = "SELECT * FROM kontak";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="sidebar">
    <!-- Profile section -->
    <section id="profile">
        <div>
            <img src="../a/an.jpeg" alt="profil" class="profile-photo">
        </div>
        <div class="profile-header">
            <h2>Admin Menu</h2>
        </div>
    </section>
    <div class="container">
        <ul class="nav-links">
            <li><a href="add_admin.php">Tambah Admin</a></li>
            <li><a href="add_blog.php">Tambah Blog</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </div>
</div>

<div class="content">
    <!-- Admin list -->
    <section id="admin">
        <div class="list-admin">
            <h2>Daftar Admin</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $counter = 1; 
                while ($admin = mysqli_fetch_assoc($result_admin)): ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
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
        </div>
    </section>

    <!-- Blog list -->
    <section id="blog">
        <div class="admin-blog">
            <h2>Daftar Blog</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Thumbnail</th>
                    <th>Konten</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $counter = 1; 
                while($row = mysqli_fetch_assoc($result_blog)) { ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><img src="../uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" class="thumbnail-image"></td>
                    <td><?php echo substr($row['content'], 0, 100); ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td class="action-links">
                        <a href="edit_blog.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="del_blog.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>

    <!-- Contact messages -->
    <section id="kontak">
        <h1>Inbox Pesan</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Timestamp</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $counter = 1; 
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $counter++; ?></td>
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
    </section>
</div>

</body>
</html>