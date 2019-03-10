<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
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
    <title><?php echo $_SESSION['Username'] ?> | Profile</title>
    <link rel="stylesheet" href="/mingming/framework/semantic.min.css">
    <script src="/mingming/framework/jquery-3.3.1.min.js"></script>
    <script src="/mingming/framework/semantic.min.js"></script>
  </head>
  <body>
    <?php include 'dot_navbar.php' ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="six wide column">
          <?php profile() ?>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui header">
                Your Profile
              </div>
            </div>
            <div class="ui segment">
              <div class="ui three stackable cards">
                <?php smallcards('destinations', 'green', 'paper plane outline', 'Destinations') ?>
                <?php smallcards('news', 'grey', 'newspaper outline', 'News') ?>
                <?php smallcards('tourOperators', 'brown', 'handshake', 'Tour Operators') ?>
                <?php smallcards('cities', 'olive', 'building outline', 'Cities') ?>
                <?php smallcards('blogs', 'yellow', 'file alternate outline', 'Blogs') ?>
                <?php smallcards('tourGuides', 'purple', 'users', 'Guides') ?>
                <?php smallcards('itinerariesDOT', 'teal', 'list ol', 'DOT Itineraries') ?>
                <?php smallcards('destinations-itineraries', 'olive', 'tasks', 'Itineraries') ?>
                <?php smallcards('statistics', 'red', 'chart bar outline', 'Statistics') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
