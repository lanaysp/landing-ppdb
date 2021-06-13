-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;



-- Dumping structure for table evolutionschool.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pemilik` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.archivements
CREATE TABLE IF NOT EXISTS `archivements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `archivement_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivement_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivement_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.archivements: ~0 rows (approximately)
/*!40000 ALTER TABLE `archivements` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivements` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.beasiswas
CREATE TABLE IF NOT EXISTS `beasiswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.beasiswas: ~0 rows (approximately)
/*!40000 ALTER TABLE `beasiswas` DISABLE KEYS */;
/*!40000 ALTER TABLE `beasiswas` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.cat_news
CREATE TABLE IF NOT EXISTS `cat_news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.cat_news: ~0 rows (approximately)
/*!40000 ALTER TABLE `cat_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_news` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.contacts: ~0 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.customer_services
CREATE TABLE IF NOT EXISTS `customer_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `sapaan` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table evolutionschool.customer_services: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_services` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.departments: ~0 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `department_name`, `pemilik_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Administrator', '1', NULL, NULL, NULL);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.designations
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.designations: ~0 rows (approximately)
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` (`id`, `department_id`, `designation_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Admin', NULL, NULL, NULL);
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.detail_penggunas
CREATE TABLE IF NOT EXISTS `detail_penggunas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_pengguna` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `detail_penggunas_user_id_unique` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.detail_penggunas: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_penggunas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_penggunas` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanda_tangan_id` int(11) NOT NULL,
  `document_category_id` int(11) NOT NULL,
  `template_document_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_tanda_tangan_id_index` (`tanda_tangan_id`),
  KEY `documents_document_category_id_index` (`document_category_id`),
  KEY `documents_template_document_id_index` (`template_document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.documents: ~0 rows (approximately)
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.document_categories
CREATE TABLE IF NOT EXISTS `document_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.document_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `document_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_categories` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponsel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.employees: ~2 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `first_name`, `last_name`, `middle_name`, `salary`, `ktp`, `nik`, `kk`, `jk`, `ponsel`, `ttl`, `photo`, `username`, `alamat`, `designation_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Muhammad', 'Hidayatullah', 'Dede', '6000000', 'uploads/document//I209cCOhCuVkfNkVkKTE4IZTERzvTiliFgWw4M3e.jpeg', '1018201929', '829111281298', 'L', '6285794298878', '2001-02-05', 'uploads/pegawai//VKZgINMpMc0dv9XWUahkeVeH3PhI2Ed4Z6DcD24D.jpeg', 'dedehidayat', 'Kp Panagoga Rt 30 rw 10, Desa Gunung Endut, Kec. Kalapanunggal Kab Sukabumi, Jawa Barat', '1', NULL, NULL, NULL),
	(2, 'Harum', 'Hermawan', 'Sidik', '6500000', 'uploads/document//GkdbTmLsp8Em8DFKqUk8NXBVFK7XLhzYveBdajRj.jpeg', '281918118919', '181718261028', 'L', '6282719172899', '2001-02-05', 'uploads/pegawai//5XdGj9qme4USF3StaNbBo8aXAnos0XQq5XzdaU7a.jpeg', 'harumsisidk', 'Apartemen gading nias resident.cahaya properti tower emerald SHU 01, RT.13/RW.3, Pegangsaan Dua, Kec. Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14250', '1', NULL, NULL, NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.employee_abouts
CREATE TABLE IF NOT EXISTS `employee_abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.employee_abouts: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_abouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_abouts` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.employee_education
CREATE TABLE IF NOT EXISTS `employee_education` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.employee_education: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_education` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.employee_experiences
CREATE TABLE IF NOT EXISTS `employee_experiences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.employee_experiences: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_experiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_experiences` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.employee_galleries
CREATE TABLE IF NOT EXISTS `employee_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `gallery_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.employee_galleries: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_galleries` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.employee_skills
CREATE TABLE IF NOT EXISTS `employee_skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `skill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persentase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.employee_skills: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_skills` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.employee_sosmeds
CREATE TABLE IF NOT EXISTS `employee_sosmeds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sosmed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.employee_sosmeds: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_sosmeds` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_sosmeds` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_cat_id` int(11) NOT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.events: ~0 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.event_cats
CREATE TABLE IF NOT EXISTS `event_cats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.event_cats: ~0 rows (approximately)
/*!40000 ALTER TABLE `event_cats` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_cats` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.extrakulikulers
CREATE TABLE IF NOT EXISTS `extrakulikulers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `extra_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.extrakulikulers: ~0 rows (approximately)
/*!40000 ALTER TABLE `extrakulikulers` DISABLE KEYS */;
/*!40000 ALTER TABLE `extrakulikulers` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facility_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.fasilitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.features
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `feature_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.features: ~0 rows (approximately)
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
/*!40000 ALTER TABLE `features` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.forums
CREATE TABLE IF NOT EXISTS `forums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forums_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.forums: ~0 rows (approximately)
/*!40000 ALTER TABLE `forums` DISABLE KEYS */;
/*!40000 ALTER TABLE `forums` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `caption_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.galleries: ~0 rows (approximately)
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.gelombangs
CREATE TABLE IF NOT EXISTS `gelombangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(11) NOT NULL,
  `nama_gelombang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_akhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai_tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.gelombangs: ~0 rows (approximately)
/*!40000 ALTER TABLE `gelombangs` DISABLE KEYS */;
/*!40000 ALTER TABLE `gelombangs` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.generals
CREATE TABLE IF NOT EXISTS `generals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.generals: ~0 rows (approximately)
/*!40000 ALTER TABLE `generals` DISABLE KEYS */;
/*!40000 ALTER TABLE `generals` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.guides
CREATE TABLE IF NOT EXISTS `guides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.guides: ~0 rows (approximately)
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;
/*!40000 ALTER TABLE `guides` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.histories
CREATE TABLE IF NOT EXISTS `histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.histories: ~0 rows (approximately)
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pukul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.log_activities
CREATE TABLE IF NOT EXISTS `log_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.log_activities: ~0 rows (approximately)
/*!40000 ALTER TABLE `log_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_activities` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.mading_boards
CREATE TABLE IF NOT EXISTS `mading_boards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_mading` int(11) NOT NULL DEFAULT 0,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.mading_boards: ~0 rows (approximately)
/*!40000 ALTER TABLE `mading_boards` DISABLE KEYS */;
/*!40000 ALTER TABLE `mading_boards` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.mailings
CREATE TABLE IF NOT EXISTS `mailings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.mailings: ~0 rows (approximately)
/*!40000 ALTER TABLE `mailings` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailings` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.mapels
CREATE TABLE IF NOT EXISTS `mapels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mapel_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `mapel_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mapels_mapel_code_unique` (`mapel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.mapels: ~0 rows (approximately)
/*!40000 ALTER TABLE `mapels` DISABLE KEYS */;
/*!40000 ALTER TABLE `mapels` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cat_news_id` int(11) NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.news: ~0 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.news_comments
CREATE TABLE IF NOT EXISTS `news_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.news_comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `news_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_comments` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.news_views
CREATE TABLE IF NOT EXISTS `news_views` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.news_views: ~0 rows (approximately)
/*!40000 ALTER TABLE `news_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_views` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.news_visits
CREATE TABLE IF NOT EXISTS `news_visits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `perangkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.news_visits: ~0 rows (approximately)
/*!40000 ALTER TABLE `news_visits` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_visits` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.other_infos
CREATE TABLE IF NOT EXISTS `other_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.other_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `other_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `other_infos` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.page_builders
CREATE TABLE IF NOT EXISTS `page_builders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.page_builders: ~0 rows (approximately)
/*!40000 ALTER TABLE `page_builders` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_builders` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.pemiliks
CREATE TABLE IF NOT EXISTS `pemiliks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.pemiliks: ~0 rows (approximately)
/*!40000 ALTER TABLE `pemiliks` DISABLE KEYS */;
INSERT INTO `pemiliks` (`id`, `atas_nama`, `license`, `no_invoice`, `created_at`, `updated_at`) VALUES
	(1, 'Dede Hidayatullah', '', '', NULL, '2021-03-04 03:12:07');
