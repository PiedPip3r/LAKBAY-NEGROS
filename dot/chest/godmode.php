<?php include 'dot_hair.php' ?>
    <title>God Mode! - Department of Tourism</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
  </head>
  <body>

    <!-- Sidebar -->
    <?php include 'dot_sidebar.php' ?>
    <!-- Sidebar -->



    <!-- Body -->
    <div class="pusher">

      <!-- Navigation Bar -->
      <?php include 'dot_navbar.php' ?>
      <!-- Navigation Bar -->

      <div class="ui container">
        <!-- Card -->
        <div class="ui card fluid">
          <!-- Header -->
          <div class="content">
            <i class="right floated like icon" id="modal"></i>
            <div class="header">
              God Mode
            </div>
          </div>
          <!-- Cards-->
          <div class="content">

            <div class="ui top attached tabular menu" id="tabs">
              <a class="item active" data-tab="first">Type Of Destinations</a>
              <a class="item" data-tab="second">Second</a>
              <a class="item" data-tab="third">Third</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">
              <table class="ui celled table">
                <thead>
                  <tr><th>Name</th>
                  <th>Job</th>
                </tr></thead>
                <tbody>
                  <tr>
                    <td data-label="Name">James</td>
                    <td data-label="Job">Engineer</td>
                  </tr>
                  <tr>
                    <td data-label="Name">Jill</td>
                    <td data-label="Job">Engineer</td>
                  </tr>
                  <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Job"><button class="ui button">Delete</button></td>
                  </tr>
                </tbody>
                <tfoot class="full-width">
                  <tr>
                    <th></th>
                    <th colspan="4">
                      <div class="ui right floated small primary labeled icon button">
                        <i class="user icon"></i> Add User
                      </div>
                      <div class="ui small button">
                        Approve
                      </div>
                      <div class="ui small  disabled button">
                        Approve All
                      </div>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="ui bottom attached tab segment" data-tab="second">
              Second
            </div>
            <div class="ui bottom attached tab segment" data-tab="third">
              Third
            </div>

          </div>
        </div>
      </div>
    </div>﻿
    <!-- Body -->



    <script>

    $('#modal').click(function(){
      $('.ui.modal').modal('toggle');
    });

    $('.menu .item')
      .tab()
    ;

    </script>



  </body>
</html>
