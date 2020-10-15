<?php
/*
* Подключает шаблон с параметрами 
*/
function renderTemplate($name, $data = []) 
{
    $result = ''; // Подготавливаем результат, по умолчанию пустой

    $name = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $name . '.php'; // Создаем полный путь из $name

    if (!file_exists($name)) {
        return $result; // если такого файла нет, возвращаем результат
    }

    ob_start(); // начало буферизации

    extract($data); //создает переменные из массива. где ключи становятся названием переменной ['title' => '123'] = $title = '123'
    require_once $name; // подключаем шаблон

    $result = ob_get_clean(); //выводим данные из буфера

    return $result; // возвращаем результат
}

/* 
* функция для форматированного вывода массива 
*/
function pr($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}