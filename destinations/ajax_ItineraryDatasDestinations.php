<?php

  include '../includes/connection.php';
  session_start();
  $email = $_SESSION['Email'];

  if (isset($_POST['activities'])) {
    if ($_POST['activities'] !='') {
      $sql = "SELECT * FROM activities WHERE name = '".$_POST['activities']."' AND uniqueID = '$email'";
    }
  } else {
    $sql = "SELECT * FROM activities";
  }
  $result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $price = $row['price'];
    echo $price;
  }




 ?>
