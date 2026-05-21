<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<h3 class="text-center text-success">All Payment</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary">

<?php
$sql="select * from payment";
$result=mysqli_query($conn,$sql);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo"<h2 class='text-danger text-center mt-5'>No Payment Receive Yet</h2>";
}else{
    echo"

    <th>Sl No</th>
    <th>Order id</th>
    <th>Total price</th>
    <th>Payment Mode</th>
    <th>Delete</th>
    <thead>
    <tbody class='bg-secondary text-light'>";
    $num=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $id=$row_data['payment_id'];
        $order_id=$row_data['id'];
        $total_price=$row_data['total_price'];
        $payment_mode=$row_data['payment_mode'];
      $num++;
      echo"
      <tr>
          <td>$num</td>
          <td> $order_id</td>
          <td>$total_price</td>
          <td>$payment_mode</td>
          <th><a href='dashboard.php?deletepayment=$id' class='text-danger'> <i
                        class='fa-solid fa-trash'></i></a></th>
          
      </tr>";
   
   
        //  <a href="cart.php?remove=<?php echo $row ['cart_id'] " 
        //  onclick="return confirm('Are You Sure You Want To Delete')">
         }     //  <i class="fa-solid fa-trash"></i> </a>
 
}
?>




        </tbody>
</table>