<?php
		
function VerificaSession()
{
	if(!isset($_SESSION))
	{
		session_start();
	}

	if (isset($_SESSION['login']['nivel']) && $_SESSION['login']['nivel'] === 1)
	{	
		return true;
	}
	else{
		if (isset($_SESSION['login']['nivel']) && $_SESSION['login']['nivel'] === 2)
			{	
				return true;
			}
			else{
				return false;
			}
		return false;
	}

}
?>