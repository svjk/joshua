<?php
	$svjk_session_id = get_cookie_value('svjk_session_id');
	$svjk_email = get_cookie_value('svjk_email');
	$svjk_phone = get_cookie_value('svjk_phone');
	$svjk_user_type = get_cookie_value('svjk_user_type');
	$svjk_login_type = get_cookie_value('svjk_login_type');
	
	echo $svjk_email;
	
	if($svjk_email == 0)
	{
		header('Location: ../login_svjk.php');
		exit;
		//echo "<script>window.location='../login_svjk.php';</script>";
	}
?>