<div class="dashboard-left">
    <div class="head">
        <img src="./imgs/icon.ico" Title="Cargo Furnitures Ltd...">
        <h1>Cargo Furnitures Ltd</h1>
        <div class="line"></div>
    </div>
    <div class="links">
        <a href="./dashboard.php"><img src="./imgs/dashboard.ico"> Dashboard</a>
        <a href="./furnitures.php"><img src="./imgs/furniture.ico"> Furniture</a>
        <a href="./import.php"><img src="./imgs/import.ico"> Import</a>
        <a href="./export.php"><img src="./imgs/export.ico"> Export</a>
        <a href="./report.php"><img src="./imgs/report.ico"> Report</a>
        <a href="./managers.php"><img src="./imgs/managers.ico"> Managers</a>
        <a href="./account_settings.php"><img style="width:10%;" src="./imgs/settings.ico"> Account Settings</a>
    </div>
    <div class="end">
        <p><?php echo $_SESSION['cargo_manager'];?></p>
        <a href="./logout.php">Logout</a>
    </div>
</div>