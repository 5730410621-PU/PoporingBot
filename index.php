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

$sql = <<< SQL
 CREATE TABLE open_session (
 id INT NOT NULL AUTO_INCREMENT,
 u_id VARCHAR(45) NOT NULL,
 action VARCHAR(45) NOT NULL,
 status VARCHAR(45) NOT NULL,
 start_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
 end_time DATETIME NULL,
 PRIMARY KEY (id),
 UNIQUE INDEX id_UNIQUE (id ASC) 
 );
SQL;

if ($conn->query($sql) === TRUE) {
    echo "Create complete!!";
} else {
    echo "Error: ".$conn->error;
}
$conn->close();