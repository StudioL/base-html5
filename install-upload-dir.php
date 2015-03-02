<?php

$dirs = array("uploads","uploads/subdir");

foreach($dirs as $desired_dir){
		
	if(is_dir($desired_dir)==false){
		echo "<br />No existe $desired_dir";
		if(mkdir("$desired_dir", 0755)){
			echo "<br />Creado $desired_dir";
		}else{
			echo "<br />Error creando $desired_dir";
		}
	}else{
		echo "<br />Ya Existe $desired_dir";
	}

}
?>