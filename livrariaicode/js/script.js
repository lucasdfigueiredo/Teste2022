        /*UPLOAD DAS IMAGENS*/
$(document).ready(function(){
     /* #imagem é o id do input, ao alterar o conteudo do input execurará a função baixo */
     $('#imagem').live('change',function(){
         $('#visualizar').html('<img src="ajax-loader.gif" alt="Enviando..."/> Enviando...');
        /* Efetua o Upload sem dar refresh na pagina */           $('#formulario').ajaxForm({
            target:'#visualizar' // o callback será no elemento com o id #visualizar
         }).submit();
     });
 });
