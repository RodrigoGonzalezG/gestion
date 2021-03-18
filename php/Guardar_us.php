<?php
require_once("Conexion.php");
$mysqli = getConnSec();

$Nombre = $_POST['NPersona'];
$Nick   = $_POST['NAlias'];
$Pass   = $_POST['Password'];
$Correo = $_POST['Correo'];
$Tipo   = $_POST['TipoU'];
$Area   = $_POST['Area'];
if ($_POST['Activo'] == 'on') {
    $Activo = "Si";
} else {
    $Activo = "No";
}

$query  = "select count(idUsuario) as Numero from cat_usuario where UserName = '$Nick'";
$result = $mysqli->query($query);
$row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Numero = $row["Numero"];
if ($Numero == "0") {
    $query     = "select max(idUsuario) as NumMaximo from cat_usuario";
    $result    = $mysqli->query($query);
    $row       = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $Id        = $row["NumMaximo"];
    $Id        = $Id + 1;
    $query     = "INSERT INTO cat_usuario VALUES ('$Id','$Nombre', '$Nick', '$Pass', '$Activo', '$Area', '$Tipo','$Correo')";
    $resultado = $mysqli->query($query);
    echo "Ok";
} else {
    echo "Error";
}
mysqli_close($mysqli);
?>