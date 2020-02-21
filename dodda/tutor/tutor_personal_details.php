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
		padding: 2px;
		border-color: #dbd9d9;
	}
	
	.text-box
	{
		border-radius: 3px;			
		width: 300px;
		height: 20px;
		border-style: solid;
		border-width: 1px;
		border-color: #dbd9d9;
		padding: 2px;
	}
	
	
	#submit_update_personal_details
	{
		border-radius: 5px;
		width: 100px;
		padding: 5px;
		background-color: #4da6ff;
		border-width: 1px;
		border-color: gray;
		
	}
	
	
	#fs_personal_info
	{	
		border-style: solid;
		border-width: 1px;
		border-color: #E8E8E8;
		width: 520px;
		height: 370px;
		padding: 10px;
		border-radius: 5px;
	}	
	
	#error_msg, .error_msg
	{
		color: Red;
	}
	
	.msg
	{
		color: Black;
		font-weight: bold;
		margin-left: 200px;		
	}
    </style>
	
	<script src="../js/jquery-3.3.1.min.js"></script>
	
	<script>
		
		$(document).ready( function() {
		
		$('#country').change(function() {			
			var selectCountryID = $("#country option:selected").val();
			$('#state').empty();			
			$('#city').empty();
			$('#city').append("<option value='0'>--Select--</option>");
			
			if(selectCountryID != 0)
			{
				$('#state').empty();
				
				var url="../ajax/get_json_data.php?c_id=" + selectCountryID;
				
				 $.ajax({
					type: "GET",
					url: url,
					dataType: "json",				
					success: function(data)
					{
						var json_data = JSON.parse(JSON.stringify(data));
						if(json_data)
						{	
							$('#state').append("<option value='0'>--Select--</option>");						
							var len = json_data.length;						
							for(var i=0; i<len; i++)
							{
								var id=json_data[i].id;
								var state_name = json_data[i].state_name;
								
								var strOption = "<option value='" + id + "'>" + state_name + "</option>";							
								$('#state').append(strOption); 
							}
						}
					}			
				});
			}
		});
		
		
		$('#state').change(function() {
			var selectStateID = $("#state option:selected").val();
			$('#city').empty();
			
			if(selectStateID != 0)
			{
				$('#city').empty();
				
				var url="../ajax/get_json_data.php?s_id=" + selectStateID;
								
				 $.ajax({
					type: "GET",
					url: url,
					dataType: "json",				
					success: function(data)
					{
						var json_data = JSON.parse(JSON.stringify(data));
						if(json_data)
						{	
							$('#city').append("<option value='0'>--Select--</option>");						
							var len = json_data.length;						
							for(var i=0; i<len; i++)
							{
								var id=json_data[i].id;
								var city_name = json_data[i].city_name;
								
								var strOption = "<option value='" + id + "'>" + city_name + "</option>";							
								$('#city').append(strOption); 
							}
						}
					}			
				});
			}
		});
		
		
		$("#submit_update_personal_details").click( function() {
			
			var name=$("#name");						
			var email=$("#email");				
			var mobile=$("#mobile");			
			var address_line1=$("#address_line1");
			var address_line2=$("#address_line2");			
			var selected_country_option = $("#country option:selected").val();
			var selected_state_option = $("#state option:selected").val();
			var selected_city_option = $("#city option:selected").val();
			var selected_gender_option = $("#gender option:selected").val();			
			var dob = $("#dob").val();
			var selected_id_proof_type = $("#id_proof_type option:selected").val();
			var id_proof_front = $("#id_proof_upload1").val();
			
			var error_msg=$("#error_msg");
			
			var return_val=true;
			var msg="";
			var email_validated = false;
			var mobile_validated = false;
			
			if(name.val().trim() == null || name.val().trim() == "")
			{
				msg+="*Please enter name<br/>";				
				return_val=false;
			}
			
			if(address_line1.val().trim() == null || address_line1.val().trim() == "")
			{
				msg+="*Please enter address line 1<br/>";				
				return_val=false;
			}			
			
			if(address_line2.val().trim() == null || address_line2.val().trim() == "")
			{
				msg+="*Please enter address line 2<br/>";				
				return_val=false;
			}			
					
			if(selected_country_option == 0)
			{
				msg+="*Please select Country<br/>";				
				return_val=false;
			}
				
			if(selected_state_option == 0)
			{
				msg+="*Please select State<br/>";				
				return_val=false;
			}			
			
			if(selected_city_option == 0)
			{
				msg+="*Please select City<br/>";				
				return_val=false;
			}
			
			if(selected_gender_option == 0)
			{
				msg+="*Please select Gender<br/>";				
				return_val=false;
			}
			
			if(dob == "")
			{
				msg+="*Please select DOB<br/>";				
				return_val=false;
			}
			
			if(selected_id_proof_type == 0)
			{
				msg+="*Please select ID Proof Type<br/>";				
				return_val=false;
			}
			
			if(id_proof_front == "")
			{
				msg+="*Please select ID Proof Front<br/>";				
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
	$return_val_countries = get_countries();
	//print_r($return_val_countries);
	
	$return_val_states = get_states_country_id("4");
	//print_r($return_val_states);
	
	$return_val_cities = get_cities_by_state_id("1");
	//print_r($return_val_cities);
	
	$return_val_genders = get_genders();
	//print_r($return_val_genders);
	
	$return_val_id_proof_types = get_id_proof_types();
	//print_r($return_val_id_proof_types);	
	
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
	
	$return_val_tutor_info = get_tutor_info($login_name, $svjk_login_type);
	//print_r($return_val_tutor_info);
	
	if(count($return_val_tutor_info) > 0)
	{	
		$tutor_name = $return_val_tutor_info[0]["tutor_name"];
		$tutor_email = $return_val_tutor_info[0]["tutor_email"];
		$tutor_mobile = $return_val_tutor_info[0]["tutor_phone"];
		$address_line1 = $return_val_tutor_info[0]["address_line1"];
		$address_line2 = $return_val_tutor_info[0]["address_line2"];
		$tutor_country_id = $return_val_tutor_info[0]["country_id"];
		$tutor_state_id = $return_val_tutor_info[0]["state_id"];
		$tutor_city_id = $return_val_tutor_info[0]["city_id"];
		$tutor_gender_id = $return_val_tutor_info[0]["gender_id"];
		$tutor_dob = $return_val_tutor_info[0]["dob"];
		$tutor_id_proof_type_id = $return_val_tutor_info[0]["id_proof_type_id"];
	}
	
	if(isset($_POST["submit_update_personal_details"]))
	{		
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$mobile = trim($_POST['mobile']);
		$address_line1 = trim($_POST['address_line1']);
		$address_line2 = trim($_POST['address_line2']);
		$city_id = trim($_POST['city']);
		$gender_id = trim($_POST['gender']);
		$dob = trim($_POST['dob']);
		$id_proof_type_id = trim($_POST['id_proof_type']);
		
		//echo $_FILES['id_proof_upload1']['name'];
		
		/*
		if (($_FILES['id_proof_upload1']['name']!=""))
		{		
		 $target_dir = "upload/";
		 $file = $_FILES['id_proof_upload1']['name'];
		 $path = pathinfo($file);
		 $filename = $path['filename'];
		 $ext = $path['extension'];
		 $temp_name = $_FILES['my_file']['tmp_name'];
		 $path_filename_ext = $target_dir.$filename.".".$ext;
		 
			// Check if file already exists
			if (file_exists($path_filename_ext)) 
			{
			 echo "Sorry, file already exists.";
			}
			else
			{
			 //move_uploaded_file($temp_name,$path_filename_ext);
			 echo "Congratulations! File Uploaded Successfully.";
			}
		}
		
		*/
		
		$id_proof_front_filename = "temp1.jpg";
		$id_proof_back_filename = "temp2.jpg";
		
		
		$tutor_email = $svjk_email;
		
		if($city_id != 0 and $gender_id != 0 and $dob != "" and $id_proof_type_id != 0)
		{
			$return_val_udpate1 = update_tutor_personal_details($name, $email, $mobile,
				$address_line1, $address_line2, $city_id, $tutor_email, $gender_id, $dob,
				$id_proof_type_id, $id_proof_front_filename, $id_proof_back_filename);
				
			$return_val_tutor_info = get_tutor_info($login_name, $svjk_login_type);
			if(count($return_val_tutor_info) > 0)
			{	
				$tutor_name = $return_val_tutor_info[0]["tutor_name"];
				$tutor_email = $return_val_tutor_info[0]["tutor_email"];
				$tutor_mobile = $return_val_tutor_info[0]["tutor_phone"];
				$address_line1 = $return_val_tutor_info[0]["address_line1"];
				$address_line2 = $return_val_tutor_info[0]["address_line2"];
				$tutor_country_id = $return_val_tutor_info[0]["country_id"];
				$tutor_state_id = $return_val_tutor_info[0]["state_id"];
				$tutor_city_id = $return_val_tutor_info[0]["city_id"];
				$tutor_gender_id = $return_val_tutor_info[0]["gender_id"];
				$tutor_dob = $return_val_tutor_info[0]["dob"];
				$tutor_id_proof_type_id = $return_val_tutor_info[0]["id_proof_type_id"];
			}
			
			echo "<div class='msg'>Tutor personal/contact details updated successfully</div><br/>";	
			
		}
		
	}	
	
?>
<body>
<div>
	<div style="margin: 0 auto; border-style: solid; border-width: 0px; width: 600px;">
		<form id="frmProfileUpdate" name="frmProfileUpdate" method="post">
		<div id="error_msg"></div>
		<div id="msg"></div>
		<fieldset id="fs_personal_info">
		<legend>Personal/Contact Details</legend>		
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; clear: right; float: left;">
				<label>Name:</label>
				<label class="mandatory-label">*</label>
				<input type="text" name="name" id="name" maxlength="40" class="text-box" style="width: 150px;"
						value="<?php echo $tutor_name ?>">		
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">                                                   
				<label>Email:</label>
				<label class="mandatory-label">*</label>  			
				<input type="email" name="email" id="email" class="text-box" 
					style="width: 150px; background-color: #f5f5f5;"
					maxlength="35" value="<?php echo $tutor_email ?>" readonly>                                
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">                                                   
				<label>Phone:</label>
				<label class="mandatory-label">*</label>  
				<br/>                            
				<input type="text" name="mobile" id="mobile" class="text-box" 
						style="width: 150px; background-color: #f5f5f5;"
						maxlength="10" name="mobile" value="<?php echo $tutor_mobile ?>" readonly>                                
			</div>
		</div>		
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 490px; float: left;">                                                   
				<label>Address Line 1:</label>                                
				<label class="mandatory-label">*</label>
				<div>
					<input id="address_line1" name="address_line1" type="text" class="text-box" style="width: 230px;"
						maxlength="30" value="<?php echo $address_line1 ?>" autocomplete="off">                             
				</div>
			</div>		
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 490px; float: left;">                                                   
				<label>Address Line 2:</label>                                
				<label class="mandatory-label">*</label>
				<div>
					<input id="address_line2" name="address_line2" type="text" class="text-box" style="width: 230px;"
						value="<?php echo $address_line2 ?>" autocomplete="off">                             
				</div>
			</div>
		</div>
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; clear: right; float: left;">
				<label>Country:</label>                                
				<label class="mandatory-label">*</label>                                
				<select id="country" name="country" type="text">
				<option value="0">--Select--</option>
				<?php
					for($i=0; $i<count($return_val_countries); $i++)
					{
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
					}
				?>
				</select>		
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">                                                   
				<label>State</label>                                
				<label class="mandatory-label">*</label>  
				<select id="state" name="state" type="text">
				<option value="0">--Select--</option>
				<?php
					for($i=0; $i<count($return_val_states); $i++)
					{
						if($return_val_states[$i]['id'] == $tutor_state_id)
						{
							echo "<option value='" . $return_val_states[$i]['id'] . "' selected>" 
									. $return_val_states[$i]['state_name'] . "</option>";
						}
						else
						{
							echo "<option value='" . $return_val_states[$i]['id'] . "'>" 
									. $return_val_states[$i]['state_name'] . "</option>";
						}
					}
				?>
				</select>	                                
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">                                                   
				<label style="width: 50px;" maxlength="30">City:</label>                                
				<label class="mandatory-label">*</label>
				<select id="city" name="city" type="text">
				<option value="0">--Select--</option>
				<?php
					for($i=0; $i<count($return_val_cities); $i++)
					{
						if($return_val_cities[$i]['id'] == $tutor_city_id)
						{
							echo "<option value='" . $return_val_cities[$i]['id'] . "' selected>" 
									. $return_val_cities[$i]['city_name'] . "</option>";
						}
						else
						{
							echo "<option value='" . $return_val_cities[$i]['id'] . "'>" 
									. $return_val_cities[$i]['city_name'] . "</option>";
						}
					}
				?>
				</select>                                
			</div>
		</div>
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; clear: right; float: left;">
				<label>Gender:</label>                                
				<label class="mandatory-label">*</label> 
				 <select id="gender" name="gender" type="text" >
					<option value="0">--Select--</option>								
					<?php
					for($i=0; $i<count($return_val_genders); $i++)
					{
						if($return_val_genders[$i]['id'] == $tutor_gender_id)
						{
							echo "<option value='" . $return_val_genders[$i]['id'] . "' selected>" 
									. $return_val_genders[$i]['gender_name'] . "</option>";
						}
						else
						{
							echo "<option value='" . $return_val_genders[$i]['id'] . "'>" 
									. $return_val_genders[$i]['gender_name'] . "</option>";
						}
					}
					?>
				</select> 
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">                                                   
				<label>DOB:</label>                                
				<label class="mandatory-label">*</label>  
				<input id="dob" name="dob" type="text" class="text-box" style="width: 145px;"
					value="<?php echo $tutor_dob ?>" autocomplete="off" placeholder="yyyy-mm-dd">                               
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">                                                   
												
			</div>
		</div>
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 500px; float: left;"> 
				<label>Upload Photo:</label>                                
				<label class="mandatory-label">*</label>  
				<div>
					<input id="photo_upload" name="photo_upload" type="file" style="width: 150px;">                               
				</div>
			</div>		
		</div>	
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 155px; clear: right; float: left;">
				<label>ID Proof Type:</label>                                
				<label class="mandatory-label">*</label> 
				 <select id="id_proof_type" name="id_proof_type" type="text" >
					<option value="0">--Select--</option>								
					<?php
					for($i=0; $i<count($return_val_id_proof_types); $i++)
					{
						if($return_val_id_proof_types[$i]['id'] == $tutor_id_proof_type_id)
						{
							echo "<option value='" . $return_val_id_proof_types[$i]['id'] . "' selected>" 
									. $return_val_id_proof_types[$i]['id_proof_type_name'] . "</option>";
						}
						else
						{
							echo "<option value='" . $return_val_id_proof_types[$i]['id'] . "'>" 
									. $return_val_id_proof_types[$i]['id_proof_type_name'] . "</option>";
						}
					}
					?>
				</select> 
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 160px; float: left;">                                                   
				<label>ID Proof Front:</label>                                
				<label class="mandatory-label">*</label>  
				<input id="id_proof_upload1" name="id_proof_upload1" type="file" style="width: 150px;">                               
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 160px; float: left;">                                                   
				<label>ID Proof Back:</label>                                				  
				<input id="id_proof_upload2" name="id_proof_upload2" type="file" style="width: 150px;">                               
			</div>	
		</div>
		</fieldset>
		<br/>
		<div>
			<span>
				<input type="submit" value="Next" name="submit_update_personal_details" 
					id="submit_update_personal_details">
			</span>
			<span style="margin-left: 10px;">
				<a href="tutor_teaching_details.php">Skip</a>
			</span>
		</div>
		</form>
	</div>
</div>
</body>
</html>