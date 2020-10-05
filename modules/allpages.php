<?php


if (isset($_SESSION['user'])) {
    $res = q("
        SELECT *
        FROM `users`
        WHERE `id` = " . (int)$_SESSION['user']['id'] . "
        LIMIT 1
    ");
    $_SESSION['user'] = mysqli_fetch_assoc($res);

    if ($_SESSION['user']['active'] != 1) {
        if(isset ($_GET['page']) && $_GET['page'] != 'exit') {
            include './modules/cab/exit.php';
        }
    }
} else {
    if (isset($_COOKIE['autoauthhash'], $_COOKIE['autoauthid'])) {
        $res = q("
            SELECT *
            FROM `users`
            WHERE `id`   = " . (int)$_COOKIE['autoauthid'] . "
              AND `hash` = '".es($_COOKIE['autoauthhash'])."'
            LIMIT 1
        ");
        $row = mysqli_fetch_assoc($res);

        if (mysqli_num_rows($res)) {
            $_SESSION['user'] = $row;

        } else {
            header("Location: /cab/exit");
            exit();
        }

    } elseif ($_GET['module'] == 'cab' && $_GET['page'] == 'main_cab') {
        header("Location: /");
        exit();
    }


}
