<?php
session_start();
if ($_POST) {
    if (($_POST['usuario'] == "ejemplo") && ($_POST['contrasenha'] == "12345")) {

        $_SESSION['usuario'] = "ejemplo";

        header("location:index.php");
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3 pb-4">
        <h1 class="text-center mb-5">Inicio de sesión</h1>
        <form action="login.php" class="d-flex flex-column  shadow-sm" method="post">

            <div class="form-floating mb-3">
                <input required type="text" class="form-control bg-transparent " name="usuario" placeholder="Ingresa nombre" autocomplete="off" id="usuario">
                <label class="text-secondary" for="usuario">Ingrese usuario</label>
            </div>
            <div class="form-floating mb-3">
                <input required type="password" class="form-control bg-transparent " name="contrasenha" placeholder="Ingresa nombre" autocomplete="off" id="password">
                <label class="text-secondary" for="password">Ingrese contraseña</label>
            </div>
            <button class="btn btn-primary mt-3 col-2 " type="submit">Ingresar</button>
        </form>

    </div>
</body>

</html>