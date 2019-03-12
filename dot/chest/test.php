<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if ($_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerman!");
    }

    $days = $_GET['days'];

    function value(){
      include '../includes/connection.php';
      $motherName = $_GET['motherName'];
      $sql = "SELECT * FROM itinerarydatasdot WHERE motherName = '$motherName'";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

    function itineraryDatasDOTQuery(){
      include '../includes/connection.php';
      $motherName = $_GET['motherName'];
      $sql = "SELECT * FROM itinerarydatasdot WHERE motherName = '$motherName'";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $day = $row['day'];
        $time = $row['estimatedTime'];
        $details = $row['details'];
        $image = $row['image'];
        $image_src = "../includes/functions-dot/uploads/itineraryDatas/" . $image;
        echo "<div class='card'>
                <div class='image'>
                  <img src='$image_src'>
                </div>
                <div class='content'>
                  <div class='header'>
                    $name
                  </div>
                  <div class='meta'>
                    $day | $time
                  </div>
                  <div class='description'>
                    $details
                  </div>
                </div>
              </div>";
      }
    }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Itinerary Datas</title>
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
                  DOT Itineraries found
                </div>
              </div><br>
              <button class="ui blue button" id="add-details"><i class="tasks icon"></i>Add New Itinerary</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <a class="section" href="itinerariesDOT.php">DOT Itineraries</a>
                <span class="divider">/</span>
                <div class="active section">Itinerary Data</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable cards">
                <?php itineraryDatasDOTQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="modal-details">
      <i class="close icon"></i>
      <div class="header">
        Itinerary Details' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-dot/test.php" method="post" enctype="multipart/form-data">
          <input type="text" name="motherName" value="<?php echo $_GET['motherName'] ?>" hidden>
          <input type="text" name="creator" value="<?php echo $_SESSION['Username'] ?>" hidden>
          <input type="text" name="uniqueID" value="<?php echo $_SESSION['Email'] ?>" hidden>
          <div class="field">
            <label>Name</label>
            <input type="text" name="name">
          </div>
          <div class="two fields">
            <div class="field">
              <label>Day</label>
              <select name="days" id="days">
                <option value="">Choose days</option>
                <?php

                    if ($days == 'One Day Itinerary') {
                      echo "<option value='Day One'>Day One</option>";
                    } elseif ($days == 'Two Days Itinerary') {
                      echo "<option value='Day One'>Day One</option>
                            <option value='Day Two'>Day Two</option>";
                    } elseif ($days == 'Three Days Itinerary') {
                      echo "<option value='Day One'>Day One</option>
                            <option value='Day Two'>Day Two</option>
                            <option value='Day Three'>Day Three</option>";
                    }

                 ?>
              </select>
            </div>
            <div class="field">
              <label>Estimated Time</label>
              <input type="text" name="time" value="">
            </div>
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="3"></textarea>
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image" value="">
          </div>
          <button class="blue ui fluid button" name="add-ItineraryDatas">Add Activity</button>
        </form>
      </div>
    </div>

    <script>

        $('#days').dropdown();

        $('#add-details').click(function(){
          $('#modal-details').modal('toggle');
        });

    </script>
  </body>
</html>
