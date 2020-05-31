<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
    <title>novelbuff - Payment</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
    include "topnav.php";
    include "dbconn.php";
    $fullUrl="htttp://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";    
?>
<center>
    <h2 class="mt-5 pt-3 text-center">PAYMENT</h2>
    <hr>
    <div class="col-5 form-group" style="width:500px;text-align:left;">
    <?php
    if(strpos($fullUrl,"paymentProcess=empty") == true)
    {
        echo "<p class='text-danger text-center'>Fill all the fields</p>";
    }
    ?>
        <form action="paymentProcess.php" method="post">
        <h4 class="text-info">Products : </h4>
        <?php
            $pur=$db->cart->find(['name'=>$_SESSION['username']]);
            $total=0;
            foreach($pur as $pr)
            {
                echo "<p><input type='text' name='title[]' value=".$pr->title." class='form-control w-50'><p>";
                $total+=(int)$pr->price;
            }
            echo "<input type='text' name='total' value='&#8377;.".$total."' class='form-control' style='width:80px;'>";
        ?>
        <h4 class="text-info">User Details : </h4>
        <label for="name">Name</label>
        <?php
        if(isset($_GET['name']))
        {
            $name=$_GET['name'];
            echo '<input type="text" name="name" id="name" placeholder="Name" class="form-control" value='.$name.'>';
        }
        else
        {
            echo '<input type="text" name="name" id="name" placeholder="Name" class="form-control">';
        }
        ?>
        <label for="email">Email</label>
        <?php
        if(isset($_GET['email']))
        {
            $email=$_GET['email'];
            echo '<input type="text" name="email" id="email" placeholder="E-mail" class="form-control" value='.$email.'>';
        }
        else
        {
            echo '<input type="text" name="email" id="email" placeholder="E-mail" class="form-control">';
        }
        ?>
        <hr>
        <h4 class="text-info">Billing Address : </h4>
        <table>
        <tr>
        <td><label for="doorno">Door No</label></td>
        <td><label for="street">Street</label></td>
        </tr>
        <tr>
        <td>
        <?php
        if(isset($_GET['doorno']))
        {
            $doorno=$_GET['doorno'];
            echo '<input type="text" name="doorno" id="doorno" class="form-control" value="'.$doorno.'">';
        }
        else
        {
            echo '<input type="text" name="doorno" id="doorno" class="form-control">';
        }
        ?>
        </td>
        <td>
        <?php
        if(isset($_GET['street']))
        {
            $street=$_GET['street'];
            echo '<input type="text" name="street" id="street" class="form-control" value='.$street.'>';
        }
        else
        {
            echo '<input type="text" name="street" id="street" class="form-control">';
        }
        ?>
        </td>
        </tr>
        <tr>
        <td><label for="landmark">Landmark</label></td>
        <td><label for="city">City</label></td>
        </tr>
        <tr>
        <td>
        <?php
        if(isset($_GET['landmark']))
        {
            $landmark=$_GET['landmark'];
            echo '<input type="text" name="landmark" id="landmark" class="form-control" value='.$landmark.'>';
        }
        else
        {
            echo '<input type="text" name="landmark" id="landmark" class="form-control">';
        }
        ?>
        </td>
        <td>
        <?php
        if(isset($_GET['city']))
        {
            $city=$_GET['city'];
            echo '<input type="text" name="city" id="city" class="form-control" value='.$city.'>';
        }
        else
        {
            echo '<input type="text" name="city" id="city" class="form-control">';
        }
        ?>
        </td>
        </tr>
        <tr>
        <td><label for="state">State</label></td>
        <td><label for="zipcode">Zip-Code</label></td>
        </tr>
        <tr>
        <td>
        <?php
        if(isset($_GET['state']))
        {
            $state=$_GET['state'];
            echo ' <input type="text" name="state" id="state" class="form-control" value='.$city.'>';
        }
        else
        {
            echo ' <input type="text" name="state" id="state" class="form-control">';
        }
        ?>
        </td>
        <td>
        <?php
        if(isset($_GET['zipcode']))
        {
            $zipcode=$_GET['zipcode'];
            echo '<input type="text" name="zipcode" id="zipcode" class="form-control" value='.$zipcode.'>';
        }
        else
        {
            echo '<input type="text" name="zipcode" id="zipcode" class="form-control">';
        }
        ?>
        </td>
        </tr>
        <tr>
        <td><label for="country">Country</label></td>
        </tr>
        <tr>
        <td>
        <?php
        if(isset($_GET['country']))
        {
            $country=$_GET['country'];
            echo '<input type="text" name="country" id="country" class="form-control" value='.$country.'>';
        }
        else
        {
            echo '<input type="text" name="country" id="country" class="form-control">';
        }
        ?>    
        </td>
        </tr>
        </table>
        <hr>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php
        if(isset($_GET['card']))
        {
            $card=$_GET['card'];
            ?>
            <input type="radio" name="card" value="Credit card" <?php echo ($card=="Credit card") ? 'checked':'';?>>
            <label for="credit">Credit Card</label>&emsp;&emsp;
            <input type="radio" name="card" value="Debit card" <?php echo ($card=="Debit card") ? 'checked':'';?>>
            <label for="debit">Debit Card</label>
       <?php }
        else
        {
        ?>
        <input type="radio" name="card" value="Credit card">
        <label for="credit">Credit Card</label>&emsp;&emsp;
        <input type="radio" name="card" value="Debit card">
        <label for="debit">Debit Card</label> 
       <?php }
        ?>    
        <hr>
        <h4 class="text-info">Card Details : </h4>
        <label for="nameOnCard">Name on Card</label>
        <?php
        if(isset($_GET['nameOnCard']))
        {
            $nameOnCard=$_GET['nameOnCard'];
            echo '<input type="text" name="nameOnCard" id="nameOnCard" class="form-control" placeholder="Name on Card" value='.$nameOnCard.'>';
        }
        else
        {
            echo '<input type="text" name="nameOnCard" id="nameOnCard" class="form-control" placeholder="Name on Card">';
        }
        ?>    
        <label for="cardno">Card number</label>
        <?php
        if(isset($_GET['cardno']))
        {
            $cardno=$_GET['cardno'];
            echo '<input type="text" pattern="[0-9]{16}" name="cardno" min="16" max="16" class="form-control w-100" placeholder="XXXX - XXXX - XXXX - XXXX" value='.$cardno.'>';
        }
        else
        {
            echo '<input type="text" pattern="[0-9]{16}" name="cardno" min="16" max="16" class="form-control w-100" placeholder="XXXX - XXXX - XXXX - XXXX">';
        }
        ?>   
        <table>
            <tr>
                <td><label for="cardno">CVV</label></td>
                <td><label for="cardno">Expiry Month</label></td>
                <td><label for="cardno">Expiry Year</label></td>
            </tr>
            <tr>
                <td>
                <?php
                if(isset($_GET['cvv']))
                {
                    $cvv=$_GET['cvv'];
                    echo '<input type="text" pattern="[0-9]{3}" min="16" max="16" name="cvv" class="form-control w-50" placeholder="***" value='.$cvv.'>';
                }
                else
                {
                    echo '<input type="text" pattern="[0-9]{3}" min="16" max="16" name="cvv" class="form-control w-50" placeholder="***">';
                }
                ?>
                </td>
                <td>
                <?php
                if(isset($_GET['expmon']))
                {
                    $expmon=$_GET['expmon'];
                    echo '<input type="text" pattern="[0-9]{2}" min="16" max="16" name="expmon" class="form-control w-50" placeholder="**" value='.$expmon.'>';
                }
                else
                {
                    echo '<input type="text" pattern="[0-9]{2}" min="16" max="16" name="expmon" class="form-control w-50" placeholder="**">';
                }
                ?>
                </td>
                <td>
                <?php
                if(isset($_GET['expyear']))
                {
                    $expyear=$_GET['expyear'];
                    echo '<input type="text" pattern="[0-9]{4}" min="16" max="16" name="expyear" class="form-control w-50" placeholder="****" value='.$expyear.'>';
                }
                else
                {
                    echo '<input type="text" pattern="[0-9]{4}" min="16" max="16" name="expyear" class="form-control w-50" placeholder="****">';
                }
                ?>
                
                </td>
            </tr>
        </table>
        <input type="submit" name="pay" value="Pay Now" class="form-control btn btn-success mt-3">
        </form>
    </div>
</center>    
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>