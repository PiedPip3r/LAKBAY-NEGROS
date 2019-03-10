<div class="ui large icon menu">
  <div class="ui container">
    <a class="header item" href="../index.php">
      <i class="home icon"></i>&nbsp
      Home
    </a>
    <div class="right menu">
      <div class="ui dropdown item" id="navbar">
        <?php echo $_SESSION['Username'] ?> <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="../dot/profile.php">Manage Destination</a>
          <a class="item" href="../includes/do_logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('#navbar').dropdown();
</script>

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
        <?php

        // if ($_SESSION['Username'] == "DOT") {
        //   echo "Department of Tourism";
        // }

         ?>
       <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="../includes/do_logout.php">Logout</a>
      </div>
    </div>

    </div>
  </div>
</div>

<script>
  $('#dropdown').dropdown();
  $('#toggle').click(function(){
    $('.ui.sidebar').sidebar('toggle');
  });

  $('#modal').click(function(){
    $('.ui.modal').modal('toggle');
  });
</script> -->
