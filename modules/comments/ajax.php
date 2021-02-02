<?php

$response = [];
if (isset($_POST['last_id'])) {

    $comments_visible = q("
        SELECT *
        FROM `comments`
        " . (!empty($_POST['last_id']) ? 'WHERE `id` > ' . (int)$_POST['last_id'] : '') . "
        
    ");

    $response['data'] = [];

    while ($row_comments_visible = $comments_visible->fetch_assoc()) {
        $response['data'][] = $row_comments_visible;
    }

    $response['status'] = 'success';
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['name'], $_POST['text'], $_POST['email'])) {

        $errors = [];

        if (empty($_POST['name'])) {
            $errors ['name'] = 'Вы не указали ваше Имя';
        }
        if (empty($_POST['email'])) {
            $errors ['email'] = 'Вы не заполнили e-mail';
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors ['email'] = 'Введите e-mail по типу avocado@gmail.com';
        }
        if (empty($_POST['text']) || mb_strlen($_POST['text']) < 2) {
            $errors ['text'] = 'Вы не написали ваш комментарий';
        }

        if (!count($errors)) {
            $_POST = trimAll($_POST);


            q("
                INSERT INTO `comments` SET
                `name` = '" . es($_POST['name']) . "',
                `email`= '" . es($_POST['email']) . "',
                `text` = '" . es($_POST['text']) . "'
                ");
            $response['status'] = 'success';

        } else {
            $response['status'] = 'error';
            $response['data'] = $errors;

        }
    }
}
echo json_encode($response);
exit();



