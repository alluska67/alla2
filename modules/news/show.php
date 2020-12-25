<?php
if (isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'show') {
    $show_news = q("
        SELECT *
        FROM `all_news`
        WHERE `id` = " . (int)$_GET['id'] . "
        LIMIT 1
    ");
}
