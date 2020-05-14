<?php 
include 'user.php';

    $mensaje = "";
    $mensaje2 = "";   

    if (isset($_POST['btnAccion'])) {        
        switch ($_POST['btnAccion']) {  
            // COMPROVAMOS Y GUARDAMOS LOS DATOS EN VARIABLES
            case 'Agregar':
                
                if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                    $ID = openssl_decrypt($_POST['id'], COD, KEY);
                    
                } else {
                    $mensaje .= 'ID incorrecto.'.'<br/>';
                }
                if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                    $Nombre = openssl_decrypt($_POST['nombre'], COD, KEY);
                    $mensaje .= "NOMBRE: $Nombre - ";
                } else {
                    $mensaje .= 'NOMBRE incorrecto.'.'<br/>';
                }
                if (is_numeric($_POST['cantidad'])) {
                    $Cantidad = $_POST['cantidad'];
                    $mensaje .= "CANTIDAD: $Cantidad - ";
                } else {
                    $mensaje .= 'CANTIDAD incorrecta.'.'<br/>';
                }
                if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                    $Precio = openssl_decrypt($_POST['precio'], COD, KEY);
                    $mensaje .= "PRECIO: $Precio.". '<br/>';
                } else {
                    $mensaje .= 'PRECIO incorrecto.'.'<br/>';
                }
                
                // CON ESAS VARIABLES CREAMOS UN NUEVO OBJETO PRODUCTO QUE SERÁ ALMACENADO COMO ARRAY
                if (!isset($_COOKIE['CARRITO'])) {
                    
                    $PRODUCTO = new stdClass(); 
                    $PRODUCTO->ID=$ID;
                    $PRODUCTO->NOMBRE=$Nombre;
                    $PRODUCTO->CANTIDAD=$Cantidad;
                    $PRODUCTO->PRECIO=$Precio; 
                    
                    $producto = array($PRODUCTO);

                    // CREAMOS LA COOKIE Y SESSION CARRITO CON EL VALOR DE LA ARRAY poducto
                    setCookie('CARRITO', serialize($producto), time()+604800, "/");                                        

                    $_SESSION['CARRITO'] = $producto;

                    $mensaje2 = "Producto agregado al carrito:".'<br/>';                    

                } else {

                    // RECUPERAMOS LA INFORMACION DEL ARRAY DE LA COOKIE
                    $array=unserialize($_COOKIE['CARRITO']); 

                    // GUARDAMOS LOS ID DEL ARRAY PARA INTRODUCIR EL MISMO PRODUCTO DOS VECES
                    $idProductos = array_column($array, 'ID');

                    if (in_array($ID, $idProductos)) {

                        echo '<script>alert("El producto ya ha sido seleccionado");</script>';
                        
                    } else {

                        $productos=unserialize($_COOKIE['CARRITO']);

                        // CREAMOS UN NUEVO OBJETO CON LOS NUEVOS DATOS
                        $PRODUCTO = new stdClass(); 
                        $PRODUCTO->ID=$ID;
                        $PRODUCTO->NOMBRE=$Nombre;
                        $PRODUCTO->CANTIDAD=$Cantidad;
                        $PRODUCTO->PRECIO=$Precio;                            

                        // Y LO AÑADIMOS AL ARRAY QUE YA EXISTIA
                        array_push($productos,$PRODUCTO);

                        // MACHACAMOS LA COOCKIE Y SESSION CARRITO CON EL ARRAY YA ACTUALIZADO
                        setCookie('CARRITO', serialize($productos), time()+604800, "/");                                                                              
                            
                        $_SESSION['CARRITO'] = $productos;    

                        $mensaje2 = "Producto agregado al carrito:".'<br/>';                        

                    }
                }
                
            break;
            case 'Eliminar':  

                if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {

                    $ID = openssl_decrypt($_POST['id'], COD, KEY);
                    $array = unserialize($_COOKIE['CARRITO']);

                    // TENEMOS QUE ELININAR LA COOKIE POR SI SOLO HAY UN PRODUCTO EN EL CARRITO
                    setcookie('CARRITO',serialize($array),time()-1,"/");

                    // POR CADA PRODUCTO DENTRO DEL ARRAY SI SE CORRESPONDE CON EL ID ENVIADO SE ELIMINA
                    foreach ($array as $indice => $producto) {
                        if ($producto->ID == $ID) {

                            unset($array[$indice]);  
                            unset($_SESSION['CARRITO'][$indice]); 
                                                     
                            echo '<script>alert("Elemento eliminado.");</script>';
                            header('Location: mostrarCarrito.php');
                            
                        }
                    }
                    // VOLVEMOS A CREAR LA COOKIE SI DESPUES DE ELIMINAR EL PRODUCTO DESEADO SIGUE TENIENDO OTROS
                    if (!empty($array)) {
                        setcookie('CARRITO',serialize($array),time()+604800,"/");
                    }

                } else {
                    $mensaje .= 'ID incorrecto'.$ID.'<br/>';
                }
            break;            
        }
    }
 
?>