<?php
include("connection.php");
include("session.php");

$manager_id = $_GET['manager_id'];

$delete = $con->query("DELETE FROM `manager` WHERE `manager_id` = '$manager_id'");

if($delete){
    header("location:managers.php");
}

else{
    echo
    "
        <script>
            alert('Failed to Delete Manager...');
        </script>
    ";
}

?>