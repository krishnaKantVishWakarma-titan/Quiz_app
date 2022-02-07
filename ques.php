<?php

    include 'UserSession.php';
    include 'connection.php';

    $cat_value=$_POST['category'];

    // show Question's
    $showQues = mysqli_query($conn,"select * from questions where cat_id='$cat_value'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qestion's</title>
    <!-- CSS file's -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/ques.css">
    <link rel="shortcut icon" href="img/fav_icon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h3>Question's ... <a href="logout.html">LogOut</a></h3>
        <div class="container">
            
            <form action="ans.php" method="post">

                <input type="hidden" name="cat_id" value="<?php echo $cat_value; ?>">

                <?php while($qust=mysqli_fetch_assoc($showQues)){ ?>
                    <div class="ques-main">
                        <p><?php echo $qust['question'] ?></p>
                        <?php if(isset($qust['ans1'])){ ?><div class="options"><input type="radio" value="1" name="<?php echo $qust['id'] ?>"><span><?php echo $qust['ans1'] ?></span><br></div><?php } ?>
                        <?php if(isset($qust['ans2'])){ ?><div class="options"><input type="radio" value="2" name="<?php echo $qust['id'] ?>"><span><?php echo $qust['ans2'] ?></span><br></div><?php } ?>
                        <?php if(isset($qust['ans3'])){ ?><div class="options"><input type="radio" value="3" name="<?php echo $qust['id'] ?>"><span><?php echo $qust['ans3'] ?></span><br></div><?php } ?>
                        <?php if(isset($qust['ans4'])){ ?><div class="options"><input type="radio" value="4" name="<?php echo $qust['id'] ?>"><span><?php echo $qust['ans4'] ?></span><br></div><?php } ?>
                        <input type="radio" style="display: none;" checked="checked" value="not_attempt" name="<?php echo $qust['id'] ?>">
                    </div>
                <?php } ?>
                
                <input type="submit" value="Submit" class="submit-button"
                
                    style="
                        background-color: blue;
                        border: none;
                        padding: 7px 12px;
                        color: white;
                        font-family: Roboto,Arial,sans-serif;
                        font-size: 18px;
                        font-weight; bold;
                        margin-left: 50%;
                        transform: translateX(-50px);
                        border-radius: 3px;
                    "

                >

            </form>

        </div>
    </header>

    <script src="js/main.js"></script>
</body>
</html>