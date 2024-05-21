<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'blog_db');

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];

// Query untuk menyimpan data artikel ke database
$sql = "INSERT INTO articles (title, content, author) VALUES ('$title', '$content', '$author')";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Artikel berhasil ditambahkan. <a href='view_articles.php'>Lihat Artikel</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>