<?php 

include './Admin/db_config/index.php';


$id = $_GET['news'];


$query = "select * from post where id='$id'";

$query_run = mysqli_query($connection,$query);

while($getPostData = mysqli_fetch_assoc($query_run)){
  $postTitle = $getPostData['title'];
 $postDescription = $getPostData['description'];
 $postImage = $getPostData['image']; 
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
<div class="row g-5">
    <div class="col-md-8">
     
      <article class="blog-post mt-5">
        <h2 class="blog-post-title mb-1 text-center"><?php echo $postTitle ?></h2>
        <p class="blog-post-meta text-center">January 1, 2021 by <a href="#">Mark</a></p>

        
        <div class="text-center">
        <hr>
       <img class="px-5 shadow-sm p-3 mb-5 bg-body rounded" src="./Admin/postFolder/<?php echo $postImage ?>" alt="<?php echo $postImage ?>">
        <blockquote class="blockquote">
          <p class="lh-lg  py-5 px-5"><?php echo $postDescription ?></p>
        </blockquote>
           
       
      
        </div>      
      </article>

      
 

      

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</body>
</html>