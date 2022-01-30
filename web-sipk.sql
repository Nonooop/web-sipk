-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 28 Jan 2022 pada 15.39
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
-- Database: `web-sipk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(10) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `alamat_dosen` varchar(100) NOT NULL,
  `noHp_dosen` varchar(15) NOT NULL,
  `email_dosen` varchar(25) NOT NULL,
  `foto_dosen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `alamat_dosen`, `noHp_dosen`, `email_dosen`, `foto_dosen`) VALUES
('0406107803', 'Halimil Fathi', 'Purwakarta', '087079993011', 'halimil.fathi@pei.ac.id', 'Foto Dosen/1641823907-Man.jpg'),
('0408057602', 'Widya Andayani Rahayu', 'Koloni Indorama', '087879793432', 'widya.andayani@pei.ac.id', 'Foto Dosen/1641823608-Woman.jpg'),
('0412128205', 'Musawarman', 'Cikalong Wetan', '085795192182', 'musawarman@pei.ac.id', 'Foto Dosen/1641969003-Man.jpg'),
('0708098901', 'Muhammad Nugraha', 'Purwakarta', '081222771911', 'nugraha@pei.ac.id', ''),
('1005128601', 'Heti Mulyani', 'Wanayasa', '085294854501', 'heti.mulyani@pei.ac.id', ''),
('1017088502', 'Ricak Agus Setiawan', '', '087821555203', 'ricak@pei.ac.id', ''),
('1031212345', 'Ade Winarni', 'Wanayasa', '087862030400', 'adewina@pei.ac.id', 'Foto Dosen/1642184945-Woman.jpg'),
('201904005', 'Nopi Rahmawati', 'jatiluhur', '089609405716', 'nopiraa01@gmail.com', 'Foto Dosen/1642184488-[09]Ahma_01.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `kd_hari` varchar(10) NOT NULL,
  `nama_hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`kd_hari`, `nama_hari`) VALUES
('H001', 'Senin'),
('H002', 'Selasa'),
('H003', 'Rabu'),
('H004', 'Kamis'),
('H005', 'Jum\'at');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `kd_jadwal` varchar(10) NOT NULL,
  `kd_hari` varchar(10) NOT NULL,
  `kd_jam` varchar(10) NOT NULL,
  `kd_matakuliah` varchar(10) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `kd_ruangan` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`kd_jadwal`, `kd_hari`, `kd_jam`, `kd_matakuliah`, `nidn`, `kd_ruangan`, `kd_prodi`) VALUES
('JD0001', 'H001', 'J002', 'SE505', '1031212345', 'R006', 'PRD004'),
('JD0002', 'H001', 'J009', 'GC501', '0408057602', 'R006', 'PRD004'),
('JD0003', 'H002', 'J002', 'SE506', '1031212345', 'R005', 'PRD004'),
('JD0004', 'H002', 'J009', 'SE502', '1017088502', 'R005', 'PRD004'),
('JD0005', 'H003', 'J003', 'SE504', '0708098901', 'R007', 'PRD004'),
('JD0006', 'H004', 'J003', 'SE503', '0412128205', 'R006', 'PRD004'),
('JD0007', 'H005', 'J002', 'SE501', '0412128205', 'R007', 'PRD004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `kd_jam` varchar(10) NOT NULL,
  `jam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`kd_jam`, `jam`) VALUES
