<?php
session_start();
include("connection.php");

unset($_SESSION['cargo_manager']);
session_destroy();

header("Location: index.php");

?>