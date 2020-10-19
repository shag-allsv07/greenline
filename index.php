<?php

require_once 'core/init.php';

$title = 'GreenLine | Главная';
$limit = 3; //количество новостей на странице
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
//конец пагинации

$sql = mysqli_query($connect, "SELECT N.`id`, N.`title`, N.`preview_text`, N.`image`, N.`date`, N.`comments_cnt`, C.`title`".
    "AS news_cat  FROM `news` AS N JOIN `category` AS C ON C.`id` = N.`category_id` ORDER BY N.`id` LIMIT $limit OFFSET $offset");
$arrNews = mysqli_fetch_all($sql, MYSQLI_ASSOC);


$pageNavigation = renderTemplate('navigation', [ // получаем html шаблон навигации
                                        'arrPage' => $arrPage, // Передаем массив со страницами
                                        'totalPage' => $totalPage, // Передаем общее количество страниц
                                        'curPage' => $page // Передаем текущую страницу
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
