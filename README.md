# PHP IP Logger (with Reverse Lookup)

## PHP Configuration
+ Insert necessary values into ```vistor_config.php```
+ (optional) Change locations of ```visitor_config.php``` and ```visitor_connect.php```, but don't forget to update the require() statements in ```visitor_config.php``` and ```visitor_info.php```
+ Use require() in your webpage to include the file ```visitor_info.php```

## MySQL Configuration
+ Create a database, and then create a table. The table should have the following structure:

    |Name|Type|Default|Extra|
    |---|---|---|---|
    id|INT|None|AUTO_INCREMENT
    time|timestamp|CURRENT_TIMESTAMP|
    ip_address|varchar(50)|None
    hostname|text|None
    cur_url|text|None
    pre_url|text|None
    xff_headers|text|None

+ Or use the query below:

    ```sql
     CREATE TABLE `DATABASE_HERE`.`TABLE_HERE` ( `id` INT NOT NULL AUTO_INCREMENT , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `ip_address` VARCHAR(50) NOT NULL , `hostname` VARCHAR(100) NOT NULL , `cur_url` TEXT NOT NULL , `pre_url` TEXT NOT NULL , `xff_headers` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci; 
     ```
