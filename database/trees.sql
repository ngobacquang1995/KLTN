-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 07 Juin 2019 à 09:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `trees`
--

-- --------------------------------------------------------

--
-- Structure de la table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã banner',
  `Name` varchar(150) NOT NULL,
  `Image` varchar(150) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `banner`
--

INSERT INTO `banner` (`ID`, `Name`, `Image`, `Description`) VALUES
(1, 'Ý nghĩa hoa đá', 'banner-y-nghia-hoa-da.jpg', 'Hoa đá mang ý nghĩa về một tình yêu bền vững, một tình yêu trọn đời, mãi mãi, không thay đổi theo thời gian. Đúng như sức sống mãnh liệt của cây.'),
(2, 'Cây văn phòng', 'banner-cay-van-phong.jpg', 'Cây cảnh để văn phòng là điểm nhấn giúp không gian đẹp hơn, bớt nhàm chán và tươi mát. Hơn nữa, nó còn có công dụng đối với sức khỏe con người về cả tinh thần lẫn thể chất.');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `User_ID` int(11) NOT NULL,
  `Tree_ID` varchar(150) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(255) NOT NULL,
  `Thumbnail` varchar(155) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`ID`, `Category_name`, `Thumbnail`) VALUES
(1, 'Cây văn phòng', 'cay-canh-van-phong-255x255.jpg'),
(2, 'Sen đá', 'cay-sen-da-255x255.jpg'),
(3, 'Hoa', 'hoa-cat-tuong-3-300x300.jpg'),
(4, 'Xương rồng', 'xuong-rong-255x255.jpg'),
(5, 'Cây công trình', 'category-cay-cong-trinh.jpg'),
(6, 'Cây thủy sinh', 'cay-thuy-sinh-255x255.jpg'),
(7, 'Cây phong thủy', 'cay-canh-phong-thuy-255x255.jpg'),
(8, 'Tiểu cảnh', 'category-tieu-canh.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) NOT NULL,
  `User_name` varchar(150) NOT NULL,
  `User_pass` varchar(150) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Avarta` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `managers`
--

INSERT INTO `managers` (`ID`, `Name`, `User_name`, `User_pass`, `Address`, `Phone`, `Email`, `Avarta`) VALUES
(1, 'Ngô Bắc Quang', 'quang', '202cb962ac59075b964b07152d234b70', 'Trâu Quỳ, Gia Lâm', 1234562345, 'ngobacquang1@gmail.com', 'avarta-quang.jpg'),
(2, 'Bùi Đình Linh', 'linh', '202cb962ac59075b964b07152d234b70', 'Hưng Yên', 351684234, 'linh@gmail.com', 'avarta-linh.jpg'),
(4, 'Nguyễn Văn Thịnh', 'thinh', '202cb962ac59075b964b07152d234b70', 'Thái Hà', 2147483333, 'thinh@gmail.com', ''),
(17, 'Bùi Thị Tuyết', 'tuyet', '202cb962ac59075b964b07152d234b70', 'Trâu Quỳ, Gia Lâm 2', 2147483647, 'tuyet@gmail.com', 'avarta-linh.jpg'),
(18, 'Ngo Bac Quang', 'admin', '202cb962ac59075b964b07152d234b70', 'Trau Quy', 1325462125, 'quang@gmail.com', 'avarta-quang.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Total_money` decimal(10,0) NOT NULL,
  `Payment` varchar(155) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Contenu de la table `order`
--

INSERT INTO `order` (`ID`, `User_ID`, `Manager_ID`, `Date`, `Total_money`, `Payment`, `Status`, `note`) VALUES
(69, 3, 2, '2019-05-11', '570000', 'Thanh toán khi giao hàng', 'Hoàn thành', 'gửi cho Quang'),
(72, 4, 0, '2019-05-31', '360000', 'thanh toán khi giao hàng', 'Chờ xét duyệt', ''),
(73, 4, 0, '2019-06-01', '117000', 'thanh toán khi giao hàng', 'Chờ xét duyệt', 'abc'),
(74, 3, 1, '2019-06-01', '52850000', 'Thanh toán khi giao hàng', 'Hoàn thành', 'Giao hang cho abc');

-- --------------------------------------------------------

--
-- Structure de la table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `Order_ID` int(11) NOT NULL,
  `Tree_ID` varchar(150) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Sum_money` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `order_detail`
--

INSERT INTO `order_detail` (`Order_ID`, `Tree_ID`, `Amount`, `Price`, `Sum_money`) VALUES
(69, 'TS01', 3, 190000, '570000'),
(72, 'PT02', 2, 180000, '360000'),
(73, 'SD03', 3, 39000, '117000'),
(74, 'SD01', 100, 28500, '2850000'),
(74, 'XR01', 1000, 50000, '50000000');

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Permiss` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `permission`
--

INSERT INTO `permission` (`ID`, `User_ID`, `Permiss`) VALUES
(1, 1, 1),
(2, 2, 0),
(4, 4, 0),
(14, 17, 0),
(15, 18, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) NOT NULL,
  `Image` varchar(150) NOT NULL,
  `Infor` text NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`ID`, `Name`, `Image`, `Infor`, `Description`, `Date`) VALUES
