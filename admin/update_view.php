<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<?php

if(isset($_GET['updateid'])){
    $edit_id=$_GET['updateid'];

    $sql = "select * from product where p_id=$edit_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['p_name'];
    $description = $row['description'];
    $image = $row['p_img']; 
    $brand = $row['p_brand'];
    $c_id=$row['c_id'];
    $price = $row['price'];
    $keyword = $row['p_keyword'];
    // $gender=$row['gender'];

    // category
    $sql1="select * from `category` where c_id='$c_id'";
    $result1=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result1);
    $category_name=$row['c_name'];

      }
    //   editing product
    if (isset($_POST['edit_product'])) {
        $p_name = $_POST['p_name'];
        $description = $_POST['description'];
        $brand = $_POST['brand'];
        $category = $_POST['cat'];
        $keyword = $_POST['keyword'];
        $price = $_POST['price'];
        $p_Status = 'true';
        // $gender=$_POST['gender'];
       
        //access image
        $image = $_FILES['image']['name'];
        //temp image
        $temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp, "./image/$image");
    
        //insert queries
        $sql = "update product set p_name='$p_name',description='$description',p_img='$image',
        p_brand='$brand',c_id='$category',p_keyword='$keyword',price='$price' where p_id=$edit_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('product update sucessfully')</script>";
            echo "<script>window.open('dashboard.php?view_product','_self')</script>";
        } else {
            die(mysqli_error($conn));
        }
    
    
    }



?>

<div class="container mt-5">
    <h2 class="text-center text-success">Edit Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto">
        <label for="Product name" class="form-label  fw-bold">Product Name :</label>
            <input type="text" name="p_name" id="p_name" class="form-control  mb-2 " placeholder="Enter product name"
                autocomplete="off" value="<?php echo $name; ?>" required>
        </div>
        <div class="form-outline w-50 m-auto">
        <label for="description" class="form-label  fw-bold">Description :</label>
            <input type="text" name="description" id="description" class="form-control  mb-2 " placeholder="Enter product Description"
                autocomplete="off" value="<?php echo $description; ?>" required>
        </div>
        <div class="form-outline w-50   m-auto">
            <div class="d-flex">
            <label for="image" class="form-label  fw-bold">Image</label>
                <input type="file" name="image" id="p_name" class="form-control  mb-2 w-90 m-auto " 
                autocomplete="off" value="<?php echo $image; ?>" required>
                <img src="image/<?php echo $image; ?>" alt="" class="product_img p-1">
            </div>
            
        </div>
        <div class="form-outline w-50 m-auto">
        <label for="brand" class="form-label  fw-bold">Brand Name :</label>
            <input type="text" name="brand" id="brand" class="form-control  mb-2 " placeholder="Enter product Brand"
                autocomplete="off" value="<?php echo $brand; ?>" required>
        </div>
            <div class="form-outline w-50 m-auto">
            <label for="category" class="form-label  fw-bold">Category :</label>
            <select name="cat" id="cat" class="form-select mb-2">
            <option value="<?php echo $category_name;?>"> <?php echo $category_name;?></option>
                <?php
                   $sql_query="select * from `category`";
                   $result_query=mysqli_query($conn,$sql_query);
                   while($row=mysqli_fetch_assoc($result_query)) {
                       $category_name=$row['c_name'];
                       $category_id=$row['c_id'];
                       echo "<option value='$category_id'>$category_name</option>";
                   }
                   

              
               ?>
                
            </select>
        </div>
            <!-- radio -->
            <!-- <div class="form-outline w-50 m-auto">
            <label class="form-check-label" for="male">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="" >
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                </div> -->
        <div class="form-outline w-50 m-auto">
        <label for="Price" class="form-label fw-bold">Product Price :</label>
            <input type="text" name="price" id="price" class="form-control  mb-2 " placeholder="Enter product Price"
                autocomplete="off" value="<?php echo $price; ?>" required>
        </div> 
        <div class="form-outline w-50 m-auto">
        <label for="Product keyword" class="form-label  fw-bold">Product Keyword :</label>
            <input type="text" name="keyword" id="keyword" class="form-control  mb-2 " placeholder="Enter product Keyword"
                autocomplete="off" value="<?php echo $keyword; ?>" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update roduct" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
