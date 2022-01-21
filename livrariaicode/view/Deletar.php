<?php 
	  include ("../config/cnn.php");

	$id = isset($_POST['txtDel']) ? $_POST['txtDel'] : "";
	if ($id)
	{
		$sql = $pdo->prepare("DELETE l.*, a.* FROM LIVROS l INNER JOIN CAPA c ON l.LIV_LIV_TIPO = c.LIV_CAP_COD INNER JOIN ARQUIVO a ON l.LIV_LIV_FOTO = a.LIV_ARQ_COD WHERE l.LIV_LIV_COD = :id");

		$sql->bindValue(':id', $id, PDO::PARAM_INT);
			

			if ($sql->execute() !=0) 
			{
				echo "<script> history.back();</script>";
			}
			else
			{

			}
	}
	else
	{
		echo "<script> alert('Sem ID para excluir!');</script>";	
	}




 ?>