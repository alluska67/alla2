<?php

if (isset($_POST['title'], $_POST['category'], $_POST['description'], $_POST['text'], $_POST['add'])) {
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

    if (!count($errors)) {

        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
        INSERT INTO `news` SET
        `title`        = '" . es($_POST['title']) . "',
        `category`     = '" . es($_POST['category']) . "',
        `description`  = '" . es( $_POST['description']) . "',
        `text`         = '" . es($_POST['text']) . "',
        `date`         = NOW()
        "
        );

        $_SESSION['info'] = 'Запись была добавлена на страничку';
        header('Location: /admin/news');
        exit();


    }


}