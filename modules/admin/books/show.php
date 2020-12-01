<?php
//
//if (isset($_GET['action'],$_GET['author']) && $_GET['action'] == 'show') {
//    $author_res = q("
//        SELECT *
//        FROM `authors`
//        WHERE `authors_id` = '" . es($_GET['author']) . "'
//        LIMIT 1
//
//    ");
//    $authors = [];
//    while ($author_row = $author_res->fetch_assoc()) {
//
//        $author_res = q("
//        SELECT *
//        FROM `authors_books`
//        WHERE `authors_id` = " . (int)$author_row['authors_id'] . "
//    ");
//
//        $books_name = [];
//        while ($book_row = $author_res->fetch_assoc()) {
//
//            $res_book_title = q("
//            SELECT *
//            FROM `books`
//            WHERE `books_id` = '" . (int)$book_row['books_id'] . "'
//        ");
//            //Все книги автора
//            while ($row_book = $res_book_title->fetch_assoc()) {
//                $books_name[$row_book['books_id']] = [
//                    'title' => $row_book['title'],
//                    'image' => $row_book['img']
//                ];
//            }
//        }
////        wtf($books_name);
//        $author_row['book'] = $books_name;
//        //wtf($author_row);
//        $authors[] = $author_row;
//    }
//}
//
////}
if (isset($_GET['action'],$_GET['book']) && $_GET['action'] == 'show') {

    $books_res = q("
        SELECT *
        FROM `books`
        WHERE `books_id` = '" . es($_GET['book']) . "'
        LIMIT 1
");


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


            while ($row_author = $res_author_name->fetch_assoc()) {
                $authors_name[$row_author['authors_id']] = [
                    'id' => $row_author['authors_id'],
                    'name' => $row_author['name'],
                    'image' => $row_author['img'],

                ];

            }
        }

        $book_row['author'] = $authors_name;
        $books[] = $book_row;
    }

}









//
//while ($book = $books->fetch_assoc()) {
//$authors = q("
//            SELECT *
//            FROM `authors_books`
//            WHERE `books_id` = " . (int)$book['books_id'] . "
//            ORDER BY `authors_id` ASC
//            ");
//while ($all_authors = $authors->fetch_assoc()) {
//$name = q("
//                    SELECT *
//                    FROM `authors`
//                    WHERE `authors_id` = '" . (int)$all_authors['authors_id'] . "'
//
//        ");

