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

if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
    q("
        UPDATE `goods` SET
          `img` = ''
        WHERE `id` = " . (int)$_GET['id'] . "
    ");

    $_SESSION['info'] = 'Изображение было удалено';
    header('Location: /admin/goods/edit?id='.int($_GET['id']));
    exit();
}

if (isset($_POST['category'], $_POST['name'], $_POST['vendor_code'], $_POST['availability'], $_POST['description'], $_POST['price'], $_POST['delivery'],$_POST['add'])) {
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

    if(!count($errors)){

        //удаление лишних пробелов
        $_POST = trimAll($_POST);

        q("
            UPDATE `goods` SET
            `category`    = '" . es($_POST['category']) . "',                         
            `name`        = '" . es($_POST['name']) . "',
            `vendor_code` = '" . es($_POST['vendor_code']) . "',
            `availability`= '" . es($_POST['availability']) . "',
            `description` = '" . es($_POST['description']) . "',
            `price`       =  " . (float)$_POST['price'] . ",
            `delivery`    = '" . es($_POST['delivery']) . "',
            `date_changed`=  NOW()
            WHERE `id` = ".(int)$_GET['id']."
        ");

        if (isset($_FILES['file']) && $_FILES['file']['error'] != 4) {

            if (!Upload::uploadImage($_FILES['file'], '/uploaded/goods/')) {
                $_SESSION['info'] = Upload::$info['error'] ;
                header('Location: /admin/goods/edit?id='.(int)$_GET['id']);
                exit($_SESSION['info']);
            }

            if (!Upload::resize(Upload::$path_origin,Upload::$path,Upload::$temp, 200, 150)) {
                $_SESSION['info'] = Upload::$info['error'];
                header('Location: /admin/goods/edit?id=' . (int)$_GET['id']);
                exit($_SESSION['info']);
            }

            $res = q("
                UPDATE `goods` SET
                `img` = '".es(Upload::$name_resized)."'
                WHERE `id` = ".(int)$_GET['id']."
                ");
            $_SESSION['info'] = Upload::$info['status'];
            header('Location: /admin/goods');
            exit();

        } else {
            $_SESSION['info'] = 'Загрузите фото товара';
        }
    }
}


$goods = q("
    SELECT *
    FROM `goods`
    WHERE `id` = " . (int)$_GET['id'] ."
    LIMIT 1
");

if (!mysqli_num_rows($goods)) {
    $_SESSION['info'] = 'Запись отсутствует';
    header('Location: /admin/goods');
    exit();
}

$row = mysqli_fetch_assoc($goods);

// проверка ключей в массиве
if (isset($_POST['category'])) {
    if (array_key_exists($_POST['category'], $goods_category)) {
        $row['category'] = $_POST['category'];
    } else {
        $row['category'] = 1;
    }
}

if (isset($_POST['name'])) {
    $row['name'] = $_POST['name'];
}
if (isset($_POST['vendor_code'])) {
    $row['vendor_code'] = $_POST['vendor_code'];
}
// проверка ключей в массиве
if (isset($_POST['availability'])) {
    if (array_key_exists($_POST['availability'], $in_stock)) {
        $row['availability'] = $_POST['availability'];
    } else {
        $row['availability'] = 1;
    }
}
if (isset($_POST['description'])) {
    $row['description'] = $_POST['description'];
}
if (isset($_POST['price'])) {
    $row['price'] = $_POST['price'];
}
if (isset($_POST['delivery'])) {
    $row['delivery'] = $_POST['delivery'];
}

