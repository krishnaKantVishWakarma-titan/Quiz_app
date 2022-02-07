<?php
   include 'connection.php';
   session_start();
   
   $teacherEmail = $_SESSION['email'];
   
   if(!isset($_SESSION['email'])){
      header("location:login.php");
      die();
   }
?>