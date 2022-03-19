<?php

include_once('./dbconnection.php');


// take all data and store it into the database
        
extract($_POST);
if(isset($_POST['sendName']) && isset($_POST['sendEmail']) && isset($_POST['sendMobile']) && $_POST['sendPlace']){
    
$sql =   "insert into `crud` (fullname, email, mobile, place)
values('$sendName', '$sendEmail', '$sendMobile', '$sendPlace')";

$results = mysqli_query($con, $sql);


}

?>