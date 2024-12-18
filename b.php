<?php
session_start();
if (isset($_SESSION['a'])) {
    echo "WELCOME";
} else {
    echo "you need to login";
}

?>