<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<?php
if(isset($_GET['delete_list_order'])){
   $delete_order=$_GET['delete_list_order'];
   echo $deletepayment;
    $sql="delete from orders where id=$delete_order";
    $result=mysqli_query($conn,$sql);

    //    if its result true
     if($result){

        echo"<script>alert('Delete Sucessfully')</script>";
        echo "<script>window.open('dashboard.php?list_orders','_self')</script>";
       }
}


?>