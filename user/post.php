<?php

session_start();

 error_reporting(0);

include '../Admin/db_config/index.php';

$query = "SELECT * FROM post ";

$query_run = mysqli_query($connection,$query);

if(mysqli_num_rows($query_run) > 0){

}
else{
  $msg = "<div class='alert alert-info'>No post avaliable at the moment</div>";
  
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
    <title>Post</title>


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
      .img-thumbnail{
        width: 164px;
        height: 124px;
        max-width: 164px;
        max-height: 100px;
        overflow: hidden;
        margin: auto;
        object-fit: contain;
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
      <li>
        <a href="index.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="post.php" class="nav-link active text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          post
        </a>
      </li>
     
     
    </ul>
   
 
  </div>

  <div class="b-example-divider b-example-vr"></div>

  <div class="container">
      <div class="row d-flex justify-content-center align-items-center mt-5">
        <h1 class="text-center mb-5">Post</h1>
       
        <div class="d-flex justify-content-start mb-5">

            <a class="btn btn-primary btn-sm" href="add-post.php">Add Post</a>
        </div>

        <div class="col-lg-4">

          <p class="small alert alert-info text-dark text-center ">Only post by you can be edited and deleted</p>
        </div>

        

        <table class="table">
  <thead>
 

       
       <tr>
         <th  scope="col">No</th>
         <th  scope="col">Title</th>
         <th  scope="col">Description</th>
         <th  scope="col">Image</th>

         <th  scope="col">Action</th>
        
       
    </tr>
  </thead>
  <tbody>
  <h3 class="text-center"><?php echo $msg ?></h3>
    
    <?php 
    include '../Admin/db_config/index.php';

    $userName = $_SESSION['userName'];

    $query = "SELECT * FROM post ";

    $query_run = mysqli_query($connection,$query);

    $id = 0;
    while($getData = mysqli_fetch_assoc($query_run)){
      $id++
      ?>
    
    <tr>
      <th scope="row"><?php echo $id ?></th>
      <td>
        <h5>

            <?php echo substr( $getData['title'],0,40).'  ...'  ?></td>
        </h5>
     
      <td>
        <p>

            
            <?php echo substr( $getData['description'],0,45).' .......' ?></td>
        </p>
      <td>
        <div class="">

            <img class="img-thumbnail" src="../Admin/postFolder/<?php echo $getData['image'] ?>" alt="<?php echo $getData['image'] ?>">
        </div>
      </td>
      <td>

      <?php
      if($getData['post_by'] == $userName){
        ?>
<a class="btn btn-info btn-sm" href="edit-post.php?news=<?php echo $getData['id'] ?>">Edit</a>
<a class="btn btn-danger btn-sm" href="delete-post.php?Delete=<?php echo $getData['id'] ?>">Delete</a>
        <?php

      }
      else{

      }
      
      ?>
    </td>
    </tr>
      <?php
    }
    ?>
  
  </tbody>
</table>
      
      </div>
  </div>

 
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="sidebars.js"></script>
  </body>
</html>
