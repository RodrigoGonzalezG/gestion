<?php
session_start();
require_once("Conexion.php");
$mysqli      = getConnSec();
ini_set('date.timezone', 'America/Mexico_City');
$fecha_local = date('Y');
$query       = "SELECT NumTurno FROM turno WHERE year(Fecha_registro) = '$fecha_local' ORDER BY NumTurno DESC LIMIT 1";
$result      = $mysqli->query($query);
$row         = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Numero      = $row["NumTurno"];
$Numero      = $Numero + 1;
echo $Numero;
 ?>