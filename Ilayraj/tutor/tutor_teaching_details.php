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
		height: 1450px;
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
		width: 140px;
		height: 12px;
		border-style: solid;
		border-width: 1px;
		border-color: gray;
		padding: 5px;
	}
	
	
	#submit_update_teaching_details
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
		width: 300px;
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
		margin-bottom: 8px;
	}
    </style>
	
	<script src="../js/jquery-3.3.1.min.js"></script>
	
	<script>
		$(document).ready( function() {
			$("#submit_update_teaching_details").click( function() {
			
			var qualification_id=$("#qualification").val();						
			var job_type_id=$("#job_type").val();				
			var job_timings_from=$("#job_timings_from");	
			var job_timings_to=$("#job_timings_to");
			var boards=$("#div_boards input[type=checkbox]:checked");
			var classes=$("#div_classes input[type=checkbox]:checked");
			var subjects=$("#div_subjects input[type=checkbox]:checked");
			var teaching_modes=$("#div_teaching_modes input[type=checkbox]:checked");
			var teaching_mediums=$("#div_teaching_mediums input[type=checkbox]:checked");
			
			var error_msg=$("#error_msg");
			
			var return_val=true;
			var msg="";
			var email_validated = false;
			var mobile_validated = false;
			
			if(qualification_id == 0)
			{
				msg+="*Please select Qualification<br/>";				
				return_val=false;
			}			
			
			if(job_type_id == 0)
			{
				msg+="*Please select Job Type<br/>";				
				return_val=false;
			}
			
			if(job_timings_from.val().trim() == null || job_timings_from.val().trim() == "")
			{
				msg+="*Please enter Job Timings From<br/>";				
				return_val=false;
			}	
			
			if(job_timings_to.val().trim() == null || job_timings_to.val().trim() == "")
			{
				msg+="*Please enter Job Timings To<br/>";				
				return_val=false;
			}
			
			if(boards.length <= 0)
			{
				msg+="*Please select at least one Board<br/>";				
				return_val=false;
			}	

			
			if(classes.length <= 0)
			{
				msg+="*Please select at least one Class<br/>";				
				return_val=false;
			}

			if(subjects.length <= 0)
			{
				msg+="*Please select at least one Subject<br/>";				
				return_val=false;
			}	
			
			if(teaching_modes.length <= 0)
			{
				msg+="*Please select at least one Teaching Mode<br/>";				
				return_val=false;
			}			
			
			if(teaching_mediums.length <= 0)
			{
				msg+="*Please select at least one Teaching Medium<br/>";				
				return_val=false;
			}
			
			var d1 = new Date(2020, 01, 01, 10, 
				job_timings_from.val().split(':')[0], job_timings_from.val().split(':')[1]);
				
			var d2 = new Date(2020, 01, 01, 10, 
				job_timings_to.val().split(':')[0], job_timings_to.val().split(':')[1]);
				
			if(d2 <= d1)
			{
				msg+="*Job Timings To should be more than Job Timings From<br/>";				
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
	/* Assign master values */
	$return_val_qual = get_qualifications();
	$return_val_boards = get_boards();
	$return_val_classes = get_classes();
	$return_val_subjects = get_subjects();
	$return_val_teaching_modes = get_teaching_modes();
	$return_val_teaching_mediums = get_teaching_mediums();
	$return_val_job_types = get_job_types();	
	
	/* Assign tutor values */
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
		$address_line1 = $return_val_tutor_info[0]["address_line1"];
		$address_line2 = $return_val_tutor_info[0]["address_line2"];
		$tutor_country_id = $return_val_tutor_info[0]["country_id"];
		$tutor_state_id = $return_val_tutor_info[0]["state_id"];
		$tutor_city_id = $return_val_tutor_info[0]["city_id"];
	}
	
	$return_val_qualification_job_type = get_tutor_qualification_job_type($tutor_email);
	if(count($return_val_qualification_job_type)>0)
	{
		$tutor_qualification_id = $return_val_qualification_job_type[0]["qualification_id"];
		$tutor_job_type_id = $return_val_qualification_job_type[0]["job_type_id"];
		$tutor_job_timings = $return_val_qualification_job_type[0]["job_timings"];
		
		if($tutor_job_timings !== "")
		{
			$job_timings = explode("TO", $tutor_job_timings);
			$job_timings_from = trim($job_timings[0]);
			$job_timings_to = trim($job_timings[1]);
		}
	}
	
	$return_val_selected_boards = get_selected_tutor_boards($tutor_email);
	$return_val_selected_classes = get_selected_tutor_classes($tutor_email);
	$return_val_selected_subjects = get_selected_tutor_subjects($tutor_email);
	$return_val_selected_teaching_modes = get_selected_tutor_teaching_modes($tutor_email);
	$return_val_selected_teaching_mediums = get_selected_tutor_teaching_mediums($tutor_email);	
	
	
	if(count($return_val_qualification_job_type) > 0)
	{
		$tutor_qualification_id = $return_val_qualification_job_type[0]["qualification_id"];
		$tutor_job_type_id = $return_val_qualification_job_type[0]["job_type_id"];
	}
	
	
	if(isset($_POST["submit_update_teaching_details"]))
	{	
		if($_POST['qualification'] != 0 and $_POST['job_type'] != 0
			and trim($_POST['job_timings_from']) != "" and trim($_POST['job_timings_to']) != "")
		{	
			$tutor_qualification_id = $_POST['qualification'];
			$tutor_job_type_id = $_POST['job_type'];
			$tutor_job_timings = trim($_POST['job_timings_from']) . ' TO ' . trim($_POST['job_timings_to']);
	
			update_tutor_qualification_job_type($tutor_qualification_id, 
						$tutor_job_type_id, $tutor_job_timings, $tutor_email);
			$return_val_qualification_job_type = get_tutor_qualification_job_type($tutor_email);
			
			if($tutor_job_timings !== "")
			{
				$job_timings = explode("TO", $tutor_job_timings);
				$job_timings_from = trim($job_timings[0]);
				$job_timings_to = trim($job_timings[1]);
			}
		}
		
		if(!empty($_POST["boards"]))
		{
			update_tutor_boards($_POST["boards"], $tutor_id);			
			$return_val_selected_boards = get_selected_tutor_boards($tutor_email);
		}
		
		if(!empty($_POST["classes"]))
		{
			update_tutor_classes($_POST["classes"], $tutor_id);
			$return_val_selected_classes = get_selected_tutor_classes($tutor_email);
		}
		
		if(!empty($_POST["subjects"]))
		{
			update_tutor_subjects($_POST["subjects"], $tutor_id);
			$return_val_selected_subjects = get_selected_tutor_subjects($tutor_email);
		}
		
		if(!empty($_POST["teaching_modes"]))
		{
			update_tutor_teaching_modes($_POST["teaching_modes"], $tutor_id);
			$return_val_selected_teaching_modes = get_selected_tutor_teaching_modes($tutor_email);
		}
		
		if(!empty($_POST["teaching_mediums"]))
		{
			update_tutor_teaching_mediums($_POST["teaching_mediums"], $tutor_id);
			$return_val_selected_teaching_mediums = get_selected_tutor_teaching_mediums($tutor_email);
		}
		
		$return_val_message = "Tutor teaching details updated successfully!";		
	}	
?>
<body>
<div>
	<div style="width: 340px; margin: 0 auto; border-style: solid; border-width: 0px; width: 330px;">
	<form id="frmProfileUpdate2" name="frmProfileUpdate2" method="post">
	<div id="error_msg"></div>
	<div id="msg">
		<?php echo $return_val_message ?>
	</div>
	<fieldset id="fs_info">
		<legend style="font-weight: bold;">Teaching Details</legend>
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 160px;">
			<label>Qualification:</label>
			<label class="mandatory-label">*</label>
			<br/>
			<select name="qualification" id="qualification">
				<option value="0">--Select--</option>						
				<?php
					for($i=0; $i<count($return_val_qual); $i++)
					{
						if($return_val_qual[$i]['id'] == $tutor_qualification_id)
						{
							echo "<option selected value='" . $return_val_qual[$i]['id'] . "'>" 
								. $return_val_qual[$i]['qualification_name'] . "</option>";
						}
						else
						{
							echo "<option value='" . $return_val_qual[$i]['id'] . "'>" 
								. $return_val_qual[$i]['qualification_name'] . "</option>";
						}
					}
				?>				
			</select>
		</div>
		
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 160px;">
		<label>Select Job Type:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 30px; border-width: 0px;">
				<select name="job_type" id="job_type">
                    <option value="0">--Select--</option>
					<?php
						for($i=0; $i<count($return_val_job_types); $i++)
						{
							if($return_val_job_types[$i]['id'] == $tutor_job_type_id)
							{
								echo "<option selected value='" . $return_val_job_types[$i]['id'] . "'>" 
									. $return_val_job_types[$i]['job_type_name'] . "</option>";
							}
							else
							{
								echo "<option value='" . $return_val_job_types[$i]['id'] . "'>" 
									. $return_val_job_types[$i]['job_type_name'] . "</option>";
							}
						}
						?>
                </select>
			</div>
		</div>	
		
		<div style="height: 55px; border-style: solid; border-width: 0px; width: 300px;">
			<div>
				<label>Select Job Timings(24-Hours time):</label>
				<label class="mandatory-label">*</label>	
			</div>			
			<div class="div_box1" style="height: 30px; padding: 5px;">				
				<div style="clear: right; float: left;">
					<label>From</label>					
					<input type="time" name="job_timings_from" id="job_timings_from"
						class="text-box" style="width: 80px;" min="08:00" max="20:00"
						maxlength="35" autocomplete="off" value="<?php echo $job_timings_from ?>" />
				</div>
				<div style="float: left; margin-left: 10px;">
					<label>To</label>					
					<input type="time" name="job_timings_to" id="job_timings_to" 
						class="text-box" style="width: 80px;" placeholder="eg. 5PM to 8PM" 
						maxlength="35" autocomplete="off" value="<?php echo $job_timings_to ?>" />
				</div>
			</div>			
		</div>		
		<br/>
		<div>
		<label>Select Boards:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" id="div_boards" style="height: 130px; width: 300px;">
				<?php
				for($i=0; $i<count($return_val_boards); $i++)
				{	
					$b_id=$return_val_boards[$i]['id'];
					$board_id=$return_val_selected_boards[$i]['board_id'];
					
					if($b_id==$board_id)
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 100px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='boards[]' checked value='" . $return_val_boards[$i]['id'] . "'>";
						echo "<label>" . $return_val_boards[$i]['board_name'] . "</label>";
						echo "</div>";
					}
					else
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 100px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='boards[]' value='" . $return_val_boards[$i]['id'] . "'>";
						echo "<label>" . $return_val_boards[$i]['board_name'] . "</label>";
						echo "</div>";
					}
				}
				?>
			</div>		
		</div>
		<br/>
		
		<div>
		<label>Select Classes:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" id="div_classes" style="height: 305px; width: 300px;">
				<?php
				for($i=0; $i<count($return_val_classes); $i++)
				{
					$c_id=$return_val_classes[$i]['id'];
					$class_id=$return_val_selected_classes[$i]['class_id'];
						
					if($c_id==$class_id)
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 280px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' checked name='classes[]' value='" . $return_val_classes[$i]['id'] . "'>";
						echo "<label>" . $return_val_classes[$i]['class_name'] . "</label>";
						echo "</div>";
					}
					else
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 280px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='classes[]' value='" . $return_val_classes[$i]['id'] . "'>";
						echo "<label>" . $return_val_classes[$i]['class_name'] . "</label>";
						echo "</div>";
					}
				}
				?>
			</div>
		</div>
		<br/>
		
		<div>
		<label>Select Subjects:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" id="div_subjects" style="height: 300px; width: 300px;">
				<?php
				for($i=0; $i<count($return_val_classes); $i++)
				{
					$s_id=$return_val_classes[$i]['id'];
					$subject_id=$return_val_selected_subjects[$i]['subject_id'];
					
					if($s_id==$subject_id)
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 150px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' checked name='subjects[]' value='" . $return_val_subjects[$i]['id'] . "'>";
						echo "<label>" . $return_val_subjects[$i]['subject'] . "</label>";
						echo "</div>";
					}
					else
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 150px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='subjects[]' value='" . $return_val_subjects[$i]['id'] . "'>";
						echo "<label>" . $return_val_subjects[$i]['subject'] . "</label>";
						echo "</div>";
					}					
				}
				?>
			</div>
		</div>		
		<br/>
		
		<div>
		<label>Select Teaching Modes:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" id="div_teaching_modes" style="height: 130px; width: 300px;">
				<?php
				for($i=0; $i<count($return_val_teaching_modes); $i++)
				{
					$tm_id=$return_val_teaching_modes[$i]['id'];
					$teaching_mode_id=$return_val_selected_teaching_modes[$i]['teaching_mode_id'];
						
					if($tm_id==$teaching_mode_id)
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 280px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' checked name='teaching_modes[]' value='" . $return_val_teaching_modes[$i]['id'] . "'>";
						echo "<label>" . $return_val_teaching_modes[$i]['teaching_mode_name'] . "</label>";
						echo "</div>";
					}
					else
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 280px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='teaching_modes[]' value='" . $return_val_teaching_modes[$i]['id'] . "'>";
						echo "<label>" . $return_val_teaching_modes[$i]['teaching_mode_name'] . "</label>";
						echo "</div>";
					}
				}
				?>
			</div>
		</div>
		<br/>		
		
		<div>
		<label>Select Teaching Mediums:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" id="div_teaching_mediums" style="height: 65px; width: 300px;">
				<?php
				for($i=0; $i<count($return_val_teaching_modes); $i++)
				{
					$tms_id=$return_val_teaching_mediums[$i]['id'];
					$teaching_medium_id=$return_val_selected_teaching_mediums[$i]['teaching_medium_id'];
						
					if($tms_id==$teaching_medium_id)
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 130px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' checked name='teaching_mediums[]' value='" . $return_val_teaching_mediums[$i]['id'] . "'>";
						echo "<label>" . $return_val_teaching_mediums[$i]['teaching_medium_name'] . "</label>";
						echo "</div>";
					}
					else
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 130px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' name='teaching_mediums[]' value='" . $return_val_teaching_mediums[$i]['id'] . "'>";
						echo "<label>" . $return_val_teaching_mediums[$i]['teaching_medium_name'] . "</label>";
						echo "</div>";
					}
				}
				?>
			</div>
		</div>
		<br/>		
	</fieldset>
	<br/>
	<div>
		<span>
			<input type="submit" value="Update" name="submit_update_teaching_details" id="submit_update_teaching_details">
		</span>
		<span style="margin-left: 10px;">
			<a href="tutor_personal_details.php">Previous</a>
		</span>
		<span style="margin-left: 10px;">
			<a href="tutor_experience_details.php">Next</a>
		</span>
	</div>
	<div>
	</form>
	</div>
</div>
</body>
</html>