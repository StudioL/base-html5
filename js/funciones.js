//******************************************
//FUNCIÓN POPUP
function popup(target, name, features){
window.open(target, name, features); 
}
//  Se Usa
//  <a href="archivo.html" onclick="popUp(this.href, 'Popup1', 'width=100,height=200'); return false;">Abrir popup</a>

//******************************************
// FUNCIÓN TARGET BLANK, para xhtml
function openExternal(){
if(!document.getElementsByTagName) return;
var anchors = document.getElementsByTagName('a');
for(var i = 0; i < anchors.length; i++){        
var thisAnchor = anchors[i];        
if(thisAnchor.getAttribute('href') && thisAnchor.getAttribute('rel') == 'external'){
thisAnchor.target = '_blank';        
}    
}
}
window.onload = openExternal;
// Se usa
// <a href="http://www.google.cl" rel="external">Google</a>

//******************************************
// FUNCIÓN TAMAÑO TEXTO
function zoomText(tipo){ 
//inicializaciones 
obj=document.getElementById("cuerpo"); 
if (obj.style.fontSize==""){ 
obj.style.fontSize="100%"; 
} 
actual=parseInt(obj.style.fontSize); 
incremento=10; 
//operacion 
if(tipo=="normal"){ 
obj.style.fontSize="100%" 
} 
if(tipo=="aumentar"){ 
valor=actual+incremento; 
obj.style.fontSize=valor+"%" 
} 
if(tipo=="disminuir"){ 
valor=actual-incremento; 
obj.style.fontSize=valor+"%" 
} 
} 
//  Se usa:
//  <a href="javascript:zoomText('aumentar','cuerpo');">Aumentar</a> 
//  <a href="javascript:zoomText('disminuir','cuerpo');">Disminuir</a> 
//  <a href="javascript:zoomText('normal','cuerpo');">Reestablecer</a>
//  <div id="cuerpo">Probando</div>

//******************************************
// FUNCIÓN CHECKBOX LIMITADOS
var counter = 0; //contador (variable global) 
var maxi = 2; // máximos checkbox permitidos
function maxcheck(chkbox){ 
	if(chkbox.checked == false){ // si el checkbox es desmarcado 
		counter--; 
	} else { // si el checkbox es marcado

		if(counter >= maxi){ 
			alert("Sólo puede marcar " + maxi + " opciones"); 
			chkbox.checked = false;
			return false; 
		} else { 
			counter++; 
				} 

			} 
} 
// Se usa:
// <label>01 <input type="checkbox" name="algo[]" onclick="maxcheck(this)" /></label><br/>
// <label>02 <input type="checkbox" name="algo[]" onclick="maxcheck(this)" /></label><br/>
// <label>03 <input type="checkbox" name="algo[]" onclick="maxcheck(this)" /></label><br/>

//******************************************
// DESPLEGAR COSAS
function despliega(id_p){
var menu = document.getElementById(id_p);

if(menu.style.display == "none"){
menu.style.display = "block";
}
else{
menu.style.display = "none";
}
}
// Se usa:
// <a href="#" onclick="despliega('p1');return false;">Pregunta 1</a>
// <a href="#" onclick="despliega('p2');return false;">Pregunta 2</a>

//******************************************
// OCULTAR O MOSTRAR ELEMENTO
function cerrarPopup(pid){
document.getElementById(pid).style.visibility = 'hidden';		
}
function abrirPopup(pid){
document.getElementById(pid).style.visibility = 'visible';
}