<?php



//Core::$META['title'] = 'Новый параметр ';

if (isset($_POST['delete'], $_POST['ids'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'][$k] = (int)$v;
    }

    $ids = implode(',', $_POST['ids']);

    q("
        DELETE FROM `news`
        WHERE `id` IN (" . $ids . ")
    ");
    $_SESSION['info'] = 'Новости были удалены';
    header('Location: /admin/news');
    exit();
}

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete') {
    q("
        DELETE FROM `news`
        WHERE `id` = " . (int)$_GET['id'] . "
    
    ");
    $_SESSION['info'] = 'Новость была удалена';
    header('Location: /admin/news');
    exit();
}

$news = q("
    SELECT   *
    FROM     `news`
    ORDER BY `date` DESC 
"
);
if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}