<?php
include ('Connection.php');
include ('../admin/function/fetchfunction.php');
@session_start();


if(isset($_GET['order_id'])){
    $order_id=($_GET['order_id']);
    $sql="select * from orders where id=$order_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
   
    $amount=$row['total_price'];

}
if(isset($_POST['confirm_payment'])){
   
    $amount=$_POST['amount'];
    $payment=$_POST['payment'];
    $sql="insert into payment(id,total_price,payment_mode) 
    values ('$order_id','$amount','$payment')";
    $result_query=mysqli_query($conn,$sql);
    if($result_query){
        echo"<h3 class='text-center text-light'>complete sucessfully</h3>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_order="update orders set payment_status='Complete' where id=' $order_id'";
    $result_update=mysqli_query($conn,$update_order);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="Css/styles.css">

</head>
<body class="bg-secondary">
    
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
        <form method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label class="text-light">Order id</label>
                <input type="text"class="form-control w-50 m-auto" name="invoice" value="<?php  echo $order_id ?>" readonly>
            </div>
             <div class="form-outline my-4 text-center w-50 m-auto">
                <label class="text-light">Amount</label>
                <input type="text"class="form-control w-50 m-auto" name="amount" value="<?php  echo $amount ?>"readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
               <select name="payment" class="form-select w-50 m-auto">
                <option disabled>Select Payment Mode</option>
                <option >UPI</option>
                <option>Net Banking</option>
                <option>Paypal</option>
                <option>COD</option>

               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
              <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
</form>
    </div>
</body>
</html>




