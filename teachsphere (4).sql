-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 07:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachsphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `adminId` int(11) NOT NULL,
  `adminGmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`adminId`, `adminGmail`, `adminPassword`) VALUES
(0, 'amitroy@gmail.com', '$2y$10$Ag7gDjpjrHL5m/SAUnpI6.ix2VavbU2IIXXgw.4cP7xUlqO9Bfm6i'),
(2001, 'admin3@teachsphere.org', '$2y$10$zNkNnxHbnnDv1DcmqlhHmOhDOwGwTV930HSKaFR7X7wp1XouV4GKC'),
(2024, 'admin@teachsphere.org', '123'),
(2025, 'admin2025@gmail.com', '$2y$10$VT7QPp5qbnHxmDFcO4hipesFHL0b1/f0Igcr25F3Uo.fT3hFSvetC');

-- --------------------------------------------------------

--
-- Table structure for table `request_tutor`
--

CREATE TABLE `request_tutor` (
  `Sid` int(11) DEFAULT NULL,
  `SeekerName` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `TeacherName` varchar(255) DEFAULT NULL,
  `Student_Quantity` int(11) DEFAULT NULL,
  `Student_Class` varchar(255) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Tuition_Days` varchar(255) DEFAULT NULL,
  `Tuition_time` text DEFAULT NULL,
  `Location` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `SlNo` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Review` text NOT NULL,
  `Dates` date NOT NULL DEFAULT current_timestamp(),
  `Timespan` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`SlNo`, `UserName`, `UserEmail`, `Review`, `Dates`, `Timespan`) VALUES
(1, 'Badhan Roy', 'badhan@gmail.com', 'hjb guyw hjb guywdn uwyhdjw uwakhjdnw suhdnw wihnlw wijn dn uwyhdjw uwakhjdnw suhdnw wihnlw wijn', '2024-12-21', '11:13:44'),
(2, 'Chitra Chy', 'chitra@gmail.com', 'When you talk to strangers in a chat room, the experience will always be unique. Talking to strangers is an important aspect when considering websites such as Talkwithstranger, because engaging other people from different regions is an interesting and worthwhile experience. Be it if you need just a random talk, want to meet someone new, or just want to have cult', '2025-01-02', '15:33:52'),
(3, 'Indrajit goswami', 'indrajit@gmail.com', 'This is about something very personal, in that it is not about myself, but about a parent, whom I shall refer to as ‘they’ (singular) here. Writing this has been somewhat cathartic, and any grammatical or other issues should be excused with the view that this is more an impulsive, stream-of-consciousness write-up than anything else.', '2025-01-25', '16:24:57'),
(4, 'halima Begum', 'halima@gmail.com', 'I came home last month, after 1.5 years of self and covid-enforced exile. The last 6 months were a mess I would not care to go through ever again, although, as many friends have suggested, this was just the trailer to the movie called life.', '2025-01-25', '16:26:11'),
(5, 'ChaoChao Marma', 'cmarma@gmail.com', 'Now that I think of it, more than the presence of parents, and just the general comfort of it all, it was the small things that I really missed. Parrots screeching their throats out at exactly 7 am outside my window, ', '2025-01-25', '16:27:20'),
(6, 'Rithesh Deshmukh', 'ritesh@gmail.com', 'I met friends I hadn’t met for almost 2 years, most of whom are married and with kids now. I haven’t yet mustered up the energy to envy them their settled lives, I was just happy to see them. Priyanka, now with a 6-month-old Prisha,', '2025-01-25', '16:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `seekerinfo`
--

CREATE TABLE `seekerinfo` (
  `Sid` int(11) NOT NULL,
  `SeekerName` varchar(255) DEFAULT NULL,
  `SeekerEmail` varchar(255) DEFAULT NULL,
  `SeekerPhone` varchar(15) DEFAULT NULL,
  `SeekerPass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerinfo`
--

INSERT INTO `seekerinfo` (`Sid`, `SeekerName`, `SeekerEmail`, `SeekerPhone`, `SeekerPass`) VALUES
(2, 'Rihana D Silva', 'rihana3644@gmail.com', '01478523698', '$2y$10$DotxrHvf1uQh457ETSQ7YepDYxUad3ra47GO3Uk9lexmXr7ypkLY6'),
(3, 'Mohammad Ahnaf Fayeaz', 'fayeaz2806@gmail.com', '01646650001', '$2y$10$dAtoAT1HM5JIgNs4kEBZFuuVvyGyVU6sT40rY1Ir3E8ezOJO/naNS'),
(4, 'Rohit', 'roh@gmail.com', '01478523698', '$2y$10$EzZ5eawRmBqAaMZ8eV.jHOJ3m53B/B4EWuSqlIHjBh7OV62UllLoK'),
(5, 'Kishore Haldar', 'khaldar420@gmail.com', '01789632541', '$2y$10$Yy6bC18NfyFVFeC4IgCCBukEiDSoNFCZIWS1S2Az.BvHxW5vRWyGK'),
(6, 'Ritesh', 'ritesh@gmail.com', '01789632545', '$2y$10$0XGrkL5d48XB5n3wAERBxugIn3TVTuic65K1RuJ/dS6Tjkywn5n4u');

-- --------------------------------------------------------

--
-- Table structure for table `tutionposts`
--

CREATE TABLE `tutionposts` (
  `id` int(6) UNSIGNED NOT NULL,
  `Sid` int(11) NOT NULL,
  `SeekerName` text NOT NULL,
  `class` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `medium` varchar(20) NOT NULL,
  `days` int(2) NOT NULL,
  `location` varchar(100) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `Other_Requirements` text DEFAULT '\'Nothing Special\'',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TeacherName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutionposts`
