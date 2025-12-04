<?php
include 'koneksi.php';
$personal_info_result = $conn->query("SELECT * FROM personal_info WHERE id=1");
$personal_info = $personal_info_result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $personal_info['full_name']; ?> - CV</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body onload="checkUserRole()">

    <div class="container">
        <header>
            <img src="<?php echo $personal_info['profile_image_path']; ?>" alt="Foto Profil" class="profile-img">
            <h1><?php echo $personal_info['full_name']; ?></h1>
        </header>
        <nav>
            <a href="cv.php" class="active">Profil</a>
            <a href="artikel.php">artikel saya</a>
            <a href="skills.php">Skills</a>
            <a href="admin.php" id="admin-link">Admin</a>
        </nav>
        <main class="content">
            <section id="profil">
                <h2>Informasi Pribadi</h2>
                <p><strong>Tempat Tanggal Lahir:</strong> <?php echo $personal_info['birth_info']; ?></p>
                
                <h2>Riwayat Pendidikan</h2>
                <ul>
                    <li>TK PGRI 1 Kalipelus</li>
                    <li>SD N 1 Kalipelus</li>
                    <li>SMP N 1 Purwanegara</li>
                    <li>SMK N 1 Bawang</li>
                </ul>

                <h2>Pengalaman</h2>
                <ul>
                    <li><strong>TK:</strong> Mengikuti lomba menyanyi</li>
                    <li><strong>SD:</strong> Mengikuti Kemah</li>
                    <li><strong>SMP:</strong> Menjadi Penggalang Garuda dan mengikuti tari dawet ayu di kabupaten Banjarnegara</li>
                    <li><strong>SMK:</strong> Mengikuti OSIS</li>
                </ul>

                <h2>Hobi</h2>
                <p><?php echo $personal_info['hobbies']; ?></p>

                <h2>Cita-cita</h2>
                <p><?php echo $personal_info['aspirations']; ?></p>
            </section>
            <section id="kontak">
                <h2>Kontak</h2>
                <p><strong>Email:</strong> oktavianela84@email.com</p>
                <p><strong>Telepon:</strong> +62 882-0059-68007</p>
                <p><strong>Instagram:</strong> <a href="https://www.instagram.com/nltaviaa" target="_blank">@nltaviaa</a></p>
                <p><strong>Tiktok:</strong> <a href="https://www.tiktok.com/@nlataviaa" target="_blank">@nlataviaa</a></p>
            </section>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>