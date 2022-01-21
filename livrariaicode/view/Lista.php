<div class="table-responsive" style="background-color: lightgray;">
  <table class="table table-sm ">
    <h1>Lista de Livros</h1>
    <div class="dropdown-divider border-bottom-0 border-success"></div>
    <thead class="thead bg-dark text-light">
      <tr class="">                    
        <th scope="col col-sm">cod</th>
        <th scope="col col-sm">ISNB</th>
        <th scope="col col-sm">NOME</th>
        <th scope="col col-sm">TIPO</th>
        <th scope="col col-sm">FOTO</th>
        <th scope="col col-sm">AUTOR</th>                  
        <th scope="col col-sm">VALOR</th>
        <th scope="col col-sm">GENERO</th>                  
        <th scope="col col-sm">SINOPSE</th>
        <th scope="col col-sm">Alterar</th>
        <th scope="col col-sm">Excluir</th>
      </tr>
    </thead>
    <tbody>

     <?php

     include "../config/cnn.php";

     $query = $pdo->query("SELECT * FROM LIVROS l INNER JOIN CAPA c ON l.LIV_LIV_TIPO = c.LIV_CAP_COD INNER JOIN ARQUIVO a ON l.LIV_LIV_FOTO = a.LIV_ARQ_COD;");

     while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
      echo '<tr>';
      echo '<td>' . "{$linha['LIV_LIV_COD']}" . '</td>';
      echo '<td>' . "{$linha['LIV_LIV_ISBN']}" . '</td>';
      echo '<td>' . "{$linha['LIV_LIV_NOME']}" . '</td>';
      echo '<td>' . "{$linha['LIV_CAP_NOME']}" . '</td>';
      echo '<td>' . "{$linha['LIV_ARQ_NOME']}" . '</td>';
      echo '<td>' . "{$linha['LIV_LIV_AUTOR']}" . '</td>';
      echo '<td>' . "{$linha['LIV_LIV_VALOR']}" . '</td>';
      echo '<td>' . "{$linha['LIV_LIV_GENERO']}" . '</td>';
      echo '<td>' . "{$linha['LIV_LIV_SINOPSE']}" . '</td>';
      echo '<td><form action="Editar.php" method="post"> <input name="txtEditar" value='."{$linha['LIV_LIV_COD']}".' hidden/><button type="submit" name"Salvar" ><span><i class="btn btn-dark fas fa-edit"></i></span></button></form></td>';
      echo '<td><form action="Deletar.php" method="post"> <input name="txtDel" value='."{$linha['LIV_LIV_COD']}".' hidden/><button type="submit" name"Salvar" ><span><i class="btn btn-dark fas fa-trash"></i></span></button></form></td>';
      echo '</tr>';
    }
    ?>                
  </tbody>
</table>
</div>