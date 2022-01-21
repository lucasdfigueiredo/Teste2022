<?php 

include ("../config/cnn.php");

$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : "";
$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
$nivel = isset($_POST['opcUser']) ? $_POST['opcUser'] : "";
$senha = isset($_POST['txtSenha']) ? password_hash($_POST['txtSenha'] , PASSWORD_DEFAULT) : "";

// echo $nome .'<br>';
// echo $email .'<br>';
// echo $nivel .'<br>';
// echo $senha .'<br>';


if (empty($nome) || empty($email) || empty($nivel) || empty($senha))
{
	if ($nivel==0) 
	{
		echo "<script> alert('Você precisa escolher um nível de acesso!'); window.location='http://localhost/code/view/index.php#'</script>";
	}
	echo "<script> alert('Dados vazios!'); window.location='http://localhost/code/view/index.php#'</script>";

}
else
{	
	try 
	{
		$sql = $pdo->prepare ("INSERT INTO USUARIOS( 
			ID_USER, 
			ADMINISTRADOR_NOME, 
			ADMINISTRADOR_EMAIL,
			ADMINISTRADOR_NIVEL, 
			ADMINISTRADOR_SENHA,
			DATAREG,
			DATAALTER) 
			VALUES (
			NULL,
			:nome,
			:email,
			:nivel,
			:senha,
			CURRENT_TIMESTAMP,
			NULL)");

		$sql->bindParam(':nome', $nome, PDO::PARAM_STR);
		$sql->bindParam(':email', $email, PDO::PARAM_STR);
		$sql->bindParam(':nivel', $nivel, PDO::PARAM_INT);
		$sql->bindParam(':senha', $senha , PDO::PARAM_STR);

			//echo $sql->debugDumpParams();

		$sql->execute(); 
		echo "<script> alert('SUCESSO!'); window.location= 'http://localhost/code/view/index.php'</script>";
		//echo "<script> alert('Inserido com sucesso!'); history.go(-1)</script>";
	}
	catch (Exception $e) 
	{
		echo $sql . "<br>" . $e->getMessage();
	}

}	
?>