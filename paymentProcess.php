<?php
include "dbconn.php";
if(isset($_POST['pay']))
{
    $name=$_POST['name'];
    $title=implode(',',$_POST['title']);
    $total=$_POST['total'];
    $email=$_POST['email'];
    $doorno=$_POST['doorno'];
    $street=$_POST['street'];
    $landmark=$_POST['landmark'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $country=$_POST['country'];
    $nameOnCard=$_POST['nameOnCard'];
    $cardno=$_POST['cardno'];
    $card=$_POST['card'];
    $cvv=$_POST['cvv'];
    $expmon=$_POST['expmon'];
    $expyear=$_POST['expyear'];
    $payment=array(
                    'name'=>$name,
                    'title'=>$title,
                    'total'=>$total,
                    'email'=>$email,
                    'doorno'=>$doorno,
                    'street'=>$street,
                    'landmark'=>$landmark,
                    'city'=>$city,
                    'state'=>$state,
                    'zipcode'=>$zipcode,
                    'country'=>$country,
                    'card'=>$card,
                    'nameOnCard'=>$nameOnCard,
                    'cardno'=>$cardno,
                    'card'=>$card,
                    'cvv'=>$cvv,
                    'expiry month'=>$expmon,
                    'expiry year'=>$expyear
                    );
    try
    {
        if(empty($_POST['name']) ||empty($_POST['title']) ||empty($_POST['total']) || empty($_POST['email']) || empty($_POST['doorno']) || empty($_POST['street']) || empty($_POST['landmark']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zipcode']) || empty($_POST['country']) || empty($_POST['card']) || empty($_POST['nameOnCard']) || empty($_POST['cardno']) || empty($_POST['cvv']) || empty($_POST['expmon']) || empty($_POST['expyear']))
        {
            header("Location:payment.php?paymentProcess=empty&name=$name&email=$email&doorno=$doorno&street=$street&landmark=$landmark&city=$city&zipcode=$zipcode&country=$country&card=$card&nameOnCard=$nameOnCard&cardno=$cardno&cvv=$cvv&expmon=$expmon&expyear=$expyear");
            exit();
        }
        else
        {
            $pay=$db->payment->insertOne($payment);
            if($pay)
            {
                header("Location:purchase.php");
            }
            else
            {
                echo "<script>alert('Ensure Your Credentials')</script>";
                echo "<script>window.location='payment.php'</script>";
            }
        }
    }
    catch(Exception $e)
    {
        die("Error:".$e);
    }                 
}
?>