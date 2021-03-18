<?php
session_start();
require_once("Conexion.php");
$mysqli = getConnSec();

$return = Array(
    'ok' => TRUE
);

$TurnoN         = $_POST['TurnoN'];
$AT             = $_POST['AT'];
$Area           = $_SESSION['Area'];
$upload_folder  = "/adjunto";
$Ru = '../adjunto';
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo   = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
$tmp_archivo    = $_FILES['archivo']['tmp_name'];
$archivador     = $Ru  . '/' . $nombre_archivo;
$archivador2    = $upload_folder  . '/' . $nombre_archivo;
$Ruta           = $archivador2;
$Var            = "";
if (!move_uploaded_file($tmp_archivo, $archivador)) {
    
    $return = Array(
        'ok' => FALSE,
        'msg' => "Ocurrio un error al subir el archivo. No pudo guardarse.",
        'status' => 'error'
    );
}
if ($nombre_archivo != "") {
    $query = "INSERT INTO digitalizados VALUES ('$TurnoN', '$Ruta', '$nombre_archivo', '$AT','$Area')";
    
    $resultado = $mysqli->query($query);
    $Var       = "Si";
} else {
    $Var = "No";
}

echo $Var;
?>