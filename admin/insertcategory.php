<?php
@session_start();
if (!isset($_SESSION['email'])) {
    header('Location: admin_login.php');
    exit(); // Add exit after header to stop script execution
}

include('../user/Connection.php');

if (isset($_POST['submit'])) {
    // Sanitize user input to prevent SQL injection
    $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
    $parentcat = isset($_POST['parentcat']) ? $_POST['parentcat'] : 0; // Set default value if not selected

    $sql = "INSERT INTO category (c_id, c_name) VALUES ('$parentcat', '$c_name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Inserted successfully')</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" class="mb-2">
        <div class="form-outline mb-2">
            <label class="form-label fw-bold">Category</label>
            <select name="parentcat">
                <option>None</option>
                <?php
                $sqldata = "SELECT * FROM category";
                $results = mysqli_query($conn, $sqldata);
                while ($row = mysqli_fetch_assoc($results)) {
                ?>
                    <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="text" name="c_name" id="c_name" class="form-control mb-2" placeholder="Enter Category Name" autocomplete="off" required>
        <input type="submit" name="submit" id="submit" class="btn btn-info mb-3 px-3" value="Insert">
    </form>
</body>

</html>
