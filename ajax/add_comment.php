<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

$queryAddComment = "INSERT INTO `comments` SET `text` = ?, `author` = ?, `news_id` = ?, `date` = NOW()";
$resC = getStmtResult($connect, $queryAddComment, [$_POST['message'], $_POST['name'], $_POST['news_id']]);

$queryCommentsCnt = "SELECT `comments_cnt` FROM `news` WHERE `id` = ?";
$resN = getStmtResult($connect, $queryCommentsCnt, [$_POST['news_id']]);
$cnt = mysqli_fetch_assoc($resN)['comments_cnt'];
$cnt++;

$queryUpdateNews = "UPDATE `news` SET `comments_cnt` = ? WHERE `id` = ?";
$updateNews = getStmtResult($connect, $queryUpdateNews, [$cnt, $_POST['news_id']]);

