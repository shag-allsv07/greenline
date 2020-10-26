<?php

require_once 'core/init.php';

$title = 'GreenLine | Контакты';

/*
* $arrCategory - список категорий для layout (init.php)
*/

$pageContent = renderTemplate("contact");
$res = renderTemplate('layout', [
                        'content' => $pageContent,
                        'title' => $title,
                        'arrCategory' => $arrCategory,
                        'menuActive' => 'contact'
                        ]);

echo $res;
