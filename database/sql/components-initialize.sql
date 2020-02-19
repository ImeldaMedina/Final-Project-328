
DROP TABLE IF EXISTS `Hyperdrives`;

CREATE TABLE `Hyperdrives`(
`hyperdrive_id` varchar(10) NOT NULL primary key,
`hyperdrive_name` varchar(255) NOT NULL,
`mass` INT(8) NOT NULL,
`max_mass_capacity` INT(8) NOT NULL,
`powerUsage` BIGINT(10) NOT NULL,
`jump_range` DECIMAL(6, 2) NOT NULL,
`jump_speed` DECIMAL(10, 2) NOT NULL,
`price` DECIMAL(15, 2) NOT NULL
);

insert into Hyperdrives values ("h-0001-A", "Basic FTL Hyperdrive", 40, 500, 2000, 22.50, 42.00, 80000.00);
insert into Hyperdrives values ("h-0001-B", "Spatial-Shift Hyperdrive", 50, 500, 4000, 22.50, 420.00, 180000.00);

insert into Hyperdrives values ("h-0002-A", "Interstellar-class Hyperdrive", 80, 5000, 20000, 220.50, 400.00, 460000.00);
insert into Hyperdrives values ("h-0002-B", "Spatial-Shift  Interstellar Hyperdrive", 80, 5000, 34000, 220.50, 40000.00, 10000000.00);

insert into Hyperdrives values ("h-????-A", "Experimental DarkMatter Space-Shifter", 150, 400000, 600000, 500.50, 4000000.00, 10000000.00);
insert into Hyperdrives values ("h-????-B", "Hyper-dimensional Warp Engine ", 1500, 99999999, 7777777777, 9999.99, 99999999.99, 100000000000.00);

DROP TABLE IF EXISTS `Engines`;
CREATE TABLE `Engines` (
  `engine_id` VARCHAR(10) NOT NULL primary key,
  `engine_name` VARCHAR(255) NOT NULL,
  `mass` INT(8) NOT NULL,
  `powerUsage` BIGINT(10) NOT NULL,
  `thrust` BIGINT(10) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL
);

insert into Engines values ("e-0005-A", "Standard Ion Thrusters", '20', '150', '80', '29999.99');
insert into Engines values ("e-0005-B", "Modified Ion Thrusters", 20, 200, 100, 34999.99);
insert into Engines values ("e-0005-C", "Clean Ion Thrusters", 15, 100, 70, 37999.99);

insert into Engines values ("e-0006-A", "Standard Impulse Thrusters", 22, 500, 120, 99999.99);
insert into Engines values ("e-0006-B", "High-Level Impulse Thrusters", 22, 600, 140, 144999.99);

insert into Engines values ("e-????-A", "Experimental DarkMatter Impulse Thrusters", 15, 6000, 300, 20000000.00);
insert into Engines values ("e-????-B", "Experimental Graviton Movement Systems", 0, 10000000, 999999999, 6000000000.00);


DROP TABLE IF EXISTS `Generators`;
CREATE TABLE `Generators` (
  `generator_id` VARCHAR(10) NOT NULL primary key,
  `generator_name` VARCHAR(255) NOT NULL,
  `mass` INT(8) NOT NULL,
  `powerGeneration` BIGINT(10) NOT NULL,
  `fuelType` VARCHAR(45) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL
);

insert into Generators values ("g-0003-A", "Y-Class Fusion Reactor", 50, 3000, 'Deuterium-Tritium', '49999.99');
insert into Generators values ("g-0003-B", "L-Class Fusion Reactor", 50, 5000, 'Deuterium', '99999.99');
insert into Generators values ("g-0003-C", "G-Class Fusion Reactor", 80, 10000, 'Hydrogen', '199999.99');
insert into Generators values ("g-0003-D", "O-Class Fusion Reactor", 100, 40000, 'Hydrogen', '299999.99');

insert into Generators values ("g-0004-A", "Antimatter Reactor", 40, 80000, 'Antimatter', '29999.99');

insert into Generators values ("g-????-A", "Experimental DarkMatter Reactor", 10, 800000, 'Antimatter', '29999.99');
insert into Generators values ("g-????-B", "Experimental Hyperspace Energy Receiver", 40, 9999999999, '????????', '999999999999.99');


DROP TABLE IF EXISTS `Shields`;
CREATE TABLE `Shields` (
  `shield_id` VARCHAR(10) NOT NULL,
  `shield_name` VARCHAR(255) NOT NULL,
  `mass` INT(8) NOT NULL,
  `powerUsage` BIGINT(10) NOT NULL,
  `shielding` INT(10) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL
);

DROP TABLE IF EXISTS `Purposes`;
CREATE TABLE `Purposes` (
  `purpose_id` VARCHAR(10) NOT NULL,
  `purpose_name` VARCHAR(45) NOT NULL,
  `purpose_description` VARCHAR(255) NOT NULL,
  `price_multiplier` DECIMAL(3,2) NOT NULL
);