/*!40000 ALTER TABLE `pemiliks` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.pengumumen
CREATE TABLE IF NOT EXISTS `pengumumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type_announcement` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table evolutionschool.pengumumen: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengumumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengumumen` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.ppdbs
CREATE TABLE IF NOT EXISTS `ppdbs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `beasiswa_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelombang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_asal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_tinggal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportasi_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_tinggal_ortu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jakar_kesekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_saudara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akta_kelahiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kartu_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kps_kks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_memilik_sekolah` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hal_diketahui` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ppdbs_nik_unique` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.ppdbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `ppdbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `ppdbs` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.ppdb_meets
CREATE TABLE IF NOT EXISTS `ppdb_meets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.ppdb_meets: ~0 rows (approximately)
/*!40000 ALTER TABLE `ppdb_meets` DISABLE KEYS */;
/*!40000 ALTER TABLE `ppdb_meets` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.reply_forums
CREATE TABLE IF NOT EXISTS `reply_forums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reply_forums_forum_id_index` (`forum_id`),
  KEY `reply_forums_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.reply_forums: ~0 rows (approximately)
/*!40000 ALTER TABLE `reply_forums` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply_forums` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.sett_generals
CREATE TABLE IF NOT EXISTS `sett_generals` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `website_on` varchar(10) DEFAULT NULL,
  `ppdb_on` varchar(10) DEFAULT NULL,
  `must_verify` varchar(10) DEFAULT NULL,
  `layout_dark` varchar(10) DEFAULT NULL,
  `sidebar_custom` varchar(10) DEFAULT NULL,
  `color_custom` varchar(10) DEFAULT NULL,
  `menu_custom` varchar(10) DEFAULT NULL,
  `admin_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table evolutionschool.sett_generals: ~0 rows (approximately)
/*!40000 ALTER TABLE `sett_generals` DISABLE KEYS */;
INSERT INTO `sett_generals` (`id`, `school_name`, `website_on`, `ppdb_on`, `must_verify`, `layout_dark`, `sidebar_custom`, `color_custom`, `menu_custom`, `admin_logo`, `created_at`, `updated_at`) VALUES
	(1, 'Evolution School', '1', '1', '1', '1', '2', 'green', '', 'uploads/website/logo//9xS8IgKmNDsBXzaNPX7ag9EaJEFxx31Ywy7V2w6r.png', NULL, '2020-12-13 12:29:14');
