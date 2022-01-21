<div class="container" style="background-color: lightpink;">
		<div class="row text-center py-5">
			<?php
		
			     include "../config/cnn.php";
		
			     $query = $pdo->query("SELECT * FROM LIVROS l INNER JOIN CAPA c ON l.LIV_LIV_TIPO = c.LIV_CAP_COD INNER JOIN ARQUIVO a ON l.LIV_LIV_FOTO = a.LIV_ARQ_COD;;");
				 
			     while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
			      	echo '<div class="col-md-3 col-sm-6 my-3 my-md-0">';
			      		echo '<div class="card shadow" style="margin-top: 10px;">';
			      			echo '<div class="img-fluid card-img-top"><a href="#">';
			      			echo '<img src='."../upload/"."{$linha['LIV_ARQ_COD']}/{$linha['LIV_ARQ_NOME']}".' style="width: 100%;max-width: 350px;height: 280px;">';
			      			echo '</a></div>';
			      			echo '<div class="card-body">';
			      			echo '<h5 class= "card-title">' . "{$linha['LIV_LIV_NOME']}" . '</h5>';
			      			echo '<p>' . "{$linha['LIV_CAP_NOME']}" . '</p>' ;
			      			echo '<p>' . "{$linha['LIV_LIV_AUTOR']}" . '</p>' ;
			      			echo '<h5><span>R$ ' . "{$linha['LIV_LIV_VALOR']}" . '</span></h5>' ;
			      			echo '</div>';
			      		echo '</div>';
			      	echo '</div>';
			    }
			    
			 ?> 
		</div>
</div>