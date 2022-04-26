<?php
// Parametros principales para conectarse
$hostname = 'localhost';   //  Host name o IP
$database = 'php_login_database';    //  Nombre Base de Datos
$username = 'root';        //  Nommbre de usuario
$password = '';            //  Contraseña


try {
    $conexion = new PDO("mysql:host=$hostname; dbname=$database;", $username, $password);
} catch (PDOException $e){
   die('Conexión fallida: '.$e->getMessage());  

}
?>