<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

$query = "INSERT INTO `comments` SET `text` = ?, `author` = ?, `news_id` = ?, `date` = NOW()";
$resC = getStmtResult($connect, $query, [$_POST['message'], $_POST['name'], $_POST['news_id']]);

$resN = getStmtResult($connect, "SELECT `comments_cnt` FROM `news` WHERE `id` = ?", [$_POST['news_id']]);
$cnt = mysqli_fetch_assoc($resN)['comments_cnt'];
$cnt++;

$updateNews = getStmtResult($connect, "UPDATE `news` SET `comments_cnt` = ? WHERE `id` = ?", [$cnt, $_POST['news_id']]);

