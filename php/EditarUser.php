<?php
require_once("Conexion.php");
$mysqli = getConnSec();

$Id       = $_POST['IPersona'];
$Nombre   = $_POST['NPersona'];
$Alias    = $_POST['NAlias'];
$Pass     = $_POST['Password'];
$Correo   = $_POST['Correo'];
$Tipo     = $_POST['TipoU'];
$Activo   = $_POST['Activo'];
$IdArea   = $_POST['IdArea'];
$query    = "Update cat_usuario set Nombre = '$Nombre', FkArea = '$IdArea', UserName = '$Alias', Password = '$Pass', Activo = '$Activo', Correo = '$Correo', TipoUser = '$Tipo' where idUsuario = '$Id'";
echo $query;
$resultado = $mysqli->query($query);


mysqli_close($mysqli);
?>
