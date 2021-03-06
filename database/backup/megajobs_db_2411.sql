-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 24, 2017 lúc 07:10 SA
-- Phiên bản máy phục vụ: 5.7.17-log
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `megajobs_db2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(11) DEFAULT '0',
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `permission` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `phone`, `created`, `username`, `password`, `status`, `permission`) VALUES
(2, 'Hà Hồng Hoa', 'Thanh Hóa, Yên Định', '0985548325', 0, 'hahonghoa53', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(6, 'Nguyễn Thành An', 'HH4C Linh Dam, Hoang Mai, Ha Noi', '0979823452', 0, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(7, 'Tran Tuan Tu', 'HH4C Linh Dam, Hoang Mai, Ha Noi', '0979823452', 0, 'module123', 'e10adc3949ba59abbe56e057f20f883e', 1, '{\"category\":[\"index\"],\"product\":[\"index\",\"add\",\"edit\",\"del\"]}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `careers`
--

INSERT INTO `careers` (`id`, `name`, `status`) VALUES
(1, 'Bán hàng', 0),
(2, 'Biên tập / báo chí / truyền hình', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `transaction_id` int(10) NOT NULL DEFAULT '0',
  `product_id` int(255) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(15,2) NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_order` int(1) NOT NULL DEFAULT '0',
  `is_online` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `parent`, `name`, `cat_name`, `is_order`, `is_online`) VALUES
