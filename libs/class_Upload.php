<?php


class Upload
{
    static $path;
    static $info;
    static $temp;
    static $path_origin;
    static $name_resized;


    static function uploadImage($file, $path) {

        $image_type = ['image/gif','image/jpeg','image/png','image/bmp'];
        $extention = ['jpg', 'jpeg', 'gif', 'png','bmp'];

        $status = '';
        $error = '';

        if ($file['error'] != 0) {
            $error = 'Загрузка не прошла';
        } elseif ($file['size'] < 5000 || $file['size'] > 5000000) {
            $error = 'Файл неподходящего размера';
        }else {
            preg_match('#([a-z]+)$#ui', $file['name'],$matches);
            if(isset($matches[1])) {
                $ext = mb_strtolower($matches[1]);
                if(in_array($ext, $extention)) {
                    $temp = getimagesize($file['tmp_name']);

                    $name_original = date('Ymd-His') . 'img' . rand(10000, 99999) .'.' . $ext;
                    $path_origin = $path . $name_original;


                    if (!in_array($temp['mime'], $image_type)) {
                        $error = 'Не подходит тип файла, можно загружать только изображения';
                    } elseif (!move_uploaded_file($file['tmp_name'],'.'. $path_origin)) {
                        $error = 'Наше изображение не загружено';
                    } elseif (empty($error))  {
                        $status = 'Наше изображение загружено';
                    }
                } else {
                    $error = 'Данный файл не является изображением';
                }
            } else {
                $error = 'Данный файл не имеет никакого расширения';
            }
        }

        if (!empty($error)) {
            self::$info['error'] =  $error;
            return false;
        }

        self::$info['original_name'] = $name_original;
        self::$temp = $temp;
        self::$path_origin = $path_origin;
        self::$info['status'] =  $status;
        self::$path = $path;
        return true;
    }

    static function resize ($path_origin, $path, $temp, $newWidth, $newHeight ) {

        $name_resized = date('Ymd-His') . 'mini' . rand(10000, 99999) .'.jpg';
        $path_resized = $path . $name_resized;

        if($temp['mime'] == 'image/jpeg' || $temp['mime'] == 'image/jpg') {
            $img_create = 'imagecreatefromjpeg';
            $height_orig = $temp[1];
            $width_orig =  $temp[0];

        }elseif ($temp['mime'] == 'image/gif') {
            $img_create = 'imagecreatefromgif';
            $height_orig = $temp[1];
            $width_orig =  $temp[0];

        } elseif ($temp['mime'] == 'image/png') {
            $img_create = 'imagecreatefrompng';
            $height_orig = $temp[1];
            $width_orig =  $temp[0];

        } elseif ($temp['mime'] == 'image/bmp') {
            $img_create = 'imagecreatefrombmp';
            $height_orig = $temp[1];
            $width_orig =  $temp[0];

        } else {
            self::$info['error'] = 'Произошла ошибка обработки изображения';
            return false;
        }

        $img = $img_create('.'. $path_origin);



        $ratio_orig = $width_orig/$height_orig;

        if ($newWidth/$newHeight > $ratio_orig) {
            $newWidth = $newHeight*$ratio_orig;
        } else {
            $newHeight = $newWidth/$ratio_orig;
        }

//        if ($width > $height) {
//            $newWidth = $max_size_avatar;
//            $newHeight = $max_size_avatar / $width * $height;
//
//        } else {
//            $newWidth = $max_size_avatar / $height * $width;
//            $newHeight = $max_size_avatar;
//        }

        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        $color = imagecolorallocate($tmp, 255, 255, 255);

        imagefill($tmp, 0, 0, $color);
        imagecopyresampled($tmp,$img,0,0,0,0,$newWidth,$newHeight,$width_orig,$height_orig);
        imagejpeg($tmp,'.'.$path_resized,100);
        imagedestroy($tmp);

        $info['status'] = 'Изображение загружено верно';
        self::$name_resized = $name_resized;
        return true;
    }
}