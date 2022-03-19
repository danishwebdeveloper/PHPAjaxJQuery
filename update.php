<?php

include_once './dbconnection.php';

if(isset($_POST['updateshowID'])){
    
    $userId = $_POST['updateshowID'];

    $query = "Select * from `crud` where id=$userId";
    $run = mysqli_query($con, $query);
    $response = array();
    while($row = mysqli_fetch_assoc($run)){
        $response = $row;
    }
    echo json_encode($response);
}
else{
    $response['status'] = 200;
    $response['message']  = "invalid data";
}



if(isset($_POST['hiddenData'])){
    $uniqueID = $_POST['hiddenData'];
    $sendName = $_POST['sendName'];
    $sendEmail = $_POST['sendEmail'];
    $sendMobile = $_POST['sendMobile'];
    $sendPlace = $_POST['sendPlace'];

    $query = "update `crud` set fullname='$sendName', email='$sendEmail', mobile='$sendMobile', place='$sendPlace' where id='$uniqueID'";
    $run = mysqli_query($con, $query);
}
?>