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
		
		
?>

