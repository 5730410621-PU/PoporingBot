<?php

include 'config.php' ;

function openSession($id,$action){
    $conn = sql();
    $status = '1';
    $sql = "INSERT INTO open_session (u_id,action,status) VALUES ('$id','$action','$status')";

    if ($conn->query($sql) === TRUE) {
        $result =  "open Session complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return "result ::".$result;
}

function closeSession($id){
    $conn = sql();
    $status = '1';
    $dateNow = date("Y-m-d H:i:s");
    $sql = "UPDATE open_session SET end_time = '$dateNow' ,status = '0' WHERE u_id = '$id' AND status = '1'";

    if ($conn->query($sql) === TRUE) {
        $result =  "open Session complete!!";
    } else {
        $result = "Error: ".$conn->error;
    }
    $conn->close();
    return "result ::".$result;
}



function storeMessageData($id,$type,$message){
    $conn = sql();
    $sql = "SELECT * FROM open_session WHERE u_id = '$id' AND status = '1' ";
    $linkId = $conn->query($sql);
    $row = $linkId->fetch_assoc();
    $gid =$row["id"];

    if($linkId->num_rows > 0){
        
        $sql = "INSERT INTO log (u_id,g_id,type,message) VALUES ('$id','$gid','$type','$message')";
        if ($conn->query($sql) === TRUE) {
            $result =  "Insert to log complete!!";
        } else {
            $result = "Error: ".$conn->error;
        }
    }else{
        $result ="Can not insert this time";
    }
    return $result;
    
}