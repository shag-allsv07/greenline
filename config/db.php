<?php

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_BASE);

if (!$connect) {
    echo 'Произошла ошибка' . PHP_EOL ;
    echo 'Код ошибки ' . mysqli_connect_errno() . PHP_EOL;
    echo 'Текст ошибки' . mysqli_connect_error();
    die();
}

mysqli_set_charset($connect, "utf8");

?>