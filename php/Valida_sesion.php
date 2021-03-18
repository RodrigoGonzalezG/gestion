<?php
session_start();
include("Conexion.php");
$username = "";
$password = "";
$username = $_POST['user'];
$password = $_POST['pass'];
$sql2     = mysqli_query(getConnSec(), "SELECT idUsuario, Nombre, UserName, Password, cat_usuario.Activo, FkArea, TipoUser, correo, IdArea, NombreArea FROM cat_usuario inner join cat_area on FkArea = IdArea WHERE UserName='$username'");
if ($f2 = mysqli_fetch_assoc($sql2)) {
                if ($password == $f2['Password']) {
                                $_SESSION['Id_usuario']     = $f2['idUsuario'];
                                $_SESSION['Usuario']        = $f2['UserName'];
                                $_SESSION['Nombre_persona'] = $f2['Nombre'];
                                $_SESSION['Password']       = $f2['Password'];
                                $_SESSION['Activo']         = $f2['Activo'];
                                $_SESSION['Tipo']           = $f2['TipoUser'];
                                $_SESSION['Area']           = $f2['FkArea'];
                                $_SESSION['NArea']          = $f2['NombreArea'];
                                $_SESSION['Mensaje']        = "Si";
                                if ($_SESSION['Activo'] == "Si") {
                                                echo "1";
                                } else {
                                                echo "2";
                                }
                } else {
                                echo "3";
                }
} else {
                echo "4";
                
}

?>