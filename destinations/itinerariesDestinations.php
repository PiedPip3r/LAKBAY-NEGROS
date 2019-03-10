<?php

      include '../includes/connection.php';
      include 'functions.php';
      session_start();
      if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
        header("Location: ../index.php?hackerman!dess");
      }

      function value(){
        include '../includes/connection.php';
        $sql = "SELECT * FROM itinerariesdestinations";
        $result = mysqli_query($connection, $sql);
        $queryResult = mysqli_num_rows($result);
        echo "<div class='value'>
                $queryResult
              </div>";
      }

      function destinationsItineraryCard($a, $b, $c, $d, $z, $x){
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
          <div class="extra center aligned content">
            <span><a href="itineraryDatasDestinations.php?id=$z&motherName=$b&days=$c&uniqueID=$x">Details</a></span>
          </div>
        </div>
HTML;
        echo $HTML;
      }

      function destinationsItineraryQuery(){
        include '../includes/connection.php';
        $sql = "SELECT * FROM itinerariesDestinations";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $name = $row['name'];
          $days = $row['days'];
          $details = $row['details'];
          $image = $row['image'];
          $image_src = "../includes/functions-destinations/uploads/itineraries/" . $image;
          $creator = $row['creator'];
          $uniqueID = $row['uniqueID'];
          $id = $row['id'];
          destinationsItineraryCard($image_src, $name, $days, $details, $id, $uniqueID);
        }
      }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Itineraries</title>
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
                  Itineraries Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-destinations-itinerary"><i class="tasks icon"></i>Add New Itinerary</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Destinations Itineraries</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable link cards">
                <?php destinationsItineraryQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="ui small modal" id="modal-destinations-itinerary">
      <i class="close icon"></i>
      <div class="header">
        Itineraries' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-destinations/add_Itineraries.php" enctype="multipart/form-data" method="POST" id="dotItineraries-Form">
          <div class="field">
            <label>Itinerary Name</label>
            <input type="text" name="name">
          </div>
          <div class="field">
            <label>Days</label>
            <select class="" name="days" id="itinerary-days">
              <option value="">Choose Days</option>
              <option value="One Day Itinerary">One Day Itinerary</option>
              <option value="Two Days Itinerary">Two Days Itinerary</option>
              <option value="Three Days Itinerary">Three Days Itinerary</option>
            </select>
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="4"></textarea>
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image">
          </div>
          <button class="ui primary button" name="add-Itinerary">Submit</button>
        </form>
      </div>
    </div>


    <script>

        $('#itinerary-days').dropdown();

        $('#add-destinations-itinerary').click(function(){
          $('#modal-destinations-itinerary').modal('toggle');
        });

    </script>
  </body>
</html>
