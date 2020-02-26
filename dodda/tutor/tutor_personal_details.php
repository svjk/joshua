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
		height: 1000px;
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
		font-family: verdana;
		font-size: 12px;
	}
	
	
	#submit_update_personal_details
	{
		border-radius: 5px;
		width: 100px;
		padding: 5px;		
		border-width: 1px;
		border-color: gray;
	}
	
	
	#fs_personal_info
	{	
		border-style: solid;
		border-width: 1px;
		border-color: #E8E8E8;
		width: 250px;			
		padding: 10px;
		border-radius: 5px;		
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
			var hdn_id_proof_front_filname = $("#hdn_id_proof_filname").val();			
			
			var error_msg=$("#error_msg");
			
			var return_val=true;
			var msg="";
			var email_validated = false;
			var mobile_validated = false;
			
			if(name.val().trim() == null || name.val().trim() == "")
			{
				msg+="*Please enter Name<br/>";				
				return_val=false;
			}
			
			if(address_line1.val().trim() == null || address_line1.val().trim() == "")
			{
				msg+="*Please enter Address Line 1<br/>";				
				return_val=false;
			}			
			
			if(address_line2.val().trim() == null || address_line2.val().trim() == "")
			{
				msg+="*Please enter Address Line 2<br/>";				
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
			
			if(id_proof_front="")
			{
				msg+="*Please select ID Proof Front<br/>";				
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
	$return_val_countries = get_countries();	
	
	$return_val_states = get_states_country_id("4");	
	
	$return_val_cities = get_cities_by_state_id("1");	
	
	$return_val_genders = get_genders();	
	
	$return_val_id_proof_types = get_id_proof_types();	
	
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
		$id_proof_type_filename = $return_val_tutor_info[0]["address_proof_front"];
		$tutor_profile_image = $return_val_tutor_info[0]["tutor_profile_image"];
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
		
		$target_dir = "tutor_upload_images/";
		$profile_image_filename = "";
		$id_proof_front_filename = "";
		$id_proof_back_filename = "";
		
		//Upload profile image				
		if($_FILES['photo_upload']['name']) 
		{
			$tutor_profile_image_filename = uniqid() . '_' . $_FILES['photo_upload']['name'];		
			$upload_profile_image_fullpath = $target_dir .basename($tutor_profile_image_filename);
			move_uploaded_file($_FILES['photo_upload']['tmp_name'], 
				$upload_profile_image_fullpath);
			$profile_image_filename = $tutor_profile_image_filename;
			
			update_tutor_profile_image($profile_image_filename, $tutor_email);
		}	

		//Upload id proof front side
		if($_FILES['id_proof_upload1']['name']) 
		{
			$id_proof_image_filename1 = uniqid() . '_' . $_FILES['id_proof_upload1']['name'];		
			$id_proof_image_fullpath1 = $target_dir .basename($id_proof_image_filename1);
			move_uploaded_file($_FILES['id_proof_upload1']['tmp_name'], 
				$id_proof_image_fullpath1);
			$id_proof_front_filename = $id_proof_image_filename1;
			
			update_tutor_address_proof_front_side($id_proof_front_filename, $tutor_email);
		}	
		
		//Upload id proof back side
		if($_FILES['id_proof_upload2']['name']) 
		{
			$id_proof_image_filename2 = uniqid() . '_' . $_FILES['id_proof_upload2']['name'];		
			$id_proof_image_fullpath2 = $target_dir .basename($id_proof_image_filename2);
			move_uploaded_file($_FILES['id_proof_upload2']['tmp_name'], 
				$id_proof_image_fullpath2);
			$id_proof_back_filename = $id_proof_image_filename2;
			
			update_tutor_address_proof_back_side($id_proof_back_filename, $tutor_email);
		}
		
		
		$tutor_email = $svjk_email;
		
		if($city_id != 0 and $gender_id != 0 and $dob != "" and $id_proof_type_id != 0)
		{
			$return_val_udpate1 = update_tutor_personal_details($name, $email, $mobile,
				$address_line1, $address_line2, $city_id, $tutor_email, $gender_id, $dob,
				$id_proof_type_id);
				
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
				$id_proof_type_filename = $return_val_tutor_info[0]["address_proof_front"];
				$tutor_profile_image = $return_val_tutor_info[0]["tutor_profile_image"];
				$address_proof_front = $return_val_tutor_info[0]["address_proof_front"];
				$address_proof_back = $return_val_tutor_info[0]["address_proof_back"];
			}	
			
			$return_val_message = "Tutor personal/contact details updated successfully!";
		}
		
	}	
	
?>
<body>
<div>
	<div style="margin: 0 auto; border-style: solid; border-width: 0px; width: 280px;">
		<form id="frmProfileUpdate" name="frmProfileUpdate" method="post" enctype="multipart/form-data">
		<div id="error_msg"></div>
		<div id="msg">
			<?php echo $return_val_message ?>
		</div>
		<fieldset id="fs_personal_info">
		<legend style="font-weight: bold;">Personal and Contact Details</legend>		
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">
				<label>Name:</label>
				<label class="mandatory-label">*</label>
				<input type="text" name="name" id="name" maxlength="40" class="text-box" style="width: 150px;"
						value="<?php echo $tutor_name ?>">		
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">                                                   
				<label>Email:</label>
				<label class="mandatory-label">*</label>  			
				<input type="email" name="email" id="email" class="text-box" 
					style="width: 150px; background-color: #f5f5f5;"
					maxlength="35" value="<?php echo $tutor_email ?>" readonly>                                
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">                                                   
				<label>Phone:</label>
				<label class="mandatory-label">*</label>  
				<br/>                            
				<input type="text" name="mobile" id="mobile" class="text-box" 
						style="width: 150px; background-color: #f5f5f5;"
						maxlength="10" name="mobile" value="<?php echo $tutor_mobile ?>" readonly>                                
			</div>
		</div>		
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 250px;">                                                   
				<label>Address Line 1:</label>                                
				<label class="mandatory-label">*</label>
				<div>
					<input id="address_line1" name="address_line1" type="text" class="text-box" style="width: 230px;"
						maxlength="30" value="<?php echo $address_line1 ?>" autocomplete="off">                             
				</div>
			</div>		
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 250px;">                                                   
				<label>Address Line 2:</label>                                
				<label class="mandatory-label">*</label>
				<div>
					<input id="address_line2" name="address_line2" type="text" class="text-box" style="width: 230px;"
						value="<?php echo $address_line2 ?>" autocomplete="off">                             
				</div>
			</div>
		</div>
		<div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">
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
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">                                                   
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
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">                                                   
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
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">
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
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px;">                                                   
				<label>DOB:</label>                                
				<label class="mandatory-label">*</label>  
				<input id="dob" name="dob" type="date" class="text-box" style="width: 145px;"
					value="<?php echo $tutor_dob ?>" autocomplete="off" placeholder="yyyy-mm-dd">                               
			</div>
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 170px; float: left;">                                                   
												
			</div>
		</div>
			
		<div>
			<div style="border-style: solid; border-width: 1px; 
				border-color: #E8E8E8; border-radius: 2px; width: 100px;"> 
				<img width="70" height="80" src="<?php echo 'tutor_upload_images/'. $tutor_profile_image ?>" />
			</div>			
			<div style="height: 50px; border-style: solid; border-width: 0px; width: 200px;"> 
				<label>Upload Photo:</label>                                				  
				<div>
					<input id="photo_upload" name="photo_upload" type="file" style="width: 150px;">                               
				</div>
			</div>			
		</div>
		
		<div style="height: 50px; border-style: solid; border-width: 0px; width: 155px;">
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
				<input id="hdn_id_proof_filname" name="hdn_id_proof_filname" type="hidden" 
					value="<?php echo $id_proof_type_filename ?>" />
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
				<input type="submit" value="Update" name="submit_update_personal_details" 
					id="submit_update_personal_details">
			</span>
			<span style="margin-left: 10px;">
				<a href="tutor_teaching_details.php">Next</a>
			</span>
		</div>
		</form>
	</div>
</div>
</body>
</html>