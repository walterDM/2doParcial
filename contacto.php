<?php require ("header.php"); ?>
<script>
	function marca(){
		$('#contacto').attr("class","");
		$('#contacto').attr("class","btn btn-secondary");
	}
	window.onload= function(){
		marca();
	}
</script>
		<form method="POST" action="contacto.php?env=1" >
			<div class="row justify-content-center">
					<div class="col-md-3">
						<h2 class="titulo">Contáctanos</h2>		
					</div>
				</div>	
			<div class="row justify-content-center">
			 <div class="col-md-3">
			  <div class="form-group">
			    <div class="contenido"><label for="Nombre">Nombre y Apellido</label>
			    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese Nombre y Apellido" ></div>
			  </div>
			 </div>
			 
			 <div class="col-md-3">
			  <div class="form-group">
			    <div class="contenido"><label for="Email">Email</label>
			    <input type="Email" name="Email" class="form-control" id="Email" placeholder="Ej: xxxxxx@xxxx.com" required></div>
			  </div>
			 </div>
			</div>
			<div class="row justify-content-start">
			 <div class="col-lg-3"></div>
			  <div class="col-lg-4">
				<div class="form-group">
					<div class="contenido">
						<label for="selectTipo">Tipo de Consulta</label>
						<select class="form-control" name="selectTipo" id="selectTipo">
						      <option>Link Caido</option>
						      <option>Descripcion Incorrecta</option>
						      <option>Error de Carga</option>
						</select>
					</div>
				</div>
			 </div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="contenido"><label for="consulta">Consulta:</label></div>	
					<textarea class="form-control" rows="3" name="consulta" placeholder="Describa su consula Aqui" class="backForm" id ="consulta" required="" ></textarea>
				</div>
			</div>
			<hr>
			 <div class="row justify-content-center">
			 	<div class="form-group">
			 	 <button type="submit" class="btn btn-secondary" name= "Enviar" id="Enviar">Enviar</button>
			 	</div>
			</div>
		</form>
		<?php 	
		if (isset($_GET['env'])) {
					
					echo "<script type='text/javascript'>alert('Consulta Enviada');
					window.location('contacto.php')
					</script>";	
				}	
	
		?>
				
	<hr class="hr1">



		<div class="row justify-content-center">
			<div class="col-md-6">
				<h2 class="titulo">Ubicación</h2>
				<div id="map">
					<div class="contenido"><p>Dirección: Av. Belgrano 1191</p></div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2759.283475816173!2d-58.36421891525681!3d-34.670874137418714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x688c2224c9769fa1!2sInstituto+Tecnol%C3%B3gico+Beltr%C3%A1n!5e0!3m2!1ses!2sar!4v1556899482921!5m2!1ses!2sar" width="600" height="450" frameborder="0" style="border:0" allowfullscreen  id="mapa">¿COMO LLEGAR?</iframe>
				</div>
			</div>
		</div>
		<?php require ("footer.php<"); ?>