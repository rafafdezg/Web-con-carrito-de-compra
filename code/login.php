<?php
include '../global/config.php';
include '../global/conexion.php';

session_start ();

//COMPROBAMOS QUE LOS DATOS LLEGAN CORRECTAMENTE
if (isset($_POST['submit'])) {
    
	if (empty($_POST['inputUser']) || empty($_POST['inputPassword'])) {

		print "Introduzca nombre de usuario y contraseña válidos.";
		print "<p><a href='../index.php'>Volver</a></p>";

	} else {
		// LOS GUARDAMOS EN VARIABLES
		$username=$_POST["inputUser"];
        $password=openssl_encrypt($_POST["inputPassword"], COD, KEY);
        // CONSULTAMOS SI EXISTE UN USUARIO CON ESA CONTRASEÑA EN LA BD
		$consult = "SELECT count(*) from tblusuarios where Username='$username' AND Contrasena='$password' LIMIT 1";
		$result = $pdo -> query($consult) -> fetchColumn();	
		// SI EL RESULTADO ES UNO 
		if ($result == 1) {

            // GUARDA EL NOMBRE DEL USUARIO EN UNA SESION QUE SERÁ UTILIZADA POR EL FICHERO USER
            $_SESSION['USER'] = $username;    
            header('Location: ../index.php');
            
		} else {

            print "El nombre de usuario o la contraseña no son válidos.";
            print "\n";
			print "<p><a href='../index.php'>Volver</a></p>";
		}
	}
}		

?>