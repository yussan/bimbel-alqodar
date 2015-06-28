-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 12:22 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kpmak`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `slug`, `judul`, `cover`) VALUES
(2, 'pelantikan-pramuka-bantara', 'Pelantikan Pramuka Bantara', 'maket.jpg'),
(3, 'kegiatan-pramuka', 'Kegiatan Pramuka', 'fk.JPG');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_kategori`, `id_penulis`, `judul`, `slug`, `waktu`, `konten`, `gambar`, `isSlider`) VALUES
(1, 3, 1, 'Pesantren Blitar Dilibatkan dalam Penanggulangan TB', 'pesantren-blitar-dilibatkan-dalam-penanggulangan-tb', '2015-01-02 07:40:04', '<p style="text-align: justify;">Pesantren Blitar Dilibatkan dalam Penanggulangan Tuberkulosis Untuk meningkatkan pengatahuan dan pemahaman penanggulangan penyakit Tuberkulosis (TB) khususnya program DOTS (Directly Observed Treatment Shortcours) bagi Santri di Pondok Pesantren, tanggal 20 Nopember 2014 bertempat di Aula Dinas Kesehatan. Blitar diadakan sosilisasi kepada pengurus Pondok Pesantren Kabupaten Blitar. Kegiatan diikuti 24 peserta dari 20 perwakilan pengurus pondok pesantren di Kabupaten Blitar.</p>\r\n<p style="text-align: justify;">Kegiatan dibuka oleh Kasi P2 Dinkes Kabupaten Blitar Eko Wahyudi, S.KM. M,KM dan dihadiri Wakil Sekretaris PCNU Kabupaten Blitar Wijianto, Ketua Rabithah Ma&rsquo;ahid Islamiyah (RMI) Kabupaten Blitar Ahmad Mudlofi, S. Ag. M.HI dan Koordinator CEPAT LKNU Blitar Nur Laili. Dalam sambutannya, Eko Wahyudi, SKM, MKM, menyatakan hanya dengan komitmen semua pihak, TB dapat ditanggulangi. Penanggulangan penyakit TB memerlukan peran aktif dari semua elemen masyarakat termasuk kader pesantren yang merupakan salah satu komponen penggerak masyarakat dalam penanggulangan TB. Menurut Eko Wahyudi, TB dapat dikenali dari beberapa gejala yang ditunjukkan oleh penderita, di antaranya batuk berdahak selama dua hingga tiga minggu. Ada juga yang disertai sesak dan batuk berdarah. Kuman TB ditularkan lewat udara, dari percikan dahak ketika penderita batuk kepada orang di sekitarnya.</p>', 'sk.jpg', '0'),
(2, 4, 1, 'Bikin Sendiri Deret Hitung Fibonansi Menggunakan PHP ', 'bikin-sendiri-deret-hitung-fibonansi-menggunakan-php', '2015-01-02 07:40:50', '<p style="text-align: justify;">Tidak hanya itu, ada juga faktor eksternal yang dapat mempermudah penularan TB, di antaranya lingkungan yang tidak sehat yaitu ventilasi yang tidak baik, ukuran rumah yang tidak seimbang dengan jumlah penghuninya, serta perilaku hidup tidak sehat antara lain meludah di sembarang tempat. TB dapat disembuhkan dengan pengobatan secara terus menerus sampai tuntas sesuai petunjuk dokter. Obat anti TB (OAT) disediakan oleh pemerintah, sehingga pasien dapat memperolehnya secara gratis baik di Puskesmas maupun rumah sakit yang ditunjuk, kata Kasi P2 Dinkes Kab. Blitar.</p>\r\n<p style="text-align: justify;">Ketua RMI Blitar, Ahmad Mudlofi, S. Ag. M.HI dalam sambutannya menyatakan dalam perspektif Islam terdapat tiga kaidah pengobatan penyakit yaitu ;1. Hifdhu al-shihhah (menjaga kesehatan), 2. Al-himyatu ani al-mu&rsquo;dzii (melindungi diri dari hal-hal yang dapat menimbulkan penyakit), 3. Istifraghu al-mawadi al-faasidah (mengeluarkan unsur-unsur yang merusak badan).</p>', 'dribbble_shot_1x.png', '0'),
(3, 2, 1, 'Panduan Membuat Aplikasi', 'panduan-membuat-aplikasi', '2015-01-02 07:41:22', '<p style="text-align: justify;">Pencegahan penyakit TB dapat dilakukan melalui sentuhan nilai-nilai universal dan kemanusiaan. Misalnya firman Allah dalam surat Al-Baqarah : 195 artinya : Jangan ceburkan dirimu dalam kebinasaan, berbuat baiklah karena Allah mencintai orang-orang yang berbuat baik . Hadis Nabi : La dharara wa la dhirar (tidak diperbolehkan menyengsarakan diri sendiri dan menimbulkan kesengsaraan terhadap orang lain). Dalam kaidah fiqih yang kemukakan oleh Imam Jalaluddin as Suyuthi : Al dhararu yuzalu (bahaya itu harus dihilangkan),&rdquo; jelas Gus Dhofi.</p>\r\n<p style="text-align: justify;">Di akhir acara, Wijianto memimpin diskusi tentang draf kesepakatan bersama antara Dinas Kesehatan Kabupaten Blitar dengan Pondok Pesantren yang tergabung dalam RMI (Asosiasi Pesantren NU) tentang peningkatan kesehatan di Pondok Pesantren. Menurut Wijianto, Sekretaris PCNU yang juga fasilitator Cepat LKNU Blitar, ruang lingkup kesepakatan bersama adalah peningkatan kesehatan di lingkungan pondok pesantren yang meliputi; kesehatan lingkungan, pencegahan dan pemberantasan penyakit menular, perilaku hidup bersih dan sehat, peningkatan gizi, promosi kesehatan dan kesehatan reproduksi remaja.</p>', 'buat_origami.jpg', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_album`, `id_penulis`, `waktu`, `slug`, `judul`, `foto`) VALUES
(1, 3, 1, '2014-12-22 18:18:14', 'pelantikan-bantara', 'Pelantikan Bantara', 'maket.jpg'),
(2, 3, 1, '2014-12-22 18:18:15', 'pelantikan-bantara', 'Pelantikan Bantara', 'b.jpg'),
(3, 3, 1, '2014-12-22 18:18:15', 'pelantikan-bantara', 'Pelantikan Bantara', 'c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator, bisa akses semua'),
(2, 'members', 'General Akses');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `id_penulis`, `judul`, `slug`, `waktu`, `konten`) VALUES
(1, 1, 'About Us', 'about-us', '2014-12-04 14:57:42', '<p style="text-align: justify;">Ini adalah halaman statis dari KMPAK UGM. Mantab</p>'),
(2, 1, 'Profil', 'profil', '2014-12-21 05:36:31', '<p>Me Profil</p>');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `kategori_artikel` (
`id_kategori` int(15) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori`, `slug`, `kategori`) VALUES
(1, 'teknologi', 'Teknologi'),
(2, 'berita', 'Berita'),
(3, 'events', 'Events'),
(4, 'gadget', 'Gadgets');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_publikasi`
--

CREATE TABLE IF NOT EXISTS `kategori_publikasi` (
`id_kat_publikasi` int(11) NOT NULL,
  `pub_kategori` varchar(120) NOT NULL,
  `pub_slug` varchar(120) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori_publikasi`
