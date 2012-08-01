ALTER TABLE `decanat`.`students` DROP FOREIGN KEY `Students_to_groups` ;
ALTER TABLE `decanat`.`students` DROP COLUMN `group_id` 
, DROP INDEX `Students_to_groups` ;
