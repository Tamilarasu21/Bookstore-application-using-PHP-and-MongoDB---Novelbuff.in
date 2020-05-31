<?php
include "dbconn.php";
if(isset($_POST['remove']))
{
    $id=$_POST['id'];
    $remove=$db->cart->deleteOne(['_id'=>new MongoDB\BSON\ObjectId($id)]);
    if($remove)
    {
        echo "<script>alert('Product is removed from cart')</script>";
        echo "<script>window.location='cart.php'</script>";
    }
}
?>