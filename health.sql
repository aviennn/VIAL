-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 11:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `salt` varchar(128) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `expiration_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `password`, `email_address`, `salt`, `account_type_id`, `status_id`, `date_created`, `date_updated`, `expiration_date`) VALUES
(1, 'admin', '2d0051e963c3eff354044f0dea033fd50d064b71', '', '1610877379', 1, 1, '2021-01-17 18:02:47', '2021-01-17 18:02:47', NULL),
(53, 'josec', 'd58641b2809ac64505c534a80552fd8904135688', '', '1659857942', 3, 1, '2022-08-07 07:39:02', '2022-08-07 07:39:02', '2022-11-07 07:39:02'),
(72, 'patient', 'ed9da1d891b641266bc49a0a75ae54f4feaf102a', NULL, '1610877379', 4, 1, '2023-09-29 23:29:31', '2023-09-29 23:29:31', NULL),
(73, 'Jamesanino', '22c9d32a95345c2c8ff8d42d7491c4525bd64468', 'james@gmail.com', '1699879139', 3, 1, '2023-11-13 13:38:59', '2023-11-13 13:38:59', '2024-02-13 13:38:59'),
(75, 'Avien', '0e731b56f26e1524de5ee0dccf9da3afc1a5ba20', '', '1700825209', 3, 1, '2023-11-24 12:26:49', '2023-12-16 16:33:53', '2024-02-24 12:26:49'),
(85, 'Rich1068', '2319ef330854054b492ce85c4e2f69c3dc2890bc', '', '1703091639', 4, 1, '2023-12-20 18:00:39', '2023-12-20 18:00:39', '2024-03-20 18:00:39'),
(88, 'lexenix', '3f894ef3b615441a796815aec3b1e867718eff37', '', '1703092013', 4, 1, '2023-12-20 18:06:53', '2024-01-05 07:58:02', '2024-03-20 18:06:53'),
(90, 'AWDawdawd', '71fbd3cf34bf24a8fce28639729bf9299f4c9c2c', 'example@gmail.com', '1703145025', 4, 2, '2023-12-21 08:50:25', '2024-01-02 10:35:50', '2024-03-21 08:50:25'),
(91, 'Vivienne', 'ef7203fa2f75948c6aa0d798cc46970004088b58', '', '1704119365', 5, 1, '2024-01-01 15:29:25', '2024-01-05 07:24:49', '2024-04-01 15:29:25'),
(93, 'Ashtoney', '44b52d4007e33767c971b586c9be2b1720be9696', '', '1704180465', 4, 1, '2024-01-02 08:27:45', '2024-01-02 10:26:11', '2024-04-02 08:27:45'),
(94, 'lean', '23e72736334fd710b73d4e9366e9057e00a1110d', '', '1704191344', 3, 1, '2024-01-02 11:29:04', '2024-01-02 11:29:04', '2024-04-02 11:29:04'),
(95, 'Ainsley', '826e571c4b22bfcd2ee18dbdd51ad2a2fc74b62a', '', '1704195091', 4, 2, '2024-01-02 12:31:31', '2024-01-02 12:31:36', '2024-04-02 12:31:31'),
(97, 'jane', '073e69b848a9ad8a377e7271956c0fe3ec2d60eb', '', '1704203001', 4, 1, '2024-01-02 14:43:21', '2024-01-02 14:43:21', '2024-04-02 14:43:21'),
(98, 'Test', 'dd57ca7fac67823462945d5cd30976e3efc60b27', '', '1704216473', 4, 2, '2024-01-02 18:27:53', '2024-01-03 16:13:45', '2024-04-02 18:27:53'),
(99, 'Jainos', '3e94e33fd6a56f90d56519c44bebf0173fd4160c', '', '1704297128', 4, 1, '2024-01-03 16:52:08', '2024-01-03 16:52:08', '2024-04-03 16:52:08'),
(100, 'Loren', '2f7ee4f911e3b4b1dac26c79fe4fe7ec5bcfea43', '', '1704297481', 4, 1, '2024-01-03 16:58:01', '2024-01-03 16:58:01', '2024-04-03 16:58:01'),
(102, 'JaiJai', 'f81ad1545d735cd33630ac4f037c05aaa248ed83', 'jainos@gmail.com', '1704436043', 5, 1, '2024-01-05 07:27:23', '2024-01-05 07:27:23', '2024-04-05 07:27:23'),
(103, 'tine', 'af40f433d2d163895eec46350854b2f0898c140d', 'kristineangeli@gmail.com', '1704436486', 3, 1, '2024-01-05 07:34:46', '2024-01-05 07:34:46', '2024-04-05 07:34:46'),
(104, 'paulo', '84ff58d7e8c6453de30bb7ad3c617a49be2f6060', 'paulo@gmail.com', '1704436788', 5, 1, '2024-01-05 07:39:48', '2024-01-05 07:39:48', '2024-04-05 07:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_type`
--

