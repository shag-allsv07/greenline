<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php'; //подключаем настройки
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php'; //подключаем базу
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/function.php';


$sql = mysqli_query($connect, "SELECT * FROM `category` ORDER BY `title` ASC");
$arrCategory = mysqli_fetch_all($sql, MYSQLI_ASSOC);