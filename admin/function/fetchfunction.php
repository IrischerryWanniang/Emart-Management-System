<?php
include ('../user/Connection.php');

//display product
function getcard(){
    global $conn;
if(!isset($_GET['category'])){
    $sql = "select * from product order by rand() limit 0,6";
    $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)){
        $P_id=$row['p_id'];
        $product_name = $row['p_name'];
        $description = $row['description'];
        $img = $row['p_img'];
        $c_id= $row['c_id'];
        $price = $row['price'];
        echo"<div class='col-md-4 mb-2'>
        <form method='post' action=''>
        <div class='card'>
          <img src='../admin/image/$img'class='card-img-top' alt='$product_name' >
          <div class='card-body text-center'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>$description.</p>
            <p class='card-text'>Price:$price/-</p>
            <input type='hidden'  name='pid' value=' $P_id' readonly >
            <input type='hidden' name='name' value='$product_name' readonly>
            <input type='hidden' name='price' value= '$price' readonly>
            <input type='hidden' name='description' value=' $description' readonly>
            <input type='hidden' name='image' value='$img' readonly>
            <button type='submit' class='btn btn-info' name='add_to_cart'>Add To Cart</button>
            
          </div>
        </div>
        </form>
      </div>";
      }
      

      }
    }
 
// //display categries
function getcategory()
{
    global $conn;
    $sql="select * from `category`";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)) {
        $category_name=$row['c_name'];
        $category_id=$row['c_id'];
        echo"
        <a class='dropdown-item dropdown-toggle'
         href='home.php?category=$category_id'>
        $category_name</a>
        ";
    }
  }
 
// echo "<li class='nav-item '> 
// <a href='index.php?category=$category_id' 
// class='nav-link  text-center'>$category_name</a>
// </li>";
//  }
//getting unique categories
function unique_categories(){ 
  global $conn;

  //condition to check for isset
  if(isset($_GET['category'])){
    $category_id=$_GET['category'];
      $sql = "select * from product where c_id=$category_id";
      $result = mysqli_query($conn, $sql);
      $num=mysqli_num_rows($result);
      if($num==0){
        echo"<h2 class='text-center text-danger'>No Stock For This Category<h2>";
      }
        while ($row = mysqli_fetch_assoc($result)) {
          $P_id=$row['p_id'];
          $product_name = $row['p_name'];
          $description = $row['description'];
          $img = $row['p_img'];
          $c_id= $row['c_id'];
          $price = $row['price'];
          echo"<div class='col-md-4 mb-2'>
        <form method='post' action=''>
        <div class='card'>
          <img src='../admin/image/$img'class='card-img-top' alt='$product_name' >
          <div class='card-body text-center'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>$description.</p>
            <p class='card-text'>Price:$price/-</p>
            <input type='hidden'  name='pid' value=' $P_id' readonly >
            <input type='hidden' name='name' value='$product_name' readonly>
            <input type='hidden' name='price' value= '$price' readonly>
            <input type='hidden' name='description' value=' $description' readonly>
            <input type='hidden' name='image' value='$img' readonly>
            <button type='submit' class='btn btn-info' name='add_to_cart'>Add To Cart</button>
            
          </div>
        </div>
        </form>
      </div>";
       
   
      }
      } 
    
      }
 
// search product
function search_product(){
  global $conn;
 if(isset($_GET['search_product'])){
       $search_data=$_GET['search_data'];
  
        $search_query = "select * from product where P_keyword like'%$search_data%'";
        $result = mysqli_query($conn, $search_query);
        $num=mysqli_num_rows($result);
      if($num==0){
        echo"<h2 class=' text-center text-danger'>Result Doesn't Match<h2>";
      }
        while ($row = mysqli_fetch_assoc($result)) {
            $P_id=$row['p_id'];
            $product_name = $row['p_name'];
            $description = $row['description'];
            $img = $row['p_img'];
            $c_id= $row['c_id'];
            $price = $row['price'];
            echo"<div class='col-md-4 mb-2'>
        <form method='post' action=''>
        <div class='card'>
          <img src='../admin/image/$img'class='card-img-top' alt='$product_name' >
          <div class='card-body text-center'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>$description.</p>
            <p class='card-text'>Price:$price/-</p>
            <input type='hidden'  name='pid' value=' $P_id' readonly >
            <input type='hidden' name='name' value='$product_name' readonly>
            <input type='hidden' name='price' value= '$price' readonly>
            <input type='hidden' name='description' value=' $description' readonly>
            <input type='hidden' name='image' value='$img' readonly>
            <button type='submit' class='btn btn-info' name='add_to_cart'>Add To Cart</button>
            
          </div>
        </div>
        </form>
      </div>";
        }
      
      }
    }
    //display_all_product
    function get_all_product(){
      global $conn;

      //condition to check for isset
      if(!isset($_GET['category'])){
     
          $sql = "select * from product order by rand() ";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
              $P_id=$row['p_id'];
              $product_name = $row['p_name'];
              $description = $row['description'];
              $img = $row['p_img'];
              $c_id= $row['c_id'];
              $price = $row['price'];
              echo"<div class='col-md-4 mb-2'>
        <form method='post' action=''>
        <div class='card'>
          <img src='../admin/image/$img'class='card-img-top' alt='$product_name' >
          <div class='card-body text-center'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>$description.</p>
            <p class='card-text'>Price:$price/-</p>
            <input type='hidden'  name='pid' value=' $P_id' readonly >
            <input type='hidden' name='name' value='$product_name' readonly>
            <input type='hidden' name='price' value= '$price' readonly>
            <input type='hidden' name='description' value=' $description' readonly>
            <input type='hidden' name='image' value='$img' readonly>
            <button type='submit' class='btn btn-info' name='add_to_cart'>Add To Cart</button>
            
          </div>
        </div>
        </form>
      </div>";
       
          }
          }
        }


