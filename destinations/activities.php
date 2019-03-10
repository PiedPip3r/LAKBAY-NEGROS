<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
      header("Location: ../index.php?hackerman!dess");
    }

    function activitiesCard($a, $b, $z){
      $HTML=<<<HTML
      <a class="ui blue card" href="viewActivity.php?id=$z&name=$a">
        <div class="content">
          <div class="header">
            $a
          </div>
        </div>
        <div class="extra center aligned content">
          $b Pesos
        </div>
      </a>
HTML;
      echo $HTML;
    }

    function activitiesQuery(){
      include '../includes/connection.php';
      $email = $_SESSION['Email'];
      $sql = "SELECT * FROM activities WHERE uniqueID = '$email'";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        //$classification = $row['classification'];
        $price = $row['price'];
        //$details = $row['details'];
        //$image = $row['image'];
        //$image_src = "../includes/functions-destinations/uploads/activities/" . $image;
        $id = $row['id'];
        activitiesCard($name, $price, $id);
      }
    }

    function value(){
      include '../includes/connection.php';
      $email = $_SESSION['Email'];
      $sql = "SELECT * FROM activities WHERE uniqueID = '$email'";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Activities and Pricing</title>
    <link rel="stylesheet" href="/mingming/framework/semantic.min.css">
    <script src="/mingming/framework/jquery-3.3.1.min.js"></script>
    <script src="/mingming/framework/semantic.min.js"></script>
  </head>
  <body>
    <?php include 'destinations_navbar.php' ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="six wide column">
          <div class="ui fluid card">
            <?php myProfileSmallQuery() ?>
            <div class="content">
              <div class="ui horizontal statistic">
                <?php value() ?>
                <div class="label">
                  Pricing/Activities Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-activity"><i class="clipboard list icon"></i>Add New Activity</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Activities</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable link cards">
                <?php activitiesQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui mini modal" id="modal-add-activity">
      <i class="close icon"></i>
      <div class="header">
        Activities' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-destinations/add_Activities.php" method="post" enctype="multipart/form-data" id="activities-Form">
          <div class="field">
            <label>Name</label>
            <input type="text" name="name">
          </div>
          <!-- <div class="two fields">
            <div class="field">
              <label>Classification</label>
              <select class="ui dropdown" name="classification" id="classification">
                <option value="">Classify Activity</option>
                <option value="Accomodation">Accomodation</option>
                <option value="Recreational">Recreational</option>
                <option value="Necessity">Necessity</option>
              </select>
            </div>
            <div class="field">
              <label>Price</label>
              <input type="text" name="price">
            </div>
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="3"></textarea>
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image">
          </div> -->
          <div class="field">
            <label>Price</label>
            <div class="ui right labeled input">
              <input type="text" name="price" placeholder="Enter Price..">
              <div class="ui basic label">
                Pesos
              </div>
            </div>
          </div>
          <button class="ui blue fluid button" name="add-Activities">Submit</button>
          <div class="ui error message">

          </div>
        </form>
      </div>
    </div>

    <script>

        $('#activity-dropdown').dropdown();

        $('#add-activity').click(function(){
          $('#modal-add-activity').modal('toggle');
        });

        $('#activities-Form')
        .form({
          fields: {
            name: {
              identifier: 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter the activity name'
                }
              ]
            },
            classification: {
              identifier: 'classification',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please select from classification'
                }
              ]
            },
            price: {
              identifier: 'price',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Price cant be empty. You can put the word FREE! if its free'
                }
              ]
            },
            details: {
              identifier: 'details',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Details cant be empty'
                }
              ]
            },
            image: {
              identifier: 'image',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please put an image'
                }
              ]
            }
          }
        })
      ;

    </script>
  </body>
</html>
