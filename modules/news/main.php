<?php

//Core::$META['title'] = 'Новый параметр ';

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


$news_category = q("
    SELECT *
    FROM `news_category`
    ORDER BY `title_cat` ASC 

");

if(isset($_POST['news_category']) && $_POST['submit']) {
    $news = q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        WHERE `category_id` = " . (int)$_POST['news_category'] . "
        ORDER BY `date` DESC 
    ");
} else {
    $news = q("
        SELECT all_news.*, nc.title_cat
        FROM `all_news`
        JOIN news_category nc on nc.id_cat = all_news.category_id
        ORDER BY `date` DESC 

");
}


