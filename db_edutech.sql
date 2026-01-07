-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 01:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_edutech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Desain Basis Data untuk Sistem Pembelajaran', 'Kursus ini mengajarkan cara merancang basis data relasional yang baik untuk mendukung aplikasi Learning Management System (LMS). Peserta akan memahami cara memodelkan entitas seperti pengguna, kursus, materi, dan pendaftaran siswa ke dalam struktur tabel yang efisien dan konsisten.', 2, '2026-01-06 12:01:30', '2026-01-06 12:01:30'),
(2, 'Pemrograman Web Dasar', 'Kursus ini berfokus pada pembuatan halaman web dasar menggunakan HTML, CSS, dan JavaScript dengan contoh kasus dunia pendidikan. Peserta akan belajar membangun tampilan antarmuka yang rapi, responsif, dan interaktif untuk kebutuhan portal pembelajaran atau website kelas online.', 2, '2026-01-06 12:02:03', '2026-01-06 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `course_id`, `title`, `content`, `order_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Konsep Tabel, Relasi, dan Kunci', 'Materi ini menjelaskan konsep tabel, baris, kolom, primary key, dan foreign key dalam basis data relasional. Peserta akan diajak memodelkan tabel pengguna, kursus, dan relasi pendaftaran siswa ke kursus, sehingga memahami bagaimana data saling terhubung dan dapat di-query dengan mudah.', 1, '2026-01-06 12:03:14', '2026-01-06 12:03:14'),
(2, 1, 'Normalisasi Basis Data', 'Materi ini membahas prinsip normalisasi sampai bentuk normal ketiga (3NF) dengan contoh kasus data siswa, mata kuliah, dan nilai. Tujuannya agar peserta mampu mengurangi duplikasi data dan menghindari inkonsistensi yang sering terjadi dalam sistem nilai atau presensi.', 2, '2026-01-06 12:05:48', '2026-01-06 12:05:48'),
(3, 1, 'Merancang ERD untuk LMS Sederhana', 'Materi ini memandu peserta membuat Diagram Entitas-Relasi (ERD) untuk sebuah LMS sederhana yang mencakup entitas pengguna, kursus, materi, dan progress belajar. Hasil rancangan ini kemudian dapat digunakan sebagai dasar pembuatan tabel di DBMS seperti MySQL atau PostgreSQL.', 3, '2026-01-06 12:06:18', '2026-01-06 12:06:18'),
(5, 2, 'Mendesain Tampilan dengan CSS', 'Materi ini mengajarkan cara mempercantik tampilan halaman web menggunakan CSS, termasuk pengaturan warna, ukuran teks, jarak, dan tata letak menggunakan flexbox atau grid. Peserta belajar menyusun gaya visual yang konsisten sehingga halaman web pendidikan terlihat profesional dan nyaman digunakan siswa maupun pengajar.', 2, '2026-01-06 12:07:14', '2026-01-06 12:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_12_28_143129_create_users_table', 1),
(4, '2025_12_28_143200_create_courses_table', 1),
(5, '2025_12_28_143222_create_materials_table', 1),
(6, '2025_12_28_154941_add_role_and_style_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student') NOT NULL DEFAULT 'student',
  `style` enum('serius','santai') NOT NULL DEFAULT 'santai',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enrolled_courses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`enrolled_courses`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `style`, `remember_token`, `created_at`, `updated_at`, `enrolled_courses`) VALUES
(1, 'aldy', 'aldyal@gmail.com', NULL, '$2y$12$pYDHEkrt7wZZP10jK.sOWO5Oct6g55oRxa/6iWtG/.3hxN2nhj.ES', 'student', 'santai', NULL, '2026-01-06 09:27:55', '2026-01-06 09:27:55', NULL),
(2, 'aldy', 'aldya@gmail.com', NULL, '$2y$12$a/oWIBoBHDbey11/mrlWheW3xIqASmFYPvIuUe64JB4p73MD7aLBC', 'admin', 'santai', NULL, '2026-01-06 10:33:04', '2026-01-06 10:33:04', NULL),
(3, 'nandini', 'nandini@gmail.com', NULL, '$2y$12$SJl26g/8MtLGNhJ6HHnKrOvvFVvFVZsgMR2.wgC3kR/5IEwbIlfOS', 'student', 'santai', NULL, '2026-01-06 12:14:25', '2026-01-06 13:12:59', '[\"2\",\"1\"]'),
(4, 'Nandini Ananda Syifa', 'anandasyifa.2518@gmail.com', NULL, '$2y$12$Us5Ga7Bjqu.CVeHVxhY1sOVqrNuJz4GVr1iyYY0sDYsBrBc55kcDO', 'student', 'santai', NULL, '2026-01-06 13:24:59', '2026-01-06 13:25:51', '[\"2\"]'),
(5, 'Nandini Ananda Syifa', 'student@gmail.com', NULL, '$2y$12$u81x3KMt95h35gQzkxujUee1Z4BWJLyc58PZOKV4cvQYyLPPAdx0i', 'student', 'santai', NULL, '2026-01-06 16:17:50', '2026-01-06 16:28:10', '[\"2\",\"1\"]'),
(6, 'syifa', 'syifa@gmail.com', NULL, '$2y$12$t8iW1v5IYZhzGjYUZSp/E.mkn27OnlzjA28.o8ihFizG7g4Q9968.', 'admin', 'santai', NULL, '2026-01-06 16:35:57', '2026-01-06 16:35:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_title_unique` (`title`),
  ADD KEY `courses_created_by_foreign` (`created_by`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_student_id_foreign` (`student_id`),
  ADD KEY `course_student_course_id_foreign` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
