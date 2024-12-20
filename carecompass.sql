-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2024 at 01:41 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carecompass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`, `phone`, `email`) VALUES
('01', 'Anzal', '1111', '01907929412', 'anzalahmedabir1234@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

DROP TABLE IF EXISTS `blood_donor`;
CREATE TABLE IF NOT EXISTS `blood_donor` (
  `donor_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `blood_group` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_donation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `area` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`donor_id`, `name`, `blood_group`, `last_donation`, `phone`, `city`, `area`) VALUES
('14', 'Sharmin Akhter', 'AB+', '2024-02-19', '01850505050', 'Khulna', 'Gollamari'),
('15', 'Arif Hossain', 'B-', '2024-04-07', '01960606060', 'Sylhet', 'Mirabazar'),
('16', 'Mahmudur Rahman', 'A-', '2024-01-10', '01670707070', 'Dhaka', 'Mohakhali'),
('17', 'Lina Khatun', 'O+', '2023-12-21', '01780808080', 'Comilla', 'Rajganj'),
('18', 'Fahim Ahmed', 'AB-', '2024-03-10', '01890909090', 'Chittagong', 'Halishahar'),
('19', 'Sabbir Hossain', 'O-', '2024-01-30', '01911111112', 'Dhaka', 'Banani'),
('2', 'Kamal Hossain', 'O-', '2024-02-10', '01822222222', 'Chittagong', 'Pahartali'),
('20', 'Mouri Islam', 'B+', '2024-02-17', '01622222223', 'Khulna', 'Boyra'),
('21', 'Tanvir Islam', 'A+', '2023-12-10', '01733333334', 'Jessore', 'Jhumjhumpur'),
('22', 'Sadia Afroz', 'AB+', '2024-01-20', '01844444445', 'Sylhet', 'Taltola'),
('23', 'Akash Khan', 'O+', '2023-11-25', '01955555556', 'Dhaka', 'Uttara'),
('24', 'Kawsar Hossain', 'B-', '2024-03-14', '01666666667', 'Rajshahi', 'Talaimari'),
('25', 'Nasrin Akhter', 'A-', '2024-01-28', '01777777778', 'Chittagong', 'Patenga'),
('26', 'Rafiq Uddin', 'O+', '2024-02-22', '01888888889', 'Comilla', 'Laksham'),
('27', 'Sharif Rahman', 'A+', '2023-12-07', '01999999990', 'Dhaka', 'Jatrabari'),
('28', 'Salma Islam', 'B+', '2024-01-05', '01601010101', 'Khulna', 'Fulbarigate'),
('29', 'Hasan Ali', 'AB-', '2024-04-11', '01711121212', 'Barisal', 'Nathullabad'),
('3', 'Asif Rahman', 'B+', '2023-12-20', '01933333333', 'Sylhet', 'Zindabazar'),
('30', 'Mim Akhter', 'O-', '2023-11-17', '01821232323', 'Jessore', 'Monirampur'),
('31', 'Habibullah Khan', 'A+', '2024-02-25', '01931343434', 'Dhaka', 'Rampura'),
('32', 'Tania Hossain', 'B-', '2024-03-29', '01641454545', 'Chittagong', 'Nasirabad'),
('33', 'Ibrahim Khalil', 'AB+', '2023-12-29', '01751565656', 'Sylhet', 'Shibganj'),
('34', 'Rubel Mia', 'A-', '2024-01-12', '01861676767', 'Rajshahi', 'Uposhohor'),
('35', 'Rezaul Karim', 'O+', '2024-02-13', '01971787878', 'Dhaka', 'Shahbagh'),
('36', 'Farida Begum', 'B+', '2023-12-04', '01681898989', 'Khulna', 'Rupsha'),
('37', 'Jahid Hasan', 'AB-', '2024-03-16', '01791909090', 'Comilla', 'Shashongacha'),
('38', 'Ayesha Akhter', 'O-', '2023-11-11', '01810101011', 'Sylhet', 'Chowhatta'),
('39', 'Ashraful Islam', 'A+', '2024-01-27', '01920202021', 'Chittagong', 'Dampara'),
('4', 'Farzana Islam', 'AB-', '2024-03-05', '01644444444', 'Khulna', 'Sonadanga'),
('40', 'Sultana Jahan', 'B-', '2024-02-07', '01630303031', 'Dhaka', 'Shyamoli'),
('41', 'Abdul Kader', 'AB+', '2024-03-25', '01740404042', 'Rajshahi', 'Nawdapara'),
('42', 'Rumi Rahman', 'O+', '2023-12-02', '01850505053', 'Jessore', 'Bagharpara'),
('43', 'Shahina Parvin', 'A-', '2024-01-14', '01960606064', 'Khulna', 'Daulatpur'),
('44', 'Zahirul Islam', 'B+', '2023-11-09', '01670707075', 'Sylhet', 'Kuarpar'),
('45', 'Parvez Alam', 'AB-', '2024-04-01', '01780808086', 'Dhaka', 'Tejgaon'),
('46', 'Rasheda Khatun', 'O-', '2024-02-03', '01890909097', 'Comilla', 'Daudkandi'),
('47', 'Maksud Rana', 'A+', '2023-12-30', '01910101018', 'Chittagong', 'Lalkhan Bazar'),
('48', 'Shahida Rahman', 'B-', '2024-01-23', '01620202029', 'Dhaka', 'Banani DOHS'),
('49', 'Sohel Rana', 'AB+', '2024-02-27', '01730303040', 'Khulna', 'Phultala'),
('5', 'Jamal Uddin', 'A-', '2024-04-15', '01755555555', 'Rajshahi', 'Shaheb Bazar'),
('50', 'Sharif Mahmud', 'O+', '2024-03-08', '01840404051', 'Rajshahi', 'Rajshahi Court'),
('6', 'Sumon Mia', 'B-', '2024-01-25', '01866666666', 'Barisal', 'Sagardi'),
('7', 'Nusrat Jahan', 'O+', '2023-11-18', '01977777777', 'Comilla', 'Kandirpar'),
('8', 'Mizanur Rahman', 'AB+', '2024-02-28', '01688888888', 'Dhaka', 'Gulshan'),
('9', 'Shahidul Alam', 'O+', '2023-10-05', '01799999999', 'Jessore', 'Chowgacha');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

