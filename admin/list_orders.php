<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary">

<?php
$sql="select * from orders";
$result=mysqli_query($conn,$sql);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo"<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
}else{echo"

    <th>Sl No</th>
    <th>User id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Pincode</th>
    
    <th>Total Product</th>
    <th>Total price</th>
    <th>Delete</th>
    <thead>
    <tbody class='bg-secondary text-light'>";
    $num=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['id'];
        $user_id=$row_data['user_id'];
        $name=$row_data['name'];
        $email=$row_data['email'];
        $address=$row_data['address'];
        $pincode=$row_data['pincode'];
       
        $total_products=$row_data['total_products'];
        $total_price=$row_data['total_price'];
      $num++;
      echo"
      <tr>
          <td>$num</td>
          <td>$user_id</td>
          <td>$name</td>
          <td>$email</td>
          <td> $address</td>
          <td>$pincode</td>
         
          <td>$total_products</td>
          <td>$total_price</td>
          <td><a href='dashboard.php?delete_list_order=$order_id'class='text-danger'><i
          class='fa-solid fa-trash'></i></a></td>
          
      </tr>";
    }
}
?>




        </tbody>
</table>