function cart() {
  if(isset($_POST['add_to_cart']) && isset($_SESSION['user'])){
      $uid = $_SESSION['user'];
      global $conn;
      $id = $_POST['pid'];
      $product_name = $_POST['name'];
      $image = $_POST['image'];
      $price = $_POST['price'];
      $quantity = 1;

      $sql = "SELECT * FROM cart WHERE p_id = '$id' AND user_id = '$uid'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);

      if($num > 0){
          echo "<script>alert('This Item Is Already Added Inside Cart')</script>";
          echo "<script>window.open('_self')</script>";
      } else {
          $sql1 = "INSERT INTO cart(user_id, p_id, p_name, price, image, quantity)
     VALUES ('$uid', '$id', '$product_name', '$price', '$image', '$quantity')";
          $result1 = mysqli_query($conn, $sql1);
          echo "<script>alert('Item Added To Cart')</script>";
          echo "<script>window.open('_self')</script>";
      }
  }
}


 //get cart item number

function cart_item(){
    global $conn;
    
    $sql="select * from cart" or die('query failed');
    $result=mysqli_query($conn,$sql);
    $count_cart_item=mysqli_num_rows($result);
     echo $count_cart_item;
  }
// function user_order
function get_user_order_details(){
  global $conn;
  $sql="select * from cart where user_id=".$_SESSION['user'];
  $result = mysqli_query($conn, $sql);
  $data=mysqli_fetch_array($result);

  $name=$_SESSION['user'];
  $sql="select * from user where user_name=$name";
  $result=mysqli_query($conn,$sql);
  while($row_query=mysqli_fetch_array($result)){
  $id=$row_query['user'];
  if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
      if(!isset($_GET['delete_account'])){

        $get_orders="select * from orders where user_id=$id and order_status='pending'";
        $result_query=mysqli_query($conn,$get_orders);
        $row=mysqli_num_rows( $result_query);
        if($row>0){
          echo "<h3 class='text-center'>you have <span class='text-danger'>$row</span>pending orders</h3>
          <p><a href='profile.php?my_orders'>Order Details</a></p>";
      
        }else{
          echo"<h3 class='text-danger text-success mt-5 mb-2'>Zero Pending  Orders</h3>
          <p class='text-center'><a href='home.php' class='text-dark'>Explore product</a></p>";
        }
      }

    }
  }

  }
}


















// if(isset($_GET['user_id'])){
//   $user_id=$_GET['$user_id'];


// }
// // getting total items and total price of item
// $id=$_SESSION['user'];
// $total_price=0;
// $sql="select * from cart where user_id=$id";
// $result=mysqli_query($conn,$sql);
// $invoice_number=mt_rand();
// $status='pending';
// $count_product=mysqli_num_rows($result);
// while($row_price=mysqli_fetch_array($result)){
//    $product_id=$row_price['p_id'];

//    $sql1="select * from product where p_id=$product_id";
//     $result1=mysqli_query($conn,$sql1);
//     while($row_product_price=mysqli_fetch_array($result1)){
//        $product_price=array($row_product_price['price']);
//        $product_values=array_sum($product_price);
//        $total_price+=$product_values;

//     }

// }
// // getting quantity from cart

// $sql="select * from cart";
// $result=mysqli_query($conn,$sql);
// $get_quantity=mysqli_fetch_array($result);
// $quantity=$get_quantity['quantity'];
// if($quantity==0){
//    $quantity=1;
//    $subtotal=$total_price;
// }else{
//   $cart_quantity=$quantity;
//   $subtotal=$total_price *$cart_quantity;

// }
// $insert_query="insert into user_order(user_id,p_id,amount_due,invoice_number,
// total_product,order_status) values($user_id,$subtotal,$product_id,$invoice_number,
// $count_product,'$status')";
// $result_query=mysqli_query($conn,$insert_query);
// if($result_query)
 


