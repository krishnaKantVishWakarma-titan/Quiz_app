<?php 

    include 'UserSession.php';
    include 'connection.php';

    // calculating answer's
    $cat_value = $_POST['cat_id'];
    $data = $_POST;
    $ans = implode("",$data);
    $right=0;
    $wrong=0;
    $notattempt=0;
    $showAns = mysqli_query($conn,"select id,ans from questions where cat_id='$cat_value'");
    while($qust = mysqli_fetch_assoc($showAns)){
        if($qust['ans'] == $_POST[$qust['id']]){
            $right++;
        }
        elseif($_POST[$qust['id']] == "not_attempt"){
            $notattempt++;
        }
        else{
            $wrong++;
        }
    }   
    $scores = 4*$right;

    // insert result data
    $qry="INSERT INTO `score`(`user_name`, `category_name`, `score`) VALUES ('$userName','$cat_value','$scores')";
    mysqli_query($conn,$qry);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Answer's</title>
    <!-- CSS file's -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/ans.css">
    <link rel="shortcut icon" href="img/fav_icon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h3>Answer's ... <a href="logout.php">LogOut</a></h3>
        <div class="main-ans">
            <div class="ans">
                <h3><center>Answer's</center></h3><br>
                <p><span style="color: green;">Right : </span> <?php echo $right ; ?></p>
                <p><span style="color: Red;">Wrong :</span> <?php echo $wrong ; ?></p>
                <p><span style="color: blueviolet;">Not Attempt : </span> <?php echo $notattempt ; ?></p>
                <h4><center>Score : <?php echo $scores ; ?> points</center></h4>
                <center><a href="userWelcome.php">Home</a></center>
            </div>
        </div>
    </header>

    <script src="js/main.js"></script>
</body>
</html>