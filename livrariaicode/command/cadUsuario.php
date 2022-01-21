<?php 

include ("../config/cnn.php");

$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : "";
$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
$senha = isset($_POST['txtSenha']) ? MD5($_POST['txtSenha']) : "";


if (empty($nome) || empty($email) ||  empty($senha))
{
	echo "<script> alert('Faltou algum campo!'); window.location= 'http://localhost/livrariaicode/view/index.php?pg=Usuario'</script>";
}
else
{	
	try 
	{
		$sql = $pdo->prepare ("INSERT INTO usuarios( 
			LIV_USU_COD, 
			LIV_USU_NOME, 
			LIV_USU_EMAIL,
			LIV_USU_SENHA, 
			LIV_NA_COD) 
			VALUES (
			NULL,
			:nome,
			:email,
			:senha,
			2)");

		$sql->bindParam(':nome', $nome, PDO::PARAM_STR);
		$sql->bindParam(':email', $email, PDO::PARAM_STR);
		$sql->bindParam(':senha', $senha , PDO::PARAM_STR);

			//echo $sql->debugDumpParams();

		$sql->execute(); 
		echo "<script> alert('SUCESSO!'); window.location= 'http://localhost/livrariaicode/view/index.php'</script>";
		//echo "<script> alert('Inserido com sucesso!'); history.go(-1)</script>";
	}
	catch (Exception $e) 
	{
		echo $sql . "<br>" . $e->getMessage();
	}

}	
?>