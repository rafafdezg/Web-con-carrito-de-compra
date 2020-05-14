<?php
// INCLUIMOS LA CLASE PRODUCTO CON SUS FUNCIONES
require_once('productoCrud.php');
require_once('producto.php');

// CREAMOS UN NUEVO OBJETO
$funcion = new productoCrud();
$producto = new Producto(); 
	
	if (isset($_POST['adInsertar'])) {
		// COMPROBAMOS LOS DATOS NUMERICOS
		if (is_numeric($_POST['inputPrecio'])) {
		// INSERTAMOS LOS DATOS EN EL OBJETO CON LA FUNCION SET
		$producto->setNombre($_POST['inputNombre']);
		$producto->setAutor($_POST['inputAutor']);
		$producto->setPrecio($_POST['inputPrecio']);
        $producto->setDescripcion($_POST['inputDescripcion']);
		$producto->setImg($_POST['inputImagen']);
		// UNA VEZ INTRODUCIMOS LOS DATOS ENVIAMOS EL OBJETO PRODUCTO A LA FUNCION INSERTAR DEL CRUD
		$funcion->insertar($producto);
		//VOLVEMOS A LA PAG. DEL ADMINISTRADOR
		header('Location: ../adminWEB.php');

		} else {
			echo '<script>alert("Introduzca valores correctos");</script>'; 
			header('Location: ../adminWEB.php');
		}
    }
	
	if (isset($_POST['adModificar'])) {

		if (is_numeric($_POST['inputID']) and is_numeric($_POST['inputPrecio'])) {

		$producto->setId($_POST['inputID']);
		$producto->setNombre($_POST['inputNombre']);
		$producto->setAutor($_POST['inputAutor']);
		$producto->setPrecio($_POST['inputPrecio']);
		$producto->setDescripcion($_POST['inputDescripcion']);
		$producto->setImg($_POST['inputImagen']);

		$funcion->modificar($producto);

		header('Location: ../adminWEB.php');

		} else {
			echo '<script>alert("Introduzca valores correctos");</script>'; 
			header('Location: ../adminWEB.php');
		}
    }	
	
	if (isset($_POST['adEliminar'])) {

		if (is_numeric($_POST['inputID'])) {

		$funcion->eliminar($_POST['inputID']);
		
		header('Location: ../adminWEB.php');

		} else {
			echo '<script>alert("Introduzca valores correctos");</script>'; 
			header('Location: ../adminWEB.php');
		}
    }		
	 
    
?>