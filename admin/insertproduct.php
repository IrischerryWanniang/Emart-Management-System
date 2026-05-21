<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<?php
include ('../user/Connection.php');
if (isset($_POST['insert'])) {
    $p_name = $_POST['p_name'];
    $description = $_POST['desc'];
    $category = $_POST['cat'];
    $keyword = $_POST['keyword'];
    $price = $_POST['price'];
    $p_Status = 'true';
  
   
    //access image
    $image = $_FILES['image']['name'];
    //temp image
    $temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($temp, "./image/$image");

    //insert queries
    $sql = "insert into product(p_name,description,p_img,c_id,p_keyword,price)
        values ('$p_name','$description','$image','$category','$keyword',$price)";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        echo "<script>alert('product inserted sucessfully')</script>";
    } else {
        echo "<script>alert('error')</script>";
    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>


        <form method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" name="p_name" id="p_name" class="form-control  mb-2 "
                    placeholder="Enter product name" autocomplete="off" required>
                <input type="text" name="desc" id="desc" class="form-control  mb-2" placeholder="Enter description"
                    autocomplete="off" required>
                <input type="file" name="image" id="image" class="form-control mb-2" required>
                <!-- categories -->
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
                <!-- radio -->
                <!-- <label class="form-check-label" for="male">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="male">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div> -->
                <input type="text" name="keyword" id="keyword" class="form-control  mb-2"
                    placeholder="Enter product keyword" autocomplete="off" required>
                <input type="text" name="price" id="price" class="form-control  mb-2" placeholder="Enter product price"
                    autocomplete="off" required>
                <input type="submit" name="insert" id="insert" class="btn btn-info mb-3 px-3" value="Insert">

            </div>
    </div>

    </form>
    <!-- bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>


</html>