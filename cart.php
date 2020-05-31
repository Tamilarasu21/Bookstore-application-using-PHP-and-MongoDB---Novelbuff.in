<!DOCTYPE html>
<html>
<head>
    <title>novelbuff - Cart</title>
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<?php
    include "topnav.php";
    include "dbconn.php";
?>
    <h3 class="mt-3 pt-5 text-center">My cart</h3>
    <?php
        $basket=$db->cart->find(array('name' => $_SESSION['username']));
        $total=0;
        echo "<table class='table'>";
        foreach ($basket as $boss)
        {
            echo '<tr>';
            echo "<form action='removeFromCart.php' method='post'>";
            echo "<input type='hidden' name='id' value='".$boss->_id."'>";
            echo "<td style='width:200px'><img src='admin/images/".$boss->fileName."' width='120px' height='120px' class='img-responsive'></td>";
            echo "<td><p><b class='text-info'>Title : </b>".$boss->title."</p>";
            echo "<p><b class='text-info'>Author : </b>".$boss->author."</p>";
            echo "<p><b class='text-info'>Type : </b>".ucfirst($boss->type)."</p>";
            echo "<p><b class='text-info'>Price : </b>&#8377;.".$boss->price."</p>";
            $total+=(int)$boss->price;
            echo "<button class='btn btn-danger' name='remove'><i class='fa fa-trash'></i>&nbsp;Remove</button></td>";
            echo "</form>";
            echo '</tr>';
        }
        echo "</table>";
        echo "<hr>";
        if($total > 0)
        {
            echo "<p class=''><h2 class='text-center'><span class='text-primary'>Total: </span>&#8377;.".$total."</h2></p>";
            echo "<h3 class='text-center'><a href='payment.php' name='proceed' class='btn btn-warning'>Proceed to checkout</a></h3>";
        }   
        else
        {
            echo "<h1 class='text-center text-warning'>Your cart is empty</h1>";
        }
        include "footnav.php";
    ?>
    <!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>