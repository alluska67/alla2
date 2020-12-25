<?php

//Core::$META['title'] = 'Новый параметр ';

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}

$news_category = q("
    SELECT *
    FROM `news_category`
    ORDER BY `title_cat` ASC 

");

Paginator::$current_page = $_GET['show_page'] ?? 1;
if (isset($_GET['news_category']) && $_GET['submit']) {
    Paginator::$category = int($_GET['news_category']);
    $query_count = q("
        SELECT COUNT(*) AS `cnt`
        FROM `all_news`
        WHERE `category_id` = " . (int)Paginator::$category . " 
    ");

    $news = Paginator::q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        WHERE `category_id` = " . (int)Paginator::$category . "
        ORDER BY `date` ASC 
    ");

} else {
    $query_count = q("
        SELECT COUNT(*) AS `cnt`
        FROM `all_news`
    ");

    $news = Paginator::q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        ORDER BY `date` ASC
    ");
}
Paginator::count($query_count);

$uri = $_SERVER['REQUEST_URI'];
$uri = (explode('?',$_SERVER['REQUEST_URI']))[1] ?? '' ;
$uri = preg_replace('#show_page=\d#Ui','',$uri);
$uri = trim($uri,'&');



