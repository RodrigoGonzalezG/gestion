<?php
require_once("Conexion.php");
$mysqli = getConnSec();

$Id       = $_POST['IdArea'];
$Nombre   = $_POST['NombreArea'];
$Activo   = $_POST['Activo'];
$Cantidad = $_POST['CantRe'];

$query = "Update cat_area set IdArea = '$Id', NombreArea = '$Nombre', Activo = '$Activo' where IdArea = '$Id'";

$resultado = $mysqli->query($query);

for ($x = 1; $x <= $Cantidad; $x++) {
                $Nombre         = "RNombre" . $x;
                $Cargo          = "RCargo" . $x;
                $ActivoR        = "RActivo" . $x;
                $Responsable    = "Responsable" . $x;
                $RNombre        = $_POST[$Nombre];
                $RCargo         = $_POST[$Cargo];
                $RActivo        = $_POST[$ActivoR];
                $RResponsable   = $_POST[$Responsable];
                
                $Query2   = "Update responsable_area set NombreResponsable = '$RNombre', CargoResponsable = '$RCargo', Activo = '$RActivo' where IdResponsable = '$RResponsable'";
                $Ejecutar = $mysqli->query($Query2);

}

mysqli_close($mysqli);
?>
