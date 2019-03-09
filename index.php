<?php

  session_start();

  function aye($a, $b){
    include 'includes/connection.php';
    $sql = "SELECT * FROM $a";
    $result = mysqli_query($connection, $sql);
    $queryResult = mysqli_num_rows($result);
    echo $queryResult . " $b";
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LAKBAY NEGROS!</title>
    <link rel="stylesheet" href="/mingming/framework/semantic.min.css">
    <script src="/mingming/framework/jquery-3.3.1.min.js"></script>
    <script src="/mingming/framework/semantic.min.js"></script>
  </head>
  <body>
    <?php

        if (!isset($_SESSION['Email'])) {
          echo "<div class='ui menu'>
                  <div class='ui container'>
                    <a class='header item' href='index.php'>
                      <i class='tree green icon'></i>Lakbay: A travel tool!
                    </a>
                    <a href='https://www.facebook.com/negrosoccidentaltourismcenter/' target='_blank' class='item'>
                      <i class='facebook blue icon'></i>
                    </a>
                    <div class='right item'>
                      <button class='ui teal button' id='show-modal'>Login</button>
                    </div>
                  </div>
                </div>";
        } else {
          $username = $_SESSION['Username'];
          echo "<div class='ui large icon menu'>
                  <div class='ui container'>
                    <a class='header item' href='index.php'>
                      <i class='home icon'></i>&nbsp
                      Home
                    </a>
                    <div class='right menu'>
                      <div class='ui dropdown item' id='login-header'>
                      $username <i class='dropdown icon'></i>
                      <div class='menu'>
                        <a class='item' href='choose.php'>Manage Account</a>
                        <a class='item' href='includes/do_logout.php'>Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";
        }

     ?>
    <div class="ui container">
      <div class="ui three stackable link cards">
        <a href="home/destinations.php" class="card">
          <div class="image">
            <img src="includes/images/home-destinations.jpg">
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
            <img src="includes/images/home-maps.jpg">
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
              <i class="map blue icon"></i>
              32 Places
            </span>
          </div>
        </a>
        <a href="home/dotItineraries.php" class="card">
          <div class="image">
            <img src="includes/images/home-itineraries.jpg">
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
              <?php aye('itinerariesdot', 'Itineraries') ?>
            </span>
          </div>
        </a>
        <a href="home/promos.php" class="card">
          <div class="image">
            <img src="includes/images/home-promos.jpg">
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
            <img src="includes/images/home-news.jpg">
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
            <img src="includes/images/home-blogs.jpg">
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

    <div class="ui tiny modal" id="login-modal">
      <i class="close icon"></i>
      <div class="content">
        <h2 class="ui teal header">
          Log-in to your account
        </h2>
        <form class="ui form" action="includes/logintest.php" method="POST">
          <div class="field">
            <div class="ui fluid left icon input">
              <input type="email" placeholder="Email" name="username" required>
              <i class="user icon"></i>
            </div>
          </div>
          <div class="field">
            <div class="ui fluid left icon input">
              <input type="password" placeholder="Password" name="password" required>
              <i class="lock icon"></i>
            </div>
          </div>
          <button class="ui fluid large teal submit button" name="login">Login</button>
        </form>
        <div class="ui success message">
          No account?
          <a href="signup.php">Sign up</a>
        </div>
      </div>
    </div>

    <script>

        $('#show-modal').click(function(){
          $('#login-modal').modal('toggle');
        });

        $('#login-header').dropdown();

    </script>
  </body>
</html>
