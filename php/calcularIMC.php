<?php

include_once('scriptConexion.php');

$peso = $_POST['peso'];
$estatura = $_POST['estatura'];


$imc = $peso/($estatura*$estatura);

$sql = "SELECT clasificacion,grado FROM imc WHERE " . $imc . " BETWEEN min_value and max_value";

$result = $conn->query($sql);

if (!$result) {
    die($conn->error);
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $output = array("error" => false,"clasificacion" => $row['clasificacion'],"grado" => $row['grado'],"imc"=>$imc);
    }
}else{
	$output = array("error" => true);
}

echo json_encode($output);