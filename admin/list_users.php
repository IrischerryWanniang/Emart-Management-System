<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary">

<?php
$sql="select * from user";
$result=mysqli_query($conn,$sql);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo"<h2 class='text-danger text-center mt-5'>No User Yet</h2>";
}else{
    echo"

    <th>Sl No</th>
    <th>Username</th>
    <th>Email</th>
   
  
    <th>Delete</th>
    <thead>
    <tbody class='bg-secondary text-light'>";
    $num=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $id=$row_data['user_id'];
        $name=$row_data['user_name'];
        $email=$row_data['email'];
    
      $num++;
      echo"
      <tr>
          <td>$num</td>
          <td>  $name</td>
          <td> $email</td>
         
          <th><a href='dashboard.php?deleteuser=$id' class='text-danger'> <i
                        class='fa-solid fa-trash'></i></a></th>
          
      </tr>";
          } 
}
?>




        </tbody>
</table>