<?php

    include('connection.php');

    if(isset($_POST["submit"])){
        $email=$_POST["email"];
        $sub=$_POST["subject"];
        $pass=$_POST["pwd"];
        
        $qry="INSERT INTO `teacherlogin`(`email`, `password`, `subject`) VALUES ('$email', '$pass', '$sub')";
        $qryCat="INSERT INTO `category`(`cat_name`, `teacherName`) VALUES ('$sub', '$email')";

        mysqli_query($conn,$qryCat);

        if(mysqli_query($conn,$qry))
        {
            header("location:teacherLogin.php");
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
            <form action="teacherRegis.php" method="POST" name="reg_form" onsubmit="return validate()">
                <h2><center>Register Here</center></h2>
                <p>E-mail Address :</p>
                <input type="text" name="email" autocomplete="off"/>
                <p>Enter your subject :</p>
                <input type="text" name="subject" autocomplete="off"/>
                <p>Password :</p>
                <input type="password" name="pwd" autocomplete="off"/>
                <br>
                <input type="submit" value="Register" name="submit"/><br><br>
                <h5><center>OR</center></h5><br>
                <a href="teacherLogin.php">Login</a>
            </form>
        </div>
    </header>

    <script src="js/main.js"></script>
    <script>
        function validate(){

        var subject=document.forms["reg_form"]["subject"];
        var email=document.forms["reg_form"]["email"];
        var pass=document.forms["reg_form"]["pwd"];

        if(subject.value==""){
            window.alert("Please enter your valid subject name!");
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