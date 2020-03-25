<?php
session_start();

include_once 'db_functions.php';
$db = new DB_Functions();


$db->add2Log($_SESSION['user_id'], $_SESSION['login_user'], "logged out", "");

if (session_destroy()) {
   header("Location: login.php");
}
