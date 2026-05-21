<?php

 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
 
if(isset($_GET['deleteuser'])){
   $deleteuser=$_GET['deleteuser'];
    $sql="delete from payment where user_id=$deleteuser";
    $result=mysqli_query($conn,$sql);

    //    if its result true
     if($result){

        echo"<script>alert('Delete Sucessfully')</script>";
        echo "<script>window.open('dashboard.php?list_payment','_self')</script>";
       }
}


?>