<?
$ruta = './downloads';//definimos la ruta para las descargas
$error = 'Archivo no disponible para descarga.';
if(isset($_GET['archivo']) && basename($_GET['archivo']) == $_GET['archivo']) {
		$getfile=$_GET['archivo'];
} else { $getfile = NULL; }
if(!$getfile){ echo $error;
} else {
$filepath = $ruta.'/'.$getfile;
if(file_exists($filepath) && is_readable($filepath)){
$size = filesize($filepath);
header('Content-Type: application/octet-stream');
header('Content-Length: '.$size);
header('Content-Disposition: attachment; filename='.$getfile);
header('Content-Transfer-Encoding: binary');
$file = @ fopen($filepath,'rb');
if($file) {
fpassthru($file);
exit;
} else { echo $error;
}
} else {	echo $error;
} }
?>