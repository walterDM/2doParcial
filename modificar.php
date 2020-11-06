<?php require ("header.php");
	

$idMovies=$_GET['id'];
$rs=array();

$db=conectar();

$consulta="SELECT * FROM movies where idMovies='$idMovies';";
$resultado=mysqli_query($db,$consulta);
$rs=mysqli_fetch_array($resultado);



 ?>
		<form method="POST" action="ABM.php" enctype="multipart/form-data" autocomplete="off">
			<div class="row justify-content-center">
					<div class="col-md-6">
					<h2 class="titulo">Modificar Pelicula</h2>
					</div>
				</div>	
			<div class="row justify-content-center">
			 <div class="col-md-3">
			  <div class="form-group">
			    <div class="contenido"><label for="nombre">Nombre</label>
			    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $rs['titulo'];?>"></div>
			  </div>
			 </div>
			 
			 <div class="col-md-3">
			  <div class="form-group">
			    <div class="contenido"><label for="anio">año</label>
			   	 <input type="text" name="anio" class="form-control" id="anio" value="<?php echo $rs['anio']; ?>">
				<input type="hidden" name="id" id="id" value="<?php echo $idMovies ?>">
				</div>
			  </div>
			 </div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-3">
					<div class="form-group">
						<div class="contenido">
							<label for="puntaje">Puntaje</label>
							<select class="form-control" id="puntaje" name="puntaje">
							   <option selected= <?php echo puntajeBD($rs['puntaje']) ?>>1</option>
							   <option selected= <?php echo puntajeBD($rs['puntaje']) ?>>2</option>
							   <option selected= <?php echo puntajeBD($rs['puntaje']) ?>>3</option>
							   <option selected= <?php echo puntajeBD($rs['puntaje']) ?>>4</option>
							   <option selected= <?php echo puntajeBD($rs['puntaje']) ?>>5</option>
							</select>
						</div>
					</div>
				 </div>
				<div class="col-md-3">
			 	 <div class="form-group">
				    <div class="contenido"><label for="anio">duración:</label>
				    	<input type="text" name="duracion" class="form-control" id="duracion" value="<?php echo $rs['Duracion'] ?>"required>
					</div>
				 </div>
				</div>
			</div>
			
			<div class="row justify-content-center">
				
				<div class="col-lg-6">
					<div class="form-group">
					<div class="contenido"><label for="descripcion" >Descripción:</label></div>	
					<textarea class="form-control backForm" rows="3"  id ="descripcion" name="descripcion"><?php echo $rs['descripcion']; ?></textarea>
					<hr>
				</div>	
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-3"></div>
					<div class="col-lg-6">
						<div class="form-group">
							<div class="contenido"><label for="form-control" >Generos:</label></div>	
							<textarea class="form-control" rows="1" class="backForm" id ="genero" name="genero" required><?php echo $rs['genero']; ?></textarea>
						<hr>
						</div>	
					</div>
				<div class="col-md-3"></div>
			</div>
			<div class="row justify-content-center">
				
				<div class="col-md-3">
					<div class="form-group">
						<div class="contenido">
							<label for="tipoImg">Tipo de imagen</label>
							<select class="form-control" id="tipoImg" name="tipoImg">
							   <option selected=<?php echo selectTipo($rs['tipoImagen']); ?>>recomendada</option>
							   <option selected=<?php echo selectTipo($rs['tipoImagen']); ?>>poster</option>
							   <option selected=<?php echo selectTipo($rs['tipoImagen']); ?>>carousel</option>
							</select>
							
						</div>
					</div>
				 </div>
					<div class="col-md-3">
						<div class="form-group">
						    <div class="contenido"><label for="imagen">imagen</label>
						    <input type="text" name="imagen" class="form-control" id="imagen" value="<?php echo  $rs["imagen"]; ?>">
							</div>
						  
						</div>   
				  </div>
			</div>
			<div class="row justify-content-center">
			  <img src="<?php echo  $rs["imagen"]; ?>" width =300>
			</div>	  
			 
			
			<hr>
			
			 <div class="row justify-content-center">
			 	
			  		<button type="submit" class="btn btn-secondary" name="Modificar" value="Modificar">Modificar</button>
			  
			</div>
		</form>
		<!--<script type="text/javascript">alert("error al cargar la imagen");
		window.location("ABM.php")
		</script>-->

<?php if (isset($_GET['estado'])&& $_GET['estado']==1 && !empty($_GET['estado'])) {
	echo "<script type='text/javascript'>alert('Datos Modificado');
		window.location('ABM.php')
		</script>";
	
}elseif(isset($_GET['estado'])&& $_GET['estado']==0){
	echo "<script type='text/javascript'>alert('Los Datos No Fueron Modificados');
		window.location('ABM.php')
		</script>";
}
if (isset($_GET['cmpVacio'])&& $_GET['cmpVacio']==1) {
	echo "<script type='text/javascript'>alert('Los Campos no pueden estar Vacios y el campo precio deben ser numeros');
		window.location('ABM.php')
		</script>";
	$_GET['cmpVacio']=0;
} ?>

<?php 
function selectTipo($tipo) {
	switch ($tipo) {
		case 'recomendada':
			return true;
			break;
		case 'carousel':
			return true;
			break;
		case 'poster':
			return true;
			break;
		default:
			# code...
			break;
	}
}
function puntajeBD($punt){
	switch ($punt) {
		case 1:
			return true;
			break;
		case 2:
			return true;
			break;
		case 3:
			return true;
			break;
		case 4:
			return true;
			break;
		case 5:
			return true;
			break;
						
		default:
			# code...
			break;
	}
}
?>
<?php require ("footer.php"); ?>