<?php

    include 'UserSession.php';
    include 'connection.php';

    // show category db connection
    $showCat = mysqli_query($conn,"select * from category");

    // show scores
    $showScore = mysqli_query($conn,"SELECT * FROM score where user_name='$userName'");

    // show User's scores
    $showUserScore = mysqli_query($conn,"SELECT * FROM score ORDER BY score DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $userName; ?></title>
    <!-- CSS file's -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/userPanel.css">
    <link rel="shortcut icon" href="img/fav_icon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h3>Hello, <?php echo $userName; ?> <a href="logout.php">LogOut</a></h3>
        <div class="tabContainer">
            <center><div class="buttonContainer">
                <button onclick="showPanel(0,'#fff')">Home</button>
                <button onclick="showPanel(1,'#fff')">Your Scores</button>
                <button onclick="showPanel(2,'#fff')">Ranking</button>
            </div></center>
            <div class="tabPanel">
                <form action="ques.php" method="post">
                    <h4 style="text-align: center; padding-top: 40px; font-size:30px;">Start quizz</h4>
                    <select name="category">
                        <option value="#">Select Option</option>
                        <?php while($category=mysqli_fetch_assoc($showCat)){ ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['cat_name'] ?></option>
                        <?php } ?>
                    </select>

                    <input type="submit" class="button" value="Submit" style="margin: 230px 0 0 540px; padding: 10px 20px;border-radius: 5px; border: none;background-color: #28b485; font-weight:600;color : white;">

                </form>
            </div>
            <div class="tabPanel">
                
                    
                    

                    <table>
                        <tr>
                            <th>Subject Name</th>
                            <th>Your Score's</th>
                        </tr>

                        <?php while($score=mysqli_fetch_assoc($showScore)){ 
                            $xyz = $score['category_name'];
                            // show category db connection
                            $Cat = mysqli_query($conn,"select * from category where id='$xyz'");
                            $row = mysqli_fetch_array($Cat, MYSQLI_ASSOC);
                        ?>
                
                        <tr>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><?php echo $score['score']; ?><td>
                        </tr>

                        <?php } ?>

                    </table>

                
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
            
    </header>

    <script src="js/main.js"></script>
    <script src="js/tab.js"></script>
</body>
</html>