<?php

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `books` SET
          `img` = ''
        WHERE `books_id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/books/edit?id='.int($_GET['id']));
    exit();
}

if (isset($_POST['title'],$_POST['description'], $_POST['pages'],$_POST['author'],$_POST['price'],  $_POST['edit'])) {

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
    if (empty($_POST['author'])) {
        $errors ['author'] = 'Вы не указали автора';
    }
    if (empty($_POST['price'])) {
        $errors ['price'] = 'Вы не указали стоимость книги';
    }

    if(!count($errors)) {
        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
        UPDATE `books` SET
        `title`        = '" . es($_POST['title']) . "',
        `description`  = '" . es($_POST['description']) . "',
        `pages`        = " .(int)$_POST['pages'] . ",
        `price`        = " .(float)$_POST['price'] . ",
        `date_edited`         = NOW()
        WHERE `books_id` = " . (int)$_GET['id'] . "
        ");

        $res_author = q("
            SELECT  `authors_id`
            FROM `authors`
            WHERE `name` = '" . es($_POST['author']) ."'
            LIMIT 1
        ");

        if (!$res_author->num_rows) {
            q("
                INSERT INTO  `authors` SET
                `name`        = '" . es($_POST['author']) . "'
                ");
            $authors_id = DB::_()->insert_id;

        } else {
            $row_authors_id = $res_author->fetch_assoc();
            $authors_id = $row_authors_id['authors_id'];
        }

        q("
            UPDATE `authors_books` SET
            `books_id`        = " . (int)$_GET['id'] . ",
            `authors_id`      = " .(int)$authors_id . "
            WHERE `books_id`  = " . (int)$_GET['id'] . "
        ");

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
                WHERE `books_id`     = ".(int)$_GET['id']."
            ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/books');
            exit();

        }  else {

            $res = q("
                SELECT `img`
                FROM `books`
                WHERE `books_id` = " . (int)$_GET['id'] . "
            ");
            $row = $res->fetch_assoc();

            if (!$res->num_rows) {
                $res->close();
                $_SESSION['info'] = 'Загрузите обложку книги';
            } else {
                $res = q("
                UPDATE `books` SET
                `img` = '" . es($row['img']) . "'
                WHERE `books_id` = " . (int)$_GET['id'] . "
                ");
                $_SESSION['info'] = Upload::$info['status'];
                header('Location: /admin/books');
                exit();
            }

        }
    }
}

$books_res = q( "
    SELECT *
    FROM `books` 
    WHERE `books_id` = " . (int)$_GET['id'] . "
    LIMIT 1
");

if (!$books_res->num_rows) {
    $_SESSION['info'] = 'Запись отсутствует';
    header('Location: /admin/books');
    exit();
}

$books = [];
while ($book_row = $books_res->fetch_assoc()) {

    $authors_res = q("
        SELECT *
        FROM `authors_books`
        WHERE `books_id` = " . (int)$book_row['books_id'] . "
    ");

    $authors_name = [];
    while ($author_row = $authors_res->fetch_assoc()) {

        $res_author_name = q("
            SELECT *
            FROM `authors`
            WHERE `authors_id` = '" . (int)$author_row['authors_id'] . "'
        ");

        while ($row_author_name = $res_author_name->fetch_assoc()) {
            $authors_name[$row_author_name['authors_id']] = $row_author_name['name'];
        }
    }

    $book_row['author'] = $authors_name;
    $books[] = $book_row;
}

foreach ($books as $k => $book) {
    $k = $book;
    foreach ($book['author'] as $k => $author) {
        $k = $author;

    }
}

if (isset($_POST['title'])) {
    $book['title'] = $_POST['title'];
}
if (isset($_POST['description'])) {
    $book['description'] = $_POST['description'];
}
if (isset($_POST['pages'])) {
    $book['pages'] = $_POST['pages'];
}

if (isset($_POST['author'])) {
    $book['author'] = $_POST['author'];
}
if (isset($_POST['price'])) {
    $book['price'] = $_POST['price'];
}

