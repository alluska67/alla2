<?php
//wtf($_POST);
if (isset($_POST['name'],$_POST['biography'], $_POST['years_of_life'],$_FILES['file'], $_POST['add'])) {
//wtf($_POST);
    $errors = [];

    if (empty($_POST['name'])) {
        $errors ['name'] = 'Вы не указали имя автора';
    }
    if (empty($_POST['biography'])) {
        $errors ['biography'] = 'Вы не написали краткую биографию';
    }
    if (empty($_POST['years_of_life'])) {
        $errors ['years_of_life'] = 'Вы не указали годы жизни автора';
    }
    if ($_FILES['file']['error'] == 4 ) {
        $errors ['files'] = 'Загрузите фото автора';
    }


    if (!count($errors)) {


        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
            INSERT INTO `authors` SET
            `name`        = '" . es($_POST['name']) . "',
            `biography`  = '" . es($_POST['biography']) . "',
            `years_of_life`  = '" . es($_POST['years_of_life']) . "'
        ");
        $authors_id = DB::_()->insert_id;
       // wtf($authors_id);



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
                WHERE `authors_id`     = ".(int)$authors_id."
            ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/authors');
            exit();

        } else {
            $_SESSION['info'] = 'Загрузите фотографию автора';
        }

    }
}