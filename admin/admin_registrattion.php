<?php
include ('../user/Connection.php');

if(isset($_POST['admin_register'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    
  // Check if email already exists
     $sql="select * from admin where email='$email'";
     $result=mysqli_query($conn,$sql);
     $rows_count=mysqli_num_rows($result);
     if($rows_count>0){
     echo"<script>alert('Email already exist')</script>";
     }else{

    //insert query
    $sql1="insert into admin(admin_name,email,password)
    values('$username','$email',' $password')";
    $execute=mysqli_query($conn, $sql1);
    if($execute){
      echo"<script>alert('Register sucessfully')</script>";
      header('location:admin_login.php');
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
  <!-- font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body{
    
        overflow: hidden;
    }
    </style>
<body>
    <div class="container-fluid m-3 ">
        <h2 class="text-center mb-5 mt-3"> Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <form method="post">

                <div class="form-outline mb-4">
                    <input type="text" id="username" name="username"
                     placeholder="Enter Username" required autocomplete="off" class="form-control w-50 m-auto">
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email"
                     placeholder="Enter Email" required autocomplete="off" class="form-control w-50 m-auto">
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password"
                     placeholder="Enter Password" required autocomplete="off" class="form-control w-50 m-auto">
                </div>
                <div class=" d-flex justify-content-center align-items-center">
                    <input type="submit" class="bg-info  py-2 px-2 border-0" name="admin_register" value="Register">

                    <p class="small fw-bold mt-2 pt-1 mb-0"> Already have an account? ?<a href="admin_login.php"
                 class="text-danger text-decoration-none">Login</a></p>
                </div>
               

            </form>
        </div>
    </div>
    
</body>
</html>