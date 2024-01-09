-- CREATE TABLE 'notes' (
--     'notesid' VARCHAR(255) DEFAULT NULL,
--     'filename' VARCHAR(255) DEFAULT NULL,
--     'dateuploaded' VARCHAR(255) DEFAULT NULL,
--     'deadline' VARCHAR(255) DEFAULT NULL,
--     'author' VARCHAR(255) DEFAULT NULL,
--     'instructions' VARCHAR(255) DEFAULT NULL   
-- );


CREATE TABLE `reg`.`notes` (
    `notesid` VARCHAR(250) NOT NULL , 
    `filename` VARCHAR(250) NOT NULL , 
    `dateuploaded` VARCHAR(250) NOT NULL , 
    `deadline` VARCHAR(250) NOT NULL , 
    `author` VARCHAR(250) NOT NULL , 
    `instructions` VARCHAR(250) NOT NULL ) 
    ENGINE = InnoDB; 



CREATE TABLE `reg`.`assignments` (
    `assignmentid`VARCHAR(255) NOT NULL,
    `filename` VARCHAR(255) NOT NULL,
    `dateuploaded` VARCHAR(255) NOT NULL,
    `deadline` VARCHAR(255) NOT NULL,
    `teacher` VARCHAR(255) NOT NULL,
    `instructions` VARCHAR(255) NOT NULL 
); 

CREATE TABLE `reg`.`pastpapers` (
    `pastpaperid` VARCHAR(255) NOT NULL,
    `filename` VARCHAR(255) NOT NULL,
    `dateuploaded` VARCHAR(255) NOT NULL,
    `grade` VARCHAR(255) NOT NULL,
    `year` VARCHAR(255) NOT NULL,
    `teacher` VARCHAR(255) NOT NULL,
    `instructions` VARCHAR(255) NOT NULL
);


--running
--4TH JAN 2024
CREATE TABLE `reg`.`notes` (
    `notesname` VARCHAR(255) NOT NULL,
    `dateuploaded` VARCHAR(255),
    `notestr` VARCHAR(255),
    `notestype` VARCHAR(255),
    `notesgrade` VARCHAR(255),
    PRIMARY KEY(`notesname`)
);