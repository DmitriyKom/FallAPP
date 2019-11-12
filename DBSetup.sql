DROP DATABASE IF EXISTS fallapp;

Create DATABASE fallapp;

CREATE TABLE insurance (
    ins_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ins_co varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE user_info (
    user_id int NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    middle_name varchar(50) NOT NULL,
    address varchar(255) NOT NULL,
    city varchar(50) NOT NULL,
    state varchar(50) NOT NULL,
    zip varchar(50) NOT NULL,
    phone_number bigint NOT NULL,
    SSN bigint NOT NULL,
    birth_dt DATE,
    ins_id int NOT NULL,
    policy_number varchar(50),
    FOREIGN KEY (ins_id) REFERENCES insurance(ins_id)
);

CREATE TABLE user (
    user_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) NOT NULL UNIQUE KEY,
    password varchar(255) NOT NULL,
    role varchar(15) DEFAULT NULL,
    enabled int DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Appointment (
    app_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    doc_id int,
    app_dt DATE,
    app_time DATE,
    FOREIGN KEY (user_id) REFERENCES user_info(user_id),
    FOREIGN KEY (doc_id) REFERENCES user_info(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE service (
    service_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    service varchar(100),
    service_amount int
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE clinic (
    clinic_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    clinic_name varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE preference (
    pref_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    clinic_id int,
    doc_id int,
    service_id_1 int,
    service_id_2 int,
    service_id_3 int,
    FOREIGN KEY (user_id) REFERENCES user_info(user_id),
    FOREIGN KEY (doc_id) REFERENCES user_info(user_id),
    FOREIGN KEY (clinic_id) REFERENCES clinic(clinic_id),
    FOREIGN KEY (service_id_1) REFERENCES service(service_id),
    FOREIGN KEY (service_id_2) REFERENCES service(service_id),
    FOREIGN KEY (service_id_3) REFERENCES service(service_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE clinic_services (
    cs_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    clinic_id int,
    service_id int,
    FOREIGN KEY (service_id) REFERENCES service(service_id),
    FOREIGN KEY (clinic_id) REFERENCES clinic(clinic_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE payments (
    payment_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    payment_amount float,
    payment_date DATE,
    payment_type varchar(50),
    ins_id int,
    FOREIGN KEY (ins_id) REFERENCES insurance(ins_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE bill (
    bill_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    service_id int,
    service_dt DATE,
    payment_id int,
    app_id int,
    clinic_id int,
    FOREIGN KEY (user_id) REFERENCES user_info(user_id),
    FOREIGN KEY (service_id) REFERENCES service(service_id),
    FOREIGN KEY (payment_id) REFERENCES payments(payment_id),
    FOREIGN KEY (clinic_id) REFERENCES clinic(clinic_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO insurance (ins_id, ins_co)
VALUES (1, "Medica"),
(2, "United Health Care");
INSERT INTO user_info(
    user_id,
    first_name,
    last_name,
    middle_name,
    address,
    city,
    state,
    zip,
    phone_number,
    SSN,
    birth_dt,
    ins_id,
    policy_number
)
VALUES(
    1,
    "dmitriy",
    "komarov",
    "",
    "",
    "",
    "",
    55426,
    9522017106,
    555667777,
    "2019-11-11",
    1,
    "4567890"
);

INSERT INTO `user` (`user_id`, `email`, `password`, `role`, `enabled`)
VALUES ('1', 'dkom23@hotmail.com', '1234', 'Customer', '1');
