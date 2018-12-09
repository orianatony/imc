<?php

include_once('user_functions.php');
include_once('tmb_functions.php');
include_once('sex_functions.php');

$action = $_POST['action'];

switch ($action) {
	case 'login':
		$username = $_POST['username'];
		$password = $_POST['password'];
		$login = login($username,$password);
		$output = array(
                "error_id" => $login
            );
		break;
    case 'logout':
        logout();
        $output = array(
            "error_id" => 0
        );
        break;
    case 'getNivelActividad':
        $output = getNivelActividad();
        break;
    case 'getSexos':
        $output = getSexos();
        break;
}

echo json_encode($output);