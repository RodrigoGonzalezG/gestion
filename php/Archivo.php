<?php
$file = $_GET['Ruta'];
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $file . '"');
readfile($file);
?>
