<?
session_start(); 
include("../includes/inc.config.php");
include("../includes/inc.conex.php");
include("../includes/inc.funciones.php");

if(!isset($_SESSION["autentificado"]) || $_SESSION["autentificado"]!="si"){ header("Location: index.php?error=si"); }
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Admin Home</title>
<meta name="viewport" content="width=device-width; initial-scale=1;">

<!-- ESTILOS DEL SITIO -->
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/estilo_admin.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/iconize.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/estilo_print.css" type="text/css" media="print" />

<!-- PLUGINS: Jquery, Lightbox, Facebox -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script src="../js/modernizr.custom.full-min.js" type="text/javascript"></script>
<script src="../js/jquery.Rut.js" type="text/javascript"></script>
<script src="../js/jquery.dropdown.js" type="text/javascript"></script>
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css"/>
<link href="../css/dropdown_menu.css" media="screen" rel="stylesheet" type="text/css"/>
<style type="text/css">@import "../css/jquery.datepick.css";</style>
<script src="../js/jquery.datepick.min.js" type="text/javascript" ></script>
<script src="../js/jquery.datepick-es.js" type="text/javascript"></script>
<link href="../css/nivo-slider.css" rel="stylesheet" type="text/css" media="screen" />
<script src="../js/jquery.nivo.slider.pack.js" type="text/javascript" ></script>
<link href="../css/jquery.bxslider.css" rel="stylesheet" />
<script src="../js/jquery.bxslider.min.js" type="text/javascript"></script>
<link href="../css/colorpicker.css" rel="stylesheet" type="text/css" />
<script src="../js/colorpicker.js" type="text/javascript"></script>
<link href="../css/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="../js/jquery.colorbox.js" type="text/javascript"></script>
<link href="../css/jquery.bubblepopup.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="../js/jquery.bubblepopup.min.js" type="text/javascript"></script>
<script src="../js/sorttable.js" type="text/javascript"></script>
<script src="../js/jquery.tablehover.min.js" type="text/javascript"></script>

<!-- FUNCIONES Propios -->
<script src="../js/funciones.js" type="text/javascript" defer="defer"></script> 

<!-- ACCESIBILIDAD -->
<link href="../favicon.ico" rel="icon" type="image/x-icon"> 
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="../apple-touch-icon-precomposed.png" rel="apple-touch-icon-precomposed" />
<link href="../apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed" sizes="57x57" />
<link href="../apple-touch-icon-60x60-precomposed.png" rel="apple-touch-icon-precomposed" sizes="60x60" />
<link href="../apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72" />
<link href="../apple-touch-icon-76x76-precomposed.png" rel="apple-touch-icon-precomposed" sizes="76x76" />
<link href="../apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114" />
<link href="../apple-touch-icon-120x120-precomposed.png" rel="apple-touch-icon-precomposed" sizes="120x120" />
<link href="../apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144" />
<link href="../apple-touch-icon-152x152-precomposed.png" rel="apple-touch-icon-precomposed" sizes="152x152" />


<link href="../humans.txt" rel="author" />

</head>

<body>
<h1>Zona Administración</h1>
<div id="menu">
<? include("inc.menu.php"); ?>
</div>
<h2>Admin Home</h2>

<div id="contenido">

		
		
	
		

</div>

<div id="piediseno">
<? include("inc.piediseno.php"); ?>
</div><!-- FIN piediseno -->

<!-- INICIACIONES Javascript -->
<script src="js/iniciaciones.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".group1").colorbox({rel:'group1'});
		$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#gallery2 a img, table#tabla1 thead tr th, p span, abbr').CreateBubblePopup({
			position : 'top',
			align	 : 'center',
			innerHtml: 'Probando probando',
			innerHtmlStyle: {
								color:'#FFFFFF', 
								'text-align':'center'
							},	
			themeName: 	'all-black',
			themePath: 	'imagenes/jquerybubblepopup_themes'
		});
	});
</script>
<script type="text/javascript">
	$('#tabla1').tableHover({
		colClass: 'hovercolumn',
		headCols: false,
		footCols: false,
		spanCols: false,
		ignoreCols: [4,5,6],
		rowClass: 'hoverrow',
		headRows: false,
		footRows: false,
		spanRows: false,
		allowBody: true,
		cellClass: 'hovercell',
		clickClass: 'click'		
	}); 	
</script>
<script type="text/javascript">
$('#colorSelector').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#colorSelector div').css('backgroundColor', '#' + hex);
		$('#color1').val(hex);
	}
});
</script>
<script type="text/javascript">
//$('#rut').Rut();
$('#rut').Rut({
   on_error: function(){ $('#rutalert').html("Rut Incorrecto"); },
   on_success: function(){ $('#rutalert').html("Rut Correcto"); }
 });
</script>
<script type="text/javascript">
//$('#fecha2').datepick({dateFormat: 'yyyy-mm-dd'});
//$('#fecha3').datepick({dateFormat: 'yyyy-mm-dd'});
$('#fecha2').datepick({ dateFormat: 'yyyy-mm-dd', showTrigger:'<img src="imagenes/icono-calendario.png" alt="calendario" class="trigger">',showSpeed: 'fast', defaultDate: '0d', selectDefaultDate: true });
$('#fecha3').datepick({ dateFormat: 'yyyy-mm-dd', showTrigger:'<img src="imagenes/icono-calendario.png" alt="calendario" class="trigger">', showSpeed: 'fast', defaultDate: '0d', selectDefaultDate: true });

</script> 
<script type="text/javascript">
$(document).ready(function(){
	$('#bxslider').bxSlider({
	  auto: true,
	  autoControls: false,
	  mode: "horizontal", // horizontal vertical fade
	  speed: 1000,
	  pause: 1500,
	  captions: true,
	  nextText: "Siguiente",
	  prevText: "Anterior"
	});
});
</script> 
<script type="text/javascript">
$(document).ready(function(){
    $('#slider').nivoSlider({
        effect: 'slideInRight', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 3000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        directionNavHide: true, // Only show on hover
        controlNav: true, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        controlNavThumbsFromRel: false, // Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', // Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
        keyboardNav: true, // Use left & right arrows
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        captionOpacity: 0.8, // Universal caption opacity
        prevText: 'Anterior', // Prev directionNav text
        nextText: 'Siguiente', // Next directionNav text
        randomStart: false, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});
</script>
</body>
</html>