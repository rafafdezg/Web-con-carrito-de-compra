<?php 
include 'templates/cabecera.php';    
?>
<div class="container mt-5">
<!-- SI EXISTE LA COOKIE CARRITO MOSTRAMOS LOS PRODUCTOS SEGUN SUS DATOS SINO UTLIZAMOS LOS DATOS DE SESSION -->
<h3 class="text-center text-light">LISTA DE CARRITO</h3>
<?php if(!empty($_COOKIE['CARRITO'])) { ?>
<table class="table table-bordered bg-light">
    <thead>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
    <?php if (isset($_COOKIE['CARRITO'])) { ?>
        <?php $total = 0;?>
        <?php $array = unserialize($_COOKIE['CARRITO']); ?>
        <?php foreach($array as $indice => $producto){ ?>
        <tr>
            <td width="40%"><?= $producto->NOMBRE ?></td>
            <td width="15%" class="text-center"><?= $producto->CANTIDAD ?></td>
            <td width="20%" class="text-center"><?= $producto->PRECIO ?> €</td>
            <td width="20%" class="text-center"><?= number_format($producto->CANTIDAD  * $producto->PRECIO, 2); ?> €</td>
            <td width="5%">
                <form action="" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= openssl_encrypt($producto->ID, COD, KEY) ?>">
                    <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php $total = $total + ($producto->CANTIDAD  * $producto->PRECIO);?>
        <?php } ?>
    <?php } elseif (isset($_SESSION['CARRITO'])) {?>
        <?php $total = 0;?>
        <?php foreach($_SESSION['CARRITO'] as $indice => $producto) { ?>
        <tr>
            <td width="40%"><?= $producto->NOMBRE ?></td>
            <td width="15%" class="text-center"><?= $producto->CANTIDAD ?></td>
            <td width="20%" class="text-center"><?= $producto->PRECIO ?> €</td>
            <td width="20%" class="text-center"><?= number_format($producto->CANTIDAD  * $producto->PRECIO, 2); ?> €</td>
            <td width="5%">
                <form action="" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= openssl_encrypt($producto->ID, COD, KEY) ?>">
                    <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php $total = $total + ($producto->CANTIDAD  * $producto->PRECIO);?>
        <?php } ?>
    <?php } ?>   
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-right"><h3>Total</h3></td>
            <td class="text-center"><h3><?php echo number_format($total, 2); ?> €</h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
            <?php if(!empty($_SESSION['USER'])) { ?>
                <form action="pagar.php" method="post">
                    <div class="alert alert-success" role="alert">                    
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label pl-4">Usuario:</label>
                            <div class="col-sm-10">
                                <input readonly class="form-control-plaintext" type="text" name="username" id="username" value=
                                '<?php echo $login_username ?>' required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direction" class="col-sm-2 col-form-label pl-4">Dirección de envio:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="direction" id="direction" value=
                                '<?php echo $login_direc ?>' required>
                            </div>
                        </div>
                        <input type="hidden" name="uid" id="uid" value="<?php echo $login_UID ?>">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">
                        Hacer pedido >>
                        </button>
                    </div>                          
                </form>
                <?php } else { ?>
                    <div class="alert alert-info" role="alert">
                        Debe registrarse para hacer un pedido.
                    </div>
                <?php } ?>   
            </td>
        </tr>
    </tfoot>
</table>

<?php } else { ?>
    <div class="alert alert-info" role="alert">
        No hay productos en el carrito.
    </div>
<?php } ?>

<?php 
include "templates/pie.php"; 
?>