-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 12:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `name` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`name`, `id`, `institute`) VALUES
('nomesh', '64eb3fba8a505', 'IIT Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `name` varchar(255) NOT NULL,
  `uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`name`, `uid`) VALUES
('Department of Architecture and Planning', 'q1w2ebsajld'),
('Department of Applied Mathematics and Scientific Computing', '65w4f65w4f'),
('Department of Biosciences and Bioengineering', 'efwt3'),
('Department of Chemical Engineering', 'fsbg4w323'),
('Department of Chemistry', 'brw4tkjhk'),
('Department of Civil Engineering', 'dfbg245rb45');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `uid` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `approved` text NOT NULL,
  `studentid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`uid`, `subject`, `grade`, `date`, `approved`, `studentid`) VALUES
('64e2578bf1f1d', 'aabb', 'eecc', '2023-08-18', 'Pending', '64eb4d081c173');

-- --------------------------------------------------------

--
-- Table structure for table `iit_name`
--

CREATE TABLE `iit_name` (
  `name` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iit_name`
--

INSERT INTO `iit_name` (`name`, `uid`) VALUES
('IIT Kharagpur', 'q1w2e'),
('IIT Bombay', '34tegeg'),
('IIT Madras', 'efwt3'),
('IIT Kanpur', 'fsbg4w'),
('IIT Delhi', 'brw4t'),
('IIT Guwahati', 'dfbgrb45'),
('IIT Roorkee', 'sffg45'),
('IIT Ropar', 'rbe445gfr'),
('IIT Bhubaneswar', 'sfb44'),
('IIT Gandhinagar', 'frg4g'),
('IIT Hyderabad', 'rrgf44'),
('IIT Jodhpur', 'yjyk67uk'),
('IIT Patna', 'yjh45tr'),
('IIT Indore', 'g354yh'),
('IIT Mandi', 'gh345h'),
('IIT Varanasi', 'feefwef'),
('IIT Palakkad', 'ntn4'),
('IIT Tirupati', 'rn4ttrnh'),
('IIT Dhanbad', 'wehb345r'),
('IIT Bhilai', 'whgw43h'),
('IIT Dharwad', 'rtbh4h'),
('IIT Jammu', 'g3wg3w4h5'),
('IIT Goa', 'g4w5h4wh');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `journal_name` varchar(255) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `publish_date` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `journal_link` varchar(255) NOT NULL,
  `journal_website` varchar(255) NOT NULL,
  `studentid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`journal_name`, `uid`, `publish_date`, `approved`, `journal_link`, `journal_website`, `studentid`) VALUES
