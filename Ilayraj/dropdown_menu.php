<style>
	.menu-item
	{
		font-family: verdana;
		padding: 2px;
	}
	
	.menu-item a
	{
		text-decoration: none;
		color: black;
		cursor: pointer;
	}
	
	#btn_logout 
	{
		background: none;
		border: none;
		text-decoration: none;
		cursor: pointer;
		margin-left: -5px;
	}
</style>

<script>
$(document).ready( function() {
	$("#menu_link").click( function() {
		$("#dropdown_menu").toggle();
	});
	
	$("#exit_menu").click( function() {
		$("#dropdown_menu").hide();
	});
	
	$(document).scroll( function() {
		$("#dropdown_menu").hide();
	});
});
</script>

<?php
	require_once '../business_functions.php';
?>
<?php
	if(isset($_POST["btn_logout"]))
	{
		clear_all_cookies();
		header("Location: ../login_svjk.php");
	}
?>

<div id="menu_link" style="border-style: solid; border-width: 1px; width: 20px; border-radius: 2px;
		background-color: #F7F7F7; margin-botton: 5px; border-color: #E8E8E8; margin-left: 2px;">
	<img src="../images/hamburger-menu.png" width="20" height="25"/>
</div>
<div id="dropdown_menu" style="border-style: solid; border-width: 1px; width: 150px; border-color: gray; border-radius: 2px; 
	background-color: #F7F7F7; z-index: 100; position: fixed; padding: 5px; display: none; margin-left: 3px;">
<?php
	echo "<div class='menu-item'><a href='tutor_upload_to_db.php'>Upload</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='tutors_search.php'>Search Tutors</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='#'>Last Classes</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='#'>Calendar</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='tutor_personal_details.php'>Update Profile</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='#'>Credits</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='#'>New Requests</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='#'>Terms & Conditions</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a href='#'>Privacy Policy</a></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><input type='submit' value='Logout' name='btn_logout' id='btn_logout'/></div>";
	echo "<hr/>";
	echo "<div class='menu-item'><a id='exit_menu' href='#'>Exit Menu</a></div>";
?>
</div>
<br/>