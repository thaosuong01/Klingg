-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 05:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kling`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0' COMMENT '0: đang duyệt, 1: đang vận chuyển, 2: đã nhận',
  `method` varchar(200) DEFAULT NULL,
  `price_ship` float DEFAULT NULL,
  `voucher` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `phone`, `address`, `total`, `status`, `method`, `price_ship`, `voucher`, `user_id`, `created_at`, `updated_at`) VALUES
(5, '0123456789', 'TL - BT - VL - Viet Nam', '200', '0', 'Pay after recieve', 2, NULL, 3, '2022-10-23 12:16:49', NULL),
(6, '12312312', 'ádsa - álkdák - Country/Region', '200', '0', 'Pay after recieve', 2, NULL, 3, '2022-10-23 14:38:17', NULL),
(7, 'asdasdasd', '10 - 11 - China', '200', '0', 'Paypal', 2, NULL, 3, '2022-10-23 14:53:06', '0000-00-00 00:00:00'),
(8, 'dáddsff', '10ấ - 11sấ - USA', '240', '2', 'Paypal', 2, NULL, 3, '2022-10-23 15:04:50', '0000-00-00 00:00:00'),
(9, '0123456789', '10sfsf - dâd - China', '226', '0', 'Paypal', 2, NULL, 3, '2022-10-23 16:00:33', '0000-00-00 00:00:00'),
(10, '0945115260', 'AX  - CM - Viet Nam', '704', '0', 'Paypal', 2, NULL, 3, '2022-10-26 10:52:37', NULL),
(12, '0123456789', 'AX - CM - Tokyo', '422', '2', 'Pay after recieve', 2, NULL, 3, '2022-10-27 11:10:41', '0000-00-00 00:00:00'),
(13, '0945115260', 'AX - CM - Viet Nam', '240', '0', 'Paypal', 2, NULL, 4, '2022-11-02 11:09:28', NULL),
(14, '0123456789', '10aaa - TL - China', '528', '0', 'Paypal', 2, NULL, 3, '2022-11-04 13:28:27', NULL),
(15, '0932876480', 'Học viện Quân y - Hà Nội - Viet Nam', '200', '2', 'Paypal', 2, NULL, 5, '2022-11-07 13:36:11', '0000-00-00 00:00:00'),
(16, '0123456789', 'Học viện Quân y - Hà Nội - Viet Nam', '578', '0', 'Pay after recieve', 2, NULL, 5, '2022-11-07 13:38:36', NULL),
(17, '0123456789', 'TL - BT - VL - Viet Nam', '379', '1', 'Paypal', 2, NULL, 3, '2022-11-14 17:09:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `carts` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `carts`, `created_at`, `updated_at`) VALUES
(3, 4, '[{\"id\":\"21\",\"name\":\"HUDSON HOBO\",\"image\":\"16659400271258862105.webp\",\"cate_id\":\"1\",\"price\":\"238\",\"description\":\"The Hudson Hobo is minimal and chic, with just the right amount of slouch. This is the perfect everyday option for practical style. \",\"view\":\"98\",\"created_at\":\"2022-10-16 10:19:16\",\"updated_at\":\"2022-10-17 00:07:07\",\"number\":\"1\",\"total\":238},{\"id\":\"18\",\"name\":\"VALENTINA SADDLE CROSSBODY\",\"image\":\"16659399631961020637.webp\",\"cate_id\":\"3\",\"price\":\"182\",\"description\":\"The curved silhouette of the Valentina hobo makes this style a unique classic. With signature hardware and a front pocket, this bag is the ideal accessory for everyday wear.\",\"view\":\"120\",\"created_at\":\"2022-10-16 10:12:08\",\"updated_at\":\"2022-10-17 00:06:03\",\"number\":\"1\",\"total\":182}]', '2022-11-03 15:56:32', NULL),
(4, 3, '[{\"id\":\"46\",\"name\":\"ALLEN CAMERA CROSSBODY\",\"image\":\"1667556025460337979.webp\",\"cate_id\":\"3\",\"price\":\"139\",\"description\":\"The Allen Crossbody is your new goes-with-everything crossbody. Sleek lines and a subtle logo accent this day-to-night bag, while carrying your essentials. \",\"view\":\"0\",\"created_at\":\"2022-11-04 17:00:25\",\"updated_at\":null,\"number\":1,\"total\":139},{\"id\":\"21\",\"name\":\"HUDSON HOBO\",\"image\":\"16659400271258862105.webp\",\"cate_id\":\"1\",\"price\":\"238\",\"description\":\"The Hudson Hobo is minimal and chic, with just the right amount of slouch. This is the perfect everyday option for practical style. \",\"view\":\"98\",\"created_at\":\"2022-10-16 10:19:16\",\"updated_at\":\"2022-10-17 00:07:07\",\"number\":\"1\",\"total\":238}]', '2022-11-03 20:16:20', NULL),
(5, 5, '[{\"id\":\"16\",\"name\":\"HUDSON BITE SIZE TOTE\",\"image\":\"16659399231297401370.webp\",\"cate_id\":\"2\",\"price\":\"288\",\"description\":\"A smaller version of the Hudson tote. Donu2019t be fooled by the term bite-size. This Hudson still fits everything you need to get out of the house (finally).\",\"view\":null,\"created_at\":\"2022-10-16 10:06:33\",\"updated_at\":\"2022-10-17 00:05:23\",\"number\":2,\"total\":576}]', '2022-11-07 13:34:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hobo Bags', '2022-09-30 10:11:50', '2022-10-24 22:43:27'),
(2, 'Satchel Bags', '2022-09-30 10:16:23', '2022-10-24 22:43:35'),
(3, 'Crossbody Bags', '2022-09-30 10:16:58', '2022-10-24 22:43:19'),
(7, 'Tote Bags', '2022-11-04 17:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comments` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `rating`, `comments`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4.5, 'Beautifull', 3, 12, '2022-10-31 13:54:13', NULL),
(2, 3.7, 'kjnkj', 3, 12, '2022-10-31 14:02:36', NULL),
(3, 4.5, 'kjnkj kkkk', 3, 12, '2022-10-31 14:02:46', NULL),
(4, 3.4, 'yjghj', 3, 12, '2022-10-31 14:05:50', NULL),
(5, 2.6, 'gthbffhfh', 3, 12, '2022-10-31 14:07:22', NULL),
(10, 3.5, 'Hihi\n', 3, 12, '2022-10-31 14:17:49', NULL),
(11, 4.5, 'hihi', 3, 12, '2022-10-31 14:18:24', NULL),
(12, 3.5, 'hmmm', 3, 12, '2022-10-31 14:19:28', NULL),
(13, 3.7, 'hmm', 3, 12, '2022-10-31 14:19:51', NULL),
(16, 4.3, 'Haha', 3, 18, '2022-11-02 10:45:10', NULL),
(17, 4.5, 'Good', 4, 21, '2022-11-04 12:07:48', NULL),
(18, 4.5, 'Good', 3, 18, '2022-11-05 13:50:11', NULL),
(19, 4.4, 'Haha', 3, 18, '2022-11-05 13:53:14', NULL),
(27, 4.4, 'hihi', 3, 12, '2022-11-05 14:09:57', NULL),
(44, 4.6, 'Beautiful', 3, 21, '2022-11-26 18:09:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` bigint(20) NOT NULL,
  `id_bill` bigint(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `name_pro` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`id`, `id_bill`, `id_pro`, `number`, `total`, `price`, `image`, `name_pro`, `created_at`, `updated_at`) VALUES
(4, 5, 12, 1, '198', '198', '1665939782385037769.webp', 'CROSSTOWN HOBO', '2022-10-23 12:16:49', NULL),
(5, 6, 12, 1, '198', '198', '1665939782385037769.webp', 'CROSSTOWN HOBO', '2022-10-23 14:38:17', NULL),
(6, 7, 12, 1, '198', '198', '1665939782385037769.webp', 'CROSSTOWN HOBO', '2022-10-23 14:53:06', NULL),
(7, 8, 21, 1, '238', '238', '16659400271258862105.webp', 'HUDSON HOBO', '2022-10-23 15:04:50', NULL),
(8, 9, 13, 1, '224', '224', '16659398491728197258.webp', 'VALENTINA FLAP SATCHEL', '2022-10-23 16:00:33', NULL),
(9, 10, 18, 2, '364', '182', '16659399631961020637.webp', 'VALENTINA SADDLE CROSSBODY', '2022-10-26 10:52:37', NULL),
(10, 10, 13, 1, '224', '224', '16659398491728197258.webp', 'VALENTINA FLAP SATCHEL', '2022-10-26 10:52:37', NULL),
(11, 10, 14, 1, '114', '114', '1665939872366480849.webp', 'HUDSON BITE SIZE TOTE', '2022-10-26 10:52:37', NULL),
(12, 12, 21, 1, '238', '238', '16659400271258862105.webp', 'HUDSON HOBO', '2022-10-27 11:10:41', NULL),
(13, 12, 18, 1, '182', '182', '16659399631961020637.webp', 'VALENTINA SADDLE CROSSBODY', '2022-10-27 11:10:41', NULL),
(14, 13, 21, 1, '238', '238', '16659400271258862105.webp', 'HUDSON HOBO', '2022-11-02 11:09:28', NULL),
(15, 14, 22, 1, '288', '288', '16659400521482363853.webp', 'SOHO BITE SIZE TOTE', '2022-11-04 13:28:27', NULL),
(16, 14, 21, 1, '238', '238', '16659400271258862105.webp', 'HUDSON HOBO', '2022-11-04 13:28:27', NULL),
(17, 15, 12, 1, '198', '198', '1665939782385037769.webp', 'CROSSTOWN HOBO', '2022-11-07 13:36:11', NULL),
(18, 16, 16, 2, '576', '288', '16659399231297401370.webp', 'HUDSON BITE SIZE TOTE', '2022-11-07 13:38:36', NULL),
(19, 17, 46, 1, '139', '139', '1667556025460337979.webp', 'ALLEN CAMERA CROSSBODY', '2022-11-14 17:09:20', NULL),
(20, 17, 21, 1, '238', '238', '16659400271258862105.webp', 'HUDSON HOBO', '2022-11-14 17:09:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-10-20 05:01:17', '2022-10-21 10:15:07'),
(2, 'Client', '2022-10-20 05:01:17', '2022-10-21 10:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `img_product`
--

CREATE TABLE `img_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_product`
--

INSERT INTO `img_product` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(148, 13, '16659398491702947069.webp', '2022-10-17 00:04:09', NULL),
(149, 13, '1665939849235057899.webp', '2022-10-17 00:04:09', NULL),
(150, 13, '16659398491997028581.webp', '2022-10-17 00:04:09', NULL),
(151, 13, '16659398491326559263.webp', '2022-10-17 00:04:09', NULL),
(152, 14, '16659398721546696576.webp', '2022-10-17 00:04:32', NULL),
(153, 14, '16659398721882136747.webp', '2022-10-17 00:04:32', NULL),
(154, 14, '16659398721221398249.webp', '2022-10-17 00:04:32', NULL),
(155, 14, '16659398721417305930.webp', '2022-10-17 00:04:32', NULL),
(156, 15, '16659398991472239032.webp', '2022-10-17 00:04:59', NULL),
(157, 15, '16659398991332886830.webp', '2022-10-17 00:04:59', NULL),
(158, 15, '16659398991274927667.webp', '2022-10-17 00:04:59', NULL),
(159, 15, '16659398992092096563.webp', '2022-10-17 00:04:59', NULL),
(160, 16, '16659399231567446513.webp', '2022-10-17 00:05:23', NULL),
(161, 16, '16659399231182785041.webp', '2022-10-17 00:05:23', NULL),
(162, 16, '16659399231551521034.webp', '2022-10-17 00:05:23', NULL),
(163, 16, '1665939923517244439.webp', '2022-10-17 00:05:23', NULL),
(164, 17, '16659399421060052889.webp', '2022-10-17 00:05:42', NULL),
(165, 17, '1665939942723450317.webp', '2022-10-17 00:05:42', NULL),
(166, 17, '16659399421169758036.webp', '2022-10-17 00:05:42', NULL),
(167, 17, '1665939942991858301.webp', '2022-10-17 00:05:42', NULL),
(168, 18, '16659399631198642255.webp', '2022-10-17 00:06:03', NULL),
(169, 18, '16659399631576769652.webp', '2022-10-17 00:06:03', NULL),
(170, 18, '1665939963737065912.webp', '2022-10-17 00:06:03', NULL),
(171, 18, '16659399631319055592.webp', '2022-10-17 00:06:03', NULL),
(172, 19, '16659399811752603267.webp', '2022-10-17 00:06:21', NULL),
(173, 19, '16659399811742496662.webp', '2022-10-17 00:06:21', NULL),
(174, 19, '16659399812131726462.webp', '2022-10-17 00:06:21', NULL),
(175, 19, '1665939981833463959.webp', '2022-10-17 00:06:21', NULL),
(176, 20, '16659400031994060487.webp', '2022-10-17 00:06:43', NULL),
(177, 20, '1665940003325401212.webp', '2022-10-17 00:06:43', NULL),
(178, 20, '16659400031115640698.webp', '2022-10-17 00:06:43', NULL),
(179, 20, '16659400032094833856.webp', '2022-10-17 00:06:43', NULL),
(180, 21, '16659400271514868582.webp', '2022-10-17 00:07:07', NULL),
(181, 21, '16659400271882054270.webp', '2022-10-17 00:07:07', NULL),
(182, 21, '16659400271860468365.webp', '2022-10-17 00:07:07', NULL),
(183, 21, '16659400271622140615.webp', '2022-10-17 00:07:07', NULL),
(184, 22, '16659400521814520091.webp', '2022-10-17 00:07:32', NULL),
(185, 22, '16659400521145473902.webp', '2022-10-17 00:07:32', NULL),
(186, 22, '16659400521050411985.webp', '2022-10-17 00:07:32', NULL),
(187, 22, '1665940052498031355.webp', '2022-10-17 00:07:32', NULL),
(188, 23, '16659400751196643846.webp', '2022-10-17 00:07:55', NULL),
(189, 23, '166594007582688032.webp', '2022-10-17 00:07:55', NULL),
(190, 23, '1665940075319340799.webp', '2022-10-17 00:07:55', NULL),
(191, 23, '1665940075256141677.webp', '2022-10-17 00:07:55', NULL),
(196, 28, '1666246913547962104.webp', '2022-10-20 13:21:53', NULL),
(197, 28, '1666246913519252893.webp', '2022-10-20 13:21:53', NULL),
(198, 28, '1666246913103109104.webp', '2022-10-20 13:21:53', NULL),
(199, 28, '16662469131097105242.webp', '2022-10-20 13:21:53', NULL),
(200, 29, '16662470651293937335.webp', '2022-10-20 13:24:25', NULL),
(201, 29, '1666247065341663773.webp', '2022-10-20 13:24:25', NULL),
(202, 29, '16662470651410395517.webp', '2022-10-20 13:24:25', NULL),
(203, 29, '16662470651589966814.webp', '2022-10-20 13:24:25', NULL),
(204, 31, '1666247285476603660.webp', '2022-10-20 13:28:05', NULL),
(205, 31, '16662472851077362382.webp', '2022-10-20 13:28:05', NULL),
(206, 31, '16662472851008568508.webp', '2022-10-20 13:28:05', NULL),
(207, 31, '1666247285258670350.webp', '2022-10-20 13:28:05', NULL),
(220, 33, '16662477731861876352.webp', '2022-10-20 13:36:13', NULL),
(221, 33, '16662477731874303381.webp', '2022-10-20 13:36:13', NULL),
(222, 33, '1666247773655583987.webp', '2022-10-20 13:36:13', NULL),
(223, 33, '1666247773602423283.webp', '2022-10-20 13:36:13', NULL),
(236, 12, '16675525177562186.webp', '2022-11-04 16:01:57', NULL),
(237, 12, '16675525171998976181.webp', '2022-11-04 16:01:57', NULL),
(238, 12, '1667552517949411620.webp', '2022-11-04 16:01:57', NULL),
(239, 12, '1667552517945436129.webp', '2022-11-04 16:01:57', NULL),
(240, 42, '1667555353508796228.jpg', '2022-11-04 16:49:13', NULL),
(241, 42, '16675553531781857853.jpg', '2022-11-04 16:49:13', NULL),
(242, 42, '1667555353168333089.jpg', '2022-11-04 16:49:13', NULL),
(243, 42, '16675553531734649121.jpg', '2022-11-04 16:49:13', NULL),
(244, 43, '16675555612069403540.jpg', '2022-11-04 16:52:41', NULL),
(245, 43, '1667555561846544143.jpg', '2022-11-04 16:52:41', NULL),
(246, 43, '16675555611646342393.jpg', '2022-11-04 16:52:41', NULL),
(247, 43, '16675555611343260301.jpg', '2022-11-04 16:52:41', NULL),
(248, 44, '1667555752223407147.jpg', '2022-11-04 16:55:52', NULL),
(249, 44, '1667555752217901658.jpg', '2022-11-04 16:55:52', NULL),
(250, 44, '16675557521118886594.jpg', '2022-11-04 16:55:52', NULL),
(251, 44, '1667555752374796736.jpg', '2022-11-04 16:55:52', NULL),
(252, 45, '16675559031389192303.jpg', '2022-11-04 16:58:23', NULL),
(253, 45, '1667555903652416935.webp', '2022-11-04 16:58:23', NULL),
(254, 45, '1667555903202779845.webp', '2022-11-04 16:58:23', NULL),
(255, 45, '16675559031658877891.webp', '2022-11-04 16:58:23', NULL),
(256, 46, '16675560251021264414.webp', '2022-11-04 17:00:25', NULL),
(257, 46, '1667556025134021962.jpg', '2022-11-04 17:00:25', NULL),
(258, 46, '16675560252047070202.jpg', '2022-11-04 17:00:25', NULL),
(259, 46, '16675560251120927453.webp', '2022-11-04 17:00:25', NULL),
(260, 47, '16675563722014454166.webp', '2022-11-04 17:06:12', NULL),
(261, 47, '16675563721756041449.webp', '2022-11-04 17:06:12', NULL),
(262, 47, '16675563721207910622.webp', '2022-11-04 17:06:12', NULL),
(263, 47, '16675563722052555196.webp', '2022-11-04 17:06:12', NULL),
(264, 48, '16675564801455905408.webp', '2022-11-04 17:08:00', NULL),
(265, 48, '1667556480545704302.webp', '2022-11-04 17:08:00', NULL),
(266, 48, '16675564801622912590.webp', '2022-11-04 17:08:00', NULL),
(267, 48, '16675564801302650924.webp', '2022-11-04 17:08:00', NULL),
(268, 49, '16675568851560394737.webp', '2022-11-04 17:14:45', NULL),
(269, 49, '1667556885403956546.webp', '2022-11-04 17:14:45', NULL),
(270, 49, '166755688572109979.webp', '2022-11-04 17:14:45', NULL),
(271, 49, '16675568851087194795.webp', '2022-11-04 17:14:45', NULL),
(272, 50, '16675569771417055521.webp', '2022-11-04 17:16:17', NULL),
(273, 50, '16675569771998744804.webp', '2022-11-04 17:16:17', NULL),
(274, 50, '16675569771421151679.webp', '2022-11-04 17:16:17', NULL),
(275, 50, '1667556977948371501.webp', '2022-11-04 17:16:17', NULL),
(276, 51, '16675570681887307750.webp', '2022-11-04 17:17:48', NULL),
(277, 51, '16675570681552420948.webp', '2022-11-04 17:17:48', NULL),
(278, 51, '1667557068166046607.webp', '2022-11-04 17:17:48', NULL),
(279, 51, '1667557068440015210.webp', '2022-11-04 17:17:48', NULL),
(280, 52, '1667557278400028634.jpg', '2022-11-04 17:21:18', NULL),
(281, 52, '16675572781037671635.jpg', '2022-11-04 17:21:18', NULL),
(282, 52, '1667557278293655988.jpg', '2022-11-04 17:21:18', NULL),
(283, 52, '1667557278270179046.jpg', '2022-11-04 17:21:18', NULL),
(284, 53, '16675573701482079318.jpg', '2022-11-04 17:22:50', NULL),
(285, 53, '1667557370831402193.jpg', '2022-11-04 17:22:50', NULL),
(286, 53, '16675573701274675280.jpg', '2022-11-04 17:22:50', NULL),
(287, 53, '1667557370980251880.jpg', '2022-11-04 17:22:50', NULL),
(288, 54, '16675577521177866415.webp', '2022-11-04 17:29:12', NULL),
(289, 54, '16675577521860303129.jpg', '2022-11-04 17:29:12', NULL),
(290, 54, '16675577522142486366.jpg', '2022-11-04 17:29:12', NULL),
(291, 54, '16675577521812844714.jpg', '2022-11-04 17:29:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `cate_id`, `price`, `description`, `view`, `created_at`, `updated_at`) VALUES
(12, 'CROSSTOWN HOBO', '1665939782385037769.webp', 1, 198, 'Sleek angles and soft leather make the Crosstown Hobo a showstopper. This closet staple is sure to be your new go-to for weekend errands to that long-awaited night on the town.', 76, '2022-10-16 09:52:33', '2022-11-04 16:01:57'),
(13, 'VALENTINA FLAP SATCHEL', '16659398491728197258.webp', 2, 224, 'Classic, simple, sophisticated. The Valentina flap satchel is sure to be a staple with its sleek silhouette and wide range color palette.', NULL, '2022-10-16 09:56:48', '2022-10-17 00:04:09'),
(14, 'HUDSON BITE SIZE TOTE', '1665939872366480849.webp', 2, 114, 'A smaller version of the Hudson tote. Don’t be fooled by the term bite-size. This Hudson still fits everything you need to get out of the house (finally).', NULL, '2022-10-16 09:59:53', '2022-10-17 00:04:32'),
(15, 'COBBLE HILL CROSSBODY', '1665939899545561324.webp', 3, 198, 'Our best seller Cobble Hill Crossbody in this classic color combo. This on-trend bag features an asymmetric flap closure, sleek logo hang charm, multi-strap crossbody options, and a removable top handle.', NULL, '2022-10-16 10:03:19', '2022-10-17 00:04:59'),
(16, 'HUDSON BITE SIZE TOTE', '16659399231297401370.webp', 2, 288, 'A smaller version of the Hudson tote. Don’t be fooled by the term bite-size. This Hudson still fits everything you need to get out of the house (finally).', NULL, '2022-10-16 10:06:33', '2022-10-17 00:05:23'),
(17, 'ALLEN CROSSBODY', '1665939942291901539.webp', 3, 158, 'The Allen Crossbody is your new goes-with-everything crossbody. Sleek lines and a subtle logo accent this day-to-night bag, while carrying your essentials. Accentuate your spring wardrobe with light & airy pastels to brighten up your look.', NULL, '2022-10-16 10:09:20', '2022-10-17 00:05:42'),
(18, 'VALENTINA SADDLE CROSSBODY', '16659399631961020637.webp', 3, 182, 'The curved silhouette of the Valentina hobo makes this style a unique classic. With signature hardware and a front pocket, this bag is the ideal accessory for everyday wear.', 120, '2022-10-16 10:12:08', '2022-10-17 00:06:03'),
(19, 'VALENTINA MINI CAMERA CROSSBODY', '1665939981572837674.webp', 3, 182, 'A new take on a forever classic. The Valentina mini crossbody has the same face you know and love, with signature hardware and a boozy silhouette that fits your essentials with ease.', NULL, '2022-10-16 10:14:54', '2022-10-17 00:06:21'),
(20, 'CHELSEA BUCKET', '16659400032135567473.webp', 1, 298, 'The multi-purpose Chelsea bucket has 2 straps for endless carrying options. Wear as a shoulder bag, or remove the top handle and use as a slouchy crossbody. However you wear it, this soft leather bag is sure to get attention wherever you go.', NULL, '2022-10-16 10:16:55', '2022-10-17 00:06:43'),
(21, 'HUDSON HOBO', '16659400271258862105.webp', 1, 238, 'The Hudson Hobo is minimal and chic, with just the right amount of slouch. This is the perfect everyday option for practical style. ', 98, '2022-10-16 10:19:16', '2022-10-17 00:07:07'),
(22, 'SOHO BITE SIZE TOTE', '16659400521482363853.webp', 2, 288, 'With signature zip details and luxe pebble leather, the Soho Bite Size Tote is the perfect everyday bag. It comes in a range of colors and has a detachable strap to speed you up rather than slow you down.', NULL, '2022-10-16 10:33:33', '2022-10-17 00:07:32'),
(23, 'CHELSEA CONVERTIBLE HOBO', '1665940075915795662.webp', 1, 298, 'The Chelsea convertible hobo looks simple but this multi-functional leather bag is anything but. This sleek silhouette is a two-for-one deal. ', NULL, '2022-10-16 10:37:30', '2022-10-17 00:07:55'),
(28, 'CHELSEA TRAVEL CROSSBODY', '16662469131596527908.webp', 3, 198, 'The Chelsea Travel Crossbody was made for days when you need to carry a little more and not feel weighed down. This is the perfect bag for hands-free traveling, simply slip your cards and phone into one of the front zip pockets and go!', 0, '2022-10-20 13:21:53', NULL),
(29, 'CHELSEA CAMERA CROSSBODY', '16662470651290520001.webp', 3, 134, 'We love an edgy detail. The Chelsea Camera covers all things cool with front zipper accents that open into slim pockets for your cards and keys. Complete with a wide nylon strap, you’re ready for your street style debut. ', 0, '2022-10-20 13:24:25', NULL),
(31, 'CHELSEA LARGE HOBO', '16662472851989113363.webp', 1, 328, 'The Chelsea Hobo is spacious, slouchy, and oh-so-cool. Pair this everyday bag with everything from jeans to a flowy dress for the perfect dose of edge. ', 0, '2022-10-20 13:28:05', NULL),
(33, 'ENTWINE HOBO', '1666247773210204352.webp', 1, 164, 'Soft to the touch with a pebbled texture, this hand-picked full-grain hide is our most casual leather that gets more beautiful over time. ', 0, '2022-10-20 13:36:13', NULL),
(42, 'COBBLE HILL CROSSBODY', '1667555353790966443.jpg', 3, 198, 'A new twist on a core style! The Cobble Hill is back and better than ever for fall. The classic silhouette has the same asymmetric flap and multi-strap functions, but we’ve upgraded the popular crossbody with soft pebble leather that looks better with each wear. Take your pick from seasonal earth tones or muted pops of pastel to dress up your style.', 0, '2022-11-04 16:49:13', NULL),
(43, 'COBBLE HILL FLAP SATCHEL', '1667555561801852321.jpg', 2, 278, 'Introducing your go-to bag for fall! The Cobble Hill flap satchel is a new silhouette with a little extra storage for daily life on the go. Crafted with soft pebble leather, the versatile handbag features multiple strap options, plus two removable keychains - one for your card case and one for your airpods. Cool, convenient, and keeps up with your seasonal style...what more could you ask for?!', 0, '2022-11-04 16:52:41', NULL),
(44, 'VALENTINA CROSSBODY', '1667555752669883717.jpg', 3, 228, 'The style you know and love now comes in cool crossbody form. With its edgy, signature hardware and thick webbed strap, the Valentina crossbody stays true to our love of New York street style.', 0, '2022-11-04 16:55:52', NULL),
(45, 'ALLEN CROSSBODY', '1667555903304816927.webp', 3, 158, 'The Allen Crossbody is your new goes-with-everything crossbody. Sleek lines and a subtle logo accent this day-to-night bag, while carrying your essentials. Accentuate your spring wardrobe with light & airy pastels to brighten up your look.', 0, '2022-11-04 16:58:23', NULL),
(46, 'ALLEN CAMERA CROSSBODY', '1667556025460337979.webp', 3, 139, 'The Allen Crossbody is your new goes-with-everything crossbody. Sleek lines and a subtle logo accent this day-to-night bag, while carrying your essentials. ', 0, '2022-11-04 17:00:25', NULL),
(47, 'BEDFORD TOTE', '16675563721227857886.webp', 7, 278, 'The Bedford is a roomy tote with all the options. Take your pick from 2 strap styles for an easy way to switch up your style and carry everything you need with ease. ', 0, '2022-11-04 17:06:12', NULL),
(48, 'SOHO BITE SIZE TOTE', '1667556480971821531.webp', 7, 288, 'With signature zip details and luxe pebble leather, the Soho Bite Size Tote is the perfect everyday bag. It comes in a range of colors and has a detachable strap to speed you up rather than slow you down.', 0, '2022-11-04 17:08:00', NULL),
(49, 'SOHO TOTE', '16675568851973907988.webp', 7, 298, 'Our number one selling Tote! Easy to pack and foolproof to style, the Soho Tote is perfect whether you\"re meeting-bound or headed out of town.', 0, '2022-11-04 17:14:45', NULL),
(50, 'LUDLOW TOTE', '16675569771993335063.webp', 7, 262, 'This boxy shaped tote is perfectly structured to carry everything from work-to-workout essentials. The Ludlow features smooth leather that adds a bit of shine (and style) to your spring wardrobe.', 0, '2022-11-04 17:16:17', NULL),
(51, 'BAXTER TOTE', '16675570681186117536.webp', 7, 248, 'We love a good tote. The Baxter is just that. This spacious leather tote is sleek, smooth, and simple in the best of ways. Accentuated with our signature B hardware, this beauty is ready to travel with you, wherever you choose to go.', 0, '2022-11-04 17:17:48', NULL),
(52, 'BEATRICE LARGE TOTE', '16675572781114908745.jpg', 7, 228, 'The Beatrice is made with pebble leather which just keeps getting better over time. This roomy tote has plenty of space and more for everything you need to carry with you. Use the front zip pocket to store smaller good for easy access, or try the multiple interior slip pockets to utilize every inch of space. ', 0, '2022-11-04 17:21:18', NULL),
(53, 'VALENTINA TOTE', '16675573701035031339.jpg', 7, 209, 'The Valentina Tote is perfect for day to night. It carries all the necessities and with the additional webbing strap, you can wear it comfortably all day long!', 0, '2022-11-04 17:22:50', NULL),
(54, 'BEDFORD CANVAS TOTE', '1667557752557130993.jpg', 7, 182, 'Crafted with canvas and leather accents, the Bedford Canvas Tote can be used from school, to streets, to beach. Pack this lightweight-yet-sturdy bag with everything you need for everyday life. ', 0, '2022-11-04 17:29:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name_user` varchar(200) NOT NULL,
  `avatar` text DEFAULT NULL,
  `gr_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_user`, `avatar`, `gr_id`, `email`, `password`, `phone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Thảo Sương', '1667629138.jpg', 1, 'maikhoi10112001@gmail.com', '$2y$10$leiNKH3HOqgaYUKAESb4k.bTvHGYs7TX6/TvdfjbbLzHqxcSV8VqW', '0945115260', 'VL', '', '2022-10-20 10:18:51', '2022-11-05 17:18:59'),
(4, 'Nhan Chi  Danh', '1666324918.jpg', 2, 'nhanchidanh@gmail.com', '$2y$10$iTg6RPNy2dmTwmaT8Ixd0eEbJCVP7TKlITKDB5/7lUhw1sUQtc9lm', '', 'CM', 'Tui nè', '2022-10-20 10:39:07', '2022-11-12 15:55:28'),
(5, 'Bình Dương', '1667630418.png', 2, 'duongka1112@gmail.com', '$2y$10$/.w/dI82I4tShBr8d7H8Se5DxyvUBECML.AvcrjsBsT5cHSXV/5i.', '', '', '', '2022-10-21 11:08:26', '2022-11-05 13:40:18'),
(6, 'Nở ', '', 2, 'suongb1910289@student.ctu.edu.vn', '$2y$10$j42WWZz0O1i1YP/zuVIsVOiUGyxs/NQDj4NG7ohEAHoUvp.vMpiX2', '', '', '', '2022-11-03 14:59:07', '0000-00-00 00:00:00'),
(7, 'Danh', '', 2, 'nhanchidanh2@gmail.com', '$2y$10$KEV5zUoJLqCC0tQzfra0A.MSpusO/.jcNMZdvHFumu2fAPTt85tI2', '', '', '', '2022-11-03 14:59:35', '0000-00-00 00:00:00'),
(8, 'Thảo', '', 2, 'thuthao@gamil.com', '$2y$10$MK3r.Yr0zOrBBSm/2qnIQOd.msG5bVnt4ogwF09Ew.Mrzj/rotaZC', '', '', '', '2022-11-03 15:00:06', '2022-11-06 11:38:02'),
(10, 'Hào', '', 2, 'zvhao@gmail.com', '$2y$10$k2F9UoFbdAR0xNS/BTDyOuc8CKaH870t68AQSApQRnPKRGldKnK0i', '', '', '', '2022-11-06 11:19:15', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gr_id` (`gr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `detail_bill_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Constraints for table `img_product`
--
ALTER TABLE `img_product`
  ADD CONSTRAINT `img_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gr_id`) REFERENCES `group_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
