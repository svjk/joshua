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
		width: 300px;
		height: 20px;
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
	
	if(isset($_POST["submit_update_profile2"]))
	{
		if(!empty($_POST["boards"]))
		{
			foreach($_POST["boards"] as $selected)
			{
				//echo $selected."</br>";
			}
		}
		
		if(!empty($_POST["classes"]))
		{
			foreach($_POST["classes"] as $selected)
			{
				//echo $selected."</br>";
			}
		}
		
		if(!empty($_POST["subjects"]))
		{
			foreach($_POST["subjects"] as $selected)
			{
				//echo $selected."</br>";
			}
		}
		
		if(!empty($_POST["teaching_modes"]))
		{
			foreach($_POST["teaching_modes"] as $selected)
			{
				//echo $selected."</br>";
			}
		}
		
		if(!empty($_POST["teaching_mediums"]))
		{
			foreach($_POST["teaching_medums"] as $selected)
			{
				//echo $selected."</br>";
			}
		}
		
		$return_val_tutor_info = get_tutor_info();
		//print_r($return_val_tutor_info);
		
		if(count($return_val_tutor_info) > 0)
		{
			$tutor_email = $return_val_tutor_info[0]["tutor_email"];
			$tutor_mobile = $return_val_tutor_info[0]["tutor_phone"];
		}
		
		if($_POST['qualification'] != 0 and $_POST['job_type'] != 0)
		{
			$qualification_id = $_POST['qualification'];
			$job_type_id = $_POST['job_type'];
			
			update_tutor_qualification_job_type($qualification_id, 
						$job_type_id, $tutor_email);
		}
		
		if(!empty($_POST["boards"]))
		{
			foreach($_POST["boards"] as $selected)
			{
				//echo $selected."</br>";
			}
		}
		
		/*
		$email = trim($_POST['email']);
		$mobile = trim($_POST['mobile']);
		$address_line1 = trim($_POST['address_line1']);
		$address_line2 = trim($_POST['address_line2']);
		$city_id = trim($_POST['city']);
		
		$tutor_email = $_SESSION["tutor_email"];
					
		$return_val_udpate1 = update_tutor_profile_step1($name, $email, $mobile,
			$address_line1, $address_line2, $city_id, $tutor_email);
		*/
	}	
?>
<body>
<div>
	<div style="width: 340px; margin: 0 auto; border-style: solid; border-width: 0px; width: 630px;">
	<form id="frmProfileUpdate2" name="frmProfileUpdate2" method="post">
	<fieldset id="fs_info">
		<legend>Teaching Information</legend>
		<div class="div_box1" style="height: 55px; border-width: 0px;">
			<label>Qualification:</label>
			<label class="mandatory-label">*</label>
			<br/>
			<select name="qualification" id="qualification">
				<option value="0">--Select--</option>						
				<?php
					for($i=0; $i<count($return_val_qual); $i++)
					{
						echo "<option value='" . $return_val_qual[$i]['id'] . "'>" 
							. $return_val_qual[$i]['qualification_name'] . "</option>";
					}
				?>				
			</select>
		</div>
		
		<div>
		<label>Select Boards:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 65px;">
				<?php
				for($i=0; $i<count($return_val_boards); $i++)
				{
					echo "<div style='border-style: solid; border-width: 0px; width: 100px; margin: 5px; clear: right; float: left'>";
					echo "<input type='checkbox' name='boards[]' value='" . $return_val_boards[$i]['id'] . "'>";
					echo "<label>" . $return_val_boards[$i]['board_name'] . "</label>";
					echo "</div>";
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
					echo "<div style='border-style: solid; border-width: 0px; width: 280px; margin: 5px; clear: right; float: left'>";
					echo "<input type='checkbox' name='classes[]' value='" . $return_val_classes[$i]['id'] . "'>";
					echo "<label>" . $return_val_classes[$i]['class_name'] . "</label>";
					echo "</div>";
				}
				?>
			</div>
		</div>
		<br/>
		
		<div>
		<label>Select Subjects:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 150px;">
				<?php
				for($i=0; $i<count($return_val_subjects); $i++)
				{
					echo "<div style='border-style: solid; border-width: 0px; width: 150px; margin: 5px; clear: right; float: left'>";
					echo "<input type='checkbox' name='subjects[]' value='" . $return_val_subjects[$i]['id'] . "'>";
					echo "<label>" . $return_val_subjects[$i]['subject'] . "</label>";
					echo "</div>";
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
					echo "<div style='border-style: solid; border-width: 0px; width: 250px; margin: 5px; clear: right; float: left'>";
					echo "<input type='checkbox' name='teaching_modes[]' value='" . $return_val_teaching_modes[$i]['id'] . "'>";
					echo "<label>" . $return_val_teaching_modes[$i]['teaching_mode_name'] . "</label>";
					echo "</div>";
				}
				?>
			</div>
		</div>
		<br/>
		
		<div>
		<label>Select Teaching Mediums:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 30px;">
				<?php
				for($i=0; $i<count($return_val_teaching_mediums); $i++)
				{
					echo "<div style='border-style: solid; border-width: 0px; width: 100px; margin: 5px; clear: right; float: left'>";
					echo "<input type='checkbox' name='teaching_mediums[]' value='" . $return_val_teaching_mediums[$i]['id'] . "'>";
					echo "<label>" . $return_val_teaching_mediums[$i]['teaching_medium_name'] . "</label>";
					echo "</div>";
				}
				?>
			</div>
		</div>
		<br/>
		
		<div>
		<label>Select Job Type:</label>
		<label class="mandatory-label">*</label>
		<br/>
			<div class="div_box1" style="height: 30px; border-width: 0px;">
				<select name="job_type">
                    <option value="0">--Select--</option>
					<?php
						for($i=0; $i<count($return_val_job_types); $i++)
						{
							echo "<option value='" . $return_val_job_types[$i]['id'] . "'>" 
								. $return_val_job_types[$i]['job_type_name'] . "</option>";
														
							/*
							if($return_val_countries[$i]['id'] == $tutor_country_id)
							{
								echo "<option value='" . $return_val_countries[$i]['id'] . "' selected>" 
											. $return_val_countries[$i]['country_name'] . "</option>";
								}
								else
								{
									echo "<option value='" . $return_val_countries[$i]['id'] . "'>" 
											. $return_val_countries[$i]['country_name'] . "</option>";
								}
							*/														
						}
						?>
                </select>
			</div>
		</div>
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