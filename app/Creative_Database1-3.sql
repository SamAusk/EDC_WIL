-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2022 at 10:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Creative_Database1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Discipline_Area`
--

CREATE TABLE `Discipline_Area` (
  `Area_ID` int(10) NOT NULL,
  `Area_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Discipline_Area`
--

INSERT INTO `Discipline_Area` (`Area_ID`, `Area_Type`) VALUES
(1, 'Architecture'),
(2, 'Aviation '),
(3, 'BioScience'),
(4, 'Chemistry'),
(5, 'Civil engineering '),
(6, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `Location_ID` int(10) NOT NULL,
  `Location_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`Location_ID`, `Location_Type`) VALUES
(1, 'Gold Coast'),
(2, 'Brisbane'),
(3, 'Nathan'),
(4, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `Primary_Page`
--

CREATE TABLE `Primary_Page` (
  `Project_ID` int(10) NOT NULL,
  `Project_Title` varchar(50) NOT NULL,
  `Project_Description` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Location_Name` varchar(50) NOT NULL,
  `Type_ID` int(10) NOT NULL,
  `Type_Name` varchar(50) NOT NULL,
  `Area_Name` varchar(50) NOT NULL,
  `Area_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Primary_Page`
--

INSERT INTO `Primary_Page` (`Project_ID`, `Project_Title`, `Project_Description`, `Email`, `Location_Name`, `Type_ID`, `Type_Name`, `Area_Name`, `Area_ID`) VALUES
(1, 'Research Science Project', 'The Requirements of this Project is to have an Undergraduate degree in science or Bioscience.Please contact on the email for further information.', 'Bella.science@griffith.edu.au', 'Brisbane', 4, 'UG Research Project', 'BioScience', 3),
(2, 'Undergraduate Internship For IT ', 'This is an excellent opportunity for the Undergraduates IT or Computer science Students.Duration is 3 months starting from 10/12/2022 to 10/02/2023.', 'ITconsultservices@ics.com.au', 'Gold Coast', 1, 'UG industry Internship (WIL)', 'Computer Science', 0),
(3, 'PHD Research Civil Industry Projects', 'This is a PHD research project, requirement is to be master graduate in Civil Engineering.Duration is 6 Months.Please contact on the Email.', 'Annaeducation@griffith.edu.au', 'Brisbane', 7, 'PHD Research Project', 'Civil engineering ', 0),
(4, 'Architecture Research Project', 'Research project opportunity for Architecture students of the Griffith university. Scholorship available.UG and PG Both can participate in this Research.', 'Drfossil@griffith.edu.au', 'Online', 5, 'Summer research Project', 'Architecture', 0),
(5, '3D printing and scanning', 'Post graduate Level Opportunity.This requires extensive knowledge in PHP, JAVA and Graphic Designing.You will be require to develop a software with scans and Prints a 3D Image.', 'Della.James@griffiht.edu.au', 'Gold Coast', 2, 'PG industry Internship (WIL)', 'Computer Science', 0),
(6, 'Bio Science Innovation ', 'This is a BioScience Project for an undergraduate Students.', 'palakshah@gmail.com', 'Brisbane', 2, 'PG industry Internship (WIL)', 'BioScience', 0),
(7, 'English language Project', 'This is a great opportunity for the English people who wants to join and explore the new opportunity.Its a 3 months of Program and it is online so you can work from anywhere.', 'Michelle123@gmail.com', 'Online', 3, 'Industry Affiliates Program (ENG)', 'Aviation ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Project_Type`
--

CREATE TABLE `Project_Type` (
  `Project_ID` int(10) NOT NULL,
  `Project_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Project_Type`
--

INSERT INTO `Project_Type` (`Project_ID`, `Project_Type`) VALUES
(1, 'UG industry Internship (WIL)'),
(2, 'PG industry Internship (WIL)'),
(3, 'Industry Affiliates Program (ENG)'),
(4, 'UG Research Project'),
(5, 'Summer research Project'),
(6, 'Honours research Project'),
(7, 'PHD Research Project');

-- --------------------------------------------------------

--
-- Table structure for table `Seperate`
--

CREATE TABLE `Seperate` (
  `ID` int(10) NOT NULL,
  `Area_Name_T` varchar(50) NOT NULL,
  `Type_Name_T` varchar(50) NOT NULL,
  `Location_Name_T` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Seperate`
--

INSERT INTO `Seperate` (`ID`, `Area_Name_T`, `Type_Name_T`, `Location_Name_T`) VALUES
(0, 'Architecture', 'Industry Affiliates Program (ENG)', 'Gold Coast'),
(1, 'BioScience', 'Industry Affiliates Program (ENG)', 'Brisbane'),
(2, 'BioScience', 'Honours research Project', 'Brisbane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Discipline_Area`
--
ALTER TABLE `Discipline_Area`
  ADD PRIMARY KEY (`Area_ID`,`Area_Type`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`Location_ID`,`Location_Type`);

--
-- Indexes for table `Primary_Page`
--
ALTER TABLE `Primary_Page`
  ADD PRIMARY KEY (`Project_ID`),
  ADD UNIQUE KEY `Project_ID` (`Project_ID`),
  ADD KEY `Project_ID_2` (`Project_ID`),
  ADD KEY `Type_ID` (`Type_ID`);

--
-- Indexes for table `Project_Type`
--
ALTER TABLE `Project_Type`
  ADD PRIMARY KEY (`Project_ID`,`Project_Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Primary_Page`
--
ALTER TABLE `Primary_Page`
  MODIFY `Project_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
