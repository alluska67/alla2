<?php

$news_category = q("
    SELECT *
    FROM `news_category`
    ORDER BY `title_cat` ASC 

");
if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `all_news` SET
        `img` = ''
        WHERE `id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/news/edit?id=' . int($_GET['id']));
    exit();
}

if (isset($_POST['title'], $_POST['category'],$_POST['description'] , $_POST['author'], $_POST['text'], $_FILES['file'], $_POST['edit'])) {
    $errors = [];

    if (empty($_POST['title'])) {
        $errors ['title'] = 'Вы не указали заголовок новости';
    }
    if (empty($_POST['category'])) {
        $errors ['category'] = 'Вы не указали категорию новости';
    }
    if (empty($_POST['author'])) {
        $errors ['author'] = 'Вы не указали автора новости';
    }
    if (empty($_POST['description'])) {
        $errors ['description'] = 'Вы не написали описание новости';
    }
    if (empty($_POST['text'])) {
        $errors ['text'] = 'Вы не написали полный текст новости';
    }



    if(!count($errors)) {


        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
            UPDATE `all_news` SET
            `title`        = '" . es($_POST['title']) . "',
            `category_id`  = " . (int)$_POST['category'] . ",
            `author`       = '" . es($_POST['author']) . "',
            `description`  = '" . es($_POST['description']) . "',
            `text`         = '" . es($_POST['text']) . "',
            `date_edited`  = NOW()
            WHERE `id`     = " . (int)$_GET['id'] . "
        ");

        if (isset($_FILES['file']) && $_FILES['file']['error'] != 4) {

            if (!Upload::uploadImage($_FILES['file'], '/uploaded/news/')) {
                $_SESSION['info'] = Upload::$info['error'];
                header('Location: /admin/news/edit?id=' . (int)$_GET['id']);
                exit($_SESSION['info']);
            }

            if (!Upload::resize(Upload::$path_origin, Upload::$path, Upload::$temp, 150, 150)) {
                $_SESSION['info'] = Upload::$info['error'];
                header('Location: /admin/news/edit?id=' . (int)$_GET['id']);
                exit($_SESSION['info']);
            }

            $res = q("
                UPDATE `all_news` SET
                `img_original` = '" . es(Upload::$info['original_name']) . "', 
                `img`          = '" . es(Upload::$name_resized) . "'
                WHERE `id`     = " . (int)$_GET['id'] . "
            ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/news');
            exit();

        } else {
            $res = q("
                SELECT `img`
                FROM `all_news`
                WHERE `id` = " . (int)$_GET['id'] . "
            ");
            $row = $res->fetch_assoc();
            if (!$res->num_rows) {
                $res->close();
                $_SESSION['info'] = 'Загрузите изображение новости';
            } else {
                $res = q("
                    UPDATE `all_news` SET
                    `img` = '" . es($row['img']) . "'
                    WHERE `id` = " . (int)$_GET['id'] . "
                ");
                $_SESSION['info'] = Upload::$info['status'];
                header('Location: /admin/news');
                exit();
            }
        }
    }
}

$all_news = q( "
    SELECT all_news.*, nc.*
    FROM `all_news` 
    JOIN news_category nc on nc.id_cat = all_news.category_id
    WHERE `all_news`.`id` = " . (int)$_GET['id'] . "
    LIMIT 1
");

if (!$all_news->num_rows) {
    $_SESSION['info'] = 'Запись отсутствует';
    header('Location: /admin/news');
    exit();
}

$row = $all_news->fetch_assoc();

if (isset($_POST['title'])) {
    $row['title'] = $_POST['title'];
}
if (isset($_POST['category'])) {
    $row['category'] = $_POST['category'];
}
if (isset($_POST['author'])) {
    $row['author'] = $_POST['author'];
}
if (isset($_POST['text'])) {
    $row['text'] = $_POST['text'];
}

