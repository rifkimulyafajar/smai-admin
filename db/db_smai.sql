-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2021 pada 09.34
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
  `id_guru` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `status` enum('Latihan','Ujian') NOT NULL,
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
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_soal`
--

INSERT INTO `bank_soal` (`id_soal`, `id_guru`, `id_mapel`, `id_kategori`, `id_kelas`, `id_jurusan`, `status`, `soal`, `file_soal`, `pilihan_a`, `file_a`, `pilihan_b`, `file_b`, `pilihan_c`, `file_c`, `pilihan_d`, `file_d`, `pilihan_e`, `file_e`, `kunci`, `tanggal`) VALUES
(1, 23, 1, NULL, 2, 5, 'Ujian', '<p>siapa?</p>\r\n', NULL, 'saya', NULL, 'kamu', NULL, 'dia', NULL, 'mereka', NULL, 'kami', NULL, 'B', '2021-05-20 22:38:57'),
(2, 24, 7, NULL, 1, 6, 'Ujian', '<p>dimana?</p>\r\n', '', 'atas', '', 'bawah', '', 'kanan', '', 'kiri', '', 'belakang', '', 'D', '2021-05-20 22:55:00'),
(3, 30, 3, NULL, 1, 3, 'Latihan', '<p>two?</p>\r\n', '', '', '1.png', '', '2.png', '', '3.png', '', '4.png', '', '5.png', 'B', '2021-05-21 09:42:00'),
(8, 29, 2, 1, 3, 1, 'Latihan', '<p>ha?</p>\r\n', 'user.jpg', 'saya', '', 'kamu', '', 'kanan', '', 'mereka', '', 'belakang', '', 'E', '2021-05-24 09:38:53'),
(9, 30, 3, NULL, 3, 3, 'Latihan', '<p>Cc</p>\r\n', '', '1', '', '2', '', '1', '', 'mereka', '', 'kami', '', 'B', '2021-05-25 13:18:49'),
(11, 25, 5, NULL, 2, 5, 'Ujian', '<p>Z</p>\r\n', 'smai.jpeg', '', '', '', '', '', '', '', '', '', '', 'A', '2021-05-26 21:32:12'),
(12, 36, 2, NULL, 3, 1, 'Ujian', '<p>AAAAaaaa</p>\r\n', '', 'A', '', 'B', '', 'C', '', '', '', '', '', 'A', '2021-05-26 22:09:45'),
(16, 23, 1, NULL, 1, 2, 'Latihan', '<p>a</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', '2021-05-28 08:41:19'),
(19, 23, 1, 10, 2, 4, 'Latihan', '<p>AAA</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', 'A', '2021-05-28 19:26:26'),
(22, 29, 2, NULL, 1, 5, 'Latihan', '<p>T</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'A', '2021-05-28 21:48:46'),
(23, 24, 7, NULL, 2, 4, 'Latihan', '<p>P</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', 'A', '2021-05-29 22:27:47'),
(30, 20, 1, NULL, 1, 1, 'Latihan', '<p>1</p>\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 'B', '2021-05-31 10:37:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `id_mapel`, `username`, `password`, `level`) VALUES
(6, '111', 'admin', NULL, '111', '$2y$10$v/kiEqoQx4lCPuNd42Ts9uJoEq0M9lW4UJd50vTYq0S', 'admin'),
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
(2, 'Persamaan Variabel', 29),
(7, 'Mudah', 25),
(8, 'Susah', 25),
(10, 'Listening', 23),
(11, 'Grammar', 23);

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
  `id_guru` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
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
(29, 23, NULL, 3, 1, '40__Perubahan_Jam_Perkuliahan_selama_Puasa.pdf', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `id_kelas`, `id_jurusan`, `username`, `password`) VALUES
(1, '123', 'Aaa', 1, 6, '123', '$2y$10$/BMqInrIMa8P.4DO9aaGAuKKSGYILt3Tj5PU9wXhLgD'),
(2, '321', 'Bbb', 2, 2, '321', '$2y$10$MKQKEJakPk7/pF1rpLrKt.8P/Jlhi0rwWnmvdYhuJI3'),
(4, '333', 'Ddd', 3, 4, '333', '$2y$10$Qve/K334V8DulKdyd63jh.8r1bu9t1VgJU8vNU06Htk'),
(5, '555', 'Zzz', 2, 4, '555', '$2y$10$GkxzXT9kV64dq.rduEo1mOLNRXzJqj1XBbxwRuJ7zs/'),
(6, '222', 'abcd', 3, 3, '222', '$2y$10$Sb7TUWVxgNUau8myfZ6S4OkDJyFGFJPZsDfa4f/CkA1'),
(7, '444', 'abcd', 3, 6, '444', '$2y$10$N0h/3hceS3HKTj5wNWRpMOIeLWKzxe6ORzxRmKch.GR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(10) NOT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `durasi` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `input_banksoal_ibfk_2` (`id_kategori`),
  ADD KEY `input_banksoal_ibfk_1` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

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
  ADD KEY `id_soal` (`id_soal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD CONSTRAINT `bank_soal_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_soal_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_soal_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_soal_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_soal_ibfk_5` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `bank_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
