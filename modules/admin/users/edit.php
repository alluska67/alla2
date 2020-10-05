<?php

$active_category = [
    0 => 'Не активен',
    1 => 'Активен',
    3 => 'Бан'
];

$admin_category = [
    3 => 'Не админ',
    7 => 'Админ'
];


if (isset($_POST['login'],$_POST['password'],$_POST['active'],$_POST['email'],$_POST['edit'])) {
    $errors = [];
    if (empty($_POST['login'])) {
        $errors ['login'] = 'Вы не заполнили Login';
    } elseif (mb_strlen($_POST['login']) < 2) {
        $errors ['login'] = 'Логин слишком короткий';
    } elseif (mb_strlen($_POST['login']) > 16) {
        $errors ['login'] = 'Логин слишком длинный';
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
            WHERE `login` = '" . es($_POST['login']) ."'
              AND `id` <> " . int($_GET['id']) ." 
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors ['login'] = 'Такой логин уже занят';
        }

        $res = q("
            SELECT  `id`
            FROM `users`
            WHERE `email` = '" . es($_POST['email']) ."'
              AND `id` <> " . int($_GET['id']) ." 
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
        `login`       = '" . es($_POST['login']) . "',                         
        `password`    = '".myHash($_POST['password'])."',
        `active`      = " . (int)($_POST['active']) . ",
        `access`      = " . (int)($_POST['access']) . ",
        `email`       = '" . es($_POST['email']) . "',
        `date_edited`=  NOW()
        WHERE `id` = ".int($_GET['id'])."
        ");

        $_SESSION['info'] = 'Учётная запись изменена';
        header('Location: /admin/users');
        exit();
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
    header('Location: /admin/users');
    exit();
}


$row = mysqli_fetch_assoc($users);


if (isset($_POST['login'])) {
    $row['login'] = $_POST['login'];
}

if (isset($_POST['password'])) {
    $row['password'] = $_POST['password'];
}

if (isset($_POST['email'])) {
    $row['email'] = $_POST['email'];
}


// проверка ключей в массиве
if (isset($_POST['active'])) {
    if (array_key_exists($_POST['active'], $active_category)) {
        $row['active'] = $_POST['active'];
    } else {
        $row['active'] = 1;
    }
}
if (isset($_POST['access'])) {
    if (array_key_exists($_POST['access'], $admin_category)) {
        $row['access'] = $_POST['access'];
    } else {
        $row['access'] = 3;
    }
}



