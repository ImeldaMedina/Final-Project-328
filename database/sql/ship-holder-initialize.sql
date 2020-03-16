DROP TABLE IF EXISTS ships;

CREATE TABLE ships(
id int(10) NOT NULL AUTO_INCREMENT primary key,
user_id int(10) NOT NULL,
ship_name VARCHAR(255),
generator VARCHAR(10) NOT NULL,
shield VARCHAR(10) NOT NULL,
engine VARCHAR(10) NOT NULL,
hyperdrive VARCHAR(10) NOT NULL,
color VARCHAR(10) NOT NULL,
purpose VARCHAR(20),
price DECIMAL(16,2),
power BIGINT(10)
);
