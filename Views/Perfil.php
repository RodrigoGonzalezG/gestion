<?php
session_start();
include("../php/Conexion.php");
$mysqli = getConnSec();
$dato = $_SESSION['Id_usuario'];
$query = "Select * from cat_usuario where idUsuario = '$dato'";
$result = $mysqli->query($query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if (!$_SESSION['Usuario']) {
	header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Control de turnos</title>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/Operaciones.js"></script>
    <style>
        #color2:hover {color: #1bb600;}
    </style>
</head>

<body id="page-top">


    <?php
        include("../php/Nav.php");
        ?>

    <div id="wrapper">

        <?php
        include("../php/Opciones.php");
        ?>

        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <span id="color2">Dashboard</span>
                    </li>
                    <span id="color2" class="breadcrumb-item active">Perfil de usuario</span>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Perfil de usuario</div>
                    <div class="card-body">
                        <form id="FormularioGuardar" name="FormularioGuardar" method="POST" action="../php/Editar_usuario.php">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label" id="color2">Nombre de la persona</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" id="example-text-input" name="NPersona" value="<?php echo $row["Nombre"];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label" id="color2">Nickname</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" id="example-text-input" name="NUsuario" value="<?php echo $row["UserName"];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label" id="color2">Password</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" id="example-text-input" name="NPassword" value="<?php echo $row["Password"];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label" id="color2">Correo</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" id="example-text-input" name="NCorreo" value="<?php echo $row["correo"];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label" id="color2">Tipo de usuario</label>
                                <div class="col-10">
                                    <select class="form-control" name="TUsuario">
                                    <option value="<?php echo $row["TipoUser"];?>"><?php echo $row["TipoUser"];?></option>
                                    <option>Administrador</option>    
                                    <option>Captura</option>    
                                    </select>
                                </div>
                            </div><br>
                <?php if($_SESSION['Tipo'] == "Administrador"){ ?>
                            <div class="form-group text-center">
                                <div class="col-10">
                                    <button type="submit" id="Btn_guardar" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm-10">
                            <img style="width:20%;padding:0%;" src="Imgs/gcdmx.png">
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../js/sb-admin.js"></script>

</body>

</html>
