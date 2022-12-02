-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2022 lúc 10:19 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ihome`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`) VALUES
(8, 'admin', 'admin@gmail.com', 'admin', '1999-04-29', '8979785688');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`cid`, `cname`) VALUES
(2, 'Hà Nội'),
(3, 'Đà Nẵng'),
(4, 'TP Hồ Chí Minh'),
(7, 'Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(7, 'Nguyen Duy', 'vinhduy2201@gmail.com', '0795797593', 'Thảo luận', 'Liên hệ tôi gấp'),
(8, 'Nguyen Duy', 'vinhduy2201@gmail.com', '0795797593', 'liên hệ ngay giúp tôi', 'tôi cần mua nhà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `did` int(50) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`did`, `dname`, `cid`) VALUES
(9, 'Hải Châu', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(9, 28, 'So great!', 1, '2022-10-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `pool` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `direction` varchar(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `parkinglot` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mapimage` varchar(300) NOT NULL,
  `security` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `lat` text NOT NULL,
  `long` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `pool`, `stype`, `bedroom`, `bathroom`, `direction`, `kitchen`, `parkinglot`, `floor`, `size`, `price`, `location`, `district`, `city`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `mapimage`, `security`, `date`, `lat`, `long`) VALUES
(11, 'Dana Diamond City ', 'Dana Diamond City được quy hoạch với quy mô 114.000 m2, với 120 sản phẩm biệt thự vườn, biệt thự view sông, biệt thự phố liền kề và biệt thự sinh thái có diện tích từ 300 m2 – 450 m2.', 'Villa', '2 BHK', 'sale', 1, 2, '3', 4, '5', '3rd Floor', 100, 897898, 'Khu Biệt Thự Đảo Nổi, Cẩm Lệ', 'Cẩm Lệ', 'Đà Nẵng', '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', 15, 'sold out', 'floor1.png', '', '2020-04-03 00:28:14', '', '0'),
(13, 'VINHOMES OCEAN PARK 3 – THE CROWN\n', 'VINHOMES OCEAN PARK 3 – THE CROWN Hưng Yên là siêu dự án “Khu đô thị biển” đẳng cấp 5* quy mô hơn 294 ha, sở hữu đa dạng các loại hình sản phẩm như:  Biệt thự, Liền kề, Shophouse và Căn hộ cao cấp. Dự án được đầu tư đồng bộ các hạng mục công trình từ hệ thống tiện ích và cảnh quan, hệ thống giao thông, các khu vui chơi giải trí và các dịch vụ tiện ích sức khỏe…', 'Chung cư', '2 BHK', 'sale', 3, 2, '2', 1, '1', '4th Floor', 96, 987898, 'Vinhomes Ocean Park 3- The Crown Hưng Yên', 'Nghĩa Trụ, Văn Giang', 'Hà Nội', '111.jpg', '222.jpg', '333.jpg', '444.jpg', '555.jpg', 16, 'available', '', '', '2020-04-03 00:28:14', '', '0'),
(14, 'Da Nang Landmark Tower', 'Landmark Đà Nẵng là tổ hợp căn hộ cao cấp chuẩn Nhật Bản mặt sông Hàn đầu tiên tại Đà Nẵng. Dự án toạ lạc trên đường Bạch Đằng nối dài, giữa Cầu Trần Thị Lý và Cầu Rồng, nằm kế bên và sở hữu tầm nhìn độc quyền xuống Công viên APEC, trước mặt là Cầu Bán Nguyệt đã vào hoạt động. Đây là vị trí có một không hai bên bờ Sông Hàn tại Đà Nẵng - tâm điểm giao thoa lịch sử và thời đại.', 'Penhouse', '3 BHK', 'rent', 3, 2, '2', 1, '1', '2nd Floor', 84, 9878987, 'Hải Châu, Đà Nẵng', 'Hải Châu', 'Đà Nẵng', '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', 15, 'available', '', '', '2020-04-03 00:40:48', '', '0'),
(22, 'The Beverly Solari Vinhomes Grand Park', 'The Beverly Solari Vinhomes Grand Park được lấy cảm hứng từ hình ảnh chim Đại bàng biểu tượng của nước Mỹ hùng mạnh, trí tuệ và oai phong. Đây cũng là biểu tượng của dự án bởi lẽ rất giống với hình thái khu đất tại Phân khu Beverly Solari Vinhomes Quận 9 như một cánh chim Đại Bàng đang vươn mình chinh phục một tầm cao mới. Nơi hứa hẹn sẽ kiến tạo phong cách sống chuẩn “Luxury Sky-Living” không chỉ sống và trải nghiệm mà còn được làm chủ “tầm cao” nơi mọi người luôn khác khao và mơ ước chinh phục.', 'Chung cư', '3 BHK', 'sale', 3, 2, '1', 1, '1', '2nd Floor', 74, 4550467, 'Thủ Đức, TP Hồ Chí Minh', 'TP. Thủ Đức.', 'TP Hồ Chí Minh', '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', 16, 'sold out', 'floor1.png', '2 Floor', '2020-04-04 01:38:36', '', '0'),
(29, 'chết tui mất', '<p>chết tui mất</p>', 'Apartment', 'yes', 'rent', 3, 3, 'east', 3, 'yes', '5', 4000, 350, 'Hẻm 23 Lê Đại 23, Ho Chi Minh City, Ho Chi Minh City, 72012', '', 'TP Hồ Chí Minh', '1.png', '2.png', '3.png', '5.png', '4.png', 28, 'available', '6.png', 'yes', '2022-11-21 15:20:37', '10.78412', '106.62647'),
(30, 'test lần nữa', '<p>test lần nữa</p>', 'penhouse', 'yes', 'rent', 3, 3, 'North', 2, 'no', '4', 4000, 1204883322, '11, La Khê, Hà Đông, Hà Đông, Hanoi 12113, Vietnam', '', 'Hà Nội', '1.png', '3.png', '2.png', '5.png', '4.png', 28, 'available', '6.png', 'yes', '2022-11-21 15:33:03', '20.9607517', '105.7622502'),
(35, 'BGI TOPAZ DOWN TOWN - VIÊN NGỌC MỚI TRONG LÒNG THÀNH PHỐ HUẾ', '<h1 class=\"re__pr-title pr-title js__pr-title\">BGI TOPAZ DOWN TOWN - VI&Ecirc;N NGỌC MỚI TRONG L&Ograve;NG TH&Agrave;NH PHỐ HUẾ</h1>', 'house', 'yes', 'sale', 3, 3, 'Đông', 2, 'yes', '4', 400, 1000000000, 'Đường Hải Triều, Hue, Thua Thien Hue', '', 'Huế', '1.png', '2.png', '3.png', '4.png', '5.png', 28, 'sold out', '6.png', 'yes', '2022-11-29 20:33:06', '16.45348', '107.60827'),
(36, 'BGI - KHỞI ĐẦU MỘT TRUNG TÂM MỚI TẠI THÀNH PHỐ HUẾ', '<p>Với vị tr&iacute; đắc địa, BGI TP sở hữu cho m&igrave;nh những trục giao th&ocirc;ng huyết mạch như Ho&agrave;ng Quốc Việt, V&otilde; Văn Kiệt... Đại lộ &Aacute;nh S&aacute;ng được ra đời để tận dụng tối đa lợi thế đ&oacute;.<br />Với hệ thống 24 căn Shophouse, mặt tiền rộng tối thiểu 7m, đường rộng 26m. Ph&iacute;a b&ecirc;n kia l&agrave; d&ograve;ng s&ocirc;ng Như &Yacute;, v&agrave; c&ocirc;ng vi&ecirc;n trung t&acirc;m.<br />BGI TP định hướng ph&aacute;t triển Đại lộ &Aacute;nh s&aacute;ng sẽ l&agrave; một con phố sầm uất về thương mại dịch vụ, vui chơi giải tr&iacute;. Kết hợp với c&aacute;c tiện &iacute;ch liền kề như Aeon mall, Trường Cao đẳng C&ocirc;ng Nghiệp c&ugrave;ng sự ph&aacute;t tiện v&agrave; mở rộng của Th&agrave;nh Phố Huế. BGI TP kỳ vọng Đại lộ &Aacute;nh S&aacute;ng sẽ l&agrave; một con phố kh&ocirc;ng ngủ trong tương lai.<br />Nhằm đ&oacute;n đầu xu thế v&agrave; nắm bắt cơ hội đầu tư trong tương lai.<br />Qu&yacute; nh&agrave; đầu tư vui l&ograve;ng gặp t&acirc;m tư vấn nhiệt t&igrave;nh.<br />BGI.</p>', 'house', 'no', 'sale', 6, 2, 'Tây', 3, 'yes', '4', 400, 1000000000, 'Kiệt 1 Hoàng Quốc Việt, Hue, Thua Thien Hue', '', 'Huế', '4.png', '2.png', '1.png', '3.png', '6.png', 28, 'available', '', 'yes', '2022-11-29 20:42:25', '16.46106', '107.61118'),
(37, 'testtao', '<p>a</p>', 'Apartment', 'yes', 'sale', 6, 3, 'Đông', 3, 'yes', '4', 400, 1000000000, 'Đường Phan Châu Trinh, Đà Nẵng', '', 'Đà Nẵng', '1.png', '2.png', '3.png', '4.png', '5.png', 28, 'available', '6.png', 'yes', '2022-11-29 20:48:44', '16.06163', '108.21966'),
(38, 'testtao', '<p>test</p>', 'Apartment', 'yes', 'sale', 6, 3, 'Đông', 3, 'yes', '4', 400, 1000000000, 'Đường Phan Châu Trinh, Đà Nẵng', '', 'Đà Nẵng', '1.png', '2.png', '3.png', '4.png', '5.png', 28, 'available', '6.png', 'yes', '2022-11-29 21:05:53', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`) VALUES
(15, 'Duy', 'duy@gmail.com', '9878678678', '@Duy12345678', '', '2.jpg'),
(16, 'Khánh', 'duy@gmail.com', '7976976979', '@Duy12345678', '', '1.jpg'),
(28, 'vinhduy', 'vinhduy2201@gmail.com', '0795797593', '@Duy12345678', '', '2.png'),
(29, 'taikhoanmoi', 'taikhoanmoi@gmail.com', '0795797593', '.Hiimvinhduy1', '', 'ngon.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Chỉ mục cho bảng `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`did`),
  ADD KEY `cid` (`cid`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `uid` (`uid`);

--
-- Chỉ mục cho bảng `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `did` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `city` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
