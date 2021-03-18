<?php
include("Conexion.php");
function ObtenerInformacion()
{
                
$fecha_local = date('Y-m-d');
ini_set('date.timezone', 'America/Mexico_City');
$mysqli = getConnSec();
$Dato   = $_POST["IdRep"];
$Query  = "";
$query  = "SELECT * FROM cat_area WHERE IdArea = '$Dato'";
$result = $mysqli->query($query);
$row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Dato   = '<div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label" id="color2">Nombre del Area</label>
                <div class="col-10">
                    <input type="hidden" name="IdArea" value="' . $row["IdArea"] . '">
                    <input class="form-control" type="text" id="example-text-input" name="NombreArea" value="' . $row["NombreArea"] . '">
                </div> 
            </div>
            
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label" id="color2">Activo</label>
                <div class="col-10">
                    <select class="form-control" name="Activo">
                    <option value="' . $row["Activo"] . '">' . $row["Activo"] . '</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                    </select>
                </div>    
            </div>    
            
            <div class="table-responsive">
                <table class="table table-hover table-condensed" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small font-weight-bold text-center">Nombre del responsable</th>
                            <th class="small font-weight-bold text-center">Cargo del responsable</th>
                            <th class="small font-weight-bold text-center">Activo</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $Res  = mysqli_query($mysqli, "SELECT * FROM responsable_area WHERE FkArea = " . $row['IdArea'] . "");
                    $Cont = 0;
                    while ($row2 = mysqli_fetch_array($Res)) {
                        $Cont++;
                        $A            = ($row2["Activo"] == "1") ? "Si" : "No";
                        $NombreR      = "RNombre" . $Cont;
                        $CargoR       = "RCargo"  . $Cont;
                        $ActivoR      = "RActivo" . $Cont;
                        $ResponsableR = "Responsable" . $Cont;
                        $Dato        .= '    
                                    <tr>
                                        <input type="hidden" name="'.$ResponsableR.'" value ="'.$row2["IdResponsable"].'">
                                        <td class="small font-weight-bold">
                                        <input class="form-control small" type="text" name="'.$NombreR.'" value="' . $row2["NombreResponsable"] . '">
                                        </td>
                                        
                                        <td class="small font-weight-bold text-center">
                                        <input class="form-control small" type="text" name="'.$CargoR.'" value="' . $row2["CargoResponsable"] . '">
                                        </td>                                                
                                        
                                        <td class="text-center">
                                            <select class="form-control" name="'.$ActivoR.'">
                                                <option value="'.$row2['Activo'].'">'.$A.'</option>
                                                <option value="0">No</option>
                                                <option value="1">Si</option>
                                            </select>
                                        </td>
                                    </tr>';
                    }
                    $Dato .='<input type="hidden" name="CantRe" value="'.$Cont.'">
                    </tbody>
                </table>
            </div>
                            ';
                return $Dato;
}
echo ObtenerInformacion();
?>

