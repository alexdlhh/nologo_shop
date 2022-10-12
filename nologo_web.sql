/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `album` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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

CREATE TABLE `coleccion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
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
  `price` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `image` varchar(2550) DEFAULT NULL,
  `inscripcion` varchar(2550) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE `employee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(2550) DEFAULT NULL,
  `email` varchar(2550) DEFAULT NULL,
  `phone` varchar(2550) DEFAULT NULL,
  `charge` varchar(2550) DEFAULT NULL,
  `twitter` varchar(2550) DEFAULT NULL,
  `featuredImage` varchar(2550) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `especialidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(2550) DEFAULT NULL,
  `alias` varchar(2550) DEFAULT NULL,
  `icon` varchar(2550) DEFAULT NULL,
  `current_season` int(11) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `description` text,
  `olimpico` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

CREATE TABLE `eventos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `banner` varchar(255) DEFAULT NULL,
  `date_ini` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `especialidad` int(11) DEFAULT NULL,
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
  `album` int(11) DEFAULT NULL,
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
  `coleccion` int(11) DEFAULT NULL,
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
  `description` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
  `status` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `white` varchar(2550) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `statics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `permantlink` varchar(255) DEFAULT NULL,
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

CREATE TABLE `team` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `current_season` int(11) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `olimpico` int(11) DEFAULT NULL,
  `especialidad` int(11) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twich` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `album` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test', '2022-09-30 19:08:01', NULL);


INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(9, 2);
INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(10, 2);
INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(11, 2);
INSERT INTO `cat_new_rel` (`id_new`, `id_cat`) VALUES
(12, 2),
(1, 2);



INSERT INTO `category_new` (`id`, `name`) VALUES
(2, 'test');








INSERT INTO `course` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`, `duration`, `school_id`, `image`, `inscripcion`) VALUES
(2, 'ñwlsv', 'ñk fvñks fvñzks vñzkf vzñfk b<br>', '150€', '2022-08-31 18:45:41', '2022-08-31 18:45:41', 'undefined', 0, '/images/course/1661971541wlsv.jpg', '/files/fomularios/1661971541wlsv.jpg');


INSERT INTO `employee` (`id`, `name`, `email`, `phone`, `charge`, `twitter`, `featuredImage`) VALUES
(1, 'cisk', 'iakej@drv.es', '650605506', 'odlf', 'osif', '/images/employee/1661982716cisk.jpg');


INSERT INTO `especialidades` (`id`, `name`, `alias`, `icon`, `current_season`, `pos`, `description`, `olimpico`) VALUES
(1, 'Artística Masculina', 'artistica-masculina', '\\images\\especialidades\\ga_masculina.png', 2022, 1, NULL, 1);
INSERT INTO `especialidades` (`id`, `name`, `alias`, `icon`, `current_season`, `pos`, `description`, `olimpico`) VALUES
(2, 'Artística Femenina', 'artistica-femenina', '\\images\\especialidades\\ga_femenina.png', 2022, 2, NULL, 1);
INSERT INTO `especialidades` (`id`, `name`, `alias`, `icon`, `current_season`, `pos`, `description`, `olimpico`) VALUES
(3, 'Rítmica', 'ritmica', '\\images\\especialidades\\g_ritmica.png', 2022, 3, NULL, 1);
INSERT INTO `especialidades` (`id`, `name`, `alias`, `icon`, `current_season`, `pos`, `description`, `olimpico`) VALUES
(4, 'Trampolin', 'trampolin', '\\images\\especialidades\\trampolin.png', 2022, 4, NULL, 1),
(5, 'Aeróbica', 'aerobica', '\\images\\especialidades\\aerobica.png', 2022, 1, NULL, 0),
(6, 'Acrobática', 'acrobatica', '\\images\\especialidades\\acrobatica.png', 2022, 2, NULL, 0),
(7, 'Para Todos', 'para-todos', '\\images\\especialidades\\g_para_todos.png', 2022, 3, NULL, 0),
(8, 'Parkour', 'parkour', '\\images\\especialidades\\parkour.png', 2022, 4, NULL, 0);









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
(10, 'la patata', '/images/1661689412lapatata.jpg', 'La patata no se puede poseer la patata es un producto de la madre naturaleza...<div><img src=\"https://i.pinimg.com/474x/9a/92/e9/9a92e92412021bb8574fd5fafbe722c6--simpsons-cartoon-los-simpsons.jpg\" alt=\"\" align=\"none\"></div><div>estuvo buena pero a mi niña le sento mal :,( x2<br></div>', '2022-08-22 00:00:00', '2022-08-28 12:24:20', 1, 'la-patata');
INSERT INTO `new` (`id`, `title`, `feature_image`, `content`, `created_at`, `updated_at`, `status`, `alias`) VALUES
(11, 'las wanda de 10\'\'', '/images/1661453680laswandade10.jpg', 'wrjlfn aerl faekr fwlajr flwea flesk d', '2022-08-26 00:00:00', '2022-08-25 18:54:41', 1, '');
INSERT INTO `new` (`id`, `title`, `feature_image`, `content`, `created_at`, `updated_at`, `status`, `alias`) VALUES
(12, 'me encanta cuando los panes salen bien', '/images/1661453982meencantacuandolospanessalenbien.webp', 'los panes', '2022-08-26 00:00:00', '2022-08-25 18:59:42', 1, 'me-encanta-cuando-los-panes-salen-bien');

INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`, `description`) VALUES
(1, 'RFEG', '/rfeg', 1, 1, NULL, NULL);
INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`, `description`) VALUES
(2, 'Escuela', '/schools', 1, 2, NULL, NULL);
INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`, `description`) VALUES
(3, 'Especialidades', '/especialities', 1, 3, NULL, NULL);
INSERT INTO `pages` (`id`, `title`, `url`, `section`, `order`, `id_dad`, `description`) VALUES
(4, 'Multimedia', '/media', 1, 4, NULL, NULL),
(5, 'Noticias', '/news', 1, 5, NULL, NULL),
(6, 'Revistas', '/journals', 1, 6, NULL, NULL),
(7, 'Poltíca de Privacidad', '/static/politica_privacidad', 2, 1, NULL, NULL),
(8, 'Política de Cookies', '/static/politica_cookies', 2, 2, NULL, NULL),
(9, 'Aviso Legal', '/static/aviso_legal', 2, 3, NULL, NULL),
(10, 'Empleados', '/employees', 1, 1, 1, 'Lista de empleados de RFEG');





