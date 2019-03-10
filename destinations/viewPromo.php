<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
      header("Location: ../index.php?hackerman!dess");
    }

    function test(){
      $name = $_GET['name'];
      echo $name;
    }

    function promocard($a, $b, $c, $d, $e, $f){
      $HTML=<<<HTML
      <div class="ui fluid card">
        <div class="image">
          <img src="$a">
        </div>
        <div class="content">
          <div class="header">
            $b
          </div>
          <div class="meta">
            <span><del>$c</del>&nbsp$d</span>
          </div>
          <div class="description">
            $e
          </div>
        </div>
        <div class="extra content">
          <span class="right floated content">Until <i class="green clock icon"></i>$f</span>
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function promo($connection){
      include '../includes/connection.php';
      $getId = $_GET['id'];
      $getName = $_GET['name'];
      $sql = "SELECT * FROM promos WHERE id = '$getId' AND name = '$getName'";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $activity = $row['activity'];
        $price = $row['price'];
        $newPrice = $row['newPrice'];
        $details = $row['details'];
        $dateUntil = $row['dateUntil'];
        $id = $row['id'];
        $image = $row['image'];
        $image_src = "../includes/functions-destinations/uploads/promos/" . $image;
        promocard($image_src, $name, $price, $newPrice, $details, $dateUntil);
    }

    $getName = $_GET['name'];
    $getId = $_GET['id'];
    $sql = "SELECT * FROM promos WHERE name = '$getName' AND id = '$getId'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $activity = $row['activity'];
    $price = $row['price'];
    $newPrice = $row['newPrice'];
    $details = $row['details'];
    $dateUntil = $row['dateUntil'];
    $id = $row['id'];
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/mingming/framework/semantic.min.css">
    <script src="/mingming/framework/jquery-3.3.1.min.js"></script>
    <script src="/mingming/framework/semantic.min.js"></script>
  </head>
  <body>
    <?php include 'destinations_navbar.php' ?>
    <div class="ui container">
      <div class="ui centered grid">
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <a class="section" href="promos.php">Promos</a>
                <span class="divider">/</span>
                <div class="active section"><?php test() ?></div>
              </div>
            </div>
            <div class="ui segment">
              <?php promo($connection) ?>
            </div>
            <div class="ui segment">
              <a href="../includes/functions-destinations/delete_promo.php?id=<?php echo $row['id'] ?>" class="red ui button" onclick='return confirmDelete()'>Delete</a>
              <button class="green ui button" id="edit-promo">Edit</button>
              <button class="green ui button" id="change-picture">Change Picture</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui tiny modal" id="modal-edit-promo">
      <i class="close icon"></i>
      <div class="header">
        Edit Promo
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-destinations/update_promo.php" method="post">
          <input type="text" name="id" value="<?php echo $getId ?>" hidden>
          <div class="field">
            <label>Promo Name</label>
            <input type="text" name="name" value="<?php echo $name ?>" required>
          </div>
          <div class="field">
            <label>Activity</label>
            <input type="text" value="<?php echo $activity ?>" disabled>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Price</label>
              <input type="text" value="<?php echo $price ?>" disabled>
            </div>
            <div class="field">
              <label>New Price</label>
              <input type="text" name="newprice" value="<?php echo $newPrice ?>" required>
            </div>
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="4" required><?php echo $details ?></textarea>
          </div>
          <div class="field">
            <label>Date until</label>
            <input type="date" name="dateuntil" value="<?php echo $dateUntil ?>" required>
          </div>
          <button class="blue ui fluid button" name="update_promo">Update!</button>
        </form>
      </div>
    </div>

    <script>

        $('#edit-promo').click(function(){
          $('#modal-edit-promo').modal('toggle');
        });

    </script>
  </body>
</html>
