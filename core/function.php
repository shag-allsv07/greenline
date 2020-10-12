<?php
/*
* Подключает шаблон с параметрами 
*/
function renderTemplate ($name, $data = []) 
{
    $result = ''; // Подготавливаем результат, по умолчанию пустой

    $name = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $name . '.php'; // Создаем полный путь из $name

    if (!file_exists($name)) {
        return $result; // если такого файла не, возвращаем результат
    }

    ob_start(); // yначало буферизации

    extract($data); //создает переменные из массива. где ключи становятся названием переменной ['title' => '123'] = $title = '123'
    require_once $name; // подключаем шаблон

    $result = ob_get_clean(); //выводим данные из буфера

    return $result; // возвращаем результат
}