('aall', '64e257762d553', '2023-08-20', 'Pending', 'aa', 'aaaa', '64eb4d081c173');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `studentid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

-- INSERT INTO `login` (`username`, `password`, `uid`, `studentid`) VALUES
-- ('shallu@iitd.in', 'qwerty', '64eb4d081c177', '64eb4d081c173'),
-- ('IIT Jammu', '123456', '64eb4d081c177', '64eb4d081c173'),
-- ('nomesh_bolia', 'qwerty', '64eb4d081c177', '64eb4d081c173'),
-- ('diacoordinator', 'qwerty', '64eb4d081c177', '64eb4d081c173'),
-- ('Ryno.Settrisman', 'RTSMAN', '64eb4d081c178', '64eb4d081c174'),
-- ('Hok.Chheangkhy', 'HKCHHY', '64eb4d081c179', '64eb4d081c175'),
-- ('Cho.Win', 'CHWANG', '64eb4d081c180', '64eb4d081c176'),
-- ('Thandar.Zaw', 'THZWIN', '64eb4d081c181', '64eb4d081c177'),
-- ('Tran.Dang', 'TRDNHN', '64eb4d081c182', '64eb4d081c178'),
-- ('Rithy.Khouy', 'RTHKUY', '64eb4d081c183', '64eb4d081c179'),
-- ('Pham.Hanh', 'PHNGHN', '64eb4d081c184', '64eb4d081c180'),
-- ('Nguyen.Huyen', 'NGTHLY', '64eb4d081c185', '64eb4d081c181'),
-- ('Ramzul.Riza', 'RMZIRR', '64eb4d081c186', '64eb4d081c182'),
-- ('Zun.Mo', 'ZNPHMO', '64eb4d081c187', '64eb4d081c183'),
-- ('Kyawt.Thein', 'KYTMTH', '64eb4d081c188', '64eb4d081c184'),
-- ('Made.Widyatmika', 'MDWDTK', '64eb4d081c189', '64eb4d081c185'),
-- ('Zin.Myint', 'ZMRMYT', '64eb4d081c190', '64eb4d081c186'),
-- ('Mario.Poluakan', 'MRVLPK', '64eb4d081c191', '64eb4d081c187'),
-- ('Phyu.Cho', 'PHYPCH', '64eb4d081c192', '64eb4d081c188'),
-- ('Khin.Win', 'KHNCHW', '64eb4d081c193', '64eb4d081c189'),
-- ('Phyu.Mon', 'PHYPMN', '64eb4d081c194', '64eb4d081c190'),
-- ('Antonio.Regis', 'ANTJFR', '64eb4d081c195', '64eb4d081c191'),
-- ('Diana.Slyvia', 'DNASLV', '64eb4d081c196', '64eb4d081c192'),
-- ('Anggy.Pratiwi', 'ANGKPR', '64eb4d081c197', '64eb4d081c193'),
-- ('Nurdini.Chusna', 'NRDTCH', '64eb4d081c198', '64eb4d081c194'),
-- ('Tin.Htay', 'TNMGHT', '64eb4d081c199', '64eb4d081c195'),
-- ('Fatihah.Sari', 'FTFJRS', '64eb4d081c200', '64eb4d081c196'),
-- ('Fransiska.Arumsari', 'FRSNAA', '64eb4d081c201', '64eb4d081c197'),
-- ('Nwe.Kyaw', 'NWNKYW', '64eb4d081c202', '64eb4d081c198'),
-- ('Sivaraman.rajah', 'SVRRJR', '64eb4d081c203', '64eb4d081c199'),
-- ('Thich.Nguyen', 'THCVNG', '64eb4d081c204', '64eb4d081c200'),
-- ('Arvin.Subramaniam', 'ARVGSM', '64eb4d081c205', '64eb4d081c201'),
-- ('Thy.Doan', 'THYTRD', '64eb4d081c206', '64eb4d081c202'),
-- ('Andri.Maulana', 'ANDMLN', '64eb4d081c207', '64eb4d081c203'),
-- ('Adi.Nugroho', 'ADINGH', '64eb4d081c208', '64eb4d081c204'),
-- ('Phyo.Yee', 'PHYTYE', '64eb4d081c209', '64eb4d081c205'),
-- ('Khadijah.Udhayana', 'KHDFRU', '64eb4d081c210', '64eb4d081c206'),
-- ('Nurtria.Rahmadi', 'NRRRHD', '64eb4d081c211', '64eb4d081c207'),
-- ('Jetwadee.Phanthanachai', 'JTPHCH', '64eb4d081c212', '64eb4d081c208'),
-- ('Nguyen.Bich', 'NGTNGB', '64eb4d081c213', '64eb4d081c209'),
-- ('Yuana.Delvika', 'YUNDVK', '64eb4d081c214', '64eb4d081c210'),
-- ('Kay.Soe', 'KYKHSG', '64eb4d081c215', '64eb4d081c211'),
-- ('Moh.Myint', 'MHMYTH', '64eb4d081c216', '64eb4d081c212'),
-- ('Deborah.Mozes', 'DBRPGR', '64eb4d081c217', '64eb4d081c213');

INSERT INTO `login` (`username`, `password`, `uid`, `studentid`) VALUES
('shallu@iitd.in', 'qwerty', '64eb4d081c177', '64eb4d081c173'),
('IIT Jammu', '123456', '64eb4d081c177', '64eb4d081c173'),
('nomesh_bolia', 'qwerty', '64eb4d081c177', '64eb4d081c173'),
('diacoordinator', 'qwerty', '64eb4d081c177', '64eb4d081c173'),
('Ryno.Settrisman', 'RTSMAN', '64eb4d081c178', '64eb4d081c174'),
('Hok.Chheangkhy', 'HKCHHY', '64eb4d081c179', '64eb4d081c175'),
('Cho.Win', 'CHWANG', '64eb4d081c180', '64eb4d081c176'),
('Thandar.Zaw', 'THZWIN', '64eb4d081c181', '64eb4d081c177'),
('Tran.Dang', 'TRDNHN', '64eb4d081c182', '64eb4d081c178'),
('Rithy.Khouy', 'RTHKUY', '64eb4d081c183', '64eb4d081c179'),
('Pham.Hanh', 'PHNGHN', '64eb4d081c184', '64eb4d081c180'),
('Nguyen.Huyen', 'NGTHLY', '64eb4d081c185', '64eb4d081c181'),
('Ramzul.Riza', 'RMZIRR', '64eb4d081c186', '64eb4d081c182'),
('Zun.Mo', 'ZNPHMO', '64eb4d081c187', '64eb4d081c183'),
('Kyawt.Thein', 'KYTMTH', '64eb4d081c188', '64eb4d081c184'),
('Made.Widyatmika', 'MDWDTK', '64eb4d081c189', '64eb4d081c185'),
('Zin.Myint', 'ZMRMYT', '64eb4d081c190', '64eb4d081c186'),
('Mario.Poluakan', 'MRVLPK', '64eb4d081c191', '64eb4d081c187'),
('Phyu.Cho', 'PHYPCH', '64eb4d081c192', '64eb4d081c188'),
('Khin.Win', 'KHNCHW', '64eb4d081c193', '64eb4d081c189'),
('Phyu.Mon', 'PHYPMN', '64eb4d081c194', '64eb4d081c190'),
('Antonio.Regis', 'ANTJFR', '64eb4d081c195', '64eb4d081c191'),
('Diana.Slyvia', 'DNASLV', '64eb4d081c196', '64eb4d081c192'),
('Anggy.Pratiwi', 'ANGKPR', '64eb4d081c197', '64eb4d081c193'),
('Nurdini.Chusna', 'NRDTCH', '64eb4d081c198', '64eb4d081c194'),
('Tin.Htay', 'TNMGHT', '64eb4d081c199', '64eb4d081c195'),
('Fatihah.Sari', 'FTFJRS', '64eb4d081c200', '64eb4d081c196'),
('Fransiska.Arumsari', 'FRSNAA', '64eb4d081c201', '64eb4d081c197'),
('Nwe.Kyaw', 'NWNKYW', '64eb4d081c202', '64eb4d081c198'),
('Sivaraman.rajah', 'SVRRJR', '64eb4d081c203', '64eb4d081c199'),
('Thich.Nguyen', 'THCVNG', '64eb4d081c204', '64eb4d081c200'),
('Arvin.Subramaniam', 'ARVGSM', '64eb4d081c205', '64eb4d081c201'),
('Thy.Doan', 'THYTRD', '64eb4d081c206', '64eb4d081c202'),
('Andri.Maulana', 'ANDMLN', '64eb4d081c207', '64eb4d081c203'),
('Adi.Nugroho', 'ADINGH', '64eb4d081c208', '64eb4d081c204'),
('Phyo.Yee', 'PHYTYE', '64eb4d081c209', '64eb4d081c205'),
('Khadijah.Udhayana', 'KHDFRU', '64eb4d081c210', '64eb4d081c206'),
('Nurtria.Rahmadi', 'NRRRHD', '64eb4d081c211', '64eb4d081c207'),
('Jetwadee.Phanthanachai', 'JTPHCH', '64eb4d081c212', '64eb4d081c208'),
('Nguyen.Bich', 'NGTNGB', '64eb4d081c213', '64eb4d081c209'),
('Yuana.Delvika', 'YUNDVK', '64eb4d081c214', '64eb4d081c210'),
('Kay.Soe', 'KYKHSG', '64eb4d081c215', '64eb4d081c211'),
('Moh.Myint', 'MHMYTH', '64eb4d081c216', '64eb4d081c212'),
('Deborah.Mozes', 'DBRPGR', '64eb4d081c217', '64eb4d081c213'),
('Prof. Ajit Kumar Mishra', 'AJITKM', '64eb4d081c218', '64eb4d081c214'),
('Prof. Swasti Mishra', 'SWASTI', '64eb4d081c219', '64eb4d081c215'),
('Prof. Sabyasachi Ghosh', 'GHOSHS', '64eb4d081c220', '64eb4d081c216'),
('Prof. Sabyasachi Ghosh', 'GHOSSH', '64eb4d081c221', '64eb4d081c217'),
('Prof. Naresh Chandra Sahu', 'SAHUNC', '64eb4d081c222', '64eb4d081c218'),
('Prof. Siddhartha Ghosh', 'GHOSHI', '64eb4d081c223', '64eb4d081c219'),
('Prof. Mrinal Kaul', 'KAULMR', '64eb4d081c224', '64eb4d081c220'),
('Prof. C. D. Sebastian', 'SEBASD', '64eb4d081c225', '64eb4d081c221'),
('Prof. Amber Shrivastava', 'SHRIAM', '64eb4d081c226', '64eb4d081c222'),
('Prof. Sahana V. Murthy', 'MURTHS', '64eb4d081c227', '64eb4d081c223'),
('Prof. Vivek Kumar', 'KUMARV', '64eb4d081c228', '64eb4d081c224'),
('Prof. Nomesh Bolia', 'BOLIAN', '64eb4d081c229', '64eb4d081c225'),
('Prof. Sagnik Sen', 'SENSAG', '64eb4d081c230', '64eb4d081c226'),
('Prof. Rajshree Bedmata', 'BEDMAR', '64eb4d081c231', '64eb4d081c227'),
('Prof. Subrahmanyam', 'SUBRAS', '64eb4d081c232', '64eb4d081c228'),
('Prof. Krishnamohan', 'KRISHM', '64eb4d081c233', '64eb4d081c229'),
('Prof. Asif Quershi', 'QUERSA', '64eb4d081c234', '64eb4d081c230'),
('Prof. Bhabani Shankar Mallik', 'MALLIB', '64eb4d081c235', '64eb4d081c231'),
('Prof. Suman Kundu', 'KUNDUS', '64eb4d081c236', '64eb4d081c232'),
('Prof. Parichay Patra', 'PATRAP', '64eb4d081c237', '64eb4d081c233'),
('Prof. R. Gurunath', 'GURUNR', '64eb4d081c238', '64eb4d081c234'),
('Prof. Chaithra Puttaswamy', 'PUTTAC', '64eb4d081c239', '64eb4d081c235'),
('Prof. N. P. Sudharshana', 'SUDHAN', '64eb4d081c240', '64eb4d081c236'),
('Prof. Pabitra Mitra', 'MITRAP', '64eb4d081c241', '64eb4d081c237'),
('Prof. Anil Prabhakar', 'PRABHA', '64eb4d081c242', '64eb4d081c238'),
('Prof. Sreekumar N', 'SREEKN', '64eb4d081c243', '64eb4d081c239'),
('Prof. Rajesh Singh', 'SINGHR', '64eb4d081c244', '64eb4d081c240'),
('Prof. Ramakrishna Bag', 'BAGRAM', '64eb4d081c245', '64eb4d081c241'),
('Prof. Smriti Singh', 'SINGHS', '64eb4d081c246', '64eb4d081c242'),
('Prof. Smriti Singh', 'SINGHS', '64eb4d081c247', '64eb4d081c243'),
('Prof. Abhinav Dhall', 'DHALLA', '64eb4d081c248', '64eb4d081c244'),
('Prof. Rahul Thakur', 'THAKUR', '64eb4d081c249', '64eb4d081c245'),
('Prof. Usha Lenka', 'LENKAU', '64eb4d081c250', '64eb4d081c246'),
('Prof. Manoj Tripathy', 'TRIPAM', '64eb4d081c251', '64eb4d081c247'),
('Prof. Mitthan Lal Kansal', 'KANSAL', '64eb4d081c252', '64eb4d081c248'),
('Prof. Akshay Dvivedi', 'DVIVED', '64eb4d081c253', '64eb4d081c249'),
('Prof. Indranil Lahiri', 'LAHIRI', '64eb4d081c254', '64eb4d081c250'),
('Prof. Sneha Singh', 'SINGHS', '64eb4d081c255', '64eb4d081c251'),
('IIT Bhilai', 'whgwgh', '64eb4d081c177', '312465'),
('IIT Bhubaneswar', 'sfbgsb', '184a3e092bc133', '658297'),
('IIT Bombay', 'tegegg', 'c27d6f3e8a21bc', '548173'),
('IIT Delhi', 'brwrtt', '8fb72e0c1d9395', '981276'),
('IIT Dhanbad', 'wehbhb', '4a5e7f867d81c9', '721956'),
('IIT Dharwad', 'rtbhhr', '627c89e5a3b0fd', '135792'),
('IIT Gandhinagar', 'frggfr', '1d9e7b8a23c6f4', '369258'),
('IIT Goa', 'gwhwh', 'a2b3c4d5e6f7g8', '246813'),
('IIT Guwahati', 'dfbgrb', 'b1a9c3e8d2f4', '987654'),
('IIT Hyderabad', 'rrgfgg', 'f3e1c5a2b8d4', '465789'),
('IIT Indore', 'gyhgyh', '5c6d7e8f9g1h2', '357924'),
('IIT Jodhpur', 'yjykuk', 'y3j4y5k6u7k8', '136589'),
('IIT Kanpur', 'fsbgw', '5f6s7b8g9w1', '935218'),
('IIT Kharagpur', 'qwe', '4q5w6e', '417632'),
('IIT Madras', 'efwit', 'e5f6w7i8t9', '582614'),
('IIT Mandi', 'ghghh', 'g4h5g6h7', '279513'),
('IIT Palakkad', 'ntn', 'n3t4n5', '861372'),
('IIT Patna', 'yjhtr', 'y4j5h6t7r8', '749261'),
('IIT Roorkee', 'sffg', 's9f8f7g6', '324189'),
('IIT Ropar', 'rbe', 'r1b2e3', '518937'),
('IIT Tirupati', 'rntttr', 'r5n4t3', '692481'),
('IIT Varanasi', 'feefwe', 'f2e3e4', '279514');



-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_name` varchar(255) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `presentation_date` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `paper_link` varchar(255) NOT NULL,
  `paper_website` varchar(255) NOT NULL,
  `studentid` varchar(100) NOT NULL,
  `presentation_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_name`, `uid`, `presentation_date`, `approved`, `paper_link`, `paper_website`, `studentid`, `presentation_country`) VALUES
