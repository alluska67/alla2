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
        if (empty($_POST['text']) || mb_strlen($_POST['text']) < 5) {
            $errors ['text'] = 'Вы не написали ваш комментарий';
        }

        if (!count($errors)) {
            $_POST = trimAll($_POST);

            $_POST['date'] = date("Y-m-d H:i:s");

            q("
                INSERT INTO `comments` SET
                `name` = '" . es($_POST['name']) . "',
                `email`= '" . es($_POST['email']) . "',
                `text` = '" . es($_POST['text']) . "',
                `date` = '" . es($_POST['date']) . "'
                ");
            $comment_id = DB::_()->insert_id;
            $res = q("
                SELECT *
                FROM `comments`
                WHERE `id` = " . (int)$comment_id . "
            ");
            $new_massage = $res->fetch_assoc();

            $response['status'] = 'success';
            $response['data'] = $new_massage;

        } else {
            $response['status'] = 'error';
            $response['data'] = $errors;

        }
    }
}
echo json_encode($response);
exit();



if (isset($_POST['data'])) {
    // Последний выведенный комментарий 0


    $comments_visible = q("
        SELECT *
        FROM `comments`
        WHERE `id` > 0
    ");

    $row_comments_visible = $comments_visible->fetch_assoc();
    while ($row_comments_visible) {
        echo $row_comments_visible['id'];
    }






















    while ($row_comments = $result->fetch_assoc()){
        $response['last'] =  $row_comments['id'] ;
    }
    // Максимально большое значение кмментария в БД
    $result = q("
        SELECT max(`id`) as `maxid`    
        FROM `comments`
    ");
    $last_id = $result->fetch_assoc();

    if ($response['last'] > $last_id || $response['last'] == $last_id) {
        $response['status'] = 'error';
        $response['data'] =  'Новых комментариев нету';

    } else {

        $response['status'] = 'success';
        $last_comment_res = q("
        SELECT *
        FROM `comments`
        WHERE `id` = " . (int)$last_id['maxid'] . "
    ");
        $response['data'] = $last_comment_res->fetch_assoc();
    }




}


echo json_encode($response);
exit();



//if (isset($_POST['data'])) {
//    // Последний выведенный комментарий
//    $result = q("
//        SELECT *
//        FROM `comments`
//        ORDER BY `date` DESC
//        LIMIT 1
//");
//
//    while ($row_comments = $result->fetch_assoc()){
//        $response['last'] =  $row_comments['id'] ;
//    }
//    // Максимально большое значение кмментария в БД
//    $result = q("
//        SELECT max(`id`) as `maxid`
//        FROM `comments`
//    ");
//    $last_id = $result->fetch_assoc();
//
//    if ($response['last'] > $last_id || $response['last'] == $last_id) {
//        $response['status'] = 'error';
//        $response['data'] =  'Новых комментариев нету';
//
//    } else {
//
//        $response['status'] = 'success';
//        $last_comment_res = q("
//        SELECT *
//        FROM `comments`
//        WHERE `id` = " . (int)$last_id['maxid'] . "
//    ");
//        $response['data'] = $last_comment_res->fetch_assoc();
//    }


