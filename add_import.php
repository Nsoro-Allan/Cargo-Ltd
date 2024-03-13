<?php
include("connection.php");
include("session.php");

if(isset($_POST['add_import'])){
    $furniture_id=mysqli_real_escape_string($con,$_POST['furniture_id']);
    $import_date=mysqli_real_escape_string($con,$_POST['import_date']);
    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);

    $add=$con->query("INSERT INTO `import`(`furniture_id`,`import_date`,`quantity`) VALUES ('$furniture_id','$import_date','$quantity')");

    if($add){
        header("location:import.php");
    }

    else{
        echo "<script>alert('Failed to Add Import...')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Add Import</title>
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
                <h1>Add Import</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Furnitures:</label>
                    <select name="furniture_id">
                        <option>Select your furniture...</option>
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
                    <input type="date" name="import_date" required>

                    <label>Import Quantity</label>
                    <input type="text" name="quantity" placeholder="Enter Your Quantity..." required>
                    <button type="submit" name="add_import">Add Import...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>