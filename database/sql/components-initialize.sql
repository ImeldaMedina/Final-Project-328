
DROP TABLE IF EXISTS Hyperdrives;

CREATE TABLE Hyperdrives(
hyperdrive_id varchar(10) NOT NULL primary key,
hyperdrive_name varchar(255) NOT NULL,
mass INT NOT NULL,
powerUsage INT NOT NULL,
jump_range DOUBLE(6, 2) NOT NULL,
jump_speed DOUBLE(10, 2) NOT NULL,
price DECIMAL(15, 2) NOT NULL
);

DROP TABLE IF EXISTS `Engines`;
CREATE TABLE `Engines` (
  `engine_id` VARCHAR(10) NOT NULL primary key,
  `engine_name` VARCHAR(255) NOT NULL,
  `mass` INT(10) NOT NULL,
  `powerUsage` INT(10) NOT NULL,
  `thrust` INT(10) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL
);

insert into Engines values ("e-0005-A", "Standard Ion Thrusters", '20', '3000', '80', '29999.99');
insert into Engines values ("e-0005-B", "Modified Ion Thrusters", 20, 3500, 100, 34999.99);
insert into Engines values ("e-0005-C", "Clean Ion Thrusters", 15, 1500, 70, 37999.99);

insert into Engines values ("e-0006-A", "Standard Impulse Thrusters", 22, 5000, 120, 99999.99);
insert into Engines values ("e-0006-B", "High-Level Impulse Thrusters", 22, 6000, 140, 144999.99);

insert into Engines values ("e-????-A", "Experimental DarkMatter Impulse Thrusters", 15, 60000, 300, 20000000.00);
insert into Engines values ("e-????-B", "Experimental Graviton Movement Systems", 0, 100000, 9999999999, 200000000.00);


DROP TABLE IF EXISTS `Generators`;
CREATE TABLE `Generators` (
  `generator_id` VARCHAR(10) NOT NULL primary key,
  `generator_name` VARCHAR(255) NOT NULL,
  `mass` INT(10) NOT NULL,
  `powerGeneration` INT(10) NOT NULL,
  `fuelType` VARCHAR(45) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL
);

DROP TABLE IF EXISTS `Shields`;
CREATE TABLE `Shields` (
  `shield_id` VARCHAR(10) NOT NULL,
  `shield_name` VARCHAR(255) NOT NULL,
  `mass` INT(10) NOT NULL,
  `powerUsage` INT(10) NOT NULL,
  `shielding` INT(10) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL
);

DROP TABLE IF EXISTS `Purposes`;
CREATE TABLE `Purposes` (
  `purpose_id` VARCHAR(10) NOT NULL,
  `purpose_name` VARCHAR(45) NOT NULL,
  `purpose_description` VARCHAR(255) NOT NULL,
  `price_multiplier` DECIMAL(15,2) NOT NULL
);
