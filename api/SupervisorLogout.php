<?php

session_start();
$_SESSION['name'] = null;
$_SESSION['user'] = null;
$_SESSION['supervisorid'] = null;
$_SESSION = null;
header("Location:../Login.html");

?>