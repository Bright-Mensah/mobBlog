<?php 
session_start();

unset($_SESSION['signIn']);
unset($_SESSION['userSignedIn']);
header("location:http://localhost/blog/admin/auth/");




?>