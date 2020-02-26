<!DOCTYPE html>
<html lang="en">
<head>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
	body
	{
		font-family: verdana;
		font-size: 12px;
		margin: 15px;
	}	
	
	.mandatory-label
	{
		color: red;
	}
	
	select
	{
		border-radius: 3px;		
		width: 150px;
		height: 25px;
		border-style: solid;
		border-width: 1px;
		padding: 5px;
	}
	
	.text-box
	{
		border-radius: 3px;			
		width: 150px;
		height: 12px;
		border-style: solid;
		border-width: 1px;
		border-color: gray;
		padding: 5px;
	}
	
	
	#submit_update_experience_details
	{
		border-radius: 5px;
		width: 100px;
		padding: 5px;		
		border-width: 1px;
		border-color: gray;
		
	}	
	#fs_info
	{	
		border-style: solid;
		border-width: 1px;
		border-color: #E8E8E8;
		width: 200px;
		padding: 10px;
		border-radius: 5px;
	}
	
	.div_box1
	{
		border-style: solid;
		border-width: 1px;
		border-radius: 5px;	
		border-color: #E8E8E8;
	}
	
	#error_msg, .error_msg
	{
		color: Red;
	}
	
	.msg, #msg
	{
		color: Black;
		font-weight: bold;
		margin-bottom: 10px;
	}
    </style>
	
	<script src="../js/jquery-3.3.1.min.js"></script>
	
	<script>
		$(document).ready( function() {
			$("#submit_update_experience_details").click( function() {
			
				var experience_id=$("#experience").val();						
				var company=$("#company");				
				var designation=$("#designation");		
				var current_salary=$("#current_salary");			
				
				var error_msg=$("#error_msg");
				
				var return_val=true;
				var msg="";
								
				if(experience_id == 0)
				{
					msg+="*Please select Experience<br/>";				
					return_val=false;
				}
				
				if(company.val().trim() == null || company.val().trim() == "")
				{
					msg+="*Please enter Company/Organization Name<br/>";				
					return_val=false;
				}
								
				if(designation.val().trim() == null || designation.val().trim() == "")
				{
					msg+="*Please enter Designation<br/>";				
					return_val=false;
				}
				
				if(current_salary.val().trim() == null || current_salary.val().trim() == "")
				{
					msg+="*Please enter Current Salary<br/>";				
					return_val=false;
				}
				
				msg+="<br/>";
				error_msg.html(msg);
				window.scrollTo(0, 0);
				
				return return_val;
			});			
			
		});
	</script>
</head>
<body>
<?php
	require_once '../business_functions.php';
?>

<?php
	require_once 'check_auth_tutor.php';
?>    

<?php

	$svjk_session_id = get_cookie_value('svjk_session_id');
	$svjk_email = get_cookie_value('svjk_email');
	$svjk_phone = get_cookie_value('svjk_phone');
	$svjk_user_type = get_cookie_value('svjk_user_type');
	$svjk_login_type = get_cookie_value('svjk_login_type');

	if($svjk_login_type == "email")
	{
		$login_name = $svjk_email;
	}
	else if($svjk_login_type == "phone")
	{
		$login_name = $svjk_phone;
	}
	
	$return_val_message = "";
	
	$return_val_tutor_info = get_tutor_info($login_name, $svjk_login_type);	
	
	if(count($return_val_tutor_info) > 0)
	{	
		$tutor_id = $return_val_tutor_info[0]["tutor_id"];
		$tutor_name = $return_val_tutor_info[0]["tutor_name"];
		$tutor_email = $return_val_tutor_info[0]["tutor_email"];
		$tutor_mobile = $return_val_tutor_info[0]["tutor_phone"];		
		$tutor_experience_id = $return_val_tutor_info[0]["experience_id"];
		$tutor_institution_name = $return_val_tutor_info[0]["institution_name"];
		$tutor_designation = $return_val_tutor_info[0]["tutor_designation"];
		$tutor_current_salary = $return_val_tutor_info[0]["tutor_salary"];
	}

	$return_val_experiences = get_experiences();
	
	if(isset($_POST["submit_update_experience_details"]))
	{	
		if($_POST['experience'] != 0 and trim($_POST['company']) != "" 
			and trim($_POST['designation']) != "" and trim($_POST['current_salary']) != "")
		{	
			$tutor_experience_id = $_POST['experience'];
			$tutor_institution_name = trim($_POST['company']);
			$tutor_designation = trim($_POST['designation']);
			$tutor_current_salary = trim($_POST['current_salary']);
	
			$return_val_update_experience =
				update_tutor_experience_details($tutor_experience_id, $tutor_institution_name, 
				$tutor_designation, $tutor_current_salary, $tutor_email);
			
			$return_val_experience_details = get_experience_details($tutor_email);
			
			$tutor_experience_id = $return_val_experience_details[0]["experience_id"];
			$tutor_institution_name = $return_val_experience_details[0]["institution_name"];
			$tutor_designation = $return_val_experience_details[0]["tutor_designation"];
			$tutor_current_salary = $return_val_experience_details[0]["tutor_salary"];
			
			$return_val_message = "Tutor experience details updated successfully!";
		}
	}	
?>
<body>
<div>
	<div style="width: 340px; margin: 0 auto; border-style: solid; border-width: 0px; width: 235px;">
	<form id="frmProfileUpdate2" name="frmProfileUpdate2" method="post">
	<div id="error_msg"></div>
	<div id="msg"><?php echo $return_val_message ?></div>
	<?php
		require_once '../dropdown_menu.php';
	?>
	<fieldset id="fs_info">
		<legend style="font-weight: bold;">Experience Details</legend>
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 160px;">
			<label>Select Experience:</label>
			<label class="mandatory-label">*</label>
			<br/>
			<select name="experience" id="experience">
				<option value="0">--Select--</option>						
				<?php
					for($i=0; $i<count($return_val_experiences); $i++)
					{
						if($return_val_experiences[$i]['id'] == $tutor_experience_id)
						{
							echo "<option selected value='" . $return_val_experiences[$i]['id'] . "'>" 
								. $return_val_experiences[$i]['experience_name'] . "</option>";
						}
						else
						{
							echo "<option value='" . $return_val_experiences[$i]['id'] . "'>" 
								. $return_val_experiences[$i]['experience_name'] . " Years" . "</option>";
						}
					}
				?>				
			</select>
		</div>
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 200px;">
			<label>Company/Organization Name:</label>
			<label class="mandatory-label">*</label>			
			<input type="text" name="company" id="company" maxlength="40" class="text-box" style="width: 180px;"
				value="<?php echo $tutor_institution_name ?>" autocomplete="off">
		</div>
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">
			<label>Designation:</label>
			<label class="mandatory-label">*</label>			
			<input type="text" name="designation" id="designation" maxlength="30" class="text-box" style="width: 150px;"
				value="<?php echo $tutor_designation ?>" autocomplete="off">
		</div>
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">
			<label>Current Salary:</label>
			<label class="mandatory-label">*</label>			
			<input type="number" name="current_salary" id="current_salary" maxlength="30" class="text-box" style="width: 150px;"
				value="<?php echo $tutor_current_salary ?>" autocomplete="off">
		</div>
	</fieldset>
	<br/>
	<div>
		<span>
			<input type="submit" value="Update" name="submit_update_experience_details" 
				id="submit_update_experience_details">
		</span>
		<span style="margin-left: 10px;">
			<a href="tutor_teaching_details.php">Previous</a>
		</span>
		<span style="margin-left: 10px;">
			<a href="tutor_other_details.php">Next</a>
		</span>
	</div>
	</form>	
	</div>
</div>
</body>
</html>