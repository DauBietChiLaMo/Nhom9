-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2022 lúc 08:50 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `client_id`, `code`, `status`) VALUES
(7, 3, 'CUjP2k1qDG', 0),
(8, 3, 'GgdapRFzU3', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category`, `position`) VALUES
(25, 'Manga', 1),
(27, 'SÁCH BÁN CHẠY', 2),
(28, 'Doremon', 3),
(29, 'Conan', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `client`
--

INSERT INTO `client` (`client_id`, `username`, `email`, `address`, `password`, `phone`) VALUES
(3, 'chien', 'chien@gmail.com', 'BG', '84297215968725b4d9ea6ca17fe2177f', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orders_id`, `code`, `product_id`, `quantity_purchased`) VALUES
(4, 'CUjP2k1qDG', 36, 3),
(5, 'GgdapRFzU3', 43, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `detail` text NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product`, `code`, `price`, `quantity`, `image`, `summary`, `detail`, `status`, `category_id`) VALUES
(26, 'Doremon - Tập 4', 'D1', 50000, 100, '1671292357_1.jpg', 'Truyện Doremon dài tập', 'Cuộc phưu lưu của chú mèo máy đến từ tương lai', 1, 25),
(27, 'Doremon - Tập 1', 'D2', 50000, 100, '1671292482_dora.png', 'Truyện Doremon tập dài', '', 1, 28),
(28, 'Thám Tử Lừng Danh Conan - Tập 100', 'C1', 40000, 100, '1671292719_6.jpg', 'Truyện Conan dài tập', 'Thám tử lừng danh Conan điều tra các vụ án ', 1, 29),
(29, 'Mục Tiêu Thứ 14 - Tập 1', 'C2', 100000, 100, '1671292833_5.jpg', 'Điều tra các vụ án mạng bí ẩn', '', 1, 29),
(31, 'Học Viện Siêu Anh Hùng - Tập 27', 'M1', 50000, 100, '1671293178_manga1.png', 'Đào tạo siêu anh hùng', '', 1, 25),
(32, 'SPY*FAMILY', 'M2', 60000, 100, '1671293242_manga2.png', 'Anh hùng siêu đẳng', '', 1, 25),
(33, 'Bảy Viên Ngọc Rồng ', 'M3', 70000, 100, '1671293355_manga3.png', 'Songoku đại chiến giữa các hành tinh', '', 1, 25),
(34, 'Doremon - Tập 0', 'D3', 60000, 100, '1671293452_dore.png', 'Mèo máy đến từ tương lai', '', 1, 28),
(35, 'Shin - Cậu Bé Bút Chì - Tập 1', 'M4', 60000, 100, '1671293519_shin.png', '', '', 1, 25),
(36, 'Đại Chiến TITAN - Tập 1', 'M5', 50000, 100, '1671293579_dai-chien-titan.jpg', '', '', 1, 25),
(37, 'Mục Tiêu Thứ 14 - Tập 1', 'B1', 100000, 0, '1671293709_5.jpg', '', '', 1, 27),
(38, 'Mục Tiêu Thứ 14 - Tập 1', 'C4', 50000, 100, '1671293792_5.jpg', '', '', 1, 29),
(39, 'Mục Tiêu Thứ 14 - Tập 2', 'C5', 50000, 100, '1671293957_4.jpg', '', '', 1, 29),
(40, 'Thần Đồng Đất Việt - Quốc Phẩm Ẩn Hình - Tập 213', 'M6', 40000, 100, '1671345172_7.jpg', '', '', 1, 25),
(41, 'AVATAR', 'M7', 150000, 100, '1671345373_avatar (1).jpg', '', '', 1, 25),
(42, 'HANAKO', 'M8', 200000, 100, '1671345651_ha.jpg', '', '', 1, 25),
(43, 'ONE PUNCH MAN', 'M8', 120000, 100, '1671345804_ONE.jpg', '', '', 1, 25);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_client` (`client_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `fk_orders_product` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
