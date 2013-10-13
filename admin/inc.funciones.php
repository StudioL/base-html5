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

?>