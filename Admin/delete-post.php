<?php
include './db_config/index.php';

error_reporting(0);

$id = $_GET['Delete'];

$query = "delete from post where id='$id'";

$query_run = mysqli_query($connection,$query);


$msg;

if($query_run){

 $msg = "<div class='alert alert-success'>Post deleted successfully</div>"; 
 echo "<script> setTimeout(() => {
    window.location.href='http://localhost/blog/admin/post.php';
  }, 3000);</script>";

}
else{
  $msg = "<div class='alert alert-danger'>Something went wron. Kindly try again!!!!!</div>"; 

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
    <h1> <?php echo $msg; ?></h1>
    </div>
</body>
</html>