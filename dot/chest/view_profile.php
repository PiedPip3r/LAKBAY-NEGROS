<?php

  include '../includes/connection.php';

  function profile(){
    $HTML=<<<HTML
    <div class="ui centered medium image">

    </div>
HTML;
    echo $HTML;
  }

 ?>

<?php include 'dot_hair.php' ?>
    <title>Profile - Department of Tourism</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
  </head>
  <body>

    <?php include 'dot_sidebar.php' ?>

    <div class="pusher">

      <?php include 'dot_navbar.php' ?>

      <div class="ui container">
        <div class="ui centered grid">
          <div class="ten wide column">
            <div class="ui segments">
              <div class="ui secondary segment">
                <div class="ui breadcrumb">
                  <a href="./destinations.php" class="section">Profile</a>
                  <span class="divider">/</span>
                  <div class="active section"><?php echo $_GET['id'] ?></div>
                </div>
              </div>
              <div class="ui segment">
                <div class="ui centerd medium image">
                  <?php

                    include '../includes/connection.php';
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM users WHERE uniqueID = '$id'";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                      $uniqueID = $row['uniqueID'];
                      echo $uniqueID;
                    }

                   ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>﻿

    <script>

    $('#type').dropdown();

    $('#city').dropdown();

    $('#modal1').click(function(){
      $('#add-destination').modal('toggle');
    });

    $('#modal2').click(function(){
      $('#delete-destination').modal('toggle');
    });

    </script>
  </body>
</html>
