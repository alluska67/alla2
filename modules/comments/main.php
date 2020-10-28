<?php
//Запрос на получение данных по комментариям на вывод
$result = q("SELECT * FROM `comments` ORDER BY `id`" );
//Если существуют выбранные записи - то выводим -> tpl

//Обработка комментариев
if (isset($_POST['name'], $_POST['comment'], $_POST['email'])) {
    $errors = [];
    if (empty($_POST['name'])) {
        $errors ['name'] = 'Вы не указали ваше Имя';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors ['email'] = 'Вы не заполнили Email';
    }
    if (empty($_POST['comment'])) {
        $errors ['comment'] = 'Вы не написали ваш комментарий';
    }

    //не содержит элементов в массиве
    if(!count($errors)) {
        q("
        INSERT INTO `comments` SET
        `name` = '".es($_POST['name'])."',
        `email`= '".es($_POST['email'])."',
        `text` = '".es($_POST['comment'])."'
        ");

        $_SESSION['commentok'] = 'OK';
        header("Location: /comments/main");
        exit();
    }
}


