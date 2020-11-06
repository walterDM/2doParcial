<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if (isset($_POST['Enviar'])) {
	if (!empty($_POST['nombre']) && !empty($_POST['Email']) && !empty($_POST['consulta'])) {
		$nombre=$_POST['nombre'];
		$Email=$_POST['Email'];
		$Consulta=$_POST['consulta'];
		$tipo=$_POST['tipoConsulta'];
		$body= 'Nombre: '.$nombre . "<br>Email: ".$Email. "<br> Consulta:". $Consulta;

		$mail = new PHPMailer(true);

		try {
		    //Server settings
		                         
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'consultaphpedi@gmail.com';                     // SMTP username
		    $mail->Password   = 'Beltran2019';                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    $mail->Port       = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('consultaPHPEdi@gmail.com', 'Consulta desde Pagina');
		    $mail->addAddress('consultaphpedi@gmail.com');     // Add a recipient
		    
		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $tipo;
		    $mail->Body    = $body;
		    $mail->CharSet= 'UTF-8';
		    $mail->AltBody = 'otra parte';

		    $mail->send();
		    header("location:contacto.php?send=1");
		    } catch (Exception $e) {
		     header("location:contacto.php?send=0");
		}

	}else{
		$Vacio="";
		if (empty($_POST["nombre"])) {
			$Vacio="Nombre";
			
		}
		if (empty($_POST["Email"])) {
			$Vacio=$Vacio." Email";
			
		}
		if (empty($_POST["consulta"])) {
			$Vacio=$Vacio." consulta";
			
		}
		header("location:contacto.php?cmpVacio=".$Vacio);
	}
	
}else{
	echo "HOLa";
}

?>