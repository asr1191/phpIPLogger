<?php

require('visitor_config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//CREATE TABLE `revipdb`.`visitors` ( `id` INT NOT NULL AUTO_INCREMENT , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `ip_address` VARCHAR(50) NOT NULL , `hostname` VARCHAR(100) NOT NULL , `cur_url` TEXT NOT NULL , `pre_url` TEXT NOT NULL , `xff_headers` TEXT NOT NULL , `country` VARCHAR(50) NOT NULL , `city` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

?>