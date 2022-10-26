<?php 

session_start();

include './db_config/index.php';

if(isset($_SESSION['signIn'])){

}
else{
  header('location:auth/');
}

//  get total number of users 
$query = "SELECT COUNT(*) AS totalUsers FROM registration WHERE status='user' ";
$query_run = mysqli_query($connection, $query);
while($getTotalUsers = mysqli_fetch_assoc($query_run)){
  $totalUsers = $getTotalUsers['totalUsers'];
}


// get total number of all users including admin


$query = "SELECT COUNT(*) AS total FROM registration  ";
$query_run = mysqli_query($connection, $query);
while($usersTotal = mysqli_fetch_assoc($query_run)){
  $total = $usersTotal['total'];
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Admin</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">


    


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
  </head>
  <body>
  
<main class="d-flex flex-nowrap">

  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php" class="nav-link active" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="post.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Post
        </a>
      </li>
      <li>
        <a href="users.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Users
        </a>
      </li>
    
      <li>
        <a href="./auth/signout.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Sign Out
        </a>
      </li>
    </ul>
   

  </div>

  <div class="b-example-divider b-example-vr"></div>

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center mt-5">
      <div class="col-lg-3">

       <div class="card">
        <div class="card-body">
          <h5 class="text-center">Users</h5>
          <div class="mt-2">
          
           <a class="nav-link" href="users.php"> <h6 class="text-center bg-primary p-2  text-white"><?php echo $totalUsers ?></h6> </a>
          </div>
        </div>
       </div>
       </div>
      <div class="col-lg-3">

        <div class="card">
          <div class="card-body">
            <h5 class="text-center">Posts</h5>
            <div class="mt-2">
          
          <a class="nav-link" href="post.php"><h6 class="text-center bg-warning p-2  text-white"><?php echo $totalUsers ?></h6></a>
        </div>
            
          </div>
         </div>
       </div>
      <div class="col-lg-3">

        <div class="card">
          <div class="card-body">
            <h5 class="text-center">Total Users</h5>
            <div class="mt-2">
          
          <h6 class="text-center bg-success p-2  text-white"><?php echo $total ?></h6>
        </div>
          </div>
       </div>

      
      
       </div>
      </div>
    </div>
  </div>

 
</main>


<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="sidebars.js"></script>
  </body>
</html>
