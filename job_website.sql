-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2025 at 05:51 AM
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
-- Database: `job_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_jobs`
--

CREATE TABLE `available_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `vacancy` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>pending,2=>approved,3=>rejected',
  `is_featured` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_jobs`
--

INSERT INTO `available_jobs` (`id`, `title`, `category_id`, `job_type_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualifications`, `keywords`, `experience`, `company_name`, `company_location`, `company_website`, `created_at`, `updated_at`, `user_id`, `status`, `is_featured`) VALUES
(1, 'Web Developer', 3, 2, 1, 50000, 'Hyderbad', 'adfsdaf', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', 'wefwef', 'efdcx', 'mysql,php', '1 Year', 'Versatile', 'vbhijk', 'https://www.versatileitsol.com/', '2025-07-26 03:39:00', '2025-07-26 03:39:00', 2, 1, 0),
(7, 'Financial Manager', 1, 2, 3, 9774, 'Antoniettaland', 'Magni eligendi in eos eaque sint nobis ut. Itaque iure magni et ut culpa. Nobis illum porro consequatur dolor est quidem rerum. Unde quia cupiditate et.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Miss Alessandra Weimann', 'Celiaport', 'http://www.kub.com/numquam-sit-rerum-eum-recusandae-voluptas-molestiae-quis.html', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(9, 'Pharmacy Aide', 4, 1, 5, 8941, 'North Lawson', 'Explicabo recusandae vero vitae. Id qui asperiores libero fuga delectus est illum. Sint libero rerum vel et deserunt perferendis enim.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Josie Murazik IV', 'Gorczanyfurt', 'http://reichel.com/reiciendis-quo-et-rerum-atque-porro-atque', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(10, 'Civil Engineering Technician', 4, 2, 4, 6587, 'Samanthaside', 'Itaque nihil saepe et quia amet mollitia modi. Qui dolores corporis consectetur reprehenderit consequuntur cupiditate. Sed totam magnam est nobis natus tempore. Est ut laborum blanditiis modi.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Frida Hills PhD', 'Klockomouth', 'http://torp.com/blanditiis-voluptatum-voluptatem-dicta', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(11, 'Art Teacher', 4, 3, 4, 9954, 'North Leatha', 'Qui veniam ea facere qui vitae omnis vel velit. Occaecati error eos et et. Voluptatibus aliquid et dolor facere voluptates praesentium. Ut autem deleniti deleniti.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Prof. Glen Boyle I', 'Toytown', 'https://vonrueden.com/aperiam-molestias-et-repellat-sint.html', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(12, 'Structural Metal Fabricator', 4, 3, 2, 8716, 'Eddieport', 'Quo eum dolores deserunt. Nulla autem laudantium enim consequatur et quae. Labore quia et perspiciatis placeat harum voluptatibus optio. Illo sunt non voluptatum.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Giovanni Konopelski', 'Port Katrina', 'http://www.stanton.com/consequatur-voluptatem-quam-molestias-qui', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(13, 'Forensic Science Technician', 1, 4, 3, 5770, 'North Rick', 'Aut ut voluptatum asperiores harum voluptas qui. Qui mollitia laborum rerum et quis quas fugit. Cumque quis facere sed.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Charley Gleason', 'Emmaleeside', 'http://www.ondricka.net/ut-aperiam-non-voluptatem-vel-expedita-ullam-reiciendis', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(14, 'Insurance Claims Clerk', 1, 2, 1, 7434, 'Garthstad', 'Cupiditate inventore corporis dolores omnis et cumque. Earum sed corrupti praesentium reprehenderit aut nobis.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Jarod Berge', 'Claudmouth', 'https://schultz.info/assumenda-saepe-sit-quo-quibusdam-veniam-corporis-aut.html', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(15, 'Timing Device Assemblers', 2, 2, 1, 5922, 'Lake Gageland', 'Et expedita molestiae aut. Perspiciatis dolorem ut consequatur nisi. Maxime explicabo ipsum culpa iusto perferendis. Sint consequatur ab architecto.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Anabel Reilly', 'South Verdiefurt', 'http://www.monahan.info/minima-quae-dolorem-cumque-incidunt-quibusdam', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(16, 'Fitter', 1, 1, 1, 5251, 'Madelynhaven', 'Enim beatae modi voluptas sunt perferendis. Necessitatibus repudiandae ullam error. Vel cum amet et sed. Ratione iure id in qui beatae ipsum. Unde velit quos maiores quia voluptas molestiae.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Anahi Gottlieb', 'Port Retta', 'http://cummings.com/in-ut-expedita-cum-iusto-amet-minima-eos', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(17, 'Fashion Model', 2, 3, 2, 8735, 'Maidamouth', 'Voluptates quia velit nihil ducimus. Et dolor quae deleniti unde ut consequatur porro voluptate. Totam eos sed cupiditate saepe laboriosam. At nam quae in numquam explicabo et adipisci.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Christ Wisoky', 'Lylafurt', 'http://www.wuckert.org/consequuntur-praesentium-in-vero-dolore-sint-temporibus', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(18, 'Restaurant Cook', 4, 1, 4, 9484, 'Abernathyview', 'Explicabo cum aut maxime. Qui in cupiditate ut dolor distinctio id quod ut. Aliquid adipisci consequuntur et non maxime.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Liam Corkery Jr.', 'South Ariel', 'https://leuschke.com/modi-illum-et-et-amet-quidem.html', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(19, 'Product Management Leader', 1, 4, 5, 7160, 'Streichbury', 'Vitae aut velit cupiditate vero. Fuga ipsum molestias saepe provident autem. Quia libero ipsum incidunt est.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Miss Shana Hirthe III', 'Port Kennedyburgh', 'https://www.wilderman.com/quisquam-at-aliquid-sequi-quibusdam-voluptas-consequatur-quia', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(20, 'Home Economics Teacher', 2, 1, 1, 6558, 'Lake Barbaraton', 'At veritatis nihil laborum deleniti. Corporis quaerat ducimus aut officia consequatur quos fugit. Doloribus ea culpa eum est.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Mr. Oral Abernathy', 'Russelside', 'https://moore.com/ut-similique-aut-et-sit-cumque-rerum.html', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(21, 'Marking Clerk', 4, 1, 40, 6025, 'Julietburgh', 'Voluptate qui suscipit accusantium nihil ut voluptatem quas. Vitae facilis sed aut veniam id. Repudiandae voluptates assumenda nostrum. Quo adipisci non tempora odio et eum.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Tremaine Schroeder', 'Hirtheberg', 'http://www.turner.biz/', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(22, 'Pipefitter', 1, 4, 1, 9412, 'Fordhaven', 'Animi ipsa dolores et rerum. Velit deleniti aperiam eum. Reprehenderit tenetur exercitationem sed deserunt tenetur minima. Modi consequatur iste sed nesciunt placeat.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Leone Little', 'East Trentonchester', 'https://www.nikolaus.info/totam-ut-alias-reiciendis-optio-tenetur-laboriosam', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(23, 'Radiologic Technician', 2, 1, 5, 7991, 'Anjalistad', 'Sit voluptas quae sunt et eum neque consequatur. Iusto enim tenetur voluptas odio optio.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Noe McKenzie', 'Funkstad', 'http://www.senger.biz/suscipit-accusamus-iure-iste-deleniti-sed-animi-tempora', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 0),
(24, 'Reservation Agent OR Transportation Ticket Agent', 3, 2, 5, 6148, 'East Rosachester', 'Sequi assumenda animi eius omnis. Necessitatibus nihil ex esse magnam velit quos eveniet et. At nisi quibusdam temporibus.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Leonora Smitham MD', 'Gottliebborough', 'http://cormier.com/quasi-dolor-possimus-sed-sit-provident.html', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(25, 'Agricultural Crop Farm Manager', 4, 2, 5, 5067, 'New Marty', 'Ab et omnis eum doloremque sit est. Quos nisi similique animi qui. Magnam cumque nesciunt dolores minima sint quia id velit. Ipsa rerum voluptatem eveniet quia rerum quibusdam quia.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Marques Terry', 'North Sydnihaven', 'http://thompson.com/ipsum-possimus-porro-modi-sapiente-ut-et.html', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 1, 1, 0),
(26, 'Petroleum Pump System Operator', 3, 4, 5, 8715, 'Parkerport', 'Possimus et consectetur nobis. Quia iste est velit expedita enim in. Aliquid qui beatae provident illum minus. Qui minus numquam voluptatem est dolorem vitae.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Jacques Boyle', 'Conroyview', 'http://klocko.biz/ullam-quasi-nihil-natus-harum-qui-minus', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 1),
(27, 'Actor', 4, 1, 4, 6200, 'Marksberg', 'Quia tenetur veniam voluptas. Minima voluptate fuga quis.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Aryanna Batz', 'West Angie', 'http://schamberger.com/', '2025-07-27 02:09:05', '2025-07-27 02:09:05', 2, 1, 1),
(28, 'Military Officer', 4, 3, 40, 9976, 'New Krystina', 'Nam error id possimus vel. Veniam deserunt provident quibusdam. Quo tenetur aut eos cumque earum sed.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, 'Miltary', '5 Years', 'Lola Ryan', 'Port Kobe', 'http://www.reynolds.info/laborum-rem-perspiciatis-praesentium-voluptatibus.html', '2025-07-28 02:09:05', '2025-07-27 02:09:05', 2, 1, 1),
(29, 'Employment Interviewer', 3, 2, 3, 6480, 'North Orlo', 'Possimus sint cupiditate minima ullam eos recusandae beatae aliquam. Laborum expedita ipsum repellendus doloremque. Quo harum maxime molestiae.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Rosalia Sporer PhD', 'Port Kennaville', 'http://rempel.com/maxime-ut-recusandae-magni-id-aspernatur-totam', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(30, 'Life Scientists', 2, 4, 5, 8327, 'Enolaside', 'Quos sit et perferendis enim et ut. Molestiae voluptas excepturi qui dolorum veritatis. Eveniet maxime est reprehenderit est earum.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Mara Bartoletti', 'East Noblemouth', 'http://schinner.com/vel-et-totam-et-assumenda-suscipit-et', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(31, 'Computer Support Specialist', 3, 3, 1, 6632, 'East Annettestad', 'Rerum ducimus id mollitia. Omnis molestiae laborum quia et esse enim. Modi nulla voluptate dicta et adipisci exercitationem tempora. Est impedit aperiam nisi sequi totam ratione.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Billie Kiehn', 'New Coleburgh', 'http://www.hudson.org/qui-repudiandae-fuga-dolorem-molestiae-qui-consequatur-nostrum', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(32, 'Sailor', 4, 1, 2, 9387, 'North Gaymouth', 'Nisi est vel harum quia. Eaque omnis doloremque nihil facere saepe aut. Provident doloremque quas qui omnis id quas. Earum nemo ut voluptatem reprehenderit sed et illo.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Hollie Kassulke', 'West Kassandraborough', 'http://www.boyer.com/quia-dolores-quas-eum-iure-et-amet-est-deleniti.html', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(33, 'Equal Opportunity Representative', 3, 1, 3, 5301, 'South Karelle', 'Reiciendis tempora repudiandae nihil omnis. Hic saepe in est veniam. Eius dolor officiis incidunt iste fugit. Vitae dolores aut officiis voluptate.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Lamont Macejkovic', 'Bartonshire', 'http://www.gusikowski.com/hic-aut-et-rerum-vero', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(34, 'Underground Mining', 4, 2, 3, 9936, 'South Larissa', 'Omnis itaque cupiditate culpa sed. Iure aspernatur molestiae ratione voluptate fuga ut. Et aut consequatur similique aspernatur. Non eveniet voluptas odio soluta qui possimus.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Felton Cremin', 'East Mustafa', 'https://daugherty.com/perferendis-qui-laboriosam-corporis-eos-eos-qui.html', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(35, 'Painter and Illustrator', 4, 3, 1, 8115, 'Schowalterfurt', 'Aut animi quisquam dolore ea eveniet velit. Sit corporis consequatur recusandae reiciendis in labore. Perspiciatis ea qui exercitationem et nemo deserunt nostrum.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Kurt Vandervort', 'Schneiderbury', 'https://www.quigley.com/commodi-quia-rem-sed-a', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(36, 'Residential Advisor', 3, 4, 2, 9358, 'Lake Teagan', 'Corrupti fugiat et fugit id. Aperiam sed inventore et eligendi quos veritatis. Rerum qui aspernatur vero ab nihil qui sit. Qui consequuntur cupiditate similique quod voluptas qui maiores.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Leon Kunze', 'Herthahaven', 'http://keeling.com/quia-maiores-voluptatem-occaecati-autem-sit-quae', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(37, 'Farm Labor Contractor', 4, 4, 4, 5905, 'New Julietchester', 'Iusto ea ut quis veniam quae aut. Corporis voluptatem voluptas qui beatae eum. Id incidunt voluptatem quis aut recusandae molestiae ut.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Maci Miller I', 'South Jace', 'http://satterfield.com/', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(38, 'Pressure Vessel Inspector', 2, 1, 5, 7028, 'Jacobsborough', 'Est quia dolorem vel. Aperiam est est et nihil autem illum. Nisi aspernatur id velit quia itaque soluta. Quidem similique dolores consequatur laborum rerum eaque.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Perry O\'Hara', 'Silasshire', 'http://predovic.info/totam-sequi-numquam-neque-voluptatum-saepe.html', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(39, 'Logging Worker', 3, 3, 2, 5153, 'Ondrickaborough', 'Hic consequatur excepturi a ullam eos inventore. Dignissimos sit consequuntur repellat numquam autem. Quia quos adipisci quis inventore.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Dr. Mabelle Schneider', 'West Ben', 'http://www.beer.com/suscipit-aut-molestiae-quasi-optio', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(40, 'Wind Instrument Repairer', 3, 1, 4, 7692, 'Jasperfort', 'Et possimus velit ipsum quibusdam. Aut harum dolor cupiditate magni. Nam vel voluptatum qui consequuntur illo at.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Brain Wuckert', 'Romaguerachester', 'https://hyatt.com/quia-velit-quis-sint-dolorem-mollitia-soluta.html', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(41, 'School Bus Driver', 2, 1, 5, 5614, 'New Simchester', 'Nemo voluptate dolorum consequuntur facilis esse amet. Quis tenetur saepe in molestiae. Reprehenderit sunt corporis ut qui ut rem sit. Rerum ut eveniet nesciunt.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Mrs. Bernita Runolfsson', 'Daughertychester', 'https://www.hand.com/nobis-sed-sint-placeat-dolorem', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(42, 'Legal Secretary', 3, 3, 4, 7491, 'Hellerville', 'Odio veniam tempora ex accusantium. Maiores tempore assumenda sint in odio molestiae molestiae cupiditate. Architecto architecto ut possimus perferendis non.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Prof. Terence VonRueden', 'Lake Miguelport', 'https://www.beer.com/quae-mollitia-et-consequatur-necessitatibus-asperiores-distinctio-ullam', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(43, 'Airline Pilot OR Copilot OR Flight Engineer', 2, 3, 4, 9701, 'Veldaborough', 'Corrupti non omnis consequatur excepturi eos. Voluptas doloremque eius soluta rerum. Quo architecto tempore voluptate rerum natus delectus. Pariatur porro laudantium id neque commodi enim.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Dr. Tad Lehner', 'Mannchester', 'http://bauch.info/qui-nesciunt-consequuntur-repellat-aspernatur', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(44, 'Farm Labor Contractor', 2, 4, 5, 5609, 'East Loyalview', 'Aliquam suscipit at ea sit odio quia vero iure. Animi deserunt reprehenderit hic temporibus molestiae doloremque placeat. Libero voluptatem quo iste qui.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Ms. Dorothea Sanford', 'Weimannstad', 'http://christiansen.com/dolorum-sunt-eius-ipsum-modi', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(45, 'Sketch Artist', 1, 3, 4, 7534, 'New Laviniashire', 'Voluptate ea unde maxime atque tempore excepturi. Repellendus quo et repudiandae sed dolor. Numquam quaerat ipsam quos consequatur ut aperiam.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Allan Ruecker', 'Riceberg', 'https://www.schowalter.com/autem-repellendus-hic-sunt-earum-qui-tempora', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(46, 'Janitorial Supervisor', 2, 3, 2, 9543, 'Lake Eden', 'Et qui est id quo suscipit iure saepe corporis. Reprehenderit dolorum quaerat officia quia. Quo cum voluptas in molestias repudiandae. Temporibus sed aut at autem molestiae modi.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Amparo Lockman', 'Kertzmannside', 'http://glover.com/enim-recusandae-sunt-voluptatem-alias', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(47, 'Gluing Machine Operator', 4, 4, 3, 9831, 'North Connie', 'Tenetur repellendus ducimus in libero. Aut eum soluta sit minima. Labore vero numquam quis. In sit pariatur eos ex sit autem illo.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Dr. Darby Gutkowski', 'New Guido', 'http://www.lebsack.org/', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(48, 'Artist', 1, 2, 2, 6963, 'Emanuelborough', 'Nam aut occaecati voluptatem laborum autem accusantium. Corrupti qui consequatur voluptas porro amet placeat. Eos voluptatem placeat natus sit velit. Sequi voluptatem nihil quae qui illo id harum.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Jacinthe Braun', 'New Samanta', 'http://fritsch.com/', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 1, 1, 0),
(49, 'Garment', 3, 2, 4, 8122, 'West Halmouth', 'Et molestiae animi eum enim praesentium. Est et rem maxime sequi aut. Magnam eum odit sit voluptatem corrupti aut eaque molestiae. Aut inventore aperiam omnis ea.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Jeremy McDermott', 'Port Chasity', 'https://www.turner.com/non-tempora-totam-omnis-aperiam-voluptas', '2025-08-27 07:53:03', '2025-08-27 07:53:03', 2, 1, 0),
(50, 'Meat Packer', 4, 2, 4, 5889, 'West Estrellamouth', 'Non nisi amet ipsam. Porro omnis velit qui et ea itaque sit. Sit veritatis quis reiciendis quidem. Cumque hic assumenda minus. Et est exercitationem animi vitae.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Demarco Bradtke', 'New Edna', 'https://howell.com/voluptatem-repudiandae-unde-laudantium-rerum-necessitatibus-ipsa-ipsam.html', '2025-08-27 07:53:03', '2025-09-08 05:04:48', 2, 2, 0),
(51, 'Central Office Operator', 4, 3, 5, 6940, 'Declanhaven', 'Fuga dicta neque eligendi consequatur aut et sed. Dicta deserunt quis consequatur id beatae. Earum enim pariatur dolorum aut excepturi dolor porro.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Mr. Buster Reichel', 'Glovershire', 'http://www.kovacek.info/porro-fugit-eos-laudantium-officiis-commodi-quas.html', '2025-08-27 07:53:03', '2025-09-08 03:11:50', 2, 2, 0),
(52, 'Pewter Caster', 3, 4, 5, 5111, 'North Rahul', 'Quisquam magni iste molestiae enim sit maiores. Ipsa ducimus temporibus accusantium sit quaerat qui perspiciatis repudiandae. Quia sunt qui nesciunt consequuntur pariatur.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Thalia Mayert', 'Hickleborough', 'http://mcglynn.com/error-amet-adipisci-pariatur-laudantium-omnis', '2025-08-27 07:53:03', '2025-09-08 03:11:30', 2, 3, 0),
(53, 'Drafter', 3, 2, 30, 6540, 'West Jonmouth', 'Assumenda minima sapiente in et. Ipsum et et adipisci sit sit maxime.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing.', NULL, NULL, NULL, '5 Years', 'Rosetta Blick', 'Ryanmouth', 'http://wilkinson.com/exercitationem-labore-harum-aliquam-officiis-qui-molestias.html', '2025-08-27 07:53:03', '2025-09-08 05:23:27', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('chandu.p@versatileitsol.com|127.0.0.1', 'i:1;', 1757173091),
('chandu.p@versatileitsol.com|127.0.0.1:timer', 'i:1757173091;', 1757173091),
('nagender5311naroju@gmail.com|127.0.0.1', 'i:1;', 1757173086),
('nagender5311naroju@gmail.com|127.0.0.1:timer', 'i:1757173086;', 1757173086);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 1, '2025-07-26 06:41:37', '2025-07-26 06:41:37'),
(2, 'Accountant', 1, '2025-07-26 06:41:37', '2025-07-26 06:41:37'),
(3, 'Information Technology', 1, '2025-07-26 06:42:18', '2025-07-26 06:42:18'),
(4, 'Fashion designing', 1, '2025-07-26 06:42:18', '2025-07-26 06:42:18');

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
-- Table structure for table `jobs_applieds`
--

CREATE TABLE `jobs_applieds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs_applieds`
--

INSERT INTO `jobs_applieds` (`id`, `user_id`, `job_id`, `status`, `created_at`, `updated_at`) VALUES
(22, 2, 24, 'approved', '2025-09-05 23:26:03', '2025-09-10 07:13:18'),
(23, 1, 52, 'pending', '2025-09-05 23:27:52', '2025-09-05 23:27:52'),
(26, 1, 49, 'pending', '2025-09-06 00:11:20', '2025-09-06 00:11:20');

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
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', 1, NULL, NULL),
(2, 'Part Time', 1, NULL, NULL),
(3, 'Remote', 1, NULL, NULL),
(4, 'Freelance', 1, NULL, NULL);

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
(8, '0001_01_01_000000_create_users_table', 1),
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2025_07_25_102107_add_columns_to_users_table', 1),
(12, '2025_07_25_115244_create_categories_table', 2),
(13, '2025_07_25_115323_create_job_types_table', 2),
(14, '2025_07_25_121402_create_available_jobs_table', 3),
(15, '2025_07_26_072043_alter_available_jobs_add_user_id_column', 4),
(16, '2025_07_26_074015_alter_available_jobs_table', 5),
(18, '2025_08_16_064130_create_saved_jobs', 6),
(19, '2025_08_16_130607_create_jobs_applieds_table', 7),
(20, '2025_09_08_122950_create_personal_access_tokens_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'auth_token', 'd3c145b53882a1901c551aa91dddeb86100b4e836ff2b6990a47eff54a1dc78e', '[\"*\"]', NULL, NULL, '2025-09-08 07:56:53', '2025-09-08 07:56:53'),
(2, 'App\\Models\\User', 4, 'auth_token', '7c8613d537cbe565809293b0af49e7755437a212f42d7e29650f99c62c03a644', '[\"*\"]', NULL, NULL, '2025-09-08 07:57:27', '2025-09-08 07:57:27'),
(3, 'App\\Models\\User', 4, 'auth_token', '45a5b3f2d0ca896d77161c775a42662175b1683fb20f832c709377a529ef1dcd', '[\"*\"]', '2025-09-08 08:15:56', NULL, '2025-09-08 07:57:34', '2025-09-08 08:15:56'),
(4, 'App\\Models\\User', 4, 'auth_token', '4590a1b4c98e1ba3a62ce328020064656829ceb34a8b1841c5375da3cc963884', '[\"*\"]', '2025-09-10 06:23:59', NULL, '2025-09-09 22:40:02', '2025-09-10 06:23:59'),
(5, 'App\\Models\\User', 1, 'auth_token', 'c8d6bba8d5d300a50b6dba88d4587ec171e9e1c395c9ccce6c0decb7bedb6b2e', '[\"*\"]', '2025-09-10 07:54:50', NULL, '2025-09-10 05:31:26', '2025-09-10 07:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 1, 28, '2025-08-16 06:54:45', '2025-08-16 06:54:45'),
(3, 1, 27, '2025-08-27 07:34:30', '2025-08-27 07:34:30'),
(4, 1, 26, '2025-08-27 07:34:56', '2025-08-27 07:34:56'),
(5, 1, 22, '2025-08-27 07:35:53', '2025-08-27 07:35:53'),
(8, 1, 47, '2025-08-29 06:32:03', '2025-08-29 06:32:03'),
(9, 1, 46, '2025-09-05 23:20:27', '2025-09-05 23:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('auyhnBe2QH9c7AZ0qrZXxSjaeiWGHUzCb5YFLPHq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUENuVnFXT0dudEI3aTJHRTdnNjJzMVFsNlA0amlyRmZlUGFUdk5WUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9maW5kLWpvYnMiO319', 1757510869),
('eS5D0h8GlN2pspbYjYSo8zODozM08C2HWxsNyDS6', NULL, '127.0.0.1', 'PostmanRuntime/7.46.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMHlVSTVFUm1qcFFVN3hteFd2b0RMT3NENkNUNW12eENCckpBNWlOWSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757510639);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=>employer,2=>job seeker,3=>admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `designation`, `phone_number`) VALUES
(1, 'Naroju Nagender', 'nagender.n@versatileitsol.com', 1, NULL, '$2y$12$pkfWKtwMhkPVz7cqfmqT0OQ8dwjQ2LHDBGnOvWOZIqO6r0OKiqASq', NULL, '2025-07-25 05:00:31', '2025-09-06 05:35:02', 'Web Developer', '7729867647'),
(2, 'Chandu', 'nagender5311naroju@gmail.com', 2, NULL, '$2y$12$4ONJJz0ZiCjVmZG1AcZNvOGkXKSDjxDizcVyKABvQIZRo/NrrYGgm', NULL, '2025-07-25 05:42:48', '2025-08-31 00:34:46', 'UI Developer', '7729867647'),
(3, 'Lucky', 'luckynaroju@gmail.com', 3, NULL, '$2y$12$l2xQq11b7f.LcRb10lM0Sux5J5dpJwE0dKC9qweFi3uHUY6h2PCAS', NULL, '2025-09-06 04:48:32', '2025-09-06 04:48:58', 'Web Developer', '7729867647'),
(4, 'nagender', 'nage@gmail.com', 2, NULL, '$2y$12$SiGTOVU5/k.6AdguW5fmNO/a7wbb6b16rATR0lsx8d0zbIwoUvR1K', NULL, '2025-09-08 07:45:19', '2025-09-08 07:45:19', NULL, '7729867647');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_jobs`
--
ALTER TABLE `available_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_jobs_category_id_foreign` (`category_id`),
  ADD KEY `available_jobs_job_type_id_foreign` (`job_type_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `jobs_applieds`
--
ALTER TABLE `jobs_applieds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_applieds_user_id_foreign` (`user_id`),
  ADD KEY `jobs_applieds_job_id_foreign` (`job_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_jobs_user_id_foreign` (`user_id`),
  ADD KEY `saved_jobs_job_id_foreign` (`job_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `available_jobs`
--
ALTER TABLE `available_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `jobs_applieds`
--
ALTER TABLE `jobs_applieds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_jobs`
--
ALTER TABLE `available_jobs`
  ADD CONSTRAINT `available_jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `available_jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs_applieds`
--
ALTER TABLE `jobs_applieds`
  ADD CONSTRAINT `jobs_applieds_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `available_jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_applieds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `available_jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
