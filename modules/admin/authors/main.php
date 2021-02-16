<?php
//Core::$META['title'] = 'Новый параметр ';

if (isset($_POST['delete'], $_POST['ids'])) {

    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'][$k] = (int)$v;
    }

    $ids = implode(',', $_POST['ids']);

    q("
        DELETE FROM `authors_books`
        WHERE `authors_id` IN (" . $ids . ")
    ");

    q("
        DELETE FROM `authors`
        WHERE `authors_id` IN (" . $ids . ")
    ");
    $_SESSION['info'] = 'Авторы были удалены';
    header('Location: /admin/authors');
    exit();
}

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete') {
    q("
        DELETE FROM `authors_books`
        WHERE `authors_id` = " . (int)$_GET['id'] . "
        
    ");

    q("
        DELETE FROM `authors`
        WHERE `authors_id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Автор был удалён';
    header('Location: /admin/authors');
    exit();
}

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `authors` SET
          `img` = ''
        WHERE `authors_id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/authors');
    exit();
}

Paginator::$current_page = $_GET['show_page'] ?? 1;

$query_count = q("
    SELECT COUNT(*) AS `cnt`
    FROM `authors`"
);

$authors_res = Paginator::q("
    SELECT *
    FROM `authors`
    ORDER BY `authors_id` ASC 
 ");

$authors = [];
while ($author_row = $authors_res->fetch_assoc()) {

    $books_res = q("
        SELECT *
        FROM `authors_books`
        WHERE `authors_id` = " . (int)$author_row['authors_id'] . "
    ");

    $books_name = [];
    while ($book_row = $books_res->fetch_assoc()) {

        $res_book_title = q("
            SELECT *
            FROM `books`
            WHERE `books_id` = " . (int)$book_row['books_id'] . "
        ");
        //Все книги автора
        while ($row_book_title = $res_book_title->fetch_assoc()) {
            $books_name[$row_book_title['books_id']] = $row_book_title['title'];
        }
    }

    $author_row['book'] = $books_name;
    $authors[] = $author_row;
}


Paginator::count($query_count);
//создание пути для пагинации
$uri = $_SERVER['REQUEST_URI'];
$uri = (explode('?',$_SERVER['REQUEST_URI']))[1] ?? '' ;
$uri = preg_replace('#show_page=\d#Ui','',$uri);
$uri = trim($uri,'&');

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}

















