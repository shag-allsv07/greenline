<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

$admin_login = 'admin';
$admin_password = 'admin';

if ($_POST['login'] != '' && $_POST['password'] != '') {
    if ($_POST['login'] == $admin_login && $_POST['password'] == $admin_password) {
        $_SESSION['is_admin'] = '1';
    }
}

$pageContent = renderTemplate('admin');

$result = renderTemplate('admin_layout', [ // Получаем главный layout (главный шаблон) страницы
    'content' => $pageContent, // Передаем html код шаблона main
    'title' => Админка, // Передаем title
    'menuActive' => 'index'
]);

echo $result;