<?php

    include 'functions.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LAKBAY Madafaka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
  </head>
  <body>
    <?php navbar() ?>
    <?php loginmodal() ?>
    <div class="ui container">
      <div class="ui stackable grid">
        <div class="eight wide column">
          <h2 class="ui teal header">Other Features</h2>
          <div class="ui divider">

          </div>
          <div class="ui two stackable link cards">
            <?php featurecards('blue', 'negrosmap', 'map', 'Negros Map') ?>
            <?php featurecards('blue', 'map', 'map', 'Negros Map') ?>
            <?php featurecards('blue', 'map', 'map', 'Negros Map') ?>
            <?php featurecards('blue', 'map', 'map', 'Negros Map') ?>
            <?php featurecards('blue', 'map', 'map', 'Negros Map') ?>
            <?php featurecards('blue', 'map', 'map', 'Negros Map') ?>
          </div>
        </div>
        <div class="eight wide column">

        </div>
      </div>
    </div>
  </body>
</html>
