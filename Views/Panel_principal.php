<?php
include("../php/Conexion.php");
$mysqli = getConnSec();
session_start();
ini_set('date.timezone', 'America/Mexico_City');
                $fecha_local = date('Y-m-d');
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
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

    <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/Operaciones.js"></script>
    <script src="../js/Validar/js/jquery.form.js" type="text/javascript"></script>
    <script src="../js/Validar/js/jquery.validate.js" type="text/javascript"></script>
    <!-- Este if es para que solo aparezca la información del semaforo de fechas de los turnos una sola vez.-->
    <?php if($_SESSION['Mensaje'] === "Si") : ?>
        <script>
            $(document).on('ready', function() {
                $("#Simbologia").modal("show");
            });

        </script>
    <?php $_SESSION['Mensaje'] = "No";  endif; ?>
    <style>
        #color2:hover {
            color: #1bb600;
        }

        #color {
            background-color: #1bb600;
        }

        .loading {
            text-align: center;
            width: 800px;
        }


    </style>
</head>

<body id="page-top" class="sidebar-toggled">

    <?php
        include("../php/Nav.php");
    ?>
    <div id="wrapper">
    <?php
        include("../php/Opciones.php");
    ?>

        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="text-center">
                    <?php echo "<h3 class='text-center'>Area: " .$_SESSION['NArea'];?>
                </ol>
                <!-- Este if se usa para que solo aparezcan estas opciones al usuario administrador-->
                <?php if($_SESSION['Tipo'] == "Administrador"){ ?>
                <div class="breadcrumb">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#NuevoReporte" onclick="SumarFolio();">
                            Nuevo turno
                        </button>
                        <div class="ml-2 input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-folder-open"></i></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#NuevoReporteAnyoOtro">
                            Agregar turno de otro año
                        </button>
                    </div>
                </div>
                <?php } ?>


                <div class="card mb-2">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Concentrado general <?php ?>
                    </div>
                    <br>
                    <div class="border">
                        <form method="POST" name="Filtro" id="Filtro">
                            <div class="row">

                                <div class="col-1">
                                    <input class=" mt-2 form-control" type="checkbox" name="OPC" value="Opc1" onclick="Cambiar2();">
                                </div>
                                <div class="col-3" id="color2">
                                    <label class="small font-weight-bold mt-2">Volante (1,2,3)</label>
                                </div>
                                <div class="col-1">
                                    <input class=" mt-2 form-control" type="checkbox" name="OPC" value="Opc2" onclick="Cambiar2();">
                                </div>
                                <div class="col-3" id="color2">
                                    <label class="small font-weight-bold mt-2">Volante (1-6)</label>
                                </div>
                                <!-- Este if se usa para que estas opciones solo aparezcan al area con id 13 que pertenecen a la oficilia de partes -->
                                <?php if ($_SESSION['Area'] == "13") {?>

                                <div class="col-1">
                                    <input class=" mt-2 form-control" type="checkbox" name="OPC" value="Opc3" onclick="Cambiar();">
                                </div>
                                <div class="col-3" id="color2">
                                    <label class="small font-weight-bold mt-2">Área asignada</label>
                                </div>
                                <?php } ?>

                                <br><br><br>
                            </div>
                            <br>
                            <br>
                            <div class="row" style="display:none;" id="Captura">
                                <div class="col-2 text-center">
                                </div>
                                <div class="col-8 text-center">
                                    <input type="text" class="form-control" name="CapturaRango" placeholder="Capture el rango a buscar">
                                </div>
                                <div class="col-2 text-center">
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="row" id="TurnadoA" style="display:none;">
                                <div class="col-2 text-center">
                                </div>
                                <div class="col-8 text-center">
                                    <select class="form-control" name="CapturaArea">
                                        <!-- Obtiene todas las areas activas de la base de datos -->
                                        <?php
                                            $Query=mysqli_query(getConnSec(),"SELECT * FROM cat_area where Activo ='Si'");
                                            while ($Result=mysqli_fetch_array($Query)) {
                                                echo '<option value='.$Result['IdArea'].'>'.$Result['NombreArea'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-2 text-center">
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4" id="color2">
                                    <select class="form-control" name="anio">
                                        <option>Seleccione el año</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                    </select>
                                </div>
                                <div class="col-4"></div>
                            </div><br><br>
                        </form>
                        <div class="row">
                            <div class="col-4 text-center">
                            </div>
                            <div class="col-4 text-center">
                                <input type="button" class="btn btn-success btn-block" id="BtnFiltro" value="Filtrar">
                            </div>
                            <div class="col-4 text-center">
                            </div>
                        </div>
                    </div><br>

                    <br>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" id="Tablainfo" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small font-weight-bold"># Turno</th>
                                        <th class="small font-weight-bold">Fecha</th>
                                        <th class="small font-weight-bold">Num de oficio</th>
                                        <th class="small font-weight-bold">Folio entrada</th>
                                        <th class="small font-weight-bold">Folio salida</th>
                                        <th class="small font-weight-bold">Estatus</th>
                                        <th class="small font-weight-bold">Fecha limite</th>
                                        <th class="small font-weight-bold">Asunto</th>
                                        <th class="small font-weight-bold">Clasificación</th>
                                        <th class="small font-weight-bold">Remite</th>
                                        <th class="small font-weight-bold">Cargo</th>
                                        <!-- Este if se usa para que la informacion de seguimiento no aparezca al area con id 13 que peretenece a la oficilia de partes -->
                                        <?php if ($_SESSION['Area'] <> "13") { ?>
                                            <th class="small font-weight-bold">Seguimiento</th>
                                        <?php } ?>

                                        <!-- Este if se usa para que estas opciones solo aparezcan al area con id 13 que pertenecen a la oficilia de partes -->
                                        <?php if ($_SESSION['Area'] == "13") { ?>
                                            <th class="small font-weight-bold">Seguimiento</th>
                                            <th class="small font-weight-bold">Respuesta</th>
                                            <th class="small font-weight-bold">Archivo</th>
                                        <?php } ?>
                                        
                                        <th class="small font-weight-bold">Ver</th>
                                        <?php if ($_SESSION['Area'] == "13") { ?>
                                        <th class="small font-weight-bold">Turnar</th>
                                        <?php } ?>
                                        <th class="small font-weight-bold">Adjuntar</th>
                                        <?php if ($_SESSION['Area'] == "13") { ?>
                                        <th class="small font-weight-bold">Imprimir</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody id="InfoFiltro">

                                </tbody>
                            </table>
                        </div>
                        <?php if ($_SESSION['Area'] == "13") { ?>
                        <div class="text-center">
                            <button type="button" class="btn btn-success text-center" onclick="ImpresionPrincipal();"> Imprimir</button>
                        </div>
                        <?php } ?>
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

    <div class="modal fade" id="VerTurno">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Ver información</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="FormularioEditarTurno" method="POST">
                    <div class="modal-body" id="Editar_informacion">

                    </div><br>
                    <div class="text-center">
                        <?php if(($_SESSION['Tipo'] == "Administrador") || ($_SESSION['Tipo'] == "Captura")){ ?>
                        <button type="button" id="Btn_EditarTurno" class="btn btn-success">Guardar</button>
                        <?php } ?>
                        <button type="button" onclick="ImprTurno()" class="btn btn-success">Imprimir</button>
                    </div><br>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Seguimiento">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Registrar seguimiento</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="">
                    <form id="FormSeguimiento" method="POST">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label" id="color2">Seguimiento</label>
                            <div class="col-9">

                                <textarea class="form-control" type="text" id="Seguimiento" name="Seguimiento" rows="5"></textarea>
                                <input type="hidden" class="form-control" id="IdDetalle" name="IdDetalle">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label" id="color2">Fecha</label>
                            <div class="col-9">
                                <input type="date" class="form-control" id="TurnoN" name="Fecha" value="<?php echo $fecha_local;?>">
                            </div>
                        </div>

                    </form>
                    <br>
                    <div class="text-center">
                        <button type="button" id="SeguimientoBtn" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="VerSeguimiento">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Registrar seguimiento</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="">
                    <form id="FormSeguimiento" method="POST">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label" id="color2">Seguimiento</label>
                            <div class="col-9">

                                <textarea class="form-control" type="text" id="Seguimiento" name="Seguimiento" rows="5"></textarea>
                                <input type="hidden" class="form-control" id="IdDetalle" name="IdDetalle">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label" id="color2">Fecha</label>
                            <div class="col-9">
                                <input type="date" class="form-control" id="TurnoN" name="Fecha">
                            </div>
                        </div>

                    </form>
                    <br>
                    <div class="text-center">
                        <button type="button" id="SeguimientoBtn" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="VerTurnoB">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Ver información</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="FormularioEditarTurnob" method="POST">
                    <div class="modal-body" id="Editar_informacionB">

                    </div><br>
                    <div class="text-center">
                        <button type="button" id="Btn_EditarTurnoB" class="btn btn-success">Guardar</button>
                        <button type="button" onclick="ImprTurno()" class="btn btn-success">Imprimir</button>
                    </div><br>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Simbologia">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Simbologia del concentrado general</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="Editar_informacionB">
                    <ul class="list-group">
                        <li class="list-group-item text-center font-weight-bold h3" style="background-color:#90F0B9;">Más de 10 días para vencer y estatus en proceso.</li>
                        <li class="list-group-item text-center font-weight-bold h3" style="background-color:#F4D03F;">Entre 5 y 10 días para vencer y estatus en proceso. </li>
                        <li class="list-group-item text-center font-weight-bold h3" style="background-color:#CD5C5C;">Menos de 5 días para vencer y estatus en proceso.</li>
                        <li class="list-group-item text-center font-weight-bold h3" style="background-color:#239B56;">Cuando el turno tenga el estatus de validado.</li>
                        <li class="list-group-item text-center font-weight-bold h3" style="background-color:#ffffff;">Cuando el turno no tenga fecha limite.</li>
                    </ul>
                </div><br>
            </div>
        </div>
    </div>

    <div class="modal fade" id="TurnarV">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Turnar volante</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="TurnarVolante" method="POST">
                    <div class="modal-body" id="">
                        <table class="table table-bordered table-condensed" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold">Area de destino</th>
                                    <th class="font-weight-bold">Anexo</th>
                                    <th class="font-weight-bold">Observaciones</th>
                                    <th class="font-weight-bold">Seleccióne</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $Contador = 0;
                                    $result = mysqli_query($mysqli,"select * from cat_area where Activo ='Si'");
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            $Contador ++;
                                            $IdArea      = "IdArea" . $Contador;
                                            $PosTurno    = "Turnado".$Contador;
                                            $Anexo       = "Anexo" .$Contador;
                                            $Obs         = "Obs" .$Contador;
                                            echo "<tr> <td class='small font-weight-bold'>" .$row['NombreArea']. "</td>
                                            <td class='text-center'><input type='text' class='small' name='" . $Anexo . "'></td>
                                            <td class='text-center'><input type='text' class='small' name='" . $Obs . "'></td>
                                            <td class='text-center'><input type='checkbox' class='form-check-input' name='".$PosTurno."'></td>
                                            <input type='hidden' class='form-check-input' value=".$row['IdArea']." name='".$IdArea."'>";
                                        }
                                            echo "<input name='NumTurno' id='NumTurno' type='hidden'>
                                                  <input type='hidden' value='".$Contador."' name='CantArea'>";
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <button type="button" id="Btn_Turnar" class="btn btn-success">Guardar</button>
                    </div><br>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="AdjuntarV">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Adjuntar archivo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="">
                    <form id="AOrigen" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label" id="color2">Seleccióne archivo</label>
                            <div class="col-9">
                                <input type="file" class="form-control" id="archivoImage" name="archivoImage">
                                <input type="hidden" class="form-control" id="ArchivoTurno" name="ArchivoTurno">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-3 col-form-label" id="color2">Tipo de archivo</label>
                            <div class="col-9">
                                <select class="form-control" name="ATipo" id="ATipo">
                                    <?php if ($_SESSION['Area'] == "13") { ?>
                                    <option value="O">Archivo de origen</option>
                                    <?php } ?>
                                    <option value="R">Archivo de respuesta</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="text-center">
                        <button type="button" onclick="uploadAjax()" class="btn btn-success">Guardar</button>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <div class="modal fade" id="NuevoReporte">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="color2">Nuevo turno</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="TurnadoVolante" method="POST">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label" id="color2">Numero de turno</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TNumero" name="TNumero" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Fecha que se registro</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFRegistro" name="TFRegistro" value="<?php echo $fecha_local;?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha limite</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFLimite" name="TFLimite">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha recepción</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFRecepecion" name="TFRecepecion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha referencia</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFReferencia" name="TFReferencia">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Oficio/Referencia</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TNumeroO" name="TNumeroO">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-url-input" id="color2" class="col-2 col-form-label">Tipo de atención</label>
                            <div class="col-10">
                                <select class="form-control" name="TAtencion">
                                    <?php
                                $Query=mysqli_query(getConnSec(),"SELECT * FROM cat_atencion");
                                while ($Result=mysqli_fetch_array($Query)) {
                                echo '<option value='.$Result['IdAtencion'].'>'.$Result['TipoAtencion'].'</option>';
                                }
                                ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG entrada</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TVE" name="TVE">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG salida</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TVS" name="TVS">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Tipo </label>
                            <div class="col-10">
                                <select class="form-control" name="TTipo">
                                    <option value="Normal">Normal</option>
                                    <option value="Urgente">Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Clasificación </label>
                            <div class="col-10">
                                <select class="form-control" name="Clasificacion">
                                    <option value="Normal">Normal</option>
                                    <option value="AP">AP</option>
                                    <option value="Presidencia">Presidencia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Firmado por </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TFirmado" name="TFirmado">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Cargo </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TPDA" name="TPDA">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Alcaldia/Unidad Administrativa </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TRUA" name="TRUA">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Destinatario</label>
                            <div class="col-10">
                                <select class="form-control" name="Destinatario">
                                    <?php
                                        $Query=mysqli_query(getConnSec(),"SELECT * FROM responsable_area where Activo = '1'");
                                            while ($Result=mysqli_fetch_array($Query)) {
                                            echo '<option value='.$Result['IdResponsable'].'>'.$Result['NombreResponsable'].'</option>';
                                                                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Validado</label>
                            <div class="col-10">
                                <select class="form-control" name="Validado">
                                    <option value="En proceso">En proceso</option>
                                    <option value="Validado">Validado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Asunto</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="TAsunto" name="TAsunto" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Otro tipo de atención</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="TTAtencion" name="TTAtencion" rows="5"></textarea>
                            </div>
                        </div>
                        <hr>

                        <center>
                            <h1 id="color2">Turnar a</h1>
                        </center>
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-center">Area de destino</th>
                                        <th class="font-weight-bold text-center">Observaciones</th>
                                        <th class="font-weight-bold text-center">Anexo</th>
                                        <th class="font-weight-bold text-center">Turnar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $Contador = 0;
                                    $result = mysqli_query($mysqli,"select * from cat_area where Activo ='Si' and IdArea <> 13");
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                    $Contador ++;
                                                    $IdArea      = "IdArea" . $Contador;
                                                    $PosTurno    = "Turnado".$Contador;
                                                    $Anexo       = "Anexo".$Contador;
                                                    $Obs         = "Obs".$Contador;
                                                    $Responsable = "Responsable".$Contador;
                                                    echo "<tr>";
                                                    echo "<td class='small font-weight-bold'>" .$row['NombreArea']. "</td>";
                                                    echo "<td class='small font-weight-bold'> <input type='text' class='form-control' name='".$Obs."'></td>";
                                                    echo "<td class='small font-weight-bold'> <input type='text' class='form-control' name='".$Anexo."'></td>
                                                         <td class='text-center'><input type='checkbox' class='form-check-input text-center' name='".$PosTurno."'>
                                                          <input type='hidden' class='form-check-input' value=".$row['IdArea']." name='".$IdArea."'></td>";
                                            }
                                            echo "<input type='hidden' value='".$Contador."' name='CantArea'>";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <button type="submit" id="Btn_Turnado" class="btn btn-success">Guardar</button>
                </div><br>
            </div>
        </div>
    </div>
    <div class="modal fade" id="NuevoReporteAnyoOtro">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="color2">Nuevo turno</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="TurnadoVolanteOtroAnyo" method="POST">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label" id="color2">Numero de turno</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TNumeroOtro" name="TNumero">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Fecha que se registro</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFRegistro" name="TFRegistro" onchange="asignaFolio(this.value);">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha limite</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFLimite" name="TFLimite">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha recepción</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFRecepecion" name="TFRecepecion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha referencia</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="TFReferencia" name="TFReferencia">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Oficio/Referencia</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TNumeroO" name="TNumeroO">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-url-input" id="color2" class="col-2 col-form-label">Tipo de atención</label>
                            <div class="col-10">
                                <select class="form-control" name="TAtencion">
                                    <?php
                                $Query=mysqli_query(getConnSec(),"SELECT * FROM cat_atencion");
                                while ($Result=mysqli_fetch_array($Query)) {
                                echo '<option value='.$Result['IdAtencion'].'>'.$Result['TipoAtencion'].'</option>';
                                }
                                ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG entrada</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TVE" name="TVE">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG salida</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TVS" name="TVS">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Tipo </label>
                            <div class="col-10">
                                <select class="form-control" name="TTipo">
                                    <option value="Normal">Normal</option>
                                    <option value="Urgente">Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Clasificación </label>
                            <div class="col-10">
                                <select class="form-control" name="Clasificacion">
                                    <option value="Normal">Normal</option>
                                    <option value="AP">AP</option>
                                    <option value="Presidencia">Presidencia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Firmado por </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TFirmado" name="TFirmado">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Cargo </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TPDA" name="TPDA">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Alcaldia/Unidad Administrativa </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="TRUA" name="TRUA">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Destinatario</label>
                            <div class="col-10">
                                <select class="form-control" name="Destinatario">
                                    <?php
                                        $Query=mysqli_query(getConnSec(),"SELECT * FROM responsable_area where Activo = '1'");
                                            while ($Result=mysqli_fetch_array($Query)) {
                                            echo '<option value='.$Result['IdResponsable'].'>'.$Result['NombreResponsable'].'</option>';
                                                                                        }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Validado</label>
                            <div class="col-10">
                                <select class="form-control" name="Validado">
                                    <option value="En proceso">En proceso</option>
                                    <option value="Validado">Validado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Asunto</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="TAsunto" name="TAsunto" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Otro tipo de atención</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="TTAtencion" name="TTAtencion" rows="5"></textarea>
                            </div>
                        </div>
                        <hr>

                        <center>
                            <h1 id="color2">Turnar a</h1>
                        </center>
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-center">Area de destino</th>
                                        <th class="font-weight-bold text-center">Observaciones</th>
                                        <th class="font-weight-bold text-center">Anexo</th>
                                        <th class="font-weight-bold text-center">Turnar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $Contador = 0;
                                    $result = mysqli_query($mysqli,"select * from cat_area where Activo ='Si' and IdArea <> 13");
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                    $Contador ++;
                                                    $IdArea      = "IdArea" . $Contador;
                                                    $PosTurno    = "Turnado".$Contador;
                                                    $Anexo       = "Anexo".$Contador;
                                                    $Obs         = "Obs".$Contador;
                                                    $Responsable = "Responsable".$Contador;
                                                    echo "<tr>";
                                                    echo "<td class='small font-weight-bold'>" .$row['NombreArea']. "</td>";
                                                    echo "<td class='small font-weight-bold'> <input type='text' class='form-control' name='".$Obs."'></td>";
                                                    echo "<td class='small font-weight-bold'> <input type='text' class='form-control' name='".$Anexo."'></td>
                                                         <td class='text-center'><input type='checkbox' class='form-check-input text-center' name='".$PosTurno."'>
                                                          <input type='hidden' class='form-check-input' value=".$row['IdArea']." name='".$IdArea."'></td>";
                                            }
                                            echo "<input type='hidden' value='".$Contador."' name='CantArea'>";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <button type="submit" id="Btn_Turnado_Otro_Anyo" class="btn btn-success">Guardar</button>
                </div><br>
            </div>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <script src="//cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script src="../js/sb-admin.js"></script>
</body>

</html>
