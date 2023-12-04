<?php

    $q = $_GET["q"];

    if ($q == "khsTerm") getKHSTerm($_GET["nim"]);
    elseif ($q == "krsTerm") getKRSTerm($_GET["nim"]);
    elseif ($q == "getKHS") getKHS($_GET["nim"], $_GET["term"]);
    elseif ($q == "getKRS") getKRS($_GET["nim"], $_GET["term"]);

    function getKHS($nim, $term): void {
        global $conn;
        $sql = "select * from course where user=? and term=? and finished=true";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$nim, $term);
        $stmt->execute();
        $res=$stmt->get_result();
        echo json_encode($res->fetch_all());
    }

    function getKHSTerm($nim) : void {
        global $conn;
        $sql = "select distinct term from course where user=? and finished=true";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$nim);
        $stmt->execute();
        $res = $stmt->get_result();
        echo json_encode($res->fetch_all());
    }

    function getKRSTerm($nim) : void {
        global $conn;
        $sql = "select distinct term from course where user=? and finished=false";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$nim);
        $stmt->execute();
        $res = $stmt->get_result();
        echo json_encode($res->fetch_all());
    }

    function getKRS($nim, $term) : void {
        global $conn;
        $sql = "select * from course where user=? and term=? and finished=false";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$nim, $term);
        $stmt->execute();
        $res=$stmt->get_result();
        echo json_encode($res->fetch_all());
    }

    function getUser($username) {

    }

