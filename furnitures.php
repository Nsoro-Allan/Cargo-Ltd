<?php
include("connection.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Furnitures</title>
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
                <h1>All Furnitures</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <div class="buttons">
                    <a href="add_furniture.php">Add Furniture...</a>
                </div>
                <table>
                    <tr>
                        <th>Furniture Name</th>
                        <th>Furniture Owner Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `furniture`");
                    if(mysqli_num_rows($select) > 0){
                    while($row = mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php echo $row['furniture_name'];?></td>
                        <td><?php echo $row['furniture_owner_name'];?></td>
                        <td>
                            <a href="edit_furniture.php?furniture_id=<?php echo $row['furniture_id'];?>">Edit</a>

                            <a href="delete_furniture.php?furniture_id=<?php echo $row['furniture_id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php    
                    }
                    }
                    else{
                        echo "<h1>No Furniture Available...</h1>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>