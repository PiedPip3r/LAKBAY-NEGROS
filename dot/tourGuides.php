<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'DOT') {
      header("Location: ../index.php?hackerangpota!");
    }

    function value(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM tourguides";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "<div class='value'>
              $queryResult
            </div>";
    }

    function city(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM cities";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $city = $row['name'];
        echo "<option value='$city'>$city</option>";
      }
    }

    function tourGuidesCard($a, $b, $c, $d, $e){
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
            $c | $d
          </div>
          <div class="description">
            $e
          </div>
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function tourGuidesQuery(){
      include '../includes/connection.php';
      $sql = "SELECT * FROM tourguides";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $image = $row['image'];
        $image_src = "../includes/functions-dot/uploads/tourGuides/" . $image;
        $name = $row['name'];
        $city = $row['city'];
        $occupation = $row['occupation'];
        $details = $row['details'];
        tourGuidesCard($image_src, $name, $city, $occupation, $details);
      }
    }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['Username'] ?> | Tour Guides</title>
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
                  Tour Guide Found
                </div>
              </div><br>
              <button class="ui blue button" id="add-guide"><i class="user icon"></i>Add New Tour Guide</button>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Tour Guides</div>
              </div>
            </div>
            <div class="ui segment">
              <div class="ui two stackable cards">
                <?php tourGuidesQuery() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui small modal" id="modal-guide">
      <i class="close icon"></i>
      <div class="header">
        Tour Guide Form
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-dot/add_TourGuides.php" method="post" enctype="multipart/form-data" id="tourGuides-Form">
          <div class="two fields">
            <div class="field">
              <label>Full Name</label>
              <input type="text" name="name" placeholder="Juan Dela Cruz">
            </div>
            <div class="field">
              <label>Email</label>
              <input type="email" name="email" placeholder="juandelacruz@gmail.com">
            </div>
          </div>
          <div class="two fields">
            <div class="field">
              <label>City/Municipality</label>
              <select class="ui dropdown" id="city" name="city">
                <option value="">Select City/Municipality</option>
                <?php city() ?>
              </select>
            </div>
            <div class="field">
              <label>Occupation</label>
              <input type="text" name="occupation" placeholder="Student">
            </div>
          </div>
          <div class="three fields">
            <div class="field">
              <label>Contact</label>
              <input type="text" name="contact" placeholder="(123)-012345">
            </div>
            <div class="field">
              <label>Cellphone</label>
              <input type="text" name="cellphone" placeholder="09123456789">
            </div>
            <div class="field">
              <label>Facebook</label>
              <input type="text" name="facebook" placeholder="juandelacruz">
            </div>
          </div>
          <div class="field">
            <label>Description</label>
            <textarea name="details" rows="2" placeholder="Tourism student"></textarea>
          </div>
          <div class="field">
            <label>Tour Guide Image</label>
            <input type="file" name="image">
          </div>
          <button class="blue ui button" name="add-TourGuide">Submit</button>
          <div class="ui error message">

          </div>
        </form>
      </div>
    </div>

    <script>

        $('#city').dropdown();

        $('#add-guide').click(function(){
          $('#modal-guide').modal('toggle');
        });

        $('#tourGuides-Form')
        .form({
          fields: {
            name: {
              identifier: 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your full name'
                }
              ]
            },
            email: {
              identifier: 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your email'
                }
              ]
            },
            city: {
              identifier: 'city',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please choose your location'
                }
              ]
            },
            occupation: {
              identifier: 'occupation',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter an occupation'
                }
              ]
            },
            contact: {
              identifier: 'contact',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your contact number'
                },
                {
                  type   : 'integer',
                  prompt : 'Please enter a valid contact number'
                }
              ]
            },
            cellphone: {
              identifier: 'cellphone',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your cellphone number'
                },
                {
                  type   : 'integer',
                  prompt : 'Please enter a valid cellphone number'
                }
              ]
            },
            facebook: {
              identifier: 'facebook',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your facebook username'
                }
              ]
            },
            details: {
              identifier: 'details',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please describe yourself'
                },
                {
                  type   : 'minLength[50]',
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
            },
          }
        })
      ;

    </script>
  </body>
</html>
