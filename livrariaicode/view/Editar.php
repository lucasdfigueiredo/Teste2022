<?php
  include ("../config/cnn.php");
 
  $id = isset($_POST['txtEditar']) ? $_POST['txtEditar'] : "";

  if ($id) 
  {
    $sql = $pdo->query("SELECT * FROM LIVROS l INNER JOIN CAPA c ON l.LIV_LIV_TIPO = c.LIV_CAP_COD INNER JOIN ARQUIVO a ON l.LIV_LIV_FOTO = a.LIV_ARQ_COD where l.LIV_LIV_COD = ".$id.";");

    $sql->bindValue(':id', $id, PDO::PARAM_INT);

    $linha = $sql->fetch(PDO::FETCH_ASSOC);
  }
  else
  {
    
  } 
?>


<?php
    include('../config/cnn.php');
?>

<style type="text/css">
    * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  margin-top: 5px;
  margin-bottom: 5px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<div class="container">
    <div class="row">
    <form method="post" enctype="multipart/form-data" action="../command/altLivro.php">
    Imagem do Livro:  <input type="file" id="arquivo" requerid name="txtArquivo" />
    </div>
</div>
<div class="container">
    <div class="row">
      <div class="col-25">
        <label for="fname">Titulo do Livro</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txtTitulo" placeholder="Titulo do Livro.." >
        <?php

     include "../config/cnn.php";

     $query = $pdo->query("SELECT * FROM LIVROS l INNER JOIN CAPA c ON l.LIV_LIV_TIPO = c.LIV_CAP_COD INNER JOIN ARQUIVO a ON l.LIV_LIV_FOTO = a.LIV_ARQ_COD;");

     while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
      
      echo '<input name="txtCod" value='."{$linha['LIV_LIV_COD']}".' hidden/>';
    }
    ?> 
        <input type="text" name="txtCod" value="$id" hidden/>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Autor</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtAutor" placeholder="Autor do Livro.." >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Genero</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="txtGenero" placeholder="Genero do Livro.." >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="tipo">Tipo</label>
      </div>
      <div class="col-75">
        <select id="tipo" name="txtTipo">
          <option value="1">Capa Comum</option>
          <option value="2">Capa Dura</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Codigo ISBN</label>
      </div>
      <div class="col-25">
        <input type="text" id="lname" name="txtIsbn" placeholder="Codigo ISBN.." >
      </div>
      <div class="col-25">
        <label for="lname">Valor</label>
      </div>
      <div class="col-25">
        <input type="text" id="lname" name="txtValor" placeholder="R$" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Sinopse</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="txtSinopse" placeholder="Sinopse do Livro..." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
        <div >
            <input class="col-25" type="submit" name="Salvar">
        </div>
        <div >
            <input class="col-25" type="reset" name="Limpar">
        </div>
    </div>
  </form>
</div>