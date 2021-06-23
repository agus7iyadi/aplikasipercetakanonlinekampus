/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `projek2_mager` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projek2_mager`;

CREATE TABLE IF NOT EXISTS `tbl_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namafiletampil` varchar(50) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `namapemesan` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `jwarna` int(50) NOT NULL,
  `jhitamputih` int(50) NOT NULL,
  `jumlahtotal` varchar(50) NOT NULL DEFAULT '',
  `pengambilan` int(1) NOT NULL COMMENT '1. ambil sendiri 2. dikirm',
  `paket` int(11) NOT NULL COMMENT '1.standar 2.paket cepat',
  `status` int(1) NOT NULL COMMENT '1. menunggu 2.diterima 3.ditolak 4. selesai',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `tbl_file` DISABLE KEYS */;
INSERT INTO `tbl_file` (`id`, `namafiletampil`, `filename`, `email`, `namapemesan`, `deskripsi`, `jwarna`, `jhitamputih`, `jumlahtotal`, `pengambilan`, `paket`, `status`, `create_at`) VALUES
	(32, 'test order 1', 'cbdf02f83fb24555aa8ab607feaecacd.pdf', 'pengguna@gmail.com', '', 'saya order ya , dengan cepat', 10, 10, '15000', 1, 1, 1, '2021-06-23 18:54:15');
/*!40000 ALTER TABLE `tbl_file` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `notelp` varchar(25) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `email`, `notelp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(15, 'pengguna', 'pengguna@gmail.com', '089620356592', 'telor.jpg', '$2y$10$QalOIQni4XTuSJe7VJ.iku94aftm6OqM6To1qFNHljkl0MJxa7LvK', 2, 1, 1553006738),
	(31, 'admin', 'admin@gmail.com', '089273982800', 'fist-male-hand_7888-169.jpg', '$2y$10$QalOIQni4XTuSJe7VJ.iku94aftm6OqM6To1qFNHljkl0MJxa7LvK', 1, 1, 1555946418);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 2),
	(4, 1, 3);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'User');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `role`) VALUES
	(1, 'Administrator'),
	(2, 'Member'),
	(3, 'MemberBanned');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
	(1, 1, 'Home', 'admin', 'fas fa-fw fa-home', 1),
	(3, 1, 'Order', 'admin/transaksi', 'fas fa-fw fa-shopping-cart', 1),
	(4, 1, 'Histori Order', 'admin/historitransaksi', 'fas fa-fw fa-history', 1),
	(6, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
	(7, 2, 'Ganti Password', 'user/gantipassword', 'fas fa-fw fa-key', 1),
	(8, 1, 'List User', 'admin/listuser', 'fas fa-fw fa-users', 1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
