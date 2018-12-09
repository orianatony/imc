<?php

include_once('scriptConexion.php');

$peso = $_POST['peso'];
$estatura = $_POST['estatura'];
$edad = $_POST['edad'];
$nivel_actividad = $_POST['nivel_actividad'];
$sexo = $_POST['sexo'];


$sql = "SELECT * FROM tmb_formula WHERE id_sexo = " . $sexo;

$result = $conn->query($sql);

if (!$result) {
    die($conn->error);
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $factores = array(
            "factor1" => $row['factor_1'],
            "factor2" => $row['factor_2'],
            "factor3" => $row['factor_3'],
            "factor4" => $row['factor_4'],
        );
    }
    $tmb = (($factores['factor1']*$peso)+($factores['factor2']*$estatura)+($factores['factor3']*$edad)+$factores['factor4']);

    //Consulta factor en base a nivel de actividad
    $query_factor_n_a =  "SELECT factor FROM tmb WHERE id = " . $nivel_actividad;
    $result2 = $conn->query($query_factor_n_a);
    if ($result->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $factor_nivel_actividad = $row['factor'];
        }
    }

    //Calculo calorias
    $num_calorias = $tmb * $factor_nivel_actividad;
    $output = array(
        "tmb"=> $tmb,
        "num_calorias" => $num_calorias
    );
}else{
    $output = array("error" => true);
}

echo json_encode($output);