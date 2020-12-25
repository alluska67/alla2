<?php

$choose_news_category = q("
    SELECT *
    FROM `news_category` 
");

if (isset($_POST['title'],$_POST['description'], $_POST['category'], $_POST['text'],$_POST['author'], $_FILES['file'], $_POST['add'])) {
    $errors = [];

    if (empty($_POST['title'])) {
        $errors ['title'] = 'Вы не указали заголовок новости';
    }
    if (empty($_POST['category'])) {
        $errors ['category'] = 'Вы не указали категорию новости';
    }
    if (empty($_POST['description'])) {
        $errors ['description'] = 'Вы не написали описание новости';
    }
    if (empty($_POST['text'])) {
        $errors ['text'] = 'Вы не написали полный текст новости';
    }

    if (empty($_POST['author'])) {
        $errors ['author'] = 'Вы не указали автора';
    }
    if ($_FILES['file']['error'] == 4 ) {
        $errors ['files'] = 'Загрузите изображение';
    }


    if (!count($errors)) {

        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
            INSERT INTO `all_news` SET
            `title`        = '" . es($_POST['title']) . "',
            `category_id`  = " . (int)$_POST['category'] . ",
            `text`         = '" . es($_POST['text']) . "',
            `description`  = '" . es($_POST['description']) . "',
            `author`       = '" . es($_POST['author']) . "', 
            `date`         = NOW()
        ");
        $insert_id = DB::_()->insert_id;

        if(isset($_FILES['file']) && $_FILES['file']['error'] != 4) {


            if (!Upload::uploadImage($_FILES['file'], '/uploaded/news/')) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/news/edit?id=' . (int)$_GET['id']);
                exit($_SESSION['info']);
            }

            if (!Upload::resize(Upload::$path_origin,Upload::$path,Upload::$temp , 150,150)) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/news/edit?id=' . (int)$_GET['id']);
                exit($_SESSION['info']);
            }

            $res = q("
                UPDATE `all_news` SET
                `img_original` = '" . es(Upload::$info['original_name']) . "',                 
                `img`          = '" . es(Upload::$name_resized) . "'
                WHERE `id`     = " . (int)$insert_id . "
            ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/news');
            exit();

        } else {
            $_SESSION['info'] = 'Загрузите изображение новости';
        }
    }
}