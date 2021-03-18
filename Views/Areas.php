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
        #color2:hover {
            color: #1bb600;
        }

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
                    <span id="color2" class="breadcrumb-item active">Catalogo de areas</span>
                </ol>
                <?php if($_SESSION['Tipo'] == "Administrador"){ ?>
                <div class="breadcrumb">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#NuevoArea">
                            Agregar Area
                        </button>
                    </div>
                </div>
                <?php }?>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Concentrado de Areas</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="TablaArea" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small font-weight-bold">Nombre del Area</th>
                                        <th class="small font-weight-bold text-center">Activo</th>
                                        <?php if($_SESSION['Tipo'] == "Administrador"){ ?>
                                        <th class="small font-weight-bold text-center">Ver</th>
                                        <th class="small font-weight-bold text-center">Nuevo</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $Color ="";
                                    $result = mysqli_query($mysqli,"select * from cat_area");
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $Color ="";
                                                if($row["Activo"] == "Si"){
                                                    
                                                    $Color = "style='background-color:#239B56;'";
                                                }
                                                
                                            echo "<tr ".$Color.">";
                                                echo "<td class='small font-weight-bold'>" . $row['NombreArea'] . "</td>";
                                                echo "<td class='small font-weight-bold text-center'>" . $row['Activo'] . "</td>";
                                                if($_SESSION['Tipo'] == "Administrador"){ 
                                                echo "<td class='small font-weight-bold text-center'><button type='button' onclick='Editar_area(this.id)' id='".$row['IdArea']."' data-toggle='modal' data-target='#EditarArea'><i class='far fa-edit'></i></button></td>";
                                                echo "<td class='small font-weight-bold text-center'><button type='button' onclick='NuevoResp(this.id)' id='".$row['IdArea']."' data-toggle='modal' data-target='#NuevoResp'><i class='fas fa-folder-plus'></i></button></td>";
                                                    
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
                    <h4 class="modal-title" id="color2">Agregar Area</h4>
                </div>
                <div class="modal-body">
                    <form id="FormularioGuardarArea" name="FormularioGuardar" method="POST">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label" id="color2">Nombre del Area</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-text-input" name="NombreArea" required>
                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <button type="button" id="Btn_guardarArea" class="btn btn-success">Guardar</button>
                        </div><br>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="EditarArea">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="color2">Editar Area</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="FormularioEditarArea" method="POST">
                    <div class="modal-body" id="Editar_informacion">

                    </div><br>
                    <div class="text-center">
                        <button type="button" id="Btn_EditarArea" class="btn btn-success">Guardar</button>
                    </div><br>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="NuevoResp">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="color2">Nuevo responsable de area</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="FormGuardarResp" method="POST">
                    <input class="form-control" type="hidden" id="IdArea" name="IdArea">
                    <div class="modal-body">
                        <label for="example-text-input" class="col-6 col-form-label" id="color2">Nombre del responsable</label>
                        <div class="col-10">
                            <input class="form-control" type="text" id="example-text-input" name="NombreResp" required>
                        </div>
                        <label for="example-text-input" class="col-6 col-form-label" id="color2">Cargo del responsable</label>
                        <div class="col-10">
                            <input class="form-control" type="text" id="example-text-input" name="CargoResp" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" id="Btn_GuardarResp" class="btn btn-success">Guardar</button>
                    </div><br>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
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
