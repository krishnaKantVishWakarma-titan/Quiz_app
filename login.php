<?php

    include('connection.php');

    session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $myEmail = mysqli_real_escape_string($conn,$_POST['email']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['pwd']); 
        
        $sql = "SELECT `email`, `password` FROM `login` WHERE email='$myEmail' and password='$mypassword'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
            
        if($count == 1) {

            $_SESSION['email'] = $myEmail;
        
            header("location: userWelcome.php");

        }else {
            echo '<script>alert("Invalid name and password!")</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <!-- CSS file's -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/fav_icon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <div class="main-container">
            <form action="login.php" method="post" name="Log_form" onsubmit="return validate()">
                <h2><center>Login Here</center></h2>
                <p>E-mail Address :</p>
                <input type="text" name="email" autocomplete="off">
                <p>Password :</p>
                <input type="password" name="pwd" autocomplete="off">
                <br><br>
                <input type="submit" value="Login"><br><br><br>
                <h5><center>OR</center></h5><br><br>
                <a href="register.php">Register</a>
            </form>
        </div>
    </header>

    <script src="js/main.js"></script>
    <!-- Validations -->
    <script>
        function validate(){

        var name=document.forms["Log_form"]["email"];
        var pass=document.forms["Log_form"]["pwd"];

        if(name.value==""){
            window.alert("Please enter your valid email!");
            name.focus();
            return false;
        }

        if(pass.value==""){
            window.alert("Please enter your password!");
            pass.focus();
            return false;
        }

        return true;
        }
    </script>

</body>
</html>