-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2020 at 09:15 PM
-- Server version: 5.7.31-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whitesil_lmd`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `auth_id` int(11) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `operator_name` varchar(200) NOT NULL,
  `operator_desig` varchar(200) NOT NULL,
  `op_employeeid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`, `status`) VALUES
(1, 'Abdominal Pain', 1),
(2, 'Acquired Immunodeficiency Syndrome(AIDS)', 1),
(3, 'Allergies', 1),
(4, 'Anaemia', 1),
(5, 'Acute Severe Asthma', 1),
(6, 'Bacterial Infection', 1),
(7, 'Bone Malignancies', 1),
(8, 'Bronchitis', 1),
(9, 'Calcium Deficiency', 0),
(10, 'Cholera', 1),
(11, 'Cold', 1),
(12, 'Diarrhoea', 1),
(13, 'Dengue', 1),
(14, 'Gastritis', 1),
(15, 'Heart Disease', 1),
(16, 'Infectious Disease', 1),
(17, 'Influenza', 1),
(18, 'Typhoid Fever', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `division`) VALUES
(1, 'Barguna', 'Barishal'),
(2, 'Barishal', 'Barishal'),
(3, 'Bhola', 'Barishal'),
(4, 'Jhalokati', 'Barishal'),
(5, 'Patuakhali', 'Barishal'),
(6, 'Pirojpur', 'Barishal'),
(7, 'Bandarban', 'Chittagong'),
(8, 'Brahmanbaria', 'Chittagong'),
(9, 'Chandpur', 'Chittagong'),
(10, 'Chittagong', 'Chittagong'),
(11, 'Cumilla', 'Chittagong'),
(12, 'Cox\'s Bazar', 'Chittagong'),
(13, 'Feni', 'Chittagong'),
(14, 'Khagrachhari', 'Chittagong'),
(15, 'Lakshmipur', 'Chittagong'),
(16, 'Noakhali', 'Chittagong'),
(17, 'Rangamati', 'Chittagong'),
(18, 'Dhaka', 'Dhaka'),
(19, 'Faridpur', 'Dhaka'),
(20, 'Gazipur', 'Dhaka'),
(21, 'Gopalganj', 'Dhaka'),
(22, 'Jamalpur', 'Mymensingh'),
(23, 'Kishoreganj', 'Mymensingh'),
(24, 'Madaripur', 'Dhaka'),
(25, 'Manikganj', 'Dhaka'),
(26, 'Munshiganj', 'Dhaka'),
(27, 'Mymensingh', 'Mymensingh'),
(28, 'Narayanganj', 'Dhaka'),
(29, 'Narsingdi', 'Dhaka'),
(30, 'Netrakona', 'Mymensingh'),
(31, 'Rajbari', 'Dhaka'),
(32, 'Shariatpur', 'Dhaka'),
(33, 'Sherpur', 'Mymensingh'),
(34, 'Tangail', 'Mymensingh'),
(35, 'Bagerhat', 'Khulna'),
(36, 'Chuadanga', 'Khulna'),
(37, 'Jessore', 'Khulna'),
(38, 'Jhenaidah', 'Khulna'),
(39, 'Khulna', 'Khulna'),
(40, 'Kushtia', 'Khulna'),
(41, 'Magura', 'Khulna'),
(42, 'Meherpur', 'Khulna'),
(43, 'Narail', 'Khulna'),
(44, 'Satkhira', 'Khulna'),
(45, 'Bogura', 'Rajshahi'),
(46, 'Joypurhat', 'Rajshahi'),
(47, 'Naogaon', 'Rajshahi'),
(48, 'Natore', 'Rajshahi'),
(49, 'Nawabganj', 'Rajshahi'),
(50, 'Pabna', 'Rajshahi'),
(51, 'Rajshahi', 'Rajshahi'),
(52, 'Sirajganj', 'Rajshahi'),
(53, 'Dinajpur', 'Rangpur'),
(54, 'Gaibandha', 'Rangpur'),
(55, 'Kurigram', 'Rangpur'),
(56, 'Lalmonirhat', 'Rangpur'),
(57, 'Nilphamari', 'Rangpur'),
(58, 'Panchagarh', 'Rangpur'),
(59, 'Rangpur', 'Rangpur'),
(60, 'Thakurgaon', 'Rangpur'),
(61, 'Habiganj', 'Sylhet'),
(62, 'Moulvibazar', 'Sylhet'),
(63, 'Sunamganj', 'Sylhet'),
(64, 'Sylhet', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `nid` varchar(17) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `propic` varchar(500) NOT NULL,
  `nid_pic` varchar(255) NOT NULL,
  `degrees` varchar(500) NOT NULL,
  `certificates` varchar(500) NOT NULL,
  `specialize_id` int(11) NOT NULL,
  `license_no` varchar(500) NOT NULL,
  `chamber` varchar(500) NOT NULL,
  `auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `fname`, `lname`, `dob`, `gender`, `blood`, `nid`, `nationality`, `phone`, `email`, `address`, `propic`, `nid_pic`, `degrees`, `certificates`, `specialize_id`, `license_no`, `chamber`, `auth_id`) VALUES
(1, 'Dr. Abul', 'Khair', '1985-08-01', 'Male', 'B+', '198523429149', 'Bangladeshi', '01735353535', 'khair@gmail.com', 'Bashundhara R/S, Dhaka', 'doc1.jpg', 'nid1.jpg', 'MBBS, MD', 'cert1.png, cert2.png', 1, '1223344556', 'Popular Diagnostic Center, Mirpur-6, Dhaka.', NULL),
(2, 'Dr. Kabirul', 'Zaman', '1973-09-01', 'Male', 'B+', '198523427643', 'Bangladeshi', '01711020365', 'zamannuro@gmail.com', 'Uttara, Dhaka', 'doc2.jpg', 'nid2.jpg', 'MBBS, FCPS', 'cert3.png, cert4.png', 3, '1223344567', 'Ibna Sina Hospital, Dhanmondi, Dhaka-1224', NULL),
(3, 'Dr. Harunur', 'Rashid', '1978-06-13', 'Male', 'O+', '198529846207', 'Bangladeshi', '01710256933', 'rashid@gmail.com', 'Tongi, Dhaka', 'doc3.jpg', 'nid3.jpg', 'MBBS, FCPS', 'cert5.png, cert6.png', 7, '1223344888', 'Uttara Adhunik Hospital, Uttara, Dhaka-1230', NULL),
(4, 'Dr. Shamima', 'Aziz', '1975-09-17', 'Female', 'AB+', '198528345089', 'Bangladeshi', '01710020385', 'shamima123@gmail.com', 'Dhanmondi, Dhaka', 'doc4.jpg', 'nid4.jpg', 'MBBS, FCPS, FRCS', 'cert7.png, cert8.png, cert21.png', 25, '1223344203', 'Holly Family Clinic, Mirpur-10, Dhaka-1212', NULL),
(5, 'Dr. Sumit', 'Borua', '1976-09-07', 'Male', 'O-', '198523127012', 'Bangladeshi', '01910787899', 'sumit12@gmail.com', 'Mohammodpur, Dhaka', 'doc5.jpg', 'nid5.jpg', 'MBBS, FCPS', 'cert9.png, cert10.png', 4, '1223344409', 'High care Hospital, Uttara, Dhaka-1230', NULL),
(6, 'Dr. Shoriful', 'Alam', '1988-03-04', 'Male', 'AB+', '198520067005', 'Bangladeshi', '01710424241', 'shorifdoc@yahoo.com', 'Gulshan, Dhaka', 'doc6.jpg', 'nid6.jpg', 'MBBS, MD', 'cert10.png, cert11.png', 11, '1223344667', 'Crycent Hospital, Uttara, Dhaka-1230', NULL),
(7, 'Dr. Ferdous', 'Mahal', '1984-11-19', 'Female', 'B+', '198523499879', 'Bangladeshi', '01711252568', 'mahal@yahoo.com', 'Niketon, Dhaka', 'doc7.jpg', 'nid7.jpg', 'MBBS, FCPS, FRCS', 'cert12.png, cert13.png, cert22.png', 17, '1223340032', 'Khaja Yunus Ali Medicle Center,Shamoli,Dhaka-1226', NULL),
(8, 'Dr. Gulshana', 'Togor', '1981-05-31', 'Female', 'O+', '198523429198', 'Bangladeshi', '01712565695', 'togorgul@gmail.com', 'Khilkhet, Dhaka', 'doc8.jpg', 'nid8.jpg', 'MBBS, MD', 'cert14.png, cert15.png', 38, '1223344267', 'Al Madina Health care, Dhanmondi, Dhaka-1224', NULL),
(9, 'Dr. Anika', 'Tahsin', '1980-05-06', 'Female', 'B+', '198523400220', 'Bangladeshi', '01811050568', 'tahsin@gmail.com', 'Mirpur, Dhaka', 'doc9.jpg', 'nid9.jpg', 'MBBS, MD', 'cert16.png, cert17.png', 30, '1223344111', 'Labaid Diagnostic Center, Mirpur-6, Dhaka-1212', NULL),
(10, 'Dr. Miskatul', 'Rahman', '1981-08-09', 'Male', 'O+', '198523400002', 'Bangladeshi', '01710485868', 'miskat2@gmail.com', 'Pollobi,Dhaka', 'doc10.jpg', 'nid10.jpg', 'MBBS, FCPS, FRCS', 'cert19.png, cert20.png, cert23.png', 5, '1223340099', 'Square Hospital, Panthopoth, Dhaka-1229', NULL),
(11, 'Dr. Mehdi', 'Hassan', '1990-05-23', 'Male', 'A+', '1234567890', '1234567890', '1234567890', 'mehdi@gmail.com', 'Home Address', 'default.jpg', 'NID.jpg', 'MBBS, FCPS', 'MBBS Cert.jpg', 21, '123456789', 'IBN Sina', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `login_access` int(11) NOT NULL,
  `last_activity` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `doc_id`, `patient_id`, `company_id`, `auth_id`, `userid`, `password`, `user_type`, `status`, `login_access`, `last_activity`) VALUES
