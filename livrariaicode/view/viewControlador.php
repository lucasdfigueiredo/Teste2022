<?php 
      $pg = "";
      if (isset($_GET['pg']) && !empty($_GET['pg'])) {
        $pg = addslashes($_GET['pg']);
      }
      switch ($pg) {
        case 'Livros':
          require 'Livros.php';
          break;
        case 'Cadastrar':
          require 'Cadastrar.php';
          break;
        case 'Lista':
          require 'Lista.php';
          break;
         case 'Contato':
          require 'Contato.php';
          break; 
          case 'Usuario':
          require 'Usuario.php';
          break; 
          case 'Editar':
          require 'Editar.php';
          break;
          case 'Deletar':
          require 'Deletar.php';
          break; 
        default:
          require 'Home.php';
          break;
      }
     ?>