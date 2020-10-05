<?php


if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete') {
    q("
        DELETE FROM `users`
        WHERE `id` = " . (int)$_GET['id'] . "
    
    ");

    $_SESSION['info'] = 'Пользователь был удалён';
    header('Location: /admin/users');
    exit();
}

$users = q( "
    SELECT   *
    FROM     `users`
    ORDER BY `id` ASC 
");


if(isset($_GET['search'],$_GET['submit'])) {
    if(!empty($_GET['search'])) {
        $search = $_GET['search'];
        $search = es(htmlspecialchars($search));
        $query = "
            SELECT *
            FROM `users`
            WHERE `login` LIKE '%$search%'
		";
        $res1 = q($query);
    }else{
        $result = "Результатов нету";
    }
}


if(isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}

