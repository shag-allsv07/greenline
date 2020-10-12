<?php

require_once 'core/init.php';

$title = 'GreenLine';

$sql = mysqli_query($connect, "SELECT * FROM `category` ORDER BY `title` ASC");
$arrCategory = mysqli_fetch_all($sql, MYSQLI_ASSOC);


$pageContent = renderTemplate("main");
$res = renderTemplate('layout', [
                        'content' => $pageContent,
                        'title' => 'GreenLine',
                        'arrCategory' => $arrCategory
                        ]);

echo $res;
?>

