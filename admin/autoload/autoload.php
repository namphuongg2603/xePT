<?php
session_start();
require_once __DIR__ . "/../../libraries/database.php";
require_once __DIR__ . "/../../libraries/Function.php";

$db = new Database;


if (!isset($_SESSION['admin_id'])) {
    $urlLogin = base_url(). '/login';
    header($urlLogin);
}

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . "/xehaidang/public/uploads/");

$sqlmennu = "SELECT * FROM menu ORDER BY updated_at";
$MENULIST = $db->fetchsql($sqlmennu);
?>
