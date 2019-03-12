<?php include 'dot_hair.php' ?>
    <title>Destinations - Department of Tourism</title>
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
          <div class="twelve wide column">
            <div class="ui segments">
              <div class="ui secondary segment">
                <div class="ui breadcrumb">
                  <a href="./destinations.php" class="section">Destinations</a>
                  <span class="divider">/</span>
                  <div class="active section"><?php echo $_GET['id'] ?></div>
                </div>
              </div>
              <div class="ui segment">
                <?php

                $key = $_GET['id'];
                //echo $key;
                include '../includes/connection.php';
                $sql = "SELECT * FROM destinations WHERE name = '$key'";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($result)) {
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
                  $image = $row['image'];
                  $id = $row['uniqueID'];
                  $image_src = "../includes/functions-dot/uploads/destinations/" .$image;
                  cards($image_src, $name, $address, $city, $details, $classification, $id);
                }

                function cards($a, $b, $c, $d, $e, $f, $g){
                  $HTML=<<<HTML
                  <div class="ui grid">
                    <div class="six wide column">
                      <div class="ui secondary segment">
                        <img class="ui fluid image" src="$a">
                      </div>
                    </div>
                    <div class="ten wide column">
                      <div class="ui fluid red card">
                        <div class="content">
                          <div class="header">
                            $b
                          </div>
                          <div class="meta">
                            <span>$c | $d</span>
                            <span class="right floated">$f</span>
                          </div>
                          <div class="description">
                            <span>$e</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
HTML;
                echo $HTML;
                }

                 ?>
              </div>
              <div class="ui right aligned segment">
                <a href="#" id="edit-button">Edit</a>&nbsp
                <a href="#">Deactivate</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ui small modal" id="edit-modal">
        <i class="close icon"></i>
        <div class="header">
          Edit destination
        </div>
        <div class="content">
          <form class="ui form" action="index.html" method="post">
            <div class="two fields">
              <div class="field">
                <label>Name</label>
                <input type="text" name="" value="<?php echo $name ?>">
              </div>
              <div class="field">
                <label>Classification</label>
                <input type="text" name="" value="<?php echo $classification ?>">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Address</label>
                <input type="text" name="" value="<?php echo $address ?>">
              </div>
              <div class="field">
                <label>City</label>
                <input type="text" name="" value="<?php echo $city ?>">
              </div>
            </div>
            <div class="three fields">
              <div class="field">
                <label>Contact</label>
                <input type="text" name="" value="<?php echo $contact ?>">
              </div>
              <div class="field">
                <label>Cellphone</label>
                <input type="text" name="" value="<?php echo $cellphone ?>">
              </div>
              <div class="field">
                <label>Telefax</label>
                <input type="text" name="" value="<?php echo $telefax ?>">
              </div>
            </div>
            <div class="three fields">
              <div class="field">
                <label>Email</label>
                <input type="text" name="" value="<?php echo $email ?>">
              </div>
              <div class="field">
                <label>Facebook</label>
                <input type="text" name="" value="<?php echo $facebook ?>">
              </div>
              <div class="field">
                <label>Website</label>
                <input type="text" name="" value="<?php echo $website ?>">
              </div>
            </div>
            <div class="field">
              <label>Details</label>
              <textarea name="name" rows="3" cols="80"><?php echo $details ?></textarea>
            </div>
            <button class="ui blue button" name="submit">Update</button>
          </form>
        </div>
      </div>


      <script>

        $('#edit-button').click(function(){
          $('#edit-modal').modal('toggle');
        });

      </script>

  </body>
</html>
