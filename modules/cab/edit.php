<?php

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] === 'delete_img') {
    q("
        UPDATE `users` SET
          `avatar` = ''
        WHERE `id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /cab/edit?id='.(int)$_GET['id']);
    exit();
}

if (isset($_POST['name'], $_POST['last_name'],$_POST['age'],$_POST['country'],$_POST['password'],$_POST['email'],$_POST['edit'])) {
    $errors = [];
    if (empty($_POST['name'])) {
        $errors ['name'] = 'Вы не указали ваше имя';
    }
    if (empty($_POST['last_name'])) {
        $errors ['last_name'] = 'Вы не указали вашу фамилию';
    }
    if (empty($_POST['age'])) {
        $errors ['age'] = 'Вы не указали ваш возраст';
    }
    if (empty($_POST['country'])) {
        $errors ['country'] = 'Вы не указали страну проживания';
    }

    if (!empty($_POST['password']) && mb_strlen($_POST['password']) < 5) {
        $errors ['password'] = 'Пароль должен быть длиннее 4-х символов';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors ['email'] = 'Вы не заполнили Email';
    }


    //проверка уникальности
    if (!count($errors)) {

        $res = q("
            SELECT  `id`
            FROM `users`
            WHERE `email` = '" . es($_POST['email']) ."'
              AND `id` <> " . (int)$_GET['id'] ." 
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors ['email'] = 'Такой email уже занят';
        }
    }

    if(!count($errors)){

        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
        UPDATE `users` SET
        `name`       = '" . es($_POST['name']) . "', 
        `last_name`  = '" . es($_POST['last_name']) . "',   
        `age`        = " . (int)($_POST['age']) . ",  
        `country`    = '" . es($_POST['country']) . "',                   
        `password`   = '".myHash($_POST['password'])."',
        `email`      = '" . es($_POST['email']) . "',
        `instagram`  = '" . es($_POST['instagram']) . "',
        `date_edited`=  NOW()
        WHERE `id`   = ".(int)$_GET['id']."
        ");

        if(isset($_FILES['file']) && $_FILES['file']['error'] != 4 ) {

            $image_info =  resizeImage ($_FILES['file'],'/uploaded/avatar/');

            if(isset($image_info['ok'])) {
                $res = q("
                    UPDATE `users` SET
                    `avatar` = '".es($image_info['resized_name'])."'
                    WHERE `id` = ".(int)$_GET['id']."
                    ");

                $_SESSION['info'] = 'Файл загружен!';
                header('Location: /cab/main_cab');
                exit();


            }else {
                $_SESSION['info'] = $image_info['error'] ;
                header('Location: /cab/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }
        } else{
            $_SESSION['info'] = 'Загрузите ваш аватар';
        }

    }

}




$users = q("
    SELECT *
    FROM `users`
    WHERE `id` = " . (int)$_GET['id'] ."
    LIMIT 1
");


if (!mysqli_num_rows($users)) {
    $_SESSION['info'] = 'Пользователь отсутствует';
    header('Location: /');
    exit();
}


$row = mysqli_fetch_assoc($users);


if (isset($_POST['name'])) {
    $row['name'] = $_POST['name'];
}
if (isset($_POST['last_name'])) {
    $row['last_name'] = $_POST['last_name'];
}
if (isset($_POST['age'])) {
    $row['age'] = $_POST['age'];
}
if (isset($_POST['country'])) {
    $row['country'] = $_POST['country'];
}

if (isset($_POST['password'])) {
    $row['password'] = $_POST['password'];
}

if (isset($_POST['email'])) {
    $row['email'] = $_POST['email'];
}

if (isset($_POST['instagram'])) {
    $row['instagram'] = $_POST['instagram'];
}


