<?php

$choose_author = [];
$author_category = q("
    SELECT *
    FROM `authors` 
");

while ($row_choose_author = $author_category->fetch_assoc()){
    $choose_author[$row_choose_author['authors_id']] = $row_choose_author['name'];
}

if (isset($_POST['title'],$_POST['description'], $_POST['pages'],$_FILES['file'],$_POST['author'],  $_POST['add'])) {

    $errors = [];

    if (empty($_POST['title'])) {
        $errors ['title'] = 'Вы не указали название книги';
    }
    if (empty($_POST['description'])) {
        $errors ['description'] = 'Вы не написали описание книги';
    }
    if (empty($_POST['pages'])) {
        $errors ['pages'] = 'Вы не указали количество страниц книги';
    }
    if ($_FILES['file']['error'] == 4 ) {
        $errors ['files'] = 'Загрузите изображение обложки книги';
    }
    if (empty($_POST['author'])) {
        $errors ['author'] = 'Вы не указали автора';
    }
    if (empty($_POST['price'])) {
        $errors ['price'] = 'Вы не указали стоимость книги';
    }

    if (!count($errors)) {

        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
            INSERT INTO `books` SET
            `title`        = '" . es($_POST['title']) . "',
            `description`  = '" . es($_POST['description']) . "',
            `pages`        = " .(int)$_POST['pages'] . ",
            `price`        = " .(float)$_POST['price'] . ",
            `date`         = NOW()
        ");
        $books_id = DB::_()->insert_id;

        if($_POST['author'] != '') {
            foreach ($_POST['author'] as $authors_id) {
                q("
                    INSERT INTO `authors_books` SET
                    `books_id`        = " . (int)$books_id . ",
                    `authors_id`      = " . (int)$authors_id . "
                ");
            }
        }

        if(isset($_FILES['file']) && $_FILES['file']['error'] != 4) {

            if (!Upload::uploadImage($_FILES['file'], '/uploaded/books/')) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/books/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }

            if (!Upload::resize(Upload::$path_origin,Upload::$path,Upload::$temp , 150,150)) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/books/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }

            $res = q("
                UPDATE `books` SET           
                `img`          = '".es(Upload::$name_resized)."'
                WHERE `books_id`     = ".(int)$books_id."
            ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/books');
            exit();

        } else {
            $_SESSION['info'] = 'Загрузите обложку книги';
        }

    }
}