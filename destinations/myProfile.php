<?php

    include '../includes/connection.php';
    include 'functions.php';
    session_start();
    if (!isset($_SESSION['Username']) || $_SESSION['Usertype'] !== 'destination') {
      header("Location: ../index.php?hackerman!dess");
    }

    // $sql = "SELECT * FROM users WHERE uniqueID = '".$_SESSION['Email']."'";
    // $result = mysqli_query($connection, $sql);
    // while ($row = mysqli_fetch_array($result)) {
    //   $hashPassword = $row['userPass'];
    //   $password = password_verify('$hashPassword', )
    //   echo $hashPassword;
    // }


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
    <?php include 'destinations_navbar.php' ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="six wide column">
          <div class="ui fluid card">
            <?php myProfileQuery() ?>
          </div>
          <div class="ui fluid card">
            <div class="content">
              <div class="header">
                Actions
              </div>
              <div class="description">
                <button class="blue ui button" id="change-password">Change Password</button>
              </div>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="ui segments">
            <div class="ui secondary segment">
              <div class="ui breadcrumb">
                <a class="section" href="profile.php">Profile</a>
                <span class="divider">/</span>
                <div class="active section">Your Destination</div>
              </div>
            </div>
            <div class="ui segment">
              <?php

              $email = $_SESSION['Email'];
              $sql = "SELECT * FROM destinations WHERE uniqueID = '$email'";
              $result = mysqli_query($connection, $sql);
              $row = mysqli_fetch_array($result);
                $name = $row['name'];
                $classification = $row['classification'];
                $address = $row['address'];
                $city = $row['city'];
                $contact = $row['contact'];
                $cellphone = $row['cellphone'];
                $telefax = $row['telefax'];
                $email = $row['email'];
                $facebook = $row['facebook'];
                $website = $row['website'];
                $details = $row['details'];
                $id = $row['id'];

               ?>
              <form class="ui form" action="../includes/functions-destinations/update_Destinations.php" method="post">
                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <div class="field">
                  <label>Destination's Name</label>
                  <input type="text" value="<?php echo $name ?>" disabled>
                </div>
                <div class="three fields">
                  <div class="field">
                    <label>Classification</label>
                    <input type="text" value="<?php echo $classification ?>" disabled>
                  </div>
                  <div class="field">
                    <label>Address</label>
                    <input type="text" value="<?php echo $address ?>" disabled>
                  </div>
                  <div class="field">
                    <label>City</label>
                    <input type="text" value="<?php echo $city ?>" disabled>
                  </div>
                </div>
                <div class="field">
                  <label>Details</label>
                  <textarea name="details" rows="4"><?php echo $details ?></textarea>
                </div>
                <div class="three fields">
                  <div class="field">
                    <label>Contact</label>
                    <input type="text" name="contact" value="<?php echo $contact ?>">
                  </div>
                  <div class="field">
                    <label>Cellphone</label>
                    <input type="text" name="cellphone" value="<?php echo $cellphone ?>">
                  </div>
                  <div class="field">
                    <label>Telefax</label>
                    <input type="text" name="telefax" value="<?php echo $telefax ?>">
                  </div>
                </div>
                <div class="three fields">
                  <div class="field">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $email ?>" disabled>
                  </div>
                  <div class="field">
                    <label>Facebook</label>
                    <input type="text" name="facebook" value="<?php echo $facebook ?>">
                  </div>
                  <div class="field">
                    <label>Website</label>
                    <input type="text" name="website" value="<?php echo $website ?>">
                  </div>
                </div>
                <button class="blue ui large fluid button" name="update-Destinations">Save Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui tiny modal" id="modal-password">
      <i class="close icon"></i>
      <div class="header">
        Change Password
      </div>
      <div class="content">
        <form class="ui form" action="../includes/functions-destinations/change_Password.php" method="post">
          <div class="field">
            <label>New Password</label>
            <div class="ui icon input">
              <input type="password" name="newPassword" placeholder="New Password...">
              <i class="eye link icon"></i>
            </div>
          </div>
          <button class="blue ui fluid button" name="confirm-Password">Change Password!</button>
        </form>
      </div>
    </div>

    <script>

        $('#change-password').click(function(){
          $('#modal-password').modal('toggle');
        });

        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }


    </script>
  </body>
</html>
