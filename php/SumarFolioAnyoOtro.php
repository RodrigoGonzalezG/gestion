<?php
session_start();
require_once("Conexion.php");
$mysqli      = getConnSec();
$anyo        = $_POST["fecha"];
$query       = "SELECT NumTurno FROM turno WHERE year(Fecha_registro) = '$anyo' ORDER BY NumTurno DESC LIMIT 1";
$result      = $mysqli->query($query);
$row         = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Numero      = $row["NumTurno"];
$Numero      = $Numero + 1;
echo $Numero;
 ?>