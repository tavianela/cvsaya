-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 11:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_website_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'nlatavia', '$2y$10$YCLkFQXdm9ibglDklSDS0ullhHMuX8qtU99PiuZuPZg8oY9MMY9K.'),
(3, 'NelaAdmin', '$2y$10$FSQ9eDedOfkknjHn6HKF6eCUbKG9D4gHUvOpubRUxXhixNsQak4oy');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image_path`, `content`, `source`) VALUES
(1, 'Ayam Baput', 'ayamayam/ayambaput.jpg', 'Manfaat: Bawang putih memiliki banyak manfaat untuk kesehatan, termasuk meningkatkan sistem kekebalan tubuh dan menjaga kesehatan jantung. Deskripsi: Ayam Goreng Baput adalah hidangan ayam goreng yang renyah dan gurih dengan aroma bawang putih yang kuat.', '\"resep ayam baput\" - Google Search'),
(2, 'Ayam Bakar', 'ayamayam/ayambakar.JPG', 'Manfaat: Olahan ayam bakar memberi protein dari daging ayam serta rempah-rempah yang dapat meningkatkan cita rasa tanpa menambah lemak dari saus berlebihan. Karena dipanggang, lemaknya bisa lebih terkendali dibanding menggoreng dalam minyak banyak. Bahan: ?? 800 g ayam (1 ekor potong-potong) Frisian Flag +3 bango +3 detikfood +3 10 butir bawang merah, 5 siung bawang putih, 1 sdm ketumbar disangrai, 5 buah kemiri, ?? sdt merica bubuk, 3 cm kunyit (bumbu halus) bango +2 detikfood +2 4 lembar daun salam, 2 batang serai (geprek), 20 g asam jawa larutkan, 500 ml santan (opsional) bango +1 2 sdm minyak untuk menumis bango +1 Kecap manis untuk olesan saat dipanggang detikfood +1 Cara Membuat: Cuci ayam hingga bersih. detikfood +1 Tumis bumbu halus bersama daun salam dan serai hingga harum. bango +1 Masukkan ayam, larutan asam jawa, santan jika digunakan, dan masak hingga ayam empuk dan bumbu meresap. bango Angkat ayam, lalu panggang atau bakar sambil dioles kecap manis hingga bagian luar berwarna kecokelatan dan aroma bakar muncul. detikfood +1 Sajikan hangat dengan sambal atau lalapan sesuai selera. Cara Menyimpan: Jika sisa, biarkan ayam benar-benar dingin, lalu simpan dalam wadah kedap udara di kulkas. Sebaiknya dikonsumsi dalam waktu maksimal 1-2 hari di kulkas agar rasa dan tekstur masih bagus. Untuk penyimpanan lebih lama, bisa dipisah bagian ayam dan bumbunya, kemudian dibekukan (freezer) hingga ?? 1 bulan. Saat akan disajikan, thaw (cairkan) di kulkas semalaman lalu dipanaskan ulang dengan olesan kecap agar tekstur tetap bagus.', 'Resep ???Ayam Bakar Gurih Nikmat??? di Kecap Bango.'),
(3, 'Ayam Rica-Rica', 'ayamayam/ricaayam.jpg', 'Manfaat: Menu ayam rica-rica hadir dengan bumbu pedas dan rempah yang kuat seperti cabai, serai, daun jeruk ??? ini selain menambah rasa juga bisa meningkatkan metabolisme. Daging ayam sebagai sumber protein tetap menjadi unggulan. Cocok untuk yang suka rasa pedas. Bahan: 1 ekor ayam (potong 8-10 bagian) detikfood +1 2 cm jahe memarkan, 2 batang serai memarkan, 4 lembar daun jeruk purut. detikfood Bumbu halus: 5 siung bawang putih, 5 butir bawang merah, 20 cabai rawit merah, 8 cabai merah besar, garam dan gula pasir. detikfood +1 Daun kemangi untuk taburan. fimela.com Cara Membuat: Cuci bersih ayam, beri perasan jeruk nipis dan sedikit garam, diamkan sekitar 10 menit. fimela.com Haluskan bawang putih, bawang merah, cabai merah dan rawit, tumis hingga harum bersama serai, jahe, daun jeruk. detikfood +1 Masukkan ayam, aduk hingga berubah warna. Tambahkan air secukupnya, garam, gula, dan kaldu bubuk jika digunakan. Masak hingga bumbu meresap dan kuah sedikit menyusut atau sesuai selera. fimela.com Setelah matang, tambahkan daun kemangi, aduk sebentar, lalu angkat dan sajikan hangat. Cara Menyimpan: Setelah matang dan dingin, simpan dalam wadah kedap udara di kulkas, maksimal 1 hari agar sambal tetap fresh dan ayam tidak lembek. Untuk menyajikan ulang, panaskan dengan sedikit tambahan air jika kuah sudah menyusut terlalu banyak agar daging tidak terlalu kering. Hindari menyimpan lebih dari 3 hari supaya rasa dan aroma pedasnya tetap optimal.', 'Resep ???Ayam rica-rica ala Manado??? dari Detikfood.'),
(4, 'Ayam Woku', 'ayamayam/ayamwoku.jpg', 'Manfaat: Masakan khas Manado ini kaya akan rempah seperti serai, daun jeruk, kemangi, cabai ??? sehingga selain protein dari ayam, juga ada kandungan antioksidan dan aroma segar dari daun kemangi dan jeruk. Cocok untuk yang suka cita rasa kuat dan aroma harum. Bahan: 1 ekor ayam (atau ??? 750 g), potong-potong. lestariweb.com +1 2 batang serai memarkan, 1 lembar daun pandan (opsional), 7 lembar daun jeruk purut. lestariweb.com Bumbu halus: bawang merah, bawang putih, kemiri, cabe merah keriting, cabe rawit merah, jahe, kunyit. Cookpad +1 Garam, gula pasir, daun kemangi sebagai taburan. Liputan6 Cara Membuat: Cuci ayam bersih, beri perasan jeruk nipis dan sedikit garam. Liputan6 Tumis bumbu halus bersama serai dan daun jeruk hingga harum. Liputan6 Masukkan ayam, aduk rata dengan bumbu. Tambahkan air secukupnya, garam, gula, dan masak hingga ayam empuk dan bumbu meresap. Liputan6 Menjelang akhir, masukkan daun kemangi dan aduk sebentar hingga layu. Angkat, sajikan hangat. Cara Menyimpan: Dinginkan dahulu, simpan dalam wadah kedap di kulkas untuk maksimal 2 hari. Saat memanaskan kembali, gunakan api kecil dan sedikit air supaya bumbu tetap lembut dan ayam tidak terlalu kering. Untuk penyimpanan lebih lama, bisa beku di freezer hingga ?? 1 bulan, lalu thaw di kulkas semalaman sebelum dipanaskan.', 'Resep ???Ayam Woku Pedas??? di Liputan6.'),
(5, 'Ayam Penyet', 'ayamayam/ayampenyet2.jpg', 'Manfaat: Ayam penyet adalah ayam goreng yang kemudian ???ditekan??? bersama sambal pedas ??? memberikan kombinasi protein dari ayam dan vitamin dari sambal (termasuk kapsaisin dari cabai). Bisa jadi pilihan lauk pedas yang menggugah selera. Bahan: 500 g ayam, potong sesuai selera. sasa.co.id 1 sdt garam, ?? sdt kunyit bubuk, 3 siung bawang putih halus, 1 sdm air jeruk nipis. sasa.co.id Untuk sambal ijo: 15 buah cabe hijau besar, 10 cabe rawit hijau, 3 siung bawang putih, 5 siung bawang merah, 1 buah tomat hijau, ?? sdt garam, ?? sdt gula pasir. sasa.co.id Cara Membuat: Lumuri ayam dengan garam, kunyit bubuk, bawang putih halus, dan air jeruk nipis. Diamkan ??30 menit agar bumbu meresap. sasa.co.id Goreng ayam hingga matang dan berwarna kecokelatan. Tiriskan. sasa.co.id Untuk sambal: goreng cabe hijau besar, cabe rawit, bawang merah, bawang putih dan tomat hijau hingga layu; kemudian tumbuk sampai halus, beri garam dan gula pasir, aduk rata. ResepKoki Sajikan ayam goreng di atas sambal, tekan atau ???penyet??? ayam ke sambal agar meresap. Tambahkan lalapan (timun, kol, kemangi) sesuai selera. sasa.co.id Cara Menyimpan: Simpan ayam goreng dan sambal secara terpisah dalam wadah kedap udara di kulkas, maksimal 1 hari agar sambal tetap fresh dan ayam tidak lembek. Saat ingin menyajikan kembali, panaskan ayam di oven atau teflon sebentar agar kulitnya tetap agak garing, lalu letakkan di atas sambal yang sudah dipanaskan sebentar. Tidak dianjurkan menyimpan sambal lebih dari 2 hari karena rasa dan aroma pedasnya bisa berubah.', 'Resep ???Ayam Penyet Sederhana dan Enak??? di Sasa.'),
(6, 'Cireng Ayam Suwir', 'ayamayam/cirengayam.jpeg', 'Manfaat: Walau lebih sebagai camilan, cireng isi ayam suwir memberikan kombinasi karbohidrat (dari tepung tapioka/terigu) dan protein dari ayam suwir. Jika dibuat dengan sedikit minyak dan porsi wajar, bisa menjadi snack relatif ringan dan bergizi. Bahan: Kulit cireng: 250-280 g tepung tapioka, 50 g tepung terigu, 1 sdt garam, 1 sdt kaldu bubuk, 1 sdt bawang putih bubuk. sasa.co.id +1 Isian ayam suwir: ??250 g dada ayam fillet rebus dan suwir, 3 siung bawang putih, 5 siung bawang merah, 5 buah cabe merah keriting, 5 buah cabe rawit, sereh, daun jeruk. Cookpad +1 Cara Membuat: Rebus atau kukus ayam hingga matang, kemudian suwir-suwir. Tumis bawang merah, bawang putih, cabe, sereh, daun jeruk hingga harum dan masukkan ayam suwir, aduk hingga bumbu meresap. Cookpad +1 Untuk kulit cireng: campur tepung tapioka, terigu, garam, kaldu bubuk dan bawang putih bubuk. Tuang air panas sedikit demi sedikit sambil uleni hingga kalis. sasa.co.id Ambil sejumput adonan kulit, pipihkan, beri isian ayam suwir di tengah, tutup-rapat dan bentuk bulat pipih. Panaskan minyak, goreng cireng hingga kulit matang dan agak keemasan. Angkat dan tiriskan. Sajikan hangat sebagai camilan. Cara Menyimpan: Jika ada sisa, biarkan dingin, kemudian simpan dalam wadah tertutup di kulkas, maksimal 1 hari agar kulit cireng tetap kenyal dan tidak lembek. Untuk menyajikan ulang, panaskan melalui teflon tanpa minyak atau sedikit semprot minyak agar kulit tetap agak krenyes. Untuk lebih lama, kulit dan isian bisa dipisah, lalu kulit disimpan di freezer (belum digoreng) hingga ??1 bulan, kemudian goreng saat akan disajikan.', 'Resep ???Cireng isi Ayam Suwir??? di Sasa.'),
(7, 'Sup Ayam', 'ayamayam/soupayam.jpg', 'Manfaat: Sup ayam merupakan menu ringan dan hangat yang mengandung protein dari ayam, serta sayuran seperti wortel, kentang, buncis yang memberikan serat dan vitamin. Cocok sebagai menu pemulihan atau untuk cuaca dingin. Bahan: 250 g ayam fillet atau bagian sayap/ayam kampung. Cookpad +1 5 siung bawang merah, 3 siung bawang putih, wortel, buncis, kentang, jagung manis, seledri, daun bawang. Frisian Flag Air ??250-300 ml untuk porsi kecil, garam, merica sesuai selera. Frisian Flag +1 Cara Membuat: Panaskan sedikit minyak, tumis bawang merah dan bawang putih hingga harum. Frisian Flag Masukkan ayam, aduk hingga sedikit berubah warna. ??? Tuangkan air, masukkan wortel, kentang, buncis, jagung, garam, merica, kaldu bubuk jika digunakan. Masak sampai sayuran empuk. detikfood Tambahkan daun bawang dan seledri (ikat) menjelang akhir, lalu angkat dan sajikan hangat. Cara Menyimpan: Setelah agak dingin, simpan dalam wadah tertutup di kulkas, bisa tahan sekitar 1-2 hari. Saat akan disajikan ulang, panaskan dengan api sedang, tambahkan sedikit air jika kuah sudah mengental agar tidak terlalu pekat. Hindari menyimpan lebih dari 2 hari agar sayuran tidak menjadi lembek dan kuah tetap segar.', 'Resep ???Sop Ayam Benng??? di Frisian Flag.'),
(8, 'Opor Ayam', 'ayamayam/oporayam.jpg', 'Manfaat: Opor ayam adalah olahan ayam yang dimasak dalam santan bersama rempah-rempah ??? memberikan rasa gurih dan aroma harum. Santan memberikan lemak sehat bila tidak berlebihan, serta rempah-rempah menambah profil nutrisi. Cocok untuk hidangan istimewa. Bahan: 1 ekor ayam (potong), 1?? liter santan dari 1 kelapa (atau santan instan) detikcom +1 2 batang serai geprek, 4 lembar daun jeruk, 2 lembar daun salam, 2 cm lengkuas geprek. detikcom Bumbu halus: 10 butir bawang merah, 4 siung bawang putih, ?? sdt merica bulat, 1?? sdt ketumbar, 4 butir kemiri, 2 cm kunyit. detikcom Garam, gula, kaldu bubuk (opsional). detikcom Cara Membuat: Tumis bawang merah, bawang putih hingga harum bersama serai, daun jeruk, daun salam, lengkuas. detikcom Masukkan ayam, aduk hingga berubah warna. detikcom Tuang santan encer, masak dengan api kecil hingga ayam empuk dan santan menyusut. detikcom Jika menggunakan santan kental, masukkan di akhir dan masak sebentar agar santan tidak pecah. detikcom +1 Angkat dan sajikan hangat, biasanya bersama ketupat atau nasi hangat. Wikipedia Cara Menyimpan: Setelah dingin, simpan opor dalam wadah kedap udara di kulkas, bisa tahan hingga 2-3 hari. Karena menggunakan santan, ketika memanaskan ulang, gunakan api kecil agar santan tidak pecah dan aduk perlahan. Jika akan menyimpan lebih lama, beku dalam freezer hingga ?? 1 bulan. Saat thawing, panaskan perlahan dan aduk agar tekstur tetap halus.', 'Resep ???10 Resep Opor Ayam Lebaran??? di Detik.');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `birth_info` varchar(255) DEFAULT NULL,
  `hobbies` text DEFAULT NULL,
  `aspirations` varchar(255) DEFAULT NULL,
  `profile_image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `full_name`, `birth_info`, `hobbies`, `aspirations`, `profile_image_path`) VALUES
(1, 'NELA OKTAVIA', 'Banjarnegara, 7 Oktober 2008', 'Menari, Berolahraga, Bernyanyi, Memasak.', 'banyak', 'fotoku.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `description`, `image_path`) VALUES
(2, 'Web Design', 'Belum ada file', ''),
(4, 'html', 'Belum ada file', ''),
(5, 'figma', 'Belum ada file', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
