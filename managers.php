<?php
include("connection.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Available Managers</title>
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
                <h1>All Managers</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <table>
                    <tr>
                        <th>Manager Name</th>
                        <th>Manager Password</th>
                        <th>Manager Email</th>
                        <th>Manager Tel</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `manager`");
                    if(mysqli_num_rows($select) > 0){
                    while($row = mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['tel'];?></td>
                        <td>
                            <a href="edit_manager.php?manager_id=<?php echo $row['manager_id'];?>">Edit</a>

                            <a href="delete_manager.php?manager_id=<?php echo $row['manager_id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php    
                    }
                    }
                    else{
                        echo "<h1>No Manager Available...</h1>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>