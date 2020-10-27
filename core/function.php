<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
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
        $arr[$param] = $value;

    }
    return http_build_query($arr); // генерирует строку с get параметрами
}


/**
*Функция запроса к БД (первый параметр запрос к БД, второй параметр и т.д)

function getDataFromDB() {
    $number = func_num_args();
    $params = func_get_args();

    if ($number > 0) {
        $arrParam = [];
        foreach ($params as $key => $param) {
            $nameParam = 'param' . $key;

            if (!array_key_exists($nameParam, $params)) {
                $arrParam[$nameParam] = $params[$key];
            }
        }
        extract($arrParam);

        if (count($arrParam) > 1) {
            $countParam = count($arrParam) - 1;
            $str = '';
            for ($i =0; $i < $countParam; $i++) {
                $str .= 'i';
            }

            $stmt = mysqli_prepare($connect, $param0);
            mysqli_stmt_bind_param($stmt ,$str, $param1 );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }

    }

    return $result;
}
 */

function getWeekDay($day) {
    switch ($day) {
        case 0 : echo 'Воскресенье';
        break;
        case 1 : echo 'Понедельник';
        break;
        case 2 : echo 'Вторник';
        break;
        case 3 : echo 'Среда';
        break;
        case 4 : echo 'Четверг';
        break;
        case 5 : echo 'Пятница';
        break;
        case 6 : echo 'Суббота';
        break;
    }
}