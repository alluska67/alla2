<?php

if(!isset($_SESSION['user']) || $_SESSION['user']['access'] !=7 ) {
    include './modules/cab/authorization.php';
}
