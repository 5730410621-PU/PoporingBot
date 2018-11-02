<?php
include 'database.php';

// Create connection
$conn = sql();

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
$id = 'U838a39141a56615db66e65c954e5a036';
$action = 'Report';
$status = '1';

//$sql = "INSERT INTO open_session (u_id,action,status) VALUES ('$id','$action','$status')";
//$sql = "DELETE FROM open_session WHERE status IN ('1')";
$sql = "SELECT * FROM open_session";

//$result =  $conn->query($sql);

/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["u_id"]. " " . $row["action"]. $row["status"]. "<br>";
    }
} else {
    echo "0 results";
}
*/

$conn->close();