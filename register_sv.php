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
        genCourses($_POST['nim']);
        $_SESSION['success'] = 'Account created.';
        header('Location: login.php');
    }
    else {
        $_SESSION['error'] = 'There was a problem creating your account.';
        header('Location: register.php');
    }
}

function genCourses($nim): void
{
    for ($i = 0; $i < 10; $i++) {
        $_SESSION['msg'] = $nim;
        global $conn;
        $stmt = $conn->prepare('insert into course (subjectId, subjectName, credits, finished, grade, weight, user, courseId, term) values (?,?,?,?,?,?,?,?,?)');
        $subjectId = rand(1000000000,2000000000);
        $subjects=array("Kalkulus Differensial","Dasar-dasar Pemrograman","Matematika Diskrit","Statistika dan Probabilitas","Pengantar TIK","Aljabar Linier",'Kalkulus Integral','Pengantar Sistem Digital','Pengantar Teori Graph','Struktur Data dan Algoritma','Basis Data','Interaksi Manusia','Perancangan dan Pemrograman Web','Desain dan Pemrograman Berorientasi Objek','Metode Numerik','Data Raya dan Pemrograman');
        $k=array_rand($subjects);
        $subjectName = $subjects[$k];
        $credits = rand(2,3);
        $finished = rand(0,1);
        $grades=array('A','B','C');
        $l=array_rand($grades);
        $grade = $grades[$l];
        $weight = rand(0, 200) / 10;
        $courseId = '13136' . rand(10000,99999);
        $term = rand(1,3);
        $stmt->bind_param(
            'sssssssss',
            $subjectId,
            $subjectName,
            $credits,
            $finished,
            $grade,
            $weight,
            $nim,
            $courseId,
            $term
        );
        $stmt->execute();
    }
}

