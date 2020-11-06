<?php require ("header.php");
	
$db=conectar();
	
	$user="";
	$contra="";
	$idUser="";
	$_SESSION['login']=0;
	if(isset($_POST['acept'])&& !empty($_POST['acept'])){
		
		$user=$_POST['usuario'];
		$contra=$_POST['contra'];
		

		if (!empty($user) && !empty($contra)) {
			
			$db=conectar();
			$consulta= mysqli_query($db,"SELECT * FROM usuario where nombreUser='$user' and pass='$contra'"); 
			
		 if ($consulta) {
		  	
		  
		  	while ($p= mysqli_fetch_assoc($consulta)) {
		  		
		  		if ($p['nombreUser']==$user && $p['pass']==$contra) {

		  			$_SESSION['login']=$p['idUsuario'];
		  			$_SESSION['permiso']=$p['idPermiso'];
		  			$_SESSION['usuario']=$p['nombreUser'];

		  			}
		  		}
			}
			if ($_SESSION['login']!=0) {
			header("location:index.php");
		}else{
		  	echo "<script type='text/javascript'>alert('usuario/contraseña incorrectos ');
			window.location('login.php')
			</script>";
		  			
		}
		}else if(empty($user)||empty($contra)){
			header("location:login.php?error=1");
		}
	}
	if (isset($_GET['error']) && $_GET['error']==1) {
		echo "<script type='text/javascript'>alert('usuario/contraseña no ingresado ');
		window.location('login.php')
		</script>";
	}
	 ?>

<div class="row justify-content-center">
	
		<form action="#" method="POST">
			<div class="form group col-md-4">
				<label for="usuario">usuario</label>
				<input type="text" name="usuario" id="usuario">
			</div>
			<br>
			<div class="form group col-md-4">
				<label for="contra">password</label>
				<input type="password" name="contra" id="contra">
			</div>
			<br>
			<div class="form group col-md-6">
				<button type="submit" class="btn btn-primary"  name="acept" value="acept">Aceptar</button>
			</div>
		</form>
	

</div>



<?php require ("footer.php") ?>