<?php


session_start();
include '../db_config/index.php';


$msg;

error_reporting(0);

if(isset($_SESSION['signIn'])){
header("location:http://localhost/blog/admin/");
}
else{
 
}







if(isset($_POST['btnSignIn'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rememberMe = $_POST['rememberMe'];

  
  
 




  if(empty($email)){
    $msg = "<div class='alert alert-warning'>Email is empty</div>";
  }
  else if(empty($password)){
    $msg = "<div class='alert alert-warning'>Password is empty</div>";
    
  }
  else{
    $query = "SELECT * FROM registration WHERE email ='$email' AND password='$password' ";
    
    $query_run = mysqli_query($connection,$query);
    
    if(mysqli_num_rows($query_run) !=0){

       while($row = mysqli_fetch_assoc($query_run)){
         
         if($row['status'] == 'user'){
           $_SESSION['userSignedIn'] = $row['id'];
           $_SESSION['userName'] = $row['name'];
           $_SESSION['email'] = $row['email'];
           
           // check if the remember me checkbox is checked
          if(empty($_POST['rememberMe'])){

          
          }
          else{
         

          setcookie("remember",$_SESSION['email'],time() + (86400 * 30),'/');

          }


           $msg = "<div class='alert alert-success'>Login successful</div>";
           echo "<script>
           setTimeout(() => {
             window.location.href='http://localhost/blog/user/';
             
            }, 3000);</script>";  
            
            
          }
          else if($row['status'] =='admin'){
          $_SESSION['signIn'] = $row['id'];
          $_SESSION['email'] = $row['email'];
            // check if the remember me checkbox is checked
  
            if(empty($_POST['rememberMe'])){

            }
            else{
  
            setcookie("remember",$_SESSION['email'],time() + (86400 * 30),'/');
  
            }
  
  
          $msg = "<div class='alert alert-success'>Login successful</div>";
          echo "<script>
          setTimeout(() => {
           window.location.href='http://localhost/blog/admin/';
        
         }, 3000);</script>";  
         

        }
       }

       

  }
  else{
    $msg = "<div class='alert alert-danger'>Login Failed</div>";

  }
}
}

// if cookie is set then the email input should equal to email 

isset($_COOKIE['remember'])? $_POST['email'] = $_COOKIE['remember'] : '';


// if cookies are not enabled in a browser redirect to an error page
if(count($_COOKIE) > 0){

}
else{
  header('location:http://localhost/blog/Admin/error.php');
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
    <title>Signin Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    
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

      .hidden{
        display: none;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <p class="message"><?php echo $msg ?></p>

    <div class="form-floating">
      <input type="email" class="form-control" name="email"  value="<?php echo $_POST['email'] ?>">
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" value="<?php echo $_POST['password'] ?>">
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input name="rememberMe" type="checkbox" value="remember-me"
        <?php if(isset($_COOKIE['remember'])) echo 'checked' ?> 
        > Remember Email
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="btnSignIn" type="submit">Sign in</button>
    <div class="mt-2">
      <a class="nav-link" href="">
        <p class="lead">Forgot password?</p>
      </a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y') ?></p>
    <p class="lead">Cookies must be enabled in your browser </p>
  </form>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


  </body>
</html>

