<?php 
/**
 * Recibe como parametro el string de la url a consultar 
 * Devuelve un JSON  
 */
function consulta($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT,"useragentvalue");
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res,1);
}
/**
 * Recibe como parametro la clave del municipio
 * Regresa un array con los valores de  mujeres y hombres totales por municipio
 *  En la posición 0 esta el valor de los hombres y en la posición 1 el valor de mujeres  
 */
function municipioHM($claveMunicipo){
    $key ="d2d25f1c-7c9e-cb75-aee5-93d58e13c23c";
    
    $url="https://www.inegi.org.mx/app/api/indicadores/desarrolladores/jsonxml/INDICATOR/1002000002,1002000003/es/".$claveMunicipo."/true/BISE/2.0/".$key."?type=json";
    $json=consulta($url);
    $array=[];
    $j=0;
    foreach ($json['Series'] as $key ) {
        $array[$j]= floatval($key['OBSERVATIONS'][0]['OBS_VALUE']);
        $j++;
    }
    return $array;
}  

/**
 * Recibe como paramero un string referente a la clave del municipio
 * Regresa un String con el grado promedio de escolaridad de la población de 15 y más del municipio 
 */
function escolaridad($claveMunicipo){
    $key ="d2d25f1c-7c9e-cb75-aee5-93d58e13c23c";
    
    $url="https://www.inegi.org.mx/app/api/indicadores/desarrolladores/jsonxml/INDICATOR/1005000038/es/"
    .$claveMunicipo."/true/BISE/2.0/".$key."?type=json";
    
    $json=consulta($url);

    return $json['Series'][0]['OBSERVATIONS'][0]['OBS_VALUE'];
    
}  

/**
 * Recibe como parametro un String LatLng que hace referencia a la latitud y longitud del municipio.
 * Recibe como paramtro un String con el giro economico
 * Muestra una tabla con la informacion del giro 
 */
function economia($latLtn,$giro){
    $token="d2d25f1c-7c9e-cb75-aee5-93d58e13c23c";
    
    $url="https://www.inegi.org.mx/app/api/denue/v1/consulta/Buscar/".$giro."/".$latLtn."/500/".$token;
    $json =consulta($url);
    if($json){
        //echo $json;
        if ($json){

        }
        echo $url;
        echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Calle</th>
                <th scope="col">CP</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($json as $a) {
            echo "
                <tr>
                    <td scope='col'>".$a["Nombre"]."</td>
                    <td scope='col'>".$a["Ubicacion"]."</td>
                    <td scope='col'>".$a["Calle"]."</td>
                    <td scope='col'>".$a["CP"]."</td>
                </tr>";
        }
        echo'</tbody>
    </table>';   
    }else{
        echo "¡SIN RESULTADOS!";
    }  
} 
?>