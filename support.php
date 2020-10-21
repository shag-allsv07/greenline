<?php

require_once 'core/init.php';

$title = 'GreenLine | Поддержка';
$limit = 3; // количество статей на странице

//пагинация
$sqlTotalSupport = mysqli_query($connect, "SELECT * FROM `support`");
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

//конец пагинации

/*
* $arrCategory - список категорий для layout (init.php)
*/

$sql = mysqli_query($connect, "SELECT * FROM `support` ORDER BY id LIMIT {$limit} OFFSET {$offset}");
$arrSupport = mysqli_fetch_all($sql, MYSQLI_ASSOC);

$pageNavigation = renderTemplate('navigation', [
                                        'arrPage' => $arrPage, //передаем массив со страницами
                                        'totalPage' => $totalPage, // переадем общее число страниц
                                        'curPage' => $page // передаем текущую страницу
                                    ]);

$page_content = renderTemplate('support', [
                                        'arrSupport' => $arrSupport,
                                        'navigation' => $pageNavigation
                                    ]);

$res = renderTemplate('layout', [
                                'content' => $page_content,
                                'title' => $title,
                                'arrCategory' => $arrCategory
                                ]);

echo $res;