
<?php 

include './db_config/index.php';


$msg;

error_reporting(0);


/////// get post details ////////

$id = $_GET['news'];
$query = "SELECT * from post WHERE id ='$id'";
$query_run = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($query_run)){
    $postTitle = $row['title'];
    $postDescription = $row['description'];
    $postCategory = $row['category'];
    $postImage = $row['image'];
  
}

/////// get post details ends here ////////



/////// update  post details ////////
if(isset($_POST['btnEditPost'])){
    $editTitle = $_POST['editTitle'];
    $editDescription = $_POST['editDescription'];
    $editCategory = $_POST['editCategory'];
    $image = $_POST['editPostImage'];
    $imageName = $_FILES['editPostImage']['name'];
    $tmpName = $_FILES['editPostImage']['tmp_name'];
    $targetDir = 'postFolder/';
    $targetFile = $targetDir. $imageName;



    if(empty($editTitle)){
         $msg = "<div class='alert alert-warning text-center text-dark'>Title can't be empty</div>";

         
        }
        else if(empty($editDescription)){
            $msg = "<div class='alert alert-warning text-center text-dark'>Description can't be empty</div>";
        
    }


    else{



      // if image is not updated
        if(empty($imageName)){
          $query = "UPDATE post  SET title='$editTitle', description='$editDescription',  category='$editCategory' WHERE id='$id'";

          $query_run = mysqli_query($connection,$query);
  
          if($query_run){
              
              $msg = "<div class='alert alert-success text-center text-dark'>post  updated.....</div>";
              echo "<script> setTimeout(() => {
                  window.location.href='http://localhost/blog/admin/post.php';
                }, 3000);</script>";
  
              }
          
          else{
              $msg = "<div class='alert alert-danger text-center text-dark'>Something went wrong...</div>";
  
          }  
        }
        else{

          // if image is updated

        // update user details

        $query = "UPDATE post  SET title='$editTitle', description='$editDescription',  category='$editCategory', image='$imageName' WHERE id='$id'";

        $query_run = mysqli_query($connection,$query);

        if($query_run){
            move_uploaded_file($tmpName,$targetDir);
            $msg = "<div class='alert alert-success text-center text-dark'>post  updated.....</div>";
            echo "<script> setTimeout(() => {
                window.location.href='http://localhost/blog/admin/post.php';
              }, 3000);</script>";
            
        }
        else{
            $msg = "<div class='alert alert-danger text-center text-dark'>Something went wrong...</div>";

        }
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

      .img-thumbnail{
        height: 100px;
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
    <h4 class="text-center mb-3">Update Post</h4>

      <div class="col-lg-6">

        <form action="" method="POST" enctype="multipart/form-data">
        <p><?php echo $msg ?></p>
          <div class="mb-3">
           <label for="">title</label>
           <input name="editTitle" value="<?php echo $postTitle ?>"  type="text" class="form-control">
          </div>
  
          <div class="mb-3">
           <label for="">description</label>
           <textarea class="form-control" name="editDescription" id="" cols="" rows="3"><?php echo $postDescription ?></textarea>
          </div>
          <div class="mb-3">
           <label for="category">category</label>
           <select class="form-select form-select-sm" name="editCategory" id="category">
            <option value="<?php echo $postCategory ?>"><?php echo $postCategory ?></option>
            <option value="News">News</option>
            <option value="Sports">Sports</option>
           </select>
          </div>

            <!-- post image  -->
            <div class="mb-3 text-center">

              <img class="img-thumbnail" src="./postFolder/<?php echo $postImage ?>" alt="<?php echo $postImage ?>">
            </div>
            <!-- post image ends here -->
          <div class="mb-3">
            <label for="postImage"></label>
            <input type="file" name="editPostImage" id="postImage" class="form-control">
          </div>
          

          <div class="mb-3 text-center">
            <input name="btnEditPost" type="submit" value="Update" class="btn btn-sm btn-dark">
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
