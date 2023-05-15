create database Car_Rental_System;
use Car_Rental_System;
create table Car (
    PlateID int ,
    Model varchar(100)not null,
    Year int not null,
    Status boolean  not null DEFAULT 1,  
    InService boolean not null DEFAULT 1,  
    Color varchar(100) not null,
    Rental_price_per_day  decimal(10,2)not null,
    LocID int not null, 
    car_img varchar(50) DEFAULT 'NA',
    transmission_type varchar(20) not null,
    PRIMARY KEY(PlateID) 
);
create table Customer(
    CID int ,
    fname varchar(100)not null,
    lname varchar(100)not null,
    phone varchar(100) not null, 
    Email varchar(255)not null,
    password varchar(15) not null,
    address varchar(200) not null,
    Drive_licence varchar(15)not null,
    LocID int not null,
    unique(Email),
    PRIMARY KEY(CID)
);
create table Location(
    LocID int AUTO_INCREMENT,
    Country varchar(100) not null,
    City varchar(100) not null,
    Address varchar(100) not null,
    PRIMARY KEY(LocID)
);
create table Reservation(
     ResID int not null AUTO_INCREMENT,
     CID int not null,
     PlateID int not null,
     Payment_way varchar(100)not null,
     Start_date Date not null ,
     End_date Date not null,
     PRIMARY KEY (ResID)
     
);
create table Admin(
    Email varchar(255),
    username varchar(100) not null,
    password varchar(15) not null,
    PRIMARY KEY(Email)
);


INSERT INTO `Car`( `PlateID`, `Model`, `Year`, `Status`, `InService`, `Color`, `Rental_price_per_day`, `LocID`, `car_img`, `transmission_type` )
values (123223,'Mercedes',2019,1,1,'grey',2000,2,'assets/images/mercedes.png','automatic'),
(123556,'Honda Accord',2020,0,1,'white',1500,3,'assets/images/honda.png','manual'),
(130050,'BMW x6 M50i',2022,1,1,'blue',3000,2,'assets/images/bmw.png','automatic'),
(139000,'Renault Duster',2018,0,1,'grey',1200,4,'assets/images/Duster.png','automatic'),
(150030,'BMW 8 series coupe',2020,1,1,'grey',2500,2,'assets/images/greybmw.png','automatic'),
(145678,'Hyundai Creta',2017,1,1,'orange',1600,3,'assets/images/hyundaicreta.png','automatic'),
(180092,'Suzuki Dzire',2020,1,1,'white',900,4,'assets/images/suzukidzire.png','manual'),
(112334,'Toyota Fortuner',2021,1,1,'grey',2300,3,'assets/images/Toyota-Fortuner.jpg','automatic'),
(109872,'Hyundai Verna',2016,1,1,'red',1100,1,'assets/images/hyundaiverna.png','manual'),
(1098723,'hyundai i30',2019,1,1,'red',1300,1,'assets/images/hyundai-i30.png','automatic'),
(102987,'Suzuki Ciaz',2016,1,1,'brown',1000,2,'assets/images/suzukiciaz.png','manual'),
(167889,'Toyota Innova',2020,1,1,'red',1800,3,'assets/images/innova.png','automatic'),
(102900,'Wagon R',2019,0,1,'blue',2100,1,'assets/images/wagon.png','automatic');

-- insert Locations
INSERT INTO `Location`(`Country`, `City`,`Address`) 
VALUES 
('Egypt', 'Alexandria','Fleming 302 street'),
('Egypt', 'Cairo','Muizz Street '),
('Istanbul', 'Turkey','Besiktas Square 55 street'),
('China', 'Beijing','Wangfujing 78 street');
-- insert Admin 
INSERT INTO `Admin` (`Email`, `username`,`password`) VALUES
('ahmed@gmail.com', 'ahmedyousef','1234');



-- insert Customers
INSERT INTO `Customer`(`CID`, `fname`, `lname`, `phone`, `Email`,`address`,`password`, `Drive_licence`, `LocID`) 
VALUES
(133,'ingy','hany', '+20-1061080365','ingy@gmail.com','Egypt Alexandria Fleming 302 street','123','41841200','1'),
(244,'heba','essam','+20-1287654820', 'heba@gmail.com','Egypt Alexandria smouha 12 street','345','71341205', '1'),
(334,'Sarah','ahmed','+20-5437789277', 'sarah@gmail.com','Egypt Alexandria mostafkamel 23 street','678','21844201','2'),
(400,'nouran','hany','+20-0267324317', 'nouran@gmail.com','Egypt Alexandria louran 78 street','78321','81841509', '2'),
(455,'linah','mohamed', '+961-5437787677', 'linah@gmail.com','Egypt Alexandria bahry 22 street','78213','41841202', '3'),
(233,'mohamed','ahmed', '+961-7647875435','mohamed@yahoo.com','Egypt Alexandria gleem 34 street','32415','41841204', '3'),
(870,'hagar','yousef', '+961-9871234532','hagar@gmail.com','Egypt Alexandria smouha 22 street','hg234','41641208', '3'),
(344,'anis','samy', '+86-15437710757','anis@gmail.com','Egypt Alexandria mostafa kamel 88','jgh23','11841203', '4'), 
(234,'Lexi','henna', '+20-1001778918', 'lexi@gmail.com','Egypt Alexandria louran 99 street','ssl3','41841706', '4'),
(450,'kareem','yousef', '+20-1111675789', 'kareem@hotmail.com','Egypt Alexandria gleem 78 street','lkdb345','31841207', '4');

-- insert reservations
insert into `Reservation`(`CID`, `PlateID`, `Payment_way`, `Start_date`, `End_date`) 
values (450,123556,'Credit card','2021-04-10','2021-04-20'),
(870,139000,'Debit card','2022-04-11','2022-04-21'),
(233,102900,'Credit card','2022-04-12','2022-04-22');

-- foreign key
ALTER TABLE Customer ADD FOREIGN KEY (LocID)
REFERENCES Location(LocID);

ALTER TABLE Car ADD FOREIGN KEY (LocID)
REFERENCES Location(LocID);
ALTER TABLE Reservation ADD FOREIGN KEY (CID)
REFERENCES Customer(CID);
ALTER TABLE Reservation ADD FOREIGN KEY (PlateID)
REFERENCES Car(PlateID);