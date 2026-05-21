<?php
include ('Connection.php');
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  $sql = "select * from `customer` where Email='$email'";
  $result = mysqli_query($conn, $sql);
  $rows_count = mysqli_num_rows($result);
  $row_data = mysqli_fetch_assoc($result);
  if ($rows_count > 0) {
    if (password_verify($password, $row_data['Password'])) {
      echo "<script>alert('Login Sucessful')</script>";
    } else {
      echo "<script>alert('Invalid')</script>";
    }

  } else {
    echo "<script>alert('Invalid Credentials')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="Css\ULStyle.css">
</head>

<body>
  <div class="container">
    <div class="box">
      <p class="heading">Login</p>

      <form method="post">

        <input type="email" class="textbox" name="email" autocomplete="off" placeholder="Email address" required>
        <br>
        <input type="password" class="textbox" name="password" placeholder="Password" required>



        <input type="submit" value="Login " class="btn" name="login">

        <p class="link">Don't have an account ? <a href="URegister.php">Sign up</a></p>

      </form>
    </div>
  </div>
</body>

</html>