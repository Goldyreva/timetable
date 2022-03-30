<?php 

setcookie('1', $user['name'], time() - 3600, "/");
setcookie('2', $user['name'], time() - 3600, "/");
header('Location: /index.php');