<?php
include("connection.php");
?>

<?php
if(isset($_POST['btn'])){

  $username=$_POST['username'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $hash=password_hash($password, PASSWORD_DEFAULT);
  
   
// Check if email already exists
   $sql="select * from customer where Email='$email'";
   $result=mysqli_query($conn,$sql);
   $rows_count=mysqli_num_rows($result);
   if($rows_count>0){
   echo"<script>alert('Email already exist')</script>";
  }else{
  //insert query
  $sql1="insert into customer(Cu_name,Email,Address,Phone_no,Password)values('$username','$email','$address',$phone,
  '$hash')";
  $execute=mysqli_query($conn, $sql1);
  if($execute){
    echo"<script>alert('Inserted sucessfully')</script>";
  } else {
    die(mysqli_error($conn));
  }
  }
  if($_Session['Email']=$email){
    echo"<script>window.open('checkout.php','_self')</script>";
  }else{
    echo"<script>window.open('Homepage.php','_self')</script>";
  }
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="Css\ULStyle.css">
</head>

<body>
  <div class="container">
    <div class="box">
      <p class="heading">Sign Up</p>

      <form method="post">

        <input type="text" class="textbox" name="username" autocomplete="off" placeholder="Username" required>
        <br>
        <input type="email" class="textbox" name="email" autocomplete="off" placeholder="Email" required>
        <br>
        <input type="text" class="textbox" name="address" autocomplete="off" placeholder="Address" required>
        <br>
        <input type="text" class="textbox" name="phone" autocomplete="off" placeholder="Phone number" required>
        <br>
        <input type="password" class="textbox" name="password" placeholder="Password" required>
       <br>
       <input type="submit" value="Register" class="btn" name="btn">

        <p class="link">Already have an account ? <a href="ULogin.php">Login</a></p>

      </form>
    </div>
  </div>
</body>

</html>