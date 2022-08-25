/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `cat_new_rel` (
  `id_new` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `cat_product_rel` (
  `id_cat` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `category_new` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE `category_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `config` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) DEFAULT NULL,
  `valor` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `course` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(2550) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `employee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(2550) DEFAULT NULL,
  `email` varchar(2550) DEFAULT NULL,
  `phone` varchar(2550) DEFAULT NULL,
  `charge` varchar(2550) DEFAULT NULL,
  `twitter` varchar(2550) DEFAULT NULL,
  `featuredImage` varchar(2550) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `journal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(2550) DEFAULT NULL,
  `description` text,
  `image` varchar(2550) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `url` varchar(2550) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(2550) DEFAULT NULL,
  `description` text,
  `type` varchar(2550) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `url` varchar(2550) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `new` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(2550) DEFAULT NULL,
  `feature_image` varchar(2550) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `alias` varchar(5000) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(2550) DEFAULT NULL,
  `url` varchar(2550) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `id_dad` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `school` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(2550) DEFAULT NULL,
  `address` varchar(2550) DEFAULT NULL,
  `phone` varchar(2550) DEFAULT NULL,
  `email` varchar(2550) DEFAULT NULL,
  `website` varchar(2550) DEFAULT NULL,
  `logo` varchar(2550) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `school_course` (
  `id_school` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `social` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(2550) DEFAULT NULL,
  `description` text,
  `icon` varchar(2550) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sponsor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(2550) DEFAULT NULL,
  `description` text,
  `image` varchar(2550) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `url` varchar(2550) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tag_new` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE TABLE `tag_new_rel` (
  `id_tag` int(11) DEFAULT NULL,
  `id_new` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tag_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tag_product_rel` (
  `id_tag` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(9, 2);
INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(10, 2);
INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(11, 2);
INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(12, 2);



INSERT INTO `category_new` (`id`, `name`) VALUES
(2, 'test');
















INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

INSERT INTO `new` (`id`, `title`, `feature_image`, `content`, `created_at`, `updated_at`, `status`, `alias`) VALUES
(9, 'Mi loro es un asqueroso', '/images/1661440872Miloroesunasqueroso.png', '<br>', '2022-08-26 00:00:00', '2022-08-25 15:21:12', 1, '');
INSERT INTO `new` (`id`, `title`, `feature_image`, `content`, `created_at`, `updated_at`, `status`, `alias`) VALUES
(10, 'la patata', '/images/1661453495lapatata.jpg', 'La patata no se puede poseer la patata es un producto de la madre naturaleza...<div><img src=\"https://i.pinimg.com/474x/9a/92/e9/9a92e92412021bb8574fd5fafbe722c6--simpsons-cartoon-los-simpsons.jpg\" alt=\"\" align=\"none\"><br></div>', '2022-08-26 00:00:00', '2022-08-25 18:51:35', 1, '');
INSERT INTO `new` (`id`, `title`, `feature_image`, `content`, `created_at`, `updated_at`, `status`, `alias`) VALUES
(11, 'las wanda de 10\'\'', '/images/1661453680laswandade10.jpg', 'wrjlfn aerl faekr fwlajr flwea flesk d', '2022-08-26 00:00:00', '2022-08-25 18:54:41', 1, '');
INSERT INTO `new` (`id`, `title`, `feature_image`, `content`, `created_at`, `updated_at`, `status`, `alias`) VALUES
(12, 'me encanta cuando los panes salen bien', '/images/1661453982meencantacuandolospanessalenbien.webp', 'los panes', '2022-08-26 00:00:00', '2022-08-25 18:59:42', 1, 'me-encanta-cuando-los-panes-salen-bien');

INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`) VALUES
(1, 'RFEG', '/rfeg', 1, 1, NULL);
INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`) VALUES
(2, 'Escuela', '/schools', 1, 2, NULL);
INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`) VALUES
(3, 'Especialidades', '/especialities', 1, 3, NULL);
INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`) VALUES
(4, 'Multimedia', '/media', 1, 4, NULL),
(5, 'Noticias', '/news', 1, 5, NULL),
(6, 'Revistas', '/journals', 1, 6, NULL);













INSERT INTO `tag_new` (`id`, `name`) VALUES
(3, 'Probando2');
INSERT INTO `tag_new` (`id`, `name`) VALUES
(4, 'Las Categorías');
INSERT INTO `tag_new` (`id`, `name`) VALUES
(6, 'test');

INSERT INTO `tag_new_rel` (`id_tag`, `id_new`) VALUES
(3, 9);
INSERT INTO `tag_new_rel` (`id_tag`, `id_new`) VALUES
(4, 9);
INSERT INTO `tag_new_rel` (`id_tag`, `id_new`) VALUES
(6, 9);
INSERT INTO `tag_new_rel` (`id_tag`, `id_new`) VALUES
(4, 10),
(6, 10),
(3, 11),
(4, 11),
(3, 12),
(6, 12);





INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Alejandro de la Haba Heredia', 'alexdlhh@gmail.com', NULL, '$2y$10$HLOqElZPwqT6PFusmZd0qeyi6anKqFF/ZM9aNMX2BNHFjMvRLLxHq', NULL, '2022-08-14 18:31:15', '2022-08-14 18:31:15', 1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;