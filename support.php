<?php

require_once 'core/init.php';

$title = 'GreenLine | Поддержка';

/*
* $arrCategory - список категорий для layout (init.php)
*/

$sql = mysqli_query($connect, "SELECT * FROM `support`");
$arrSupport = mysqli_fetch_all($sql, MYSQLI_ASSOC);

$page_content = renderTemplate('support', [
                                'arrSupport' => $arrSupport
                            ]);

$res = renderTemplate('layout', [
                        'content' => $page_content,
                        'title' => $title,
                        'arrCategory' => $arrCategory
                        ]);

echo $res;