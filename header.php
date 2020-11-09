<?php 		
	$idUser=0;
	$nUser="";
	$idPer="";
	$logo="posicionLogo";
	function conectar(){
		$conexion= mysqli_connect("127.0.0.1","root","","parcialwm");
		if (!$conexion) {
			echo "Error al conectar base";
		} 
		return $conexion;
	}
	conectar(); 
	session_start();



	function killSession(){
		if (isset($_POST['borrarSesion'])) {
			session_destroy();
			$idUser=0;
			$nUser="";
			$idPer="";
			header("location:login.php");
		}
	}
	if (isset($_SESSION['login']) && $_SESSION['login']!=0) {
				$idUser=$_SESSION['login'];
				$nombreUser=$_SESSION['usuario'];
				$idPer=$_SESSION['permiso'];
				$logo="posicionLogo1";
				}
	
		 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>HARDSOFT</title>
	<link rel="shortcut icon" type="image/png" href="Imagenes/logoc.png">
	<meta charset="utf-8">
	<!--de este link se obtiene la fuente de las letras utilizadas en el css-->
	<link rel="stylesheet" type="text/css" href="CSS/FiraSans.CSS">
	<link href="CSS/FontMerieweather.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/PTserif/PT_Serif-Web-Italic">
	<script src="js/jquery-3.4.1.min.js"></script>
	<!--en esta linea se refiera al documento CSS en si-->
	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/modCss.css">

	<script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
	<script src="bootstrap/popper/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/4fcff25fcd.js" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		
		<div class="row">
			<?php if ($idUser!=0): ?>
		 	<div class="col-md-12">
				<div class="posicion">
					
		  			<div class="dropdown">
					  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <?php echo $nombreUser; ?>
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					  <form action="#" method="POST">
					  
					    <button type="submit" class="dropdown-item" href="#" name="borrarSesion" onclick="<?php killSession();?>">Cerrar Sesión</button>
					  
					  </form>
					  </div>

					</div>
					
				</div>	
		  	</div><!--col-->
		<?php endif ?>

		</div>
		
		<div class="row">
			<div class=<?php echo $logo; ?>><img src="Imagenes/Captura.png"></div>
		</div>
		<div class="row">
			<?php if ($idUser!=0): ?>
		<div class="col-md-11">
			<div class="posicionMenu">
		<nav class="navbar navbar-expand-lg navbar-dark bg-rgb(23 55 93)">
			
		  

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
		    <span class="navbar-toggler-icon"></span>
		  </button>
 		
		  <div class="collapse navbar-collapse" id="navbarMenu" >
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a id="inicio" class="nav-link" href="index.php">Inicio</a>
		      </li>
		      
		         <li class="nav-item">
		        <a id="peliculas" class="nav-link" href="peliculas.php?pag=1">peliculas</a>
		      </li>
		      <li class="nav-item">
		        <a id="contacto" class="nav-link" href="contacto.php">Contacto</a>
		      </li>
			  <li class="nav-item">
		        <a id="nosotros2" class="nav-link" href="nosotros.php">Nosotros</a>
		      </li>
		      
		    
		    </ul>
		 
		   
		  </div>
		  
		</nav>
		</div>
		<?php endif ?>
		</div>		
		</div>
		<?php if ($idPer==1): ?>
			<form method="POST" action="ABM.php ?>">
			<button type="submit" class="btn btn-info" name="Ingresar" value="Ingresar"  alt="upload"><i class="fas fa-cloud-upload-alt" alt=></i></button>
			</form>
		<?php endif ?>
			<form method="POST" action="excel.php ?>">
			<button type="submit" class="btn btn-success"><i class="fas fa-file-excel" >  Descargar Catalogo</i></button>
			</form>

	<hr class="hr1">