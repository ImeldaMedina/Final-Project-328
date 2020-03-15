DROP TABLE IF EXISTS ships;

CREATE TABLE ships(
id int(10) NOT NULL AUTO_INCREMENT primary key,
generator VARCHAR(10) NOT NULL,
shield VARCHAR(10) NOT NULL,
engine VARCHAR(10) NOT NULL,
hyperdrive VARCHAR(10) NOT NULL,
color VARCHAR(10) NOT NULL,
purpose VARCHAR(10)
);

insert into ships values (null);