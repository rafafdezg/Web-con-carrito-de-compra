<?php
include 'templates/cabecera.php';
?>

	<div class="container mt-5">
		<div class="container bg-light">
			<header class="">
				<h2 class="text-center p-2">Zona de Usuarios</h2>
			</header>

			<div class="m-3">
			<p class="h5">Bienvenido: <b><?php echo $login_username.' - '.$login_email; ?></b>			
			</div>

			<div class="border border-primary m-3">
				<p class="text-center pt-3">CONTENIDO</p>
				
			</div>
			<br>
			
	</div>
</body>
</html>

<?php
include 'templates/pie.php';
?>