<?php

if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.' && (!isset($_COOKIE['access']))) {
    exit('Уходи шарлатан!');
} else {
    $welcome = 'Welcome, Избранный!';
}
