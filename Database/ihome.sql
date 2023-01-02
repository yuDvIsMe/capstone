-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2023 lúc 07:21 AM
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
  `contact_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL,
  `uid` int(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `phone`, `subject`, `message`, `uid`, `status`) VALUES
(9, 'Lưu Văn Hiền', 'js.luuhien@gmail.com', '0795797593', 'liên hệ ngay giúp tôi', 'Tôi muốn mua nhà ', NULL, '1'),
(10, 'Tôi là Tôi', 'toilatoi@gmail.com', '0999989987', 'Cần gấp', 'liên hệ cho tôi', NULL, '0'),
(11, 'Nguyen Duy', 'vinhduy2201@gmail.com', '0795797593', '300k nếu ai tới vận chuyển', '300k nếu ai tới vận chuyển', NULL, '0'),
(13, 'Nguyen Duy', 'vinhduy2201@gmail.com', '0795797593', 'troi oi', 'troi oi cuu toi', NULL, '0');

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
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `message_id` int(50) NOT NULL,
  `message_subject` varchar(100) NOT NULL,
  `message_content` varchar(250) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` int(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `pid` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`message_id`, `message_subject`, `message_content`, `uid`, `status`, `date`, `pid`) VALUES
(4, 'Cần mua gấp', 'Liên hệ gấp cho tôi', 48, 1, '2022-12-27', NULL),
(8, 'Nhà Đẹp', 'Tôi muốn mua', 28, 0, '2023-01-01', 47);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `new_id` int(20) NOT NULL,
  `uid` int(50) NOT NULL,
  `new_title` varchar(200) NOT NULL,
  `new_content` varchar(2000) NOT NULL,
  `new_type` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pimage` varchar(300) DEFAULT NULL,
  `pimage1` varchar(300) DEFAULT NULL,
  `pimage2` varchar(300) DEFAULT NULL,
  `pimage3` varchar(300) DEFAULT NULL,
  `pimage4` varchar(300) DEFAULT NULL,
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
(47, 'Chung cư Hiyori Đà Nẵng', '<p>Dự &aacute;n Hiyori Garden Tower tọa lạc tr&ecirc;n con đường đắt gi&aacute; V&otilde; Văn Kiệt, c&oacute; giao th&ocirc;ng v&ocirc; c&ugrave;ng thuận tiện. Từ đ&acirc;y cư d&acirc;n kết nối nhanh ch&oacute;ng đến s&acirc;n bay, biển Mỹ Kh&ecirc; v&agrave; phố cổ Hội An th&ocirc;ng qua cầu Rồng.</p>\r\n<p>Để đảm bảo đời sống cho cư d&acirc;n, chủ đầu tư ch&uacute; trọng x&acirc;y dựng hệ thống tiện &iacute;ch nội khu đa dạng như: bể bơi trong nh&agrave; c&oacute; diện t&iacute;ch lớn, ph&ograve;ng tập gym với nhiều trang thiết bị hiện đại, trường mầm non theo ti&ecirc;u chuẩn Nhật Bản, si&ecirc;u thị mini, c&ocirc;ng vi&ecirc;n&hellip;</p>\r\n<p>Tất cả căn hộ ở Hiyori Garden Tower đều được thiết kế cửa sổ, gi&uacute;p ng&ocirc;i nh&agrave; dễ d&agrave;ng đ&oacute;n gi&oacute;, nắng. Ngo&agrave;i ra, điều n&agrave;y c&ograve;n ph&ugrave; hợp với phong thủy g&oacute;p phần mang lại cuộc sống hưng thịnh cho chủ nh&acirc;n.</p>', 'Chung cư', 'yes', 'Bán', 2, 2, 'Tây', 2, 'yes', '28', 200, 1800000000, 'Hẻm 729/85 Võ Văn Kiệt 2, Sơn Trà, Đà Nẵng, 50407', '', 'Đà Nẵng', '5ee717a6187c8383d368c5e8_chung-cu-hiyori-da-nang.jpg', 'hiyori.jpg', 'hiyori1.jpg', 'hiyori2.jpg', '', 28, 'Đã bán', 'hiyori3.jpg', 'yes', '2022-12-16 16:30:31', '16.06026', '108.23828'),
(48, 'Tòa nhà văn phòng Indochina Riverside Tower, Quận Hải Châu', '<p>Nằm ở một vị tr&iacute; đắc địa tr&ecirc;n đường Bạch Đằng, đối diện với s&ocirc;ng H&agrave;n, tại ngay quận trung t&acirc;m thương mại v&agrave; h&agrave;nh ch&iacute;nh của th&agrave;nh phố Đ&agrave; Nẵng, t&ograve;a nh&agrave; c&oacute; 10 tầng cung cấp kh&ocirc;ng gian l&agrave;m việc cao cấp cho c&aacute;c tập đo&agrave;n v&agrave; tổ chức h&agrave;ng đầu trong nước v&agrave; quốc tế.</p>', 'Văn phòng', 'Không', 'Thuê', 1, 3, 'Nam', 1, 'Có', '36', 524, 650000000, 'Đường Bạch Đằng 74, Hải Châu, Đà Nẵng, 50206', '', 'Đà Nẵng', 'indo1.png', 'indo.png', 'indo3.png', 'indo4.png', '', 28, 'Khả dụng', 'indocat.png', 'Có', '2022-12-16 16:50:48', '16.06995', '108.22499'),
(49, 'BIỆT THỰ HUYỀN TRÂN CÔNG CHÚA', '<p>🔥🔥🔥BIỆT THỰ HUYỀN TR&Acirc;N C&Ocirc;NG CH&Uacute;A KẾT NỐI TUYẾN CẦU VƯỢT BẮC S&Ocirc;NG HƯƠNG🔥🔥🔥<br />👉C&aacute;ch đường ch&iacute;nh 100m. Đầy đủ tiện &iacute;ch xung quanh đầy đủ.<br />❤️❤️❤️Cầu Nguyễn Ho&agrave;ng chuẩn bị khởi c&ocirc;ng<br />🚘Đường 5m. &Ocirc; t&ocirc; v&agrave;o tận nh&agrave;. S&acirc;n c&oacute; thể đậu 4 chiếc &ocirc; t&ocirc;.<br />✅DT 160m . Ngang 6,2m<br />✅ Nh&agrave; 2 tầng thiết kế hiện đại. Đầy đủ c&ocirc;ng năng.<br />👍3 ph&ograve;ng ngủ. 2wc kh&eacute;p k&iacute;n. Ph&ograve;ng kh&aacute;ch. Ph&ograve;ng thờ. Gara. S&acirc;n phơi, s&acirc;n vườn rộng r&atilde;i, wife nội thất xịn s&ograve; dọn v&agrave;o ở ngay<br />📕 Sổ hồng ch&iacute;nh chủ, cc san t&ecirc;n ngay<br />💰 Gi&aacute; b&aacute;n: 2 tỷ 7 trăm năm mươi triệu (thương lượng thoải m&aacute;i)</p>', 'Nhà phố', 'Không', 'Bán', 5, 4, 'Đông', 2, 'Có', '2', 550, 1300000000, 'Đường Huyền Trân Công Chúa, Hue, Thua Thien Hue', '', 'Huế', 'hue.jpg', 'hue1.jpg', 'hue2.jpg', 'hue3.jpg', '', 28, 'Khả dụng', 'hue5.jpg', 'Có', '2022-12-16 16:58:48', '16.43819', '107.56177'),
(50, 'Căn hộ Asiana Sài Gòn', '<p>* Tại sao nh&agrave; đầu tư quyết định xuống tiền v&agrave; điểm qua những c&aacute;i nhất tại căn hộ Asiana S&agrave;i g&ograve;n<br />+ Vị tr&iacute; độc t&ocirc;n, biểu tượng mới của khu vực T&acirc;y Bắc, t&acirc;m điểm ti&ecirc;n phong, đ&oacute;n trọn mọi l&agrave;n song ph&aacute;t triển theo quy hoạch tương lai<br />+ Tổ hợp trung t&acirc;m thương mại đ&ecirc;n 4 tầng đầu ti&ecirc;n tại khu vực T&acirc;y Bắc<br />+ Gotec Land đơn vị ph&aacute;t triển bất động sản uy t&iacute;n nhất thị trường l&agrave; Top nh&agrave; ph&aacute;t triển BDS hạng sang tốt nhất, đem lại sự an t&acirc;m khi kh&aacute;ch h&agrave;ng lựa chọn căn hộ tại Asiana S&agrave;i g&ograve;n<br />+ Tiện &iacute;ch ho&agrave;n h&agrave;o , tổ hợp trung t&acirc;m thương mại mặt biển đầu ti&ecirc;n lớn nhất tại khu vực. Bể bơi v&ocirc; cực rộng hơn 250m3 c&oacute; bể bơi cho trẻ em v&agrave; người lớn. Quy m&ocirc; 3 tầng hầm đậu đổ rộng r&atilde;i hơn 9000m2 . Ngo&agrave;i ra c&oacute;n co gym, spa, trường mầm non trong căn hộ , thuận lợi đưa đ&oacute;n, an t&acirc;m cho kh&aacute;ch h&agrave;ng<br />+ Chất lượng c&ocirc;ng tr&igrave;nh ưu việt - thuộc loại 1, sử dụng nguy&ecirc;n vật liệu chất lượng nhất.<br />+ Căn hộ Asiana Đ&agrave; Nẵng tạo sự kh&aacute;c biệt khi thiết kế phong c&aacute;ch &Aacute; &Acirc;u hội</p>', 'Penhouse', 'Có', 'Thuê', 3, 2, 'Tây', 1, 'Có', '12', 400, 27000000, 'Nguyễn Tất Thành 396/137/32, Ho Chi Minh City, Ho Chi Minh City, 72819', '', 'TP Hồ Chí Minh', '2.png', '1.png', '5.png', '6.png', '', 38, 'Khả dụng', 'floor.jpg', 'Có', '2022-12-20 10:44:02', '10.75863', '106.71276'),
(51, 'CHÍNH CHỦ BÁN CHUNG CƯ CẦU GIẤY MIPEC XUÂN THỦY', '<p>Đ&acirc;y l&agrave; dự &aacute;n duy nhất tại trục đường Xu&acirc;n Thủy - Cầu Giấy c&oacute; kh&ocirc;ng gian ph&iacute;a trước gồm trường học - trung t&acirc;m thương mại v&agrave; liền kề ngay c&aacute;c trường Đại học lớn như ĐH Quốc Gia, học viện B&aacute;o Ch&iacute;.</p>', 'Chung cư', 'Không', 'Bán', 2, 2, 'Nam', 1, 'Có', '27', 80, 123456789, 'Đường Xuân Thủy 12, Hanoi, Hanoi, 11310', '', 'Hà Nội', 'xuanthuy1.jpg', 'xuathuy2.jpg', 'xuanthuy3.jpg', 'xuanthuy4.jpg', '', 38, 'Khả dụng', 'floors-image.jpg', 'Có', '2022-12-20 10:54:11', '21.03657', '105.78904'),
(52, 'CĂN HỘ THỦ ĐỨC, NHẬN NHÀ NGAY', '<p>B&agrave;n giao thiết bị smarthome - điện quang, phần bếp c&oacute; sặn m&aacute;y h&uacute;t m&ugrave;i, bếp điện v&agrave; l&ograve; vi s&oacute;ng</p>\r\n<p>Thanh to&aacute;n 95%, c&ograve;n 5% khi n&agrave;o nhận sổ thanh to&aacute;n tiếp.</p>', 'Nhà phố', 'Có', 'Bán', 1, 2, 'Đông', 1, 'Không', '2', 400, 1500000000, 'Thủ Đức District', '', 'TP Hồ Chí Minh', 'db7a200e-c6be-4e39-b996-e7a1a8639b63.jpg', '', 'thuduc1.jpg', '', 'thuduc.jpg', 44, 'Khả dụng', 'basement.jpg', 'Có', '2022-12-20 12:45:22', '10.82024574', '106.78951263'),
(53, 'Cho Thuê Văn Phòng Làm Việc - An Cựu City - 5 Triệu/Tháng', '<p>Văn ph&ograve;ng gần 30m2 c&oacute; wc, điều ho&agrave;, b&agrave;n ghế l&agrave;m việc.<br />Ph&ograve;ng rất th&iacute;ch hợp cho c&aacute;c nh&oacute;m l&agrave;m việc, cty dịch vụ&hellip;<br />Gi&aacute; thu&ecirc;: 5Tr/th&aacute;ng, thanh to&aacute;n 06 th&aacute;ng/lần, cọc 2 th&aacute;ng</p>', 'Văn phòng', 'Không', 'Thuê', 0, 1, 'Tây', 0, 'Có', '1', 30, 5000000, 'Kiệt 1 Hoàng Quốc Việt, Hue, Thua Thien Hue', '', 'Huế', 'vanphong.jpg', 'vanphong2.jpg', 'vanphong3.jpg', 'vanphong1.jpg', 'vanphong4.jpg', 44, 'Khả dụng', 'vanphong6.jpg', 'Có', '2022-12-20 12:53:33', '16.46106', '107.61118');

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
  `uimage` varchar(300) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `uimage`, `role`) VALUES
(16, 'Khánh', 'duy@gmail.com', '7976976979', '1bb!XR6wh.9@,k45', '1.jpg', 'user'),
(28, 'vinhduy', 'vinhduy2201@gmail.com', '0795797593', 'c76b17f5716389c14abc7928355642c8', '2.png', 'user'),
(30, 'Lưu Văn Hiền', 'js.luuhien@gmail.com', '0779500029', '53a9018a91f956533526b000233a6746', 'logo.png', 'user'),
(35, 'Trần Khánh', 'khanh1234bln@gmail.com', '0123456789', 'uwV-o7PCd9;5.1jI', '6.png', 'user'),
(36, 'Nguyen Duy', 'admin@gmail.com', '0795797593', 'c76b17f5716389c14abc7928355642c8', '6.jpg', 'admin'),
(38, 'Nguyễn Thị Thu Thu', 'nguyenthithu1@gmail.com', '0987678898', 'c76b17f5716389c14abc7928355642c8', '2.png', 'user'),
(43, 'Nguyễn Thúy Loan', 'thuyloan123@gmail.com', '0987654456', 'l7a3@b4V_F29?C3', '310860213_3193276364267226_676148581037659449_n.png', 'user'),
(44, 'Lê Thanh Hùng', 'thanhhung1999@gmail.com', '0976555234', 'c76b17f5716389c14abc7928355642c8', 'ngon.jpg', 'user'),
(45, 'Trần Đình Khánh', 'trandinhkhanh@gmail.com', '0999988877', 'c76b17f5716389c14abc7928355642c8', 'REEW-ModelView.drawio.png', 'user'),
(48, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '0999888777', 'c76b17f5716389c14abc7928355642c8', NULL, 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

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
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `uid` (`uid`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `uid` (`uid`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT cho bảng `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `property` (`pid`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Các ràng buộc cho bảng `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
