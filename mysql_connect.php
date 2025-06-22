<?php
$con = new mysqli("localhost", "root", "PHW#84#jeor", "registration");
if($con){
    echo "Connection successful";
} else {
    die(mysqli_error($con));
}
?>