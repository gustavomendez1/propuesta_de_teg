<?php 
session_start();
require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conexion->prepare('SELECT id, nombre, apellido, Edad, Telefono, Direccion, Sexo, tipocedula, ci, email, password, fechanac FROM registrarse WHERE id=:id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $user = null; 
    
    if(count($results) > 0){
        $user = $results;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="uft-8">
        <title>Mi proyecto final</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
    </head>
    <body>
        <div class="container-fluid">
            <?php require 'partials/header.php' ?>

            <?php if(!empty($user)): ?>
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid navbar-brand">
                    <a class="navbar-brand" width="100%" href="#">
                            BIENVENIDO AL CURSO INTERACTIVO DE PROGRAMACIÓN (HTML Y CSS). <?= $user['email'] ?>
                            <br>Bien hecho, lo lograste.
                        </a>
                    </div>
            </nav>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>
                                HTML
                            </h2>
                            <textarea rows="10" cols="30" id="txtHtml"></textarea>
                        </div>
                        <div class="col-md-6">
                            <h2>
                                CSS
                            </h2>
                            <textarea rows="10" cols="30" id="txtCss"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-dark" id="boton">Boton</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>
                        RESULTADO
                    </h2>
                    <iframe id="frame" width="100%" height="100%">
                    </iframe>
                </div>
            </div>

            <?php else: ?>
            <h1>Por favor acceder</h1>
            <br>
            <p>Paso N°1: Registrar tu usuario en el Formulario, aquí-><a href="registrarse.php">Registrarse</a></p> 
            <br>
            <p>Paso N°2: Acceder al usuario y la contraseña que te creaste en el formulario, aquí-><a href="login.php">Login</a> </p>
            
            <?php endif; ?>
             <?php
                //include("validacion_registro.php");
            ?>
        </div>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">

 
        document.getElementById("boton").addEventListener("click", ()=>{
            let frame = document.getElementById("frame").contentWindow.document || document.getElementById("frame").contentDocument

            textoHtml = document.getElementById("txtHtml").value
            textoCss = document.getElementById("txtCss").value

            console.log(textoCss)
            let body_frame = `<style>${textoCss}</style> ${textoHtml}`

            frame.body.innerHTML = body_frame
        })
    </script>
</html>
