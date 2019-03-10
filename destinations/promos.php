<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
      header("Location: ../index.php?hackerman!dess");
    }

    function activity(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM activities WHERE uniqueID = '".$_SESSION['Email']."'";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);

      if ($queryResult > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $activity = $row['name'];
          echo "<option value='$activity'>$activity</option>";
        }
      } else {
        echo "<option>Way Ka Data</option>";
      }
    }

    function price(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM activities WHERE uniqueID = '".$_SESSION['Email']."'";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $price = $row['price'];
        echo "<option value='$price'>$price</option>";
      }
    }

    function promoCards($a, $b, $c, $d, $e, $f, $z){
      $HTML=<<<HTML
      <a class="ui card" href="viewPromo.php?id=$z&name=$b">
        <div class="image">
          <img src="$a">
        </div>
        <div class="content">
          <div class="header">
            $b
          </div>
          <div class="meta">
            <span><del>$c</del>&nbsp$d</span>
          </div>
          <div class="description">
            $e
          </div>
        </div>
        <div class="extra content">
          <span class="right floated content">Until <i class="green clock icon"></i>$f</span>
        </div>
      </a>
HTML;
      echo $HTML;
    }

    function promoQuery(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM promos WHERE uniqueID = '".$_SESSION['Email']."'";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $activity = $row['activity'];
        $price = $row['price'];
        $newPrice = $row['newPrice'];
        $details = $row['details'];
        $dateUntil = $row['dateUntil'];
        $id = $row['id'];
        $image = $row['image'];
        $image_src = "../includes/functions-destinations/uploads/promos/" . $image;
        promoCards($image_src, $name, $price, $newPrice, $details, $dateUntil, $id);
      }
    }

    function value(){
      include '../includes/connection.php';
      $email = $_SESSION['Email'];
      $sql = "SELECT * FROM promos WHERE uniqueID = '$email'";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Promos</title>
    <link rel="stylesheet" href="/mingming/framework/semantic.min.css">
    <script src="/mingming/framework/jquery-3.3.1.min.js"></script>
    <script src="/mingming/framework/semantic.min.js"></script>
  </head>
  <body>
    <?php include 'destinations_navbar.php' ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="six wide column">
          <div class="ui fluid card">
            <?php myProfileSmallQuery() ?>
            <div class="content">
              <div class="ui horizontal statistic">
                <?php value() ?>
                <div class="label">
                  Promos Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-promo"><i class="gift icon"></i>Add New Promo</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Promos</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable cards">
                <?php promoQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="modal-promo">
      <i class="close icon"></i>
      <div class="header">
        Promos' Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-destinations/add_Promos.php" method="post" enctype="multipart/form-data">
          <div class="field">
            <label>Name</label>
            <input type="text" name="name">
          </div>
          <div class="two fields">
            <div class="field">
              <label>Activity</label>
              <select class="ui dropdown" name="activity" id="activity">
                <option value="">Choose an activity</option>
                <?php activity() ?>
              </select>
            </div>
            <div class="field">
              <label>Price</label>
              <input type="text" name="price" id="result" readonly>
            </div>
          </div>
          <div class="field">
            <label>New Price</label>
            <input type="text" name="newPrice">
          </div>
          <div class="field">
            <label>Details</label>
            <textarea name="details" rows="2"></textarea>
          </div>
          <div class="field">
            <label>Date Until</label>
            <input type="date" name="dateUntil">
          </div>
          <div class="field">
            <label>Image</label>
            <input type="file" name="image">
          </div>
          <button class="ui blue fluid button" name="add-Promos">Submit</button>
        </form>
      </div>
    </div>

    <script>

        $('#activity').dropdown();

        $('#add-promo').click(function(){
          $('#modal-promo').modal('toggle');
        });

        $(document).ready(function(){
          $('#activity').change(function(){

            var activity = $(this).val();

            $.ajax({
              url:"ajax_Promos.php",
              method:"POST",
              data:{activity:activity},
              success:function(data){
                $('#result').val(data);
              }
            })
          })
        });

    </script>
  </body>
</html>
