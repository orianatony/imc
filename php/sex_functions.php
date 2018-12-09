<?php

function getSexos(){
    $output = array();
    include_once('scriptConexion.php');
    $sql = "SELECT * FROM sexo";
    $result = $conn->query($sql);

    if (!$result) {
        die($conn->error);
    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $sexo = array("id"=>$row['id'],"nombre" => $row['nombre']);
            array_push($output,$sexo);
        }
    }else{
        $output = array("error" => true);
    }

    return $output;
}