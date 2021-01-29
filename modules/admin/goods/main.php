<?php
//
//if(isset($_POST['ids'])) {
//    if(isset($_POST['delete'])){
//        foreach ($_POST['ids'] as $k=>$v){
//            $_POST['ids'][$k] = int($v);
//        }
//
//        $ids = implode(',',$_POST['ids']);
//
//        q("
//        DELETE FROM `goods`
//        WHERE `id` IN (".$ids.")
//    ");
//
//        $_SESSION['info'] = 'Товары были удалены';
//        header('Location: /admin/goods');
//        exit();
//    }
//}
//
//if(isset($_GET['action'],$_GET['id']) && $_GET['action'] === 'delete' ) {
//    q("
//        DELETE FROM `goods`
//        WHERE `id` = " . (int)$_GET['id'] . "
//
//    ");
//
//    $_SESSION['info'] = 'Товар был удалён';
//    header('Location: /admin/goods');
//    exit();
//}
//
//if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete_img') {
//    q("
//        UPDATE `goods` SET
//          `img` = ''
//        WHERE `id` = " . (int)$_GET['id'] . "
//    ");
//
//    $_SESSION['info'] = 'Изображение было удалено';
//    header('Location: /admin/goods');
//    exit();
//
//}
//
//$goods = q( "
//    SELECT   *
//    FROM     `goods`
//    ORDER BY `id` DESC
//
//");
//
//if(isset($_SESSION['info'])) {
//    $info = $_SESSION['info'];
//    unset($_SESSION['info']);
//}


$comments_visible = q("
        SELECT *
        FROM `comments`
        WHERE `id` > 0
        LIMIT 10
    ");
$response = [];

while ($row_comments_visible = $comments_visible->fetch_assoc()) {
    $response['data'] = $row_comments_visible;
}

//    echo $response['id'] = $row_comments_visible['id'].'<br>';
//    echo $response['name'] = $row_comments_visible['name'].'<br>';
//    echo $response['text'] = $row_comments_visible['text'].'<br>';
//    foreach ($row_comments_visible as $name => $item) {
//        foreach ($item as $k => $v) {
//            echo $name[$k] = $v;
//        }
//    }

//wtf($response['id']);
//    foreach ($row_comments_visible as $k => $v) {
//        echo $k = $v;
//    }

//wtf($row_comments_visible);
//while ($row_comments_visible) {
//    echo $row_comments_visible['id'];
//}

//
//wtf($response);