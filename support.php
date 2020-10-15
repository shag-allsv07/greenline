<?php

require_once 'core/init.php';

$title = 'GreenLine | Поддержка';

/*
* $arrCategory - список категорий для layout (init.php)
*/

$page_content = renderTemplate('support');

$res = renderTemplate('layout', [
                        'content' => $page_content,
                        'title' => $title,
                        'arrCategory' => $arrCategory      
                        ]);

echo $res;