CREATE TABLE `tbl_account_type` (
  `id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_account_type`
--

INSERT INTO `tbl_account_type` (`id`, `type`) VALUES
(1, 'super admin'),
(2, 'admin'),
(3, 'doctor'),
(4, 'patient'),
(5, 'secretary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `doctor_account_id` int(11) NOT NULL,
  `patient_account_id` int(11) NOT NULL,
  `appointment_date_time` datetime NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(11) NOT NULL DEFAULT 3,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `doctor_account_id`, `patient_account_id`, `appointment_date_time`, `clinic_id`, `notes`, `created_at`, `updated_at`, `status_id`, `appointment_date`, `appointment_time`) VALUES
(5, 75, 72, '2023-12-31 14:00:00', 3, 'hehe', '2023-12-30 16:24:58', '2023-12-30 16:24:58', 1, '2023-12-31', '14:00:00'),
(7, 53, 72, '2023-12-31 10:00:00', 3, 'I have a headache.', '2023-12-30 16:36:00', '2023-12-30 16:36:00', 1, '2023-12-31', '10:00:00'),
(8, 75, 72, '2023-12-31 09:00:00', 2, 'I have Pain.', '2023-12-31 09:49:02', '2023-12-31 09:49:02', 1, '2023-12-31', '09:00:00'),
(14, 75, 72, '2024-01-20 09:00:00', 2, 'I have a stomach ache', '2024-01-02 08:59:41', '2024-01-02 08:59:41', 2, '2024-01-20', '09:00:00'),
(15, 75, 72, '2024-01-27 15:00:00', 3, 'I have a tooth ache', '2024-01-02 09:03:46', '2024-01-02 09:03:46', 1, '2024-01-27', '15:00:00'),
(16, 75, 72, '2024-01-20 10:00:00', 5, 'I have a arm ache', '2024-01-02 09:05:38', '2024-01-02 09:05:38', 2, '2024-01-20', '10:00:00'),
(21, 103, 72, '2024-01-09 09:00:00', 9, 'I have a pain in my legs', '2024-01-05 07:14:24', '2024-01-05 07:14:24', 1, '2024-01-09', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_birth_history`
--

CREATE TABLE `tbl_birth_history` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `blood_type` int(2) DEFAULT NULL,
  `term` int(1) DEFAULT NULL,
  `type_of_delivery` int(1) DEFAULT NULL,
  `birth_weight` float DEFAULT NULL,
  `birth_length` float DEFAULT NULL,
  `birth_head_circumference` float DEFAULT NULL,
  `birth_chest_circumference` float DEFAULT NULL,
  `birth_abdominal_circumference` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_birth_history`
--

INSERT INTO `tbl_birth_history` (`id`, `account_id`, `blood_type`, `term`, `type_of_delivery`, `birth_weight`, `birth_length`, `birth_head_circumference`, `birth_chest_circumference`, `birth_abdominal_circumference`) VALUES
(3, 93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 98, 3, 37, 2, 443, 20, 34, 25, 78),
(6, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic`
--

CREATE TABLE `tbl_clinic` (
  `id` int(11) NOT NULL,
  `clinic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_clinic`
--

INSERT INTO `tbl_clinic` (`id`, `clinic`, `address`, `contact_number`, `status_id`) VALUES
(1, 'Angeles University Foundation Medical Center', 'Angeles City', '09171234567', 1),
(2, 'Green City Medical Center', 'City of San Fernando, Pampanga', '09088765432', 1),
(3, 'St raphael', '6H8H+Q7F, Chico St, Mabalacat, Pampanga', '045 892 2688', 1),
(5, 'Vial', 'Angeles City', '09778930021', 1),
(8, 'Jose B. Lingad Memorial General Hospital', '2000 MacArthur Hwy, San Fernando, 2000 Pampanga', '045 961 2444', 1),
(9, 'Clark Medical City', 'Clark', '09359076546', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic_assignment`
--

CREATE TABLE `tbl_clinic_assignment` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_clinic_assignment`
--

INSERT INTO `tbl_clinic_assignment` (`id`, `account_id`, `clinic_id`, `status_id`) VALUES
(1, 53, 1, 1),
(2, 53, 2, 1),
(23, 73, 3, 1),
(24, 75, 1, 1),
(25, 94, 8, 1),
(26, 103, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultation_record`
--

CREATE TABLE `tbl_consultation_record` (
  `id` int(11) NOT NULL,
  `patient_account_id` int(11) NOT NULL,
  `doctor_account_id` int(11) NOT NULL,
  `subjective` text DEFAULT NULL,
  `objective` text DEFAULT NULL,
  `assessment` text DEFAULT NULL,
  `plan` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `date_of_consultation` date NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_consultation_record`
--

INSERT INTO `tbl_consultation_record` (`id`, `patient_account_id`, `doctor_account_id`, `subjective`, `objective`, `assessment`, `plan`, `notes`, `date_of_consultation`, `status_id`) VALUES
(1, 72, 53, 'Patient reports that she is feeling \'tired\' and that she \'can\'t seem to get out of bed in the morning.\' Patient is \'struggling to get to work\' and says that she \'constantly finds her mind wandering to negative thoughts.\' Patient stated that her sleep had been broken and she does not wake feeling rested. Patient reports that she does not feel as though the medication is making any difference and thinks she is getting worse.', 'Patient was unable to come into the practice and so has been seen at home. Patient\'s personal hygiene does not appear to be intact; she was unshaven and dressed in track pants and a hooded jumper which is unusual as she typically takes excellent care of her appearance. Patient appears to be tired; she is pale in complexion and has large circles under her eyes.\r\nPatient\'s compliance with her new medication is good, and she appears to have retained her food intake. Weight is stable and unchanged.', 'Patient presented this morning with low mood and affect. Patient exhibited speech that was slowed in rate, reduced in volume. Her articulation was coherent, and her language skills were intact. Her body posture and effect conveyed a depressed mood. Patient\'s facial expression and demeanor were of someone who is experiencing major depression. Affect is appropriate and congruent with mood. There are no visible signs of delusions, bizarre behaviors, hallucinations, or any other symptoms of psychotic process. Associations are intact, thinking is logical, and thought content appears to be congruent. Suicidal ideation is denied. Short and long-term memory is intact, as is the ability to abstract and do arithmetic calculations. Insight and judgment are good. No sign of substance use was present.', 'Diagnoses: The diagnoses are based on available information and may change as additional information becomes available.\r\nMajor depressive disorder, recurrent, severe F33.1 (ICD-10) Active\r\nLink to treatment Plan Problem: Depressed Mood\r\nProblem: Depressed Mood\r\nPatient\'s depressed mood has been identified as an active problem requiring ongoing treatment. It is primarily evident through a diagnosis of Major Depressive Disorder.\r\nLong-term goal:\r\nPatient will develop the ability to recognize and manage his depression.\r\nShort-term goals and interventions:\r\n-   Continue to attend weekly sessions with myself\r\n-   Continue to titrate up SSRI, fluoxetine\r\n-   To walk once a day\r\n-   To use a safety plan if required', NULL, '2023-09-28', 1),
(2, 88, 75, 'Testing', 'Test', 'Test', 'Test', 'Test', '2024-01-01', 1),
(3, 88, 75, 'Okay', 'Okay', 'Okay', 'Okay', 'Okay', '2024-01-02', 2),
(4, 97, 75, 'Hello', 'Hello', 'Hello', 'Hello', 'Hello', '2024-01-02', 1),
(5, 97, 94, 'Test', 'Test', 'Test', 'Test', 'Test', '2024-01-02', 1),
(19, 93, 75, 'Good', 'Good', 'Good', 'Good', 'Good', '2024-01-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_immunization`
--

CREATE TABLE `tbl_immunization` (
  `id` int(11) NOT NULL,
  `immunization` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_immunization`
--

INSERT INTO `tbl_immunization` (`id`, `immunization`, `description`, `status_id`) VALUES
(1, 'Bacille Calmette-Guérin (BCG)', 'Vaccine for Tuberculosis (given at birth)', 1),
(2, 'HEPATITIS B', 'Vaccine for Hepatitis B (given at birth)', 1),
(3, 'Pentavalent Vaccine (DPT-HepB-HiB)', 'Vaccine for five potential killers – Diptheria, Tetanus, Pertusis, Hib, and Hepatitis B', 1),
(4, 'Oral Polio Vaccine (OPV)', 'Vaccine for Polio', 1),
(5, 'Inactivated Polio Vaccine (IPV)', 'Vaccine for Polio', 1),
(6, 'Pneumococcal Conjugate Vaccine (PCV)', 'Vaccine for Pneumonia and Meningitis', 1),
(7, 'Measles Mumps Rubella (MMR)', 'Vaccine for four diseases: measles, mumps, rubella, and varicella (chickenpox)', 1),
(8, 'Flu Vaccine', 'Vaccine for Flu', 1),
(9, 'Covid-19 Vaccine', 'Vaccine for Covid-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_immunization_record`
--

CREATE TABLE `tbl_immunization_record` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `immunization_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_immunization_record`
--

INSERT INTO `tbl_immunization_record` (`id`, `account_id`, `immunization_id`, `date`, `remarks`, `status_id`) VALUES
(1, 72, 9, '2021-06-06', '1st Dose of Covid-19 Vaccine (Pfizer)', 2),
(2, 72, 9, '2021-12-06', '2nd Dose of Covid-19 Vaccine (AstraZeneca)', 1),
(5, 85, 8, '0000-00-00', '1st shot of Flu Vaccine', 2),
(6, 88, 8, '2023-12-20', '1st shot of Flu Vaccine', 1),
(8, 93, 8, '2024-01-02', 'Second shot', 2),
(9, 85, 4, '2024-01-02', 'fsaasf', 2),
(13, 85, 5, '2024-01-02', 'asdasdsad', 2),
(14, 85, 8, '2024-01-02', 'try', 2),
(15, 95, 3, '2024-01-02', 'First shot', 2),
(16, 98, 9, '2024-01-02', '', 2),
(17, 98, 4, '2024-01-02', 'Test', 2),
(18, 98, 2, '0000-00-00', 'First shot taken last December 28, 2023', 1),
(19, 88, 3, '2024-01-03', 'fsafasf', 2),
(20, 99, 3, '2024-01-03', 'Second shot', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `id` int(11) NOT NULL,
  `patient_account_id` int(11) NOT NULL,
  `doctor_account_id` int(11) NOT NULL,
  `consultation_id` int(11) NOT NULL,
  `prescription` text NOT NULL,
  `date_of_prescription` date NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`id`, `patient_account_id`, `doctor_account_id`, `consultation_id`, `prescription`, `date_of_prescription`, `status_id`) VALUES
(1, 72, 53, 1, 'Paracetamol (Biogesic) 500mg as needed\r\nSig: 3x a day every 4 hours.', '2023-09-28', 1),
(2, 88, 75, 1, 'Biogesic 3x a day every 4hrs', '2024-01-02', 2),
(3, 88, 75, 1, 'Neozep 3x a day ', '2024-01-02', 2),
(6, 93, 75, 19, 'Paracetamol 3x a day', '2024-01-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_secretary`
--

CREATE TABLE `tbl_secretary` (
  `id` int(11) NOT NULL,
  `secretary_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_secretary`
--

INSERT INTO `tbl_secretary` (`id`, `secretary_id`, `doctor_id`, `status_id`) VALUES
(1, 91, 75, 1),
(2, 91, 94, 2),
(8, 91, 73, 2),
(9, 91, 53, 2),
(13, 102, 94, 1),
(14, 104, 103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `middlename` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) NOT NULL,
  `qualifier` varchar(128) DEFAULT NULL,
  `dob` date NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `ptr_number` varchar(128) DEFAULT NULL,
  `license_number` varchar(128) DEFAULT NULL,
  `license_expiration` date DEFAULT NULL,
  `s2_number` varchar(128) DEFAULT NULL,
  `s2_expiration` date DEFAULT NULL,
  `maxicare_number` varchar(128) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `name_of_father` varchar(128) DEFAULT NULL,
  `father_dob` date DEFAULT NULL,
  `name_of_mother` varchar(128) DEFAULT NULL,
  `mother_dob` date DEFAULT NULL,
  `school` varchar(128) DEFAULT NULL,
  `gender` int(1) NOT NULL,
  `mother_contact_number` varchar(11) DEFAULT NULL,
  `father_contact_number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `account_id`, `firstname`, `middlename`, `lastname`, `qualifier`, `dob`, `specialization`, `ptr_number`, `license_number`, `license_expiration`, `s2_number`, `s2_expiration`, `maxicare_number`, `address`, `name_of_father`, `father_dob`, `name_of_mother`, `mother_dob`, `school`, `gender`, `mother_contact_number`, `father_contact_number`) VALUES
(1, 1, 'Adriane Brent', 'Sicat', 'Castro', NULL, '1990-07-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(22, 53, 'Jose Nathaniel', 'Cuyugan', 'Castro', '', '1960-10-22', 'Family Medicine / General Medicine', '15734181', '0062407', '2022-12-31', '', NULL, '', 'Rodriguez, Rizal City, Philippines', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(36, 72, 'Belinda', 'Mercado', 'Cabrera', NULL, '1968-09-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'City of San Fernando, Pampanga', 'Gabriel P. Mercado II', '1943-06-12', 'Omeng Mercado', '1944-12-12', 'University of Santo Tomas', 2, NULL, NULL),
(37, 73, 'James', 'Ewan', 'Anino', '', '2000-11-07', 'Pediatrics', '62463457', '969096006', '2023-11-23', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(39, 75, 'Avien Flaire', '', 'Batul', '', '2023-11-08', 'Dermatology', '5235235', '14214214', '2023-11-30', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(49, 85, 'Paulo', 'sasa', 'Nuguid', '', '2004-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'dad', '2004-12-11', '', '2004-12-11', 'AUF', 1, '', ''),
(52, 88, 'Paul Trustan', 'Sabado', 'Yumang', '', '2004-12-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '432456', 'dad', '2004-12-16', '', '2004-12-16', 'AUF2', 1, '', ''),
(53, 90, 'Paulod', 'Sabadod', 'Yumangd', '', '2003-12-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BLK 16A, Lot 9-10, Phase 3, Dizon Estate', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(54, 91, 'Vivienne Anne', '', 'Perez', '', '1987-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '1958-03-19', '', '1997-09-23', '', 2, '', ''),
(56, 93, 'Ashton Fiorenz', '', 'Batul', '', '2024-01-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2097 Maria Soledad', '', '2024-01-15', '', '2024-01-15', '', 1, '', ''),
(57, 94, 'Leandro', '', 'Sanggalang', '', '2024-01-15', 'Multiple Specialization', '36346346346', '6346346', '2024-01-24', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(58, 95, 'Ainsley Fiorelle', '', 'Batul', '', '2024-01-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', 1, '', ''),
(60, 97, 'Alma Jane', '', 'Perez', '', '2024-01-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', 2, '', ''),
(61, 98, 'Try', '', 'Test', '', '2024-01-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', 1, '', ''),
(62, 99, 'Jainos', '', 'Tolentino', '', '1957-01-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', 1, '', ''),
(63, 100, 'Lorenzo', '', 'Sanggalang', '', '2024-01-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', 1, '', ''),
(65, 102, 'Jainos', 'Balagot', 'Tolentino', '', '2000-10-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Magalang ', '', '2000-10-10', '', '2000-10-10', 'Angeles University Foundation', 1, '', ''),
(66, 103, 'Kristine', 'Basilio', 'Basilio', '', '2001-11-28', 'Psychiatry', '09234', '236799', '2024-05-16', '', NULL, '034 5489 3264', 'Telebastagan', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(67, 104, 'Paulo', 'Cortez', 'Bondoc', '', '2003-01-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cutcut', '', '2003-01-26', '', '2003-01-26', '', 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_type_to_account_account_type_id_idx` (`account_type_id`),
  ADD KEY `FK_status_to_account_status_id_idx` (`status_id`);

--
-- Indexes for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `doctor_account_id` (`doctor_account_id`),
  ADD KEY `patient_account_id` (`patient_account_id`),
  ADD KEY `fk_status_id` (`status_id`);

--
-- Indexes for table `tbl_birth_history`
--
ALTER TABLE `tbl_birth_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_to_birth_history_account_id_idx` (`account_id`);

--
-- Indexes for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_status_to_clinic_status_id_idx` (`status_id`);

--
-- Indexes for table `tbl_clinic_assignment`
--
ALTER TABLE `tbl_clinic_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_to_clinic_assignment_account_id_idx` (`account_id`),
  ADD KEY `FK_clinic_to_clinic_assignment_clinic_id_idx` (`clinic_id`),
  ADD KEY `FK_status_to_clinic_assignment_status_id_idx` (`status_id`);

--
-- Indexes for table `tbl_consultation_record`
--
ALTER TABLE `tbl_consultation_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_to_consultation_record_patient_id_idx` (`patient_account_id`),
  ADD KEY `FK_account_to_consultation_record_doctor_account_id_idx` (`doctor_account_id`),
  ADD KEY `FK_status_to_consultation_record_status_id_idx` (`status_id`);

--
-- Indexes for table `tbl_immunization`
--
ALTER TABLE `tbl_immunization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_status_to_immunization_status_id_idx` (`status_id`);

--
-- Indexes for table `tbl_immunization_record`
--
ALTER TABLE `tbl_immunization_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_to_immunization_record_account_id_idx` (`account_id`),
  ADD KEY `FK_immunization_to_immunization_record_immunization_id_idx` (`immunization_id`),
  ADD KEY `FK_status_to_immunization_record_status_id_idx` (`status_id`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_to_prescription_patient_id_idx` (`patient_account_id`),
  ADD KEY `FK_account_to_prescription_doctor_account_id_idx` (`doctor_account_id`),
  ADD KEY `FK_status_to_prescription_status_id_idx` (`status_id`),
  ADD KEY `FK_consultation_to_prescription_consultation_id_idx` (`consultation_id`);

--
-- Indexes for table `tbl_secretary`
--
ALTER TABLE `tbl_secretary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secretary_id` (`secretary_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_to_user_account_id_idx` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_birth_history`
--
ALTER TABLE `tbl_birth_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_clinic_assignment`
--
ALTER TABLE `tbl_clinic_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_consultation_record`
--
ALTER TABLE `tbl_consultation_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_immunization`
--
ALTER TABLE `tbl_immunization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_immunization_record`
--
ALTER TABLE `tbl_immunization_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_secretary`
--
ALTER TABLE `tbl_secretary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD CONSTRAINT `FK_account_type_to_account_account_type_id` FOREIGN KEY (`account_type_id`) REFERENCES `tbl_account_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_status_to_account_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`),
  ADD CONSTRAINT `tbl_appointment_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `tbl_clinic` (`id`),
  ADD CONSTRAINT `tbl_appointment_ibfk_2` FOREIGN KEY (`doctor_account_id`) REFERENCES `tbl_account` (`id`),
  ADD CONSTRAINT `tbl_appointment_ibfk_3` FOREIGN KEY (`patient_account_id`) REFERENCES `tbl_account` (`id`);

--
-- Constraints for table `tbl_birth_history`
--
ALTER TABLE `tbl_birth_history`
  ADD CONSTRAINT `FK_account_to_birth_history_account_id` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  ADD CONSTRAINT `FK_status_to_clinic_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_clinic_assignment`
--
ALTER TABLE `tbl_clinic_assignment`
  ADD CONSTRAINT `FK_account_to_clinic_assignment_account_id` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_clinic_to_clinic_assignment_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `tbl_clinic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_status_to_clinic_assignment_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_consultation_record`
--
ALTER TABLE `tbl_consultation_record`
  ADD CONSTRAINT `FK_account_to_consultation_record_doctor_account_id` FOREIGN KEY (`doctor_account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_account_to_consultation_record_patient_account_id` FOREIGN KEY (`patient_account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_status_to_consultation_record_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_immunization`
--
ALTER TABLE `tbl_immunization`
  ADD CONSTRAINT `FK_status_to_immunization_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_immunization_record`
--
ALTER TABLE `tbl_immunization_record`
  ADD CONSTRAINT `FK_account_to_immunization_record_account_id` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_immunization_to_immunization_record_immunization_id` FOREIGN KEY (`immunization_id`) REFERENCES `tbl_immunization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_status_to_immunization_record_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD CONSTRAINT `FK_account_to_prescription_doctor_account_id` FOREIGN KEY (`doctor_account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_account_to_prescription_patient_account_id` FOREIGN KEY (`patient_account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_consultation_to_prescription_consultation_id` FOREIGN KEY (`consultation_id`) REFERENCES `tbl_consultation_record` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_status_to_prescription_status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_secretary`
--
ALTER TABLE `tbl_secretary`
  ADD CONSTRAINT `tbl_secretary_ibfk_1` FOREIGN KEY (`secretary_id`) REFERENCES `tbl_account` (`id`),
  ADD CONSTRAINT `tbl_secretary_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `tbl_account` (`id`),
  ADD CONSTRAINT `tbl_secretary_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_account_to_user_account_id` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
