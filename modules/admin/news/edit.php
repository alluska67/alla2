<?php

if (isset($_POST['title'], $_POST['category'], $_POST['description'], $_POST['text'], $_POST['edit'])) {
    $errors = [];

    if (empty($_POST['title'])) {
        $errors ['title'] = 'Вы не указали заголовок новости';
    }
    if (empty($_POST['category'])) {
        $errors ['category'] = 'Вы не указали категорию новости';
    }
    if (empty($_POST['description'])) {
        $errors ['description'] = 'Вы не написали короткое описание новости';
    }
    if (empty($_POST['text'])) {
        $errors ['text'] = 'Вы не написали полный текст новости';
    }

    if(!count($errors)){

        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
        UPDATE `news` SET
        `title`        = '" . es($_POST['title']) . "',
        `category`     = '" . es($_POST['category']) . "',
        `description`  = '" . es($_POST['description']) . "',
        `text`         = '" . es($_POST['text']) . "',
        `date_edited`         = NOW()
        WHERE `id` = " . (int)$_GET['id'] . "
        ");

        $_SESSION['info'] = 'Запись была изменена';
        header('Location: /admin/news');
        exit();
    }
}

$news = q( "
    SELECT *
    FROM `news`
    WHERE `id` = " . int($_GET['id']) . "
    LIMIT 1
");

if (!mysqli_num_rows($news)) {
    $_SESSION['info'] = 'Запись отсутствует';
    header('Location: /admin/news');
    exit();
}

$row = mysqli_fetch_assoc($news);

if (isset($_POST['title'])) {
    $row['title'] = $_POST['title'];
}
if (isset($_POST['category'])) {
    $row['category'] = $_POST['category'];
}
if (isset($_POST['description'])) {
    $row['description'] = $_POST['description'];
}
if (isset($_POST['text'])) {
    $row['text'] = $_POST['text'];
}