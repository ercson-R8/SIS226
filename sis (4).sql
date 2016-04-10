-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2016 at 05:43 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_number` varchar(10) NOT NULL,
  `location` varchar(10) DEFAULT NULL,
  `unit` varchar(10) NOT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_number`, `location`, `unit`, `supplier`, `name`, `brand`, `description`) VALUES
('EL-CM-0000', 'AAA01', 'PCS', 'Supplier AAAAA', 'Male Plug 1111', 'Takashima', 'Male Plug'),
('EL-CM-0001', 'AAA01', 'PCS', 'Supplier B', 'Electronic Fan Capacitor', 'Makita', 'Electronic Fan Capacitor'),
('EL-CM-0003', 'AAA01', 'PCS', 'Supplier C', 'Overload Protector  (2 HP)', 'Bosch', 'Overload Protector  (2 HP)'),
('EL-CM-0004', 'AAA02', 'PCS', 'Supplier D', 'Overload Protector (1HP)', 'Yamaha', 'Overload Protector (1HP)'),
('EL-CM-0005', 'AAA02', 'PCS', 'Supplier E', 'Current Relay  (Black)', 'NEC', 'Current Relay  (Black)'),
('EL-CM-0006', 'AAA02', 'PCS', 'Supplier F', 'Current Relay  ( Gray)', 'Panasonic', 'Current Relay  ( Gray)'),
('EL-CM-0007', 'AAA03', 'PCS', 'Supplier G', 'Thermostat (Window AC)', 'Hyundai', 'Thermostat (Window AC)'),
('EL-CM-0008', 'BAB01', 'PCS', 'Supplier H', 'Circuit Breaker (60 A)', 'Takashima', 'Circuit Breaker (60 A)'),
('EL-CM-0009', 'AAA01', 'PCS', 'Supplier I', 'Bulb Pen Type (75W)', 'Makita', 'Bulb Pen Type  (75W)'),
('EL-CM-0012', 'AAA11', 'PCS11', 'Supplier J11', 'Bulb Pen Type (60W)', 'Bosch11', 'Bulb Pen Type (60W)'),
('EL-NC-0001', 'AAA01', 'PCS', 'Supplier A', 'Bulb Receptacle', 'Yamaha', 'Bulb Receptacle'),
('EL-NC-0002', 'AAA02', 'PCS', 'Supplier B', 'Selector Switch (3 Speed)', 'NEC', 'Selector Switch (3 Speed)'),
('EL-NC-0003', 'AAA02', 'PCS', 'Supplier C', 'Capacitor Sigma (45uF)', 'Panasonic', 'Capacitor Sigma (45uF)'),
('EL-NC-0004', 'AAA02', 'PCS', 'Supplier D', 'Starting Capacitor', 'Hyundai', 'Starting Capacitor'),
('EL-NC-0005', 'AAA03', 'PCS', 'Supplier E', 'Selector Switch, Rotary (Hawco)', 'Takashima', 'Selector Switch, Rotary (Hawco)'),
('EL-NC-0006', 'BAB02', 'PCS', 'Supplier F', 'Gang Single Pole Switch', 'Makita', '1 Gang Single Pole Switch'),
('EL-NC-0007', 'AAA01', 'PCS', 'Supplier G', 'Single Pole Switch with light Indicator', 'Bosch', 'Single Pole Switch with light Indicator'),
('EL-NC-0008', 'AAA01', 'PCS', 'Supplier H', 'Circuit Breaker (ETN)', 'Yamaha', 'Circuit Breaker (ETN)'),
('MC-CM-0001', 'AAA01', 'PCS', 'Supplier I', 'Defrost Timer', 'NEC', 'Defrost Timer'),
('MC-CM-0002', 'AAA02', 'PCS', 'Supplier J', 'Circuit Breaker (Hager)', 'Panasonic', 'Circuit Breaker (Hager)'),
('MC-CM-0003', 'AAA02', 'PCS', 'Supplier A', 'Magnetic Contactor', 'Hyundai', 'Magnetic Contactor'),
('MC-CM-0004', 'AAA02', 'PCS', 'Supplier B', 'Pipe Wrapping Tape (Black)', 'Takashima', 'Pipe Wrapping Tape (Black)'),
('MC-CM-0005', 'AAA03', 'PCS', 'Supplier C', 'Pipe Wrapping Tape (White)', 'Dowell', 'Pipe Wrapping Tape (White)'),
('MC-CM-0006', 'BAB03', 'PCS', 'Supplier D', 'Electrical Tape', 'Bosch', 'Electrical Tape'),
('MC-CM-0007', 'AAA04', 'PACK', 'Supplier E', 'Soldering Lead', 'Yamaha', 'Soldering Lead'),
('MC-CM-0008', 'BAB04', 'PCS', 'Supplier F', 'Terminal Clip (SV-5.5-8)', 'NEC', 'Terminal Clip (SV-5.5-8)'),
('MC-CM-0009', 'AAA05', 'PCS', 'Supplier G', 'Terminal Clip (RSV-5.5-8)', 'Dowell', 'Terminal Clip (RSV-5.5-8)'),
('MC-NC-0001', 'BAB05', 'PCS', 'Supplier H', 'Terminal Clip (FDD-5-250)', 'Bosch', 'Terminal Clip (FDD-5-250)'),
('MC-NC-0002', 'AAA06', 'PCS', 'Supplier I', 'Capacitor  2uF (Syscap)', 'Takashima', 'Capacitor  2uF (Syscap)'),
('MC-NC-0003', 'AAA02', 'PCS', 'Supplier J', 'Capacitor  5uF (Syscap White)', 'Makita', 'Capacitor  5uF (Syscap White)'),
('MC-NC-0004', 'AAA03', 'PCS', 'Supplier A', 'Capacitor  5uF (Syscap)', 'Bosch', 'Capacitor  5uF (Syscap)'),
('MC-NC-0005', 'AAA06', 'PCS', 'Supplier B', 'Capacitor  60uF (Syscap)', 'Yamaha', 'Capacitor  60uF (Syscap)'),
('MC-NC-0006', 'BAB06', 'PCS', 'Supplier C', 'Capacitor  55uF ', 'NEC', 'Capacitor  55uF '),
('MC-NC-0007', 'AAA06', 'PCS', 'Supplier D', 'Dual Capacitor 55uF/5uF', 'Panasonic', 'Dual Capacitor 55uF/5uF'),
('MC-NC-0008', 'AAA02', 'PCS', 'Supplier E', 'PVC Wire  1.5 mm (Black)', 'Hyundai', 'PVC Wire  1.5 mm (Black)'),
('MC-NC-0009', 'AAA03', 'PCS', 'Supplier F', 'PVC Wire  1.5 mm (Green)', 'Takashima', 'PVC Wire  1.5 mm (Green)'),
('MC-NC-0010', 'AAA07', 'PCS', 'Supplier G', 'PVC Wire  1.5 mm (Blue)', 'Makita', 'PVC Wire  1.5 mm (Blue)'),
('MC-NC-0011', 'BAB07', 'PCS', 'Supplier H', 'Thermostatic Expansion Valve ( R134a)', 'Bosch', 'Thermostatic Expansion Valve ( R134a)'),
('MC-NC-0012', 'AAA06', 'PCS', 'Supplier I', 'Universal AC Control (Sigma)', 'Yamaha', 'Universal AC Control (Sigma)'),
('MC-NC-0013', 'AAA02', 'PCS', 'Supplier J', 'Micro chipboard for AC', 'NEC', 'Micro chipboard for AC'),
('MC-NC-0014', 'AAA06', 'PCS', 'Supplier A', 'Copper TEE Joint (5/8)', 'Stanley', 'Copper TEE Joint (5/8)'),
('MC-NC-0015', 'BAB06', 'PCS', 'Supplier B', 'Copper TEE Joint (1/2)', 'Hyundai', 'Copper TEE Joint (1/2)'),
('MC-NC-0016', 'AAA06', 'PCS', 'Supplier C', 'Copper TEE Joint (3/8)', 'Takashima', 'Copper TEE Joint (3/8)'),
('MC-NC-0017', 'AAA02', 'PCS', 'Supplier D', 'Copper TEE Joint (1/4)', 'Makita', 'Copper TEE Joint (1/4)'),
('MC-NC-0018', 'AAA03', 'PCS', 'Supplier E', 'Copper Elbow     (5/8)', 'Bosch', 'Copper Elbow     (5/8)'),
('XX-CM-0001', '', 'Kilograms', '', 'Flare nut (4/9)', '', ''),
('XX-CM-0002', 'Somewherea', 'PC', 'Supplier A', 'Flare nut (4/11)', 'Hitachi', 'Flare nut, 4/11, black'),
('XX-CM-0004', 'Location--', 'PC', 'Flare nut (4/11)', 'Flare nut (4/11)', 'Flare nut (4/11)', 'Flare nut (4/11)'),
('XX-CM-0005', 'Flare nut ', 'PC', 'Flare nut (4/11)', 'Flare nut (4/9)', 'Flare nut (4/11)', 'Flare nut (4/11)'),
('XX-CM-0006', 'Flare nut ', 'PC', 'Flare nut (4/11)', 'Flare nut (4/11)', 'Flare nut (4/11)', 'Flare nut (4/11)'),
('ZZ-YY-0004', 'AA-BB-1004', 'Meter', 'Supplier X4', 'Test Item 4', 'Brand X4', 'Description X2 Description X2 Description X2 '),
('ZZ-YY-0005', 'AA-BB-1005', 'Meter', 'Supplier X4', 'Test Item 5', 'Brand X5', 'Description X2 Description X2 Description X2 '),
('ZZ-YY-0006', 'AA-BB-1006', 'Meter', 'Supplier X6', 'Test Item 6', 'Brand X6', 'Description X2 Description X2 Description X2 '),
('ZZ-YY-0007', 'AA-BB-1007', 'Meter', 'Supplier X7', 'Test Item 7', 'Brand X7', 'Description X2 Description X2 Description X2 '),
('ZZ-YY-0008', 'AA-BB-1008', 'Meter', 'Supplier X8', 'Test Item 8', 'Brand X8', 'Description X2 Description X2 Description X2 '),
('ZZ-YY-0009', 'AA-BB-1009', 'Meter', 'Supplier X9', 'Test Item 9', 'Brand X9', 'Description X2 Description X2 Description X2 '),
('ZZ-YY-0010', 'AA-BB-1010', 'Meter', 'Supplier X10', 'Test Item 10', 'Brand X10', 'Description X2 Description X2 Description X2 '),
('ZZ-YY-0011', 'AA-BB-1004', 'Meter', 'Supplier X6', 'Test Item 11', 'Brand X5', 'Description X2 Description X2 Description X2 ');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `trasaction` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `item_number` varchar(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  `quantity_received` int(11) NOT NULL,
  `quantity_release` int(11) NOT NULL,
  `balance_stock` int(11) NOT NULL,
  `balance_available` int(11) NOT NULL,
  `date_process` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table "stock" represent physical stock cards.';

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `transaction_id`, `item_number`, `user_id`, `quantity_received`, `quantity_release`, `balance_stock`, `balance_available`, `date_process`) VALUES
(3, 50, 'EL-CM-0000', 1, 0, 0, 0, 0, '2016-04-09 07:46:12'),
(4, 50, 'EL-CM-0000', 1, 0, 0, 0, 0, '2016-04-09 07:47:33'),
(5, 49, 'EL-CM-0000', 1, 0, 0, 0, 0, '2016-04-09 08:12:01'),
(6, 48, 'EL-CM-0000', 1, 0, 0, 0, 0, '2016-04-08 20:00:00'),
(7, 51, 'ZZ-YY-0010', 1, 0, 0, 0, 0, '2016-04-08 20:00:00'),
(8, 52, 'ZZ-YY-0011', 1, 0, 0, 0, 0, '2016-04-08 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_type` enum('add','sub') NOT NULL COMMENT 'On add, store manager will also be the authorizer',
  `authorizer` int(3) NOT NULL COMMENT 'User with level 3 rights, to be completed during authorization of request for item/s',
  `requester` int(3) NOT NULL,
  `date_requested` date DEFAULT NULL,
  `item_number` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('Approved','Denied','Pending','Issued') NOT NULL,
  `remarks_authorizer` varchar(100) DEFAULT NULL,
  `date_release` date DEFAULT NULL,
  `store_manager` int(3) NOT NULL COMMENT 'User with level 2 rights, to be completed during issuance of the item',
  `remarks_store_manager` varchar(100) NOT NULL,
  `date_authorized` date DEFAULT NULL,
  `date_add` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='this is the physical equivalent of a request form';

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_type`, `authorizer`, `requester`, `date_requested`, `item_number`, `quantity`, `status`, `remarks_authorizer`, `date_release`, `store_manager`, `remarks_store_manager`, `date_authorized`, `date_add`) VALUES
(29, 'add', 2, 2, NULL, 'ZZ-YY-0004', 0, 'Approved', 'by passed', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(30, 'add', 2, 2, NULL, 'ZZ-YY-0005', 0, 'Approved', 'by passed', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(31, 'add', 2, 2, NULL, 'ZZ-YY-0006', 0, 'Approved', 'by passed', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(32, 'add', 2, 2, NULL, 'ZZ-YY-0007', 0, 'Approved', 'by passed', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(44, 'add', 2, 2, NULL, 'ZZ-YY-0008', 0, 'Approved', 'by passed', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(45, 'add', 2, 2, NULL, 'ZZ-YY-0009', 0, 'Approved', 'by passed', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(47, 'add', 2, 1, NULL, 'ZZ-YY-0009', 0, 'Approved', 'n/a', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(48, 'add', 2, 1, NULL, 'ZZ-YY-0009', 0, 'Approved', 'n/a', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(49, 'add', 2, 1, NULL, 'ZZ-YY-0009', 0, 'Approved', 'n/a', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(50, 'add', 2, 1, NULL, 'ZZ-YY-0009', 0, 'Approved', 'n/a', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(51, 'add', 2, 2, NULL, 'ZZ-YY-0010', 0, 'Approved', 'n/a', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09'),
(52, 'add', 2, 2, NULL, 'ZZ-YY-0011', 0, 'Approved', 'n/a', NULL, 2, 'initial addition of an inventory item', '2016-04-09', '2016-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rights` enum('1','2','3','4') NOT NULL COMMENT '1-search items, view balance|2-all 1+issue items|3-all 1+authorize request|4-create users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `rights`) VALUES
(1, 'middlename', 'lastname', 'email', 'gaia', 'password', '4'),
(2, 'April', 'Nancy', 'nancy@abc-tech.com', 'jupiter', '1Abcde', '2'),
(3, 'May', 'Andrew', 'andrew@abc-tech.com', 'andrew@abc', '1Abcde', '2'),
(4, 'June', 'Thompson', 'jan@abc-tech.com', 'jan@abc-te', '1Abcde', '3'),
(5, 'Von', 'Dean', 'dean@abc-tech.com', 'dean@abc-t', '1Abcde', '4'),
(6, 'August', 'Steven', 'steven@abc-tech.com', 'steven@abc', '1Abcde', '1'),
(7, 'Kotas', 'Michael', 'michael@abc-tech.com', 'michael@ab', '1Abcde', '2'),
(8, 'June', 'Robert', 'robert@abc-tech.com', 'robert@abc', '1Abcde', '3'),
(9, 'Laura', 'Laura', 'laura@abc-tech.com', 'laura@abc-', '1Abcde', '3'),
(10010, 'Laura', 'Anne', 'anne@abc-tech.com', 'anne@abc-t', '1Abcde', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_number`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_number` (`item_number`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `request_id` (`transaction_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`authorizer`,`item_number`),
  ADD KEY `item_number` (`item_number`),
  ADD KEY `issuer` (`store_manager`),
  ADD KEY `authorizer` (`authorizer`),
  ADD KEY `requester` (`requester`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`item_number`) REFERENCES `item` (`item_number`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`authorizer`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`requester`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_5` FOREIGN KEY (`store_manager`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_6` FOREIGN KEY (`item_number`) REFERENCES `item` (`item_number`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
