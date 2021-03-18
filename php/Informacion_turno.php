<?php
            session_start();
            include("Conexion.php");
            function ObtenerInformacion()
            {
                                    $fecha_local = date('Y-m-d');
                                    ini_set('date.timezone', 'America/Mexico_City');
                                    $mysqli = getConnSec();
                                    $Partes = $_POST["IdRep"];
                                    $Query  = "";
                                    $query  = "SELECT * FROM datosturno WHERE IdTurno = '$Partes'";
                                    $result = $mysqli->query($query);
                                    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $Dato   = '
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label" id="color2">Numero de turno</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-text-input" name="TNumero" value="' . $row["NumTurno"] . '">
                                <input type="hidden" name="IdTurno" id="IdTurno" value="' . $row["IdTurno"] . '">
                            </div>                        
                        </div>                        
                        
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Fecha que se registro</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" name="TFRegistro" value="' . $row["Fecha_registro"] . '">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha limite</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" name="TFLimite" value="' . $row["FechaLimite"] . '">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha recepción</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" name="TFRecepecion" value="' . $row["FechaRecibido"] . '">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha referencia</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" name="TFReferencia" value="' . $row["FechaDocumento"] . '">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Referencia/Oficio</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" name="TNumeroO" value="' . $row["NumOficio"] . '">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-url-input" id="color2" class="col-2 col-form-label">Tipo de atención</label>
                            <div class="col-10">
                                <select class="form-control" name="TAtencion">
                                <option value=' . $row["IdAtencion"] . '>' . $row["TipoAtencion"] . '</option>';
                                    $Query  = mysqli_query(getConnSec(), "SELECT * FROM cat_atencion");
                                    while ($Result = mysqli_fetch_array($Query)) {
                                                            $Dato .= '<option value=' . $Result['IdAtencion'] . '>' . $Result['TipoAtencion'] . '</option>';
                                    }
                                    ;
                                    $Dato .= '
                                 </select>  
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG entrada</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" name="TVE" value="' . $row["VoSg"] . '">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG salida</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" name="TVS" value="' . $row["VoSalida"] . '">
                            </div>
                        </div>
                        
                       <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Tipo </label>
                            <div class="col-10">
                                <select class="form-control" name="TTipo">
                                    <option value="' . $row["Estatus"] . '">' . $row["Estatus"] . '</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Urgente">Urgente</option>
                                </select>
                            </div>
                       </div>
                        
                         
                       <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Clasificacion </label>
                            <div class="col-10">
                                <select class="form-control" name="TClasificacion">
                                    <option value="' . $row["Clasificacion"] . '">' . $row["Clasificacion"] . '</option>
                                    <option value="AP">AP</option>
                                    <option value="Presidencia">Presidencia</option>
                                    <option value="Normal">Normal</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Firmado por </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-tel-input" name="TFirmado" value="' . $row["Remitente"] . '">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Promotor/Dependencia/<br>Alcaldia </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-tel-input" name="TPDA" value="' . $row["CargoRemitente"] . '">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Remitente/Unidad Administrativa </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-tel-input" name="TRUA" value="' . $row["Promotor"] . '">
                            </div>
                        </div>
                        
                      
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Validado</label>
                            <div class="col-10">
                            <select class="form-control" name="Validado">
                                <option value="' . $row["eValidado"] . '">' . $row["eValidado"] . '</option>
                                <option value="Validado">Validado</option>
                                <option value="En proceso">En proceso</option>
                            </select>                           
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Destinatario</label>
                            <div class="col-10">
                                <select class="form-control" name="Destinatario">
                                <option value=' . $row["FkResponsable"] . '>' . $row["NombreResponsable"] . '</option>';
                                    $Query  = mysqli_query(getConnSec(), "SELECT * FROM responsable_area where Activo = '1'");
                                    while ($Result = mysqli_fetch_array($Query)) {
                                        $Dato .= '<option value=' . $Result['IdResponsable'] . '>' . $Result['NombreResponsable'] . '</option>';
                                    }
                                    ;
                                    $Dato .= '
                                 </select>  
                            </div>
                        </div>
                        
                       <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Asunto</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="example-tel-input" name="TAsunto" rows="5">' . $row["Asunto"] . '</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Otro tipo de atención</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="example-tel-input" name="TTAtencion" rows="5">' . $row["OtroAtencion"] . '</textarea>
                            </div>
                        </div>
                        <hr>
                        <center><h1 id="color2">Documentos digitalizados</h1></center>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small font-weight-bold">Nombre del archivo</th>
                                        <th class="small font-weight-bold text-center">Tipo de archivo</th>
                                        <th class="small font-weight-bold text-center">Ver documento</th>
                                        <th class="small font-weight-bold text-center">Area</th>
                                        <th class="small font-weight-bold text-center">Eliminar</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                    ';
                                    $Res  = mysqli_query($mysqli, "SELECT fkturno,ruta,NombreArchivo,TipoArchivo,NombreArea FROM digitalizados INNER JOIN cat_area ON AArchvio = IdArea WHERE fkTurno = " . $row['IdTurno'] . "");
                                    $Cont = 0;
                                    while ($row2 = mysqli_fetch_array($Res)) {
                                            $variable = ($row2["TipoArchivo"] == "R") ? "Respuesta" : "Archivo original";
                                            $Cont++;
                                            $PosArchivo = "Archivo" . $Cont;
                                            $NArchivo   = "NArchivo" . $Cont;
                                            $Ruta       = "Ruta" . $Cont;
                                            $Dato .= '    
                                            <tr>
                                                <td class="small font-weight-bold">' . $row2["NombreArchivo"] . '
                                                <input type="hidden" name="' . $NArchivo . '" value="' . $row2["NombreArchivo"] . '">
                                                </td>
                                                <td class="small font-weight-bold text-center">' . $variable . '</td>
                                                <td class="text-center">
                                                <a href="..' . $row2["ruta"] . '" target="_blank" class="btn btn-success"><i class="far fa-file-pdf"></i></a>
                                                </td>
                                                <td class="small font-weight-bold text-center">' . $row2["NombreArea"] . '</td>
                                                <td class="text-center"><input type="checkbox" class="form-check-input" name="' . $PosArchivo . '"></td>
                                                
                                                <td><input type="hidden" name="CantArchivos" value="' . $Cont . '"></td>
                                                <td><input type="hidden" name="' . $Ruta . '" value="' . $row2["NombreArchivo"] . '"></td>
                                                </tr>
                                            ';
                                    }
                                    $Dato .= '
                                </tbody>
                            </table>
                        </div>
                        <hr>
                ';
                                    if ($_SESSION['Area'] == "13") {
                                        $Sql = "SELECT IdDetalle,Anexo,FkTurno,TurnadoA,NombreArea,FkResponsable,Respuesta,Observaciones FROM turno 
                                        INNER JOIN turno_detalle ON IdTurno = FkTurno 
                                        INNER JOIN cat_area ON TurnadoA = IdArea WHERE fkTurno = " . $row['IdTurno'] . "";
                                    } else {
                                        $Sql = "SELECT IdDetalle,Anexo,FkTurno,TurnadoA,NombreArea,FkResponsable,Respuesta,Observaciones FROM turno 
                                        INNER JOIN turno_detalle ON IdTurno = FkTurno 
                                        INNER JOIN cat_area ON TurnadoA = IdArea WHERE fkTurno = " . $row['IdTurno'] . " and TurnadoA = " . $_SESSION['Area'] . "";
                                    }
                                    $Dato .= '
                       <center><h1 id="color2">Turnados</h1></center>
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small font-weight-bold">Nombre del area</th>
                                        <th class="small font-weight-bold text-center">Respuesta</th>
                                        <th class="small font-weight-bold text-center">Anexo</th>
                                        <th class="small font-weight-bold text-center">Observaciones</th>
                                        <th class="small font-weight-bold text-center">Eliminar</th>
                                        <th class="small font-weight-bold text-center">Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ';
                                    $Contador = 0;
                                    $result   = mysqli_query($mysqli, $Sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                                            $Contador++;
                                                            $IdArea      = "IdArea" . $Contador;
                                                            $PosTurno    = "Eliminado" . $Contador;
                                                            $Responsable = "Responsable" . $Contador;
                                                            $Obs         = "Obs" . $Contador;
                                                            $Dato .= '    
                                            <tr>
                                            <td class="small font-weight-bold">' . $row['NombreArea'] . '</td>
                                            <td class="small font-weight-bold text-center">' . $row['Respuesta'] . '</td>
                                            <td class="small font-weight-bold text-center">' . $row['Anexo'] . '</td>
                                            <td class="small font-weight-bold text-center">'. $row['Observaciones'] . '</td>
                                
                                            <td class="text-center">
                                            <input type="checkbox" name="' . $PosTurno . '">
                                            <input type="hidden" value="' . $row['TurnadoA'] . '" name="' . $IdArea . '">
                                            </td>
                                            
                                            <td><button type="button" onclick="VerSeguimiento(this.id);" id="' . $row['IdDetalle'] . '"  data-target="#VerSeguimiento"><i class="fas fa-angle-down"></i></button></td>                                            
                                            <input type="hidden" value="' . $Contador . '" name="CantArea">      
                                            </tr>
                                            ';
                                    }
                                    $Dato .= '
                                </tbody>
                            </table>
                        </div>
                       <center><h1 id="color2">Seguimientos</h1></center>
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="small font-weight-bold">Seguimiento</th>
                                    <th class="small font-weight-bold text-center">Fecha</th>
                                </tr>
                            </thead>
                            <tbody = id="data">
                                    </tbody>
                            </table>
                        </div>
';
return $Dato;
}
echo ObtenerInformacion();
?>
