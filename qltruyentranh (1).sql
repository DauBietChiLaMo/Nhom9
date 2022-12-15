-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th12 13, 2021 lúc 01:16 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltruyentranh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `ID` varchar(225) NOT NULL,
  `Pass` varchar(225) DEFAULT NULL,
  `Hoten` varchar(225) DEFAULT NULL,
  `Sdt` int(12) NOT NULL,
  `gt` varchar(225) NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `Pass`, `Hoten`, `Sdt`, `gt`, `quyen`) VALUES
('123', '123', 'aaaa', 111, 'Nam', 0),
('admin', '123', 'admin', 123455678, 'Nam', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

DROP TABLE IF EXISTS `truyen`;
CREATE TABLE IF NOT EXISTS `truyen` (
  `idtruyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tentruyen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `giatien` float NOT NULL,
  `hinhanh` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `loai` int(11) NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`idtruyen`, `tentruyen`, `giatien`, `hinhanh`, `loai`, `mota`) VALUES
('1', 'Mangaa123', 120000, 'uploads/onpice.jpg', 2, 'dasdsadsafasgasgasgasgasgasga'),
('12222', 'test', 12311100, 'uploads/táº£i xuá»‘ng (1).jpg', 1, 'qdasdf ar awd asd asd adsa ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
