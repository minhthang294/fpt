-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2019 lúc 04:11 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fpt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coursecate`
--

CREATE TABLE `coursecate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coursecate`
--

INSERT INTO `coursecate` (`id`, `name`) VALUES
(1, 'Bussiness'),
(2, 'Computing'),
(3, 'Designing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `coursecateid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `coursecateid`) VALUES
(2, 'Digital Marketing', 1),
(3, '3D Movie', 3),
(4, 'Advanced Programming', 2),
(6, 'Drawing Concept', 3),
(7, 'Sale Management', 1),
(8, 'Cloud Computing', 1),
(9, 'Algorithms', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listtopic`
--

CREATE TABLE `listtopic` (
  `topicid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `listtopic`
--

INSERT INTO `listtopic` (`topicid`, `courseid`) VALUES
(5, 2),
(6, 2),
(8, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listtrainee`
--

CREATE TABLE `listtrainee` (
  `courseid` int(11) NOT NULL,
  `traineeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `listtrainee`
--

INSERT INTO `listtrainee` (`courseid`, `traineeid`) VALUES
(2, 10),
(2, 8),
(2, 13),
(9, 5),
(9, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `trainerid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id`, `name`, `trainerid`) VALUES
(3, 'GCH0801', 10),
(4, 'GCH0905', 10),
(5, 'GCH0801', 2),
(6, 'GCH0705', 10),
(7, 'GBH1234', 10),
(8, 'GCH0905', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trainee`
--

CREATE TABLE `trainee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `DoB` date NOT NULL,
  `education` varchar(100) NOT NULL,
  `programLang` varchar(100) NOT NULL,
  `TOEIC` int(11) NOT NULL,
  `experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trainee`
--

INSERT INTO `trainee` (`id`, `name`, `DoB`, `education`, `programLang`, `TOEIC`, `experience`) VALUES
(2, 'Thang', '1999-09-02', 'harvard', 'ALl', 9999, 'HIGH'),
(3, 'Nam Pham', '1994-07-21', 'Ph.D', 'C++', 560, 'I have alot experience'),
(5, 'Tung ', '1995-09-13', 'Ph.D', 'C++', 450, 'hihi'),
(8, 'Yo man', '1997-09-14', 'GreenWich', 'C#', 1222, 'hihi'),
(9, 'Akira Phan', '1994-03-12', 'Ph.D', 'JavaS', 897, 'HIGH'),
(10, 'Saitaman', '1993-09-21', 'Master', 'JavaS', 300, 'hihi'),
(11, 'Son Goku', '1976-08-15', 'GreenWich', 'C++', 300, 'I have alot experience'),
(12, 'Iron man', '1965-04-04', 'Avengers', 'JavaS', 990, 'SUPER SUPER HIGH'),
(13, 'Thor', '0001-04-12', 'Asgard', 'Asgardian', 700, 'HIGH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `role`, `address`) VALUES
(1, 'thang@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'thang', 'pham', 'admin', 'Hanoi'),
(2, 'trainer@mail.com', '2c065aae9fcb37b49043a5a2012b3dbf', 'Nam', 'Pham', 'trainer', 'Vinh Phuc'),
(8, 'thangpham', '81dc9bdb52d04dc20036dbd8313ed055', 'Minh', 'thang pham', 'staff', 'Ha Dong'),
(10, 'vyv@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyá»…n', 'Vy', 'trainer', 'Ha Tay'),
(12, 'hihihi', '81dc9bdb52d04dc20036dbd8313ed055', 'Pháº¡m', 'THáº¯ng', 'trainer', 'Ha Nam');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `coursecate`
--
ALTER TABLE `coursecate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cate` (`coursecateid`);

--
-- Chỉ mục cho bảng `listtopic`
--
ALTER TABLE `listtopic`
  ADD KEY `fk_course_topic` (`courseid`),
  ADD KEY `fk_topic` (`topicid`);

--
-- Chỉ mục cho bảng `listtrainee`
--
ALTER TABLE `listtrainee`
  ADD KEY `fk_course` (`courseid`),
  ADD KEY `fk_trainee` (`traineeid`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trainer` (`trainerid`);

--
-- Chỉ mục cho bảng `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `coursecate`
--
ALTER TABLE `coursecate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `trainee`
--
ALTER TABLE `trainee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`coursecateid`) REFERENCES `coursecate` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `listtopic`
--
ALTER TABLE `listtopic`
  ADD CONSTRAINT `fk_course_topic` FOREIGN KEY (`courseid`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_topic` FOREIGN KEY (`topicid`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `listtrainee`
--
ALTER TABLE `listtrainee`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`courseid`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_trainee` FOREIGN KEY (`traineeid`) REFERENCES `trainee` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `fk_trainer` FOREIGN KEY (`trainerid`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
