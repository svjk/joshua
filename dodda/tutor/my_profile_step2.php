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
	
	
	#submit_update_profile2
	{
		border-radius: 5px;
		width: 100px;
		padding: 5px;
		background-color: #4da6ff;
		border-width: 1px;
		border-color: gray;
		
	}	
	#fs_info
	{	
		border-style: solid;
		border-width: 1px;
		border-color: #E8E8E8;
		width: 600px;
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
    </style>
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
	//print_r($return_val_qual);
	
	$return_val_boards = get_boards();	
	//print_r($return_val_boards);
	
	$return_val_classes = get_classes();	
	//print_r($return_val_classes);
	
	$return_val_subjects = get_subjects();	
	//print_r($return_val_subjects);
	
	$return_val_teaching_modes = get_teaching_modes();	
	//print_r($return_val_teaching_modes);
	
	$return_val_teaching_mediums = get_teaching_mediums();	
	//print_r($return_val_teaching_mediums);
	
	$return_val_job_types = get_job_types();
	//print_r($return_val_job_types);
	
	
	
	/* Assign tutor values */
	$return_val_tutor_info = get_tutor_info();	
	
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
	
	
	if(isset($_POST["submit_update_profile2"]))
	{	
		if($_POST['qualification'] != 0 and $_POST['job_type'] != 0 and trim($_POST['job_timings']) != "")
		{	
			$tutor_qualification_id = $_POST['qualification'];
			$tutor_job_type_id = $_POST['job_type'];
			$tutor_job_timings = trim($_POST['job_timings']);
	
			update_tutor_qualification_job_type($tutor_qualification_id, 
						$tutor_job_type_id, $tutor_job_timings, $tutor_email);
			$return_val_qualification_job_type = get_tutor_qualification_job_type($tutor_email);
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
	}	
?>
<body>
<div>
	<div style="width: 340px; margin: 0 auto; border-style: solid; border-width: 0px; width: 630px;">
	<form id="frmProfileUpdate2" name="frmProfileUpdate2" method="post">
	<fieldset id="fs_info">
		<legend>Teaching Details</legend>
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 160px; clear: right; float: left;">
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
		
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 160px; float: left;">
		<label>Select Job Type:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 30px; border-width: 0px;">
				<select name="job_type">
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
		
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">
		<label>Select Job Timings:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 30px; border-width: 0px;">
				<input type="text" name="job_timings" class="text-box" placeholder="eg. 5PM to 8PM" 
				maxlength="35" autocomplete="off" value="<?php echo $tutor_job_timings ?>" />
			</div>
		</div>		
		<br/>
		<br/>
		<br/>
		<br/>
		
		<div>
		<label>Select Boards:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 65px;">
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
			<div class="div_box1" style="height: 150px;">
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
			<div class="div_box1" style="height: 120px;">
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
			<div class="div_box1" style="height: 70px;">
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
			<div class="div_box1" style="height: 65px;">
				<?php
				for($i=0; $i<count($return_val_teaching_modes); $i++)
				{
					$tms_id=$return_val_teaching_mediums[$i]['id'];
					$teaching_medium_id=$return_val_selected_teaching_mediums[$i]['teaching_medium_id'];
						
					if($tms_id==$teaching_medium_id)
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 280px; margin: 5px; clear: right; float: left'>";
						echo "<input type='checkbox' checked name='teaching_mediums[]' value='" . $return_val_teaching_mediums[$i]['id'] . "'>";
						echo "<label>" . $return_val_teaching_mediums[$i]['teaching_medium_name'] . "</label>";
						echo "</div>";
					}
					else
					{
						echo "<div style='border-style: solid; border-width: 0px; width: 280px; margin: 5px; clear: right; float: left'>";
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
			<input type="submit" value="Next" name="submit_update_profile2" id="submit_update_profile2">
		</span>
		<span style="margin-left: 10px;">
			<a href="#">Skip</a>
		</span>
	</div>
	<div>
	</form>
	</div>
</div>
</body>
</html>