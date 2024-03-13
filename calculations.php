<?php
// Total Furniture
$query = "SELECT COUNT(*) AS total_furniture FROM `furniture`";
$row=mysqli_fetch_assoc(mysqli_query($con,$query));
$total_furniture=$row['total_furniture'];

// Total Imports
$query = "SELECT COUNT(*) AS total_imports FROM `import`";
$row=mysqli_fetch_assoc(mysqli_query($con,$query));
$total_imports=$row['total_imports'];

// Total Exports
$query = "SELECT COUNT(*) AS total_exports FROM `export`";
$row=mysqli_fetch_assoc(mysqli_query($con,$query));
$total_exports=$row['total_exports'];

// Total Managers
$query = "SELECT COUNT(*) AS total_managers FROM `manager`";
$row=mysqli_fetch_assoc(mysqli_query($con,$query));
$total_managers=$row['total_managers'];
?>