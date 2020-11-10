<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

if ((!empty($_POST['title']) && $_POST['title'] != '')
    && (!empty($_POST['prewiew-text']) && $_POST['prewiew-text'] != '')
    && (!empty($_POST['detail-text']) && $_POST['detail-text'] != '') 
    && (!empty($_FILES['upload_image']['name']) && $_FILES['upload_image']['name'] != '')
    && (!empty($_POST['category'])) && $_POST['category'] != '')   
    {
        $title = htmlspecialchars(strip_tags($_POST['title']));
        $pr_text = htmlspecialchars(strip_tags($_POST['prewiew-text']));
        $d_text = htmlspecialchars(strip_tags($_POST['detail-text']));
        $category = htmlspecialchars(strip_tags($_POST['category']));


        $file = '';
        $name = explode('.', $_FILES['upload_image']['name']);
        $file .= $name[0] . '_' . time() .'.'. $name[1];

        $upload = $_SERVER['DOCUMENT_ROOT'] . '/images/';
        move_uploaded_file($_FILES['upload_image']['tmp_name'], $upload . $file);

        $query = "INSERT INTO `news` SET `title` = ?, `preview_text` = ?, `detail_text` = ?, `image` = ?, `date` = NOW(), `category_id` = ?";
        $resAddNews = getStmtResult($connect, $query, [$title, $pr_text, $d_text, $file, $category]);
        $id = mysqli_insert_id($connect);

        if ($id > 0) {
            $_SESSION['add_news'] = '1';
            header ("Location: /admin.php");
        }
        else {
            $_SESSION['add_news'] = '0';
            header("Location: /admin.php");
        }
}
else {
    $_SESSION['error'] = 'error';
    header("Location: /admin.php");
}