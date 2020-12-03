<?php require ("header.php");
$estado="";
?>
<form method="POST" action="ABM.php" enctype="multipart/form-data" autocomplete="off">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<h2 class="titulo">Ingreso de pelicula</h2>		
		</div>
	</div>	
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="form-group">
				<div class="contenido"><label for="Nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre Pelicula" required></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div class="contenido">
						<label for="anio">Año</label>
					</div>	
					<div class="contenido">
						<select id="anio" name="anio" style="width: 200px; height: 35px">
							<option value="0">Año</option>
							<?php  for($i=1990;$i<=2020;$i++) { 
								echo "<option value='".$i."'>".$i."</option>"; } ?>
							</select>
						</div>
						<!--<input type="number" name="anio" class="form-control" id="anio" placeholder="año Pelicula" required>-->
					</div>
				</div> 

			</div>
			<div class="row justify-content-center">
				<div class="col-md-3">
					<div class="form-group">
						<div class="contenido">
							<label for="puntaje">Puntaje</label>
							<select class="form-control" id="puntaje" name="puntaje">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<div class="contenido"><label for="duracion">duración:</label>
							<input type="number" name="duracion" class="form-control" id="duracion" onchange="expresion()" placeholder="duracion de la Pelicula (en min)" required></div>
						</div>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-md-3"></div>
					<div class="col-lg-6">
						<div class="form-group">
							<div class="contenido"><label for="form-control" >Descripción:</label></div>	
							<textarea class="form-control" rows="3" placeholder="descripcion de la Pelicula" class="backForm" id ="descripcion" name="descripcion" required></textarea>
							<hr>
						</div>	
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-3"></div>
					<div class="col-lg-6">
						<div class="form-group">
							<div class="contenido"><label for="form-control" >Generos:</label></div>	
							<textarea class="form-control" rows="1" placeholder="Generos de la Pelicula separados por '/'" class="backForm" id ="genero" name="genero" required></textarea>
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
									<option>recomendada</option>
									<option>poster</option>
									<option>carousel</option>
								</select>

							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<div class="contenido"><label for="imagen">imagen</label>
								<input type="text" name="imagen" class="form-control" id="imagen" placeholder="ingrese Link de la Imagen"></div>
							</div>
						</div>
					</div>

					<hr>

					<div class="row justify-content-center">
						<div class="form-group">
							<button type="submit" class="btn btn-secondary" name="guardar" value="guardar">Guardar</button>
						</div>
					</div>
				</form>
				<?php if (isset($_GET['estado'])&& $_GET['estado']==0) {
					echo "<script type='text/javascript'>alert('Datos Guardados');
					window.location('Alta.php')
					</script>";

				}elseif(isset($_GET['estado'])&& $_GET['estado']==1){
					echo "<script type='text/javascript'>alert('Compruebe que todos los campos esten completos o Correctos');
					window.location('Alta.php')
					</script>";
				}

				if (isset($_GET['imgEstado']) && $_GET['imgEstado']==1) {
					echo "<script type='text/javascript'>alert('Link de imagen no cargado');
					window.location('Alta.php')
					</script>";
					$_GET['imgEstado']=0;
				}

				?>



				<?php require ("footer.php"); ?>
				<script type="text/javascript">
					function expresion(){
						var dato_a_comprobar = document.getElementById("duracion").value;
						   var valoresAceptados = /^[0-9]{0,3}+$/;
						       if (dato.match(valoresAceptados)){
						          alert ("Es numérico");
						       } else {
						         alert ("No es numérico");
						      }
					}
				</script>