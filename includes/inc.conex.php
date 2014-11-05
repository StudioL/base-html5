<? //CONEXIÓN DB
//Datos
define("CON_HOST","localhost");
define("CON_DB","");
define("CON_USER","");
define("CON_PW","");
//conectar
if(!$link = mysql_connect(CON_HOST,CON_USER,CON_PW)){ //si no se conecta
	echo "Error conectando con la DB.";
} else { //si se conecta
	mysql_set_charset('utf8',$link);
	if(!mysql_select_db(CON_DB,$link)) {//si no selecciona
		echo "Error seleccionando la DB.";
	}
} //end if mysql_connect
?>