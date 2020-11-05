<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

mysqli_begin_transaction($connect);

$queryAddComment = "INSERT INTO `comments` SET `text` = ?, `author` = ?, `news_id` = ?, `date` = NOW()";
$resC = getStmtResult($connect, $queryAddComment, [$_POST['message'], $_POST['name'], $_POST['news_id']]);
$id = mysqli_insert_id($connect); // получает id только-что вставленной записи в БД

$queryCommentsCnt = "SELECT `comments_cnt` FROM `news` WHERE `id` = ?";
$resN = getStmtResult($connect, $queryCommentsCnt, [$_POST['news_id']]);
$cnt = mysqli_fetch_assoc($resN)['comments_cnt'];
$cnt++;

$queryUpdateNews = "UPDATE `news` SET `comments_cnt` = ? WHERE `id` = ?";
$updateNews = getStmtResult($connect, $queryUpdateNews, [$cnt, $_POST['news_id']]);

if ($id > 0) {
    mysqli_commit($connect);
    $queryComments = "SELECT * FROM `comments` WHERE `news_id` = ?";
    $resComments = getStmtResult($connect, $queryComments, [$_POST['news_id']]);
    $arrComments = mysqli_fetch_all($resComments, MYSQLI_ASSOC);

    /**
     * END Получение комментариев
     */

    $comments = renderTemplate('comments', [ // получаем шаблон блока комментариев
        'arrComments' => $arrComments //передаем массив с комменатриями
    ]);

    $arrResult = [];
    $arrResult['comments'] = $comments;
    $arrResult['comments_count'] = count($arrComments);

    echo json_encode($arrResult); // превращаем массив в json
}
else {
    mysqli_rollback($connect);
    echo 'error';
}


