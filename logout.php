<?php
   session_start();
   include 'connection.php';

   $conn->close();
   if(session_destroy()) {
      header("Location: index.php");
   }
?>