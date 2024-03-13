<?php
include("connection.php");
include("session.php");

$export_id = $_GET['export_id'];

$delete = $con->query("DELETE FROM `export` WHERE `export_id` = '$export_id'");

if($delete){
    header("location:export.php");
}

else{
    echo
    "
        <script>
            alert('Failed to Delete Export...');
        </script>
    ";
}

?>