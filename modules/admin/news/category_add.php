<?php

$choose_news_category = q("
    SELECT *
    FROM `news_category` 
");


if (isset($_POST['new_category'])) {
    $errors = [];

    if (empty($_POST['new_category']) || $_POST['new_category'] == ' ') {
        $errors ['new_category'] = 'Вы не указали новую категорию новости';
    }

    if(!count($errors)) {

        $_POST = trimAll($_POST);

        $res = q("
                SELECT  `title_cat`
                FROM `news_category`
                WHERE `title_cat` = '" . es($_POST['new_category']) . "'
                LIMIT 1
        ");

        if ($res->num_rows) {
            $res->close();
            $errors ['new_category'] = 'Такая категория уже существует!Просмотрите список всех существующих категорий, и если нужно - добавьте новую!';
        }

        if (!count($errors)) {
            $_POST = trimAll($_POST);

            q("
                    INSERT INTO `news_category` SET 
                    `title_cat` = '" . es($_POST['new_category']) . "'
            ");

            $_SESSION['info'] = 'Категория успешно добавлена';
            header('Location: /admin/news');
            exit();
        }
    }
}