<?php

$goods_category = [
    1 => 'Акварельные краски',
    2 => 'Акриловые краски',
    3 => 'Масляные краски'
];

$in_stock = [
    1 => 'В наличии',
    2 => 'Нету в наличии',
    3 => 'Под заказ'
];

if (isset($_POST['category'], $_POST['name'], $_POST['vendor_code'], $_POST['availability'], $_POST['description'], $_POST['price'], $_POST['delivery'],$_FILES['file'], $_POST['add'])) {
    $errors = [];

    if (empty($_POST['category']) || !array_key_exists($_POST['category'], $goods_category)) {
        $errors ['category'] = 'Выберите категорию товара';
    }
    if (empty($_POST['name'])) {
        $errors ['name'] = 'Введите название товара';
    }
    if (empty($_POST['vendor_code'])) {
        $errors ['vendor_code'] = 'Введите код товара';
    }
    if (empty($_POST['availability']) || !array_key_exists($_POST['availability'], $in_stock)) {
        $errors ['availability'] = 'Введите наличие товара';
    }
    if (empty($_POST['description'])) {
        $errors ['description'] = 'Введите описание товара';
    }
    if (empty($_POST['price']) && !is_numeric($_POST['price'])) {
        $errors ['price'] = 'Введите цену товара';
    }
    if (empty($_POST['delivery'])) {
        $errors ['delivery'] = 'Введите информацию о доставке товара';
    }
    if (empty($_POST['delivery'])) {
        $errors ['delivery'] = 'Введите информацию о доставке товара';
    }
    if ($_FILES['file']['error'] == 4 ) {
        $errors ['files'] = 'Загрузите изображение';
    }

    if (!count($errors)) {

        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
        INSERT INTO `goods` SET
        `category`    = '" . es($_POST['category']) . "',                      
        `name`        = '" . es( $_POST['name']) . "',
        `vendor_code` = '" . es($_POST['vendor_code']) . "',
        `availability`= '" . es($_POST['availability']) . "',
        `description` = '" . es($_POST['description']) . "',
        `price`       =  " . (float)$_POST['price'] . ",
        `delivery`    = '" . es($_POST['delivery']) . "',
        `date`        = NOW()
        "
        );
  //id только что добавленный
        $insert_id = DB::_()->insert_id;

        if(isset($_FILES['file']) && $_FILES['file']['error'] != 4) {

            if (!Upload::uploadImage($_FILES['file'], '/uploaded/goods/')) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/goods/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }

            if (!Upload::resize(Upload::$path_origin,Upload::$path,Upload::$temp , 100, 100)) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/goods/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }

            $res = q("
                UPDATE `goods` SET
                `img` = '".es(Upload::$name_resized)."'
                WHERE `id` = ".(int)$insert_id."
            ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/goods');
            exit();

        } else {
            $_SESSION['info'] = 'Загрузите фото товара';
        }

    }
}


