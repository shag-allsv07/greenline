<?php

require_once 'core/init.php';

$title = 'GreenLine | О нас';

/*
* $arrCategory - список категорий для layout (init.php)
*/

$page_content = renderTemplate('about');

$res = renderTemplate('layout', [
                        'content' => $page_content,
                        'title' => $title,
                        'arrCategory' => $arrCategory,
                        'menuActive' => 'about'
                        ]);

echo $res;