(1, 'Hoa oải hương', 'nhung-cay-hoa-trong-trong-nha-tang-tham-my-cho-ngoi-nha.jpg', 'Cây hoa đầu tiên bạn có thể trồng trong nhà đó là Hoa Oải Hương. Hoa Oải Hương nhỏ nhắn xinh xắn không mất nhiều diện tích, phù hợp với những ngôi nhà có diện tích trung bình. Những bông Hoa Oải Hương có mùi thơm nhẹ tốt cho khứu giác của mỗi người.', 'Tiếp tục khuyến mại, giảm giá cho các loại hoa để trong nhà. Cây hoa đầu tiên bạn có thể trồng trong nhà đó là Hoa Oải Hương. Hoa Oải Hương nhỏ nhắn xinh xắn không mất nhiều diện tích, phù hợp với những ngôi nhà có diện tích trung bình. Những bông Hoa Oải', '2019-04-08'),
(2, 'Bạn đang tìm kiếm đối tác.', 'partner-img.jpg', 'Hãy đến và trải nghiệm tại cửa hàng cây cảnh của chúng tôi, không chỉ mang lại cho bạn nhiều trải nghiệm mới với những chất lượng dịch vụ tốt nhất. Cửa hàng chúng tôi còn thường xuyên có những chương trình khuyến mại dành riêng cho bạn.', 'Nơi những trải nghiệm thú vị bắt đầu.Nơi những trải nghiệm thú vị bắt đầu.Nơi những trải nghiệm thú vị bắt đầu.Nơi những trải nghiệm thú vị bắt đầu.', '2019-04-02'),
(3, 'Cây văn phòng', 'cay-bach-tuyet-mai-5-600x417.jpg', 'Cây bạch tuyết mai với dáng nhỏ nhắn, dễ tạo dáng bonsai hay trồng chậu nội thất văn phòng làm cảnh đều rất đẹp.', 'Các loại cây văn phòng, cây để bàn cửa hàng đang có chương trình xả kho các loại cây này, nhanh tay lựa chọn cho mình chậu cảnh để bàn nào.', '2019-04-05'),
(4, 'Cách chăm sóc cây trong nhà', 'cach-cham-soc-cay-canh-trong-nha-768x576.jpg', 'Ánh sáng khi chăm sóc cây cảnh trong nhà\r\nĐể chăm sóc cây cảnh trong nhà, yếu tố đầu tiên bạn cần lưu ý đó là ánh sáng. Vậy ánh sáng nào phù hợp để cây phát triển. Tùy từng đặc điểm của mỗi loại cây sẽ có lượng ánh sáng khác nhau. Có những loại cây cảnh chịu được ánh sáng thấp, nhưng có những cây cảnh cần ánh sáng tự nhiên mới phát triển được.\r\n\r\nTuy nhiên dù là những cây có khả năng chịu ánh sáng thấp thì vẫn phải đảm bảo đầy đủ ánh sáng cho cây phát triển. Nếu bạn đặt cây cảnh trong phòng khách, bạn nên đảm bảo đặt cây ở vị trí có khoảng 2 – 3 giờ có ánh sáng tự nhiên trong phòng. Hoặc bạn nên đặt cây phơi nắng 2 – 3 giờ mỗi tuần để cây phát triển tự nhiên.', 'Cây cảnh đặt trong nhà sẽ có cách chăm sóc khác với cây cảnh đặt ngoài trời hay trồng ở vườn. Bởi các yếu tố như ánh sáng, độ ẩm sẽ khác nhau, vì vậy việc chăm sóc cũng sẽ cầu kỳ hơn. Trong bài viết này, chúng tôi sẽ chia sẻ tới các bạn cách chăm sóc cây ', '2019-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `ID_receipt` int(11) NOT NULL AUTO_INCREMENT,
  `Sum_money` decimal(10,0) NOT NULL,
  `Date` date NOT NULL,
  `Manager_ID` varchar(150) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_receipt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `receipt`
--

INSERT INTO `receipt` (`ID_receipt`, `Sum_money`, `Date`, `Manager_ID`, `Supplier_ID`) VALUES
(2, '24150000', '2019-05-02', '2', 2),
(6, '1100000', '2019-05-09', '2', 2),
(7, '675360', '2019-05-11', '1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `receipt_detail`
--

CREATE TABLE IF NOT EXISTS `receipt_detail` (
  `Receipt_ID` int(11) NOT NULL,
  `Tree_ID` varchar(150) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Total_money` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `receipt_detail`
--

INSERT INTO `receipt_detail` (`Receipt_ID`, `Tree_ID`, `Amount`, `Price`, `Total_money`) VALUES
(2, 'TN01', 80, '250000.00', '20000000.00'),
(2, 'TS002', 50, '3000.00', '150000.00'),
(6, 'TS01', 20, '40000.00', '800000.00'),
(7, 'TN01', 2000, '300.00', '600000.00'),
(7, 'XR01', 32, '2355.00', '75360.00'),
(2, 'PT02', 150, '100000.00', '15000000.00'),
(2, 'PT01', 90, '100000.00', '9000000.00');

-- --------------------------------------------------------

--
-- Structure de la table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `ID_Supplier` int(11) NOT NULL AUTO_INCREMENT,
  `Supplier_name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_Supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `supplier`
--

INSERT INTO `supplier` (`ID_Supplier`, `Supplier_name`, `Address`, `Phone`, `Email`) VALUES
(1, 'Công ty TNHH Mây Xanh', 'Số 18 Thái Hà', 324635948, 'mayxanhcompany.@gmail.com'),
(2, 'Công ty Sân Vườn Hà Nội', '25 Yên Lãng', 684923312, 'sanvuonhan@gmail.com'),
(3, 'CTY xuất nhập khẩu giống Hàn Quốc', 'Núi TRúc', 2147483647, 'xuatnhapkhauhan@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `tree`
--

CREATE TABLE IF NOT EXISTS `tree` (
  `ID` varchar(150) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Tree_name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Infor` text NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `sale` int(11) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tree`
--

INSERT INTO `tree` (`ID`, `Category_ID`, `Tree_name`, `Image`, `Infor`, `Amount`, `Price`, `sale`, `Description`) VALUES
('PT01', 7, 'Cây trường sinh', 'cay-truong-sinh-01.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">Qua t&ecirc;n gọi&nbsp;</span><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial; color: #52403c; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y Trường Sinh</strong><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">&nbsp;ch&uacute;ng ta cũng đ&atilde; biết được n&oacute; l&agrave; loại c&acirc;y c&oacute; sức sống m&atilde;nh liệt, xanh tốt quanh năm, c&acirc;y kh&ocirc;ng chịu được nắng gắt ưa nơi m&aacute;t, c&oacute; &aacute;nh nắng nhẹ, ch&iacute;nh v&igrave; vậy c&acirc;y Trường Sinh rất th&iacute;ch hợp l&agrave;m c&acirc;y cảnh trong nh&agrave;, c&acirc;y cảnh để b&agrave;n l&agrave;m việc. C&acirc;y c&oacute; t&aacute;c dụng l&agrave;m sạch kh&ocirc;ng kh&iacute;, h&uacute;t c&aacute;c bụi bẩn v&agrave; hấp thụ c&aacute;c chất độc hại như: Formandehit, cacbondioxit&hellip;Trong phong thủy c&acirc;y mang đến sức khỏe, tiền t&agrave;i, may mắn cho gia chủ. C&acirc;y Trường Sinh đại diện cho mệnh Mộc, điều n&agrave;y c&oacute; nghĩa nếu bạn l&agrave; người mệnh Hỏa hoặc mệnh Mộc sẽ rất th&iacute;ch hợp với loại c&acirc;y n&agrave;y, n&oacute; sẽ mang đến cho gia đ&igrave;nh bạn nhiều điều tốt đẹp.</span></p>\r\n<p>&nbsp; <img src="upload/cay-truong-sinh-03.jpg" /></p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">ĐẶC ĐIỂM CỦA C&Acirc;Y TRƯỜNG SINH</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-truong-sinh/"><em style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">C&acirc;y Trường Sinh</strong></em></a>&nbsp;c&oacute; t&ecirc;n khoa học&nbsp;Peperomia obtusifolia/ Kalanchoe pinnata (Lam) Pers, thuộc họ Thuốc bỏng &ndash; Crassulaceae. C&acirc;y c&ograve;n biết đến với c&aacute;c t&ecirc;n gọi kh&aacute;c như: L&aacute; B&ocirc;ng, c&acirc;y Bỏng, Đả Bất Tử, Diệp Sinh Căn,&nbsp;Thi&ecirc;n cảnh, Thi&ecirc;n cảnh tạp giao&hellip;C&acirc;y thuộc loại th&acirc;n thảo n&ecirc;n chỉ cao từ 10 &ndash; 40 cm.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Th&acirc;n c&acirc;y nhẵn b&oacute;ng, tr&ograve;n, mọng nước. L&aacute; C&acirc;y Trường Sinh c&oacute; m&agrave;u xanh lục đậm, b&oacute;ng, với h&igrave;nh hơi bầu về ph&iacute;a cộng l&aacute;. L&aacute; mọc từ gốc hoặc th&acirc;n, mọc đối xứng, xum xu&ecirc;. C&acirc;y Trường Sinh cũng c&oacute; hoa m&agrave;u trắng tuy kh&ocirc;ng to nhưng dạng chuỗi thời gian hoa nở k&eacute;o d&agrave;i từ th&aacute;ng 12 đến th&aacute;ng 4 năm sau n&ecirc;n c&aacute;i t&ecirc;n Trường Sinh c&agrave;ng ph&ugrave; hợp.</p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">C&Aacute;CH CHĂM S&Oacute;C C&Acirc;Y TRƯỜNG SINH</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">C&acirc;y Trường Sinh</strong>&nbsp;rất dễ sống v&agrave; n&oacute; cũng kh&ocirc;ng đ&ograve;i hỏi nhiều v&agrave; cầu kỳ về đất trồng, c&aacute;ch chăm s&oacute;c, nhưng điều kiện l&yacute; tưởng để n&oacute; ph&aacute;t triển l&agrave; g&igrave;? Ch&uacute;ng ta cũng nghi&ecirc;m cứu c&aacute;c yếu tố dưới đ&acirc;y.</p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff;">ĐẤT TRỒNG</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Bạn c&oacute; thể trồng đất thịt n&oacute; vẫn sống nhưng để c&acirc;y Trường Sinh ph&aacute;t triển tốt ch&uacute;ng ta cần loại đất c&oacute; độ m&ugrave;n cao, đất tho&aacute;ng, độ ẩm trung b&igrave;nh, chất đất hơi chua để l&aacute; xanh để c&oacute; loại đất n&agrave;y th&igrave; ta n&ecirc;n trộn đất với c&aacute;c th&agrave;nh phần như: Trấu, trấu hun, sơ dừa, ph&acirc;n chuồng, đ&aacute; perlite&hellip;</p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff;">NƯỚC</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">C&acirc;y thuộc loại l&aacute; bỏng mọng nước c&oacute; thể t&iacute;ch trữ nước ở th&acirc;n v&agrave; l&aacute;, ch&iacute;nh v&igrave; vậy nếu bạn để trong văn ph&ograve;ng chỉ cần 1 tuần tưới 1 lần, để ngo&agrave;i trời th&igrave; 1 tuần tưới 2 lần t&ugrave;y v&agrave;o điều kiện thời tiết, mỗi lần tưới đủ ẩm đất kh&ocirc;ng tưới nhiều. Kh&ocirc;ng tưới nhiều để đất ẩm l&acirc;u ng&agrave;y dễ dẫn tới t&igrave;nh trạng &uacute;ng, thối rễ v&agrave; v&agrave;ng l&aacute;.</p>', 180, '145000', 0, 'Cây Trường Sinh có tác dụng làm sạch không khí, hút các bụi bẩn và hấp thụ các chất độc hại như: Formandehit, cacbondioxit...Trong phong thủy cây mang đến sức khỏe, tiền tài, may mắn cho gia chủ. Phù hợp làm cây để bàn làm việc, phòng khách, quầy lễ tân, quà tặng...'),
('PT02', 7, 'Cây phú quý', 'cay-phu-quy-01.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y Ph&uacute; Qu&yacute; c&oacute; t&ecirc;n khoa học&nbsp;l&agrave; Aglaonema hybrid, c&oacute; nguồn gốc từ Indonesia. C&acirc;y Ph&uacute; Qu&yacute; l&agrave; loại c&acirc;y được lai tạo bởi nh&agrave; thực vật học&nbsp;Gregori v&agrave;o năm 1982, &ocirc;ng đ&atilde; chuyển đổi n&oacute; từ sắc xanh sang đỏ hồng để cho lo&agrave;i c&acirc;y n&agrave;y rực rỡ hơn. Ngo&agrave;i t&aacute;c dụng l&agrave;m c&acirc;y trang tr&iacute; v&igrave; m&agrave;u sắc&nbsp;kh&aacute; nổi bật.&nbsp;</span><em style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y Ph&uacute; Qu&yacute;</em><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">&nbsp;c&ograve;n c&oacute; t&aacute;c dụng lọc sạch kh&ocirc;ng kh&iacute;, giảm bớt kh&oacute;i bụi, hấp thụ chất hữu cơ dễ bay hơi g&acirc;y bệnh. C&acirc;y c&oacute; &yacute; nghĩa phong thủy mang đến cho gia chủ sự may mắn, gi&agrave;u sang v&agrave; ph&uacute; qu&yacute; cho gia chủ đ&uacute;ng với t&ecirc;n gọi của loại c&acirc;y n&agrave;y.</span></p>\r\n<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;"><img src="upload/cay-phu-quy-02.jpg" alt="" /></span></p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">ĐẶC ĐIỂM CỦA C&Acirc;Y PH&Uacute; QU&Yacute;</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Mặc d&ugrave; đ&atilde; được lai tạo nhưng&nbsp;<strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;"><a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-phu-quy/">c&acirc;y Ph&uacute; Qu&yacute;</a></strong>&nbsp;vẫn giữ đặc t&iacute;nh của chi&nbsp;Aglaonema l&agrave; thực vật trong họ R&aacute;y (Araceae). C&acirc;y c&oacute; rễ ch&ugrave;m, th&acirc;n được tạo th&agrave;nh bằng những bẹ l&aacute;, cuống l&aacute; c&oacute; m&agrave;u trắng hồng. L&aacute; Ph&uacute; Qu&yacute; mỏng mền, viền l&aacute; c&oacute; m&agrave;u hồng đỏ, b&ecirc;n trong c&oacute; m&agrave;u đậm. C&acirc;y rất dễ sống v&agrave; chăm s&oacute;c c&oacute; thể trồng đất hoặc thủy sinh. C&acirc;y Ph&uacute; Qu&yacute; đến m&ugrave;a cũng c&oacute; thể ra hoa, tuy nhi&ecirc;n phải d&ugrave;ng chất k&iacute;ch th&iacute;ch hoặc m&ocirc;i trường đủ nắng th&igrave; c&acirc;y mới c&oacute; thể ra hoa, nhưng thường c&acirc;y lại được trồng v&agrave; chăm s&oacute;c trong m&ocirc;i trường m&aacute;t v&agrave; kh&ocirc;ng c&oacute; chất k&iacute;ch th&iacute;ch ra hoa n&ecirc;n mọi người rất &iacute;t khi thấy hoa của lo&agrave;i c&acirc;y n&agrave;y.</p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff; text-align: justify;">C&Aacute;CH CHĂM S&Oacute;C C&Acirc;Y PH&Uacute; QU&Yacute;</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Thuộc loại trong loại&nbsp;<a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-canh-trong-nha/" target="_blank" rel="noopener">c&acirc;y cảnh trong nh&agrave;</a>&nbsp;n&ecirc;n c&acirc;y rất dễ sống v&agrave; chăm s&oacute;c, chỉ cần lưu &yacute; một ch&uacute;t l&agrave; kh&ocirc;ng bao giờ sợ lo&agrave;i c&acirc;y n&agrave;y chết.</p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff;">&Aacute;NH S&Aacute;NG</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">L&agrave; c&acirc;y ưa b&oacute;ng m&aacute;t, c&acirc;y Ph&uacute; Qu&yacute; c&oacute; thể sống được trong m&ocirc;i trường &iacute;t &aacute;nh s&aacute;ng, chỉ c&oacute; &aacute;nh s&aacute;ng điện huỳnh quang th&ocirc;i, n&oacute; cũng c&oacute; thể sinh trưởng v&agrave; ph&aacute;t triển, tuy nhi&ecirc;n để l&aacute; l&ecirc;n mầu đẹp th&igrave; bạn n&ecirc;n để c&acirc;y ở nơi c&oacute; &aacute;nh s&aacute;ng buổi sớm v&agrave; chiều muộn, tr&aacute;nh &aacute;nh nắng buổi trưa m&ugrave;a h&egrave; c&oacute; nhiệt độ cao sẽ khiến l&aacute; bị ch&aacute;y nh&igrave;n sẽ kh&ocirc;ng được đẹp.</p>', 300, '180000', 0, 'Cây Phú Quý có ý nghĩa phong thủy mang đến cho gia chủ sự may mắn, giàu sang và phú quý. Cây phù hợp để trang trí quán cà phê, góc nhỏ, sảnh, khách sạn...'),
('SD01', 2, 'Sen đá hồng phấn', 'sen-da-hong-phan-03.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">Sen đ&aacute; hồng phấn l&agrave; loại sen đ&aacute; nh&igrave;n kh&aacute;c giống sen đ&aacute; đất về h&igrave;nh d&aacute;ng nhưng n&oacute; c&oacute; m&agrave;u xanh xẫm hơn v&agrave; tr&ecirc;n viền l&aacute; c&oacute; m&agrave;u kh&ocirc;ng, tr&ecirc;n l&aacute; th&igrave; c&oacute; một lớp phấn trắng mỏng c&oacute; lẽ ch&iacute;nh v&igrave; điều n&agrave;y m&agrave; n&oacute; c&oacute; t&ecirc;n gọi l&agrave; hồng phấn. Sen đ&aacute; hồng phấn c&oacute; &yacute; nghĩa cho một t&igrave;nh y&ecirc;u, t&igrave;nh bạn bền vững theo thời gian.</span></p>\r\n<p class="img"><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;"><img src="admin/upload/sen-da-hong-phan-02.jpg" alt="" /></span></p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">ĐẶC ĐIỂM CỦA SEN Đ&Aacute; HỒNG PHẤN</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;"><a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/sen-da-hong-phan/">Sen đ&aacute; hồng phấn</a></strong>&nbsp;l&agrave; loại c&acirc;y thuộc họ bỏng ( Crassualaceae ), c&oacute; nguồn gốc từ Mexico đến t&acirc;y bắc Nam Mỹ. C&acirc;y c&oacute; l&aacute; xếp quanh trục rất giống h&igrave;nh b&ocirc;ng hoa, l&aacute; c&oacute; m&agrave;u xanh được phủ l&ecirc;n m&igrave;nh một lớp phấn trắng viền l&aacute; c&oacute; m&agrave;u hồng.</p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">C&Aacute;CH CHĂM S&Oacute;C SEN Đ&Aacute;&nbsp;HỒNG PHẤN</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Ở ngo&agrave;i bắc th&igrave; sen đ&aacute; chưa được nhiều nhưng khả năng th&iacute;ch nghi cũng như m&ocirc;i trường ph&aacute;t triển của n&oacute; kh&ocirc;ng y&ecirc;u cầu cao. Nhưng để&nbsp;<em style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none;">sen đ&aacute; hồng&nbsp;phấn</em>&nbsp;ph&aacute;t triểu tốt nhất th&igrave; bạn c&oacute; thể ch&uacute; &yacute; 1 số đặc điểm sau.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">&Aacute;NH S&Aacute;NG</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Hầu như tất cả sen đ&aacute; đều cần rất nhiều &aacute;nh s&aacute;ng để ph&aacute;t triển, c&oacute; thể để nắng trực tiếp, tốt nhất l&agrave; che dưới gi&agrave;n che 30%.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Trường hợp đặt trong văn ph&ograve;ng hoặc nơi &iacute;t nắng, th&igrave; 2 ng&agrave;y n&ecirc;n mang ra phơi nắng 1 lần (tầm 4-5 tiếng đồng hồ). Đặt trong m&aacute;t l&acirc;u ng&agrave;y sẽ c&oacute; hiện tượng l&aacute; mềm ra, thưa v&agrave; mỏng, n&ecirc;n ch&uacute; &yacute; cung cấp &aacute;nh s&aacute;ng đầy đủ cho c&acirc;y. C&acirc;y c&oacute; m&agrave;u sắc tưới hay kh&ocirc;ng phụ thuộc v&agrave;o &aacute;nh s&aacute;ng</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">NƯỚC TƯỚI</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Nước m&aacute;y th&ocirc;ng thường. T&ugrave;y v&agrave;o thời tiết, m&ocirc;i trường v&agrave; đất trồng kh&aacute;c nhau m&agrave; ta tưới nước cho th&iacute;ch hợp, việc n&agrave;y đ&ograve;i hỏi một &iacute;t kinh nghiệm. Nhưng c&oacute; thể t&oacute;m gọn như sau:</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Đặt nơi ngo&agrave;i &aacute;nh s&aacute;ng trực tiếp hoặc che lưới: 4 &ndash; 6 ng&agrave;y tưới nước 1 lần.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Đặt trong văn ph&ograve;ng: 1 tuần tưới 1 lần.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Lượng nước tưới nhiều hay &iacute;t t&ugrave;y thuộc v&agrave;o loại chất trồng của&nbsp;<strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">sen đ&aacute; hồng phấn</strong>, v&iacute; dụ c&aacute;c loại đất tro trấu pha c&aacute;t tho&aacute;t nước nhanh th&igrave; thậm ch&iacute; 2&nbsp;ng&agrave;y tưới 1&nbsp;lần vẫn được. C&aacute;c loại đất thịt như đất đỏ, đất m&ugrave;n giữ nước tốt, c&oacute; thể 1,5&nbsp;tuần&nbsp;mới&nbsp;tưới 1 lần.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Cầm chậu l&ecirc;n, tưới nước v&agrave;o đến khi n&agrave;o nặng hơn 1/2 so với ban đầu l&agrave; đủ.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">NHIỆT ĐỘ</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">Sen đ&aacute; hồng phấn</strong>&nbsp;l&agrave; loại ưa nắng, tuy nhi&ecirc;n c&oacute; thể ph&aacute;t triển tốt ở khoảng nhiệt độ từ 15-35*C.&nbsp;Độ ẩm trong khoảng 30-70%&nbsp;<a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-canh-sen-da/">sen đ&aacute;</a>&nbsp;đều ph&aacute;t triển tốt.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">PH&Acirc;N B&Oacute;N</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Bạn c&oacute; thể bổ sung cho c&acirc;y ph&acirc;n b&ograve;, ph&acirc;n d&ecirc; hoặc c&aacute;c loại ph&acirc;n tan chậm, ph&acirc;n b&oacute;n qua l&aacute; h&agrave;ng th&aacute;ng. Để c&acirc;y sinh trưởng v&agrave; ph&aacute;t triển tốt, mỗi năm n&ecirc;n thay đất cho c&acirc;y từ 1-2 lần.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">S&Acirc;U BỆNH G&Acirc;Y HẠI</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Sen đ&aacute; hồng phấn&nbsp;tương đối &iacute;t s&acirc;u bệnh. C&aacute;c bệnh thường gặp l&agrave; rệp s&aacute;p, đốm l&aacute;&hellip; (c&oacute; thể ra c&aacute;c cửa hiệu thuốc bảo vệ thực vật mua thuốc về xịt). Thối nhũng do &uacute;ng nước hoặc nhiễm tr&ugrave;ng vết thương.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">C&aacute;c bạn h&atilde;y ch&uacute; &yacute; tới nước v&agrave; &aacute;nh s&aacute;ng hai yếu tố n&agrave;y rất quan trọng đối với sen đ&aacute; hồng phấn</p>', 96, '30000', 5, 'Sen đá hồng phấn có ý nghĩa cho một tình yêu và tình bạn bền vững mãi theo thời gian. Cây phù hợp để làm quà tặng, để bàn làm việc, trang trí quán cà phê, góc học tập...'),
('SD02', 2, 'Sen đá lá thơm', 'nhat-mat-huong-01.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">Sen đ&aacute; L&aacute; Thơm hay c&ograve;n t&ecirc;n gọi l&agrave; c&acirc;y Nhất Mạt Hương &nbsp;l&agrave; loại c&acirc;y c&oacute; một m&ugrave;i hương dễ chịu, một m&ugrave;i hương bạc h&agrave; thoang thoảng. Chỉ cần lại gần c&acirc;y sen n&agrave;y v&agrave; h&iacute;t một hơi bạn sẽ thấy dễ chịu v&agrave; c&oacute; thể lấy lại hưng phấn l&agrave;m việc, ngo&agrave;i ra c&acirc;y c&ograve;n c&oacute; t&aacute;c dụng đuổi muỗi. Loại c&acirc;y sen đ&aacute; L&aacute; Thơm n&agrave;y rất th&iacute;ch hợp để b&agrave;n học v&agrave; b&agrave;n l&agrave;m việc&hellip;</span><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial; color: #52403c; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y Nhất Mạt Hương</strong><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">&nbsp;c&ograve;n được cho l&agrave; c&oacute; t&aacute;c dụng gi&uacute;p người trồng chi ti&ecirc;u hợp l&yacute;, kh&ocirc;ng mất m&aacute;t t&agrave;i ch&iacute;nh.</span></p>', 150, '40000', 2, 'Sen đá Lá Thơm hay còn tên gọi là cây Nhất Mạt Hương là loại cây trên lá có một mùi hương nhẹ, bạn chỉ cần chạm tay và lá hoặc lại gần cây và hít một hơi, bạn sẽ thấy thoải mái và dễ chịu.'),
('SD03', 2, 'Sen đá dạ quang', 'sen-da-da-quang-01.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">Sedum dạ quang thuộc d&ograve;ng sedum l&agrave;&nbsp;d&ograve;ng bao gồm những c&acirc;y c&oacute; h&igrave;nh d&aacute;ng nhỏ x&iacute;u v&agrave; cực kỳ đ&aacute;ng y&ecirc;u. D&ograve;ng sedum cũng thuộc họ sen đ&aacute;, c&acirc;y mọc th&agrave;nh những bụi nhỏ c&oacute; h&igrave;nh d&aacute;ng dạng đ&agrave;i, m&agrave;u sắc s&aacute;ng nội bật nh&igrave;n rất bắt mắt. Ch&iacute;nh v&igrave; thế n&oacute; c&oacute; t&ecirc;n gọi l&agrave;&nbsp;</span><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial; color: #52403c; font-size: 16px; text-align: justify; background-color: #ffffff;">sedum dạ quang</strong><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">.</span></p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">C&Aacute;CH CHĂM S&Oacute;C SEN Đ&Aacute; SEDUM DẠ QUANG</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Sen đ&aacute; sedum dạ quang cũng thuộc họ&nbsp;<strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;"><a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-canh-sen-da/" target="_blank" rel="noopener">sen đ&aacute;</a></strong>&nbsp;n&ecirc;n c&aacute;ch chăm s&oacute;c v&ocirc; c&ugrave;ng đơn giản v&agrave; dễ d&agrave;ng. Bạn chỉ cần lưu &yacute; một ch&uacute;t về &aacute;nh s&aacute;ng v&agrave; nước.</p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff;">TƯỚI NƯỚC SEDUM DẠ QUANG</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Sen đ&aacute; Sedum dạ quang thuộc dạng đ&agrave;i v&agrave; c&oacute; khả năng trữ nước ở l&aacute; v&agrave; th&acirc;n, n&ecirc;n bạn kh&ocirc;ng cần tưới nước nhiều, chỉ cần một tuần tưới 1 lần, nếu thời tiết kh&ocirc; n&oacute;ng th&igrave; c&oacute; thể 2 lần. Hạn chế tưới trực tiếp n&ecirc;n l&aacute;, v&igrave;&nbsp;<strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;"><a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/sedum-da-quang/">sen đ&aacute; sedum dạ quang</a></strong>&nbsp;c&oacute; nhiều c&acirc;y v&agrave; lại dạng đ&agrave;i n&ecirc;n nước đọng tr&ecirc;n l&aacute; rất l&acirc;u kh&ocirc; dẫn đến thối l&aacute;.</p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff;">ĐẤT SEDUM DẠ QUANG</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Đất trồng ph&ugrave; hợp với sedum dạ quang l&agrave; loại đất dễ tho&aacute;t nước v&agrave; c&oacute; độ m&ugrave;n cao, bạn c&oacute; thể trộn đất trồng với sơ dừa, tro, xỉ than đun rồi đập nhỏ để lấy sự th&ocirc;ng tho&aacute;ng cho đất c&oacute; thể trộn th&ecirc;m ph&acirc;n b&ograve; kh&ocirc; hoặc một số thuốc chống nấm mốc.</p>', 100, '39000', 0, 'Sen đá sedum dạ quang phù để bàn, trang trí quá cà phê, góc học tập, trồng với tiểu cảnh, terrarium...Cây mang ý nghĩa cho một tình yêu, tình bạn vĩnh cửu không bao giờ phai nhòa dù có khó khăn như màn đêm bao phủ không còn thấy đường thì vẫn có người dẫn lỗi để có thể dễ dàng vượt qua.'),
('SD04', 2, 'Sen đá lục bình', 'sen-da-luc-binh-01.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">Sen đ&aacute; Lục B&igrave;nh l&agrave; một trong những giống mới từ b&ecirc;n nước ngo&agrave;i được đưa về Việt Nam, nay đ&atilde; được nh&acirc;n giống th&agrave;nh c&ocirc;ng, c&acirc;y c&oacute; m&agrave;u xanh tươi m&aacute;t c&aacute;nh mỏng mềnh, đem đến sự tươi m&aacute;t cho kh&ocirc;ng gian. C&acirc;y ph&ugrave; hợp với người mệnh mộc v&agrave; mệnh hỏa, với &yacute; nghĩa phong thủy giữ chắc những g&igrave; m&igrave;nh đ&atilde; đạt được.</span></p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">ĐẶC ĐIỂM SEN Đ&Aacute; LỤC B&Igrave;NH</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Sen đ&aacute; Lục B&igrave;nh c&oacute; đặc điểm l&agrave; c&acirc;y dạng đ&agrave;i m&agrave;u xanh c&aacute;nh bầu, l&aacute; mọc đối xứng với nhau theo từng cặp một, c&acirc;y ph&aacute;t triển theo chiều cao, những c&acirc;y l&acirc;u năm sẽ cao v&agrave; nhiều nh&aacute;nh, c&acirc;y rất dễ chăm s&oacute;c v&agrave; kh&ocirc;ng y&ecirc;u cầu nhiều về lượng &aacute;nh s&aacute;ng cao.</p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff; text-align: justify;">C&Aacute;CH CHĂM S&Oacute;C SEN Đ&Aacute; LỤC B&Igrave;NH</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Thuộc họ&nbsp;<strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;"><a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-canh-sen-da/" target="_blank" rel="noopener">sen đ&aacute;</a></strong>&nbsp;n&ecirc;n sen đ&aacute; Lục B&igrave;nh cũng rất dễ chăm s&oacute;c kh&ocirc;ng y&ecirc;u cầu phải c&oacute; sự chăm s&oacute;c cầu kỳ bạn chỉ cần ch&uacute; &yacute; một ch&uacute;t về đất, &aacute;nh s&aacute;ng v&agrave; nước l&agrave; c&acirc;y c&oacute; thể ph&aacute;t triển tốt.</p>', 150, '45000', 0, 'Cây Sen Đá Lục Bình có màu xanh tươi mát mang đến cho không gian của bạn sự thoải mái, cây phù hợp để bàn, trang trí quán cà phê...Cây mang ý nghĩa giữ chặt những gì mình đạt được.'),
('TC01', 8, 'Tiểu cảnh mẫu 01', 'tieu-canh-01.jpg', '<p style="text-align: justify;"><span style="color: #52403c; font-family: Arial, sans-serif;">Tiểu cảnh mẫu 01 l&agrave; một trong những tiểu cảnh được nhiều người ưa th&iacute;ch, điền vi&ecirc;n c&oacute; &yacute; nghĩa l&agrave; ruộng vườn, khi nh&igrave;n thấy phong cảnh n&agrave;y bạn như được trở về l&agrave;ng qu&ecirc;, hay ng&ocirc;i nh&agrave; y&ecirc;n b&igrave;nh, thoải m&aacute;i v&agrave; thư gi&atilde;n của m&igrave;nh sau những giờ l&agrave;m việc căng thẳng v&agrave; &aacute;p lực. Tiểu cảnh sen đ&aacute; điền vi&ecirc;n ph&ugrave; hợp để l&agrave;m qu&agrave; biếu sếp, để b&agrave;n l&agrave;m việc của trưởng, ph&oacute; ph&ograve;ng, gi&aacute;m đốc, c&aacute;c sảnh kh&aacute;ch sạn, ph&ograve;ng kh&aacute;ch&hellip;</span></p>', 50, '300000', 2, 'Tiểu cảnh mẫu 01  là một trong những tiểu cảnh được nhiều người ưa thích, điền viên có ý nghĩa là ruộng vườn, khi nhìn thấy phong cảnh này bạn như được trở về làng quê, hay ngôi nhà yên bình, thoải mái và thư giãn của mình sau những giờ làm việc căng thẳng và áp lực. Tiểu cảnh sen đá điền viên phù hợp để làm quà biếu sếp, để bàn làm việc của trưởng, phó phòng, giám đốc, các sảnh khách sạn, phòng khách…'),
('TC02', 8, 'Tiểu cảnh mẫu 02', 'tieu-canh-02.jpg', '<p style="text-align: justify;"><span style="color: #52403c; font-family: Arial, sans-serif;">Tiểu cảnh mẫu 02 l&agrave; một trong những tiểu cảnh được nhiều người ưa th&iacute;ch, điền vi&ecirc;n c&oacute; &yacute; nghĩa l&agrave; ruộng vườn, khi nh&igrave;n thấy phong cảnh n&agrave;y bạn như được trở về l&agrave;ng qu&ecirc;, hay ng&ocirc;i nh&agrave; y&ecirc;n b&igrave;nh, thoải m&aacute;i v&agrave; thư gi&atilde;n của m&igrave;nh sau những giờ l&agrave;m việc căng thẳng v&agrave; &aacute;p lực. Tiểu cảnh sen đ&aacute; điền vi&ecirc;n ph&ugrave; hợp để l&agrave;m qu&agrave; biếu sếp, để b&agrave;n l&agrave;m việc của trưởng, ph&oacute; ph&ograve;ng, gi&aacute;m đốc, c&aacute;c sảnh kh&aacute;ch sạn, ph&ograve;ng kh&aacute;ch&hellip;</span></p>', 70, '250000', 0, 'Tiểu cảnh mẫu 02 là một trong những tiểu cảnh được nhiều người ưa thích, điền viên có ý nghĩa là ruộng vườn, khi nhìn thấy phong cảnh này bạn như được trở về làng quê, hay ngôi nhà yên bình, thoải mái và thư giãn của mình sau những giờ làm việc căng thẳng và áp lực. Tiểu cảnh sen đá điền viên phù hợp để làm quà biếu sếp, để bàn làm việc của trưởng, phó phòng, giám đốc, các sảnh khách sạn, phòng khách…'),
('TC03', 8, 'Tiểu cảnh mẫu 03', 'tieu-canh-03.jpg', '<p>Tiểu cảnh mẫu 03 l&agrave; một trong những tiểu cảnh được nhiều người ưa th&iacute;ch, điền vi&ecirc;n c&oacute; &yacute; nghĩa l&agrave; ruộng vườn, khi nh&igrave;n thấy phong cảnh n&agrave;y bạn như được trở về l&agrave;ng qu&ecirc;, hay ng&ocirc;i nh&agrave; y&ecirc;n b&igrave;nh, thoải m&aacute;i v&agrave; thư gi&atilde;n của m&igrave;nh sau những giờ l&agrave;m việc căng thẳng v&agrave; &aacute;p lực. Tiểu cảnh sen đ&aacute; điền vi&ecirc;n ph&ugrave; hợp để l&agrave;m qu&agrave; biếu sếp, để b&agrave;n l&agrave;m việc của trưởng, ph&oacute; ph&ograve;ng, gi&aacute;m đốc, c&aacute;c sảnh kh&aacute;ch sạn, ph&ograve;ng kh&aacute;ch&hellip;</p>', 60, '240000', 0, 'Tiểu cảnh mẫu 03 là một trong những tiểu cảnh được nhiều người ưa thích, điền viên có ý nghĩa là ruộng vườn, khi nhìn thấy phong cảnh này bạn như được trở về làng quê, hay ngôi nhà yên bình, thoải mái và thư giãn của mình sau những giờ làm việc căng thẳng và áp lực. Tiểu cảnh sen đá điền viên phù hợp để làm quà biếu sếp, để bàn làm việc của trưởng, phó phòng, giám đốc, các sảnh khách sạn, phòng khách…'),
('TS01', 6, 'Cây Lan ý thủy sinh ', 'cay-lan-y-thuy-sinh.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y Lan &Yacute; c&oacute; t&ecirc;n khoa học&nbsp;Spathiphyllum wallisii, thuộc họ&nbsp;Araceae, ngo&agrave;i ra Lan &Yacute; c&ograve;n c&aacute;c t&ecirc;n gọi kh&aacute;c như: Bạch M&ocirc;n, Vỹ Hoa Trắng, Huệ Hoa B&igrave;nh. C&oacute; lẽ ch&iacute;nh v&igrave; lo&agrave;i c&acirc;y n&agrave;y c&oacute; hoa trắng v&agrave; bền n&ecirc;n được đặt t&ecirc;n như vậy.&nbsp;</span><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial; color: #52403c; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y Lan &Yacute; thủy sinh</strong><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;"> c&ograve;n đứng đầu danh s&aacute;ch lo&agrave;i c&acirc;y lọc kh&ocirc;ng kh&iacute;, kh&ocirc;ng chỉ hấp thụ một số chất g&acirc;y ung thư như: formaldehyde, benzen v&agrave; trichloroethylene, n&oacute; c&ograve;n hấp thụ cả xylene v&agrave; toluene&nbsp;h&oacute;a chất t&igrave;m thấy trong dầu hỏa. Hơn thế nữa n&oacute; c&ograve;n hấp thụ năng lượng bức xạ nh&acirc;n tạo ph&aacute;t ra từ tivi, điện thoại, l&ograve; vi s&oacute;ng, m&aacute;y t&iacute;nh, đ&agrave;i, đồng hồ điện tử&hellip;C&acirc;y ph&ugrave; hợp để b&agrave;n l&agrave;m việc, b&agrave;n học, ph&ograve;ng kh&aacute;ch, trang tr&iacute; qu&aacute;n c&agrave; ph&ecirc;, b&agrave;n lễ t&acirc;n, c&aacute;c kh&ocirc;ng gian trống&hellip;<img src=".../.../upload/cay-lan-y-thuy-sinh.jpg" alt="" /></span></p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff;">NƯỚC</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Kh&aacute;c so với việc trồng đất t&ugrave;y c&acirc;y Lan &Yacute; được trồng trong nước vấn đề nước đ&atilde; trở n&ecirc;n qu&aacute; dễ d&agrave;ng, chỉ khi n&agrave;o b&igrave;nh hết nước th&igrave; ta lại đổ đầy nước v&agrave;o trong b&igrave;nh l&agrave; được, nếu l&agrave; nước m&aacute;y th&igrave; n&ecirc;n để 1 ng&agrave;y cho bốc hết m&ugrave;i clo, v&agrave; khi đổ nước v&agrave;o b&igrave;nh bạn n&ecirc;n đổ qua, đổ lại để tạo kh&ocirc;ng kh&iacute; cho nước, khi nước đục l&agrave; c&oacute; thể do nhiều rễ bị thối, cần thay nước v&agrave; bỏ rễ thối đi l&agrave; được. Để c&acirc;y ph&aacute;t triển mạnh c&oacute; thể cho 1 v&agrave;i giọt dung dịch thủy sinh khi bạn thay nước mới.</p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff; text-align: justify;">NHIỆT ĐỘ</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">C&acirc;y l&agrave; lo&agrave;i hoa ưa b&oacute;ng m&aacute;t v&agrave; nhiệt độ kh&ocirc;ng qu&aacute; cao cũng kh&ocirc;ng qu&aacute; thấp, ch&iacute;nh v&igrave; vậy ở điều kiện ẩm ướt,&nbsp;<em style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none;">c&acirc;y Lan &Yacute; thủy sinh</em>&nbsp;sinh trưởng v&agrave; ph&aacute;t triển tốt nhất ở nhiệt độ 27 độ.</p>\r\n<h3 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 16px; text-transform: uppercase; background-color: #ffffff; text-align: justify;">NH&Acirc;N GIỐNG</h3>\r\n<p>&nbsp;</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">C&acirc;y Lan &yacute; l&agrave; lo&agrave;i c&acirc;y c&oacute; sức sống v&ocirc; c&ugrave;ng mạnh mẽ, chỉ việc t&aacute;ch một v&agrave;i c&acirc;y từ kh&oacute;m c&acirc;y lan &yacute; đang trồng đem đặt v&agrave;o chậu kh&aacute;c l&agrave; c&oacute; thể c&oacute; một chậu lan &yacute; ho&agrave;n to&agrave;n mới. Thường th&igrave; người ta nh&acirc;n giống lan &yacute; đ&uacute;ng v&agrave;o l&uacute;c thay chậu, thời điểm đ&oacute; thường diễn ra v&agrave;o m&ugrave;a xu&acirc;n, m&ugrave;a đầu ti&ecirc;n trong năm. Sau khi bụi đ&atilde; đủ lớn th&igrave; c&oacute; thể chuyển sang trồng bằng nước.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 90, '190000', 2, 'Cây Lan Ý thủy sinh có tác dụng thanh lọc không khí, hấp thụ các chất gây ung thư như formaldehyde, benzen và trichloroethylene, ngoài ra nó còn có khả năng giúp hấp thụ các bức xạ nhân tạo phát ra từ máy tính, tivi, lò vi sóng, đồ hồ điện tử...');
INSERT INTO `tree` (`ID`, `Category_ID`, `Tree_name`, `Image`, `Infor`, `Amount`, `Price`, `sale`, `Description`) VALUES
('VP01', 1, 'Tùng la hán', 'tung-la-han-01.jpg', '<p><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y T&ugrave;ng La H&aacute;n c&oacute; 2 loại 1 loại l&aacute; ngắn v&agrave; 1 loại l&aacute; d&agrave;i. C&acirc;y c&oacute; t&ecirc;n khoa học l&agrave;: Podocarpus macrophyllus l&agrave; một lo&agrave;i c&acirc;y cảnh thuộc họ Th&ocirc;ng tre (Podocarpaceae) c&oacute; nguồn gốc từ Nhật Bản v&agrave; Trung Quốc thường được trồng l&agrave;m cảnh trong c&ocirc;ng vi&ecirc;n, đ&igrave;nh ch&ugrave;a, vườn nh&agrave;. V&igrave; l&aacute; c&acirc;y c&oacute; tuổi thọ kh&aacute; l&acirc;u, nếu ở điều kiện tốt trung b&igrave;nh 5 năm c&acirc;y mới thay l&aacute;.&nbsp;</span><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial; color: #52403c; font-size: 16px; text-align: justify; background-color: #ffffff;">C&acirc;y T&ugrave;ng La H&aacute;n</strong><span style="color: #52403c; font-family: Arial, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;">&nbsp;được tượng trưng cho chữ Thọ ch&iacute;nh v&igrave; thế c&acirc;y mang &yacute; nghĩa phong thủy về sức khỏe. C&acirc;y thường được d&ugrave;ng để l&agrave;m qu&agrave; tặng, qu&agrave; mừng thọ với &yacute; nguyện mong gia chủ lu&ocirc;n mạnh khỏe v&agrave; b&igrave;nh an.</span></p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">ĐẶC ĐIỂM CỦA C&Acirc;Y T&Ugrave;NG LA H&Aacute;N</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-tung-la-han/">C&acirc;y T&ugrave;ng La H&aacute;n</a>&nbsp;thuộc loại c&acirc;y gỗ lớn, c&agrave;nh nh&aacute;nh nhiều, d&agrave;i, thường c&agrave;nh mọc ngang hoặc rủ xuống. L&aacute; h&igrave;nh giải hẹp, thu&ocirc;n nhọn ở đỉnh, gốc c&oacute; cuống ngắn, m&agrave;u xanh b&oacute;ng ở mặt tr&ecirc;n, hơi x&aacute;m ở mặt dưới. C&acirc;y c&oacute; hoa trắng, quả giống nh&igrave;n tượng La H&aacute;n ch&iacute;nh v&igrave; vậy người ta đặt t&ecirc;n cho c&acirc;y l&agrave; T&ugrave;ng La H&aacute;n.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><img src="upload/tung-la-han-02.jpg" alt="" /></p>\r\n<h2 style="box-sizing: border-box; margin: 14px 0px; padding: 0px; outline: none; font-family: Arial, sans-serif; line-height: 1.2; color: #52403c; font-size: 19.2px; text-transform: uppercase; background-color: #ffffff;">C&Aacute;CH CHĂM S&Oacute;C C&Acirc;Y T&Ugrave;NG LA H&Aacute;N</h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">Thường c&acirc;y T&ugrave;ng La H&aacute;n được phổ biến l&agrave;m c&acirc;y Bon Sai, c&acirc;y thế, v&igrave; thuộc loại th&acirc;n gỗ n&ecirc;n c&acirc;y c&oacute; sức sống kh&aacute; m&atilde;nh liệt, sống được cả ở trong điều kiện m&aacute;t lẫn nắng gắt, sau n&agrave;y&nbsp;<a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-canh/" target="_blank" rel="noopener">c&acirc;y cảnh</a>&nbsp;ph&aacute;t triển&nbsp;<strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">C&acirc;y T&ugrave;ng La H&aacute;n</strong>&nbsp;được ươm v&agrave; b&aacute;n từ nhỏ để l&agrave;m&nbsp;<a style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; text-decoration-line: none; background-color: transparent; color: blue !important;" href="https://webcaycanh.com/cay-canh-de-ban/" target="_blank" rel="noopener">c&acirc;y cảnh để b&agrave;n</a>.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><img src="upload/tung-la-han-03.jpg" alt="" /></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">Nước</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;">T&ugrave;y v&agrave;o điều kiện nơi đặt c&acirc;y m&agrave; ta tưới nhiều hoặc &iacute;t nước, thường nếu để c&acirc;y T&ugrave;ng La H&aacute;n trong văn ph&ograve;ng 7 &ndash; 10 ng&agrave;y tưới 1 lần, mỗi lần chỉ đủ ẩm đất, tr&aacute;nh tưới nhiều c&acirc;y dễ bị &uacute;ng nước, c&oacute; thể d&ugrave;ng b&igrave;nh xịt hoặc khăn ẩm lau l&aacute; để biểu b&igrave; tr&ecirc;n l&aacute; kh&ocirc;ng bị b&iacute;.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">&Aacute;nh S&aacute;ng</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; outline: none; text-align: justify; color: #52403c; font-family: Arial, sans-serif; font-size: 16px; background-color: #ffffff;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: Arial;">T&ugrave;ng La H&aacute;n</strong>&nbsp;chịu được cường độ &aacute;nh s&aacute;ng lớn, c&oacute; thể để c&acirc;y ngo&agrave;i trời, tuy nhi&ecirc;n c&acirc;y cũng c&oacute; thể tự th&iacute;ch nghi với điều kiện m&ocirc;i trường b&aacute;n r&acirc;m v&agrave; ph&ograve;ng m&aacute;y lạnh. Tr&aacute;nh để c&acirc;y ph&iacute;a sau cửa k&iacute;nh v&igrave; khi trời nắng gắt, &aacute;nh s&aacute;ng chiều qua cửa sẽ l&agrave;m c&acirc;y n&oacute;ng hơn, dẫn đến sốc nhiệt, mất nước h&eacute;o l&aacute;. N&ecirc;n phơi nắng cho c&acirc;y v&agrave;o l&uacute;c s&aacute;ng sớm v&agrave; chiều muộn, thi thoảng mang ra ngo&agrave;i trời để c&acirc;y được trao đổi với kh&ocirc;ng kh&iacute; b&ecirc;n ngo&agrave;i.</p>\r\n<p>&nbsp;</p>', 200, '160000', 3, 'Cây Tùng La Hán được tượng trưng cho chữ Thọ chính vì thế cây mang ý nghĩa phong thủy về sức khỏe. Cây thường được dùng để làm quà tặng, quà mừng thọ với ý nguyện mong gia chủ luôn mạnh khỏe và bình an.'),
('XR01', 4, 'Xương rồng kim hổ', 'cay-xuong-rong-kim-ho.jpg', 'Cây xương rồng kim hổ thuộc họ: Xương rồng. Tên khoa học: Echinocactus grusonii. Kim hổ gai trắng, hoặc nhiều gai. Nguồn gốc từ vùng sa mạc Mehico. Được phân bố tại các vùng sa mạc nhiệt đới khô nóng. Là một trong những loại xương rồng có khả năng phát triển bề ngang lớn nhất trong các loài xương rồng.', 127, '50000', 0, 'Cây Xương Rồng Kim Hổ có khả năng sống ở điều kiện khắc nhiệt, có khả năng hấp thụ bức xạ máy tính nên rất phù hợp để bàn máy tính, bàn làm việc.');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(150) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `User_name` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `email` varchar(155) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Address`, `Phone`, `User_name`, `pass`, `email`) VALUES
(3, 'Vũ Thị Xuân', 'An Đạt - Hà Nội', 357235923, 'xuan', '202cb962ac59075b964b07152d234b70', 'xuan@gmail.com'),
(4, 'Bùi Đình Linh', 'Trâu Quỳ, Gia Lâm, Hà Nội', 33989240, 'linh', '202cb962ac59075b964b07152d234b70', 'linh@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
