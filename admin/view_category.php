<?php
 @session_start();
 if(!isset($_SESSION['email'])){
  header('Location:admin_login.php');
};
?> 
<?php
include('../user/Connection.php');

?>
<h3 class="text-center text-success">All Category</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary">
        <tr>
            <th>Sl No</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
           $sql="select * from `category`";
           $result=mysqli_query($conn,$sql);
           $num=0;
           while($row=mysqli_fetch_assoc($result)) {
               $category_name=$row['c_name'];
               $category_id=$row['c_id'];
              $num++;
          
        ?>
        <tr class="text-center">
            <th><?php echo $num;?></th>
            <th><?php echo $category_name;?></th>
            <th><a href='dashboard.php?updatecategory=<?php echo $category_id; ?>' class='text-info'> <i
                        class='fa-solid fa-pen-to-square'></i></a></th>
            <th><a href='dashboard.php?deletecategory=<?php echo $category_id; ?>' class='text-danger'> <i
                        class='fa-solid fa-trash'></i></a></th>
        </tr>
        <?php
         }
         ?>
    </tbody>
</table>