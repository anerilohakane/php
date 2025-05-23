-- Create success story table
CREATE TABLE IF NOT EXISTS `tbl_success_story` (
    `story_id` int(11) NOT NULL AUTO_INCREMENT,
    `groom_id` int(11) DEFAULT NULL,
    `bride_id` int(11) DEFAULT NULL,
    `title` varchar(255) DEFAULT NULL,
    `description` text DEFAULT NULL,
    `wedding_date` date DEFAULT NULL,
    `wedding_photo` varchar(255) DEFAULT NULL,
    `display` enum('Y','N') DEFAULT 'Y',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`story_id`),
    FOREIGN KEY (`groom_id`) REFERENCES `tbl_customer`(`customer_id`) ON DELETE SET NULL,
    FOREIGN KEY (`bride_id`) REFERENCES `tbl_customer`(`customer_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
