<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
    }

    function value(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM blogs";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

    function blogsCard($a, $b, $c, $d){
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

    function blogsQuery(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM blogs ORDER BY id DESC";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $details = $row['details'];
        $image = $row['image'];
        $image_src = "../includes/functions-dot/uploads/blogs/" . $image;
        $datePublished = $row['datePublished'];
        blogsCard($image_src, $name, $datePublished, $details);
      }
    }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Blogs</title>
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
                  Blogs Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-blog"><i class="file alternate outline icon"></i>Add New Blogs</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Blogs</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable link cards">
                <?php blogsQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="modal-blog">
      <i class="close icon"></i>
      <div class="header">
        Blogs' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-dot/add_Blogs.php" enctype="multipart/form-data" method="POST" id="blogs-Form">
          <div class="field">
            <label>Blog Title</label>
            <input type="text" name="name">
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="4"></textarea>
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image">
          </div>
          <button class="ui primary button" name="add-Blogs">Submit</button>
          <div class="ui error message">

          </div>
        </form>
      </div>
    </div>

    <script>

        $('#add-blog').click(function(){
          $('#modal-blog').modal('toggle')
        });

        $('#blogs-Form')
        .form({
          fields: {
            name: {
              identifier: 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter the blogs title'
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
