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
$TNumero        = $_POST['TNumero'];
$IdTurno        = $_POST['IdTurno'];
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
$TAnexo         = $_POST['TAnexo'];
$TAsunto        = $_POST['TAsunto'];
$TTAtencion     = $_POST['TTAtencion'];
$TObservaciones = $_POST['TObservaciones'];
$Cantidad       = $_POST['CantArchivos'];
$CantArea       = $_POST['CantArea'];
$Validado       = $_POST['Validado'];
$Dest           = $_POST['Destinatario'];
$Clasificacion  = $_POST['TClasificacion'];
$Resp           = "";
$Funcion        = "0";
$User           = $_SESSION['Id_usuario'];
$fecha_local    = date("Y-m-d H:i:s");  
$IpUser         = getRealIP();

$Guardar = "INSERT INTO Modificaciones_Turno (IdTurno, NumTurno, Fecha_registro, NumOficio, FkAtencion, Estatus, FechaDocumento, FechaRecibido, FechaLimite, VoSg, VoSalida, Remitente, CargoRemitente, Promotor, Asunto, OtroAtencion , eValidado, FkResponsable, Clasificacion) SELECT IdTurno, NumTurno, Fecha_registro, NumOficio, FkAtencion, Estatus, FechaDocumento, FechaRecibido, FechaLimite, VoSg, VoSalida, Remitente, CargoRemitente, Promotor, Asunto, OtroAtencion , eValidado, FkResponsable, Clasificacion FROM turno WHERE IdTurno = '$IdTurno'";
$EjecutaGuardar = $mysqli->query($Guardar);

$Guardar = "Update Modificaciones_Turno set Usuario = '$User', Fecha_Hora = '$fecha_local', Ip_usuario = '$IpUser' where IdTurno = '$IdTurno'";
$EjecutaGuardar = $mysqli->query($Guardar);

$query     = "update turno set IdTurno = '$IdTurno', NumTurno = '$TNumero', Fecha_registro='$TFRegistro', NumOficio = '$TNumeroO',FkAtencion= '$TAtencion',Estatus = '$TTipo',FechaDocumento ='$TFReferencia', FechaRecibido = '$TFRecepecion', FechaLimite = '$TFLimite', VoSg = '$TVSG', VoSalida = '$TVS', Remitente = '$TFirmado',CargoRemitente = '$TPDA', Promotor = '$TRUA', Asunto = '$TAsunto', OtroAtencion = '$TTAtencion', eValidado = '$Validado', FkResponsable = '$Dest', Clasificacion = '$Clasificacion' where IdTurno ='$IdTurno'";

$resultado = $mysqli->query($query);

for ($x = 1; $x <= $Cantidad; $x++) {
    $Num      = "Archivo" . $x;
    $NArchivo = "NArchivo" . $x;
    $ARuta    = "Ruta" . $x;
    $Turno    = $_POST[$Num];
    $Ruta     = $_POST[$ARuta];
    $NombreA  = $_POST[$NArchivo];
    $variable = ($Turno == "on") ? "Si" : "No";
    if ($variable == "Si") {
        $query2    = "Delete from digitalizados where fkTurno ='$IdTurno' and NombreArchivo = '$Ruta'";
        $resultado = $mysqli->query($query2);
    } else {
    }
    echo $query2;
}



for ($x = 1; $x <= $CantArea; $x++) {
    $IdArea    = "IdArea" . $x;
    $Eliminado = "Eliminado" . $x;
    $AreaId    = $_POST[$IdArea];
    $Delete    = $_POST[$Eliminado];
    $variable  = ($Delete == "on") ? "Si" : "No";
    if ($variable == "Si") {
        $Consulta = "Delete from turno_detalle where FkTurno = '$IdTurno' and TurnadoA ='$AreaId'";
        $Res      = $mysqli->query($Consulta);
    } else {
    }
}

mysqli_close($mysqli);
?>