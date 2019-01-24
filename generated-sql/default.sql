
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- hurricane_track
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hurricane_track`;

CREATE TABLE `hurricane_track`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date_time` DATETIME,
    `latitude` DECIMAL(5,2),
    `longitude` DECIMAL(5,2),
    `pressure` INTEGER,
    `max_sustained_wind` INTEGER,
    `status` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
