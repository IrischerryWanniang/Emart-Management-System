<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<?php
if(isset($_GET['updatecategory'])){
    $updatecategory=$_GET['updatecategory'];
    $sql="select * from category where c_id=$updatecategory";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $category_name=$row['c_name'];
    // echo  $category_name;
}
if(isset($_POST['edit_cat'])){
    $cat_name=$_POST['name'];
    $update_query="update category set c_name=' $cat_name' where c_id=$updatecategory";
    $result_query=mysqli_query($conn,$update_query);
    if($result_query){
        echo"<script>alert('Updated Sucessfully')</script>";
        echo "<script>window.open('dashboard.php?view_category','_self')</script>";
    }
}
?>


<div class="container mt-3 w-50 m-auto">
    <h1 class="text-center">edit category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-2">
            <label class="form-label fw-bold">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value='<?php echo $category_name;?>'
             required> 
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-2" name="edit_cat">
    </form>
</div>