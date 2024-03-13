<?php
include("connection.php");
include("session.php");
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
                        <a href="#">10</a>
                    </div>
                    <div class="dashboard-card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Furnitures:</h4>
                        <a href="#">10</a>
                    </div>
                    <div class="dashboard-card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Furnitures:</h4>
                        <a href="#">10</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>