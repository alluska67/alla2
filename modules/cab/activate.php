<?php
if (isset($_GET['hash'], $_GET['id'])) {
    $res = q("
        SELECT `login`
        FROM `users`
        WHERE `id`   = " . int($_GET['id']) . "
          AND `hash` = '" . es($_GET['hash']) . "'  
        LIMIT 1
    ");
    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_assoc($res);
        q("
            UPDATE `users` SET
            `active`     = 1
            WHERE `id`   = ".int($_GET['id'])."
              AND `hash` = '".es($_GET['hash'])."'  
        ");

        $info = 'Привет, '. ht($row['login']) .'! Вы активировали свою учетную запись по электронной почте.<br> Для дальнейшей авторизации на сайте '.'<a href="/cab/authorization">нажмите сюда</a>';

    }
}else {
    $info = 'Вы прошли по неверной ссылке';
}

