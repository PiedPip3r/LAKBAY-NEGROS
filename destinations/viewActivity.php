<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
      header("Location: ../index.php?hackerman!dess");
    }

    function view($a, $e){
      $HTML=<<<HTML
      <div class="ui fluid card">
        <!-- <div class="image">
          <img src="$a">
        </div> -->
        <div class="content">
          <div class="header">
            $a
          </div>
          <!-- <div class="meta">

          </div> -->
          <!-- <div class="description">

          </div> -->
        </div>
        <div class="extra centered content">
          $e Pesos
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function activity(){
      include '../includes/connection.php';
      $id = $_GET['id'];
      $sql = "SELECT * FROM activities WHERE id = '$id'";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_array($result);
      $name = $row['name'];
      //$classification = $row['classification'];
      $price = $row['price'];
      //$details = $row['details'];
      //$image = $row['image'];
      //$image_src = "../includes/functions-destinations/uploads/activities/" . $image;
      view($name, $price);
    }

    function test(){
      $name = $_GET['name'];
      echo $name;
    }

    $getName = $_GET['name'];
    $getId = $_GET['id'];
    $sql = "SELECT * FROM activities WHERE name = '$getName' AND id = '$getId'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    //$details = $row['details'];
    $price = $row['price'];
    $id = $row['id'];
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | <?php echo $_GET['name'] ?></title>
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
                <a class="section" href="activities.php">Activities</a>
                <span class="divider">/</span>
                <div class="active section"><?php test() ?></div>
              </div>
            </div>
            <div class="ui segment">
              <?php activity() ?>
            </div>
            <div class="ui segment">
              <a href="../includes/functions-destinations/delete_Activity.php?id=<?php echo $row['id'] ?>" class="red ui button" onclick='return confirmDelete()'>Delete</a>
              <button class="green ui button" id="edit-activity">Edit</button>
              <!-- <button class="green ui button" id="change-picture">Change Picture</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui tiny modal" id="modal-edit-activity">
      <i class="close icon"></i>
      <div class="header">
        Edit Details
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-destinations/update_activity.php" method="post">
          <input type="text" name="id" value="<?php echo $getId ?>" hidden>
          <div class="field">
            <label>Activity Name</label>
            <input type="text" name="name" value="<?php echo $name ?>">
          </div>
          <div class="field">
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $price ?>">
          </div>
          <button class="blue ui fluid button" name="update_activity">Update!</button>
        </form>
      </div>
    </div>

    <div class="ui mini modal" id="modal-change-picture">
      <i class="close icon"></i>
      <div class="header">
        Change Picture
      </div>
      <div class="content">
        <form class="ui form" action="index.html" method="post">
          <input type="name" name="" value="<?php echo $row['image'] ?>">
        </form>
      </div>
    </div>

    <script>

        $('#edit-activity').click(function(){
          $('#modal-edit-activity').modal('toggle');
        });

        $('#change-picture').click(function(){
          $('#modal-change-picture').modal('toggle');
        });



    </script>
  </body>
</html>
