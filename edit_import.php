<?php
include("connection.php");
include("session.php");

$import_id = $_GET['import_id'];

// Select Data
$select=$con->query("SELECT * FROM `import` WHERE `import_id`='$import_id'");
$row=mysqli_fetch_assoc($select);
$furniture_id=$row['furniture_id'];
$import_date=$row['import_date'];
$quantity=$row['quantity'];

// Update Data
if(isset($_POST['edit_import'])){
$furniture_id=mysqli_real_escape_string($con,$_POST['furniture_id']);    
$import_date=mysqli_real_escape_string($con,$_POST['import_date']);    
$quantity=mysqli_real_escape_string($con,$_POST['quantity']);    

$update=$con->query("UPDATE `import` SET `furniture_id`='$furniture_id',`import_date`='$import_date',`quantity`='$quantity' WHERE `import_id`='$import_id'");

if($update){
    header("location:import.php");
}

else{
    echo "<script>alert('Failed to Update Import...')</script>";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Edit Import</title>
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
                <h1>Edit Import</h1>
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

                    <label>Import Date</label>
                    <input type="text" name="import_date" value="<?php echo $import_date;?>">

                    <label>Import Quantity</label>
                    <input type="text" name="quantity" value="<?php echo $quantity;?>">
                    <button type="submit" name="edit_import">Edit Import...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>