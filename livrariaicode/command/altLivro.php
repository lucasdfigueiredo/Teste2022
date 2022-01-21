<?php 
	include ("../config/cnn.php");

	$STR = isset($_POST['txtCod']) ? $_POST['txtCod'] : "";

	$Salvar = filter_input(INPUT_POST, 'Salvar', FILTER_SANITIZE_STRING);

	if ($Salvar) {
		$titulo = isset($_POST['txtTitulo']) ? $_POST['txtTitulo'] : "";
		$autor = isset($_POST['txtAutor']) ? $_POST['txtAutor'] : "";
		$genero = isset($_POST['txtGenero']) ? $_POST['txtGenero'] : "";
		$tipo = isset($_POST['txtTipo']) ? $_POST['txtTipo'] : "";
		$sinopse = isset($_POST['txtSinopse']) ? $_POST['txtSinopse'] : "";
		$isbn = isset($_POST['txtIsbn']) ? $_POST['txtIsbn'] : "";
		$valor = isset($_POST['txtValor']) ? $_POST['txtValor'] : "";

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
							if(empty($titulo)){}else{$sql = $pdo->prepare ("UPDATE LIVRO SET LIV_LIV_NOME = :titulo WHERE LIV_LIV_COD = :str; ");

								$sql->bindValue(':str', $STR, PDO::PARAM_INT);
								$sql->bindValue(':titulo', $titulo, PDO::PARAM_STR);

								$sql->execute();
								}
							if(empty($autor)){}else{$sql = $pdo->prepare ("UPDATE LIVRO SET LIV_LIV_AUTOR = :autor WHERE LIV_LIV_COD = :str; ");

								$sql->bindValue(':str', $STR, PDO::PARAM_INT);
								$sql->bindValue(':autor', $autor, PDO::PARAM_STR);

								$sql->execute();
								}
							if(empty($genero)){}else{$sql = $pdo->prepare ("UPDATE LIVRO SET LIV_LIV_GENERO = :genero WHERE LIV_LIV_COD = :str; ");

								$sql->bindValue(':str', $STR, PDO::PARAM_INT);
								$sql->bindValue(':genero', $genero, PDO::PARAM_STR);

								$sql->execute();
								}
							if(empty($tipo)){}else{$sql = $pdo->prepare ("UPDATE LIVRO SET LIV_LIV_TIPO = :tipo WHERE LIV_LIV_COD = :str; ");

								$sql->bindValue(':str', $STR, PDO::PARAM_INT);
								$sql->bindValue(':tipo', $tipo, PDO::PARAM_INT);

								$sql->execute();
								}
							if(empty($sinopse)){}else{$sql = $pdo->prepare ("UPDATE LIVRO SET LIV_LIV_SINOPSE = :sinopse WHERE LIV_LIV_COD = :str; ");

								$sql->bindValue(':str', $STR, PDO::PARAM_INT);
								$sql->bindValue(':sinopse', $sinopse, PDO::PARAM_STR);

								$sql->execute();
								}
							if(empty($isbn)){}else{$sql = $pdo->prepare ("UPDATE LIVRO SET LIV_LIV_ISBN = :isbn WHERE LIV_LIV_COD = :str; ");

								$sql->bindValue(':str', $STR, PDO::PARAM_INT);
								$sql->bindValue(':isbn', $isbn, PDO::PARAM_STR);

								$sql->execute();
								}
							if(empty($valor)){}else{$sql = $pdo->prepare ("UPDATE LIVRO SET LIV_LIV_VALOR = :valor WHERE LIV_LIV_COD = :str; ");

								$sql->bindValue(':str', $STR, PDO::PARAM_INT);
								$sql->bindValue(':valor', $valor, PDO::PARAM_STR);

								$sql->execute();
								}
										echo "<script> alert('Arquivo salvo!'); history.back();</script>";
								}
							}
								echo "<script>history.back();</script>";
			}catch (Exception $e) {
				echo $sql . "ERRO: " . $e->getMessage();
			}					
		}
	
 ?>