--

INSERT INTO `tutionposts` (`id`, `Sid`, `SeekerName`, `class`, `gender`, `subject`, `medium`, `days`, `location`, `salary`, `Other_Requirements`, `reg_date`, `TeacherName`) VALUES
(1, 0, 'Rihana D Silva', '9', 'Any', 'physics', 'Bangla', 4, 'Enayetbajar', '2000', 'CUET student', '2025-01-27 09:51:21', 'Antu Saha'),
(3, 0, 'Kishore Haldar', '5', 'Female', 'All', 'Bangla', 5, 'Korbani ganj', '3974', 'Nothing Special', '2025-01-27 12:13:43', 'Suconda Mitra'),
(5, 0, 'Rohit', '5', 'Female', 'All', 'Bangla', 5, 'Korbani ganj', '3974', 'Nothing Special', '2025-01-27 09:52:10', ''),
(6, 0, 'Ritesh', '3', 'Female', 'All', 'English', 4, 'Anderkilla', '3000', 'Engineering Student.', '2025-01-27 09:52:21', ''),
(7, 0, 'Mohammad Ahnaf Fayeaz', '3', 'Female', 'All', 'English', 4, 'Anderkilla', '3000', 'Engineering Student.', '2025-01-27 09:50:58', ''),
(8, 0, 'Kishore Haldar', '5', 'Male', 'Mathematics', 'Bangla', 3, 'Pathorghata', '2999', 'Engineering Student', '2025-01-27 09:51:46', ''),
(9, 0, 'Ritesh', '9', 'Female', 'Science Subjects', 'Bangla', 1, 'Borof kol, Batali road, Enayet bajar', '3498', 'Running University Student', '2025-01-27 09:52:35', ''),
(10, 3, 'Mohammad Ahnaf Fayeaz', '5', 'Any', 'English, গণিত, বিজ্ঞান ', 'Bangla', 6, 'South Halisohor', '3000', 'Nothing Special', '2025-01-27 09:48:05', 'Oishi Das');

-- --------------------------------------------------------

--
-- Table structure for table `tutorinfo`
--

