create table Student(
	id char(8) PRIMARY key,
    name varchar(100) charset utf8,
    avg float,
    phone char(10),
    grade char(8),
    email varchar(100),
    birthday date
);

INSERT INTO `Student` (`id`, `name`, `avg`, `phone`, `grade`, `email`, `birthday`) VALUES ('18120634', 'Tuấn', '9.1', '0377757578', '18CTT5', 'tuannguyentn2504@gmail.com', '2000-04-25');
