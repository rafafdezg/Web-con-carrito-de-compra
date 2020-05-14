<?php
include 'global/config.php';
include 'global/conexion.php';

// INICIAMOS SESION
session_start(); 

if(!empty($_SESSION['USER'])) {

    // RECUPERAMOS EL NOMBRE DE USUARIO INSERTADO EN LOGIN A TRAVES DE SESSION
    $user_check = $_SESSION['USER'];

    // REALIZAMOS LA CONSULTA PARA OBTENER TODOS LOS DATOS DEL USUARIO DESDE LA BD 
    $consult = "SELECT * from tblusuarios where Username = '$user_check'";
    $result = $pdo -> query($consult);

    if (!$result) {
        echo "ok";
        print "<p>Error en la consulta.</p>\n";
        print "\n";
        print "<p><a href='index.php'>Volver</a></p>";

    } else {
        // GUARDAMOS LOS VALORES EN VARIABLES PARA SER UTILIZADAS POSTERIORMENTE
        foreach ($result as $row) { 
            $login_UID = $row['UID']; 
            $login_email = $row['Email'];   			
            $login_username = $row['Username'];                
            $login_direc = $row['Direccion'];            
            $login_tel = $row ['Telefono'];
            $_SESSION['ROL'] = $row['Rol'];               
        } 
            
    } 
}      
?>