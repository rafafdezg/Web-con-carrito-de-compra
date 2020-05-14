<?php

if($_POST) {

    $total=0;
    $SIDP=session_id();        
    $UID=$_POST['uid'];
    $username=$_POST['username'];    
    $direccionP=$_POST['direction'];   

    try {

        if (isset($_COOKIE['CARRITO'])) {
            $array = unserialize($_COOKIE['CARRITO']);

            foreach ($array as $indice => $producto) {

                $total=$total+($producto->PRECIO * $producto->CANTIDAD);     
                
            }
            $consult1=("INSERT INTO `tblpedidos`(`PID`, `Total`, `Estado`, `direccionP`) VALUES ('' , $total, 'Pendiente','$direccionP');");
            $sentencia1=$pdo -> prepare($consult1);          
            $sentencia1 -> execute();
        
            $consultPID=("SELECT PID FROM `tblpedidos` ORDER BY PID DESC LIMIT 1;");
            $PID = $pdo -> query($consultPID) -> fetchColumn();	
            $CODP = $SIDP.$PID;
            
            $consult2=("INSERT INTO `hacepedido`(`PID`, `UID`, `CODP`, `Fecha`, `Pago`) VALUES ($PID, $UID, '$CODP', NOW(), 'Paypal');");
            $sentencia2=$pdo -> prepare($consult2); 
            $sentencia2 -> execute(); 
        
            
            foreach ($array as $indice => $producto) {
        
                $ID = $producto->ID;
                $Cantidad = $producto->CANTIDAD;
                $numeroProductos = count($array);
                $consult3=("INSERT INTO `lineapedido`(`ID`, `PID`, `Cantidad`) VALUES ( $ID, $PID, $Cantidad);");             
                $sentencia3=$pdo -> prepare($consult3);
                $sentencia3 -> execute();  
                            
            }
        
        } else {   
            
            foreach ($_SESSION['CARRITO'] as $indice => $producto) {

                $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);     
                
            }
            $consult1=("INSERT INTO `tblpedidos`(`PID`, `Total`, `Estado`, `direccionP`) VALUES ('' , $total, 'Pendiente','$direccionP');");
            $sentencia1=$pdo -> prepare($consult1);          
            $sentencia1 -> execute();

            $consultPID=("SELECT PID FROM `tblpedidos` ORDER BY PID DESC LIMIT 1;");
            $PID = $pdo -> query($consultPID) -> fetchColumn();	
            $CODP = $SIDP.$PID;
            
            $consult2=("INSERT INTO `hacepedido`(`PID`, `UID`, `CODP`, `Fecha`, `Pago`) VALUES ($PID, $UID, '$CODP', NOW(), 'Paypal');");
            $sentencia2=$pdo -> prepare($consult2); 
            $sentencia2 -> execute(); 

            
            foreach ($_SESSION['CARRITO'] as $indice => $producto) {

                $ID = $producto['ID'];
                $Cantidad = $producto['CANTIDAD'];
                $numeroProductos = count($_SESSION['CARRITO']);
                $consult3=("INSERT INTO `lineapedido`(`ID`, `PID`, `Cantidad`) VALUES ( $ID, $PID, $Cantidad);");             
                $sentencia3=$pdo -> prepare($consult3);
                $sentencia3 -> execute();  
                            
            }
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error de conexión BD')</script>";
    }
}
?>
