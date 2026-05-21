<?php

if(isset($_GET['edit_account'])){
    $username="$_SESSION[uname]";
    $sql="select * from user where user_name='$username'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row){
    $uid=$row['user_id'];
    $name=$row['user_name'];
    $email=$row['email'];
    $address=$row['address'];
    $phone_no=$row['phone_no'];
    $password=$row['password'];
    }


    if(isset($_POST['user_update'])){
        $update_id=$uid;
        $Name=$_POST['username'];
       $Email=$_POST['email'];
       $Address=$_POST['address'];
       $Phone_no=$_POST['mobile'];
       $Password=$_POST['password'];



       $update_data="update user set user_name='$Name',email='$Email',address='$Address',phone_no='$Phone_no',password='$Password'
       where user_id=$update_id";
       $result_query=mysqli_query($conn,$update_data);
       if($result_query){
        echo "<script>alert('Data Update Successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";

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
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit account</h3>
    <form method="post" >
        <div class="form-outline mb-2">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $name ?>" name="username">
       </div> 
       <div class="form-outline mb-2">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $email ?>" name="email">
       </div>
       <div class="form-outline mb-2">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $address ?>" name="address">
       </div>
       <div class="form-outline mb-2">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $phone_no ?>" name="mobile">
       </div>
       <div class="form-outline mb-2">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $password ?>" name="password">
       </div>
       <input type="submit" value="Update"class="bg-info py-2 px3 border-0" name="user_update">
    </form>
</body>
</html>