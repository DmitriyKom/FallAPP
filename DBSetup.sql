CREATE USER 'ics325fa1919'@'localhost' IDENTIFIED BY PASSWORD 'cItFGRxJH23xGS6J';

CREATE DATABASE IF NOT EXISTS `ics325fa1919`;

GRANT USAGE ON *.* TO 'ics325fa1919'@'localhost';

GRANT ALL PRIVILEGES ON `ics325fa1919`.* TO 'ics325fa1919'@'localhost';

USE ics325fa1919;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS appointment;
DROP TABLE IF EXISTS bill;
DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS preference;
DROP TABLE IF EXISTS user_info;
DROP TABLE IF EXISTS insurance;
DROP TABLE IF EXISTS clinic_services;
DROP TABLE IF EXISTS service;
DROP TABLE IF EXISTS clinic;

CREATE TABLE insurance (
    ins_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ins_co varchar(50)
);

CREATE TABLE user_info (
    user_id int NOT NULL AUTO_INCREMENT ,
    f_name varchar(50) NOT NULL,
    l_name varchar(50) NOT NULL,
    m_name varchar(50) NOT NULL,
    address varchar(255) NOT NULL,
    city varchar(50) NOT NULL,
    state varchar(50) NOT NULL,
    zip varchar(50) NOT NULL,
    phone_number bigint NOT NULL,
    dob DATE,
    ins_id int NOT NULL,
    policy_number varchar(50),
    PRIMARY KEY (user_id),
    FOREIGN KEY (ins_id) REFERENCES insurance(ins_id)
);


CREATE TABLE user (
    user_id int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL UNIQUE KEY,
    password varchar(255) NOT NULL,
    role varchar(15) DEFAULT NULL,
    enabled int DEFAULT NULL,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);


CREATE TABLE appointment (
    app_id int NOT NULL AUTO_INCREMENT,
    user_id int,
    doc_id int,
    app_dt DATE,
    app_time DATE,
    PRIMARY KEY (app_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id),
    FOREIGN KEY (doc_id) REFERENCES user_info(user_id)
);


CREATE TABLE service (
    service_id int NOT NULL AUTO_INCREMENT,
    service varchar(100),
    service_amount int,
    PRIMARY KEY (service_id)
);


CREATE TABLE clinic (
    clinic_id int NOT NULL AUTO_INCREMENT,
    clinic_name varchar(100),
    PRIMARY KEY (clinic_id)
);


CREATE TABLE preference (
    pref_id int NOT NULL AUTO_INCREMENT,
    user_id int,
    clinic_id int,
    doc_id int,
    service_id_1 int,
    service_id_2 int,
    service_id_3 int,
    PRIMARY KEY (pref_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id),
    FOREIGN KEY (doc_id) REFERENCES user_info(user_id),
    FOREIGN KEY (clinic_id) REFERENCES clinic(clinic_id),
    FOREIGN KEY (service_id_1) REFERENCES service(service_id),
    FOREIGN KEY (service_id_2) REFERENCES service(service_id),
    FOREIGN KEY (service_id_3) REFERENCES service(service_id)
);


CREATE TABLE clinic_services (
    cs_id int NOT NULL AUTO_INCREMENT,
    clinic_id int,
    service_id int,
    PRIMARY KEY (cs_id),
    FOREIGN KEY (service_id) REFERENCES service(service_id),
    FOREIGN KEY (clinic_id) REFERENCES clinic(clinic_id)
);


CREATE TABLE payments (
    payment_id int NOT NULL AUTO_INCREMENT,
    payment_amount float,
    payment_date DATE,
    payment_type varchar(50),
    ins_id int,
    PRIMARY KEY (payment_id),
    FOREIGN KEY (ins_id) REFERENCES insurance(ins_id)
);


CREATE TABLE bill (
    bill_id int NOT NULL AUTO_INCREMENT,
    user_id int,
    service_id int,
    service_dt DATE,
    payment_id int,
    app_id int,
    clinic_id int,
    PRIMARY KEY (bill_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id),
    FOREIGN KEY (service_id) REFERENCES service(service_id),
    FOREIGN KEY (payment_id) REFERENCES payments(payment_id),
    FOREIGN KEY (clinic_id) REFERENCES clinic(clinic_id)
);

CREATE TABLE doctor (
    user_id int NOT NULL AUTO_INCREMENT ,
    f_name varchar(50) NOT NULL,
    l_name varchar(50) NOT NULL,
    address varchar(255) NOT NULL,
    city varchar(50) NOT NULL,
    state varchar(50) NOT NULL,
    zip varchar(50) NOT NULL,
    phone_number bigint NOT NULL,
    PRIMARY KEY (user_id)
);

INSERT INTO doctor (
    f_name,
    l_name,
    address,
    city,
    state,
    zip,
    phone_number
    )
VALUES("Hans","Gruber","145 West 29th Street Suite 451","St. Paul", "MN", "55012", "7634434200");

INSERT INTO doctor (
    f_name,
    l_name,
    address,
    city,
    state,
    zip,
    phone_number
    )
VALUES("John","McLane","145 West 29th Street Suite 451","St. Paul", "MN", "55012", "7634434209");

INSERT INTO insurance (ins_id, ins_co)
VALUES (1, "medica"),(2, "unitedhealthcare"),(3, "bluecross/blueshield"),(4, "cigna"),(5, "tricare"),
(6, "medicare"),(7, "medicaid"),(8, "healthpartners"),(9, "aetna");

INSERT INTO user_info(
    f_name,
    l_name,
    m_name,
    address,
    city,
    state,
    zip,
    phone_number,
    dob,
    ins_id,
    policy_number
)
VALUES("dmitriy","komarov","","","","",55426,9522017106,"2019-11-11",1,"4567890");

INSERT INTO `user`(`email`,`password`,`role`,`enabled`)
VALUES ('dkom23@hotmail.com', '1234', '1', '1');

INSERT INTO user_info(
    f_name,
    l_name,
    m_name,
    address,
    city,
    state,
    zip,
    phone_number,
    dob,
    ins_id,
    policy_number
)
VALUES("mellisa","dunken","","","","",55433,7632415599,"2000-05-26",1,"1234567");

INSERT INTO `user`(`email`,`password`,`role`,`enabled`)
VALUES ('mellisa@gmail.com', '1234', '3', '1');

INSERT INTO user_info(
    f_name,
    l_name,
    m_name,
    address,
    city,
    state,
    zip,
    phone_number,
    dob,
    ins_id,
    policy_number
)
VALUES("Frank","Hargrove","Peter","","","",54112,7645529110,"1990-03-06",1,"7654321");

INSERT INTO `user`(`email`,`password`,`role`,`enabled`)
VALUES ('hargrove@gmail.com', '1111', '3', '1');

INSERT INTO user_info(
    f_name,
    l_name,
    m_name,
    address,
    city,
    state,
    zip,
    phone_number,
    dob,
    ins_id,
    policy_number
)
VALUES("Shannon","Magnuson","","","","",56672,9523340990,"1997-12-09",1,"126651");

INSERT INTO `user`(`email`,`password`,`role`,`enabled`)
VALUES ('magnuson@gmail.com', '1111', '1', '1');

INSERT INTO user_info(
    f_name,
    l_name,
    m_name,
    address,
    city,
    state,
    zip,
    phone_number,
    dob,
    ins_id,
    policy_number
)
VALUES("Michael","Scott","","","","",51298,7029982327,"1999-03-01",1,"9988123");

INSERT INTO `user`(`email`,`password`,`role`,`enabled`)
VALUES ('m.scott@hotmail.com', '1111', '1', '1');