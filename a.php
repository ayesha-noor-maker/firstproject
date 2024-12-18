<?php
session_start();
$_SESSION['a'] = "today is";
echo $a;
session_destroy();

?>