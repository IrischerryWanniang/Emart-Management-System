<?php
include('../user/Connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
     <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="Css/dashboard.css">
</head>
<style>
    .product_img{
        width: 70px;
        object-fit: contain;
    }
</style>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="">EVENT</a>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="admin_registrattion.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="row">
    <div class="col-md-12 bg-secondary p-4">
    <div class="button text-center">
        <button><a href="insertproduct.php" class="nav-link text-light bg-info my-1">insert product</a></button>
        <button><a href="dashboard.php?view_product" class="nav-link text-light bg-info my-1">view product</a></button>
        <button><a href="dashboard.php?insert_category" class="nav-link text-light bg-info my-1">insert category</a></button>
        <button><a href="dashboard.php?view_category"class="nav-link text-light bg-info my-1">view category</a></button>
        <button><a href="dashboard.php?list_orders" class="nav-link text-light bg-info my-1">view order</a></button>
        <button><a href="dashboard.php?list_payment" class="nav-link text-light bg-info my-1">view payment</a></button>
        <button><a href="dashboard.php?list_users" class="nav-link text-light bg-info my-1">view user</a></button>
       
       
</div>
    </div>    
    <div>
   
    <div class="container my-5">
        <?php 
        if(isset($_GET['insert_category'])){
            include('insertcategory.php');
        }
        if(isset($_GET['view_product'])){
            include('view_product.php');
        }
        if(isset($_GET['updateid'])){
            include('update_view.php');
        }
        if(isset($_GET['deleteid'])){
            include('delete_view.php');
        }
        if(isset($_GET['view_category'])){
            include('view_category.php');
        }
        if(isset($_GET['updatecategory'])){
            include('update_category.php');
        }
        if(isset($_GET['deletecategory'])){
            include('delete_category.php');
        } 
         if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['list_payment'])){
            include('list_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }  
        if(isset($_GET['deletepayment'])){
          include('delete_payment.php');
      }
      if(isset($_GET['delete_list_order'])){
        include('delete_list_orders.php');
    }
   
    
        ?>
    </div>
     <!-- bootstrap js-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
     crossorigin="anonymous"></script>
</body>
<!-- <th><a href='dashboard.php?updateid=<?php echo $id;?>' class='text-info'> <i class='fa-solid fa-pen-to-square'></i></a></th>
      <th><a href='dashboard.php?deleteid=<?php echo $id;?>' class='text-danger'> <i class='fa-solid fa-trash'></i></a></th> -->
</html>


