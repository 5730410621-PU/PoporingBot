<?php
$servername = "den1.mysql5.gear.host";
$username = "poporingbot";
$password = "umbangtalad123!";
$dbname = "poporingbot";



function openSession($id,$action){
    $conn = new mysqli($servername, $username, $password, $dbname);
    $status = 'i';

    $sql = "INSERT INTO open_session (u_id,action,status,end_time) VALUES ($id,$action,$status,NULL)";

    if ($conn->query($sql) === TRUE) {
        $result =  "open Session complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return $result;
}
