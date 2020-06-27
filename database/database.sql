-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 26, 2019 lúc 12:44 PM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_06_11_145812_create_tbl_admin_table', 1),
(22, '2019_06_17_161852_create_tbl_category_product', 1),
(23, '2019_06_19_152045_create_tbl_brand_product', 1),
(24, '2019_06_19_155204_create_tbl_product', 1),
(25, '2019_08_17_030852_tbl_customer', 1),
(26, '2019_08_17_044054_tbl_shipping', 2),
(30, '2019_08_28_142718_tbl_payment', 3),
(31, '2019_08_28_142750_tbl_order', 3),
(32, '2019_08_28_142810_tbl_order_details', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'hieu tan', '0932023992', NULL, NULL),
(2, 'quynamle123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'quynam', '0368475269', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', '20', 'Giày adidas', 0, NULL, NULL),
(2, 'Nike', '20', 'Giày Nike', 0, NULL, NULL),
(5, 'Puma', '25', 'Giày Puma', 0, NULL, NULL),
(6, 'Reebok', '12', 'Giày Reebok Thương hiệu nhật bản', 0, NULL, NULL),
(8, 'Converse', '5', 'Hãng converse', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

DROP TABLE IF EXISTS `tbl_category_product`;
CREATE TABLE IF NOT EXISTS `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_category_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `slug_category_product`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(14, 'Giày nam', '43', '232', 0, NULL, NULL),
(15, 'Giầy nữ', '23', '23', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(5, 'nam1111', 'lequynam@gmail.com', '651b5ed81e8acee450bc9e52a4b58a4f', '+84368475269', NULL, NULL),
(7, 'lethicamthi', 'lethicamthi@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '026535852223', NULL, NULL),
(9, 'hieu', 'hieu@gmail.com', '9070711b7c5ce20cd6349ec26524c20a', '9604209', NULL, NULL),
(10, 'le quy nam1', 'quynamle123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+84368475269', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khuyenmai`
--

DROP TABLE IF EXISTS `tbl_khuyenmai`;
CREATE TABLE IF NOT EXISTS `tbl_khuyenmai` (
  `khuyenmai_id` int(11) NOT NULL AUTO_INCREMENT,
  `khuyenmai_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khuyenmai_maSP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khuyenmai_giaSP` float NOT NULL,
  `khuyenmai_giaKM` float NOT NULL,
  `khuyenmai_hinhanhSP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`khuyenmai_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khuyenmai`
--

INSERT INTO `tbl_khuyenmai` (`khuyenmai_id`, `khuyenmai_name`, `khuyenmai_maSP`, `khuyenmai_giaSP`, `khuyenmai_giaKM`, `khuyenmai_hinhanhSP`) VALUES
(3, 'sản phẩm đang rất hot', '47', 47505600, 100000, 'hang-chinh-hang-puma-thunder-rive-droite-2019-best-sneaker35.jpeg'),
(2, '23', '46', 3343430, 34343, 'hinh128.jpeg'),
(4, 'san pham giam 45', '45', 2000000, 300000, 'hang-chinh-hang-puma-rs-x-trophies-black-gold-201929.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

DROP TABLE IF EXISTS `tbl_lienhe`;
CREATE TABLE IF NOT EXISTS `tbl_lienhe` (
  `lienhe_id` int(11) NOT NULL AUTO_INCREMENT,
  `lienhe_noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lienhe_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`lienhe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`lienhe_id`, `lienhe_noidung`, `lienhe_link`) VALUES
(1, 'TiKiStrore Shop giày hàng đầu Việt Nam\r\nLiện hệ : 51651561498\r\nwebsite : TikiStore.com', 'TikiStore.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(9, 10, 23, 39, '10,955,000', '1', NULL, NULL),
(10, 7, 24, 40, '4,300,000', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 37, 'REEBOK CLASSIC WORKOUT', '2300000', 1, NULL, NULL),
(2, 2, 47, 'PUMA THUNDER RIVE DROITE', '4300000', 1, NULL, NULL),
(3, 3, 18, 'ADIDAS NMD XR1', '3200000', 1, NULL, NULL),
(4, 4, 25, 'CHUCK TAYLOR 70S CDG', '2300000', 1, NULL, NULL),
(5, 5, 30, 'NIKE AIR FORCE 1 LOW', '3300000', 1, NULL, NULL),
(6, 6, 30, 'NIKE AIR FORCE 1 LOW', '3300000', 1, NULL, NULL),
(7, 7, 47, 'PUMA THUNDER RIVE DROITE', '4300000', 1, NULL, NULL),
(8, 8, 47, 'PUMA THUNDER RIVE DROITE', '4300000', 1, NULL, NULL),
(9, 8, 45, 'PUMA RS-X TROPHIES', '2350000', 1, NULL, NULL),
(10, 9, 47, 'PUMA THUNDER RIVE DROITE', '4300000', 2, NULL, NULL),
(11, 9, 45, 'PUMA RS-X TROPHIES', '2350000', 1, NULL, NULL),
(12, 10, 47, 'PUMA THUNDER RIVE DROITE', '4300000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Đang chờ xử lý', NULL, NULL),
(2, '1', 'Đang chờ xử lý', NULL, NULL),
(3, '1', 'Đang chờ xử lý', NULL, NULL),
(4, '1', 'Đang chờ xử lý', NULL, NULL),
(5, '2', 'Đang chờ xử lý', NULL, NULL),
(6, '2', 'Đang chờ xử lý', NULL, NULL),
(7, '2', 'Đang chờ xử lý', NULL, NULL),
(8, '2', 'Đang chờ xử lý', NULL, NULL),
(9, '2', 'Đang chờ xử lý', NULL, NULL),
(10, '2', 'Đang chờ xử lý', NULL, NULL),
(11, '2', 'Đang chờ xử lý', NULL, NULL),
(12, '3', 'Đang chờ xử lý', NULL, NULL),
(13, '3', 'Đang chờ xử lý', NULL, NULL),
(14, '2', 'Đang chờ xử lý', NULL, NULL),
(15, '1', 'Đang chờ xử lý', NULL, NULL),
(16, '3', 'Đang chờ xử lý', NULL, NULL),
(17, '2', 'Đang chờ xử lý', NULL, NULL),
(18, '2', 'Đang chờ xử lý', NULL, NULL),
(19, '3', 'Đang chờ xử lý', NULL, NULL),
(20, '1', 'Đang chờ xử lý', NULL, NULL),
(21, '1', 'Đang chờ xử lý', NULL, NULL),
(22, '1', 'Đang chờ xử lý', NULL, NULL),
(23, '3', 'Đang chờ xử lý', NULL, NULL),
(24, '3', 'Đang chờ xử lý', NULL, NULL),
(25, '3', 'Đang chờ xử lý', NULL, NULL),
(26, '3', 'Đang chờ xử lý', NULL, NULL),
(27, '2', 'Đang chờ xử lý', NULL, NULL),
(28, '1', 'Đang chờ xử lý', NULL, NULL),
(29, '2', 'Đang chờ xử lý', NULL, NULL),
(30, '1', 'Đang chờ xử lý', NULL, NULL),
(31, '2', 'Đang chờ xử lý', NULL, NULL),
(32, '3', 'Đang chờ xử lý', NULL, NULL),
(33, '1', 'Đang chờ xử lý', NULL, NULL),
(34, '1', 'Đang chờ xử lý', NULL, NULL),
(35, '2', 'Đang chờ xử lý', NULL, NULL),
(36, '3', 'Đang chờ xử lý', NULL, NULL),
(37, '3', 'Đang chờ xử lý', NULL, NULL),
(38, '3', 'Đang chờ xử lý', NULL, NULL),
(39, '3', 'Đang chờ xử lý', NULL, NULL),
(40, '3', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_slug`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(18, 'ADIDAS NMD XR1', '10', 14, 1, 'Giày NMD XR1 \r\nmàu đen đỏ\r\nHãng ADIDAS', 'Adidas NMD,làn sóng mới của Adidas đã trở thành 1 trong những mẫu giày được săn đón nhất ở khắp nơi và Việt Nam cũng không ngoại lệ. Với thiết kế đơn giản và mang phong cách hiện đại và trẻ trung cùng với những cải tiến công nghệ của hãng càng làm đôi giày tăng giá trị. Với upper được làm từ sợi tổng hợp,đem lại cảm giác thoải mái cho người mang 1 cách tối ưu nhất . Bộ đế boost,niềm tự hào cùa Adidas cũng được đưa vào thiết kế này và càng nổi trội hơn với 2 miếng đệm EVA để tăng sự cố định cho đôi chân của bạn . Với nhiều phối màu đặc sắc ở shop cùng giá rất tốt sẽ đem đến cho bạn sự hài lòng nhất có thể . Liên hệ với shop để sẵm 1 em nhé', '3200000', 'hinh126.jpeg', 0, NULL, NULL),
(19, 'ADIDAS ORIGINALS', '1', 14, 1, 'Giày ADIDAS ORIGINALS\r\nMàu sắc : Trắng \r\nHãng :ADIDAS', 'Shop giới thiệu chính thức của adidas I-5923 , một phiên bản cải tiến của Iniki Runner nổi tiếng. Hôm nay chúng tôi mang lại cho bạn một biến thể khác với sự xuất hiện của Adidas N-5923.\r\n\r\nThay thế bảng da lộn truyền thống ở gót chân để hỗ trợ thêm. N-5923 cũng tắt đế giày Boost hiện đại và thay thế nó bằng đệm đệm EVA truyền thống hơn\r\n\r\nPhần upper được làm bằng chất liệu vải thoáng khí và sợi vải có độ co dãn và mềm mại hơn\r\n\r\nPhần đế được cải tiến hơn mang đến sự chắc chắn và bước đi nhẹ hơn\r\n\r\nMẫu giày dễ phối đồ và phù hợp với mọi lứa tuổi, mẫu giày couple mà các bạn trẻ săn lùng', '2300000', 'hinh139.jpeg', 0, NULL, NULL),
(20, 'ADIDAS PURE BOOST', '1', 14, 1, 'Giày ADIDAS PURE BOOST\r\nMàu sắc : Trắng\r\nHãng ADIDAS', 'Shop xin giới thiệu sản phẩm ADIDAS PURE BOOST thích hợp cho việc tập luyện thể thao và đi dạo phố trong các bữa tiệc lớn . Liên hệ shop để nhanh chóng có được 1 đôi giày ADIDAS PURE BOOST thật đẹp và sang trọng nhé .', '2300000', 'adidas351.jpeg', 0, NULL, NULL),
(21, 'ADIDAS ULTRA BOOST', '1', 14, 1, 'Giày ADIDAS ULTRA BOOST\r\nMàu sắc :Đen \r\nHãng :ADIDAS', 'ADIDAS ULTRA BOOST vẫn chưa bao giờ hết hot với giới trẻ vì thế shop 1 lần nữa trình làng 1 sẳn phẩm ultra boost chất lừa tới quý khách . Nhanh chóng liên hệ với shop để có thể nhận được 1 đôi ADIDAS ULTRA BOOST thời thượng .', '3200000', 'hinh173.jpeg', 0, NULL, NULL),
(22, 'ADIDAS ULTRA BOOST 4.0', '1', 14, 1, 'Giày ADIDAS ULTRA BOOST 4.0\r\nMàu sắc : Trắng\r\nHẵng : ADIDAS', 'ADIDAS ULTRA BOOST 4.0 đã là 1 huyền thoại với giới trẻ và luôn được săn đón liên tục .Shop cũng vì thế đã đem về 1 sẳn phẩm ADIDAS ULTRA BOOST 4.0 luôn được săn đón trên thị trường về VN. Liên hệ shop để có được 1 đổi ADIDAS ULTRA BOOST 4.0 thật đẹp nhé.', '4000000', 'adidas54.jpeg', 0, NULL, NULL),
(23, 'ADIDAS XPLR BLACK', '1', 14, 1, 'Giày ADIDAS XPLR BLACK\r\nMàu sắc :Đen\r\nHãng :ADIDAS', 'ADIDAS XPLR BLACK lại 1 sản phẩm rất đẹp đến từ ADIDAS và luôn được rất nhiều bạn trẻ thích thú. Shop cũng vì hiểu điều đó đã đem về VN sản phẩm này .Liên hệ shop để có được 1 đôi ADIDAS XPLR BLACK đẹp và sang chảnh nhé .', '1200000', 'hinh12.jpeg', 0, NULL, NULL),
(25, 'CHUCK TAYLOR 70S CDG', '1', 14, 8, 'Giày CHUCK TAYLOR 70S CDG\r\nMàu sắc : Đen\r\nHãng Converse', 'Giày CHUCK TAYLOR 70S CDG vẫn đang là 1 sản phẩm giày thời trang được rất nhiều bạn trẻ săn đón vì thế shop chung tôi đã tim hiểu và đưa nó về VN. Liên hệ shop để có được sản phẩm này nhé .', '2300000', 'hang-chinh-hang-converse-chuck-taylor-70s-cdg-black-white-201955.jpeg', 0, NULL, NULL),
(26, 'CHUCK TAYLOR 1970 OX', '1', 14, 8, 'Giày CHUCK TAYLOR 1970 OX\r\nMàu sắc : Đen\r\nHãng Converse', 'CHUCK TAYLOR 1970 OX đôi giày thần thánh 1 thời làm say mê biết bao nhiêu lứa 9x đã quay trở lại shop .Liên hệ shop để có thể nhanh chóng có được đôi giày này nhé .', '3000000', 'hang-chinh-hang-converse-chuck-taylor-1970-ox-low-black-201919.jpeg', 0, NULL, NULL),
(27, 'CHUCK TAYLOR ALL STAR', '1', 14, 8, 'Giày CHUCK TAYLOR ALL STAR\r\nMàu sắc : Đen\r\nHãng Converse', 'Converse đã bao lâu này là hãng được săn đón rộng rãi trên thi trường và CHUCK TAYLOR ALL STAR là 1 trong những sản phẩm rất hot hiện nay và hiểu điều đó shop đã có cho mình đôi giày này . Liên hệ shop ngay và luôn để có được em nó nhé .', '1700000', 'hang-chinh-hang-converse-chuck-taylor-all-star-1970-poplin-shirt-201927.jpeg', 0, NULL, NULL),
(28, 'CONVERSE CHUCK 70 ARCHIVE', '1', 14, 8, 'Giày CONVERSE CHUCK 70 ARCHIVE\r\nMàu sắc : Đỏ lửa \r\nHãng Converse', 'CONVERSE CHUCK 70 ARCHIVE với tông màu mới lạ đem lại cho bạn 1 sức sống mới mà ít đôi giày nào có thể có được . Liên hệ shop để có thể được hướng dẫn có sẳn phẩm này nhé .', '1700000', 'hang-chinh-hang-converse-chuck-70-archive-print-low-201997.jpeg', 0, NULL, NULL),
(29, 'CONVERSE CONS CTAS PRO', '1', 14, 8, 'Giày CONVERSE CONS CTAS PRO\r\nMàu sắc : Đen\r\nHãng Converse', 'CONVERSE CONS CTAS PRO 1 trong những đôi giày cổ cao đang rất hot hiện nay của hãng converse. Đó cũng là điều khiến shop có động lực đem về những đôi giày này đến với tay khách hàng nhanh nhất. Liên hệ để biết cách có được em nó nhé.', '3400000', 'hang-chinh-hang-converse-cons-ctas-pro-black-white-201958.jpeg', 0, NULL, NULL),
(30, 'NIKE AIR FORCE 1 LOW', '1', 14, 2, 'Giày NIKE AIR FORCE 1 LOW\r\nMàu sắc : Trắng \r\nHãng Nike', 'NIKE AIR FORCE 1 LOW đôi giày thời thượng và sang chảnh của nike luôn luôn là sản phẩm hot trên thị trường shop cũng hiểu và đã có được những sản phẩm này trong danh mục mua sắm . Liên hệ shop ngay để có được sẳn phẩm này nhé .', '3300000', 'hinh168.jpeg', 0, NULL, NULL),
(31, 'NIKE AIR JORDAN', '1', 14, 2, 'Giày NIKE AIR JORDAN\r\nMàu sắc : Nâu sữa \r\nHãng : Nike', 'NIKE AIR JORDAN đôi giày thể thao chuyên bóng rổ được rất nhiều cầu thủ chuyên nghiệp sử dụng trong thi đấu nay đã có mặt ở shop ,Nhanh tay liên hệ với shop để có được siêu phẩm này nhé .', '3800000', 'hinh152.jpeg', 0, NULL, NULL),
(32, 'NIKE AIR MAX 1', '1', 14, 2, 'Giày NIKE AIR MAX 1\r\nMàu sắc : Trắng\r\nHãng : Nike', 'NIKE AIR MAX 1 vẫn là em nó siêu phẩm của Nike vẫn đang là 1 trong những đôi giày không bao giờ hết hot trên thị trường . Shop đã có mình em nó nhanh chóng liên hệ shop để có được em nó nhé .', '5400000', 'hinh120.jpeg', 0, NULL, NULL),
(33, 'NIKE AIR MAX 97', '1', 14, 2, 'Giày NIKE AIR MAX 97\r\nMàu sắc : Trắng \r\nHãng : Nike', 'Đã bao giờ bạn suy nghĩ sẽ sắm cho mình 1 đôi giày hoàn hảo như NIKE AIR MAX 97 chưa. Đừng mở mộng nữa hay liên hệ ngay với shop để có thể có được em nó giá ổn định nhất nhé.', '4450000', 'hinh496.jpeg', 0, NULL, NULL),
(34, 'NIKE AIR ZOOM WINFLO', '1', 14, 2, 'Giày NIKE AIR ZOOM WINFLO\r\nMàu sắc : Trắng xanh\r\nHãng : Nike', 'NIKE AIR ZOOM WINFLO đôi giày mang cho minh phong cách rất thể thao và đẹp mắt của nike.Vẫn cách đó hãy cho shop biết bạn có muốn em nó không bằng việc liên hệ ngay với shop nhé .', '4100000', 'hinh153.jpeg', 0, NULL, NULL),
(35, 'NIKE PG 2.5 BLACK', '1', 14, 2, 'Giày NIKE PG 2.5 BLACK\r\nMàu sắc : Đen \r\nHãng Nike', 'NIKE PG 2.5 BLACK đôi giày mà shop cho rằng là có thiết kế rất bắt mắt của nike đang làm mưa làm gió trên thị trường thế giới và bằng cách nào đó shop vẫn đưa em nó về với đội mình. Liên hệ shop để có thể có được em nó nhé .', '3500000', 'hinh187.jpeg', 0, NULL, NULL),
(36, 'REEBOK CLASSIC CLUB C', '1', 14, 1, 'Giày REEBOK CLASSIC CLUB C\r\nMàu sắc : Trắng\r\nHãng Reebok', 'Hãng giày Reebok vẫn đang là hãng giày thời trang chưa bao giờ hết hot trên thị trường vì vậy hiểu điều đó shop đã đem về sản phẩm REEBOK CLASSIC CLUB C đang làm mưa gió trên thi trường. Liên hệ ngay để có được sản phẩm này nhé .', '1650000', 'hinh141.jpeg', 0, NULL, NULL),
(37, 'REEBOK CLASSIC WORKOUT', '1', 14, 6, 'Giày REEBOK CLASSIC WORKOUT\r\nMàu sắc : trắng \r\nHãng Reebok', 'REEBOK CLASSIC WORKOUT là đôi giày thể thao dụng cụ ngoài trời luôn được nhiều gymer săn đón hiểu điều đó shop đã có em nó trong danh sách sản phẩm . Liên hệ shop để có được sản phẩm này nhé .', '2300000', 'hinh182.jpeg', 0, NULL, NULL),
(38, 'REEBOK CORE BLACK', '1', 14, 6, 'Giày REEBOK CORE BLACK\r\nMàu sắc : Đen\r\nHãng Reebok', 'REEBOK CORE BLACK đôi giày thể thao thiết kế đep mắt đang được săn đón nhiều trên thị trường hiện nay . Hãy liên hệ ngay với shop để có được em nó nhé .', '3755000', 'hinh117.jpeg', 0, NULL, NULL),
(39, 'REEBOK DMX 1200', '1', 14, 1, 'Giày REEBOK DMX 1200\r\nMàu sắc : Trắng \r\nHãng Reebok', 'REEBOK DMX 1200 siêu phẩm của reebok nè các tinh yêu ơi , đôi giày bắt mắt nhất từ trước đến nay của reebok . Hãy mau mau liên hệ ngay với shop để rước em nó về team của mình nhé', '5400000', 'ádadss85.jpeg', 0, NULL, NULL),
(40, 'REEBOK INSTAPUMP FURY ORANGE', '1', 14, 6, 'Giày REEBOK INSTAPUMP FURY ORANGE\r\nMàu sắc : Da cam\r\nHãng Reebok', 'REEBOK INSTAPUMP FURY ORANGE đôi giày với phong cách rất mới mẻ chắc chắn sẽ đem lại cho bạn 1 cảm giác rất khác về những sẳn phẩm . Liên hệ với shop để có được sản phẩm này nhé .', '1350000', 'hinh138.jpeg', 0, NULL, NULL),
(41, 'REEBOK ROYAL ROJOS', '1', 14, 6, 'Giày REEBOK ROYAL ROJOS\r\nMàu sắc : Đỏ\r\nHãng Reebok', 'Sương sương 1 đôi giày đỏ chót cho ngày mới để đem lại năng lương cho 1 ngày dài nào các tình yêu ơi .Liên hệ ngay và luôn với shop để có được đôi giày đỏ chot này nha .', '2300000', 'hinh480.jpeg', 0, NULL, NULL),
(42, 'REEBOK SOLE FURY DARK', '1', 14, 6, 'Giày REEBOK SOLE FURY DARK\r\nMàu sắc : Xám đen\r\nHãng Reebok', 'REEBOK SOLE FURY DARK là đôi giày không thể không nhắc tới khi nói về hãng reebok. Đừng chừng chờ nữa hãy alo ngay với shop hoặc đặt hàng ngay trên đây về em nó nhé các bạn ơi .', '4300000', 'hinh182.jpeg', 0, NULL, NULL),
(43, 'PUMA BASKET BOW WHITE', '1', 14, 5, 'Giày PUMA BASKET BOW WHITE\r\nMàu sắc : Trắng \r\nHãng : PUMA', 'Puma là hãng giày thể thao không mới với giới trẻ và vì thế cũng là tiền đề để shop đem những sản phẩm như PUMA BASKET BOW WHITE về với khách hàng .Liên hệ với shop ngay nhé .', '3250000', 'hang-chinh-hang-puma-basket-bow-white-201917.jpeg', 0, NULL, NULL),
(44, 'PUMA RS-0 PLAY MULTI', '1', 14, 5, 'Giày PUMA RS-0 PLAY MULTI\r\nMàu sắc : Trắng \r\nHãng PUMA', 'Giày PUMA RS-0 PLAY MULTI là đôi giày cực phẩm của puma dành cho giới trẻ hay nhanh tay mau mau liên hệ với shop để sở hữu em nó nhé .', '1600000', 'flash-deal-50-hang-chinh-hang-puma-rs-0-play-multi-2019-og-flash-deal-today73.jpeg', 0, NULL, NULL),
(45, 'PUMA RS-X TROPHIES', '1', 14, 5, 'Giày PUMA RS-X TROPHIES\r\nMàu sắc : Đen \r\nHãng PUMA', 'Giày PUMA RS-X TROPHIES đang làm mưa làm gió trên thị trường bao giờ hết . Liên hệ ngay với shop để có được em nó nhé các tình yêu .', '2350000', 'hang-chinh-hang-puma-rs-x-trophies-black-gold-201929.jpeg', 0, NULL, NULL),
(46, 'PUMA STORM ADRENALINE', '1', 14, 5, 'Giày PUMA STORM ADRENALINE\r\nMàu sắc : Trắng \r\nHãng PUMA', 'Giày PUMA STORM ADRENALINE loại giày thể thao được sử dụng rất nhiều trong các phòng gym.Nếu bạn là gymer hay nhanh tay liên hệ với shop để có em nó nhé .', '1350000', 'hinh128.jpeg', 0, NULL, NULL),
(47, 'PUMA THUNDER RIVE DROITE', '1', 14, 5, 'Giày PUMA THUNDER RIVE DROITE\r\nMàu sắc : Trắng\r\nHãng PUMA', 'Những đôi giày PUMA vẫn chưa bao giờ hết hot các tình yêu nhỉ . PUMA THUNDER RIVE DROITE đang là sản phẩm mới của shop hay liên hệ đê trải nghiệm em nó nhé .', '4300000', 'hang-chinh-hang-puma-thunder-rive-droite-2019-best-sneaker35.jpeg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `created_at`, `updated_at`) VALUES
(1, 'Hieu truong', '123/123 TPHCM', '0932023992', 'hieutruong@gmail.com', 'Đơn hàng giao trong ngày', NULL, NULL),
(2, 'Hieu truong', 'dasdas', '0932023992', 'hieutruong@gmail.com', 'dasdadas', NULL, NULL),
(3, 'Châu', '123/123 TPHCM', '0932023992', 'chau@gmail.com', 'Dơn hàng giao nhanh', NULL, NULL),
(4, 'Hieu truong', '123/123 TPHCM', '0932023992', 'hieutruong@gmail.com', 'dasdasdas', NULL, NULL),
(5, 'Hoàng Sa Trường Sa', '123/123 TPHCM', '0932023992', 'hieutruong@gmail.com', 'Đơn hàng đặt', NULL, NULL),
(6, 'Hieu truong', '123/123 TPHCM', '0932023992', 'hieutruong@gmail.com', 'dasdasdasdasd', NULL, NULL),
(7, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '4444', NULL, NULL),
(8, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', 'ư', NULL, NULL),
(9, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '2', NULL, NULL),
(10, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '23', NULL, NULL),
(11, '23', '2323', '3232', '23', '32323', NULL, NULL),
(12, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', '23', '323', NULL, NULL),
(13, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '11', NULL, NULL),
(14, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '2323', NULL, NULL),
(15, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', '23', '42', NULL, NULL),
(16, 'hieupham', '121 a', '9604209', 'hieu@gmail.com', 'dfjbwehbfwehbfwe', NULL, NULL),
(17, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '2222222', NULL, NULL),
(18, 'hieupham', '121a', '123131232131', 'hieu@gmail.com', 'nfvjeinvevnervnerv', NULL, NULL),
(19, 'dsfsdfdsfÂdsfsdfsd', 'sdfdsf', '0368475269', 'dssdfs', 'dsfdsfdsfdsfdsfsdfsd', NULL, NULL),
(20, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', 'wwwww', NULL, NULL),
(21, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '333', NULL, NULL),
(22, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '333', NULL, NULL),
(23, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', '22222', NULL, NULL),
(24, 'le quy nam', '19  tay lan kp7  Phuong Binh Tri Dong A  Quan Binh Tan', '0368475269', 'quynamle123@gmail.com', 'W', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_chenlinkSP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_hinhanhSP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_tieude`, `slider_noidung`, `slider_chenlinkSP`, `slider_hinhanhSP`) VALUES
(6, 'qq', 'wqwqwq', '2323', 'nike-9787.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