(6, 0, 'Giáo viên mầm non', 'giao-vien-mam-non', 1, 1),
(15, 0, 'Marketing', 'marketing', 99, 1),
(8, 0, 'Chuyên viên sale', 'chuyen-vien-sale', 1, 1),
(9, 0, 'Giáo viên TOEIC', 'giao-vien-toeic', 2, 1),
(10, 0, 'Giáo viên IELT', 'giao-vien-ielt', 3, 1),
(11, 0, 'Giáo viên tiểu học', 'giao-vien-tieu-hoc', 99, 1),
(12, 0, 'Trưởng phòng đào tạo', 'truong-phong-dao-tao', 99, 1),
(13, 0, 'Trưởng phòng kinh doanh', 'truong-phong-kinh-doanh', 99, 1),
(14, 0, 'Trưởng phòng marketing', 'truong-phong-marketing', 99, 1),
(16, 0, 'Thực tập viên', 'thuc-tap-vien', 99, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catnews`
--

CREATE TABLE `catnews` (
  `id` int(10) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_order` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `lang_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='danh mục tin tức';

--
-- Đang đổ dữ liệu cho bảng `catnews`
--

INSERT INTO `catnews` (`id`, `parent`, `name`, `cat_name`, `is_order`, `status`, `lang_code`) VALUES
(1, 0, 'Tin tức sự kiện', 'tin-tuc-su-kien', 1, 1, 'vn'),
(4, 0, 'Dịch vụ ', 'dich-vu', 3, 1, 'vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `major` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'chuyên ngành',
  `level` tinyint(4) NOT NULL COMMENT 'xếp loại',
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `info` int(11) NOT NULL COMMENT 'thông tin bổ sung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Chứng chỉ' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`id`, `name`, `code`, `latitude`, `longitude`) VALUES
(3, 'Hà Nội', 'hn', 212541, 36894),
(4, 'Hồ Chí Minh', 'hcm', 2125415, 2110000),
(5, 'Đà Nẵng', 'dn', 534634, 1241515);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `user_name`, `user_email`, `user_phone`, `user_address`, `content`, `title`, `created`, `status`) VALUES
(2, 'Trần Tuấn Anh', 'tuananh@lienketso.vn', '0985548328', 'Hà Nội', 'Vòng cuối Shriners Hospitals for Children Open mang tới kịch bản không thể hấp dẫn hơn cho người xem. Cựu vô địch Asiad 2010 Kim Whee ghi sáu birdie để dẫn đầu với thành tích tổng -9 trước khi bước vào hố 17. Cùng thời điểm, Patrick Cantlay đánh mất lợi thế cực lớn với hai bogey liên tiếp ở hố 17 và 18, khiến tổng điểm giảm xuống -9.', 'Tư vấn về sản phẩm tại công ty', 0, 1),
(3, 'Nguyễn Thành An', 'annt@lienketso.vn', '0979823452', 'Thái Nguyên', 'Thi đấu trước, ngôi sao kỳ cựu người Đức Alex Cejka gây áp lực lên hai đối thủ đàn em bằng màn trình diễn siêu hạng với chín birdie để kết thúc bốn vòng với điểm -9. Lúc này, quyền tự quyết vẫn nằm trong tay Kim Whee bởi chỉ cần đạt par ở hai hố cuối, anh sẽ đoạt danh hiệu PGA Tour đầu tiên trong sự nghiệp. Nhưng tài năng người Hàn Quốc chỉ hoàn thành một nửa nhiệm vụ. Kim đạt par hố 17 và mắc bogey hố cuối. Từ điểm -10, thành tích tổng của anh giảm xuống cùng -9 như Cantlay và Cejka.\r\n\r\nBa golfer hay nhất giải phải bước vào hố phụ để tranh chức vô địch. Tại hố phụ đầu tiên, cả ba cùng đạt điểm par5. Sang hố phụ thứ hai, Cantlay bứt lên ghi birdie nhờ gậy thứ ba đưa bóng vào green sát hố. Cùng lúc, Cejka đạt par còn Kim Whee mắc bogey. Ngôi sao người Mỹ vỡ òa niềm vui với chiếc cúp PGA Tour đầu tiên sau nửa thập kỷ chơi chuyên nghiệp.', 'Làm sao để sử dụng dịch vụ', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `desired_job`
--

CREATE TABLE `desired_job` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL COMMENT 'mã thành phố (nơi làm việc)',
  `career_id` int(11) NOT NULL COMMENT 'mã ngành nghề',
  `type_id` int(11) NOT NULL COMMENT 'mã loại hình công việc',
  `salary` int(11) NOT NULL COMMENT 'mức lương mong muốn',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `job_type`
--

INSERT INTO `job_type` (`id`, `name`, `status`) VALUES
(1, 'Toàn thời gian cố định', 1),
(3, 'Bán thời gian cố định', 1),
(4, 'Bán thời gian tạm thời', 1),
(5, 'Theo hợp đồng / tư vấn', 1),
(6, 'Thực tập', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên cấp bậc',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `levels`
--

INSERT INTO `levels` (`id`, `name`, `status`) VALUES
(9, 'Chuyên viên', 1),
(10, 'Trưởng nhóm', 0),
(11, 'Trưởng phòng', 0),
(12, 'Phó giám đốc', 0),
(13, 'Giám đốc', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `map_cadidate_skill`
--

CREATE TABLE `map_cadidate_skill` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL COMMENT 'mã ứng viên',
  `skill_id` int(11) NOT NULL COMMENT 'mã kĩ năng',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_candidates`
--

CREATE TABLE `member_candidates` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` int(5) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created` int(15) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng lưu thông tin thành viên là ứng viên';

--
-- Đang đổ dữ liệu cho bảng `member_candidates`
--

INSERT INTO `member_candidates` (`id`, `email`, `name`, `password`, `phone`, `city`, `address`, `sex`, `birthday`, `image`, `description`, `created`, `status`) VALUES
(1, 'annt@lienketso.com.vn', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1510305371, 0),
(2, 'hoahh@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1510314455, 0),
(3, 'thanhan1507@gmail.com', 'Nguyễn Thành An', 'e10adc3949ba59abbe56e057f20f883e', '0979823452', 3, 'HH4C Linh Dam, Hoang Mai, Ha Noi', 'Nam', '1989-07-15', NULL, 'Luôn hoàn thành nhiệm vụ cấp trên giao, siêng năng, chăm chỉ trong công viêc. Trong tương lai sẽ phấn đấu lên những vị trí cao hơn. Trong công việc mong công ty hổ trợ để nhân viên phát triển hết khả năng của mình test', 1511246925, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_companies`
--

CREATE TABLE `member_companies` (
  `id` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(15) DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng lưu thông tin thành viên là công ty';

--
-- Đang đổ dữ liệu cho bảng `member_companies`
--

INSERT INTO `member_companies` (`id`, `email`, `password`, `company_name`, `company_address`, `company_phone`, `created`, `status`) VALUES
(1, 'thanhan1507@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 1510304019, 0),
(2, 'annt@lienketso.vn', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 1510304287, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_id` int(10) NOT NULL DEFAULT '0',
  `category_id` int(10) NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_order` tinyint(2) NOT NULL DEFAULT '0',
  `is_online` tinyint(2) NOT NULL DEFAULT '1',
  `lang_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT 'vn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `parent`, `name`, `cat_id`, `category_id`, `link`, `is_order`, `is_online`, `lang_code`) VALUES
(11, 0, 'Giới thiệu', 0, 0, '', 1, 1, 'vn'),
(12, 0, 'Tin tức sự kiện', 1, 0, '', 2, 1, 'vn'),
(13, 0, 'Dịch vụ ', 0, 0, '', 3, 1, 'vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `updated` int(15) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `view` int(10) DEFAULT '0',
  `lang_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `cat_id`, `title`, `news_name`, `description`, `content`, `image`, `created`, `updated`, `status`, `view`, `lang_code`) VALUES
(5, 1, 'Ông Trump đặt vòng hoa tại đài tưởng niệm ở Trân Châu Cảng', 'ong-trump-dat-vong-hoa-tai-dai-tuong-niem-o-tran-chau-cang', 'Tổng thống Mỹ ngày 3/11 tới đặt vòng hoa tại đài tưởng niệm USS Arizona ở Trân Châu Cảng, tưởng nhớ các binh sĩ thiệt mạng trong Thế chiến 2.', '<p>Tổng thống Mỹ Donald Trump v&agrave; Đệ nhất phu nh&acirc;n Melania tham gia một buổi lễ đặt v&ograve;ng hoa b&ecirc;n trong đ&agrave;i tưởng niệm USS Arizona,&nbsp;điểm đ&aacute;nh dấu nơi y&ecirc;n nghỉ của hơn 1.000 thuỷ thủ v&agrave; l&iacute;nh thuỷ đ&aacute;nh bộ chết tr&ecirc;n t&agrave;u chiến, trong cuộc tấn c&ocirc;ng bất ngờ của ph&aacute;t x&iacute;t Nhật ng&agrave;y 7/12/1941,&nbsp;<em>ABC News</em>&nbsp;đưa tin.</p>\r\n\r\n<p>Tổng thống Mỹ v&agrave; phu nh&acirc;n sau đ&oacute; n&eacute;m những c&aacute;nh hoa trắng l&ecirc;n x&aacute;c con t&agrave;u đắm USS Arizona. Th&aacute;p tung vợ chồng &ocirc;ng chủ Nh&agrave; Trắng c&ograve;n c&oacute; Đ&ocirc; đốc Harry Harris, Tư lệnh Bộ chỉ huy Th&aacute;i B&igrave;nh Dương (PACOM) của Mỹ.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; lần đầu ti&ecirc;n &ocirc;ng Trump tới thăm Tr&acirc;n Ch&acirc;u Cảng. Trước đ&oacute;, Tổng thống Mỹ cho biết &ocirc;ng &quot;đ&atilde; được đọc, nghe, n&oacute;i v&agrave; học&quot; về Tr&acirc;n Ch&acirc;u Cảng nhưng &quot;chưa bao giờ tận mắt nh&igrave;n thấy&quot;. Tổng thống Trump th&ecirc;m rằng &ocirc;ng tin chuyến thăm sẽ &quot;rất th&uacute; vị&quot;.</p>\r\n\r\n<p>Ng&agrave;y mai, Tổng thống Mỹ sẽ tới Nhật Bản. Đ&acirc;y l&agrave; điểm dừng ch&acirc;n đầu ti&ecirc;n trong chuyến c&ocirc;ng du ch&acirc;u &Aacute; k&eacute;o d&agrave;i 14 ng&agrave;y của &ocirc;ng chủ Nh&agrave; Trắng, đi qua 5 nước gồm Nhật Bản, H&agrave;n Quốc, Trung Quốc, Việt Nam v&agrave; Philippines.</p>\r\n', 'AP-USS1-DC-110417-4x3-992-8169-1509780475.jpg', 1509783609, 1509783622, 1, 23, 'vn'),
(4, 1, 'Triều Tiên kêu gọi chấm dứt \'các lệnh trừng phạt tàn bạo\'', 'trieu-tien-keu-goi-cham-dut-cac-lenh-trung-phat-tan-bao', 'Triều Tiên mô tả các biện pháp trừng phạt nước này là \"tàn bạo, tạo thành tội diệt chủng\", kêu gọi lập tức xóa bỏ chúng.', '<p>&quot;Những lệnh trừng phạt t&agrave;n bạo do Mỹ dẫn đầu v&agrave; &aacute;p lực đối với DPRK cấu th&agrave;nh tội x&acirc;m phạm nh&acirc;n quyền v&agrave; diệt chủng&quot;,&nbsp;<em>Reuters</em>&nbsp;dẫn th&ocirc;ng b&aacute;o từ ph&aacute;i đo&agrave;n Triều Ti&ecirc;n tại Li&ecirc;n Hợp Quốc ng&agrave;y 3/11 cho biết. C&aacute;c lệnh trừng phạt &quot;đe dọa v&agrave; ngăn cản người d&acirc;n DPRK được hưởng nh&acirc;n quyền trong mọi lĩnh vực&quot;.</p>\r\n\r\n<p>DPRK l&agrave; viết tắt của Cộng h&ograve;a D&acirc;n chủ Nh&acirc;n d&acirc;n Triều Ti&ecirc;n.</p>\r\n\r\n<p>&quot;Một số quốc gia v&ocirc; lương t&acirc;m đ&atilde; chặn việc chuyển giao thiết bị y tế c&ugrave;ng thuốc men&quot; cho trẻ em v&agrave; c&aacute;c b&agrave; mẹ ở Triều Ti&ecirc;n, theo th&ocirc;ng b&aacute;o. &quot;Mọi lệnh trừng phạt vi phạm nh&acirc;n quyền, v&ocirc; nh&acirc;n t&iacute;nh nhằm v&agrave;o DPRK cần được x&oacute;a bỏ ho&agrave;n to&agrave;n v&agrave; ngay lập tức&quot;.</p>\r\n\r\n<p>Th&ocirc;ng b&aacute;o tr&ecirc;n được đưa ra trong bối cảnh Tổng thống Mỹ Donald Trump bắt đầu chuyến thăm ch&acirc;u &Aacute;, trong đ&oacute; c&oacute; c&aacute;c nước Trung Quốc, H&agrave;n Quốc v&agrave; Nhật Bản, t&igrave;m kiếm sự hỗ trợ để g&acirc;y &aacute;p lực với Triều Ti&ecirc;n, buộc B&igrave;nh Nhưỡng từ bỏ chương tr&igrave;nh hạt nh&acirc;n.</p>\r\n\r\n<p>Triều Ti&ecirc;n gần đ&acirc;y hứng chịu h&agrave;ng loạt lệnh trừng phạt từ cộng đồng quốc tế, sau khi nước n&agrave;y thử hạt nh&acirc;n lần 6 h&ocirc;m 3/9. Mỹ th&aacute;ng 10 đơn phương trừng phạt 7 c&aacute; nh&acirc;n Triều Ti&ecirc;n v&agrave; ba tổ chức với l&yacute; do &quot;x&acirc;m phạm nh&acirc;n quyền nghi&ecirc;m trọng&quot;.</p>\r\n\r\n<p>Hội đồng Bảo an Li&ecirc;n Hợp Quốc trong th&aacute;ng 9 tăng cường trừng phạt Triều Ti&ecirc;n, bao gồm cấm Triều Ti&ecirc;n xuất khẩu h&agrave;ng may mặc, hạn chế nhập khẩu c&aacute;c sản phẩm từ dầu mỏ, kh&iacute; thi&ecirc;n nhi&ecirc;n h&oacute;a lỏng v&agrave; ngưng tụ, hạn chế thu&ecirc; lao động Triều Ti&ecirc;n tại nước ngo&agrave;i, đ&oacute;ng băng t&agrave;i sản v&agrave; cấm đi lại với một số quan chức.</p>\r\n', 'download-4-4850-1509765596.jpg', 1509767079, 0, 1, 9, 'vn'),
(6, 1, 'Tài xế Uber, Grab tung chiêu kén khách, tăng giá gấp 4 khi mưa', 'tai-xe-uber-grab-tung-chieu-ken-khach-tang-gia-gap-4-khi-mua', 'Không chỉ tăng giá dịch vụ lên tới 4 lần, nhiều tài xế còn tung đủ chiêu trò để chọn khách sao có lợi cho mình.', '<p>Chị Hạnh, ở quận 5 cho biết, h&ocirc;m 19/11 mặc d&ugrave; trời mưa kh&ocirc;ng qu&aacute; lớn nhưng gọi xe cả tiếng đồng hồ vẫn kh&ocirc;ng được. Ban đầu chị gọi c&aacute;c dịch vụ taxi c&ocirc;ng nghệ như Uber v&agrave; Grad đi từ đường L&ecirc; Đức Thọ về An B&igrave;nh (quận 5) th&ocirc;ng thường chỉ 140.000-150.000 đồng nhưng nay d&ugrave; trời mưa lất phất gi&aacute; dịch vụ tăng l&ecirc;n ch&oacute;ng mặt, tới 617.000 đồng, gấp 4 lần so với khi trời nắng. Kh&ocirc;ng những vậy, khi gọi xe t&agrave;i xế c&ograve;n li&ecirc;n tục d&ograve; hỏi đi về đ&acirc;u.</p>\r\n\r\n<p>Khi chị Hạnh y&ecirc;u cầu v&agrave;o hẻm đ&oacute;n v&igrave; c&oacute; trẻ nhỏ th&igrave; t&agrave;i xế liền &ldquo;xuất chi&ecirc;u&rdquo; xe bị hỏng v&agrave; y&ecirc;u cầu kh&aacute;ch hủy chuyến để t&agrave;i xế kh&ocirc;ng bị trừ tiền. Thậm ch&iacute; c&oacute; những t&agrave;i xế tự hủy lu&ocirc;n chuyến v&agrave; kh&ocirc;ng hề gọi lại để giải th&iacute;ch cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&ldquo;T&ocirc;i gọi tới 4 lần đều kh&ocirc;ng được dịch vụ. Thấy vậy, t&ocirc;i liền chuyển qua gọi taxi truyền thống. Ng&agrave;y thường taxi truyền thống gi&aacute; cũng chỉ tầm 170.000-180.000 đồng, nhưng nay cũng tăng l&ecirc;n 240.000 đồng. Tổng đ&agrave;i li&ecirc;n tục đề xuất t&agrave;i xế cho t&ocirc;i nhưng khi hỏi lịch tr&igrave;nh di chuyển th&igrave; t&agrave;i xế tự hủy m&agrave; kh&ocirc;ng giải th&iacute;ch. Thậm ch&iacute; họ c&ograve;n li&ecirc;n tục c&aacute;u gắt v&agrave; hủy chuyến nếu kh&aacute;ch kh&ocirc;ng đứng ở chỗ t&agrave;i xế y&ecirc;u cầu&rdquo;, chị Hạnh n&oacute;i.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ chị Hạnh, m&agrave; anh H&ograve;a kh&aacute;ch h&agrave;ng gọi xe trong buổi s&aacute;ng nay cũng kh&aacute; bức x&uacute;c khi đặt Grab 7 chỗ, tr&ecirc;n xe c&oacute; 2 em b&eacute; v&agrave; 3 người lớn với lộ tr&igrave;nh từ quận 1 về T&acirc;n B&igrave;nh, gi&aacute; cước tr&ecirc;n 200.000 đồng. Tuy nhi&ecirc;n, xe chạy được 2 ph&uacute;t th&igrave; t&agrave;i xế n&oacute;i chuyến đ&atilde; bị hủy, kh&ocirc;ng giải th&iacute;ch th&ecirc;m, rồi y&ecirc;u cầu h&agrave;nh kh&aacute;ch xuống xe.</p>\r\n\r\n<p>Một trường hợp kh&aacute;c l&agrave; chị Lan, ở quận 1 muốn di chuyển từ đường Trần Hưng Đạo (quận 1) sang si&ecirc;u thị co.opmart Cống Quỳnh c&aacute;ch đ&oacute; v&agrave;i km, cũng li&ecirc;n tục bị hủy chuyến. &ldquo;T&ocirc;i l&agrave; kh&aacute;ch h&agrave;ng thường xuy&ecirc;n sử dụng Uber v&igrave; dịch vụ n&agrave;y t&ocirc;n trọng kh&aacute;ch h&agrave;ng. Tr&ecirc;n app của t&agrave;i xế chỉ hiển thị điểm đến, n&ecirc;n t&agrave;i xế kh&ocirc;ng biết được chuyến đi của t&ocirc;i ngắn hay d&agrave;i. V&igrave; vậy, họ gọi điện v&agrave; hỏi kh&eacute;o t&ocirc;i đi đ&acirc;u để đến đ&oacute;n, n&ecirc;n khi biết qu&atilde;ng đường th&igrave; chưa đầy 2 ph&uacute;t sau t&agrave;i xế gọi lại nhờ t&ocirc;i hủy chuyến, v&igrave; xe bị hư&rdquo;, chị Lan n&oacute;i.</p>\r\n\r\n<p>Chia sẻ với&nbsp;<em>VnExpress</em>, anh Nghĩa t&agrave;i xế h&atilde;ng taxi truyền thống cho biết, th&ocirc;ng thường ng&agrave;y mưa họ rất dễ kiếm kh&aacute;ch n&ecirc;n d&ugrave; đ&atilde; kết nối với một kh&aacute;ch h&agrave;ng trước đ&oacute; rồi nhưng khi thấy kh&aacute;ch ngo&agrave;i đường vẫy tay th&igrave; t&agrave;i xế sẵn s&agrave;ng hủy chuyến để chở người gần m&igrave;nh hơn, đỡ phải gọi điện v&agrave; chờ đợi. &nbsp;</p>\r\n\r\n<p>C&ograve;n theo anh Th&agrave;nh, một t&agrave;i xế Uber cho biết, sở dĩ nhiều t&agrave;i xế hủy những chuyến đi gần hoặc c&aacute;c chuyến c&oacute; trẻ em hoặc trong hẻm l&agrave; v&igrave; thu nhập của họ kh&ocirc;ng c&ograve;n cao như trước đ&acirc;y, n&ecirc;n họ chọn c&aacute;ch sử dụng song song ứng dụng Uber v&agrave; Grab. Nếu chuyến đi b&ecirc;n Uber m&agrave; kh&aacute;ch h&agrave;ng di chuyển gần v&agrave; trả bằng thẻ th&igrave; t&agrave;i xế sẽ rất ngần ngại. Đ&uacute;ng l&uacute;c ấy c&oacute; chuyến đặt xe từ hệ thống Grab m&agrave; kh&aacute;ch trả bằng tiền mặt th&igrave; t&agrave;i xế sẵn s&agrave;ng hủy chuyến để chở kh&aacute;ch n&agrave;o c&oacute; lợi hơn.</p>\r\n\r\n<p>Mặt kh&aacute;c, v&igrave; Uber c&oacute; ch&iacute;nh s&aacute;ch t&iacute;nh tiền nếu kh&aacute;ch tự hủy chuyến n&ecirc;n t&agrave;i xế nhờ kh&aacute;ch hủy để kh&ocirc;ng bị trừ tiền. Th&ocirc;ng thường mỗi chuyến hủy c&oacute; ph&iacute; l&agrave; 15.000 đồng. C&ograve;n việc gi&aacute; li&ecirc;n tục tăng khi trời mưa l&agrave; do thời điểm đ&oacute; nhiều kh&aacute;ch gọi nhưng xe &iacute;t th&igrave; gi&aacute; sẽ cao v&agrave; l&ecirc;n li&ecirc;n tục nếu lượng kh&aacute;ch c&agrave;ng tăng.</p>\r\n', 'ubegrab-8719-1511148422.jpg', 1511191628, 0, 1, 1, 'vn'),
(7, 1, 'Diễn viên Midu đầu tư khu mua sắm, ăn uống 15 tỷ', 'dien-vien-midu-dau-tu-khu-mua-sam-an-uong-15-ty', 'Khu phức hợp mua sắm, ăn uống 1.000 m2 do nữ diễn viên Midu đầu tư nằm ngay phố đi bộ Nguyễn Huệ với vốn đầu tư 15 tỷ đồng.', '<p>Khu phức hợp c&oacute; 30 gian h&agrave;ng thời trang v&agrave; 30 gian h&agrave;ng ăn uống với kh&ocirc;ng gian ngo&agrave;i trời, kh&ocirc;ng gian trong nh&agrave;, được trang tr&iacute; kỹ lưỡng để thu h&uacute;t giới trẻ đến vui chơi v&agrave; chụp h&igrave;nh.</p>\r\n\r\n<p>C&aacute;c shop kinh doanh được bố tr&iacute; trong nh&agrave; k&iacute;nh, c&oacute; m&aacute;y lạnh. Kh&aacute;ch thu&ecirc; c&aacute;c gian h&agrave;ng cũng chủ yếu l&agrave; những người trẻ muốn khởi sự kinh doanh nhỏ. Mỗi gian h&agrave;ng được quyền trang tr&iacute; theo phong c&aacute;ch ri&ecirc;ng để tạo dấu ấn.</p>\r\n\r\n<p>Giữa khu phức hợp l&agrave; một s&acirc;n lớn c&oacute; m&aacute;i che di động d&ugrave;ng để biểu diễn văn nghệ v&agrave; kinh doanh ẩm thực. Nữ diễn vi&ecirc;n Midu cho biết c&ocirc; học hỏi m&ocirc; h&igrave;nh n&agrave;y từ Th&aacute;i Lan. C&ocirc; cho rằng đ&atilde; đến l&uacute;c S&agrave;i G&ograve;n cần c&oacute; m&ocirc; h&igrave;nh vui chơi cho giới trẻ như ở Th&aacute;i Lan, H&agrave;n Quốc.</p>\r\n\r\n<p>&ldquo;Trước đ&acirc;y, Midu từng l&agrave;m hội chợ cuối tuần, tuy vận h&agrave;nh kh&aacute; ổn v&agrave; thịnh h&agrave;nh nhưng hội chợ c&oacute; thể mau trở n&ecirc;n nh&agrave;m ch&aacute;n. Hơn nữa, khi điều kiện thời tiết, kh&iacute; hậu kh&ocirc;ng tốt th&igrave; cũng l&agrave; một điều kh&aacute; cản trở. T&ocirc;i mong muốn c&oacute; một địa điểm đủ rộng, thoải m&aacute;i, kh&ocirc;ng bị ảnh hưởng bởi thời tiết để giới trẻ lui đến ăn uống, vui chơi, mua sắm c&aacute;c thương hiệu thiết kế Việt đang được ưa chuộng, thưởng thức c&aacute;c m&oacute;n ăn đường phố ch&acirc;u &Aacute;, qu&acirc;y quần c&ugrave;ng nhau, đ&agrave;n h&aacute;t acoustic&rdquo;, nữ diễn vi&ecirc;n cho biết.</p>\r\n\r\n<p>Do nằm ở vị tr&iacute; đắc địa, ngay tại phố đi bộ Nguyễn Huệ n&ecirc;n Midu cho biết việc t&igrave;m mặt bằng l&agrave; kh&oacute; nhất v&agrave; mất một thời gian kh&aacute; d&agrave;i. Ti&ecirc;u ch&iacute; chọn mặt bằng m&agrave; c&ocirc; đề ra một kh&ocirc;ng gian mở, thoải m&aacute;i, đủ rộng, tho&aacute;ng v&agrave; kh&ocirc;ng g&ograve; b&oacute;. Th&ecirc;m v&agrave;o đ&oacute;, địa điểm nhất định phải ở trung t&acirc;m của S&agrave;i G&ograve;n.</p>\r\n\r\n<p>Tổng cộng, c&ocirc; mất 4 th&aacute;ng để l&ecirc;n &yacute; tưởng v&agrave; 2 th&aacute;ng để thi c&ocirc;ng. Hai th&aacute;ng trở lại đ&acirc;y, c&ocirc; dừng hẳn tất cả hoạt động nghệ thuật, kh&ocirc;ng đ&oacute;ng phim v&agrave; tham dự c&aacute;c sự kiện để tập trung cho dự &aacute;n của m&igrave;nh.</p>\r\n', 'ZONE-87-18-JPG-5323-1511112587.jpg', 1511191681, 0, 1, 4, 'vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_list`
--

CREATE TABLE `order_list` (
  `id` int(10) NOT NULL,
  `transaction_id` int(10) NOT NULL DEFAULT '0',
  `product_id` int(10) NOT NULL DEFAULT '0',
  `qty` int(10) NOT NULL DEFAULT '0',
  `amount` int(25) NOT NULL DEFAULT '0',
  `data` text COLLATE utf8_unicode_ci,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Đơn đặt hàng chi tiết';

--
-- Đang đổ dữ liệu cho bảng `order_list`
--

INSERT INTO `order_list` (`id`, `transaction_id`, `product_id`, `qty`, `amount`, `data`, `status`) VALUES
(1, 1, 12, 1, 14000000, NULL, 0),
(2, 2, 5, 3, 6000000, NULL, 0),
(3, 3, 1, 5, 10000000, NULL, 0),
(4, 3, 5, 2, 4000000, NULL, 0),
(5, 4, 11, 1, 5000000, NULL, 0),
(6, 5, 11, 1, 5000000, NULL, 0),
(7, 6, 5, 1, 2000000, NULL, 0),
(8, 7, 5, 1, 2000000, NULL, 0),
(9, 8, 5, 1, 2000000, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partners`
--

CREATE TABLE `partners` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_order` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Liên kết đối tác, khách hàng';

--
-- Đang đổ dữ liệu cho bảng `partners`
--

INSERT INTO `partners` (`id`, `name`, `image`, `link`, `is_order`, `status`) VALUES
(1, 'Liên kết số', 'logohome.png', 'http://lienketso.vn', 1, 1),
(2, 'Snaga jobs', 'client-logo01.png', 'http://lienketso.vn', 2, 1),
(3, 'Hunter Doulas', 'client-logo05.png', 'http://lienketso.vn', 3, 1),
(4, 'Job talk america', 'client-logo02.png', 'http://lienketso.vn', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `discount` int(10) DEFAULT '0',
  `intro` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` text COLLATE utf8_unicode_ci,
  `created` int(11) NOT NULL DEFAULT '0',
  `is_online` int(1) NOT NULL DEFAULT '1',
  `is_hot` tinyint(2) NOT NULL DEFAULT '0',
  `view` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `cat_name`, `price`, `discount`, `intro`, `content`, `image`, `image_list`, `created`, `is_online`, `is_hot`, `view`) VALUES
(1, 6, 'Computer duo core', 'computer-duo-core', 2000000, 0, 'Test mô tả', '<p>Test nội dung</p>\r\n', '21.jpg', NULL, 0, 1, 0, 1),
(2, 6, 'Công tắc ba 1 chiều uten V3.0', 'cong-tac-ba-1-chieu-uten-v30', 67000, 0, 'Test', '', '11.jpg', NULL, 0, 1, 0, 0),
(5, 6, 'Công tắc ba 1 chiều uten V37', 'cong-tac-ba-1-chieu-uten-v37', 2000000, 0, '', '<div><strong>Product Details</strong></div>\r\n\r\n<div>\r\n<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>\r\n\r\n<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>\r\n\r\n<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>\r\n\r\n<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>\r\n</div>\r\n', '1.jpg', '[\"2.jpg\",\"3.jpg\"]', 0, 1, 0, 5),
(11, 6, 'Điều hòa Toshiba 2 chiều', 'dieu-hoa-toshiba-2-chieu', 5000000, 20, '', '', '7.jpg', '[]', 1508301064, 1, 0, 4),
(12, 6, 'Điện thoại vtur dát vàng', 'dien-thoai-vtur-dat-vang', 14000000, 10, 'test', '<p>test</p>\r\n', '31.jpg', '[]', 1509786305, 0, 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Cấu hình trang ';

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `title`, `meta_desc`, `meta_keyword`, `email`, `phone`, `address`, `footer`, `image`) VALUES
(1, 'Website liên kết số 4.0', 'Liên kết số là đơn vị thiết kế website số 1 việt nam', 'liên kết số, lienketso, lien ket so, thiet ke website', 'info@lienketso.vn', '0979823452', 'Số 09 nghách 59/21 đường Mễ Trì, Nam Từ Liêm', '<p>Chưa cập nhật</p>\r\n', '15879.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `skills`
--

INSERT INTO `skills` (`id`, `name`, `status`) VALUES
(0, 'C#', 1),
(0, 'PHP', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_order` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `lang_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `image`, `content`, `link`, `is_order`, `status`, `lang_code`) VALUES
(2, 'Slide 2', 'product3-1.jpg', 'test', NULL, 1, 1, 'vn'),
(3, 'Dịch vụ ', 'product1.jpg', '', NULL, 3, 0, 'vn'),
(4, 'slide 3', 'product1-1.jpg', '', NULL, 0, 0, 'vn'),
(5, 'slide 4', 'product4.jpg', 'test', 'http://lienketso.vn', 0, 0, 'vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tags cloude';

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `link`, `status`) VALUES
(2, 'Job teacher', 'http://lienketso.vn', 1),
(3, 'IELT', 'http://lienketso.vn', 1),
(4, 'TOEICT', 'http://lienketso.vn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `sercurity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `user_name`, `user_email`, `user_phone`, `address`, `amount`, `payment`, `payment_info`, `message`, `sercurity`, `status`, `created`) VALUES
(1, 2, 'Trần Văn Toàn', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', '14000000.00', 'nganluong', NULL, 'Chưa có nội dung', NULL, 0, 1510116686),
(2, 2, 'Trần Văn Toàn', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', '16000000.00', 'chuyenkhoan', NULL, 'Test thôi', NULL, 0, 1510116914),
(3, 2, 'Trần Văn Toàn', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', '14000000.00', 'tructiep', NULL, 'test', NULL, 0, 1510117179),
(4, 2, 'Trần Văn Toàn', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', '5000000.00', 'baokim', NULL, '', NULL, 0, 1510122555),
(5, 2, 'Trần Văn Toàn', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', '5000000.00', 'baokim', NULL, '', NULL, 0, 1510122602),
(6, 2, 'Trần Văn Toàn', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', '2000000.00', 'baokim', NULL, '', NULL, 0, 1510122744),
(7, 2, 'Trần Văn Toàn', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', '2000000.00', 'baokim', NULL, '', NULL, 0, 1510122816),
(8, 0, 'Nguyen Thanh An', 'annt@lienketso.vn', '0979823452', 'Thái Nguyên, Đại Từ', '2000000.00', 'tructiep', NULL, '', NULL, 0, 1510126070);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` int(15) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='người dùng front end';

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `phone`, `address`, `permission`, `status`, `created`) VALUES
(1, 'Nguyễn Thành An', '123', 'annt@lienketso.vn', '079856541', 'Thái Nguyên', NULL, 1, 0),
(2, 'Trần Văn Toàn', 'e10adc3949ba59abbe56e057f20f883e', 'thanhan1507@gmail.com', '0977556644', 'Thái Nguyên, Đại Từ', NULL, 1, 1509979323);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `position` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'chức vụ',
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên công ty',
  `description` text COLLATE utf8_unicode_ci COMMENT 'mô tả công việc',
  `from_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_current_job` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'là công việc hiện tại?',
  `candidate_id` int(11) NOT NULL COMMENT 'mã ứng viên',
  `level_id` int(11) NOT NULL COMMENT 'cấp bậc công việc',
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `work_experience`
--

INSERT INTO `work_experience` (`id`, `position`, `company_name`, `description`, `from_date`, `to_date`, `is_current_job`, `candidate_id`, `level_id`, `status`) VALUES
(4, 'Tổng giám đốc', 'Công ty cổ phần hoa an', 'Tôi làm việc quản lý nhân viên trong công ty', '08/2016', '10/2017', 0, 3, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catnews`
--
ALTER TABLE `catnews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `desired_job`
--
ALTER TABLE `desired_job`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `map_cadidate_skill`
--
ALTER TABLE `map_cadidate_skill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member_candidates`
--
ALTER TABLE `member_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member_companies`
--
ALTER TABLE `member_companies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `catnews`
--
ALTER TABLE `catnews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `desired_job`
--
ALTER TABLE `desired_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `map_cadidate_skill`
--
ALTER TABLE `map_cadidate_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `member_candidates`
--
ALTER TABLE `member_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `member_companies`
--
ALTER TABLE `member_companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
