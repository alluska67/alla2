<?php
//Core::$META['title'] = 'Новый параметр ';


if (isset($_POST['delete'], $_POST['ids'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'][$k] = (int)$v;
    }

    $ids = implode(',', $_POST['ids']);

    q("
        DELETE FROM `all_news`
        WHERE `id` IN (" . $ids . ")
    ");
    $_SESSION['info'] = 'Новости были удалены';
    header('Location: /admin/news');
    exit();
}

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete') {
    q("
        DELETE FROM `all_news`
        WHERE `id` = " . (int)$_GET['id'] . "
    
    ");

    $_SESSION['info'] = 'Новость была удалена';
    header('Location: /admin/news');
    exit();
}



if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `all_news` SET
          `img` = ''
        WHERE `id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/news');
    exit();

}






$news_category = q("
    SELECT *
    FROM `news_category`
    ORDER BY `title_cat` ASC 

");

if(isset($_POST['news_category']) && $_POST['submit']) {
    $display_category = q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        WHERE `category_id` = " . (int)$_POST['news_category'] . "
        ORDER BY `date` DESC 
    ");
}

$all_current_news = q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        ORDER BY `date` DESC 

");



//
//if(isset($category['title'])) {
//    $_POST['title'] = $category['title'];
//}


if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}