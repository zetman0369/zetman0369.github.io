-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 25, 2020 lúc 04:59 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `rong` varchar(255) NOT NULL,
  `cao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `hinh`, `rong`, `cao`) VALUES
(1, 'Untitled.png', '990px', '150px');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `clientname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `noi_dung` mediumtext DEFAULT NULL,
  `hang_duoc_mua` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `html` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `footer`
--

INSERT INTO `footer` (`id`, `html`) VALUES
(1, '<table style=\"width:990px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Cửa h&agrave;ng :</td>\r\n			<td>ShXP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện thoại :</td>\r\n			<td>0964280922</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Địa chỉ :</td>\r\n			<td>25 Đ&ocirc;ng Ngạc</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(2, '<table width=\"990px\">\r\n    <tr>\r\n        <td width=\"495px\" align=\"right\" >\r\n        Cửa hàng :\r\n        </td>\r\n        <td width=\"495px\" >\r\n        Shop abc\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n        <td align=\"right\" >\r\n        Điện thoại :\r\n        </td>\r\n        <td>\r\n        so_dien_thoai\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n        <td align=\"right\">\r\n        Địa chỉ :\r\n        </td>\r\n        <td>\r\n        dia_chi\r\n        </td>\r\n    </tr>\r\n</table>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hor_menu`
--

CREATE TABLE `hor_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `menu_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hor_menu`
--

INSERT INTO `hor_menu` (`id`, `name`, `content`, `menu_type`) VALUES
(2, 'Sản phẩm', NULL, 'product');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `des` mediumtext DEFAULT NULL,
  `idmenu` int(11) DEFAULT NULL,
  `trang_chu` varchar(255) DEFAULT NULL,
  `sap_xep_trang_chu` int(11) DEFAULT NULL,
  `noi_bat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `images`, `des`, `idmenu`, `trang_chu`, `sap_xep_trang_chu`, `noi_bat`) VALUES
(1, 'BĂNG', 100000, 'băng.jpg', 'Một cuốn sách nhàm chán', 1, NULL, NULL, NULL),
(2, 'CỔ TÍCH CỦA NGƯỜI ĐIÊN', 50000, 'cotichofngd.jpg', 'For kid ... i think : /', 1, NULL, NULL, NULL),
(3, 'HÒN ĐẢO CỦA TIẾN SĨ MOREAU', 50000, 'moreau.jpg', 'khá', 1, NULL, NULL, NULL),
(4, 'RẮN VÀ KHUYÊN MÔI', 15000, 'ranvakhuyenmoi.jpg', 'waste of time', 1, NULL, NULL, NULL),
(5, 'COLORFUL', 20000, 'colorful.jpg', 'bored', 1, NULL, NULL, NULL),
(6, '1Q84 - Tập 1', 70000, '1q841.jpg', 'try it', 1, 'co', 1, 'co'),
(7, '1Q84 - Tập 2', 70000, '1q842.jpg', 'try again', 1, 'co', 2, 'co'),
(8, '1Q84 - Tập 3', 70000, '1q843.jpg', ': /', 1, 'co', 3, 'co'),
(9, 'QUÁI VẬT GHÉ THĂM', 25000, 'qvgt.jpg', '???', 1, NULL, NULL, NULL),
(10, 'MẶT NẠ TỬ THẦN ĐỎ', 25000, 'mnttd.jpg', '', 1, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quang_cao`
--

CREATE TABLE `quang_cao` (
  `id` int(11) NOT NULL,
  `html` mediumtext NOT NULL,
  `vi_tri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quang_cao`
--

INSERT INTO `quang_cao` (`id`, `html`, `vi_tri`) VALUES
(1, '<p>Nội dung html của<br />\r\nphần quảng c&aacute;o <strong>tr&aacute;i</strong></p>\r\n', 'trai'),
(2, 'Nội dung html của<br> phần quảng cáo <b>phải</b>', 'phai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `lien_ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slideshow`
--

INSERT INTO `slideshow` (`id`, `hinh`, `lien_ket`) VALUES
(1, 'a_1.jpg', '#'),
(2, '670098.jpg', '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_quan_tri`
--

CREATE TABLE `thong_tin_quan_tri` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_quan_tri`
--

INSERT INTO `thong_tin_quan_tri` (`id`, `username`, `password`) VALUES
(1, 'admin', '082e91f10f14f2b0335b408d8700a4a3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ver_menu`
--

CREATE TABLE `ver_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ver_menu`
--

INSERT INTO `ver_menu` (`id`, `name`) VALUES
(1, 'Books'),
(2, 'Plants'),
(3, 'Offline Games'),
(4, 'Trashs'),
(5, 'Menu 5'),
(6, 'Menu 8');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hor_menu`
--
ALTER TABLE `hor_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quang_cao`
--
ALTER TABLE `quang_cao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_tin_quan_tri`
--
ALTER TABLE `thong_tin_quan_tri`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ver_menu`
--
ALTER TABLE `ver_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hor_menu`
--
ALTER TABLE `hor_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `quang_cao`
--
ALTER TABLE `quang_cao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thong_tin_quan_tri`
--
ALTER TABLE `thong_tin_quan_tri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ver_menu`
--
ALTER TABLE `ver_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
