<?php

    function aye($a, $b){
      include '../includes/connection.php';
      $sql = "SELECT * FROM $a";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);
      echo $queryResult . " $b";
    }

    function profile(){
      $HTML=<<<HTML
      <div class="ui fluid card">
        <div class="content">
          <img src="../includes/functions-dot/uploads/logo.jpg" class="ui fluid image">
        </div>
        <div class="content">
          <div class="header">
            Department of Tourism
          </div>
          <div class="meta">
            Negros Occidental
          </div>
          <div class="description">
            Negros Occidental , also known as Occidental Negros or Western Negros, is a province located in the region of
            Western Visayas, in the Philippines. It occupies the northwestern half of the large island of Negros, and
            borders Negros Oriental, which comprises the southeastern half. Known as the "Sugarbowl of the Philippines",
            Negros Occidental produces more than half the nation's sugar output.
          </div>
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function smallprofile(){
      $HTML=<<<HTML
      <div class="content">
        <div class="header">
          Department of Tourism
        </div>
        <div class="meta">
          Negros Occidental
        </div>
        <div class="description">
          Negros Occidental , also known as Occidental Negros or Western Negros, is a province located in the region of
          Western Visayas, in the Philippines. It occupies the northwestern half of the large island of Negros, and
          borders Negros Oriental, which comprises the southeastern half. Known as the "Sugarbowl of the Philippines",
          Negros Occidental produces more than half the nation's sugar output.
        </div>
      </div>
HTML;
      echo $HTML;
    }

 ?>