--

INSERT INTO `kategori_publikasi` (`id_kat_publikasi`, `pub_kategori`, `pub_slug`) VALUES
(1, 'Buku', 'buku'),
(2, 'Ebook', 'ebook'),
(3, 'Prosiding', 'prosiding'),
(4, 'Jurnal', 'jurnal'),
(5, 'Majalah', 'majalah');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id_link`, `nama_link`, `url_link`, `gambar_link`, `settingKey`) VALUES
(2, 'Kemenkes', 'http://kemenkes.org', 'kemenkes.png', 'IK'),
(3, 'Pusat KPMAK UGM', 'http://google.com', 'kpmak.png', 'IK'),
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE IF NOT EXISTS `master_barang` (
`id_barang` int(15) NOT NULL,
  `id_produksi` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`id_barang`, `id_produksi`, `nama`, `ket`) VALUES
(3, 2, 'OK', 'Coba');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id_media` int(11) NOT NULL,
  `judul_media` varchar(120) NOT NULL,
  `url_media` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `judul_media`, `url_media`) VALUES
(1, 'Baby Lucu Banget', 'http://www.youtube.com/embed/bgXPl3XM_NA');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `rule` char(4) NOT NULL DEFAULT '0000'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=353 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group_id`, `role_id`, `rule`) VALUES
(244, 2, 4, '0100'),
(247, 2, 32, '1111'),
(341, 1, 30, '1111'),
(342, 1, 31, '1111'),
(343, 1, 41, '1111'),
(344, 1, 32, '1111'),
(345, 1, 37, '1111'),
(346, 1, 39, '1111'),
(347, 1, 34, '1111'),
(348, 1, 38, '1111'),
(349, 1, 35, '1111'),
(350, 1, 36, '1111'),
(351, 1, 40, '1111'),
(352, 1, 42, '1111');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_perusahaan`, `alamat_perusahaan`, `kdpos_perusahaan`, `telp_perusahaan`, `fax_perusahaan`, `email_perusahaan`, `web_perusahaan`) VALUES
(1, 'KPMAK UGM', 'Gedung Radioputro Sayap Barat Lantai 2 Komplek Fakultas Kedokteran UGM Jalan Farmako Sekip Utara, Yogyakarta', '55281', '+62 274 631022', '+62 274 631022', 'pusatkpmak@gmail.com', 'www.kpmak-ugm.org');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id_publikasi`, `judul`, `abstraksi`, `kata_kunci`, `file`, `tanggal_upload`, `id_penulis`, `slug`, `cover`, `id_kat_publikasi`) VALUES
(1, 'ANALISIS PENGUKURAN KINERJA DENGAN METODE BALANCE  SCORE CARD (BSC) DI CV MCH SIDOARJO', '<p style="text-align: justify;">CV&nbsp; MCH&nbsp; merupakan&nbsp; perusahaan&nbsp; koper&nbsp; yang&nbsp; berlokasi&nbsp; di&nbsp; Sidoarjo. Berdasarkan&nbsp; laporan&nbsp; perusahaan&nbsp; CV&nbsp; MCH&nbsp; kinerja&nbsp; system&nbsp; operasionalnya menunjukkan&nbsp; hasil&nbsp; yang&nbsp; cukup&nbsp; baik,&nbsp; namun&nbsp; pengukuran&nbsp; kinerja&nbsp; secara terintegrasi&nbsp; belum&nbsp; pernah&nbsp; dilakuan.&nbsp; Penelitian&nbsp; ini&nbsp; bertujuan&nbsp; untuk&nbsp; mengukur kinerja CV MCH dengan beberapa aspek terintegrasi, yaitu perspektif keua ngan, perspektif&nbsp; pelanggan,&nbsp; perspektif&nbsp; proses&nbsp; bisnis&nbsp; intrenal&nbsp; serta&nbsp; perspektif pembelajaran&nbsp; dan&nbsp; pertumbuhan,&nbsp; menentukan&nbsp; yang&nbsp; dapat&nbsp; dilakukan&nbsp; untuk meningkatkan kinerja perusahaan.</p>', 'Kinerja, BSC, AHP', 'ipi181061.pdf', '2014-12-22 07:12:39', 1, 'analisis-pengukuran-kinerja-dengan-metode-balance-score-card-bsc-di-cv-mch-sidoarjo', 'cover_default.jpg', 1),
(2, 'Bikin Sendiri Deret Hitung Fibonansi Menggunakan PHP ', '<p>sedwrererfe</p>', 'asas.dfddfg.fgfg', 'BAB_III.pdf', '2014-12-23 18:33:45', 1, 'bikin-sendiri-deret-hitung-fibonansi-menggunakan-php', 'cover_default.jpg', 3),
(3, 'Developing an Information System for Quality Assurance in Higher Education using the Balanced Scorecard Technique - The case study of TEI-A', '<p style="text-align: justify;">Higher education institutions need to have a&nbsp;clear mission and attainable objectives that can be&nbsp;interpreted and analysed by using terms of strategic&nbsp;planning. Our work is part of prototype system that&nbsp;supports academic evaluation and strategy management&nbsp;using the balanced scorecard methodology. This study&nbsp;aims to describe the design of a campus-wide<br />management information system in the Technological&nbsp;Educational Institute of Athens which can be used to&nbsp;evaluate quality and institutional performance in higher&nbsp;education.</p>', 'Higher Eduaction Institution, Balanced scorecard, Quality Management, Management Information System', '06065117.pdf', '2015-01-01 10:26:58', 1, 'developing-an-information-system-for-quality-assurance-in-higher-education-using-the-balanced-scorecard-technique-the-case-study-of-tei-a', 'cover_default.jpg', 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `category_id`, `name`, `url`, `desc`) VALUES
(4, 10, 'Macam-macam Desain CSS', 'desain', 'Berbagai Macam-macam Desain CSS'),
(30, 12, 'Artikel', 'artikel', 'Pengolahan artikel'),
(31, 12, 'Kategori Artikel', 'kategori_artikel', 'Pengolahan kategori artikel'),
(32, 13, 'Halaman Statis', 'halaman', 'Pengolahan halaman statis'),
(34, 14, 'Publikasi', 'publikasi', 'Halaman Publikasi'),
(35, 15, 'Album', 'kategori_album', 'Deskripsi Album'),
(36, 15, 'Foto', 'foto', 'Kumpulan Foto Album'),
(37, 13, 'Profil', 'profile', 'Setting Profil Perusahaan'),
(38, 14, 'Jenis Publikasi', 'jenis_publikasi', 'Deskripsi Jenis Publikasi'),
(39, 13, 'Link Iklan', 'link', 'Deskripsi Link'),
(40, 15, 'Video', 'video', 'Deskripsi Media Video'),
(41, 13, 'Link Sosial Media', 'sosmed', ''),
(42, 16, 'Slider', 'slider', 'Slider Halaman Utama');

-- --------------------------------------------------------

--
-- Table structure for table `roles_category`
--

CREATE TABLE IF NOT EXISTS `roles_category` (
`id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `roles_category`
--

