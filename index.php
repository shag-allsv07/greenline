<?php

require_once 'core/init.php';

$title = 'GreenLine | Главная';
$limit = 10; //количество новостей на странице
/*
* $arrCategory - список категорий для layout (init.php)
*/


// делаем пагинацию
$sqlResTotal = mysqli_query($connect, "SELECT * FROM `news`");
$resTotal = mysqli_num_rows($sqlResTotal); //количество записей в таблице news

$totalPage = ceil($resTotal / $limit); // общее число страниц

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

// start Фильтрация по категориям
if (isset($_GET['category'])) {
    $category = intval($_GET['category']);
    if ($category > 0) {
        $sqlCategory = 'WHERE `category_id` = ' . $category;
    }
}
// end Фильтрация по категориям

$sql = mysqli_query($connect, "SELECT N.`id`, N.`title`, N.`preview_text`, N.`image`, N.`date`, N.`comments_cnt`, C.`title`".
    "AS news_cat  FROM `news` AS N JOIN `category` AS C ON C.`id` = N.`category_id` $sqlCategory ORDER BY N.`id` LIMIT $limit OFFSET $offset");
$arrNews = mysqli_fetch_all($sql, MYSQLI_ASSOC);


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
                        'arrCategory' => $arrCategory // Передаем массив с категориями
]);

echo $result; // Выводим на экран окончательный html страницы
