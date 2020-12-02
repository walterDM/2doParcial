<?php
	function conectar(){
		$conexion= mysqli_connect("127.0.0.1","root","","parcialwm");
		if (!$conexion) {
			echo "Error al conectar base";
		} 
		return $conexion;
	}
    conectar(); 


		$db=conectar();
		$consulta= mysqli_query($db,"SELECT titulo, anio, puntaje, Duracion, Genero FROM movies"); 
		 if ($consulta) {
		  	while ($result = $consulta->fetch_object()) {
				ECHO $result->titulo.";";
				ECHO $result->anio.";";
				ECHO $result->puntaje.";";
				ECHO $result->Duracion.";";
				ECHO $result->Genero."\n";


		  	}
		}


		//cabeceras para descarga
	header('Content-Type: application/csv');
	header("Content-disposition: attachment; filename=peliculas.csv"); 



?>