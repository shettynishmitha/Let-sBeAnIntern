-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 08:32 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `let'sbeanintern`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `c_id` bigint(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `c_name`, `city`, `details`, `image`) VALUES
(1, 'Wipro', 'Bangalore', 'WIPRO Group is an Indian multinational corporation that provides information technology, consulting and business process services. It is headquartered in Bangalore, Karnataka, India.In 2013, Wipro separated its non-IT businesses and formed the privately owned Wipro Enterprises.', 'company/wipro.png'),
(2, 'Infosys', 'Mysore', 'Infosys Limited is an Indian multinational corporation that provides business consulting, information technology and outsourcing services. It has its headquarters in Bangalore, Karnataka, India.On March 29, 2019, its market capitalisation was $46.52 billion.', 'company/infosys.png'),
(3, 'TCS', 'Chennai', 'Tata Consultancy Services Limited is an Indian multinational information technology service and consulting company headquartered in Mumbai, Maharashtra, India. It is a subsidiary of Tata Group and operates in 149 locations across 46 countries. TCS is the second largest Indian company by market capitalization.', 'company/tcs.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `compcourse`
-- (See below for the actual view)
--
CREATE TABLE `compcourse` (
`course_id` bigint(255)
,`course_name` varchar(255)
,`slots` bigint(22)
,`company` varchar(255)
,`price` bigint(255)
,`details` text
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` bigint(255) NOT NULL,
  `slots` int(10) NOT NULL,
  `company` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `details`, `price`, `slots`, `company`, `image`) VALUES
(1, 'Big Data', 'Big data is a field that treats ways to analyze, systematically extract information from, or otherwise deal with data sets that are too large or complex to be dealt with by traditional data-processing application software. Data with many cases (rows) offer greater statistical power, while data with higher complexity (more attributes or columns) may lead to a higher false discovery rate. Big data challenges include capturing data, data storage, data analysis, search, sharing, transfer, visualization, querying, updating, information privacy and data source.', 4500, 10, 'Infosys', 'courses/Big Data.png'),
(2, 'Web Development', 'Web development is the work involved in developing a web site for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web-based internet applications (web apps), electronic businesses, and social network services. A more comprehensive list of tasks to which web development commonly refers, may include web engineering, web design, web content development, client liaison, client-side/server-side scripting, web server and network security configuration, and e-commerce development.', 5000, 14, 'Infosys', 'courses/Web Development.png'),
(3, 'Networking', 'Networking, also known as computer networking, is the practice of transporting and exchanging data between nodes over a shared medium in an information system. Networking comprises not only the design, construction and use of a network, but also the management, maintenance and operation of the network infrastructure, software and policies.\r\n\r\n\r\nComputer networking enables devices and endpoints to be connected to each other on a local area network (LAN) or to a larger network, such as the internet or a private wide area network (WAN). ', 2500, 10, 'Wipro', 'courses/Networking.png'),
(4, 'Python', 'Python is a widely used general-purpose, high level programming language. It was initially designed by Guido van Rossum in 1991 and developed by Python Software Foundation. It was mainly developed for emphasis on code readability, and its syntax allows programmers to express concepts in fewer lines of code.\r\n\r\nPython is a programming language that lets you work quickly and integrate systems more efficiently.', 7000, 10, 'Infosys', 'courses/Python.png'),
(5, 'Big Data', 'Big data is a field that treats ways to analyze, systematically extract information from, or otherwise deal with data sets that are too large or complex to be dealt with by traditional data-processing application software. Data with many cases (rows) offer greater statistical power, while data with higher complexity (more attributes or columns) may lead to a higher false discovery rate. Big data challenges include capturing data, data storage, data analysis, search, sharing, transfer, visualization, querying, updating, information privacy and data source.', 4000, 20, 'wipro', 'courses/Big Data.png'),
(6, 'Python', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', 5000, 3, 'Wipro', 'courses/Python.png'),
(7, 'Core Java', '\"Core Java\" is Sun\'s term, used to refer to Java SE, the standard edition and a set of related technologies, like the Java VM, CORBA, et cetera. This is mostly to differentiate from, say, Java ME or Java EE. Also note that they\'re talking about a set of libraries rather than the programming language.', 4500, 20, 'TCS', 'courses/Core Java.png'),
(8, 'Networking', 'Networking, also known as computer networking, is the practice of transporting and exchanging data between nodes over a shared medium in an information system. Networking comprises not only the design, construction and use of a network, but also the management, maintenance and operation of the network infrastructure, software and policies. Computer networking enables devices and endpoints to be connected to each other on a local area network (LAN) or to a larger network, such as the internet or a private wide area network (WAN).', 4500, 15, 'TCS', 'courses/Networking.png'),
(9, 'Android App Development', 'Android is a mobile operating system based on a modified version of the Linux kernel and other open source software, designed primarily for touchscreen mobile devices such as smartphones and tablets. Android is developed by a consortium of developers known as the Open Handset Alliance, with the main contributor and commercial marketer being Google.Initially developed by Android Inc., which Google bought in 2005, Android was unveiled in 2007, with the first commercial Android device launched in September 2008. The current stable version is Android 10, released on September 3, 2019. The core Android source code is known as Android Open Source Project (AOSP)', 4500, 20, 'TCS', 'courses/Android App Development.png'),
(10, 'Core Java', 'jxslhxsahxl', 5000, 2, 'Infosys', 'courses/Core Java.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `collegename` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `semester` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `phone`, `email`, `branch`, `collegename`, `company`, `course_name`, `semester`, `date`, `time`) VALUES
(1, 'Nishmitha', 'Shetty', 7899938640, 'nishmitha.16cs046@sode-edu.in', 'cse', 'smvitm', 'infosys', 'Big Data', 7, '2019-11-19', '18:39:52.000000'),
(2, 'Nisha', 'J', 8487636762, 'nisha@gmail.com', 'cse', 'smvitm', 'infosys', 'Web Development', 7, '2019-11-19', '19:11:46.000000'),
(3, 'Narendra', '', 7411522246, 'narendra@gmail.com', 'cse', 'smvitm', 'wipro', 'Big Data', 7, '2019-11-20', '09:24:51.000000'),
(4, 'Archana', 'Hebbar K V', 8073965055, 'hebbar.kn@gmail.com', 'cse', 'smvitm', 'infosys', 'Web Development', 7, '2019-11-28', '11:29:11.000000'),
(5, 'Manasa', 'S', 7854963215, 'manasa@gmail.com', 'cse', 'smvitm', 'wipro', 'Python', 6, '2019-12-05', '09:38:30.000000'),
(7, 'Kripa', 'Nayak', 8487636772, 'kripa@gmail.com', 'ece', 'smvitm', 'TCS', 'Android App Development', 6, '2019-12-05', '10:09:43.000000'),
(10, 'Pooja', 'Acharya', 8497636762, 'pooja@gmail.com', 'ece', 'smvitm', 'Wipro', 'Networking', 6, '2019-12-05', '10:17:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `compcourse`
--
DROP TABLE IF EXISTS `compcourse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compcourse`  AS  (select `c`.`course_id` AS `course_id`,`c`.`course_name` AS `course_name`,`c`.`slots` - count(`s`.`id`) AS `slots`,`c`.`company` AS `company`,`c`.`price` AS `price`,`c`.`details` AS `details`,`c`.`image` AS `image` from (`courses` `c` left join `student` `s` on(`c`.`course_name` = `s`.`course_name` and `c`.`company` = `s`.`company`)) group by `c`.`course_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`,`company`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
