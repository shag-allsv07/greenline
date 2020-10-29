<?php
require_once 'core/init.php';

$id =  intval($_GET['id']);
$title = 'News';

$query = "SELECT N.`id`, N.`title`, N.`detail_text`, N.`image`, N.`date`, N.`comments_cnt`, C.`title`".
    "AS news_cat  FROM `news` AS N JOIN `category` AS C ON C.`id` = N.`category_id` WHERE N.`id` = ? LIMIT ?";

$res = getStmtResult($connect, $query, [$id, 1]);
$arrNewsDetail = mysqli_fetch_assoc($res);

$pageContent = renderTemplate("news_detail", [ // получаем html блока main (изменяемого контента)
    'arrNewsDetail' => $arrNewsDetail // Передаем массив с новостями
]);


$result = renderTemplate('layout', [ // Получаем главный layout (главный шаблон) страницы
    'content' => $pageContent, // Передаем html код шаблона main
    'title' => $title, // Передаем title
    'arrCategory' => $arrCategory, // Передаем массив с категориями
    'menuActive' => 'index'
]);

echo $result; // Выводим на экран окончательный html страницы