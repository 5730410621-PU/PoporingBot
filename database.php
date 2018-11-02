<?php

include 'config.php' ;

function openSession($id,$action){
    
    $conn = sql();

    $sql = "INSERT INTO open_session (u_id,action,status) VALUES ('$id','$action','$status')";

    if ($conn->query($sql) === TRUE) {
        $result =  "open Session complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return "result ::".$result;
}
