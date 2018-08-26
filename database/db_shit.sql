-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 26 Agu 2018 pada 10.23
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_client`
--

CREATE TABLE `m_client` (
  `id_master_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_client` varchar(150) NOT NULL,
  `slug_mc` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `file_1` varchar(150) NOT NULL,
  `nrk` varchar(15) NOT NULL,
  `alamat_client` varchar(250) NOT NULL,
  `no_telp_client` varchar(20) NOT NULL,
  `no_fax_client` varchar(20) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `npwp_client` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_client`
--

INSERT INTO `m_client` (`id_master_client`, `id_user`, `nama_client`, `slug_mc`, `image`, `file_1`, `nrk`, `alamat_client`, `no_telp_client`, `no_fax_client`, `pic`, `email_client`, `npwp_client`, `tanggal`) VALUES
(3, 0, 'PT Suka Maju Mundur', 'pt-suka-maju-mundur', 'Screen_Shot_2018-08-08_at_6_24_47_PM.png', '', 'KN0001', 'jl. cenat cenut cenat cenut', '021-8987387', '021-8987387', 'TB Maulana', 'helo@moladin.com', '8934879364873', '2018-08-18 03:23:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_dokumentasi`
--

CREATE TABLE `m_dokumentasi` (
  `id_dok` int(11) NOT NULL,
  `id_master_client` int(11) NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `slug_jabatan` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jabatan`
--

INSERT INTO `m_jabatan` (`id_jabatan`, `id_user`, `jabatan`, `slug_jabatan`, `isi`, `date`) VALUES
(6, 0, 'Managing Partner', '12-managing-partner', 'All of Manager', '2018-03-06 03:21:53'),
(7, 2, 'Partner', 'partner', 'All of Partner', '2018-01-14 02:53:08'),
(8, 2, 'Senior Lawyer', 'senior-lawyer', 'All of Senior Lawyer', '2018-01-14 02:53:26'),
(9, 2, 'Lawyer', 'lawyer', 'All of Lawyer', '2018-01-14 02:53:40'),
(10, 2, 'Paralegal', 'paralegal', 'All of Paralegal', '2018-01-14 02:53:55'),
(11, 2, 'Support', 'support', 'All of Support', '2018-01-15 04:23:41'),
(12, 2, 'Divisi IT', 'divisi-it', 'All of Divisi IT', '2018-01-15 04:24:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_karyawan`
--

CREATE TABLE `m_karyawan` (
  `id_staff` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(10) NOT NULL,
  `no_advokat` int(11) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `npwp` int(20) NOT NULL,
  `bpjs` int(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `biodata` text NOT NULL,
  `status_staff` varchar(20) NOT NULL,
  `status_karyawan` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_karyawan`
--

INSERT INTO `m_karyawan` (`id_staff`, `nama`, `nip`, `no_advokat`, `id_jabatan`, `gender`, `tempat_lahir`, `tgl_lahir`, `pendidikan`, `sertifikat`, `npwp`, `bpjs`, `email`, `linkedin`, `biodata`, `status_staff`, `status_karyawan`, `image`, `ukuran`, `keyword`, `tanggal`) VALUES
(25, 'Muhammad Army', 123213, 123123, 7, 'Pria', 'Ambon', '2018-04-30', '<p>asdasd</p>\r\n<div id=\"selenium-highlight\">&nbsp;</div>\r\n<div id=\"selenium-highlight\">&nbsp;</div>', 'asd', 123, 123, 'muhammadarmy14@gmail.com', 'https://www.linkedin.com/in/m-army/', 'asdasd', 'No', 'Aktif', 'Screen_Shot_2018-04-25_at_5_21_48_PM3.png', 'Small', 'asd', '2018-06-22 05:42:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kontrak`
--

CREATE TABLE `m_kontrak` (
  `id_master_kk` int(11) NOT NULL,
  `id_master_client` int(11) NOT NULL,
  `no_pa` int(11) NOT NULL,
  `nr_k` varchar(20) NOT NULL,
  `no_kontrak` varchar(25) NOT NULL,
  `probs` text NOT NULL,
  `file` varchar(250) NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `start` date NOT NULL,
  `due` date NOT NULL,
  `stts_kontrak` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kontrak`
--

INSERT INTO `m_kontrak` (`id_master_kk`, `id_master_client`, `no_pa`, `nr_k`, `no_kontrak`, `probs`, `file`, `tgl_kontrak`, `start`, `due`, `stts_kontrak`, `date`) VALUES
(12, 2, 5, 'KK0001', '1231233123', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>&nbsp;</p>\r\n<div id=\"selenium-highlight\">&nbsp;</div>\r\n<div id=\"selenium-highlight\">&nbsp;</div>', 'Tugas Komunikasi Radio.docx', '2018-05-12', '2018-05-15', '2018-05-19', 'On Going', '2018-05-30 11:51:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pa`
--

CREATE TABLE `m_pa` (
  `id_pa` int(11) NOT NULL,
  `no_pa` varchar(20) NOT NULL,
  `id_master_client` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pa`
--

INSERT INTO `m_pa` (`id_pa`, `no_pa`, `id_master_client`, `tanggal`) VALUES
(6, 'KK/MRP-PA/0001', 3, '2018-08-18 03:47:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'Unknown',
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `name`, `description`, `group`, `order`) VALUES
(1, 'add-lawyer', 'Add Lawyers', 'Menambah Lawyer Baru', 'Lawyer', 1),
(2, 'edit-lawyer', 'Edit Lawyers', 'Mengubah Data Lawyer', 'Lawyer', 2),
(3, 'delete-lawyer', 'Delete Lawyers', 'Menghapus Data Lawyer', 'Lawyer', 3),
(4, 'detail-lawyer', 'Detail Lawyer', 'Melihat Detail Profile Lawyer', 'Lawyer', 4),
(5, 'add-client', 'Add Client', 'Menambah Klien Baru', 'Client', 1),
(6, 'edit-client', 'Edit Client', 'Mengedit Data Klien', 'Client', 2),
(7, 'delete-client', 'Delete Client', 'Menghapus Data Klien', 'Client', 3),
(8, 'detail-client', 'Detail CLient', 'Melihat Detail Profile Klien', 'Client', 4),
(9, 'add-pa', 'Add PA', 'Menambah Partnership Agreement Baru', 'PA', 1),
(10, 'edit-pa', 'Edit PA', 'Mengedit Data Partnership Agreement', 'PA', 2),
(11, 'delete-pa', 'Delete PA', 'Menghapus Data Partnership Agreement', 'PA', 3),
(12, 'add-kontrak-kerja', 'Add Kontrak Kerja', 'Menambahkan Kontrak Kerja Sama Baru', 'Kontrak Kerja', 1),
(13, 'edit-kontrak-kerja', 'Edit Kontrak Kerja', 'Mengubah Data Kontrak Kerja Sama', 'Kontrak Kerja', 2),
(14, 'delete-kontrak-kerja', 'Delete Kontrak Kerja', 'Menghapus Data Kontrak Kerja', 'Kontrak Kerja', 3),
(15, 'detail-kontrak-kerja', 'Detail Kontrak Kerja', 'Melihat Detail Kontrak Kerja Sama', 'Kontrak Kerja', 4),
(16, 'add-dokumentasi', 'Add Dokumentasi', 'Menambahkan Data Dokumentasi Baru', 'Documentation', 1),
(17, 'edit-dokumentasi', 'Edit Dokumentasi', 'Mengubah Data/File Dokumentasi', 'Documentation', 2),
(18, 'delete-dokumentasi', 'Delete Dokumentasi', 'Menghapus Data Dokumentasi Klien', 'Documentation', 3),
(19, 'add-user', 'Add User', 'Menambah User baru', 'User Managaments', 1),
(20, 'edit-user', 'Edit User', 'Mengubah Data User', 'User Managaments', 2),
(21, 'delete-user', 'Delete User', 'Menghapus Data User', 'User Managaments', 3),
(22, 'create-invoice', 'Create Invoice', 'Membuat Invoice Ke Klien', 'Finance', 1),
(23, 'update-invoice', 'Update Invoice', 'Mengubah Data Invoice Klien', 'Finance', 2),
(24, 'detail-invoice', 'Detail Invoice', 'Melihat Detail Invoice Klien', 'Finance', 3),
(25, 'print-invoice', 'Print Invoice', 'Cetak Invoice Klien', 'Finance', 4),
(26, 'create-report-keuangan', 'Create Report Keuangan', 'Membuat Laporan Keuangan', 'Finance', 5),
(27, 'Create-reprot-lawyer', 'Create Report Lawyer', 'Membuat Laporan Keaktifan Lawyer', 'Finance', 6),
(28, 'create-report-kontrak-kerja', 'Create Report Kontrak Kerja', 'Membuat Laporan Kerja Sama Terhadap Klien', 'Finance', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Semua Akses ke File Directory'),
(2, 'Partner', 'Partners Role'),
(3, 'Finance & SDM', 'Finance & SDM Role'),
(4, 'Dokumentasi', 'Hanya yang memiliki otoritas untuk Dokumentasi'),
(5, 'Lawyers', 'Lawyers Role');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `permission_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 3, 22),
(23, 3, 24),
(24, 3, 25),
(25, 3, 26),
(26, 3, 27),
(27, 3, 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id_user`, `username`, `password`, `full_name`, `status`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrator', 'administrator'),
(2, 'sim', '813221ca5f14cb8312a6a48ff433c41b2cbb2877', 'Hanif Ahmad F.', 'support'),
(3, 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 'Dr. Dodi S. Abdulkadir', 'managing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `role_id`) VALUES
(1, 'admin', '$2a$08$VuOP/as2sMapjTfai7nEzOrzULGuowRCkhVu6L0AKuNMWVW2qFm2K', 'muhammadarmy15@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2018-08-26 09:23:59', '2018-01-31 07:13:37', '2018-08-26 07:23:59', 1),
(9, 'army', '$2a$08$28YcEreUwMO4Xz4FWOg2veC79yLdTDeFWUWRBq1M7Qbym.cPJo9XO', 'muhammadarmy14@gmail.com', 0, 0, NULL, NULL, NULL, NULL, '490363decd662b8499d574b709e5aa74', '::1', '0000-00-00 00:00:00', '2018-04-30 22:03:08', '2018-08-08 14:32:10', 2),
(10, 'faycoba', '$2a$08$KxUJOYEjS/.Mxw.uOyqDs.mQWAY6hrj11Ud8aZrfkCUR5Wa63nPwa', 'fay.zabadi@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 'e8bf322eb998a770ce636ed7fd58f2a0', '::1', '0000-00-00 00:00:00', '2018-08-16 14:03:12', '2018-08-16 12:03:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 1, NULL, NULL),
(2, 5, NULL, NULL),
(3, 13, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_client`
--
ALTER TABLE `m_client`
  ADD PRIMARY KEY (`id_master_client`),
  ADD UNIQUE KEY `nrk` (`nrk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `m_dokumentasi`
--
ALTER TABLE `m_dokumentasi`
  ADD PRIMARY KEY (`id_dok`),
  ADD KEY `id_master_client` (`id_master_client`);

--
-- Indexes for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `jabatan` (`id_jabatan`);

--
-- Indexes for table `m_kontrak`
--
ALTER TABLE `m_kontrak`
  ADD PRIMARY KEY (`id_master_kk`),
  ADD UNIQUE KEY `nr_k` (`nr_k`),
  ADD KEY `id_master_client` (`id_master_client`),
  ADD KEY `id_pa` (`no_pa`),
  ADD KEY `id_pa_2` (`no_pa`);

--
-- Indexes for table `m_pa`
--
ALTER TABLE `m_pa`
  ADD PRIMARY KEY (`id_pa`),
  ADD UNIQUE KEY `no_pa` (`no_pa`),
  ADD KEY `id_master_client` (`id_master_client`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_client`
--
ALTER TABLE `m_client`
  MODIFY `id_master_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_dokumentasi`
--
ALTER TABLE `m_dokumentasi`
  MODIFY `id_dok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `m_kontrak`
--
ALTER TABLE `m_kontrak`
  MODIFY `id_master_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_pa`
--
ALTER TABLE `m_pa`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
