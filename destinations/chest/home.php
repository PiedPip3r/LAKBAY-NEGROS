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
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
  </head>
  <body>
    <?php include 'destinations_navbar.php' ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="six wide column">

        </div>
        <div class="ten wide column">
          
        </div>
      </div>
    </div>
  </body>
</html>
