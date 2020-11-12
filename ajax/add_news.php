<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

mysqli_begin_transaction($connect);

if ((!empty($_POST['title']) && $_POST['title'] != '')
    && (!empty($_POST['prewiew-text']) && $_POST['prewiew-text'] != '')
    && (!empty($_POST['detail-text']) && $_POST['detail-text'] != '') 
    && (!empty($_FILES['upload_image']['name']) && $_FILES['upload_image']['name'] != '')
    && (!empty($_POST['category'])) && $_POST['category'] != ''  )
    {
        $title = htmlspecialchars(strip_tags($_POST['title']));
        $pr_text = htmlspecialchars(strip_tags($_POST['prewiew-text']));
        $d_text = htmlspecialchars(strip_tags($_POST['detail-text']));
        $category = htmlspecialchars(strip_tags($_POST['category']));
        $tag = htmlspecialchars(strip_tags($_POST['add_tags']));


        $file = '';
        $name = explode('.', $_FILES['upload_image']['name']);
        $file .= $name[0] . '_' . time() .'.'. $name[1];

        $upload = $_SERVER['DOCUMENT_ROOT'] . '/images/';
        move_uploaded_file($_FILES['upload_image']['tmp_name'], $upload . $file);

        $queryAddNews = "INSERT INTO `news` SET `title` = ?, `preview_text` = ?, `detail_text` = ?, `image` = ?, `date` = NOW(), `category_id` = ?";
        $resAddNews = getStmtResult($connect, $queryAddNews, [$title, $pr_text, $d_text, $file, $category]);
        $idAddNews = mysqli_insert_id($connect);

        if (!empty($tag) && $tag != '') {
            $queryAddTag = "INSERT INTO `tags`(`tag`, `news_id`) VALUE (?, ?)";
            $resAddTag = getStmtResult($connect, $queryAddTag, [$tag, $idAddNews]);
        }

        if ($idAddNews > 0) {
            mysqli_commit($connect);
            $_SESSION['add_news'] = '1';
            header ("Location: /admin.php");
        }
        else {
            mysqli_rollback($connect);
            $_SESSION['add_news'] = '0';
            header("Location: /admin.php");
        }
}
else {
    $_SESSION['error'] = 'error';
    header("Location: /admin.php");
}