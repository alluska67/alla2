<?php

//Обработка регистрации
if (isset($_POST['login'], $_POST['password'], $_POST['email'], $_POST['age'])) {
    $errors = [];
    if (empty($_POST['login'])) {
        $errors ['login'] = 'Вы не заполнили Login';
    } elseif (mb_strlen($_POST['login']) < 2) {
        $errors ['login'] = 'Логин слишком короткий';
    } elseif (mb_strlen($_POST['login']) > 16) {
        $errors ['login'] = 'Логин слишком длинный';
    }
    if (mb_strlen($_POST['password']) < 5) {
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
            WHERE `login` = '".es($_POST['login'])."'
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors ['login'] = 'Такой логин уже занят';
        }
        $res = q("
            SELECT  `id`
            FROM `users`
            WHERE `email` = '".es($_POST['email'])."'
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors ['email'] = 'Такой email уже занят';
        }
    }

    //не содержит элементов в массиве
    if (!count($errors)) {
        $hash = myHash($_POST['login'] . $_POST['email']);


        q("
            INSERT INTO `users` SET
            `login`   = '".es($_POST['login'])."',
            `password`= '".myHash($_POST['password'])."',
            `email`   = '".es($_POST['email'])."',
            `age`     =  ".int($_POST['age']).",
            `hash`    = '".es($hash)."'
            ");

        $id = mysqli_insert_id($mysqli);

        $_SESSION['regok'] = 'OK';

        Mail::$to = $_POST['email'];
        Mail::$subject = 'Вы зарегестрировались на сайте';
        Mail::$text = '
        Если это сообщение пришло вам по ошибке, то проигнорируйте его.
        Если это вы регестрировались на сайте , то пройдите по ссылке для активации Вашего аккаунта: '.Core::$DOMAIN.'index.php?module=cab&page=activate&id='.$id.'&hash='.$hash.'
        ';
        Mail::send();
        header("Location: /cab/registration");
        exit();
    }
}







