<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
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
      <div class="ui three stackable link cards">
        <a href="../home/destinations.php" class="card">
          <div class="image">
            <img src="../includes/images/home-destinations.jpg">
          </div>
          <div class="content">
            <div class="description">
              Discover places near you where you can chill and grill.
            </div>
          </div>
          <div class="extra content">
            <span class="right floated">
              Clicked the card for more info
            </span>
            <span>
              <i class="red camera retro icon"></i>
              <?php aye('destinations', 'Destinations') ?>
            </span>
          </div>
        </a>
        <a href="home/negrosmap.php" class="card">
          <div class="image">
            <img src="../includes/images/home-maps.jpg">
          </div>
          <div class="content">
            <div class="description">
              Don't want to travel alone? Let these people give you knowledge and guide you in your favorite destination.
            </div>
          </div>
          <div class="extra content">
            <span class="right floated">
              Clicked the card for more info
            </span>
            <span>
              <i class="blue user icon"></i>
              <?php aye('guides', 'Guides') ?>
            </span>
          </div>
        </a>
        <a href="home/itineraries.php" class="card">
          <div class="image">
            <img src="../includes/images/home-itineraries.jpg">
          </div>
          <div class="content">
            <div class="description">
              Eat. Sleep. Travel. An activity sheet to spend your day well, you can even have tours from DOT.
            </div>
          </div>
          <div class="extra content">
            <span class="right floated">
              Clicked the card for more info
            </span>
            <span>
              <i class="green tasks icon"></i>
              <?php aye('itineraries', 'Itineraries') ?>
            </span>
          </div>
        </a>
        <a href="home/promos.php" class="card">
          <div class="image">
            <img src="../includes/images/home-promos.jpg">
          </div>
          <div class="content">
            <div class="description">
              Rainbows aren't showing off everyday. Save up to 50% from your favorite destinatio promos.
            </div>
          </div>
          <div class="extra content">
            <span class="right floated">
              Clicked the card for more info
            </span>
            <span>
              <i class="gift teal icon"></i>
              <?php aye('promos', 'Promos') ?>
            </span>
          </div>
        </a>
        <a href="home/news.php" class="card">
          <div class="image">
            <img src="../includes/images/home-news.jpg">
          </div>
          <div class="content">
            <div class="description">
              Know what's happening. Read news about festivals and activities in Negros Occidental.
            </div>
          </div>
          <div class="extra content">
            <span class="right floated">
              Clicked the card for more info
            </span>
            <span>
              <i class="orange newspaper outline icon"></i>
              <?php aye('news', 'News') ?>
            </span>
          </div>
        </a>
        <a href="home/blogs.php" class="card">
          <div class="image">
            <img src="../includes/images/home-blogs.jpg">
          </div>
          <div class="content">
            <div class="description">
              Read blogs from your favorite traveller
            </div>
          </div>
          <div class="extra content">
            <span class="right floated">
              Clicked the card for more info
            </span>
            <span>
              <i class="pink meh icon"></i>
              <?php aye('news', 'News') ?>
            </span>
          </div>
        </a>
      </div>
    </div>
  </body>
</html>
