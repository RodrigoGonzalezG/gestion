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
                            <label for="example-text-input" class="col-2 col-form-label" id="color2">Numero de turno2</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-text-input" value="' . $row["NumTurno"] . '" readonly>
                                <input type="hidden" name="IdTurno" id="IdTurno" value="' . $row["IdTurno"] . '">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Fecha que se registro</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" value="' . $row["Fecha_registro"] . '" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha limite</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" value="' . $row["FechaLimite"] . '" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha recepción</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" value="' . $row["FechaRecibido"] . '" readonly>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Fecha referencia</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" value="' . $row["FechaDocumento"] . '" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Referencia/Oficio</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" value="' . $row["NumOficio"] . '" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Tipo de atención</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" value="' . $row["TipoAtencion"] . '" readonly>
                            </div>
                        </div>
                                                
                         <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG entrada</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input"  value="' . $row["VoSg"] . '" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Volante SG salida</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" value="' . $row["VoSalida"] . '" readonly>
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="example-email-input" id="color2" class="col-2 col-form-label">Tipo</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" value="' . $row["Estatus"] . '" readonly>
                            </div>
                        </div>
                                                
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Firmado por </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-tel-input" value="' . $row["Remitente"] . '" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Promotor/Dependencia/<br>Alcaldia </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-tel-input" value="' . $row["CargoRemitente"] . '" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Remitente/Unidad Administrativa </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-tel-input" value="' . $row["Promotor"] . '" readonly>
                            </div>
                        </div>
                        
                      <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Validado</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-tel-input" value="' . $row["eValidado"] . '" readonly>
                            </div>
                        </div>
                        
                        
                       <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Asunto</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="example-tel-input" rows="5" readonly>' . $row["Asunto"] . '</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Otro tipo de atención</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="example-tel-input" rows="5" readonly>' . $row["OtroAtencion"] . '</textarea>
                            </div>
                        </div>
                        <hr>';
                    $query  = "SELECT IdDetalle,Anexo,FkTurno,TurnadoA,NombreArea,FkResponsable,Respuesta FROM turno 
                                    INNER JOIN turno_detalle ON IdTurno = FkTurno 
                                    INNER JOIN cat_area ON TurnadoA = IdArea WHERE fkTurno = " . $row['IdTurno'] . " and TurnadoA = " . $_SESSION['Area'] . "";
                                    $result = $mysqli->query($query);
                                    $Fila    = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $Dato .= '
                                    
                        <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Anexo</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="example-tel-input" rows="5" readonly>' . $Fila["Anexo"] . '</textarea>
                            </div>
                        </div>
                        
                                <input class="form-control" type="hidden" id="example-tel-input" value="' . $Fila["FkTurno"] . '"/>
                                <input class="form-control" type="hidden" id="example-tel-input" value="' . $Fila["TurnadoA"] . '"/>
                        
                                                
                          <div class="form-group row">
                            <label for="example-tel-input" id="color2" class="col-2 col-form-label">Respuesta</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" id="example-tel-input" name="Respuesta" rows="5">' . $Fila["Respuesta"] . '</textarea>
                            </div>
                        </div>';
                $Dato .='
                        <center><h1 id="color2">Documentos digitalizados</h1></center>
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small font-weight-bold">Nombre del archivo</th>
                                        <th class="small font-weight-bold text-center">Tipo de archivo</th>
                                        <th class="small font-weight-bold text-center">Ver documento</th>
                                        <th class="small font-weight-bold text-center">Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    ';
                                    $Res  = mysqli_query($mysqli, "SELECT fkturno,ruta,NombreArchivo,TipoArchivo,AArchvio FROM digitalizados WHERE fkTurno = " . $row['IdTurno'] . "");
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
                                                <a href="..' . $row2["ruta"] . '" target="_blank" ><i class="far fa-file-pdf"></i></a>
                                                </td>
                                                ';
                                        if($_SESSION['Area'] == $row2['AArchvio']){

                                            $Dato.='<td class="text-center"><input type="checkbox" class="form-check-input" name="' . $PosArchivo . '"></td>';

                                        }
                                            $Dato.='
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
                        
                          <center><h1 id="color2">Seguimiento</h1></center>
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small font-weight-bold">Seguimiento</th>
                                        <th class="small font-weight-bold text-center">Fecha</th>
                                        <th class="small font-weight-bold text-center">Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    ';
                                    $Res  = mysqli_query($mysqli, "SELECT * FROM seguimiento_detalle WHERE FkDetalle = " . $Fila['IdDetalle'] . "");
                                    $Cont = 0;
                                    while ($Fila2 = mysqli_fetch_array($Res)) {
                                            $Cont ++;
                                            $NombreDelete = "Eliminado" . $Cont;
                                            $IdDelete = "Id" . $Cont;
                                            $PosTurno = "";
                                            $Dato .= '   
                                            <tr>
                                                <td class="small font-weight-bold">' . $Fila2["Seguimiento"] . '</td>
                                                <td class="small font-weight-bold text-center">' . $Fila2["FechaCapturo"] . '</td>
                                                <td class="text-center"><input type="checkbox" name="' . $NombreDelete . '"></td>     
                                                <td><input type="hidden" name="' . $IdDelete . '" value="' . $Fila2["IdSeguimiento"] . '"></td>
                                                <input type="hidden" value="' . $Cont . '" name="Cantidad">      
                                            </tr>
                                            ';
                                    }
                                    $Dato .= '
                                </tbody>
                            </table>
                        </div>
                        <hr>
                ';
                                   
                                    return $Dato;
            }
            echo ObtenerInformacion();
?>
