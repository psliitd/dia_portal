<?php

session_start();
$_SESSION['name'] = null;
$_SESSION['user'] = null;
$_SESSION = null;

header("Location:../Login.html");

?>