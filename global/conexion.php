<?php
    $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
    // INICIAMOS CONEXION CON LA BASE DE DATOS
    try {
        $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $pdo->setAttribute(PDO ::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "<script>alert('Conectado a BD')</script>";
        
    } catch (PDOException $e) {
        //echo "<script>alert('Error de conexión BD')</script>";
        print "Error de conexión BD: " . $e->getMessage() . "<br/>";
    }
?>