<?php
header("Access-Control-Allow-Origin: http://www.loexa.com.co");

if(isset($_POST['sent_index'])){
    
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$emails = $_POST['email'];
	$mensaje = htmlspecialchars(trim($_POST['mensaje']));
	
	if($nombre !="" && $emails !="" && $mensaje !=""){
	
	//proceso de enviar correo
	ini_set('date.timezone','America/Bogota');
    $fecha =  date("Y/n/j - H:i:s - A");
		
	$email = 'servicioenlinea@loexa.com.co';
	$titulo = 'Mensaje enviado desde la pagina web';
	//Mensaje
	$mail = 'Mensaje enviado desde Pagina web. www.loexa.com.com. Formulario de contacto rapido <br/>
	<strong>Formulario Del Home, Fecha: '.$fecha.' </strong><br/>
	<strong>Nombre</strong>: '.$nombre.'<br/>
	<strong>Correo/Email</strong>: '.$emails.'<br/>
	<strong>Mensaje</strong>:<br/>
	'.$mensaje.'			 
	';
	//cabecera
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	//dirección del remitente 
	$headers .= "From: Loexa < www.loexa.com.co >\r\n";
	//Enviamos el mensaje a tu_dirección_email 
	$bool = mail($email,$titulo,$mail,$headers);
	if($bool){
	  echo 'true';
	}else{	
	  echo 'false';
	}	
	}else{
	  echo 'error';		
	}
}
	
?>