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
	
	
	#submit_update_profile1
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
		border-color: gray;
		width: 300px;
		padding: 10px;
		border-radius: 5px;
	}	
    </style>
	
	<script src="../js/jquery-3.3.1.min.js"></script>
	
	<script>
		$(document).ready( function() {
		
		$('#country').change(function() {			
			var selectCountryID = $("#country option:selected").val();
			$('#state').empty();
			
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
		
		
		$("#submit_update_profile1").click( function() {
			
			
			var var_name=$("#name");						
			var var_el=$("#email");				
			var var_mobile=$("#mobile");			
			var var_address_line1=$("#address_line1");
			var var_address_line2=$("#address_line1");			
			var selected_country_option = $("#country option:selected").val();
			var selected_state_option = $("#state option:selected").val();
			var selected_city_option = $("#city option:selected").val();
			
			var return_val=true;
			var msg="";
			var email_validated = false;
			var mobile_validated = false;
			
			if($(var_name).val().trim() == null || $(var_name).val().trim() == "")
			{
				msg+="*Please enter Name<br/>";				
				return_val=false;
			}
			
			/*
			if(selected_country_option == 0)
			{
				msg+="*Please select a Country<br/>";				
				return_val=false;
			}	

			if(selected_state_option == 0)
			{
				msg+="*Please select a State<br/>";				
				return_val=false;
			}	
			
			if(selected_city_option == 0)
			{
				msg+="*Please select a City<br/>";				
				return_val=false;
			}
			*/
			
			//alert("Hi");
			
			return true;
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
	
	$return_val_tutor_info = get_tutor_info();
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
	}
	
	if(isset($_POST["submit_update_profile1"]))
	{		
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$mobile = trim($_POST['mobile']);
		$address_line1 = trim($_POST['address_line1']);
		$address_line2 = trim($_POST['address_line2']);
		$city_id = trim($_POST['city']);
		
		$tutor_email = $_SESSION["tutor_email"];
					
		$return_val_udpate1 = update_tutor_profile_step1($name, $email, $mobile,
			$address_line1, $address_line2, $city_id, $tutor_email);
			
		header("Location: my_profile_step2.php");
	}	
?>
<body>
<div>
	<div style="width: 340px; margin: 0 auto;">
	<form id="frmProfileUpdate" name="frmProfileUpdate" method="post">
	<fieldset id="fs_personal_info">
	<legend>Personal Information</legend>
	<label>Name:</label>
    <label class="mandatory-label">*</label>
	<br/>
	<input type="text" name="name" id="name" maxlength="40" class="text-box"
			value="<?php echo $tutor_name ?>">
    <br/>
                            <br/>                            
                            <label>Email:</label>
                            <label class="mandatory-label">*</label>  
							<br/>	
                            <input type="email" name="email" id="email" class="text-box"
									maxlength="35" value="<?php echo $tutor_email ?>">                            
                            
							<br/>
                            <br/>
                            <label>Phone:</label>
                            <label class="mandatory-label">*</label>  
							<br/>                            
							<input type="text" name="mobile" id="mobile" class="text-box"
									maxlength="10" name="mobile" value="<?php echo $tutor_mobile ?>">
                                
                            <br/>
                            <br/>                            
                            <label>Address Line 1:</label>                                
							<label class="mandatory-label">*</label>
							<br/>                            
							<input id="address_line1" name="address_line1" type="text" class="text-box"
										maxlength="30" value="<?php echo $address_line1 ?>">
                            <br/>
                            <br/>                            
							<label>Address Line 2:</label>                                
							<label class="mandatory-label">*</label>
							<br/>                            
							<input id="address_line2" name="address_line2" type="text" class="text-box"
									value="<?php echo $address_line2 ?>">
							<br/>
                            <br/>
                            <label>Country:</label>                                
							<label class="mandatory-label">*</label>                                
							<br/>                            
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
                            <br/>
                            <br/>  						
                            <label>State</label>                                
							<label class="mandatory-label">*</label>  
							<br/>                            
                            <select id="state" name="state" type="text" >
								<option value="0">--Select--</option>								
							</select>
							<br/>
                            <br/>
                            <label style="width: 50px;" maxlength="30">City:</label>                                
							<label class="mandatory-label">*</label>
							<br/>                            
                            <select id="city" name="city" type="text">										
							</select>
							<br/>
                            <br/>
	</fieldset>
	<br/>
	<div>
		<span>
			<input type="submit" value="Next" name="submit_update_profile1" id="submit_update_profile1">
		</span>
		<span style="margin-left: 10px;">
			<a href="my_profile_step2.php">Skip</a>
		</span>
	</div>
	<div>
	</form>
</div>
</body>
</html>