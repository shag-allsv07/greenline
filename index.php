<?php

require_once 'core/init.php';

$title = 'GreenLine | Главная';
$limit = 10; //количество новостей на странице
/*
* $arrCategory - список категорий для layout (init.php)
*/

/**
 * start Фильтрация по категориям
 */
$where = '';
if (isset($_GET['category'])) {
    $category = intval($_GET['category']); //эта переменная либо 0, либо число (привели к числу с помощью intval)
    if ($category > 0) {
        $where = 'WHERE `category_id` = ?';
    }
}
/**
 * end Фильтрация по категориям
 */




/**
 *делаем пагинацию
*/
// Если есть WHERE условие и выбрана категория
if ($where != '' && isset($category)) {
    $resTotal = getStmtResult($connect, "SELECT * FROM `news` $where", [$category]);
}
else {
    $resTotal = getStmtResult($connect, "SELECT * FROM `news`");
}

$total = mysqli_num_rows($resTotal); //количество записей в таблице news
$totalPage = ceil($total / $limit); // общее число страниц

$page = intval($_GET['page']); // получение номера страницы из адресной строки (массива GET) intval - принудительно приводит к числу
if ($page <= 0) {
    $page = 1; // если номер страницы несуществует или отрицательный
}
elseif ($page > $totalPage) {
    $page = $totalPage; // если номер страницы больше чем их количество
}

$offset = $page * $limit - $limit; // определяем с какой новости начинать

$arrPage = range(1, $totalPage); // массив со страницами [1,2,3,4,5]

$prevPage = '';
if ($page > 1) {
    $prevPage = $page - 1;
}

$nextPage = '';
if ($page < $totalPage) {
    $nextPage = $page + 1;
}


$is_nav = ($totalPage > 1) ? true : false; // если кол-во страниц больше одной, то true иначе false
//конец пагинации


$query = "SELECT N.`id`, N.`title`, N.`preview_text`, N.`image`, N.`date`, N.`comments_cnt`, C.`title`".
    "AS news_cat  FROM `news` AS N JOIN `category` AS C ON C.`id` = N.`category_id` $where ORDER BY N.`id` DESC LIMIT ? OFFSET ?";

if ($where != '' && isset($category)) {
    $param = [$category, $limit, $offset];
}
else {
    $param = [$limit, $offset];
}

$res = getStmtResult($connect, $query, $param);
$arrNews = mysqli_fetch_all($res, MYSQLI_ASSOC);



$pageNavigation = renderTemplate('navigation', [ // получаем html шаблон навигации
                                        //'arrPage' => $arrPage, // Передаем массив со страницами
                                        'totalPage' => $totalPage, // Передаем общее количество страниц
                                        'curPage' => $page, // Передаем текущую страницу
                                        'nextPage' => $nextPage, // Передаем номер следующей страницы
                                        'prevPage' => $prevPage, // Передаем номер предыдущей страницы
                                        'show' => $is_nav // Отображать или не отображать навигацию (параметр для показа навигации)
]);

$pageContent = renderTemplate("main", [ // получаем html блока main (изменяемого контента)
                                'arrNews' => $arrNews, // Передаем массив с новостями
                                'navigation' => $pageNavigation // Передаем полученный html код навигации
]);


$result = renderTemplate('layout', [ // Получаем главный layout (главный шаблон) страницы
                        'content' => $pageContent, // Передаем html код шаблона main
                        'title' => $title, // Передаем title
                        'arrCategory' => $arrCategory, // Передаем массив с категориями
                        'menuActive' => 'index'
]);

echo $result; // Выводим на экран окончательный html страницы
