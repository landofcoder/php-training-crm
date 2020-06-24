-- tao database voi ten la managecustomer
CREATE DATABASE managecustomer;
USE managecustomer;

-- tao cac table cho database
CREATE TABLE admin (
	username char(50) PRIMARY KEY,
    password char(50)
);

CREATE TABLE customer (
    id INT NOT NULL AUTO_INCREMENT,
	name varchar(50) NOT NULL,
    birthday date NOT NULL,
    gender varchar(5) NOT NULL,
    city varchar(50) NOT NULL,
    address varchar(100) NOT NULL,
    email char(50) NOT NULL,
    phone char(20) NOT NULL,
    PRIMARY KEY(id, phone)
);

INSERT INTO admin VALUES
('huypq68', 'huypq68'),
('manhnv56','manhnv56');

INSERT INTO customer(name, birthday, gender,city,address,email,phone) 
VALUES
('Nguyễn Văn Nam', '1999/05/11', 'Nam', 'Hà Nội','Cầy Giấy','namnguyenvan@gmail.com','01652479890'),
('Phạm Quang Minh', '2009/11/10', 'Nam','Bắc Giang','Việt Yên','minhpq123@gmail.com','0972355277'),
('Nguyễn Thu Hường', '1999/05/04', 'Nữ','Hải Dương' ,'Kim Thành','nguyenthuhuong0405@gmail.com','0966781027');

-- select * from admin
-- select * from customer
-- drop database managecustomer
-- drop table customer
