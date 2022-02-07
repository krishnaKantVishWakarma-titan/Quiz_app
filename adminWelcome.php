<?php

    include 'adminSession.php';
    include 'connection.php';

    // show Users
    $showUser = mysqli_query($conn,"select * from login where user_type='user' ");

    // show category db connection
    $showCat = mysqli_query($conn,"select * from category");

    // show teacher
    $showTeacher = mysqli_query($conn,"SELECT * FROM teacherlogin");

    // show students
    $showStudents = mysqli_query($conn,"SELECT * FROM login");

    // show scores
    $showScore = mysqli_query($conn,"SELECT * FROM score");

    // set category
    if(isset($_GET['submit'])){
        $cname=$_GET['catName'];
        $setCat = mysqli_query($conn,"INSERT INTO `category`(`cat_name`) VALUES ('$cname')");
        echo '<script>alert("New Category Inserted Successfully!")</script>' ;
    }

    // set questions
    if(isset($_POST['submit'])){
        $ques=$_POST['ques'];
        $ans1=$_POST['ans1'];
        $ans2=$_POST['ans2'];
        $ans3=$_POST['ans3'];
        $ans4=$_POST['ans4'];
        $ans=$_POST['ans'];
        $cvalue=$_POST['category'];
        $setCat = mysqli_query($conn,"INSERT INTO `questions`(`question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `cat_id`) VALUES ('$ques','$ans1','$ans2','$ans3','$ans4','$ans','$cvalue')");
        echo '<script>alert("New Question Inserted Successfully!")</script>' ;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- CSS file's -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/adminPanel.css">
    <link rel="shortcut icon" href="img/fav_icon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h3>Hello, Sir ... <a href="logout.php">LogOut</a></h3>
        <div class="tabContainer">
            <center><div class="buttonContainer">
                <button onclick="showPanel(0,'#fff')">Teacher's list</button>
                <button onclick="showPanel(1,'#fff')">Student's list</button>
                <button onclick="showPanel(2,'#fff')">Student's scores</button></button>
            </div></center>

            <div class="tabPanel">

                <table>
                    <tr>
                        <th>Teacher's Name</th>
                        <th>Subject</th>
                    </tr>

                    <?php while($score=mysqli_fetch_assoc($showTeacher)){ ?>
                        <tr>
                            <td><?php echo $score['email'];  ?></td>
                            <td><?php echo $score['subject'];  ?><td>
                        </tr>
                    <?php } ?>

                </table>

            </div>

            <div class="tabPanel">

                <table>
                    <tr>
                        <th>Student's Name</th>
                        <th>Email</th>
                    </tr>

                    <?php while($score=mysqli_fetch_assoc($showStudents)){ ?>
                        <tr>
                            <td><?php echo $score['name'];  ?></td>
                            <td><?php echo $score['email'];  ?><td>
                        </tr>
                    <?php } ?>

                </table>

            </div>

            <div class="tabPanel">

                <table>
                    <tr>
                        <th>Student's Name</th>
                        <th>Score's</th>
                    </tr>

                    <?php while($score=mysqli_fetch_assoc($showScore)){ ?>
                        <tr>
                            <td><?php echo $score['user_name'];  ?></td>
                            <td><?php echo $score['score'];  ?><td>
                        </tr>
                    <?php } ?>

                </table>

            </div>
            
        </div>
    </header>

    <script src="js/main.js"></script>
    <script src="js/tab.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){

        // Delete 
        $('.delete').click(function(){
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];

        // AJAX Request
        $.ajax({
            url: 'remove.php',
            type: 'POST',
            data: { id:deleteid },
            success: function(response){
            if(response == 1){
            // Remove row from HTML Table
            $(el).closest('tr').css('background','tomato');
            $(el).closest('tr').fadeOut(800,function(){
            $(this).remove();
            });
            }else{
            alert('Invalid ID.');
            }

        }
        });
        });
        });
    </script>
    <script>
        function validateCat(){

        var name=document.forms["set_category"]["catname"];

        if(name.value==""){
            window.alert("Please enter Subject name!");
            name.focus();
            return false;
        }

        return true;
        }
    </script>
    <script>
        function validateQues(){

        var ques=document.forms["set_ques"]["ques"];
        var ans1=document.forms["set_ques"]["ans1"];
        var ans2=document.forms["set_ques"]["ans2"];
        var ans3=document.forms["set_ques"]["ans3"];
        var ans4=document.forms["set_ques"]["ans4"];
        var ans=document.forms["set_ques"]["ans"];

        if(ques.value==""){
            window.alert("Please enter your wquestion !");
            ques.focus();
            return false;
        }

        if(ans1.value==""){
            window.alert("Please enter your answer!");
            ans1.focus();
            return false;
        }

        if(ans2.value==""){
            window.alert("Please enter your answer!");
            ans2.focus();
            return false;
        }

        if(ans3.value==""){
            window.alert("Please enter your answer!");
            ans3.focus();
            return false;
        }

        if(ans4.value==""){
            window.alert("Please enter your answer!");
            ans4.focus();
            return false;
        }

        if(ans.value==""){
            window.alert("Please enter your right answer!");
            ans.focus();
            return false;
        }

        return true;
        }
    </script>
</body>
</html>