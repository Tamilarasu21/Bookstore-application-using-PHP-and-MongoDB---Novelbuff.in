<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>novelbuff</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  </head>
  <body>
    <?php 
    session_start();   #starting session
    include "dbconn.php";  #database connectivity
    include 'topnav2.php'; #include files
    if(isset($_SESSION['username']))
    {
      header("Location:lindex.php");
    }
    ?>
<main role="main">
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
      <div class="container">
          <h1 class="display-3">Welcome Mr/Mrs.Bookworm</h1>
          <p>You have reached a correct place... Login/Register to view our services &raquo;</p>
          <p><a class="btn btn-primary btn-lg" href="login.php" role="button">Login here &raquo;</a></p>
      </div>
  </div>
  <div class="container">
  <!--row -->
    <div class="row">
      <div class="col-md-4">
        <details><summary><h3>ABOUT</h3></summary>
          <p>To all the bookworms out there... we gotta show you a site for reading and downloading your favourite novels and books in free of cost.</p>
          <p><a class="btn btn-secondary" href="#" role="button">Learn More &raquo;</a></p>
        </details>
      </div>
      <div class="col-md-4">
        <details><summary><h3>FEEDBACK</h3></summary>
          <p>We the crew of noobs initiated the <b><?php echo $sitename ?></b> and we are pleased to get your feedbacks and issues to us via the feedback form.Do make <b><?php echo $sitename ?></b> stronger with us...</p>
          <p><a class="btn btn-secondary" href="login.php" role="button">Login to Surf</a></p>
        </details>
      </div>
    </div><hr>
  </div> 
  <!-- container -->
</main>
    <?php include "footnav.php"; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
