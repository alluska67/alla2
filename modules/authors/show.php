<?php

if (isset($_GET['action'],$_GET['author']) && $_GET['action'] == 'show') {
    $author_res = q("
        SELECT *
        FROM `authors`
        WHERE `authors_id` = '" . es($_GET['author']) . "'
        LIMIT 1
    ");
    $authors = [];
    while ($author_row = $author_res->fetch_assoc()) {

        $author_res = q("
        SELECT *
        FROM `authors_books`
        WHERE `authors_id` = " . (int)$author_row['authors_id'] . "
    ");

        $books_name = [];
        while ($book_row = $author_res->fetch_assoc()) {

            $res_book_title = q("
            SELECT *
            FROM `books`
            WHERE `books_id` = " . (int)$book_row['books_id'] . "
        ");

            while ($row_book = $res_book_title->fetch_assoc()) {
                $books_name[$row_book['books_id']] = [
                    'id' => $row_book['books_id'],
                    'title' => $row_book['title'],
                    'image' => $row_book['img']
                ];
            }
        }

        $author_row['book'] = $books_name;
        $authors[] = $author_row;
    }

}