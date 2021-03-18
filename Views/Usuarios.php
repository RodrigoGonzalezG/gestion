<?php
session_start();

include("../php/Conexion.php");
$mysqli = getConnSec();
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
                    <span id="color2" class="breadcrumb-item active">Catalogo de usuarios</span>
                </ol>
                <?php if($_SESSION['Tipo'] == "Administrador"){ ?>
                <div class="breadcrumb">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#NuevoArea">
                            Agregar usuario
                        </button>
                    </div>
                </div>
                <?php }?>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Concentrado de usuarios</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="TablaArea" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre del usuario</th>
                                        <th>Nickname</th>
                                        <th>Password</th>
                                        <th>Correo</th>
                                        <th>Tipo de usuario</th>
                                        <?php if($_SESSION['Tipo'] == "Administrador"){ ?>
                                        <th>Editar</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($mysqli,"select * from cat_usuario");
                                            while($row = mysqli_fetch_array($result))
                                            {
                                            echo "<tr>";
                                                echo "<td>" . $row['Nombre'] . "</td>";
                                                echo "<td>" . $row['UserName'] . "</td>";
                                                echo "<td>" . $row['Password'] . "</td>";
                                                echo "<td>" . $row['correo'] . "</td>";
                                                echo "<td>" . $row['TipoUser'] . "</td>";
                                                if($_SESSION['Tipo'] == "Administrador"){ 
                                                echo "<td><button type='button' onclick='Editar_user(this.id)' id='".$row['idUsuario']."' data-toggle='modal' data-target='#EditarUser'><i class='far fa-edit'></i></button></td>";
                                                    
                                                }
                                                echo "</tr>";
                                            }
                                            echo "
                                        </table>
                                    </div>";
                                    ?>
                                </tbody>
                            </table>
                        </div>
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


    <div class="modal fade" id="NuevoArea">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="color2">Agregar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="FormularioGuardarUs" name="FormularioGuardar" method="POST">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label" id="color2">Nombre de la persona</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-text-input" name="NPersona" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Nickname</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-search-input" name="NAlias" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Password</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-search-input" name="Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Correo</label>
                            <div class="col-10">
                                <input class="form-control" type="correo" id="example-search-input" name="Correo" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Area</label>
                            <div class="col-10">
                                 <select class="form-control" name="Area">
                                    <?php
                                $Query=mysqli_query(getConnSec(),"SELECT * FROM cat_area where Activo = 'Si'");
                                while ($Result=mysqli_fetch_array($Query)) {
                                echo '<option value='.$Result['IdArea'].'>'.$Result['NombreArea'].'</option>';
                                }
                                ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Tipo de usuario</label>
                            <div class="col-10">
                                <select class="form-control" name="TipoU">
                                <option value="Administrador">Administrador</option>
                                <option value="Captura">Captura</option>
                                <option value="Consulta">Consulta</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Activo</label>
                            <div class="col-1 text-left">
                                <input class="form-control" type="checkbox" id="example-search-input" name="Activo" required>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="button" id="Btn_guardarUs" class="btn btn-success">Guardar</button>
                        </div><br>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="EditarUser">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="color2">Editar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="FormularioEditarUser" method="POST">
                    <div class="modal-body" id="Editar_informacion">

                    </div><br>
                    <div class="text-center">
                        <button type="button" id="Btn_EditarUser" class="btn btn-success">Guardar</button>
                    </div><br>
                </form>

            </div>
        </div>
    </div>



    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../js/sb-admin.js"></script>

</body>

</html>
