<?php
session_start();

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Nela Oktavia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body onload="checkUserRole();">
<?php
include 'koneksi.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle personal info update
    if (isset($_POST['update_personal_info'])) {
        $full_name = $_POST['full_name'];
        $birth_info = $_POST['birth_info'];
        $hobbies = $_POST['hobbies'];
        $aspirations = $_POST['aspirations'];
        $profile_image_path = $personal_info['profile_image_path']; // Ambil path yang sudah ada dari database

        // Tangani unggahan gambar profil baru
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            $target_dir = ""; // Simpan di root folder
            $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                $profile_image_path = $target_file;
            }
        }

        $sql = "UPDATE personal_info SET full_name='$full_name', birth_info='$birth_info', hobbies='$hobbies', aspirations='$aspirations', profile_image_path='$profile_image_path' WHERE id=1";
        $conn->query($sql);
    }

    // Handle skills
    if (isset($_POST['add_skill'])) {
        $skill_name = $_POST['skill_name'];
        $description = $_POST['description'];
        $image_path = '';

        if (isset($_FILES['skill_image']) && $_FILES['skill_image']['error'] == 0) {
            $target_dir = "ayamayam/";
            $target_file = $target_dir . basename($_FILES["skill_image"]["name"]);
            if (move_uploaded_file($_FILES["skill_image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            }
        }

        $sql = "INSERT INTO skills (skill_name, description, image_path) VALUES ('$skill_name', '$description', '$image_path')";
        $conn->query($sql);
    } elseif (isset($_POST['update_skill'])) {
        $id = $_POST['id'];
        $skill_name = $_POST['skill_name'];
        $description = $_POST['description'];
        $image_path = $_POST['existing_image_path'];

        if (isset($_FILES['skill_image']) && $_FILES['skill_image']['error'] == 0) {
            $target_dir = "ayamayam/";
            $target_file = $target_dir . basename($_FILES["skill_image"]["name"]);
            if (move_uploaded_file($_FILES["skill_image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            }
        }

        $sql = "UPDATE skills SET skill_name='$skill_name', description='$description', image_path='$image_path' WHERE id=$id";
        $conn->query($sql);
    } elseif (isset($_POST['delete_skill'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM skills WHERE id=$id";
        $conn->query($sql);
    }

    // Handle articles
    if (isset($_POST['add_article'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image_path = '';

        if (isset($_FILES['article_image']) && $_FILES['article_image']['error'] == 0) {
            $target_dir = "ayamayam/";
            $target_file = $target_dir . basename($_FILES["article_image"]["name"]);
            if (move_uploaded_file($_FILES["article_image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            }
        }

        $sql = "INSERT INTO articles (title, content, image_path) VALUES ('$title', '$content', '$image_path')";
        $conn->query($sql);
    } elseif (isset($_POST['update_article'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image_path = $_POST['existing_image_path'];

        if (isset($_FILES['article_image']) && $_FILES['article_image']['error'] == 0) {
            $target_dir = "ayamayam/";
            $target_file = $target_dir . basename($_FILES["article_image"]["name"]);
            if (move_uploaded_file($_FILES["article_image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            }
        }

        $sql = "UPDATE articles SET title='$title', content='$content', image_path='$image_path' WHERE id=$id";
        $conn->query($sql);
    } elseif (isset($_POST['delete_article'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM articles WHERE id=$id";
        $conn->query($sql);
    }
}

$personal_info_result = $conn->query("SELECT * FROM personal_info WHERE id=1");
$personal_info = $personal_info_result->fetch_assoc();
$skills_result = $conn->query("SELECT * FROM skills");
$articles_result = $conn->query("SELECT * FROM articles");
?>
    <div class="container">
        <header>
            <h1>admin</h1>
        </header>
        <nav>
            <a href="cv.php">Lihat CV</a>
            <a href="artikel.php">Lihat Artikel</a>
            <a href="skills.php">Lihat Skills</a>
            <a href="admin.php" class="active" id="admin-link">Admin</a>
            <a href="admin.php?logout=true">Logout</a>
        </nav>
        <main class="content">
            <div class="admin-grid">
                <div class="admin-card" id="edit-profil">
                    <h2>Edit Informasi Pribadi</h2>
                    <form action="admin.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name" value="<?php echo $personal_info['full_name']; ?>">
                        </div>
                        <div class="input-group">
                            <label for="birth_info">Tempat Tanggal Lahir</label>
                            <input type="text" id="birth_info" name="birth_info" value="<?php echo $personal_info['birth_info']; ?>">
                        </div>
                        <div class="input-group">
                            <label for="hobbies">Hobi</label>
                            <textarea id="hobbies" name="hobbies"><?php echo $personal_info['hobbies']; ?></textarea>
                        </div>
                        <div class="input-group">
                            <label for="aspirations">Cita-cita</label>
                            <input type="text" id="aspirations" name="aspirations" value="<?php echo $personal_info['aspirations']; ?>">
                        </div>
                        <div class="input-group">
                            <label for="profile_image">Foto Profil</label>
                            <input type="file" id="profile_image" name="profile_image">
                            <?php if (!empty($personal_info['profile_image_path'])): ?>
                                <br><img src="<?php echo $personal_info['profile_image_path']; ?>" width="100" style="margin-top: 10px;">
                                <input type="hidden" name="existing_profile_image_path" value="<?php echo $personal_info['profile_image_path']; ?>">
                            <?php endif; ?>
                        </div>
                        <button type="submit" name="update_personal_info" class="btn">Simpan Perubahan</button>
                    </form>
                </div>

                <div class="admin-card" id="edit-artikel">
                    <h2>Tambah Artikel Baru</h2>
                    <form action="admin.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="add_article" value="1">
                        <div class="input-group">
                            <label for="title">Judul Artikel</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="input-group">
                            <label for="content">Isi Artikel</label>
                            <textarea id="content" name="content"></textarea>
                        </div>
                        <div class="input-group">
                            <label for="article_image">Gambar Artikel</label>
                            <input type="file" id="article_image" name="article_image">
                        </div>
                        <button type="submit" class="btn">Tambah Artikel</button>
                    </form>
                </div>

                <div class="admin-card" id="edit-skills">
                    <h2>Tambah Skill Baru</h2>
                    <form action="admin.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="add_skill" value="1">
                        <div class="input-group">
                            <label for="skill_name">Nama Skill</label>
                            <input type="text" id="skill_name" name="skill_name" required>
                        </div>
                        <div class="input-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" name="description"></textarea>
                        </div>
                        <div class="input-group">
                            <label for="skill_image">Gambar Skill</label>
                            <input type="file" id="skill_image" name="skill_image">
                        </div>
                        <button type="submit" class="btn">Tambah Skill</button>
                    </form>
                </div>
            </div>

            <div class="admin-card" id="daftar-artikel">
                <h2>Daftar Artikel</h2>
                <div class="article-list-admin">
                    <?php
                    if ($articles_result->num_rows > 0) {
                        while($row = $articles_result->fetch_assoc()) {
                            echo "<div class='article-item-admin'>";
                            echo "<form action='admin.php' method='post' enctype='multipart/form-data'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<input type='hidden' name='existing_image_path' value='" . $row['image_path'] . "'>";
                            echo "<div class='input-group'><label>Judul</label><input type='text' name='title' value='" . $row['title'] . "'></div>";
                            echo "<div class='input-group'><label>Konten</label><textarea name='content'>" . $row['content'] . "</textarea></div>";
                            if (!empty($row['image_path'])) {
                                echo "<div class='input-group'><label>Gambar</label><input type='file' name='article_image'><br><img src='" . $row['image_path'] . "' width='100'></div>";
                            } else {
                                echo "<div class='input-group'><label>Gambar</label><input type='file' name='article_image'></div>";
                            }
                            echo "<button type='submit' name='update_article' value='1' class='btn'>Update</button>";
                            echo "<button type='submit' name='delete_article' value='1' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</button>";
                            echo "</form>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="admin-card" id="daftar-skills">
                <h2>Daftar Skills</h2>
                <div class="skill-list-admin">
                    <?php
                    if ($skills_result->num_rows > 0) {
                        while($row = $skills_result->fetch_assoc()) {
                            echo "<div class='skill-item-admin'>";
                            echo "<form action='admin.php' method='post' enctype='multipart/form-data'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<input type='hidden' name='existing_image_path' value='" . $row['image_path'] . "'>";
                            echo "<div class='input-group'><label>Nama Skill</label><input type='text' name='skill_name' value='" . $row['skill_name'] . "'></div>";
                            echo "<div class='input-group'><label>Deskripsi</label><textarea name='description'>" . $row['description'] . "</textarea></div>";
                            if (!empty($row['image_path'])) {
                                echo "<div class='input-group'><label>Gambar</label><input type='file' name='skill_image'><br><img src='" . $row['image_path'] . "' width='100'></div>";
                            } else {
                                echo "<div class='input-group'><label>Gambar</label><input type='file' name='skill_image'></div>";
                            }
                            echo "<button type='submit' name='update_skill' value='1' class='btn'>Update</button>";
                            echo "<button type='submit' name='delete_skill' value='1' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</button>";
                            echo "</form>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>
