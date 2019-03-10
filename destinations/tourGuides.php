<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
      header("Location: ../index.php?hackerman!dess");
    }

    function tourGuidesCard(){
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
      </div>
HTML;
      echo $HTML;
    }

    function tourGuidesQuery(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM tourguides WHERE ";
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Tour Guides</title>
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
                <?php //value($connection) ?>
                <div class="label">
                  Pricing/Activities Found
                </div>
              </div><br>
              <!-- <button class="ui blue button" id="add-activity"><i class="clipboard list icon"></i>Add New Activity</button> -->
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Tour Guides</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable link cards">
                <?php //activities($connection) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui tiny modal" id="modal-add-activity">
      <i class="close icon"></i>
      <div class="header">
        Add Activity
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-destinations/add_activities.php" method="post" enctype="multipart/form-data">
          <div class="field">
            <label>Name</label>
            <input type="text" name="name" required>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Classification</label>
              <select class="ui dropdown" name="classification" required>
                <option value="Accomodation">Accomodation</option>
                <option value="Recreational">Recreational</option>
              </select>
            </div>
            <div class="field">
              <label>Price</label>
              <input type="number" name="price" required>
            </div>
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="4" required></textarea>
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image" required>
          </div>
          <button class="ui blue fluid button" name="add_activities">Submit</button>
        </form>
      </div>
    </div>

    <script>

        $('#add-activity').click(function(){
          $('#modal-add-activity').modal('toggle');
        });

    </script>
  </body>
</html>
