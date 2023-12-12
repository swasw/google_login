<?php
session_start();
global $conn;
require_once 'dbutil.php';

foreach ($_POST as $key => $value) {
    $sql = "update user set $key=? where nim=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $value, $_COOKIE['nim']);
    $stmt->execute();
}

header('Location: dashboard.php');