CREATE TABLE `tutorinfo` (
  `id` int(11) NOT NULL,
  `TeacherName` varchar(255) DEFAULT NULL,
  `TeacherEmail` varchar(255) DEFAULT NULL,
  `TeacherPhone` varchar(15) DEFAULT NULL,
  `TeacherPass` varchar(255) DEFAULT NULL,
  `Certificates` varchar(255) DEFAULT NULL,
  `TutorDP` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `sessionyear` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Availiabity` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `preferred_area` varchar(255) DEFAULT NULL,
  `Preferred_Classes` varchar(256) DEFAULT NULL,
  `Preferred_Subjects` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorinfo`
--

INSERT INTO `tutorinfo` (`id`, `TeacherName`, `TeacherEmail`, `TeacherPhone`, `TeacherPass`, `Certificates`, `TutorDP`, `division`, `department`, `institute`, `sessionyear`, `gender`, `address`, `Availiabity`, `experience`, `preferred_area`, `Preferred_Classes`, `Preferred_Subjects`) VALUES
(9, 'Amit Roy', 'amit@gmail.com', '01478523695', '$2y$10$oI2dHY670Vry9xLA6ct7YuOn6EtdRRC/zTUXMaXNICNyn.0jHJk2C', '4-1 SE Ch02.pdf', '20230121_185530.jpg', 'Chattogram', 'Computer Science & Engineering', 'Port City International University', '3rd ', 'male', 'Enayet Bajar, Chattogram', 'Available', '4', 'Enayetbajar, BRTC', '6 - SSC(Science)', '6-8 all Subjects, SSS Science subjects + Math'),
(12, 'Dhrub Rathee', 'dhrub@gmail.com', '01974123654', '$2y$10$rR5piZrmVY2Di9zm9UI5..5t8CScb7vMfgO1lnKWT0I97Ek82aUbe', 'Applications.pdf', '67938905581a5_Dhruuba.jpeg', 'Dhaka', 'Mechanical Engineering', 'Titumir University', '4', 'male', 'Gulistan', 'Available', '3', 'Gulistan, Farmgate', '6-HSC', 'Math, English, Physics'),
(13, 'Oishi Das', 'oishidas@gmail.com', '01712369854', '$2y$10$lKA.x8PObwraCls3yKBCzexOOjyJRX29kgJh9R4ih6mf8nRkjSOJ.', 'suva.png', 'oishi.png', 'Chattogram', 'BBA', 'Chattogram University', '3rd', 'female', 'Patherghata, Chattogram', 'Available', '4', 'Patherghata, Anderkilla, New market', 'SSC, HSC, University Admission', 'Commerece Group Subjects'),
(14, 'Jarin Tasnin Anika', 'jarin555@gmail.com', '01785412365', '$2y$10$8emO9YkoQKOcdXrR03bz.eFdf8dsyXjtFqxli1E3hTEPjh9.PBxVi', 'BADHAN  ROY  AMIT for Tution.pdf', 'anika.jpg', 'Chattogram', 'Computer Science & Engineering', 'Port City International University', '3rd ', 'female', 'Port Colony', 'Available', '3', 'Port Colony', '9,SSC, HSC', 'Maths, Science, English, Science Subjects, ICT'),
(15, 'Payel Chowdhury', 'pchy@gmail.com', '01223456789', '$2y$10$9VZzbQTkKs8hW8/UXJv8KucRom80SaBameVXMZP03x2f.BessaXR6', 'Peripherals_Lec3[1].pdf', 'payelPIC.jpg', 'Chattogram', 'CSE', 'Pciu', '3rd', 'female', 'CTG', 'Available', '2', 'Andorkilla', '4, 5, 6, 7, 8', 'All Subjects'),
(16, 'Shahriar Shihab', 'shahriarshihab110@gmail.com', '01533168260', '$2y$10$OZw/iHUi7s5jZHwmJsOCPOVwAeCf9fSkDL.RicMukGn9lWqP72fzy', '4-1 SE Ch02.pdf', '469327690_3608896956077321_1382479498867544186_n.jpg', 'Chattogram', 'CSE', 'PCIU', '2022', 'male', 'Khulshi', 'Not Available', '2', 'Khulshi, GEC', 'SSC, HSC', 'English, ICT'),
(17, 'Salmin Hasnat', 'hasu@gmail.com', '01478523698', '$2y$10$8oLrBfQsPbZviU1S256nvOKUds6hBjwaQwn9X2zej/k8egNhpxXNa', 'Peripherals_Lec3[1].pdf', '679379a5cd6ea_Hasnat.jpg', 'Chattogram', 'PHARMACY', 'USTC', '3', 'male', 'Bakolia', 'Not Available', '3', 'Bakolia', '8,9,10, SSC, HSC', 'Science, BGS, ICT, Biology, Chemistry'),
(19, 'Vinod Chopra', 'vinod@gmail.com', '01714318463', '$2y$10$sVyjZEVNGyL.caa75tx8qOuSmxKIHaYh3L7aKXqzYVlTY1pR311rG', '9-10 bangla 1st Sahityo.pdf', 'vinod.jpeg', 'Sylhet', 'EEE', 'BUET', '4', 'male', 'Nilkhet, Dhaka', 'Available', '3', 'Fargate, Nilkhet', 'HSC, MAT, EAT, UAT', 'Maths, Physics, ICT, English'),
(23, 'Antu Saha', 'antusaha@gmail.com', '01654789235', '$2y$10$yI9i5Y7Fd.DLk6BHfL1dMekw7Sm4uzrtVtwTbEyF/CE/lvHFw/4t6', 'Resume - Antu Saha.pdf', 'Antu.JPG', 'Dhaka', 'Accounting', 'Dhaka University', '4', 'male', 'dalpotti, Narayanganj', 'Not Available', '5', 'dalpotti, tanbajar, Narayanganj', 'SSC, HSC', 'Accounting'),
(25, 'Ramesh Pandya', 'ramu25@gmail.com', '01789654125', '$2y$10$.WM4QbTgeXze2cJzP4Ksz.iPOl/DUc507c.KCYF/wr84KGeNuRr6q', 'a.pdf', '6793c3f80e5bb_Ramesh.jpeg', 'Chattogram', 'Finance', 'Mohsin College', '3', 'male', 'Chawkbajar, Chattogram', 'Available', '2', 'Chawkbajar, Jamal khan', '5, 6, 7, 8', 'All Subjects'),
(27, 'Md. Rahmatullah', 'rahmatiiuc@gmail.com', '01786786786', '$2y$10$L7lG2FUqdSwtQ/VdXE2hdOQ9BBYXGQX/NqO/YQCVWtNjYYKrZdZN6', '২০ শে জানুয়ারী.pdf', '6795af04a7804_rahmatullah.png', 'Chattogram', 'Electrical and Electronics Engineering', 'International Islamic University Chittagong', 'MSc', 'male', 'Chawbazar', 'Available', '6', 'Chawbazar, Jamal Khan', 'HSC, Engineering Admission', 'Math, Physics'),
(28, 'Farjana Rahman', 'frahman@gmail.com', '01716251420', '$2y$10$qmb1sLpPa/8gSxXUdAI1puErNyk.6SYMbEDnKrOqezSYXHIAG.zLa', 'ch01.pdf', '6795b175dc882_Farjana.jpeg', 'Chattogram', 'Mathematics', 'Govt. City College, Chattogram', '4', 'female', 'Sodorghat', 'Available', '5', 'Sodorghat, New Market, Ice Factory Road', '8 - SSC , HSC', 'Math, Physics'),
(29, 'Suconda Mitra', 'suchi@gmail.com', '017896512356', '$2y$10$4.zNgjxF5EPVaR/0Z/09XuQueK7LsROFXW/cb3tBsqxgdjGUVdbP6', 'Resume of Suchi.pdf', '679777bae55a4_sunonda.jpeg', 'Dhaka', 'Marketting', 'Eden Mohila College', '3', 'female', 'Ajimpur', 'Available', '4', 'Ajimpur', '6 - SSC', '6 to 8 All Subjects, SSC Commerce Group Subjects');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`SlNo`);

--
-- Indexes for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `tutionposts`
--
ALTER TABLE `tutionposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorinfo`
--
ALTER TABLE `tutorinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `SlNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  MODIFY `Sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutionposts`
--
ALTER TABLE `tutionposts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tutorinfo`
--
ALTER TABLE `tutorinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
