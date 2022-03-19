<?php 
    include './dbconnection.php';

    if(isset($_POST['deleteidSend'])){
        // die('here');
        $delID = $_POST['deleteidSend'];
        $query = "delete from `crud` where id=$delID";
        $run = mysqli_query($con, $query);

    }
?>