INSERT INTO `roles_category` (`id`, `category`) VALUES
(10, 'desain'),
(12, 'artikel'),
(13, 'setting'),
(14, 'Publikasi'),
(15, 'media'),
(16, 'Slider');

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
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_slider` int(7) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL DEFAULT '#',
  `img` varchar(500) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul`, `ket`, `link`, `img`) VALUES
(2, 'Judul Slide Kedua', 'testing tes testing tes testing tes testing tes testing tes testing tes ', 'https://www.google.co.id/', 'coklat_ndalem.jpg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `ip_address`, `last_name`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `company`, `phone`) VALUES
(1, 'Muhammad', '127.0.0.1', 'Khoiruddin', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '28e419813d5932fcc857c8d3e776cfd7dc220840', NULL, NULL, 'xXJBA.7snBFuh7vtMKU6su', 1268889823, 1423652108, 1, '-', '-'),
(19, 'testing', '127.0.0.1', 'test', 'testing', '$2y$08$aASzQAA8dtnm1JzBNb.TreEiZwXYhIGdGPBuG/9HlgCuhddwfVjYC', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1417656134, NULL, 1, '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(93, 1, 1),
(87, 19, 2);

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
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
 ADD PRIMARY KEY (`id_halaman`), ADD KEY `FK_halaman_users` (`id_penulis`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_publikasi`
--
ALTER TABLE `kategori_publikasi`
 ADD PRIMARY KEY (`id_kat_publikasi`);

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
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id_media`);

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
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

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
MODIFY `id_artikel` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
MODIFY `id_galeri` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
MODIFY `id_halaman` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
MODIFY `id_kategori` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori_publikasi`
--
ALTER TABLE `kategori_publikasi`
MODIFY `id_kat_publikasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=353;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
MODIFY `id_publikasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `roles_category`
--
ALTER TABLE `roles_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id_slider` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
