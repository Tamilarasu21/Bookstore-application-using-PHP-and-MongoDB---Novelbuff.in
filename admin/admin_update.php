<?php   
          include "../dbconn.php";
      $id        = $_POST["id"];
      $username  = $_POST["username"];
      $password  = $_POST["password"];

      try
        {
           $filter=array('username' => $username,'password'=> $password );
            $db->user->updateOne(
                                 array('_id'=> new MongoDB\BSON\ObjectID($id)),
                                 array('$set'=>$filter)
                                 ); 

            header("Location:admin_userlist.php"); 
          }
          catch(Exception $e)
          {
             die("error encountered:".$e);
          }
?>