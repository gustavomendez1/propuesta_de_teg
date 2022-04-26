<?php
session_start();

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $records = $conexion->prepare('SELECT id, nombre, apellido, Edad, Telefono, Direccion, Sexo, tipocedula, ci, email, password, fechanac FROM registrarse WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $message = '';
    
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])){
        $_SESSION['user_id'] = $results['id'];
        header('Location: index.php');
    } else {
        $message = 'Disculpe, éstas credenciales no coinciden';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">    
    </head>
    <body>
        
        <?php require 'partials/header.php' ?>
        <h1>Login</h1>
        <span>or <a href="registrarse.php">Registrarse</a></span>
        
        <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
        
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
