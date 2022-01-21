<?php

class Usuario{
	
	public function login($email, $senha){

		global $pdo;

		$sql = "SELECT * FROM USUARIOS WHERE LIV_USU_EMAIL = :email AND LIV_USU_SENHA = :senha";
		$sql = $pdo->prepare($sql);
		$sql->bindValue("email", ($email));
		$sql->bindValue("senha", md5($senha));
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();

			$_SESSION['login'] = array('nome' => $dado['LIV_USU_NOME'], 'nivel' => $dado['LIV_NA_COD']);

			return true;
		}
		else{
			return false;
		}
	}
}

?>