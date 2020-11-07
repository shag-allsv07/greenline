<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

if ($_POST['email'] != '') {
    $email = htmlspecialchars($_POST['email']);

    $query = "SELECT `email` FROM `subscribe` WHERE `email` = ?";
    $res = getStmtResult($connect, $query, [$email]);
    $arrRes = mysqli_fetch_assoc($res);

    if (empty($arrRes)) {
        $query = "INSERT INTO `subscribe` SET `email` = ?";
        $res = getStmtResult($connect, $query, [$email]);
        echo 'ok_subscribe';
    }
    else {
        echo 'error_subscribe';
    }
}
else {
    echo 'error';
}