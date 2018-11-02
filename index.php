<?php

$servername = "den1.mysql5.gear.host";
$username = "poporingbot";
$password = "umbangtalad123!";
$dbname = "poporingbot";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
$sql = "CREATE TABLE `log` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `u_id` VARCHAR(45) NOT NULL,
    `g_id` VARCHAR(45) NOT NULL,
    `type` VARCHAR(45) NOT NULL,
    `message` VARCHAR(45) NOT NULL,
    `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC) );";

if ($conn->query($sql) === TRUE) {
    echo "Create complete!!";
} else {
    echo "Error: ".$conn->error;
}
*/

$sql = "INSERT INTO open_session (uid,action,status) VALUES ($id,$action,i)";

    if ($conn->query($sql) === TRUE) {
        $result =  "open Session complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    echo $result;
$conn->close();