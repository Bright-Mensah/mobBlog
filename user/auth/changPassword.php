<?php 

session_start();

include '../../Admin/db_config/index.php';

error_reporting(0);

if(isset($_SESSION['userSignedIn'])){

}
else{
  header('location:http://localhost/blog/Admin/auth/');

}


// when the change password button is clicked
if(isset($_POST['btnChangePassword'])){
    
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
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
    <title>User</title>


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
      <span class="fs-4">Welcome <?php echo $_SESSION['userName'] ?></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../index.php" class="nav-link text-white " aria-current="page">
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
        <a href="" class="nav-link text-white active ">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Change Password
        </a>
      </li>
    
      <li>
        <a href="Admin/auth/signout.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Sign Out
        </a>
      </li>
    </ul>
   

  </div>

  <div class="b-example-divider b-example-vr"></div>

  <div class="container">
      <form action="" method="POST">
    <div class="row d-flex justify-content-center align-items-center mt-5">


  
       
    <div class="col-lg-4">
        <div>
        <label for="oldPassword">Old Password</label>
    
         <input type="text" name="oldPassword" class="form-control" id="oldPassword" value="<?php echo $_POST['oldPassword'] ?>">
        </div>
    </div>
       
    <div class="col-lg-4">
        <div>
            <label for="newPassword">New Password</label>
            <input type="text" name="newPassword" class="form-control" id="newPassword"  value="<?php echo $_POST['newPassword'] ?>">
        </div>
    </div>

    <div class="col-lg-4">
        <div></div>
    </div>

            
        </div>

        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="confirmPassword">Confirm new Password</label>
                <input type="text" name="confirmNewPassword" class="form-control" id="confirmPassword" value="<?php echo $_POST['confirmNewPassword'] ?>">
            </div>
        </div>
      

        <div class="mt-5">
            <input type="submit" name="btnChangePassword" class="btn btn-success" value="Change Password">
        </div>

        
        </form>
     

      
      
       </div>
      </div>
    </div>
  </div>

 
</main>


<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="sidebars.js"></script>
  </body>
</html>
