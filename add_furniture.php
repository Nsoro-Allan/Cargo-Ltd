<?php
include("connection.php");
include("session.php");

    if(isset($_POST['add_furniture'])){
        $furniture_name=mysqli_real_escape_string($con,$_POST['furniture_name']);
        $furniture_owner_name=mysqli_real_escape_string($con,$_POST['furniture_owner_name']);

        $add=$con->query("INSERT INTO `furniture`(`furniture_name`, `furniture_owner_name`) VALUES ('$furniture_name','$furniture_owner_name')");

        if($add){
            header("location:furnitures.php");
        }

        else{
            echo
            "
                <script>
                    alert('Failed to Add Furniture...');
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Add Furniture</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
</head>
<body>
    <div class="dashboard-container">
        <?php
            include("sidebar.php");
        ?>
        <div class="dashboard-right">
            <div class="right-title">
                <h1>Add Furniture</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Furniture Name:</label>
                    <input type="text" name="furniture_name" placeholder="Enter Furniture Name..." required>
                    <label>Furniture Owner Name:</label>
                    <input type="text" name="furniture_owner_name" placeholder="Enter Furniture Owner Name..." required>
                    <button type="submit" name="add_furniture">Add Furniture...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>