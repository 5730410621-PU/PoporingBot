<?php

$servername = "den1.mysql5.gear.host";
$username = "poporingbot";
$password = "umbangtalad123!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";