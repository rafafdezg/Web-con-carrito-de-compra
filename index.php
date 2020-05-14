<?php
include 'templates/cabecera.php';

?>
<!-- SI EXISTE ALGUN MENSAJE DE CARRITO LO MOSTRAMOS -->
    <div class="container mt-5">
        <?php if($mensaje != "") { ?>
            <div class="alert alert-info" role="alert">
                <h6>Su carrito de compra - <a href="mostrarCarrito.php" class="badge badge-success">VER CARRITO</a></h6>
                <?php echo $mensaje2; ?>
                <?php echo $mensaje; ?>                
                <!-- <?php echo $mensaje3; ?> -->
            </div>
        <?php } ?>  

            <div class="row">
            <?php 
                // SENTENCIA PARA RECUPERAR LOS DATOS DESDE LA BASE DE DATOS Y PODER MOSTRARLOS 
                $statement = $pdo->prepare("SELECT * FROM tblproductos");
                $statement->execute();
                $listaProductos = $statement->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listaProductos);
            ?>
            <?php foreach($listaProductos as $producto){ ?>

                <div class="col-sm-12 col-md-6 col-lg-3 mt-2">
                    <div class="card">                    
                        <img class="card-img-top cardH" 
                        title="<?php echo $producto['Nombre']; ?>" 
                        alt="<?php echo $producto['Nombre']; ?>" 
                        src="<?php echo $producto['Imagen']; ?>" 
                        data-toggle="popover"
                        data-trigger="hover"
                        data-content="<?php echo $producto['Descripcion'] ?>"                
                        >
                        <div class="card-body">
                            <h5 style="height: 50px;"><?php echo $producto['Nombre']; ?></h5>
                            <p class="card-text"><?php echo $producto['Autor']; ?></p>
                            <h5 class="card-title mt-2"><?php echo $producto['Precio']; ?></h5>                           

                            <form method="POST" action="">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], COD, KEY); ?>">
                                <div class="row"><div class="col-5">Cantidad: </div> <input class="col-3 p-0 text-center" type="number" name="cantidad" id="cantidad" min="1" value="1"></div>
                                <button class="btn btn-primary mt-3" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                            </form>
                            
                        </div>
                    </div>
                </div>

            <?php } ?>                
                
            </div>
        </div>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>
    
<?php
include 'templates/pie.php'; 
?>