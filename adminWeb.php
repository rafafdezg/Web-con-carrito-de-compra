<?php
include 'templates/cabecera.php';

require_once('code/productoCrud.php');
require_once('code/producto.php');

$crud= new productoCrud();
$producto=new Producto();

?>
<button class="btn btn-info container-fluid" type="button" data-toggle="modal" data-target="#ModalInsertar-modal-xl">INSERTAR</button>
<!-- MODAL INSERTAR -->
<div class="modal fade" id="ModalInsertar-modal-xl" tabindex="-1" role="dialog" aria-labelledby="ModalInsertarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalInsertarTitle">Añadir libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="code/administraProducto.php" method = "POST">
                        <div class="form-group row">
                            <label for="inputNombre" class="col-1 col-form-label">Titulo:</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="inputNombre" name="inputNombre" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAutor" class="col-1 col-form-label">Autor:</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="inputAutor" name="inputAutor" required>
                            </div>
						</div>
						<div class="form-group row">
                            <label for="inputPrecio" class="col-1 col-form-label">Precio:</label>
                            <div class="col-11">
                                <input type="number" step="any" class="form-control" id="inputPrecio" name="inputPrecio" required>
                            </div>
						</div>
						<div class="form-group row">
                            <label for="inputImagen" class="col-1 col-form-label">Imagen:</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="inputImagen" name="inputImagen" required>
                            </div>
						</div>
						<div class="form-group">
							<label for="inputDescripcion">Descripción</label>
							<textarea class="form-control" id="inputDescripcion" rows="6" name="inputDescripcion" required></textarea>
						</div>
                        <input class="btn btn-success mt-2" name="adInsertar" type="submit" value="INSERTAR">
                    </form>
                </div>                                
            </div>
        </div>
</div>

<button class="btn btn-warning container-fluid mt-1" type="button" data-toggle="modal" data-target="#ModalModificar-modal-xl"> MODIFICAR </button>
<!-- MODAL MODIFICAR -->
<div class="modal fade" id="ModalModificar-modal-xl" tabindex="-1" role="dialog" aria-labelledby="ModalModificarTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalModificarTitle">Modificar libro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="code/administraProducto.php" method = "POST">
					<div class="form-group row">
						<label for="inputID" class="col-1 col-form-label">ID:</label>
						<div class="col-11">
							<input type="text" class="form-control" id="inputID" name="inputID" value="Inserte el ID del libro que desea modificar." required>
							</div>
						</div>
					<div class="form-group row">
						<label for="inputNombre" class="col-1 col-form-label">Titulo:</label>
						<div class="col-11">
							<input type="text" class="form-control" id="inputNombre" name="inputNombre" required>
						</div>
					</div>														
					<div class="form-group row">
						<label for="inputAutor" class="col-1 col-form-label">Autor:</label>
						<div class="col-11">
							<input type="text" class="form-control" id="inputAutor" name="inputAutor" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPrecio" class="col-1 col-form-label">Precio:</label>
						<div class="col-11">
							<input type="number" step="any" class="form-control" id="inputPrecio" name="inputPrecio" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputImagen" class="col-1 col-form-label">Imagen:</label>
						<div class="col-11">
							<input type="text" class="form-control" id="inputImagen" name="inputImagen" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputDescripcion">Descripción</label>
							<textarea class="form-control" id="inputDescripcion" rows="6" name="inputDescripcion" required></textarea>
					</div>
					<input class="btn btn-success mt-2" name="adModificar" type="submit" value="MODIFICAR">
				</form>
			</div>                                
		</div>
	</div>
</div>

	<div class="container-fluid bg-white mt-2">	
		<div class="row">
			<?php
				// SENTENCIA PARA RECUPERAR LOS DATOS DESDE LA BASE DE DATOS Y PODER MOSTRARLOS 
                $statement = $pdo->prepare("SELECT * FROM tblproductos");
                $statement->execute();
                $listaProductos = $statement->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listaProductos);
            ?>
            <?php foreach($listaProductos as $producto){ ?>

                <div class="col-sm-12 col-md-12 col-lg-6 mt-2">
					<div class="row">
						<div class="col-5">                     
							<img class="card-img-top cardH" 
								title="<?php echo $producto['Nombre']; ?>" 
								alt="<?php echo $producto['Nombre']; ?>" 
								src="<?php echo $producto['Imagen']; ?>"                
							>
							<div class="card-body">
								<h5 class="card-title mt-2">ID: <span class="text-muted"><?php echo $producto['ID']; ?></span></h5>
								<h5><?php echo $producto['Nombre']; ?></h5>
								<p class="card-text"><?php echo $producto['Autor']; ?></p>
								<h5 class="card-title mt-2"><?php echo $producto['Precio']; ?></h5>                    
                        		<form action="code/administraProducto.php" method="POST">
									<input type="hidden" name="inputID" id="inputID" value="<?php echo $producto['ID']; ?>">
									<button class="btn btn-danger container mt-2" name="adEliminar" type="submit" value="ELIMINAR">ELIMINAR</button>
								</form>						
							</div>
						</div>
						<div class="col-6 ml-1 border">
							<h6 class="pt-2">Descripción:</h6>
							<p class="text-justify"><?php echo $producto['Descripcion'] ?></p>								
						</div>
					</div>						
				</div>            
			<?php } ?>
		</div>
	</div>			
</body>
</html>

<?php
include 'templates/pie.php';
?>