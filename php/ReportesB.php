<?php 
session_start();

include("Conexion.php");
$mysqli = getConnSec();
$Dato   = $_POST["Parametro"];
$Anio   = $_POST["Parametro2"];
$result = mysqli_query($mysqli,"select * from turno inner join turno_detalle on idTurno = Fkturno where Remitente = '$Dato' and year(Fecha_registro) = '$Anio' and TurnadoA = ".$_SESSION['Area']." order by IdTurno");
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>
            <td class='small font-weight-bold'>" . $row['NumTurno'] . "</td>
            <td class='small font-weight-bold'>" . $row['Asunto'] . "</td>
            <td class='small font-weight-bold'>" . $row['Fecha_registro'] . "</td>
            <td class='small font-weight-bold'>" . $row['NumOficio'] . "</td>
            <td class='small font-weight-bold'>" . $row['VoSg'] . "</td>
            <td class='small font-weight-bold'>" . $row['VoSalida'] . "</td>
            <td class='small font-weight-bold'>" . $row['Estatus'] . "</td>
            <td class='small font-weight-bold'>" . $row['FechaLimite'] . "</td>
            <td class='small font-weight-bold'>" . $row['Remitente'] . "</td>
            <td class='small font-weight-bold'>" . $row['CargoRemitente'] . "</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>";
            
            $re = mysqli_query($mysqli, "SELECT * FROM turno_detalle INNER JOIN cat_area ON idArea = TurnadoA WHERE TurnadoA = ".$_SESSION['Area']." and FkTurno = ".$row['IdTurno']." ");
            $S = "SELECT * FROM turno_detalle INNER JOIN cat_area ON idArea = TurnadoA WHERE TurnadoA = ".$_SESSION['Area']." FkTurno = ".$row['IdTurno']." ";
            while($Fi = mysqli_fetch_array($re)){
                echo "<tr>  
                <td colspan='10' align='center'></td>
                <td style='display:none;'></td>
                <td style='display:none;'></td>
                <td style='display:none;'></td>
                <td style='display:none;'></td>
                <td style='display:none;'></td>
                <td style='display:none;'></td>
                <td style='display:none;'></td>
                <td style='display:none;'></td>                                                        
                <td style='display:none;'></td>                                                                                                                  
                <td><span style='font-weight: bold;'>Turnado:</span>" . $Fi['NombreArea'] . "</td>
                <td><span style='font-weight: bold;'>Respuesta:</span>" . $Fi['Respuesta'] . "</td>";
                
                $res = mysqli_query($mysqli, "SELECT * FROM seguimiento_detalle WHERE FkDetalle = ".$Fi['IdDetalle']." ");
                    if (mysqli_num_rows($res) > 0)
                        {
                        echo "<td></td><td></td></tr>"; 
                            while($Fila = mysqli_fetch_array($res)){
                                echo "<tr>  
                            <td colspan='12' align='center'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td style='display:none;'></td>
                            <td><span style='font-weight: bold;'>Seguimiento:</span>" . $Fila['Seguimiento'] . "</td>
                            <td><span style='font-weight: bold;'>Fecha que capturo:</span>" . $Fila['FechaCapturo'] . "</td>
                            </tr>";  
                        }  
                }else{
                    echo "<td></td><td></td></tr>"; 
                }
            }      
        }
?>
