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

///**
// * Функция обрабтки тэгов
// */
//function getAddTags($tag) {
//    $searchSymbol = strpos($tag, ',');
//    if ($searchSymbol === false) {
//        return $tag;
//    }
//    else {
//        $arrTags = explode(',', $tag);
//        $arrNewTag = [];
//        foreach ($arrTags as $key => $tag) {
//            $name = 'tag_' . $key;
//            $arrNewTag[$name] = $arrTags[$key];
//        }
//        return $arrNewTag;
//    }
//}
//
//
///**
// * Функция формирования запроса
// */
//function getQueryTag($arrNewTag) {
//    if (is_array($arrNewTag)) {
//        $arrTag = getAddTags($arrNewTag);
//
//        $query = '';
//        foreach ($arrTag as $tag) {
//            $query .= '(?, ?)';
//        }
//        return $query;
//    }
//    else {
//        $query = '(?, ?)';
//        return $query;
//    }
//
//}


/**
 * Функция форматирования даты
 */
function new_time($a) { // преобразовываем время в нормальный вид
    $date = date("j m Y",strtotime($a));
    $date_time = date ('H:i', strtotime($a));
    $ndate_exp = explode(' ', $date);
    $nmonth = array(
        1 => 'января',
        2 => 'февраля',
        3 => 'марта',
        4 => 'апреля',
        5 => 'мая',
        6 => 'июня',
        7 => 'июля',
        8 => 'августа',
        9 => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря'
    );

    foreach ($nmonth as $key => $value) {
        if($key == intval($ndate_exp[1])) $nmonth_name = $value;
    }

    if($date == date('j m Y')) return 'сегодня в '.$date_time;
    elseif($date == date('j m Y', strtotime('-1 day'))) return 'вчера в '.$date_time;
    else return $ndate_exp[0].' '.$nmonth_name.' '.$ndate_exp[2].' в '.$date_time;
}



/**
 * Функция для подготовленного запроса к БД
 * @param $connect
 * @param $query
 * @param array $param
 * @return bool|mysqli_result
 */
function getStmtResult($connect, $query, $param = []) {
    if (!empty($param)) {
        $stmt = mysqli_prepare($connect, $query); // подготавливае мзапрос
        $type = ''; // подготавливаем аргумент с типами на основе типов с параметрами

        foreach ($param as $item) {
            if (is_int($item)) {
                $type .= 'i';
            }
            elseif (is_string($item)) {
                $type .= 's';
            }
            elseif (is_double($item)) {
                $type .= 'd';
            }
            else {
                $type .= 's';
            }
        }

        $values = array_merge([$stmt, $type], $param); // подготавливаем массив параметров для передачи
        $funk = 'mysqli_stmt_bind_param';
        $funk(...$values); // ... - указывает на переменное кол-во аргументов
        mysqli_stmt_execute($stmt); // выполняет подготовленный запрос
        $result = mysqli_stmt_get_result($stmt); // получает результат запроса

        return $result;
    }
    else {
        $result = mysqli_query($connect, $query);

        return $result;
    }
}