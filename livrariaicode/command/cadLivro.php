<?php 
	include ("../config/cnn.php");

	$Salvar = filter_input(INPUT_POST, 'Salvar', FILTER_SANITIZE_STRING);

	if ($Salvar) {
		$titulo = isset($_POST['txtTitulo']) ? $_POST['txtTitulo'] : "";
		$autor = isset($_POST['txtAutor']) ? $_POST['txtAutor'] : "";
		$genero = isset($_POST['txtGenero']) ? $_POST['txtGenero'] : "";
		$tipo = isset($_POST['txtTipo']) ? $_POST['txtTipo'] : "";
		$sinopse = isset($_POST['txtSinopse']) ? $_POST['txtSinopse'] : "";
		$isbn = isset($_POST['txtIsbn']) ? $_POST['txtIsbn'] : "";
		$valor = isset($_POST['txtValor']) ? $_POST['txtValor'] : "";

		if (empty($titulo) || empty($autor) || empty($tipo) || empty($sinopse) || empty($genero) || empty($isbn) || empty($valor)){
			echo "<script> alert('Campos vazios!')</script>";	
		}
		else{
			try {	

					$nome = filter_input(INPUT_POST, 'txtArquivo', FILTER_SANITIZE_STRING);
					$nome_imagem = MD5($nome).strtolower(strrchr($_FILES['txtArquivo']['name'], '.'));
					//var_dump($_FILES['arquivo']);

					$result_img = 'INSERT INTO ARQUIVO(LIV_ARQ_COD, LIV_ARQ_NOME) VALUES(NULL, :nome)';
					$insert_msg = $pdo->prepare($result_img);
					$insert_msg->bindParam(':nome', $nome_imagem);

					if ($insert_msg->execute()) {

							$ultimo_cod = $pdo->lastInsertId();

							$pasta = '../upload/'.$ultimo_cod.'/';

							mkdir($pasta, 0755);

							if(move_uploaded_file($_FILES['txtArquivo']['tmp_name'], $pasta.$nome_imagem)){

										$sql = $pdo->prepare ("INSERT INTO LIVROS(
											LIV_LIV_COD,
											LIV_LIV_ISBN,
											LIV_LIV_NOME,
											LIV_LIV_TIPO,
											LIV_LIV_FOTO,
											LIV_LIV_AUTOR,
											LIV_LIV_VALOR,
											LIV_LIV_GENERO,
											LIV_LIV_SINOPSE)
											VALUES (
											NULL,
											:isbn,
											:titulo,
											:tipo,
											:imagem,
											:autor,
											:valor,
											:genero,
											:sinopse)");

										$sql->bindParam(':isbn', $isbn, PDO::PARAM_STR);
										$sql->bindParam(':titulo', $titulo, PDO::PARAM_STR);
										$sql->bindParam(':tipo', $tipo , PDO::PARAM_INT);
										$sql->bindParam(':imagem', $ultimo_cod , PDO::PARAM_INT);
										$sql->bindParam(':autor', $autor , PDO::PARAM_STR);
										$sql->bindParam(':valor', $valor , PDO::PARAM_STR);
										$sql->bindParam(':genero', $genero , PDO::PARAM_STR);
										$sql->bindParam(':sinopse', $sinopse , PDO::PARAM_STR);

										$sql->execute();
										echo "<script> alert('Arquivo salvo!'); history.back();</script>";
							}else{
									echo "<script>history.back();</script>";
							}
								echo "<script>history.back();</script>";
					}else{
						echo "<script>history.back();</script>";
					}
			} catch (Exception $e) {
				echo $sql . "ERRO: " . $e->getMessage();
		}
	}
}else{
		echo "<script>history.back();</script>";
	}
 ?>