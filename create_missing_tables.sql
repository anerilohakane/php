-- Create missing tables for Shivbandhan application

-- User info table
CREATE TABLE IF NOT EXISTS `tbl_userinfo` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Role table
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Menu table
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_icon` varchar(50) DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Submenu table
CREATE TABLE IF NOT EXISTS `tbl_submenu` (
  `submenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `submenu_name` varchar(100) DEFAULT NULL,
  `submenu_url` varchar(100) DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`submenu_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Privileges table
CREATE TABLE IF NOT EXISTS `tbl_priviledges` (
  `priviledge_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `submenu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`priviledge_id`),
  KEY `user_id` (`user_id`),
  KEY `submenu_id` (`submenu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Franchise request table
CREATE TABLE IF NOT EXISTS `tbl_request_franchise` (
  `franchise_req_id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_by` int(11) DEFAULT NULL,
  `requested_to` int(11) DEFAULT NULL,
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending',
  `display` enum('Y','N') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`franchise_req_id`),
  KEY `requested_by` (`requested_by`),
  KEY `requested_to` (`requested_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert default roles
INSERT INTO `tbl_role` (`role_name`, `display`) VALUES
('Admin', 'Y'),
('Sub Admin', 'Y'),
('User', 'Y');

-- Insert default menu items
INSERT INTO `tbl_menu` (`menu_name`, `menu_icon`, `display`) VALUES
('Dashboard', 'fa fa-dashboard', 'Y'),
('User Management', 'fa fa-users', 'Y'),
('Profile Management', 'fa fa-user', 'Y'),
('Settings', 'fa fa-cog', 'Y');

-- Insert default submenu items
INSERT INTO `tbl_submenu` (`menu_id`, `submenu_name`, `submenu_url`, `display`) VALUES
(1, 'Dashboard', 'dashboard', 'Y'),
(2, 'Users', 'users', 'Y'),
(2, 'Add User', 'add_user', 'Y'),
(3, 'Profiles', 'profiles', 'Y'),
(3, 'Add Profile', 'add_profile', 'Y'),
(4, 'General Settings', 'settings', 'Y');

-- Insert default admin user in userinfo
INSERT INTO `tbl_userinfo` (`username`, `password`, `role_id`, `display`, `created_by`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Y', 1); 