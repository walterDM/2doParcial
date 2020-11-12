
<?php

function conectar(){
	$conexion= mysqli_connect("127.0.0.1","root","","parcialwm");
	if (!$conexion) {
		echo "Error al conectar base";
	} 
	return $conexion;
}
conectar();
$conexion=conectar();

//redirige hacia el formulario de alta
if (isset($_POST['Ingresar']) && !empty($_POST['Ingresar'])) {
	header("location:Alta.php");
};

//se procede a guardar en la base de datos la informacion cargada
if (isset($_POST['guardar'] )&& !empty($_POST['guardar'])) {
	$resultado=0;
	echo "INTENTO";
	if (!empty($_POST['nombre']) && (!empty($_POST['anio']) && is_numeric($_POST['anio']) && is_numeric($_POST['duracion'])) && !empty($_POST['descripcion']) && !empty($_POST['genero']) && !empty($_POST['imagen'])) {


		if (preg_match('/0-9/', $_POST['anio']) || preg_match('/0-9/', $_POST['duracion'])){
			header("location:Alta.php?estado=$resultado");
		}
		$db=conectar();
		$titulo=$_POST['nombre'];
		$tipoImagen=$_POST['tipoImg'];
		$anio=intval($_POST['anio']);
		$genero=$_POST['genero'];
		$puntaje=intval($_POST['puntaje']);
		$imagen=$_POST['imagen'];
		$descripcion=$_POST['descripcion'];
		$duracion=intval($_POST['duracion']);

		$enviar=$db->prepare("CALL insertPelis(?,?,?,?,?,?,?,?)");
		$enviar->bind_param("siiissss",$titulo,$anio,$puntaje,$duracion,$genero,$descripcion,$imagen,$tipoImagen);
		$enviar->execute();
		//$resultado=Guardar();
		if ($enviar==1) {
			header("location:Alta.php?estado=$resultado");
		}	
	}else{
		header("location:Alta.php?estado=$resultado");
	}
	
};
/*function Guardar(){

	$db=conectar();
	$titulo=$_POST['nombre'];
	$tipoImagen=$_POST['tipoImg'];
	$anio=$_POST['anio'];
	$genero=$_POST['genero'];
	$puntaje=$_POST['puntaje'];
	$imagen=$_POST['imagen'];
	$descripcion=$_POST['descripcion'];
	$duracion=$_POST['duracion'];

	//$datos=array('titulo' =>$titulo ,'anio'=>$anio,'puntaje'=>$puntaje,'duracion'=>$duracion,'genero'=>$genero,'descripcion'=>$desccripcion,'imagen'=>$imagen,'tipoImagen'=>$tipoImagen);
	$enviar=$db->prepare("CALL insertPelis(?,?,?,?,?,?,?,?)");
	$enviar->bind_param("siiissss",'$titulo',$anio,$puntaje,$duracion,'$genero','$descripcion','$imagen','$tipoImagen');
	$enviar->execute();

	$Insert="INSERT INTO movies values (00,'$titulo','$anio','$puntaje','$duracion','$genero','$descripcion','$imagen','$tipoImagen')";
	$enviar=mysqli_query($db,$Insert);
	return $enviar;

}*/
//funcion e implementacion de modificaciones hechas
if (isset($_POST['Modificar'] )&& !empty($_POST['Modificar'])) {
	$id=$_POST['id'];
	$db=conectar();
	$consulta= "SELECT titulo from movies where idMovies='$id'";
	$query=mysqli_query($db,$consulta);
	$tipoBD=$query->fetch_array(MYSQL_ASSOC);
	
	if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && is_numeric($_POST['anio'])&& is_numeric($_POST['duracion']) && !empty($_POST['imagen'])) {

		$resp=0;

		$titulo=$_POST['nombre'];
		$tipoImagen=$_POST['tipoImg'];
		$anio=$_POST['anio'];
		$genero=$_POST['genero'];
		$puntaje=$_POST['puntaje'];
		$imagen=$_POST['imagen'];
		$descripcion=$_POST['descripcion'];
		$duracion=$_POST['duracion'];

		$Insert="UPDATE movies SET titulo='$titulo',anio='$anio',puntaje='$puntaje',Duracion='$duracion',genero='$genero',descripcion='$descripcion',imagen='$imagen',tipoImagen='$tipoImagen' WHERE idMovies='$id'";
		$resp=mysqli_query($db,$Insert);

		if ($resp) {
			
			header("location:modificar.php?id=$id&estado=$resp");
		}else{
			
			header("location:modificar.php?id=$id&estado=$resp");
		};
	}else{
		header("location:modificar.php?id=$id&cmpVacio=1");
	}
};




?>