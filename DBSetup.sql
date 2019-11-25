-- CREATE USER 'ics325fa1919'@'localhost' IDENTIFIED BY PASSWORD '3887';

-- CREATE DATABASE IF NOT EXISTS `ics325fa1919`;
-- GRANT ALL PRIVILEGES ON `ics325fa1919`.* TO 'ics325fa1919'@'localhost';

USE ics325fa1919;

DROP TABLE IF EXISTS insurance;
CREATE TABLE insurance (
    ins_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ins_co varchar(50)
);

DROP TABLE IF EXISTS user_info;
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

DROP TABLE IF EXISTS user;
CREATE TABLE user (
    user_id int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL UNIQUE KEY,
    password varchar(255) NOT NULL,
    role varchar(15) DEFAULT NULL,
    enabled int DEFAULT NULL,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);

DROP TABLE IF EXISTS appointment;
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

DROP TABLE IF EXISTS service;
CREATE TABLE service (
    service_id int NOT NULL AUTO_INCREMENT,
    service varchar(100),
    service_amount int,
    PRIMARY KEY (service_id)
);

DROP TABLE IF EXISTS clinic;
CREATE TABLE clinic (
    clinic_id int NOT NULL AUTO_INCREMENT,
    clinic_name varchar(100),
    PRIMARY KEY (clinic_id)
);

DROP TABLE IF EXISTS preference;
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

DROP TABLE IF EXISTS clinic_services;
CREATE TABLE clinic_services (
    cs_id int NOT NULL AUTO_INCREMENT,
    clinic_id int,
    service_id int,
    PRIMARY KEY (cs_id),
    FOREIGN KEY (service_id) REFERENCES service(service_id),
    FOREIGN KEY (clinic_id) REFERENCES clinic(clinic_id)
);

DROP TABLE IF EXISTS payments;
CREATE TABLE payments (
    payment_id int NOT NULL AUTO_INCREMENT,
    payment_amount float,
    payment_date DATE,
    payment_type varchar(50),
    ins_id int,
    PRIMARY KEY (payment_id),
    FOREIGN KEY (ins_id) REFERENCES insurance(ins_id)
);

DROP TABLE IF EXISTS bill;
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

INSERT INTO insurance (ins_id, ins_co)
VALUES (1, "Medica"),(2, "United Health Care");

INSERT INTO user_info(
    user_id,
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
VALUES(1,"dmitriy","komarov","","","","",55426,9522017106,"2019-11-11",1,"4567890");

INSERT INTO `user`(`user_id`,`email`,`password`,`role`,`enabled`)
VALUES ('1', 'dkom23@hotmail.com', '1234', 'Customer', '1');
