<!DOCTYPE html>
<html lang="en">
<head>   
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
	
	.text-area
	{
		border-radius: 3px;		
		border-style: solid;
		border-width: 1px;
		border-color: #E8E8E8;
		padding: 5px;
	}
	
	
	#submit_update_other_details
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
		width: 380px;
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
			$("#submit_update_other_details").click( function() {
				
				var languages_known=$("#div_languages_known input[type=checkbox]:checked");
				
				var error_msg=$("#error_msg");
				
				var return_val=true;
				var msg="";
								
				if(languages_known.length <= 0)
				{
					msg+="*Please select at least one Langauges Known<br/>";				
					return_val=false;
				}
				
				msg+="<br/>";
				error_msg.html(msg);
				
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
		
		$return_val_selected_known_languages = get_selected_tutor_known_languages($tutor_email);
		
		$return_val_question_details = get_tutor_questions_details($tutor_email);
	}

	$return_val_languages = get_languages();
	
	if(isset($_POST["submit_update_other_details"]))
	{	
		if(!empty($_POST["languages_known"]))
		{
			update_tutor_languages_known($_POST["languages_known"], $tutor_id);			
			$return_val_selected_known_languages = get_selected_tutor_known_languages($tutor_email);
		}
		
		$question_1_answer = trim($_POST["question_1_answer"]);
		$question_2_answer = trim($_POST["question_2_answer"]);
		$question_3_answer = trim($_POST["question_3_answer"]);
			
		$return_val_question_update_details = 
			update_tutor_questions_details($question_1_answer, $question_2_answer, 
			$question_3_answer, $tutor_email);
			
		$return_val_question_details = get_tutor_questions_details($tutor_email);
		
		$return_val_message = "Tutor other details updated successfully!";
	}	
?>
<body>
<div>
	<div style="width: 340px; margin: 0 auto; border-style: solid; border-width: 0px; width: 410px;">
	<form id="frmProfileUpdate2" name="frmProfileUpdate2" method="post">
	<div id="error_msg"></div>
	<div id="msg"><?php echo $return_val_message ?></div>
	<fieldset id="fs_info">
		<legend>Other Details</legend>
		<div>
		<label>Select Langauges Known:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" id="div_languages_known" style="height: 65px; border-style: solid; border-width: 1px;">
				<?php
				for($i=0; $i<count($return_val_languages); $i++)
				{	
					$l_id=$return_val_languages[$i]['id'];
					$language_id=$return_val_selected_known_languages[$i]['language_id'];
					
					if($l_id==$language_id)
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 100px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='languages_known[]' checked value='" . $return_val_languages[$i]['id'] . "'>";
						echo "<label>" . $return_val_languages[$i]['language_name'] . "</label>";
						echo "</div>";
					}
					else
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 100px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='languages_known[]' value='" . $return_val_languages[$i]['id'] . "'>";
						echo "<label>" . $return_val_languages[$i]['language_name'] . "</label>";
						echo "</div>";
					}
				}
				?>
			</div>		
		</div>
		<br/>
		
		<div>
		<label>Question 1:</label>
		<div style="font-weight: bold;">
			Why do you like teaching?
		</div>		
			<textarea id="question_1_answer" name="question_1_answer" rows="4" cols="50" class="text-area" maxlength="200" spellcheck="false"><?php
					echo trim($return_val_question_details[0]['question_1_answer']);
				?></textarea>
		</div>	
		<br/>
		
		<div>
		<label>Question 2:</label>
		<div style="font-weight: bold;">
			Who is your inspiration and why?
		</div>
			<textarea id="question_2_answer" name="question_2_answer" rows="4" cols="50" class="text-area" maxlength="200" spellcheck="false"><?php
					echo trim($return_val_question_details[0]['question_2_answer']);
				?></textarea>
		</div>	
		<br/>
		
		<div>
		<label>Question 3:</label>	
		<div style="font-weight: bold;">
			Why we have to hire you?
		</div>		
			<textarea id="question_3_answer" name="question_3_answer" rows="4" cols="50" class="text-area" maxlength="200" spellcheck="false"><?php
					echo trim($return_val_question_details[0]['question_3_answer']);
				?></textarea>
		</div>	
		<br/>
	</fieldset>
	<br/>
	<div>
		<span>
			<input type="submit" value="Update" name="submit_update_other_details" 
				id="submit_update_other_details">
		</span>
		<span style="margin-left: 10px;">
			<a href="#">Skip</a>
		</span>
	</div>
	</form>	
	</div>
</div>
</body>
</html>