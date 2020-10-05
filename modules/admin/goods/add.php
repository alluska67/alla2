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
        $insert_id = mysqli_insert_id($mysqli);

        if(isset($_FILES['file']) && $_FILES['file']['error'] != 4 ) {

            $image_info =  resizeImage ($_FILES['file'],'/uploaded/goods/');

            if(isset($image_info['ok'])) {
                $res = q("
                    UPDATE `goods` SET
                    `img` = '".es($image_info['resized_name'])."'
                    WHERE `id` = ".(int)$_GET['id']."
                    ");

                $_SESSION['info'] = 'Товар был добавлен на страничку';
                header('Location: /admin/goods');
                exit();


            } else {
                $_SESSION['info'] = $image_info['error'] ;
                header('Location: /admin/goods/edit?id='.(int)$_GET['id']);
                exit();
            }
        } else{
            $_SESSION['info'] = 'Загрузите картинку товара';
        }

    }
}


