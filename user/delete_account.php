 <h3 class="text-danger mb-4">Delete Account</h3>
    <form method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit"class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit"class="form-control w-50 m-auto" name="dont_delete" value=" Don't Delete Account">
        </div>
    </form>


    <?php
    $username=$_SESSION['uname'];
    if(isset($_POST['delete'])){
        $query="delete from user where user_name='$username'";
        $result=mysqli_query($conn,$query);
        if($result){
            session_destroy();
            echo"<script>alert('Delete sucessfully')</script>";
            echo"<script>window.open('home.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo"<script>window.open('profile.php','_self')</script>";
    }
    ?>
