<?php
session_start();
if (isset($_SESSION['usuario']) != "ejemplo") {
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" >
</head>

<body>
    <header class="bg-dark pb-3">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="col text-center text-muted p-0 m-0"><a class="text-muted" href="index.php">Inicio</a></h1>
                <h1 class="col text-center text-muted p-0 m-0"><a class="text-muted" href="galeria.php">Galería</a></h1>
                <h1 class="col text-center text-muted p-0 m-0"><a class="text-muted" href="cerrar.php">Cerrar</a></h1>
            </div>
        </div>
    </header>