<?php
include("connection.php");
include("session.php");

$furniture_id = $_GET['furniture_id'];

// Select Data
$select=$con->query("SELECT * FROM `furniture` WHERE `furniture_id`='$furniture_id'");

$row=mysqli_fetch_assoc($select);
$furniture_name=$row['furniture_name'];
$furniture_owner_name=$row['furniture_owner_name'];

// Edit Data
if(isset($_POST['edit_furniture'])){
    $furniture_name=mysqli_real_escape_string($con,$_POST['furniture_name']);
    $furniture_owner_name=mysqli_real_escape_string($con,$_POST['furniture_owner_name']);

    $update=$con->query("UPDATE `furniture` SET `furniture_name`='$furniture_name', `furniture_owner_name`='$furniture_owner_name' WHERE `furniture_id`='$furniture_id'");

    if($update){
        header("location:furnitures.php");
    }

    else{
        echo
        "
            <script>
                alert('Failed to update furniture...');
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
    <title>Cargo Ltd - Edit Furniture</title>
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
                <h1>Edit Furniture</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Furniture Name:</label>
                    <input type="text" name="furniture_name" value="<?php echo $furniture_name;?>">
                    <label>Furniture Owner Name:</label>
                    <input type="text" name="furniture_owner_name" value="<?php echo $furniture_owner_name;?>">
                    <button type="submit" name="edit_furniture">Edit Furniture...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>