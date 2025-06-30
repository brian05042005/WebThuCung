CREATE DATABASE IF NOT EXISTS `thucungshop`;
USE `thucungshop`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thucungshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` enum('Đang giao hàng','Hoàn thành','Chờ giao hàng') DEFAULT 'Đang giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `email`, `phone`, `address`, `order_date`, `total_price`, `status`) VALUES
(1, 'thanhlong', 'thanhlong@gmail.com', '0912345678', '123 Pet Street', '2025-11-09 01:56:17', 150.00, 'Đang giao hàng'),
(2, 'minhhoang', 'minhhoang@yahoo.com', '0912345679', '124 Pet Street', '2025-11-09 01:56:17', 200.00, 'Hoàn thành'),
(3, 'tuananh', 'tuananh@outlook.com', '0912345680', '125 Pet Street', '2025-11-09 01:56:17', 180.50, 'Đang giao hàng'),
(4, 'thuytrang', 'thuytrang@gmail.com', '0912345681', '126 Pet Street', '2025-11-09 01:56:17', 220.00, 'Đang giao hàng'),
(5, 'quanghuy', 'quanghuy@yahoo.com', '0912345682', '127 Pet Street', '2025-11-09 01:56:17', 175.75, 'Hoàn thành'),
(6, 'hoanganh', 'hoanganh@gmail.com', '0912345683', '128 Pet Street', '2025-11-09 01:56:17', 160.00, 'Đang giao hàng'),
(7, 'ngoclinh', 'ngoclinh@outlook.com', '0912345684', '129 Pet Street', '2025-11-09 01:56:17', 190.25, 'Đang giao hàng'),
(8, 'tienphong', 'tienphong@gmail.com', '0912345685', '130 Pet Street', '2025-11-09 01:56:17', 155.00, 'Hoàn thành'),
(9, 'haianh', 'haianh@yahoo.com', '0912345686', '131 Pet Street', '2025-11-09 01:56:17', 240.50, 'Chờ giao hàng'),
(10, 'kimngan', 'kimngan@gmail.com', '0912345687', '132 Pet Street', '2025-11-09 01:56:17', 130.75, 'Đang giao hàng'),
(11, 'ducmanh', 'ducmanh@outlook.com', '0912345688', '133 Pet Street', '2025-11-09 01:56:17', 180.00, 'Hoàn thành'),
(12, 'thanhthao', 'thanhthao@gmail.com', '0912345689', '134 Pet Street', '2025-11-09 01:56:17', 210.00, 'Chờ giao hàng'),
(13, 'vietanh', 'vietanh@yahoo.com', '0912345690', '135 Pet Street', '2025-11-09 01:56:17', 170.00, 'Đang giao hàng'),
(14, 'hongnhung', 'hongnhung@gmail.com', '0912345691', '136 Pet Street', '2025-11-09 01:56:17', 145.25, 'Hoàn thành'),
(15, 'baochau', 'baochau@outlook.com', '0912345692', '137 Pet Street', '2025-11-09 01:56:17', 190.75, 'Chờ giao hàng'),
(16, 'truongson', 'truongson@gmail.com', '0912345693', '138 Pet Street', '2025-11-09 01:56:17', 200.00, 'Đang giao hàng'),
(17, 'thienvu', 'thienvu@yahoo.com', '0912345694', '139 Pet Street', '2025-11-09 01:56:17', 250.00, 'Hoàn thành'),
(18, 'quynhanh', 'quynhanh@gmail.com', '0912345695', '140 Pet Street', '2025-11-09 01:56:17', 165.25, 'Chờ giao hàng'),
(19, 'vanthu', 'vanthu@outlook.com', '0912345696', '141 Pet Street', '2025-11-09 01:56:17', 120.50, 'Đang giao hàng'),
(20, 'maitrang', 'maitrang@gmail.com', '0912345697', '142 Pet Street', '2025-11-09 01:56:17', 140.00, 'Hoàn thành');
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `pet_id`, `quantity`, `price`) VALUES
(1, 1, 51, 21, 200000.00),
(2, 1, 52, 31, 250000.00),
(3, 3, 53, 111, 400000.00),
(4, 4, 54, 41, 150000.00),
(5, 5, 55, 111, 600000.00),
(6, 6, 56, 211, 350000.00),
(7, 7, 57, 31, 450000.00),
(8, 8, 58, 21, 500000.00),
(9, 9, 59, 51, 800000.00),
(10, 10, 101, 3, 600000.00),
(11, 11, 111, 1, 550000.00),
(12, 12, 121, 4, 250000.00),
(13, 13, 131, 2, 400000.00),
(14, 14, 141, 3, 700000.00),
(15, 15, 151, 1, 450000.00),
(16, 16, 161, 2, 550000.00),
(17, 17, 171, 3, 350000.00),
(18, 18, 181, 2, 450000.00),
(19, 19, 191, 5, 650000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` enum('Thẻ tín dụng','PayPal','COD') NOT NULL,
  `status` enum('Thành công','Thất bại') DEFAULT 'Thành công'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `amount`, `payment_date`, `payment_method`, `status`) VALUES
