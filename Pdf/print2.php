<?php
//$dato = $_GET["Id"];
$Cantidad = $_GET["Cantidad"];
$Filtro ="";
$Fil;
$ArregloDato;
for($x=1; $x <= $Cantidad; $x++){
    $var = "Id".$x;
    $dato = $_GET[$var];
    $ArregloDato[$x] = $dato;     
    if($Cantidad == $x){
        
        $Filtro = $dato;
        
    }else{
        
        $Filtro = $dato .",";
            
    }
    $Fil .= $Filtro;
    
}
ob_start();
?>
<style>
    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    img.logo {
        width: 30%;
        position: absolute;
        left: 5%;
        top: -13px;
    }

    img.logob2 {
        width: 30%;
        position: relative;
        left: 5%;
        top: -5px;
    }


    label.Pie {
        position: absolute;
        left: 37%;
        font-size: 20px;
        top: -57px;
    }

    label.PieB {
        position: relative;
        left: 1.5%;
        font-size: 20px;
        top: -45px;
    }

    label.Pie2 {
        position: absolute;
        left: 37%;
        font-size: 10px;
        top: -25px;
    }

    label.Pie2B {
        position: relative;
        left: -12.5%;
        font-size: 10px;
        top: -10px;
    }

    label.Pie3 {
        position: absolute;
        right: 33.5%;
        font-size: 10px;
        top: 14px;
    }

    label.Pie3B {
        position: relative;
        left: 12.2%;
        font-size: 10px;
        top: -10px;
    }

    label.Pie4 {
        position: absolute;
        left: 4%;
        font-size: 10px;
        top: 14px;
    }

    label.Pie4B {
        position: relative;
        left: -76%;
        font-size: 10px;
        top: 30px;
    }

    label.Pie5 {
        position: absolute;
        right: 63.2%;
        font-size: 10px;
        top: 14px;
    }

    label.Pie5B {
        position: relative;
        left: 10%;
        font-size: 12px;
        top: 30px;
    }

    label.Pie6 {
        position: absolute;
        right: 30%;
        font-size: 20px;
        top: -35px;
        font-weight: bold;
    }


    table.entrega {
        width: 100%;
        margin: auto;
        font-size: 10px;
        margin-top: 5px;
    }

    table.entrega1 {
        table-layout: fixed;
        width: 250px;
    }

    .celdas {}

    .letra {
        font-weight: bold;
    }

    .Borde {
        border-collapse: collapse;
        border: 1px solid black;
    }

</style>

