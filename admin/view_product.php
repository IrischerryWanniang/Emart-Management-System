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
$sql="select * from product";
$result=mysqli_query($conn,$sql);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo"<h2 class='text-danger text-center mt-5'>No Product Yet</h2>";
}else{echo"

    <th>Sl No</th>
    <th>Product Name</th>
    <th>Descriiption</th>
    <th>Image</th>
    <th>Price</th>
    <th>Keyword</th>
     <th>Edit</th>
    <th>Delete</th>
    <thead>
    <tbody class='bg-secondary text-light'>";
    $num=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $p_id=$row_data['p_id'];
        $p_name=$row_data['p_name'];
        $description=$row_data['description'];
        $p_img=$row_data['p_img'];
        $price=$row_data['price'];
        $p_keyword=$row_data['p_keyword'];
      $num++;
      echo"
      <tr>
          <td>$num</td>
          <td>$p_name</td>
          <td>$description</td>
          <td><img src='image/$p_img'class='product_img'> </td>
          <td>$price</td>
          <td> $p_keyword</td>
          
          <th><a href='dashboard.php?updateid=$p_id' class='text-info'> <i class='fa-solid fa-pen-to-square'></i></a></th>
      <th><a href='dashboard.php?deleteid=$p_id' class='text-danger'> <i class='fa-solid fa-trash'></i></a></th>
          
      </tr>";
    }
}
?>




        </tbody>
</table>