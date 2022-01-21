<?php 

	if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail']) && isset($_POST['txtSenha']) && !empty($_POST['txtSenha'])) {
		session_start();
		require '../config/cnn.php';
		require '../config/Usuario.class.php';

		$u = new Usuario();

		$email = addslashes($_POST['txtEmail']);
		$senha = addslashes($_POST['txtSenha']);

		if($u->login($email, $senha) == true){
			if (isset($_SESSION['login'])) {
					echo "<script>history.back();</script>";
			}else{
				echo "<script> alert('Senha e/ou Usuário Inválido!');history.back();</script>";
			}
		}else{
			echo "<script> alert('Senha e/ou Usuário Inválido!');history.back();</script>";
		}
	}else{
		echo "<script> alert('Senha e/ou Usuário Inválido!');history.back();</script>";
	}
?>
