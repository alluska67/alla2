<?php
//Core::$JS = '<script type="text/javascript" src="skins/default/js/scripts_v1.js"></script>';


if (isset($_POST['login'], $_POST['password']) && mb_strlen($_POST['password']) > 5) {


    $res = q("
        SELECT *
        FROM `users`
        WHERE `login`  = '".es($_POST['login'])."'
          AND `active` = 1
        LIMIT            1
     ");
    $row = $res->fetch_assoc();

    if ($res->num_rows) {
        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['user'] = $row;
            $status = 'Ok';

            if(isset($_POST['uri']))  {
                //wtf($_POST['uri']);
                header('Location: '.$_POST['uri']);
                exit();
            }

            if (isset($_POST['autoauth'])) {
                $hash = myHash($_SESSION['user']['id'] . $_SESSION['user']['login'] . $_SESSION['user']['email']);
                $res = q(
                    "
                    UPDATE `users` SET
                    `hash`     = '" . es($hash) . "',
                    `ip`       = '" . es($_SERVER['REMOTE_ADDR']) . "',
                    `browser`  = '" . es($_SERVER['HTTP_USER_AGENT']) . "'
                    WHERE `id` = " . (int)$row['id'] . "
            "
                );
                $res->close();
                //Для вывода имени пользователя
                $res = q(
                    "
                    SELECT *
                    FROM `users`
                    WHERE `login` = '" . es($_POST['login']) . "'
                    LIMIT 1
                "
                );
                $row = $res->fetch_assoc();
                $res->close();
                setcookie('autoauthhash', $row['hash'], time() + 36000, '/');
                setcookie('autoauthid', $row['id'], time() + 36000, '/');
                $_SESSION['user'] = $row;
            }
        } else {
            $errors = 'Пароли не совпадают либо вас забанили.';
            header('Location: /cab/authorization');
            exit();
        }
    } else {
        $errors = 'Нет пользователя с таким логином или паролем';
    }

} elseif (empty($_POST['login']) || empty($_POST['password'])) {
    $errors = 'Введите логин и пароль для авторизации на сайте';
}




