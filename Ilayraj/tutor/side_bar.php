<form id="frmSideBar" name="frmSideBar" method="post">
<div class="side-bar">
    <div class="user-info">
        <!--
		<img class="img-profile img-circle img-responsive center-block" src="<?php echo $tutorImageUrl ?>" alt="<?php echo $tutName ?>">
		-->
		
        <ul class="meta list list-unstyled">
            <li class="name"><?php echo $tutName ?>
                <label class="label label-info"><?php echo $tutPhone ?></label>
            </li>
            <li class="email"><a><?php echo $tutEmail ?></a></li>
            <li class="activity">Last Updated : <?php echo date('D, M d, h:i A', strtotime($tutUpdated)) ?></li>
        </ul>
    </div>
    <nav class="side-menu">
        <ul class="nav">
            <li class="">
                <a href="my_profile.php"><span class="fa fa-user"></span> My Profile</a>
            </li>
            <li class="">
                <a href="section1_update.php"><span class="fa fa-user"></span> Personal Information</a>
            </li>
            <li class="">
                <a href="section2_update.php"><span class="fa fa-info-circle"></span> Basic Information</a>
            </li>
            <li class="">
                <a href="section3_update.php"><span class="fa fa-address-book-o"></span> Contact Detail</a>
            </li>
            <li class="">
                <a href="section4_update.php"><span class="fa fa-history"></span> Expirience</a>
            </li>
            <li class="">
                <a href="section5_update.php"><span class="fa fa-info-circle"></span> Other Information</a>
            </li>
            <li class="">
                <!--<a href="log_out.php"><span class="fa fa-sign-out"></span>Logout</a>-->
				<input type="submit" value="Logout" name="submit_logout" id="submit_logout" />
            </li>
            <li class="">
                <a href="#" onclick="deleteTutor()"><span class="fa fa-trash"></span> Delete Account</a>
            </li>
        </ul>
    </nav>
</div>
<?php
if(isset($_POST['submit_logout']))
{
	$cookie_name = "AUTH_SVJK";
	$cookie_value = "1";
		
	$return_val1 = isAuthenticated($cookie_name);
	//$return_val2 = isGoogleAuthenticated($google_cookie_name);
		
	if($return_val1 == 1)
	{
		setcookie($cookie_name, $cookie_value, time() - 2592000, '/');
		session_destroy();
		header("Location: ../login_svjk.php");
	}		
}
?>
</form>
<script type="text/javascript">
    function deleteTutor() {
      if (confirm("Do you really want to delete your account") == true) {
        window.location = "tutor_delete.php";
      } else {
        return false;
      }
    }
</script>