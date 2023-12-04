<?php

global $conn;
require_once 'dbutil.php';
$sql = 'select distinct term from course where user=?';
$stmt = $conn->prepare($sql);
$a="1313622020";
$stmt->bind_param('s', $a);
$stmt->execute();
$khsTerm=$stmt->get_result()->fetch_all();
echo json_encode($khsTerm);
foreach ($khsTerm as $item) {
    echo $item[0];
}