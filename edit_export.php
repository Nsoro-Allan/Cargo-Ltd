<?php
include("connection.php");
include("session.php");

$export_id = $_GET['export_id'];

// Select Data
$select=$con->query("SELECT * FROM `export` WHERE `export_id`='$export_id'");
$row=mysqli_fetch_assoc($select);
$furniture_id=$row['furniture_id'];
$export_date=$row['export_date'];
$quantity=$row['quantity'];

// Update Data
if(isset($_POST['edit_export'])){
$furniture_id=mysqli_real_escape_string($con,$_POST['furniture_id']);    
$export_date=mysqli_real_escape_string($con,$_POST['export_date']);    
$quantity=mysqli_real_escape_string($con,$_POST['quantity']);    

$update=$con->query("UPDATE `export` SET `furniture_id`='$furniture_id',`export_date`='$export_date',`quantity`='$quantity' WHERE `export_id`='$export_id'");

if($update){
    header("location:export.php");
}

else{
    echo "<script>alert('Failed to Update export...')</script>";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Edit Export</title>
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
                <h1>Edit Export</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Furnitures:</label>
                    <input type="text" style="color:black;" value="<?php
                         $view=$con->query("SELECT furniture_name FROM furniture WHERE furniture_id=".$row['furniture_id']);
                         $one=mysqli_fetch_assoc($view);
                         $furniture_name=$one['furniture_name'];
                         echo $furniture_name;
                         ?>" disabled>
                    <label>New Furnitures:</label>
                    <select name="furniture_id">
                        <option value="<?php echo $furniture_id;?>">Select your furniture...</option>
                        <?php
                        $select=$con->query("SELECT * FROM `furniture`");
                        while($row=mysqli_fetch_assoc($select)){
                        $furniture_id=$row['furniture_id'];
                        $furniture_name=$row['furniture_name'];
                        ?>
                        <option value="<?php echo $furniture_id;?>"><?php echo $furniture_name;?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <label>export Date</label>
                    <input type="text" name="export_date" value="<?php echo $export_date;?>">

                    <label>export Quantity</label>
                    <input type="text" name="quantity" value="<?php echo $quantity;?>">
                    <button type="submit" name="edit_export">Edit export...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>