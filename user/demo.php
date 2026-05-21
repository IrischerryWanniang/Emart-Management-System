<?php
include ('Connection.php');
include ('../admin/function/fetchfunction.php');
@session_start();

if(!isset($_SESSION['user'])){
   header('Location:L.php');
};

// update
if(isset($_POST['update_product_quantity'])){
  $update_value=$_POST['update_value'];
  $update_id=$_POST['update_quantity_id'];
  $update_query="update cart set quantity=$update_value where cart_id=$update_id";
  $results_update=mysqli_query($conn,$update_query);
  if($results_update){
    header('location:cart.php');
  }
  
}
//delete

if(isset($_GET['remove'])){
    $id=$_GET['remove'];
    $sql="delete from cart where cart_id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
      header('location:cart.php');
    }
}
//deleteall
if(isset($_GET['deleteall'])){
  $sql="delete  from cart";
  $result=mysqli_query($conn,$sql);
  header('location:cart.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- bootstrap css-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="Css/styles.css">

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header with Sub Dropdown Menus and Search Bar</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
    <?php
    //  $sql="select * from cart where user_id=".$_SESSION['user'];
    //  $result = mysqli_query($conn, $sql);
    //  $id=$_SESSION['user'];
      ?>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container">
                    <a class="navbar-brand" href="home.php">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownShop" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownShop">

                                    <li class="dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#">Category 1</a>
                                <ul class="sub-dropdown-menu ">
                                    <li><a class="dropdown-item" href="#">Subcategory 1.1</a></li>
                                    <li><a class="dropdown-item" href="#">Subcategory 1.2</a></li>
                                    <li><a class="dropdown-item" href="#">Subcategory 1.3</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#">Category 2</a></li>
                            <li class="dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#">Category 3</a>
                                <ul class="sub-dropdown-menu ">
                                    <li><a class="dropdown-item" href="#">Subcategory 3.1</a></li>
                                    <li><a class="dropdown-item" href="#">Subcategory 3.2</a></li>
                                    <li><a class="dropdown-item" href="#">Subcategory 3.3</a></li>
                                </ul>
                            </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="display.php">Product</a>
                            </li>
                            <li class="nav-item">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo "
            <li class='nav-item'>
              <a class='nav-link' href='profile.php'>Account</a>
            </li>
            
            ";
                                } else {
                                    echo "<li class='nav-item'>
             <a class='nav-link' href='R.php'>Register</a>
             </li>";
                                }
                                ?>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                                    <sup><?php cart_item(); ?> </sup> </a>
                            </li>
                        </ul>
                        <form class="d-flex" action="search.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                name="search_data">
                            <input type="submit" value="Search" class="btn btn-outline-light" name="search_product">
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <!-- second -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav me-auto">

                <?php

                if (!isset($_SESSION['user'])) {
                    echo "
  <li class='nav-item'>
     <a class='nav-link' href='#'>Welcome Guest</a>
  </li>";

                } else {
                    echo "
  <li class='nav-item'>
         <a class='nav-link' href='#'>Welcome " . $_SESSION['uname'] . "</a>
  </li>";
                }
                if (!isset($_SESSION['user'])) {
                    echo "
    <li class='nav-item'>
                    <a class='nav-link' href='L.php'> Login</a>
                </li>";

                } else {
                    echo "
    <li class='nav-item'>
                    <a class='nav-link' href='logout.php'> Log out</a>
                </li>";
                }
                ?>
            </ul>
        </nav>

        <!-- third -->
       
        <!-- fourth -->



        <section class="container py-5">
            
            <div class="row">
               
                 <table class="table table-bordered text-center">
        
                 <thead>
                     <?php
                 $sql="select * from cart";
                 $num=1;
                 $grand_total=0;
                  $result=mysqli_query($conn,$sql);
                 $num_rows=mysqli_num_rows($result);
                 if($num_rows > 0){
                   echo"
                   <tr>
                   <th>Sl No</th>
                   <th>Product Name</th>
                   <th>Product Image</th>
                   <th>Product Price</th>
                   <th>Quantity</th>
                   <th>Total Price</th>
                   <th>Action</th>
                   <tr>
           </thead>
           <tbody>";
           while ($row = mysqli_fetch_assoc($result)){
             $cart_id=$row['cart_id'];
             $p_id=$row['p_id'];
            
          ?>
          <tr>
                         <td><?php echo $num?>
                        <td><?php echo $row ['p_name'] ?></td>
                          <td><img src="./productimg/<?php echo $row ['image']?>" alt="" class="cart_img"></td>
                          <td>Rs.<?php echo $row['price']  ?>/-</td>
                          <!-- quantity -->
 
                          <form method="post">
                            <input type="hidden" value="<?php echo $row ['cart_id']?>" name="update_quantity_id">
                          <td>
                              <input type="number" min="1" name="update_value" value="<?php echo $row ['quantity']
                               ?>" >
                              <input type="submit" class="bg-info px-2 py-1 border-0 rounded-3" value="Update" 
                              name="update_product_quantity">
                          </td>
                          </form>
                          <!-- total Price -->
                          <?php
                          $number=0;
                          $format=number_format($number,2);
                         
                          ?>
                          <td>Rs.<?php echo $total=number_format($row['price']*$row['quantity'])?>/-</td>
                        
                          <td>
                         <!-- remove -->
                              <a href="cart.php?remove=<?php echo $row ['cart_id'] ?>" 
                              onclick="return confirm('Are You Sure You Want To Delete')">
                              <i class="fa-solid fa-trash"></i> </a>
                          </td>
                         
                      </tr>
         <?php
          // grandtotal
          $grand_total=$grand_total+($row['price']*$row['quantity']);
          $num++;
            }
              }else{
                     echo"<h2 class=' text-center text-danger'>Cart Is Empty<h2>";
                   
                  }
 
                     ?>
       
                   
                    
                 </tbody>
             </table>
             <?php
              if($grand_total>0){
                //  subtotal 
                echo"
              
                <div class='d-flex justify-content-between bg-dark p-3'>
                
                <a href='home.php'><button class='bg-info px-3 py-2 mx-3  rounded-3'>
                Continue shopping</button></a>

                   <h4 class='px-3 text-light'>Grandtotal:<strong class='text-primary'> $grand_total  /-</strong></h4>
 
                   <a href='checkout.php?grand= $grand_total '><button class='bg-info px-3 py-2 mx-3  rounded-3'>
                   Checkout</button></a>
              </div>
                ";
                ?>
                 <a class="text-decoration-none mt-2"  href="cart.php?deleteall" 
                  onclick="return confirm('Are You Sure You Want To Delete All ?')">
                 <i class="fa-solid fa-trash  "></i>Delete All </a>
 <?php
             }else{
           echo"
              <a href='home.php'><button class='bg-info px-3 py-2 mx-3  rounded-3'>
                   Continue shopping</button></a>
             ";
              }
             ?> 
           
 
 
 
 
         </div>
     </div>
 
              
            </div>
        </section>

        <!--fifth -->








        <!-- footer -->


        

        <!-- bootstrap js-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    </body>

    </html>

    

</body>

</html>





<!-- order -->



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
$sql="select * from cart where user_id=".$_SESSION['user'];
$result = mysqli_query($conn, $sql);
$data=mysqli_fetch_array($result);
$id=$_SESSION['user'];

?>
  <h3 class="text-success">All Orders</h3>
  <table class="table table-bordered mt-3">
    <thead class="bg-info">
    <tr>
      <th>Sl No</th>
      <th>Email</th>
      <th>Address</th>
      <th>Pincode</th>
      <th>Total Products</th>
      <th>total price</th>
      <th>Complete/Incomplete</th>
      <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
      <?php
$sql="select * from orders where user_id=$id";
$result=mysqli_query($conn,$sql);
$num=1;
while($row=mysqli_fetch_assoc($result)){
$id=$row['id'];
$user_id=$row['user_id'];
$p_id=$row['p_id'];
$name=$row['name'];
$phone_no=$row['phone_no'];
$email=$row['email'];
$address=$row['address'];
$pincode=$row['pincode'];
$total_products=$row['total_products'];
$total_price=$row['total_price'];
$status=$row['payment_status'];
if($status=='pending'){
  $status='Incomplete';
}else{
  $status='Complete';
}

echo"
<tr>
<td>$num</td>
<td>$email</td>
<td>$address</td>
<td>$pincode</td>
<td>$total_products</td>
<td>$total_price</td>
<td>$status</td>";
?>
<?php
if($status=='Complete'){
  echo"<td>Paid</td>";
}else{
 echo"<td><a href='payment.php?order_id=$id' class='text-light'>Confirm</a></td></tr>";
}
$num++;
}
      ?>
     
    </tbody>
  </table>
</body>
</html>