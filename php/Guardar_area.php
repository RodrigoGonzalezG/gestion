<?php
require_once("Conexion.php");
$mysqli = getConnSec();
$Nombre = $_POST['NombreArea'];
$query  = "select max(IdArea) as NumMaximo from cat_area";
$result = $mysqli->query($query);
$row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Id     = $row["NumMaximo"];
$Id     = $Id + 1;

$query = "INSERT INTO cat_area VALUES ('$Id', '$Nombre')";

$resultado = $mysqli->query($query);
mysqli_close($mysqli);
?>