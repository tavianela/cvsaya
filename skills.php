<?php
include 'koneksi.php';

$sql = "SELECT * FROM skills";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills saya</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .skill-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .skill-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        .skill-item img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .skill-item h3 {
            color: #333;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Skills saya</h1>
        </header>
        <nav>
            <a href="artikel.php">Artikel</a>
            <a href="cv.php">CV</a>
            <a href="skills.php" class="active">Skills</a>
            <a href="admin.php">Admin</a>
        </nav>

        <main class="content">
            <section class="skills">
                <div class="skill-list">
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT * FROM skills";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='skill-item'>";
                            if (!empty($row['image_path'])) {
                                echo "<img src='" . $row['image_path'] . "' alt='" . $row['skill_name'] . "'>";
                            }
                            echo "<h3>" . $row['skill_name'] . "</h3>";
                            echo "<p>" . $row['description'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No skills found.</p>";
                    }
                    ?>
                </div>
            </section>
        </main>

        <footer>
            <p>&copy; 2025 Nela</p>
        </footer>
    </div>
</body>
</html>
