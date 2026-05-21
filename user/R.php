<?php
include ('Connection.php');
include ('../admin/function/fetchfunction.php');
session_start();
?>

<?php 
if(isset($_POST['btn'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $image=$_FILES['image']['name'];
    $tmp_image=$_FILES['image']['tmp_name'];
    // $ip=getIPAddress();



  // Check if email already exists
     $sql="select * from user where email='$email'or user_name='$username'";
     $result=mysqli_query($conn,$sql);
     $rows_count=mysqli_num_rows($result);
     if($rows_count>0){
     echo"<script>alert('Email or Name already exist')</script>";
     }else{

    //insert query
    move_uploaded_file($tmp_image,"user_img/$image");
    $sql1="insert into user(user_name,email,password,image)
    values('$username','$email',' $password','$image')";
    $execute=mysqli_query($conn, $sql1);
    if($execute){
        echo"<script>alert('register Sucessfully')</script>";
        echo"<script>window.open('L.php','_self')</script>";
    } else {
      die(mysqli_error($conn));
    } 
    
    
   
      }
  
    
  }
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
</head>
<body>
<div class="container-fluid my-3 w-50">
    <h2 class="text-center">Register</h2>
    <div class="row d-flex  align-item-center justify-content-center mt-4">
        <div class="col-lg-12 col-xl-6">
        <form method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" id="username"   class="form-control"
                placeholder=" Enter Username" autocomplete="off" required  name="username"/>
            </div>
            <div class="form-outline mb-4">
                <input type="email" id="email"class="form-control"
                placeholder=" Enter Email" autocomplete="off" required oninput="this.value = this.value.replace(/\s/g, '')" name="email"/>
            </div>
            <div class="form-outline mb-4">
                <input type="file" id="image"class="form-control"
                  name="image" required/>
            </div>
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control "
                placeholder=" Enter Password" autocomplete="off" oninput="this.value = this.value.replace(/\s/g, '')" required />
            </div>
            
            <div class=" mt-4 pt-2">
                <input type="submit" value="Register" class="bg-info py-2 border-0 " name="btn" />
            </div>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="L.php" class="text-danger text-decoration-none"> Login</a></p>

        </form>
      </div>

    </div>
</div>



</body>
</html>