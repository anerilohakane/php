-- Create inspiral table for storing inspirational couple stories
CREATE TABLE IF NOT EXISTS `tbl_inspiral` (
  `inspiral_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  `created_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inspiral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 