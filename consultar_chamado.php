<?php require_once "validador_acesso.php"; ?>

<?php
  $calls = array();

  // Open the file if it exists outside the public folder
  if (file_exists('../../app_help_desk/arquivo.hd')) {
      $file = fopen('../../app_help_desk/arquivo.hd', 'r');

      while(!feof($file)) { 
          $record = fgets($file);
          if ($record != '') {
              $calls[] = $record; 
          }
      }

      fclose($file);
  }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-support-call {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Log out</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="col-md-8 offset-md-2 card-support-call">
          <div class="card">
            <div class="card-header">
              View support ticket
            </div>
            
            <div class="card-body">
              
              <?php foreach($calls as $call) { ?>
                
                <?php 
                  // Split the record into an array
                  $call_data = explode('|', $call);
                  
                  // If the user profile is regular user (2)
                  if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == 2) {
                      // Users can only view the tickets they have opened
                      if($_SESSION['id'] != $call_data[0]) {
                          continue; 
                      }
                  } 

                  // Validates whether the record contains the required fields
                  if(count($call_data) < 4 || trim($call_data[1]) == '') {
                      continue; 
                  }
                ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $call_data[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $call_data[2] ?></h6>
                    <p class="card-text"><?= $call_data[3] ?></p>
                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Back</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>