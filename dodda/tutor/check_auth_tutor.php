<?php
	
	$return_val1 = is_authenticated();
	
	if($return_val1 == 0)
	{
		header("Location: ../login_svjk.php");
	}
?>