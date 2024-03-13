<?php
include("connection.php");
include("session.php");
include("calculations.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Dashboard</title>
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
                <h1>Dashboard</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <div class="right-content-title">
                    <h1>Hi, <?php echo $_SESSION['cargo_manager'];?>...</h1>
                    <div class="long-line"></div>
                </div>
                <div class="dashboard-card-container">
                    <div class="dashboard-card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Furnitures:</h4>
                        <a href="./furnitures.php"><?php echo $total_furniture;?></a>
                    </div>
                    <div class="dashboard-card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Imports:</h4>
                        <a href="./import.php"><?php echo $total_imports;?></a>
                    </div>
                    <div class="dashboard-card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Exports:</h4>
                        <a href="./export.php"><?php echo $total_exports;?></a>
                    </div>
                    <div class="dashboard-card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Managers:</h4>
                        <a href="./managers.php"><?php echo $total_managers;?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>