<?php
$As = "";
include("../php/Conexion.php");
$mysqli = getConnSec();
$Posicion = 0;
$sql_imp_salida   = "SELECT * FROM ReporteA where IdTurno in(".$Fil.") order by IdTurno";
$query_imp_salida = mysqli_query($mysqli, $sql_imp_salida);
while ($row = mysqli_fetch_array($query_imp_salida)) {
$Posicion ++;    
?>

<page class="fondo">
    <img class="logo" src="../Img/Logo-cdmx-new.png" />
    <label class="Pie"><span class="letra">Volante de turno:</span>&nbsp;<?php echo $row['NumTurno']; ?></label>
    <label class="Pie2"><span class="letra">Fecha de entrada:</span>&nbsp;<?php echo $row['FechaRecibido'];?></label>
    <label class="Pie3"><span class="letra">Prioridad:</span>&nbsp;<?php echo $row['Estatus'];?></label>
    <label class="Pie4"><span class="letra">Destinatario:</span><?php echo $row['NombreResponsable'];?></label>
    <label class="Pie5"><span class="letra">No. de oficio:</span><?php echo $row['NumOficio'];?></label>
    <label class="Pie6">ACUSE</label>

    <table class="entrega">
        <tr>
            <td rowspan="6" style="border:1px; width: 30.5%;">
                <span class="letra">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Recibido</span>
                <br><br><br><br><br><br><br>
                <hr>
                <span style="font-size:12.4px;" class="letra">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre, firma, fecha y hora</span>
            </td>
            <td style="width: 62.5%;"><span class="letra">Atención:</span> <?php echo $row['TipoAtencion'];?></td>
        </tr>
        <tr>
            <td><span class="letra">Otro tipo de atención:</span> <?php echo $row['OtroAtencion'];?></td>
        </tr>
        <tr>
            <td><span class="letra">Clasificación:</span> <span style="font-size:9px;"><?php echo $row['Clasificacion'];?></span></td>
        </tr>
        <tr>
            <td><span class="letra">Volante SG:</span> <?php echo $row['VoSg'];?></td>
        </tr>
        <tr>
            <td><span class="letra">Volante SG salida:</span> <?php echo $row['VoSalida'];?></td>
        </tr>
    </table>

    <table class="entrega" style="border:1px;">
        <tr>
            <td><span class="letra">Remite:</span></td>
            <td style="width:87.2%;text-align:left;"><span class="letra"><?php echo $row['Remitente'];?></span></td>
        </tr>
        <tr>
            <td><span class="letra">Cargo:</span></td>
            <td style="width:87.2%;text-align:left;"><span class="letra" style="font-size:8px;"><?php echo $row['CargoRemitente'];?></span></td>
        </tr>
        <tr>
            <td><span class="letra">Alcaldia:</span></td>
            <td style="width:87.2%;text-align:left;"><span class="letra" style="font-size:8px;"><?php echo $row['Promotor'];?></span></td>
        </tr>
    </table>

    <table class="entrega Borde" style="border:1px;">
        <tr>
            <th style="text-align:center;width:20%;" class="Borde">Turnado a</th>
            <th style="text-align:center;width:41.2%;" class="Borde">Respuesta</th>
            <th style="text-align:center;width:31%;" class="Borde">Observaciones</th>
        </tr>
        <?php
    $Sql   = "SELECT * FROM ReporteB where FkTurno = '$ArregloDato[$Posicion]'";
    $Query = mysqli_query($mysqli, $Sql);
    while ($row2 = mysqli_fetch_array($Query)) {
        echo "<tr>
        <td style='text-align:center;width:20%;'class='Borde'>" . $row2['NombreArea'] . "</td>
        <td style='text-align:center;width:40%;'class='Borde'>" . $row2['Respuesta'] . "</td>
        <td style='text-align:center;width:32.5%;'class='Borde'>" . $row2['Observaciones'] . "</td>
        </tr>
        ";
    }
?>
    </table>
    <div style="position: relative; width:100%;">
        <table class="entrega" style="border:1px;">
            <tr>
                <td style="width:93.5%;text-align:left;"><span class="letra">Asunto:</span></td>
            </tr>
            <tr>
                <td style="width:90%;text-align:left; font-size:12px;" class="break"><?php echo $row['Asunto'];?>
                </td>
            </tr>
        </table>
    </div>

    <hr style="border:2px dashed black;top:42%;position:absolute">

    <img class="logob2" src="../Img/Logo-cdmx-new.png" />
    <label class="PieB"><span class="letra">Volante de turno:</span>&nbsp;<?php echo $row['NumTurno'];?></label>
    <label class="Pie2B"><span class="letra">Fecha de entrada:</span>&nbsp;<?php echo $row['FechaRecibido'];?></label>
    <label class="Pie3B"><span class="letra">Prioridad:</span>&nbsp;<?php echo $row['Estatus'];?></label>
    <label class="Pie4B"><span class="letra">Destinatario:</span><?php echo $row['NombreResponsable'];?></label>
    <label class="Pie5B"><span class="letra">No. de oficio:</span><?php echo $row['NumOficio'];?></label>
    <table class="entrega">
        <tr>
            <td rowspan="6" style="border:1px; width: 30.5%;">
                <span class="letra">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Recibido</span>
                <br><br><br><br><br><br><br>
                <hr>
                <span class="letra" style="font-size:12.4px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre, firma, fecha y hora</span>
            </td>
            <td style="width: 62.5%;"><span class="letra">Atención:</span> <?php echo $row['TipoAtencion'];?></td>
        </tr>
        <tr>
            <td><span class="letra">Otro tipo de atención:</span> <?php echo $row['OtroAtencion'];?></td>
        </tr>
          <tr>
            <td><span class="letra">Clasificación:</span> <span style="font-size:9px;"><?php echo $row['Clasificacion'];?></span></td>
        </tr>
        <tr>
            <td><span class="letra">Volante SG:</span> <?php echo $row['VoSg'];?></td>
        </tr>
        
        <tr>
            <td><span class="letra">Volante SG salida:</span> <?php echo $row['VoSalida'];?></td>
        </tr>
    </table>


    <table class="entrega" style="border:1px;">
        <tr>
            <td><span class="letra">Remite:</span></td>
            <td style="width:87.2%;text-align:left;"><span class="letra"><?php echo $row['Remitente'];?></span></td>
        </tr>
        <tr>
            <td><span class="letra">Cargo:</span></td>
            <td style="width:87.2%;text-align:left;"><span class="letra" style="font-size:8px;"><?php echo $row['CargoRemitente'];?></span></td>
        </tr>
    </table>
    <table class="entrega Borde" style="border:1px;">
        <tr>
            <th style="text-align:center;width:20%;" class="Borde">Turnado a</th>
            <th style="text-align:center;width:41.2%;" class="Borde">Respuesta</th>
            <th style="text-align:center;width:31%;" class="Borde">Observaciones</th>
        </tr>
        <?php
    $Sql   = "SELECT * FROM ReporteB where FkTurno = '$ArregloDato[$Posicion]'";
    $Query = mysqli_query($mysqli, $Sql);
    while ($row2 = mysqli_fetch_array($Query)) {
        echo "<tr>
        <td style='text-align:center;width:20%;'class='Borde'>" . $row2['NombreArea'] . "</td>
        <td style='text-align:center;width:40%;'class='Borde'>" . $row2['Respuesta'] . "</td>
        <td style='text-align:center;width:32.5%;'class='Borde'>" . $row2['Observaciones'] . "</td>
        </tr>
        ";
    }
?>
    </table>
    <div style="position: relative; width:100%;">
        <table class="entrega" style="border:1px;">
            <tr>
                <td style="width:93.5%;text-align:left;"><span class="letra">Asunto:</span></td>
            </tr>
            <tr>
                <td style="width:90%;text-align:left; font-size:12px;" class="break"><?php echo $row['Asunto'];?>
                </td>
            </tr>
        </table>
    </div>
</page>


<?php
}
?>

<?php
$content = ob_get_clean();
require '../mpdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(15,0,0,0));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('PDF-CF.pdf');
}
catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