('aacc', '64e24f07e529e', '2023-08-18', 'Pending', 'abc', 'abc', '64eb4d081c173', 'bahraini');

-- --------------------------------------------------------

--
-- Table structure for table `patent`
--

CREATE TABLE `patent` (
  `patent_title` varchar(255) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `approval_date` varchar(100) NOT NULL,
  `patent_link` varchar(255) NOT NULL,
  `studentid` varchar(100) NOT NULL,
  `patent_grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patent`
--

INSERT INTO `patent` (`patent_title`, `uid`, `approved`, `approval_date`, `patent_link`, `studentid`, `patent_grade`) VALUES
('aaxx', '64e252172f9d5', 'Pending', '', 'zzzzz', '64eb4d081c173', 'b1');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `photo_url` VARCHAR(255),
  `name` varchar(100) NOT NULL,

  `registration_number` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `iit_entry_no` varchar(100) NOT NULL,
  `personal_mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permanent_email`varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `advisor_name` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `iit_name` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `joining_date` varchar(100) NOT NULL,
  `joining_campus_date` varchar(100) NOT NULL,
  `studentid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--
 


INSERT INTO `profile` (`photo_url`,`name`, `registration_number`,`iit_entry_no`, `mobile`, `personal_mobile`,`email`,`permanent_email`, `gender`, `advisor_name`, `address`, `nationality`, `iit_name`, `department_name`, `joining_date`, `joining_campus_date`, `studentid`) VALUES
('','Shallu', '7856', '1234567','9872139779', '+9183838383','shallu@iitd.in', 'shallu@gmail.com','female', 'nomesh_bolia', 'basant nagar', 'indian', 'IIT Delhi', 'Department of Architecture and Planning', '2023-08-30', '2023-08-30', '64eb4d081c173'),
('','Ryno.Settrisman', '7857', '1234568','9872139779', '+9183838384','ryno.settrisman@example.com', 'ryno.settrisman@gmail.com','male', 'Prof. Ajit Kumar Mishra', 'XYZ Street', 'nationality_1', 'IIT BHU Varanasi', 'Department of XYZ', '2023-08-31', '2023-08-31', '64eb4d081c174'),
('', 'Hok.Chheangkhy', '7858', '1234569','9872139778', '+9183838385','hok.chheangkhy@example.com', 'hok.chheangkhy@gmail.com','male', 'Prof. Swasti Mishra', 'ABC Road', 'nationality_2', 'IIT BHU Varanasi', 'Department of ABC', '2023-09-01', '2023-09-01', '64eb4d081c175'),
('', 'Cho.Win', '7859', '1234570','9872139777', '+9183838386','cho.win@example.com', 'cho.win@gmail.com','male', 'Prof. Sabyasachi Ghosh', 'PQR Lane', 'nationality_3', 'IIT Bhilai', 'Department of PQR', '2023-09-02', '2023-09-02', '64eb4d081c176'),
('', 'Thandar.Zaw', '7860', '1234571','9872139776', '+9183838387','thandar.zaw@example.com', 'thandar.zaw@gmail.com','female', 'Prof. Sabyasachi Ghosh', 'LMN Avenue', 'nationality_4', 'IIT Bhilai', 'Department of LMN', '2023-09-03', '2023-09-03', '64eb4d081c177'),
('', 'Tran.Dang', '7861', '1234572','9872139775', '+9183838388','tran.dang@example.com', 'tran.dang@gmail.com','male', 'Prof. Naresh Chandra Sahu', 'EFG Boulevard', 'nationality_5', 'IIT Bhubaneswar', 'Department of EFG', '2023-09-04', '2023-09-04', '64eb4d081c178'),
('', 'Rithy.Khouy', '7862', '1234573','9872139774', '+9183838389','rithy.khouy@example.com', 'rithy.khouy@gmail.com','female', 'Prof. Siddhartha Ghosh', 'JKL Street', 'nationality_6', 'IIT Bombay', 'Department of JKL', '2023-09-05', '2023-09-05', '64eb4d081c179'),
('', 'Pham.Hanh', '7863', '1234574','9872139773', '+9183838390','pham.hanh@example.com', 'pham.hanh@gmail.com','male', 'Prof. Mrinal Kaul', 'OPQ Road', 'nationality_7', 'IIT Bombay', 'Department of OPQ', '2023-09-06', '2023-09-06', '64eb4d081c180'),
('', 'Nguyen.Huyen', '7864', '1234575','9872139772', '+9183838391','nguyen.huyen@example.com', 'nguyen.huyen@gmail.com','female', 'Prof. C. D. Sebastian', 'RST Lane', 'nationality_8', 'IIT Bombay', 'Department of RST', '2023-09-07', '2023-09-07', '64eb4d081c181'),
('', 'Ramzul.Riza', '7865', '1234576','9872139771', '+9183838392','ramzul.riza@example.com', 'ramzul.riza@gmail.com','male', 'Prof. Amber Shrivastava', 'UVW Avenue', 'nationality_9', 'IIT Bombay', 'Department of UVW', '2023-09-08', '2023-09-08', '64eb4d081c182'),
('', 'Zun.Mo', '7866', '1234577','9872139770', '+9183838393','zun.mo@example.com', 'zun.mo@gmail.com','female', 'Prof. Sahana V. Murthy', 'XYZ Street', 'nationality_10', 'IIT Bombay', 'Department of XYZ', '2023-09-09', '2023-09-09', '64eb4d081c183'),
('', 'Kyawt.Thein', '7867', '1234578','9872139769', '+9183838394','kyawt.thein@example.com', 'kyawt.thein@gmail.com','male', 'Prof. Vivek Kumar', 'ABC Road', 'nationality_11', 'IIT Delhi', 'Department of ABC', '2023-09-10', '2023-09-10', '64eb4d081c184'),
('', 'Made.Widyatmika', '7868', '1234579','9872139768', '+9183838395','made.widyatmika@example.com', 'made.widyatmika@gmail.com','male', 'Prof. Nomesh Bolia', 'PQR Lane', 'nationality_12', 'IIT Delhi', 'Department of PQR', '2023-09-11', '2023-09-11', '64eb4d081c185'),
('', 'Zin.Myint', '7869', '1234580','9872139767', '+9183838396','zin.myint@example.com', 'zin.myint@gmail.com','female', 'Prof. Sagnik Sen', 'LMN Avenue', 'nationality_13', 'IIT Dharwad', 'Department of LMN', '2023-09-12', '2023-09-12', '64eb4d081c186'),
('', 'Mario.Poluakan', '7870', '1234581','9872139766', '+9183838397','mario.poluakan@example.com', 'mario.poluakan@gmail.com','male', 'Prof. Rajshree Bedmata', 'EFG Boulevard', 'nationality_14', 'IIT Guwahati', 'Department of EFG', '2023-09-13', '2023-09-13', '64eb4d081c187'),
('', 'Phyu.Cho', '7871', '1234582','9872139765', '+9183838398','phyu.cho@example.com', 'phyu.cho@gmail.com','female', 'Prof. Subrahmanyam', 'OPQ Road', 'nationality_15', 'IIT Hyderabad', 'Department of OPQ', '2023-09-14', '2023-09-14', '64eb4d081c188'),
('', 'Khin.Win', '7872', '1234583','9872139764', '+9183838399','khin.win@example.com', 'khin.win@gmail.com','male', 'Prof. Krishnamohan', 'RST Lane', 'nationality_16', 'IIT Hyderabad', 'Department of RST', '2023-09-15', '2023-09-15', '64eb4d081c189'),
('', 'Phyu.Mon', '7873', '1234584','9872139763', '+9183838400','phyu.mon@example.com', 'phyu.mon@gmail.com','female', 'Prof. Subrahmanyam', 'EFG Boulevard', 'nationality_17', 'IIT Hyderabad', 'Department of EFG', '2023-09-16', '2023-09-16', '64eb4d081c190'),
('', 'Antonio.Regis', '7874', '1234585','9872139762', '+9183838401','antonio.regis@example.com', 'antonio.regis@gmail.com','male', 'Prof. Asif Quershi', 'OPQ Road', 'nationality_18', 'IIT Hyderabad', 'Department of OPQ', '2023-09-17', '2023-09-17', '64eb4d081c191'),
('', 'Diana.Slyvia', '7875', '1234586','9872139761', '+9183838402','diana.slyvia@example.com', 'diana.slyvia@gmail.com','female', 'Prof. Bhabani Shankar Mallik', 'RST Lane', 'nationality_19', 'IIT Hyderabad', 'Department of RST', '2023-09-18', '2023-09-18', '64eb4d081c192'),
('', 'Anggy.Pratiwi', '7876', '1234587','9872139760', '+9183838403','anggy.pratiwi@example.com', 'anggy.pratiwi@gmail.com','male', 'Prof. Suman Kundu', 'JKL Street', 'nationality_20', 'IIT Jodhpur', 'Department of JKL', '2023-09-19', '2023-09-19', '64eb4d081c193'),
('', 'Nurdini.Chusna', '7877', '1234588','9872139759', '+9183838404','nurdini.chusna@example.com', 'nurdini.chusna@gmail.com','female', 'Prof. Parichay Patra', 'RST Lane', 'nationality_21', 'IIT Jodhpur', 'Department of RST', '2023-09-20', '2023-09-20', '64eb4d081c194'),
('', 'Tin.Htay', '7878', '1234589','9872139758', '+9183838405','tin.htay@example.com', 'tin.htay@gmail.com','male', 'Prof. R. Gurunath', 'UVW Avenue', 'nationality_22', 'IIT Kanpur', 'Department of UVW', '2023-09-21', '2023-09-21', '64eb4d081c195'),
('', 'Fatihah.Sari', '7879', '1234590','9872139757', '+9183838406','fatihah.sari@example.com', 'fatihah.sari@gmail.com','female', 'Prof. Chaithra Puttaswamy', 'XYZ Street', 'nationality_23', 'IIT Kanpur', 'Department of XYZ', '2023-09-22', '2023-09-22', '64eb4d081c196'),
('', 'Fransiska.Arumsari', '7880', '1234591','9872139756', '+9183838407','fransiska.arumsari@example.com', 'fransiska.arumsari@gmail.com','male', 'Prof. N. P. Sudharshana', 'ABC Road', 'nationality_24', 'IIT Kanpur', 'Department of ABC', '2023-09-23', '2023-09-23', '64eb4d081c197'),
('', 'Nwe.Kyaw', '7881', '1234592','9872139755', '+9183838408','nwe.kyaw@example.com', 'nwe.kyaw@gmail.com','female', 'Prof. Pabitra Mitra', 'PQR Lane', 'nationality_25', 'IIT Kharagpur', 'Department of PQR', '2023-09-24', '2023-09-24', '64eb4d081c198'),
('', 'Sivaraman.rajah', '7882', '1234593','9872139754', '+9183838409','sivaraman.rajah@example.com', 'sivaraman.rajah@gmail.com','male', 'Prof. Anil Prabhakar', 'LMN Avenue', 'nationality_26', 'IIT Madras', 'Department of LMN', '2023-09-25', '2023-09-25', '64eb4d081c199'),
('', 'Thich.Nguyen', '7883', '1234594','9872139753', '+9183838410','thich.nguyen@example.com', 'thich.nguyen@gmail.com','female', 'Prof. Sreekumar N', 'EFG Boulevard', 'nationality_27', 'IIT Madras', 'Department of EFG', '2023-09-26', '2023-09-26', '64eb4d081c200'),
('', 'Arvin.Subramaniam', '7884', '1234595','9872139752', '+9183838411','arvin.subramaniam@example.com', 'arvin.subramaniam@gmail.com','male', 'Prof. Rajesh Singh', 'OPQ Road', 'nationality_28', 'IIT Madras', 'Department of OPQ', '2023-09-27', '2023-09-27', '64eb4d081c201'),
('', 'Thy.Doan', '7885', '1234596','9872139751', '+9183838412','thy.doan@example.com', 'thy.doan@gmail.com','female', 'Prof. Ramakrishna Bag', 'RST Lane', 'nationality_29', 'IIT Patna', 'Department of RST', '2023-09-28', '2023-09-28', '64eb4d081c202'),
('', 'Andri.Maulana', '7886', '1234597','9872139750', '+9183838413','andri.maulana@example.com', 'andri.maulana@gmail.com','male', 'Prof. Smriti Singh', 'UVW Avenue', 'nationality_30', 'IIT Patna', 'Department of UVW', '2023-09-29', '2023-09-29', '64eb4d081c203'),
('', 'Adi.Nugroho', '7887', '1234598','9872139749', '+9183838414','adi.nugroho@example.com', 'adi.nugroho@gmail.com','female', 'Prof. Smriti Singh', 'XYZ Street', 'nationality_31', 'IIT Patna', 'Department of XYZ', '2023-09-30', '2023-09-30', '64eb4d081c204'),
('', 'Phyo.Yee', '7888', '1234599','9872139748', '+9183838415','phyo.yee@example.com', 'phyo.yee@gmail.com','male', 'Prof. Abhinav Dhall', 'ABC Road', 'nationality_32', 'IIT Ropar', 'Department of ABC', '2023-10-01', '2023-10-01', '64eb4d081c205'),
('', 'Khadijah.Udhayana', '7889', '1234600','9872139747', '+9183838416','khadijah.udhayana@example.com', 'khadijah.udhayana@gmail.com','female', 'Prof. Rahul Thakur', 'PQR Lane', 'nationality_33', 'IIT Roorkee', 'Department of PQR', '2023-10-02', '2023-10-02', '64eb4d081c206'),
('', 'Nurtria.Rahmadi', '7890', '1234601','9872139746', '+9183838417','nurtria.rahmadi@example.com', 'nurtria.rahmadi@gmail.com','male', 'Prof. Usha Lenka', 'LMN Avenue', 'nationality_34', 'IIT Roorkee', 'Department of LMN', '2023-10-03', '2023-10-03', '64eb4d081c207'),
('', 'Jetwadee.Phanthanachai', '7891', '1234602','9872139745', '+9183838418','jetwadee.phanthanachai@example.com', 'jetwadee.phanthanachai@gmail.com','female', 'Prof. Manoj Tripathy', 'EFG Boulevard', 'nationality_35', 'IIT Roorkee', 'Department of EFG', '2023-10-04', '2023-10-04', '64eb4d081c208'),
('', 'Nguyen.Bich', '7892', '1234603','9872139744', '+9183838419','nguyen.bich@example.com', 'nguyen.bich@gmail.com','male', 'Prof. Mitthan Lal Kansal', 'OPQ Road', 'nationality_36', 'IIT Roorkee', 'Department of OPQ', '2023-10-05', '2023-10-05', '64eb4d081c209'),
('', 'Yuana.Delvika', '7893', '1234604','9872139743', '+9183838420','yuana.delvika@example.com', 'yuana.delvika@gmail.com','female', 'Prof. Akshay Dvivedi', 'RST Lane', 'nationality_37', 'IIT Roorkee', 'Department of RST', '2023-10-06', '2023-10-06', '64eb4d081c210'),
('', 'Kay.Soe', '7894', '1234605','9872139742', '+9183838421','kay.soe@example.com', 'kay.soe@gmail.com','male', 'Prof. Indranil Lahiri', 'UVW Avenue', 'nationality_38', 'IIT Roorkee', 'Department of UVW', '2023-10-07', '2023-10-07', '64eb4d081c211'),
('', 'Moh.Myint', '7895', '1234606','9872139741', '+9183838422','moh.myint@example.com', 'moh.myint@gmail.com','female', 'Prof. Sneha Singh', 'XYZ Street', 'nationality_39', 'IIT Roorkee', 'Department of XYZ', '2023-10-08', '2023-10-08', '64eb4d081c212'),
('', 'Deborah.Mozes', '7896', '1234607','9872139740', '+9183838423','deborah.mozes@example.com', 'deborah.mozes@gmail.com','male', 'Prof. Anoop M. Namboodiri', 'ABC Road', 'nationality_40', 'IIT Jammu', 'Department of ABC', '2023-10-09', '2023-10-09', '64eb4d081c213');


-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `name` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `iit_name` varchar(150) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `faculty_id` varchar(100) NOT NULL,
  `department` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`name`, `mobile`, `gender`, `email`, `iit_name`, `nationality`, `faculty_id`, `department`, `username`, `password`, `uid`) VALUES
('nomesh', '8360278034', 'male', 'nomesh@iitd.in', 'IIT Delhi', 'indian', 'AW1587A', 'Department of Architecture and Planning', 'nomesh_bolia', 'qwerty', '64eb3f82cfcd7'),
('Prof. Ajit Kumar Mishra', '9935649964', 'Male', 'akmishra.hss@iitbhu.ac.in', 'IIT BHU Varanasi', 'Indonesia', 'f001', 'Humanistic Studies', 'Prof. Ajit Kumar Mishra', 'AJITKM', '64eb4d081c214'),
('Prof. Swasti Mishra', '9389156777', 'Female', 'swasti.hss@iitbhu.ac.in', 'IIT BHU Varanasi', 'Cambodia', 'f002', 'Humanistic Studies', 'Prof. Swasti Mishra', 'SWASTI', '64eb4d081c215'),
('Prof. Sabyasachi Ghosh', '9073273218', 'Male', 'sabya@iitbhilai.ac.in', 'IIT Bhilai', 'Myanmar', 'f003', 'Physics', 'Prof. Sabyasachi Ghosh', 'GHOSHS', '64eb4d081c216'),
('Prof. Naresh Chandra Sahu', '9439918354', 'Male', 'naresh@iitbbs.ac.in', 'IIT Bhubaneswar', 'Vietnam', 'f005', 'Humanities, Social Sciences and Management', 'Prof. Naresh Chandra Sahu', 'SAHUNC', '64eb4d081c218'),
('Prof. Siddhartha Ghosh', '9867275572', 'Male', 'sghosh@civil.iitb.ac.in', 'IIT Bombay', 'Cambodia', 'f006', 'Civil Engineering', 'Prof. Siddhartha Ghosh', 'GHOSHI', '64eb4d081c219'),
('Prof. Mrinal Kaul', '9741137421', 'Female', 'mrinal.kaul@iitb.ac.in', 'IIT Bombay', 'Vietnam', 'f007', 'Humanities and Social Sciences', 'Prof. Mrinal Kaul', 'KAULMR', '64eb4d081c220'),
('Prof. C. D. Sebastian', '9619776894', 'Male', 'sebastian@iitb.ac.in', 'IIT Bombay', 'Vietnam', 'f008', 'Humanities and Social Sciences', 'Prof. C. D. Sebastian', 'SEBASD', '64eb4d081c221'),
('Prof. Amber Shrivastava', '7506979358', 'Male', 'ashrivastava.me@iitb.ac.in', 'IIT Bombay', 'Indonesia', 'f009', 'Mechanical Engineering', 'Prof. Amber Shrivastava', 'SHRIAM', '64eb4d081c222'),
('Prof. Sahana V. Murthy', '9819978591', 'Female', 'sahanamurthy@iitb.ac.in', 'IIT Bombay', 'Myanmar', 'f010', 'Physics', 'Prof. Sahana V. Murthy', 'MURTHS', '64eb4d081c223'),
('Prof. Vivek Kumar', '9412619735', 'Male', 'vivekk@rdat.iitd.ac.in', 'IIT Delhi', 'Myanmar', 'f011', 'Centre for Rural Development & Technology', 'Prof. Vivek Kumar', 'KUMARV', '64eb4d081c224'),
('Prof. Nomesh Bolia', '9212504910', 'Male', 'nomesh@mech.iitd.ac.in', 'IIT Delhi', 'Indonesia', 'f012', 'Mechanical Engineering', 'Prof. Nomesh Bolia', 'BOLIAN', '64eb4d081c225'),
('Prof. Sagnik Sen', '7003247567', 'Male', 'sen@iitdh.ac.in', 'IIT Dharwad', 'Myanmar', 'f013', 'Mathematics', 'Prof. Sagnik Sen', 'SENSAG', '64eb4d081c226'),
('Prof. Rajshree Bedmata', '9678007148', 'Female', 'rajshree@iitg.ac.in', 'IIT Guwahati', 'Indonesia', 'f014', 'Humanities and Social Sciences', 'Prof. Rajshree Bedmata', 'BEDMAR', '64eb4d081c227'),
('Prof. Subrahmanyam', '9550435527', 'Male', 'csubbu@chy.iith.ac.in', 'IIT Hyderabad', 'Myanmar', 'f015', 'Chemistry', 'Prof. Subrahmanyam', 'SUBRAS', '64eb4d081c228'),
('Prof. Krishnamohan', '7780384883', 'Male', 'ckm@cse.iith.ac.in', 'IIT Hyderabad', 'Myanmar', 'f016', 'Artificial Intelligence', 'Prof. Krishnamohan', 'KRISHM', '64eb4d081c229'),
('Prof. Asif Quershi', '8331036046', 'Male', 'asif@ce.iith.ac.in', 'IIT Hyderabad', 'Philippines', 'f018', 'Climate Change', 'Prof. Asif Quershi', 'QUERSA', '64eb4d081c230'),
('Prof. Bhabani Shankar Mallik', '8500666222', 'Male', 'bhabani@chy.iith.ac.in', 'IIT Hyderabad', 'Indonesia', 'f019', 'Chemistry', 'Prof. Bhabani Shankar Mallik', 'MALLIB', '64eb4d081c231'),
('Prof. Suman Kundu', '9051301121', 'Male', 'suman@iitj.ac.in', 'IIT Jodhpur', 'Indonesia', 'f020', 'Computer Science and Engineering', 'Prof. Suman Kundu', 'KUNDUS', '64eb4d081c232'),
('Prof. Parichay Patra', '9874423058', 'Male', 'parichay@iitj.ac.in', 'IIT Jodhpur', 'Indonesia', 'f021', 'Humanities and Social Sciences', 'Prof. Parichay Patra', 'PATRAP', '64eb4d081c233'),
('Prof. R. Gurunath', '05122597417', 'Male', 'gurunath@iitk.ac.in', 'IIT Kanpur', 'Myanmar', 'f022', 'Chemistry', 'Prof. R. Gurunath', 'GURUNR', '64eb4d081c234'),
('Prof. Chaithra Puttaswamy', '05122597931', 'Male', 'chai@iitk.ac.in', 'IIT Kanpur', 'Indonesia', 'f023', 'Humanities and Social Sciences', 'Prof. Chaithra Puttaswamy', 'PUTTAC', '64eb4d081c235'),
('Prof. N. P. Sudharshana', '05122596188', 'Male', 'sudh@iitk.ac.in', 'IIT Kanpur', 'Indonesia', 'f024', 'Humanities and Social Sciences', 'Prof. N. P. Sudharshana', 'SUDHAN', '64eb4d081c236'),
('Prof. Pabitra Mitra', '9434724097', 'Male', 'pabitra@cse.iitkgp.ac.in', 'IIT Kharagpur', 'Myanmar', 'f025', 'Computer Science and Engineering', 'Prof. Pabitra Mitra', 'MITRAP', '64eb4d081c237'),
('Prof. Anil Prabhakar', '9910165466', 'Male', 'anilpr@iitm.ac.in', 'IIT Madras', 'Malaysia', 'f026', 'Electrical Engineering', 'Prof. Anil Prabhakar', 'PRABHA', '64eb4d081c238'),
('Prof. Sreekumar N', '04422574514', 'Male', 'srkumar@iitm.ac.in', 'IIT Madras', 'Vietnam', 'f027', 'Humanities and Social Sciences', 'Prof. Sreekumar N', 'SREEKN', '64eb4d081c239'),
('Prof. Rajesh Singh', '04422574838', 'Male', 'rajesh.singh@physics.iitm.ac.in', 'IIT Madras', 'Malaysia', 'f028', 'Physics', 'Prof. Rajesh Singh', 'SINGHR', '64eb4d081c240'),
('Prof. Ramakrishna Bag', '9439575601', 'Male', 'rkbag@iitp.ac.in', 'IIT Patna', 'Vietnam', 'f029', 'Civil and Environmental Engineering', 'Prof. Ramakrishna Bag', 'BAGRAM', '64eb4d081c241'),
('Prof. Smriti Singh', '9199202209', 'Male', 'smriti@iitp.ac.in', 'IIT Patna', 'Indonesia', 'f031', 'Humanities and Social Sciences', 'Prof. Smriti Singh', 'SINGHS', '64eb4d081c243'),
('Prof. Abhinav Dhall', '8427994600', 'Male', 'abhinav@iitrpr.ac.in', 'IIT Ropar', 'Myanmar', 'f032', 'Computer Science and Engineering', 'Prof. Abhinav Dhall', 'DHALLA', '64eb4d081c244'),
('Prof. Rahul Thakur', '9790822931', 'Male', 'rahul.thakur@cs.iitr.ac.in', 'IIT Roorkee', 'Indonesia', 'f033', 'Computer Science and Engineering', 'Prof. Rahul Thakur', 'THAKUR', '64eb4d081c245'),
('Prof. Usha Lenka', '9897027098', 'Male', 'usha.lenka@ms.iitr.ac.in', 'IIT Roorkee', 'Indonesia', 'f034', 'Management Studies', 'Prof. Usha Lenka', 'LENKAU', '64eb4d081c246'),
('Prof. Manoj Tripathy', '9412015058', 'Male', 'manoj.tripathy@ee.iitr.ac.in', 'IIT Roorkee', 'Thailand', 'f035', 'Electrical Engineering', 'Prof. Manoj Tripathy', 'TRIPAM', '64eb4d081c247'),
('Prof. Mitthan Lal Kansal', '9412919302', 'Male', 'mlk@wr.iitr.ac.in', 'IIT Roorkee', 'Vietnam', 'f036', 'Water Resources Development and Management', 'Prof. Mitthan Lal Kansal', 'KANSAL', '64eb4d081c248'),
('Prof. Akshay Dvivedi', '9411176136', 'Male', 'akshaydvivedi@me.iitr.ac.in', 'IIT Roorkee', 'Indonesia', 'f037', 'Mechanical and Industrial Engineering', 'Prof. Akshay Dvivedi', 'DVIVED', '64eb4d081c249'),
('Prof. Indranil Lahiri', '8859014222', 'Male', 'indranil.lahiri@mt.iitr.ac.in', 'IIT Roorkee', 'Myanmar', 'f038', 'Metallurgical and Materials Engineering', 'Prof. Indranil Lahiri', 'LAHIRI', '64eb4d081c250'),
('Prof. Sneha Singh', '9304468815', 'Female', 'sneha.singh@me.iitr.ac.in', 'IIT Roorkee', 'Myanmar', 'f039', 'Mechanical and Industrial Engineering', 'Prof. Sneha Singh', 'SINGHS', '64eb4d081c251');

-- --------------------------------------------------------

--
-- Table structure for table `supervisorlogin`
--

CREATE TABLE `supervisorlogin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisorlogin`
--

INSERT INTO `supervisorlogin` (`username`, `password`) VALUES
('anmol@dia.in', 'qwerty');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- Table structure for table `institute_summary`
CREATE TABLE `institute_summary` (
  `Institute` varchar(255) NOT NULL,
  `Institute Code` varchar(255) NOT NULL,
  `No. Of Students` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `institute_summary`
INSERT INTO `institute_summary` (`Institute`, `Institute Code`, `No. Of Students`) VALUES
('IIT Bhilai', 'INC 01', 2),
('IIT Bhubaneswar', 'INC 02', 2),
('IIT Bombay', 'INC 03', 2),
('IIT Delhi', 'INC 04', 2),
('IIT Dhanbad', 'INC 05', 2),
('IIT Dharwad', 'INC 06', 2),
('IIT Gandhinagar', 'INC 07', 2),
('IIT Goa', 'INC 08', 2),
('IIT Guwahati', 'INC 09', 2),
('IIT Hyderabad', 'INC 10', 2),
('IIT Indore', 'INC 11', 2),
('IIT Jammu', 'INC 12', 2),
('IIT Jodhpur', 'INC 13', 2),
('IIT Kanpur', 'INC 14', 2),
('IIT Kharagpur', 'INC 15', 2),
('IIT Madras', 'INC 16', 2),
('IIT Mandi', 'INC 17', 2),
('IIT Palakkad', 'INC 18', 2),
('IIT Patna', 'INC 19', 2),
('IIT Roorkee', 'INC 20', 2),
('IIT Ropar', 'INC 21', 2),
('IIT Tirupati', 'INC 22', 2),
('IIT Varanasi', 'INC 23', 2);
 

CREATE TABLE Applicants (
    SNo INT AUTO_INCREMENT PRIMARY KEY,
    Name_of_Applicant VARCHAR(100),
    Application_Number VARCHAR(50),
    Country VARCHAR(50),
    Date_of_Joining DATE,
    Stipend INT,
    Stipend_received VARCHAR(100),
    Total_annual_reimbursement_received INT,
    Annual_reimbursement_received_last_quarter INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO Applicants (Name_of_Applicant, Application_Number, Country, Date_of_Joining, Stipend, Stipend_received, Total_annual_reimbursement_received, Annual_reimbursement_received_last_quarter) 
VALUES 
('John Doe', 'APP001', 'USA', '2023-01-15', 3000, 'yes', 15000, 5000),
('Jane Smith', 'APP002', 'Canada', '2023-02-20', 2500, 'yes', 20000, 8000),
('Alice Johnson', 'APP003', 'UK', '2023-03-10', 2800, 'yes', 18000, 6000);



CREATE TABLE Quarter1Funds (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    No_of_Candidates INT,
    Monthly_Stipend_Description VARCHAR(200),
    Monthly_Stipend_Amount DECIMAL(10, 2),
    Annual_Research_Grant_Description VARCHAR(200),
    Annual_Research_Grant_Amount DECIMAL(10, 2),
    Fund_Calculation_Description VARCHAR(200),
    Fund_Calculation_Result DECIMAL(10, 2),
    Fund_Allocated DECIMAL(10, 2),
    Excess_Fund DECIMAL(10, 2)
);
INSERT INTO Quarter1Funds (
    No_of_Candidates,
    Monthly_Stipend_Description,
    Monthly_Stipend_Amount,
    Annual_Research_Grant_Description,
    Annual_Research_Grant_Amount,
    Fund_Calculation_Description,
    Fund_Calculation_Result,
    Fund_Allocated,
    Excess_Fund
) VALUES (
    2,
    'No of days between date of joining and last day of the month * Rs. 1000',
    31000.00,
    'Annual Research Grant',
    170000.00,
     '(2 candidates * 3 months * Rs. 31000/-) + (2 candidates * Rs. 170000/-) = Rs. 526000/-',
    526000.00,
    600000.00,
    74000.00
);

-- Create table
CREATE TABLE QuarterInfo (
    Quarter VARCHAR(10) NOT NULL,
    Excess_Funds DECIMAL(10, 2) NOT NULL,
    Total_Funds_Received DECIMAL(10, 2) NOT NULL,
    Position_Of_Funds TEXT NOT NULL,
    Students_Joined INT NOT NULL,
    Additional_Comments TEXT,
    PRIMARY KEY (Quarter)
);

-- Insert data into the table
INSERT INTO QuarterInfo (Quarter, Excess_Funds, Total_Funds_Received, Position_Of_Funds, Students_Joined, Additional_Comments)
VALUES 
('Q1', 50000.00, 200000.00, 'Committed to research projects', 10, 'Additional comments for Quarter 1'),
('Q2', 30000.00, 180000.00, 'Partially allocated for campus maintenance', 8, 'Additional comments for Quarter 2');



-- Create a table to store IIT information
CREATE TABLE IF NOT EXISTS iitsInfo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    iit_name VARCHAR(100) NOT NULL,
    total_students INT NOT NULL
);

INSERT INTO `iitsInfo` (`iit_name` ) VALUES
('IIT Kharagpur' ),
('IIT Bombay' ),
('IIT Madras' ),
('IIT Kanpur' ),
('IIT Delhi' ),
('IIT Guwahati' ),
('IIT Roorkee' ),
('IIT Ropar' ),
('IIT Bhubaneswar' ),
('IIT Gandhinagar' ),
('IIT Hyderabad' ),
('IIT Jodhpur' ),
('IIT Patna' ),
('IIT Indore' ),
('IIT Mandi' ),
('IIT Varanasi' ),
('IIT Palakkad' ),
('IIT Tirupati' ),
('IIT Dhanbad' ),
('IIT Bhilai' ),
('IIT Dharwad' ),
('IIT Jammu' ),
('IIT Goa' );

CREATE TABLE IF NOT EXISTS stipend_received (
    id INT AUTO_INCREMENT PRIMARY KEY,
    month VARCHAR(100) NOT NULL,
    stipend INT NOT NULL,
    year INT NOT NULL
);