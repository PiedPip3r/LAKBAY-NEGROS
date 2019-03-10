<?php include 'destinations_hair.php' ?>
    <title>Activities (Update)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
  </head>
  <body>


    <!-- Sidebar -->
    <?php include 'destinations_sidebar.php' ?>
    <!-- Sidebar -->



    <!-- Body -->
    <div class="pusher">


      <?php include 'destinations_navbar.php' ?>
      <?php
        include '../includes/connection.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM activities WHERE id = '$id'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $name = $row['activityname'];
          $details = $row['description'];
        }
       ?>

      <div class="ui container">
        <div class="ui card">
          <div class="content">
            <div class="header">
              Edit
            </div>
          </div>
          <div class="content">
            <form class="ui form" action="../includes/update_activities.php" method="post">
              <input type="text" name="id" value="<?php echo $id ?>" hidden>
              <div class="field">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $name ?>">
              </div>
              <div class="field">
                <label>Details</label>
                <textarea name="details" rows="8" cols="80"><?php echo $details ?></textarea>
              </div>
              <button class="ui blue fluid button" type="submit" name="update_activities">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>﻿
    <!-- Body -->



    <div class="ui small modal">
      <i class="close icon"></i>
      <div class="header">
        Prices
      </div>
      <div class="content">
        <form class="ui form" action="../includes/add_prices.php" method="POST">
          <div class="field">
            <label>Name of the facility/activity</label>
            <input type="text" name="name">
          </div>
          <div class="field">
            <label>Category</label>
            <select class="" name="category">
              <option value="Accomodational">Accomodational</option>
              <option value="Recreational">Recreational</option>
            </select>
          </div>
          <div class="field">
            <label>Price</label>
            <input type="text" name="price">
          </div>
          <button class="ui primary button" name="submit">Add</button>
        </form>
      </div>
    </div>




    <script type="text/javascript">
    $('#toggle').click(function(){
      $('.ui.sidebar').sidebar('toggle');
    });


    $('#modal').click(function(){
      $('.ui.modal').modal('show');
    });



    </script>



  </body>
</html>
