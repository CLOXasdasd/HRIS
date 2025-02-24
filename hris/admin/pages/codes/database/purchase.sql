-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: 
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `csv_db 7`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `csv_db 7` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `csv_db 7`;

--
-- Table structure for table `tbl_packaging`
--

DROP TABLE IF EXISTS `tbl_packaging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_packaging` (
  `COL 1` varchar(20) DEFAULT NULL,
  `COL 2` varchar(22) DEFAULT NULL,
  `COL 3` varchar(9) DEFAULT NULL,
  `COL 4` varchar(9) DEFAULT NULL,
  `COL 5` varchar(24) DEFAULT NULL,
  `COL 6` varchar(21) DEFAULT NULL,
  `COL 7` varchar(11) DEFAULT NULL,
  `COL 8` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_packaging`
--

LOCK TABLES `tbl_packaging` WRITE;
/*!40000 ALTER TABLE `tbl_packaging` DISABLE KEYS */;
INSERT INTO `tbl_packaging` VALUES ('Part Nos.','No. of Tips per Handle',' Crates  ',' Box ',' Crates (20 per Pallet) ',' Box (24 per Pallet) ',' per_crate ',' per_box '),('PHC2050W (IHP)','26',' 7,020 ',' 14,040 ',' 140,400 ',' 336,960 ',' 270 ',' 540 '),('PHC4050B (IHP)','64',' 36,480 ',' 61,440 ',' 729,600 ',' 1,474,560 ',' 570 ',' 960 '),('PHC41050G (IHP)','64',' 36,480 ',' 61,440 ',' 729,600 ',' 1,474,560 ',' 570 ',' 960 '),('PHC44070G (IHP)','68',' 35,360 ',' 68,000 ',' 707,200 ',' 1,632,000 ',' 520 ',' 1,000 '),('PHCF3050 (IHP)','46','',' 16,100 ',' -   ',' 386,400 ',' -   ',' 350 '),('PHCXM50B (IHP)','20',' 16,800 ',' 22,400 ',' 336,000 ',' 537,600 ',' 840 ',' 1,120 '),('PHTX706A (IHP)','30',' 10,500 ','',' 210,000 ',' -   ',' 350 ',' -   '),('PHTX707A (IHP)','22',' 5,940 ',' 11,880 ',' 118,800 ',' 285,120 ',' 270 ',' 540 '),('PHTX708A (IHP)','18',' 4,860 ',' 9,720 ',' 97,200 ',' 233,280 ',' 270 ',' 540 '),('PHTX709A (IHP)','20',' 16,800 ',' 22,400 ',' 336,000 ',' 537,600 ',' 840 ',' 1,120 '),('PHTX712A (IHP)','26',' 7,020 ',' 14,040 ',' 140,400 ',' 336,960 ',' 270 ',' 540 '),('PHTX714K (IHP)','26',' 7,020 ',' 14,040 ',' 140,400 ',' 336,960 ',' 270 ',' 540 '),('PHTX735 (IHP)','2',' 540 ','',' 10,800 ','',' 270 ',' -   '),('PHTX740B (IHP)','44',' 12,320 ',' 15,400 ',' 246,400 ',' 369,600 ',' 280 ',' 350 '),('PHTX740B-N (IHP)','44',' 12,320 ',' 15,400 ',' 246,400 ',' 369,600 ',' 280 ',' 350 '),('PHTX740B(W) (IHP)','44',' 12,320 ',' 15,400 ',' 246,400 ',' 369,600 ',' 280 ',' 350 '),('PHTX740CL (IHP)','44',' 12,320 ',' 15,400 ',' 246,400 ',' 369,600 ',' 280 ',' 350 '),('PHTX740E (IHP)','44',' 12,320 ',' 15,400 ',' 246,400 ',' 369,600 ',' 280 ',' 350 '),('PHTX741B (IHP)','64',' 37,120 ',' 64,000 ',' 742,400 ',' 1,536,000 ',' 580 ',' 1,000 '),('PHTX742GY (IHP)','64',' 36,480 ',' 61,440 ',' 729,600 ',' 1,474,560 ',' 570 ',' 960 '),('PHTX742B (IHP)','64',' 36,480 ',' 61,440 ',' 729,600 ',' 1,474,560 ',' 570 ',' 960 '),('PHTX746CL (IHP)','44','',' 26,400 ',' -   ',' 633,600 ',' -   ',' 600 '),('PHTX746S (IHP)','44','',' 26,400 ',' -   ',' 633,600 ',' -   ',' 600 '),('PHTX747H (IHP)','68',' 42,840 ',' 68,000 ',' 856,800 ',' 1,632,000 ',' 630 ',' 1,000 '),('PHTX750B (IHP)','68',' 35,360 ',' 68,000 ',' 707,200 ',' 1,632,000 ',' 520 ',' 1,000 '),('PHTX750D (IHP)','70',' 35,000 ',' 56,000 ',' 700,000 ',' 1,344,000 ',' 500 ',' 800 '),('PHTX750E (IHP)','60',' 23,040 ','',' 460,800 ',' -   ',' 384 ',' -   '),('PHTX751B (IHP)','64',' 40,320 ',' 64,000 ',' 806,400 ',' 1,536,000 ',' 630 ',' 1,000 '),('PHTX751E (IHP)','64',' 40,320 ',' 64,000 ',' 806,400 ',' 1,536,000 ',' 630 ',' 1,000 '),('PHTX751G (IHP)','64',' 40,320 ',' 64,000 ',' 806,400 ',' 1,536,000 ',' 630 ',' 1,000 '),('PHTX752B (IHP)','68',' 39,440 ',' 68,000 ',' 788,800 ',' 1,632,000 ',' 580 ',' 1,000 '),('PHTX752B (EPP) (IHP)','68',' 39,440 ',' 66,000 ',' 788,800 ',' 1,584,000 ',' 580 ',' 971 '),('PHTX753B (IHP)','66',' 38,280 ',' 66,000 ',' 765,600 ',' 1,584,000 ',' 580 ',' 1,000 '),('PHTX753E (IHP)','60',' 34,800 ',' 60,000 ',' 696,000 ',' 1,440,000 ',' 580 ',' 1,000 '),('PHTX755D (IHP)','64',' 37,120 ','',' 742,400 ',' -   ',' 580 ',' -   '),('PHTX757D/E (IHP)','60',' 23,040 ','',' 460,800 ',' -   ',' 384 ',' -   '),('PHTX759B (IHP)','68',' 45,696 ',' 68,000 ',' 913,920 ',' 1,632,000 ',' 672 ',' 1,000 '),('PHTX761K (IHP)','44',' 12,320 ',' 15,400 ',' 246,400 ',' 369,600 ',' 280 ',' 350 '),('PHTX790B (IHP)','14',' 2,100 ','',' 42,000 ',' -   ',' 150 ',' -   '),('PHTX7711 (IHP)','68',' 45,696 ',' 68,000 ',' 913,920 ',' 1,632,000 ',' 672 ',' 1,000 '),('PHTX7712 (IHP)','26',' 7,020 ',' 14,040 ',' 140,400 ',' 336,960 ',' 270 ',' 540 '),('PHTX7713 (IHP)','60','','',' -   ',' -   ',' -   ',' -   '),('PHTX7714 (IHP)','60','','',' -   ',' -   ',' -   ',' -   '),('PHTX7731 (IHP)','52','',' 18,200 ',' -   ',' 436,800 ',' -   ',' 350 '),('PHTX7771 (IHP)','20',' 16,800 ',' 22,400 ',' 336,000 ',' 537,600 ',' 840 ',' 1,120 '),('PHTX781-O (IHP)','68',' 45,696 ',' 68,000 ',' 913,920 ',' 1,632,000 ',' 672 ',' 1,000 '),('PHTX801 (IHP)','26',' 7,020 ',' 14,040 ',' 140,400 ',' 336,960 ',' 270 ',' 540 '),('PHTX802 (IHP)','66',' 38,280 ',' 66,000 ',' 765,600 ',' 1,584,000 ',' 580 ',' 1,000 '),('PHTX803 (IHP)','64',' 36,480 ',' 61,440 ',' 729,600 ',' 1,474,560 ',' 570 ',' 960 '),('PHTX804 (IHP)','64',' 40,320 ',' 64,000 ',' 806,400 ',' 1,536,000 ',' 630 ',' 1,000 '),('PHTX805 (IHP)','18',' 4,860 ',' 9,720 ',' 97,200 ',' 233,280 ',' 270 ',' 540 '),('IN-709 (IHP)','40',' 52,000 ',' 100,800 ',' 1,040,000 ',' 2,419,200 ',' 1,300 ',' 2,520 '),('IN-710 (IHP)','40',' 48,000 ',' 72,000 ',' 960,000 ',' 1,728,000 ',' 1,200 ',' 1,800 ');
/*!40000 ALTER TABLE `tbl_packaging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'csv_db 7'
--

--
-- Dumping routines for database 'csv_db 7'
--

--
-- Current Database: `hr_database`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `hr_database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `hr_database`;

--
-- Table structure for table `tb_ob_request`
--

DROP TABLE IF EXISTS `tb_ob_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ob_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `Destination` varchar(45) DEFAULT NULL,
  `Reason` varchar(100) DEFAULT NULL,
  `approver1` varchar(45) DEFAULT NULL,
  `approver2` varchar(45) DEFAULT NULL,
  `time_in` varchar(45) DEFAULT NULL,
  `time_out` varchar(45) DEFAULT NULL,
  `date_requested` varchar(45) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ob_request`
--

LOCK TABLES `tb_ob_request` WRITE;
/*!40000 ALTER TABLE `tb_ob_request` DISABLE KEYS */;
INSERT INTO `tb_ob_request` VALUES (1,'2023-02-21','calamba','test',NULL,NULL,'10:25','11:25','',669,'Cancel');
/*!40000 ALTER TABLE `tb_ob_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dept`
--

DROP TABLE IF EXISTS `tbl_dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_dept` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_description` varchar(45) DEFAULT NULL,
  UNIQUE KEY `dept_id_UNIQUE` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dept`
--

LOCK TABLES `tbl_dept` WRITE;
/*!40000 ALTER TABLE `tbl_dept` DISABLE KEYS */;
INSERT INTO `tbl_dept` VALUES (8,'IT Department'),(9,'Admin Deptartment'),(10,'Human Resource Department');
/*!40000 ALTER TABLE `tbl_dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_employees`
--

DROP TABLE IF EXISTS `tbl_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `employment_type` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cpnumber` varchar(45) DEFAULT NULL,
  `telnumber` varchar(45) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `sss_no` varchar(45) DEFAULT NULL,
  `pagibig_no` varchar(45) DEFAULT NULL,
  `philhealth_no` varchar(45) DEFAULT NULL,
  `tin_no` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employees`
--

LOCK TABLES `tbl_employees` WRITE;
/*!40000 ALTER TABLE `tbl_employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_leave`
--

DROP TABLE IF EXISTS `tbl_leave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_leave` (
  `leave_id` varchar(45) NOT NULL,
  `leave_description` varchar(45) DEFAULT NULL,
  `leave_count` float DEFAULT NULL,
  UNIQUE KEY `leave_id_UNIQUE` (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_leave`
--

LOCK TABLES `tbl_leave` WRITE;
/*!40000 ALTER TABLE `tbl_leave` DISABLE KEYS */;
INSERT INTO `tbl_leave` VALUES ('LV0','Unpaid Leave',0),('LV1','Vacation Leave',12),('LV2','Sick Leave',12),('LV3','Bereavement Leave ',3),('LV4','Maternity Leave ',105),('LV5','Paternity Leave ',7);
/*!40000 ALTER TABLE `tbl_leave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_leave_request`
--

DROP TABLE IF EXISTS `tbl_leave_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_leave_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `leave_id` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `aprrover1` varchar(45) DEFAULT NULL,
  `approver2` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `date_details` varchar(45) DEFAULT NULL,
  `total_number` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_leave_request`
--

LOCK TABLES `tbl_leave_request` WRITE;
/*!40000 ALTER TABLE `tbl_leave_request` DISABLE KEYS */;
INSERT INTO `tbl_leave_request` VALUES (18,700,'LV1','',NULL,NULL,'Open','2023-02-16','2023-02-22','WholeDay',7),(19,1102,'LV0','test','Chester Allan Custodio','Chester Allan Custodio','Approved','2023-02-14','2023-02-24','WholeDay',11),(20,669,'LV0','',NULL,NULL,'Cancel','2023-02-22','2023-03-02','WholeDay',9),(21,10301996,'LV4','need ng kasama mga gago kase ee',NULL,NULL,'Cancel','2023-02-21','2023-02-28','WholeDay',8);
/*!40000 ALTER TABLE `tbl_leave_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_loan`
--

DROP TABLE IF EXISTS `tbl_loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `loan_type` varchar(45) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `appoved_by` varchar(45) DEFAULT NULL,
  `filed` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_loan`
--

LOCK TABLES `tbl_loan` WRITE;
/*!40000 ALTER TABLE `tbl_loan` DISABLE KEYS */;
INSERT INTO `tbl_loan` VALUES (1,10301996,'Cancel','SSS - Salary Loan','test',NULL,'Yes');
/*!40000 ALTER TABLE `tbl_loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_overtime_work`
--

DROP TABLE IF EXISTS `tbl_overtime_work`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_overtime_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `rendered_hours` int(11) DEFAULT NULL,
  `ot_reason` varchar(100) DEFAULT NULL,
  `date_work` date DEFAULT NULL,
  `dep_approved` varchar(45) DEFAULT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_overtime_work`
--

LOCK TABLES `tbl_overtime_work` WRITE;
/*!40000 ALTER TABLE `tbl_overtime_work` DISABLE KEYS */;
INSERT INTO `tbl_overtime_work` VALUES (1,669,'2023-02-27',8,'need human','2023-02-21',NULL,NULL,'Open'),(2,10301996,'2023-02-27',10,'need tao wala na ee','2023-02-28',NULL,NULL,'Cancel');
/*!40000 ALTER TABLE `tbl_overtime_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_position`
--

DROP TABLE IF EXISTS `tbl_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_description` varchar(45) DEFAULT NULL,
  UNIQUE KEY `position_id_UNIQUE` (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_position`
--

LOCK TABLES `tbl_position` WRITE;
/*!40000 ALTER TABLE `tbl_position` DISABLE KEYS */;
INSERT INTO `tbl_position` VALUES (4,'Manager'),(5,'Staff');
/*!40000 ALTER TABLE `tbl_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_restday`
--

DROP TABLE IF EXISTS `tbl_restday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_restday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `date_file` date DEFAULT NULL,
  `original_date` date DEFAULT NULL,
  `requested_date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `department_approver` varchar(45) DEFAULT NULL,
  `director_approver` varchar(45) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_restday`
--

LOCK TABLES `tbl_restday` WRITE;
/*!40000 ALTER TABLE `tbl_restday` DISABLE KEYS */;
INSERT INTO `tbl_restday` VALUES (1,10301996,'2023-02-01','2023-02-16','2023-02-17','Cancel',NULL,NULL,'wala lang');
/*!40000 ALTER TABLE `tbl_restday` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_shift`
--

DROP TABLE IF EXISTS `tbl_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `shift_from` date DEFAULT NULL,
  `shift_to` date DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `person_shift_from` date DEFAULT NULL,
  `person_shift_to` date DEFAULT NULL,
  `person_approve_status` varchar(45) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `noted_by` varchar(45) DEFAULT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_shift`
--

LOCK TABLES `tbl_shift` WRITE;
/*!40000 ALTER TABLE `tbl_shift` DISABLE KEYS */;
INSERT INTO `tbl_shift` VALUES (1,531232,'2023-02-01','2023-02-02',10301996,'2023-02-02','2023-03-02','Approved','testing',NULL,NULL,'Pending'),(2,10301996,'2023-03-01','2023-03-04',531232,'2023-02-23','2023-02-25',NULL,'trip lang',NULL,NULL,'Pending');
/*!40000 ALTER TABLE `tbl_shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'669','Chester Allan Custodio','P@ssw0rd123','active'),(2,'661','Chester Allan Custodio','UEBzc3cwcmQxMjM=','active'),(3,'0','','UEBzc3cwcmQxMjM=','inactive'),(4,'123456','P@ssw0rd123','UEBzc3cwcmQxMjM=','inactive'),(5,'00669','chesterallancustdio','UEBzc3cwcmQxMjM=','inactive'),(6,'4848','allan','MTIzNDU2','active'),(7,'test','test','dGVzdA==','inactive'),(8,'112396','allan','UEBzc3cwcmQxMjM=','inactive');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hr_database'
--

--
-- Dumping routines for database 'hr_database'
--

--
-- Current Database: `injection`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `injection` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `injection`;

--
-- Table structure for table `tbl_boxcount`
--

DROP TABLE IF EXISTS `tbl_boxcount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_boxcount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(45) DEFAULT NULL,
  `work_order` varchar(45) DEFAULT NULL,
  `box_count` varchar(45) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_boxcount`
--

LOCK TABLES `tbl_boxcount` WRITE;
/*!40000 ALTER TABLE `tbl_boxcount` DISABLE KEYS */;
INSERT INTO `tbl_boxcount` VALUES (1,'testID123','122','10',100,'2023-05-05 15:11:14','4'),(2,'testID123','122','2023050511',233,'2023-05-05 15:50:35','4'),(3,'testID123','122','2023050511',200,'2023-05-05 15:51:19','4'),(4,'testID123','87878','2147483647',1474560,'2023-05-05 16:23:59','4'),(5,'5312','87878','202305061000531269',100,'2023-05-06 09:38:55','4');
/*!40000 ALTER TABLE `tbl_boxcount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_packaging`
--

DROP TABLE IF EXISTS `tbl_packaging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_packaging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HandleTree` varchar(17) DEFAULT NULL,
  `material_resin` varchar(18) DEFAULT NULL,
  `material_colorant` varchar(17) DEFAULT NULL,
  `weight_material` float DEFAULT NULL,
  `weight_colorant` float DEFAULT NULL,
  `total_weight_tip` float DEFAULT NULL,
  `weight_er_HT` float DEFAULT NULL,
  `tips` float DEFAULT NULL,
  `crates` float DEFAULT NULL,
  `boxes` float DEFAULT NULL,
  `crates_pallet` float DEFAULT NULL,
  `boxs_pallet` float DEFAULT NULL,
  `per_crates` float DEFAULT NULL,
  `per_box` float DEFAULT NULL,
  `compute` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_packaging`
--

LOCK TABLES `tbl_packaging` WRITE;
/*!40000 ALTER TABLE `tbl_packaging` DISABLE KEYS */;
INSERT INTO `tbl_packaging` VALUES (3,'IN-709 (IHP)','PA6 - NYLON RESIN','No Colorant',0.000224,0,0.000224,0.027,40,48000,72000,960000,1728000,1200,1800,0),(4,'IN-710 (IHP)','PA6 - NYLON RESIN','No Colorant',0.000298,0,0.000298,0.02365,40,52000,100800,1040000,2419200,1300,2520,0),(5,'PHC2050W (IHP)','PP RESIN - PHJ1202','PPR-W1C',0.001562,0.000032,0.001594,0.0209,26,7020,14040,140400,336960,270,540,0.02),(6,'PHC4050B (IHP)','PP RESIN - PHJ1202','PPR-BL1C',0.00046,0.000009,0.00047,0.0514,64,36480,61440,729600,1474560,570,960,0.02),(7,'PHC41050G (IHP)','PP RESIN - PHJ1202','PPR-GR1C',0.00046,0.000009,0.00047,0.0224,64,36480,61440,729600,1474560,570,960,0.02),(8,'PHC44070G (IHP)','PP RESIN - PHJ1202','PPR-GR1C',0.000379,0.000008,0.000387,0.04095,68,35360,68000,707200,1632000,520,1000,0.02),(9,'PHCF3050 (IHP)','PP RESIN - PHJ1202','PPR-W1C',0.001244,0.000025,0.001269,0.05709,46,0,16100,0,386400,0,350,0.02),(10,'PHCXM50B (IHP)','PP RESIN - PHJ1202','PPR-BL1C',0.001126,0.000047,0.001173,0.05137,20,16800,22400,336000,537600,840,1120,0.02),(11,'PHTX706A (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.001166,0.000049,0.001215,0.04205,30,10500,0,210000,0,350,0,0.04),(12,'PHTX707A (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.002175,0.000091,0.002265,0.0014,22,5940,11880,118800,285120,270,540,0.04),(13,'PHTX708A (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.002243,0.000093,0.002336,0.023295,18,4860,9720,97200,233280,270,540,0.04),(14,'PHTX709A (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.001106,0.000046,0.001153,0.05185,20,16800,22400,336000,537600,840,1120,0.04),(15,'PHTX712A (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.001497,0.000062,0.00156,0.02629,26,7020,14040,140400,336960,270,540,0.04),(16,'PHTX714K (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.001512,0.000063,0.001575,0.04984,26,7020,14040,140400,336960,270,540,0.04),(17,'PHTX735 (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.000672,0.000028,0.0007,0.02135,2,540,0,10800,0,270,0,0),(18,'PHTX740B (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.001131,0.000047,0.001178,0.00895,44,12320,15400,246400,369600,280,350,0.04),(19,'PHTX740B(W) (IHP)','PP RESIN - PHJ1202','PPR-W1C',0.001144,0.000023,0.001168,0.02155,0,0,0,0,0,0,0,0.02),(20,'PHTX740B-N (IHP)','PP RESIN - PHJ1202','PPR-G2C',0.001157,0.000024,0.001181,0.03005,44,12320,15400,246400,369600,280,350,0.02),(21,'PHTX740CL (IHP)','PP RESIN - PHJ1202','No Colorant',0.001168,0,0.001168,0.0119,44,12320,15400,246400,369600,280,350,0),(22,'PHTX741B (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.000316,0.000013,0.000329,0.04055,64,37120,64000,742400,1536000,580,1000,0.04),(23,'PHTX742B (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.000451,0.000019,0.00047,0.04205,64,36480,61440,729600,1474560,570,960,0.04),(24,'PHTX742GY (IHP)','PP RESIN - PHJ1202','PPR-GR1C',0.000457,0.000009,0.000466,0.02305,64,36480,61440,729600,1474560,570,960,0.02),(25,'PHTX746S (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.000589,0.000025,0.000614,0.0231,44,0,26400,0,633600,0,600,0.04),(26,'PHTX747H (IHP)','PP RESIN - PHJ1202','PPR-B3C',0.000334,0.000014,0.000348,0.02985,68,42840,68000,856800,1632000,630,1000,0.02),(27,'PHTX750B (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.000364,0.000015,0.000379,0.04145,68,35360,68000,707200,1632000,520,1000,0.04),(28,'PHTX750D (IHP)','STAT-RITE MS-2809','No Colorant',0.000532,0,0.000532,0.020155,70,35000,56000,700000,1344000,500,800,0),(29,'PHTX750E (IHP)','STAT-RITE MS-2809','No Colorant',0.000803,0,0.000803,0.06797,60,23040,0,460800,0,384,0,0),(30,'PHTX751B (IHP)','STAT-RITE MS-2809','PPR-G1C',0.000308,0.000013,0.00032,0.058375,64,40320,64000,806400,1536000,630,1000,0.04),(31,'PHTX751E (IHP)','STAT-RITE S-250','No Colorant',0.000357,0,0.000357,0.0205,64,40320,64000,806400,1536000,630,1000,0),(32,'PHTX751G (IHP)','STAT-RITE MS-2809','PPR-GR1C',0.000307,0.000013,0.00032,0.048185,64,40320,64000,806400,1536000,630,1000,0.02),(33,'PHTX752B (IHP)','STAT-RITE MS-2809','PPR-G1C',0.000326,0.000014,0.00034,0.02345,68,39440,68000,788800,1632000,580,1000,0.04),(34,'PHTX753B (IHP)','STAT-RITE MS-2809','PPR-G1C',0.000313,0.000013,0.000327,0.036445,66,38280,66000,765600,1584000,580,1000,0.04),(35,'PHTX753E (IHP)','STAT-RITE MS-2809','No Colorant',0.000818,0,0.000818,0.0205,60,34800,60000,696000,1440000,580,1000,0),(36,'PHTX755D (IHP)','STAT-RITE MS-2809','No Colorant',0.000566,0,0.000566,0.02286,64,37120,0,742400,0,580,0,0),(37,'PHTX757D/E (IHP)','STAT-RITE MS-2809','No Colorant',0.00081,0,0.00081,0.041145,60,23040,0,460800,0,384,0,0),(38,'PHTX759B (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.000293,0.000012,0.000305,0.03005,68,45696,68000,913920,1632000,672,1000,0.04),(39,'PHTX761K (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.001136,0.000047,0.001183,0.03005,44,12320,15400,246400,369600,280,350,0.04),(40,'PHTX765 (IHP)','PP RESIN - PHJ1202','PPR-G1C',0.001054,0.000044,0.001098,0.04905,0,0,0,0,0,0,0,0.04),(41,'PHTX7711 (IHP)','PP RESIN - PHJ1202','PPR-B2C',0.00029,0.000006,0.000296,0.045565,68,45696,68000,913920,1632000,672,1000,0.02),(42,'PHTX7712 (IHP)','PP RESIN - PHJ1202','PPR-B2C',0.001564,0.000032,0.001596,0.051945,26,7020,14040,140400,336960,270,540,0.02),(43,'PHTX7713 (IHP)','PP RESIN - PHJ1202','PPR-B2C',0.000738,0.000015,0.000753,0.03625,60,0,0,0,0,0,0,0.02),(44,'PHTX7714 (IHP)','PP RESIN - PHJ1202','PPR-B2C',0.000744,0.000015,0.000759,0.04857,60,0,0,0,0,0,0,0.02),(45,'PHTX7731 (IHP)','PP RESIN - PHJ1202','PPR-B2C',0.000595,0.000012,0.000607,0.02075,52,0,18200,0,436800,0,350,0.02),(46,'PHTX7771 (IHP)','PP RESIN - PHJ1202','PPR-B2C',0.001141,0.000023,0.001165,0.05205,20,16800,22400,336000,537600,840,1120,0.02),(47,'PHTX781-O (IHP)','PP RESIN - PHJ1202','PPR-BR1C',0.000295,0.000006,0.000301,0.03005,68,45696,68000,913920,1632000,672,1000,0.02),(48,'PHTX790B (IHP)','PP RESIN - PHJ1202','PPR-BR1C',0.004661,0.000194,0.004855,0,0,0,0,0,0,0,0,0),(49,'PHTX801 (IHP)','PP RESIN - PHJ1202','PPR-BR1C',0.001551,0.000032,0.001583,0.045165,26,7020,14040,140400,336960,270,540,0.02),(50,'PHTX802 (IHP)','PP RESIN - PHJ1202','PPR-BR1C',0.000317,0.000006,0.000323,0.0415,66,38280,66000,765600,1584000,580,1000,0.02),(51,'PHTX803 (IHP)','PP RESIN - PHJ1202','PPR-BR1C',0.00046,0.000009,0.00047,0.02575,64,36480,61440,729600,1474560,570,960,0.02),(52,'PHTX804 (IHP)','PP RESIN - PHJ1202','PPR-BR1C',0.00032,0.000007,0.000327,0.037265,64,40320,64000,806400,1536000,630,1000,0.02),(53,'PHTX805 (IHP)','PP RESIN - PHJ1202','PPR-BR1C',0.002289,0.000047,0.002336,0.03642,18,4860,9720,97200,233280,270,540,0.02);
/*!40000 ALTER TABLE `tbl_packaging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reports`
--

DROP TABLE IF EXISTS `tbl_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reports`
--

LOCK TABLES `tbl_reports` WRITE;
/*!40000 ALTER TABLE `tbl_reports` DISABLE KEYS */;
INSERT INTO `tbl_reports` VALUES (122,' user [chester] has logged in','2023-04-25 10:10:04'),(123,' user [testing] has logged in','2023-04-25 10:58:28'),(124,' user [testing] created account [test2] as [TeamLeader]','2023-04-25 11:06:34'),(125,' user [chester] has logged in','2023-04-25 11:48:29'),(126,' user [chester] created account [chester test] as [Employee]','2023-04-25 11:54:11'),(127,' user [testing] has logged in','2023-04-25 14:59:18'),(128,' user [testing] created account [undefined] as [undefined]','2023-04-25 16:27:48'),(129,' user [chester] created account [asdasd] as [Admin]','2023-04-25 18:28:09'),(130,' user [testing] has logged in','2023-04-26 07:58:20'),(131,' user [testing] created account [test] as [Employee]','2023-04-26 07:58:55'),(132,' user [testing] created work order [IHP-29] ','2023-04-26 08:18:00'),(133,' user [testing] created account [Testing] as [Employee]','2023-04-26 08:39:58'),(134,' user [testing] has logged in','2023-04-26 09:55:38'),(135,' user [testing] has logged in','2023-04-26 10:48:35'),(136,' user [testing] has logged in','2023-04-26 10:51:30'),(137,' user [Chester Allan Custodio] has logged in','2023-04-26 10:51:58'),(138,' user [Chester Allan Custodio] has logged in','2023-04-26 11:03:09'),(139,' user [Chester Allan Custodio] created account [Test User2] as [Employee]','2023-04-26 11:03:35'),(140,' user [testing] has logged in','2023-04-26 15:30:00'),(141,' user [testing] has logged in','2023-04-26 16:50:28'),(142,' user [testing] created work order [IHP-1] ','2023-04-26 17:53:36'),(143,' user [testing] created work order [IHP-2] ','2023-04-26 18:06:10'),(144,' user [testing] has logged in','2023-04-26 18:12:35'),(145,' user [testing] has logged in','2023-05-03 15:24:08'),(146,' user [testing] created work order [IHP-3] ','2023-05-03 15:28:25'),(147,' user [testing] created account [CHester Allan] as [Employee]','2023-05-03 15:33:11'),(148,' user [testing] has logged in','2023-05-03 16:23:06'),(149,' user [testing] has logged in','2023-05-03 18:58:27'),(150,' user [testing] created work order [IHP-4] ','2023-05-04 07:48:21'),(151,' user [testing] created work order [IHP-5] ','2023-05-04 08:14:51'),(152,' user [testing] created work order [IHP-6] ','2023-05-04 08:15:02'),(153,' user [testing] created work order [IHP-7] ','2023-05-04 08:15:58'),(154,' user [testing] created work order [IHP-8] ','2023-05-04 08:18:18'),(155,' user [testing] created work order [IHP-9] ','2023-05-04 08:18:40'),(156,' user [Chester Allan Custodio] has logged in','2023-05-04 08:55:00'),(157,' user [test2] has logged in','2023-05-04 13:33:49'),(158,' user [test2] created work order [IHP-10] ','2023-05-04 13:46:38'),(159,' user [test2] created work order [IHP-11] ','2023-05-04 13:47:00'),(160,' user [chester] has logged in','2023-05-04 14:44:50'),(161,' user [chester] has logged in','2023-05-04 14:45:34'),(162,' user [chester] created work order [IHP-10] ','2023-05-05 16:23:04'),(163,' user [Chester Allan Custodio] has logged in','2023-05-06 08:31:52'),(164,' user [Chester Allan Custodio] created work order [IHP-11] ','2023-05-06 10:57:06'),(165,' user [Chester Allan Custodio] created work order [IHP-12] ','2023-05-06 10:57:49'),(166,' user [Chester Allan Custodio] created work order [IHP-13] ','2023-05-06 11:32:00'),(167,' user [Chester Allan Custodio] has logged in','2023-05-08 14:01:18'),(168,' user [Chester Allan Custodio] created work order [IHP-14] ','2023-05-08 18:09:24');
/*!40000 ALTER TABLE `tbl_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_schedule`
--

DROP TABLE IF EXISTS `tbl_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ihp_no` varchar(45) DEFAULT NULL,
  `emp_id` varchar(45) DEFAULT NULL,
  `time_in` varchar(45) DEFAULT NULL,
  `time_out` varchar(45) DEFAULT NULL,
  `break_in` varchar(45) DEFAULT NULL,
  `break_out` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `schedule` varchar(45) DEFAULT NULL,
  `unique_id` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_schedule`
--

LOCK TABLES `tbl_schedule` WRITE;
/*!40000 ALTER TABLE `tbl_schedule` DISABLE KEYS */;
INSERT INTO `tbl_schedule` VALUES (31,'17554','5312',NULL,NULL,NULL,NULL,0,'2023-05-18','1683187073'),(32,'17554','testID123','2023-05-04 17:00:33','2023-05-04 17:00:33','2023-05-04 17:22:48','2023-05-04 17:22:54',2,'2023-05-04','1683187687'),(33,'17554','testemp',NULL,NULL,NULL,NULL,0,'2023-05-04','1683192552'),(34,'asdad','testID123','2023-05-04 17:31:41','2023-05-05 16:17:51','2023-05-05 12:01:20','2023-05-05 12:01:42',2,'2023-05-04','1683192571'),(35,'11','testID123','2023-05-04 17:31:41','2023-05-05 16:17:51','2023-05-05 12:01:20','2023-05-05 12:01:42',2,'2023-05-04','1683192606'),(36,'17554','5312',NULL,NULL,NULL,NULL,0,'2023-05-11','1683253821'),(37,'87878','testID123','2023-05-05 16:23:35','2023-05-05 16:26:10','2023-05-05 16:25:42','2023-05-05 16:25:47',2,'2023-05-05','1683274997'),(38,'87878','5312','2023-05-06 08:30:47',NULL,NULL,NULL,1,'2023-05-06','1683275946'),(39,'54554','5312',NULL,NULL,NULL,NULL,0,'2023-05-07','1683345652');
/*!40000 ALTER TABLE `tbl_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `approver` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (24,'00699','UEBzc3cwcmQxMjMh','Chester Allan Custodio','Admin','','Active',NULL,NULL,'ITSupport_Asia@texwipe.com',NULL),(30,'669','VGV4d2lwZTIwMjMh','chester','Admin','','Active',NULL,NULL,'chesterallancustodio@gmail.com',NULL),(31,'00669','VGV4d2lwZTIwMjMh','testing','TeamLeader','','Active',NULL,NULL,'undefined',NULL),(32,'test','VGV4d2lwZTIwMjMh','test','TeamLeader','','Active',NULL,NULL,'undefined',NULL),(33,'test2','VGV4d2lwZTIwMjMh','test2','TeamLeader','','Active',NULL,NULL,'undefined',NULL),(36,'asdsad','VGV4d2lwZTIwMjMh','asdasd','Admin','','Active',NULL,NULL,'undefined',NULL),(38,'testemp','VGV4d2lwZTIwMjMh','Testing','Employee','','Active',NULL,NULL,'undefined',NULL),(39,'testID123','VGV4d2lwZTIwMjMh','Test User2','Employee','','Active',NULL,NULL,'undefined',NULL),(40,'5312','VGV4d2lwZTIwMjMh','CHester Allan','Employee','','Active',NULL,NULL,'undefined',NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workorder`
--

DROP TABLE IF EXISTS `tbl_workorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ihp_no` varchar(45) DEFAULT NULL,
  `prod_desc` varchar(45) DEFAULT NULL,
  `package_type` varchar(45) DEFAULT NULL,
  `machine_no` int(11) DEFAULT NULL,
  `worder_status` varchar(45) DEFAULT NULL,
  `unique_id` int(11) DEFAULT NULL,
  `sap_wo_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workorder`
--

LOCK TABLES `tbl_workorder` WRITE;
/*!40000 ALTER TABLE `tbl_workorder` DISABLE KEYS */;
INSERT INTO `tbl_workorder` VALUES (34,'IHP-0',NULL,NULL,NULL,NULL,NULL,NULL),(46,'IHP-10','PHC41050G (IHP)','CC700I',1000,'active',1683274984,'87878'),(47,'IHP-11','PHC2050W (IHP)','Crates',12,'active',1683341826,'54554'),(48,'IHP-12','IN-710 (IHP)','Crates',2147483647,'active',1683341869,'122'),(49,'IHP-13','PHC4050B (IHP)','Crates',7,'active',1683343920,'11999'),(50,'IHP-14','PHC2050W (IHP)','Crates',1,'active',1683540564,'112');
/*!40000 ALTER TABLE `tbl_workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'injection'
--

--
-- Dumping routines for database 'injection'
--

--
-- Current Database: `mysql`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mysql` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `mysql`;

--
-- Table structure for table `general_log`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `general_log` (
  `event_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_host` mediumtext NOT NULL,
  `thread_id` bigint(21) unsigned NOT NULL,
  `server_id` int(10) unsigned NOT NULL,
  `command_type` varchar(64) NOT NULL,
  `argument` mediumtext NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='General log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `slow_log`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `slow_log` (
  `start_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_host` mediumtext NOT NULL,
  `query_time` time(6) NOT NULL,
  `lock_time` time(6) NOT NULL,
  `rows_sent` int(11) NOT NULL,
  `rows_examined` int(11) NOT NULL,
  `db` varchar(512) NOT NULL,
  `last_insert_id` int(11) NOT NULL,
  `insert_id` int(11) NOT NULL,
  `server_id` int(10) unsigned NOT NULL,
  `sql_text` mediumtext NOT NULL,
  `thread_id` bigint(21) unsigned NOT NULL,
  `rows_affected` int(11) NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Slow log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `column_stats`
--

DROP TABLE IF EXISTS `column_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `column_stats` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `column_name` varchar(64) NOT NULL,
  `min_value` varbinary(255) DEFAULT NULL,
  `max_value` varbinary(255) DEFAULT NULL,
  `nulls_ratio` decimal(12,4) DEFAULT NULL,
  `avg_length` decimal(12,4) DEFAULT NULL,
  `avg_frequency` decimal(12,4) DEFAULT NULL,
  `hist_size` tinyint(3) unsigned DEFAULT NULL,
  `hist_type` enum('SINGLE_PREC_HB','DOUBLE_PREC_HB') DEFAULT NULL,
  `histogram` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`,`column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='Statistics on Columns';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `column_stats`
--

LOCK TABLES `column_stats` WRITE;
/*!40000 ALTER TABLE `column_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `column_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `columns_priv`
--

DROP TABLE IF EXISTS `columns_priv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `columns_priv` (
  `Host` char(60) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Table_name` char(64) NOT NULL DEFAULT '',
  `Column_name` char(64) NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`,`Column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Column privileges';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `columns_priv`
--

LOCK TABLES `columns_priv` WRITE;
/*!40000 ALTER TABLE `columns_priv` DISABLE KEYS */;
/*!40000 ALTER TABLE `columns_priv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db`
--

DROP TABLE IF EXISTS `db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db` (
  `Host` char(60) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `User` char(80) NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Event_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `Delete_history_priv` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Host`,`Db`,`User`),
  KEY `User` (`User`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Database privileges';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db`
--

LOCK TABLES `db` WRITE;
/*!40000 ALTER TABLE `db` DISABLE KEYS */;
