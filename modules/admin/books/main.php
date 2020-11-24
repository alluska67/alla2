<?php
//Core::$META['title'] = 'Новый параметр ';

if (isset($_POST['delete'], $_POST['ids'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'][$k] = (int)$v;
    }

    $ids = implode(',', $_POST['ids']);

    q("
        DELETE FROM `authors_books`
        WHERE `books_id` IN (" . $ids . ")
    ");

    q("
        DELETE FROM `books`
        WHERE `books_id` IN (" . $ids . ")
    ");
    $_SESSION['info'] = 'Книги были удалены';
    header('Location: /admin/books');
    exit();
}

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete') {
    q("
        DELETE FROM `authors_books`
        WHERE `books_id` = " . (int)$_GET['id'] . "
        
    ");

    q("
        DELETE FROM `books`
        WHERE `books_id` = " . (int)$_GET['id'] . "
    ");


    $_SESSION['info'] = 'Книга была удалена';
    header('Location: /admin/books');
    exit();
}

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `books` SET
          `img` = ''
        WHERE `books_id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/books');
    exit();
}

Paginator::$current_page = $_GET['show_page'] ?? 1;

$query_count = q("
    SELECT COUNT(*) AS `cnt`
    FROM `books`"
);

$books_res = Paginator::q("
    SELECT *
    FROM `books`
    ORDER BY `date` ASC ");


$books = [];
while ($book_row = $books_res->fetch_assoc()) {

    $authors_res = q("
        SELECT *
        FROM `authors_books`
        WHERE `books_id` = " . (int)$book_row['books_id'] . "
    ");

    $authors_name = [];
    while ($author_row = $authors_res->fetch_assoc()) {

        $res_author_name = q("
            SELECT *
            FROM `authors`
            WHERE `authors_id` = '" . (int)$author_row['authors_id'] . "'
        ");

        while ($row_author_name = $res_author_name->fetch_assoc()) {
            $authors_name[$row_author_name['authors_id']] = $row_author_name['name'];
        }
    }

    $book_row['author'] = $authors_name;
    $books[] = $book_row;
}
//wtf($books);
//
//foreach ($books as $k=>$v) {
//    $k = $v;
//
//
//}


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
