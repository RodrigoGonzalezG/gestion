<?php
session_start();
require_once("Conexion.php");
$mysqli      = getConnSec();
$Seguimiento = $_POST['Seguimiento'];
$Id          = $_POST['IdDetalle'];
$Fecha       = $_POST['Fecha'];
$query       = "select max(IdSeguimiento) as NumMaximo from seguimiento_detalle";
$result      = $mysqli->query($query);
$row         = mysqli_fetch_array($result, MYSQLI_ASSOC);
$IdPK        = $row["NumMaximo"] + 1;
$query       = "INSERT INTO seguimiento_detalle VALUES ('$IdPK','$Id', '$Seguimiento', '$Fecha')";
echo $query;
$resultado = $mysqli->query($query);
mysqli_close($mysqli);
?>