(1, 1, 525000.00, '2025-03-12 08:45:23', 'Thẻ tín dụng', 'Thành công'),
(2, 2, 687000.00, '2025-05-18 14:20:10', 'PayPal', 'Thành công'),
(3, 3, 412500.00, '2025-01-25 11:30:45', 'COD', 'Thành công'),
(4, 4, 158000.00, '2025-07-30 16:55:37', 'Thẻ tín dụng', 'Thành công'),
(5, 5, 632000.00, '2025-09-05 09:10:28', 'PayPal', 'Thành công'),
(6, 6, 723000.00, '2025-02-14 13:40:15', 'COD', 'Thành công'),
(7, 7, 487000.00, '2025-04-22 10:25:50', 'Thẻ tín dụng', 'Thành công'),
(8, 8, 543000.00, '2025-08-11 18:15:42', 'PayPal', 'Thành công'),
(9, 9, 815000.00, '2025-06-19 12:05:33', 'COD', 'Thành công'),
(10, 10, 932000.00, '2025-10-28 15:50:21', 'Thẻ tín dụng', 'Thành công'),
(11, 11, 578000.00, '2025-03-08 07:35:19', 'PayPal', 'Thành công'),
(12, 12, 327000.00, '2025-11-09 01:56:17', 'COD', 'Thành công'),
(13, 13, 672000.00, '2025-12-15 20:30:08', 'Thẻ tín dụng', 'Thành công'),
(14, 14, 715000.00, '2025-05-21 14:45:27', 'PayPal', 'Thành công'),
(15, 15, 463000.00, '2025-07-07 11:20:39', 'COD', 'Thành công'),
(16, 16, 587000.00, '2025-09-30 09:55:14', 'Thẻ tín dụng', 'Thành công'),
(17, 17, 318000.00, '2025-02-03 17:40:52', 'PayPal', 'Thành công'),
(18, 18, 667000.00, '2025-04-17 13:15:46', 'COD', 'Thành công'),
(19, 19, 782000.00, '2025-08-24 19:25:30', 'Thẻ tín dụng', 'Thành công'),
(20, 20, 512000.00, '2025-10-11 08:10:05', 'PayPal', 'Thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_type` enum('Chó','Mèo') NOT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('Đực','Cái') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `status` enum('Đang bán','Đã bán') DEFAULT 'Đang bán',
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `pet_type`, `breed`, `age`, `gender`, `description`, `price`, `quantity`, `status`, `image_url`, `created_at`) VALUES
(21, 'Mực', 'Chó', 'Alaska', 2, 'Đực', 'Dễ thương, hiền lành', 14000000.00, 1, 'Đang bán', 'alaska.png', '2024-11-09 01:56:17'),
(22, 'Buddy', 'Chó', 'Alaska', 3, 'Đực', 'Năng động, trung thành', 16000000.00, 2, 'Đang bán', 'alaska2.png', '2024-11-09 01:56:17'),
(23, 'Bông', 'Chó', 'Alaska', 1, 'Đực', 'Nhanh nhẹn, thông minh', 15500000.00, 3, 'Đang bán', 'alaska3.jpg', '2024-11-09 01:56:17'),
(24, 'Cún', 'Chó', 'Alaska', 2, 'Đực', 'Tò mò, vui vẻ', 13500000.00, 3, 'Đang bán', 'alaska4.jpg', '2024-11-09 01:56:17'),
(25, 'Bella', 'Chó', 'Alaska', 2, 'Đực', 'Hiền lành, đáng yêu', 14500000.00, 1, 'Đang bán', 'alaska5.jpg', '2024-11-09 01:56:17'),
(26, 'Max', 'Chó', 'Alaska', 1, 'Cái', 'Trung thành, dũng cảm', 15000000.00, 2, 'Đang bán', 'alaska6.jpg', '2024-11-09 01:56:17'),
(27, 'Mít', 'Chó', 'Alaska', 2, 'Đực', 'Dễ thương, thân thiện', 13000000.00, 3, 'Đang bán', 'alaska7.jpg', '2024-11-09 01:56:17'),
(28, 'Lá', 'Chó', 'Alaska', 2, 'Cái', 'Nhanh nhẹn, lanh lợi', 14000000.00, 3, 'Đang bán', 'alaska8.jpg', '2024-11-09 01:56:17'),
(29, 'Rocky', 'Chó', 'Alaska', 1, 'Đực', 'Mạnh mẽ, hoạt bát', 16500000.00, 3, 'Đang bán', 'alaska9.jpg', '2024-11-09 01:56:17'),
(30, 'Luna', 'Chó', 'Alaska', 2, 'Đực', 'Thông minh, hòa đồng', 15200000.00, 1, 'Đang bán', 'alaska10.jpg', '2024-11-09 01:56:17'),
(31, 'Đốm', 'Chó', 'Alaska', 2, 'Cái', 'Vui vẻ, dễ gần', 13800000.00, 2, 'Đang bán', 'alaska11.jpg', '2024-11-09 01:56:17'),
(32, 'Sữa', 'Chó', 'Alaska', 1, 'Đực', 'Tò mò, tinh nghịch', 14300000.00, 2, 'Đang bán', 'alaska12.jpg', '2024-11-09 01:56:17'),
(33, 'Mon', 'Chó', 'Alaska', 3, 'Đực', 'Đáng yêu, thông minh', 15800000.00, 1, 'Đang bán', 'alaska13.jpg', '2024-11-09 01:56:17'),
(34, 'Daisy', 'Chó', 'Alaska', 1, 'Cái', 'Nhạy bén, tình cảm', 14600000.00, 3, 'Đang bán', 'alaska14.jpg', '2024-11-09 01:56:17'),
(35, 'Milo', 'Chó', 'Alaska', 2, 'Cái', 'Hoạt bát, thân thiện', 15200000.00, 1, 'Đang bán', 'alaska15.jpg', '2024-11-09 01:56:17'),
(36, 'Cooper', 'Chó', 'Alaska', 2, 'Đực', 'Trung thành, dễ mến', 13700000.00, 2, 'Đang bán', 'alaska16.jpg', '2024-11-09 01:56:17'),
(37, 'Charlie', 'Chó', 'Alaska', 3, 'Đực', 'Năng động, thông minh', 14900000.00, 2, 'Đang bán', 'alaska17.jpg', '2024-11-09 01:56:17'),
(38, 'Luna', 'Chó', 'Alaska', 1, 'Cái', 'Hiền lành, đáng yêu', 15000000.00, 3, 'Đang bán', 'alaska18.jpg', '2024-11-09 01:56:17'),
(39, 'Bailey', 'Chó', 'Poodle', 2, 'Cái', 'Năng động, thông minh', 14200000.00, 3, 'Đang bán', 'poodle.jpg', '2024-11-09 01:56:17'),
(40, 'Oscar', 'Chó', 'Poodle', 1, 'Đực', 'Thân thiện, đáng yêu', 15300000.00, 2, 'Đang bán', 'poodle1.jpg', '2024-11-09 01:56:17'),
(41, 'Lucky', 'Chó', 'Poodle', 3, 'Cái', 'Tinh nghịch, tò mò', 13800000.00, 1, 'Đang bán', 'poodle2.jpeg', '2024-11-09 01:56:17'),
(42, 'Shadow', 'Chó', 'Poodle', 2, 'Đực', 'Nhanh nhẹn, trung thành', 15500000.00, 3, 'Đang bán', 'poodle3.jpg', '2024-11-09 01:56:17'),
(43, 'Oliver', 'Chó', 'Poodle', 1, 'Cái', 'Thông minh, hòa đồng', 14700000.00, 2, 'Đang bán', 'poodle4.jpg', '2024-11-09 01:56:17'),
(44, 'Simba', 'Chó', 'Poodle', 3, 'Đực', 'Năng động, vui vẻ', 13900000.00, 1, 'Đang bán', 'poodle5.jpg', '2024-11-09 01:56:17'),
(45, 'Leo', 'Chó', 'Poodle', 1, 'Cái', 'Nhạy bén, tình cảm', 14400000.00, 3, 'Đang bán', 'poodle6.jpg', '2024-11-09 01:56:17'),
(46, 'Jack', 'Chó', 'Poodle', 2, 'Cái', 'Trung thành, dễ gần', 15100000.00, 2, 'Đang bán', 'poodle7.jpg', '2024-11-09 01:56:17'),
(47, 'Toby', 'Chó', 'Poodle', 1, 'Đực', 'Tinh nghịch, hoạt bát', 13600000.00, 1, 'Đang bán', 'poodle8.jpg', '2024-11-09 01:56:17'),
(48, 'Mason', 'Chó', 'Poodle', 2, 'Cái', 'Vui tươi, nhạy bén', 14800000.00, 3, 'Đang bán', 'poodle9.jpg', '2024-11-09 01:56:17'),
(49, 'Finn', 'Chó', 'Poodle', 1, 'Đực', 'Thân thiện, nhanh nhẹn', 14500000.00, 2, 'Đang bán', 'poodle10.jpg', '2024-11-09 01:56:17'),
(50, 'Buster', 'Chó', 'Poodle', 3, 'Cái', 'Mạnh mẽ, dễ mến', 15200000.00, 1, 'Đang bán', 'poodle11.jpg', '2024-11-09 01:56:17'),
(51, 'Hunter', 'Chó', 'Poodle', 2, 'Đực', 'Dũng cảm, trung thành', 13900000.00, 3, 'Đang bán', 'poodle12.png', '2024-11-09 01:56:17'),
(52, 'Beau', 'Chó', 'Poodle', 2, 'Cái', 'Nhẹ nhàng, hiền lành', 14600000.00, 2, 'Đang bán', 'poodle13.jpg', '2024-11-09 01:56:17'),
(53, 'Murphy', 'Chó', 'Poodle', 1, 'Đực', 'Hoạt bát, năng động', 15400000.00, 3, 'Đang bán', 'poodle14.jpg', '2024-11-09 01:56:17'),
(54, 'Rex', 'Chó', 'Poodle', 3, 'Cái', 'Cứng cỏi, mạnh mẽ', 13700000.00, 2, 'Đang bán', 'poodle15.jpg', '2024-11-09 01:56:17'),
(55, 'Riley', 'Chó', 'Poodle', 1, 'Đực', 'Vui vẻ, thân thiện', 14900000.00, 1, 'Đang bán', 'poodle16.jpg', '2024-11-09 01:56:17'),
(56, 'Archie', 'Chó', 'Poodle', 2, 'Cái', 'Thân thiện, thông minh', 14300000.00, 3, 'Đang bán', 'poodle17.jpg', '2024-11-09 01:56:17'),
(57, 'Rusty', 'Chó', 'Phốc sóc', 3, 'Cái', 'Hoạt bát, tò mò', 13900000.00, 1, 'Đang bán', 'phoc1.png', '2024-11-09 01:56:17'),
(58, 'Ziggy', 'Chó', 'Phốc sóc', 2, 'Đực', 'Thân thiện, vui vẻ', 14200000.00, 3, 'Đang bán', 'phoc2.jpg', '2024-11-09 01:56:17'),
(59, 'Thor', 'Chó', 'Phốc sóc', 1, 'Cái', 'Dũng cảm, thông minh', 15000000.00, 2, 'Đang bán', 'phoc3.jpg', '2024-11-09 01:56:17'),
(60, 'Jasper', 'Chó', 'Phốc sóc', 2, 'Đực', 'Năng động, nhạy bén', 13700000.00, 1, 'Đang bán', 'phoc4.jpg', '2024-11-09 01:56:17'),
(61, 'Gizmo', 'Chó', 'Phốc sóc', 3, 'Cái', 'Tinh nghịch, dễ mến', 14500000.00, 2, 'Đang bán', 'phoc5.jpg', '2024-11-09 01:56:17'),
(62, 'Ranger', 'Chó', 'Phốc sóc', 2, 'Đực', 'Trung thành, mạnh mẽ', 15300000.00, 3, 'Đang bán', 'phoct6.jpg', '2024-11-09 01:56:17'),
(63, 'Ace', 'Chó', 'Phốc sóc', 3, 'Cái', 'Thông minh, hiền lành', 13600000.00, 2, 'Đang bán', 'phoc7.jpg', '2024-11-09 01:56:17'),
(64, 'Bandit', 'Chó', 'Phốc sóc', 2, 'Đực', 'Tinh nghịch, nhạy bén', 14400000.00, 3, 'Đang bán', 'phoc8.jpg', '2024-11-09 01:56:17'),
(65, 'Zeus', 'Chó', 'Phốc sóc', 1, 'Cái', 'Mạnh mẽ, nhanh nhẹn', 15100000.00, 1, 'Đang bán', 'phoc9.jpg', '2024-11-09 01:56:17'),
(66, 'Blaze', 'Chó', 'Phốc sóc', 3, 'Đực', 'Nhanh nhẹn, vui vẻ', 14000000.00, 2, 'Đang bán', 'phoc10.jpg', '2024-11-09 01:56:17'),
(67, 'Moose', 'Chó', 'Phốc sóc', 1, 'Cái', 'Thân thiện, hòa đồng', 13800000.00, 3, 'Đang bán', 'phoc11.jpg', '2024-11-09 01:56:17'),
(68, 'Rocco', 'Chó', 'Phốc sóc', 2, 'Đực', 'Nghị lực, tò mò', 14600000.00, 2, 'Đang bán', 'phoc12.jpg', '2024-11-09 01:56:17'),
(69, 'Ryder', 'Chó', 'Phốc sóc', 3, 'Cái', 'Trung thành, thông minh', 15200000.00, 1, 'Đang bán', 'phoc13.jpg', '2024-11-09 01:56:17'),
(70, 'Tank', 'Chó', 'Phốc sóc', 1, 'Đực', 'Mạnh mẽ, cứng cỏi', 14900000.00, 2, 'Đang bán', 'phoc14.png', '2024-11-09 01:56:17'),
(71, 'Benny', 'Chó', 'Phốc sóc', 3, 'Cái', 'Dễ thương, thân thiện', 13500000.00, 1, 'Đang bán', 'phoc15.jpg', '2024-11-09 01:56:17'),
(72, 'Diesel', 'Chó', 'Phốc sóc', 2, 'Đực', 'Hoạt bát, tinh nghịch', 15100000.00, 3, 'Đang bán', 'phoc16.jpg', '2024-11-09 01:56:17'),
(73, 'Chance', 'Chó', 'Phốc sóc', 3, 'Cái', 'Vui vẻ, nhạy bén', 13900000.00, 2, 'Đang bán', 'phoc17.jpg', '2024-11-09 01:56:17'),
(74, 'Scout', 'Chó', 'Phốc sóc', 1, 'Đực', 'Thân thiện, năng động', 14700000.00, 1, 'Đang bán', 'phoc18.jpg', '2024-11-09 01:56:17'),
(75, 'Finn', 'Chó', 'Corgi', 3, 'Cái', 'Nhanh nhẹn, hoạt bát', 14600000.00, 2, 'Đang bán', 'corgi.jpg', '2024-11-09 01:56:17'),
(76, 'Milo', 'Chó', 'Corgi', 2, 'Đực', 'Thông minh, tinh nghịch', 13700000.00, 3, 'Đang bán', 'corgi1.jpg', '2024-11-09 01:56:17'),
(77, 'Max', 'Chó', 'Corgi', 1, 'Cái', 'Hiền lành, trung thành', 12400000.00, 1, 'Đang bán', 'corgi2.jpg', '2024-11-09 01:56:17'),
(78, 'Buddy', 'Chó', 'Corgi', 2, 'Đực', 'Dễ gần, hòa đồng', 15600000.00, 3, 'Đang bán', 'corgi3.jpg', '2024-11-09 01:56:17'),
(79, 'Bailey', 'Chó', 'Corgi', 1, 'Cái', 'Dịu dàng, thân thiện', 14100000.00, 2, 'Đang bán', 'corgi4.jpg', '2024-11-09 01:56:17'),
(80, 'Buster', 'Chó', 'Corgi', 3, 'Cái', 'Tò mò, vui vẻ', 14500000.00, 1, 'Đang bán', 'corgi5.jpg', '2024-11-09 01:56:17'),
(81, 'Gizmo', 'Chó', 'Corgi', 1, 'Đực', 'Hoạt bát, lanh lợi', 16100000.00, 2, 'Đang bán', 'corgi6.jpg', '2024-11-09 01:56:17'),
(82, 'Ace', 'Chó', 'Corgi', 3, 'Cái', 'Bạo dạn, năng động', 13200000.00, 1, 'Đang bán', 'corgi7.jpg', '2024-11-09 01:56:17'),
(83, 'Rusty', 'Chó', 'Corgi', 2, 'Đực', 'Tinh nghịch, lanh lợi', 13900000.00, 3, 'Đang bán', 'corgi8.jpg', '2024-11-09 01:56:17'),
(84, 'Ranger', 'Chó', 'Corgi', 1, 'Cái', 'Nhanh nhẹn, mạnh mẽ', 14200000.00, 2, 'Đang bán', 'corgi10.jpg', '2024-11-09 01:56:17'),
(85, 'Copper', 'Chó', 'Corgi', 2, 'Đực', 'Trung thành, thân thiện', 14700000.00, 3, 'Đang bán', 'corgi11.jpg', '2024-11-09 01:56:17'),
(86, 'Chance', 'Chó', 'Corgi', 1, 'Cái', 'Thân thiện, năng động', 14600000.00, 2, 'Đang bán', 'corgi12.jpg', '2024-11-09 01:56:17'),
(87, 'Boomer', 'Chó', 'Corgi', 3, 'Cái', 'Vui tính, lanh lợi', 14100000.00, 1, 'Đang bán', 'corgi13.jpg', '2024-11-09 01:56:17'),
(88, 'Diesel', 'Chó', 'Corgi', 2, 'Đực', 'Mạnh mẽ, nhiệt huyết', 14400000.00, 2, 'Đang bán', 'corgi14.jpg', '2024-11-09 01:56:17'),
(89, 'Hank', 'Chó', 'Corgi', 1, 'Cái', 'Hiền hòa, dễ gần', 13200000.00, 3, 'Đang bán', 'corgi15.jpg', '2024-11-09 01:56:17'),
(90, 'Duke', 'Chó', 'Corgi', 2, 'Đực', 'Thông minh, hòa đồng', 15200000.00, 1, 'Đang bán', 'corgi16.jpg', '2024-11-09 01:56:17'),
(91, 'Zeus', 'Chó', 'Corgi', 3, 'Cái', 'Bạo dạn, nhanh nhẹn', 14500000.00, 2, 'Đang bán', 'corgi17.jpg', '2024-11-09 01:56:17'),
(92, 'Maverick', 'Chó', 'Corgi', 1, 'Đực', 'Vui vẻ, thông minh', 15100000.00, 3, 'Đang bán', 'corgi18.jpg', '2024-11-09 01:56:17'),
(93, 'Rocky', 'Chó', 'Chihuahua', 1, 'Cái', 'Vui vẻ, thông minh', 14500000.00, 3, 'Đang bán', 'chi1.jpg', '2024-11-09 01:56:17'),
(94, 'Leo', 'Chó', 'Chihuahua', 2, 'Đực', 'Nhanh nhẹn, thân thiện', 14800000.00, 1, 'Đang bán', 'chi2.jpg', '2024-11-09 01:56:17'),
(95, 'Buddy', 'Chó', 'Chihuahua', 3, 'Cái', 'Thân thiện, năng động', 14650000.00, 2, 'Đang bán', 'chi3.jpg', '2024-11-09 01:56:17'),
(96, 'Finn', 'Chó', 'Chihuahua', 1, 'Cái', 'Thông minh, vui vẻ', 14900000.00, 3, 'Đang bán', 'chi4.jpg', '2024-11-09 01:56:17'),
(97, 'Max', 'Chó', 'Chihuahua', 3, 'Đực', 'Hiền lành, hoạt bát', 15000000.00, 2, 'Đang bán', 'chi5.jpg', '2024-11-09 01:56:17'),
(98, 'Sammy', 'Chó', 'Chihuahua', 2, 'Cái', 'Dễ gần, trung thành', 14700000.00, 1, 'Đang bán', 'chi6.jpg', '2024-11-09 01:56:17'),
(99, 'Charlie', 'Chó', 'Chihuahua', 2, 'Đực', 'Vui vẻ, thông minh', 15150000.00, 3, 'Đang bán', 'chi7.jpg', '2024-11-09 01:56:17'),
(100, 'Rusty', 'Chó', 'Chihuahua', 1, 'Cái', 'Lanh lợi, thân thiện', 15200000.00, 2, 'Đang bán', 'chi8.jpg', '2024-11-09 01:56:17'),
(101, 'Ace', 'Chó', 'Chihuahua', 2, 'Đực', 'Thông minh, dũng cảm', 15300000.00, 1, 'Đang bán', 'chi9.jpg', '2024-11-09 01:56:17'),
(102, 'Oliver', 'Chó', 'Chihuahua', 3, 'Cái', 'Vui nhộn, thông minh', 15050000.00, 2, 'Đang bán', 'chi10.jpg', '2024-11-09 01:56:17'),
(103, 'Duke', 'Chó', 'Chihuahua', 1, 'Đực', 'Trung thành, vui vẻ', 15120000.00, 3, 'Đang bán', 'chi11.jpg', '2024-11-09 01:56:17'),
(104, 'Zeke', 'Chó', 'Chihuahua', 3, 'Cái', 'Lanh lợi, thân thiện', 14950000.00, 1, 'Đang bán', 'chi12.jpg', '2024-11-09 01:56:17'),
(105, 'Jake', 'Chó', 'Chihuahua', 1, 'Đực', 'Thông minh, hoạt bát', 14850000.00, 2, 'Đang bán', 'chi13.jpg', '2024-11-09 01:56:17'),
(106, 'Bentley', 'Chó', 'Chihuahua', 2, 'Cái', 'Dễ thương, trung thành', 14550000.00, 3, 'Đang bán', 'chi14.jpg', '2024-11-09 01:56:17'),
(107, 'Thor', 'Chó', 'Chihuahua', 2, 'Đực', 'Vui vẻ, dũng cảm', 15400000.00, 1, 'Đang bán', 'chi15.jpg', '2024-11-09 01:56:17'),
(108, 'Rex', 'Chó', 'Chihuahua', 1, 'Cái', 'Thông minh, thân thiện', 14600000.00, 2, 'Đang bán', 'chi16.jpg', '2024-11-09 01:56:17'),
(109, 'Cody', 'Chó', 'Chihuahua', 2, 'Đực', 'Vui vẻ, trung thành', 15500000.00, 3, 'Đang bán', 'chi17.jpg', '2024-11-09 01:56:17'),
(110, 'Riley', 'Chó', 'Chihuahua', 3, 'Cái', 'Thông minh, năng động', 15600000.00, 1, 'Đang bán', 'chi18.jpg', '2024-11-09 01:56:17'),
(111, 'Cody', 'Chó', 'Labrador', 2, 'Cái', 'Vui vẻ, trung thành', 15500000.00, 1, 'Đang bán', 'la1.jpg', '2024-11-09 01:56:17'),
(112, 'Max', 'Chó', 'Labrador', 3, 'Đực', 'Năng động, thông minh', 15700000.00, 3, 'Đang bán', 'la2.jpg', '2024-11-09 01:56:17'),
(113, 'Rocky', 'Chó', 'Labrador', 2, 'Cái', 'Vui vẻ, trung thành', 15900000.00, 2, 'Đang bán', 'la3.jpg', '2024-11-09 01:56:17'),
(114, 'Buddy', 'Chó', 'Labrador', 3, 'Đực', 'Thông minh, dễ thương', 16000000.00, 1, 'Đang bán', 'la4.jpg', '2024-11-09 01:56:17'),
(115, 'Finn', 'Chó', 'Labrador', 1, 'Đực', 'Năng động, thông minh', 16200000.00, 3, 'Đang bán', 'la5.jpg', '2024-11-09 01:56:17'),
(116, 'Leo', 'Chó', 'Labrador', 2, 'Cái', 'Vui vẻ, trung thành', 16300000.00, 2, 'Đang bán', 'la6.jpg', '2024-11-09 01:56:17'),
(117, 'Milo', 'Chó', 'Labrador', 3, 'Đực', 'Thông minh, năng động', 16400000.00, 1, 'Đang bán', 'la7.jpg', '2024-11-09 01:56:17'),
(118, 'Toby', 'Chó', 'Labrador', 2, 'Đực', 'Vui vẻ, trung thành', 16500000.00, 2, 'Đang bán', 'la8.jpg', '2024-11-09 01:56:17'),
(119, 'Charlie', 'Chó', 'Labrador', 2, 'Đực', 'Thân thiện, thông minh', 16700000.00, 3, 'Đang bán', 'la9.jpg', '2024-11-09 01:56:17'),
(120, 'Zeus', 'Chó', 'Labrador', 1, 'Cái', 'Năng động, dễ thương', 16800000.00, 2, 'Đang bán', 'la10.jpg', '2024-11-09 01:56:17'),
(121, 'Samson', 'Chó', 'Labrador', 3, 'Cái', 'Vui vẻ, thông minh', 17000000.00, 1, 'Đang bán', 'la11.jpg', '2024-11-09 01:56:17'),
(122, 'Oliver', 'Chó', 'Labrador', 2, 'Đực', 'Năng động, thân thiện', 17200000.00, 3, 'Đang bán', 'la12.jpg', '2024-11-09 01:56:17'),
(123, 'Cody', 'Chó', 'Bull Pháp', 2, 'Cái', 'Vui vẻ, trung thành', 15500000.00, 3, 'Đang bán', 'bull1.jpg', '2024-11-09 01:56:17'),
(124, 'Max', 'Chó', 'Bull Pháp', 3, 'Đực', 'Năng động, thông minh', 15700000.00, 1, 'Đang bán', 'bull2.jpg', '2024-11-09 01:56:17'),
(125, 'Rocky', 'Chó', 'Bull Pháp', 1, 'Đực', 'Vui vẻ, trung thành', 15900000.00, 2, 'Đang bán', 'bull3.jpg', '2024-11-09 01:56:17'),
(126, 'Buddy', 'Chó', 'Bull Pháp', 2, 'Cái', 'Thông minh, dễ thương', 16000000.00, 3, 'Đang bán', 'bull4.jpg', '2024-11-09 01:56:17'),
(127, 'Finn', 'Chó', 'Bull Pháp', 2, 'Đực', 'Năng động, thông minh', 16200000.00, 1, 'Đang bán', 'bull5.jpg', '2024-11-09 01:56:17'),
(128, 'Leo', 'Chó', 'Bull Pháp', 3, 'Cái', 'Vui vẻ, trung thành', 16300000.00, 1, 'Đang bán', 'bull66.jpg', '2024-11-09 01:56:17'),
(129, 'Milo', 'Chó', 'Bull Pháp', 2, 'Đực', 'Thông minh, năng động', 16400000.00, 3, 'Đang bán', 'bull7.jpg', '2024-11-09 01:56:17'),
(130, 'Toby', 'Chó', 'Bull Pháp', 2, 'Đực', 'Vui vẻ, trung thành', 16500000.00, 2, 'Đang bán', 'bull8.jpg', '2024-11-09 01:56:17'),
(131, 'Charlie', 'Chó', 'Bull Pháp', 1, 'Đực', 'Thân thiện, thông minh', 16700000.00, 1, 'Đang bán', 'bull9.jpg', '2024-11-09 01:56:17'),
(132, 'Zoro', 'Chó', 'Bichon', 2, 'Đực', 'Vui vẻ, trung thành', 15500000.00, 2, 'Đang bán', 'bi1.png', '2024-11-09 01:56:17'),
(133, 'Luna', 'Chó', 'Bichon', 2, 'Cái', 'Năng động, thông minh', 15700000.00, 2, 'Đang bán', 'bi2.png', '2024-11-09 01:56:17'),
(134, 'Rusty', 'Chó', 'Bichon', 3, 'Đực', 'Vui vẻ, trung thành', 15800000.00, 1, 'Đang bán', 'bi3.jpg', '2024-11-09 01:56:17'),
(135, 'Baxter', 'Chó', 'Bichon', 2, 'Cái', 'Thông minh, dễ thương', 16000000.00, 2, 'Đang bán', 'bi4.jpg', '2024-11-09 01:56:17'),
(136, 'Spike', 'Chó', 'Bichon', 1, 'Đực', 'Năng động, thông minh', 16200000.00, 3, 'Đang bán', 'bi5.jpg', '2024-11-09 01:56:17'),
(137, 'Samson', 'Chó', 'Bichon', 3, 'Đực', 'Vui vẻ, trung thành', 16300000.00, 1, 'Đang bán', 'bi6.jpg', '2024-11-09 01:56:17'),
(138, 'Ollie', 'Chó', 'Bichon', 2, 'Cái', 'Thông minh, năng động', 16400000.00, 3, 'Đang bán', 'bi7.png', '2024-11-09 01:56:17'),
(139, 'Leo', 'Chó', 'Bichon', 3, 'Đực', 'Vui vẻ, trung thành', 16500000.00, 1, 'Đang bán', 'bi8.png', '2024-11-09 01:56:17'),
(140, 'Milo', 'Chó', 'Bichon', 2, 'Đực', 'Thân thiện, thông minh', 16700000.00, 2, 'Đang bán', 'bi9.png', '2024-11-09 01:56:17'),
(141, 'Charlie', 'Chó', 'Husky', 2, 'Đực', 'Năng động, thông minh', 17000000.00, 2, 'Đang bán', 'hus1.png', '2024-11-09 01:56:17'),
(142, 'Max', 'Chó', 'Husky', 2, 'Đực', 'Thân thiện, đáng yêu', 17200000.00, 2, 'Đang bán', 'hus2.png', '2024-11-09 01:56:17'),
(143, 'Bailey', 'Chó', 'Husky', 2, 'Đực', 'Vui vẻ, dạn dĩ', 17300000.00, 2, 'Đang bán', 'hus3.png', '2024-11-09 01:56:17'),
(144, 'Rocky', 'Chó', 'Husky', 2, 'Đực', 'Thông minh, đáng yêu', 17500000.00, 2, 'Đang bán', 'hus4.png', '2024-11-09 01:56:17'),
(145, 'Leo', 'Chó', 'Husky', 2, 'Đực', 'Vui vẻ, nhạy bén', 17700000.00, 2, 'Đang bán', 'hus5.png', '2024-11-09 01:56:17'),
(146, 'Jake', 'Chó', 'Husky', 2, 'Đực', 'Thân thiện, dễ thương', 17900000.00, 2, 'Đang bán', 'hus6.png', '2024-11-09 01:56:17'),
(147, 'Finn', 'Chó', 'Husky', 2, 'Đực', 'Vui vẻ, hòa đồng', 18000000.00, 2, 'Đang bán', 'hus7.png', '2024-11-09 01:56:17'),
(148, 'Toby', 'Chó', 'Husky', 2, 'Đực', 'Dễ thương, trung thành', 18200000.00, 2, 'Đang bán', 'hus8.png', '2024-11-09 01:56:17'),
(149, 'Duke', 'Chó', 'Husky', 2, 'Đực', 'Năng động, vui vẻ', 18400000.00, 2, 'Đang bán', 'hus9.png', '2024-11-09 01:56:17'),
(150, 'Oliver', 'Chó', 'Golden', 2, 'Đực', 'Vui vẻ, thông minh', 17000000.00, 2, 'Đang bán', 'go1.png', '2024-11-09 01:56:17'),
(151, 'Benji', 'Chó', 'Golden', 2, 'Đực', 'Thân thiện, đáng yêu', 17200000.00, 2, 'Đang bán', 'go2.png', '2024-11-09 01:56:17'),
(152, 'Samson', 'Chó', 'Golden', 2, 'Đực', 'Vui vẻ, dạn dĩ', 17300000.00, 2, 'Đang bán', 'go3.png', '2024-11-09 01:56:17'),
(153, 'Zeke', 'Chó', 'Golden', 2, 'Đực', 'Thông minh, đáng yêu', 17500000.00, 2, 'Đang bán', 'go4.png', '2024-11-09 01:56:17'),
(154, 'Buddy', 'Chó', 'Golden', 2, 'Đực', 'Vui vẻ, nhạy bén', 17700000.00, 2, 'Đang bán', 'go5.png', '2024-11-09 01:56:17'),
(155, 'Rocko', 'Chó', 'Golden', 2, 'Đực', 'Thân thiện, dễ thương', 17900000.00, 2, 'Đang bán', 'go6.png', '2024-11-09 01:56:17'),
(156, 'King', 'Chó', 'Golden', 2, 'Đực', 'Vui vẻ, hòa đồng', 18000000.00, 2, 'Đang bán', 'go7.png', '2024-11-09 01:56:17'),
(157, 'Theo', 'Chó', 'Golden', 2, 'Đực', 'Dễ thương, trung thành', 18200000.00, 2, 'Đang bán', 'go8.png', '2024-11-09 01:56:17'),
(158, 'Maximus', 'Chó', 'Golden', 2, 'Đực', 'Năng động, vui vẻ', 18400000.00, 2, 'Đang bán', 'go9.png', '2024-11-09 01:56:17'),
(159, 'Rocky', 'Chó', 'Pug', 2, 'Đực', 'Vui vẻ, thông minh', 17000000.00, 2, 'Đang bán', 'pug1.png', '2024-11-09 01:56:17'),
(160, 'Max', 'Chó', 'Pug', 2, 'Đực', 'Thân thiện, dũng cảm', 17200000.00, 2, 'Đang bán', 'pug2.png', '2024-11-09 01:56:17'),
(161, 'Charlie', 'Chó', 'Pug', 2, 'Đực', 'Vui vẻ, dễ thương', 17350000.00, 2, 'Đang bán', 'pug3.png', '2024-11-09 01:56:17'),
(162, 'Buddy', 'Chó', 'Pug', 2, 'Đực', 'Thân thiện, thông minh', 17500000.00, 2, 'Đang bán', 'pug4.png', '2024-11-09 01:56:17'),
(163, 'Duke', 'Chó', 'Pug', 2, 'Đực', 'Vui vẻ, trung thành', 17750000.00, 2, 'Đang bán', 'pug5.png', '2024-11-09 01:56:17'),
(164, 'Oscar', 'Chó', 'Pug', 2, 'Đực', 'Dễ thương, năng động', 17900000.00, 2, 'Đang bán', 'pug6.png', '2024-11-09 01:56:17'),
(165, 'Finn', 'Chó', 'Pug', 2, 'Đực', 'Thông minh, dễ thương', 18000000.00, 2, 'Đang bán', 'pug7.png', '2024-11-09 01:56:17'),
(166, 'Toby', 'Chó', 'Pug', 2, 'Đực', 'Vui vẻ, thông minh', 18200000.00, 2, 'Đang bán', 'pug8.png', '2024-11-09 01:56:17'),
(167, 'Leo', 'Chó', 'Pug', 2, 'Đực', 'Dễ thương, trung thành', 18350000.00, 2, 'Đang bán', 'pug9.png', '2024-11-09 01:56:17'),
(168, 'Tina', 'Mèo', 'Mèo Anh lông ngắn', 2, 'Cái', 'Nhanh nhẹn, khỏe mạnh, ăn uống tốt', 6000000.00, 1, 'Đang bán', 'anh_ln_1.jpg', '2024-11-09 01:56:17'),
(169, 'Tứ quí', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Đực', 'Thân thiện, nhanh nhẹn', 20000000.00, 4, 'Đang bán', 'anh_ln_2.jpg', '2024-11-09 01:56:17'),
(170, 'Mập', 'Mèo', 'Mèo Anh lông ngắn', 2, 'Đực', 'Lạnh lùng, ít nói', 6000000.00, 1, 'Đang bán', 'anh_ln_3.jpg', '2024-11-09 01:56:17'),
(171, 'Đen', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Đực', 'Thông minh, bị khùng', 6500000.00, 1, 'Đang bán', 'anh_ln_4.jpg', '2024-11-09 01:56:17'),
(172, 'Út', 'Mèo', 'Mèo Anh lông ngắn', 2, 'Cái', 'Thân thiện, nhanh nhẹn', 6400000.00, 1, 'Đang bán', 'anh_ln_5.jpg', '2024-11-09 01:56:17'),
(173, 'Tam ca', 'Mèo', 'Mèo Anh lông ngắn', 2, 'Đực', 'Đoàn kết, quấn chủ', 18000000.00, 3, 'Đang bán', 'anh_ln_6.jpg', '2024-11-09 01:56:17'),
(174, 'Trắng', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Đực', 'Cute, thích cá', 7000000.00, 1, 'Đã bán', 'anh_ln_7.jpg', '2024-11-09 01:56:17'),
(175, 'Xám Đen', 'Mèo', 'Mèo Anh lông ngắn', 2, 'Cái', 'Đáng iu, dễ vỡ', 15000000.00, 2, 'Đang bán', 'anh_ln_8.jpg', '2024-11-09 01:56:17'),
(176, 'Vàng', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Đực', 'Lạnh lùng, ít nói', 5500000.00, 1, 'Đang bán', 'anh_ln_9.jpg', '2024-11-09 01:56:17'),
(177, 'Snow', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Cái', 'e thẹn, quấn chủ', 6500000.00, 1, 'Đã bán', 'anh_ln_10.jpg', '2024-11-09 01:56:17'),
(178, 'Raz', 'Mèo', 'Mèo Anh lông ngắn', 2, 'Đực', 'Nhanh nhẹn, hảo hán', 7500000.00, 1, 'Đang bán', 'anh_ln_11.jpg', '2024-11-09 01:56:17'),
(179, 'Liliana', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Cái', 'Chảnh, ghét sờ bụng', 6500000.00, 1, 'Đã bán', 'anh_ln_12.jpg', '2024-11-09 01:56:17'),
(180, 'Krixi', 'Mèo', 'Mèo Anh lông ngắn', 2, 'Cái', 'Nói nhiều, tranh lane', 600000.00, 1, 'Đang bán', 'anh_ln_13.jpg', '2024-11-09 01:56:17'),
(181, 'Lauriel', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Cái', 'Lạnh lùng, ít nói', 5700000.00, 1, 'Đang bán', 'anh_ln_14.jpg', '2024-11-09 01:56:17'),
(182, 'Teemee', 'Mèo', 'Mèo Anh lông ngắn', 1, 'Đực', 'Hơi hôi, heal ổn', 6500000.00, 2, 'Đã bán', 'anh_ln_15.jpg', '2024-11-09 01:56:17'),
(183, 'Điêu Thuyền', 'Mèo', 'Mèo Anh lông dài', 3, 'Cái', 'Xinh, giữ chân chủ', 6800000.00, 1, 'Đã bán', 'anh_ld_1.jpg', '2024-11-10 01:56:18'),
(184, 'Nata', 'Mèo', 'Mèo Anh lông dài', 4, 'Cái', 'Hiền lành, quấn chủ', 6100000.00, 1, 'Đang bán', 'anh_ld_2.jpg', '2024-11-10 01:56:18'),
(185, 'Mướp', 'Mèo', 'Mèo Anh lông dài', 1, 'Đực', 'Nhanh nhẹn, chịu ăn', 7000000.00, 1, 'Đang bán', 'anh_ld_3_.jpg', '2024-11-10 01:56:18'),
(186, 'Mướp', 'Mèo', 'Mèo Anh lông dài', 1, 'Đực', 'Nhanh nhẹn, chịu ăn', 7000000.00, 1, 'Đang bán', 'anh_ld_3_.jpg', '2024-11-10 01:56:18'),
(187, 'Ngố', 'Mèo', 'Mèo Anh lông dài', 1, 'Đực', 'Năng động, chịu ăn', 7500000.00, 1, 'Đã bán', 'anh_ld_4.jpg', '2024-11-10 01:56:18'),
(188, 'Sen', 'Mèo', 'Mèo Anh lông dài', 3, 'Cái', 'Xinh, ngoan', 6500000.00, 1, 'Đang bán', 'anh_ld_5.jpg', '2024-11-10 01:56:18'),
(189, 'Ýt', 'Mèo', 'Mèo Anh lông dài', 2, 'Đực', 'Khùng Khùng, lỳ lỳ', 7600000.00, 1, 'Đang bán', 'anh_ld_6.jpg', '2024-11-10 01:56:18'),
(190, 'Lesi', 'Mèo', 'Mèo Anh lông dài', 5, 'Cái', 'Chu đáo, có ý thức tốt', 7000000.00, 2, 'Đã bán', 'anh_ld_7.jpg', '2024-11-10 01:56:18'),
(191, 'Hana', 'Mèo', 'Mèo Anh lông dài', 1, 'Cái', 'Ngủ nhiều, ăn nhiều', 8000000.00, 1, 'Đang bán', 'anh_ld_8.jpg', '2024-11-10 01:56:18'),
(192, 'Khoai', 'Mèo', 'Mèo Anh lông dài', 1, 'Đực', 'Nhanh nhẹn, chịu ăn', 9000000.00, 1, 'Đã bán', 'anh_ld_9.jpg', '2024-11-10 01:56:18'),
(193, 'Nak', 'Mèo', 'Mèo Anh lông dài', 1, 'Đực', 'Nhanh nhẹn, linh hoạt', 8000000.00, 1, 'Đang bán', 'anh_ld_10.jpg', '2024-11-10 01:56:18'),
(194, 'Zill', 'Mèo', 'Mèo Anh lông dài', 3, 'Cái', 'Quấn chủ, chịu ngủ', 6500000.00, 1, 'Đang bán', 'anh_ld_11.jpg', '2024-11-10 01:56:18'),
(195, 'Vân', 'Mèo', 'Mèo Anh lông dài', 2, 'Cái', 'Xinh, ăn ít', 6500000.00, 4, 'Đã bán', 'anh_ld_12.jpg', '2024-11-10 01:56:18'),
(196, 'Cá', 'Mèo', 'Mèo Anh lông dài', 1, 'Đực', 'Nhanh nhẹn, chịu ăn', 7000000.00, 2, 'Đang bán', 'anh_ld_3_.jpg', '2024-11-10 01:56:18'),
(197, 'Milo', 'Mèo', 'Mèo Bengal', 3, 'Cái', 'Vui vẻ, thân thiện', 6400000.00, 1, 'Đang bán', 'meo_bengal_1.jpg', '2024-11-10 01:09:17'),
(198, 'Luna', 'Mèo', 'Mèo Bengal', 1, 'Đực', 'Thích chạy nhảy, năng động', 7200000.00, 2, 'Đã bán', 'meo_bengal_2.jpg', '2024-11-10 01:09:17'),
(199, 'Simba', 'Mèo', 'Mèo Bengal', 2, 'Cái', 'Tò mò, thích chơi cùng chủ', 6900000.00, 1, 'Đang bán', 'meo_bengal_3.jpg', '2024-11-10 01:09:17'),
(200, 'Oliver', 'Mèo', 'Mèo Bengal', 1, 'Đực', 'Thân thiện, dễ gần, ít rụng lông', 8800000.00, 1, 'Đã bán', 'meo_bengal_4.jpg', '2024-11-10 01:09:17'),
(201, 'Bella', 'Mèo', 'Mèo Bengal', 3, 'Cái', 'Năng động, thích leo trèo, hòa đồng', 6700000.00, 2, 'Đang bán', 'meo_bengal_5.jpg', '2024-11-10 01:09:17'),
(202, 'Nala', 'Mèo', 'Mèo Bengal', 2, 'Cái', 'Dễ thương, thích chơi, phù hợp nuôi nhà', 7500000.00, 1, 'Đã bán', 'meo_bengal_6.jpg', '2024-11-10 01:09:17'),
(203, 'Leo', 'Mèo', 'Mèo Bengal', 3, 'Đực', 'Nhanh nhẹn, thân thiện, hợp gia đình', 8000000.00, 2, 'Đang bán', 'meo_bengal_7.jpg', '2024-11-10 01:09:17'),
(204, 'Chloe', 'Mèo', 'Mèo Bengal', 1, 'Cái', 'Yêu trẻ con, hiền lành, dễ nuôi', 9000000.00, 1, 'Đã bán', 'meo_bengal_8.jpg', '2024-11-10 01:09:17'),
(205, 'Max', 'Mèo', 'Mèo Bengal', 2, 'Đực', 'Thân thiện, thích khám phá, không kén ăn', 7800000.00, 1, 'Đang bán', 'meo_bengal_9.jpg', '2024-11-10 01:09:17'),
(206, 'Lily', 'Mèo', 'Mèo Bengal', 3, 'Cái', 'Hiếu động, thông minh, dễ thích nghi', 6200000.00, 2, 'Đã bán', 'meo_bengal_10.jpg', '2024-11-10 01:09:17'),
(207, 'Charlie', 'Mèo', 'Mèo Bengal', 2, 'Đực', 'Vui vẻ, thích nghi môi trường', 8400000.00, 1, 'Đang bán', 'meo_bengal_11.jpg', '2024-11-10 01:09:17'),
(208, 'Loki', 'Mèo', 'Mèo Bengal', 1, 'Đực', 'Thân thiện, thích chơi với chủ', 7100000.00, 2, 'Đã bán', 'meo_bengal_12.jpg', '2024-11-10 01:09:17'),
(209, 'Sophie', 'Mèo', 'Mèo Bengal', 2, 'Cái', 'Năng động, thích khám phá', 8600000.00, 1, 'Đang bán', 'meo_bengal_13.jpg', '2024-11-10 01:09:17'),
(210, 'Jasper', 'Mèo', 'Mèo Bengal', 3, 'Đực', 'Nhanh nhẹn, ít rụng lông, hợp trẻ nhỏ', 6400000.00, 2, 'Đã bán', 'meo_bengal_14.jpg', '2024-11-10 01:09:17'),
(211, 'Daisy', 'Mèo', 'Mèo Bengal', 1, 'Cái', 'Dễ nuôi, không kén ăn, đáng yêu', 7200000.00, 1, 'Đang bán', 'meo_bengal_15.jpg', '2024-11-10 01:09:17'),
(212, 'Cleo', 'Mèo', 'Mèo Munchkin', 2, 'Cái', 'Hoạt bát, thân thiện', 12000000.00, 1, 'Đang bán', 'anh_munchkin_1.jpg', '2024-11-10 06:09:17'),
(213, 'Zeus', 'Mèo', 'Mèo Munchkin', 3, 'Đực', 'Năng động, thích chạy nhảy', 28000000.00, 2, 'Đã bán', 'anh_munchkin_2.jpg', '2024-11-10 06:09:17'),
(214, 'Mimi', 'Mèo', 'Mèo Munchkin', 1, 'Cái', 'Yêu trẻ, hòa đồng', 19000000.00, 1, 'Đang bán', 'anh_munchkin_3.jpg', '2024-11-10 06:09:17'),
(215, 'Oscar', 'Mèo', 'Mèo Munchkin', 2, 'Đực', 'Thân thiện, dễ gần', 17000000.00, 1, 'Đã bán', 'anh_munchkin_4.jpg', '2024-11-10 06:09:17'),
(216, 'Loki', 'Mèo', 'Mèo Munchkin', 1, 'Đực', 'Hoạt bát, thân thiện', 14000000.00, 2, 'Đang bán', 'anh_munchkin_5.jpg', '2024-11-10 06:09:17'),
(217, 'Coco', 'Mèo', 'Mèo Munchkin', 3, 'Cái', 'Hiền lành, dễ nuôi', 21000000.00, 1, 'Đã bán', 'anh_munchkin_6.jpg', '2024-11-10 06:09:17'),
(218, 'Rocky', 'Mèo', 'Mèo Munchkin', 2, 'Đực', 'Thân thiện, năng động', 25000000.00, 1, 'Đang bán', 'anh_munchkin_7.jpg', '2024-11-10 06:09:17'),
(219, 'Misty', 'Mèo', 'Mèo Munchkin', 1, 'Cái', 'Dễ thương, dễ chăm', 13000000.00, 2, 'Đã bán', 'anh_munchkin_8.jpg', '2024-11-10 06:09:17'),
(220, 'Shadow', 'Mèo', 'Mèo Munchkin', 2, 'Đực', 'Thân thiện, không kén ăn', 16000000.00, 1, 'Đang bán', 'anh_munchkin_9.jpg', '2024-11-10 06:09:17'),
(221, 'Nina', 'Mèo', 'Mèo Munchkin', 3, 'Cái', 'Nhanh nhẹn, đáng yêu', 27000000.00, 2, 'Đã bán', 'anh_munchkin_10.jpg', '2024-11-10 06:09:17'),
(222, 'Tiger', 'Mèo', 'Mèo Munchkin', 2, 'Đực', 'Hoạt bát, dễ nuôi', 15000000.00, 1, 'Đang bán', 'anh_munchkin_11.jpg', '2024-11-10 06:09:17'),
(223, 'Ginger', 'Mèo', 'Mèo Munchkin', 1, 'Cái', 'Dễ gần, hòa đồng', 10000000.00, 1, 'Đã bán', 'anh_munchkin_12.jpg', '2024-11-10 06:09:17'),
(224, 'Whiskers', 'Mèo', 'Mèo Munchkin', 3, 'Đực', 'Thích khám phá, dễ nuôi', 23000000.00, 2, 'Đang bán', 'anh_munchkin_13.jpg', '2024-11-10 06:09:17'),
(225, 'Lola', 'Mèo', 'Mèo Munchkin', 1, 'Cái', 'Thân thiện, thích chơi đùa', 18000000.00, 1, 'Đã bán', 'anh_munchkin_14.jpg', '2024-11-10 06:09:17'),
(226, 'Simba', 'Mèo', 'Mèo Munchkin', 2, 'Đực', 'Dễ nuôi, thân thiện', 26000000.00, 1, 'Đang bán', 'anh_munchkin_15.jpg', '2024-11-10 06:09:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spa_booking`
--

CREATE TABLE `spa_booking` (
  `booking_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pet_type` enum('Chó','Mèo') NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `time_slot` time NOT NULL,
  `status` enum('Đã đặt','Hoàn thành','Hủy') DEFAULT 'Đã đặt',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `spa_booking`
--

INSERT INTO `spa_booking` (`booking_id`, `username`, `email`, `phone`, `pet_type`, `service_id`, `booking_date`, `time_slot`, `status`, `created_at`) VALUES
(1, 'nguyenminh', 'minh.nguyen@gmail.com', '0912345678', 'Chó', 1, '2025-01-15', '10:00:00', 'Hoàn thành', '2025-01-10 08:30:00'),
(2, 'tranthuy', 'thuy.tran@yahoo.com', '0912345679', 'Mèo', 2, '2025-02-20', '11:00:00', 'Hoàn thành', '2025-02-15 09:45:00'),
(3, 'lehoang', 'hoang.le@gmail.com', '0912345680', 'Chó', 3, '2025-03-05', '12:00:00', 'Hoàn thành', '2025-03-01 14:20:00'),
(4, 'phamlinh', 'linh.pham@outlook.com', '0912345681', 'Mèo', 1, '2025-04-10', '09:30:00', 'Đã đặt', '2025-04-05 10:15:00'),
(5, 'vuquang', 'quang.vu@gmail.com', '0912345682', 'Chó', 2, '2025-05-12', '14:00:00', 'Hoàn thành', '2025-05-08 16:30:00'),
(6, 'dangmai', 'mai.dang@yahoo.com', '0912345683', 'Mèo', 3, '2025-06-18', '15:30:00', 'Hủy', '2025-06-15 11:50:00'),
(7, 'buitien', 'tien.bui@gmail.com', '0912345684', 'Chó', 1, '2025-07-22', '16:00:00', 'Đã đặt', '2025-07-18 13:25:00'),
(8, 'dotuan', 'tuan.do@outlook.com', '0912345685', 'Mèo', 2, '2025-08-25', '13:00:00', 'Hoàn thành', '2025-08-20 15:40:00'),
(9, 'hoanghai', 'hai.hoang@gmail.com', '0912345686', 'Chó', 3, '2025-09-03', '11:30:00', 'Hủy', '2025-08-30 10:05:00'),
(10, 'nguyenthu', 'thu.nguyen@yahoo.com', '0912345687', 'Mèo', 1, '2025-10-08', '10:30:00', 'Đã đặt', '2025-10-05 09:15:00'),
(11, 'trinhvan', 'van.trinh@gmail.com', '0912345688', 'Chó', 2, '2025-11-11', '12:00:00', 'Hoàn thành', '2025-11-08 14:50:00'),
(12, 'lythanh', 'thanh.ly@outlook.com', '0912345689', 'Mèo', 3, '2025-12-14', '10:00:00', 'Hủy', '2025-12-10 11:30:00'),
(13, 'caominh', 'minh.cao@gmail.com', '0912345690', 'Chó', 1, '2025-01-17', '09:30:00', 'Đã đặt', '2025-01-12 08:45:00'),
(14, 'daothi', 'thi.dao@yahoo.com', '0912345691', 'Mèo', 2, '2025-02-19', '14:00:00', 'Hoàn thành', '2025-02-15 16:20:00'),
(15, 'lamtu', 'tu.lam@gmail.com', '0912345692', 'Chó', 3, '2025-03-22', '15:00:00', 'Hủy', '2025-03-18 12:10:00'),
(16, 'ngohong', 'hong.ngo@outlook.com', '0912345693', 'Mèo', 1, '2025-04-25', '16:30:00', 'Đã đặt', '2025-04-20 17:35:00'),
(17, 'phanthanh', 'thanh.phan@gmail.com', '0912345694', 'Chó', 2, '2025-05-28', '13:30:00', 'Hoàn thành', '2025-05-25 10:55:00'),
(18, 'truonglam', 'lam.truong@yahoo.com', '0912345695', 'Mèo', 3, '2025-06-30', '11:00:00', 'Hủy', '2025-06-25 09:40:00'),
(19, 'vutuong', 'tuong.vu@gmail.com', '0912345696', 'Chó', 1, '2025-07-05', '10:00:00', 'Đã đặt', '2025-07-01 08:20:00'),
(20, 'dinhtien', 'tien.dinh@outlook.com', '0912345697', 'Mèo', 2, '2025-08-10', '09:00:00', 'Hoàn thành', '2025-08-05 07:50:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spa_services`
--

CREATE TABLE `spa_services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `spa_services`
--

INSERT INTO `spa_services` (`service_id`, `service_name`, `description`, `price`, `duration`, `created_at`) VALUES
(1, 'Tắm cho chó', 'Dịch vụ tắm cơ bản cho chó', 220000.00, 60, '2025-01-15 09:00:00'),
(2, 'Tắm cho mèo', 'Dịch vụ tắm cơ bản cho mèo', 198000.00, 50, '2025-01-16 10:30:00'),
(3, 'Cắt tỉa lông cho chó', 'Cắt tỉa lông và chăm sóc da cho chó', 275000.00, 90, '2025-02-05 14:15:00'),
(4, 'Cắt tỉa lông cho mèo', 'Dịch vụ cắt tỉa lông cho mèo', 253000.00, 80, '2025-02-10 11:45:00'),
(5, 'Massage cho chó', 'Dịch vụ massage thư giãn cho chó', 330000.00, 45, '2025-03-12 08:20:00'),
(6, 'Massage cho mèo', 'Dịch vụ massage thư giãn cho mèo', 308000.00, 40, '2025-03-18 13:10:00'),
(7, 'Chăm sóc móng cho chó', 'Cắt móng, làm móng cho chó', 165000.00, 30, '2025-04-02 16:30:00'),
(8, 'Chăm sóc móng cho mèo', 'Cắt móng, làm móng cho mèo', 143000.00, 30, '2025-04-07 10:50:00'),
(9, 'Spa cho chó con', 'Dịch vụ spa đặc biệt cho chó con', 385000.00, 60, '2025-05-15 09:45:00'),
(10, 'Spa cho mèo con', 'Dịch vụ spa đặc biệt cho mèo con', 352000.00, 50, '2025-05-20 14:25:00'),
(11, 'Tắm + Cắt tỉa cho chó', 'Dịch vụ kết hợp tắm và cắt tỉa cho chó', 440000.00, 120, '2025-06-10 11:15:00'),
(12, 'Tắm + Cắt tỉa cho mèo', 'Dịch vụ kết hợp tắm và cắt tỉa cho mèo', 418000.00, 110, '2025-06-18 15:40:00'),
(13, 'Chăm sóc da cho chó', 'Dịch vụ chăm sóc và dưỡng da cho chó', 385000.00, 60, '2025-07-05 10:10:00'),
(14, 'Chăm sóc da cho mèo', 'Dịch vụ chăm sóc và dưỡng da cho mèo', 363000.00, 60, '2025-07-12 13:55:00'),
(15, 'Chăm sóc toàn thân cho chó', 'Dịch vụ chăm sóc toàn thân cho chó', 550000.00, 120, '2025-08-08 08:30:00'),
(16, 'Chăm sóc toàn thân cho mèo', 'Dịch vụ chăm sóc toàn thân cho mèo', 528000.00, 110, '2025-08-15 16:20:00'),
(17, 'Dịch vụ gội đầu cho chó', 'Dịch vụ gội đầu cho chó với sản phẩm dịu nhẹ', 165000.00, 30, '2025-09-03 09:25:00'),
(18, 'Dịch vụ gội đầu cho mèo', 'Dịch vụ gội đầu cho mèo với sản phẩm dịu nhẹ', 143000.00, 30, '2025-09-10 14:50:00'),
(19, 'Chăm sóc răng miệng cho chó', 'Chăm sóc và vệ sinh răng miệng cho chó', 220000.00, 30, '2025-10-01 11:40:00'),
(20, 'Chăm sóc răng miệng cho mèo', 'Chăm sóc và vệ sinh răng miệng cho mèo', 198000.00, 30, '2025-10-05 15:15:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `email`, `name`, `mat_khau`) VALUES
(1, 'admin@gmail.com', 'admin', '123456'),
(2, 'admin1@gmail.com', 'admin1', '123456'),
(3, 'admin2@gmail.com', 'admin2', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Chỉ mục cho bảng `spa_booking`
--
ALTER TABLE `spa_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Chỉ mục cho bảng `spa_services`
--
ALTER TABLE `spa_services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT cho bảng `spa_booking`
--
ALTER TABLE `spa_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `spa_services`
--
ALTER TABLE `spa_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`);

--
-- Các ràng buộc cho bảng `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Các ràng buộc cho bảng `spa_booking`
--
ALTER TABLE `spa_booking`
  ADD CONSTRAINT `spa_booking_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `spa_services` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
