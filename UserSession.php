<?php
   include 'connection.php';
   session_start();
   
   $user_check = $_SESSION['email'];
   
   $ses_sqls = mysqli_query($conn,"select name from login where email = '$user_check' ");
   
   $rows = mysqli_fetch_array($ses_sqls,MYSQLI_ASSOC);
   
   $userName = $rows['name'];
   
   if(!isset($_SESSION['email'])){
      header("location:login.php");
      die();
   }
?>