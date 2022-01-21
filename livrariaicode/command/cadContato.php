<?php 
	include('../config/cnn.php');
	
	$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : "";
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
	$cidade = isset($_POST['txtCidade']) ? $_POST['txtCidade'] : "";
	$msg = isset($_POST['txtMsg']) ? $_POST['txtMsg'] : "";
	
	$contato = array("Nome: ".$nome, "E-mail: ".$email, "De: ".$cidade,"Ticket: ".$msg);

	$fp = fopen("../contatos/".$email.".txt", "w");

	foreach ($contato as $valor) {
		fwrite($fp, $valor . PHP_EOL);
	}
	
	fclose($fp);
	
	echo "<script> alert('Mensagem enviada!');history.back();</script>";
 ?>