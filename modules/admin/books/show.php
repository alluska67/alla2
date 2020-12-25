<?php

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

