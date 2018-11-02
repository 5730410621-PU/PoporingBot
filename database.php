<?php
$servername = "den1.mysql5.gear.host";
$username = "poporingbot";
$password = "umbangtalad123!";
$dbname = "poporingbot";



function openSession($id,$action){
    $conn = new mysqli($servername, $username, $password, $dbname);
    $status = '1';

    $sql = "INSERT INTO open_session (u_id,action,status) VALUES ('$id','$action','$status')";

    if ($conn->query($sql) === TRUE) {
        $result =  "open Session complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return "SQL ::".$sql."\nresult ::".$result;
}