(1, NULL, NULL, 1, NULL, 'info@square.com', '12345', 'Pharmaceutical', 'approved', 1, '30/12/2019 at 03:08 pm'),
(2, NULL, NULL, 4, NULL, 'info@tec.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(3, NULL, NULL, 2, NULL, 'info@dru.com', '12345', 'Pharmaceutical', 'requested', 1, '05/01/2020 at 12:11 am'),
(4, NULL, NULL, 3, NULL, 'info@hea.com', '12345', 'Pharmaceutical', 'requested', 1, '30/12/2019 at 03:10 pm'),
(5, NULL, NULL, 5, NULL, 'info@bex.com', '12345', 'Pharmaceutical', 'requested', 1, '30/12/2019 at 02:34 pm'),
(6, NULL, NULL, 6, NULL, 'info@ad-.com', '12345', 'Pharmaceutical', 'requested', 0, NULL),
(7, NULL, NULL, 7, NULL, 'info@acm.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(8, NULL, NULL, 8, NULL, 'info@ren.com', '12345', 'Pharmaceutical', 'requested', 1, '30/12/2019 at 02:40 pm'),
(9, NULL, NULL, 9, NULL, 'info@nov.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(10, NULL, NULL, 10, NULL, 'info@eur.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(11, NULL, NULL, 11, NULL, 'info@bio.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(12, NULL, NULL, 12, NULL, 'info@kem.com', '12345', 'Pharmaceutical', 'requested', 0, NULL),
(13, NULL, NULL, 13, NULL, 'info@nov.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(14, NULL, NULL, 14, NULL, 'info@inc.com', '12345', 'Pharmaceutical', 'requested', 1, '30/12/2019 at 02:42 pm'),
(15, NULL, NULL, 15, NULL, 'info@del.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(16, NULL, NULL, 16, NULL, 'info@sup.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(17, NULL, NULL, 17, NULL, 'info@aci.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(18, NULL, NULL, 18, NULL, 'info@bio.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(19, NULL, NULL, 19, NULL, 'info@des.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(20, NULL, NULL, 20, NULL, 'info@pha.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(21, NULL, NULL, 21, NULL, 'info@san.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(22, NULL, NULL, 22, NULL, 'info@aex.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(23, NULL, NULL, 23, NULL, 'info@bel.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(24, NULL, NULL, 24, NULL, 'info@rel.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(25, NULL, NULL, 25, NULL, 'info@ops.com', '12345', 'Pharmaceutical', 'requested', 1, '05/01/2020 at 12:13 am'),
(26, NULL, NULL, 26, NULL, 'info@jay.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(27, NULL, NULL, 27, NULL, 'info@ori.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(28, NULL, NULL, 28, NULL, 'info@lab.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(29, NULL, NULL, 29, NULL, 'info@bea.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(30, NULL, NULL, 30, NULL, 'info@asi.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(31, NULL, NULL, 31, NULL, 'info@peo.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(32, NULL, NULL, 32, NULL, 'info@bec.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(33, NULL, NULL, 33, NULL, 'info@glo.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(34, NULL, NULL, 34, NULL, 'info@nav.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(35, NULL, NULL, 35, NULL, 'info@zen.com', '12345', 'Pharmaceutical', 'requested', 1, NULL),
(36, 1, NULL, NULL, NULL, 'khair@gmail.com', '1234', 'Doctor', 'requested', 1, NULL),
(37, 2, NULL, NULL, NULL, 'zamannuro@gmail.com', '1234', 'Doctor', 'requested', 1, NULL),
(38, 3, NULL, NULL, NULL, 'rashid@gmail.com', '1234', 'Doctor', 'requested', 1, NULL),
(39, 4, NULL, NULL, NULL, 'shamima123@gmail.com', '1234', 'Doctor', 'requested', 1, NULL),
(40, 5, NULL, NULL, NULL, 'sumit12@gmail.com', '1234', 'Doctor', 'requested', 1, NULL),
(41, 6, NULL, NULL, NULL, 'shorifdoc@yahoo.com', '1234', 'Doctor', 'requested', 1, NULL),
(42, 7, NULL, NULL, NULL, 'mahal@yahoo.com', '1234', 'Doctor', 'requested', 0, NULL),
(43, 8, NULL, NULL, NULL, 'togorgul@gmail.com', '1234', 'Doctor', 'requested', 1, NULL),
(44, 9, NULL, NULL, NULL, 'tahsin@gmail.com', '1234', 'Doctor', 'requested', 0, NULL),
(45, 10, NULL, NULL, NULL, 'miskat2@gmail.com', '1234', 'Doctor', 'requested', 1, NULL),
(46, NULL, 1, NULL, NULL, 'ruposh.cse@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(47, NULL, 2, NULL, NULL, 'khadijaiubat@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(48, NULL, 3, NULL, NULL, 'sharifulalam@hotmail.com', '123', 'Patient', 'requested', 1, NULL),
(49, NULL, 4, NULL, NULL, 'taniaaust@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(50, NULL, 5, NULL, NULL, 'nirjhoreee@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(51, NULL, 6, NULL, NULL, 'sayma111@yahoo.com', '123', 'Patient', 'requested', 1, NULL),
(52, NULL, 7, NULL, NULL, 'koniaiubat@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(53, NULL, 8, NULL, NULL, 'ferdous456@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(54, NULL, 9, NULL, NULL, 'salehaarchi@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(55, NULL, 10, NULL, NULL, 'greentea@hotmail.com', '123', 'Patient', 'requested', 1, NULL),
(56, NULL, 11, NULL, NULL, 'heravai@yahoo.com', '123', 'Patient', 'requested', 1, NULL),
(57, NULL, 12, NULL, NULL, 'niloyiubat@yahoo.com', '123', 'Patient', 'requested', 1, NULL),
(58, NULL, 13, NULL, NULL, 'sohelunknown@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(59, NULL, 14, NULL, NULL, 'dindaday@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(60, NULL, 15, NULL, NULL, 'alambagura@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(61, NULL, 16, NULL, NULL, 'nahidbanker@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(62, NULL, 17, NULL, NULL, 'mukul_ahmed@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(63, NULL, 18, NULL, NULL, 'ahmed_bup@yahoo.com', '123', 'Patient', 'requested', 1, NULL),
(64, NULL, 19, NULL, NULL, 'aminul1209@gmail.com', '123', 'Patient', 'requested', 1, NULL),
(65, NULL, 20, NULL, NULL, 'imranspirit@gmail.com', '123', 'Patient', 'requested', 0, NULL),
(66, NULL, NULL, 36, NULL, 'contact@medex.com', '12345', 'Pharmaceutical', 'requested', 1, '30/12/2019 at 03:13 pm'),
(67, NULL, NULL, NULL, NULL, 'admin', 'admin', 'Admin', 'admin', 1, NULL),
(68, NULL, NULL, 37, NULL, 'khadijaiubat@gmail.com', '123', 'Pharmaceutical', 'requested', 0, NULL),
(69, NULL, NULL, 38, NULL, 'ipi@ipi.com', '1234', 'Pharmaceutical', 'requested', 1, NULL),
(70, NULL, 21, NULL, NULL, 'shorif@gmail.com', '1234', 'Patient', '17-Jul-2020', 1, NULL),
(71, 11, NULL, NULL, NULL, 'mehdi@gmail.com', '1234', 'Doctor', '17-Jul-2020', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medid` int(11) NOT NULL,
  `med_name` varchar(200) NOT NULL,
  `power` varchar(200) NOT NULL,
  `genericid` int(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='medicine';

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medid`, `med_name`, `power`, `genericid`, `company_id`, `type`, `rate`, `description`) VALUES
(1, 'Seclo', '40 mg', 1, 1, 'Capsule', '50', NULL),
(2, 'Nelvir', '250 mg', 3, 1, 'Tablet', '100', NULL),
(3, 'Folicasia', '50 mg', 7, 20, 'Capsule', '100', NULL),
(4, 'MB 12', '50 mg', 8, 7, 'Capsule', '100', NULL),
(5, 'Larnox LA', '50 mg', 9, 5, 'Capsule', '100', NULL),
(6, 'Axofyl', '50 mg', 10, 27, 'Capsule', '100', NULL),
(7, 'Clinacyn', '50 mg', 12, 5, 'Capsule', '100', NULL),
(8, 'Adinir', '50 mg', 15, 7, 'Capsule', '100', NULL),
(9, 'Aristocal 500', '50 mg', 17, 5, 'Capsule', '100', NULL),
(10, 'Bonec 500', '50 mg', 17, 27, 'Capsule', '100', NULL),
(11, 'Depol', '50 mg', 24, 19, 'Capsule', '100', NULL),
(12, 'Gastalfet', '50 mg', 26, 5, 'Capsule', '100', NULL),
(13, 'Envitor', '50 mg', 28, 25, 'Capsule', '100', NULL),
(14, 'Cavic-C', '50 mg', 29, 14, 'Capsule', '100', NULL),
(15, 'Amoxon', '50 mg', 32, 26, 'Capsule', '100', NULL),
(16, 'Somolax', '50 mg', 2, 14, 'Capsule', '100', NULL),
(17, 'Deslor', '50 mg', 5, 27, 'Capsule', '100', NULL),
(18, 'Brezofil', '50 mg', 10, 33, 'Capsule', '100', NULL),
(19, 'Climycin', '50 mg', 12, 1, 'Capsule', '100', NULL),
(20, 'Palcef', '50 mg', 15, 8, 'Capsule', '100', NULL),
(21, 'Etrocin', '50 mg', 16, 5, 'Capsule', '100', NULL),
(22, 'Anet', '50 mg', 25, 12, 'Capsule', '100', NULL),
(23, 'Antepsin', '50 mg', 26, 12, 'Capsule', '100', NULL),
(24, 'Cod Liver oil', '50 mg', 27, 2, 'Capsule', '100', NULL),
(25, 'Calbo C', '50 mg', 29, 1, 'Capsule', '100', NULL),
(26, 'Oseflu', '50 mg', 30, 5, 'Capsule', '100', NULL),
(27, 'Almoxil', '50 mg', 32, 22, 'Capsule', '100', NULL),
(28, 'Avifix', '50 mg', 3, 5, 'Capsule', '100', NULL),
(29, 'Axet', '50 mg', 11, 27, 'Capsule', '100', NULL),
(30, 'Calciin-O', '50 mg', 18, 8, 'Capsule', '100', NULL),
(31, 'Lymeclin', '50 mg', 19, 14, 'Capsule', '100', NULL),
(32, 'Adiz 250', '50 mg', 21, 10, 'Capsule', '100', NULL),
(33, 'Aspirin 300', '50 mg', 23, 18, 'Capsule', '100', NULL),
(34, 'Aceta', '50 mg', 24, 11, 'Capsule', '100', NULL),
(35, 'Spasverin', '50 mg', 2, 32, 'Capsule', '100', NULL),
(36, 'Avifanz', '50 mg', 4, 5, 'Capsule', '100', NULL),
(37, 'Adetil', '50 mg', 11, 16, 'Capsule', '100', NULL),
(38, 'metorax', '50 mg', 14, 8, 'Capsule', '100', NULL),
(39, 'Ulsec', '50 mg', 26, 30, 'Capsule', '100', NULL),
(40, 'Amantril', '50 mg', 31, 17, 'Capsule', '100', NULL),
(41, 'Rutix', '50 mg', 33, 1, 'Capsule', '100', NULL),
(42, 'Cosec', '50 mg', 1, 2, 'Capsule', '100', NULL),
(43, 'Alve', '50 mg', 2, 27, 'Capsule', '100', NULL),
(44, 'Aslor', '50 mg', 5, 2, 'Capsule', '100', NULL),
(45, 'Ascova ', '50 mg', 10, 28, 'Capsule', '100', NULL),
(46, 'Boni Glod', '50 mg', 18, 15, 'Capsule', '100', NULL),
(47, 'Adecin', '50 mg', 22, 16, 'Capsule', '100', NULL),
(48, 'Beuflox', '50 mg', 22, 14, 'Capsule', '100', NULL),
(49, 'Cibact', '50 mg', 22, 10, 'Capsule', '100', NULL),
(50, 'Adegut', '50 mg', 25, 16, 'Capsule', '100', NULL),
(51, 'Anasec', '50 mg', 1, 13, 'Capsule', '100', NULL),
(52, 'Refolic', '50 mg', 7, 24, 'Capsule', '100', NULL),
(53, 'Trexonate', '50 mg', 14, 32, 'Capsule', '100', NULL),
(54, 'Eromycin ', '50 mg', 16, 1, 'Capsule', '100', NULL),
(55, 'Carva 75', '50 mg', 23, 1, 'Capsule', '100', NULL),
(56, 'Solrin 75', '50 mg', 23, 25, 'Capsule', '100', NULL),
(57, 'Ace ', '500 mg', 24, 1, 'Capsule', '100', NULL),
(58, 'Codvit ', '50 mg', 27, 25, 'Capsule', '100', NULL),
(59, 'Aviflu', '50 mg', 30, 1, 'Capsule', '100', NULL),
(60, 'Amoxizen', '50 mg', 32, 35, 'Capsule', '100', NULL),
(61, 'Flocet', '50 mg', 33, 25, 'Capsule', '100', NULL),
(62, 'B-Dexa', '50 mg', 6, 23, 'Capsule', '100', NULL),
(63, 'Odeson', '50 mg', 6, 5, 'Capsule', '100', NULL),
(64, 'Folate', '50 mg', 7, 6, 'Capsule', '100', NULL),
(65, 'Brolin Retard', '50 mg', 9, 15, 'Capsule', '100', NULL),
(66, 'Filin', '50 mg', 9, 25, 'Capsule', '100', NULL),
(67, 'Anobac', '50 mg', 12, 33, 'Capsule', '100', NULL),
(68, 'Endoxan Coated', '50 mg', 13, 21, 'Capsule', '100', NULL),
(69, 'Ridicef', '50 mg', 15, 34, 'Capsule', '100', NULL),
(70, 'Acical 500', '50 mg', 17, 17, 'Capsule', '100', NULL),
(71, 'Calborate', '50 mg', 18, 1, 'Capsule', '100', NULL),
(72, 'Capdom', '50 mg', 20, 9, 'Capsule', '100', NULL),
(73, 'Carnitab', '50 mg', 28, 5, 'Capsule', '100', NULL),
(74, 'Casalt-C', '50 mg', 29, 12, 'Capsule', '100', NULL),
(75, 'Futavir', '50 mg', 30, 14, 'Capsule', '100', NULL),
(76, 'Oflacin', '50 mg', 33, 2, 'Capsule', '100', NULL),
(77, 'Nelvir ', '50 mg', 3, 1, 'Capsule', '100', NULL),
(78, 'Alertadin', '50 mg', 5, 32, 'Capsule', '100', NULL),
(79, 'Dexonex', '50 mg', 6, 1, 'Capsule', '100', NULL),
(80, 'Methicol', '50 mg', 8, 1, 'Capsule', '100', NULL),
(81, 'Nervex', '50 mg', 8, 27, 'Capsule', '100', NULL),
(82, 'Neoclomide', '50 mg', 13, 3, 'Capsule', '100', NULL),
(83, 'Erythrox', '50 mg', 16, 8, 'Capsule', '100', NULL),
(84, 'Ace PLUS', '50 mg', 20, 1, 'Capsule', '100', NULL),
(85, 'Fap PLUS', '50 mg', 20, 29, 'Capsule', '100', NULL),
(86, 'Avalon 500', '50 mg', 21, 4, 'Capsule', '100', NULL),
(87, 'Azalid', '50 mg', 21, 27, 'Capsule', '100', NULL),
(88, 'Deflux', '50 mg', 25, 5, 'Capsule', '100', NULL),
(89, 'Codcap', '50 mg', 27, 14, 'Capsule', '100', NULL),
(90, 'Carniten', '50 mg', 28, 2, 'Capsule', '100', NULL),
(91, 'Influ', '50 mg', 31, 31, 'Capsule', '100', NULL),
(97, 'Napa Extra', '500 mg', 24, 1, 'Tablet', '10', 'Keep in cool weather'),
(98, 'Lumenta', '10 mg', 35, 36, 'Tablet', '35', 'Keep in cool weather'),
(99, 'Neofloxin', '500 mg', 22, 36, 'Tablet', '30', 'Keep in cool weather'),
(100, 'Algin', '50 mg', 34, 8, 'Tablet', '20', 'Keep in cool weather'),
(101, 'Napa Extend', '665 mg', 24, 5, 'Tablet', '50', 'Keep in cool weather'),
(102, 'Zimax', '500 mg', 21, 1, 'Tablet', '80', 'Keep in cool weather'),
(103, 'Civit', '250 mg', 36, 1, 'Tablet', '20', 'Keep in cool weather'),
(104, 'Ketomar', '8 mg', 37, 14, 'Tablet', '25', 'Keep in cool weather'),
(105, 'Virux HC', '5%+1% mg', 38, 1, 'Cream', '340', 'Keep in cool weather'),
(106, 'Virux', '400 mg', 39, 1, 'Tablet', '120', 'Keep in cool weather'),
(107, 'Ace XR Tablet', '665 mg', 24, 1, 'Tablet', '55', 'Keep in cool weather'),
(108, 'Voligel', '1% w/w', 40, 5, 'Gel', '124', 'Keep in cool weather'),
(109, 'Napadol', '325mg + 37.5mg', 41, 5, 'Tablet', '48', 'Keep in cool weather'),
(110, 'Sergel ', '20 mg', 42, 3, 'Capsule', '45', 'Keep in cool weather'),
(111, 'Gaba ', '300 mg', 43, 8, 'Tablet', '120', 'Keep in cool weather'),
(112, 'Myolax', '50 mg', 44, 14, 'Tablet', '300', 'Keep in cool weather'),
(113, 'Dermax NN', '0.05% + 0.5% + 2%', 45, 25, 'Cream', '200', 'Keep in cool weather'),
(114, 'Ostocal DX', '600mg + 400mg', 47, 36, 'Tablet', '240', 'Keep in cool weather'),
(115, 'Peridone', '10 mg', 46, 36, 'Tablet', '35', 'Keep in cool weather'),
(116, 'Ciprocin', '500 mg', 22, 1, 'Tablet', '132', 'Keep in cool weather'),
(117, 'ORS Saline', '10.25 mg', 50, 1, 'Suspension', '10', ''),
(118, 'Emistat', '8 mg', 49, 3, 'Tablet', '58', 'Keep in cool weather'),
(119, 'Metro', '400 mg', 48, 36, 'Tablet', '60', 'Keep in cool weather'),
(120, 'T-Cef', '400 mg', 52, 2, 'Capsule', '351', 'Keep in cool weather'),
(121, 'Cosec', '20 mg', 1, 2, 'Capsule', '252', 'Keep in cool weather'),
(122, 'Dipa', '10 mg', 51, 2, 'Capsule', '215', 'Keep in cool weather'),
(123, 'Ciclex Nasal Spray', '50 mg', 53, 25, 'Spray', '150', 'Keep in cool weather');

-- --------------------------------------------------------

--
-- Table structure for table `med_generic`
--

CREATE TABLE `med_generic` (
  `genericid` int(200) NOT NULL,
  `generic_name` varchar(40) NOT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_generic`
--

INSERT INTO `med_generic` (`genericid`, `generic_name`, `status`) VALUES
(1, 'Omeprazole', 1),
(2, 'Alverine', 1),
(3, 'Nelfinavir', 1),
(4, 'Efavirnez', 1),
(5, 'Desloratadine', 1),
(6, 'Dexamethasone', 1),
(7, 'Folic Acid', 1),
(8, 'Mecobalamin', 1),
(9, 'Aminophyline', 1),
(10, 'Doxofylline', 1),
(11, 'Cefuroxime', 1),
(12, 'Clindamycin', 1),
(13, 'Cyclophosphamide', 1),
(14, 'Methotreaxate', 1),
(15, 'Cefdinir', 1),
(16, 'Erythromycin', 1),
(17, 'Calcium Carbonet', 1),
(18, 'Calcium Orotate', 1),
(19, 'Lymecycline', 1),
(20, 'Paracetamol+Caffeine', 1),
(21, 'Azithromycin', 1),
(22, 'Ciprofloxacin', 1),
(23, 'Aspirin', 1),
(24, 'Paracetamol', 1),
(25, 'Domperidone', 1),
(26, 'Sucralfate', 1),
(27, 'Cod Liver Oil', 1),
(28, 'Levocarnitine', 1),
(29, 'Calcium Carbonate+Gluconate+Vitamin-c', 1),
(30, 'Oseltamivir', 1),
(31, 'Aantadine Hydrochloride', 1),
(32, 'Amoxicillin', 1),
(33, 'Ofloxacin', 1),
(34, 'Tiemonium Methylsulphate', 1),
(35, 'Montelukast Sodium', 1),
(36, 'Ascorbic Acid', 1),
(37, 'Ketotifen', 1),
(38, 'Acyclovir + Hydrocortisone', 0),
(39, 'Acyclovir (Oral)', 1),
(40, 'Diclofenac Sodium', 1),
(41, 'Paracetamol + Tramadol Hydrochloride', 1),
(42, 'Esomeprazole', 1),
(43, 'Gabapentin', 1),
(44, 'Tolperisone Hydrochloride', 1),
(45, 'Clobetasol Propionate + Neomycin Sulphat', 1),
(46, 'Domperidone Maleate', 1),
(47, 'Calcium Carbonate + Cholecalciferol (Vit', 1),
(48, 'Metronidazole', 1),
(49, 'Ondansetron', 1),
(50, 'Oral Rehydration Salt (Powder)', 1),
(51, 'Rupatadine Fumarate', 1),
(52, 'Cefixime Trihydrate', 1),
(53, 'Ciclesonide', 1),
(54, 'f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `nid` varchar(17) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `district_id` int(200) NOT NULL,
  `propic` varchar(500) NOT NULL,
  `nid_pic` varchar(255) NOT NULL,
  `auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `fname`, `lname`, `dob`, `gender`, `blood`, `nid`, `nationality`, `phone`, `email`, `district_id`, `propic`, `nid_pic`, `auth_id`) VALUES
(1, 'Mehedi', 'Islam', '1991-05-26', 'Male', 'B+', '1994123751237', 'Bangladeshi', '01735108437', 'ruposh.cse@gmail.com', 34, 'pic1.jpg', 'nid1.jpg', NULL),
(2, 'Khadija', 'Akter', '1991-05-27', 'Female', 'O+', '1994123751321', 'Bangladeshi', '01670851102', 'khadijaiubat@gmail.com', 52, 'pic2.jpg', 'nid2.jpg', NULL),
(3, 'Sharif', 'Alam', '1991-05-28', 'Male', 'A+', '1994123751639', 'Bangladeshi', '01917719536', 'sharifulalam@hotmail.com', 18, 'pic3.jpg', 'nid3.jpg', NULL),
(4, 'Tania', 'Morshed', '1991-05-29', 'Female', 'O+', '1994123751657', 'Bangladeshi', '01919951165', 'taniaaust@gmail.com', 34, 'pic4.jpg', 'nid4.jpg', NULL),
(5, 'Fahmida', 'Nirjhor', '1991-05-30', 'Female', 'A+', '1994123751218', 'Bangladeshi', '01814563521', 'nirjhoreee@gmail.com', 23, 'pic5.jpg', 'nid5.jpg', NULL),
(6, 'Tahsina', 'Sayma', '1991-05-31', 'Female', 'A+', '1994123751345', 'Bangladeshi', '01677066953', 'sayma111@yahoo.com', 16, 'pic6.jpg', 'nid6.jpg', NULL),
(7, 'Konia', 'Akter', '1991-06-01', 'Female', 'O+', '1994123751873', 'Bangladeshi', '01915066345', 'koniaiubat@gmail.com', 20, 'pic7.jpg', 'nid7.jpg', NULL),
(8, 'Jakia', 'Ferdaus', '1991-06-02', 'Female', 'AB+', '1994123750934', 'Bangladeshi', '01515986532', 'ferdous456@gmail.com', 2, 'pic8.jpg', 'nid8.jpg', NULL),
(9, 'Saleha', 'Begum', '1991-06-03', 'Female', 'B+', '1994123750985', 'Bangladeshi', '01917719563', 'salehaarchi@gmail.com', 18, 'pic9.jpg', 'nid9.jpg', NULL),
(10, 'Sabujur', 'Rahman', '1991-06-04', 'Male', 'O+', '1994123750075', 'Bangladeshi', '01717568478', 'greentea@hotmail.com', 11, 'pic10.jpg', 'nid10.jpg', NULL),
(11, 'Shahid', 'Hera', '1991-06-05', 'Male', 'AB+', '1994123750078', 'Bangladeshi', '01717170345', 'heravai@yahoo.com', 45, 'pic11.jpg', 'nid11.jpg', NULL),
(12, 'Niloy', 'Khan', '1991-06-06', 'Male', 'B+', '1994123750367', 'Bangladeshi', '01914957069', 'niloyiubat@yahoo.com', 16, 'pic12.jpg', 'nid12.jpg', NULL),
(13, 'Sohel', 'Ahmed', '1991-06-07', 'Male', 'A+', '1994123754500', 'Bangladeshi', '01670957068', 'sohelunknown@gmail.com', 18, 'pic13.jpg', 'nid13.jpg', NULL),
(14, 'Din', 'Islam', '1991-06-08', 'Male', 'B+', '1994126437747', 'Bangladeshi', '01618963845', 'dindaday@gmail.com', 50, 'pic14.jpg', 'nid14.jpg', NULL),
(15, 'Masqur', 'Alam', '1991-06-09', 'Male', 'O+', '1994123751951', 'Bangladeshi', '01916854236', 'alambagura@gmail.com', 45, 'pic15.jpg', 'nid15.jpg', NULL),
(16, 'Nahiduzzaman', 'Khan', '1991-06-10', 'Male', 'AB+', '1994123009562', 'Bangladeshi', '01715215487', 'nahidbanker@gmail.com', 34, 'pic16.jpg', 'nid16.jpg', NULL),
(17, 'Mukul', 'Ahmed', '1991-06-11', 'Male', 'O+', '1994123723230', 'Bangladeshi', '01617543289', 'mukul_ahmed@gmail.com', 48, 'pic17.jpg', 'nid7.jpg', NULL),
(18, 'Faisal', 'Ahmed', '1991-06-12', 'Male', 'B+', '1994123754838', 'Bangladeshi', '01512574824', 'ahmed_bup@yahoo.com', 51, 'pic18.jpg', 'nid18.jpg', NULL),
(19, 'Aminul', 'Islam', '1991-06-13', 'Male', 'O+', '1994123409729', 'Bangladeshi', '01515679542', 'aminul1209@gmail.com', 37, 'pic19.jpg', 'nid19.jpg', NULL),
(20, 'Imran', 'Masud', '1991-06-14', 'Male', 'B+', '1994123753703', 'Bangladeshi', '01814256725', 'imranspirit@gmail.com', 22, 'pic20.jpg', 'nid20.jpg', NULL),
(21, 'Shoriful ', 'Alam', '1992-01-01', 'Male', 'A+', '123456', '123456', '1234567890', 'shorif@gmail.com', 18, 'profile picture-doctor - Copy.jpg', 'NID - Copy.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pharmaceutical`
--

CREATE TABLE `pharmaceutical` (
  `company_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `web` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `trade_license` varchar(500) NOT NULL,
  `cmmi_iso` varchar(500) NOT NULL,
  `tradefile` varchar(500) DEFAULT NULL,
  `cmmifile` varchar(500) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmaceutical`
--

INSERT INTO `pharmaceutical` (`company_id`, `name`, `address`, `contact`, `web`, `email`, `trade_license`, `cmmi_iso`, `tradefile`, `cmmifile`, `auth_id`) VALUES
(1, 'Square Pharmaceticals Limited', 'Dhaka, Bangladesh', '2123123', 'www.square.com', 'info@square.com', '1232134365', 'ISO 805', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(2, 'Drug International Ltd.', 'Dhaka, Bangladesh', '2123', 'www.dru.com', 'info@dru.com', '2123', 'ISO 802', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(3, 'Healthcare Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '3123', 'www.hea.com', 'info@hea.com', '3123', 'ISO 803', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(4, 'Techno Drugs Ltd.', 'Dhaka, Bangladesh', '4123', 'www.tec.com', 'info@tec.com', '4123', 'ISO 804', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(5, 'Beximco Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '5123', 'www.bex.com', 'info@bex.com', '5123', 'ISO 805', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(6, 'Ad-din Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '6123', 'www.ad-.com', 'info@ad-.com', '6123', 'ISO 806', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(7, 'Acme Laboratories ltd.', 'Dhaka, Bangladesh', '7123', 'www.acm.com', 'info@acm.com', '7123', 'ISO 807', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(8, 'Reneta Limited', 'Dhaka, Bangladesh', '8123', 'www.ren.com', 'info@ren.com', '8123', 'ISO 808', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(9, 'Novo  Healthcare and pharma', 'Dhaka, Bangladesh', '9123', 'www.nov.com', 'info@nov.com', '9123', 'ISO 809', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(10, 'Euro Pharma Ltd.', 'Dhaka, Bangladesh', '10123', 'www.eur.com', 'info@eur.com', '10123', 'ISO 8010', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(11, 'Bio Pharma Laboratories Ltd.', 'Dhaka, Bangladesh', '11123', 'www.bio.com', 'info@bio.com', '11123', 'ISO 8011', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(12, 'Kemiko Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '12123', 'www.kem.com', 'info@kem.com', '12123', 'ISO 8012', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(13, 'Novo  ealthcare and pharma', 'Dhaka, Bangladesh', '13123', 'www.nov.com', 'info@nov.com', '13123', 'ISO 8013', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(14, 'Incepta Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '14123', 'www.inc.com', 'info@inc.com', '14123', 'ISO 8014', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(15, 'Delta Pharma Ltd.', 'Dhaka, Bangladesh', '15123', 'www.del.com', 'info@del.com', '15123', 'ISO 8015', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(16, 'Supreme Pharmaceuticals Ltd.S', 'Dhaka, Bangladesh', '16123', 'www.sup.com', 'info@sup.com', '16123', 'ISO 8016', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(17, 'ACI Limited', 'Dhaka, Bangladesh', '17123', 'www.aci.com', 'info@aci.com', '17123', 'ISO 8017', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(18, 'Biogen Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '18123', 'www.bio.com', 'info@bio.com', '18123', 'ISO 8018', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(19, 'Desh Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '19123', 'www.des.com', 'info@des.com', '19123', 'ISO 8019', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(20, 'Pharmasia Ltd.', 'Dhaka, Bangladesh', '20123', 'www.pha.com', 'info@pha.com', '20123', 'ISO 8020', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(21, 'Sanofi Aventis (BD)Ltd.', 'Dhaka, Bangladesh', '21123', 'www.san.com', 'info@san.com', '21123', 'ISO 8021', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(22, 'Aexim Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '22123', 'www.aex.com', 'info@aex.com', '22123', 'ISO 8022', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(23, 'Belsen Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '23123', 'www.bel.com', 'info@bel.com', '23123', 'ISO 8023', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(24, 'Reliance Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '24123', 'www.rel.com', 'info@rel.com', '24123', 'ISO 8024', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(25, 'Opsonin Pharma Ltd.', 'Dhaka, Bangladesh', '25123', 'www.ops.com', 'info@ops.com', '25123', 'ISO 8025', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(26, 'Jayson Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '26123', 'www.jay.com', 'info@jay.com', '26123', 'ISO 8026', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(27, 'Orion Pharma Ltd.', 'Dhaka, Bangladesh', '27123', 'www.ori.com', 'info@ori.com', '27123', 'ISO 8027', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(28, 'Labaid Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '28123', 'www.lab.com', 'info@lab.com', '28123', 'ISO 8028', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(29, 'Beacon Pharmaceuticals', 'Dhaka, Bangladesh', '29123', 'www.bea.com', 'info@bea.com', '29123', 'ISO 8029', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(30, 'Asiatic Laboratories Ltd.', 'Dhaka, Bangladesh', '30123', 'www.asi.com', 'info@asi.com', '30123', 'ISO 8030', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(31, 'Peoples Pharma Ltd.', 'Dhaka, Bangladesh', '31123', 'www.peo.com', 'info@peo.com', '31123', 'ISO 8031', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(32, 'Becom Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '32123', 'www.bec.com', 'info@bec.com', '32123', 'ISO 8032', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(33, 'Globe pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '33123', 'www.glo.com', 'info@glo.com', '33123', 'ISO 8033', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(34, 'Navana Pharmacetucals Ltd.', 'Dhaka, Bangladesh', '34123', 'www.nav.com', 'info@nav.com', '34123', 'ISO 8034', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(35, 'Zenith Pharmaceuticals Ltd.', 'Dhaka, Bangladesh', '35123', 'www.zen.com', 'info@zen.com', '35123', 'ISO 8035', 'IMG-20190406-WA0005.jpg', 'IMG-20190512-WA0000.jpg', NULL),
(36, 'MedEx', 'Dhaka, Bangladesh', '0262046', 'www.medex.com.bd/', 'contact@medex.com', '128637489142', 'ISO 805', 'Trade License.jpg', 'ISO cert.jpg', NULL),
(37, 'hhjj', 'bnf', '01954440927', 'www.hhh.com', 'khadijaiubat@gmail.com', '5255', '4555', '82827879_2474131249363812_5520112008583708672_n.png', 'Data.png', NULL),
(38, 'IBN SINA Pharmaceutical Industry', 'Asad Gate', '123456', 'info@ipi.com', 'ipi@ipi.com', '123456', '123456', 'Trade License - Copy (2).jpg', 'ISO cert - Copy.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_medicines`
--

CREATE TABLE `prescribed_medicines` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medid` int(11) NOT NULL,
  `instruction_route` varchar(100) DEFAULT NULL,
  `medication_advise` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescribed_medicines`
--

INSERT INTO `prescribed_medicines` (`id`, `prescription_id`, `medid`, `instruction_route`, `medication_advise`) VALUES
(1, 1, 1, '1 + 1 + 1', '15days, before meal'),
(2, 1, 97, '1 + 1 + 1', 'after meal, If temperature is above of 100 degreee'),
(3, 2, 104, '0 + 0 + 1', '10 days'),
(4, 2, 97, '0 + 1 + 1', '7 days'),
(5, 2, 102, '1 + 1 + 1', '5 days'),
(6, 2, 98, '0 + 1 + 0', '7 days'),
(7, 3, 98, '1 + 1 + 1', '3 days'),
(8, 3, 102, '1 + 0 + 1', '7 days'),
(9, 3, 104, '0 + 1 + 1', '10 days'),
(10, 3, 101, '1 + 1 + 1', '12 days'),
(11, 4, 101, '1 + 1 + 1', '7 days'),
(12, 4, 102, '1 + 0 + 1', '10 days'),
(13, 4, 104, '1 + 0 + 1', '5 days'),
(14, 4, 42, '1 + 1 + 1', '10 days'),
(15, 5, 99, '1 + 0 + 1', '7 Days'),
(16, 5, 100, '1 + 1 + 1', '5 Days'),
(17, 5, 57, '1 + 1 + 1', '3 Days. If you feel fever or pain '),
(18, 6, 102, '1 + 0 + 0', '7 Days'),
(19, 6, 97, '1 + 1 + 1', '5 Days'),
(20, 6, 103, '1 + 1 + 1', '7 Days'),
(21, 6, 27, '', ''),
(22, 7, 102, '1 + 0 + 0', '7 Days'),
(23, 7, 97, '1 + 1 + 1', '5 Days'),
(24, 7, 103, '1 + 1 + 1', '7 Days'),
(25, 8, 102, '1 + 0 + 0', '7 Days'),
(26, 8, 97, '1 + 1 + 1', '5 Days'),
(27, 8, 103, '1 + 1 + 1', '7 Days'),
(28, 9, 102, '1 + 0 + 0', '7 Days'),
(29, 9, 97, '1 + 1 + 1', '5 Days'),
(30, 9, 103, '1 + 1 + 1', '7 Days'),
(31, 10, 99, '1 + 0 + 1', '7 Days'),
(32, 10, 100, '1 + 1 + 1', '5 Days'),
(33, 10, 57, '1 + 1 + 1', '3 Days. (If fever or pain)'),
(34, 11, 11, '0 + 1 + 1', '15days, before meal'),
(35, 12, 112, '1 + 1 + 1', '15 Days'),
(36, 12, 114, '1 + 0 + 0', '2 Months'),
(37, 12, 107, '1 + 1 + 1', 'if pain'),
(38, 12, 110, '1 + 0 + 1', '2 Months'),
(39, 12, 108, '1 + 1 + 1', 'if pain'),
(40, 13, 112, '1 + 1 + 1', '15 Days'),
(41, 13, 114, '1 + 0 + 0', '2 Months'),
(42, 13, 110, '1 + 0 + 1', '2 Month'),
(43, 13, 107, '1 + 1 + 1', 'if pain'),
(44, 13, 108, '1 + 1 + 1', 'if pain'),
(45, 14, 106, '1 + 1 + 1', '15 Days'),
(46, 14, 111, '1 + 0 + 1', '1 Month'),
(47, 14, 105, '1 + 0 + 1', '1 Month'),
(48, 14, 113, '1 + 0 + 1', '1 Month'),
(49, 14, 109, '1 + 1 + 1', 'if pain'),
(50, 15, 106, '1 + 1 + 1', '15 Days'),
(51, 15, 111, '1 + 0 + 1', '1 Month'),
(52, 15, 105, '1 + 0 + 1', '1 Month'),
(53, 15, 113, '1 + 0 + 1', '1 Months'),
(54, 15, 109, '1 + 1 + 1', 'if pain'),
(55, 16, 106, '1 + 1 + 1', '15 Days'),
(56, 16, 111, '1 + 0 + 1', '1 Months'),
(57, 16, 105, '1 + 0 + 1', '1 Months'),
(58, 16, 113, '1 + 0 + 1', '1 Months'),
(59, 16, 109, '1 + 1 + 1', '1 Months'),
(60, 17, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(61, 17, 112, '1 + 1 + 1', '15 Days'),
(62, 17, 107, '1 + 0 + 1', ''),
(63, 18, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(64, 18, 112, '1 + 1 + 1', '15 Days'),
(65, 18, 107, '1 + 0 + 1', ''),
(66, 19, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(67, 19, 112, '1 + 1 + 1', '15 Days'),
(68, 19, 107, '1 + 0 + 1', ''),
(69, 20, 116, '1 + 0 + 1', '7 Days'),
(70, 20, 119, '1 + 1 + 1', '5 Days'),
(71, 20, 118, '1 + 0 + 1', 'half an hour before meal, 3 Days'),
(72, 20, 117, '', 'One glass after every loose motion'),
(73, 21, 116, '1 + 0 + 1', '7 Days'),
(74, 21, 119, '1 + 1 + 1', '5 Days'),
(75, 21, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(76, 21, 117, '', 'One glass after every loose motion'),
(77, 22, 116, '1 + 0 + 1', '7 Days'),
(78, 22, 119, '1 + 1 + 1', '5 Days'),
(79, 22, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(80, 22, 117, '', 'One glass after every loose motion'),
(81, 23, 102, '1 + 1 + 1', '7 Days'),
(82, 23, 101, '1 + 1 + 1', '5 Days'),
(83, 23, 104, '1 + 0 + 1', '5 Days'),
(84, 23, 98, '0 + 0 + 1', '15 Days'),
(85, 24, 120, '1 + 0 + 1', '10 days (after meal)'),
(86, 24, 121, '1 + 0 + 1', '10 days (before meal)'),
(87, 24, 123, '1 + 1 + 1', '1 month ( spray 3 times in a day)'),
(88, 24, 122, '0 + 0 + 1', '15 days '),
(89, 25, 120, '1 + 0 + 1', '10 days (after meal)'),
(90, 25, 121, '1 + 0 + 1', '10 days (before meal)'),
(91, 25, 123, '1 + 1 + 1', '1 month (Spray 3 times in a day )'),
(92, 25, 122, '0 + 0 + 1', '15 days'),
(93, 26, 120, '1 + 0 + 1', '10 days (after meal)'),
(94, 26, 121, '1 + 0 + 1', '10 days (before meal)'),
(95, 26, 122, '0 + 0 + 1', '1 month (Spray 3 times in a day)'),
(96, 26, 123, '1 + 1 + 1', '15 days'),
(97, 27, 102, '1 + 1 + 1', '7 Days'),
(98, 27, 101, '1 + 1 + 1', '5 Days'),
(99, 27, 104, '1 + 0 + 1', '5 Days'),
(100, 27, 98, '0 + 0 + 1', '15 Days'),
(101, 28, 102, '1 + 1 + 1', '7 Days'),
(102, 28, 101, '1 + 1 + 1', '5 Days'),
(103, 28, 104, '1 + 0 + 1', '5 Days'),
(104, 28, 98, '0 + 0 + 1', '15 Days'),
(105, 29, 102, '1 + 1 + 1', '7 Days'),
(106, 29, 101, '1 + 1 + 1', '5 Days'),
(107, 29, 104, '1 + 0 + 1', '5 Days'),
(108, 29, 98, '0 + 0 + 1', '15 Days'),
(109, 30, 102, '1 + 1 + 1', '7 Days'),
(110, 30, 101, '1 + 1 + 1', '5 Days'),
(111, 30, 104, '1 + 0 + 1', '5 Days'),
(112, 30, 98, '0 + 0 + 1', '15 Days'),
(113, 31, 102, '1 + 1 + 1', '7 Days'),
(114, 31, 101, '1 + 1 + 1', '5 Days'),
(115, 31, 104, '1 + 0 + 1', '5 Days'),
(116, 31, 98, '0 + 0 + 1', '15 Days'),
(117, 32, 102, '1 + 1 + 1', '7 Days'),
(118, 32, 101, '1 + 1 + 1', '5 Days'),
(119, 32, 104, '1 + 0 + 1', '5 Days'),
(120, 32, 98, '0 + 0 + 1', '15 Days'),
(121, 33, 102, '1 + 1 + 1', '7 Days'),
(122, 33, 101, '1 + 1 + 1', '5 Days'),
(123, 33, 104, '1 + 0 + 1', '5 Days'),
(124, 33, 98, '0 + 0 + 1', '15 Days'),
(125, 34, 102, '1 + 1 + 1', '7 Days'),
(126, 34, 101, '1 + 1 + 1', '5 Days'),
(127, 34, 104, '1 + 0 + 1', '5 Days'),
(128, 34, 98, '0 + 0 + 1', '15 Days'),
(129, 35, 102, '1 + 1 + 1', '7 Days'),
(130, 35, 101, '1 + 1 + 1', '5 Days'),
(131, 35, 104, '1 + 0 + 1', '5 Days'),
(132, 35, 98, '0 + 0 + 1', '15 Days'),
(133, 36, 102, '1 + 1 + 1', '7 Days'),
(134, 36, 101, '1 + 1 + 1', '5 Days'),
(135, 36, 104, '1 + 0 + 1', '5 Days'),
(136, 36, 98, '0 + 0 + 1', '15 Days'),
(137, 37, 102, '1 + 1 + 1', '7 Days'),
(138, 37, 101, '1 + 1 + 1', '5 Days'),
(139, 37, 104, '1 + 0 + 1', '5 Days'),
(140, 37, 98, '0 + 0 + 1', '15 Days'),
(141, 38, 102, '1 + 1 + 1', '7 Days'),
(142, 38, 101, '1 + 1 + 1', '5 Days'),
(143, 38, 104, '1 + 0 + 1', '5 Days'),
(144, 38, 98, '0 + 0 + 1', '15 Days'),
(145, 39, 102, '1 + 1 + 1', '7 Days'),
(146, 39, 101, '1 + 1 + 1', '5 Days'),
(147, 39, 104, '1 + 0 + 1', '5 Days'),
(148, 39, 98, '0 + 0 + 1', '15 Days'),
(149, 40, 102, '1 + 1 + 1', '7 Days'),
(150, 40, 101, '1 + 1 + 1', '5 Days'),
(151, 40, 104, '1 + 0 + 1', '5 Days'),
(152, 40, 98, '0 + 0 + 1', '15 Days'),
(153, 41, 102, '1 + 1 + 1', '7 Days'),
(154, 41, 101, '1 + 1 + 1', '5 Days'),
(155, 41, 104, '1 + 0 + 1', '5 Days'),
(156, 41, 98, '0 + 0 + 1', '15 Days'),
(157, 42, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(158, 42, 112, '1 + 1 + 1', '15 Days'),
(159, 42, 107, '1 + 0 + 1', ''),
(160, 43, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(161, 43, 112, '1 + 1 + 1', '15 Days'),
(162, 43, 107, '1 + 0 + 1', ''),
(163, 44, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(164, 44, 112, '1 + 1 + 1', '15 Days'),
(165, 44, 107, '1 + 0 + 1', ''),
(166, 45, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(167, 45, 112, '1 + 1 + 1', '15 Days'),
(168, 45, 107, '1 + 0 + 1', ''),
(169, 46, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(170, 46, 112, '1 + 1 + 1', '15 Days'),
(171, 46, 107, '1 + 0 + 1', ''),
(172, 47, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(173, 47, 112, '1 + 1 + 1', '15 Days'),
(174, 47, 107, '1 + 0 + 1', ''),
(175, 48, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(176, 48, 112, '1 + 1 + 1', '15 Days'),
(177, 48, 107, '1 + 0 + 1', ''),
(178, 49, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(179, 49, 112, '1 + 1 + 1', '15 Days'),
(180, 49, 107, '1 + 0 + 1', ''),
(181, 50, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(182, 50, 112, '1 + 1 + 1', '15 Days'),
(183, 50, 107, '1 + 0 + 1', ''),
(184, 51, 115, '1 + 1 + 1', '7 Days (Empty Stomach)'),
(185, 51, 112, '1 + 1 + 1', '15 Days'),
(186, 51, 107, '1 + 0 + 1', ''),
(187, 52, 106, '1 + 1 + 1', '15 Days'),
(188, 52, 111, '1 + 0 + 1', '1 Month'),
(189, 52, 105, '1 + 0 + 1', '1 Month'),
(190, 52, 113, '1 + 0 + 1', '1 Month'),
(191, 52, 109, '1 + 1 + 1', 'if pain'),
(192, 53, 106, '1 + 1 + 1', '15 Days'),
(193, 53, 111, '1 + 0 + 1', '1 Month'),
(194, 53, 105, '1 + 0 + 1', '1 Month'),
(195, 53, 113, '1 + 0 + 1', '1 Month'),
(196, 53, 109, '1 + 1 + 1', 'if pain'),
(197, 54, 106, '1 + 1 + 1', '15 Days'),
(198, 54, 111, '1 + 0 + 1', '1 Month'),
(199, 54, 105, '1 + 0 + 1', '1 Month'),
(200, 54, 113, '1 + 0 + 1', '1 Month'),
(201, 54, 109, '1 + 1 + 1', 'if pain'),
(202, 55, 106, '1 + 1 + 1', '15 Days'),
(203, 55, 111, '1 + 0 + 1', '1 Month'),
(204, 55, 105, '1 + 0 + 1', '1 Month'),
(205, 55, 113, '1 + 0 + 1', '1 Month'),
(206, 55, 109, '1 + 1 + 1', 'if pain'),
(207, 56, 106, '1 + 1 + 1', '15 Days'),
(208, 56, 111, '1 + 0 + 1', '1 Month'),
(209, 56, 105, '1 + 0 + 1', '1 Month'),
(210, 56, 113, '1 + 0 + 1', '1 Month'),
(211, 56, 109, '1 + 1 + 1', 'if pain'),
(212, 57, 106, '1 + 1 + 1', '15 Days'),
(213, 57, 111, '1 + 0 + 1', '1 Month'),
(214, 57, 105, '1 + 0 + 1', '1 Month'),
(215, 57, 113, '1 + 0 + 1', '1 Month'),
(216, 57, 109, '1 + 1 + 1', 'if pain'),
(217, 58, 106, '1 + 1 + 1', '15 Days'),
(218, 58, 111, '1 + 0 + 1', '1 Month'),
(219, 58, 105, '1 + 0 + 1', '1 Month'),
(220, 58, 113, '1 + 0 + 1', '1 Month'),
(221, 58, 109, '1 + 1 + 1', 'if pain'),
(222, 59, 106, '1 + 1 + 1', '15 Days'),
(223, 59, 111, '1 + 0 + 1', '1 Month'),
(224, 59, 105, '1 + 0 + 1', '1 Month'),
(225, 59, 113, '1 + 0 + 1', '1 Month'),
(226, 59, 109, '1 + 1 + 1', 'if pain'),
(227, 60, 106, '1 + 1 + 1', '15 Days'),
(228, 60, 111, '1 + 0 + 1', '1 Month'),
(229, 60, 105, '1 + 0 + 1', '1 Month'),
(230, 60, 113, '1 + 0 + 1', '1 Month'),
(231, 60, 109, '1 + 1 + 1', 'if pain'),
(232, 61, 106, '1 + 1 + 1', '15 Days'),
(233, 61, 111, '1 + 0 + 1', '1 Month'),
(234, 61, 105, '1 + 0 + 1', '1 Month'),
(235, 61, 113, '1 + 0 + 1', '1 Month'),
(236, 61, 109, '1 + 1 + 1', 'if pain'),
(237, 62, 106, '1 + 1 + 1', '15 Days'),
(238, 62, 111, '1 + 0 + 1', '1 Month'),
(239, 62, 105, '1 + 0 + 1', '1 Month'),
(240, 62, 113, '1 + 0 + 1', '1 Month'),
(241, 62, 109, '1 + 1 + 1', 'if pain'),
(242, 63, 106, '1 + 1 + 1', '15 Days'),
(243, 63, 111, '1 + 0 + 1', '1 Month'),
(244, 63, 105, '1 + 0 + 1', '1 Month'),
(245, 63, 113, '1 + 0 + 1', '1 Month'),
(246, 63, 109, '1 + 1 + 1', 'if pain'),
(247, 64, 116, '1 + 0 + 1', '7 Days'),
(248, 64, 119, '1 + 1 + 1', '5 Days'),
(249, 64, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(250, 64, 117, '', 'One glass after every loose motion'),
(251, 65, 116, '1 + 0 + 1', '7 Days'),
(252, 65, 119, '1 + 1 + 1', '5 Days'),
(253, 65, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(254, 65, 117, '', 'One glass after every loose motion'),
(255, 66, 116, '1 + 0 + 1', '7 Days'),
(256, 66, 119, '1 + 1 + 1', '5 Days'),
(257, 66, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(258, 66, 117, '', 'One glass after every loose motion'),
(259, 67, 116, '1 + 0 + 1', '7 Days'),
(260, 67, 119, '1 + 1 + 1', '5 Days'),
(261, 67, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(262, 67, 117, '', 'One glass after every loose motion'),
(263, 68, 116, '1 + 0 + 1', '7 Days'),
(264, 68, 119, '1 + 1 + 1', '5 Days'),
(265, 68, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(266, 68, 117, '', 'One glass after every loose motion'),
(267, 69, 116, '1 + 0 + 1', '7 Days'),
(268, 69, 119, '1 + 1 + 1', '5 Days'),
(269, 69, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(270, 69, 117, '', 'One glass after every loose motion'),
(271, 70, 116, '1 + 0 + 1', '7 Days'),
(272, 70, 119, '1 + 1 + 1', '5 Days'),
(273, 70, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(274, 70, 117, '', 'One glass after every loose motion'),
(275, 71, 116, '1 + 0 + 1', '7 Days'),
(276, 71, 119, '1 + 1 + 1', '5 Days'),
(277, 71, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(278, 71, 117, '', 'One glass after every loose motion'),
(279, 72, 116, '1 + 0 + 1', '7 Days'),
(280, 72, 119, '1 + 1 + 1', '5 Days'),
(281, 72, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(282, 72, 117, '', 'One glass after every loose motion'),
(283, 73, 116, '1 + 0 + 1', '7 Days'),
(284, 73, 119, '1 + 1 + 1', '5 Days'),
(285, 73, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(286, 73, 117, '', 'One glass after every loose motion'),
(287, 74, 116, '1 + 0 + 1', '7 Days'),
(288, 74, 119, '1 + 1 + 1', '5 Days'),
(289, 74, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(290, 74, 117, '', 'One glass after every loose motion'),
(291, 75, 116, '1 + 0 + 1', '7 Days'),
(292, 75, 119, '1 + 1 + 1', '5 Days'),
(293, 75, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(294, 75, 117, '', 'One glass after every loose motion'),
(295, 76, 116, '1 + 0 + 1', '7 Days'),
(296, 76, 119, '1 + 1 + 1', '5 Days'),
(297, 76, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(298, 76, 117, '', 'One glass after every loose motion'),
(299, 77, 116, '1 + 0 + 1', '7 Days'),
(300, 77, 119, '1 + 1 + 1', '5 Days'),
(301, 77, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(302, 77, 117, '', 'One glass after every loose motion'),
(303, 78, 116, '1 + 0 + 1', '7 Days'),
(304, 78, 119, '1 + 1 + 1', '5 Days'),
(305, 78, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(306, 78, 117, '', 'One glass after every loose motion'),
(307, 79, 116, '1 + 0 + 1', '7 Days'),
(308, 79, 119, '1 + 1 + 1', '5 Days'),
(309, 79, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(310, 79, 117, '', 'One glass after every loose motion'),
(311, 80, 116, '1 + 0 + 1', '7 Days'),
(312, 80, 119, '1 + 1 + 1', '5 Days'),
(313, 80, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(314, 80, 117, '', 'One glass after every loose motion'),
(315, 81, 116, '1 + 0 + 1', '7 Days'),
(316, 81, 119, '1 + 1 + 1', '5 Days'),
(317, 81, 118, '1 + 0 + 1', 'half an our before meal, 3 days'),
(318, 81, 117, '', 'One glass after every loose motion'),
(319, 82, 1, '1 + 1 + 1', '7 Days'),
(320, 82, 2, '0 + 0 + 1', '7 Days');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_age` varchar(255) DEFAULT NULL,
  `patient_department` varchar(10) DEFAULT NULL,
  `c/c` varchar(500) DEFAULT NULL,
  `o/e` varchar(500) DEFAULT NULL,
  `findings` varchar(500) DEFAULT NULL,
  `disease_id` int(11) NOT NULL,
  `advise` varchar(500) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `doc_id`, `patient_id`, `patient_age`, `patient_department`, `c/c`, `o/e`, `findings`, `disease_id`, `advise`, `date`) VALUES
(1, 8, 2, '28 year  5 month', 'OPD', 'headache with high temperature', 'bp 120/60', '-Viral fever\r\n-Low pressure', 13, 'Following up 7days', '2019-08-08'),
(2, 1, 2, '28 year  6 month', 'OPD', 'Fever for 10 days \r\nCough for 8 days', 'CBC', 'Suspecting Dengue ', 13, 'come after 7 days', '2019-08-13'),
(3, 1, 3, '28 year  6 month', 'OPD', 'Fever for 14 days', 'CBC & ESR', '', 13, 'Take rest and drink water', '2019-08-13'),
(4, 1, 4, '28 year  6 month', 'OPD', 'Fever for 7 days\r\ncough for 10 days', 'CBC', '', 13, 'Take rest and come after 7 days ', '2019-09-13'),
(5, 3, 10, '28 year  6 month', 'OPD', '-Burning Sensation during micturation.\r\n-Lower Abdominal pain\r\n-Fever.', '-Temp: 100 F\r\n-Pulse: 90\r\n-BP: 120/60\r\n-Renal angle tenderhess: +\r\n', '-CBC\r\n-Urine R/M/E\r\n', 13, '-Drink much water \r\n- Do not keep urine pressure \r\n- Use fresh water after toilet ', '2019-09-22'),
(6, 3, 11, '28 year  6 month', 'OPD', '-Fever for 5 days', '-BP -180/80\r\n-Pulse 78\r\n-Temp -100 F', '-CBC ESR\r\n- Urine R/ME\r\n-Widal Test', 13, '-Drink much water \r\n-Sweep body again and again', '2019-09-22'),
(7, 8, 15, '28 year  6 month', 'OPD', '\r\nFever for 5 Days', '-BP 110/180\r\n-Pulse 78\r\n- Temp 100 F', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, '', '2019-10-23'),
(8, 8, 16, '28 year  6 month', 'OPD', '\r\n-Fever for 5 Days\r\n', '\r\n-BP 110/180\r\n-Pulse 78\r\n- Temp 100 F\r\n', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, 'Drink more water', '2019-10-23'),
(9, 8, 17, '28 year  6 month', 'OPD', '-Fever for 5 Days', '-BP 110/180\r\n-Pulse 78\r\n-Temp 100 F\r\n', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, '', '2019-08-23'),
(10, 3, 12, '28 year  6 month', 'OPD', '-Burning Sensation during micturation.\r\n-Lower Abdominal pain\r\n-Fever.\r\n', '-Temp: 100 F\r\n-Pulse: 90\r\n-BP: 120/60\r\n-Renal angle tenderhess: +\r\n', '\r\n-CBC\r\n-Urine R/M/E\r\n', 13, '\r\n-Drink much water \r\n- Do not keep urine pressure \r\n- Use fresh water after toilet \r\n', '2019-10-23'),
(11, 10, 1, '28 year  6 month', 'OPD', '-feeling abdominal pain\r\n-fever for 5days', '-BP 120/80', 'CBC', 12, 'Drink fresh water', '2019-12-25'),
(12, 8, 2, '28 year  7 month', 'OPD', '\r\n-LBP\r\n-Abodominal pain + 15 Days\r\n', '', '\r\n- X-ray Dorsal\r\n- L/S spine X-ray\r\n', 1, '', '2019-01-03'),
(13, 8, 4, '28 year  7 month', 'IPD', '-LBP\r\n-Abodominal pain + 15 Days\r\n', '', '\r\n- X-ray Dorsal\r\n- L/S spine X-ray\r\n', 1, '', '2019-01-06'),
(14, 1, 11, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2019-11-30'),
(15, 1, 12, '28 year  6 month', 'OPD', '-Herpes Zoster +7 Days\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '- Contact Eye Specialist\r\n', 16, '', '2019-12-30'),
(16, 1, 10, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2019-12-30'),
(17, 3, 15, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '\r\n- X-ray dorsal spine\r\n', 1, '', '2019-01-03'),
(18, 3, 16, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '\r\n- X-ray dorsal spine\r\n', 1, '', '2019-02-05'),
(19, 3, 17, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '', 1, '', '2019-03-06'),
(20, 10, 10, '28 year  6 month', 'OPD', '-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2019-06-30'),
(21, 10, 3, '28 year  7 month', 'IPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2019-06-30'),
(22, 10, 15, '28 year  6 month', 'OPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2019-07-30'),
(23, 1, 3, '28 year  7 month', 'OPD', '-Fever for 15 days\r\n-Cough for 13 days', '', '-CBC\r\n-ESR', 13, '', '2019-08-31'),
(24, 10, 10, '28 year  7 month', 'OPD', 'Ear Ache , Caughing (+10 days) ,Shortness of breath ', 'CBC,RBS,Chest-X-ray', '', 5, '1.Use musk to keep yourself away from Dust.\r\n2. Avoid allergic Food \r\n', '2020-01-05'),
(25, 10, 3, '28 year  7 month', 'OPD', 'Severe Coughing (+10 day)\r\nBreath shortness\r\nEar ache ', 'CBC\r\nRBS\r\nChest X  Ray', '', 5, '1. Use musk to stay dust free\r\n2.Avoid All types of allergic food', '2020-01-05'),
(26, 10, 15, '28 year  6 month', 'OPD', 'Sever Coughing\r\nAcute Breath Shortness', 'CBC\r\nRBS\r\nChest X ray', '', 5, '1. Use musk to stay dust free \r\n2. Avoid all allergic food', '2020-01-05'),
(27, 8, 2, '28 year  5 month', 'OPD', 'headache with high temperature', 'bp 120/60', '-Viral fever\r\n-Low pressure', 13, 'Following up 7days', '2018-08-08'),
(28, 1, 2, '28 year  6 month', 'OPD', 'Fever for 10 days \r\nCough for 8 days', 'CBC', 'Suspecting Dengue ', 13, 'come after 7 days', '2018-08-08'),
(29, 1, 3, '28 year  6 month', 'OPD', 'Fever for 14 days', 'CBC & ESR', '', 13, 'Take rest and drink water', '2018-08-08'),
(30, 1, 4, '28 year  6 month', 'OPD', 'Fever for 7 days\r\ncough for 10 days', 'CBC', '', 13, 'Take rest and come after 7 days ', '2018-09-09'),
(31, 3, 10, '28 year  6 month', 'OPD', '-Burning Sensation during micturation.\r\n-Lower Abdominal pain\r\n-Fever.', '-Temp: 100 F\r\n-Pulse: 90\r\n-BP: 120/60\r\n-Renal angle tenderhess: +\r\n', '-CBC\r\n-Urine R/M/E\r\n', 13, '-Drink much water \r\n- Do not keep urine pressure \r\n- Use fresh water after toilet ', '2018-09-10'),
(32, 3, 11, '28 year  6 month', 'OPD', '-Fever for 5 days', '-BP -180/80\r\n-Pulse 78\r\n-Temp -100 F', '-CBC ESR\r\n- Urine R/ME\r\n-Widal Test', 13, '-Drink much water \r\n-Sweep body again and again', '2017-08-09'),
(33, 8, 15, '28 year  6 month', 'OPD', '\r\nFever for 5 Days', '-BP 110/180\r\n-Pulse 78\r\n- Temp 100 F', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, '', '2017-08-08'),
(34, 8, 16, '28 year  6 month', 'OPD', '\r\n-Fever for 5 Days\r\n', '\r\n-BP 110/180\r\n-Pulse 78\r\n- Temp 100 F\r\n', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, 'Drink more water', '2017-09-10'),
(35, 8, 17, '28 year  6 month', 'OPD', '-Fever for 5 Days', '-BP 110/180\r\n-Pulse 78\r\n-Temp 100 F\r\n', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, '', '2017-09-09'),
(36, 3, 12, '28 year  6 month', 'OPD', '-Burning Sensation during micturation.\r\n-Lower Abdominal pain\r\n-Fever.\r\n', '-Temp: 100 F\r\n-Pulse: 90\r\n-BP: 120/60\r\n-Renal angle tenderhess: +\r\n', '\r\n-CBC\r\n-Urine R/M/E\r\n', 13, '\r\n-Drink much water \r\n- Do not keep urine pressure \r\n- Use fresh water after toilet \r\n', '2016-08-08'),
(37, 3, 11, '28 year  6 month', 'OPD', '-Fever for 5 days', '-BP -180/80\r\n-Pulse 78\r\n-Temp -100 F', '-CBC ESR\r\n- Urine R/ME\r\n-Widal Test', 13, '-Drink much water \r\n-Sweep body again and again', '2016-08-10'),
(38, 8, 15, '28 year  6 month', 'OPD', '\r\nFever for 5 Days', '-BP 110/180\r\n-Pulse 78\r\n- Temp 100 F', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, '', '2016-08-08'),
(39, 8, 16, '28 year  6 month', 'OPD', '\r\n-Fever for 5 Days\r\n', '\r\n-BP 110/180\r\n-Pulse 78\r\n- Temp 100 F\r\n', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, 'Drink more water', '2016-10-08'),
(40, 8, 17, '28 year  6 month', 'OPD', '-Fever for 5 Days', '-BP 110/180\r\n-Pulse 78\r\n-Temp 100 F\r\n', '\r\n-CBC and ESR\r\n-Urine R/M/E\r\n-Eidal Test', 13, '', '2016-10-10'),
(41, 3, 12, '28 year  6 month', 'OPD', '-Burning Sensation during micturation.\r\n-Lower Abdominal pain\r\n-Fever.\r\n', '-Temp: 100 F\r\n-Pulse: 90\r\n-BP: 120/60\r\n-Renal angle tenderhess: +\r\n', '\r\n-CBC\r\n-Urine R/M/E\r\n', 13, '\r\n-Drink much water \r\n- Do not keep urine pressure \r\n- Use fresh water after toilet \r\n', '2016-10-09'),
(42, 8, 2, '28 year  7 month', 'OPD', '\r\n-LBP\r\n-Abodominal pain + 15 Days\r\n', '', '\r\n- X-ray Dorsal\r\n- L/S spine X-ray\r\n', 1, '', '2018-01-03'),
(43, 8, 4, '28 year  7 month', 'IPD', '-LBP\r\n-Abodominal pain + 15 Days\r\n', '', '\r\n- X-ray Dorsal\r\n- L/S spine X-ray\r\n', 1, '', '2018-01-06'),
(44, 3, 15, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '\r\n- X-ray dorsal spine\r\n', 1, '', '2018-02-03'),
(45, 3, 16, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '\r\n- X-ray dorsal spine\r\n', 1, '', '2017-01-05'),
(46, 3, 17, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '', 1, '', '2017-01-05'),
(47, 8, 2, '28 year  7 month', 'OPD', '\r\n-LBP\r\n-Abodominal pain + 15 Days\r\n', '', '\r\n- X-ray Dorsal\r\n- L/S spine X-ray\r\n', 1, '', '2017-01-03'),
(48, 8, 4, '28 year  7 month', 'IPD', '-LBP\r\n-Abodominal pain + 15 Days\r\n', '', '\r\n- X-ray Dorsal\r\n- L/S spine X-ray\r\n', 1, '', '2017-03-06'),
(49, 3, 15, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '\r\n- X-ray dorsal spine\r\n', 1, '', '2016-01-03'),
(50, 3, 16, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '\r\n- X-ray dorsal spine\r\n', 1, '', '2016-01-05'),
(51, 3, 17, '28 year  6 month', 'OPD', '\r\n-Abdominal Fullnes + 10 Days\r\n', '\r\n-Temp 100F\r\n-BP  120/70 mm\r\n-Weight 67 kg\r\n', '', 1, '', '2016-02-06'),
(52, 1, 11, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2018-12-30'),
(53, 1, 12, '28 year  6 month', 'OPD', '-Herpes Zoster +7 Days\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '- Contact Eye Specialist\r\n', 16, '', '2018-12-30'),
(54, 1, 10, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2018-11-30'),
(55, 1, 11, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2018-12-30'),
(56, 1, 12, '28 year  6 month', 'OPD', '-Herpes Zoster +7 Days\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '- Contact Eye Specialist\r\n', 16, '', '2017-11-30'),
(57, 1, 10, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2017-11-30'),
(58, 1, 11, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2017-12-30'),
(59, 1, 12, '28 year  6 month', 'OPD', '-Herpes Zoster +7 Days\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '- Contact Eye Specialist\r\n', 16, '', '2017-12-30'),
(60, 1, 10, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2017-11-30'),
(61, 1, 11, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2016-12-30'),
(62, 1, 12, '28 year  6 month', 'OPD', '-Herpes Zoster +7 Days\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '- Contact Eye Specialist\r\n', 16, '', '2016-11-30'),
(63, 1, 10, '28 year  6 month', 'IPD', '\r\n-Herpes Zoster +7 Days\r\n', '\r\n-BP  115/80 mm\r\n-Pulse  78\r\n-Temp 101F\r\n', '\r\n- Contact Eye Specialist\r\n', 16, '', '2016-12-30'),
(64, 10, 10, '28 year  6 month', 'OPD', '-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-06-30'),
(65, 10, 3, '28 year  7 month', 'IPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-06-30'),
(66, 10, 15, '28 year  6 month', 'OPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-06-30'),
(67, 10, 10, '28 year  6 month', 'OPD', '-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-06-30'),
(68, 10, 3, '28 year  7 month', 'IPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-06-30'),
(69, 10, 15, '28 year  6 month', 'OPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-06-30'),
(70, 10, 10, '28 year  6 month', 'OPD', '-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-07-30'),
(71, 10, 3, '28 year  7 month', 'IPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-07-30'),
(72, 10, 15, '28 year  6 month', 'OPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2018-08-30'),
(73, 10, 10, '28 year  6 month', 'OPD', '-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2017-06-30'),
(74, 10, 3, '28 year  7 month', 'IPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2017-06-30'),
(75, 10, 15, '28 year  6 month', 'OPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2017-07-30'),
(76, 10, 10, '28 year  6 month', 'OPD', '-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2017-07-30'),
(77, 10, 3, '28 year  7 month', 'IPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2017-07-30'),
(78, 10, 15, '28 year  6 month', 'OPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2017-07-30'),
(79, 10, 10, '28 year  6 month', 'OPD', '-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2016-06-30'),
(80, 10, 3, '28 year  7 month', 'IPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2016-06-30'),
(81, 10, 15, '28 year  6 month', 'OPD', '\r\n-Passage of losse stool for 2 days 5times in a day\r\n-Voriting\r\n-Abdominal Pain\r\n', '\r\n-Pulse 88/min\r\n-BP  110/70 mm\r\n-Weight 55 kg\r\n', '', 12, '', '2016-08-30'),
(82, 1, 1, '29 year  1 month', 'OPD', 'Test C/C', 'Tes O/E', 'Test', 13, '', '2020-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialize_id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specialize_id`, `specialization`) VALUES
(1, 'Allergist'),
(2, 'Anaesthesiologist'),
(3, 'Andrologist'),
(4, 'Cardiologist'),
(5, 'Cardiac Electrophysiologist'),
(6, 'Dermatologist'),
(7, 'Emergency Room (ER) Doctors'),
(8, 'Endocrinologist'),
(9, 'Epidemiologist'),
(10, 'Family Medicine Physician'),
(11, 'Gastroenterologist'),
(12, 'Geriatrician'),
(13, 'Hyperbaric Physician'),
(14, 'Hematologist'),
(15, 'Hepatologist'),
(16, 'Immunologist'),
(17, 'Infectious Disease Specialist'),
(18, 'Intensivist'),
(19, 'Internal Medicine Specialist'),
(20, 'Maxillofacial Surgeon / Oral Surgeon'),
(21, 'Medical Examiner'),
(22, 'Medical Geneticist'),
(23, 'Neonatologist'),
(24, 'Nephrologist'),
(25, 'Neurologist'),
(26, 'Neurosurgeon'),
(27, 'Nuclear Medicine Specialist'),
(28, 'Obstetrician/Gynecologist (OB/GYN)'),
(29, 'Occupational Medicine Specialist'),
(30, 'Oncologist'),
(31, 'Ophthalmologist'),
(32, 'Orthopedic Surgeon / Orthopedist'),
(33, 'Otolaryngologist (also ENT Specialist)'),
(34, 'Parasitologist'),
(35, 'Pathologist'),
(36, 'Perinatologist'),
(37, 'Periodontist'),
(38, 'Pediatrician'),
(39, 'Physiatrist'),
(40, 'Plastic Surgeon'),
(41, 'Psychiatrist'),
(42, 'Pulmonologist'),
(43, 'Radiologist'),
(44, 'Rheumatologist'),
(45, 'Sleep Doctor / Sleep Disorders Specialist'),
(46, 'Spinal Cord Injury Specialist'),
(47, 'Sports Medicine Specialist'),
(48, 'Surgeon'),
(49, 'Thoracic Surgeon'),
(50, 'Urologist'),
(51, 'Vascular Surgeon'),
(52, 'Veterinarian'),
(53, 'Acupuncturist'),
(54, 'Audiologist'),
(55, 'AyurvedicPractioner'),
(56, 'Chiropractor'),
(57, 'Diagnostician'),
(58, 'Homeopathic Doctor'),
(59, 'Microbiologist'),
(60, 'Naturopathic Doctor'),
(61, 'Palliative care specialist'),
(62, 'Pharmacist'),
(63, 'Physiotherapist'),
(64, 'Podiatrist / Chiropodist'),
(65, 'Registered Massage Therapist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medid`);

--
-- Indexes for table `med_generic`
--
ALTER TABLE `med_generic`
  ADD PRIMARY KEY (`genericid`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `pharmaceutical`
--
ALTER TABLE `pharmaceutical`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `prescribed_medicines`
--
ALTER TABLE `prescribed_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialize_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `med_generic`
--
ALTER TABLE `med_generic`
  MODIFY `genericid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pharmaceutical`
--
ALTER TABLE `pharmaceutical`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `prescribed_medicines`
--
ALTER TABLE `prescribed_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
