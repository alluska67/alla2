<?php


if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete') {
    q("
        DELETE FROM `users`
        WHERE `id` = ".int($_GET['id'])."
    
    ");

    $_SESSION['info'] = 'Страница удалена';
    header('Location: cab/exit');
    exit();
}

$users = q( "
    SELECT   *
    FROM     `users`
    WHERE `id` = ".(int)$_SESSION['user']['id']."
     
");


if(isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}
