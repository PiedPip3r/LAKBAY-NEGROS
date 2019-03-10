<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
    }

    function type(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM type";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $type = $row['type'];
        echo "<option value='$type'>$type</option>";
      }
    }

    function city(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM cities";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $city = $row['name'];
        echo "<option value='$city'>$city</option>";
      }
    }

    function value(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM destinations";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

    function destinationcard($a, $b, $c, $d){
      $HTML=<<<HTML
      <div class="card">
        <div class="image">
          <img src="$a">
        </div>
        <div class="content">
          <div class="header">
            $b
          </div>
          <div class="meta">
            $c
          </div>
          <div class="description">
            $d
          </div>
        </div>
        <div class="extra content">
          <span class="right floated">
            <a href="#">Details</a>
          </span>
          <i class="like icon"></i>
          0 Hearts
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function destination(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM destinations ORDER BY id DESC";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);

      if ($queryResult > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $image = $row['image'];
          $image_src = "../includes/functions-dot/uploads/destinations/" . $image;
          $name = $row['name'];
          $city = $row['city'];
          $details = $row['details'];
          destinationcard($image_src, $name, $city, $details);
        }
      }
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Destinations</title>
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
                <?php value() ?>
                <div class="label">
                  Destinations Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-destination"><i class="paper plane outline icon"></i>Add New Destination</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Destinations</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable cards">
                <?php destination() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="add-modal">
      <i class="close icon"></i>
      <div class="header">
        Destination's Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-dot/add_Destinations.php" method="post" enctype="multipart/form-data" id="destinations-Form">
          <div class="two fields">
            <div class="field">
              <label>Name</label>
              <input type="text" name="name" placeholder="Mambukal Resort">
            </div>
            <div class="field">
              <label>Classification</label>
              <select class="ui dropdown" id="type" name="classification">
                <option value="">Classification</option>
                <?php type() ?>
              </select>
            </div>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Address</label>
              <input type="text" name="address" placeholder="Brgy. Minoyan">
            </div>
            <div class="field">
              <label>City/Municipality</label>
              <select class="ui dropdown" id="city" name="city">
                <option value="">Choose Location</option>
                <?php city() ?>
              </select>
            </div>
          </div>
          <div class="field">
            <label>Email</label>
            <input type="email" name="email" placeholder="mambukalresort@gmail.com">
          </div>
          <!-- Invisible -->
          <div class="field">
            <input type="text" name="details" value="This destination is too lazy to put details about them :(" hidden>
          </div>
          <div class="field">
            <label>Destinations' Image</label>
            <input type="file" name="image" >
          </div>
          <button class="ui primary button" name="add-Destinations">Submit</button>
          <div class="ui error message">

          </div>
        </form>
      </div>
    </div>

    <script>

        $('#type').dropdown();

        $('#city').dropdown();

        $('#add-destination').click(function(){
          $('#add-modal').modal('toggle');
        });

        $('#destinations-Form')
        .form({
          fields: {
            name: {
              identifier: 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter the destinations name'
                }
              ]
            },
            classification: {
              identifier: 'classification',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please choose the type of destination'
                }
              ]
            },
            address: {
              identifier: 'address',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter the destinations address'
                }
              ]
            },
            city: {
              identifier: 'city',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please choose location'
                }
              ]
            },
            email: {
              identifier: 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your email'
                }
              ]
            },
            image: {
              identifier: 'image',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter an image'
                }
              ]
            }
          }
        })
        ;




    </script>
  </body>
</html>
