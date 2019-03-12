<?php

      include '../includes/connection.php';
      include 'functions.php';
      session_start();
      if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
        header("Location: ../index.php?hackerangpota!");
      }

      function value(){
        include '../includes/connection.php';
        $sql = "SELECT * FROM itineraries";
        $result = mysqli_query($connection, $sql);
        $queryResult = mysqli_num_rows($result);
        echo "<div class='value'>
                $queryResult
              </div>";
      }

      function itineraryCard($a, $b, $c, $d){
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

      function itinerariesQuery(){
        include '../includes/connection.php';
        $sql = "SELECT * FROM itineraries";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $name = $row['name'];
          $details = $row['details'];
          $image = $row['image'];
          $image_src = "../includes/functions-destinations/uploads/itinerary/" . $image;
          $creator = $row['creator'];
          itineraryCard($image_src, $name, $creator, $details);
        }
      }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
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
                  Destinations Itineraries Found
                </div>
              </div>
              <div class="ui green message">
                <i class="exclamation icon"></i>
                You are viewing the destinations itineraries
              </div>
            </div>
            <div class="extra content">
              <a href="travelers-itineraries.php" class="">View Travelers Itineraries</a>
              <a href="tourguides-itineraries.php" class="right floated">View TourGuides Itineraries</a>
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
                <?php itinerariesQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
