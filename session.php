<?php
session_start(); 
include("connection.php");

if(!isset($_SESSION['cargo_manager'])){
    header("Location: index.php?=Loggin First...");
}

?>