('J001', '07:30 - 09:10'),
('J002', '08:00 - 11:30'),
('J003', '08:00 - 11:50'),
('J004', '11:00 - 11:50'),
('J005', '13:00 - 13:50'),
('J006', '13:00 - 15:50'),
('J007', '13:00 - 15:50'),
('J008', '14:00 - 15:40'),
('J009', '14:00 - 16:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kd_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kd_matakuliah`, `nama_matakuliah`, `sks`, `semester`) VALUES
('GC101', 'Bahasa Inggris 1 (VOCAB)', 2, '1'),
('GC201', 'Bahasa Inggris 2 ( Speaking)', 2, '2'),
('GC301', 'Bahasa Inggris 3 ( Reading)', 2, '3'),
('GC401', 'Bahasa Inggris 4 (Writing)', 2, '4'),
('GC501', 'Bahasa Inggris 5 (Tenses)', 2, '5'),
('GC601', 'Bahasa Inggris 6 (TOEIC)', 2, '6'),
('GC701', 'Bahasa Indonesia', 2, '7'),
('GC702', 'Statistik', 3, '7'),
('GC801', 'Kewarganegaraan', 2, '8'),
('GC802', 'Pancasila', 2, '8'),
('GC803', 'Pendidikan Agama', 2, '8'),
('SE101', 'Algoritma & Pemrograman', 3, '1'),
('SE102', 'Aljabar Linear', 2, '1'),
('SE103', 'Kalkulus', 2, '1'),
('SE104', 'Komunikasi Data & Jaringan Komputer', 3, '1'),
('SE105', 'Pengantar Teknologi Informasi & Komunikasi', 2, '1'),
('SE106', 'Praktek Magang DTY 1', 1, '1'),
('SE107', 'Sistem Operasi', 3, '1'),
('SE201', 'Arsitektur Komputer', 2, '2'),
('SE202', 'Dasar-Dasar Keamanan Komputer', 3, '2'),
('SE203', 'Design dan Pemrograman Database SQL', 3, '2'),
('SE204', 'Pengantar Interaksi Manusia dan Komputer', 2, '2'),
('SE205', 'Pengantar Rekayasa Perangkat Lunak', 2, '2'),
('SE206', 'Praktek Magang DTY 2', 1, '2'),
('SE207', 'Struktur Data', 3, '2'),
('SE301', 'Analisis & Desain Perangkat Lunak', 3, '3'),
('SE302', 'Pemrograman Database PL/SQL', 4, '3'),
('SE303', 'Pemrograman Berorientasi Objek', 4, '3'),
('SE304', 'Pemrograman WEB 1', 3, '3'),
('SE305', 'Matematika Diskrit', 2, '3'),
('SE401', 'Pemrograman XML', 3, '4'),
('SE402', 'Keamanan Perangkat Lunak', 2, '4'),
('SE403', 'Oracle Application Express (APEX)', 3, '4'),
('SE404', 'Pemrograman Berorientasi Objek Lanjut', 4, '4'),
('SE405', 'Pemrograman WEB 2 (PHP)', 3, '4'),
('SE406', 'Rekayasa Kebutuhan Perangkat Lunak', 2, '4'),
('SE501', 'Pemrograman Perangkat Bergerak 1', 3, '5'),
('SE502', 'Pengujian Perangkat Lunak', 2, '5'),
('SE503', 'Pemrograman Visual', 4, '5'),
('SE504', 'Pemrograman WEB 3 (Framework)', 3, '5'),
('SE505', 'Sistem Terdistribusi', 3, '5'),
('SE506', 'Enterprise Resource Planning (ERP)', 3, '5'),
('SE601', 'Data Mining', 3, '6'),
('SE602', 'Pemrograman Perangkat Bergerak 2', 3, '6'),
('SE603', 'Jaminan Kualitas Perangkat Lunak (SOA)', 3, '6'),
('SE604', 'Manajemen Proyek Perangkat Lunak', 3, '6'),
('SE605', 'Cloud Computing', 3, '6'),
('SE606', 'Sistem Pendukung Keputusan', 3, '6'),
('SE701', 'Metodologi Penelitian', 2, '7'),
('SE702', 'Pemrograman IOS', 4, '7'),
('SE703', 'Praktik Kerja Lapang', 6, '7'),
('SE801', 'Etika Profesi', 2, '8'),
('SE802', 'Tugas Akhir', 6, '8'),
('SE803', 'Technopreneur', 2, '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `nama_prodi`, `keterangan`) VALUES
('PRD001', 'Teknologi Mesin', 'MSN'),
('PRD002', 'Teknik Mekatronika', 'MKT'),
('PRD003', 'Teknologi Listrik', 'ELKT'),
('PRD004', 'Teknologi Rekayasa Perangkat Lunak', 'TRPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(25) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`kd_ruangan`, `nama_ruangan`, `kapasitas`, `keterangan`) VALUES
('R001', 'B1', 30, 'Kelas'),
('R002', 'B2', 30, 'Kelas'),
('R003', 'B3', 30, 'Kelas'),
('R004', 'B4', 30, 'Kelas'),
('R005', 'B5', 30, 'Kelas'),
('R006', 'B7', 30, 'Laboratorium Komputer'),
('R007', 'B8', 30, 'Laboratorium Komputer'),
('R008', 'Lab Kimia', 30, 'Laboratorium'),
('R009', 'Lab Fisika', 30, 'Laboratorium'),
('R010', 'Bengkel Mesin', 30, 'Workshop'),
('R011', 'Bengkel Mekatronika', 30, 'Workshop'),
('R012', 'Bengkel Elektro', 30, 'Workshop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `kd_TA` varchar(10) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`kd_TA`, `tahun_akademik`, `semester`, `status`) VALUES
('TA20181', '2018', 'Ganjil', 'Aktif'),
('TA20182', '2018', 'Genap', 'Aktif'),
('TA20191', '2019', 'Ganjil', 'Aktif'),
('TA20192', '2019', 'Genap', 'Aktif'),
('TA20201', '2020', 'Ganjil', 'Aktif'),
('TA20202', '2020', 'Genap', 'Aktif'),
('TA20211', '2021', 'Ganjil', 'Aktif'),
('TA20212', '2021', 'Genap', 'Aktif'),
('TA20221', '2022', 'Ganjil', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `foto`) VALUES
(3, 'Luthfiyah Sakinah', 'piaasan@gmail.com', NULL, '$2y$10$kVeu4DVoaTTIcBPM33xJteDKCOMICeXVtCcl1YSp4dKWZ84.IM1l2', NULL, '2022-01-11 00:27:01', '2022-01-18 09:31:32', 'Pengguna', 'foto/1642523492-[20]Dedeek_04.png'),
(4, 'Ayu Siti Rohmah', 'ayu@gmail.com', NULL, '$2y$10$wsVZGFeDmvml2bbPheHbceAoh38CTeY1IdYdLCxR8SO6ZE1OjB9Te', NULL, '2022-01-11 23:31:19', '2022-01-18 09:31:49', 'Pengguna', 'foto/1642523509-[16]Aleek_06.png'),
(5, 'Adila', 'adila@gmail.com', NULL, '$2y$10$rCr2nXsQ..9xjMrPX1xJHu.7KcxB8UCVf4YjdZAkVXmhlnMa3iL1G', NULL, '2022-01-12 06:07:09', '2022-01-12 06:07:09', 'Pengguna', NULL),
(8, 'Nopi Rahmawati', 'nopiraa01@gmail.com', NULL, '$2y$10$mi3Y4fGK3I.QNP7e3ay75.vFHNPJy.a8ubJTVeKAK0aNpGTmaEXwy', NULL, '2022-01-17 08:37:15', '2022-01-18 10:22:13', 'Administrator', 'foto/1642526533-[09]Ahma_01.png'),
(12, 'king', 'kingkang@gmail.com', NULL, '$2y$10$Rwx76a91r6Ael8GoYuCZMOPo6ZGq6.iKfqFn65n8qDCqvqLJ6hBJe', NULL, '2022-01-26 11:23:03', '2022-01-26 11:23:03', 'Administrator', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `kd_waktu` varchar(10) NOT NULL,
  `kd_hari` varchar(10) NOT NULL,
  `kd_jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`kd_hari`);

--
-- Indeks untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_hari` (`kd_hari`),
  ADD KEY `kd_jam` (`kd_jam`),
  ADD KEY `kd_matakuliah` (`kd_matakuliah`),
  ADD KEY `kd_dosen` (`nidn`),
  ADD KEY `kd_ruangan` (`kd_ruangan`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`kd_jam`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kd_matakuliah`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kd_ruangan`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`kd_TA`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`kd_waktu`),
  ADD UNIQUE KEY `kd_hari` (`kd_hari`,`kd_jam`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`kd_hari`) REFERENCES `hari` (`kd_hari`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ibfk_2` FOREIGN KEY (`kd_jam`) REFERENCES `jam` (`kd_jam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ibfk_3` FOREIGN KEY (`kd_matakuliah`) REFERENCES `matakuliah` (`kd_matakuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ibfk_4` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ibfk_5` FOREIGN KEY (`kd_ruangan`) REFERENCES `ruangan` (`kd_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ibfk_6` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
