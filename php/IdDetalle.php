<?php
session_start();
require_once("Conexion.php");
$Id = $_POST["IdRep"];
$mysqli      = getConnSec();
$query       = "select IdDetalle from turno_detalle where FkTurno = '$Id' and TurnadoA = ".$_SESSION['Area']." ";
$result      = $mysqli->query($query);
$row         = mysqli_fetch_array($result, MYSQLI_ASSOC);
$Numero      = $row["IdDetalle"];
echo $Numero;
 ?>