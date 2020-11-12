<?php
require_once 'core/init.php';

$arResultSearch = [];
$search = $_GET['search'];
if ($search != '') {

    $querySearch = "SELECT N.`id`, N.`title`, N.`detail_text`, N.`image`, N.`date`, N.`comments_cnt`, C.`title`".
        "AS news_cat  FROM `news` AS N JOIN `category` AS C ON C.`id` = N.`category_id` WHERE MATCH(`detail_text`) AGAINST(?)";
    $res = getStmtResult($connect, $querySearch, [$search]);

    while ($arrSearch = mysqli_fetch_assoc($res)){
        $text = substr($arrSearch['detail_text'], 0, 200);
        $arrSearch['detail_text'] = $text;

        $arResultSearch[] = $arrSearch;
    }

}

$pageContent = renderTemplate('search', [
    'arResultSearch' => $arResultSearch
]);

$result = renderTemplate('layout', [ // Получаем главный layout (главный шаблон) страницы
    'content' => $pageContent, // Передаем html код шаблона main
    'title' => 'Поиск по сайту', // Передаем title
    'arrCategory' => $arrCategory, // Передаем массив с категориями
    'menuActive' => ''
]);

echo $result;
