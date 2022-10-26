
<?php 

include './db_config/index.php';


$msg;

error_reporting(0);


/////// get user details ////////

$id = $_GET['user'];
$query = "SELECT * from registration WHERE id ='$id'";
$query_run = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($query_run)){
    $dName = $row['name'];
    $dEmail = $row['email'];
    $dPassword = $row['password'];
  
}

/////// get user details ends here ////////



/////// update  user details ////////
if(isset($_POST['btnEditUser'])){
    $editName = $_POST['editName'];
    $editEmail = $_POST['editEmail'];
    $editPassword = $_POST['editPassword'];



    if(empty($editName)){
         $msg = "<div class='alert alert-warning text-center text-dark'>name can't be empty</div>";

         
        }
        else if(empty($editEmail)){
            $msg = "<div class='alert alert-warning text-center text-dark'>email can't be empty</div>";
        
    }
    else if(empty($editPassword)){
        $msg = "<div class='alert alert-warning text-center text-dark'>password can't be empty</div>";

    }
    else{
        // update user details

        $query = "UPDATE registration SET name='$editName', email='$editEmail',  password='$editPassword' WHERE id='$id'";

        $query_run = mysqli_query($connection,$query);

        if($query_run){
            $msg = "<div class='alert alert-success text-center text-dark'>user details updated.....</div>";
            echo "<script> setTimeout(() => {
                window.location.href='http://localhost/blog/admin/users.php';
              }, 3000);</script>";

        }
        else{
            $msg = "<div class='alert alert-danger text-center text-dark'>Something went wrong...</div>";

        }
    }
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
    <title>Edit User</title>


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
     
      <li>
        <a href="index.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="users.php" class="nav-link active text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Users
        </a>
      </li>
  
    </ul>
    
   
  </div>

  <div class="b-example-divider b-example-vr"></div>

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center mt-5 py-5 px-5">
    <h4 class="text-center mb-3">Update User</h4>

      <div class="col-lg-6">

        <form action="" method="POST">
        <p><?php echo $msg ?></p>
          <div class="mb-3">
           <label for="">Name</label>
           <input name="editName" value="<?php echo $dName ?>"  type="text" class="form-control">
          </div>
  
          <div class="mb-3">
           <label for="">Email</label>
           <input name="editEmail" value="<?php echo $dEmail ?>"  type="text" class="form-control">
          </div>
          <div class="mb-3">
           <label for="">Password</label>
           <input name="editPassword" value="<?php echo $dPassword ?>" type="text" class="form-control">
          </div>
          

          <div class="mb-3 text-center">
            <input name="btnEditUser" type="submit" value="Add User" class="btn btn-sm btn-dark">
          </div>
         
  
        </form>
      </div>
    </div>
  </div>
  </div>

  
 
</main>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="sidebars.js"></script>
  </body>
</html>
