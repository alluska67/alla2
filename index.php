<?php
error_reporting(-1);
ini_set('display_errors','on');
header('Content-Type: text/html; charset=utf-8');
session_start();

//Конфиг сайта с константами
include_once './config.php';

//Стандартные функции по сайту и библиотеки
include_once './libs/default.php';

// Работа с переменными
include_once './variables.php';

// Подключение к Базе Данных
$mysqli = mysqli_connect(Core::$DB_LOCAL,Core::$DB_LOGIN,Core::$DB_PASS,Core::$DB_NAME);//Соединение
mysqli_set_charset($mysqli,'utf8');

ob_start();
    include './'. Core::$CONTROLLER .'/allpages.php';
    include './'. Core::$CONTROLLER .'/'. $_GET['module'] .'/'. $_GET['page'] .'.php';
    include './skins/'.Core::$SKIN.'/'.$_GET['module'] .'/'. $_GET['page'] .'.tpl';
    $content = ob_get_contents();
ob_end_clean();



include_once './skins/'.Core::$SKIN.'/index.tpl';


