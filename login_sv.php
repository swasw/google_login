<?php
session_start();
include 'dbutil.php';
global $conn;
//$_POST = array_map('trim', $_POST);
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $stmt = $conn->prepare('SELECT * from user where username = ?');

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $res = $stmt->get_result();
    if($row=$res->fetch_assoc()) {
        if(password_verify($_POST['password'], $row['password'])) {
            $_SESSION['nim'] = $row['nim'];
            setcookie('nim', $row['nim'], time() + (86400 * 30));
            header('Location: dashboard.php');
        } else {
            $_SESSION['login-error'] = 'Invalid password.';
            header('Location: login.php');
        }
    } else {
        $_SESSION['login-error'] = "Username doesn't exist.";
        header('Location: login.php');
    }
}
else {
    $_SESSION['login-error'] = "Please fill in both the fields.";
    header('Location: login.php');
}