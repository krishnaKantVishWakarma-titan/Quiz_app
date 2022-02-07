<?php 

include "connection.php";

$id = $_POST['id'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM login WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM questions WHERE id=".$id;
    
    mysqli_query($conn,$query);
    echo 1;
    exit;
  }
}

echo 0;
exit;

?>