/*!40000 ALTER TABLE `sett_generals` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.sett_mails
CREATE TABLE IF NOT EXISTS `sett_mails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ppdb_admin` int(11) NOT NULL,
  `ppdb_user` int(11) NOT NULL,
  `penerimaan` int(11) NOT NULL,
  `penolakan` int(11) NOT NULL,
  `balasan_forum` int(11) NOT NULL,
  `subcribe` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `komentar` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.sett_mails: ~0 rows (approximately)
/*!40000 ALTER TABLE `sett_mails` DISABLE KEYS */;
INSERT INTO `sett_mails` (`id`, `ppdb_admin`, `ppdb_user`, `penerimaan`, `penolakan`, `balasan_forum`, `subcribe`, `contact`, `komentar`, `email`, `logo`, `banner`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 1, 1, 2, 2, 'mdede.hidayatullah@gmail.com', 'uploads/uploads/ppdb///EWvF1RehVS6go6x61CAyaMRWTveAnAdjaMFvyMEV.webp', 'uploads/website/gallery//9BXpwApqPKVtMoogW9ua6gz1JIr7j1eWAzc5qUh1.jpeg', NULL, '2021-02-13 21:16:33');
/*!40000 ALTER TABLE `sett_mails` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.sett_ppdbs
CREATE TABLE IF NOT EXISTS `sett_ppdbs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_pendaftaran` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `logo_ppdb` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `background_image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mading` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `forum` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `offline` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cs` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.sett_ppdbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `sett_ppdbs` DISABLE KEYS */;
INSERT INTO `sett_ppdbs` (`id`, `file_pendaftaran`, `logo_ppdb`, `background_image`, `mading`, `forum`, `offline`, `cs`, `created_at`, `updated_at`) VALUES
	(1, 'uploads/uploads/ppdb///Fgxg056qG4KKN8t79nzkMhQBV1V0mhbY5FBfqzco.pdf', 'uploads/uploads/ppdb///EWvF1RehVS6go6x61CAyaMRWTveAnAdjaMFvyMEV.webp', 'uploads/uploads/ppdb///8Nqdw68wQy9jSoY4Hir2Ftl7Sa1QejFzMxKHCA2b.jpeg', 'on', 'on', 'on', 'on', NULL, '2021-01-20 17:51:39');
