<?php

      include '../includes/connection.php';
      include 'functions.php';
      session_start();
      if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
        header("Location: ../index.php?hackerangpota!");
      }

      function statistics($data, $icon, $label){
        include '../includes/connection.php';
        $sql = "SELECT * FROM $data";
        $result = mysqli_query($connection, $sql);
        $queryResult = mysqli_num_rows($result);
        echo "<div class='blue statistic'>
                <div class='value'>
                  <i class='$icon icon'></i>
                  $queryResult
                </div>
                <div class='label'>
                  $label
                </div>
              </div>";
      }

      function statisticshorizontal($data, $label){
        include '../includes/connection.php';
        $sql = "SELECT * FROM $data";
        $result = mysqli_query($connection, $sql);
        $queryResult = mysqli_num_rows($result);
        echo "<div class='blue statistic'>
                <div class='value'>
                  $queryResult
                </div>
                <div class='label'>
                  $label
                </div>
              </div>";
      }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Statistics</title>
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
                <div class="value">

                </div>
                <div class="label">
                  Actions
                </div>
              </div><br>
              <button class="ui blue button" id="add-news"><i class="print icon"></i>Print Records</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Statistics</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui four statistics">
                <?php statistics('destinations', 'paper plane outline', 'Destinations') ?>
                <?php statistics('promos', 'gift', 'Promos') ?>
                <?php statistics('travelers', 'street view', 'Travelers') ?>
                <?php statistics('tourguides', 'users', 'Tour Guides') ?>
              </div>
              <div class="ui divider">

              </div>
              <div class="ui three statistics">
                <?php statistics('news', 'newspaper outline', 'News') ?>
                <?php statistics('cities', 'building outline', 'Cities/Municipalities') ?>
                <?php statistics('blogs', 'file alternate outline', 'Blogs') ?>
              </div>
              <div class="ui divider">

              </div>
              <div class="ui three statistics">
                <?php statisticshorizontal('itinerariesdestinations', 'Destinations Itineraries') ?>
                <?php statisticshorizontal('itinerariesdot', 'DOT Itineraries') ?>
                <?php statistics('touroperators', 'handshake', 'Tour Operators') ?>
              </div>
              <div class="ui divider">

              </div>
              <div class="ui one statistics">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
