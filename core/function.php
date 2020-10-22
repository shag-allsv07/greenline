<?php
/**
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

/**
* функция для форматированного вывода массива 
*/
function pr($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/**
 * функция добавления параметра в адресную строку
 */
function setPageParam ($param, $value) {
    $qParam = $_SERVER['QUERY_STRING']; // получаем строку с параметрами
    parse_str($qParam, $arr); // генерируем массив из этой строки

    if (!empty($param) && !empty($value)) { // если переданы параметры
        if (array_key_exists($param, $arr)) { // если есть такой ключ в массиве
            $arr[$param] = $value; // меняем занчение в полученном массиве
        }
        else {
            $arr[$param] = $value;
        }
    }
    return http_build_query($arr); // генерирует строку с get параметрами
}
