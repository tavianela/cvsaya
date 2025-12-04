<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seputar olahan ayam</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Basic styling for recipe cards */
        .recipe-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .recipe-card h3 {
            color: #333;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .recipe-image {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .read-more-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .read-more-btn:hover {
            background-color: #0056b3;
        }
        .recipe-details {
            margin-top: 15px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
        .recipe-details.hidden {
            display: none;
        }
        .recipe-details p {
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .recipe-details strong {
            color: #555;
        }
    </style>
</head>
<body onload="checkUserRole()">
    <div class="container">
        <nav>
            <a href="cv.php">Profil</a>
            <a href="artikel.php" class="active">artikel saya</a>
            <a href="skills.php">Skills</a>
            <a href="admin.php" id="admin-link">Admin</a>
        </nav>
        <main class="content">
            <h1 style="text-align: center;">seputar olahan ayam</h1>
            <?php
            $sql = "SELECT id, title, image_path, content, source FROM articles";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<article class="recipe-card">';
                    echo '<h3>' . $row["title"] . '</h3>';
                    echo '<div class="recipe-image-container">';
                    echo '<img src="' . $row["image_path"] . '" alt="' . $row["title"] . '" class="recipe-image">';
                    echo '<button class="read-more-btn">selengkapnya baca disini</button>';
                    echo '</div>';
                    echo '<div class="recipe-details hidden">';
                    // Split content into paragraphs based on "Manfaat:", "Bahan:", "Cara Membuat:", "Cara Menyimpan:", "Deskripsi:"
                    $content_parts = preg_split('/(Manfaat:|Bahan:|Cara Membuat:|Cara Menyimpan:|Deskripsi:|Sumber:)/u', $row["content"], -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
                    $formatted_content = '';
                    foreach ($content_parts as $part) {
                        if (str_starts_with($part, 'Manfaat:') || str_starts_with($part, 'Bahan:') || str_starts_with($part, 'Cara Membuat:') || str_starts_with($part, 'Cara Menyimpan:') || str_starts_with($part, 'Deskripsi:') || str_starts_with($part, 'Sumber:')) {
                            $formatted_content .= '<p><strong>' . $part . '</strong>';
                        } else {
                            $formatted_content .= $part . '</p>';
                        }
                    }
                    echo $formatted_content;
                    echo '</div>';
                    echo '</article>';
                }
            } else {
                echo "<p>No articles found.</p>";
            }
            $conn->close();
            ?>
        </main>
    </div>

    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreButtons = document.querySelectorAll('.read-more-btn');

            readMoreButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const details = this.parentElement.nextElementSibling; // The div.recipe-details is the next sibling
                    if (details.classList.contains('hidden')) {
                        details.classList.remove('hidden');
                        this.textContent = 'Sembunyikan';
                    } else {
                        details.classList.add('hidden');
                        this.textContent = 'selengkapnya baca disini';
                    }
                });
            });
        });
    </script>
</body>
</html>