<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<?php
include('../user/Connection.php');

if(isset($_POST['insert_sub'])) {
    $sub=$_POST['sub'];
    $category = $_POST['cat'];


    //select from database
    // $sql="select * from subcategory where sub_name='$sub'";
    // $result=mysqli_query($conn,$sql);
    // $num=mysqli_num_rows($result);
    // if($num>0){
    //     echo"<script>alert('Already Exist')</script>";
    // }else{
    $sql1="insert into subcategory (sub_name,c_id) values('$sub','$category')";
    $result1=mysqli_query($conn,$sql1);
    if ($result1){
        echo "<script>alert('Inserted sucessfully')</script>";
        
    } 
}
// }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
</head>

<body>
    <form action="" method="post" class="mb-2">
    <div class="form-outline mb-4 w-100 m-auto">
                    <select name="cat" id="cat" class="form-select">
                        <option value=""> Select a category</option>
                        <?php
                        $sql = "select * from category";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $category_name = $row['c_name'];
                            $category_id = $row['c_id'];
                            echo "<option value= $category_id> $category_name</option>";
                        }
                        ?>
                    </select>
                </div>  
    <div class="input-group w-90 mb-2">
   <input type="text" class="form-control" name="sub" placeholder="Enter sub" aria-label=" Username"
   aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
   <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_sub" value="Insert subcategory" >
 
</div>

    </form>
</body>

</html>