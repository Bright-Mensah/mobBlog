
<?php

include '../Admin/db_config/index.php';

$msg;

error_reporting(0);

if(isset($_POST['btnAddPost'])){
 $title = mysqli_real_escape_string($connection, $_POST['title']);
 $description = mysqli_real_escape_string($connection, $_POST['description']);
 $imageName = $_FILES['fileToUpload']['name'];
 $image_tmp = $_FILES['fileToUpload']['tmp_name'];
 $category = $_POST['category'];

 $target_dir = "postFolder/";
 $target_file =  $target_dir . $imageName;
//  check if fields are not empty

if(empty($title)){
  $msg = "<div class='alert alert-warning text-center text-dark'>Title can't be empty</div>";


}
else if (empty($description)){
  $msg = "<div class='alert alert-warning text-center text-dark'>Description can't be empty</div>";
  
}
else if($category === '0'){
  echo "<script>alert('select a cat')</script>";
}
else{

 
    $query = "insert into post(title,description,category,image)values('$title','$description','$category','$imageName')";

    $query_run = mysqli_query($connection,$query);

    if($query_run){
      $_POST['title'] = '';
      $_POST['description'] = '';
      
      // move image to the required folder

      move_uploaded_file($image_tmp,$target_file);
      $msg = "<div class='alert alert-success text-center text-dark'>Post Added</div>";
        
    }
    else{
      $msg = "<div class='alert alert-danger text-center text-dark'>Something went wrong</div>";

    }
  
    
    // if($query_run){
    //   $msg = "<div class='alert alert-success text-center text-dark'>User added successfully</div>";
    //   echo "<script> setTimeout(() => {
    //     window.location.href='http://localhost/blog/admin/add-users.php';
    //   }, 3000);</script>";
      
    // }
    // else{
    //   $msg = "<div class='alert alert-danger text-center text-dark'>Something went wrong, try again later!!!!!</div>";


    // }
 


  

}
}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bright Mensah blog">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Add Post</title>


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
        <a href="post.php" class="nav-link text-white active">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Post
        </a>
      </li>
      <li>
        <a href="./auth/signout.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          signout
        </a>
      </li>
     
  
    </ul>
    
   
  </div>

  <div class="b-example-divider b-example-vr"></div>

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center mt-5 py-5 px-5">
      <h4 class="text-center mb-3">Add Post</h4>
      <div class="col-lg-6">


        <form action="" method="POST" enctype="multipart/form-data" >

          <p><?php echo $msg ?></p>
          <div class="mb-3">
           <label for="title">Title</label>
           <input name="title" id="title" type="text" value="<?php echo $_POST['title'] ?>" class="form-control">
          </div>
  
          <div class="mb-3">
           <label for="description">Description</label>
           <textarea name="description" id="description" class="form-control"  rows="3"><?php echo $_POST['description'] ?></textarea>
          </div>

          <div class="mb-3">
            <label for="category"> Select Category</label>
            <select class="form-select form-select-sm" name="category" id="category">
              <option value="0">Select Category</option>
              <option value="news">News</option>
              <option value="sports">Sports</option>
              <option value="technology">Technology</option>
              <option value="world">World</option>
              <option value="politics">Politics</option>
            </select>
          </div>


          <div class="mb-3">
            <label for="postImage">Image</label>
            <input type="file" class="form-control" id="postImage"  name="fileToUpload" value="<?php echo $_POST['fileToUpload'] ?>"  >
          </div>

         
          

          <div class="mb-3 text-center">
            <input name="btnAddPost" type="submit" value="Add Post" class="btn btn-sm btn-dark">
          </div>
         
  
        </form>
      </div>
    </div>
  </div>

  
 
</main>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="sidebars.js"></script>


 
  </body>
</html>
