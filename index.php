<?php

require_once 'core/init.php';

$title = 'GreenLine | Главная';

/*
* $arrCategory - список категорий для layout (init.php)
*/

$sql = mysqli_query($connect, "SELECT N.`id`, N.`title`, N.`preview_text`, N.`image`, N.`date`, N.`comments_cnt`, C.`title` AS news_cat  FROM `news` AS N JOIN `category` AS C ON C.`id` = N.`category_id` LIMIT 2 OFFSET 1");
$arrNews = mysqli_fetch_all($sql, MYSQLI_ASSOC);

//pr($arrNews);

$pageContent = renderTemplate("main", [
                                'arrNews' => $arrNews
                                ]);


$res = renderTemplate('layout', [
                        'content' => $pageContent,
                        'title' => $title,
                        'arrCategory' => $arrCategory
                        ]);

echo $res;
