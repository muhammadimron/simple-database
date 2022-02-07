<?php 

setcookie('valid', '', time() - 3600);
setcookie('key', '', time() - 3600);

session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit();

?>