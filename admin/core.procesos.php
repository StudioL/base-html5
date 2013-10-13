<? // LOGIN USUARIO RELATOR
session_start(); 
include("../includes/inc.config.php");
include("../includes/inc.conex.php");
include("../includes/inc.funciones.php");

if(!isset($_SESSION["autentificado"]) || $_SESSION["autentificado"]!="si"){ header("Location: index.php"); }

if(isset($_GET["accion"]) && $_GET["accion"]!=""){
	$accion = filtrar($_GET["accion"]);
}else{
	header("Location: index.php");
}


//*******************************
// 
if($accion==""){


}//fin


?>