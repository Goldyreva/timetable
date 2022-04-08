<?php 

setcookie('superadmin', $_COOKIE['name'], time() - 3600, "/");
setcookie('admin', $_COOKIE['name'], time() - 3600, "/");
header('Location: /index.php');