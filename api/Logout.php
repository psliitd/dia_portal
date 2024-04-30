<?php

session_start();
$_SESSION['name'] = null;
$_SESSION['user'] = null;
$_SESSION['studentid'] = null;
$_SESSION = null;
session_destroy();

header("Location:../Login.html");
exit();
?>