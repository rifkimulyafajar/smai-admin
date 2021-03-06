-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 05.39
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id_soal` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `status` enum('Latihan','Ujian') DEFAULT NULL,
  `soal` longtext NOT NULL,
  `file_soal` varchar(250) DEFAULT NULL,
  `pilihan_a` longtext NOT NULL,
  `file_a` varchar(250) DEFAULT NULL,
  `pilihan_b` longtext NOT NULL,
  `file_b` varchar(250) DEFAULT NULL,
  `pilihan_c` longtext NOT NULL,
  `file_c` varchar(250) DEFAULT NULL,
  `pilihan_d` longtext NOT NULL,
  `file_d` varchar(250) DEFAULT NULL,
  `pilihan_e` longtext NOT NULL,
  `file_e` varchar(250) DEFAULT NULL,
  `kunci` varchar(250) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_soal`
--

INSERT INTO `bank_soal` (`id_soal`, `id_guru`, `id_mapel`, `id_kategori`, `id_kelas`, `id_jurusan`, `id_ujian`, `status`, `soal`, `file_soal`, `pilihan_a`, `file_a`, `pilihan_b`, `file_b`, `pilihan_c`, `file_c`, `pilihan_d`, `file_d`, `pilihan_e`, `file_e`, `kunci`, `nilai`, `tanggal`) VALUES
(2, 24, 7, NULL, 1, 6, NULL, 'Ujian', '<p>dimana?</p>\r\n', '', 'atas', '', 'bawah', '', 'kanan', '', 'kiri', '', 'belakang', '', 'kiri', 2, '2021-05-20 22:55:00'),
(3, 30, 3, NULL, 1, 3, NULL, 'Ujian', '<p>two?</p>\r\n', '', '', '1.png', '', '2.png', '', '3.png', '', '4.png', '', '5.png', '2.png', 3, '2021-05-21 09:42:00'),
(8, 29, 2, 1, 3, 1, NULL, 'Latihan', '<p>ha?</p>\r\n', 'user.jpg', 'saya', '', 'kamu', '', 'kanan', '', 'mereka', '', 'belakang', '', 'kamu', 2, '2021-05-24 09:38:53'),
(9, 30, 3, NULL, 3, 3, 14, 'Ujian', '<p>Cc</p>\r\n', '', '1', '', '2', '', '1', '', 'mereka', '', 'kami', '', 'B', 2, '2021-05-25 13:18:49'),
(12, 36, 2, NULL, 3, 1, NULL, 'Ujian', '<p>AAAAaaaa</p>\r\n', '', 'A', '', 'B', '', 'C', '', '', '', '', '', 'A', 4, '2021-05-26 22:09:45'),
(16, 23, 1, NULL, 3, 4, 13, 'Ujian', '<p>a</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 5, '2021-05-28 08:41:19'),
(22, 29, 2, 2, 1, 5, NULL, 'Latihan', '<p>T</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 4, '2021-05-28 21:48:46'),
(23, 24, 7, NULL, 2, 4, NULL, 'Ujian', '<p>P</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', 'A', 2, '2021-05-29 22:27:47'),
(30, 20, 1, NULL, 3, 6, 37, 'Ujian', '<p>1</p>\r\n', '', '3', '', '2', '', '5', '', '8', '', '1', '', '1', 3, '2021-05-31 10:37:54'),
(32, 23, 1, 11, 1, 1, 15, 'Ujian', '<p>?</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', 'B', 3, '2021-06-04 15:26:39'),
(33, 23, 1, 11, 1, 1, 15, 'Ujian', '<p>?</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 2, '2021-06-11 16:38:22'),
(34, 30, 3, NULL, 3, 3, 14, 'Ujian', '<p>??</p>\r\n', NULL, 'A', NULL, 'B', NULL, 'C', NULL, 'D', NULL, 'E', NULL, 'E', 2, '2021-06-13 01:01:21'),
(35, 30, 3, NULL, 3, 3, NULL, 'Latihan', '<p>11</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 4, '2021-06-13 01:13:40'),
(36, 23, 1, 11, 3, 4, 13, 'Ujian', '<p>b</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 4, '2021-06-13 03:51:08'),
(37, 24, 7, NULL, 1, 1, 34, 'Ujian', '<p>z</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 2, '2021-06-13 04:18:08'),
(43, 24, 7, NULL, 1, 1, 34, 'Ujian', '<p>ZZ</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'B', 2, '2021-06-13 04:41:49'),
(44, 23, 1, 11, 3, 4, NULL, 'Latihan', '<p>?</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 2, '2021-06-16 23:26:46'),
(45, 23, 1, 14, 1, 1, NULL, '', '<p>BB</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', 3, '2021-06-22 17:23:55'),
(54, 20, 1, NULL, 1, 1, NULL, '', '<p>XXXXXXx</p>\r\n', NULL, '', 'Android_Mobile_???_1.png', '', NULL, '', NULL, '', NULL, '', NULL, 'Android_Mobile_???_1.png', 1, '2021-06-23 20:40:20'),
(61, 50, 11, NULL, 3, 6, NULL, 'Latihan', '<p>Mayoritas agama mengajarkan pembinaan rasa kasih sayang, tolong-menolong dengan keikhlasan, hidup rukun, ikut meringankan beban bagi yang lemah, dan membina hubungan dengan sesama manusia secara harmonis. Hal tersebut menunjukan agama memiliki fungsi...</p>\r\n', '', 'Fungsi pengendalian diri', '', 'Fungsi perlindungan', '', 'Fungsi pendidikan', '', 'Fungsi sosial', '', 'Fungsi fasilitasi', '', 'Fungsi sosial', 1, '2021-06-23 23:00:24'),
(62, 50, 11, NULL, 3, 6, NULL, 'Latihan', '<p>Contoh tradisi lisan dari suku Betawi yang masih dikenal sampai saat ini adalah ???.</p>\r\n', '', 'Pencak Silat', '', 'Musik Tanjidor', '', 'Tradisi Palang Pintu', '', 'Rumah Kebaya', '', 'Kerak Telor', '', 'Tradisi Palang Pintu', 3, '2021-06-23 23:28:16'),
(63, 50, 11, NULL, 3, 6, 35, 'Ujian', '<p>Perhatikan illustrasi berikut :<br>\r\nUpacara tradisional pada masyarakat Jawa Tengah seperti digerakkan kekuatan spiritual mereka saling bahu membahu membuat sejumlah ritual dan tradisi yang hakekatnya memohon keselamatan pada Tuhan Yang Maha Esa, seperti upacara Larung dengan menghanyutkan sesaji ke laut yang berupa hasil bumi. Dari ilustrasi tersebut dapat disimpulkan bahwa tradisi larung merupakan bentuk....</p>\r\n', NULL, 'pujian-pujian yang dipersembahkan untuk roh leluhur', NULL, 'tradisi penghormatan pada pengauasa pantai', NULL, 'rasa syukur masyarakat akan hasil bumi yang mereka hasilkan', NULL, 'keyakinan yang terdapat pada masyarakat', NULL, 'kepercayaan tradisional masyarakat setempat', NULL, 'rasa syukur masyarakat akan hasil bumi yang mereka hasilkan', 2, '2021-06-24 01:18:36'),
(64, 50, 11, NULL, 3, 6, NULL, NULL, '<p>Kampung Naga merupakan suatu kampung yang mewarisi budaya leluhur. Di mana masyarakatnya terikat pada aturan yang telah ditetapkan untuk mensosialisasikan nilai-nilai, norma-norma yang berlaku yang diwariskan ke generasi berikutnya. Sarana pewarisan budaya ini adalah ....</p>\r\n', '', 'Lembaga pendidikan', '', 'Lembaga hukum', '', 'Lembaga adat', '', 'Lembaga agama', '', 'Lembaga ekonomi', '', 'Lembaga adat', 4, '2021-06-24 02:05:04'),
(65, 50, 11, NULL, 3, 6, 35, 'Ujian', '<p>Seorang pengamen ingin meniru penampilan penyanyi terkenal dengan cara berdandan dan berpenampilan, serta bernyanyi seperti penyanyi terkenal tersebut. Hal ini merupakan salah satu faktor pendorong dinamika budaya yang disebut ....</p>\r\n', '', 'identifikasi', '', 'motivasi', '', 'simpati', '', 'sugesti', '', 'imitasi', '', 'imitasi', 3, '2021-06-24 02:11:09'),
(66, 23, 1, NULL, 3, 3, 38, 'Ujian', '<p>Soal satu</p>\r\n', NULL, 'A', NULL, 'B', NULL, 'C', NULL, 'D', NULL, 'E', NULL, 'B', 1, '2021-06-30 20:58:05'),
(67, 23, 1, NULL, 3, 3, 38, 'Ujian', '<p>Soal 2</p>\r\n', NULL, 'A', NULL, 'B', NULL, 'C', NULL, 'D', NULL, 'E', NULL, 'B', 1, '2021-06-30 20:58:33'),
(68, 50, 11, NULL, 3, 6, 35, 'Ujian', '<p>Iya tidak?</p>\r\n', NULL, 'Tidak', NULL, 'Iya', NULL, 'Mungkin', NULL, 'Tidak tahu', NULL, 'Bisa jadi', NULL, 'Iya', 2, '2021-07-02 13:46:31'),
(69, 20, 1, NULL, 3, 6, 37, 'Ujian', '<p>2</p>\r\n', NULL, '5', NULL, '3', NULL, '2', NULL, '6', NULL, '8', NULL, '2', 2, '2021-07-02 15:10:51'),
(70, 24, 7, NULL, 2, 2, 34, 'Ujian', '<p>soal satu</p>\r\n', NULL, 'A', NULL, 'B', NULL, 'C', NULL, 'D', NULL, 'E', NULL, 'B', 1, '2021-07-04 17:07:24'),
(71, 24, 7, NULL, 2, 2, 34, 'Ujian', '<p>Soal dua</p>\r\n', NULL, 'A', NULL, 'B', NULL, 'C', NULL, 'D', NULL, 'E', NULL, 'C', 1, '2021-07-04 17:08:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `id_mapel`, `username`, `password`, `level`) VALUES
(6, '111', 'admin', 0, '111', '$2y$10$v/kiEqoQx4lCPuNd42Ts9uJoEq0M9lW4UJd50vTYq0S', 'admin'),
(20, '10', 'Dra. Hj. Maftukhah', 1, '10', '$2y$10$Y1v8mi8cBTG.Y7DuaxmhOuD2TKUMnrZPfMpH5yfYu11', 'guru'),
(21, '15', 'Endah Setyowati, S.Pd.', 3, '15', '$2y$10$uQOLQ9zWPEl4sPHxWDMmpudIdyWBdsSDNNoquHJEoFG', 'guru'),
(22, '17', 'Drs. Endik Sujatmiko', 1, '17', '$2y$10$cXEl68GZwyBTVkqaY4SJqOdp5eX/47/H1QFS4ygFkyP', 'guru'),
(23, '21', 'Wakidatul Romlah, S.Pd.', 1, '21', '$2y$10$482xfGH7S7ALUG/g8IrPmOSasRVIk/yPAe2O/kRp7Dr', 'guru'),
(24, '7', 'Hj. Dyah Lussi Praharini, M.Pd.', 7, '7', '$2y$10$dwXLF0rsA/oDxBIaiNQ7Nurxd8kvZ9vhsk1PwpDpLvU', 'guru'),
(25, '8', 'Imaduddin, S.Pd.', 5, '8', '$2y$10$Bl5.8BpZtFQoCj7/wN9qCuAZqyfbSJGem2fSQpGJo1i', 'guru'),
(26, '24', 'Wiwit Nurhayati Ningsih, S.S', 5, '24', '$2y$10$OpkJk5r3tXuySW6vp7bPce177ufxlfJFdOmN70h6bG.', 'guru'),
(27, '27', 'Arik Erawati, A.Md.', 3, '27', '$2y$10$xJnkAET/3Y21ngg7fJd3VeInj0bL5oooLc5n1.rbL..', 'guru'),
(28, '28', 'Nurlaili Firdausi, S.Pd.', 6, '28', '$2y$10$VPS9SvTLTH9Wf.vPVGB5BO8tekJEUm9oenRHRlmdOjL', 'guru'),
(29, '31', 'Saiful Amin, S.Pd.', 2, '31', '$2y$10$3MPZyPy/N5io2aFlqBWFdOTGFhkBKKo.MPnZhOsKYIF', 'guru'),
(30, '32', 'Rina Puspa Dewi, S.Pd.', 3, '32', '$2y$10$zboP3J7/88W.PbQtpc/GK.GHq0.rukj9uy3iBvG4/mF', 'guru'),
(31, '39', 'Putri Ani Puji Khusnul KH., S.Pd.', 7, '39', '$2y$10$f.o/5M83Cj/heAnUTOj5Lud6l3Sg71uWRjCSwj3Hlt.', 'guru'),
(32, '40', 'Indah Maya Lukitasari, S.Pd.', 2, '40', '$2y$10$wk77xH9xGEVvc8ZdGfE6GOav9Op7esJrDk3xG7o4pid', 'guru'),
(33, '43', 'Retty Mustikaningtyas, S.Pd.', 2, '43', '$2y$10$p/LPY7IWhDQm2kjZwGgaI.jxxdKQtB6qLjz/dT0Dmgw', 'guru'),
(34, '45', 'Rika Damayanti, S.Pd., Gr.', 6, '45', '$2y$10$32Q5QumDBWmVOapF.AfXIOWIlseST.yaBDRcB9RY6fi', 'guru'),
(35, '47', 'Lely Shulthonnah, S.Pd.', 7, '47', '$2y$10$rkfEgTl27E7fla2LjOidKOX22ZtI0MF/T72hGFbhibY', 'guru'),
(36, '34', 'Nevy Karunia, S.Pd.', 2, '34', '$2y$10$ZVU45KafjpWvHGOTfz1deeHwgvVqatFsQG61PPIFJbe', 'guru'),
(47, '48', 'Angga Bayu Setiawan, S.Pd.', 8, '48', '$2y$10$Sp3oyIYoQuqmI4mKdS68We5U5Qq99q4AdqlgdpBgrR8', 'guru'),
(48, '46', 'Mustika Dewi Kartika, S.Pd.', 9, '46', '$2y$10$l72wdn42VkYzDs4tXIV/bu0LUhXN/HXVodY.8nI59zl', 'guru'),
(49, '5', 'Drs. H. Mohammad Yasin', 10, '5', '$2y$10$JOpFlQIpMSDXrLBfbJ4fPekCOgzOoErpL3pbY1JuWpL', 'guru'),
(50, '12', 'Zubaidah Nur Aini, S.Pd.', 11, '11', '$2y$10$OjPMaUaQxxsG9Pi5h/8YpupmLmH7gO9yXwVE2fu1gdj', 'guru'),
(51, '11', 'Dra. Dewi Kartika Ardiyani, M.Pd.', 12, '11', '$2y$10$sEMoA8res3D8b2wDTJjbWeX4OwBOU6hCqAHxOHqx.pk', 'guru'),
(52, '18', 'Endik Kuswanto, S.Pd.', 12, '18', '$2y$10$wRYw.1DOPlTl4NVtScGXdeX5RlU4/t3H/.LgR8iLxQJ', 'guru'),
(53, '38', 'Diana Rina Wati, S.Pd.', 13, '38', '$2y$10$uivml9VsCEKgH1fPzUuvZulpVAJcAXwYoNXIXIGxrZp', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'MIPA-1'),
(2, 'MIPA-2'),
(3, 'MIPA-3'),
(4, 'IPS-1'),
(5, 'IPS-2'),
(6, 'BB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `id_guru`) VALUES
(1, 'Penjumlahan', 29),
(2, 'Aljabar', 29),
(7, 'Mudah', 25),
(8, 'Susah', 25),
(11, 'Sinonim', 23),
(12, 'Listening', 30),
(14, 'Antonim', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(3, 'Bahasa Inggris'),
(5, 'Kimia'),
(6, 'Fisika'),
(7, 'Biologi'),
(8, 'Sosiologi'),
(9, 'Sejarah'),
(10, 'Geografi'),
(11, 'Antropologi'),
(12, 'Bahasa Jerman'),
(13, 'Bahasa Mandarin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `file1` varchar(250) NOT NULL,
  `file2` varchar(250) DEFAULT NULL,
  `file3` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_guru`, `id_mapel`, `id_kelas`, `id_jurusan`, `file1`, `file2`, `file3`) VALUES
(19, 29, 2, 3, 1, 'UTS_SCORING_RUBRIK_DAN_HASIL_EVALUASI_APP_LETTER_CV_DAN_INTERVIEW.pdf', '', ''),
(20, 24, 7, 1, 1, '40__Perubahan_Jam_Perkuliahan_selama_Puasa.pdf', 'UTS_SCORING_RUBRIK_DAN_HASIL_EVALUASI_APP_LETTER_CV_DAN_INTERVIEW.pdf', ''),
(21, 27, 3, 2, 3, 'UTS_SCORING_RUBRIK_DAN_HASIL_EVALUASI_APP_LETTER_CV_DAN_INTERVIEW.pdf', '2021-SURAT_PERNYATAAN_IJAZAH.doc', 'WhatsApp_Image_2021-04-22_at_11_16_39.jpeg'),
(22, 30, 3, 3, 2, 'Logo-Polinema-Politeknik-Negeri-Malang.png', '', ''),
(23, 29, 2, 2, 3, 'dosen.xlsx', '', ''),
(24, 31, 7, 1, 1, '2021-SURAT_PERNYATAAN_IJAZAH.doc', NULL, NULL),
(26, 28, 6, 3, 3, 'dosen.xlsx', '', ''),
(27, 36, 2, 3, 2, 'dosen.xlsx', '', ''),
(29, 23, 1, 2, 2, '40__Perubahan_Jam_Perkuliahan_selama_Puasa.pdf', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `id_kelas`, `id_jurusan`, `username`, `password`) VALUES
(1, '123', 'Aaa', 1, 6, '123', '$2y$10$hfIum0XfOxQZSS0p.f7UcOJ/czk4UD4H9ndTHVPuCa/'),
(2, '321', 'Bbb', 2, 2, '321', '$2y$10$xJZEEwdOHLlPFpgqK/rvouuagGZAhBQJsoundEKzWAXSmGZcssMU.'),
(4, '333', 'Ddd', 3, 4, '333', '$2y$10$6BWaL2S6/M.hZRiMBVRSBObveUxCdOkWCc42unFwCZs/7THLYhJsa'),
(5, '555', 'Zzz', 2, 4, '555', '$2y$10$d2l8vTFLWhVicGs0LBGjTOAbpTkncnEU3NUvap01NH0N70MtZwMci'),
(6, '222', 'abcd', 3, 3, '222', '$2y$10$ay/sL5Bvt3i07a28GB0DS.HhlqsW8UoLsuOI3fbGlEDR8WsrdIvka'),
(7, '444', 'xyz', 3, 6, '444', '$2y$10$.n8dpA.0cXIQIinB5NIDMeLuhjdhLjQuSkvl9DF5V1hzZIDEqsDSm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `judul_ujian` varchar(100) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `jenis` enum('acak','urut') NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `token` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `judul_ujian`, `id_guru`, `id_mapel`, `id_kelas`, `id_jurusan`, `durasi`, `jenis`, `waktu_mulai`, `waktu_selesai`, `token`) VALUES
(13, 'KUIS 1 - Bahasa Indonesia', 23, 1, 3, 4, 90, 'urut', '2021-06-08 13:00:00', '2021-06-08 14:30:00', 'D4KEM'),
(14, 'Test', 30, 3, 3, 3, 45, 'acak', '2021-06-08 07:00:00', '2021-06-08 07:45:00', 'XH108'),
(15, 'Test 1', 23, 1, 1, 1, 10, 'acak', '2021-06-11 19:00:13', '2021-06-11 19:10:13', '2MSB2'),
(34, 'UTS - Biologi', 24, 7, 2, 2, 9000, 'acak', '2021-07-04 17:00:00', '2021-07-10 23:00:00', '0JIX4'),
(35, 'KUIS - 1', 50, 11, 3, 6, 30, 'acak', '2021-06-25 08:00:00', '2021-06-25 08:30:00', 'Z5AB9'),
(36, 'UAS - Bahasa Indonesia', 23, 1, 3, 6, 1440, 'acak', '2021-07-02 23:00:00', '2021-07-03 23:00:00', 'CQWQ1'),
(37, 'UAS 2 - Bahasa Indonesia', 20, 1, 3, 6, 180, 'urut', '2021-07-02 23:55:05', '2021-07-03 02:55:05', 'YSWIK'),
(38, 'UTS - B.indo', 23, 1, 3, 2, 90, 'acak', '2021-06-30 18:00:54', '2021-06-30 19:30:54', 'JFJXF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_hasil`
--

CREATE TABLE `ujian_hasil` (
  `id` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujian_hasil`
--

INSERT INTO `ujian_hasil` (`id`, `id_ujian`, `id_siswa`, `jml_benar`, `nilai`) VALUES
(2, 36, 7, 2, 4),
(5, 35, 2, 55, 200);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE,
  ADD KEY `id_guru` (`id_guru`) USING BTREE,
  ADD KEY `id_mapel` (`id_mapel`) USING BTREE,
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `kategori_ibfk_1` (`id_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `materi_ibfk_1` (`id_guru`),
  ADD KEY `materi_ibfk_3` (`id_kelas`),
  ADD KEY `materi_ibfk_4` (`id_jurusan`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `siswa_ibfk_2` (`id_jurusan`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `ujian_hasil`
--
ALTER TABLE `ujian_hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `ujian_hasil`
--
ALTER TABLE `ujian_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD CONSTRAINT `bank_soal_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_soal_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_soal_ibfk_5` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_soal_ibfk_6` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_4` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_5` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian_hasil`
--
ALTER TABLE `ujian_hasil`
  ADD CONSTRAINT `id_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ujian_hasil_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
