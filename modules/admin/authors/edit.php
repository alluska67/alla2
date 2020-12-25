<?php

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `authors` SET
        `img` = ''
        WHERE `authors_id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/authors/edit?id='.int($_GET['id']));
    exit();
}

if (isset($_POST['name'],$_POST['biography'], $_POST['years'], $_POST['edit'])) {

    $errors = [];

    if (empty($_POST['name'])) {
        $errors ['name'] = 'Вы не указали имя автора';
    }
    if (empty($_POST['biography'])) {
        $errors ['biography'] = 'Вы не написали краткую биографию';
    }
    if (empty($_POST['years'])) {
        $errors ['years'] = 'Вы не указали годы жизни автора';
    }

    if(!count($errors)) {

        $_POST = trimAll($_POST);

        q("
            UPDATE `authors` SET
            `name`             = '" . es($_POST['name']) . "',
            `biography`        = '" . es($_POST['biography']) . "',
            `years`    = " . (int)$_POST['years'] . "
            WHERE `authors_id` = " . (int)$_GET['id'] . "
        ");

        if(isset($_FILES['file']) && $_FILES['file']['error'] != 4) {

            if (!Upload::uploadImage($_FILES['file'], '/uploaded/authors/')) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/authors/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }

            if (!Upload::resize(Upload::$path_origin,Upload::$path,Upload::$temp , 150,150)) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/authors/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }

            $res = q("
                UPDATE `authors` SET           
                `img`          = '".es(Upload::$name_resized)."'
                WHERE `authors_id`     = ".(int)$_GET['id']."
            ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/authors');
            exit();

        }  else {

            $res = q("
                SELECT `img`
                FROM `authors`
                WHERE `authors_id` = " . (int)$_GET['id'] . "
            ");
            $row = $res->fetch_assoc();

            if (!$res->num_rows) {
                $res->close();
                $_SESSION['info'] = 'Загрузите обложку книги';
            } else {
                $res = q("
                    UPDATE `authors` SET
                    `img` = '" . es($row['img']) . "'
                    WHERE `authors_id` = " . (int)$_GET['id'] . "
                ");
                $_SESSION['info'] = Upload::$info['status'];
                header('Location: /admin/authors');
                exit();
            }

        }
    }
}

$authors_res = q( "
    SELECT *
    FROM `authors` 
    WHERE `authors_id` = " . (int)$_GET['id'] . "
    LIMIT 1
");

if (!$authors_res->num_rows) {
    $_SESSION['info'] = 'Запись отсутствует';
    header('Location: /admin/authors');
    exit();
}

$authors_row = $authors_res->fetch_assoc();


if (isset($_POST['name'])) {
    $authors_row['name'] = $_POST['name'];
}
if (isset($_POST['biography'])) {
    $authors_row['biography'] = $_POST['biography'];
}
if (isset($_POST['years'])) {
    $authors_row['years'] = $_POST['years'];
}



