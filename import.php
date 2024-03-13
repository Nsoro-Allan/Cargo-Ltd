<?php
include("connection.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Import</title>
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
                <h1>Imported Fruniture</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <div class="buttons">
                    <a href="add_import.php">Add Import...</a>
                </div>
                <table>
                    <tr>
                        <th>Furniture Name</th>
                        <th>Import Date</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `import`");
                    if(mysqli_num_rows($select) > 0){
                    while($row = mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php
                         $view=$con->query("SELECT furniture_name FROM furniture WHERE furniture_id=".$row['furniture_id']);
                         $one=mysqli_fetch_assoc($view);
                         $furniture_name=$one['furniture_name'];
                         echo $furniture_name;
                         ?></td>
                        <td><?php echo $row['import_date'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td>
                            <a href="edit_import.php?import_id=<?php echo $row['import_id'];?>">Edit</a>

                            <a href="delete_import.php?import_id=<?php echo $row['import_id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php    
                    }
                    }
                    else{
                        echo "<h1>No Import Available...</h1>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>