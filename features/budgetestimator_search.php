<?php

    include '../includes/connection.php';

    function cards($a, $b, $c, $d, $e){
      $HTML=<<<HTML
      <div class="ui card">
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
        <div class="extra content">
          <i class="money green icon"></i>
          Budget needed is <b>$e</b> (Pesos)
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function search($connection){
      if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($connection, $_POST['search']);
        $sql = "SELECT * FROM itineraries WHERE budget LIKE '%$search%'";
        $result = mysqli_query($connection, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $budget = $row['budget'];
            $details = $row['details'];
            $image = $row['image'];
            $image_src = "../includes/functions-destinations/uploads/itinerary/" . $image;
            $creator = $row['creator'];
            cards($image_src, $name, $creator, $details, $budget);
          }
        } else {
          echo "No datas";
        }

      }
    }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
  </head>
  <body>

    <div class="ui menu">
      <div class="ui container">
        <a class="header item" href="../index.php">
          <i class="tree icon"></i>Lakbay: A travel tool!
        </a>
        <a href="features/features.php" class="item">
          <i class="archive icon"></i>
        </a>
        <div class="right item">
          <button class="ui teal button" id="modal">Login</button>
        </div>
      </div>
    </div>
    <?php include '../parts/login-modal.php' ?>

    <div class="ui container">
      <div class="ui segments">
        <div class="ui secondary segment">
          <div class="ui breadcrumb">
            <a href="./features.php" class="section">Features</a>
            <span class="divider">/</span>
            <div class="active section">When to go</div>
          </div>
        </div>
        <div class="ui segment">
          <div class="ui stackable grid">
            <div class="four wide column">
              <div class="ui segments">
                <div class="ui secondary segment">
                  <div class="ui header">
                    Filter
                  </div>
                </div>
                <div class="ui segment">
                  <form class="ui form" action="budgetestimator_search.php" method="post">
                    <div class="field">
                      <label>Search</label>
                      <input type="text" name="search">
                    </div>
                    <button class="ui blue fluid button" name="button">Search</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="twelve wide column">
              <div class="ui three stackable cards">
                <?php search($connection) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
