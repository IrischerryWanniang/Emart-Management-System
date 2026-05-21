<?php
include ('Connection.php');
include ('../admin/function/fetchfunction.php');
session_start();

if(isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
    
    if(isset($_POST['order_btn'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $street = $_POST['address'];
        $pin_code = $_POST['pin_code'];

        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` where user_id=$user_id");
        $price_total = 0;
        $product_name = [];

        if(mysqli_num_rows($cart_query) > 0) {
            while($product_item = mysqli_fetch_assoc($cart_query)) {
                $product_name[] = $product_item['p_name'] . ' (' . $product_item['quantity'] . ')';
                $product_price = $product_item['price'] * $product_item['quantity'];
                $price_total += $product_price;
            }
        }

        $total_product = implode(',', $product_name);
        $detail_query = mysqli_query($conn, "INSERT INTO `orders` (user_id, p_id, name, phone_no, email, address, pincode, total_products, total_price) VALUES
        ('$user_id', '$p_id', '$name', '$number', '$email', '$street', '$pin_code', '$total_product', '$price_total')") or die('query failed');

        if($detail_query) {
            echo "<script>alert('order successful')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }

        // Delete items from cart
        $sql = "DELETE FROM cart WHERE user_id=$user_id";
        $result = mysqli_query($conn, $sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/checkout.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <section class="checkout-form">
            <form action="" method="post">
                <div class="display-order">
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id=$user_id");
                    $grand_total = 0;
                    if(mysqli_num_rows($select_cart) > 0) {
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                            echo "<span>{$fetch_cart['p_name']} ({$fetch_cart['quantity']})</span>";
                            $grand_total += $total_price;
                        }
                    } else {
                        echo "<div class='display-order'><span>Your cart is empty!</span></div>";
                    }
                    ?>
                    <span class="grand-total">Grand total: <?= $grand_total; ?>/-</span>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Username</span>
                        <input type="text" name="name" class="fw-bold" required>
                    </div>
                    <div class="inputBox">
                        <span>Phone number</span>
                        <input type="text" name="number" min="0" maxlength="10" class="fw-bold" required>
                    </div>
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="text" name="email" class="fw-bold" required>
                    </div>
                    <div class="inputBox">
                        <span>Address</span>
                        <input type="text" name="address" class="fw-bold" required>
                    </div>
                    <div class="inputBox">
                        <span>Pin code</span>
                        <input type="text" placeholder="e.g. 123456" name="pin_code" class="fw-bold" required>
                    </div>
                </div>
                <div>
                    <input type="submit" value="Place Order" name="order_btn" class="btn">
                </div>
            </form>
        </section>
    </div>
    <!-- bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
