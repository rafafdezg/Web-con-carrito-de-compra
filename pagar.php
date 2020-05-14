<?php
include 'templates/cabecera.php';
include 'code/pedido.php';
?>
<div class="container mt-5">
<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR"></script>
<div class="jumbotron">
    <div>
        <h4 class="text-center">RESUMEN DE PEDIDO</h4> 
        <h6 class="ml-3">Código pedido:<small class="lead"> <?= $CODP ?> </small></h6> 
        <h6 class="ml-3">Usuario:<small class="lead"> <?= $username ?> </small></h6> 
        <h6 class="ml-3">Dirección:<small class="lead"> <?= $direccionP ?> </small></h6>
        <h6 class="ml-3">Email:<small class="lead"> <?= $login_email ?> </small></h6>
        <h6 class="ml-3">Telefono:<small class="lead"> <?= $login_tel ?> </small></h6>
        <table class="table table-bordered bg-light">
            <thead>        
                <tr>
                    <th width="40%">Descripcion</th>
                    <th width="15%" class="text-center">Cantidad</th>
                    <th width="20%" class="text-center">Precio</th>
                    <th width="20%" class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
        <!-- SI EXISTE LA COOKIE CARRITO MOSTRAMOS LOS PRODUCTOS SEGUN SUS DATOS SINO UTLIZAMOS LOS DATOS DE SESSION -->
            <?php if (isset($_COOKIE['CARRITO'])) { ?>                
                <?php $array = unserialize($_COOKIE['CARRITO']); ?>
                <?php foreach($array as $indice => $producto) { ?>
                <tr>
                    <td width="40%"><?= $producto->NOMBRE ?></td>
                    <td width="15%" class="text-center"><?= $producto->CANTIDAD ?></td>
                    <td width="20%" class="text-center"><?= $producto->PRECIO ?> €</td>
                    <td width="20%" class="text-center"><?= number_format($producto->CANTIDAD  * $producto->PRECIO, 2); ?> €</td>
                </tr>                
                <?php } ?>   
            <?php } else { ?>  
                <?php foreach($_SESSION['CARRITO'] as $indice => $producto) { ?>
                    <tr>
                        <td width="40%"><?= $producto['NOMBRE'] ?></td>
                        <td width="15%" class="text-center"><?= $producto['CANTIDAD'] ?></td>
                        <td width="20%" class="text-center"><?= $producto['PRECIO'] ?> €</td>
                        <td width="20%" class="text-center"><?= number_format($producto['CANTIDAD'] * $producto['PRECIO'], 2); ?> €</td>
                    </tr>
                    <?php $total ?>
                <?php } ?>
            <?php } ?>   
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <h1 class="display-4">¡Paso Final!</h1>
        
        <p class="lead">Estas a punto de pagar con Paypal la cantidad de:
            <h3 class="mb-4"> <?php echo number_format($total, 2)." €"; ?></h3>
            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>
        </p>
    </div>
    <!-- SCRIPT PARA EL PAGO POR PAYPAL -->
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            style: {
                layout: 'horizontal',
                size: 'responsive',
                height: 50,                
            },
            /* SERVER OPTIONS
            // Set up the transaction
            createOrder: function(data, actions) {
                return fetch('/demo/checkout/api/paypal/order/create/', {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(data) {
                    return data.orderID;
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
            */
        }).render('#paypal-button-container');
    </script>
</div>

<?php
include 'templates/pie.php'; 
?>