<?php
setcookie('autoauthhash', '', time() - 36000, '/');
setcookie('autoauthid', '', time() - 36000, '/');
session_unset();
session_destroy();
header("Location: /");
exit();