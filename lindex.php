<!DOCTYPE html>
<html>
<head>
  <title>novelbuff - Home</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
  <meta name="viewport" content="width-device-width, initial scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<?php include "topnav.php"?>
    <div class="jumbotron">
        <div class="container">
          <?php
          //session_start();  #start session
          include "dbconn.php";     #connect to database
          ?>
          <h1 class="display-3">Hello <?php echo ucfirst($_SESSION['username']); ?></h1>           
          <p>Welcome to <b><?php echo $sitename ?> <i class="fa fa-book"></i></b> a dedicated site for novels and books for free.You are spending zero penny to browse and download our e-books from this site.</p>
        
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Yes I'm in &raquo;</a></p>
        </div>
    </div>
      <!--################################## bootstrap ###########################################-->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>