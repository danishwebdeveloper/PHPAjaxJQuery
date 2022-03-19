<?php
$con =   new mysqli('localhost', 'root', '', 'phpjQuery');
if(!$con){
   die(mysqli_error($con));
}
?>