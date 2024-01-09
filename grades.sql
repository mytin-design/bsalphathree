CREATE TABLE `reg`.`grades` (
    `username` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `stdgrade` VARCHAR(255) NOT NULL,
    `stream` VARCHAR(255) NOT NULL,
    `subjmath` VARCHAR(255) NOT NULL,
    `subjeng` VARCHAR(255) NOT NULL,
    `subjkisw` VARCHAR(255) NOT NULL,
    `subjscie` VARCHAR(255) NOT NULL,
    `subjsscre` VARCHAR(255) NOT NULL,
    `subjintscie` VARCHAR(255) NOT NULL,
    `subjpretech` VARCHAR(255) NOT NULL,
    `subjca` VARCHAR(255) NOT NULL,
    `subjagrinu` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`username`)
);