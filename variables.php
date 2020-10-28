<?php

//Обработка ссылок ЧПУ
if (isset($_GET['route'])) {
    $temp = explode('/',$_GET['route']);

    if($temp[0] == 'admin') {

        Core::$CONTROLLER = Core::$CONTROLLER.'/admin';
        Core::$SKIN = 'admin';
        unset($temp[0]);
    }

    $i = 0;
    foreach ($temp as $k => $v) {

        if($i == 0) {
            if(!empty($v)) {
                $_GET['module'] = $v;
            }
        } elseif ($i == 1) {
            if(!empty($v)) {
                $_GET['page'] = $v;
            }
        } else {
            $_GET['key'.($k-1)] = $v;
        }
        ++$i;
    }
    unset($_GET['route']);
}






//Переключение страниц html
//
//$allowed = ['static','game','errors','files','cab','comments','news','goods'];
//
//
//if(isset($_GET['module'])){
//
//    if(!in_array($_GET['module'],$allowed) && Core::$SKIN != 'admin'){
//        header("Location: /errors/404");
//        exit();
//    }
//
//}else{
//    $_GET['module'] = 'static';
//}

if (!isset($_GET['module'])) {
    $_GET['module'] = 'static';

} else {
    $res = q("
        SELECT *
        FROM `pages`
        WHERE module = '".es($_GET['module'])."'
    ");

    if (!$row = $res->num_rows) {
        header("Location: /404");
        exit();
    } else {
        $static_page = $res->fetch_assoc();
        $res->close();
        if ($static_page['static'] == 1) {
            $_GET['module'] = 'static_page';
            $_GET['page'] = 'main';
        }
    }
}





if (!isset($_GET['page'])){
    $_GET['page'] = 'main';
}
if (!preg_match('#^[a-z-_]*$#iu', $_GET['page'])) {
    header("Location: /404");
    exit();
}

if (isset($_POST)) {
    $_POST = trimAll($_POST);
}

//отображение обрезанной шапки
if ($_GET['page'] == 'main' && $_GET['module'] == 'static'){
    $not_main_page = '';
} else{
    $not_main_page = "not_main_page";
}


// Проверка ввода данных для АДМИНА и присвоение куки

/*
if(isset($_POST['login']) && $_POST['login'] == 'admin'){

    if(isset($_POST['password']) && $_POST['password'] == '12345'){

        if(isset($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setcookie('access', 1, time()+3600, '/');
            header('Location: /index.php?module=static&page=admin' );
        }else {
            $error = 'Введите корректный email';
        }

    }else{
        $error = 'Введите правильный пароль';
    }

} elseif (!empty($_POST['login'])) {
    $error = 'Введите правильный логин';
}
*/

if($_GET['module'] == 'game') {
    if(isset($_GET['page']) && $_GET['page'] === 'exit'){
        setcookie('access','1',time()-3600,'/');
        header('Location: /' );
        exit();
    }
    if(isset($_GET['refresh'])){
        session_unset();
        session_destroy();
        header('Location: /game/main');
        exit();
    }
    if (!isset($_SESSION['captain'] , $_SESSION['ironman'])){
        $_SESSION['captain'] = 10;
        $_SESSION['ironman'] = 10;
    }

}



// Формат копирайта в footer
$newDate = date('Y');









