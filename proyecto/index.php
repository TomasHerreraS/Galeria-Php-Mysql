<?php include("cabecera.php"); ?>
<?php include("conexion.php");?>
<?php 

$conexion = new Conexion();
$resultado=$conexion->consultar("SELECT * FROM `album`");


?>
<div class="container mt-4 mb-5 pb-3 shadow-sm">
    <h1 class="text-center">Bienvenidos</h1> <br>
    <h3 class="text-center">Esta es una galería de imágenes con titulo y descripciones.</h3>
    <h5 class="text-center">(Proyecto de php con Mysql, bootstrap, html y css)</h5>
</div>



<div class="row row-cols-1 row-cols-md-3 g-4 mt-5 ms-2">
    
    <?php foreach($resultado as $proyecto) { ?> <!-- Por cada vez que se repita, se repetira la secuencia de abajo-->
        
        <div class="col">
          <div class="card">
            <img src="img/<?php echo $proyecto['imagen'];?>" width="40" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
              <p class="card-text"><?php echo $proyecto['descripcion'];?></p>
            </div>
          </div>
        </div>
    <?php }?>

</div>

<?php include("pie.php");  ?>