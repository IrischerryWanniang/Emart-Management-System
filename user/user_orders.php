<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .order-details-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.order-details {
    flex: 1 1 calc(50% - 20px); /* Two boxes in a row with a gap of 20px */
    max-width: calc(50% - 20px); /* Limit the width of each box */
    border: 2px solid #000;
    background-color: #f2f2f2;
    padding: 20px;
}

.order-details .confirm-link {
  .order-details .confirm-link {
    color: green;
}
}

.bg-info {
    background-color: #17a2b8;
    color: #fff;
}

.bg-secondary {
    background-color: #6c757d;
    color: #fff;
}

    </style>
</head>
<body>
<?php
$sql="select * from cart where user_id=".$_SESSION['user'];
$result = mysqli_query($conn, $sql);
$data=mysqli_fetch_array($result);
$id=$_SESSION['user'];
?>
<h3 class="text-success">All Orders</h3>
<div class="order-details-container">
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
        } else {
            $status='Complete';
        }
    ?>
    <div class="order-details">
        <strong>Order #<?= $num ?></strong>
        <div>Email: <?= $email ?></div>
        <div>Address: <?= $address ?></div>
        <div>Pincode: <?= $pincode ?></div>
        <div>Total Products: <?= $total_products ?></div>
        <div>Total Price: <?= $total_price ?></div>
        <div>Status: <?= $status ?></div>
        <?php if($status == 'Incomplete') { ?>
            <div><a href='payment.php?order_id=<?= $id ?>' class='text-success confirm-link'>Confirm Payment</a></div>
        <?php } else { ?>
            <div>Paid</div>
        <?php } ?>
    </div>
    <?php
        $num++;
    }
    ?>
</div>
</body>
</html>