/*!40000 ALTER TABLE `sett_ppdbs` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.sett_websites
CREATE TABLE IF NOT EXISTS `sett_websites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_appear` int(11) NOT NULL,
  `facility_appear` int(11) NOT NULL,
  `gallery_appear` int(11) NOT NULL,
  `activity_appear` int(11) NOT NULL,
  `creativity_appear` int(11) NOT NULL,
  `prestation_appear` int(11) NOT NULL,
  `contact_appear` int(11) NOT NULL,
  `about_appear` int(11) NOT NULL,
  `news_appear` int(11) NOT NULL,
  `subject_appear` int(11) NOT NULL,
  `extra_appear` int(11) NOT NULL,
  `board_appear` int(11) NOT NULL,
  `website_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dark_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_right` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.sett_websites: ~0 rows (approximately)
/*!40000 ALTER TABLE `sett_websites` DISABLE KEYS */;
INSERT INTO `sett_websites` (`id`, `theme`, `teacher_appear`, `facility_appear`, `gallery_appear`, `activity_appear`, `creativity_appear`, `prestation_appear`, `contact_appear`, `about_appear`, `news_appear`, `subject_appear`, `extra_appear`, `board_appear`, `website_logo`, `dark_logo`, `footer_text`, `copy_right`, `facebook`, `twitter`, `instagram`, `school_name`, `school_address`, `school_phone`, `school_email`, `meta_tittle`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
	(1, 'theme', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'uploads/website/logo//64AllkbU4cZyj2zMGX77htesJqvoeQn1zu6xMAo3.png', 'uploads/website/logo//qxrDsY9e7bDqECgr9XBGQ0wezKoLNrLkGTxhnatC.png', 'Evolution School Merupakan Sebuah Web System yang dibekali dengan kaya fiture dengan engine bahasa terkini. Sehingga Aman digunakan dengan jangka waktu yang lama.', 'Copyright © 2020 All rights reserved | Development By Dede & Supported By MDH Corporate', '#', '#', '#', 'Evolution School', 'Kp Panagogan Desa Gunung Endut Kec. Kalapanunggal Kab. Sukabumi', '+62 857 9429 8878', 'mdede.hidayatullah@gmail.com', 'Evolution School | Solution For Your School', 'System Management Sekolah, Website Sekolah, System PPDB Sekolah, Sytem Payment Sekolah', 'Evolution School Merupakan Sebuah Web System yang dibekali dengan kaya fiture dengan engine bahasa terkini. Sehingga Aman digunakan dengan jangka waktu yang lama.', NULL, '2021-02-14 02:49:23');
/*!40000 ALTER TABLE `sett_websites` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image_slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.sliders: ~4 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `image_slider`, `title_slider`, `subtitle_slider`, `button_slider`, `button_link`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'uploads/website/slider/01.png', 'Inovation School', 'Jadikan Sekolah Anda Menjadi Lebih Menarik dan Menghasilkan banyak prestasi', 'Selengkapnya', '#', 1, NULL, '2021-01-16 21:20:09'),
	(2, 'uploads/website/slider///tYNiRza31XE00ELqTWyGwzshgqNTmN6IHcV6PCc3.jpeg', 'Covid 19 In School', 'Dalam pencegahan covid 19, Petugas melakukan pengechekan suhu badan seluruh siswa', 'Selengkapnya', '#', 0, NULL, '2021-02-14 02:43:14'),
	(3, 'uploads/website/slider///ykqswBaMiaylu2JuFGqX2JJ1p3xcqDIH0Mf8pg90.jpeg', 'Lulusan Pendidikan Berkualitas', 'Kini Saatnya seluruh tenaga bekerja sama dalam mencetak generasi yang hebat', 'Selengkapnya', '#', 0, NULL, '2021-02-14 02:43:26'),
	(4, 'uploads/website/slider///J24MslDGeMqrZr5iWZid3Ln7FQmHGwDqJdmm6P0d.jpeg', 'Mulai Memperkenalkan Technology Di Lingkungan Sekolah', 'Mulai memperkenalkan technology serta kebudayaan yang saling berhubungan di lingkungan sekolah', 'Selengkapnya', '#', 0, NULL, '2021-02-14 02:43:36');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.subcribers
CREATE TABLE IF NOT EXISTS `subcribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.subcribers: ~0 rows (approximately)
/*!40000 ALTER TABLE `subcribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `subcribers` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.systems
CREATE TABLE IF NOT EXISTS `systems` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.systems: ~0 rows (approximately)
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.tahun_ajarans
CREATE TABLE IF NOT EXISTS `tahun_ajarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_tahunajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_angkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.tahun_ajarans: ~0 rows (approximately)
/*!40000 ALTER TABLE `tahun_ajarans` DISABLE KEYS */;
/*!40000 ALTER TABLE `tahun_ajarans` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.tanda_tangans
CREATE TABLE IF NOT EXISTS `tanda_tangans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tanda_tangans_employee_id_index` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.tanda_tangans: ~0 rows (approximately)
/*!40000 ALTER TABLE `tanda_tangans` DISABLE KEYS */;
/*!40000 ALTER TABLE `tanda_tangans` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `teacher_mode` int(11) NOT NULL,
  `teacher_experience` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_employee_id_unique` (`employee_id`),
  UNIQUE KEY `teachers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.teachers: ~0 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.template_documents
CREATE TABLE IF NOT EXISTS `template_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'white',
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.template_documents: ~2 rows (approximately)
/*!40000 ALTER TABLE `template_documents` DISABLE KEYS */;
INSERT INTO `template_documents` (`id`, `school_name`, `template_name`, `school_address`, `school_logo`, `background`, `footer_text`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'SMK EVOLUTION SCHOOL', 'Template satu', 'Kp Panagogan, Desa GunungEndut, Rt 010, Rw 030, Kec. Kalapanunggal, Kab. Sukabumi, Jawabarat', 'uploads/template//K6ZLoAuExBURCIuybPMT994kgCrrYOqM9L98B813.png', 'uploads/background//AouCdoEAdKUJPv6L90I6iA0OK9gtKkJO0sQsbLlm.png', 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen', NULL, '2021-01-27 01:58:31', '2021-01-27 03:21:03'),
	(2, 'SMK EVOLUTION SCHOOL 2', 'Template dua', 'Kp Panagogan, Desa GunungEndut, Rt 010, Rw 030, Kec. Kalapanunggal, Kab. Sukabumi, Jawabarat', 'uploads/template//V4ydcw4iBLYPeyuwC7CQA01hAflGx7TFteZ2QTdo.png', 'uploads/background//zMYf9oRmJtsSQ73BsElxP32BzIMKnqMNplZzV5Ay.png', 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen', NULL, '2021-01-27 02:05:04', '2021-01-27 03:21:12');
/*!40000 ALTER TABLE `template_documents` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.type_spps
CREATE TABLE IF NOT EXISTS `type_spps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.type_spps: ~0 rows (approximately)
/*!40000 ALTER TABLE `type_spps` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_spps` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `employee_id`, `role`, `type_account`, `first_name`, `middle_name`, `last_name`, `phone`, `image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'mdede.hidayatullah@gmail.com', '$2y$10$njIf0C.4j3wnnGV5025rbuSvdAoL4iQf4ZDBiJNGusdjoejsxTdFy', '1', '1', 'administrator', NULL, NULL, NULL, NULL, NULL, '2020-11-21 21:47:41', 'ULMY0Ld20bRVrBqX5Gsnh9LUnOM820bxBCeH0aASrL9YLbDo11f9EIDBKJzp', NULL, '2020-12-13 00:37:27', NULL),
	(2, 'harumsidik@gmail.com', '$2y$12$cTQPL7vDrCNNVDRxdEmfnOOcR/ZimZW5obTVhYx7p43H9mMQeqjau', '2', '1', 'administrator', NULL, NULL, NULL, NULL, NULL, '2020-11-21 21:47:41', 'hDFAG6RYz3fHwnVzA6gjmbMFjHLAcREsR63McWVuIQQvUI1wkWoEL8jEXoUu', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.user_activities
CREATE TABLE IF NOT EXISTS `user_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_activities_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.user_activities: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_activities` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.user_settings_themes
CREATE TABLE IF NOT EXISTS `user_settings_themes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_settings_themes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.user_settings_themes: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_settings_themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_settings_themes` ENABLE KEYS */;

-- Dumping structure for table evolutionschool.web_abouts
CREATE TABLE IF NOT EXISTS `web_abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pemilik_id` int(11) DEFAULT NULL,
  `vission` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_vission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table evolutionschool.web_abouts: ~0 rows (approximately)
/*!40000 ALTER TABLE `web_abouts` DISABLE KEYS */;
INSERT INTO `web_abouts` (`id`, `pemilik_id`, `vission`, `image_vission`, `mission`, `image_mission`, `about`, `image_about`, `slogan`, `image_slogan`, `image_1`, `link_video`, `image_2`, `created_at`, `updated_at`) VALUES
	(1, 1, '<p>Mencetak Lulusan Yang Mampu Menguasai Teknologi IT Perbankan Syariah, &amp; Pemasaran Yang Berakhlakul Karimah Serta Mampu Berwirausaha &amp; Berkompetisi Di Era Global.<br></p>', 'uploads/website/about//EkwuzAhoJ4ACz3i4BMYFYVSdf7ABT27ZgJTpRCg4.jpeg', '<ol><li>Melaksanakan Pendidikan IT Yg Aplikatif Melalui Guru Kelas IT &amp; Guru Praktisi Serta Praktek Di Perusahaan IT,</li><li>Melaksanakan Pendidikan Perbankan Syariah Yg Aplikatif Melalui Guru Kelas Perbankan Syariah &amp; Guru Praktisi Serta Praktek Di Perbankan.</li><li>Melaksanakan Pendidikan Pemasaran Yg Aplikatif Melalui Guru Kelas Pemasaran&amp; Guru Praktis i Serta Praktek Di Perusahaan.</li><li>Melaksanakan Pendidikan Kurikulum Terpadu Antara Kurikulum Pendidikan Diknas &amp; Pendidikan Agama melalui Program FullDay</li><li>Melaksanakan Pendidikan Yang Mampu Memberikan Kemampuan Berbahasa Inggris Agar Mampu Bersaing Di Era Global</li><li>Melaksanakan Pendidikan Aplikatif Yg Berhubungan Dengan Dunia Bisnis Mencetak Wirausahawan<br></li></ol>', 'uploads/website/about//Izdw0SEuNqn5XjQL7E457wZHAt0Eixhh7p8WHitx.jpeg', '<p>Evolution School, Merupakan sebuah website &amp; system management sekolah dengan tujuan memecahkan masalah terkait lingkungan pendidikan di sekolah - universitas. Banyak diantara Orang-orang berkata&nbsp;<span style="font-weight: bolder;">System indonesia tertinggal beberapa puluh tahun</span>, namun sedikit yang melakukan pergerakan atau aksi nyata. Walaupun sejatinya menyadari pendidikan yang tertinggal serta mengungkapkannya adalah aksi berani dalam mengungap sebuah kenyataan. Tugas kita sebagai penduduk&nbsp;<span style="font-weight: bolder;">Indonesia,</span>&nbsp;adalah mendukung dengan sepenuh jiwa bagaimana indonesia dapat bersaing dengan negara lain.&nbsp;</p><p>Kemungkinan, System ini akan terus melakukan&nbsp;<span style="font-weight: bolder;">Update</span>, serta akan membangun sebuah forum khusus terkait masalah-masalah didunia pendidikan.&nbsp;</p>', 'uploads/website/about//bTTL57y4dScppIaJXjwdLepzzixOt052pzsQ6HCk.jpeg', '<p>Mengapa dunia ini begini penuh iga manusia busuk? Hanya karena mau hidup lebih sejahtera dari yang lain? Apakah kesejahteraan hidup sama dengan kebusukan buat orang lain? Alangkah sia-sia pendidikan orangtua kalau demikian. Alangkah sia-sia pendidikan agama. Alangkah sia-sia guru dan sekolah-sekolah." - Pramoedya Ananta Toer<br></p>', 'uploads/website/about//8lHwBGw4iVxUYOh0CfezUEMLWoxH8Z0SgozAMGrp.jpeg', '-', 'https://www.youtube.com/watch?v=Xz6BXQqMBz0&t=59s', '-', NULL, NULL);
/*!40000 ALTER TABLE `web_abouts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
