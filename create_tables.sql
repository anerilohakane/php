-- Create basic tables for Shivbandhan application

-- Customer table
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `caste` int(11) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `occupation_city` varchar(100) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `mangal` varchar(10) DEFAULT NULL,
  `customer_photo` varchar(255) DEFAULT NULL,
  `profile_code` varchar(20) DEFAULT NULL,
  `status` enum('verified','unverified') DEFAULT 'unverified',
  `user_status` enum('Active','Inactive') DEFAULT 'Active',
  `visibility` enum('Visible','Invisible') DEFAULT 'Visible',
  `display` enum('Y','N') DEFAULT 'Y',
  `membership_status` enum('Active','Inactive') DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `profile_code` (`profile_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Cast table
CREATE TABLE IF NOT EXISTS `tbl_cast` (
  `cast_id` int(11) NOT NULL AUTO_INCREMENT,
  `cast_name` varchar(100) DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`cast_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Request table
CREATE TABLE IF NOT EXISTS `tbl_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_by` int(11) DEFAULT NULL,
  `requested_to` int(11) DEFAULT NULL,
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending',
  `display` enum('Y','N') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Block request table
CREATE TABLE IF NOT EXISTS `tbl_block_request` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_user_id` int(11) DEFAULT NULL,
  `block_user_id` text DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert some sample data
INSERT INTO `tbl_cast` (`cast_name`, `display`) VALUES
('Brahmin', 'Y'),
('Kshatriya', 'Y'),
('Vaishya', 'Y'),
('Shudra', 'Y');

-- Insert a sample user
INSERT INTO `tbl_customer` (`f_name`, `l_name`, `mobile`, `email`, `password`, `gender`, `dob`, `age`, `caste`, `marital_status`, `education`, `occupation`, `occupation_city`, `height`, `mangal`, `profile_code`, `status`, `user_status`, `visibility`, `display`, `membership_status`) VALUES
('Admin', 'User', '1234567890', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '1990-01-01', 30, 1, 'Never Married', 'Graduate', 'Software Engineer', 'Mumbai', 175, 'No', 'SB001', 'verified', 'Active', 'Visible', 'Y', 'Active'); 