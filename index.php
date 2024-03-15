<?php
    session_start();
    include("connection.php");
    if(!isset($_SESSION['cargo_manager'])){
        header("Location: login.php?msg=Loggin First...");
    }

    else{
        header("Location: dashboard.php");
    }
?>