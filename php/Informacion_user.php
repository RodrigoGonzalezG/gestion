<?php
include("Conexion.php");
function ObtenerInformacion(){
$mysqli = getConnSec();
$Dato   = $_POST["IdRep"];
$query  = "SELECT cat_usuario.idUsuario,  cat_usuario.Nombre,  cat_usuario.UserName,  cat_usuario.Password,  cat_usuario.Activo,  cat_usuario.FkArea,  cat_usuario.TipoUser, cat_usuario.correo, IdArea, NombreArea FROM cat_usuario INNER JOIN cat_area ON FkArea = idArea WHERE idUsuario = '$Dato'";
$result = $mysqli->query($query);
$row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
$Dato2  = "";   
$Dato2 .= '<div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label" id="color2">Nombre de la persona</label>
                            <div class="col-10">
                                <input class="form-control" type="hidden" id="example-text-input" name="IPersona" value="'.$Dato.'">
                                <input class="form-control" type="text" id="example-text-input" name="NPersona" value="'.$row["Nombre"].'">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Nickname</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-search-input" name="NAlias" value="'.$row["UserName"].'">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Password</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-search-input" name="Password" value="'.$row["Password"].'">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Correo</label>
                            <div class="col-10">
                                <input class="form-control" type="correo" id="example-search-input" name="Correo" value="'.$row["correo"].'">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Tipo de usuario</label>
                            <div class="col-10">
                                <select class="form-control" name="TipoU">
                                <option value="'.$row["TipoUser"].'">'.$row["TipoUser"].'</option>
                                <option>Administrador</option>
                                <option>Captura</option>
                                <option>Consulta</option>
                                </select>
                            </div>
                        </div> 
                         
                         <div class="form-group row">
                            <label for="example-url-input" id="color2" class="col-2 col-form-label">Area</label>
                            <div class="col-10">
                                <select class="form-control" name="IdArea">
                                <option value=' . $row["FkArea"] . '>' . $row["NombreArea"] . '</option>';
                                    $Query  = mysqli_query(getConnSec(), "SELECT * FROM cat_area WHERE Activo = 'Si'");
                                    while ($Result = mysqli_fetch_array($Query)) {
                                                            $Dato2 .= '<option value=' . $Result['IdArea'] . '>' . $Result['NombreArea'] . '</option>';
                                    }
                                    $Dato2 .= '
                                 </select>  
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-search-input" id="color2" class="col-2 col-form-label">Activo</label>
                            <div class="col-10">
                                <select class="form-control" name="Activo">
                                <option value="'.$row["Activo"].'">'.$row["Activo"].'</option>
                                <option>Si</option>
                                <option>No</option>
                                </select>
                            </div>
                        </div> ';  
return $Dato2;
}
echo ObtenerInformacion();
?>
