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
            <div class="active section">When to go</div>
          </div>
        </div>
        <div class="ui attached fluid segment">
          <div class="ui grid">
            <div class="four wide column">
              <div class="ui segments">
                <div class="ui secondary segment">
                  <span class="ui header">Filter</span>
                </div>
                <div class="ui secondary segment">
                  <div class="ui form">
                    <div class="ui fluid icon input">
                      <input type="text" name="search_text" id="search_text" placeholder="Search for events...">
                      <i class="search icon"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="twelve wide column">
              <div class="ui two column grid">
                <div class="column">
                  <div class="ui segments">
                    <div class="ui secondary segment">
                      <span class="ui header">Masskara Festival</span>
                    </div>
                    <div class="ui segment">
                      <b>Sat Jan 19th 12:00am - Sun 20th 12:00am</b>
                      <p><i>Burgos Street, Bacolod City</i></p>
                      <p>Enjoy the masskara festival in the City of Smiles</p>
                      <br>
                      <button type="button" class="ui blue fluid button" name="button">View details</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </section>
    </main>

  </body>
</html>
