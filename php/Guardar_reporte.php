<?php
session_start();
require_once("Conexion.php");
$mysqli      = getConnSec();
$User        = $_SESSION['Id_usuario'];
$Nombre      = $_POST['NombreReporte'];
$FechaI      = $_POST['FechaInicio'];
$FechaT      = $_POST['FechaTermino'];
$Area        = $_POST['Area'];
$Responsable = $_POST['Reponsable'];
$Estatus     = $_POST['Estatus'];
$Comentario  = $_POST['Comentario'];
$FechaF      = "0000-00-00";
$query       = "select max(Id_reporte) as NumMaximo from reportes";
$result      = $mysqli->query($query);
$row         = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Id          = $row["NumMaximo"];
$Reporte     = $Id + 1;
$query       = "INSERT INTO reportes VALUES ('$Reporte', '$Nombre', '$FechaI', '$FechaT','$FechaF','$Area','$Responsable','$Estatus','$Comentario','$User')";

$resultado = $mysqli->query($query);

mysqli_close($mysqli);
?>