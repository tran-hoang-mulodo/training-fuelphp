-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2018 at 03:38 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopoline`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Khoa học'),
(2, 'Thề Thao'),
(3, 'Giáo dục'),
(4, 'Kinh tế'),
(7, 'Điện Ảnh');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_short` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description_short`, `description`, `author`, `created_at`, `category_id`, `status`) VALUES
(14, 'test1', 'Jack-ma.jpg', '1', '1', 'admin', '2018-08-24', 2, 1),
(15, 'test2', 'NH-Anh.jpg', '1', '2', 'admin', '2018-08-24', 3, 1),
(16, 'test3', 'NH-Anh.jpg', '4', '4', 'admin', '2018-08-25', 2, 1),
(17, 'test4', 'NH-Anh.jpg', '3', '4', 'hoang', '2018-08-25', 2, 1),
(18, 'test5', 'NH-Anh.jpg', '5', '5', 'hoang', '2018-08-25', 3, 1),
(19, 'test6', 'Jack-ma.jpg', '6', '6', 'admin', '2018-08-25', 4, 1),
(21, 'Báo Syria: May mắn vì được gặp Việt Nam', 'vn-syria.jpg', 'Tờ Al Wantan đánh giá Việt Nam là đối thủ vừa tầm với Syria, vì vậy cơ hội để đội bóng vùng Vịnh giành quyền vào bán kết Asiad 2018 là không nhỏ.', '*Trận đấu diễn ra lúc 19h30 hôm nay 27/8, trực tiếp trên VnExpress.\r\n\r\n“Trận đấu với Việt Nam đương nhiên khó khăn, nhưng vẫn dễ dàng hơn là phải đụng Hàn Quốc, Uzbekistan hay Nhật Bản. Syria may mắn khi ở vào nhánh đấu mang đến cho chúng ta một đối thủ vừa tầm”, cây bút Nasser Al Najjar viết.\r\n\r\nSyria từng đối đầu Việt Nam ở trận cuối vòng bảng giải U23 châu Á. Đội bóng vùng Vịnh khi đó thi đấu lấn lướt, tạo ra nhiều cơ hội nhưng không ghi được bàn thắng. Kết quả hòa 0-0 khiến họ bị loại, trong khi Việt Nam đi tiếp rồi gây tiếng vang lớn với chiến tích giành HC bạc. Bảy tháng sau, hai đội tái ngộ ở trận tứ kết môn bóng đá nam Asiad 2018.\r\n\r\n“Việt Nam không phải là ông lớn của bóng đá châu Á. Tuy nhiên, họ đang có bước phát triển rất nhanh gần đây. Bằng chứng là sau khi vào chung kết giải U23 châu Á, đội bóng này lại có mặt ở tứ kết Asiad. Trận đấu với Việt Nam tất nhiên sẽ khó khăn với Syria”, Al Wantan viết thêm.\r\n\r\nTờ nhật báo của Syria đặc biệt đánh giá cao hàng thủ của Việt Nam. Đoàn quân của HLV Park Hang-seo đá 4 trận mà chưa thủng lưới bàn nào (thắng Pakistan 3-0, Nepal 2-0, Nhật Bản 1-0 và Bahrain 1-0).\r\n\r\nỞ chiều ngược lại, truyền thông tự nhận thấy hệ thống phòng ngự đội nhà đang là điểm yếu, khi đã thủng lưới 5 bàn. Bù lại họ có các cầu thủ kỹ thuật ở giữa sân, có thể kiểm soát bóng tốt. Dẫu vậy, Al Wantan  cho rằng khi đối đầu Việt Nam, Syria không nên nắm giữ bóng nhiều mà nên chọn cách chơi phòng ngự - phản công, và mỗi khi có bóng phải tiến về phía khung thành đối phương thật nhanh.\r\n\r\nHLV Alfakeer Muhannad cũng cho rằng chơi đôi công với Việt Nam là mạo hiểm. “Chúng tôi phải nhẫn nhịn chờ đợi thời cơ. Nếu đá mạo hiểm rồi mắc sai lầm, Việt Nam sẽ không cho chúng tôi cơ hội sửa chữa”, nhà cầm quân của Syria nói.\r\n\r\nCũng theo Al Wantan, nếu trận đấu phải bước vào hiệp phụ, Syria sẽ có lợi thế bởi thể lực tốt hơn. Họ cũng đánh giá cao việc HLV Alfakeer Muhannad cho đội tập 11m kỹ càng trong buổi tập tối 26/8, bởi khả năng phân định bằng loạt luân lưu rất dễ xảy ra.', 'admin', '2018-08-27', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'qaz123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
