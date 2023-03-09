--Create the fairmont community center DB
CREATE DATABASE fairmont;

--Use the fairmont DB 
USE fairmont;

--Create the Leader table 
CREATE TABLE Leader(
    leaderID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30),
    lastName VARCHAR(30), 
    phoneNumber VARCHAR(20) UNIQUE,
    email VARCHAR(100) UNIQUE
);


--Create the Volunteer table     
CREATE TABLE Volunteer(
    volunteerID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30),
    lastName VARCHAR(30), 
    phoneNumber VARCHAR(20) UNIQUE,
    email VARCHAR(100) UNIQUE
);

--Create the Schedule table with fks for volunteer/leader ids
CREATE TABLE Schedule(
    scheduleID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    leaderID SMALLINT UNSIGNED,
    volunteerID SMALLINT UNSIGNED,
    startTime TIME,
    endTime TIME, 
    jobDate DATE,
    CONSTRAINT fk_leaderID FOREIGN KEY(leaderID) REFERENCES Leader(leaderID)
    ON UPDATE CASCADE
    ON DELETE SET NULL,
    CONSTRAINT fk_volunteerID FOREIGN KEY(volunteerID) REFERENCES Volunteer(volunteerID)
    ON UPDATE CASCADE
    ON DELETE SET NULL
);

--Create the user table with all the information just like what we did in class for creating users
CREATE TABLE User(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--Insert further indexes for selecting 

--Index for Leader use last name
CREATE INDEX leader_lastName_id ON Leader(lastName);

--Index for volunteer use last name
CREATE INDEX volunteer_lastName_id ON Volunteer(lastName);

--INSERT DATA TO WORK WITH IN THE PHP PROJECT

--Date for Leaders
INSERT INTO Leader VALUES (1, 'Jake', 'Thomas', '224-727-7987', 'jake22@gmail.com');
INSERT INTO Leader VALUES (2, 'Steve', 'Swanson', '224-535-5019', 'stevie32@gmail.com');
INSERT INTO Leader VALUES (3, 'Chase', 'Dixson', '224-319-9026', 'chasester123@gmail.com');

--Data for Volunteers
INSERT INTO Volunteer VALUES (1, 'Tim', 'Roberts', '847-735-8189', 'timyrob@gmail.com');
INSERT INTO Volunteer VALUES (2, 'Tammy', 'Hutchings', '847-501-9023', 'tamhutch@yahoo.com');
INSERT INTO Volunteer VALUES (3, 'Derrick', 'Evans', '224-019-0890', 'derickevans123@gmail.com');
INSERT INTO Volunteer VALUES (4, 'Jamie', 'Stevens', '224-873-8623', 'jamsteve@yahoo.com');
INSERT INTO Volunteer VALUES (5, 'Danny', 'Romo', '847-876-2836', 'dannyro@gmail.com');
INSERT INTO Volunteer VALUES (6, 'Joe', 'Thompson', '224-912-0532', 'joeythom@gmail.com');

--Data for existing schedules

--Jakes schedules
INSERT INTO Schedule VALUES (1, 1, 1, '10:00:00', '12:00:00', '2022:12:20');
INSERT INTO Schedule VALUES (2, 1, 2, '10:00:00', '12:00:00', '2022:12:20');

--Steves schedules
INSERT INTO Schedule VALUES (3, 2, 3, '12:00:00', '14:00:00', '2022:12:20');
INSERT INTO Schedule VALUES (4, 2, 4, '12:00:00', '14:00:00', '2022:12:20');

--Chases schedules
INSERT INTO Schedule VALUES (5, 3, 5, '14:00:00', '16:00:00', '2022:12:20');
INSERT INTO Schedule VALUES (6, 3, 6, '14:00:00', '16:00:00', '2022:12:20');

--Create the PHP User and grant it access for the PHP part of the project
GRANT SELECT, INSERT, UPDATE, DELETE ON fairmont.* TO php_user2@localhost IDENTIFIED BY 'secure_password_123';