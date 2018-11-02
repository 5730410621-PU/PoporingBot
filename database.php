<?php
$servername = "den1.mysql5.gear.host";
$username = "poporingbot";
$password = "umbangtalad123!";
$dbname = "poporingbot";

function createTable1(){
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = <<<SQL
    CREATE TABLE `open_session` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `u_id` VARCHAR(45) NOT NULL,
        `action` VARCHAR(45) NOT NULL,
        `status` VARCHAR(45) NOT NULL,
        `start_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        `end_time` DATETIME NULL,
        PRIMARY KEY (`id`),
        UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);
SQL;
    
    if ($conn->query($sql) === TRUE) {
        $result =  "Create complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return $result;
}

function createTable2(){
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "CREATE TABLE `log` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `u_id` VARCHAR(45) NOT NULL,
        `g_id` VARCHAR(45) NOT NULL,
        `type` VARCHAR(45) NOT NULL,
        `message` VARCHAR(45) NOT NULL,
        `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        PRIMARY KEY (`id`),
        UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);";
    
    if ($conn->query($sql) === TRUE) {
        $result =  "Create complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return $result;
}


function openSession($id,$action){
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO open_session (uid,action,status) VALUES ($id,$action,'i')";

    if ($conn->query($sql) === TRUE) {
        $result =  "open Session complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return $result;
}
