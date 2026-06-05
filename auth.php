<?php

session_start();

include '../db.php';

if(!isset($_SESSION['admin_id']))
{
    header("Location: admin_login.php");
    exit();
}
?>