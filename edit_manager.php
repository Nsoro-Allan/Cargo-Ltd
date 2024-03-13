<?php
include("connection.php");
include("session.php");

$manager_id = $_GET['manager_id'];

// Select Data
$select=$con->query("SELECT * FROM `manager` WHERE `manager_id`='$manager_id'");

$row=mysqli_fetch_assoc($select);
$username=$row['username'];
$password=$row['password'];
$email=$row['email'];
$tel=$row['tel'];

// Edit Data
if(isset($_POST['edit_manager'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $tel=mysqli_real_escape_string($con,$_POST['tel']);

    $update=$con->query("UPDATE `manager` SET `username`='$username',`password`='$password',`email`='$email',`tel`='$tel' WHERE `manager_id`='$manager_id'");

    if($update){
        header("location:managers.php");
    }

    else{
        echo
        "
            <script>
                alert('Failed to update manager...');
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
    <title>Cargo Ltd - Edit Manager</title>
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
                <h1>Edit Manager</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Userame:</label>
                    <input type="text" name="username" value="<?php echo $username;?>">
                    <label>Password:</label>
                    <input type="text" name="password" value="<?php echo $password;?>">
                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo $email;?>">
                    <label>Tel:</label>
                    <input type="text" name="tel" value="<?php echo $tel;?>">
                    <button type="submit" name="edit_manager">Edit Manager...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>