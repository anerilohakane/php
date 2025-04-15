-- Create slider table
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_title` varchar(255) DEFAULT NULL,
  `slider_description` text DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert sample slider data
INSERT INTO `tbl_slider` (`slider_title`, `slider_description`, `slider_image`, `display`) VALUES
('Welcome to Shivbandhan', 'Find your perfect life partner', 'slider1.jpg', 'Y'),
('Trusted Matrimony Service', 'Bringing hearts together', 'slider2.jpg', 'Y'),
('Start Your Journey', 'Begin your search for the perfect match', 'slider3.jpg', 'Y'); 