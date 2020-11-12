<?php require ("header.php");

if (isset($_GET['id'])) {
	$idMovie=$_GET['id'];
	$resp="";
	$rs=array();
	$db=conectar();
	$consulta="SELECT * FROM movies where idMovies='$idMovie';";
	$resultado=mysqli_query($db,$consulta);
	$rs=mysqli_fetch_array($resultado);
	$img=$rs['imagen'];
	$titulo=$rs['titulo'];
}

if (isset($_GET['borrar'])) {
	$idM=$_GET['borrar'];
	$db=conectar();
	$delete= mysqli_query($db,"DELETE FROM movies WHERE idMovies='$idM'");	
	$res=mysqli_query($db,$delete);

	if ($res == 1) {
		echo  "<script type='text/javascript'>alert('El producto se elimino correctamente');
		window.location('ABM.php')
		</script>";
	}
}

?>
<?php if (isset($rs)): ?>
	<script>

		function mostrar(){
			$(document).ready(function(e){
				$("#mas").click(function(){
					$("#desc").show();
					$("#menos").show();
					$("#mas").hide();
				});
			});
		}
		function ocultar(){
			$(document).ready(function(e){
				$("#menos").click(function(){
					$("#desc").hide();
					$("#menos").hide();
					$("#mas").show();
				});
			});
		}
		


	</script>
	<div class="row justify-content-center">
		<div class="card text-white bg-secondary mb-3" style="width: 18rem;">
			<img src=<?php echo $rs['imagen']; ?> class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $rs['titulo']; ?></h5>


				<button type="submit" name="mas" id="mas" onclick="mostrar()" class="btn btn-warning marginButon"><i class="fas fa-sort-down"></i></button>
				<button type="submit" name="menos" id="menos" style="display: none" onclick="ocultar()" class="btn btn-warning marginButon"><i class="fas fa-sort-up"></i></button>

				<p class="card-text" id="desc" style="display: none"><?php echo utf8_decode($rs['descripcion']); ?></p>
				<p class="card-text"><?php echo "Genero: ".$rs['genero'] ;?></p>
				<a href="eliminar.php?borrar= <?php echo $idMovie; ?>" class="btn btn-danger" onclick="return confirm('Estás seguro que deseas eliminar el registro?');">borrar</a>

			</div>
		</div>
		
	</div>
	<?php else :?> 
		<p class="titulo">  La pelicual fue eliminada Exitosamente </p>
		<form action="peliculas.php?pag=1" method="POST">
			<button type="submit" class="btn btn-secondary">volver a Peliculas</button>
		</form>
	<?php endif?>

	<?php 

	/*function eliminarProductos($idProducto){
		
						if ($rs==1) {
				echo "<script type='text/javascript'>alert('Producto Eliminado');
					window.location('eliminar.php')
					</script>";
				header("location:productos.php?tipo='$titulo'");
			}
				
		}; */?>


		<?php require ("footer.php"); ?>


