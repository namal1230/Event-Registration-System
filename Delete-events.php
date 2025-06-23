<?php
    include 'mysql_connect.php';

    $id = $_GET['id'];
    $query = "DELETE FROM events WHERE id='$id'";
    $result2 = mysqli_query($con, $query);

    if($result2){
     header("Location: view_admin_events.php");   
    }
?>