<?php 
	//Dados de acesso
$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "livraria";
global $pdo;

	// Instancia do objeto PDO
try {
  	$pdo = new PDO("mysql:dbname=".$dbname."; host=".$servername, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
	// Erro no banco
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    exit;
}

	
?>