<?php
session_start();
unset($_SESSION['name_user']);
unset($_SESSION['name_id']);
unset($_SESSION['user']);
header("location: index.php");
?>