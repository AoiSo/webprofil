<?php
$servername = "localhost";
$username = "root";
$password = "naufal";
$dbname = "webprofil";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$email = $_POST['email'];
$massage = $_POST['massage'];

$sql = "INSERT INTO kontak (nama, email, massage) VALUES ('$nama', '$email', '$massage')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();
?>
