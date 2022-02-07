<?php

    include('connection.php');

    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $pass=$_POST["pwd"];
        
        $qry="INSERT INTO `login`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')";

        if(mysqli_query($conn,$qry))
        {
            header("location:login.php");
        }
        else
        {
            echo '<script>alert("You are not registered!")</script>' ;
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
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="img/fav_icon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <div class="main-container">
            <form action="register.php" method="POST" name="reg_form" onsubmit="return validate()">
                <h2><center>Register Here</center></h2>
                <p>User-name :</p>
                <input type="text" name="name" autocomplete="off"/>
                <p>E-mail Address :</p>
                <input type="text" name="email" autocomplete="off"/>
                <p>Password :</p>
                <input type="password" name="pwd" autocomplete="off"/>
                <br>
                <input type="submit" value="Register" name="submit"/><br><br>
                <h5><center>OR</center></h5><br>
                <a href="login.php">Login</a>
            </form>
        </div>
    </header>

    <script src="js/main.js"></script>
    <script>
        function validate(){

        var name=document.forms["reg_form"]["name"];
        var email=document.forms["reg_form"]["email"];
        var pass=document.forms["reg_form"]["pwd"];

        if(name.value==""){
            window.alert("Please enter your valid Name!");
            name.focus();
            return false;
        }

        if(email.value==""){
            window.alert("Please enter your valid email!");
            email.focus();
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