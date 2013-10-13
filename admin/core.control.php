<? // LOGIN USUARIO RELATOR
session_start(); 
include("../includes/inc.config.php");
include("../includes/inc.conex.php");
include("../includes/inc.funciones.php");

if(isset($_POST["usuario"]) && isset($_POST["pass"])&& $_POST["usuario"]!="" && $_POST["pass"]!=""){

	$query = "SELECT * FROM administradores WHERE usuario='".filtrar($_POST["usuario"])."' AND password='".filtrar($_POST["pass"])."'";

	$rs = mysql_query($query,$link);
	$n = mysql_num_rows($rs);
	//vemos si el usuario y contraseña es váildo , o sea, si n=1
	if($n == 1){
		//usuario y contraseña válidos 
		$_SESSION["autentificado"]= "si"; 
	
		$hoy=date('Y-m-d H:i:s');
		$query2="UPDATE administradores SET ultimo_login='$hoy' WHERE usuario='$_POST[usuario]'";
		mysql_query($query2,$link);
		
		header("Location: admin.home.php");
		
	} else {
	
		unset($_SESSION["autentificado"]);
		header("Location: index.php?error=si");
	}
}else{
header("Location: index.php?error=si");
}

?>