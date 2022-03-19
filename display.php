<?php

include_once './dbconnection.php';

if(isset($_POST['displayDa'])){
    
    $table = '<table class="table">
    <thead>
      <tr>
        <th scope="col">No#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Place</th>
        <th scope="col">Action</th>
      </tr>
    </thead>';
}

$query = 'SELECT *from crud';
$results = mysqli_query($con, $query);
$number = 1;
while($row=mysqli_fetch_assoc($results)){
  $id = $row['id'];
    $name = $row['fullname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $place = $row['place'];
    $table.= '<tr>
    <th scope="row">' . $number . '</th>
    <td>'. $name .'</td>
    <td>'. $email .'</td>
    <td>'. $mobile .'</td>
    <td>'. $place .'</td>
    <td>
    <button class="btn btn-primary" onclick=updateDetail('.$id.');>
        Update
    </button>
    <button class="btn btn-danger" onclick=deleteUser('.$id.');>
        Delete
    </button>
    </td>
  </tr>';
  $number++;
}

$table.='</table>';
echo $table;
?>