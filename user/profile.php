<?php
include ('Connection.php');
include ('../admin/function/fetchfunction.php');
@session_start();

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



            <div class="row">
      <div class="col-md-2 p-0 ">
        <ul class="navbar-nav bg-secondary text-center">

          <li class="nav-item bg-info">
            <a class="nav-link " href="#">
              <h4>Your Profile</h4>
            </a>
          </li>


        

          <li class="nav-item ">
            <a class="nav-link text-light " href="profile.php?edit_account">Edit account</a>
          </li>

          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
          </li>

          <li class="nav-item ">
            <a class="nav-link text-light" href="logout.php">Logout</a>
          </li>

        </ul>
      </div>
      <div class="col-md-10 text-center">
        <?php

        get_user_order_details();
        if (isset($_GET['edit_account'])) {
          include ('edit_account.php');
        }
        if (isset($_GET['my_orders'])) {
          include ('user_orders.php');
        }
        if (isset($_GET['delete_account'])) {
          include ('delete_account.php');
        }
        ?>
      </div>
   <?php


get_user_order_details();
   ?>

      </div>

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