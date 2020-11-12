<?php
	function conectar(){
		$conexion= mysqli_connect("127.0.0.1","root","","parcialwm");
		if (!$conexion) {
			echo "Error al conectar base";
		} 
		return $conexion;
	}
    conectar(); 
    
    function mostrarPeliculas(){
		$db=conectar();
		$consulta= mysqli_query($db,"SELECT * FROM movies"); 
		 if ($consulta) {
		  	$result=array();
		  	while ($p= mysqli_fetch_assoc($consulta)) {
		  		$result[]=$p;
		  	}
		  	return $result;
		}
        };
        
		$peliculas=mostrarPeliculas();
		


		//cabeceras para descarga
		header('Content-Type: application/xls');
		header("Content-disposition: attachment; filename=\"my_csv_file.xls\""); 
		 
?>

<table border="1">
	<tr>
		<th style="background-color:red;">Titulo</th>
		<th style="background-color:red;">Estreno</th>
		<th style="background-color:red;">Puntaje</th>
		<th style="background-color:red;">Duracion</th>
		<th style="background-color:red;">Genero</th>
	</tr>
	<?php
		foreach ($peliculas as $pelicula) {
			?>
				<tr>
					<td><?php echo utf8_decode($pelicula['titulo']); ?></td>
					<td><?php echo $pelicula['anio']; ?></td>
					<td><?php echo $pelicula['puntaje']; ?></td>
					<td><?php echo $pelicula['Duracion']; ?></td>
					<td><?php echo utf8_decode($pelicula['genero']); ?></td>
				</tr>	

			<?php
		}

	?>
</table>
