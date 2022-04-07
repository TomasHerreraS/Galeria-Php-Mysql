<?php include("cabecera.php");  ?>
<?php include("conexion.php");?>
<?php



if($_POST){
    $nombre= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];

    $fecha= new DateTime();

    $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name']; //Tendrá concatenado el tiempo
    //Para que imagenes con el mismo nombre no se sobreescriban.

    $imagen_temp=$_FILES['archivo']['tmp_name'];

    move_uploaded_file($imagen_temp,"img/".$imagen);



    $conexion = new Conexion();
    $sql="INSERT INTO `album` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL,'$nombre', '$imagen', '$descripcion');";
    $conexion->ejecutar($sql);    
    header("location:galeria.php"); //Al actualizar no nos volverá a enviar el último dato que subimos
    //y podremos retornar a la misma página sin error.
}
if($_GET){
    $id=$_GET['borrar'];
    $conexion= new Conexion();

    $imagen=$conexion->consultar("SELECT imagen FROM `album` WHERE id=".$id);
    // print_r($imagen[0]); //nos sirve para ver que parte del array traemos
    
    unlink("img/".$imagen[0]['imagen']); //función que permite borrar del directorio algo

    $sql="DELETE FROM album WHERE `album`.`id` =".$id;
    $conexion->ejecutar($sql);
    header("location:galeria.php");
}

$conexion = new Conexion();
$resultado=$conexion->consultar("SELECT * FROM `album`"); //trae los datos del album gracias a la
//funcion consultar encontrada en conexion.
// print_r($resultado);


?>



<div class="container d-flex justify-content-around mt-4">
    <div class="col-4 shadow-sm p-2">
        <h5 class="text-center pb-3">Datos de la imagen</h5>
        <form action="galeria.php" method="post" enctype="multipart/form-data">
        <input required autocomplete="off" class="form-control mb-3" type="text" name="nombre" id="titulo" placeholder="Nombre de la imagen.">
        Imagen del proyecto: <input required class="form-control" type="file" name="archivo" id="">
        <textarea required autocomplete="off" name="descripcion" id="" cols="30" rows="3" class="form-control mt-3" placeholder="Descripción:"></textarea>
        <button class="btn btn-primary mt-2" type="submit">Guardar</button>
        </form>
    </div>
    <div class="col-7 ps-5">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
            </thead>
            <tbody>
                <?php foreach($resultado as $proyecto) { ?>
                <tr>
                    <td><?php echo $proyecto['id'];?></td>
                    <td><?php echo $proyecto['nombre'];?></td>
                    <td>
                        <img width="40" src="img/<?php echo $proyecto['imagen'];?>" alt="" srcset="">
                    </td>
                    <td><?php echo $proyecto['descripcion'];?></td>
                    <td><a href="?borrar=<?php echo $proyecto['id']; ?>" class="btn btn-danger">Eliminar</a> </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>
</div>



    



<?php include("pie.php");  ?>