<?php
   include 'connection.php';
   session_start();
   
   $user_check = $_SESSION['email'];
   
   if(!isset($_SESSION['email'])){
      header("location:login.php");
      die();
   }
?>