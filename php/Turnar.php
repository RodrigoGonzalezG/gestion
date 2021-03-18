<?php
session_start();
require_once("Conexion.php");
error_reporting(0);
$mysqli   = getConnSec();
$Cantidad = $_POST['CantArea'];
$NumTurno = $_POST['NumTurno'];
$Resp     = "";
$Funcion  = "0";
$Cons     = "SELECT IdDetalle FROM turno_detalle ORDER BY IdDetalle DESC LIMIT 1";
$Res      = $mysqli->query($Cons);
$Fila     = mysqli_fetch_array($Res, MYSQLI_ASSOC);
for ($x = 1; $x <= $Cantidad; $x++) {
                
                $Num      = "Turnado" . $x;
                $Turno    = $_POST[$Num];
                $variable = ($Turno == "on") ? "Si" : "No";
                if ($variable == "Si") {
                                
                                $IdArea  = "IdArea" . $x;
                                $An      = "Anexo" . $x;
                                $Obs     = "Obs" . $x;
                                $Area    = $_POST[$IdArea];
                                $Obser   = $_POST[$Obs];
                                $Anexo   = $_POST[$An];
                                $query   = "SELECT COUNT(FkTurno) AS Numero FROM turno_detalle WHERE FkTurno = '$NumTurno' AND TurnadoA = '$Area'";
                                $result  = $mysqli->query($query);
                                $row     = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $Turnado = $row["Numero"];
                                if ($Turnado == "0") {
                                                $Mayor     = $Fila["IdDetalle"] + 1;
                                                $query     = "INSERT INTO turno_detalle VALUES ('$Mayor','$NumTurno', '$Area','$Resp','$Anexo','$Obser')";
                                                $resultado = $mysqli->query($query);
                                } else {
                                                
                                                $query  = "select * from cat_area where IdArea = '$Area'";
                                                $result = $mysqli->query($query);
                                                $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                                $Areab .= "\n" . $row["NombreArea"] . "\n";
                                                $Funcion = "1";
                                }
                }
}

if ($Funcion == "1") {
                
                echo $Areab;
}
mysqli_close($mysqli);
?>