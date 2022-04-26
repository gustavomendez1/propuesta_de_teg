<?php

    require 'database.php';

$message= ''; 


      if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['Edad']) 
      && !empty($_POST['Telefono']) && !empty($_POST['Direccion']) && !empty($_POST['Sexo']) 
      && !empty($_POST['tipocedula']) && !empty($_POST['ci']) && !empty($_POST['email']) 
      && !empty($_POST['password']) && !empty($_POST['fechanac'])){
          $sql = "INSERT INTO registrarse (nombre, apellido, Edad, Telefono, Direccion, Sexo, tipocedula, ci, email, password, fechanac) VALUES (:nombre, :apellido, :Edad, :Telefono, :Direccion, :Sexo, :tipocedula, :ci, :email, :password, :fechanac)";
          $stmt = $conexion->prepare($sql);
          $stmt->bindParam(':nombre',$_POST['nombre']);
          $stmt->bindParam(':apellido',$_POST['apellido']);
          $stmt->bindParam(':Edad',$_POST['Edad']);
          $stmt->bindParam(':Telefono',$_POST['Telefono']);
          $stmt->bindParam(':Direccion',$_POST['Direccion']);
          $stmt->bindParam(':Sexo',$_POST['Sexo']);
          $stmt->bindParam(':tipocedula',$_POST['tipocedula']);
          $stmt->bindParam(':ci',$_POST['ci']);
          $stmt->bindParam(':email',$_POST['email']);
          $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
          $stmt->bindParam(':password', $password);
          $stmt->bindParam(':fechanac',$_POST['fechanac']);

          echo($_POST['nombre']);          
          if ($stmt->execute()){
              $message = 'Ha sido creado su usuario satisfactoriamente';
          }else {
              $message = 'Ha ocurrido un error al registrarse';
          }
        }
              
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
   
</head>
<body>
    <?php require 'partials/header.php' ?>
    
    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
    
    
    <h1>Formulario</h1>
    <h2>Por favor ocupar todos los campos</h2>
    <span>or <a href="login.php">Login</a></span>
    <form action="registrarse.php" method="post">
        <p>Nombre:<input type="text" name="nombre" required></p>
        <p>Apellido:<input type="text" name="apellido" required></p>
        <p>Edad:<input type="text" name="Edad" required></p>
        <p>Teléfono:<input type="text" name="Telefono" maxlength="14" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required></p>
        <p>Dirección:<input type="text" name="Direccion" required></p>
        <p>Sexo:<input type="text" name="Sexo" placeholder="M o F" maxlength="1" required></p>
        <p>Tipo de Cédula:<input type="text" name="tipocedula" placeholder="V o E" maxlength="1" required></p>
        <p>Cédula:<input type="text" name="ci" value="" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required></p>
        <p class='Email'>Email:<input type="email" name="email" placeholder="Usuario" required></p>
        <p>Contraseña:<input type="password" name="password" placeholder="Contraseña" required></p>
        <p>Fecha de Nacimiento:<input type="date" name="fechanac" required></p>
        <input type="submit" value="enviar">
    </form>
    
    
</body>
</html>