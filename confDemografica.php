<?php 
$claves=[
    "-1,--SELECCIONA MUNICIPIO--",
    "070000210114,PUEBLA",
    "070000210132,SAN MARTIN TEXMELUCAN",
    "070000210140,SAN PEDRO CHOLULA",
    "070000210119,SAN ANDRES CHOLULA",
    "070000210015,AMOZOC",
    "070000210019,ATLIXCO",
    "070000210074,HUEJOTZINGO",
    "070000210106,OCOYUCAN",
    "070000210041,CUAUTLANCINGO",
    "070000210034,CORONANGO",
    "070000210180,TLAHUAPAN",
    "070000210090,JUAN C. BONILLA",
    "070000210153,TECALI DE HERRERA",
    "070000210148,SANTA ISABEL CHOLULA",
    "070000210102,NEALTICAN",
    "070000210163,TEPATLAXCO DE HIDALGO",
    "070000210005,ACTEOPAN",
    "070000210125,SAN GREGORIO ATZOMPA",
    "070000210026,CALPAN",
    "070000210134,SAN MATIAS TLALANCALECA",
    "070000210136,SAN MIGUEL XOXTLA",
    "070000210020,ATOYATEMPAN",
    "070000210022,ATZITZIHUACAN",
    "070000210048,CHIAUTZINGO",
    "070000210033,COHUECAN",
    "070000210040,CUAUTINCHAN",
    "070000210060,DOMINGO ARENAS",
    "070000210069,HUAQUECHULA",
    "070000210073,HUEHUETLAN EL GRANDE",
    "070000210079,HUITZILTEPEC",
    "070000210095,LA MAGDALENA TLATLAUQUITEPEC",
    "070000210121,SAN DIEGO LA MESA TOCHIMILTZINGO",
    "070000210122,SAN FELIPE TEOTLALCINGO",
    "070000210126,SAN JERONIMO TECUANIPAN",
    "070000210131,SAN JUAN ATZOMPA",
    "070000210138,SAN NICOLAS DE LOS RANCHOS",
    "070000210143,SAN SALVADOR EL VERDE",
    "070000210159,TEOPANTLAN",
    "070000210165,TEPEMAXALCO",
    "070000210166,TEPEOJUMA",
    "070000210175,TIANGUISMANALCO",
    "070000210181,TLALTENANGO",
    "070000210185,TLAPANALA",
    "070000210188,TOCHIMILCO",
    "070000210193,TZICATLACOYAN"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>API-INEGI</title>
</head>
<body>
    <div class="container">

        <div class="row">
        
            <div class="col-md-4 text-center">
                <p>Hombres y mujeres</p>
            </div>
            <div class="col-md-4 text-center">
                <form  name=" demografia" action="mostrarGrafico.php" method="post">
                <input type="hidden" name="grafico" value="HM">
                    <div class='form-group'>
                        <label for='tipo'>Municipio</label>
                        <select class='form-control' id='MunicipoHM' name='municipioHM'>";
                            <?php 
                            for($i=0;$i<count($claves);$i++){
                                $datos=explode(",", $claves[$i]);
                                echo "<option value='$claves[$i]'>".$datos[1]."</option>";
                            }
                            ?>
                        </select>
                        
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <input type="submit" class="btn btn-primary" name="mostrarDemo" value="Mostrar">
                </form>
                </div>
        
        </div>
        
        <div class="row">
            <div class="col-md-4 text-center">
                <p>Personas escolaridadas</p>
            </div>
            <div class="col-md-4 text-center">
                <form  name=" demografia" action="mostrarGrafico.php" method="post">
                <input type="hidden" name="grafico" value="escolaridad">
                    <div class='form-group'>
                        <label for='tipo'>Municipio</label>
                        <select class='form-control' id='MunicipoHM' name='municipioHM'>";
                            <?php 
                            for($i=0;$i<count($claves);$i++){
                                $datos=explode(",", $claves[$i]);
                                echo "<option value='$claves[$i]'>".$datos[1]."</option>";
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="col-md-4 text-center">
                <input type="submit" class="btn btn-primary" name="mostrarDemo" value="Mostrar">
            </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <?php 
                if($_POST){
                    $val=$_REQUEST['municipioHM'];
                    $datos=explode(",", $val);
                    echo $datos[1]."<br/>".$datos[0];    
                }
            ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>