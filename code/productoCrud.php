<?php
// FUNCIONES CON CONSULTAS 
class productoCrud {
        
		public function __construct(){}
        
		public function insertar ($producto){
			try {
				// INICIAMOS LA CONEXION CON BD 
                $pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root');
				$pdo->setAttribute(PDO ::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// PREPARAMOS LA CONSULTA
				$insertar = $pdo->prepare("INSERT INTO `tblproductos`(`ID`, `Nombre`, `Autor`, `Precio`, `Descripcion`, `Imagen`) 
										   VALUES ('', :nombre, :autor, :precio, :descripcion, :imagen);");
				// PREPARAMOS LOS DATOS						   
                $insertar->bindValue('nombre',$producto->getNombre());
                $insertar->bindValue('autor',$producto->getAutor());
				$insertar->bindValue('precio',$producto->getPrecio());
				$insertar->bindValue('descripcion',$producto->getDescripcion());
				$insertar->bindValue('imagen',$producto->getImg());
				// EJECUTAMOS LA CONSULTA
				$insertar->execute();
				// EN CASO DE FALLO CON LA CONSULTA SALTARÁ EL CATCH
			} catch (PDOException $e) {
				print "Error: " . $e->getMessage() . "<br/>";				
			}
		}

		public function modificar ($producto){
			try {
				$pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root');
				$pdo->setAttribute(PDO ::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$modificar = $pdo->prepare("UPDATE `tblproductos` SET Nombre=:nombre, Precio=:precio, Autor=:autor, 
											 Descripcion=:descripcion, Imagen=:imagen WHERE ID=:id;");
											 
				$modificar->bindValue('id',$producto->getID());
                $modificar->bindValue('nombre',$producto->getNombre());
                $modificar->bindValue('autor',$producto->getAutor());
				$modificar->bindValue('precio',$producto->getPrecio());
				$modificar->bindValue('descripcion',$producto->getDescripcion());
				$modificar->bindValue('imagen',$producto->getImg());

				$modificar->execute();

			}catch (PDOException $e) {
				print "Error: " . $e->getMessage() . "<br/>";				
			}
        }
        
		public function eliminar ($id){
			try {
				$pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root');
				$pdo->setAttribute(PDO ::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$eliminar = $pdo->prepare("DELETE FROM `tblproductos` WHERE id=:id;");
				$eliminar->bindValue('id',$id);

				$eliminar->execute();

			}catch (PDOException $e) {
				print "Error: " . $e->getMessage() . "<br/>";				
			}
		}
	}
?>