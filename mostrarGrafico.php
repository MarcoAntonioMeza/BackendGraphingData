<?php 
include("inc/consulta.php");
if($_POST){
$val=$_REQUEST['municipioHM'];
$datos=explode(",", $val);
$grafico=$_REQUEST['grafico'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <?php 
    if($grafico=="HM")
        echo "<title>Hombres y Mujeres</title>";
    else
        echo "<title>Personas escolarizadas</title><br/>";
        
    ?>
    
</head>
<body>
    <?php
    if($grafico=="HM"){
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <h3>Total de Hombres y Mujeres en el municipio de <?php echo  $datos[1];?></h3>
                <br>
                <h3>Código del municipio <?php echo  $datos[0];?></h3>
                <?php
                $json=municipioHM($datos[0]);
                if($json){
                    echo $json[0]." ".$json[1];
                }
                else{
                    echo "Error";
                }
                ?>
                

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php 
    //Fin del IF
    }else{
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <h3>Total de personas escolarizadas en el municipio de <?php echo  $datos[1];?></h3>
                <br>
                <h3>Código del municipio <?php echo  $datos[0];?></h3>
                <?php
                $json=escolaridad($datos[0]);
                if($json){
                    
                    echo "<br/><h4>Porcentaje de personas de 15 años y más alfabetas</h4>";
                    echo "<h4>".$json."</h4>";
                }
                else{
                    echo "Error";
                }
                ?>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

<?php 
}
echo "</body>";
echo "</html>";
}?>