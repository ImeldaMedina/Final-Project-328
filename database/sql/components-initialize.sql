
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

insert into Engines values ("e-0005-A", "Standard Ion Thrusters", '20', '400', '80', '29999.99');
insert into Engines values ("e-0005-B", "Modified Ion Thrusters", 20, 600, 100, 34999.99);
insert into Engines values ("e-0005-C", "Clean Ion Thrusters", 15, 300, 70, 37999.99);

insert into Engines values ("e-0006-A", "Standard Impulse Thrusters", 22, 800, 120, 99999.99);
insert into Engines values ("e-0006-B", "High-Level Impulse Thrusters", 22, 1000, 140, 144999.99);

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

insert into Generators values ("g-????-A", "Experimental DarkMatter Reactor", 10, 800000, 'Antimatter', '9999999999.99');
insert into Generators values ("g-????-B", "Experimental Hyperspace Energy Receiver", 200, 9999999999, '????????', '999999999999.99');


DROP TABLE IF EXISTS `Shields`;
CREATE TABLE `Shields` (
  `shield_id` VARCHAR(10) NOT NULL,
  `shield_name` VARCHAR(255) NOT NULL,
  `mass` INT(8) NOT NULL,
  `powerUsage` BIGINT(10) NOT NULL,
  `shielding` INT(8) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL
);

insert into Shields values ("s-0001-A", "Standard Energy Reflector", 50, 500, 40, 29999.99);
insert into Shields values ("s-0001-B", "High Energy Reflector", 50, 800, 60, 39999.99);

insert into Shields values ("s-0002-A", "Prismatic Shield", 70, 1200, 120, 78000.00);
insert into Shields values ("s-0002-B", "Bi-Weave Prismatic Shield", 80, 1800, 160, 100000.00);
insert into Shields values ("s-0002-C", "Tri-Weave Prismatic Shield", 90, 2400, 220, 150000.00);

insert into Shields values ("s-????-A", "Experimental Dark Energy Mass Deflector", 200, 100000, 999, 150000000.00);
insert into Shields values ("s-????-B", "Hyperspace Damage Nullifier", 77, 7777777777, 77777777, 7777777777.77);


DROP TABLE IF EXISTS `Purposes`;
CREATE TABLE `Purposes` (
  `purpose_id` VARCHAR(10) NOT NULL,
  `purpose_name` VARCHAR(45) NOT NULL,
  `purpose_description` VARCHAR(255) NOT NULL,
  `price_multiplier` DECIMAL(3,2) NOT NULL
);

insert into Purposes values ("p-0001", "Multipurpose",
"This ship was designed to adapt to multiple situations, it's modular design allows for easy re-specialization.", 1);

insert into Purposes values ("p-0002", "Warship",
"Outfitted with heavy weaponry, this ship was designed for battle.", 1.2);

insert into Purposes values ("p-0003", "Passenger Liner",
"Much of the ships interior will be filled with a plethora of passenger cabins, entertainment areas
 and other means of distraction.", 1.7);

insert into Purposes values ("p-0004", "Luxury",
"With elegant design and opulent interior decor, This space-yacht is fit for an emperor.", 3.5);