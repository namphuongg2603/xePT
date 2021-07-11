-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 05:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xehaidang`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `slug` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `images`, `banner`, `home`, `slug`, `status`, `created_at`, `update_at`) VALUES
(3, 'Thuê xe tự lái - có tài', NULL, NULL, 1, 'thue-xe-tu-lai---co-tai', 1, '2019-08-27 07:20:31', '2019-11-03 06:24:39'),
(4, 'Thuê xe tự lái - không tài', NULL, NULL, 1, 'thue-xe-tu-lai---khong-tai', 1, '2019-08-27 07:20:45', '2019-11-03 06:25:05'),
(5, 'Thuê xe theo tháng', NULL, NULL, 1, 'thue-xe-theo-thang', 1, '2019-08-27 07:20:55', '2019-11-16 06:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `category_chil`
--

CREATE TABLE IF NOT EXISTS `category_chil` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `home` int(11) DEFAULT '1',
  `category_id` int(11) DEFAULT NULL,
  `fixcate` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_chil`
--

INSERT INTO `category_chil` (`id`, `name`, `slug`, `home`, `category_id`, `fixcate`, `created_at`, `updated_at`) VALUES
(1, 'Thuê xe 4 chổ có tài', 'thue-xe-4-cho-co-tai', 1, 3, 0, '2019-11-16 06:45:31', '2019-11-16 08:37:59'),
(2, 'Thuê xe 7 chổ có tài', 'thue-xe-7-cho-co-tai', 1, 3, 1, '2019-11-16 06:45:31', '2019-11-16 08:19:22'),
(7, 'Thuê xe 4 chổ không tài', 'thue-xe-4-cho-khong-tai', 1, 4, 0, '2019-11-16 08:01:27', '2019-11-16 08:19:30'),
(8, 'Thuê xe 7 chổ không tài', 'thue-xe-7-cho-khong-tai', 1, 4, 1, '2019-11-16 08:01:27', '2019-11-16 08:37:16'),
(9, 'Thuê xe 4 chổ theo tháng ', 'thue-xe-4-cho-theo-tháng', 1, 5, 0, '2019-11-16 08:02:34', '2019-11-16 08:19:49'),
(10, 'Thuê xe 7 chổ theo tháng', 'thue-xe-7-cho-theo-thang', 1, 5, 1, '2019-11-16 08:02:34', '2019-11-16 08:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `slug`, `images`, `home`, `created_at`, `updated_at`) VALUES
(1, 'Trang Chủ ', 'trang-chu', NULL, 1, NULL, '2020-04-30 16:22:53'),
(2, 'Giới thiệu', 'gioi-thieu', NULL, 1, NULL, '2019-11-16 06:21:27'),
(5, 'Đặt xe', 'dat-xe', NULL, 1, NULL, NULL),
(7, 'Khuyến mãi', 'khuyen-mai', NULL, 1, NULL, NULL),
(8, 'Tin tức', 'tin-tuc', NULL, 1, NULL, NULL),
(9, 'Liên hệ', 'lien-he', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `payment_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `id_transaction`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `payment_time`) VALUES
(1, 13, 700000, 'fdgdfgdfg', '00', '13525016', 'NCB', '0000-00-00 00:00:00'),
(2, 1, 1800000, 'thanh toan dat xe', '00', '13525019', 'NCB', '0000-00-00 00:00:00'),
(3, 2, 1200000, 'fdsaf', '00', '13525023', 'NCB', '2021-06-16 01:26:59'),
(4, 4, 900000, 'Thanh toan dat xe', '00', '13527733', 'NCB', '2021-06-19 17:53:26'),
(5, 5, 1800000, 'A', '00', '13527628', 'NCB', '2021-06-19 17:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `p_title` varchar(190) DEFAULT NULL,
  `p_slug` varchar(190) DEFAULT NULL,
  `p_descriptions` longtext,
  `p_content` longtext,
  `p_admin_id` int(11) DEFAULT NULL,
  `p_thunbar` varchar(190) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `p_title`, `p_slug`, `p_descriptions`, `p_content`, `p_admin_id`, `p_thunbar`, `created_at`, `updated_at`) VALUES
(3, 'Hướng dẫn sử dụng giay da nam từ A đến Z, dài lâu', 'huong-dan-su-dung-giay-da-nam-tu-a-den-z-dai-lau', 'Giay da nam là sản phẩm mà được cánh đàn ông lựa chọn sử dụng dù rẻ tiền hay đắt tiền nếu như không biết sử dụng đúng cách sẽ rất lãng phí. Hôm nay Giaynhapkhau.com sẽ hướng dẫn các bạn cách sử dụng giay nam từ A đến Z, dài lâu.\r\n\r\nGiay da nam là sản phẩm mà được cánh đàn ông lựa chọn sử dụng dù rẻ tiền hay đắt tiền nếu như không biết sử dụng đúng cách sẽ rất lãng phí. Hôm nay Giaynhapkhau.com sẽ hướng dẫn các bạn cách sử dụng giay nam từ A đến Z, dài lâu.', '<p><strong>HƯỚNG DẪN SỬ DỤNG SẢN PHẨM</strong></p>\r\n\r\n<p>- Không mang giày, dép giẫm đạp lên xăng, dầu, nhớt, dung môi, không đi giày, dép trong vực đá lởm chởm hoặc đạp lên các vật thể nóng như bô xe gắn máy... dễ gây hư hại phần đế và làm mau lão hoá sản phẩm.<br />\r\n- Không để vật nặng đè lên hoặc vật cứng, bén nhọn cọ quẹt vào giày dép, gây ra các đường nứt, gãy, làm nhăn da, trầy xướt, rách da.<br />\r\n- Hạn chế tiếp xúc quá thường xuyên trong nước, gây biến dạng, làm cho quai dễ bị rách và mau hở keo.<br />\r\n- Khi giày, dép bị ướt, không làm khô bằng lò sưởi, hơi lửa, phơi nắng hay máy sấy… mà để giày, dép khô tự nhiên ở nhiệt độ bình thường.<br />\r\n- Nên dùng cái đón gót để không làm gãy phần hậu giày.<br />\r\n- Nếu phải mang giày suốt ngày nên thỉnh thoảng cởi ra trong vài phút để chân và giày luôn khô thoáng, để tránh giày bị hôi.<br />\r\n- Đối với giày, dép mang hàng ngày, nên thường xuyên lau chùi và đánh xira từ 1 đến 2 lần mỗi tuần để cho giày dép đẹp và mang được bền lâu.</p>\r\n\r\n<p><strong>BẢO QUẢN GIÀY</strong></p>\r\n\r\n<p>- Khi không sử dụng giày thì nhét giấy mềm hoặc miếng xốp vào bên trong giày để hút ẩm đồng thời giữ cho form giày không bị biến dạng. Nên cho giày vào hộp thoáng khí hoặc túi nylon có khoét những lỗ nhỏ rồi cột lại và đặt vào nơi thoáng mát.<br />\r\n- Vệ sinh hàng ngày, trước khi sử dụng thì dùng bàn chải đánh giày chải sạch bụi bám trên giày hoặc dùng cây lăn bụi lăn lên bề mặt giày. Thỉnh thoảng nên vệ sinh giày bằng cách pha một ít bột xà phòng vào thau nước, quậy cho ra bọt, dùng mút bôi bảng lau đều lên da và phần dưới đế cho sạch. Sau đó xả lại nước rồi dùng khăn khô lau từ trong ra ngoài rồi phơi quạt gió cho đến khi khô hẳn rồi đánh xira lên là có thể sử dụng.</p>\r\n\r\n<p><strong>CÁCH DÙNG XI ĐÁNH GIÀY</strong></p>\r\n\r\n<p>Sau khi loại bỏ hết bụi bẩn, làm sạch quai và đế giày. Dùng một miếng vải mềm quấn vào đầu hai ngón tay trỏ và ngón giữa, phần còn lại của miếng giẻ được kẹp giữa lòng bàn tay và các ngón còn lại. Nếu dùng một miếng mút xốp, lớp xi sẽ đều hơn hoặc dùng một bàn chải lông ngựa để lấy xi bôi lên giày. Giày màu nào đánh xi màu đó, lớp xi phải được bôi đều và không quá dày để tránh da bị rạn. Việc đánh xi được thực hiện bằng những động tác xoay tròn của các ngón tay quấn giẻ hay bàn chải từ phía gót tới ngọn. Nếu lớp xi lỡ khô đi quá sớm có thể thêm vài giọt nước. Hãy để giày khô trong 10 hoặc 15 phút. Sau đó đánh bóng giày bằng bàn chải đuôi ngựa hoặc miếng giẻ sạch. Đánh khi nào mà bạn hài lòng với đôi giày sáng bóng của mình.</p>\r\n\r\n<p>Hi vòng những hướng dẫn sử dụng <strong><a href="http://www.giaynhapkhau.com/">giay nam</a></strong> trên sẽ giúp ích được mọi người trong người dùng bền hơn.</p>\r\n', 1, '1.PNG', '2018-06-03 16:19:53', '2018-06-03 16:19:53'),
(4, 'Hướng dẫn sử dụng xi đánh giày đúng cách', 'huong-dan-su-dung-xi-danh-giay-dung-cach', 'Còn gì lôi thôi hơn khi ra ngoài với đôi dày da cáu bẩn, cũ kĩ. Dù rằng bạn có đang vận trên người một bộ cánh sang trọng thì vẫn không thay đổi được cái nhìn của người đối diện. Vì thế, thỉnh thoảng các bạn nên "chăm sóc" giày dép của mình bằng cách sử dụng xi đánh giày để trả lại vẻ như mới cho giày nhé.', '<p>Shop xin mách bạn 3 bước rất hữu ích để đánh giày vừa nhanh lại vừa sạch:</p>\r\n\r\n<p>Bước 1: Làm sạch giày</p>\r\n\r\n<p>Lau sạch giày dép bằng dẻ ẩm bề mặt da cần đánh xi, sau đó phơi khô nơi thoáng gió (không phơi nắng) rồi mới đánh bóng.</p>\r\n\r\n<p>Bước 2: Đánh xi</p>\r\n\r\n<p>Dùng loại bàn chải thật tốt chấm xi, đánh lên bề mặt da của giày dép luôn tay cho thật đều, đánh xung quanh cho hết mặt da của giày dép, đánh liên tục cho đến khi bàn chải không còn dính xi.</p>\r\n\r\n<p>Bước 3: Đánh bóng</p>\r\n\r\n<p>Sau đó dùng bàn chải sạch khác đánh lại, đánh cho mạnh, đều, giày dép sẽ nổi lên màu bóng và tăng thêm độ mềm của da. Chú ý những nơi bàn chải không đánh tới bạn nên sử dụng bông tăm hoặc dẻ cotton thay thế.</p>\r\n\r\n<p>Xi đánh giày cũng có tác dụng tương tự với các đồ dùng da khác như túi, ví da, thắt lưng da bạn nhé.</p>\r\n\r\n<p>Qua 3 bước đơn giản trên, bạn đã có đôi dày da bóng loáng để đi rồi, khi bạn kết hợp đồ thì hãy luôn nhớ đến đôi dày da và chiếc dây lưng da hàng hiệu cùng tone màu nhé.</p>\r\n', 1, 'vai-dieu-can-biet-ve-laravel-model-63716917464.7401.png', '2018-06-03 16:35:28', '2018-06-03 16:35:28'),
(5, 'HƯỚNG DẪN CÁCH SỬ DỤNG BỘ VỆ SINH GIÀY CREP PROTECT CURE', 'huong-dan-cach-su-dung-bo-ve-sinh-giay-crep-protect-cure', 'HƯỚNG DẪN CÁCH SỬ DỤNG BỘ VỆ SINH GIÀY CREP PROTECT CURE', '<p>Bạn hãy đọc lướt qua hết bài rồi hãy làm theo nhé. Để tránh trường hợp làm sai.</p>\r\n\r\n<p><strong>Bước 1:</strong> Chuẩn bị những đôi giày dơ cần vệ sinh.</p>\r\n\r\n<p><strong>Bước 2:</strong> Lấy 1 tô nước nhỏ sạch.</p>\r\n\r\n<p><strong>Bước 3:</strong> Nhúng bàn chải Crep Protect vào nước cho ướt bàn chải.</p>\r\n\r\n<p><strong>Bước 4:</strong> Bạn cho 8-9 giọt Crep Protect Cure lên trực tiếp bàn chải.</p>\r\n\r\n<p><strong>Bước 5:</strong> Bạn bắt đầu chà vệ sinh đôi giày của bạn. Nếu như chà thấy hết bọt thì bạn cứ lặp lại từ bước 3 làm tới khi nào đôi giày bạn sạch thì thôi.</p>\r\n\r\n<p><strong>Bước 6:</strong> Sau khi đôi giày đã sạch như ý muốn. Bạn lấy khăn Crep Protect lau sạch tổng thể cho giày.</p>\r\n\r\n<p><strong>Bước 7:</strong> Sau khi lau tổng thể sạch xong bạn để đôi giày khô tự nhiên hoặc phơi trước quạt. Tuyệt đối không phơi nắng. Vì phơi nắng làm mau hư, phai mau giày của bạn.</p>\r\n\r\n<p>Những giày màu làm vài bước đơn giản như trên là đôi giày đã sạch.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Nhưng lưu ý đặc biệt đối với những giày vải full trắng.</strong> Chúng ta cần làm thêm 2 bước nữa giày vải trắng mới sạch hoàn toàn và không bị ố vàng. Sau khi chúng ta vệ sinh sạch, lau sạch xong (hoàn thành ở bước 6) thì chúng ta cần phải xả lại với nước sạch thật kỹ sau đó bạn lấy giấy vệ sinh hoặc giấy ăn quấn quanh từng chiếc giày và nhét vào trong giày cho nó hút ẩm, hút dơ sau đó ta mới phơi trước quạt hoặc để khô tự nhiên.</p>\r\n\r\n<h3><strong>Tại sao giày vải trắng phải xả với nước sạch sau khi vệ sinh xong mà giày màu không cần?</strong></h3>\r\n\r\n<p>Bởi vì giày vải trắng chúng ta vệ sinh không kỹ nước dơ bẩn còn trên giày nó sẽ gây ra ố vàng cho giày. Cho nên chúng ta cần xả lại với nước sạch sau khi vệ sinh xong.</p>\r\n\r\n<h3><strong>Còn giấy vệ sinh quấn quanh giày và nhét vô giày để làm gì?</strong></h3>\r\n\r\n<p>Giấy vệ sinh nó có công dụng hút ẩm và hút dơ bẩn còn sót lại trên giày để nó không gây ố vàng cho giày. Và nó giúp giày chúng ta nhanh khô.</p>\r\n', 1, 'larave-git-hooks.png', '2018-06-04 03:36:37', '2018-06-04 03:36:37'),
(6, '3 Cách chọn giày nam cho những quý ông phù hợp với dáng người', '3-cach-chon-giay-nam-cho-nhung-quy-ong-phu-hop-voi-dang-nguoi', 'Vóc dáng của mỗi người khác nhau phù hợp với từng loại trang phục khác nhau. Những bộ trang phục từ quần áo, giày dép luôn đa dạng kiểu sắc, mẫu mã và hướng tới từng đối tượng khách hàng có đặc điểm thân hình khác nhau. Khi đi những đôi giày phù hợp với ngoại hình của mình, chắc chắn các quý ông sẽ cảm thấy tự tin hơn vào bản thân.', '<h2><strong>Cách chọn giày nam phù hợp với dáng người của các quý ông</strong></h2>\r\n\r\n<p>Mỗi đôi giày được tạo ra đều hướng tới một đối tượng khách hàng có dáng người khác nhau để trở thành những phụ trợ nổi bật cho các quý ông trong những buổi gặp mặt quan trọng.</p>\r\n\r\n<h3><strong>Cách chọn giày nam cho quý ông có ngoại hình hơi béo</strong></h3>\r\n\r\n<p>Việc chọn cho những quý ông có ngoài hình béo có vẻ như không quá khó khăn. Hầu hết những mẫu sản phẩm <a href="http://www.giaytot.com%20" target="_blank"><em><strong>giày nam</strong></em></a>, giày lười, giày dáng rộng hay giày ông dáng, kiểu giày mũi tròn hoặc mũi vuông hay đến cả mũi nhọn, những quý ông ngoại hình hơi béo đều là những sự lựa chọn phù hợp. Về màu sắc, những quý ông này cũng chỉ cần chọn những đôi giày có màu sắc ưu thích, phù hợp với trang phục, họa tiết và chọn những tông màu tối sẽ trông các quý ông gọn gang hơn nhiều.</p>\r\n\r\n<h3><strong>Cách chọn giày nam cho quý ông có ngoại hình cao gầy</strong></h3>\r\n\r\n<p>Với dáng người hơi gầy, mỏng thì những quý ông này nên tránh chọn những trang phục có màu sắc giữa quần áo và giày dép giống nhau. Những đôi giày mũi nhọn dài không phải là sự lựa chọn phù hợp với những quý ông này vì nó sẽ khiến cho dáng người của những quý ông này trở nên cao hơn, gầy hơn mất cân đối. Để dáng người trở nên cân bằng, những quý ông nên chọn cho mình những đôi giày mõm tròn hoặc mõm vuông hoặc góc cạnh. Màu sắc đôi giày cũng chỉ cần chọn màu sắc phù hợp với bộ trang phục.</p>\r\n\r\n<h3><strong>Cách chọn giày nam cho quý ông có ngoại hình thấp</strong></h3>\r\n\r\n<p>Có một dòng sản phẩm dành riêng cho các quý ông có dáng người thấp đó là những đôi giày đế cao. Những đôi giày đế cao có thể giúp những quý ông này có thêm tự tin hơn với chiều cao được tăng thêm một cách đáng kể nhưng vô cùng khéo léo. Quần và giày nên lựa chọn có cùng tông màu trái ngược với những quý ông có dáng người cao đầy. Và điều quan trọng khi chọn cho mình một đôi giày đối với những quý ông có dáng người thấp đó là hãy chọn cho mình những đôi giày có chi tiết đơn giản, không nhiều chi tiết rườm rà, nó có thể làm cho bạn trở nên lố bịch.</p>\r\n\r\n<p>Ngoài ra, việc hạn chế chọn những đôi giày cao cổ, giày boot cổ lửng hoặc boot cao cổ nó sẽ là điểm trừ vô cùng lớn khiến cho đôi chân của bạn trở nên ngắn đi nhiều.</p>\r\n\r\n<p>Chúc bạn lựa chọn được đôi giày thực sự phù hợp với dáng người của mình.</p>\r\n', 1, 'hatgiong.jpg', '2018-06-04 03:39:46', '2018-06-04 03:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  `number` int(11) DEFAULT '0',
  `price` int(11) DEFAULT NULL,
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id_chil` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `slug` varchar(100) DEFAULT NULL,
  `hot` int(11) DEFAULT '1',
  `note` text,
  `head` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `content`, `number`, `price`, `thunbar`, `category_id_chil`, `user_id`, `sale`, `slug`, `hot`, `note`, `head`, `view`, `created_at`, `updated_at`) VALUES
(25, 'TOYOTA INNOVA MT 2018', NULL, 5, 900000, 'Toyota-Innova.jpg', 1, 10, 0, 'toyota-innova-mt-2018', 1, 'Ghi chú rõ ràng', NULL, NULL, NULL, '2021-06-19 11:02:52'),
(26, 'HYUNDAI I10 HATCHBACK 1.0 AT 2016', NULL, 10, 600000, 'Hyundai i10 Hatchback 1.0 AT.jpg', 7, 1, 0, 'hyundai-i10-hatchback-10-at-2016', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:25'),
(27, 'VINFAST FADIL AT 2019', NULL, 5, 600000, 'vinfast_fadil_brahminy_white.png', 9, 1, 0, 'vinfast-fadil-at-2019', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:27'),
(28, 'TOYOTA VIOS 1.5E (MT) 2007', NULL, 2, 700000, 'Toyota-Vios-1.5 E MT.jpg', 1, 1, 0, 'toyota-vios-15e-mt-2007', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:29'),
(29, 'CHEVROLET CRUZE LTZ 1.8 2016-2018', NULL, 3, 700000, 'Chevrolet-Cruze-LTZ 1.8.jpg', 2, 1, 0, 'chevrolet-cruze-ltz-18-2016-2018', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:31'),
(30, 'KIA CERATO MT 2017', NULL, 2, 700000, 'Kia-Cerato-1.6 MT.jpg', 8, 1, 0, 'kia-cerato-mt-2017', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:33'),
(31, 'HONDA CITY AT 2017', NULL, 3, 700000, 'Honda-City-1.5 AT.jpg', 10, 1, 0, 'honda-city-at-2017', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:35'),
(32, 'FORD FOCUS 1.8 AT 2015', NULL, 4, 700000, 'Ford-Forcus-1.8 AT.jpg', 2, 1, 0, 'ford-focus-18-at-2015', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:36'),
(33, 'TOYOTA FORTUNER', NULL, 2, 900000, 'Toyota-Fortuner-2017.png', 8, 1, 0, 'toyota-fortuner', 1, NULL, NULL, NULL, NULL, '2021-06-19 11:00:38'),
(34, 'TOYOTA INNOVA MT 2021', NULL, 1, 3000000, '676c8b678f5306e4b2309efe40473918f32548d41.jpg', 1, 13, 0, 'toyota-innova-mt-2021', 1, 'Liên hệ thuê xe ', NULL, NULL, '2021-06-20 02:25:38', '2021-06-20 02:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `users_id` int(11) DEFAULT NULL,
  `note` text,
  `time_start` date DEFAULT NULL,
  `number_day` int(11) DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `time_stop` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `status`, `users_id`, `note`, `time_start`, `number_day`, `product_id`, `type`, `time_stop`, `code`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1400000, 2, 10, NULL, '2021-06-20', 2, 32, 1, '2021-06-22', 'EK5iYKtNxuy0', 1, '2021-06-19 11:21:28', '2021-06-20 02:06:41'),
(2, 900000, 2, 10, 'ghi chú giao hàng', '2021-06-21', 1, 25, 1, '2021-06-22', 'MxvKBykaPMNk', 10, '2021-06-19 17:03:13', '2021-06-20 02:06:42'),
(3, 1800000, 3, 11, 'ghi chú giao hàng', '2021-06-21', 2, 33, 1, '2021-06-23', 'Th5PqjDnqecq', 1, '2021-06-20 02:09:27', '2021-06-20 02:09:50'),
(4, 900000, 3, 12, 'Thanh toan dat xe', '2021-06-21', 1, 25, 2, '2021-06-22', 'Sq4q83Of8ng3', 10, '2021-06-20 02:20:58', '2021-06-20 02:22:51'),
(5, 1400000, 0, 12, NULL, '2021-06-21', 2, 32, 1, '2021-06-23', 'LTG6ybZQduM1', 1, '2021-06-20 02:21:16', '2021-06-20 02:21:16'),
(6, 6000000, 2, 12, 'ghi chú giao hàng', '2021-06-21', 2, 34, 1, '2021-06-23', 'ToKYKaeZUWwM', 13, '2021-06-20 02:26:39', '2021-06-20 02:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avartar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `adress`, `password`, `avartar`, `status`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '09090943262', 'Phù Mỹ - Bình Định', '25d55ad283aa400af464c76d713c07ad', NULL, 1, 1, NULL, '2021-06-19 10:58:32'),
(10, 'Nguyên Văn Dược', 'duocnvoit@gmail.com', '03590208988', 'Thái bình', '25d55ad283aa400af464c76d713c07ad', NULL, 1, 2, NULL, '2021-06-19 09:37:07'),
(12, 'DUOC NGUYEN VAN', 'duocnvoit1@gmail.com', '0928817228', 'Thái bình', '25d55ad283aa400af464c76d713c07ad', NULL, 1, 0, NULL, NULL),
(13, 'DUOC NGUYEN VAN', 'duocnvoit2@gmail.com', '0928817228', 'Thái bình', '25d55ad283aa400af464c76d713c07ad', NULL, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE IF NOT EXISTS `user_contact` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `content` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `category_chil`
--
ALTER TABLE `category_chil`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`), ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
 ADD PRIMARY KEY (`id`), ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category_chil`
--
ALTER TABLE `category_chil`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
