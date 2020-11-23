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

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
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

Paginator::$current_page = $_GET['show_page'] ?? 1;
if(isset($_GET['news_category']) && $_GET['submit']) {
    Paginator::$category = int($_GET['news_category']);
    $query_count = q("
        SELECT COUNT(*) AS `cnt`
        FROM `all_news`
        WHERE `category_id` = " . Paginator::$category . " 
    ");

    $news = Paginator::q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        WHERE `category_id` = " . Paginator::$category . "
        ORDER BY `date` ASC 
    ");

} else {
    $query_count = q("
        SELECT COUNT(*) AS `cnt`
        FROM `all_news`"
    );

    $news = Paginator::q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        ORDER BY `date` ASC ");
}
Paginator::count($query_count);//3
//создание пути для пагинации
$uri = $_SERVER['REQUEST_URI'];
$uri = (explode('?',$_SERVER['REQUEST_URI']))[1] ?? '' ;
$uri = preg_replace('#show_page=\d#Ui','',$uri);
$uri = trim($uri,'&');

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}



















//
//$page = $_GET['show_page'] ?? 1;
//$start = $page - 5;
//$end = $page +5;
//
//if ($page > 1) {
//    $page = $page - 1;
//    echo '<a href = "?show_page=' . $page . '">' . 'Назад' . '</a>';
//
//}
//for ($i = $start; $i <= $end; ++$i) {
//    //wtf($start,1);
//    if ($i <= 0) {
//        continue;
//    }
//    if ($i >= Paginator::$page_count) {
//        break;
//    }
//
//    echo '<a href = "?show_page=' . $i . '">' . $i . '</a>';
//}
//$page = $_GET['show_page'] ?? 1;
//if ($page  < (Paginator::$page_count - 1)) {
//    $page = $page + 1;
//    echo '<a href = "?show_page=' . $page . '">' . 'Вперед' . '</a>';
//}



//wtf($news);
//wtf($news->num_rows );

//for ($i = $page; $i <= Paginator::$page_count; $i++) {
//   echo Paginator::nav($nav,$page);
//}
//echo Paginator::nav($nav,$page);
//echo Paginator::nav($nav,$page);
//while ($row = $news->fetch_assoc()){
//    //wtf($news->num_rows,1);
//    echo Paginator::nav($nav,$page);
//}

//$row = $res->fetch_assoc();
//
//echo Paginator::prevNav();
//
//for ($i = 1; $i <= $page_count; $i++) {
//    echo Paginator::navPrint($i,$i,1);
//}
//
//echo Paginator::nextNav($page_count);
//
//
