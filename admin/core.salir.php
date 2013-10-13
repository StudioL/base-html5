<?
//CERRAR SESIÓN
session_start(); 
include("../includes/inc.config.php");
include("../includes/inc.conex.php");
include("../includes/inc.funciones.php");
$_SESSION["autentificado"]="no";
unset($_SESSION["autentificado"]);
session_destroy(); 
header("Location: index.php");
?>