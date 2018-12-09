<?php

function getNivelActividad(){
    $output = array();
    include_once('scriptConexion.php');
    $sql = "SELECT id,nombre,descripcion FROM tmb";
    $result = $conn->query($sql);

    if (!$result) {
        die($conn->error);
    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tmb = array("id"=>$row['id'],"nombre" => $row['nombre'],"descripcion" => $row['descripcion']);
            array_push($output,$tmb);
        }
    }else{
        $output = array("error" => true);
    }

   return $output;
}