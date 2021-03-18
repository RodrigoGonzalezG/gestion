<?php
session_start();
require_once("Conexion.php");
$mysqli      = getConnSec();
$IdArea      = $_POST['IdArea'];
$Nombre      = $_POST['NombreResp'];
$Cargo       = $_POST['CargoResp'];

$query = "select max(IdResponsable) as NumMaximo from responsable_area";

$result  = $mysqli->query($query);
$row     = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Id      = $row["NumMaximo"];
$Resp = $Id + 1;

$query = "INSERT INTO responsable_area VALUES ('$Resp', '$IdArea', '$Nombre', '$Cargo','1')";

$resultado = $mysqli->query($query);
echo $query;
mysqli_close($mysqli);
?>