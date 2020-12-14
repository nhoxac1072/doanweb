-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2020 lúc 09:32 SA
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `Password`, `fullname`, `phone_number`, `email`, `birthday`) VALUES
('conga', '123abc', 'van toan', '0121456789', 'nhoxxac@gmail.com', '4565-07-23'),
('vantoan', 'aimabiet', 'Nguyá»…n VÄƒn ToÃ n', '0121444777', 'laaaa@gmail.com', '1999-07-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `Password`) VALUES
('admin', '123456'),
('haibabon', '123456'),
('vantoan', 'khongcon');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonphong`
--

CREATE TABLE `chitietdonphong` (
  `STT` int(10) NOT NULL,
  `Madonphong` varchar(10) NOT NULL,
  `Maphong` char(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonphong`
--

INSERT INTO `chitietdonphong` (`STT`, `Madonphong`, `Maphong`, `soluong`, `price`) VALUES
(9, '13', '022', 1, 86),
(10, '13', '01', 1, 666);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donphong`
--

CREATE TABLE `donphong` (
  `Madonphong` char(10) NOT NULL,
  `Tenkh` varchar(50) NOT NULL,
  `ngaysinh` varchar(10) DEFAULT NULL,
  `sdt` char(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `ngaydat` varchar(10) NOT NULL,
  `ngaykt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donphong`
--

INSERT INTO `donphong` (`Madonphong`, `Tenkh`, `ngaysinh`, `sdt`, `email`, `ngaydat`, `ngaykt`) VALUES
('12', 'van toan', '1999-11-20', '0121456789', 'blaap@gmail.com', '2000-11-12', '2000-11-15'),
('13', 'tráº§n vÄƒn Ä‘áº¡i', '1999-12-20', '0908654852', 'blaap@gmail.com', '2020-12-28', '2020-12-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `MaLoai` varchar(10) NOT NULL,
  `Tenloai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`MaLoai`, `Tenloai`) VALUES
('A', 'phong rong'),
('B', '50m vuong'),
('C', '85m vuong'),
('D', 'rong 75m vuong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `photo` text NOT NULL,
  `Maphong` char(10) NOT NULL,
  `Tenphong` varchar(30) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `Soluong` int(11) DEFAULT NULL,
  `MaLoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`photo`, `Maphong`, `Tenphong`, `price`, `Soluong`, `MaLoai`) VALUES
('giuongdon1.jfif', '01', 'phong thuong', 666, 10, 'A'),
('phongdoi.jfif', '0123', 'phong thuons', 123, 1, 'A'),
('room-1.jpg', '022', 'phong don', 86, 3, 'A'),
('rooms-2.jpg', '026', 'phong Ä‘a nÄƒng', 300, 2, 'C'),
('giuongdon3.jfif', '27', 'phong statan', 232, 5, 'B'),
('giuongdoi1.jfif', '29', 'sofm mleme', 1200, 2, 'B');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `fullname` (`fullname`);
ALTER TABLE `account` ADD FULLTEXT KEY `username` (`username`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `chitietdonphong`
--
ALTER TABLE `chitietdonphong`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `Maphong` (`Maphong`),
  ADD KEY `Madonphong` (`Madonphong`);

--
-- Chỉ mục cho bảng `donphong`
--
ALTER TABLE `donphong`
  ADD PRIMARY KEY (`Madonphong`),
  ADD KEY `Madonphong` (`Madonphong`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`Maphong`),
  ADD KEY `MaLoai` (`MaLoai`),
  ADD KEY `Maphong` (`Maphong`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonphong`
--
ALTER TABLE `chitietdonphong`
  MODIFY `STT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonphong`
--
ALTER TABLE `chitietdonphong`
  ADD CONSTRAINT `chitietdonphong_ibfk_1` FOREIGN KEY (`Maphong`) REFERENCES `phong` (`Maphong`),
  ADD CONSTRAINT `chitietdonphong_ibfk_2` FOREIGN KEY (`Madonphong`) REFERENCES `donphong` (`Madonphong`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaiphong` (`MaLoai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
