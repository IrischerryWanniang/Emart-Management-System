<!-- delete logic -->
<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<?php
include('../user/Connection.php');
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from product where p_id=$id";
    $result=mysqli_query($conn,$sql);

    //    if its result true
     if($result){
        echo"<script>alert('Delete Sucessfully')</script>";
        echo "<script>window.open('dashboard.php?view_product','_self')</script>";
       }
}
?>