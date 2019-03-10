<?php

function myProfileCard($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l){
  $HTML=<<<HTML
  <div class="ui fluid card">
    <div class="image">
      <img src="$a">
    </div>
    <div class="content">
      <div class="header">
        $b
      </div>
      <div class="meta">
        <span>$c</span>|
        <span>$d, $e</span>
      </div>
      <div class="description">
        $f
      </div>
      <div class="ui animated list">
        <div class="item">
          <i class="phone icon"></i>
          $g
        </div>
        <div class="item">
          <i class="mobile icon"></i>
          $h
        </div>
        <div class="item">
          <i class="fax icon"></i>
          $i
        </div>
        <div class="item">
          <i class="envelope icon"></i>
          $j
        </div>
        <div class="item">
          <i class="facebook icon"></i>
          $k
        </div>
        <div class="item">
          <i class="linkify icon"></i>
          $l
        </div>
      </div>
    </div>
  </div>
HTML;
  echo $HTML;
}

function myProfileSmallCard($a, $b, $c, $d, $e, $f){
  $HTML=<<<HTML
  <div class="image">
    <img src="$a">
  </div>
  <div class="content">
    <div class="header">
      $b
    </div>
    <div class="meta">
      <span>$c</span>|
      <span>$d, $e</span>
    </div>
    <div class="description">
      $f
    </div>
  </div>
HTML;
  echo $HTML;
}

function myProfileQuery(){
  include '../includes/connection.php';
  $email = $_SESSION['Email'];
  $sql = "SELECT * FROM destinations WHERE uniqueID = '$email'";
  $result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $classification = $row['classification'];
    $address = $row['address'];
    $city = $row['city'];
    $details = $row['details'];
    $image = $row['image'];
    $contact = $row['contact'];
    $cellphone = $row['cellphone'];
    $telefax = $row['telefax'];
    $email = $row['email'];
    $facebook = $row['facebook'];
    $website = $row['website'];
    $image_src = "../includes/functions-dot/uploads/destinations/" . $image;

    myProfileCard($image_src, $name, $classification, $address, $city, $details, $contact, $cellphone, $telefax, $email, $facebook, $website);
  }
}

function myProfileSmallQuery(){
  include '../includes/connection.php';
  $email = $_SESSION['Email'];
  $sql = "SELECT * FROM destinations WHERE uniqueID = '$email'";
  $result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $classification = $row['classification'];
    $address = $row['address'];
    $city = $row['city'];
    $details = $row['details'];
    $image = $row['image'];
    $image_src = "../includes/functions-dot/uploads/destinations/" . $image;
    myProfileSmallCard($image_src, $name, $classification, $address, $city, $details);
  }
}


 ?>
