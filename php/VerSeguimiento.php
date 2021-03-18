<?php
include('Conexion.php');
$conexion ="";
$mysqli = getConnSec();
$Folio = $_POST['Fo'];
$consulta = mysqli_query($mysqli, "Select * from seguimiento_detalle where FkDetalle = '$Folio'");
if (mysqli_num_rows($consulta) > 0)
{
    while($row = mysqli_fetch_array($consulta))          
    {
		echo "<tr>";
		echo "<td>".$row['Seguimiento']."</td>";
		echo "<td>".$row['FechaCapturo']."</td>";
		echo "</tr>";
	}
}
else
{
	echo "<tr><td colspan='6'>Sin contenido</td></tr>";
}
?>
