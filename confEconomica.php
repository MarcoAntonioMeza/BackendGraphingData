<?php
include("inc/consulta.php");
$cords = [
    "-1/--SEELCCIONA MUNICIPIO--",
    "19.04399000,-98.197495/PUEBLA",
    "19.2843100,-98.435516/SAN MARTIN TEXMELUCAN",
    "19.06248400,-98.30750600/SAN PEDRO CHOLULA",
    "19.050944,-98.30065600/SAN ANDRES CHOLULA",
    "19.04461300,-98.04491700/AMOZOC",
    "18.90884800,-98.43416800/ATLIXCO",
    "19.15899400,-98.40813100/HUEJOTZINGO",
    "18.97687300,-98.30254600/OCOYUCAN",
    "19.08934700,-98.27331000/CUAUTLANCINGO",
    "19.13110200,-98.30807400/CORONANGO",
    "19.33050400,-98.58239900/TLAHUAPAN",
    "19.11069500,-98.32903300/JUAN C. BONILLA",
    "18.90103300,-97.96913600/TECALI DE HERRERA",
    "18.99457400,-98.37923900/SANTA ISABEL CHOLULA",
    "19.05094700,-98.42773000/NEALTICAN",
    "19.07730200,-97.96661700/TEPATLAXCO DE HIDALGO",
    "18.76502000,-98.71529100/ACTEOPAN",
    "19.02668600,-98.34576600/SAN GREGORIO ATZOMPA",
    "19.10793800,-98.45923900/CALPAN",
    "19.32442700,-98.49816300/SAN MATIAS TLALANCALECA",
    "19.16830300,-98.30969900/SAN MIGUEL XOXTLA",
    "18.82256700,-97.91375000/ATOYATEMPAN",
    "18.82371200,-98.58264200/ATZITZIHUACAN",
    "19.20291400,-98.46825900/CHIAUTZINGO-",
    "18.78320500,-98.72048900/COHUECAN",
    "18.95571400,-98.01597600/CUAUTINCHAN",
    "19.14202900,-98.45750900/DOMINGO ARENAS",
    "18.77070800,-98.54153200/HUAQUECHULA",
    "20.10413800,-97.6249/HUEHUETLAN EL GRANDE",
    "18.76941600,-97.88083300/HUITZILTEPEC",
    "18.75852000,-98.10070100/LA MAGDALENA TLATLAUQUITEPEC",
    "18.80958700,-98.33140300/SAN DIEGO LA MESA TOCHIMILTZINGO",
    "19.23572500,-98.49545500/SAN FELIPE TEOTLALCINGO",
    "19.01441200,-98.40095700/SAN JERONIMO TECUANIPAN",
    "18.74609400,-98.02431500/SAN JUAN ATZOMPA",
    "19.07258900,-98.48569700/SAN NICOLAS DE LOS RANCHOS",
    "19.26902100,-98.51716600/SAN SALVADOR EL VERDE",
    "18.71325900,-98.26237100/TEOPANTLAN",
    "18.73560300,-98.62905500/TEPEMAXALCO",
    "18.72244900,-98.45028900/TEPEOJUMA",
    "18.97775900,-98.44821900/TIANGUISMANALCO",
    "19.17002300,-98.34431600/TLALTENANGO",
    "18.69614400,-98.53779400/TLAPANALA",
    "18.89292400,-98.57216600/TOCHIMILCO",
    "18.84122800,-98.04814300/TZICATLACOYAN",

];
$giro=["--SELECCIONA GIRO--",
        "RESTAURANTE",
        "CONSULTORIO",
        "ESCUELA",
        "FARMACIA",
        "ABARROTES",
        "MECANICO",
        "HOTEL"
    ];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-0"></div>
            <div class="col-md-4">
                <form name="economia" action="confEconomica.php" method="post">
                    <div class='form-group'>
                        <label for='tipo'>Municipio</label>
                        <select class='form-control' id='MunicipoHM' name='muni'>";
                            <?php
                            for ($i = 0; $i < count($cords); $i++) {
                                $datos = explode("/", $cords[$i]);
                                echo "<option value='" . $cords[$i] . "'>" . $datos[1] . "</option>";
                            }
                            ?>
                        </select>
                
                    </div>
                    <div class='form-group'>
                        <label for='tipo'>Giro</label>
                        <select class='form-control' id='giro' name='giro'>";
                            <?php
                            for ($i = 0; $i < count($giro); $i++) {
                                
                                echo "<option value='" . $giro[$i] . "'>" . $giro[$i] . "</option>";
                            }
                            ?>
                        </select>
                        
                        <input type="submit" class="btn btn-primary" value="Mostrar">
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <?php
                if ($_POST) {
                    $data = $_POST['muni'];
                    $coordenadas = explode("/", $data);
                    $giroF=$_POST['giro'];
                    try{
                        economia($coordenadas[0],$giroF);
                    }
                    catch(Exception $e){
                        echo "".$e->getMessage();
                    }
                    
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>