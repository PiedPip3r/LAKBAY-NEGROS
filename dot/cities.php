<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
    }

    function value($connection){
      $sql = "SELECT * FROM cities";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

    function citycard($a, $b, $c){
      $HTML=<<<HTML
      <div class="card">
        <div class="image">
          <img src="$a">
        </div>
        <div class="content">
          <div class="header">
            $b
          </div>
          <div class="description">
            $c
          </div>
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function city($connection){
      $sql = "SELECT * FROM cities";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $city = $row['name'];
        $details = $row['details'];
        $image = $row['image'];
        $image_src = "../includes/functions-dot/uploads/cities/" . $image;
        citycard($image_src, $city, $details);
      }
    }



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Cities and Municipalities</title>
    <link rel="stylesheet" href="/mingming/framework/semantic.min.css">
    <script src="/mingming/framework/jquery-3.3.1.min.js"></script>
    <script src="/mingming/framework/semantic.min.js"></script>
  </head>
  <body>
    <?php include 'dot_navbar.php' ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="six wide column">
          <div class="ui fluid card">
            <?php smallprofile() ?>
            <div class="content">
              <div class="ui horizontal statistic">
                <?php value($connection) ?>
                <div class="label">
                  Cities & Municipalities Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-cities"><i class="tree icon"></i>Add New Destination</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Cities & Municipalities</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable link cards">
                <?php city($connection) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="modal-city">
      <i class="close icon"></i>
      <div class="header">
        City/Municipalities' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-dot/add_cities.php" enctype="multipart/form-data" method="POST">
          <div class="field">
            <label>City/Municaplity Name</label>
            <input type="text" name="city">
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="4"></textarea>
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image">
          </div>
          <button class="ui primary button" name="add-city">Submit</button>
        </form>
      </div>
    </div>

    <script>

        $('#add-cities').click(function(){
          $('#modal-city').modal('toggle');
        });

    </script>
  </body>
</html>