INSERT INTO `school` (`id`, `name`, `address`, `phone`, `email`, `website`, `logo`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'odisl', 'sfkvl', '652252525', 'sld@erfv.es', 'sfvdfvsfv.es', '/images/school/1661716987odisl.png', 'fvsdfvsdvesfv<br>\"\"', '2022-08-29 00:00:00', '2022-08-28 20:03:07', 1);
INSERT INTO `school` (`id`, `name`, `address`, `phone`, `email`, `website`, `logo`, `description`, `created_at`, `updated_at`, `status`) VALUES
(2, 'odisl2', 'sfkvl', '652252525', 'sld@erfv.es', 'sfvdfvsfv.es', '/images/school/1661717347odisl2.png', '<br>\"', '2022-08-29 00:00:00', '2022-08-28 20:09:07', 1);
INSERT INTO `school` (`id`, `name`, `address`, `phone`, `email`, `website`, `logo`, `description`, `created_at`, `updated_at`, `status`) VALUES
(3, 'ifvhbk', 'isdkhb', '63463', 'sjdvhb', 'usfjkhv', '/images/school/1661717545ifvhbk.jpg', 'sikdbh<br>\"\"', '2022-08-03 00:00:00', '2022-08-28 20:12:25', 1);
INSERT INTO `school` (`id`, `name`, `address`, `phone`, `email`, `website`, `logo`, `description`, `created_at`, `updated_at`, `status`) VALUES
(5, 'fnl', 'lib', '8488', 'iblk', 'dsjbh', '/images/school/1661710337fnl.png', 'jkhb,<br>', '2022-08-09 00:00:00', '2022-08-28 18:12:17', 1);









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
(6, 12),
(4, 1),
(6, 1);





INSERT INTO `team` (`id`, `name`, `alias`, `description`, `image`, `current_season`, `pos`, `olimpico`, `especialidad`, `twitter`, `instagram`, `tiktok`, `youtube`, `twich`) VALUES
(1, 'test', 'test', 'kldsjhfrgbvsdkfg', 'siuyrfdjbgsij', 2022, 1, 1, 1, NULL, NULL, NULL, NULL, NULL);


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Alejandro de la Haba Heredia', 'alexdlhh@gmail.com', NULL, '$2y$10$HLOqElZPwqT6PFusmZd0qeyi6anKqFF/ZM9aNMX2BNHFjMvRLLxHq', NULL, '2022-08-14 18:31:15', '2022-08-14 18:31:15', 1);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'test 2', 'testeando@ando.yo', NULL, '$2y$10$QwYNrO4QGkLBOnrzzUn1aOfbe7Y8PPaKdh5Hi9PIZJG958OOn2nn6', NULL, '2022-08-26 19:00:28', '2022-08-28 13:00:03', 2);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;