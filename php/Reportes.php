<?php
include("Conexion.php");
$mysqli = getConnSec();
$Dato   = $_POST["Parametro"];
$Anio   = $_POST["Parametro2"];
$Mes    = $_POST["Parametro3"];
$Clas   = $_POST["Clasificacion"];
$Area   = $_POST["Areas"];
$Opc1   = "";
$Opc2   = "";
$Opc3   = "";
$Opc4   = "";
$Opc5   = "";
//Recibe los Check
if(isset($_POST["Opcion1"])){
    $Opc1   = $_POST["Opcion1"];
}
if(isset($_POST["Opcion2"])){
    $Opc2   = $_POST["Opcion2"];
}
if(isset($_POST["Opcion3"])){
    $Opc3   = $_POST["Opcion3"];
}
if(isset($_POST["Opcion4"])){
    $Opc4   = $_POST["Opcion4"];
}
if(isset($_POST["Opcion5"])){
    $Opc5   = $_POST["Opcion5"];
}



$filtro = array();
$filtroEspecial = "";

if($Opc1 == "on"){
    $filtro[1] = "Remitente = '$Dato'"; 
}

if($Opc2 == "on"){
    $filtro[2] = "month(Fecha_registro) = '$Mes'"; 
}

if($Opc3 == "on"){
    $filtro[3] = "Clasificacion = '$Clas'"; 
}
if($Opc4 == "on"){
    $filtroEspecial = "INNER JOIN turno_detalle on turno.IdTurno = turno_detalle.FkTurno where TurnadoA = '$Area' AND ";
}

if($Opc5 == "on"){
    $filtro[5] = "year(Fecha_registro) = '$Anio'";
}
$Filtros ="";

if(count($filtro) > 0) {
    $Filtros .= implode(" AND ", $filtro);
}
if($Opc4 == "on"){
    $Sql = "SELECT * FROM turno $filtroEspecial $Filtros ORDER BY IdTurno";
}else{
    $Sql = "SELECT * FROM turno WHERE $Filtros ORDER BY IdTurno";
}

$array = array();
$datosArray = array();
$result = mysqli_query($mysqli,$Sql);
while($row = mysqli_fetch_array($result))
    {
        $x = 0;
        $array = array();
        $array["Turno"] = $row['NumTurno'];                                                
        $array["Asunto"] = $row['Asunto'];                                                
        $array["Clasificacion"] = $row['Clasificacion'];                                                
        $array["Fecha registro"] = $row['Fecha_registro'];                                                
        $array["Num de oficio"] = $row['NumOficio'];                                                
        $array["Vo entrada"] = $row['VoSg'];                                                
        $array["Vo salida"] = $row['VoSalida'];                                                
        $array["Estatus"] = $row['Estatus'];                                                
        $array["Fecha limite"] = $row['FechaLimite'];                                                
        $array["Remitente"] = $row['Remitente'];                                                
        $array["Cargo"] = $row['CargoRemitente'];                                                

        if($Opc4 == "on"){
        
            $re = mysqli_query($mysqli, "Select * from turno_detalle inner join cat_area on idArea = TurnadoA where FkTurno = ".$row['IdTurno']." and TurnadoA = '$Area' ");
        
        }else{
        
            $re = mysqli_query($mysqli, "Select * from turno_detalle inner join cat_area on idArea = TurnadoA where FkTurno = ".$row['IdTurno']." ");
        }

        $a = 1;
                
        while($Fi = mysqli_fetch_array($re)){
            if (mysqli_num_rows($re) > 0){
                $array["Turnado A:"] = "Turnado A:";
                $array[$a.".-"."Turnado A"] = $Fi['NombreArea'];
                $array[$a.".-"."Respuesta"] = $Fi['Respuesta'];
                $a++;
            }

            $res = mysqli_query($mysqli, "Select * from seguimiento_detalle where FkDetalle = ".$Fi['IdDetalle']." ");
                if (mysqli_num_rows($res) > 0){
                    $b = 1;
                    while($Fila = mysqli_fetch_array($res)){    
                        $array["Seguimiento:"] = "Seguimiento";
                        $array[$b.".-"."Seguimiento"] = $Fila['Seguimiento'];
                        $array[$b.".-"."Fecha seguimiento"] = $Fila['FechaCapturo'];
                        $b++;
                    }
                }
            }
        array_push($datosArray,$array);
    }
echo json_encode($datosArray);
?>
