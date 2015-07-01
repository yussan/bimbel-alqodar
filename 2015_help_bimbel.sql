-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2015 at 10:45 AM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2015_help_bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
`id_album` int(15) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `cover` varchar(150) DEFAULT 'default.png'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `slug`, `judul`, `cover`) VALUES
(3, 'kegiatan-al-qodar', 'Kegiatan AL-Qodar', 'DSCN1796.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(15) NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `id_penulis` int(11) unsigned NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `waktu` datetime NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(256) DEFAULT NULL,
  `isSlider` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_kategori`, `id_penulis`, `judul`, `slug`, `waktu`, `konten`, `gambar`, `isSlider`) VALUES
(11, 4, 1, 'Program Bimbingan SD', 'program-bimbingan-sd', '2015-05-12 20:33:03', '<p style="text-align: justify;">Program Kelas Intensif sudah dibuka. Pendaftaran Mulai tanggal 25 juni 2015.</p>\r\n<p>Program dibuka untuk kelas 4,5,dan 6 SD .Biaya Pendaftaran Rp 30000.</p>\r\n<p><strong>Jadwal Bimbingan</strong> :<strong>untuk kelas 4 : Hari Selasa,Jumat,Sabtu ( 15.00-17.15) untuk kelas 5&nbsp; : Hari Senin,Selasa, Kamis,Jumat (15.00-17.12).&nbsp;untuk kelas 6&nbsp; : Hari Senin,Selasa, Kamis,Jumat (15.00-17.12). </strong>Materi pelajaran nya adalah Matematika, Bahasa Indonesia, IPA,IPSBahasa Inggris, Bhasa Jawa, Agama, PKN</p>\r\n<p><span style="color: #000000;"><strong><em>Kuota terbatas.</em> </strong></span></p>', 'Bimbel_Brosur_(475_x_298).jpg', NULL),
(12, 5, 1, 'Program Bimbingan SMP', 'program-bimbingan-smp', '2015-05-12 20:41:12', '<p style="text-align: justify;">Program Kelas Intensif sudah dibuka. Pendaftaran Mulai tanggal 25 juni 2015.</p>\r\n<p>Program dibuka untuk kelas 4,5,dan 6 SD .Biaya Pendaftaran Rp 30000.</p>\r\n<p><strong>Jadwal Bimbingan</strong> :<strong>untuk kelas 4 : Hari Selasa,Jumat,Sabtu ( 15.00-17.15) untuk kelas 5&nbsp; : Hari Senin,Selasa, Kamis,Jumat (15.00-17.12).&nbsp;untuk kelas 6&nbsp; : Hari Senin,Selasa, Kamis,Jumat (15.00-17.12). </strong>Materi pelajaran nya adalah Matematika, Bahasa Indonesia, IPA,IPSBahasa Inggris, Bhasa Jawa, Agama, PKN</p>\r\n<p><span style="color: #000000;"><strong><em>Kuota terbatas.</em> </strong></span></p>', 'SMP.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
`id_galeri` int(15) NOT NULL,
  `id_album` int(15) NOT NULL,
  `id_penulis` int(11) unsigned NOT NULL,
  `waktu` datetime NOT NULL,
  `slug` varchar(150) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_album`, `id_penulis`, `waktu`, `slug`, `judul`, `foto`) VALUES
