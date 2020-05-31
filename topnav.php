<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="lindex.php">NOVELBUFF.IN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="lindex.php"><i class="fa fa-home"></i>&nbsp;Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="books.php"><i class="fa fa-book"></i>&nbsp;Books</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="request.php"><i class="fa fa-comment"></i>&nbsp;Request book</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php"><i class="fa fa-envelope"></i>&nbsp;Contact us</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
          </li>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <li class="nav-item active">
            <?php include "search_book.php"?>
          </li>
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <li class="nav-item active">
              <a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart"></i>&nbsp;Cart
              <?php
                    session_start();
                    include "dbconn.php"; 
                    $count=$db->cart->count(array('name'=> $_SESSION['username']));
                    if($count > 0)
                    {
                       echo '<span id="cart-count" class="text-dark bg-light border rounded p-1">'.$count.'</span>';
                    }
                ?>
              </a>
          </li>
        </ul>
      </div>
</nav>
</body>
</html>


