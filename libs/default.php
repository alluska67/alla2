<?php
//подключение класса
ini_set('memory_limit','512M');

spl_autoload_register(function ($class) {
    include './libs/class_' . $class . '.php';
});

function wtf($array, $stop = false) {
    echo '<pre>'.print_r($array,1).'</pre>';
    if(!$stop) {
        exit();
    }
}

function printR($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

//mysqli_query
function q($query, $key = 0){
    $res = DB::_($key)->query($query);
    if($res === false) {
        $info = debug_backtrace();
        $error = "Query: " . $query . '<br>' . DB::_($key)->error."\r\n".
                 "File: ".$info[0]['file'].
                 "Line:".$info[0]['line'] .
                 "Date: " . date("Y-m-d H:i:s").
        "============================================";
        //Отправка уведомлений на почту
        //  Логирование ошибки
        file_put_contents('./logs/mysql.log', strip_tags($error)."\n\n", FILE_APPEND);
        echo $error;
        exit();

    }else{
        return $res;
    }
}

function trimAll ($el) {
    if(!is_array($el)){
        $el = trim($el);
    }else{
        $el = array_map("trimAll",$el);
    }
    return $el;
}

function ht($el) {
    if(!is_array($el)){
        $el = htmlspecialchars($el);
    }else{
        $el = array_map("ht",$el);
    }
    return $el;
}

function es($el, $key = 0) {
    return DB::_($key) ->real_escape_string($el);
}



function int($el) {
    if(!is_array($el)){
        $el = (int)$el;
    }else{
        $el = array_map("int",$el);
    }
    return $el;
}

function float($el) {
    if(!is_array($el)){
        $el = (float)$el;
    }else{
        $el = array_map("float",$el);
    }
    return $el;
}

function myHash ($var) {
    $var = password_hash($var,PASSWORD_DEFAULT);
    return $var;
}

//function resizeImage($file,$path) {
//
//    //загрузка
//    $image_type = ['image/gif','image/jpeg','image/png','image/bmp'];
//    $extention = ['jpg', 'jpeg', 'gif', 'png','bmp'];
//
//    $info = [];
//
//    if ($file['error'] != 0) {
//        $error = 1;
//        $info['message'] = 'Загрузка не прошла';
//
//
//    } elseif ($file['size'] < 5000 || $file['size'] > 5000000) {
//        $error = 1;
//        $info['message'] = 'Файл неподходящего размера';
//
//    }else {
//        preg_match('#([a-z]+)$#ui', $file['name'],$matches);
//
//        if(isset($matches[1])) {
//            $ext = mb_strtolower($matches[1]);
//            if(in_array($ext, $extention)) {
//                $temp = getimagesize($file['tmp_name']);
//
//                $name_original = date('Ymd-His') . 'img' . rand(10000, 99999) .'.' . $ext;
//                $path_origin = $path . $name_original;
//
//
//                if (!in_array($temp['mime'], $image_type)) {
//                    $error = 1;
//                    $info['message'] = 'Не подходит тип файла, можно загружать только изображения';
//
//                } elseif (!move_uploaded_file($file['tmp_name'],'.'. $path_origin)) {
//                    $error = 1;
//                    $info['message'] = 'Наше изображение не загружено';
//
//                } elseif (empty($error))  {
////
////                    // ресайз
////
////                    $name_resized = date('Ymd-His') . 'mini' . rand(10000, 99999) .'.jpg';
////                    $path_resized = $path . $name_resized;
////
////
////                    if($temp['mime'] == 'image/jpeg' || $temp['mime'] == 'image/jpg') {
////                        $img_create = 'imagecreatefromjpeg';
////                        $height = $temp[1];
////                        $width =  $temp[0];
////
////
////                    }elseif ($temp['mime'] == 'image/gif') {
////                        $img_create = 'imagecreatefromgif';
////                        $height = $temp[1];
////                        $width =  $temp[0];
////
////                    } elseif ($temp['mime'] == 'image/png') {
////                        $img_create = 'imagecreatefrompng';
////                        $height = $temp[1];
////                        $width =  $temp[0];
////
////                    } elseif ($temp['mime'] == 'image/bmp') {
////                        $img_create = 'imagecreatefrombmp';
////                        $height = $temp[1];
////                        $width =  $temp[0];
////
////                    } else {
////                        $error = 1;
////                        $info['message'] = 'Произошла ошибка обработки фото';
////                    }
////
////                    $img = $img_create('.'. $path_origin);
////
////                    $max_size_avatar = 100;
////                    if ($width > $height) {
////                        $newWidth = $max_size_avatar;
////                        $newHeight = $max_size_avatar / $width * $height;
////
////                    } else {
////                        $newWidth = $max_size_avatar / $height * $width;
////                        $newHeight = $max_size_avatar;
////                    }
////
////                    $tmp = imagecreatetruecolor($newWidth, $newHeight);
////                    $color = imagecolorallocate($tmp, 255, 255, 255);
////                    imagefill($tmp, 0, 0, $color);
////
////                    $src = imagecopyresampled($tmp,$img,0,0,0,0,$newWidth,$newHeight,$width,$height);
////
////                    $final_image = imagejpeg($tmp,'.'.$path_resized,100);
////
////                    imagedestroy($tmp);
//
//                    $info['status'] = 'Изображение загружено верно';
//
//                }
//            } else {
//                $error = 1;
//                $info['message'] = 'Данный файл не является картинкой';
//
//            }
//        } else {
//            $error = 1;
//            $info['message'] = 'Данный файл не имеет никакого расширения';
//
//        }
//    }
//
//    if(!empty($error)) {
//        $info['error'] = $info['message'];
//        return $info;
//
//    } else {
//        $info['original_name'] = $name_original;
////        $info['resized_name'] = $name_resized;
//        $info['ok'] = $info['status'];
//    }
//    return $info;
//}

/*
function deleteUser () {
    setcookie('autoauthhash', '', time() - 36000, '/');
    setcookie('autoauthid', '', time() - 36000, '/');
    session_unset();
    session_destroy();
    header("Location: /");
    exit();
}
*/