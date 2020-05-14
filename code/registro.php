<?php

include '../global/config.php';
include '../global/conexion.php';

if ($_POST) {
    // COMPROBAMOS LA LLEGADA DE DATOS
    if (isset($_POST["inputMail"]) and isset($_POST["inputUser"]) and isset($_POST["inputPassword"]) and isset($_POST["inputDirec"]) and is_numeric($_POST["inputTel"])) {
        
        if (empty($_POST['inputMail']) || empty($_POST['inputUser']) || empty($_POST['inputPassword']) || empty($_POST['inputDirec'])) {

            echo '<script>alert("Introduzca valores.");</script>'; 
            print "<p><a href='../index.php'>Volver</a></p>";         

        } else {
            
            $email=$_POST["inputMail"];
            $username=$_POST["inputUser"];
            $password=openssl_encrypt($_POST["inputPassword"], COD, KEY);
            $direction=$_POST["inputDirec"];
            $tel=$_POST["inputTel"];
            $edad=$_POST["inputAge"];           
            
            // COMPROBAMOS NO QUE NO EXISTA UNA CUENTA YA CREADA CON EL MISMO email INSERTADO  
            $consult = "SELECT count(*) from tblusuarios where Email='$email'";
            $result = $pdo -> query($consult) -> fetchColumn();  
                            
            if ($result >= 1) {

                echo '<script>alert("Ya existe una cuenta con este Email");</script>'; 
                print "<p><a href='../index.php'>Volver</a></p>";                

            } else {       
                
                // APLICAMOS SEGURIDAD PARA COMPROBAR QUE LOS DATOS INSERTADOS SON CORRECTOS
                $regex = "/^[a-zA-Z._]+[0-9]*/";

                if (preg_match($regex, $username)) {

                    $regex2 = "/^6[0-9]{8}$/";

                    if (preg_match($regex2, $tel)) {

                        // PREPARAMOS LA CONSUTA
                        $consult2 = "INSERT INTO `tblusuarios`(`UID`, `Email`, `Username`, `Contrasena`, `Direccion`, `Telefono`, `Fecha_Nacimiento`, `Rol`) VALUES 
                                    ('', '$email', '$username', '$password', '$direction', '$tel', '$edad', 'Usu1');";
                        $result2 = $pdo -> prepare($consult2);

                        // SI VA BIEN, EJECUTAMOS Y VOLVEMOS A LA PAG. PRINCIPAL
                        if ($result2 -> execute()) { 
                                   
                            header('Location: ../index.php');          
    
                        } else {                            
                            echo '<script>alert("Error al añadir el registro.");</script>';
                            print "<p><a href='../index.php'>Volver</a></p>";                            
                        }

                    } else {
                        echo '<script>alert("Escriba correctamente el número de telefono.");</script>'; 
                        print "<p><a href='../index.php'>Volver</a></p>";
                    }
                    
                } else {                  
                    echo '<script>alert("Escriba otro nombre de usuario.");</script>'; 
                    print "<p><a href='../index.php'>Volver</a></p>";                           
                }                
            } 
        }   
    } else {
        echo '<script>alert("Introduzca valores correctos.");</script>';
        print "<p><a href='../index.php'>Volver</a></p>";
    }    
}    
?>