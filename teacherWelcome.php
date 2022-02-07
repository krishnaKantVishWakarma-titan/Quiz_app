<?php

    include 'teacherSession.php';
    include 'connection.php';

    // show Users
    $showUser = mysqli_query($conn,"select * from login where user_type='user' ");

    // teacher subject
    $CatName = mysqli_query($conn,"select subject from teacherlogin where email='$teacherEmail' ");
    $rowCatName = mysqli_fetch_array($CatName,MYSQLI_ASSOC);
    $cateName = implode(',', $rowCatName);

    // cat name to cat id conversion
    $CatID = mysqli_query($conn,"select id from category where cat_name='$cateName' ");
    $rowCatID = mysqli_fetch_array($CatID,MYSQLI_ASSOC);
    $cateID = implode(',', $rowCatID);

    // show User's scores
    $showUserScore = mysqli_query($conn,"SELECT * FROM score where category_name='$cateID' " );

    // show Question's
    $showQues = mysqli_query($conn,"select * from questions where cat_id='$cateID'");

    // set questions
    if(isset($_POST['submit'])){
        $ques=$_POST['ques'];
        $ans1=$_POST['ans1'];
        $ans2=$_POST['ans2'];
        $ans3=$_POST['ans3'];
        $ans4=$_POST['ans4'];
        $ans=$_POST['ans'];
        // cat name
        $cvalue= $cateID;
        
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
    <title>Teacher</title>
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
                <button onclick="showPanel(0,'#fff')">Add Category / questions</button>
                <button onclick="showPanel(1,'#fff')">Questions</button>
                <button onclick="showPanel(2,'#fff')">User's Score</button>
            </div></center>
            <div class="tabPanel">

                <form action="teacherWelcome.php" class="form2" method="post" name="set_ques" onsubmit="return validateQues()">
                    <h4>Add Questions ...</h4><br>
                    <input type="text" name="ques" style="width: 550px;" placeholder="Enter Question ..." autocomplete="off"><br>
                    <input type="text" name="ans1" placeholder="First option ...">
                    <input type="text" name="ans2" placeholder="Second option ..."><br>
                    <input type="text" name="ans3" placeholder="Third option ...">
                    <input type="text" name="ans4" placeholder="Fourth option ..."><br>
                    <input type="number" name="ans" placeholder="Right answer ...">
                    <input type="submit" value="Submit" name="submit">
                </form>

            </div>
            <div class="tabPanel">

                <div class="teachTable">
                
                    <table class="teachTableMain">
                    
                        <tr class="teachTableTr">
                        
                            <th style="width: 600px;">Questions</th>
                            <th>Ans1</th>
                            <th>Ans2</th>
                            <th>Ans3</th>
                            <th>Ans4</th>
                            <th>Answer</th>
                        
                        </tr>

                        <?php while($qust=mysqli_fetch_assoc($showQues)){ ?>
                        <tr class="teachTableTr">
                            <td style="width: 600px;"><?php echo $qust['question'] ?></td>
                            <td><?php echo $qust['ans1'] ?></td>
                            <td><?php echo $qust['ans2'] ?></td>
                            <td><?php echo $qust['ans3'] ?></td>
                            <td><?php echo $qust['ans4'] ?></td>
                            <td><?php echo $qust['ans'] ?></td>
                        </tr>
                        <?php } ?>

                    </table>
                
                </div>

            </div>
            <div class="tabPanel">

                <table>
                    <tr>
                        <th>User Name</th>
                        <th>Score's</th>
                    </tr>

                    <?php while($score=mysqli_fetch_assoc($showUserScore)){ ?>
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