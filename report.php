<?php
include("connection.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Report</title>
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
            <h1>Cargo Ltd Report</h1>
            <div class="line"></div>
        </div>

        <div class="right-content">
            <div class="buttons">
                <a href="#" onclick="print()">Print Report...</a>
            </div>
            <table>
                <tr>
                    <th>Furniture Name</th>
                    <th>Furniture Owner Name</th>
                    <th>Total Import Quantity</th>
                    <th>Total Export Quantity</th>
                </tr>
                <?php
                // Query to get the report data
                $query = "SELECT f.furniture_name, f.furniture_owner_name, 
                        COALESCE(SUM(i.quantity), 0) AS total_import_quantity,
                        COALESCE(SUM(e.quantity), 0) AS total_export_quantity
                        FROM furniture f
                        LEFT JOIN import i ON f.furniture_id = i.furniture_id
                        LEFT JOIN export e ON f.furniture_id = e.furniture_id
                        GROUP BY f.furniture_id";

                $result = $con->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['furniture_name']; ?></td>
                            <td><?php echo $row['furniture_owner_name']; ?></td>
                            <td><?php echo $row['total_import_quantity']; ?></td>
                            <td><?php echo $row['total_export_quantity']; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No Report Available...</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
