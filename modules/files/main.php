<?php

function read($link){

    $result = '';

    if (strpos($link, '../') !== false){
        $result = 'Нельзя заходить в директорию на уровень выше';
    } else{
        $files = scandir('./'. $link);

        foreach ($files as $value){
            if(is_dir('./'. $link. '/' .$value)){
                if (($value != '.') && ($value != '..'))
                    $result .= '<img src="/skins/default/img/icons/directory.png">'.'<a href="/files&link=' . (isset($link) ? $link . '/' . $value : $value) . '">'.$value .'</a>'.'<br>';
//
            }else {
                if (file_exists('./'. $link. '/' .$value)) {
                    $path_parts = pathinfo( './'.$value);
                    if ($path_parts == 'php') {
                        $result .= '<img src="/skins/default/img/icons/php.png" alt="php">' . $value . '<br>';
                    } elseif ($path_parts == 'png') {
                        $result .= '<img src="/skins/default/img/icons/png.png" alt="png">' . $value . '<br>';
                    } elseif ($path_parts == 'txt') {
                        $result .= '<img src="/skins/default/img/icons/txt.png" alt="txt">' . $value . '<br>';
                    } elseif ($path_parts  == 'xml') {
                        $result .= '<img src="/skins/default/img/icons/xml.png" alt="xml">' . $value . '<br>';
                    } elseif ($path_parts == 'css') {
                        $result .= '<img src="/skins/default/img/icons/css.png" alt="css">' . $value . '<br>';
                    } elseif ($path_parts == 'docx') {
                        $result .= '<img src="/skins/default/img/icons/docx.png" alt="docx">' . $value . '<br>';
                    }elseif ($path_parts == 'jpg') {
                        $result .= '<img src="/skins/default/img/icons/jpg.png" alt="ipg">' . $value . '<br>';
                    }else{
                        $result .= '<img src="/skins/default/img/icons/docx.png" alt="ipg">' . $value . '<br>';
                    }

                }
            }
        }
    }

    return $result;
}

$link = $_GET['link'] ?? '';




