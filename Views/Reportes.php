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
                    <span id="color2" class="breadcrumb-item active">Reportes</span>
                </ol>


                <div class="card mb-3">
                    <div class="card-header"><i class="far fa-chart-bar"></i>Reportes</div><br>

                    <div class="container-fluid">

                        <div class="col-lg-12 row">

                            <div class="col-1 text-center">
                                <input type="checkbox" id="Opcion1">
                            </div>

                            <div class="col-1 text-left">
                                <label for="exampleInputEmail1">Firmado por</label>
                            </div>

                            <div class="col-10">
                                <input type="text" class="form-control" id="FirmadoPor" aria-describedby="emailHelp" placeholder="Firmado por">
                            </div>

                        </div>

                        <br>

                         <div class="col-lg-12 row">
                            <div class="col-1 text-center">
                                <input type="checkbox" name="Opcion3" id="Opcion3">
                            </div>
                            <div class="col-1 text-left">
                                <label for="exampleInputEmail1">Clasificacion:</label>
                            </div>
                            <div class="col-10">
                                <select class="form-control" id="Clasificacion">
                                <option value="AP">AP</option>
                                <option value="Presidencia">Presidencia</option>
                                <option value="Normal">Normal</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="col-lg-12 row">
                            <div class="col-1 text-center">
                                <input type="checkbox" name="Opcion2" id="Opcion2">
                            </div>
                            <div class="col-1 text-left">
                                <label for="exampleInputEmail1">Seleccione mes:</label>
                            </div>
                            <div class="col-10">
                                <select class="form-control" id="Mes">
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                                </select>
                            </div>
                        </div>
												<br>
												 <div class="col-lg-12 row">
														<div class="col-1 text-center">
																<input type="checkbox" name="Opcion4" id="Opcion4">
														</div>
														<div class="col-1 text-left">
																<label for="exampleInputEmail1">Área:</label>
														</div>
														<div class="col-10">
																<select class="form-control" id="Areas">
																<?php
																$areas=mysqli_query($mysqli, "SELECT * FROM cat_area WHERE Activo = 'Si'");
																while ($area=mysqli_fetch_array($areas)) {
																	echo '<option value='.$area['IdArea'].'>'.$area['NombreArea'].'</option>';
																}
																 ?>
																</select>
														</div>
												</div>

												<br>
                            <div class="col-lg-12 row">
								<div class="col-1 text-center">
									<input type="checkbox" name="Opcion5" id="Opcion5">
								</div>
								<div class="col-1 text-left">
									<label for="exampleInputEmail1">Año:</label>
								</div>
								<div class="col-10">
                                    <select class="form-control" name="Anio" id="Anio">
                                        <?php
                                        $Query=mysqli_query($mysqli,"select year(Fecha_registro) as anio from turno group by anio");
                                        while ($Result=mysqli_fetch_array($Query)) {
                                            echo '<option value='.$Result['anio'].'>'.$Result['anio'].'</option>';
                                                                                    }
                                        ?>

                                    </select>
								</div>
							</div>
												<br>
                    </div>
                        <?php

                            $Funcion = ($_SESSION['Area'] == "13") ? "Genera_Reporte();" : "Genera_ReporteB();";

                        ?>
                        <button type="submit" class="btn btn-success" onclick="<?php echo $Funcion; ?>">Buscar</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="Reportes" width="100%" cellspacing="0" style="display:none;">
                                <thead>
                                    <tr>
                                        <th class="small font-weight-bold" style="width: 80px;">Numero de turno</th>
                                        <th class="small font-weight-bold" style="width: 80px;">Asunto</th>
                                        <th class="small font-weight-bold" style="width: 80px;">Clasificacion</th>
                                        <th class="small font-weight-bold">Fecha</th>
                                        <th class="small font-weight-bold">Num de oficio</th>
                                        <th class="small font-weight-bold">Folio entrada</th>
                                        <th class="small font-weight-bold">Folio salida</th>
                                        <th class="small font-weight-bold">Estatus</th>
                                        <th class="small font-weight-bold">Fecha limite</th>
                                        <th class="small font-weight-bold">Remite</th>
                                        <th class="small font-weight-bold">Cargo</th>
                                        <th class="small font-weight-bold"></th>
                                        <th class="small font-weight-bold"></th>
                                        <th class="small font-weight-bold"></th>
                                        <th class="small font-weight-bold"></th>
                                    </tr>
                                </thead>
                                <tbody id="Reporte">

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






    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../js/sb-admin.js"></script>

    <script src="//cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

</body>

</html>
