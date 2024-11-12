-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan_webphim1975`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(3, 'PHIM LẺ MỚI', '456 4444', 1, 'phim-le-moi', 2),
(5, 'Phim Mới', 'cập nhật', 1, 'phim-moi', 1),
(6, 'PHIM HOẠT HÌNH MỚI', 'mới cập nhật', 1, 'phim-hoat-hinh-moi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'Việt Nam vô địch 111', 1, 'viet-nam'),
(3, 'Trung Quốc', 'ăâê', 1, 'trung-quoc'),
(4, 'Thái Lan', 'Thái Lan', 1, 'thai-lan'),
(5, 'Mỹ', 'abcd', 1, 'my');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `date_created`, `status`) VALUES
(1, 'webphim1975', 'webphim1975@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-06-07 19:24:39', 1),
(3, 'truongngoctanhieu', 'truongngoctanhieu2018@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-06-07 20:59:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_balance`
--

CREATE TABLE `customer_balance` (
  `id` int(11) NOT NULL,
  `balance` varchar(20) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_balance`
--

INSERT INTO `customer_balance` (`id`, `balance`, `date_created`, `customer_id`) VALUES
(1, '25700', '2023-06-07 19:24:39', 1),
(3, '20000', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer_buys`
--

CREATE TABLE `customer_buys` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_expired` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_buys`
--

INSERT INTO `customer_buys` (`id`, `customer_id`, `package_id`, `date_created`, `date_expired`, `status`) VALUES
(9, 1, 2, '2023-06-10 12:17:26', '2023-07-10 12:17:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_packages`
--

CREATE TABLE `customer_packages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `date_package` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_packages`
--

INSERT INTO `customer_packages` (`id`, `title`, `description`, `status`, `price`, `date_package`) VALUES
(1, 'Gói Vip', 'Gói Vip', 1, '1800000', '2023-06-07 18:44:34'),
(2, 'Gói Thường', 'Gói Thường', 1, '1500000', '2023-06-07 18:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` varchar(500) NOT NULL,
  `episode` varchar(11) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `updated_at`, `created_at`) VALUES
(2, 14, '<p><iframe allowfullscreen scrolling=\"0\" frameborder=\"0\" height=\"360\" width=\"100%\" src=\"https://play2.gotphim.com/public/index.html?id=63469829bbfca7f1d323b88b&ads=https://toolpg.com/demo.xml&ads2=https://toolpg.com/demo1.xml&subs=&lang=vietnam&v=1684826576\"></iframe></p>', '1', '2023-05-23 14:33:48', '2023-05-23 14:33:48'),
(3, 14, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-5EECKfb028\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2', '2023-05-22 18:24:31', '2023-05-22 18:24:31'),
(4, 14, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-NH7j6pXaeA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '3', '2023-05-23 11:27:51', '2023-05-23 11:27:51'),
(7, 14, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Sqn1SLu0grY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '4', '2023-05-23 11:28:33', '2023-05-23 11:28:33'),
(8, 11, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/xaBBtr2k7xM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'FullHD', '2023-05-23 13:04:12', '2023-05-23 13:04:12'),
(9, 15, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AcTVAW-Hh6E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'HD', '2023-06-10 11:07:22', '2023-06-10 11:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(2, 'Hành Động', 'Cập nhật 123', 1, 'hanh-dong'),
(3, 'Tâm Lý', 'hay', 1, 'tam-ly'),
(4, 'Võ Thuật', 'Mới cập nhật', 1, 'vo-thuat'),
(5, 'Hài Hước', 'Mới cập nhật', 1, 'hai-huoc'),
(6, 'Lãng Mạn', 'Mới cập nhật', 1, 'lang-man'),
(7, 'Viễn Tưởng', 'Mới cập nhật', 1, 'vien-tuong'),
(8, 'Kịnh Dị', 'Mới cập nhật', 1, 'kinh-di');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_24_074008_tbl_customer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thuocphim` varchar(10) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `trailer` varchar(100) DEFAULT NULL,
  `sotap` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `sub` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(50) DEFAULT NULL,
  `ngaycapnhat` varchar(50) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `season` int(11) NOT NULL DEFAULT 0,
  `tags` text DEFAULT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `thoiluong`, `slug`, `description`, `status`, `image`, `category_id`, `thuocphim`, `genre_id`, `country_id`, `phim_hot`, `trailer`, `sotap`, `resolution`, `name_eng`, `sub`, `ngaytao`, `ngaycapnhat`, `year`, `season`, `tags`, `package_id`) VALUES
(4, 'One Piece Film: Red', NULL, 'one-piece-film-red', 'One Piece Movie 15 (2022)', 1, 'op23152.jpg', 3, 'phimbo', 7, 1, 0, NULL, 1, 0, 'One Piece Film: Red', 0, NULL, '2023-05-07 17:07:55', '2022', 0, NULL, 1),
(6, 'Avatar 2: Dòng Chảy Của Nước', '110 phút', 'avatar-2-dong-chay-cua-nuoc', 'Avatar 2 Avatar 2: Dòng Chảy Của Nước 2022 Full HD Vietsub Thuyết Minh sau avatar 1 Hai nhân vật chính, Jake Sully và Neytiri, giờ đã thành đôi, nguyện sẽ ở bên nhau. Tuy nhiên, cả hai buộc phải rời khỏi nhà và khám phá những miền đất mới trên mặt trăng Pandora, cũng chính là lúc những mối nguy cũ trở lại với họ. cùng phimmoi hóng bộ phim thế thân 2 Dòng Chảy Của Nước bom tấn này nge\r\nCốt truyện cho thấy Jake và gia đình của anh ấy là mục tiêu của những kẻ thực dân loài người, những người muốn biến Pandora thành ngôi nhà mới cho cư dân Trái đất, vì vậy họ chạy trốn khỏi ngôi nhà trong rừng của mình và tìm nơi ẩn náu với một cộng đồng Na\'vi lưỡng cư trên đại dương, được gọi là Metkayina. Điều này có nghĩa là phần lớn bộ phim diễn ra trong, dưới hoặc xung quanh nước, liên quan đến một mức độ hiểu biết mới về môi trường và công nghệ. Landau nói: “Ánh sáng di chuyển khác nhau dưới nước. \"Vì vậy, chúng tôi cần tạo ra một hệ thống chụp hoàn toàn khác để hoạt động với các điểm đánh dấu phản chiếu và một hệ thống khác trên mặt nước, đồng thời để chúng hoạt động cùng nhau.\"', 1, 'avt34958.jpg', 5, 'phimle', 7, 5, 1, 'gq2xKJXYZ80', 1, 0, 'Avatar', 0, NULL, '2023-05-22 16:40:19', NULL, 0, 'Avatar 2: Dòng Chảy Của Nước, Avatar 2, phim Avatar 2: Dòng Chảy Của Nước, Avatar 2 HD, Avatar 2: Dòng Chảy Của Nước Viet-Engsub, Avatar 2: Dòng Chảy Của Nước FHD', 2),
(8, 'Người Kiến Và Chiến Binh Ong: Thế Giới Lượng Tử', NULL, 'nguoi-kien-va-chien-binh-ong-the-gioi-luong-tu', 'Người Kiến Và Chiến Binh Ong: Thế Giới Lượng Tử nói về Scott Lang và Hope Van Dyne trở lại tiếp tục cuộc phiêu lưu của họ với vai trò Người Kiến và Chiến binh Ong', 1, 'image_2023-02-28_1615082828251.png', 3, 'phimle', 7, 1, 1, NULL, 1, 0, 'Ant-Man and the Wasp: Quantumania', 0, NULL, '2023-05-21 12:19:25', '2015', 0, NULL, 1),
(9, 'SÁT THỦ JOHN WICK 4', NULL, 'sat-thu-john-wick-4', 'Sát Thủ John Wick 4 là câu chuyện với cái giá phải trả ngày càng tăng, John Wick tham gia cuộc chiến chống lại High Table trên toàn cầu khi tìm kiếm những người chơi quyền lực nhất trong thế giới ngầm, từ New York qua Paris, Osaka đến cả Berlin.', 1, '11vhu9in_1920x1080-johnwick3-chuanbichientranh1559.jpg', 5, 'phimle', 7, 4, 1, NULL, 1, 2, 'John Wick: Chapter 4', 0, NULL, '2023-05-22 18:22:31', '2014', 0, NULL, 1),
(10, 'Tay Đấm Huyền Thoại 3', '133 phút', 'tay-dam-huyen-thoai-3', 'Sau khi thống trị thế giới quyền anh, Adonis Creed đã phát triển mạnh mẽ trong cả sự nghiệp và cuộc sống gia đình. Khi một người bạn thời thơ ấu và cựu thần đồng quyền anh, Damian (Jonathan Majors), tái xuất sau khi thụ án tù dài hạn, anh ta háo hức chứng minh rằng mình xứng đáng được trở lại võ đài. Cuộc chạm trán giữa những người bạn cũ không chỉ là một cuộc chiến trên võ đài thông thường. Để có thể chiến thắng, Adonis phải đặt tương lai của mình lên trên hết để chiến đấu với Damian — một võ sĩ không còn gì để mất.', 1, 'creeed33410.jpg', 5, 'phimle', 4, 1, 1, '2iPOTWpmg2I', 1, 0, 'Creed 3', 0, NULL, '2023-05-22 16:01:40', '2017', 3, NULL, 1),
(11, 'VỆ BINH DẢI NGÂN HÀ 3', '150 phút', 've-binh-dai-ngan-ha-3', 'phim mới', 1, 'review-ve-binh-giai-ngan-ha-3-2-16588.jpg', 3, 'phimle', 4, 5, 1, '89aYxQcGGA4', 1, 1, 'Guardians of the Galaxy Vol. 3', 1, '2023-05-07 15:50:26', '2023-05-23 12:55:02', NULL, 0, 'Vệ Binh Dải Ngân Hà 3,Guardians of the Galaxy Vol. 3,phim Vệ Binh Dải Ngân Hà 3, Guardians of the Galaxy Vol. 3 HD,', 1),
(13, 'Thế giới không lối thoát', '49 phút', 'the-gioi-khong-loi-thoat', 'phim bộ', 1, 'thumb-1920-11236521054.jpg', 6, 'phimbo', 8, 4, 1, '49_44FFKZ1M', 8, 1, 'Alice in Borderland', 1, '2023-05-21 13:06:08', '2023-05-21 15:12:53', NULL, 0, 'Thế Giới Không Lối Thoát (Phần 1), Alice in Borderland / Imawa no Kuni no Alice, phim Thế Giới Không Lối Thoát (Phần 1), Thế Giới Không Lối Thoát (Phần 1) tập 1', 1),
(14, 'Thợ săn quỷ', '25 phút', 'tho-san-quy', 'phim hoạt hình', 1, 'jo7t213c6yn51457.png', 6, 'phimbo', 8, 4, 0, NULL, 12, 1, 'Chainsaw Man', 1, '2023-05-22 18:04:45', '2023-05-22 18:12:52', NULL, 0, 'Thợ Săn Quỷ,Chainsaw Man,phim Thợ Săn Quỷ Thợ Săn Quỷ tập 1,Thợ Săn Quỷ mới nhất, Thợ Săn Quỷ Vietsub', 1),
(15, 'adasdsa', '120 phút', 'adasdsa', 'dsadsad', 1, '61bc7baa3cf021042.jpg', 5, 'phimle', 6, 1, 1, 'https://youtu.be/vBW0lgHPONo', 1, 0, 'Jujutsu Kaisen 0 Movie (Gekijouban Jujutsu Kaisen 0)', 0, '2023-06-10 11:03:48', '2023-06-10 11:20:35', NULL, 0, 'dasdas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(2, 11, 3),
(5, 11, 4),
(6, 11, 2),
(10, 10, 2),
(11, 10, 4),
(12, 6, 2),
(13, 6, 7),
(14, 9, 2),
(15, 9, 4),
(16, 9, 7),
(17, 8, 2),
(18, 8, 3),
(19, 8, 6),
(20, 8, 7),
(21, 4, 2),
(22, 4, 5),
(23, 4, 7),
(27, 13, 2),
(28, 13, 3),
(29, 13, 7),
(30, 13, 8),
(31, 14, 2),
(32, 14, 7),
(33, 14, 8),
(34, 15, 3),
(35, 15, 5),
(36, 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `napthe`
--

CREATE TABLE `napthe` (
  `id` int(11) NOT NULL,
  `request_id` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `partner_id` varchar(20) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `telco` varchar(20) NOT NULL,
  `command` varchar(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `napthe`
--

INSERT INTO `napthe` (`id`, `request_id`, `code`, `partner_id`, `serial`, `telco`, `command`, `customer_id`, `amount`) VALUES
(1, '662048295', '20000251925236', '44738308246', '823522203055335', 'VIETTEL', 'charging', 1, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'webphim', 'webphim1975@gmail.com', NULL, '$2y$10$43BJfmQOX44pCZn988EMtesZ0PAZVpBz0VPVHZGCvrnWZNmOIytHO', 'tZ3ZYHztUvHLzTxvfJPzg1HOmlLkol2KazpGRFyoZVbfFIJUkxhWWMycgIFO', '2023-03-25 23:44:12', '2023-03-25 23:44:12'),
(2, 'hieuadmin', 'hieuadmin@gmail.com', NULL, '$2y$10$ly6eU0ScaOzhgkIDUSsoX.OMKXkf70bhp1caeMpBvug7gJL57wx1u', NULL, '2023-06-02 09:53:10', '2023-06-02 09:53:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_balance`
--
ALTER TABLE `customer_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_buys`
--
ALTER TABLE `customer_buys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_packages`
--
ALTER TABLE `customer_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `napthe`
--
ALTER TABLE `napthe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_balance`
--
ALTER TABLE `customer_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_buys`
--
ALTER TABLE `customer_buys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_packages`
--
ALTER TABLE `customer_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `napthe`
--
ALTER TABLE `napthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