DROP TABLE IF EXISTS `checks`;
CREATE TABLE IF NOT EXISTS `checks` (
  `customer_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `donor_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `J` (`donor_id`),
  KEY `Z` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `area` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `house-no` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `road_no` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `phone`, `city`, `area`, `house-no`, `road_no`, `email`, `password`) VALUES
('1', 'ABIR', 'ANZAL', '1907929412', 'DHAKA', 'BAILY RAOD', 'J-3', '1', '', ''),
('2', 's', 's', 's', 's', 's', 's', 's', 's@s.com', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `hospital_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `area` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `find_location` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hotline_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `name`, `city`, `area`, `find_location`, `hotline_number`) VALUES
('1', 'Dhaka Medical College Hospital', 'Dhaka', 'Shahbagh', '23.7372, 90.3953', '02-55165001'),
('10', 'Comilla Medical College Hospital', 'Comilla', 'Kandirpar', '23.4619, 91.1809', '081-710805'),
('11', 'Barisal Sher-E-Bangla Medical College', 'Barisal', 'Cox’s Bazar Road', '22.7004, 90.3546', '0431-217591'),
('12', 'National Institute of Cardiovascular Diseases', 'Dhaka', 'Sher-e-Bangla Nagar', '23.7767, 90.3686', '02-9115714'),
('13', 'Holy Family Red Crescent Medical College Hospital', 'Dhaka', 'Eskaton', '23.7478, 90.4018', '02-9353031'),
('15', 'BIRDEM General Hospital', 'Dhaka', 'Shahbagh', '23.7382, 90.3955', '02-9661551'),
('16', 'Rangpur Medical College Hospital', 'Rangpur', 'Carmichael Road', '25.7558, 89.2518', '0521-62052'),
('17', 'Kurigram General Hospital', 'Kurigram', 'Kachari Para', '25.8054, 89.6319', '0581-52041'),
('18', 'Jessore Medical College Hospital', 'Jessore', 'Chowgacha Road', '23.1705, 89.2042', '0421-65862'),
('19', 'Gazi Medical College Hospital', 'Khulna', 'Sonadanga', '22.8210, 89.5559', '041-720877'),
('2', 'Square Hospital', 'Dhaka', 'Panthapath', '23.7520, 90.3926', '02-8144400'),
('20', 'TMSS Medical College Hospital', 'Bogura', 'Thengamara', '24.8433, 89.3708', '051-66155'),
('3', 'Apollo Hospitals', 'Dhaka', 'Bashundhara', '23.8103, 90.4311', '02-55037242'),
('4', 'Chittagong Medical College', 'Chittagong', 'Anderkilla', '22.3514, 91.8329', '031-619400'),
('5', 'United Hospital', 'Dhaka', 'Gulshan', '23.7925, 90.4043', '02-8836000'),
('6', 'Rajshahi Medical College Hospital', 'Rajshahi', 'Rajpara', '24.3667, 88.6042', '0721-774520'),
('7', 'Sylhet MAG Osmani Medical College', 'Sylhet', 'Kumarpara', '24.8998, 91.8713', '0821-716077'),
('8', 'Khulna Medical College Hospital', 'Khulna', 'Boyra', '22.8156, 89.5687', '041-761535'),
('9', 'Ibn Sina Hospital', 'Dhaka', 'Dhanmondi', '23.7476, 90.3748', '02-9117777');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `medicine_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`medicine_id`,`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `price`, `quantity`) VALUES
('10', 'Alatrol 10mg', '2.00', '750'),
('100', 'Rivastigmine 1.5mg', '40.00', '70'),
('101', 'Paracetamol', '2.50', '1000'),
('11', 'Napa 500mg', '3.00', '1000'),
('12', 'Fexo 120mg', '12.00', '350'),
('13', 'Omeprazole 20mg', '6.00', '500'),
('14', 'Cefradine 500mg', '15.00', '250'),
('15', 'Azithromycin 250mg', '22.00', '150'),
('16', 'Ketorolac 10mg', '10.00', '200'),
('17', 'Monas 10mg', '8.50', '320'),
('18', 'Lisinopril 10mg', '5.50', '270'),
('19', 'Metformin 500mg', '4.00', '700'),
('2', 'Napa Extra', '5.00', '500'),
('20', 'Cefixime 200mg', '20.00', '180'),
('21', 'Neotack 20mg', '7.00', '600'),
('22', 'Vitamax 500mg', '18.00', '150'),
('23', 'Flucloxacillin 500mg', '17.00', '100'),
('24', 'Atorvastatin 10mg', '12.50', '340'),
('25', 'Losartan 50mg', '9.00', '280'),
('26', 'Ranitidine 150mg', '2.50', '400'),
('27', 'Levocetirizine 5mg', '5.00', '600'),
('28', 'Folic Acid 5mg', '3.50', '500'),
('29', 'Azithromycin 500mg', '30.00', '150'),
('3', 'Seclo 20mg', '8.00', '400'),
('30', 'Amaryl 2mg', '6.50', '300'),
('31', 'Salbutamol Inhaler', '150.00', '50'),
('32', 'Fluconazole 150mg', '20.00', '180'),
('33', 'Clindamycin 300mg', '18.00', '250'),
('34', 'Tetracycline 500mg', '10.50', '450'),
('35', 'Metronidazole 400mg', '4.50', '600'),
('36', 'Cetrimide Cream', '25.00', '80'),
('37', 'Amlodipine 5mg', '6.00', '320'),
('38', 'Ibuprofen 400mg', '3.00', '800'),
('39', 'Fexofenadine 180mg', '15.00', '200'),
('4', 'Ciprocin 500mg', '12.50', '300'),
('40', 'Cetirizine 10mg', '5.50', '550'),
('41', 'Gluformin XR 500mg', '6.50', '500'),
('42', 'Prednisolone 5mg', '4.00', '900'),
('43', 'Gaviscon 10ml', '20.00', '120'),
('44', 'Isosorbide Mononitrate 20mg', '8.00', '250'),
('45', 'Fluphenazine 5mg', '14.00', '170'),
('46', 'Loratadine 10mg', '4.50', '700'),
('47', 'Betnovate Cream', '35.00', '60'),
('48', 'Omnic 0.4mg', '40.00', '50'),
('49', 'Hydrocortisone 1% Cream', '22.00', '90'),
('5', 'Ace 500mg', '3.00', '800'),
('50', 'Cloxacillin 500mg', '12.00', '400'),
('51', 'Co-amoxiclav 625mg', '25.00', '150'),
('52', 'Tamsulosin 0.4mg', '35.00', '180'),
('53', 'Benzoyl Peroxide 5% Gel', '50.00', '40'),
('54', 'Levothyroxine 50mcg', '3.00', '700'),
('55', 'Bisoprolol 5mg', '7.50', '270'),
('56', 'Ketoconazole 2% Shampoo', '150.00', '30'),
('57', 'Paroxetine 20mg', '25.00', '160'),
('58', 'Vitamin C 500mg', '5.00', '1200'),
('59', 'Atenolol 50mg', '3.50', '500'),
('6', 'Aspirin 75mg', '1.50', '1200'),
('60', 'Diazepam 5mg', '2.00', '800'),
('61', 'Levofloxacin 500mg', '30.00', '110'),
('62', 'Ciprofloxacin 500mg', '15.00', '350'),
('63', 'Amoxicillin/Clavulanic Acid 625mg', '35.00', '220'),
('64', 'Nystatin Oral Suspension', '120.00', '100'),
('65', 'Miconazole Cream', '28.00', '80'),
('66', 'Doxycycline 100mg', '8.50', '450'),
('67', 'Fluticasone Nasal Spray', '120.00', '60'),
('68', 'Escitalopram 10mg', '18.50', '200'),
('69', 'Risperidone 1mg', '12.00', '280'),
('7', 'Histac 150mg', '3.50', '600'),
('70', 'Spironolactone 25mg', '7.50', '370'),
('71', 'Pantoprazole 40mg', '14.00', '420'),
('72', 'Zolpidem 10mg', '22.00', '140'),
('73', 'Domperidone 10mg', '5.50', '400'),
('74', 'Carvedilol 12.5mg', '11.00', '300'),
('75', 'Enalapril 5mg', '6.00', '600'),
('76', 'Acetaminophen 500mg', '3.00', '800'),
('77', 'Vitamin D 1000 IU', '8.50', '1200'),
('78', 'Sodium Valproate 200mg', '10.00', '150'),
('79', 'Esomeprazole 40mg', '16.00', '230'),
('8', 'Maxpro 40mg', '15.00', '200'),
('80', 'Warfarin 5mg', '4.50', '700'),
('81', 'Simvastatin 20mg', '10.00', '250'),
('82', 'Hydroxyzine 25mg', '8.00', '500'),
('83', 'Quetiapine 25mg', '12.50', '160'),
('84', 'Captopril 25mg', '4.00', '600'),
('85', 'Lisinopril 20mg', '8.50', '270'),
('86', 'Ondansetron 8mg', '14.00', '130'),
('87', 'Mefenamic Acid 500mg', '6.50', '400'),
('88', 'Nitroglycerin 0.4mg', '20.00', '50'),
('89', 'Candesartan 8mg', '9.00', '310'),
('9', 'Amoxicillin 500mg', '7.00', '900'),
('90', 'Propranolol 40mg', '5.00', '350'),
('91', 'Allopurinol 300mg', '14.00', '120'),
('92', 'Methotrexate 2.5mg', '25.00', '100'),
('93', 'Azathioprine 50mg', '18.00', '80'),
('94', 'Meloxicam 15mg', '10.00', '250'),
('95', 'Tadalafil 5mg', '28.00', '60'),
('96', 'Diltiazem 30mg', '7.00', '340'),
('97', 'Verapamil 80mg', '8.00', '240'),
('98', 'Clopidogrel 75mg', '12.50', '150'),
('99', 'Duloxetine 30mg', '22.00', '180');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `customer_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `medicine_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `medicine_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `W` (`medicine_id`),
  KEY `K` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customer_id`, `medicine_id`, `medicine_name`, `date`, `quantity`) VALUES
('2', '10', 'Alatrol 10mg', '2024-09-23 11:27:19', '1'),
('2', '16', 'Ketorolac 10mg', '2024-09-23 11:27:19', '1'),
('2', '21', 'Neotack 20mg', '2024-09-23 11:27:19', '11'),
('2', '24', 'Atorvastatin 10mg', '2024-09-23 11:27:19', '5'),
('2', '27', 'Levocetirizine 5mg', '2024-09-23 11:27:19', '4'),
('2', '31', 'Salbutamol Inhaler', '2024-09-23 11:27:19', '7'),
('2', '32', 'Fluconazole 150mg', '2024-09-23 11:27:19', '6'),
('2', '41', 'Gluformin XR 500mg', '2024-09-23 11:27:19', '11');

-- --------------------------------------------------------

--
-- Table structure for table `updates_b`
--

DROP TABLE IF EXISTS `updates_b`;
CREATE TABLE IF NOT EXISTS `updates_b` (
  `admin_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `donor_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `R` (`admin_id`),
  KEY `V` (`donor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates_b`
--

INSERT INTO `updates_b` (`admin_id`, `donor_id`, `date`) VALUES
('01', '14', '2024-09-23 10:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `updates_h`
--

DROP TABLE IF EXISTS `updates_h`;
CREATE TABLE IF NOT EXISTS `updates_h` (
  `admin_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hospital_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `G` (`admin_id`),
  KEY `H` (`hospital_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates_h`
--

INSERT INTO `updates_h` (`admin_id`, `hospital_id`, `date`) VALUES
('01', '1', '2024-09-23 09:10:44'),
('01', '1', '2024-09-23 09:11:01'),
('01', '1', '2024-09-23 10:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `updates_m`
--

DROP TABLE IF EXISTS `updates_m`;
CREATE TABLE IF NOT EXISTS `updates_m` (
  `admin_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `medicine_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `medicine_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `D` (`medicine_id`),
  KEY `J` (`admin_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `customer_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hospital_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `A` (`customer_id`),
  KEY `B` (`hospital_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `J` FOREIGN KEY (`donor_id`) REFERENCES `blood_donor` (`donor_id`),
  ADD CONSTRAINT `Z` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `K` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `W` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`);

--
-- Constraints for table `updates_b`
--
ALTER TABLE `updates_b`
  ADD CONSTRAINT `R` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `V` FOREIGN KEY (`donor_id`) REFERENCES `blood_donor` (`donor_id`);

--
-- Constraints for table `updates_h`
--
ALTER TABLE `updates_h`
  ADD CONSTRAINT `G` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `H` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`);

--
-- Constraints for table `updates_m`
--
ALTER TABLE `updates_m`
  ADD CONSTRAINT `D` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`),
  ADD CONSTRAINT `E` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `A` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `B` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
