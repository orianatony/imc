<?php



function login($alias,$pass){

    include_once('scriptConexion.php'); 

	$query_1 = "SELECT * from usuario WHERE alias = '" . $alias . "'";
	$result = $conn->query($query_1);

	if ($result->num_rows == 1) {
		while($row = $result->fetch_assoc()) {
        	$password_db = $row['password'];
        	$name = $row['nombre'];
    	}
    	if($password_db == $pass){
        		session_start();
        		$_SESSION['name'] = $name;
        		return 0;
        	}else{
        		return 2;
        	}
	} else {
	    return 1;
	}
}

function logout(){
    session_start();
    $_SESSION = array();
    session_destroy();
    return 1;
}