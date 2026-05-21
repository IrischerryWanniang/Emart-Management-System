<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 

<?php
if(isset($_GET['deletecategory'])){
   $deletecategory=$_GET['deletecategory'];
    $sql="delete from category where c_id=$deletecategory";
    $result=mysqli_query($conn,$sql);

    //    if its result true
     if($result){
        echo"<script>alert('Delete Sucessfully')</script>";
        echo "<script>window.open('dashboard.php?view_category','_self')</script>";
       }
}

?>
