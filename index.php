<?
@session_start();
header("HTTP/1.1 301 Moved Permanently");
header("Location: home.php");
?>