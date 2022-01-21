
<!-- Scripts Aqui -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="../js/script.js" type="text/javascript"></script>

 <!--Navbar responsivo -->
 <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

 <!-- Função modal-->
<script>
var modal = document.getElementById('myModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<!-- Função Trocar Pagina -->
<script>
   $("#cad").click(function(){
     $("#main").load("cadastrar.php");
    });
</script>  

<!-- Função Senha -->
<script type="text/javascript">	
        var password = document.getElementById("txtSenha"),
         confirm_password = document.getElementById("txtConfsenha");			

        function validatePassword() 
        {
          if (password.value != confirm_password.value) 
          {
            confirm_password.setCustomValidity("As senhas não correspondem!");
          }
          else
          {
            confirm_password.setCustomValidity('');
          }	
        }

          password.onchange = validatePassword;
          confirm_password.onkeyup = validatePassword;

        function verifica()
        {
          senha = document.getElementById("senha").value;
          forca = 0;
          mostra = document.getElementById("mostra");

            if((senha.length >= 4) && (senha.length <= 7)){
              forca += 5;
            }else if(senha.length>7){
              forca += 5;
            }
            if(senha.match(/[a-z]+/)){
              forca += 5;
            }
            if(senha.match(/[A-Z]+/)){
              forca += 25;
            }
            if(senha.match(/[0-9]+/)){
              forca += 25;
            }
            if(senha.match(/\W+/)){
              forca += 25;
            }
              return mostra_res();
            }

        function mostra_res()
        {
          if(forca < 30)
          {
            mostra.innerHTML = '<p style="color:red;" width="'+forca+'">Senha Fraca</p>';
            
            password.setCustomValidity('Senha muito fraca.');
          }
          else if((forca >= 30) && (forca < 60))
          {
            mostra.innerHTML = '<p style="color:yellow;" width="'+forca+'">Senha Justa</p>';

            password.setCustomValidity('Senha muito fraca.');
          }
          else if((forca >= 60) && (forca < 85))
          {
            mostra.innerHTML = '<p style="color:blue;" width="'+forca+'">Senha Forte</p>';

            password.setCustomValidity('');
          }
          else if(forca >= 85)
          {
            mostra.innerHTML = '<p style="color:green;" width="'+forca+'">Senha Excelente</p>';

            password.setCustomValidity('');
          }
        }
</script>