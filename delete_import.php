<?php
include("connection.php");
include("session.php");

$import_id = $_GET['import_id'];

$delete = $con->query("DELETE FROM `import` WHERE `import_id` = '$import_id'");

if($delete){
    header("location:import.php");
}

else{
    echo
    "
        <script>
            alert('Failed to Delete import...');
        </script>
    ";
}

?>