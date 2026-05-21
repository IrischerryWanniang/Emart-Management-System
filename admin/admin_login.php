<?php
include ('../user/Connection.php');
@session_start();
?>
<?php
if(isset($_POST['admin_login'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=$_POST['password'];     
    $sql="select * from admin where email='$email'";
    $result=mysqli_query($conn, $sql);
     $rows_count=mysqli_num_rows($result);
        
        if($rows_count>0){
        $row = mysqli_fetch_assoc($result);
        $pwd = $row['password'];
        $email = $row['email'];
        if(trim($password) == trim($pwd)){                  
                $_SESSION['email']=$email;
                $_SESSION['uname']=$row['admin_name'];
                echo"<script>alert('Login Sucessful')</script>";
                header("Location:dashboard.php");
                
            } else {
                echo"<script>alert('Wrong password')</script>";
        }
            
        }
    }
      



    // }
//     echo"<script>alert('Login Sucessful')</script>";
// }else{
//   echo"<script>alert('Invalid Credentials')</script>";
// }

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
        <h2 class="text-center mb-5 mt-3"> Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <form method="post">

                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email"
                     placeholder="Enter Email" required autocomplete="off" class="form-control w-50 m-auto">
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password"
                     placeholder="Enter Password" required autocomplete="off" class="form-control w-50 m-auto">
                </div>
                <div class=" d-flex justify-content-center align-items-center">
                    <input type="submit" class="bg-info  py-2 px-2 border-0" name="admin_login" value="Login">

                    <p class="small fw-bold mt-2 pt-1 mb-0"> Don't have an account? ?<a href="admin_registrattion.php"
                 class="text-danger text-decoration-none"> Signup</a></p>
                </div>
               

            </form>
        </div>
    </div>
    
</body>
</html>