<?php 
	$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : "";
    if ($codigo != "" && $codigo != null)
    {      
      session_start();

      $_SESSION = array();

      if (ini_get("session.use_cookies"))
      {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
          );
      }
        session_destroy();
        echo "<script>  history.back()</script>";
      } 
      else
      {
        echo "<script>  history.back()</script>";
      }
    
?>