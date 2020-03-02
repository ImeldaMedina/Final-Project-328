DROP TABLE IF EXISTS login;

CREATE TABLE login(
id int(10) NOT NULL AUTO_INCREMENT primary key,
is_admin TINYINT(4) NOT NULL DEFAULT '0',
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
 created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 last_updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into login values (null, TRUE, 'admin', MD5('@dm1n'), now(), now());
insert into login values (null, TRUE, 'Ronaldo', MD5('Donaldo'), now(), now());

DROP TABLE IF EXISTS users;

CREATE TABLE users(
id int(10) NOT NULL primary key,
fname varchar(55) NOT NULL,
lname varchar(120) NOT NULL,
email varchar(255) NOT NULL,
phone VARCHAR(20) NOT NULL
);

insert into users values (1, 'Admin', 'I. Strator', 'Admin@mail.com', '(142) 132-1231');

-- https://stackoverflow.com/questions/8710982/md5-password-retrieving

--select * from login where password = md5('@dm1n') and admin_status > 0;

--$pass = trim($_POST['pass']);
--$pass = md5($pass);
