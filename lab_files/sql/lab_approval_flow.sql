CREATE TABLE IF NOT EXISTS `lab_signature` (
  `id`          INT AUTO_INCREMENT PRIMARY KEY,
  `uname`       VARCHAR(100) NOT NULL,
  `fullname`    VARCHAR(200) NOT NULL DEFAULT '',
  `designation` VARCHAR(200) NOT NULL DEFAULT '',
  `utype`       VARCHAR(50)  NOT NULL DEFAULT '',
  `signature`   VARCHAR(255) NOT NULL DEFAULT '',
  `updated_by`  VARCHAR(100) NOT NULL DEFAULT '',
  `updated_at`  DATETIME NULL DEFAULT NULL,
  UNIQUE KEY `uq_uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `lab_approval_flow` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `subtype`    VARCHAR(300) NOT NULL,               
  `role`       VARCHAR(20)  NOT NULL,               
  `uname`      VARCHAR(100) NOT NULL,               
  `sort_order` INT NOT NULL DEFAULT 0,
  `status`     VARCHAR(20)  NOT NULL DEFAULT 'active',
  `created_by` VARCHAR(100) NOT NULL DEFAULT '',
  `created_at` DATETIME NULL DEFAULT NULL,
  UNIQUE KEY `uq_flow` (`subtype`,`role`,`uname`),
  KEY `idx_subtype` (`subtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
