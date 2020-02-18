DROP TABLE IF EXISTS login;

CREATE TABLE login(
id int(10) NOT NULL AUTO_INCREMENT primary key,
is_admin TINYINT(4) NOT NULL DEFAULT '0',
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
email varchar(255) NOT NULL,
 created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 last_updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into login values (null, TRUE, 'admin', MD5('@dm1n'), 'Emaret2@mail.greenriver.edu', now(), now());
insert into login values (null, TRUE, 'Ronaldo', MD5('Donaldo'), 'rondo23@mail.com', now(), now());


CREATE TABLE user(
id int(10) NOT NULL primary key,
email varchar(255) NOT NULL,

);


-- https://stackoverflow.com/questions/8710982/md5-password-retrieving

--select * from login where password = md5('@dm1n') and admin_status > 0;

--$pass = trim($_POST['pass']);
--$pass = md5($pass);
