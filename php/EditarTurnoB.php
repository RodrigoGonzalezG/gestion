<?php

function getRealIP()
{
    if (isset($_SERVER["HTTP_CLIENT_IP"])) {
        return $_SERVER["HTTP_CLIENT_IP"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
        return $_SERVER["HTTP_X_FORWARDED"];
    } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
        return $_SERVER["HTTP_FORWARDED"];
    } else {
        return $_SERVER["REMOTE_ADDR"];
    }
    
}

session_start();
require_once("Conexion.php");
error_reporting(0);
$mysqli         = getConnSec();
$IdTurno        = $_POST['IdTurno'];
$Respuesta      = $_POST['Respuesta'];
$Cantidad       = $_POST['Cantidad'];
$Area           = $_SESSION['Area'];
$CantidadA      = $_POST['CantArchivos'];
$User           = $_SESSION['Id_usuario'];
$fecha_local    = date("Y-m-d H:i:s");  
$IpUser         = getRealIP();

$Guardar = "INSERT INTO Modificaciones_Tdetalle (IdDetalle, FkTurno, TurnadoA, Respuesta, Anexo, Observaciones) SELECT IdDetalle, FkTurno, TurnadoA, Respuesta, Anexo, Observaciones FROM turno_detalle WHERE FkTurno ='$IdTurno' and TurnadoA ='$Area'";
$EjecutaGuardar = $mysqli->query($Guardar);

echo $Guardar; 

$Guardar = "Update Modificaciones_Tdetalle set Usuario = '$User', Fecha_Hora = '$fecha_local', Ip_usuario = '$IpUser' where FkTurno ='$IdTurno' and TurnadoA ='$Area'";
$EjecutaGuardar = $mysqli->query($Guardar);


$Funcion        = "0";
$query          = "update turno_detalle set Respuesta = '$Respuesta'  where FkTurno ='$IdTurno' and TurnadoA ='$Area'";
$resultado      = $mysqli->query($query);


for ($x = 1; $x <= $Cantidad; $x++) {
    
                $Eliminado   = "Eliminado" . $x;
                $Id          = "Id" . $x;
                $Id2         = $_POST[$Id];
                $Eliminado2  = $_POST[$Eliminado];
                $variable = ($Eliminado2 == "on") ? "Si" : "No";
                echo $Eliminado2;
                if ($variable == "Si") {
                                $query2    = "Delete from seguimiento_detalle where IdSeguimiento ='$Id2'";
                                $resultado = $mysqli->query($query2);
                }
}

for ($x = 1; $x <= $CantidadA; $x++) {
                $Num      = "Archivo" . $x;
                $NArchivo = "NArchivo" . $x;
                $ARuta    = "Ruta" . $x;
                $Turno    = $_POST[$Num];
                $Ruta     = $_POST[$ARuta];
                $NombreA  = $_POST[$NArchivo];
                $variable = ($Turno == "on") ? "Si" : "No";
                if ($variable == "Si") {
                                $query2    = "Delete from digitalizados where fkTurno ='$IdTurno' and NombreArchivo = '$Ruta'";
                                echo $query2;
                                $resultado = $mysqli->query($query2);
                } else {
                }
                echo $query2;
}

mysqli_close($mysqli);
?>
