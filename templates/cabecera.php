<?php
include 'code/carrito.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="whit=decive-width, inicial-scale=1.0">
        <title>Tienda</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/custom.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">RFG</a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="fa fa-home fa-lg"></i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="mostrarCarrito.php" tabindex="-1" aria-disabled="true">
                            <i class="fa fa-shopping-cart fa-lg"></i>  
                        <!-- SI EXISTE LA COOKIE CARRITO MOSTRAMOS EL COUNT SEGUN SUS DATOS SINO UTLIZAMOS LOS DATOS DE SESSION -->                                                     
                            <span>(
                            <?php
                            if (isset($_COOKIE['CARRITO'])) {                                
                                $array = unserialize($_COOKIE['CARRITO']);
                                $numP=count($array);
                                echo $numP;
                            } else {
                                echo (empty($_SESSION['CARRITO']) ? 0 : count($_SESSION['CARRITO']));        
                            } ?>
                            )</span>                        
                        </a>
                    </li>
                </ul>
                    
                    <?php if(!empty($_SESSION['USER'])) { ?>
                        <div class="dropdown float-right">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $login_username ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="dropdownMenuButton">
                                <?php if($_SESSION['ROL'] == 'Admin0') { ?>                       
                                <a class="dropdown-item text-primary" href="adminWeb.php">ADMINISTRAR</a>
                                <a class="dropdown-item" href="global/logout.php"><i class='fa fa-power-off' style='color:red'></i></a>
                                <?php } ?> 
                                <?php if($_SESSION['ROL'] == 'Usu1') { ?>                       
                                <a class="dropdown-item text-primary" href="profile.php">PROFILE</a>
                                <a class="dropdown-item" href="global/logout.php"><i class='fa fa-power-off' style='color:red'></i></a>
                                <?php } ?>                                
                            </div>
                        </div>
                    <?php } else {?>
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalLogin">LOGIN</button>
                        <button class="btn btn-warning ml-2" type="button" data-toggle="modal" data-target="#ModalRegister">Registro</button>
                    <?php } ?>                
                    
                    <!-- MODAL LOGIN -->
                    <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="ModalRegisterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLoginTitle">Acceder a Zona de Usuarios</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="code/login.php" method = "post">
                                        <div class="form-group row">
                                            <label for="inputUser" class="col-5 col-form-label">Usuario:</label>
                                            <div class="col-7">
                                                <input type="text" class="form-control" id="inputUser" name="inputUser" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-5 col-form-label">Contraseña:</label>
                                            <div class="col-7">
                                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-warning ml-2" type="button" data-toggle="modal" data-target="#ModalRegister">Registro</button>
                                            <input class="btn btn-success" name = "submit" type = "submit" value = "Aceptar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL REGISTRO -->
                    <div class="modal fade" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="ModalRegisterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalRegisterTitle">Fomulario Registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="code/registro.php" method = "POST">
                                        <div class="form-group row">
                                            <label for="inputMail" class="col-3 col-form-label">Email:</label>
                                            <div class="col-9">
                                                <input type="email" class="form-control" id="inputMail" name="inputMail" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputUser" class="col-3 col-form-label">Usuario:</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="inputUser" name="inputUser" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-3 col-form-label">Contraseña:</label>
                                            <div class="col-9">
                                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" maxlength="8" minlength="4" placeholder="Debe contener entre 4 y 8 dígitos" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputDirec" class="col-3 col-form-label">Dirección:</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="inputDirec" name="inputDirec" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputTel" class="col-3 col-form-label">Teléfono:</label>
                                            <div class="col-4">
                                                <input type="tel" class="form-control" id="inputTel" name="inputTel" maxlength="9" minlength="9" placeholder="9 dígitos" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAge" class="col-3 col-form-label">Fecha Nacimiento:</label>
                                            <div class="col-4">
                                                <input type="date" class="form-control" id="inputAge" name="inputAge" required>
                                            </div>
                                        </div>
                                        <input class="btn btn-success mt-2" name = "submit" type = "submit" value = "REGISTRAR">
                                    </form>
                                </div>                                
                            </div>
                        </div>
                    </div>                             
                
            </div>
        </nav>
        <br>
        