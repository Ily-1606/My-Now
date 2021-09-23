-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.14-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table now.vn.bills
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost_ship` double(8,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table now.vn.bills: ~8 rows (approximately)
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` (`id`, `owner`, `product_id`, `address`, `numberphone`, `note`, `money`, `salary`, `status`, `created_at`, `updated_at`, `cost_ship`) VALUES
	(1, 9, 20, 'Đội 5, Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '0328267412', 'Giao nhanh dùm mình nha', 120000, 5, 'created', NULL, NULL, 0.00),
	(2, 9, 7, 'Đội 5, Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '0328267412', 'Giao hàng nhanh nhá', 60000, 3, 'created', NULL, NULL, 0.00),
	(3, 9, 5, 'Đội 5, Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '0328267412', 'Giao nhanh dùm mình <3', 80000, 4, 'created', NULL, NULL, 0.00),
	(4, 9, 3, 'Đội 5, Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '0328267412', 'Giao nhanh dùm mình <3', 100000, 10, 'created', NULL, NULL, 0.00),
	(5, 9, 25, 'Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '+84328267412', 'Giao nhanh nhé quán, mình đói lắm rồi :(', 54679, 3, 'created', '2021-09-17 21:36:18', '2021-09-17 21:36:18', 0.00),
	(6, 9, 19, 'Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '+84328267412', 'Giao nhanh nhé quán, mình đói lắm rồi :(', 65679, 2, 'created', '2021-09-17 21:44:44', '2021-09-17 21:44:44', 0.00),
	(7, 9, 10, 'Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '+84328267412', 'Giao nhanh nhé quán, mình đói lắm rồi :(', 155679, 2, 'doing', '2021-09-17 21:45:43', '2021-09-23 18:25:37', 0.00),
	(8, 9, 12, 'Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '+84328267412', 'Giao nhanh nhé quán, mình đói lắm rồi :(', 30679, 1, 'created', '2021-09-17 21:45:43', '2021-09-17 21:45:43', 0.00),
	(9, 9, 7, 'Hải Lệ, Quảng Trị, Quảng Trị, Bắc Trung Bộ, Việt Nam,', '+84328267412', 'Giao nhanh nha', 56189, 2, 'doing', '2021-09-19 09:54:12', '2021-09-23 18:25:17', 0.00);
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;

-- Dumping structure for table now.vn.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table now.vn.categories: ~17 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Cơm', '2021-09-18 15:24:11', '2021-09-18 15:24:11'),
	(2, 'Bún', '2021-09-18 15:54:00', '2021-09-18 15:54:00'),
	(5, 'Bánh', '2021-09-18 16:08:11', '2021-09-18 16:08:11'),
	(7, 'Cháo', '2021-09-18 16:32:23', '2021-09-18 16:32:23'),
	(8, 'Trứng', '2021-09-18 20:38:35', '2021-09-18 20:38:35'),
	(9, 'Đồ uống', '2021-09-22 20:09:09', '2021-09-22 20:09:09'),
	(10, 'Đồ ăn', '2021-09-22 20:09:21', '2021-09-22 20:09:21'),
	(11, 'Đồ chay', '2021-09-22 20:09:27', '2021-09-22 20:09:27'),
	(12, 'Bánh kem', '2021-09-22 20:09:35', '2021-09-22 20:09:35'),
	(13, 'Tráng miệng', '2021-09-22 20:09:42', '2021-09-22 20:09:42'),
	(14, 'Homemade', '2021-09-22 20:09:47', '2021-09-22 20:09:47'),
	(15, 'Vỉa hè', '2021-09-22 20:09:54', '2021-09-22 20:09:54'),
	(16, 'Pizza/Burger', '2021-09-22 20:10:00', '2021-09-22 20:10:00'),
	(17, 'Món gà', '2021-09-22 20:10:04', '2021-09-22 20:10:04'),
	(18, 'Món lẩu', '2021-09-22 20:10:08', '2021-09-22 20:10:08'),
	(19, 'Sushi', '2021-09-22 20:10:15', '2021-09-22 20:10:15'),
	(20, 'Mì phở', '2021-09-22 20:10:19', '2021-09-22 20:10:19'),
	(21, 'Cơm hộp', '2021-09-22 20:10:24', '2021-09-22 20:10:24');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table now.vn.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table now.vn.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table now.vn.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table now.vn.migrations: ~11 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_08_15_074441_add_user_type_to_users_table', 2),
	(7, '2021_08_15_095230_add_avatar_to_users', 3),
	(9, '2021_08_17_071309_create_posts_table', 4),
	(10, '2021_08_19_085512_add_status_to_posts', 5),
	(11, '2021_08_20_121425_add_status_to_users', 6),
	(12, '2021_08_21_092331_add_generation_password_to_users', 7),
	(14, '2021_08_25_131836_create_bills_table', 8),
	(17, '2021_08_27_145032_add_detail_infomation_to_posts', 9),
	(18, '2021_09_12_144107_create_categories_table', 10),
	(19, '2021_09_14_185021_add_cost_ship_to_bills', 11),
	(20, '2021_09_14_192000_add_system_decord_to_users', 12),
	(21, '2021_09_18_165031_add_categorys_to_posts', 13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table now.vn.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table now.vn.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table now.vn.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_star` int(11) NOT NULL DEFAULT 0,
  `avg_star` double(8,2) NOT NULL DEFAULT 0.00,
  `owner` int(11) NOT NULL,
  `sales` double(8,2) DEFAULT NULL,
  `money` double(8,2) NOT NULL,
  `salary` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `detail_infomation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorys` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]' CHECK (json_valid(`categorys`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table now.vn.posts: ~25 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `name`, `body`, `location`, `files`, `total_star`, `avg_star`, `owner`, `sales`, `money`, `salary`, `sold`, `status`, `detail_infomation`, `categorys`, `created_at`, `updated_at`) VALUES
	(3, 'Bánh mỳ kẹp thịt', 'Ngon, bổ, rẻ', '79', '["uploads\\/product_images\\/a9VCL2TkMPpjNcpcZ9mfLYbhIfhHmFWyo8cFULa9.jpg"]', 0, 0.00, 9, NULL, 10000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 03:25:46', '2021-08-26 03:25:46'),
	(4, 'Cơm tấm thập cẩm', '-Thực đơn bao gồm\n+ Cá\n+ Thịt\n+ Rau\n+ Suờn\n+ Gà', '48', '["uploads\\/product_images\\/qtMFvVDCCdBZQ3OI1FdSRKj0RGzeg1jHi03UgbQl.png"]', 0, 0.00, 9, NULL, 20000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 03:28:48', '2021-08-26 03:28:48'),
	(5, 'Cơm sườn - Quận 1', 'Giờ bán: 12h-20h', '79', '["uploads\\/product_images\\/mjIHQB31h2pFQY5PsjhzNSMBtDwfoUMreqRPrJah.jpg"]', 0, 0.00, 9, NULL, 20000.00, 500, 0, 'normal', NULL, '[]', '2021-08-26 03:30:57', '2021-08-26 03:30:57'),
	(6, 'Bánh canh - Quảng Trị', 'Đặc sản Quảng Trị', '45', '["uploads\\/product_images\\/k7jxSNEfUoZEGrBSBwaH1yqXKmA2O7zVn9ZAArYs.jpg"]', 0, 0.00, 9, NULL, 15000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 03:34:12', '2021-08-26 03:34:12'),
	(7, 'Bún bò Huế', 'Đặc sản Huế', '79', '["uploads\\/product_images\\/SivJvCabyw4XpZlVlMlrf6H2XoDxQjSyzCBjIkqv.jpg"]', 0, 0.00, 9, NULL, 20000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 03:39:13', '2021-08-26 03:39:13'),
	(8, 'Bánh đúc nóng', 'Bạn đã thử bánh đúc chưa?\nNgon tuyệt', '45', '["uploads\\/product_images\\/rlcN7fS35yVCockcLsvtk5CwoYeWVd38Kf3iMxCb.jpg"]', 0, 0.00, 9, NULL, 50000.00, 50, 0, 'normal', NULL, '[]', '2021-08-26 04:07:42', '2021-08-26 04:07:42'),
	(9, 'Bún đậu mắm tôm - cỡ nhỏ', 'Loại nhỏ, được kèm chai pepsi khi mua 2 cái cùng 1 lúc', '45', '["uploads\\/product_images\\/1bgOVYaDu9poUUo4CBZn6F6wMuZtkQP41nAErHat.jpg"]', 0, 0.00, 9, NULL, 40000.00, 50, 0, 'normal', NULL, '[]', '2021-08-26 04:09:28', '2021-08-26 04:09:28'),
	(10, 'Bún đậu mắm tôm - cỡ  lớn', 'Loại nhỏ, được kèm 2 chai pepsi khi mua 2 cái cùng 1 lúc', '45', '["uploads\\/product_images\\/1bgOVYaDu9poUUo4CBZn6F6wMuZtkQP41nAErHat.jpg"]', 0, 0.00, 9, NULL, 70000.00, 50, 0, 'normal', NULL, '[]', '2021-08-26 04:09:54', '2021-08-26 04:09:54'),
	(11, 'Bún chả - Hà Nội', 'Ship tận nơi', '1', '["uploads\\/product_images\\/YsHhzAX7cuR1ExdKOtDYKuQpnuuU5G9DJdq9eZ2D.jpg"]', 0, 0.00, 9, NULL, 20000.00, 80, 0, 'normal', NULL, '[]', '2021-08-26 04:12:16', '2021-08-26 08:12:12'),
	(12, 'Bún rêu - Quảng Trị', 'Bún rêu - Giao hàng tận nơi', '45', '["uploads\\/product_images\\/dQId4ZQcZDFFl94DaL5CyI5egekY3re4PbA3pAJL.jpg"]', 0, 0.00, 9, NULL, 15000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:10:45', '2021-08-26 08:10:45'),
	(13, 'Bún chả cá', 'Đặc sản Đà Nẵng\nGiao hàng tận nơi', '48', '["uploads\\/product_images\\/IsKF6w3nQUDQjMPgqNGktRh9vHxDERFoeChvmbgj.jpg"]', 0, 0.00, 9, NULL, 20000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:14:13', '2021-08-26 08:14:13'),
	(14, 'Bún chạo tôm', 'Giao hàng tận nơi', '46', '["uploads\\/product_images\\/IsKF6w3nQUDQjMPgqNGktRh9vHxDERFoeChvmbgj.jpg"]', 0, 0.00, 9, NULL, 20000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:15:00', '2021-08-26 08:15:00'),
	(15, 'Bún bung - Hà Nội', 'Giao hàng tận nơi', '1', '["uploads\\/product_images\\/loSiiMhrDjsfAcpzfl6sZeebtzS0mnF55OqS1C5N.jpg"]', 0, 0.00, 9, NULL, 20000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:16:11', '2021-08-26 08:16:11'),
	(16, 'Bún mắm - Sóc Trăng', 'Giao hàng tận nơi', '94', '["uploads\\/product_images\\/iPNvoNo9UkuA8e6S7568zp29DkWnbLH5rVfvM83D.jpg"]', 0, 0.00, 9, NULL, 20000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:16:59', '2021-08-26 08:16:59'),
	(17, 'Bún mọc - Hà Nội', 'Giao hàng tận nơi', '1', '["uploads\\/product_images\\/rrac3rGMwRedv1vYuOJdownwzLJRScb5AD5pyEYD.jpg"]', 0, 0.00, 9, NULL, 20000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:17:40', '2021-08-26 08:17:40'),
	(18, 'Bún ốc - Quảng Trị', 'Giao hàng tận nơi', '45', '["uploads\\/product_images\\/esaxmovM3QSmcwY0kt7trAdaSJAgDsu6o4ufr3qY.jpg"]', 0, 0.00, 9, NULL, 25000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:18:22', '2021-08-26 08:18:22'),
	(19, 'Bún thịt nướng', 'Giao hàng tận nơi', '45', '["uploads\\/product_images\\/dRu5n8tkbPXpZxWRFkFoAReSuCSiqR41mWwTH905.jpg"]', 0, 0.00, 9, NULL, 25000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:19:01', '2021-08-26 08:19:01'),
	(20, 'Bún thang - Hà Nội', 'Giao hàng tận nơi', '48', '["uploads\\/product_images\\/0vbfQYekZjWcI7cfTPJXFjRKiLQBgDpxbD9sc41s.jpg"]', 0, 0.00, 9, 1000.00, 25000.00, 100, 0, 'normal', NULL, '[2]', '2021-08-26 08:19:48', '2021-09-18 20:36:33'),
	(21, 'Cao lầu - Hội An', 'Giao hàng tận nơi', '48', '["uploads\\/product_images\\/D9lpp5JzIyCrc2tv6Vf6Os1zVDuRTIvvNRVYGDIL.jpg"]', 0, 0.00, 9, NULL, 25000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:20:41', '2021-08-26 08:20:41'),
	(22, 'Hủ tiếu - Đà Nẵng', 'Giao hàng tận nơi', '48', '["uploads\\/product_images\\/Fai41WMKADddbhPtp6BkJtTdxdrt1MT5hWcv6df3.jpg"]', 0, 0.00, 9, 2000.00, 15000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:21:25', '2021-08-27 07:37:11'),
	(23, 'Mì Quảng - Quảng Nam', 'Giao hàng tận nơi', '49', '["uploads\\/product_images\\/EgLUHNL9Eoc0VZGC0Xv9csziCwCDnw38b1BGp74P.jpg"]', 0, 0.00, 9, 2000.00, 15000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:22:11', '2021-08-27 07:36:57'),
	(24, 'Mì xào - Quảng Trị', 'Giao hàng tận nơi', '45', '["uploads\\/product_images\\/EukIO5avBB56hLbU1vBnTnsi06ujrkzOMbAitggh.jpg"]', 0, 0.00, 9, 1000.00, 25000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:22:51', '2021-08-27 07:36:49'),
	(25, 'Miến lươn - Quảng Trị', 'Giao hàng tận nơi', '45', '["uploads\\/product_images\\/F9q14cjBGmqiftARRDvgvnC8oPEJAR8v5s9lYrda.jpg"]', 0, 0.00, 9, 2000.00, 15000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:23:34', '2021-08-27 07:36:04'),
	(26, 'Phở - Đặc sản Hà Nội', 'Giao hàng tận nơi', '1', '["uploads\\/product_images\\/Ri3HcEOhwNBGnefzbnPNkE4CN40tEfRVDCNjQSO1.jpg"]', 0, 0.00, 9, 6000.00, 30000.00, 100, 0, 'normal', NULL, '[]', '2021-08-26 08:24:22', '2021-08-27 07:12:06'),
	(29, 'Trứng lộn - Quảng Trị', 'Trứng lộn giá sinh viên', '45', '["uploads\\/product_images\\/OSrEKVvcXXMvs7LfXIOntZnF9Z62j3azymDQs5AZ.jpg"]', 0, 0.00, 9, 500.00, 4000.00, 200, 0, 'normal', NULL, '[8]', '2021-09-18 20:43:51', '2021-09-18 20:43:51'),
	(30, 'Bún chả - Quảng Trị', 'Bún chả - Quảng Trị', '1', '["uploads\\/product_images\\/ISNAkCJHzvofE40bF3uiI1UyUd7wgx5A9mg1zjMW.jpg"]', 0, 0.00, 9, NULL, 0.00, 0, 0, 'normal', NULL, '[2]', '2021-09-19 10:01:09', '2021-09-19 10:01:09');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table now.vn.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/images/avatar_default.png',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `generation_password` tinyint(1) NOT NULL DEFAULT 0,
  `longitude` double(8,2) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table now.vn.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `status`, `generation_password`, `longitude`, `latitude`) VALUES
	(9, 'Tường Nguyên', 'khuonmatdangthuong45@gmail.com', 'seller', NULL, '$2y$10$lF6ucJhh/ib6Aj7udOAe5OVp6w7ZEM3g3AMquPTvhbKSU0OpCJih2', 'q9MbPD3EeNM4QvvHC60tFCv0PhgLgxIfd4W5ndA8ikwIv1XWlPTp53fuDMGn', '2021-08-25 13:14:25', '2021-09-18 23:12:38', '/images/avatar_default.png', 'normal', 0, 107.22, 16.82);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
