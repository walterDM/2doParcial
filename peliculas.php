<?php require('header.php');
if ($_SESSION['login']==0){
	header("location:login.php");
}else{
	$idUser=$_SESSION['login'];
}; 

$rs=mostrarPeliculas();
$totalPeliculas=cantPelis();
$pelicualsxPag=4;
$paginas=$totalPeliculas/$pelicualsxPag;
$paginas=ceil($paginas);

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
	function cantPelis(){
			$db=conectar();
			$consulta= mysqli_query($db,"SELECT cantPelis() as cant");
			while ($r=mysqli_fetch_array($consulta)) {
				$count=$r['cant'];
			}
			return $count;
		}
?>
<script>
	function marca(){
		$('#peliculas').attr("class","");
		$('#peliculas').attr("class","btn btn-secondary");
	}
	window.onload= function(){
		marca();
	}
</script>
	<div class="row">
		<h5>Peliculas</h5>
		<?php 
			
			$iniciar=($_GET['pag']-1)*$pelicualsxPag;
			$db=conectar();
			$sentenciaPeliculas=mysqli_query($db,"SELECT * FROM movies LIMIT $iniciar,$pelicualsxPag");
			
		?>
	</div>
	<div class="row">

		<?php while ($pelicula=mysqli_fetch_array($sentenciaPeliculas)) :?>
			
			<div class="card mb-3 bg-dark separacion" style="max-width: 540px;">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="<?php echo $pelicula['imagen'] ?>" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?php echo $pelicula['titulo'] ?></h5>
			        <p class="card-text"><?php echo $pelicula['descripcion'] ?></p>
			        <p class="card-text"><small class="text-muted">Año:<?php echo $pelicula['anio']?>/  Duraciòn: <?php echo $pelicula['Duracion'] ?> MIN</small></p>
			        <p class="card-text"><small class="text-muted">Puntaje:<?php echo puntaje($pelicula['puntaje'])?></small></p>
			        <p class="card-text"><small class="text-muted">Genero:<?php echo $pelicula['genero']?></small></p>
			      </div>
			    </div>
			  </div>
			  
			 	
			 		<ul class="nav justify-content-center">
			 			<?php if ($idPer!=0): ?>
						  <li class="nav-item">
						    <form action="modificar.php" method="GET">
								<button type="submit" name="id" value="<?php  echo $pelicula['idMovies'];?>" class="btn btn-warning marginButon"><i class="far fa-edit"></i></button>
							</form>
						  </li>
					 	<?php endif ?>
					 	<?php if ($idPer==1 || $idPer==2): ?>
						  <li class="nav-item">
						    <form action="eliminar.php" method="GET">
								<button type="submit" class="btn btn-danger marginButon" name="id" value="<?php echo $pelicula['idMovies'];?>"><i class="far fa-trash-alt"></i></button>
							</form>
						  </li>
					  	<?php endif ?>
					</ul>
			</div> 	
			
		
		<?php endwhile?>
	</div>
	<nav aria-label="...">
	  <ul class="pagination justify-content-center">
	    <li class="page-item <?php echo 1>=$_GET['pag']? 'disabled':'' ?>">
	      <a class="page-link" href="peliculas.php?pag=<?php echo $_GET['pag']-1 ?>" tabindex="-1" aria-disabled="true">
	      	Anterior
	  	  </a>
	    </li>
	    <?php for ($i=0; $i <$paginas ; $i++): ?>
	    
	    <li class="page-item <?php echo $_GET['pag']==$i+1 ? 'active':'' ?>">
	    	<a class="page-link" href="peliculas.php?pag=<?php echo $i+1?>">
	    		<?php echo $i+1; ?>	
	    	</a>
	    </li>
	    
	    <?php endfor; ?>
	    <li class="page-item  <?php echo $_GET['pag']>=$paginas? 'disabled':'' ?>">
	    	<a class="page-link" href="peliculas.php?pag=<?php echo $_GET['pag']+1 ?>">
	    		Siguiente
	    	</a>
	    </li>
	    
	  </ul>
	</nav>


<?php require('footer.php') ?>





<?php function puntaje($i){
			        		
	switch ($i) {
			case 1:
			    for ($j=0; $j <$i ; $j++) { 
					echo "<i class='fas fa-star'></i>";
				}
			    break;
			case 2:
			    for ($j=0; $j <$i ; $j++) { 
					echo "<i class='fas fa-star'></i>";
				}
			    break;
			case 3:
			    for ($j=0; $j <$i ; $j++) { 
					echo "<i class='fas fa-star'></i>";
				}
			    break;
			case 4:
			    for ($j=0; $j <$i ; $j++) { 
					echo "<i class='fas fa-star'></i>";
				}
			    break;
			case 5:
			    for ($j=0; $j <$i ; $j++) { 
					echo "<i class='fas fa-star'></i>";
				}
			    break;                		 	
			default:
			    for ($j=0; $j <5 ; $j++) { 
					echo "<i class='far fa-star'></i>";
				}
			break;
		 }
	}
?>