<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
    }

    function value(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM touroperators";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

    function tourCard($a, $b, $c, $d){
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
            <a href="$c" target="_blank">$c</a>
          </div>
          <div class="description">
            $d
          </div>
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function tourOperatorsQuery(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM touroperators ORDER BY id DESC";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      if ($queryResult > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $name = $row['tourname'];
          $link = $row['link'];
          $details = $row['description'];
          $image = $row['image'];
          $image_src = "../includes/functions-dot/uploads/tour-operators/" . $image;
          tourCard($image_src, $name, $link, $details);
        }
      }
    }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Tour Operators</title>
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
                  Tour Operators Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-touroperator"><i class="handshake icon"></i>Add New Tour Operator</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Tour Operators</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable link cards">
                <?php tourOperatorsQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="modal-operator">
      <i class="close icon"></i>
      <div class="header">
        Tour Operators' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-dot/add_TourOperators.php" method="post" enctype="multipart/form-data" id="tourOperators-Form">
          <div class="field">
            <label>Tour Operator's Name</label>
            <input type="text" name="name" placeholder="Negros Tour Company">
          </div>
          <div class="field">
            <label>Absolute URL of their website</label>
            <input type="text" name="url" placeholder="www.negrostourcompany.com">
          </div>
          <div class="field">
            <label>Short Description</label>
            <textarea name="details" rows="5" placeholder="20 to 30 words only"></textarea>
          </div>
          <div class="field">
            <label>Tour Operators Image</label>
            <input type="file" name="image">
          </div>
          <button class="ui blue fluid button" name="add-TourOperators">Submit</button>
          <div class="ui error message">

          </div>
        </form>
      </div>
    </div>

    <script>

        $('#add-touroperator').click(function(){
          $('#modal-operator').modal('toggle');
        });

        $('#tourOperators-Form')
        .form({
          fields: {
            name: {
              identifier: 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter the name of the tour operator'
                }
              ]
            },
            url: {
              identifier: 'url',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'URL cant be empty'
                },
                {
                  type   : 'url',
                  prompt : 'Please enter a valid URL'
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
