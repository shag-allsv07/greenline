<?php

require_once 'core/init.php';

$title = 'GreenLine | Контакты';

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = '6110820@mail.ru';
    $subject = 'Письмо из формы обратной связи';
    $text = '';
    $text .= 'Имя: ' . $name . PHP_EOL;
    $text .= 'Email: ' . $email . PHP_EOL;
    $text .= 'Телефон: ' . $phone . PHP_EOL;
    $text .= 'Сообщение: ' . $message . PHP_EOL;
}

$pageContent = renderTemplate("contact");
$res = renderTemplate('layout', [
                        'content' => $pageContent,
                        'title' => $title,
                        'arrCategory' => $arrCategory,
                        'menuActive' => 'contact'
                        ]);

echo $res;
