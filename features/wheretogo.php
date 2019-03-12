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

    <main class="ui container">
      <section>
        <div class="ui attached secondary segment">
          <div class="ui breadcrumb">
            <a href="./features.php" class="section">Features</a>
            <span class="divider">/</span>
            <div class="active section">Where to go</div>
          </div>
        </div>
        <div class="ui attached fluid segment">
          <h2 class="ui center aligned header">Destinations in Negros Occidental</h2>
          <span>Negros Occidental, also known as Occidental Negros or Western Negros, is a province located in the region of Western Visayas, in the Philippines. It occupies the northwestern half of the large island of Negros, and borders Negros Oriental, which comprises the southeastern half. Known as the "Sugarbowl of the Philippines", Negros Occidental produces more than half the nation's sugar output. Negros Occidental faces the island-province of Guimaras and the province of Iloilo on Panay Island to the northwest across the Panay Gulf and the Guimaras Strait. The primary spoken language is Hiligaynon and the predominant religious denomination is Roman Catholicism. Bacolod City is the capital, seat of government and the most populous city of the province, but is governed independently as a highly urbanized city. With a population of 2,497,261 inhabitants, it is the most populated province in Western Visayas, the second most-populous province in the Visayas after Cebu and the 8th most-populous province of the Philippines. </span>

          <div class="ui divider">

          </div>

          <?php

          include '../includes/connection.php';

           ?>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/beach.png" class="ui circular image">
              Beaches, Resorts and etc.
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Beaches, Resorts and etc.'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/forest.png" class="ui circular image">
              Forest, National Parks and reserves of flora and fiona
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Forest, National Parks and reserves of flora and fiona'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/constructions.png" class="ui circular image">
              Constructions, Structures and Historical Places
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Constructions, Structures and Historical Places'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/cultural.png" class="ui circular image">
              Cultural and Sports Events
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Cultural and Sports Events'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/public.png" class="ui circular image">
              Public Art
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Public Art'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/art.png" class="ui circular image">
              Art galleries and Museums
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Art galleries and Museums'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/botanical.png" class="ui circular image">
              Botanical Garden and Zoos
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Botanical Garden and Zoos'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/monuments.png" class="ui circular image">
              Monuments
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Monuments'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>

          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/historical.png" class="ui circular image">
              Historical Trains and Ships
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Historical Trains and Ships'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

          <div class="ui secondary segment">
            <h2 class="ui header">
              <img src="feature-icons/viewpoints.png" class="ui circular image">
              Viewpoints
            </h2>
            <ul>
              <?php

              $sql = "SELECT * FROM destinations WHERE classification = 'Viewpoints'";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $name = $row['name'];
                  echo "<a href=''>$name</a>";
                }
              } else {
                echo "No destinations found :(";
              }
               ?>
            </ul>
          </div>

        </div>
      </section>
    </main>

  </body>
</html>
