<?php
session_start();
require_once("Conexion.php");
error_reporting(0);
$mysqli         = getConnSec();
$TNumero        = $_POST['TNumero'];
$TFRegistro     = $_POST['TFRegistro'];
$TFLimite       = $_POST['TFLimite'];
$TFRecepecion   = $_POST['TFRecepecion'];
$TFReferencia   = $_POST['TFReferencia'];
$TNumeroO       = $_POST['TNumeroO'];
$TAtencion      = $_POST['TAtencion'];
$TVSG           = $_POST['TVE'];
$TVS            = $_POST['TVS'];
$TTipo          = $_POST['TTipo'];
$TFirmado       = $_POST['TFirmado'];
$TPDA           = $_POST['TPDA'];
$TRUA           = $_POST['TRUA'];
$TAsunto        = $_POST['TAsunto'];
$TTAtencion     = $_POST['TTAtencion'];
$Validado       = $_POST['Validado'];
$Clasificacion  = $_POST['Clasificacion'];
$Cantidad       = $_POST['CantArea'];
$Destinatario   = $_POST['Destinatario'];
$Resp           = "";
$Funcion        = "0";

$fecha_local = date('Y-m-d');
$TFReferencia = ($TFReferencia == '') ? "$fecha_local" : "$TFReferencia";
$TFRecepecion = ($TFRecepecion == '') ? "$fecha_local" : "$TFRecepecion";


$query   = "select max(IdTurno) as Numero from turno";
$result  = $mysqli->query($query);
$row     = mysqli_fetch_array($result, MYSQLI_ASSOC);
$IdTurno = $row["Numero"];
$IdTurno++;
$query     = "INSERT INTO turno VALUES ('$IdTurno', '$TNumero', '$TFRegistro','$TNumeroO','$TAtencion','$TTipo','$TFReferencia','$TFRecepecion','$TFLimite','$TVSG','$TVS','$TFirmado','$TPDA','$TRUA','$TAsunto','$TTAtencion','$Validado','$Destinatario','$Clasificacion')";
$resultado = $mysqli->query($query);

for ($x = 1; $x <= $Cantidad; $x++) {
                
                $Num                 = "Turnado" . $x;
                $Obs                 = "Obs" . $x;
                $Turno               = $_POST[$Num];
                $Observaciones       = $_POST[$Obs];
                $variable = ($Turno == "on") ? "Si" : "No";
                if ($variable == "Si") {
                $Cons   = "select max(IdDetalle) as Numero from turno_detalle";
                $Res    = $mysqli->query($Cons);
                $Fila   = mysqli_fetch_array($Res, MYSQLI_ASSOC);
                $Mayor  = $Fila["Numero"] + 1;    
                                
                                $IdArea = "IdArea" . $x;
                                $A      = "Anexo"  . $x;
                                $Area   = $_POST[$IdArea];
                                $Anexo  = $_POST[$A];
                                
                                $query     = "INSERT INTO turno_detalle VALUES ('$Mayor','$IdTurno', '$Area', '$Resp','$Anexo','$Observaciones')";
                                $resultado = $mysqli->query($query);
                                
                                
                }
                
}


echo $IdTurno;
mysqli_close($mysqli);
?>