(4, 3, 1, '2015-03-27 06:57:51', 'sharing-ujian', 'Sharing Ujian', 'maket1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator, bisa akses semua'),
(2, 'Guru', 'General Akses');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
`id` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `id_matapelajaran` int(11) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_lengkap`, `id_matapelajaran`, `alamat`, `email`, `telp`, `nip`, `kelamin`) VALUES
(2, 'H.Kadarisman', 1, 'Wiyoro lor', 'kadarisman@gmail.com', '0274443471', '1001002003', 'laki-laki'),
(4, 'oki', 5, 'bantul', 'oki@gmail.com', '12208834463', '124', 'laki-laki'),
(5, 'M.Fauzi', 4, 'wiyoro', 'fauzi22@gmail.com', '085743551881', '1002345564', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
`id_halaman` int(15) NOT NULL,
  `id_penulis` int(11) unsigned NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `waktu` datetime NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `id_penulis`, `judul`, `slug`, `waktu`, `konten`) VALUES
(1, 1, 'About Us', 'about-us', '2014-12-04 14:57:42', '<p style="text-align: justify;">Ini adalah halaman statis dari Bimbingan Belajar Al-Qodar. Bimbingan Belajar AL-qodar merupakan bimbingan belajar yang khusus untuk anak kelas 4,5,6 SD dAN 8,9 SMA.&nbsp;</p>'),
(2, 1, 'Profil', 'profil', '2014-12-21 05:36:31', '<h2>Visi:</h2>\r\n<ol>\r\n<li style="text-align: left;">\r\n<h2>Terbentuknya insan mulia dan berprestasi dunia akhirat</h2>\r\n</li>\r\n</ol>\r\n<h2>Misi :</h2>\r\n<ol>\r\n<li style="text-align: left;">\r\n<h2>Melaksanakan pembimbingan pembelajaran dengan pendekatan personal.</h2>\r\n</li>\r\n<li style="text-align: left;">\r\n<h2>Memberikan motivasi belajar dalam meraih cita-cita.</h2>\r\n</li>\r\n<li style="text-align: left;">\r\n<h2>Menanamkan nilai-nilai agama dalam pelaksanaan ibadah.</h2>\r\n</li>\r\n<li style="text-align: left;">\r\n<h2>Menanamkan perilaku yang mengutamakan akhlak mulia.</h2>\r\n</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
`id_jawaban` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_soal`, `jawaban`, `skor`) VALUES
(1, 1, 'Bulats', 5),
(2, 1, 'Kotak', 0),
(3, 2, 'asin', 10),
(4, 2, 'merah', 0),
(7, 3, 'hitam', 5),
(8, 3, 'putih', 2),
(9, 4, 'hidung-tenggorokan-paru-paru', 5),
(10, 4, 'mulut, kerongkongan,jantung', 0),
(11, 5, 'mulut,kerongkongan,lambung,usus kecil,usus besar,anus', 5),
(12, 5, 'mulut,kerongkongan,hati,empedu,anus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_siswa`
--

CREATE TABLE IF NOT EXISTS `jawaban_siswa` (
`id_jawaban_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_siswa`
--

INSERT INTO `jawaban_siswa` (`id_jawaban_siswa`, `nis`, `id_soal`, `id_jawaban`, `skor`) VALUES
(47, 5555, 1, 1, 5),
(48, 5555, 2, 3, 10),
(49, 5555, 4, 9, 5),
(50, 5555, 5, 11, 5),
(51, 5555, 1, 1, 5),
(52, 5555, 2, 3, 10),
(53, 5555, 1, 1, 5),
(54, 5555, 2, 3, 0),
(55, 5555, 1, 1, 0),
(56, 5555, 2, 3, 10),
(57, 5555, 1, 1, 5),
(58, 5555, 2, 3, 10),
(59, 1190, 1, 1, 5),
(60, 1190, 2, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `kategori_artikel` (
`id_kategori` int(15) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori`, `slug`, `kategori`) VALUES
(2, 'berita', 'Berita'),
(3, 'event', 'Event'),
(4, 'program-sd', 'Program SD'),
(5, 'program-smp', 'Program SMP');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_program`
--

CREATE TABLE IF NOT EXISTS `kategori_program` (
`id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_program`
--

INSERT INTO `kategori_program` (`id_kategori`, `kategori`, `slug`) VALUES
(4, 'Program SD', 'program-sd'),
(5, 'Program SMP', 'program-smp');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_publikasi`
--

CREATE TABLE IF NOT EXISTS `kategori_publikasi` (
`id_kat_publikasi` int(11) NOT NULL,
  `pub_kategori` varchar(120) NOT NULL,
  `pub_slug` varchar(120) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_publikasi`
--

INSERT INTO `kategori_publikasi` (`id_kat_publikasi`, `pub_kategori`, `pub_slug`) VALUES
(1, 'Program SD', 'programsd'),
(5, 'Program SMP', 'programsmp');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_siswa`
--

CREATE TABLE IF NOT EXISTS `kategori_siswa` (
`id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_siswa`
--

INSERT INTO `kategori_siswa` (`id_kategori`, `kategori`, `slug`) VALUES
(6, 'Siswa SMP', 'siswa-smp'),
(7, 'Siswa SD', 'siswa-sd');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(4, 'Empat'),
(5, 'Lima'),
(6, 'Enam'),
(7, 'Tujuh'),
(8, 'Delapan'),
(9, 'Sembilan');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
`id_link` int(11) NOT NULL,
  `nama_link` varchar(120) NOT NULL,
  `url_link` varchar(120) DEFAULT NULL,
  `gambar_link` varchar(120) DEFAULT NULL,
  `settingKey` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id_link`, `nama_link`, `url_link`, `gambar_link`, `settingKey`) VALUES
(2, 'Kemenkes', 'http://kemenkes.org', 'kemenkes.png', 'IK'),
(4, 'Facebook Profil', 'http://facebook.com', 'fb.png', 'FB'),
(5, 'Twitter Profil', 'https://twitter.com', 'tw.png', 'TW'),
(6, 'Twitter Sidebar', 'https://twitter.com/newsletter', NULL, 'TWS');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE IF NOT EXISTS `master_barang` (
`id_barang` int(15) NOT NULL,
  `id_produksi` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`id_barang`, `id_produksi`, `nama`, `ket`) VALUES
(3, 2, 'OK', 'Coba');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE IF NOT EXISTS `matapelajaran` (
`id_matapelajaran` int(11) NOT NULL,
  `matapelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id_matapelajaran`, `matapelajaran`) VALUES
(1, 'Bahasa Jawa'),
(2, 'IPA'),
(3, 'IPS'),
(4, 'Matematika'),
(5, 'Bahasa Indonesia'),
(6, 'Bahasa Inggris'),
(7, 'sastra inggris');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id_media` int(11) NOT NULL,
  `judul_media` varchar(120) NOT NULL,
  `url_media` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `judul_media`, `url_media`) VALUES
(1, 'baby ', 'http://www.youtube.com/embed/bgXPl3XM_NA'),
(2, 'Tutorial Membuat Meja Leptop Dari Kardus Bekas', 'https://www.youtube.com/watch?v=07uD-J3MNgY');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `rule` char(4) NOT NULL DEFAULT '0000'
) ENGINE=InnoDB AUTO_INCREMENT=753 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group_id`, `role_id`, `rule`) VALUES
(715, 2, 48, '1111'),
(716, 2, 49, '1111'),
(735, 1, 30, '1111'),
(736, 1, 31, '1111'),
(737, 1, 32, '1111'),
(738, 1, 37, '1111'),
(739, 1, 39, '1111'),
(740, 1, 41, '1111'),
(741, 1, 34, '1111'),
(742, 1, 35, '1111'),
(743, 1, 36, '1111'),
(744, 1, 40, '1111'),
(745, 1, 42, '1111'),
(746, 1, 50, '1111'),
(747, 1, 51, '1111'),
(748, 1, 45, '1111'),
(749, 1, 46, '1111'),
(750, 1, 47, '1111'),
(751, 1, 48, '1111'),
(752, 1, 49, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
`id_profil` int(11) NOT NULL,
  `nama_perusahaan` varchar(120) NOT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `kdpos_perusahaan` char(5) DEFAULT NULL,
  `telp_perusahaan` varchar(16) DEFAULT NULL,
  `fax_perusahaan` varchar(16) DEFAULT NULL,
  `email_perusahaan` varchar(40) DEFAULT NULL,
  `web_perusahaan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_perusahaan`, `alamat_perusahaan`, `kdpos_perusahaan`, `telp_perusahaan`, `fax_perusahaan`, `email_perusahaan`, `web_perusahaan`) VALUES
(1, 'Bimbingan AL-Qodar', 'Jalan Wonosari km 7, Wiyoro Lor , Baturetno,Banguntapan,Bantul', '55197', '+62 274 443472', '+62 274 631022', 'bimbelalqodar@gmail.com', 'www.bimbel-al-qodar.org');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id_program` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(11) NOT NULL,
  `slug` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_unggulan`
--

CREATE TABLE IF NOT EXISTS `program_unggulan` (
  `ID_Program` varchar(10) NOT NULL,
  `nama_program` varchar(25) NOT NULL,
  `image` text NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_unggulan`
--

INSERT INTO `program_unggulan` (`ID_Program`, `nama_program`, `image`, `slug`) VALUES
('1', 'Program_SD', '', ''),
('2', 'Program SMP', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE IF NOT EXISTS `publikasi` (
`id_publikasi` int(11) NOT NULL,
  `judul` text NOT NULL,
  `abstraksi` text NOT NULL,
  `kata_kunci` varchar(256) NOT NULL,
  `file` varchar(256) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL,
  `id_penulis` int(11) unsigned DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `cover` varchar(72) DEFAULT 'cover_default.jpg',
  `id_kat_publikasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `url` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `desc` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `category_id`, `name`, `url`, `desc`) VALUES
(30, 12, 'Artikel', 'artikel', 'Pengolahan artikel'),
(31, 12, 'Kategori Artikel', 'kategori_artikel', 'Pengolahan kategori artikel'),
(32, 13, 'Halaman Statis', 'halaman', 'Pengolahan halaman statis'),
(34, 14, 'Publikasi', 'publikasi', 'Halaman Publikasi'),
(35, 15, 'Album', 'kategori_album', 'Deskripsi Album'),
(36, 15, 'Foto', 'foto', 'Kumpulan Foto Album'),
(37, 13, 'Profil', 'profile', 'Setting Profil Perusahaan'),
(39, 13, 'Link Iklan', 'link', 'Deskripsi Link'),
(40, 15, 'Video', 'video', 'Deskripsi Media Video'),
(41, 13, 'Link Sosial Media', 'sosmed', ''),
(42, 16, 'Slider', 'slider', 'Slider Halaman Utama'),
(44, 17, 'Pendidikan', 'pendidikan', 'pendidikan umum'),
(45, 17, 'Program Unggulan', 'kategori_program', 'program unggulan'),
(46, 17, 'Kategori Siswa', 'kategori_siswa', 'siswa'),
(47, 17, 'Siswa', 'siswa', 'Siswa AL-Qodar'),
(48, 18, 'Soal', 'soal', 'Soal'),
(49, 18, 'Jawaban', 'jawaban', 'Jawaban'),
(50, 17, 'Guru', 'guru', 'guru'),
(51, 17, 'Mata Pelajaran', 'matapelajaran', 'Mata Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `roles_category`
--

CREATE TABLE IF NOT EXISTS `roles_category` (
`id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_category`
--

INSERT INTO `roles_category` (`id`, `category`) VALUES
(10, 'desain'),
(12, 'artikel'),
(13, 'setting'),
(14, 'Publikasi'),
(15, 'media'),
(16, 'Slider'),
(17, 'Pendidikan'),
(18, 'Bank Soal'),
(19, 'Guru'),
(20, 'Mata Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `setting_umum`
--

CREATE TABLE IF NOT EXISTS `setting_umum` (
  `settingKey` varchar(5) NOT NULL,
  `settingNama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nama',
  `settingKeterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci COMMENT 'Keterangan'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_umum`
--

INSERT INTO `setting_umum` (`settingKey`, `settingNama`, `settingKeterangan`) VALUES
('FB', 'social_media', 'Sosial Media Facebook'),
('TW', 'social_media', 'Sosial Media Twitter'),
('IK', 'iklan', 'Iklan link Footer'),
('TWS', 'social_media', 'Sosial Media Twitter Sidebar');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
`id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `kelas` int(11) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `nis` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_kategori`, `nama_lengkap`, `kelas`, `alamat`, `nis`, `password`, `email`, `telp`, `kelamin`) VALUES
(1, 7, 'Annisa Wulandari', 4, 'Pelem kecut', 1190, '123', 'anisa_wulan@gmail.com', '085643759001', 'laki-laki'),
(2, 7, 'Eko Ardiansyah', 4, 'Manggisan Kidul', 1191, '124', 'eko12@gmail.com', '085729554100', 'laki-laki'),
(3, 7, 'Arianti Eka Sari', 5, 'Mantup', 1220, '123', 'ariantieka@yahoo.com', '087838233229', 'perempuan'),
(4, 7, 'Dwi Eka Putri', 5, 'sekarsuli', 1221, '123', 'dwi22@yahoo.com', '08567122560', 'perempuan'),
(5, 7, 'oki', 8, 'kalasasm', 5555, '123', 'oko@yahoo.com', '085233287120', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_slider` int(7) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL DEFAULT '#',
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul`, `ket`, `link`, `img`) VALUES
(2, 'Judul Slide Kedua', 'Program SD ', 'https://www.google.co.id/', 'SD1.jpg'),
(3, 'Program Bimbingan SMP', 'Program SMP>', 'https://www.google.co.id/', 'SMP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
`id_soal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matapelajaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_kelas`, `id_matapelajaran`, `id_guru`, `soal`) VALUES
(1, 4, 1, 2, 'Bumi Itu??'),
(2, 4, 1, 2, 'Laut itu??'),
(3, 6, 1, 2, 'tanah itu ??'),
(4, 8, 2, 4, 'Contoh Sistem Pernafasan pada manusia adalah?'),
(5, 8, 2, 4, 'Contoh Sistem Pencernaan pada manusia?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `ip_address`, `last_name`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `company`, `phone`) VALUES
(1, 'Muhammadi', '127.0.0.1', 'Khoiruddin', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '28e419813d5932fcc857c8d3e776cfd7dc220840', NULL, NULL, 'xXJBA.7snBFuh7vtMKU6su', 1268889823, 1435460003, 1, '-', '-'),
(20, 'R.Zunanto', '::1', 'Zunan', 'zunan', '$2y$08$549qCah8Zv1F8lm9LAm/A.XisX4tuzP.ksO3Afz5JnIOH2e7t9e8O', NULL, 'zunanto@gmail.com', NULL, NULL, NULL, NULL, 1423662998, 1428330949, 1, '-', '-'),
(21, 'M.Fauzi', '::1', 'Fauzi', 'fauzi', '$2y$08$7wLfc8.t.oNRkHtQY3nwp.ECPf2mwLgd/2esC9/8.Sqe/g.npgIZK', NULL, 'mfauzi@gmail.com', NULL, NULL, NULL, NULL, 1427728481, 1432365226, 1, '-', '-'),
(22, 'H.Kadarisman S.Pd', '::1', 'Kadarisman', 'kadarisman', '$2y$08$vnxqdMiZsdsifwUkhCGv9./pXkL9bwkh2/hb1CCd.li/7u0fl4dsC', NULL, 'kadarisman@gmail.com', NULL, NULL, NULL, NULL, 1427728734, NULL, 1, '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(100, 1, 1),
(106, 20, 2),
(103, 21, 2),
(104, 22, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
 ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`), ADD KEY `FK_artikel_users` (`id_penulis`), ADD KEY `FK_artikel_kategori_artikel` (`id_kategori`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
 ADD PRIMARY KEY (`id_galeri`), ADD KEY `FK__album` (`id_album`), ADD KEY `FK_galeri_users` (`id_penulis`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`id`), ADD KEY `id_matapelajaran` (`id_matapelajaran`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
 ADD PRIMARY KEY (`id_halaman`), ADD KEY `FK_halaman_users` (`id_penulis`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
 ADD PRIMARY KEY (`id_jawaban`), ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
 ADD PRIMARY KEY (`id_jawaban_siswa`), ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_program`
--
ALTER TABLE `kategori_program`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_publikasi`
--
ALTER TABLE `kategori_publikasi`
 ADD PRIMARY KEY (`id_kat_publikasi`);

--
-- Indexes for table `kategori_siswa`
--
ALTER TABLE `kategori_siswa`
 ADD PRIMARY KEY (`id_kategori`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`), ADD KEY `id_kelas` (`id_kelas`), ADD KEY `id_kelas_2` (`id_kelas`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
 ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
 ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id_media`), ADD KEY `id_media` (`id_media`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
 ADD KEY `id_program` (`id_program`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `program_unggulan`
--
ALTER TABLE `program_unggulan`
 ADD PRIMARY KEY (`ID_Program`), ADD KEY `ID_Program` (`ID_Program`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
 ADD PRIMARY KEY (`id_publikasi`), ADD KEY `fk_user_publikasi` (`id_penulis`), ADD KEY `fk_kat_publikasi` (`id_kat_publikasi`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles_category`
--
ALTER TABLE `roles_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_umum`
--
ALTER TABLE `setting_umum`
 ADD PRIMARY KEY (`settingKey`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`id`), ADD KEY `id_kategori` (`id_kategori`), ADD KEY `id_kategori_2` (`id_kategori`), ADD KEY `id_kategori_3` (`id_kategori`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`id_soal`), ADD KEY `id_soal` (`id_soal`), ADD KEY `id_guru` (`id_guru`), ADD KEY `id_kelas` (`id_kelas`), ADD KEY `id_soal_2` (`id_soal`), ADD KEY `id_kelas_2` (`id_kelas`), ADD KEY `id_soal_3` (`id_soal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
MODIFY `id_album` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
MODIFY `id_galeri` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
MODIFY `id_halaman` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
MODIFY `id_jawaban_siswa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
MODIFY `id_kategori` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori_program`
--
ALTER TABLE `kategori_program`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori_publikasi`
--
ALTER TABLE `kategori_publikasi`
MODIFY `id_kat_publikasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori_siswa`
--
ALTER TABLE `kategori_siswa`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
MODIFY `id_barang` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
MODIFY `id_matapelajaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=753;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
MODIFY `id_publikasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `roles_category`
--
ALTER TABLE `roles_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id_slider` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
ADD CONSTRAINT `FK_artikel_users` FOREIGN KEY (`id_penulis`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `Fk_artikel_kategori_artikel` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id_kategori`) ON UPDATE CASCADE;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
ADD CONSTRAINT `FK__album` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `FK_galeri_users` FOREIGN KEY (`id_penulis`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_matapelajaran`) REFERENCES `matapelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `halaman`
--
ALTER TABLE `halaman`
ADD CONSTRAINT `FK_halaman_users` FOREIGN KEY (`id_penulis`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`);

--
-- Constraints for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
ADD CONSTRAINT `jawaban_siswa_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_program` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi`
--
ALTER TABLE `publikasi`
ADD CONSTRAINT `fk_kat_publikasi` FOREIGN KEY (`id_kat_publikasi`) REFERENCES `kategori_publikasi` (`id_kat_publikasi`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user_publikasi` FOREIGN KEY (`id_penulis`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `roles_category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_siswa` (`id_kategori`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
