<div class="ui large icon menu">
  <div class="ui container">
    <a class="header item" href="../index.php">
      <i class="home icon"></i>&nbsp
      Home
    </a>
    <div class="right menu">
      <div class="ui dropdown item" id="show-modal">
        <?php echo $_SESSION['Username'] ?> <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="profile.php">Manage Destination</a>
          <a class="item" href="../includes/do_logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="ui icon menu">
  <div class="ui container">
    <div href="#" id="toggle" class="item">
      <a href="#">
        <i class="sidebar icon"></i>
          Menu
      </a>
    </div>
    <div class="right menu">
      <div class="ui dropdown item" id="dropdown">
      <?php echo $_SESSION['Username'] ?> <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="profile.php">Account Settings</a>
        <a class="item" href="../includes/do_logout.php">Logout</a>
      </div>
    </div>

    </div>
  </div>
</div> -->

<script>
  $('#show-modal').dropdown();
</script>



<!-- Navigation Bar ->
<div class="ui basic icon menu">
  <div href="#" id="toggle" class="item">
    <a href="#">
      <i class="sidebar icon"></i>
        Menu
    </a>
  </div>
  <div class="right item">
    <a href="../includes/do_logout.php">
      <i class="logout icon"></i>
        Logout
    </a>
  </div>
</div>
<!- Navigation Bar -->
