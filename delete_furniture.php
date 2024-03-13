<?php
include("connection.php");
include("session.php");

$furniture_id = $_GET['furniture_id'];

$delete = $con->query("DELETE FROM `furniture` WHERE `furniture_id` = '$furniture_id'");

if($delete){
    header("location:furnitures.php");
}

else{
    echo
    "
        <script>
            alert('Failed to Delete Furniture...');
        </script>
    ";
}

?>