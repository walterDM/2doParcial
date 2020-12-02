<?php
	function conectar(){
		$conexion= mysqli_connect("127.0.0.1","root","","parcialwm");
		if (!$conexion) {
			echo "Error al conectar base";
		} 
		return $conexion;
	}
    conectar(); 

    function Peliculas(){
		$db=conectar();
		$consulta= mysqli_query($db,"SELECT titulo, anio, puntaje, Duracion, Genero FROM movies"); 
		 if ($consulta) {
		  	$result=array();
		  	while ($p= mysqli_fetch_assoc($consulta)) {
		  		$result[]=$p;
		  	}
		  	return $result;
		}
        };

		$peliculas=Peliculas();

		//cabeceras para descarga
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"peliculas_json.txt\""); 

		//preparar el wrapper de salida
		$salida = fopen("php://output", 'w');

		//volcamos el contenido del array en formato csv
		foreach($peliculas as $pelicula) {
			if ( json_encode($pelicula) != false){
				fputcsv($salida, array(json_encode($pelicula)));
			}
		}
		//cerramos el wrapper
		fclose($salida);
		exit;
?>