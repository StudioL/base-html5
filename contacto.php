<?
if (!$_POST){
?>

<form action="" method="post" enctype="multipart/form-data">
<fieldset>

<label for="nombre">Nombre<br />
<input type="text" name="nombre" size="50" id="nombre" /></label><br />
<br />
<label for="email">E-Mail<br />
<input type="text" name="email" size="50" id="email" /></label><br />
<br />
<label for="telefono">Tel&eacute;fono<br />
<input type="text" name="telefono" size="50" id="telefono" /></label><br />
<br />
<label for="consulta">Consulta o Comentario<br />
<textarea name="consulta" cols="49" rows="4" id="consulta"></textarea></label><br />
<br />
<?
require_once('includes/recaptchalib.inc.php');
$publickey = ""; 
echo recaptcha_get_html($publickey);
?>
<br /><br />
<input type="submit" value="Enviar" name="submit" class="botonformenviar" />      

</fieldset>
</form>   

<?
}else{
    //Estoy recibiendo el formulario, compongo el cuerpo
	$desde = $_POST["nombre"];
	$emaildesde = $_POST["email"];
	
	$headers = "From: $desde<$emaildesde>".PHP_EOL;
	$headers .= "MIME-Version: 1.0".PHP_EOL;
	$headers .= "X-Mailer:PHP/".phpversion()."".PHP_EOL;
	$headers .= "Content-Type: text/html; charset=iso-8859-1".PHP_EOL;	
	
    $cuerpo = "<h2>Formulario enviado desde el sitio web</h2>".PHP_EOL;
    $cuerpo .= "<strong>Nombre:</strong> " . $_POST["nombre"] . "<br />".PHP_EOL;
	$cuerpo .= "<strong>Email:</strong> " . $_POST["email"] . "<br />".PHP_EOL;
	$cuerpo .= "<strong>Teléfono:</strong> " . $_POST["telefono"] . "<br />".PHP_EOL;
    $cuerpo .= "<strong>Comentario:</strong> " . $_POST["consulta"] . "<br />".PHP_EOL;

	
	require_once('includes/recaptchalib.inc.php');
	$privatekey = "";
	$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
	if (!$resp->is_valid) {    // What happens when the CAPTCHA was entered incorrectly

		echo '<br /><br /><br /><p>Error con el código ReCaptcha.<br />Intente nuevamente.</p>';

	}else{
			//mando el correo...
		mail("a@b.c","Formulario",$cuerpo,$headers) or die("Hubo un error con la funci&oacute;n mail");
		//doy las gracias por el env&iacute;o 
		echo '<br /><br /><br /><p>Gracias por rellenar el formulario.<br />Se ha enviado correctamente.</p>';
	}	

}
?>