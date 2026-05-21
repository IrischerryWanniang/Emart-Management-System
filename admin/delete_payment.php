<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 

<?php
if(isset($_GET['deletepayment'])){
   $deletepayment=$_GET['deletepayment'];
   echo $deletepayment;
    $sql="delete from payment where payment_id=$deletepayment";
    $result=mysqli_query($conn,$sql);

    //    if its result true
     if($result){

        echo"<script>alert('Delete Sucessfully')</script>";
        echo "<script>window.open('dashboard.php?list_payment','_self')</script>";
       }
}


?>