<?php

session_start();
include 'dbutil.php';
global $conn;
//$_POST = array_map('trim', $_POST);

if(empty($_POST['nim']) || $_POST['nim'] == '' ||empty($_POST['username']) || $_POST['username'] == '' || $_POST['email'] == '' || $_POST['password'] == '' || $_POST['name'] == '' || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['name'])) {
    $_SESSION['error'] = 'Please fill in all the fields.';
    header('Location: register.php');
}
if(strlen($_POST['password']) < 6) {
    $_SESSION['error'] = 'Password must be at least 6 characters';
    header('Location: register.php');
}

$sql = 'select * from user where username = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s',$_POST["username"]);
$stmt->execute();
$res = $stmt->get_result();

if($res->fetch_assoc()) {
    $_SESSION['error'] = 'Username already exists.';
    header('Location: register.php');
}
else {
    $stmt = $conn->prepare('insert into user (username, email, password, name, nim) VALUES (?,?,?,?,?)');
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt->bind_param('sssss', $_POST['username'], $_POST['email'], $password_hash, $_POST['name'], $_POST['nim']);


    if($stmt->execute()) {
        $_SESSION['success'] = 'Account created.';
        header('Location: login.php');
    }
    else {
        $_SESSION['error'] = 'There was a problem creating your account.';
        header('Location: register.php');
    }
}


