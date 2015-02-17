<?
/******************************
** Marca SELECT y CHECKBOXES **
******************************/
function marcar3($var1,$var2){ return ($var1==$var2)? "checked=\"checked\"":""; }
function marcar2($var1,$array1){return (in_array($var1,$array1))? "checked=\"checked\"":""; }
function marcar($var1,$var2){ return ($var1==$var2)? "selected=\"selected\"":""; }

/******************************************
** Filtro para SQL Injection y similares **
******************************************/
function filtrar($texto) {

//Array con las posibles cadenas a utilizar por un hacker
$CadenasProhibidas = array("Content-Type:",
//evita email injection
"MIME-Version:", "Content-Transfer-Encoding:","Return-path:","Subject:","From:","Envelope-to:","To:","bcc:","cc:",
"UNION",
// evita sql injection
"DELETE","DROP","SELECT","INSERT","UPDATE","CREATE","TRUNCATE","ALTER","INTO","DISTINCT","GROUP BY","WHERE","RENAME","DEFINE","UNDEFINE","PROMPT","ACCEPT","VIEW","COUNT","HAVING","AND","OR","'",'"',"{","}","[","]",
//variables y comodines
"$", "&","*","=");

//Comprobamos que entre los datos no se encuentre alguna de las cadenas del array.
//Reemplazo por nada
$texto = str_replace($CadenasProhibidas,"",$texto);

return $texto;
}

/*****************
** Eliminar url **
******************/
function eliminar_url($t,$permiso){

	if($permiso<2){ //Si no es premium
$t = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '(No tiene permiso para links)', $t);  
$t = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '(No tiene permiso para links)', $t);
$t = eregi_replace('([[:space:]()[{}])(ftp.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '(No tiene permiso para links)', $t);
$t = eregi_replace('([A-Za-z0-9._-]+)@([A-Za-z0-9._-]+)[.]([a-z]{2,4})', '(No tiene permiso para emails)', $t);

	}else{
$t = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" rel="external">\\1</a>', $t);  
$t = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2" rel="external" >\\2</a>', $t);
$t = eregi_replace('([[:space:]()[{}])(ftp.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="ftp://\\2" rel="external" >\\2</a>', $t);
$t = eregi_replace('([A-Za-z0-9._-]+)@([A-Za-z0-9._-]+)[.]([a-z]{2,4})', '<a href="mailto:\\1@\\2.\\3" rel="external">\\1@\\2.\\3</a>', $t);	
	}
return $t;
}

/***************************************************
** Genera un código aleatorio de letras y números **
***************************************************/
function genera_codigo($longitud){

$letras=array("a","b","c","d","e","f","g","h","j","k","m","n","p","r","t");
	$codigo="";
	for($i=0;$i<$longitud;$i++)
	{
		$tipo = rand(0,1);
		if($tipo == 0){ $codigo.=rand(0,8); }
		else{ $codigo.=$letras[rand(1,15)]; }		
	}
	return $codigo;
}

/*********************
** marcar búsquedas **
**********************/
function marcar_busquedas($texto,$patron){
return str_replace(strtolower($patron),"<span class=\"bus\">".strtolower($patron)."</span>",strtolower($texto));
}

/*****************
** muestraFecha **
*****************/
function muestraFecha($f){
	$dia = substr($f,8,2);
	$mes = substr($f,5,2);
	$ano = substr($f,0,4);
	$hora_full = substr($f,11,8);
	$meses = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
	
	$fe = $dia." ".$meses[$mes]." ".$ano."<br />".$hora_full;
return $fe;
}

/**********************
** muestraFechacrono **
**********************/
function muestraFechaCrono($f){
	$dia = substr($f,8,2);
	$mes = substr($f,5,2);
	$ano = substr($f,0,4);
	$hora_full = substr($f,11,8);
	
	$fe = $mes."/".$dia."/".$ano." ".$hora_full;
return $fe;
}


/*****************************
** Sumar tiempo a una fecha **
*****************************/
	function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0){
		$date_r = getdate(strtotime($date)); 
		$date_result = date("Y-m-d H:i:s", mktime(($date_r["hours"]+$hh),($date_r["minutes"]+$mn),($date_r["seconds"]+$ss),($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));
		return $date_result;
	}

/********************
** restar 2 fechas **
********************/
	function restafecha($fecha1,$fecha2){
		list($year, $month, $day) = explode('-', $fecha1); 
		$f1 = mktime(0, 0, 0, $month, $day, $year); 
		list($year, $month, $day) = explode('-', $fecha2); 
		$f2 = mktime(0, 0, 0, $month, $day, $year); 
		
		return ($f1 - $f2)/(60 * 60 * 24);
	}
	
/********************
** restar 2 fechas con horas **
********************/
	function restaFechaHora($fecha1,$fecha2){
		list($fe1,$ho1) = explode(" ",$fecha1);
		list($year, $month, $day) = explode('-', $fe1); 
		list($hora,$minuto,$segundo) = explode(":",$ho1);
		$f1 = mktime($hora, $minuto, $segundo, $month, $day, $year); 
		list($fe2,$ho2) = explode(" ",$fecha2);
		list($year, $month, $day) = explode('-', $fe2);
		list($hora,$minuto,$segundo) = explode(":",$ho2); 
		$f2 = mktime($hora, $minuto, $segundo, $month, $day, $year); 
		
		return ($f1 - $f2);
	}	

	/***************************
** filtrar nombre archivo **
****************************/	
function filtrarNombreArchivo($t){
	
	$no_permitidas = array ("ñ","Ñ","á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
	$permitidas    = array ("n","N","a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
	$nombreArchivo = strtolower(str_replace($no_permitidas, $permitidas ,$t));
	
	$nombreArchivo = str_replace(" ","_",$nombreArchivo);
	
	$conservar = '0-9a-z_'; // juego de caracteres a conservar
	$regex = sprintf('~[^%s]++~i', $conservar); // case insensitive
	$nombreArchivo = preg_replace($regex, '', $nombreArchivo);

	return $nombreArchivo;
}

?>