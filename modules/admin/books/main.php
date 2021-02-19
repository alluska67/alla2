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
    ORDER BY `date` ASC 
");

$books = $books_ids_select = [];
while ($books_row = $books_res->fetch_assoc()) {
    $books[$books_row['books_id']] = $books_row;
}
//собираем ключи массива(id)
$books_ids_select = array_keys($books);

$books_ids_string = implode(',', $books_ids_select);

$relations_res = q("
    SELECT *
    FROM `authors_books`
    WHERE `books_id` IN (" . es($books_ids_string) . ")
");

$authors_ids_select = $relations = [];

//определяем связь ID Author vs ID Book
while ($row = $relations_res->fetch_assoc()) {
    $authors_ids_select[] = $row['authors_id'];
    $relations[$row['books_id']][] = $row['authors_id'];
}

// Убрать лишние элементы в массиве
$unique = array_unique($authors_ids_select);
$authors_ids_string = implode(',', $unique);

//Выбираем данные о авторе
$res_author= q("
    SELECT *
    FROM `authors`
    WHERE `authors_id` IN (" . es($authors_ids_string) . ")
");

while($row = $res_author->fetch_assoc()) {
    foreach ($relations as $k => $v) {
        if(in_array($row['authors_id'], $v)) {
            $books[$k]['authors'][] = $row;
        }
    }
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
