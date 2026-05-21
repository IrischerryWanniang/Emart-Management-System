<?php
include ('Connection.php');
include ('../admin/function/fetchfunction.php');
@session_start();
?>
<?php
if(isset($_POST['btn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];     
    $sql="select * from user where email='$email'";
    $result=mysqli_query($conn, $sql);
    $rows_count=mysqli_num_rows($result);
   
    if($rows_count>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email']=$email;
        $email=$row['email'];
        $pwd = $row['password'];
        $id = $row['user_id'];
        if(trim($password) == trim($pwd)){                  
            $_SESSION['user']=$id;
            $_SESSION['email']=$email;
            $_SESSION['uname']=$row['user_name'];


            if($rows_count==1){
                $_SESSION['user']=$id;
                echo "<script>alert('Login Successful')</script>";
                header("Location: home.php");
            }
        } else {
            echo "<script>alert('Wrong password')</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials')</script>";
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
<style>
    body{
        overflow-x:hidden;
    }
</style>
<body>
<div class="container-fluid my-3 w-50">
    <h2 class="text-center">Login</h2>
    <div class="row d-flex  align-item-center justify-content-center mt-4">
        <div class="col-lg-12 col-xl-6">
        <form method="post">
            <div class="form-outline mb-4">
                <input type="email" id="email"class="form-control"
                placeholder=" Enter Email" autocomplete="off" required oninput="this.value = this.value.replace(/\s/g, '')" name="email"/>
            </div>
            
            
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control "
                placeholder=" Enter Password" autocomplete="off" oninput="this.value = this.value.replace(/\s/g, '')" required />
            </div>
            
            <div class=" mt-4 pt-2">
                <input type="submit" value="Login" class="bg-info py-2 border-0 "
                 name="btn"/>
            </div>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="R.php" class="text-danger text-decoration-none">Sign Up</a></p>

        </form>
      </div>
   </div>
</div>


    <!-- bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
</html>