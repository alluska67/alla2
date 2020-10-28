<?php

if (isset($_GET['hash'], $_GET['id'])) {
    $res = q("
        SELECT `login`
        FROM `users`
        WHERE `id`   = " . int($_GET['id']) . "
          AND `hash` = '" . es($_GET['hash']) . "'  
        LIMIT 1
    ");
    if ($res->num_rows) {
        $row = $res->fetch_assoc();
        $res->close();
        q("
            UPDATE `users` SET
            `active`     = 1
            WHERE `id`   = ".int($_GET['id'])."
              AND `hash` = '".es($_GET['hash'])."'  
        ");

        $_SESSION['info'] = 'Привет, '. ht($row['login']) .'! Вы активировали свою учетную запись по электронной почте.<br> Для дальнейшей авторизации на сайте '.'<a href="/cab/authorization">нажмите сюда</a>';

    }
}else {
    $_SESSION['info'] = 'Вы прошли по неверной ссылке';

}

