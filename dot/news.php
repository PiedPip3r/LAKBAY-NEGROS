<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
    }

    function newscards($a, $b, $c, $d){
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

    function value(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM news";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

    function news(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM news ORDER BY id DESC";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);

      if ($queryResult > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $name = $row['name'];
          $details = $row['details'];
          $image = $row['image'];
          $image_src = "../includes/functions-dot/uploads/news/" . $image;
          $datePublished = $row['datePublished'];
          newscards($image_src, $name, $datePublished, $details);
        }
      }
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | News</title>
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
                  News Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-news"><i class="newspaper outline icon"></i>Add New News</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">News</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable link cards">
                <?php news() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="news-modal">
      <i class="close icon"></i>
      <div class="header">
        News' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-dot/add_News.php" method="post" enctype="multipart/form-data" id="news-Form">
          <div class="field">
            <label>News Title</label>
            <input type="text" name="name" placeholder="Tourism Week underscores digital transformation in industry’s growth">
          </div>
          <div class="field">
            <label>News Details</label>
            <textarea name="details" rows="8" placeholder="50 to 100 words"></textarea>
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image">
          </div>
          <button class="ui blue fluid button" name="add-News">Add News</button>
          <div class="ui error message">

          </div>
        </form>
      </div>
    </div>

    <script>

        $('#add-news').click(function(){
          $('#news-modal').modal('toggle');
        });

        $('#news-Form')
        .form({
          fields: {
            name: {
              identifier: 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter the news title'
                }
              ]
            },
            details: {
              identifier: 'details',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Details cant be empty'
                },
                {
                  type   : 'minLength[100]',
                  prompt : 'Please enter at least {ruleValue} characters'
                }
              ]
            },
            image: {
              identifier: 'image',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please put an image'
                }
              ]
            }
          }
        })
      ;
    </script>
  </body>
</html>
