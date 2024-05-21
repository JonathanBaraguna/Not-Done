<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        /* CSS styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em 0;
            text-align: center;
        }

        main {
            margin: 20px;
        }

        .blog-post {
            margin-bottom: 40px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Blog</h1>
    </header>
    <main>
        <?php
        // Include file koneksi ke database
        include 'db.php';

        // Query untuk mengambil artikel dari database
        $sql = "SELECT title, content FROM articles";
        $result = $conn->query($sql);

        // Menampilkan artikel
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<article class="blog-post">';
                echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
                echo '<p>' . nl2br(htmlspecialchars($row["content"])) . '</p>';
                echo '</article>';
            }
        } else {
            echo "<p>No articles found</p>";
        }

        // Menutup koneksi database
        $conn->close();
        ?>
    </main>
</body>
</html>