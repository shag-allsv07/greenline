<?php
require_once 'core/init.php';

$id =  intval($_GET['id']);
$title = 'News';

/**
 * START Вывод новости
 */

$queryNews = "SELECT N.`id`, N.`title`, N.`detail_text`, N.`image`, N.`date`, N.`comments_cnt`, C.`title`".
    "AS news_cat  FROM `news` AS N JOIN `category` AS C ON C.`id` = N.`category_id` WHERE N.`id` = ? LIMIT ?";

$resNews = getStmtResult($connect, $queryNews, [$id, 1]);
$arrNewsDetail = mysqli_fetch_assoc($resNews);

/**
 * END Вывод новости
 */

/**
 * START Вывод тегов
 */

$queryTags = "SELECT * FROM `tags` WHERE `news_id` = ?";
$resTags = getStmtResult($connect, $queryTags, [$id]);
$arrTags = mysqli_fetch_all($resTags, MYSQLI_ASSOC);

/**
 * END Вывод тегов
 */

/**
 * START Получение комментариев
 */

$queryComments = "SELECT * FROM `comments` WHERE `news_id` = ?";
$resComments = getStmtResult($connect, $queryComments, [$id]);
$arrComments = mysqli_fetch_all($resComments, MYSQLI_ASSOC);

/**
 * END Получение комментариев
 */

$comments = renderTemplate('comments', [ // получаем шаблон блока комментариев
    'arrComments' => $arrComments //передаем массив с комменатриями
]);


$pageContent = renderTemplate("news_detail", [ // получаем html блока main (изменяемого контента)
    'arrNewsDetail' => $arrNewsDetail, // Передаем массив с новостями
    'comments' => $comments,
    'arrTags' => $arrTags
]);


$result = renderTemplate('layout', [ // Получаем главный layout (главный шаблон) страницы
    'content' => $pageContent, // Передаем html код шаблона main
    'title' => $title, // Передаем title
    'arrCategory' => $arrCategory, // Передаем массив с категориями
    'menuActive' => 'index'
]);


echo $result; // Выводим на экран окончательный html страницы