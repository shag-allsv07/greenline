<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
//ob_start(); //включение буферизации
//
//echo 'Hello';

// $str = ob_get_contents(); //возвращает данные из буфера
// ob_end_clean(); //Очищает буфер

//$str = ob_get_clean(); //возвращает данные из буфера и очищает буфер
//
//echo $str;


// Пагинация:

// 1. Сколько выводить на страницу
// 2. Сколько всего записей в БД
// 3. Сколько будет страниц
// 4. Определить текущую страницу ($_GET['page'])

//1. Получить текущую страницу
//2. Получить последнюю страницу
//3. Получить 2 предыдущие страницы
//4. Получить 2 последующие страницы


// Переключение по категориям
//1. Сформировать ссылку с GET параметрами (layout)
//2. Проверяем наличие параметров в массиве GET
//3. Добавляем фильтрацию в запрос на выборку

/* формула паганиции
    общее количество записей / на количество записей на странице
*/

// LIMIT - ограничение выборки
// LIMIT n,m
// n - с какой записи начинать
// m - сколько выводить

// OFFSET m 
// m - смещение (с какой начинать)


/* Безопасный запрос к БД

1. Сформировать запрос с плесхолдерами
2. Отправить в базу запрос
3. Подставить значения в подготовленное выражение
4. Выполнить подготовленное выражение
5. Обработать результат выполнения

$author = $_GET['author'];
$id = $_GET['id'];
*/
//$title = 'Технологии';
//
////mysqli_prepare() - подготавливает запрос, возвращает указатель
//$stmt = mysqli_prepare($connect, "SELECT * FROM `category`");
//
////mysqli_stmt_bind_param - привязывает переменные к параметрам запроса
//mysqli_stmt_bind_param($stmt, "s", $title); // i - integer, s - string, d - double, b - blob(бинарные данные)
//
////mysqli_stmt_execute() - выполяняет подготовленный запрос
//mysqli_stmt_execute($stmt);
//
////mysqli_stmt_get_result() - получает результат запроса
//$result = mysqli_stmt_get_result($stmt);
//
//while ($res = mysqli_fetch_assoc($result)) {
// pr($res);
//}

$cat_id = 1;
$comment_cnt = 2;

$stmt = mysqli_prepare($connect, "SELECT * FROM `news` WHERE `category_id` = ? AND `comments_cnt` = ?");
mysqli_stmt_bind_param($stmt, "ii", $cat_id, $comment_cnt);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);


while ($resS = mysqli_fetch_assoc($res)) {
    pr($resS);
}



