<?php 

$connection = new mysqli("localhost","root","","blog");

if(!$connection){
    die("connection unsuccessful".mysqli_error($connection));
}

?>