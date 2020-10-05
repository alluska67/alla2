<?php

$error = '';

if(!empty($_POST['ironman_num']) && isset($_POST['submit'])){

    if(is_numeric($_POST['ironman_num'])){
        if((int)$_POST['ironman_num'] === rand(1,3)){
            $_SESSION['ironman'] = $_SESSION['ironman'] - rand(1, 4);
        }else{
            $_SESSION['captain'] = $_SESSION['captain'] - rand(1, 4);
        }
    } else{
        $error = 'Введите число';
    }

}

if($_SESSION['captain'] <= 0){
    unset($_SESSION['captain'],$_SESSION['ironman']);
    session_destroy();
    header('Location: /game/winner');
    exit();
} elseif ($_SESSION['ironman'] <= 0){
    unset($_SESSION['captain'],$_SESSION['ironman']);
    session_destroy();
    header('Location: /game/gameover');
    exit();
}
