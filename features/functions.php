<?php

    function featurecards($a, $b, $c, $d){
      $HTML=<<<HTML
      <a class="ui $a card" href="$b.php">
        <div class="content">
          <div class="center aligned author">
            <img class="ui tiny image" src="icons/$c.png">
          </div><br>
          <div class="center aligned header">
            $d
          </div>
        </div>
      </a>
HTML;
      echo $HTML;
    }

    function navbar(){
      $HTML=<<<HTML
      <div class="ui menu">
        <div class="ui container">
          <a class="header item" href="../index.php">
            <i class="tree icon"></i>Lakbay: A travel tool!
          </a>
          <a href="features.php" class="item">
            <i class="archive icon"></i>
          </a>
          <div class="right item">
            <button class="ui teal button" id="button-modal">Login</button>
          </div>
        </div>
      </div>
HTML;
      echo $HTML;
    }

    function loginmodal(){
      $HTML=<<<HTML
      <div class="ui tiny modal" id="login-modal">
        <i class="close icon"></i>
        <div class="content">
          <h2 class="ui teal header">
            Log-in to your account
          </h2>
          <form class="ui form" action="includes/logintest.php" method="POST">
            <div class="field">
              <div class="ui fluid left icon input">
                <input type="text" placeholder="Username" name="username" required>
                <i class="user icon"></i>
              </div>
            </div>
            <div class="field">
              <div class="ui fluid left icon input">
                <input type="password" placeholder="Password" name="password" required>
                <i class="lock icon"></i>
              </div>
            </div>
            <button class="ui fluid large teal submit button" name="login">Login</button>
          </form>
          <div class="ui success message">
            No account?
            <a href="signup.php">Sign up</a>
          </div>
        </div>
      </div>
HTML;
      echo $HTML;
    }

 ?>
