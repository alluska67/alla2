<?php


if (isset($_POST['login'], $_POST['password'])) {
    $res = q("
        SELECT *
        FROM `users`
        WHERE `login`  = '".es($_POST['login'])."'
          AND `active` = 1
        LIMIT            1
     ");
    $row = mysqli_fetch_assoc($res);

    if (password_verify($_POST['password'], $row['password'])) {
        if (mysqli_num_rows($res)) {
            $_SESSION['user'] = $row;
            $status = 'Ok';
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
                //Для вывода имени пользователя
                $res = q(
                    "
                    SELECT *
                    FROM `users`
                    WHERE `login` = '" . es($_POST['login']) . "'
                    LIMIT 1
                "
                );
                $row = mysqli_fetch_assoc($res);
                setcookie('autoauthhash', $row['hash'], time() + 36000, '/');
                setcookie('autoauthid', $row['id'], time() + 36000, '/');
                $_SESSION['user'] = $row;
            }
        } else {
            $errors = 'Нет пользователя с таким логином или паролем';
        }
    } else {
        $errors = 'Пароли не совпадают либо вас забанили.';
    }

}




