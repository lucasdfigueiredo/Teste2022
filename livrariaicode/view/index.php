<?php

include ("../control/sessionControl.php"); 

include ("viewHead.php");


if (VerificaSession()) 
{
  switch ($_SESSION['login']['nivel']) {
    case 1:
      include_once("viewAdmLogado.php");
      echo'<body  id="body1">'; 
      break;
    case 2: 
      include_once("viewUsuLogado.php");
      echo'<body  id="body1">'; 
      break;
    default:
      echo "<script> alert('Erro de logica tente novamente');</script>";
      break;
  } 
}
else
{
 include_once("viewHeadDeslogado.php");
 echo'<body  id="body1">';
}

?>

<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Entrar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-success text-light">        
        <form action="../control/loginControl.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="txtEmail" class="form-control" id="txtEmail" aria-describedby="emailHelp" placeholder="Email" >            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" name="txtSenha" class="form-control" id="txtSenha" placeholder="Senha" aria-describedby="passwdHelp">            
          </div><br>
          <button type="submit" class="btn btn-sm btn-info">Login</button>
          <button type="reset" class="btn  btn-sm btn-danger">Limpar</button>
        </form>
          <div class="btn btn-sm">
            <a class="btn-outline-dark" href="index.php?pg=Usuario">Cadastrar-se</a>
          </div>
      </div>
    </div>
  </div>
</div>

<?php

include ("viewFooter.php");

include ("viewScripts.php");

echo'</body>';
echo'</html>';
?>