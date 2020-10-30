<?php

require_once 'core/init.php';

$title = 'GreenLine | Поддержка';
$limit = 10; // количество статей на странице

//пагинация
$sqlTotalSupport = getStmtResult($connect, "SELECT * FROM `support`");
$countSupport = mysqli_num_rows($sqlTotalSupport);

$totalPage = ceil($countSupport / $limit); // общее число страниц
$page = intval($_GET['page']); // получение номера страницы из адресной строки (массива GET) intval - принудительно приводит к числу

if ($page <= 0) {
    $page = 1; // если номер страницы не существует или отрицательный
}
elseif ($page > $totalPage) {
    $page = $totalPage; // если номер страницы больше существующего
}

$offset = $page * $limit - $limit; // определяем с какой новости начинать

$arrPage = range(1, $totalPage);

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

/*
* $arrCategory - список категорий для layout (init.php)
*/

$sql = getStmtResult($connect, "SELECT * FROM `support` ORDER BY id LIMIT ? OFFSET ?", [$limit, $offset]);
$arrSupport = mysqli_fetch_all($sql, MYSQLI_ASSOC);

$pageNavigation = renderTemplate('navigation', [
                                        //'arrPage' => $arrPage, //передаем массив со страницами
                                        'totalPage' => $totalPage, // переадем общее число страниц
                                        'curPage' => $page, // передаем текущую страницу
                                        'nextPage' => $nextPage,
                                        'prevPage' => $prevPage,
                                        'show' => $is_nav
                                    ]);

$page_content = renderTemplate('support', [
                                        'arrSupport' => $arrSupport,
                                        'navigation' => $pageNavigation
                                    ]);

$res = renderTemplate('layout', [
                                'content' => $page_content,
                                'title' => $title,
                                'arrCategory' => $arrCategory,
                                'menuActive' => 'support'
                                ]);

echo $res;