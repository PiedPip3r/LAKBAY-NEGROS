<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
      header("Location: ../index.php?hackerman!dess");
    }

    function smallcards($a, $b, $c, $d){
      $HTML=<<<HTML
      <a class="ui card" href="$a.php">
        <div class="content">
          <div class="center aligned author">
            <i class="$b massive $c icon"></i>
          </div><br>
          <div class="center aligned header">
            $d
          </div>
        </div>
      </a>
HTML;
      echo $HTML;
    }


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Account</title>
    <link rel="stylesheet" href="/mingming/framework/semantic.min.css">
    <script src="/mingming/framework/jquery-3.3.1.min.js"></script>
    <script src="/mingming/framework/semantic.min.js"></script>
  </head>
  <body>
    <?php include 'destinations_navbar.php' ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="six wide column">
          <?php myProfileQuery() ?>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui header">
                Your Profile
              </div>
            </div>
            <div class="ui segment">
              <div class="ui three stackable link cards">
                <?php smallcards('myProfile', 'blue', 'user circle outline', 'My Profile') ?>
                <?php smallcards('tourGuides', 'violet', 'users', 'Tour Guides') ?>
                <?php smallcards('activities', 'green', 'clipboard list', 'Pricing/Activities') ?>
                <?php smallcards('promos', 'pink', 'gift', 'Promos') ?>
                <?php smallcards('itinerariesDestinations', 'olive', 'tasks', 'Itineraries') ?>
                <?php smallcards('statistics', 'red', 'chart bar outline', 'Statistics') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
