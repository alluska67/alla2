<?php

if(isset($_POST['ids'])) {
    if(isset($_POST['delete'])){
        foreach ($_POST['ids'] as $k=>$v){
            $_POST['ids'][$k] = int($v);
        }

        $ids = implode(',',$_POST['ids']);

        q("
        DELETE FROM `goods`
        WHERE `id` IN (".$ids.")
    ");

        $_SESSION['info'] = 'Товары были удалены';
        header('Location: /admin/goods');
        exit();
    }
}

if(isset($_GET['action'],$_GET['id']) && $_GET['action'] === 'delete' ) {
    q("
        DELETE FROM `goods`
        WHERE `id` = " . (int)$_GET['id'] . "
    
    ");

    $_SESSION['info'] = 'Товар был удалён';
    header('Location: /admin/goods');
    exit();
}

if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `goods` SET
          `img` = ''
        WHERE `id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/goods');
    exit();

}

$goods = q( "
    SELECT   *
    FROM     `goods`
    ORDER BY `id` ASC 
");


if(isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}