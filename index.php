<?php require("header.php"); 

if (isset($_SESSION['login']) && $_SESSION['login']==0){
header("location:login.php");
}
$db=conectar();
$consulta=mysqli_query($db,"SELECT * FROM movies WHERE tipoImagen='carousel'");
$total_productos=mysqli_num_rows($consulta);
$rs=mostrarPeliculas();
	function mostrarPeliculas(){
		$db=conectar();
		
			$consulta= mysqli_query($db,"SELECT * FROM movies where  tipoImagen='recomendada'"); 
		 if ($consulta) {
		  	$result=array();
		  	while ($p= mysqli_fetch_assoc($consulta)) {
		  		$result[]=$p;
		  	}
		  	return $result;
		}
		};
?>
<script>
	function marca(){
		$('#inicio').attr("class","");
		$('#inicio').attr("class","btn btn-secondary");
	}
	window.onload= function(){
		marca();
	}
</script>
<div class="row justify-content-center">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
				  <?php for($i=0;$i<$total_productos;$i++){ $active="active";?>
				    <li style="background:white" data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<? echo $active;?>"></li>
				  <?php
				     $active="";
				  }
				   ?>
			  </ol>
		<div class="carousel-inner">
			  <?php $active="active";
			     while ($r=mysqli_fetch_array($consulta)) {?>
			  <div align="center" class="carousel-item <?php echo $active;?>">
			      <a href="<?php echo $r['imagen'];?>"><img src="<?php echo $r['imagen'];?>"></a>
			    </div>
			    <?php 
			    $active="";
			  }
			  ?>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span style="color:black" class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<h5>Recomendado</h5><br>
	</div>
</div>
<?php
	/*agregar if de post + switch de productos*/
	
	if (count($rs)>0):?>
			
	<?php for ($i=0; $i <count($rs) && $i<6 ; $i++):?>
		<?php if($i % 4==0): ?>
			<div class="row justify content center">	
		<?php endif; ?>
	
			
		<?php $idProducto=$rs[$i]['idMovies']; ?>
		
			<div class="card bg-dark mb-3 separacion" style="max-width: 540px;">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="<?php echo $rs[$i]["imagen"]; ?>" class="card-img imgA" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?php echo $rs[$i]["titulo"]; ?></h5>
			        <p class="card-text"><?php echo $rs[$i]["descripcion"]; ?></p>
			        <p class="card-text"><small class="text-muted">Año: <?php echo $rs[$i]["anio"]; ?></small></p>
			      </div>
			    </div>
			    
			  </div>

			</div>
		
		
	<?php if($i%4==3): ?>

		</div>

	<?php endif; ?>

<?php endfor; ?>

 	<?php else:?>
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="titulo">
					<p>NO EXISTE PELICULAS A MOSTRAR</p>
				</div>
			</div>
		</div>
	<?php endif; ?>


<?php require("footer.php"); ?>