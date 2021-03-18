<?php
session_start();
include("Conexion.php");
function ObtenerInformacion()
{
error_reporting(0);
$Datos  = "";
$mysqli = getConnSec();
$Opc    = $_POST["OPC"];
$anio   = $_POST["anio"];
$Rango  = $_POST["CapturaRango"];
$Area   = $_POST["CapturaArea"];
$R      = "";
// $Datos .= $Opc;
// $Datos .= $anio;
// $Datos .= $Rango;
$Criterio = "";
// ===============================================================
//  Primero se valida el area del usuario ya que es diferente la informacion que se muestra
//  para el usuario que tiene el id 13 que corresponde al area generadora oficialia de partes
//  el resultado de toda esta validacion se guardara en la variable Consulta donde mas abajo se ejecutara
if ($_SESSION['Area'] == "13") {
        //  Sin opcion seleccionada la consulta sera solo de año
        if ($Opc == "") {

                $Consulta = "SELECT *, Year(Fecha_registro) AS anio FROM turno WHERE year(Fecha_registro) = '$anio'";

        }
        //  Opcion 1 seleccionada seran los numeros de folio ejemplo 2,3,4
        if ($Opc == "Opc1") {
                // $R       = preg_split("/\,/", $Rango);
                // $Numero  = count($R);
                //  Separa los numeros por coma y los asigna en el array numero
                $Numero = count(preg_split("/\,/", $Rango));
                $Numero --;
                // $Numero2 = $Numero - 1;
                for ($i = 0; $i < $Numero; $i++) {
                        // Este if es para evitar un error en caso de que busque un solo numero de folio
                        if ($Numero == $i) {

                                $Criterio .= "NumTurno=" . $R[$i];

                        } else {

                                $Criterio .= "NumTurno='" . $R[$i] . "' OR ";

                        }
                }
        //  Consulta pparada 
        $Consulta = "SELECT *, Year(Fecha_registro) AS anio FROM turno WHERE ($Criterio) AND year(Fecha_registro) = '$anio'";
        }

        if ($Opc == "Opc2") {

                $R        = preg_split("/\-/", $Rango);
                $Tam      = count($R);
                $N1       = $R[0];
                $N2       = $R[$Tam - 1];
                $Consulta = "SELECT *, Year(Fecha_registro) AS anio FROM turno WHERE year(Fecha_registro) = '$anio' AND NumTurno BETWEEN '$N1' AND '$N2'";

        }

        if ($Opc == "Opc3") {

                $Consulta = "SELECT *, Year(Fecha_registro) AS anio FROM turno  INNER JOIN turno_detalle ON IdTurno = FkTurno WHERE year(Fecha_registro) = '$anio' AND TurnadoA ='$Area'";
        
        }
} else {
        if ($Opc == "") {

                $Consulta = "SELECT *, Year(Fecha_registro) AS anio FROM turno INNER JOIN turno_detalle on IdTurno = FkTurno WHERE turnadoA = '$_SESSION[Area]' AND year(Fecha_registro) = '$anio'";
      
        }

        if ($Opc == "Opc1") {
                $R       = preg_split("/\,/", $Rango);
                $Numero  = count($R);
                $Numero2 = $Numero - 1;
                for ($i = 0; $i < $Numero; $i++) {
                        if ($Numero2 == $i) {
                                $Criterio .= "NumTurno=" . $R[$i];
                        } else {
                               $Criterio .= "NumTurno='" . $R[$i] . "' or ";
                        }
                }
                $Consulta = "select *, Year(Fecha_registro) AS anio from turno inner join turno_detalle on IdTurno = FkTurno where ($Criterio) and year(Fecha_registro) = '$anio'and turnadoA = '$_SESSION[Area]'";
        }

        if ($Opc == "Opc2") {
                        $R        = preg_split("/\-/", $Rango);
                        $Tam      = count($R);
                        $N1       = $R[0];
                        $N2       = $R[$Tam - 1];
                        $Consulta = "select *, Year(Fecha_registro) AS anio from turno inner join turno_detalle on IdTurno = FkTurno where year(Fecha_registro) = '$anio' and turnadoA = '$_SESSION[Area]' and NumTurno BETWEEN '$N1' AND '$N2'";
        }

}
                ini_set('date.timezone', 'America/Mexico_City');
                $fecha_local = date('Y-m-d');
                if ($_SESSION['Area'] == "13") {
                                            $Funcion = "VerTurno(this.id)";
                                            $Form    = "#VerTurno";
                } else {
                                            $Funcion = "VerTurnoB(this.id)";
                                            $Form    = "#VerTurnoB";
                }


                $result = mysqli_query($mysqli, $Consulta);
                $Cont = 0;
                $ConR ="";
                $ConRb ="";
                $Conteo = 0;
                $RESPU = 0;
                $CantArchivos ="";
                $CantidadArchivos ="";
                while ($row = mysqli_fetch_array($result)) {
                                $Folio  = $row['IdTurno'];
                    
                                $SqlRespuesta = "select count(FkTurno) as CantidadArchivos from digitalizados where fkTurno = '$Folio'";
                                $eje = $mysqli->query($SqlRespuesta);
                                $Informacion = mysqli_fetch_array($eje, MYSQLI_ASSOC);
                                $CantidadArchivos = $Informacion["CantidadArchivos"];
                                if($CantidadArchivos > 0){
                                    $CantArchivos = "No falta";
                                }
                                else{
                                    $CantArchivos = "Si falta";
                                }

                                $Con    = "select count(IdTurno) as Conteo  from turno inner join turno_detalle on IdTurno = fkturno inner join seguimiento_detalle on IdDetalle = fkdetalle where IdTurno ='$Folio'";
                                $res    = $mysqli->query($Con);
                                $fila   = mysqli_fetch_array($res, MYSQLI_ASSOC);
                                $Conteo = $fila["Conteo"];
                    
                                if($Conteo > 0){
                                    
                                    $ConR = "No falta";
                                }
                                else{
                                    
                                    $ConR = "Si falta";

                                }
                    
                                $Con2   = "Select Respuesta from turno_detalle where FkTurno = '$Folio'";
                                $res2   = $mysqli->query($Con2);
                                $fila2  = mysqli_fetch_array($res2, MYSQLI_ASSOC);
                                $RESPU  = $fila2["Respuesta"];
                                $RespuCont = strlen($fila2['Respuesta']);    
                    
                              
                                if($RespuCont > 0){
                                    
                                    $ConRb = "No falta";
                                }
                                else{
                                    
                                    $ConRb = "Si falta";

                                }

                                $Cont ++;
                                $Impresion = "Impresion" . $Cont;
                                $f     = $row['FechaLimite'];
                                $dias  = (strtotime($f) - strtotime($fecha_local)) / 86400;
                                $Color = "";
                                if ($dias > 10 && $row['eValidado'] == "En proceso") {
                                                $Color = "style='background-color:#90F0B9;'";
                                }
                                if ($dias <= 10 && $dias >= 5 && $row['eValidado'] == "En proceso") {
                                                $Color = "style='background-color:#F4D03F;'";
                                }
                                if ($dias < 5 && $row['eValidado'] == "En proceso") {
                                                $Color = "style='background-color:#CD5C5C;'";
                                }
                                if ($row['eValidado'] == "Validado") {
                                                $Color = "style='background-color:#239B56;'";
                                }

                                if($row['FechaLimite'] == "" && $row['eValidado'] <> "Validado"){
                                                $Color = "style='background-color:#ffffff;'";
                                }
                                
                                if($row['FechaLimite'] == "" && $row['eValidado'] == "Validado"){
                                                $Color = "style='background-color:#239B56;'";
                                }
                    
                                $Datos .= '
                                            <tr ' . $Color . ' class="headt">
                                                <td id="f" class="small font-weight-bold">' . $row['NumTurno'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['Fecha_registro'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['NumOficio'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['VoSg'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['VoSalida'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['Estatus'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['FechaLimite'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['Asunto'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['Clasificacion'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['Remitente'] . '</td>
                                                <td id="f" class="small font-weight-bold">' . $row['CargoRemitente'] . '</td>';
                                if ($_SESSION['Area'] <> "13") {
                                    $Datos .='
                                                <td><button type="button" onclick="Seguimiento(this.id);" id=' . $row['IdTurno'] . ' data-toggle="modal" data-target="#Seguimiento"><i class="far fa-edit"></i></button></td>
                                                ';
                                }
                                    if ($_SESSION['Area'] == "13") {

                                    $Datos.='<td class="small font-weight-bold"> '.$ConR.' </td>';
                                    $Datos.='<td class="small font-weight-bold"> '.$ConRb.' </td>';
                                    $Datos.='<td class="small font-weight-bold"> '.$CantArchivos.' </td>';
                                }

                                $Datos .='
                                                <td><button type="button" onclick="'.$Funcion.'" id=' . $row['IdTurno'] . ' data-toggle="modal" data-target="'.$Form.'"><i class="far fa-edit"></i></button></td>
                                                ';
                                if ($_SESSION['Area'] == "13") {
                                                $Datos .= '
                                                <td><button type="button" onclick="TunarV(this.id)" id=' . $row['IdTurno'] . ' data-toggle="modal" data-target="#TurnarV"><i class="fas fa-paper-plane"></i></button></td>';
                                }
                                $Datos .= '<td><button type="button" onclick="AdjuntarV(this.id)" id=' . $row['IdTurno'] . ' data-toggle="modal" data-target="#AdjuntarV"><i class="far fa-file-pdf"></i></button></td>
                                                ';
                                if ($_SESSION['Area'] == "13") {
                                    $Datos .= '<td><input type="checkbox" class="form-control Filtro" name="FilImprimir[]" id="'.$row['IdTurno'].'" value ='.$row['IdTurno'].'> </td>';
                                }
                                                $Datos .='
                                                </tr>

                                            ';
                }

                return $Datos;
}
echo ObtenerInformacion();
